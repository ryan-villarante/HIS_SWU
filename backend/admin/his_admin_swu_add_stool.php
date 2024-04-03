<?php

include('assets/inc/config.php');


// $render_code = $_POST['render_code'];
$up_name = $_POST['ur_name'];
$redirect_to = $_POST['redirect_to'];
$color = $_POST['stool_color'];
$transparent = $_POST['consistent'];

$wbc = $_POST['cbws'];
$wbc_range = $_POST['cbws_range'];

$rbc = $_POST['cbrs'];
$rbc_range = $_POST['cbrs_range'];

$ova_para = $_POST['ova_parasites'];

$remarks = $_POST['remarks'];
$cbc_pic = $_FILES["cbc_pic"]["name"];
$temp_file = $_FILES["cbc_pic"]["tmp_name"];
if ($temp_file && is_uploaded_file($temp_file)) {
    move_uploaded_file($temp_file, "../admin/assets/images/cbc/" . $cbc_pic);
} else {
    // Handle the case where the file was not uploaded successfully
    $err = "Error uploading file.";
}
$query = "INSERT INTO his_stool (up_name,color,consistency,wbc,wbc_range, rbc,rbc_range, ova_parasites,remarks,cbc_pic)
    VALUES (?,?,?,?,?,?,?,?,?,?)";

try {
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param(
        'ssssssssss',
        $up_name,
        $color,
        $transparent,
        $wbc,
        $wbc_range,
        $rbc,
        $rbc_range,
        $ova_para,
        $remarks,
        $cbc_pic,
    );
    $stmt->execute();
    $stmt->close();
    $success = "Success";
    if ($redirect_to != "for_preview") {
        header("Location: " . '/HIS-SWU/backend/admin/his_admin_swu_examination.php');
    } else {
        header("Location: " . '/HIS-SWU/backend/admin/his_admin_swu_exam_print_stool.php?id=' . $mysqli->insert_id);
    }
} catch (Exception $e) {
    $err = "Please Try Again Or Try Later: " . $e->getMessage();
}
