<?php

include('assets/inc/config.php');


// $render_code = $_POST['render_code'];
$up_name = $_POST['ur_name'];
$redirect_to = $_POST['redirect_to'];
$color = $_POST['urine_color'];
$transparent = $_POST['transparency'];

$sp = $_POST['gravity'];
$sp_range = $_POST['sp_range'];

$ph = $_POST['ph'];
$ph_ranges = $_POST['pH_range'];

$protein = $_POST['urine_protein'];
$glocuse = $_POST['glucose'];
$bilirubin = $_POST['bilirubin'];
$blood = $_POST['blood'];
$leucocytes = $_POST['leucocytes'];
$nitrite = $_POST['nitrite'];

$urobilinogen = $_POST['uro'];
$urobilinogen_range = $_POST['uro_range'];

$ketone = $_POST['ketone'];

$cbr = $_POST['cbr'];
$cbr_range = $_POST['cbr_range'];

$hct = $_POST['cbw'];
$hct_range = $_POST['cbw_range'];

$epithelial = $_POST['epithelial_cells'];
$bacteria = $_POST['bacteria'];
$mucus = $_POST['mucus_threads'];
$remarks = $_POST['remarks'];
$cbc_pic = $_FILES["cbc_pic"]["name"];
$temp_file = $_FILES["cbc_pic"]["tmp_name"];
if ($temp_file && is_uploaded_file($temp_file)) {
    move_uploaded_file($temp_file, "../admin/assets/images/cbc/" . $cbc_pic);
} else {
    // Handle the case where the file was not uploaded successfully
    $err = "Error uploading file.";
}
$query = "INSERT INTO his_urinalysis (up_name,color,transparent,sp_gravity,sp_range, ph,ph_ranges, protein,glocuse,bilirubin,blood,
leucocytes,nitrite,urobilinogen,urobilinogen_range,ketone,rbc,rbc_range,wbc,wbc_range,epithelial_cells,bacteria,mucus_threads,remarks,cbc_pic)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

try {
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param(
        'sssssssssssssssssssssssss',
        $up_name,
        $color,
        $transparent,
        $sp,
        $sp_range,
        $ph,
        $ph_ranges,
        $protein,
        $glocuse,
        $bilirubin,
        $blood,
        $leucocytes,
        $nitrite,
        $urobilinogen,
        $urobilinogen_range,
        $ketone,
        $cbr,
        $cbr_range,
        $hct,
        $hct_range,
        $epithelial,
        $bacteria,
        $mucus,
        $remarks,
        $cbc_pic,
    );
    $stmt->execute();
    $stmt->close();
    $success = "Success";
    if ($redirect_to != "for_preview") {
        header("Location: " . '/HIS-SWU/backend/admin/his_admin_swu_examination.php');
    } else {
        header("Location: " . '/HIS-SWU/backend/admin/his_admin_swu_exam_print_urine.php?id=' . $mysqli->insert_id);
    }
} catch (Exception $e) {
    $err = "Please Try Again Or Try Later: " . $e->getMessage();
}
