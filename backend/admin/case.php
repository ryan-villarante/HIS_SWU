<?php

include('assets/inc/config.php');

// if (isset($_GET['search'])) {
try {
    $pat_fname = $_POST['pat_fname'];
    $pat_lname = $_POST['pat_lname'];
    $pat_number = $_POST['pat_number'];
    $pat_phone = $_POST['pat_phone'];
    $pat_type = $_POST['pat_type'];
    $pat_addr = $_POST['pat_addr'];
    $pat_age = $_POST['pat_age'];
    $pat_dob = $_POST['pat_dob'];
    $pat_er_case = $_POST['pat_er_case'];
    $pat_er_date = $_POST['pat_er_date'];
    $pat_er_series = $_POST['pat_er_series'];
    $add_new_case = $_POST['add_new_case'];

    // Construct a SQL query with prepared statement
    $query = "SELECT * FROM his_patients WHERE LOWER(pat_fname) LIKE LOWER(?) AND LOWER(pat_lname) LIKE LOWER(?) AND pat_dob = ? AND deleted = ?";
    $stmt = $mysqli->prepare($query);
    if (!$stmt) {
        throw new Exception("Error preparing query: " . $mysqli->error);
    }

    $items = array();

    if ($add_new_case != 1) {

        // Bind the search parameter to the query
        $fname = "%$pat_fname%";
        $lname = "%$pat_lname%";
        $notDeleted = 0;
        $stmt->bind_param("ssss", $fname, $lname, $pat_dob, $notDeleted);

        // Execute the query
        if (!$stmt->execute()) {
            throw new Exception("Error executing query: " . $stmt->error);
        }

        // Get the result
        $result = $stmt->get_result();


        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
    }

    header('Content-Type: application/json');


    if (COUNT($items) == 0) {
        $query2 = "INSERT INTO his_patients (pat_fname, pat_lname, pat_age, pat_dob, pat_number, pat_phone,
     pat_type, pat_addr, pat_er_case, pat_er_date, pat_er_series)
     VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $stmt2 = $mysqli->prepare($query2);
        $rc = $stmt2->bind_param(
            'sssssssssss',
            $pat_fname,
            $pat_lname,
            $pat_age,
            $pat_dob,
            $pat_number,
            $pat_phone,
            $pat_type,
            $pat_addr,
            $pat_er_case,
            $pat_er_date,
            $pat_er_series
        );
        $stmt2->execute();
        $pat_id = $mysqli->insert_id;
        echo json_encode(["existing" => false, "message" => "Patient Successfully added", "pat_id" => $pat_id]);
    } else {
        echo json_encode(["existing" => true, "message" => "Patient already registered!"]);
    }
} catch (Exception $e) {
    // Handle errors
    echo json_encode(array('error' => $e->getMessage()));
}
// }
