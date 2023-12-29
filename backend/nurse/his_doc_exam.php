<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteRecordId'])) {
    $id = intval($_POST['deleteRecordId']);
    $adn = "DELETE FROM his_ancillary WHERE render_id=?";
    $stmt = $mysqli->prepare($adn);
    if (!$stmt) {
        die("Error in preparing the delete statement: " . $mysqli->error);
    }
    $stmt->bind_param('i', $id);
    if (!$stmt->execute()) {
        die("Error executing the delete statement: " . $stmt->error);
    }
    $stmt->close();

    if ($stmt) {
        $success = "Record successfully deleted";
        // You can optionally redirect here or update the UI as needed
        // echo "Deletion successful<br>"; // Debug: Check if deletion was successful
    } else {
        $err = "Try Again Later";
    }
}

?>

<?php
if (isset($_POST['add_cbc'])) {
    // $render_code = $_POST['render_code'];
    $up_name = $_POST['up_name'];
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
    $remarks = $_POST['remarks'];

    $query = "INSERT INTO his_cbc (up_name,wbc,seg, lym,mon,eos,bas,rbc,hgb,hct,mcv,mch,mchc,plt,remarks)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param(
        'sssssssssssssss',
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




    );

    $stmt->execute();

    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Success";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('assets/inc/head.php'); ?>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include('assets/inc/nav.php'); ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include("assets/inc/sidebar.php"); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <form method="post" action="his_doc_exam.php" id="myForm">

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


                                    <?php
                                    // his_admin_render.php

                                    if (isset($_POST['pat_id'])) {
                                        $render_id = $_POST['pat_id'];

                                        $ret = "SELECT * FROM his_patients WHERE pat_id=?";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->bind_param('i', $pat_id);
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
                                        <div class="modal fade" id="myModal" role="dialog">
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
                                                                    <input type="text" readonly name="" value="Header" class="form-control" style="background-color: #0c4c61;color:white;text-align: center;">
                                                                </div>
                                                                <div class="col-12 ">
                                                                    <div class="card">
                                                                        <div class="card-body" style="padding:0rem;">
                                                                            <div class="form-row" style="margin-left: -2px;margin: right -2px;">
                                                                                <div class="form-group margin col-md-3">
                                                                                    <span class="small-text">Patient Name</span>
                                                                                    <input type="text" readonly name="up_name" class="form-control small-input" id="patientNameInput" value="" style="background-color: #e0f7ff;">
                                                                                </div>
                                                                                <div class="form-group margin col-md-3" style="display: none;">
                                                                                    <span class="small-text">Room No.</span>
                                                                                    <input type="text" readonly name="" class="form-control small-input" id="inputlg" value="">

                                                                                </div>
                                                                                <div class="form-group margin col-md-3">
                                                                                    <span class="small-text">Age</span>
                                                                                    <input type="text" required="required" name="patient_age" class="form-control small-input" id="ageInput" placeholder="" value="" readonly style="background-color: #e0f7ff;">
                                                                                </div>
                                                                                <div class="form-group margin col-md-3 " style="display: none;">
                                                                                    <span class="small-text">Gender</span>
                                                                                    <input type="text" required="required" name="render_age" class="form-control small-input" id="inputPassword4" placeholder="" value="" readonly style="background-color: #e0f7ff;">
                                                                                </div>
                                                                                <div class="form-group margin col-md-3">
                                                                                    <span class="small-text">Requesting Physician</span>
                                                                                    <input type="text" readonly class="form-control small-input" name="doctor" id="docInput" value="" style="background-color: #e0f7ff;">
                                                                                </div>
                                                                                <div class="form-group margin col-md-3 ">
                                                                                    <span class="small-text">Request Date</span>
                                                                                    <input type="date" name="render_age" class="form-control small-input" id="inputPassword4" value="<?php echo date('Y-m-d'); ?>" readonly style="background-color: #e0f7ff;">

                                                                                </div>

                                                                            </div>

                                                                            <div class="form-row">



                                                                                <div class="form-group margin col-md-3" style="display: none;">
                                                                                    <span class="small-text">Birth Date</span>
                                                                                    <input type="date" name="" class="form-control small-input" id="inputPassword4" placeholder="" value=">" readonly>
                                                                                </div>

                                                                                <div class="form-group margin col-md-3" style="display: none;">
                                                                                    <span class="small-text">Release Date/Time</span>
                                                                                    <input type="text" readonly class="form-control small-input" id="inputlg" value="">
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                        <div class="row">

                                                                            <div class="form-group col-md-12 my-2">
                                                                                <input type="text" readonly name="" value="Contents" class="form-control" style="background-color: #0c4c61;color:white;text-align: center;">

                                                                                <input type="text" readonly name="" value="Laboratory Results" class="form-control lab" style="background-color: none;color:gray;text-align: center;border:none;font-weight: bold;">
                                                                            </div>

                                                                            <div class="input-group mb-0 my-0">

                                                                                <input type="text" required="required" name="cash_payer" class="form-control ref  " readonly id="inputlg" value="Complete Blood Count Differential" style="font-weight: bold;">
                                                                                <input type="text" readonly name="cash_payer" class="form-control refs" id="inputlg" style="font-weight: bold;" value="              Reference Range:">
                                                                            </div>

                                                                            <div class="input-group mb-2 my-2">
                                                                                <div class="input-group-prepend ">
                                                                                    <span class="input-group-text exam"><strong>WBC:</strong></span>
                                                                                </div>
                                                                                <input type="text" required="required" name="wbc" class="form-control exam   " id="inputlg" value="" style="font-weight: bold;">
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                5.000 - 17.0000^3/mm^3">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>SEG:</strong></span>
                                                                                </div>
                                                                                <input type="text" required="required" name="seg" class="form-control exam  " id="inputlg" value="">
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                37.0000 - 80.0000 %">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>LYM:</strong></span>
                                                                                </div>
                                                                                <input type="text" required="required" name="lym" class="form-control exam   " id="hosBill" value="">
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                10.000 - 50.0000 %">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>MON:</strong></span>
                                                                                </div>
                                                                                <input type="text" required="required" name="mon" class="form-control exam " id="inputlg" value="">
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                0.0000 - 12.0000 %">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>EOS:</strong></span>
                                                                                </div>
                                                                                <input type="text" required="required" name="eos" class="form-control exam  " id="inputlg" value="">
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                0.0000 - 7.0000 %">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>BAS:</strong></span>
                                                                                </div>
                                                                                <input type="text" required="required" name="bas" class="form-control exam   " id="hosBill" value="">
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                0.0000 - 2.5000 %">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>RBC:</strong></span>
                                                                                </div>
                                                                                <input type="text" required="required" name="rbc" class="form-control exam " id="inputlg" value="">
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                4.0000 - 5.4000 10/mm^3">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>HGB:</strong></span>
                                                                                </div>
                                                                                <input type="text" required="required" name="hgb" class="form-control exam  " id="inputlg" value="">
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                12.0000 - 15.0000 g/dl">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>HCT:</strong></span>
                                                                                </div>
                                                                                <input type="text" required="required" name="hct" class="form-control exam   " id="hosBill" value="">
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                41.9000 - 51.1000 %">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>MCV:</strong></span>
                                                                                </div>
                                                                                <input type="text" required="required" name="mcv" class="form-control exam " id="inputlg" value="">
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                83.0000 - 100.0000 µm^3">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>MCH:</strong></span>
                                                                                </div>
                                                                                <input type="text" required="required" name="mch" class="form-control exam " id="inputlg" value="">
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                30.9000 - 35.1000 pg">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>MCHC:</strong></span>
                                                                                </div>
                                                                                <input type="text" required="required" name="mchc" class="form-control exam " id="inputlg" value="">
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                32.0000 - 36.0000 g/dl">
                                                                            </div>
                                                                            <div class="input-group mb-2 ">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text exam"><strong>PLT:</strong></span>
                                                                                </div>
                                                                                <input type="text" required="required" name="plt" class="form-control exam " id="inputlg" value="">
                                                                                <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                150.0000 - 450.0000 10^3/mm^3">
                                                                            </div>
                                                                            <div class="form-group margin col-md-3 ">
                                                                                <label for="textarea_id"><strong>Remarks : </strong></label>
                                                                                <textarea name="remarks" id="textarea_id" rows="4" cols="50"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="add_cbc" class="btn btn-primary">Save changes</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

        </form>

        <script>
            $(document).ready(function() {
                $(".maroon-outline-btn").click(function() {
                    $(this).toggleClass("active");
                });
            });
        </script>


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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- END MODAL -->


            <div class="table-responsive">
                <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                    <thead class="table-primary" style="background-color: #b1e3f4;">
                        <tr>
                            <th>#</th>
                            <th data-toggle="true">Transaction No.</th>
                            <!-- <th data-toggle="true">Transaction Date</th> -->
                            <th data-toggle="true">Registry Case No.</th>
                            <th data-hide="phone">Regisrty CaseDate</th>
                            <th data-hide="phone">Patient Name</th>
                            <!-- <th data-hide="phone">Examination Category</th> -->
                            <th data-hide="phone">Requesting Physician</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    /*
                                                *get details of allpatients
                                                *
                                            */
                    $ret = "SELECT * FROM  his_ancillary ";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->execute(); //ok
                    $res = $stmt->get_result();
                    $cnt = 1;
                    while ($row = $res->fetch_object()) {
                    ?>

                        <tbody>
                            <tr>
                                <td><?php echo $cnt; ?></td>
                                <td><?php echo $row->render_trans; ?></td>
                                <td><?php echo $row->render_case; ?></td>
                                <td><?php echo $row->render_req_date; ?></td>
                                <td><?php echo $row->render_name; ?></td>
                                <td><?php echo $row->render_req_doc; ?></td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" style="background-color: #0c4c61;" data-toggle="modal" data-target="#myModal" data-recordid="<?php echo $row->render_id; ?>" data-patientname="<?php echo $row->render_name; ?>" data-patAge="<?php echo $row->render_age; ?>" data-doctor="<?php echo $row->render_req_doc; ?>">Manage</button>

                                    <!-- <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteConfirmationModal" data-recordid="<?php echo $row->render_id; ?>">
                                                                <i class="mdi mdi-trash-can-outline"></i> Delete -->
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    <?php $cnt = $cnt + 1;
                    } ?>
                    <!-- <tfoot>
                                            <tr class="active">
                                                <td colspan="8">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tfoot> -->
                </table>
            </div> <!-- end .table-responsive-->


            <input type="hidden" name="deleteRecordId" id="deleteRecordId" value="">
            <input type="hidden" name="patientNameInput" id="patientNameInput" value="">



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
        $(document).ready(function() {
            $('.badge-danger').click(function() {
                var recordId = $(this).data('recordid');
                console.log("Record ID:", recordId); // Check if the correct ID is printed
                $('#deleteRecordId').val(recordId);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.btn-success').click(function() {
                var recordId = $(this).data('recordid');
                console.log("Record ID:", recordId); // Check if the correct ID is printed
                $('#deleteRecordId').val(recordId);
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.btn-success').click(function() {
                var patientName = $(this).data('patientname');
                var patAge = $(this).data('patage');
                var doctor = $(this).data('doctor');
                $('#patientNameInput').val(patientName);
                $('#ageInput').val(patAge);
                $('#docInput').val(doctor);
            });
        });
    </script>



</body>

</html>