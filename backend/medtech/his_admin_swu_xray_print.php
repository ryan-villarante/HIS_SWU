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
                                        <li class="breadcrumb-item active">Preview</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->



                    <?php
                    // his_admin_render.php

                    if (true) {

                        $ret = "SELECT * FROM his_xray WHERE x_id=?";
                        $stmt = $mysqli->prepare($ret);
                        $stmt->bind_param('i', $id);
                        $stmt->execute();
                        $res = $stmt->get_result();

                        if ($row = $res->fetch_object()) {
                            // Retrieve patient information
                            $patientName = $row->x_name;
                            $remarkForXray = $row->x_remarks;
                            // Add more variables for other patient information

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
                                                    <p><strong>X-RAY Report :</strong>&nbsp; <u> <?php echo $remarkForXray ?> </u><span class="float-right"></span></p>
                                                    <p><strong>Rendered By:</strong>&nbsp; <u> <?php echo $render  ?> </u> <span class="float-right"></span></p>
                                                    <p><strong>Rendered Date:</strong>&nbsp; <u> <?php echo date("d/m/Y"); ?> </u> <span class="float-right"></span></p>
                                                </div>

                                            </div>

                                            <div class="col-12">
                                                <div class="col-6 my-3">
                                                    <div class="float-left my-3" style="font-size: medium;">
                                                        <p><strong>Xray Image :</strong>&nbsp; <u></u> <span class="float-right"></span></p>

                                                    </div>
                                                </div>
                                                <div class="card-box image-container">
                                                    <img src="../admin/assets/images/xray/<?php echo $row->x_pic; ?>" alt="dpic" class=" large-image" width="600" height="600">
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