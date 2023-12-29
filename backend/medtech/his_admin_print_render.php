<?php
session_start();


include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['user_id'];
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

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <!-- Logo & title -->
                                <div class="clearfix">
                                    <div class="float-left">
                                        <img src="assets/images/swu.jpg" alt="" height="50">
                                    </div>
                                    <div class="float-right">
                                        <h2 class="text-center">Sacred Heart Hospital</h4>
                                            <h4 class="text-center">Villa Aznar, Urgello Sambag II Cebu City </h4>
                                            <h4 class="text-center">Tel. No.(32) 254-7984, 256-0502 to 256-0504</h4>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mt-3">
                                            <p><b></b></p>
                                            <p class="text-muted"></p>
                                        </div>

                                    </div><!-- end col -->


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



                                    <?php
                                    // his_admin_render.php

                                    if (isset($_GET['pat_id'])) {
                                        $pat_id = $_GET['pat_id'];
                                        $ret = "SELECT * FROM his_patients WHERE pat_id=?";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->bind_param('i', $pat_id);
                                        $stmt->execute();
                                        $res = $stmt->get_result();

                                        if ($row = $res->fetch_object()) {
                                            // Retrieve patient information
                                            $patientName = $row->pat_fname . " " . $row->pat_lname;
                                            $age =  $row->pat_age;
                                            $room = $row->pat_room;
                                            $doctor = $row->pat_doc;
                                            $bday = $row->pat_dob;
                                            $mysqlDateTime = $row->pat_date_joined;
                                            // $rendered_by = "System_Admin";
                                            // Add more variables for other patient information

                                            // Debugging: Output session variable values
                                            // echo "Debugging in his_admin_print_render.php:<br>";
                                            // echo "pat name: " . $patientName . "<br>";
                                            // echo "age: " . $age  . "<br>";
                                            // echo "room: " . $room  . "<br>";
                                            // echo "doc: " .  $doctor . "<br>";
                                            // echo "birthday: " . $bday . "<br>";
                                            // echo "time: " . $mysqlDateTime . "<br>";

                                            // Display patient information within HTML
                                    ?>




                                            <div class="col-md-4 offset-md-2">
                                                <div class="mt-3 float-right">
                                                    <p class="m-b-10"><strong>Age: &nbsp;<?php echo $age; ?> </strong> <span class="float-right"></span></p>
                                                    <p class="m-b-10"><strong>Document No. 1</strong> <span class="float-right"> </span></p>
                                                    <p class="m-b-10"><strong>Ref. Date :&nbsp;<?php echo date("d/m/Y - h:m", strtotime($mysqlDateTime)); ?></strong> <span class="float-right"><span class="badge badge-success"></span></span></p>
                                                    <p class="m-b-10"><strong>Bday: <?php echo $bday ?> </strong> <span class="float-right"></span></p>
                                                    <!-- <p class="m-b-10"><strong>Civil Status: </strong> <span class="float-right"></span></p> -->
                                                    <p class="m-b-10"><strong>Series No.: </strong> <span class="float-right"></span></p>

                                                </div>
                                                <div class="col-md-4 offset-md-2">
                                                    <div class="mt-3 float-right">
                                                        <p class="m-b-10"><strong>Payer Name:&nbsp;<?php echo $patientName ?> </strong> <span class="float-right"> </span></p>
                                                        <p class="m-b-10"><strong>Admission No.: </strong> <span class="float-right"><span class="badge badge-success"></span></span></p>
                                                        <p class="m-b-10"><strong>Hospital No. : </strong> <span class="float-right"></span></p>
                                                        <!-- <p class="m-b-10"><strong>Chief Complaint : </strong> <span class="float-right"></span></p> -->
                                                        <p class="m-b-10"><strong>Physicians :&nbsp;<?php echo $doctor ?> </strong> <span class="float-right"></span></p>

                                                    </div>

                                                </div>
                                            </div><!-- end col -->
                                </div>
                                <!-- end row -->


                                <!-- end row -->

                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="printSelectedItems" class="table mt-4 table-centered table-bordered table-sm">

                                                <thead>
                                                    <tr>
                                                        <th class="table-primary">#</th>
                                                        <th class="table-primary" data-hide="phone">Item ID</th>
                                                        <th class="table-primary" data-hide="phone">Item Description</th>
                                                        <th class="table-primary" data-hide="phone">QTY </th>
                                                        <th class="table-primary" data-hide="phone">Price</th>
                                                        <th class="table-primary" data-hide="phone">Discount</th>
                                                        <th class="table-primary" data-hide="phone">Amount</th>

                                                    </tr>
                                                </thead>

                                                <tbody>

                                                </tbody>

                                            </table>
                                        </div>
                                <?php
                                        } else {
                                            echo "Patient not found.";
                                        }
                                    } else {
                                        echo "Patient information not provided.";
                                    }
                                ?>

                                    </div>
                                </div>

                                <div class="row">
                                    <?php
                                    // Check if the netAmount session variable exists
                                    if (isset($_SESSION['netAmount'])) {
                                        $netAmount = $_SESSION['netAmount'];

                                        // Display the net amount
                                        echo '<div class="col-sm-6">
                                            <div class="float-right">
                                                <p><b>Grand Total: ₱ ' . number_format($netAmount, 2) . '</b> <span class="float-right"></span></p>
                                            </div>';
                                    } else {
                                        // Handle the case where the netAmount session variable is not set
                                        echo 'Net Amount not available.';
                                    }



                                    ?>





                                </div>
                                <div class="col-sm-6">
                                    <div class="float-right">
                                        <p><b>Rendered By:&nbsp;<?php echo $render ?></b> <span class="float-right"></span></p>
                                        <p><b>Rendered Date:&nbsp;<?php echo date("d/m/Y - h:m", strtotime($mysqlDateTime)); ?></b> <span class="float-right"></span></p>
                                    </div>

                                </div>
                            </div>



                            <!-- end row -->

                            <div class="mt-4 mb-1">
                                <div class="text-right d-print-none">
                                    <!-- <a href="his_admin_render.php?pat_id&&pat_number=" class="btn btn-secondary waves-effect waves-light"><i class="	fa fa-backward mr-1"></i> Back</a> -->
                                    <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
                                </div>
                            </div>
                        </div> <!-- end card-box -->
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