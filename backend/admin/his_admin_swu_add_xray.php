<?php

include('assets/inc/config.php');

$x_name = $_POST['x_name'];
$redirect_toXray = $_POST['redirect_toXray'];
$x_remarks = htmlspecialchars($_POST['x_remarks']);

// Check if a file is selected for upload
if (isset($_FILES["x_pic"]) && $_FILES["x_pic"]["error"] == UPLOAD_ERR_OK) {
    $x_pic = $_FILES["x_pic"]["name"];
    $temp_file = $_FILES["x_pic"]["tmp_name"];

    // Check if the file was uploaded successfully
    if (move_uploaded_file($temp_file, "../admin/assets/images/xray/" . $x_pic)) {
        // File upload success, proceed with database insertion
        $query = "INSERT INTO his_xray (x_name, x_remarks, x_pic) VALUES (?, ?, ?)";
        try {
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param('sss', $x_name, $x_remarks, $x_pic);
            $stmt->execute();
            $stmt->close();

            $success = "Success";
            if ($redirect_toXray != "for_preview_xray") {
                header("Location: /HIS-SWU/backend/admin/his_admin_swu_examination.php");
            } else {
                header("Location: /HIS-SWU/backend/admin/his_admin_swu_xray_print.php?id=" . $mysqli->insert_id);
            }
        } catch (Exception $e) {
            $err = "Please Try Again Or Try Later: " . $e->getMessage();
        }
    } else {
        $err = "Error moving uploaded file to destination.";
    }
} else {
    // Handle the case where no file is selected or an error occurred
    $err = "No file selected or an error occurred during upload.";
}
