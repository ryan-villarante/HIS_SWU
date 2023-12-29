<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['ad_id'];



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['releaseId'])) {
    $id = intval($_POST['releaseId']);
    // echo "ID to delete: " . $id . "<br>"; // Debug: Check if the ID is correct
    $adn = "UPDATE  his_ancillary SET released = 1 WHERE render_id = $id";
    $stmt = $mysqli->prepare($adn);
    if (!$stmt) {
        die("Error in preparing the delete statement: " . $mysqli->error);
    }
    $stmt->execute();
    $stmt->close();

    if ($stmt) {
        $success = "Examination successfully Released";

        // You can optionally redirect here or update the UI as needed
        // echo "Deletion successful<br>"; // Debug: Check if deletion was successful
    } else {
        $err = "Try Again Later";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deletedId'])) {
    $id = intval($_POST['deletedId']);
    // echo "ID to delete: " . $id . "<br>"; // Debug: Check if the ID is correct
    $adn = "UPDATE  his_ancillary SET deleted = 1 WHERE render_id = $id";
    $stmt = $mysqli->prepare($adn);
    if (!$stmt) {
        die("Error in preparing the delete statement: " . $mysqli->error);
    }
    $stmt->execute();
    $stmt->close();

    if ($stmt) {
        $success = "Examination successfully Deleted";

        // You can optionally redirect here or update the UI as needed
        // echo "Deletion successful<br>"; // Debug: Check if deletion was successful
    } else {
        $err = "Try Again Later";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<?php include('assets/inc/head.php'); ?>

<body>

    <!-- Begin page -->
    <div id="wrapper" class="nonPrintable">

        <!-- Topbar Start -->
        <?php include('assets/inc/nav.php'); ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include("assets/inc/sidebar.php"); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->


        <form method="post" action="his_admin_swu_add_cbc.php" id="myForm" enctype="multipart/form-data">



            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Examination Upshots</a></li>
                                            <li class="breadcrumb-item active">Examination Upshots</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">


                                    <!-- button for CRUD -->
                                    <div class="d-flex justify-content-start">
                                        <div class="form-group">
                                            <input type="text" id="searchInput" placeholder="Search for Patient Name" data-tablename="his_ancillary" data-columntosearch="render_name" data-resulttable="ancillaryData" class="form-control form-control-sm " autocomplete="on" onkeyup="searchTable()">
                                        </div>
                                    </div>
                                    <!-- end -->


                                    <?php
                                    // his_admin_render.php

                                    if (isset($_POST['render_id'])) {
                                        $render_id = $_POST['render_id'];

                                        $ret = "SELECT * FROM his_patients WHERE render_id=?";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->bind_param('i', $render_id);
                                        $stmt->execute();
                                        $res = $stmt->get_result();

                                        if ($row = $res->fetch_object()) {
                                            // // Retrieve patient information
                                            // $patientName = $row->render_name;
                                            // Add more variables for other patient information

                                            // Display patient information within HTML
                                    ?>

                                    <?php
                                        }
                                    }
                                    ?>

                                    <div class="col-md-12 d-flex justify-content-start">
                                        <!-- Trigger the modal with a button -->
                                        <!-- <button type="button" class="fa fa-plus lg-4 bi-plus btn btn-lg-2 maroon-outline-btn my-2" data-toggle="modal" data-target="#myModal"> Manage Examination</button> -->


                                        <!-- Modal -->
                                        <div class="modal fade" id="examResultModal" role="dialog">
                                            <div class="modal-dialog modal-xl">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Examination Result Entry Form
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card-box">
                                                            <div class="row">



                                                                <div class="form-group col-md-12 my-1">
                                                                    <input type="text" readonly name="" value="Header" class="form-control" style="background-color: #6c757d;color:white;text-align: center;">
                                                                </div>
                                                                <div class="col-12 ">
                                                                    <div class="card">
                                                                        <div class="card-body" style="padding:0rem;">
                                                                            <div class="form-row" style="margin-left: -2px;margin: right -2px;">
                                                                                <div class="form-group margin col-md-3">
                                                                                    <span class="small-text">Patient Name</span>
                                                                                    <input type="text" readonly class="form-control small-input" id="patientNameInput" value="" style="background-color: #ffffff;">
                                                                                </div>
                                                                                <div class="form-group margin col-md-3" style="display: none;">
                                                                                    <span class="small-text">Room No.</span>
                                                                                    <input type="text" readonly name="" class="form-control small-input" id="inputlg" value="">

                                                                                </div>
                                                                                <div class="form-group margin col-md-3">
                                                                                    <span class="small-text">Age</span>
                                                                                    <input type="text" name="patient_age" class="form-control small-input" id="ageInput" placeholder="" value="" readonly style="background-color: #ffffff;">
                                                                                </div>
                                                                                <div class="form-group margin col-md-3 " style="display: none;">
                                                                                    <span class="small-text">Gender</span>
                                                                                    <input type="text" name="render_age" class="form-control small-input" id="inputPassword4" placeholder="" value="" readonly style="background-color: #ffffff;">
                                                                                </div>
                                                                                <div class="form-group margin col-md-3">
                                                                                    <span class="small-text">Requesting Physician</span>
                                                                                    <input type="text" readonly class="form-control small-input" name="doctor" id="docInput" value="" style="background-color: #ffffff;">
                                                                                </div>
                                                                                <div class="form-group margin col-md-3 ">
                                                                                    <span class="small-text">Request Date</span>
                                                                                    <input type="date" name="render_age" class="form-control small-input" id="requestDateInput" value="<?php echo date('Y-m-d'); ?>" readonly style="background-color: #ffffff;">

                                                                                </div>

                                                                            </div>

                                                                            <div class="form-row">



                                                                                <!-- <div class="form-group margin col-md-3" style="display: none;">
                                                                                    <span class="small-text">Birth Date</span>
                                                                                    <input type="date" name="" class="form-control small-input" id="inputPassword4" placeholder=""  readonly>
                                                                                </div>

                                                                                <div class="form-group margin col-md-3" style="display: none;">
                                                                                    <span class="small-text">Release Date/Time</span>
                                                                                    <input type="text" readonly class="form-control small-input" id="inputlg" value="">
                                                                                </div> -->
                                                                            </div>

                                                                        </div>



                                                                        <div class="form-group col-md-12 my-2">
                                                                            <input type="text" readonly name="" value="Contents" class="form-control" style="background-color: #6c757d;color:white;text-align: center;">

                                                                            <input type="text" readonly name="" value="Laboratory Results" class="form-control lab" style="background-color: none;color:gray;text-align: center;border:none;font-weight: bold;">
                                                                        </div>
                                                                        <div class="row examination">
                                                                            <div class="input-group mb-0 my-0">



                                                                                <input type="text" name="cash_payer" class="form-control ref  " readonly id="inputlg" value="Complete Blood Count Differential" style="font-weight: bold;">
                                                                                <input type="text" readonly name="cash_payer" class="form-control refs" id="inputlg" style="font-weight: bold;" value="              Reference Range:">
                                                                            </div>

                                                                            <div style="display: none;">
                                                                                <input type="text" name="up_name" id="up_name" />
                                                                            </div>

                                                                            <div class="input-group mb-2 my-2">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>WBC:</strong></span>
                                                                                </div>
                                                                                <input type="text" name="wbc" class="form-control exam" id="inputlg" value="" placeholder="input here" style="font-weight: bold;">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text low" id="wordDisplay"></span>
                                                                                    <input type="hidden" readonly name="wbc_range" id="wbc_range">
                                                                                </div>
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="         5.000 - 17.0000^3/mm^3">
                                                                            </div>




                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>SEG:</strong></span>
                                                                                </div>
                                                                                <input type="text" name="seg" class="form-control exam  " id="inputlg" value="" placeholder="input here" style="font-weight: bold;">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text low" id="wordDisplay2"></span>
                                                                                    <input type="hidden" readonly name="seg_range" id="seg_range">
                                                                                </div>
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="          37.0000 - 80.0000 %">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>LYM:</strong></span>
                                                                                </div>
                                                                                <input type="text" name="lym" class="form-control exam   " id="hosBill" value="" placeholder="input here" style="font-weight: bold;">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text low" id="wordDisplay1"></span>
                                                                                    <input type="hidden" readonly name="lym_range" id="lym_range">
                                                                                </div>
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="           10.000 - 50.0000 %">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>MON:</strong></span>
                                                                                </div>
                                                                                <input type="text" name="mon" class="form-control exam " id="inputlg" value="" placeholder="input here" style="font-weight: bold;">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text low" id="wordDisplay3"></span>
                                                                                    <input type="hidden" readonly name="mon_range" id="mon_range">
                                                                                </div>
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="          0.0000 - 12.0000 %">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>EOS:</strong></span>
                                                                                </div>
                                                                                <input type="text" name="eos" class="form-control exam  " id="inputlg" value="" placeholder="input here" style="font-weight: bold;">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text low" id="wordDisplay4"></span>
                                                                                    <input type="hidden" readonly name="eos_range" id="eos_range">
                                                                                </div>
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="           0.0000 - 7.0000 %">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>BAS:</strong></span>
                                                                                </div>
                                                                                <input type="text" name="bas" class="form-control exam   " id="hosBill" value="" placeholder="input here" style="font-weight: bold;">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text low" id="wordDisplay5"></span>
                                                                                    <input type="hidden" readonly name="bas_range" id="bas_range">
                                                                                </div>
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="            0.0000 - 2.5000 %">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>RBC:</strong></span>
                                                                                </div>
                                                                                <input type="text" name="rbc" class="form-control exam " id="inputlg" value="" placeholder="input here" style="font-weight: bold;">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text low" id="wordDisplay6"></span>
                                                                                    <input type="hidden" readonly name="rbc_range" id="rbc_range">
                                                                                </div>
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="           4.0000 - 5.4000 10/mm^3">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>HGB:</strong></span>
                                                                                </div>
                                                                                <input type="text" name="hgb" class="form-control exam  " id="inputlg" value="" placeholder="input here" style="font-weight: bold;">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text low" id="wordDisplay7"></span>
                                                                                    <input type="hidden" readonly name="hgb_range" id="hgb_range">
                                                                                </div>
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="          12.0000 - 15.0000 g/dl">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>HCT:</strong></span>
                                                                                </div>
                                                                                <input type="text" name="hct" class="form-control exam   " id="hosBill" value="" placeholder="input here" style="font-weight: bold;">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text low" id="wordDisplay8"></span>
                                                                                    <input type="hidden" readonly name="hct_range" id="hct_range">
                                                                                </div>
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="           41.9000 - 51.1000 %">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>MCV:</strong></span>
                                                                                </div>
                                                                                <input type="text" name="mcv" class="form-control exam " id="inputlg" value="" placeholder="input here" style="font-weight: bold;">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text low" id="wordDisplay9"></span>
                                                                                    <input type="hidden" readonly name="mcv_range" id="mcv_range">
                                                                                </div>
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="          83.0000 - 100.0000 µm^3">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>MCH:</strong></span>
                                                                                </div>
                                                                                <input type="text" name="mch" class="form-control exam " id="inputlg" value="" placeholder="input here" style="font-weight: bold;">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text low" id="wordDisplay10"></span>
                                                                                    <input type="hidden" readonly name="mch_range" id="mch_range">
                                                                                </div>
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="         30.9000 - 35.1000 pg">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>MCHC:</strong></span>
                                                                                </div>
                                                                                <input type="text" name="mchc" class="form-control exam " id="inputlg" value="" placeholder="input here" style="font-weight: bold;">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text low" id="wordDisplay11"></span>
                                                                                    <input type="hidden" readonly name="mchc_range" id="mchc_range">
                                                                                </div>
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="        32.0000 - 36.0000 g/dl">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>PLT:</strong></span>
                                                                                </div>
                                                                                <input type="text" name="plt" class="form-control exam " id="inputlg" value="" placeholder="input here" style="font-weight: bold;">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text low" id="wordDisplay12"></span>
                                                                                    <input type="hidden" readonly name="plt_range" id="plt_range">
                                                                                </div>
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="          150.0000 - 450.0000 10^3/mm^3">
                                                                            </div>
                                                                            <div class="form-group margin col-md-3 ">
                                                                                <label for="textarea_id"><strong>Remarks : </strong></label>
                                                                                <textarea name="remarks" id="textarea_id" rows="4" cols="50"></textarea>
                                                                            </div>
                                                                            <div style="display: none">
                                                                                <input type="text" id="redirectTo" name="redirect_to" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn maroon-outline-btn btn-sm ml-1" data-toggle="modal" data-target="#untagMghModal">View and Upload Image</button>
                                                        <button type="button" class="btn btn maroon-outline-btn btn-sm ml-1" id="saveAndPreview">Save and Preview</button>
                                                        <button type="submit" name="add_cbc" class="btn btn-primary">Save changes</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>









                                    <!-- Start View and Upload image MODAL -->
                                    <div class="modal" id="untagMghModal" tabindex="-1" role="dialog" aria-labelledby="untagMghModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content bg-secondary text-white">
                                                <div class="modal-header ">
                                                    <h5 class="modal-title" id="untagMghModalLabel"></h5>
                                                    Manage Picture
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="cbc_pic" id="customFile" onchange="updateFileName()">
                                                        <label class="custom-file-label" for="customFile" id="customFileLabel">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-primary" onclick="document.getElementById('customFile').click();">
                                                        Select File
                                                    </button>
                                                    <button type="button" class="btn btn-primary" onclick="clearFileInput();">
                                                        Clear File
                                                    </button>
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Go</button>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <!-- END for View and Upload image MODAL-->

        </form>


        <!-- END Save and preview modal  MODAL-->




        <!-- XRAY FORM START -->

        <form method="post" action="his_admin_swu_add_xray.php" id="myFormXray" enctype="multipart/form-data">

            <!-- Modal -->
            <div class="modal fade" id="xrayModal" tabindex="-1" role="dialog" aria-labelledby="xrayModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- <h5 class="modal-title" id="xrayModalLabel">Confirm Deletion</h5> -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-box-xray">
                                <div class="row">



                                    <div class="form-group col-md-12 my-1">
                                        <input type="text" readonly name="" value="Header" class="form-control" style="background-color: #cdcccc;color:black;text-align: center;">
                                    </div>
                                    <div class="col-12 ">
                                        <div class="card">
                                            <div class="form-row" style="margin-left: -2px;margin: right -2px;">

                                                <div class="form-group margin col-md-3">
                                                    <span class="small-text">Patient Name</span>
                                                    <input type="text" readonly class="form-control small-input" id="patientNameInputXray" value="" style="background-color: #ffffff;">
                                                </div>
                                                <div class="form-group margin col-md-3" style="display: none;">
                                                    <span class="small-text">Room No.</span>
                                                    <input type="text" readonly name="" class="form-control small-input" id="inputlg" value="">

                                                </div>
                                                <div class="form-group margin col-md-3">
                                                    <span class="small-text">Age</span>
                                                    <input type="text" name="patient_age" class="form-control small-input" id="ageInputXray" placeholder="" value="" readonly style="background-color: #ffffff;">
                                                </div>
                                                <div class="form-group margin col-md-3 " style="display: none;">
                                                    <span class="small-text">Gender</span>
                                                    <input type="text" name="render_age" class="form-control small-input" id="inputPassword4" placeholder="" value="" readonly style="background-color: #ffffff;">
                                                </div>
                                                <div class="form-group margin col-md-3">
                                                    <span class="small-text">Requesting Physician</span>
                                                    <input type="text" readonly class="form-control small-input" name="doctor" id="docInputXray" value="" style="background-color: #ffffff;">
                                                </div>
                                                <div class="form-group margin col-md-3 ">
                                                    <span class="small-text">Request Date</span>
                                                    <input type="date" name="render_age" class="form-control small-input" id="requestDateInputXray" value="<?php echo date('Y-m-d'); ?>" readonly style="background-color: #ffffff;">



                                                </div>
                                                <input type="hidden" name="x_name" id="x_name" />

                                                <input type="hidden" id="redirectToXray" name="redirect_toXray" />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 my-1">
                                            <input type="text" readonly name="" value="Contents" class="form-control" style="background-color: #cdcccc;color:black;text-align: center;">
                                        </div>
                                        <div class="card">
                                            <div class="form-group margin col-md-3">
                                                <label for="textarea_id_xray"><strong>X-RAY REPORT : </strong></label>
                                                <textarea name="x_remarks" id="textarea_id_xray" rows="8" cols="130"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn maroon-outline-btn btn-sm ml-1" data-toggle="modal" data-target="#uploadXray">View and Upload Image</button>
                            <button type="button" class="btn btn maroon-outline-btn btn-sm ml-1" id="saveAndPreviewXray">Save and Preview</button>
                            <button type="submit" name="add_xray" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Discard</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- END MODAL -->

            <!-- Start View and Upload image MODAL XRAY -->
            <div class="modal" id="uploadXray" tabindex="-1" role="dialog" aria-labelledby="uploadXrayLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content bg-secondary text-white">
                        <div class="modal-header ">
                            <h5 class="modal-title" id="uploadXrayLabel"></h5>
                            Manage Picture
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="custom-file-xray">
                                <input type="file" class="custom-file-input-xray" name="x_pic" id="customFileXray" onchange="updateFileNameXray()">
                                <label class="custom-file-label" for="customFileXray" id="customFileXrayLabel">Choose file</label>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <!-- <button type="button" class="btn btn-primary" onclick="document.getElementById('customFileXray').click();">
                                Select File -->
                            </button>
                            <button type="button" class="btn btn-primary" onclick="clearFileInputXray();">
                                Clear File
                            </button>
                            <button type="button" class="btn btn-success" data-dismiss="modal">Go</button>
                        </div>


                    </div>
                </div>
            </div>
            <!-- END for View and Upload image MODAL-->

        </form>
        <!-- END XRAY FORM -->



        <!--START Release examination upshot   MODAL -->
        <form method="post" action="his_admin_swu_examination.php">


            <div class="modal" id="releaseExamModal" tabindex="-1" role="dialog" aria-labelledby="releaseExamModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="releaseExamModalLabel"></h5>
                            Release Examination....
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            You are about to mark this examination with information displayed below as "Released." Releasing an Examination would mean that the printout and all related components and/or known attachments (if any) has been handed over to the patient or to his/her authorized representative.
                            <hr>
                            <input type="hidden" name="releaseId" id="releaseId" value="">

                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text exam"><strong>Patient Name</strong></span>
                                </div>
                                <input type="text" readonly class="form-control exam  " id="caseName" value="">
                            </div>
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text exam"><strong>Case Number</strong></span>
                                </div>
                                <input type="text" readonly name="" class="form-control exam  " id="caseNumber" value="">
                            </div>
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text exam"><strong>Case Date</strong></span>
                                </div>
                                <input type="text" readonly name="" class="form-control exam  " id="caseDate" value="">
                            </div>
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text exam"><strong>Exam Description</strong></span>
                                </div>
                                <input type="text" readonly name="" class="form-control exam" id="caseExam" value="">
                            </div>
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text exam"><strong>Release DateTime</strong></span>
                                </div>
                                <input type="text" readonly name="" class="form-control exam" value="<?php echo date('Y-m-d H:i'); ?>">
                            </div>
                            <div class="form-group margin col-md-3 ">
                                <label for="textarea_id"><strong>Remarks : </strong></label>
                                <textarea id="" rows="4" cols="50"></textarea>
                            </div>
                            <hr>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="releaseGo" class="btn btn-primary">Go</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Discard</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Release examination upshot   MODAL-->
        </form>


        <form method="post" action="his_admin_swu_examination.php">

            <!-- Modal -->
            <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this record?
                            <input type="hidden" name="deletedId" id="deletedId" value="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-secondary">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- END MODAL -->


            <div class="row-inpatient">
                <div class="col-lg-9 my-1">
                    <!-- Content for the first column goes here -->



                    <div class="table-responsive table-sm">
                        <table id="ancillaryData" class="table table-borderless table-hover mb-0" data-page-size="6">
                            <thead class="table-danger">
                                <tr>
                                    <th>#</th>
                                    <th data-toggle="true">Transaction No.</th>
                                    <!-- <th data-toggle="true">Transaction Date</th> -->
                                    <th data-toggle="true">Registry Case No.</th>
                                    <th data-hide="phone">Regisrty CaseDate</th>
                                    <th data-hide="phone">Patient Name</th>
                                    <th data-hide="phone">Examination Category</th>
                                    <th data-hide="phone">Requesting Physician</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody data-toggle="true" data-show="4">

                                <?php
                                /*
                                                *get details of allpatients
                                                *
                                            */
                                $ret = "SELECT * FROM  his_ancillary WHERE deleted = 0 ";
                                $stmt = $mysqli->prepare($ret);
                                $stmt->execute(); //ok
                                $res = $stmt->get_result();
                                $cnt = 1;
                                while ($row = $res->fetch_object()) {

                                    $exams = $row->render_exam ? json_decode($row->render_exam)->values : [];
                                    foreach ($exams as $exam) {
                                ?>

                                        <tr class="inpatient_table" data-render_doc_number="<?php echo $row->render_doc_number; ?>" data-exam_type="<?php echo $exam; ?>" data-id="<?php echo $row->render_id; ?>" data-render_name="<?php echo $row->render_name; ?>" data-render_age="<?php echo $row->render_age; ?>" data-render_req_doc="<?php echo $row->render_req_doc ?>" data-render_req_date="<?php echo $row->render_req_date ?>" style="cursor:pointer;">
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $row->render_trans; ?></td>
                                            <td><?php echo $row->render_case; ?></td>
                                            <td><?php echo $row->render_req_date; ?></td>
                                            <td><?php echo $row->render_name; ?></td>
                                            <td><?php echo $exam; ?></td>
                                            <td><?php echo $row->render_req_doc; ?></td>
                                            <!-- <td>
                                            <div class="btn-group">
                                                <a href="#" data-toggle="modal" data-target="#" data-recordid="<?php echo $row->render_id; ?>" data-patientname="<?php echo $row->render_name; ?>" data-patAge="<?php echo $row->render_age; ?>" data-doctor="<?php echo $row->render_req_doc; ?>" class="btn btn-primary btn-xs">Manage</a>
                                                <a href="#" data-toggle="modal" data-target="#" data-recordid="<?php echo $row->render_id; ?>" data-rendername="<?php echo $row->render_name; ?>" data-casenumber="<?php echo $row->render_case; ?>" data-casedate="<?php echo $row->render_req_date; ?>" class="btn btn-success btn-xs">Release</a>
                                                <a href="#" data-toggle="modal" data-target="#" data-recordid="<?php echo $row->render_id; ?>" class="btn btn-danger btn-xs">Delete</a>
                                            </div>
                                        </td> -->
                                        </tr>
                                <?php $cnt = $cnt + 1;
                                    }
                                } ?>
                            </tbody>

                            <tfoot>
                                <tr class="active">
                                    <td colspan="8">
                                        <div class="text-right">
                                            <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div> <!-- end .table-responsive-->
                </div>
                <div class="col-lg-3 my-2 ">
                    <!-- Content for the second column goes here -->

                    <!-- Modal Buttons  -->
                    <div class="d-flex flex-column justify-content-end">
                        <button type="button" class="btn btn maroon-outline-btn-tag btn-xs ml-1">Sub Components⬇️</button>
                        <button type="button" class="btn btn maroon-outline-btn-tags btn-xs ml-1 for_modal_buttons" data-modal_id="examResultModal">Manage Examination</button>
                        <button type="button" class="btn btn maroon-outline-btn-tags btn-xs ml-1 for_modal_buttons" data-modal_id="releaseExamModal">Release Examination</button>
                        <!-- <button type="button" class="btn btn maroon-outline-btn-tags btn-xs ml-1 for_modal_buttons" data-modal_id="">Lock Examination</button>
                        <button type="button" class="btn btn maroon-outline-btn-tags btn-xs ml-1 for_modal_buttons" data-modal_id="">Unlock Examination</button> -->
                        <button type="button" class="btn btn maroon-outline-btn-tags btn-xs ml-1 for_modal_buttons" data-modal_id="deleteConfirmationModal">Delete</button>
                        <!-- <button type="button" class="btn btn maroon-outline-btn-tags btn-xs ml-1 for_modal_buttons" data-modal_id="">Viewing of Result Image</button> -->
                    </div>
                    <!-- end -->

                </div>
            </div>







            <input type="hidden" name="patientNameInput" id="patientNameInput" value="">
            <input type="hidden" name="patientNamerelease" id="patientNamerelease" value="">
            <input type="hidden" name="caseNumber" id="caseNumber" value="">

        </form>

    </div> <!-- end card-box -->
    </div> <!-- end col -->
    </div>
    <!-- end row -->

    </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <?php include('assets/inc/footer.php'); ?>
    <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!--START Save and preview modal  MODAL -->
    <div class="modal for_print" id="MghModal" tabindex="-1" role="dialog" aria-labelledby="MghModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header nonPrintable">
                    <h5 class="modal-title" id="MghModalLabel"></h5>
                    Examination Result Preview
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">
                        <h1>TEST</h1>
                    </div>
                </div>
                <div class="modal-footer nonPrintable">

                    <div class="text-right d-print-none">

                        <a href="his_admin_swu_exam_print.php" type="button" class="btn btn maroon-outline-btn btn-sm ml-1">print</a>
                    </div>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- Footable js -->
    <script src="assets/libs/footable/footable.all.min.js"></script>

    <!-- Init js -->
    <script src="assets/js/pages/foo-tables.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

    <script>
        // $(document).ready(function() {
        //     $('.badge-danger').click(function() {
        //         var recordId = $(this).data('recordid');
        //         console.log("Record ID:", recordId); // Check if the correct ID is printed
        //         $('#deleteRecordId').val(recordId);
        //     });
        // });
    </script>

    <script>
        $(document).ready(function() {
            // Initialize Footable
            $('#ancillaryData').footable();
        });
    </script>

    <script>
        // JavaScript function to filter the table based on the input
        function searchTable() {
            var input = document.getElementById("searchInput").value.toUpperCase();
            var table = document.getElementById("ancillaryData");
            var rows = table.getElementsByTagName("tr");

            for (var i = 0; i < rows.length; i++) {
                var patientNameCell = rows[i].getElementsByTagName("td")[4]; // Use index 4 for the Patient Name column
                if (patientNameCell) {
                    var patientName = patientNameCell.textContent || patientNameCell.innerText;
                    if (patientName.toUpperCase().indexOf(input) > -1) {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }
        }
    </script>

    <script>
        function updateFileName() {
            // Get the selected file name
            var fileName = document.getElementById('customFile').files[0].name;

            // Update the label text with the selected file name
            document.getElementById('customFileLabel').innerText = fileName;
        }

        function clearFileInput() {
            // Clear the file input by resetting its value
            document.getElementById('customFile').value = '';

            // Update the label text to its default
            document.getElementById('customFileLabel').innerText = 'Choose file';
        }
    </script>
    <script>
        function updateFileNameXray() {
            // Get the selected file name
            var fileName = document.getElementById('customFileXray').files[0].name;

            // Update the label text with the selected file name
            document.getElementById('customFileXrayLabel').innerText = fileName;
        }

        function clearFileInputXray() {
            // Clear the file input by resetting its value
            document.getElementById('customFileXray').value = '';

            // Update the label text to its default
            document.getElementById('customFileXrayLabel').innerText = 'Choose file';
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#releaseGo').click(function() {
                var recordId = $(this).data('recordid');
                console.log("Record ID:", recordId); // Check if the correct ID is printed
                $('#deleteRecordId').val(recordId);
            });
        });
    </script>



    <script>
        $(document).ready(function() {
            $('.btn-primary').click(function() {
                var patientName = $(this).data('patientname');
                var patAge = $(this).data('patage');
                var doctor = $(this).data('doctor');
                $('#patientNameInput').val(patientName);
                $('#patientNamerelease').val(patientName);
                $('#ageInput').val(patAge);
                $('#docInput').val(doctor);
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var inputField = document.getElementsByName('wbc')[0];
            var wordDisplay = document.getElementById('wordDisplay');
            var inputRange = document.getElementById('wbc_range');

            inputField.addEventListener('input', function() {
                var inputValue = parseFloat(inputField.value);

                if (!isNaN(inputValue) && inputValue < 5.000) {
                    inputField.style.backgroundImage = 'url("assets/images/down1.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'Low';
                    wordDisplay.style.color = 'green';
                    inputRange.value = 'Low';
                    inputRange.style.color = 'green';
                } else if (!isNaN(inputValue) && inputValue > 17.0000) {
                    inputField.style.backgroundImage = 'url("assets/images/up.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'High';
                    wordDisplay.style.color = 'red';
                    inputRange.value = 'High';
                    inputRange.style.color = 'red';
                } else {
                    inputField.style.backgroundImage = 'none';
                    wordDisplay.textContent = '';
                    inputRange.value = '';
                }
            });
        });


        document.addEventListener('DOMContentLoaded', function() {
            var inputField = document.getElementsByName('seg')[0];
            var wordDisplay = document.getElementById('wordDisplay2');
            var inputRange = document.getElementById('seg_range');

            inputField.addEventListener('input', function() {
                var inputValue = parseFloat(inputField.value);

                if (!isNaN(inputValue) && inputValue < 37.000) {
                    inputField.style.backgroundImage = 'url("assets/images/down1.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'Low';
                    wordDisplay.style.color = 'green';
                    inputRange.value = 'Low';
                    inputRange.style.color = 'green';
                } else if (!isNaN(inputValue) && inputValue > 80.0000) {
                    inputField.style.backgroundImage = 'url("assets/images/up.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'High';
                    wordDisplay.style.color = 'red';
                    inputRange.value = 'High';
                    inputRange.style.color = 'red';
                } else {
                    inputField.style.backgroundImage = 'none';
                    wordDisplay.textContent = '';
                    inputRange.value = '';
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var inputField = document.getElementsByName('lym')[0];
            var wordDisplay = document.getElementById('wordDisplay1');
            var inputRange = document.getElementById('lym_range');

            inputField.addEventListener('input', function() {
                var inputValue = parseFloat(inputField.value);

                if (!isNaN(inputValue) && inputValue < 10.000) {
                    inputField.style.backgroundImage = 'url("assets/images/down1.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'Low';
                    wordDisplay.style.color = 'green';
                    inputRange.value = 'Low';
                    inputRange.style.color = 'green';
                } else if (!isNaN(inputValue) && inputValue > 50.0000) {
                    inputField.style.backgroundImage = 'url("assets/images/up.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'High';
                    wordDisplay.style.color = 'red';
                    inputRange.value = 'High';
                    inputRange.style.color = 'red';
                } else {
                    inputField.style.backgroundImage = 'none';
                    wordDisplay.textContent = '';
                    inputRange.value = '';
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var inputField = document.getElementsByName('mon')[0];
            var wordDisplay = document.getElementById('wordDisplay3');
            var inputRange = document.getElementById('mon_range');

            inputField.addEventListener('input', function() {
                var inputValue = parseFloat(inputField.value);

                if (!isNaN(inputValue) && inputValue < 0.0000) {
                    inputField.style.backgroundImage = 'url("assets/images/down1.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'Low';
                    wordDisplay.style.color = 'green';
                    inputRange.value = 'Low';
                    inputRange.style.color = 'green';
                } else if (!isNaN(inputValue) && inputValue > 12.0000) {
                    inputField.style.backgroundImage = 'url("assets/images/up.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'High';
                    wordDisplay.style.color = 'red';
                    inputRange.value = 'High';
                    inputRange.style.color = 'red';
                } else {
                    inputField.style.backgroundImage = 'none';
                    wordDisplay.textContent = '';
                    inputRange.value = '';
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var inputField = document.getElementsByName('eos')[0];
            var wordDisplay = document.getElementById('wordDisplay4');
            var inputRange = document.getElementById('eos_range');

            inputField.addEventListener('input', function() {
                var inputValue = parseFloat(inputField.value);

                if (!isNaN(inputValue) && inputValue < 0.0000) {
                    inputField.style.backgroundImage = 'url("assets/images/down1.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'Low';
                    wordDisplay.style.color = 'green';
                    inputRange.value = 'Low';
                    inputRange.style.color = 'green';
                } else if (!isNaN(inputValue) && inputValue > 7.0000) {
                    inputField.style.backgroundImage = 'url("assets/images/up.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'High';
                    wordDisplay.style.color = 'red';
                    inputRange.value = 'High';
                    inputRange.style.color = 'red';
                } else {
                    inputField.style.backgroundImage = 'none';
                    wordDisplay.textContent = '';
                    inputRange.value = '';
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var inputField = document.getElementsByName('bas')[0];
            var wordDisplay = document.getElementById('wordDisplay5');
            var inputRange = document.getElementById('bas_range');

            inputField.addEventListener('input', function() {
                var inputValue = parseFloat(inputField.value);

                if (!isNaN(inputValue) && inputValue < 0.0000) {
                    inputField.style.backgroundImage = 'url("assets/images/down1.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'Low';
                    wordDisplay.style.color = 'green';
                    inputRange.value = 'Low';
                    inputRange.style.color = 'green';
                } else if (!isNaN(inputValue) && inputValue > 2.5000) {
                    inputField.style.backgroundImage = 'url("assets/images/up.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'High';
                    wordDisplay.style.color = 'red';
                    inputRange.value = 'High';
                    inputRange.style.color = 'red';
                } else {
                    inputField.style.backgroundImage = 'none';
                    wordDisplay.textContent = '';
                    inputRange.value = '';
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var inputField = document.getElementsByName('rbc')[0];
            var wordDisplay = document.getElementById('wordDisplay6');
            var inputRange = document.getElementById('rbc_range');

            inputField.addEventListener('input', function() {
                var inputValue = parseFloat(inputField.value);

                if (!isNaN(inputValue) && inputValue < 4.000) {
                    inputField.style.backgroundImage = 'url("assets/images/down1.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'Low';
                    wordDisplay.style.color = 'green';
                    inputRange.value = 'Low';
                    inputRange.style.color = 'green';
                } else if (!isNaN(inputValue) && inputValue > 5.4000) {
                    inputField.style.backgroundImage = 'url("assets/images/up.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'High';
                    wordDisplay.style.color = 'red';
                    inputRange.value = 'High';
                    inputRange.style.color = 'red';
                } else {
                    inputField.style.backgroundImage = 'none';
                    wordDisplay.textContent = '';
                    inputRange.value = '';
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var inputField = document.getElementsByName('hgb')[0];
            var wordDisplay = document.getElementById('wordDisplay7');
            var inputRange = document.getElementById('hgb_range');

            inputField.addEventListener('input', function() {
                var inputValue = parseFloat(inputField.value);

                if (!isNaN(inputValue) && inputValue < 12.0000) {
                    inputField.style.backgroundImage = 'url("assets/images/down1.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'Low';
                    wordDisplay.style.color = 'green';
                    inputRange.value = 'Low';
                    inputRange.style.color = 'green';
                } else if (!isNaN(inputValue) && inputValue > 15.0000) {
                    inputField.style.backgroundImage = 'url("assets/images/up.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'High';
                    wordDisplay.style.color = 'red';
                    inputRange.value = 'High';
                    inputRange.style.color = 'red';
                } else {
                    inputField.style.backgroundImage = 'none';
                    wordDisplay.textContent = '';
                    inputRange.value = '';
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var inputField = document.getElementsByName('hct')[0];
            var wordDisplay = document.getElementById('wordDisplay8');
            var inputRange = document.getElementById('hct_range');

            inputField.addEventListener('input', function() {
                var inputValue = parseFloat(inputField.value);

                if (!isNaN(inputValue) && inputValue < 41.9000) {
                    inputField.style.backgroundImage = 'url("assets/images/down1.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'Low';
                    wordDisplay.style.color = 'green';
                    inputRange.value = 'Low';
                    inputRange.style.color = 'green';
                } else if (!isNaN(inputValue) && inputValue > 51.1000) {
                    inputField.style.backgroundImage = 'url("assets/images/up.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'High';
                    wordDisplay.style.color = 'red';
                    inputRange.value = 'High';
                    inputRange.style.color = 'red';
                } else {
                    inputField.style.backgroundImage = 'none';
                    wordDisplay.textContent = '';
                    inputRange.value = '';
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var inputField = document.getElementsByName('mcv')[0];
            var wordDisplay = document.getElementById('wordDisplay9');
            var inputRange = document.getElementById('mcv_range');

            inputField.addEventListener('input', function() {
                var inputValue = parseFloat(inputField.value);

                if (!isNaN(inputValue) && inputValue < 83.0000) {
                    inputField.style.backgroundImage = 'url("assets/images/down1.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'Low';
                    wordDisplay.style.color = 'green';
                    inputRange.value = 'Low';
                    inputRange.style.color = 'green';
                } else if (!isNaN(inputValue) && inputValue > 100.0000) {
                    inputField.style.backgroundImage = 'url("assets/images/up.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'High';
                    wordDisplay.style.color = 'red';
                    inputRange.value = 'High';
                    inputRange.style.color = 'red';
                } else {
                    inputField.style.backgroundImage = 'none';
                    wordDisplay.textContent = '';
                    inputRange.value = '';
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var inputField = document.getElementsByName('mch')[0];
            var wordDisplay = document.getElementById('wordDisplay10');
            var inputRange = document.getElementById('mch_range');

            inputField.addEventListener('input', function() {
                var inputValue = parseFloat(inputField.value);

                if (!isNaN(inputValue) && inputValue < 30.9000) {
                    inputField.style.backgroundImage = 'url("assets/images/down1.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'Low';
                    wordDisplay.style.color = 'green';
                    inputRange.value = 'Low';
                    inputRange.style.color = 'green';
                } else if (!isNaN(inputValue) && inputValue > 35.1000) {
                    inputField.style.backgroundImage = 'url("assets/images/up.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'High';
                    wordDisplay.style.color = 'red';
                    inputRange.value = 'High';
                    inputRange.style.color = 'red';
                } else {
                    inputField.style.backgroundImage = 'none';
                    wordDisplay.textContent = '';
                    inputRange.value = '';
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var inputField = document.getElementsByName('mchc')[0];
            var wordDisplay = document.getElementById('wordDisplay11');
            var inputRange = document.getElementById('mchc_range');

            inputField.addEventListener('input', function() {
                var inputValue = parseFloat(inputField.value);

                if (!isNaN(inputValue) && inputValue < 32.0000) {
                    inputField.style.backgroundImage = 'url("assets/images/down1.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'Low';
                    wordDisplay.style.color = 'green';
                    inputRange.value = 'Low';
                    inputRange.style.color = 'green';
                } else if (!isNaN(inputValue) && inputValue > 36.0000) {
                    inputField.style.backgroundImage = 'url("assets/images/up.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'High';
                    wordDisplay.style.color = 'red';
                    inputRange.value = 'High';
                    inputRange.style.color = 'red';
                } else {
                    inputField.style.backgroundImage = 'none';
                    wordDisplay.textContent = '';
                    inputRange.value = '';
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var inputField = document.getElementsByName('plt')[0];
            var wordDisplay = document.getElementById('wordDisplay12');
            var inputRange = document.getElementById('plt_range');

            inputField.addEventListener('input', function() {
                var inputValue = parseFloat(inputField.value);

                if (!isNaN(inputValue) && inputValue < 150.0000) {
                    inputField.style.backgroundImage = 'url("assets/images/down1.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'Low';
                    wordDisplay.style.color = 'green';
                    inputRange.value = 'Low';
                    inputRange.style.color = 'green';
                } else if (!isNaN(inputValue) && inputValue > 450.0000) {
                    inputField.style.backgroundImage = 'url("assets/images/up.png")';
                    inputField.style.backgroundSize = '12px';
                    inputField.style.backgroundRepeat = 'no-repeat';
                    inputField.style.backgroundPosition = 'right center';

                    wordDisplay.textContent = 'High';
                    wordDisplay.style.color = 'red';
                    inputRange.value = 'High';
                    inputRange.style.color = 'red';
                } else {
                    inputField.style.backgroundImage = 'none';
                    wordDisplay.textContent = '';
                    inputRange.value = '';
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.btn-success').click(function() {
                var renderName = $(this).data('rendername');
                var caseNumber = $(this).data('casenumber');
                var caseDate = $(this).data('casedate');
                $('#patientNamerelease').val(renderName);
                $('#caseNumber').val(caseNumber);
                $('#caseDate').val(caseDate);
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            var render_id = null;
            var render_name = "";
            var render_age = null;
            var render_req_doc = null;
            var render_req_date = null;
            var department_selected = null;
            var to_notify = []
            var exam_type = null;
            var render_doc_number = null;
            var render_exam = null;

            $("#saveAndPreview").click(function() {
                $("#redirectTo").val("for_preview")

                $("#myForm").submit()
            })
            $("#saveAndPreviewXray").click(function() {
                $("#redirectToXray").val("for_preview_xray")

                $("#myFormXray").submit()
            })

            $(".inpatient_table").on("click", function() {
                $(".inpatient_table").removeClass("selected")
                render_id = $(this).data("id");
                render_age = $(this).data("render_age");
                render_name = $(this).data("render_name")
                render_doc = $(this).data("render_req_doc")
                render_date = $(this).data("render_req_date")
                exam_type = $(this).data("exam_type")
                render_exam = $(this).data("exam_type")
                render_doc_number = $(this).data("render_doc_number")
                $(this).addClass("selected")
            })

            $("#print").click(function() {
                $(".nonPrintable").addClass("noPrint");
                window.print();
            })

            $(".for_modal_buttons").click(function() {
                $(".for_modal_buttons").removeClass("selected");
                to_notify = []
                var modalId = $(this).data("modal_id")
                $(".user_dep_row").find("input").prop("checked", false)
                if (render_id == null) {
                    alert("Please select a record first!")
                } else {
                    if (modalId == "examResultModal") {
                        if (exam_type == "X-Ray") {
                            $("#xrayModal").modal("toggle")
                            xray_patient_modal();
                        } else {
                            $("#" + modalId).modal("toggle")
                            exam_patient_modal();
                        }
                    } else {
                        $("#" + modalId).modal("toggle")
                    }
                }

                if (modalId == "releaseExamModal") {
                    releaseExam()
                }

                if (modalId == "deleteConfirmationModal") {
                    deleteExam()
                }


                $(this).addClass("selected");


            })

            function releaseExam() {
                $("#releaseId").val(render_id)
                $("#caseName").val(render_name)
                $("#caseNumber").val(render_doc_number)
                $("#caseDate").val(render_date)
                $("#caseExam").val(render_exam)
            }

            function deleteExam() {
                $("#deletedId").val(render_id)
            }

            function exam_patient_modal() {
                $("#patientNameInput").val(render_name)
                $("#up_name").val(render_name)
                $("#ageInput").val(render_age)
                $("#docInput").val(render_doc)
                $("#requestDateInput").val(render_date)
            }

            function xray_patient_modal() {
                $("#patientNameInputXray").val(render_name)
                $("#x_name").val(render_name)
                $("#ageInputXray").val(render_age)
                $("#docInputXray").val(render_doc)
                $("#requestDateInputXray").val(render_date)
            }


            $("#select_all_tags").change(function() {
                const val = $(this).is(":checked");
                $(".tag_checkbox").prop('checked', val);
            })

            $("#untag_button").click(function() {
                let deleteRecordIds = []
                $(".tag_row").each(function(idx, elem) {
                    console.log($(this).find(".dept").text())
                    const cb = $(this).find("input")
                    if (cb) {
                        if (cb.is(":checked")) {
                            deleteRecordIds.push($(this).prop("id"))
                        }
                    }
                })
                if (deleteRecordIds.length == 0) {
                    alert("No tag selected!")
                } else {


                    $.ajax({
                        url: '/HIS-SWU/backend/billing/his_billing_clear_notif.php',
                        method: 'POST',
                        data: {
                            deleteRecordId: deleteRecordIds,
                        },
                        dataType: 'json',
                        success: function(data) {
                            deleteRecordIds.forEach(id => $("#" + id).remove())
                        }
                    })
                }
            })

            function showMghModal() {
                $("#mgh_table").data("render_id", render_id)
                $.ajax({
                    url: '/HIS-SWU/backend/admin/his_admin_notify.php',
                    method: 'POST',
                    data: {
                        render_id: render_id,
                        cleared: "all",
                    },
                    dataType: "json",
                    success: function(data) {
                        $("#mgh_table tbody").empty()
                        $.each(data, function(index, item) {

                            $("#mgh_table tbody").append(`
                                    <tr class="mgh_row" id="${item.no_id}">
                                        <td>${item.cleared == 1 ? "Cleared" : "Not cleared"}</td>
                                        <td>${item.no_dept}</td>
                                    </tr>
                                `);

                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                    }
                })
            }

            function showUntagMghModal() {
                $("#unclear_mgh").data("render_id", render_id)
                $.ajax({
                    url: '/HIS-SWU/backend/admin/his_admin_notify.php',
                    method: 'POST',
                    data: {
                        render_id: render_id,
                        cleared: 0,
                    },
                    dataType: "json",
                    success: function(data) {
                        $("#unclear_mgh tbody").empty()
                        $.each(data, function(index, item) {

                            $("#unclear_mgh tbody").append(`
                                    <tr class="tag_row" id="${item.no_id}">
                                        <td><input class="tag_checkbox" type="checkbox" ></td>
                                        <td>${item.no_date}</td>
                                        <td class="dept">${item.no_dept}</td>
                                    </tr>
                                `);

                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                    }
                })
            }


            $(".post_charges_checkbox").click(function() {
                $(".post_charges_checkbox").find("input").prop("checked", false)
                $(this).find("input").prop("checked", true)
                department_selected = $(this).find(".text").text()
            })

            // CRUD for inpatient
            $("#viewInpatient").click(function() {
                // Check if any row is selected
                if ($(".inpatient_table.selected").length > 0) {
                    // Get the render_id and render_age of the selected row
                    var render_id = $(".inpatient_table.selected").data("id");
                    var render_age = $(".inpatient_table.selected").data("render_age");

                    // Redirect to the view page with the selected data
                    location.href = `/HIS-SWU/backend/admin/his_admin_view_single_patient.php?render_id=${render_id}&render_age=${render_age}`;
                } else {
                    // Prevent the default action of the click event (disabling the link)
                    return false;
                }
            });

            $("#updateInpatient").click(function() {
                // Check if any row is selected
                if ($(".inpatient_table.selected").length > 0) {
                    // Get the render_id and render_age of the selected row
                    var render_id = $(".inpatient_table.selected").data("id");
                    var render_age = $(".inpatient_table.selected").data("render_age");

                    // Redirect to the update page with the selected data
                    location.href = `/HIS-SWU/backend/admin/his_admin_update_single_outpatient.php?render_id=${render_id}&render_age=${render_age}`;
                }
            });





            // END



            $("#post_charges_select_button").click(function() {
                location.href = `/HIS-SWU/backend/admin/his_admin_render.php?render_id=${render_id}&render_age=${render_age}&department=${department_selected}`
            })


            $(".inpatient_table").on("mouseenter", function() {
                $(this).addClass("active")
            })

            $(".inpatient_table").on("mouseleave", function() {
                $(this).removeClass("active")
            })

            $(".to_tag_checkbox").change(function() {
                var isChecked = $(this).is(":checked")
                var dep_name = $(this).parent().parent().find(".department_name").text()
                if (isChecked) {
                    to_notify.push(dep_name)
                } else {
                    to_notify = to_notify.filter(i => i != dep_name)
                }
                console.log(to_notify)
            })

            $("#notify_button").click(function() {
                var message = "Please tag patient " + render_name + " with the patient ID " + render_age + " as cleared"
                $.ajax({
                    url: '/HIS-SWU/backend/admin/his_admin_notify.php',
                    method: 'POST',
                    data: {
                        render_id: render_id,
                        to_notify: to_notify.join(","),
                        message: message
                    },
                    dataType: 'json',
                    success: function(data) {
                        $("#tagMghModal").modal("toggle")
                        alert(data)
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                    }
                })
            })

            $("#tas_as_mgh").click(function() {
                $.ajax({
                    url: '/HIS-SWU/backend/admin/his_admin_notify.php',
                    method: 'POST',
                    data: {
                        render_id: render_id,
                        tag_as_mgh: true
                    },
                    dataType: 'json',
                    success: function(data) {
                        $("#MghModal").modal("toggle")
                        alert(data)
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                    }
                })
            })

            $("#proceed_discharge").click(function() {
                $.ajax({
                    url: '/HIS-SWU/backend/admin/his_admin_notify.php',
                    method: 'POST',
                    data: {
                        render_id: render_id,
                        discharge: true
                    },
                    dataType: 'json',
                    success: function(data) {
                        $("#dischargeModal").modal("toggle")
                        alert(data)
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                    }
                })
            })









        })
    </script>




</body>

</html>