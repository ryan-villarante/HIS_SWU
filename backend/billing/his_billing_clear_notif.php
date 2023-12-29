<?php
include('assets/inc/config.php');

try {
    if (isset($_POST["clearRecordId"])) {
        $id = $_POST["clearRecordId"];
        $query = "UPDATE his_notify SET cleared = 1 WHERE no_id = $id";
        $stmt = $mysqli->prepare($query);
        if (!$stmt) {
            die("Error in preparing the delete statement: " . $mysqli->error);
        }
        if (!$stmt->execute()) {
            die("Error executing the delete statement: " . $stmt->error);
        }
        $result = $stmt->get_result();

        header('Content-Type: application/json');

        // Echo the JSON response
        echo json_encode($result);
    } else {

        $cond = "";
        $ids = $_POST['deleteRecordId'];

        if (gettype($ids) == "string") {

            $cond = "no_id=$ids";
        } else {
            $ids = join(',', $ids);
            $cond = "no_id in ($ids)";
        }
        $adn = "DELETE FROM his_notify WHERE " . $cond;
        $stmt = $mysqli->prepare($adn);
        if (!$stmt) {
            die("Error in preparing the delete statement: " . $mysqli->error);
        }
        if (!$stmt->execute()) {
            die("Error executing the delete statement: " . $stmt->error);
        }
        $result = $stmt->get_result();

        header('Content-Type: application/json');

        // Echo the JSON response
        echo json_encode($result);
    }
} catch (Exception $e) {
    // Handle errors
    echo json_encode(array('error' => $e->getMessage()));
}
