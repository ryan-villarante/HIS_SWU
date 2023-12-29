<?php

include('assets/inc/config.php');


// $render_code = $_POST['render_code'];
$up_name = $_POST['up_name'];
$redirect_to = $_POST['redirect_to'];
$wbc = $_POST['wbc'];
$seg = $_POST['seg'];
$lym = $_POST['lym'];
$mon = $_POST['mon'];
$eos = $_POST['eos'];
$bas = $_POST['bas'];
$rbc = $_POST['rbc'];
$hgb = $_POST['hgb'];
$hct = $_POST['hct'];
$mcv = $_POST['mcv'];
$mch = $_POST['mch'];
$mchc = $_POST['mchc'];
$plt = $_POST['plt'];
$remarks = htmlspecialchars($_POST['remarks']);
$cbc_pic = $_FILES["cbc_pic"]["name"];
$temp_file = $_FILES["cbc_pic"]["tmp_name"];
// Check if a file was uploaded successfully
if ($temp_file && is_uploaded_file($temp_file)) {
    move_uploaded_file($temp_file, "../admin/assets/images/cbc/" . $cbc_pic);
} else {
    // Handle the case where the file was not uploaded successfully
    $err = "Error uploading file.";
}
$query = "INSERT INTO his_cbc (up_name,wbc,seg, lym,mon,eos,bas,rbc,hgb,hct,mcv,mch,mchc,plt,remarks,cbc_pic)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

try {
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param(
        'ssssssssssssssss',
        $up_name,
        $wbc,
        $seg,
        $lym,
        $mon,
        $eos,
        $bas,
        $rbc,
        $hgb,
        $hct,
        $mcv,
        $mch,
        $mchc,
        $plt,
        $remarks,
        $cbc_pic
    );
    $stmt->execute();
    $stmt->close();
    $success = "Success";
    if ($redirect_to != "for_preview") {
        header("Location: " . '/HIS-SWU/backend/medtech/his_doc_exam.php');
    } else {
        header("Location: " . '/HIS-SWU/backend/medtech/his_admin_swu_exam_print.php?id=' . $mysqli->insert_id);
    }
} catch (Exception $e) {
    $err = "Please Try Again Or Try Later: " . $e->getMessage();
}
