<?php

include('assets/inc/config.php');

if (isset($_GET['search'])) {
    try {
        $search = $_GET['search'];
        $tableName = $_GET['tableName'];
        $columnToSearch = $_GET['columnToSearch'];

        // Construct a SQL query with prepared statement
        $query = "SELECT * FROM " . $tableName . " WHERE ".$columnToSearch." LIKE ?";
        $stmt = $mysqli->prepare($query);
        if (!$stmt) {
            throw new Exception("Error preparing query: " . $mysqli->error);
        }

        // Bind the search parameter to the query
        $searchParam = "%$search%";
        $stmt->bind_param("s", $searchParam);

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
