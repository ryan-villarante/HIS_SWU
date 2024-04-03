<?php

include('assets/inc/config.php');

if (isset($_GET['patientType'])) {
    try {
        $type = $_GET['patientType'];

        // Construct a SQL query with prepared statement
        $query = "SELECT DISTINCT p.pat_id, p.pat_case, p.pat_number, p.pat_fname, p.pat_lname, p.pat_date_joined, rb.room_number
        FROM his_patients p
        LEFT JOIN his_rooms_beds rb ON p.room_id = rb.room_id
        WHERE p.pat_type " . ($type == "All Registry Case Type" ? "IS NOT NULL" : "= '" . $type . "'");

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

        $items = array();
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }

        // Set the Content-Type header to indicate JSON response
        header('Content-Type: application/json');

        // Echo the JSON response
        echo json_encode($items);
    } catch (Exception $e) {
        // Handle errors
        echo json_encode(array('error' => $e->getMessage()));
    }
}
