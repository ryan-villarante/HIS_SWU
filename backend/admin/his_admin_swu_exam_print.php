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
                                                            <h5 class="text-center" style="font-size: 18px;">Complete Blood Count Differential</h5>

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
                                                                            <td>WBC</td>
                                                                            <td><?php echo $row->wbc ?></td>
                                                                            <td style="color: <?php echo ($row->wbc_range === 'Low') ? 'green' : (($row->wbc_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->wbc_range ?></td>
                                                                            <td>5.000 - 17.0000^3/mm^3</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>SEG</td>
                                                                            <td><?php echo $row->seg ?></td>
                                                                            <td style="color: <?php echo ($row->seg_range === 'Low') ? 'green' : (($row->seg_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->seg_range ?></td>
                                                                            <td>37.0000 - 80.0000 %</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>LYM</td>
                                                                            <td><?php echo $row->lym ?></td>
                                                                            <td style="color: <?php echo ($row->lym_range === 'Low') ? 'green' : (($row->lym_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->lym_range ?></td>
                                                                            <td>10.000 - 50.0000 %</td>
                                                                        </tr>
                                                                        <!-- Add the new test row here -->
                                                                        <tr>
                                                                            <td>MON</td>
                                                                            <td><?php echo $row->mon ?></td>
                                                                            <td style="color: <?php echo ($row->mon_range === 'Low') ? 'green' : (($row->mon_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->mon_range ?></td>
                                                                            <td>0.0000 - 12.0000 %</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>EOS</td>
                                                                            <td><?php echo $row->eos ?></td>
                                                                            <td style="color: <?php echo ($row->eos_range === 'Low') ? 'green' : (($row->eos_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->eos_range ?></td>
                                                                            <td>0.0000 - 7.0000 %</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>BAS</td>
                                                                            <td><?php echo $row->bas ?></td>
                                                                            <td style="color: <?php echo ($row->bas_range === 'Low') ? 'green' : (($row->bas_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->bas_range ?></td>
                                                                            <td> 0.0000 - 2.5000 %</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>RBC</td>
                                                                            <td><?php echo $row->rbc ?></td>
                                                                            <td style="color: <?php echo ($row->rbc_range === 'Low') ? 'green' : (($row->rbc_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->rbc_range ?></td>
                                                                            <td>4.0000 - 5.4000 10/mm^3</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>HGB</td>
                                                                            <td><?php echo $row->hgb ?></td>
                                                                            <td style="color: <?php echo ($row->hgb_range === 'Low') ? 'green' : (($row->hgb_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->hgb_range ?></td>
                                                                            <td>12.0000 - 15.0000 g/dl</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>HCT</td>
                                                                            <td><?php echo $row->hct ?></td>
                                                                            <td style="color: <?php echo ($row->hct_range === 'Low') ? 'green' : (($row->hct_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->hct_range ?></td>
                                                                            <td>41.9000 - 51.1000 %</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>MCV</td>
                                                                            <td><?php echo $row->mcv ?></td>
                                                                            <td style="color: <?php echo ($row->mcv_range === 'Low') ? 'green' : (($row->mcv_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->mcv_range ?></td>
                                                                            <td>83.0000 - 100.0000 µm^3</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>MCH</td>
                                                                            <td><?php echo $row->mch ?></td>
                                                                            <td style="color: <?php echo ($row->mch_range === 'Low') ? 'green' : (($row->mch_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->mch_range ?></td>
                                                                            <td>30.9000 - 35.1000 pg</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>MCHC</td>
                                                                            <td><?php echo $row->mchc ?></td>
                                                                            <td style="color: <?php echo ($row->mchc_range === 'Low') ? 'green' : (($row->mchc_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->mchc_range ?></td>
                                                                            <td>32.0000 - 36.0000 g/dl</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>PLT</td>
                                                                            <td><?php echo $row->plt ?></td>
                                                                            <td style="color: <?php echo ($row->plt_range === 'Low') ? 'green' : (($row->plt_range === 'High') ? 'red' : 'red'); ?>"><?php echo $row->plt_range ?></td>
                                                                            <td>150.0000 - 450.0000 10^3/mm^3</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Remarks</td>
                                                                            <td colspan="3"><?php echo $row->remarks ?></td>
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