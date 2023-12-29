<?php

include('assets/inc/config.php');


try {

    if (isset($_POST['delete'])) {
        $pat_id = (int)$_POST['pat_id'];

        // Check if the patient is not already deleted
        $queryDelete = "SELECT deleted FROM his_patients WHERE pat_id = $pat_id";
        $result = $mysqli->query($queryDelete);

        if ($result) {
            $row = $result->fetch_assoc();
            $deleted = $row['deleted'];

            if ($deleted == 0) {
                // If not deleted, perform the deletion
                $queryUpdate = "UPDATE his_patients SET deleted = 1 WHERE pat_id = $pat_id";
                $stmt = $mysqli->prepare($queryUpdate);

                if (!$stmt) {
                    die("Error in preparing the delete statement: " . $mysqli->error);
                }

                if (!$stmt->execute()) {
                    die("Error executing the delete statement: " . $stmt->error);
                }

                echo json_encode("Patient Deleted successfully");
            } else {
                echo json_encode("Patient is already deleted");
            }
        } else {
            echo json_encode("Error retrieving patient information");
        }
    }



    if (isset($_POST['discharge'])) {
        $pat_id = (int)$_POST['pat_id'];
        $qr = "SELECT tagged_as_mgh FROM his_patients WHERE pat_id = $pat_id";
        $res =  $mysqli->query($qr);
        $tagged_as_mgh = 0;

        while ($row = $res->fetch_row()) {
            $tagged_as_mgh = $row[0];
        }

        if ($tagged_as_mgh == 1) {
            $q = "UPDATE his_patients SET discharged = 1 WHERE pat_id = $pat_id";
            $st = $mysqli->prepare($q);

            if (!$st) {
                die("Error in preparing the delete statement: " . $mysqli->error);
            }

            if (!$st->execute()) {
                die("Error executing the delete statement: " . $st->error);
            }

            $r = $st->get_result();

            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Cannot discharge patient that is not tagged as MGH!"]);
        }
    } else if (isset($_POST["tag_as_mgh"])) {
        $pat_id = (int)$_POST['pat_id'];
        $query = "SELECT cleared FROM his_notify where no_pat_id = $pat_id";
        $result =  $mysqli->query($query);

        $cleared = [];
        $notCleared = [];
        while ($row = $result->fetch_row()) {
            if ($row[0] == 1) {
                array_push($cleared, $row);
            } else {
                array_push($notCleared, $row);
            }
        }
        if (sizeof($cleared) != 0 && sizeof($notCleared) == 0) {
            $q = "UPDATE his_patients SET tagged_as_mgh = 1 WHERE pat_id = $pat_id";
            $st = $mysqli->prepare($q);
            if (!$st) {
                die("Error in preparing the delete statement: " . $mysqli->error);
            }
            if (!$st->execute()) {
                die("Error executing the delete statement: " . $st->error);
            }
            $r = $st->get_result();

            echo json_encode("Patient was tagged as MGH sucessfully");
        } else if (sizeof($notCleared) != 0) {
            echo json_encode("Patients with not cleared clearance cannot be tagged as MGH");
        } else if (sizeof($cleared) == 0 && sizeof($notCleared) == 0) {
            echo json_encode("Patients with no MGH clearance cannot be tagged as MGH");
        }
    }
    if (isset($_POST["cleared"]) && $_POST["cleared"] == "all") {
        $pat_id = (int)$_POST['pat_id'];
        $query = "SELECT no_id, no_date, no_dept, cleared FROM his_notify where  no_pat_id = $pat_id";
        $result =  $mysqli->query($query);

        $data = [];
        while ($row = $result->fetch_row()) {
            array_push($data, ["no_id" => $row[0], "no_date" => $row[1], "no_dept" => $row[2], "cleared" => $row[3]]);
        }
        echo json_encode($data);
    } else if (isset($_POST["cleared"])) {
        $pat_id = (int)$_POST['pat_id'];
        $cleared = $_POST["cleared"];
        $query = "SELECT no_id, no_date, no_dept FROM his_notify where cleared = $cleared AND no_pat_id = $pat_id";
        $result =  $mysqli->query($query);

        $data = [];
        while ($row = $result->fetch_row()) {
            array_push($data, ["no_id" => $row[0], "no_date" => $row[1], "no_dept" => $row[2]]);
        }
        echo json_encode($data);
    } else if (isset($_POST['to_notify']) && isset($_POST['message'])) {

        $pat_id = (int)$_POST['pat_id'];
        $query1 = "SELECT no_dept FROM his_notify where no_pat_id = $pat_id";
        $result1 =  $mysqli->query($query1);

        $existingTags = [];
        while ($row = $result1->fetch_row()) {
            array_push($existingTags, $row[0]);
        }


        $to_notify = $_POST['to_notify'];
        $message = $_POST['message'];

        // Construct a SQL query with prepared statement
        $values = "";
        $alreadyExistTags = [];
        $newNotif = [];
        $to_notify = explode(",", $to_notify);
        foreach ($to_notify as $item) {
            if (in_array($item, $existingTags)) {
                array_push($alreadyExistTags, $item);
            } else {
                array_push($newNotif, $item);
                if ($values != "") {
                    $values .= ", ";
                }
                $values .= "(" . $pat_id . ",'" . $item . "','" . $message . "')";
            }
        }

        if (sizeof($newNotif) == 0) {
            echo json_encode("Already notified all departments");
            return;
        }


        $query = "INSERT INTO his_notify (no_pat_id, no_dept, no_message) VALUES $values";


        $stmt = $mysqli->prepare($query);
        if (!$stmt) {
            throw new Exception("Error preparing query: " . $mysqli->error);
        }

        // Bind the search parameter to the query

        // Execute the query
        if (!$stmt->execute()) {
            throw new Exception("Error executing query: " . $stmt->error);
        }

        // Get the result
        $result = $stmt->get_result();


        // Set the Content-Type header to indicate JSON response
        header('Content-Type: application/json');

        // Echo the JSON response

        if (sizeof($alreadyExistTags) != 0) {
            $message = "Already notified the following (" . join(", ", $alreadyExistTags) . "). Successfully notified the following (" . join(", ", $newNotif) . ")";
            echo json_encode($message);
            return;
        }
        echo json_encode("Notification successfully sent");
    }
} catch (Exception $e) {
    // Handle errors
    echo json_encode(array('error' => $e->getMessage()));
}
