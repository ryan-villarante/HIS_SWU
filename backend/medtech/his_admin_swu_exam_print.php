<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['user_id'];
$id = $_GET['id'];
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

        <div class="content-page">
            <div class="content">



                <?php
                // Assuming you have a valid database connection in $mysqli

                // Get the user number of the currently logged-in user (you need to implement this logic)
                $loggedInUserID = $_SESSION['user_id'];

                // You should execute the prepared statement with a WHERE clause to filter by the unique identifier
                $ret = "SELECT user_fname, user_lname FROM his_user WHERE user_dept = 'Medtech' AND user_id = ?";
                $stmt = $mysqli->prepare($ret);
                $stmt->bind_param("s", $loggedInUserID); // Bind the unique identifier parameter
                $stmt->execute();

                // You should fetch the result into a variable
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Assuming you want to fetch the first row
                    $row = $result->fetch_assoc();
                    $render = $row['user_fname'] . ' ' . $row['user_lname'] . '  ' . '- Medtech'; // Concatenate first name and last name
                } else {
                    $render = "No data found"; // Handle the case where there are no matching rows
                }
                ?>


                <input type="hidden" class="form-control" value="<?php echo $render ?>">
                <!-- ENDDDDDDD -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Transactions</a></li>
                                        <li class="breadcrumb-item active">Examination</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->



                    <?php
                    // his_admin_render.php

                    if (true) {

                        $ret = "SELECT * FROM his_cbc WHERE up_id=?";
                        $stmt = $mysqli->prepare($ret);
                        $stmt->bind_param('i', $id);
                        $stmt->execute();
                        $res = $stmt->get_result();

                        if ($row = $res->fetch_object()) {
                            // Retrieve patient information
                            $patientName = $row->up_name;
                    ?>


                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <!-- Logo & title -->
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <img src="../admin/assets/images/bill.png" alt="bills">

                                            </div>
                                            <div class="float-right">
                                                <h2 class="text-center">Sacred Heart Hospital</h4>
                                                    <h4 class="text-center">Villa Aznar, Urgello Sambag II Cebu City </h4>
                                                    <h4 class="text-center">Tel. No.(32) 254-7984, 256-0502 to 256-0504</h4>

                                            </div>

                                        </div>



                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="float-left" style="font-size: medium;">
                                                    <p><strong>Patient Name :</strong>&nbsp; <u><?php echo $patientName ?> </u> <span class="float-right"></span></p>
                                                    <p><strong>Rendered By:</strong>&nbsp; <u> <?php echo $render  ?> </u> <span class="float-right"></span></p>
                                                    <p><strong>Rendered Date:</strong>&nbsp; <u> <?php echo date("d/m/Y"); ?> </u> <span class="float-right"></span></p>
                                                </div>

                                            </div>

                                            <div class="form-group col-md-12 my-2">
                                                <input type="text" readonly name="" value="Laboratory Results" class="form-control lab" style="background-color: none;color:gray;text-align: center;border:none;font-weight: bold;">
                                                <div class="input-group mb-0 my-0">

                                                    <input type="text" name="cash_payer" class="form-control ref  " readonly id="inputlg" value="Complete Blood Count Differential" style="font-weight: bold;">
                                                    <input type="text" readonly name="cash_payer" class="form-control refs" id="inputlg" style="font-weight: bold;" value="              Reference Range:">
                                                </div>

                                                <div class="input-group mb-2 my-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text exam"><strong>WBC:</strong></span>
                                                    </div>
                                                    <input type="text" readonly name="wbc" class="form-control exam   " id="inputlg" value="<?php echo $row->wbc ?>" style="font-weight: bold;">
                                                    <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                5.000 - 17.0000^3/mm^3">
                                                </div>
                                                <div class="input-group mb-2 ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text exam"><strong>SEG:</strong></span>
                                                    </div>
                                                    <input type="text" readonly name="seg" class="form-control exam  " id="inputlg" value="<?php echo $row->seg ?>">
                                                    <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                37.0000 - 80.0000 %">
                                                </div>
                                                <div class="input-group mb-2 ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text exam"><strong>LYM:</strong></span>
                                                    </div>
                                                    <input type="text" readonly name="lym" class="form-control exam   " id="hosBill" value="<?php echo $row->lym ?>">
                                                    <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                10.000 - 50.0000 %">
                                                </div>
                                                <div class="input-group mb-2 ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text exam"><strong>MON:</strong></span>
                                                    </div>
                                                    <input type="text" readonly name="mon" class="form-control exam " id="inputlg" value="<?php echo $row->mon ?>">
                                                    <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                0.0000 - 12.0000 %">
                                                </div>
                                                <div class="input-group mb-2 ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text exam"><strong>EOS:</strong></span>
                                                    </div>
                                                    <input type="text" readonly name="eos" class="form-control exam  " id="inputlg" value="<?php echo $row->eos ?>">
                                                    <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                0.0000 - 7.0000 %">
                                                </div>
                                                <div class="input-group mb-2 ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text exam"><strong>BAS:</strong></span>
                                                    </div>
                                                    <input type="text" readonly name="bas" class="form-control exam   " id="hosBill" value="<?php echo $row->bas ?>">
                                                    <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                0.0000 - 2.5000 %">
                                                </div>
                                                <div class="input-group mb-2 ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text exam"><strong>RBC:</strong></span>
                                                    </div>
                                                    <input type="text" readonly name="rbc" class="form-control exam " id="inputlg" value="<?php echo $row->rbc ?>">
                                                    <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                4.0000 - 5.4000 10/mm^3">
                                                </div>
                                                <div class="input-group mb-2 ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text exam"><strong>HGB:</strong></span>
                                                    </div>
                                                    <input type="text" readonly name="hgb" class="form-control exam  " id="inputlg" value="<?php echo $row->hgb ?>">
                                                    <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                12.0000 - 15.0000 g/dl">
                                                </div>
                                                <div class="input-group mb-2 ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text exam"><strong>HCT:</strong></span>
                                                    </div>
                                                    <input type="text" readonly name="hct" class="form-control exam   " id="hosBill" value="<?php echo $row->hct ?>">
                                                    <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                41.9000 - 51.1000 %">
                                                </div>
                                                <div class="input-group mb-2 ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text exam"><strong>MCV:</strong></span>
                                                    </div>
                                                    <input type="text" readonly name="mcv" class="form-control exam " id="inputlg" value="<?php echo $row->mcv ?>">
                                                    <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                83.0000 - 100.0000 µm^3">
                                                </div>
                                                <div class="input-group mb-2 ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text exam"><strong>MCH:</strong></span>
                                                    </div>
                                                    <input type="text" readonly name="mch" class="form-control exam " id="inputlg" value="<?php echo $row->mch ?>">
                                                    <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                30.9000 - 35.1000 pg">
                                                </div>
                                                <div class="input-group mb-2 ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text exam"><strong>MCHC:</strong></span>
                                                    </div>
                                                    <input type="text" readonlyname="mchc" class="form-control exam " id="inputlg" value="<?php echo $row->mchc ?>">
                                                    <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                32.0000 - 36.0000 g/dl">
                                                </div>
                                                <div class="input-group mb-2 ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text exam"><strong>PLT:</strong></span>
                                                    </div>
                                                    <input type="text" readonly name="plt" class="form-control exam " id="inputlg" value="<?php echo $row->plt ?>">
                                                    <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                150.0000 - 450.0000 10^3/mm^3">
                                                </div>
                                                <div class="form-group margin col-md-3 ">
                                                    <label for="textarea_id"><strong>Remarks : </strong></label>
                                                    <textarea name="remarks" value="" readonly id="textarea_id" rows="4" cols="50"><?php echo $row->remarks ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="mt-4 mb-1">
                                        <div class="text-right d-print-none">
                                            <a href="his_doc_exam.php" class="btn btn-danger "> Cancel</a>

                                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
                                        </div>
                                    </div>

                            <?php
                        } else {
                            echo "Patient not found.";
                        }
                    } else {
                        echo "Patient information not provided.";
                    }
                            ?>



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

</body>

</html>