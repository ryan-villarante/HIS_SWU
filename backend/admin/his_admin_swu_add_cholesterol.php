<?php

include('assets/inc/config.php');


// $render_code = $_POST['render_code'];
$up_name = $_POST['ur_name'];
$redirect_to = $_POST['redirect_to'];

$fbss = $_POST['fbss'];
$fbss_range = $_POST['fbss_range'];

$crea = $_POST['crea'];
$crea_range = $_POST['creatinine_range'];

$uric = $_POST['uric'];
$uric_range = $_POST['acid'];

$cloe = $_POST['chole'];
$cloe_range = $_POST['cloe_range'];

$trig = $_POST['trig'];
$trig_range = $_POST['trig_range'];

$hdlss = $_POST['hdlss'];
$hdls_range = $_POST['hdls_range'];

$ldls = $_POST['ldls'];
$ldls_range = $_POST['ldls_range'];

$vldls = $_POST['vldls'];
$vldls_range = $_POST['vldls_range'];

$chr = $_POST['chr'];
$chr_range = $_POST['chr_range'];

$remarks = $_POST['remarks'];
$cbc_pic = $_FILES["cbc_pic"]["name"];
$temp_file = $_FILES["cbc_pic"]["tmp_name"];
if ($temp_file && is_uploaded_file($temp_file)) {
    move_uploaded_file($temp_file, "../admin/assets/images/cbc/" . $cbc_pic);
} else {
    // Handle the case where the file was not uploaded successfully
    $err = "Error uploading file.";
}
$query = "INSERT INTO his_cholesterol (up_name,fbs,fbs_range,creatinine,creatinine_range, uric_acid	,uric_range, cholesterol,cholesterol_range,trig,trig_range,
hdl,hdl_range,ldl,ldl_range,vldl,vldl_range,chol,chol_range,remarks,cbc_pic)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

try {
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param(
        'sssssssssssssssssssss',
        $up_name,
        $fbss,
        $fbss_range,
        $crea,
        $crea_range,
        $uric,
        $uric_range,
        $cloe,
        $cloe_range,
        $trig,
        $trig_range,
        $hdlss,
        $hdls_range,
        $ldls,
        $ldls_range,
        $vldls,
        $vldls_range,
        $chr,
        $chr_range,
        $remarks,
        $cbc_pic,
    );
    $stmt->execute();
    $stmt->close();
    $success = "Success";
    if ($redirect_to != "for_preview") {
        header("Location: " . '/HIS-SWU/backend/admin/his_admin_swu_examination.php');
    } else {
        header("Location: " . '/HIS-SWU/backend/admin/his_admin_swu_exam_print_cholesterol.php?id=' . $mysqli->insert_id);
    }
} catch (Exception $e) {
    $err = "Please Try Again Or Try Later: " . $e->getMessage();
}
