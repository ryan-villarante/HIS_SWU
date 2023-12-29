<?php

include('assets/inc/config.php');


// $render_code = $_POST['render_code'];
$up_name = $_POST['up_name'];
$redirect_to = $_POST['redirect_to'];
$wbc = $_POST['wbc'];
$wbc_range = $_POST['wbc_range'];
$seg = $_POST['seg'];
$seg_range = $_POST['seg_range'];
$lym = $_POST['lym'];
$lym_range = $_POST['lym_range'];
$mon = $_POST['mon'];
$mon_range = $_POST['mon_range'];
$eos = $_POST['eos'];
$eos_range = $_POST['eos_range'];
$bas = $_POST['bas'];
$bas_range = $_POST['bas_range'];
$rbc = $_POST['rbc'];
$rbc_range = $_POST['rbc_range'];
$hgb = $_POST['hgb'];
$hgb_range = $_POST['hgb_range'];
$hct = $_POST['hct'];
$hct_range = $_POST['hct_range'];
$mcv = $_POST['mcv'];
$mcv_range = $_POST['mcv_range'];
$mch = $_POST['mch'];
$mch_range = $_POST['mch_range'];
$mchc = $_POST['mchc'];
$mchc_range = $_POST['mchc_range'];
$plt = $_POST['plt'];
$plt_range = $_POST['plt_range'];
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
$query = "INSERT INTO his_cbc (up_name,wbc,wbc_range,seg,seg_range, lym,lym_range,mon,mon_range,eos,eos_range,
bas,bas_range,rbc,rbc_range,hgb,hgb_range,hct,hct_range,mcv,mcv_range,mch,mch_range,mchc,mchc_range,
plt,plt_range,remarks,cbc_pic)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

try {
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param(
        'sssssssssssssssssssssssssssss',
        $up_name,
        $wbc,
        $wbc_range,
        $seg,
        $seg_range,
        $lym,
        $lym_range,
        $mon,
        $mon_range,
        $eos,
        $eos_range,
        $bas,
        $bas_range,
        $rbc,
        $rbc_range,
        $hgb,
        $hgb_range,
        $hct,
        $hct_range,
        $mcv,
        $mcv_range,
        $mch,
        $mch_range,
        $mchc,
        $mchc_range,
        $plt,
        $plt_range,
        $remarks,
        $cbc_pic,
    );
    $stmt->execute();
    $stmt->close();
    $success = "Success";
    if ($redirect_to != "for_preview") {
        header("Location: " . '/HIS-SWU/backend/admin/his_admin_swu_examination.php');
    } else {
        header("Location: " . '/HIS-SWU/backend/admin/his_admin_swu_exam_print.php?id=' . $mysqli->insert_id);
    }
} catch (Exception $e) {
    $err = "Please Try Again Or Try Later: " . $e->getMessage();
}
