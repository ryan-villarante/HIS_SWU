<?php
session_start();


include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['ad_id'];
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<?php include('assets/inc/head.php'); ?>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include("assets/inc/nav.php"); ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include('assets/inc/sidebar.php'); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <?php
                // Assuming you have a valid database connection in $mysqli

                // Get the user number of the currently logged-in user (you need to implement this logic)
                $loggedInUserID = $_SESSION['ad_id'];

                // You should execute the prepared statement with a WHERE clause to filter by the unique identifier
                $ret = "SELECT ad_fname,ad_lname FROM his_admin WHERE ad_id = ?";
                $stmt = $mysqli->prepare($ret);
                $stmt->bind_param("s", $loggedInUserID); // Bind the unique identifier parameter
                $stmt->execute();

                // You should fetch the result into a variable
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Assuming you want to fetch the first row
                    $row = $result->fetch_assoc();
                    $render = $row['ad_fname'] . ' ' . $row['ad_lname'] . '  ' . '- Admin'; // Concatenate first name and last name
                } else {
                    $render = "No data found"; // Handle the case where there are no matching rows
                }
                ?>


                <input type="hidden" class="form-control" value="<?php echo $render ?>">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <!-- <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Payrolls</a></li>
                                                <li class="breadcrumb-item active">Generate Payrolls</li>
                                            </ol> -->
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <?php
                    // his_admin_render.php

                    if (true) {

                        $ret = "SELECT * FROM his_discharged WHERE dis_id=?";
                        $stmt = $mysqli->prepare($ret);
                        $stmt->bind_param('i', $id);
                        $stmt->execute();
                        $res = $stmt->get_result();

                        if ($row = $res->fetch_object()) {
                            // Retrieve patient information

                    ?>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <!-- Logo & title -->
                                        <div class="clearfix">

                                            <div class="float-right" style="text-align: right;">
                                                <img src="../admin/assets/images/bill1.png" alt="SWU" style="size: 8px; margin-right:40px; ">
                                                <h4 class="text-center">Villa Aznar, Urgello Sambag II Cebu City </h4>
                                                <h4 class="text-center">Tel. No.(32) 254-7984, 256-0502 to 256-0504</h4>

                                            </div>

                                        </div>
                                        <input type="text" readonly name="" value="Discharge Slip" class="form-control" style="background-color: #6c757d;color:white;text-align: center;">

                                        <div class="row discharge my-2">

                                            <div class="mt-3 float-left" style="    margin-left: 2rem;">
                                                <p class="m-b-10">Patient Name:<strong> &nbsp;<?php echo $row->dis_name ?></strong> <span class="float-right"></span></p>
                                                <p class="m-b-10">Physician:<strong>&nbsp;<?php echo $row->dis_doc ?></strong> <span class="float-right"> </span></p>
                                                <p class="m-b-10">Admission Date <strong>&nbsp;<?php echo $row->dis_time ?></strong> <span class="float-right"><span class="badge badge-success"></span></span></p>
                                                <p class="m-b-10">Discharge Date:<strong>&nbsp; <?php echo date('Y-m-d') ?></strong><span class="float-right"></span></p>
                                                <p class="m-b-10">Disposition :<strong> &nbsp; <?php echo $row->dis_diag ?></strong> <span class="float-right"></span></p>
                                                <!-- <p class="m-b-10">Procedures/Therapies :<strong>&nbsp;<?php echo $row->dis_procedure ?></strong> <span class="float-right"> </span></p> -->
                                                <p class="m-b-10">Admission Result :<strong>&nbsp;<?php echo $row->dis_complication ?></strong> <span class="float-right"><span class="badge badge-success"></span></span></p>
                                                <p class="m-b-10">Initial Impression:<strong>&nbsp;<?php echo $row->dis_consultation ?> </strong> <span class="float-right"></span></p>
                                                <p class="m-b-10">Patient Status:<strong>&nbsp; <?php echo $row->dis_lab ?></strong><span class="float-right"></span></p>
                                                <p class="m-b-10">Discharge Diagnosis:<strong>&nbsp;<?php echo $row->dis_condition ?> </strong> <span class="float-right"></span></p>

                                            </div>
                                        </div><!-- end col -->
                                        <div class="mt-4 mb-1">
                                            <div class="text-right d-print-none">
                                                <!-- <a href="his_admin_inpatient_records.php" class="btn btn-danger waves-effect waves-light"><i class="	fa fa-backward mr-1"></i> Go Back</a> -->
                                                <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                            <?php
                        } else {
                            echo "Patient not found.";
                        }
                    } else {
                        echo "Patient information not provided.";
                    }
                            ?>


                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include("assets/inc/footer.php"); ?>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>