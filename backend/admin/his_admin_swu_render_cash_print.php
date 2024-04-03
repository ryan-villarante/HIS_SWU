<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['ad_id'];
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
                $loggedInUserID = $_SESSION['ad_id'];

                // You should execute the prepared statement with a WHERE clause to filter by the unique identifier
                $ret = "SELECT ad_fname, ad_lname FROM his_admin WHERE  ad_id = ?";
                $stmt = $mysqli->prepare($ret);
                $stmt->bind_param("s", $loggedInUserID); // Bind the unique identifier parameter
                $stmt->execute();

                // You should fetch the result into a variable
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Assuming you want to fetch the first row
                    $row = $result->fetch_assoc();
                    $render = $row['ad_fname'] . ' ' . $row['ad_lname'] . '  '; // Concatenate first name and last name
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
                                        <li class="breadcrumb-item active">Cash Receipt</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->



                    <?php
                    // his_admin_render.php

                    if (isset($_GET['render_id'])) {

                        $render_id = $_GET['render_id'];
                        $ret = "SELECT * FROM his_ancillary WHERE render_id=?";
                        $stmt = $mysqli->prepare($ret);
                        $stmt->bind_param('i', $render_id);
                        $stmt->execute();
                        $res = $stmt->get_result();

                        if ($row = $res->fetch_object()) {
                            // Retrieve patient information
                            $patientName = $row->render_name;
                            $mysqlDateTime = $row->render_req_date;
                            $pat_number = $row->render_doc_number;
                            $pat_age = $row->render_age;
                            $roomPrice = $row->render_room_price;
                            $proFee = $row->render_pro_fee;
                            $itemPrice = $row->render_item_price;
                            $payment = $row->render_payment;
                            // $rendered_by = "System_Admin";
                            // Add more variables for other patient information

                            // Debugging: Output session variable values
                            // echo "Debugging in his_admin_print_render.php:<br>";
                            // echo "pat name: " . $patientName . "<br>";
                            // echo "time: " . $mysqlDateTime . "<br>";

                            // Display patient information within HTML
                    ?>


                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <!-- Logo & title -->
                                        <!-- <div class="clearfix">
                                            <div class="center">
                                                <p style="position: absolute;margin-top:500px;margin-left:120px"><b style="font-size:30px;font-color:#000;"><?php echo $patientName ?></b></p>
                                                <p style="position: absolute;margin-top:389px;margin-left:710px;font-color:#fff;"><b style="font-size:30px;color:#fff;"><?php echo date("d/m/Y"); ?></b></p>
                                                <p style="position: absolute;margin-top:539px;margin-left:190px;font-color:#fff;"><b style="font-size:30px;"><?php echo $mysqlDateTime ?></b></p>
                                                <p style="position: absolute;margin-top:589px;margin-left:180px;font-color:#fff;"><b style="font-size:30px;"><?php echo $render  ?></b></p>
                                                <p style="position: absolute;margin-top:735px;margin-left:60px;font-color:#fff;"><b style="font-size:30px;">Room <span style="margin-left:650px;">₱ <?php echo $roomPrice ?> .00</span></b></p>
                                                <p style="position: absolute;margin-top:770px;margin-left:60px;font-color:#fff;"><b style="font-size:30px;">Professional Fee <span style="margin-left:520px;position:absolute;">₱<?php echo $proFee ?>.00</span></b></p>
                                                <p style="position: absolute;margin-top:810px;margin-left:60px;font-color:#fff;"><b style="font-size:30px;">Items and Services</b></p>
                                                <p style="position: absolute;margin-top:810px;margin-left:810px;font-color:#fff;"><b style="font-size:30px;"><?php echo $itemPrice  ?></b></p>
                                                <p style="position: absolute;margin-top:1220px;margin-left:800px;font-color:#fff;"><b style="font-size:30px;"><?php echo $payment ?></b></p>
                                                <img src="../billing/assets/images/printbill1.jpg" alt="bills" style="width: 1000px;height:1250px;margin-top:40px;">

                                            </div>

                                        </div> -->
                                        <div class="clearfix">
                                            <div class="float-middle" style="text-align: center;">
                                                <!-- <h2 class="text-center">Sacred Heart Hospital</h4> -->
                                                <!-- <img src="../admin/assets/images/bill.png" alt="bills"> -->
                                                <img src="../admin/assets/images/bill1.png" alt="SWU" style="size: 10px; margin-right:40px; ">
                                                <h4 class="text-center">Villa Aznar, Urgello Sambag II Cebu City </h4>
                                                <h4 class="text-center">Tel. No.(32) 254-7984, 256-0502 to 256-0504</h4>

                                            </div>

                                        </div>

                                        <div class="form-group col-md-12 my-4">
                                        <input type="text" readonly name="" value="Patient Details" class="form-control lab" style="background-color: #800;color:white;text-align: center;border:none;font-weight: bold;">
                                            <table id="" class="table table-borderless table-hover mb-0" data-page-size="6">

                                                <thead class="table-danger" style="background-color: #800; color:white">
                                                    <tr>

                                                        <!-- <th data-toggle="true">Patient Details</th> -->
                                                    </tr>
                                                </thead>
                                                <table>

                                                    <!-- </table> <input type="text" readonly name="" value="Invoice No.:" class="form-control" style="background-color: #800;color:white;text-align: left;"> -->
                                        </div>

                                        <div class="row my-2">
                                            <div class="col-sm-6">
                                                <div class="float-left" style="font-size: 15px;">
                                                    <p><strong>Patient Name :</strong>&nbsp; <u><?php echo $patientName ?> </u> <span class="float-right"></span></p>
                                                    <p><strong>Patient Type :</strong>&nbsp; <u><?php echo $row->render_pat_type ?> </u> <span class="float-right"></span></p>
                                                    <p><strong>Age :</strong>&nbsp; <u><?php echo $row->render_age ?> Years old </u> <span class="float-right"></span></p>
                                                    <p><strong>Room Number :</strong>&nbsp; <u><?php echo $row->render_room_number ?> </u> <span class="float-right"></span></p>
                                                    <p><strong>Requesting Physician :</strong>&nbsp; <u><?php echo $row->render_req_doc ?> </u> <span class="float-right"></span></p>
                                                </div>

                                            </div>

                                            <div class="table-responsive ">
                                                <table id="ancillaryData" class="table table-bordered table-hover mb-0" data-page-size="6">
                                                    <thead style="text-align: center;">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Description</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody data-toggle="true" data-show="4">
                                                        <td><strong>1</strong></td>
                                                        <td><strong>Room</strong></td>
                                                        <td><strong>₱ <?php echo $roomPrice ?>.00</strong></td>
                                                    </tbody>
                                                    <tbody data-toggle="true" data-show="4">
                                                        <td><strong>2</strong></td>
                                                        <td><strong>Professional Fee</strong></td>
                                                        <td><strong>₱ <?php echo $proFee ?>.00</strong></td>
                                                    </tbody>
                                                    <tbody data-toggle="true" data-show="4">
                                                        <td><strong>3</strong></td>
                                                        <td><strong>Items/Services</strong></td>
                                                        <td><strong><?php echo $itemPrice ?></strong></td>
                                                    </tbody>
                                                    <tbody data-toggle="true" data-show="4">
                                                        <td style="text-align: right;" colspan="2"><strong>TOTAL:</strong></td>
                                                        <td><strong><?php echo $payment ?></strong></td>
                                                    </tbody>
                                                </table>
                                            </div> <!-- end .table-responsive-->
                                            <div class="col-sm-12 text-right">
                                                <p><strong>Rendered By:</strong>&nbsp; <u> <?php echo $render  ?> </u> <span class="float-right"></span></p>
                                                <p><strong>Rendered Date:</strong>&nbsp; <u> <?php echo date("d/m/Y"); ?> </u> <span class="float-right"></span></p>
                                            </div>
                                        </div>

                                        <div class="mt-4 mb-1">
                                            <div class="text-right d-print-none">

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