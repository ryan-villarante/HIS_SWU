<?php

include('assets/inc/config.php');



$dis_name = $_POST['dis_name'];
$dis_doc = $_POST['dis_doc'];
$dis_time = $_POST['dis_time'];
$redirect_to_print = $_POST['redirect_to_print'];
$dis_diag = $_POST['dis_diag'];
$dis_procedure = htmlspecialchars($_POST['dis_procedure']);
$dis_complication = $_POST['dis_complication'];
$dis_consultation = htmlspecialchars($_POST['dis_consultation']);
$dis_lab = htmlspecialchars($_POST['dis_lab']);
$dis_condition = htmlspecialchars($_POST['dis_condition']);

$query = "INSERT INTO his_discharged (dis_name,dis_doc,dis_time,dis_diag,dis_procedure,dis_complication,dis_consultation,dis_lab,dis_condition)
    VALUES (?,?,?,?,?,?,?,?,?)";

try {
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param(
        'sssssssss',
        $dis_name,
        $dis_doc,
        $dis_time,
        $dis_diag,
        $dis_procedure,
        $dis_complication,
        $dis_consultation,
        $dis_lab,
        $dis_condition,

    );
    $stmt->execute();
    $stmt->close();
    $success = "Success";
    if ($redirect_to_print != "for_preview_print") {
        header("Location: " . '/HIS-SWU/backend/admin/his_admin_inpatient_records.php');
    } else {
        header("Location: " . '/HIS-SWU/backend/admin/his_admin_print_discharge.php?id=' . $mysqli->insert_id);
    }
} catch (Exception $e) {
    $err = "Please Try Again Or Try Later: " . $e->getMessage();
}
