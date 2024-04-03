<?php

include('assets/inc/config.php');


// $render_code = $_POST['render_code'];
$up_name = $_POST['ur_name'];
$redirect_to = $_POST['redirect_to'];

$sodium = $_POST['sod'];
$sodium_range = $_POST['sod_range'];

$pot = $_POST['pot'];
$pot_range = $_POST['pot_range'];

$chlo = $_POST['chlo'];
$chlo_range = $_POST['chlo_range'];

$cals = $_POST['cals'];
$cals_range = $_POST['cals_range'];

$cal = $_POST['cal'];
$cal_range = $_POST['cal_range'];

$mags = $_POST['mags'];
$mags_range = $_POST['mags_range'];

$phos = $_POST['phos'];
$phos_range = $_POST['phos_range'];

$dbili = $_POST['dbili'];
$dbili_range = $_POST['dbili_range'];

$inbili = $_POST['inbili'];
$inbili_range = $_POST['inbili_range'];

$creat = $_POST['creat'];
$creat_range = $_POST['creat_range'];

$buns = $_POST['buns'];
$buns_range = $_POST['buns_range'];

$buas = $_POST['buas'];
$buas_range = $_POST['buas_range'];

$album = $_POST['album'];
$album_range = $_POST['album_range'];

$remarks = $_POST['remarks'];
$cbc_pic = $_FILES["cbc_pic"]["name"];
$temp_file = $_FILES["cbc_pic"]["tmp_name"];
if ($temp_file && is_uploaded_file($temp_file)) {
    move_uploaded_file($temp_file, "../admin/assets/images/cbc/" . $cbc_pic);
} else {
    // Handle the case where the file was not uploaded successfully
    $err = "Error uploading file.";
}
$query = "INSERT INTO his_sgpt (up_name,sodium,sodium_range,potassium,potassium_range, chloride	,chloride_range	, cal,cal_range,cium,cium_range,
magnesium,magnesium_range,phosphorus,phosphorus_range,db,db_range,ib,ib_range,creatinine,creatinine_range,bun,bun_range,bua,bua_range,albumin,albumin_range,remarks,cbc_pic)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

try {
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param(
        'sssssssssssssssssssssssssssss',
        $up_name,
        $sodium,
        $sodium_range,
        $pot,
        $pot_range,
        $chlo,
        $chlo_range,
        $cals,
        $cals_range,
        $cal,
        $cal_range,
        $mags,
        $mags_range,
        $phos,
        $phos_range,
        $dbili,
        $dbili_range,
        $inbili,
        $inbili_range,
        $creat,
        $creat_range,
        $buns,
        $buns_range,
        $buas,
        $buas_range,
        $album,
        $album_range,
        $remarks,
        $cbc_pic,
    );
    $stmt->execute();
    $stmt->close();
    $success = "Success";
    if ($redirect_to != "for_preview") {
        header("Location: " . '/HIS-SWU/backend/admin/his_admin_swu_examination.php');
    } else {
        header("Location: " . '/HIS-SWU/backend/admin/his_admin_swu_exam_print_sgpt.php?id=' . $mysqli->insert_id);
    }
} catch (Exception $e) {
    $err = "Please Try Again Or Try Later: " . $e->getMessage();
}
