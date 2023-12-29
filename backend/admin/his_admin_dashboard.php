<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['ad_id'];
?>
<!DOCTYPE html>
<html lang="en">

<!--Head Code-->
<?php include("assets/inc/head.php"); ?>



<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include('assets/inc/nav.php'); ?>
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
                    <!-- <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title text-secondary " style="font-size: x-large;font-family: Arial, Helvetica, sans-serif;font-weight: bold;">Hospital Information System Dashboard</h4>
                            </div>
                        </div>
                    </div> -->
                    <!-- end page title -->

                    <div class="graphBox">

                        <div class="box">
                            <!-- <div id="chartContainer" class="rectangle-container"> -->
                            <!-- <canvas id="patientsPieChart"></canvas> -->
                            <canvas id="doc"></canvas>
                            <!-- </div> -->
                            <!-- <canvas id="myChart"></canvas> -->
                        </div>
                        <div class="box text-center">
                            <!-- <button style="    border: 0px solid #800;" type="button" class="btn maroon-outline-btn btn-secondary btn-sm mb-3" id="downloadChartButton">Download Chart</button> -->
                            <canvas id="itemsPieChart"></canvas>
                        </div>


                    </div>
                    <div class="graphBox">
                        <div class="box">
                            <canvas id="pat"></canvas>
                        </div>
                        <div class="box">
                            <canvas id="users"></canvas>
                        </div>
                    </div>





                    <div class="row">


                        <!--Start OutPatients-->
                        <div class="col-md-6 col-xl-4" style="display: none;">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-success border" style="background-color: #800;">
                                            <i class="fas fa-diagnoses  font-22 avatar-title" style="color: #fff;"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <?php
                                            //code for summing up number of out patients 
                                            $result = "SELECT count(*) FROM his_patients WHERE pat_type = 'OutPatient' AND deleted = 0 ";
                                            $stmt = $mysqli->prepare($result);
                                            $stmt->execute();
                                            $stmt->bind_result($outpatient);
                                            $stmt->fetch();
                                            $stmt->close();
                                            ?>
                                            <h3 class="text-secondary mt-1"><span data-plugin="counterup" style="font-size: x-large;font-weight: bold;"><?php echo $outpatient; ?></span></h3>
                                            <p class="text-muted mb-1 text-truncate" style="font-size: large;font-weight: bold;">Out Patients</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                        <!--End Out Patients-->

                        <!-- start count for doctor -->
                        <div class="row" style="display: none;">
                            <div class="text-right">
                                <?php
                                //code for summing up number of out patients 
                                $result = "SELECT count(*) FROM his_docs WHERE doc_cat = 'Resident'  ";
                                $stmt = $mysqli->prepare($result);
                                $stmt->execute();
                                $stmt->bind_result($resident);
                                $stmt->fetch();
                                $stmt->close();
                                ?>
                                <h3 class="text-secondary mt-1"><span data-plugin="counterup" style="font-size: x-large;font-weight: bold;"><?php echo $resident; ?></span></h3>
                                <p class="text-muted mb-1 text-truncate" style="font-size: large;font-weight: bold;">resident/</p>
                            </div>
                            <div class="text-right">
                                <?php
                                //code for summing up number of out patients 
                                $result = "SELECT count(*) FROM his_docs WHERE doc_cat = 'Regular Consultant'  ";
                                $stmt = $mysqli->prepare($result);
                                $stmt->execute();
                                $stmt->bind_result($regular);
                                $stmt->fetch();
                                $stmt->close();
                                ?>
                                <h3 class="text-secondary mt-1"><span data-plugin="counterup" style="font-size: x-large;font-weight: bold;"><?php echo $regular; ?></span></h3>
                                <p class="text-muted mb-1 text-truncate" style="font-size: large;font-weight: bold;">regular/</p>
                            </div>
                            <div class="text-right">
                                <?php
                                //code for summing up number of out patients 
                                $result = "SELECT count(*) FROM his_docs WHERE doc_cat = 'Visiting Consultant'  ";
                                $stmt = $mysqli->prepare($result);
                                $stmt->execute();
                                $stmt->bind_result($visiting);
                                $stmt->fetch();
                                $stmt->close();
                                ?>
                                <h3 class="text-secondary mt-1"><span data-plugin="counterup" style="font-size: x-large;font-weight: bold;"><?php echo $visiting; ?></span></h3>
                                <p class="text-muted mb-1 text-truncate" style="font-size: large;font-weight: bold;">visiting</p>
                            </div>
                        </div>
                        <!-- end count for dcotor  -->


                        <!--Start OutPatients-->
                        <div class="col-6" style="display: none;">
                            <div class="text-right">
                                <?php
                                //code for summing up number of out patients 
                                $result = "SELECT count(*) FROM his_user WHERE user_dept = 'Medtech' ";
                                $stmt = $mysqli->prepare($result);
                                $stmt->execute();
                                $stmt->bind_result($medtech);
                                $stmt->fetch();
                                $stmt->close();
                                ?>
                                <h3 class="text-secondary mt-1"><span data-plugin="counterup" style="font-size: x-large;font-weight: bold;"><?php echo $medtech; ?></span></h3>
                                <p class="text-muted mb-1 text-truncate" style="font-size: large;font-weight: bold;">medtech/</p>
                            </div>
                            <div class="text-right">
                                <?php
                                //code for summing up number of out patients 
                                $result = "SELECT count(*) FROM his_user WHERE user_dept = 'Receptionist' ";
                                $stmt = $mysqli->prepare($result);
                                $stmt->execute();
                                $stmt->bind_result($infostaff);
                                $stmt->fetch();
                                $stmt->close();
                                ?>
                                <h3 class="text-secondary mt-1"><span data-plugin="counterup" style="font-size: x-large;font-weight: bold;"><?php echo $infostaff; ?></span></h3>
                                <p class="text-muted mb-1 text-truncate" style="font-size: large;font-weight: bold;">infostaff/</p>
                            </div>
                            <div class="text-right">
                                <?php
                                //code for summing up number of out patients 
                                $result = "SELECT count(*) FROM his_user WHERE user_dept = 'Pharmacist' ";
                                $stmt = $mysqli->prepare($result);
                                $stmt->execute();
                                $stmt->bind_result($pharma);
                                $stmt->fetch();
                                $stmt->close();
                                ?>
                                <h3 class="text-secondary mt-1"><span data-plugin="counterup" style="font-size: x-large;font-weight: bold;"><?php echo $pharma; ?></span></h3>
                                <p class="text-muted mb-1 text-truncate" style="font-size: large;font-weight: bold;">pharma/</p>
                            </div>
                            <div class="text-right">
                                <?php
                                //code for summing up number of out patients 
                                $result = "SELECT count(*) FROM his_user WHERE user_dept = 'Nurse' ";
                                $stmt = $mysqli->prepare($result);
                                $stmt->execute();
                                $stmt->bind_result($nurse);
                                $stmt->fetch();
                                $stmt->close();
                                ?>
                                <h3 class="text-secondary mt-1"><span data-plugin="counterup" style="font-size: x-large;font-weight: bold;"><?php echo $nurse; ?></span></h3>
                                <p class="text-muted mb-1 text-truncate" style="font-size: large;font-weight: bold;">nurse/</p>
                            </div>
                            <div class="text-right">
                                <?php
                                //code for summing up number of out patients 
                                $result = "SELECT count(*) FROM his_user WHERE user_dept = 'Cashier' ";
                                $stmt = $mysqli->prepare($result);
                                $stmt->execute();
                                $stmt->bind_result($billing);
                                $stmt->fetch();
                                $stmt->close();
                                ?>
                                <h3 class="text-secondary mt-1"><span data-plugin="counterup" style="font-size: x-large;font-weight: bold;"><?php echo $billing; ?></span></h3>
                                <p class="text-muted mb-1 text-truncate" style="font-size: large;font-weight: bold;">billing/</p>
                            </div>
                        </div>
                        <!--End Out Patients-->


                        <!--Start InPatients-->
                        <div class="col-md-6 col-xl-4" style="display: none;">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-success border" style="background-color: #800;">
                                            <i class="fas fa-wheelchair   font-22 avatar-title" style="color: #fff;"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <?php
                                            //code for summing up number of in / admitted  patients 
                                            $result = "SELECT count(*) FROM his_patients WHERE pat_type = 'InPatient' AND deleted = 0 ";
                                            $stmt = $mysqli->prepare($result);
                                            $stmt->execute();
                                            $stmt->bind_result($inpatient);
                                            $stmt->fetch();
                                            $stmt->close();
                                            ?>
                                            <h3 class="text-secondary mt-1"><span data-plugin="counterup" style="font-size: x-large;font-weight: bold;"><?php echo $inpatient; ?></span></h3>
                                            <p class="text-muted mb-1 text-truncate" style="font-size: large;font-weight: bold;">In Patients</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                        <!--End InPatients-->

                        <!--Start Emergencies-->
                        <div class="col-md-6 col-xl-4" style="display: none;">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-success border" style="background-color: #800;">
                                            <i class="fas fa-briefcase-medical  font-22 avatar-title" style="color: #fff;"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <?php
                                            //code for summing up number of in /   patients 
                                            $result = "SELECT count(*) FROM his_patients WHERE pat_type = 'Emergency' AND deleted = 0 ";
                                            $stmt = $mysqli->prepare($result);
                                            $stmt->execute();
                                            $stmt->bind_result($emergency);
                                            $stmt->fetch();
                                            $stmt->close();
                                            ?>
                                            <h3 class="text-secondary mt-1"><span data-plugin="counterup" style="font-size: x-large;font-weight: bold;"><?php echo $emergency; ?></span></h3>
                                            <p class="text-muted mb-1 text-truncate" style="font-size: large;font-weight: bold;">Emergencies</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                        <!--End Emergency-->





                        <!--Start Employees-->
                        <div class="col-md-6 col-xl-4 " style="display:none;">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-success border" style="background-color: #800;">
                                            <i class="mdi mdi-doctor font-22 avatar-title" style="color: #fff;"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <?php
                                            //code for summing up number of employees in the certain Hospital 
                                            $result = "SELECT count(*) FROM his_docs ";
                                            $stmt = $mysqli->prepare($result);
                                            $stmt->execute();
                                            $stmt->bind_result($doc);
                                            $stmt->fetch();
                                            $stmt->close();
                                            ?>
                                            <h3 class="text-secondary mt-1"><span data-plugin="counterup" style="font-size: x-large;font-weight: bold;"><?php echo $doc; ?></span></h3>
                                            <p class="text-muted mb-1 text-truncate" style="font-size: large;font-weight: bold;">Consultants</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                        <!--End Employees-->

                        <!--Start Pharmaceuticals-->
                        <div class="col-md-6 col-xl-4 " style="display:none;">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-success border" style="background-color: #800;">
                                            <i class="	fas fa-user-friends font-22 avatar-title " style="color: #fff;"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <?php
                                            /* 
                                                     * code for summing up number of pharmaceuticals,
                                                     */
                                            $result = "SELECT count(*) FROM his_guarantors ";
                                            $stmt = $mysqli->prepare($result);
                                            $stmt->execute();
                                            $stmt->bind_result($guarantors);
                                            $stmt->fetch();
                                            $stmt->close();
                                            ?>
                                            <h3 class="text-secondary mt-1"><span data-plugin="counterup" style="font-size: x-large;font-weight: bold;"><?php echo $guarantors; ?></span></h3>
                                            <p class="text-muted mb-1 text-truncate" style="font-size: large;font-weight: bold;">HMOs Guarantors</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                        <!--End Pharmaceuticals-->
                        <!--Start Vendors-->
                        <div class="col-md-6 col-xl-4 " style="display:none;">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-success border" style="background-color: #800;">
                                            <i class="fas fa-bed font-22 avatar-title" style="color: #fff;"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <?php
                                            /*code for summing up number of vendors whom supply eqipments, 
                                                     *pharms or any other equipments
                                                     */
                                            $result = "SELECT count(*) FROM his_rooms_beds ";
                                            $stmt = $mysqli->prepare($result);
                                            $stmt->execute();
                                            $stmt->bind_result($room);
                                            $stmt->fetch();
                                            $stmt->close();
                                            ?>
                                            <h3 class="text-secondary mt-1"><span data-plugin="counterup" style="font-size: x-large;font-weight: bold;"><?php echo $room; ?></span></h3>
                                            <p class="text-muted mb-1 text-truncate" style="font-size: large;font-weight: bold;">Rooms </p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                        <!--End Vendors-->

                        <!--Start Vendors-->
                        <div class="col-md-6 col-xl-4" style="display: none;">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-success border" style="background-color: #800;">
                                            <i class="fas fa-bed font-22 avatar-title" style="color: #fff;"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <?php
                                            /*code for summing up number of vendors whom supply eqipments, 
                                                     *pharms or any other equipments
                                                     */
                                            $result = "SELECT count(*) FROM his_equipments WHERE item_category ='Drugs' ";
                                            $stmt = $mysqli->prepare($result);
                                            $stmt->execute();
                                            $stmt->bind_result($drugs);
                                            $stmt->fetch();
                                            $stmt->close();
                                            ?>
                                            <h3 class="text-secondary mt-1"><span data-plugin="counterup" style="font-size: x-large;font-weight: bold;"><?php echo $drugs; ?></span></h3>
                                            <p class="text-muted mb-1 text-truncate" style="font-size: large;font-weight: bold;">Drugs </p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                        <!--End Vendors-->


                        <!--Start Vendors-->
                        <div class="col-md-6 col-xl-4" style="display: none;">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-success border" style="background-color: #800;">
                                            <i class="fas fa-bed font-22 avatar-title" style="color: #fff;"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <?php
                                            /*code for summing up number of vendors whom supply eqipments, 
                                                     *pharms or any other equipments
                                                     */
                                            $result = "SELECT count(*) FROM his_equipments WHERE item_category ='Medicine' ";
                                            $stmt = $mysqli->prepare($result);
                                            $stmt->execute();
                                            $stmt->bind_result($med);
                                            $stmt->fetch();
                                            $stmt->close();
                                            ?>
                                            <h3 class="text-secondary mt-1"><span data-plugin="counterup" style="font-size: x-large;font-weight: bold;"><?php echo $med; ?></span></h3>
                                            <p class="text-muted mb-1 text-truncate" style="font-size: large;font-weight: bold;">Medicine </p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                        <!--End Vendors-->



                        <!--Start Vendors-->
                        <div class="col-md-6 col-xl-4" style="display: none;">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-success border" style="background-color: #800;">
                                            <i class="fas fa-bed font-22 avatar-title" style="color: #fff;"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <?php
                                            /*code for summing up number of vendors whom supply eqipments, 
                                                     *pharms or any other equipments
                                                     */
                                            $result = "SELECT count(*) FROM his_examinations ";
                                            $stmt = $mysqli->prepare($result);
                                            $stmt->execute();
                                            $stmt->bind_result($exam);
                                            $stmt->fetch();
                                            $stmt->close();
                                            ?>
                                            <h3 class="text-secondary mt-1"><span data-plugin="counterup" style="font-size: x-large;font-weight: bold;"><?php echo $exam; ?></span></h3>
                                            <p class="text-muted mb-1 text-truncate" style="font-size: large;font-weight: bold;">Examination </p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                        <!--End Vendors-->

                        <!--Start Vendors-->
                        <div class="col-md-6 col-xl-4" style="display: none;">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-success border" style="background-color: #800;">
                                            <i class="fas fa-bed font-22 avatar-title" style="color: #fff;"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <?php
                                            /*code for summing up number of vendors whom supply eqipments, 
                                                     *pharms or any other equipments
                                                     */
                                            $result = "SELECT count(*) FROM his_procedures ";
                                            $stmt = $mysqli->prepare($result);
                                            $stmt->execute();
                                            $stmt->bind_result($pro);
                                            $stmt->fetch();
                                            $stmt->close();
                                            ?>
                                            <h3 class="text-secondary mt-1"><span data-plugin="counterup" style="font-size: x-large;font-weight: bold;"><?php echo $pro; ?></span></h3>
                                            <p class="text-muted mb-1 text-truncate" style="font-size: large;font-weight: bold;">Procedures </p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                        <!--End Vendors-->



                    </div>

                    <!-- START VIEW MODAL -->

                    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">

                                </div>
                                <div class="modal-body">
                                    <div class="col-lg-8 col-xl-12">
                                        <div class="card-box">
                                            <ul class="nav nav-pills navtab-bg nav-justified">
                                                <li class="nav-item">
                                                    <div class="form-group col-md-12 my-1">
                                                        <input type="text" readonly name="" value="User Details" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="text-left mt-3">

                                                <?php
                                                if (isset($_GET['user_id'])) {
                                                    $user_id = $_GET['user_id'];
                                                    $ret = "SELECT  * FROM his_user WHERE user_id=?";
                                                    $stmt = $mysqli->prepare($ret);
                                                    $stmt->bind_param('i', $user_id);
                                                    $stmt->execute();
                                                    $res = $stmt->get_result();

                                                    if ($row = $res->fetch_object()) {
                                                        // Rest of your code for displaying user details goes here
                                                ?>
                                                        <div class="form-row">
                                                            <div class="col-md-6">
                                                                <!-- Consultant details as in your code -->
                                                            </div>
                                                            <div class="col-md-6">
                                                                <!-- Image goes here -->
                                                            </div>
                                                        </div>
                                                <?php
                                                    }
                                                } else {
                                                    // Handle the case when 'user_id' is not set, for example, display an error message or redirect
                                                    echo "User ID is not set.";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- END VIEW MODAL -->


                    <!--Users-->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">

                                <div class="form-group col-md-12 my-1">
                                    <input type="text" readonly name="" value="System Users" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                </div>

                                <div class="table-responsive">
                                    <table id="patient-table" class="table table-borderless table-hover table-centered m-0" data-page-size="5">

                                        <thead class="thead-light">
                                            <tr>
                                                <!-- <th colspan="2">Picture</th> -->
                                                <th>User Number</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Department</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody data-toggle="true" data-show="4">
                                            <?php
                                            $ret = "SELECT * FROM his_user  ";
                                            //sql code to get to ten docs  randomly
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            $cnt = 1;
                                            while ($row = $res->fetch_object()) {
                                            ?>

                                                <tr>


                                                    <td>
                                                        <?php echo $row->user_number; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row->user_fname; ?> <?php echo $row->user_lname; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row->user_email; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row->user_dept; ?>
                                                    </td>

                                                    <td>
                                                        <a href="#" class="badge badge-success badge-xs" style="background-color: #800; font-size:small" data-toggle="modal" data-target="#viewModal" data-userid="<?php echo $row->user_id; ?>" data-usernumber="<?php echo $row->user_number; ?>" data-username="<?php echo $row->user_fname . ' ' . $row->user_lname; ?>" data-useremail="<?php echo $row->user_email; ?>" data-usercat="<?php echo $row->user_dept; ?>" data-userimage="<?php echo $row->user_dpic; ?>">
                                                            <i class="mdi mdi-eye"></i> View
                                                        </a>
                                                    </td>

                                                <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="active">
                                                <td colspan="10">

                                                    <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>

                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>



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

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="dripicons-cross noti-icon"></i>
            </a>
            <h5 class="m-0 text-white">Settings</h5>
        </div>
        <div class="slimscroll-menu">
            <!-- User box -->
            <div class="user-box">
                <div class="user-img">
                    <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                    <a href="javascript:void(0);" class="user-edit"><i class="mdi mdi-pencil"></i></a>
                </div>

                <h5><a href="javascript: void(0);">Nilo Velarde</a> </h5>
                <p class="text-muted mb-0"><small>Admin Head</small></p>
            </div>



            <!-- Timeline -->

        </div> <!-- end .p-3-->

    </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- Plugins js-->
    <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>
    <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- <script src="assets/libs/flot-charts/jquery.flot.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.time.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.selection.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.crosshair.js"></script> -->

    <!-- Dashboar 1 init js-->
    <script src="assets/js/pages/dashboard-1.init.js"></script>

    <!-- Footable js -->
    <script src="assets/libs/footable/footable.all.min.js"></script>


    <!-- App js-->
    <script src="assets/js/app.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

    <script>
        $(document).ready(function() {
            // Initialize Footable
            $('#patient-table').footable();
        });
    </script>

    <script>
        document.getElementById('downloadChartButton').addEventListener('click', function() {
            // Get the data URL of the chart canvas
            var dataUrl = pieChart2.toBase64Image();

            // Create a temporary link element
            var link = document.createElement('a');
            link.href = dataUrl;
            link.download = 'chart.png'; // Set the desired file name and extension

            // Trigger a click on the link to start the download
            link.click();
        });
    </script>

    <script>
        // Get the canvas element
        var patient = document.getElementById("doc");
        var doc = document.getElementById("pat");
        var items = document.getElementById("itemsPieChart");
        var users = document.getElementById("users");

        Chart.register(ChartDataLabels);
        // Chart.defaults.set('plugins.datalabels', {
        //     color: '#FE777B'
        // });


        // Extracted data
        var emergency = <?php echo $emergency; ?>;
        var inpatient = <?php echo $inpatient; ?>;
        var outpatient = <?php echo $outpatient; ?>;

        // consultant
        var resident = <?php echo $resident; ?>;
        var regular = <?php echo $regular; ?>;
        var visiting = <?php echo $visiting; ?>;

        // items
        var drugs = <?php echo $drugs; ?>;
        var med = <?php echo $med; ?>;
        var exam = <?php echo $exam; ?>;
        var pro = <?php echo $pro; ?>;

        // users
        var medtech = <?php echo $medtech; ?>;
        var infostaff = <?php echo $infostaff; ?>;
        var pharma = <?php echo $pharma; ?>;
        var nurse = <?php echo $nurse; ?>;
        var billing = <?php echo $billing; ?>;



        // Create a pie chart
        var pieChart = new Chart(patient, {
            type: "pie",
            data: {
                labels: ["Emergency", "In Patients", "Out Patients"],
                datasets: [{
                    data: [emergency, inpatient, outpatient],
                    label: "test",
                    backgroundColor: ["#FF5733", "#36A2EB", "#FFCE56"],
                    borderColor: ["#800", "#800", "#800"],
                    borderWidth: 1,
                    hoverOffset: 4
                }],
            },
            plugins: [ChartDataLabels],
            options: {
                plugins: {
                    datalabels: {

                        labels: {
                            value: {
                                color: 'white'
                            }
                        },
                        formatter: (value, ctx) => {
                            let sum = 0;
                            let dataArr = ctx.chart.data.datasets[0].data;
                            dataArr.map(data => {
                                sum += data;
                            });
                            let percentage = (value * 100 / sum).toFixed(2) + "%";
                            return percentage;
                        },
                    }
                }

            }
        });

        var pieChart2 = new Chart(items, {
            type: "bar",
            data: {
                labels: ["Drugs", "Medicines", "Examinations", "Procedures"],
                datasets: [{
                    data: [drugs, med, exam, pro],
                    label: "Items and Services",
                    backgroundColor: [

                        'rgb(61,133,198)',
                        'rgb(106,168,79)',
                        'rgb(103,78,167)',
                        'rgb(166,77,121)'
                    ],
                    borderColor: [

                        'rgb(11,83,148)',
                        'rgb(56,118,29)',
                        'rgb(53,28,117)',
                        'rgb(116,27,71)'
                    ],
                    borderWidth: 2,
                    hoverOffset: 4
                }],
            },
            plugins: [ChartDataLabels],
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        grace: '5%',
                        ticks: {
                            stepSize: 0.5, // Set the step size to 1
                        }
                    }
                },
                plugins: {
                    datalabels: {
                        labels: {
                            value: {
                                color: 'black'
                            }
                        }
                    }
                }
            }
        });


        var pieChart3 = new Chart(pat, {
            type: "doughnut",
            data: {
                labels: ["Resident Consultant", "Regular Consultant", "Visiting Consultant"],
                datasets: [{
                    data: [resident, regular, visiting],
                    label: "test",
                    backgroundColor: ["#8cde90", "#86aae3", "#e39cf0"],
                    borderColor: ["#800", "#800", "#800"],
                    borderWidth: 1,
                    hoverOffset: 4
                }],
            },
            plugins: [ChartDataLabels],
            options: {
                plugins: {
                    datalabels: {

                        labels: {
                            value: {
                                color: 'white'
                            }
                        },
                        formatter: (value, ctx) => {
                            let sum = 0;
                            let dataArr = ctx.chart.data.datasets[0].data;
                            dataArr.map(data => {
                                sum += data;
                            });
                            let percentage = (value * 100 / sum).toFixed(2) + "%";
                            return percentage;
                        },
                    }
                }

            }
        });

        var pieChart4 = new Chart(users, {
            type: "bar",
            data: {
                labels: ['Infostaff', 'Medtech', 'Pharmacist', 'Nurse', 'Billing'],
                datasets: [{
                    label: 'Number of Users',
                    data: [infostaff, medtech, pharma, nurse, billing],
                    label: "Number of Users",
                    backgroundColor: [
                        'rgba(246,178,107)',
                        'rgba(255,217,102)',
                        'rgba(147,196,125)',
                        'rgba(118,165,175)',
                        'rgba(142,124,195)',
                    ],
                    borderColor: [
                        'rgb(180,95,6)',
                        'rgb(191,144,0)',
                        'rgb(56,118,29)',
                        'rgb(19,79,92)',
                        'rgb(53,28,117)',
                    ],
                    borderWidth: 2,
                    hoverOffset: 5
                }],
            },
            plugins: [ChartDataLabels],
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        grace: '5%',
                        ticks: {
                            stepSize: 0.5, // Set the step size to 1
                        }
                    }
                },
                subtitle: {
                    display: true,
                    text: 'Number of Users'
                },
                plugins: {
                    datalabels: {

                        labels: {
                            value: {
                                color: 'black'
                            }
                        }
                    }
                }

            }
        });

        window.addEventListener('resize', function() {
            var canvas = document.getElementById('doc');
            var container = canvas.parentElement;
            var chart = new Chart(canvas, {
                // Chart configuration options
            });

            // Set the canvas dimensions based on the container's size
            canvas.width = container.offsetWidth;
            canvas.height = container.offsetHeight;

            // Update the chart
            chart.update();
        });
    </script>





    <script>
        $(document).ready(function() {
            // Listen for the modal to be shown
            $('#viewModal').on('show.bs.modal', function(event) {
                var link = $(event.relatedTarget); // Link that triggered the modal
                var userId = link.data('userid'); // Get data attributes from the link
                var userNumber = link.data('usernumber');
                var userName = link.data('username');
                var userEmail = link.data('useremail');
                var userCat = link.data('usercat');
                var userImage = link.data('userimage'); // Retrieve the image source

                // Modify the modal content
                var modal = $(this);
                modal.find('.modal-content').html(`
                <div class="modal-header">
                    
                </div>
                <div class="modal-body">
                    <div class="col-lg-8 col-xl-12">
                        <div class="card-box">
                            <ul class="nav nav-pills navtab-bg nav-justified">
                                <li class="nav-item">
                                    <div class="form-group col-md-12 my-1">
                                        <input type="text" readonly name="" value="User Details" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                    </div>
                                </li>
                            </ul>
                            <div class="text-left mt-3">
                            <div class="text-left mt-3">  
                                <div class="form-row">
                                    <div class="col-md-6">

                                    <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">User ID</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${userNumber}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Name</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${userName}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Email</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${userEmail}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Department</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${userCat}">
                                            </div>        
                
                                        
                                    </div>
                                    <div class="col-md-6">
        <!-- Image goes here -->
        <img style="border: 3px solid; border-color:#800; height:100%" src="../admin/assets/images/users/${userImage}" alt="Image Description" class="img-fluid">
    </div>
                                </div>
                               
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            `);
            });
        });
    </script>

</body>

</html>