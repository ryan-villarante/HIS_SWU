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

                    if (true) {

                        $ret = "SELECT * FROM his_sgpt WHERE up_id=?";
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
                                            <div class="float-center" style="text-align: center;">
                                                <!-- <h2 class="text-center">Sacred Heart Hospital</h4> -->
                                                <!-- <img src="../admin/assets/images/bill.png" alt="bills"> -->
                                                <img src="../admin/assets/images/bill1.png" alt="SWU" style="size: 10px; ">
                                                <h4 class="text-center">Villa Aznar, Urgello Sambag II Cebu City </h4>
                                                <h4 class="text-center">Tel. No.(32) 254-7984, 256-0502 to 256-0504</h4>

                                            </div>

                                        </div>



                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="float-left" style="font-size: medium;">
                                                    <p><strong>Patient Name :</strong>&nbsp; <u><?php echo $patientName ?> </u> <span class="float-right"></span></p>
                                                    <p><strong>Rendered Date:</strong>&nbsp; <u> <?php echo date("d/m/Y"); ?> </u> <span class="float-right"></span></p>
                                                </div>

                                            </div>
                                            <input type="text" readonly name="" value="Laboratory Results" class="form-control lab" style="background-color: #800;color:white;text-align: center;border:none;font-weight: bold;">

                                            <div class="form-group col-md-12 table-bordered" style="border:transparent; font-size:17px;">

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card-box">
                                                            <h5 class="text-center" style="font-size: 18px;">Serum Glutamic-Pyruvic Transaminase (SGPT)</h5>

                                                            <div class="table-responsive">
                                                                <table class="table" style="text-align:center;">
                                                                    <thead style="text-align: center;">
                                                                        <tr>
                                                                            <th>Test</th>
                                                                            <th colspan="2">Result</th>
                                                                            <th>Reference Range</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <!-- Other test rows -->
                                                                        <tr>
                                                                            <td>Sodium</td>
                                                                            <td><?php echo $row->sodium ?></td>
                                                                            <td style="color: <?php echo ($row->sodium_range === 'Low') ? 'green' : (($row->sodium_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->sodium_range ?></td>
                                                                            <td>136 - 145</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Potassium</td>
                                                                            <td><?php echo $row->potassium ?></td>
                                                                            <td style="color: <?php echo ($row->potassium_range === 'Low') ? 'green' : (($row->potassium_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->potassium_range ?></td>
                                                                            <td>3.5 - 5.1</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Chloride</td>
                                                                            <td><?php echo $row->chloride ?></td>
                                                                            <td style="color: <?php echo ($row->chloride_range === 'Low') ? 'green' : (($row->chloride_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->chloride_range ?></td>
                                                                            <td>98 - 107</td>
                                                                        </tr>
                                                                        <!-- Add the new test row here -->
                                                                        <tr>
                                                                            <td>Calcium(Ionized)</td>
                                                                            <td><?php echo $row->cal ?></td>
                                                                            <td style="color: <?php echo ($row->cal_range === 'Low') ? 'green' : (($row->cal_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->cal_range ?></td>
                                                                            <td>1.13 - 1.31</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Calcium(Total)</td>
                                                                            <td><?php echo $row->cium ?></td>
                                                                            <td style="color: <?php echo ($row->cium_range === 'Low') ? 'green' : (($row->cium_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->cium_range ?></td>
                                                                            <td>8.6 - 10.2</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Magnesium</td>
                                                                            <td><?php echo $row->magnesium ?></td>
                                                                            <td style="color: <?php echo ($row->magnesium_range === 'Low') ? 'green' : (($row->magnesium_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->magnesium_range ?></td>
                                                                            <td>1.7 - 2.4</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Phosphorus</td>
                                                                            <td><?php echo $row->phosphorus ?></td>
                                                                            <td style="color: <?php echo ($row->phosphorus_range === 'Low') ? 'green' : (($row->phosphorus_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->phosphorus_range ?></td>
                                                                            <td>2.4 - 4.5</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Direct Bilirubin</td>
                                                                            <td><?php echo $row->db ?></td>
                                                                            <td style="color: <?php echo ($row->db_range === 'Low') ? 'green' : (($row->db_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->db_range ?></td>
                                                                            <td>0.00 - 0.19</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Indirect Bilirubin</td>
                                                                            <td><?php echo $row->ib ?></td>
                                                                            <td style="color: <?php echo ($row->ib_range === 'Low') ? 'green' : (($row->ib_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->ib_range ?></td>
                                                                            <td>0.00 - 0.19</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Creatinine</td>
                                                                            <td><?php echo $row->creatinine ?></td>
                                                                            <td style="color: <?php echo ($row->creatinine_range === 'Low') ? 'green' : (($row->creatinine_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->creatinine_range ?></td>
                                                                            <td>0.51 - 0.95</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>BUN</td>
                                                                            <td><?php echo $row->bun ?></td>
                                                                            <td style="color: <?php echo ($row->bun_range === 'Low') ? 'green' : (($row->bun_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->bun_range ?></td>
                                                                            <td>6.0 - 20.0</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>BUA</td>
                                                                            <td><?php echo $row->bua ?></td>
                                                                            <td style="color: <?php echo ($row->bua_range === 'Low') ? 'green' : (($row->bua_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->bua_range ?></td>
                                                                            <td>2.4 - 5.7</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Albumin</td>
                                                                            <td><?php echo $row->albumin ?></td>
                                                                            <td style="color: <?php echo ($row->albumin_range === 'Low') ? 'green' : (($row->albumin_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->albumin_range ?></td>
                                                                            <td>3.97 - 4.94</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Remarks</td>
                                                                            <td colspan="2"><?php echo $row->remarks ?></td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </tbody>

                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        </div>

                                    </div>
                                    <div class="form-group margin col-md-3 mt-0" style="font-size: 16px;">
                                        <p>&nbsp; <strong><u><?php echo $render  ?> </u></strong> <span class="float-right"></span></p>
                                        <p>&nbsp;Laboratory Technician<span class="float-right"></span></p>
                                    </div>

                                    <div class="mt-4 mb-1">
                                        <div class="text-right d-print-none">
                                            <a href="his_admin_swu_examination.php" class="btn btn-danger "> Cancel</a>

                                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
                                        </div>
                                    </div>

                            <?php
                        } //else {
                          //  echo "Patient not found.";
                       // }
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
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var rangeInputs = document.querySelectorAll('.value-color');

                                        rangeInputs.forEach(function(input) {
                                            var trimmedValue = input.value.trim();

                                            if (trimmedValue.toLowerCase() === 'low') {
                                                input.style.color = 'green';
                                            } else if (trimmedValue.toLowerCase() === 'high') {
                                                input.style.color = 'red';
                                            }
                                        });
                                    });
                                </script>



</body>

</html>