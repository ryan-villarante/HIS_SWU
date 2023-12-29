<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$user_id = $_SESSION['user_id'];
$user_number = $_SESSION['user_number'];

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
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title text-secondary" style="font-size: x-large;font-family: Arial, Helvetica, sans-serif;font-weight: bold;">Hospital Information System Dashboard </h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->



                    <div class="graphBox">

                        <div class="box">
                            <!-- <div id="chartContainer" class="rectangle-container"> -->
                            <!-- <canvas id="patientsPieChart"></canvas> -->
                            <canvas id="doc"></canvas>
                            <!-- </div> -->
                            <!-- <canvas id="myChart"></canvas> -->
                        </div>
                        <div class="box">
                            <!-- <div id="chartContainer2" class="rectangle-container"> -->
                            <canvas id="itemsPieChart"></canvas>
                            <!-- </div> -->
                        </div>

                    </div>

                </div>
                <!-- <div class="graphBox">
                    <div class="box">
                        <canvas id="pat"></canvas>
                    </div>
                    <div class="box">
                        <canvas id="users"></canvas>
                    </div>
                </div> -->


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
                            $result = "SELECT count(*) FROM his_user WHERE user_dept = 'Infostaff' ";
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
                            $result = "SELECT count(*) FROM his_user WHERE user_dept = 'Pharmacy' ";
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
                            $result = "SELECT count(*) FROM his_user WHERE user_dept = 'Billing' ";
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
                                        $result = "SELECT count(*) FROM his_equipments ";
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



                <!--Recently Employed Employees-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card-box">
                            <div class="form-group col-md-12 my-1">
                                <input type="text" readonly name="" value="Patients" class="form-control" style="background-color:#800;color:white;text-align: center;">
                            </div>

                            <div class="table-responsive">
                                <table id="patient-table" class="table table-borderless table-hover table-centered m-0" data-page-size="5">

                                    <thead class="thead-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Mobile Phone</th>
                                            <th>Category</th>
                                            <th>Age</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody data-toggle="true" data-show="4">

                                        <?php
                                        $ret = "SELECT * FROM his_patients WHERE deleted = 0 AND discharged != 1  ";
                                        //sql code to get to ten docs  randomly
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute(); //ok
                                        $res = $stmt->get_result();
                                        $cnt = 1;
                                        while ($row = $res->fetch_object()) {
                                        ?>
                                            <tr>

                                                <td>
                                                    <?php echo $row->pat_fname; ?> <?php echo $row->pat_lname; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->pat_addr; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->pat_phone; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->pat_type; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row->pat_age; ?> Years
                                                </td>
                                                <td>
                                                    <a href="his_doc_view_single_patient.php?pat_id=<?php echo $row->pat_id; ?>&&pat_number=<?php echo $row->pat_number; ?>&&pat_name=<?php echo $row->pat_fname; ?>_<?php echo $row->pat_lname; ?>" class="btn btn-xs btn-primary" style="background-color:#800;"><i class="mdi mdi-eye"></i> View</a>
                                                </td>
                                            </tr>

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

                <h5><a href="javascript: void(0);">NILVEL</a> </h5>
                <p class="text-muted mb-0"><small>Admin Head</small></p>
            </div>

            <!-- Settings -->
            <hr class="mt-0" />
            <h5 class="pl-3">Basic Settings</h5>
            <hr class="mb-0" />

            <div class="p-3">
                <div class="checkbox checkbox-primary mb-2">
                    <input id="Rcheckbox1" type="checkbox" checked>
                    <label for="Rcheckbox1">
                        Notifications
                    </label>
                </div>
                <div class="checkbox checkbox-primary mb-2">
                    <input id="Rcheckbox2" type="checkbox" checked>
                    <label for="Rcheckbox2">
                        API Access
                    </label>
                </div>
                <div class="checkbox checkbox-primary mb-2">
                    <input id="Rcheckbox3" type="checkbox">
                    <label for="Rcheckbox3">
                        Auto Updates
                    </label>
                </div>
                <div class="checkbox checkbox-primary mb-2">
                    <input id="Rcheckbox4" type="checkbox" checked>
                    <label for="Rcheckbox4">
                        Online Status
                    </label>
                </div>
                <div class="checkbox checkbox-primary mb-0">
                    <input id="Rcheckbox5" type="checkbox" checked>
                    <label for="Rcheckbox5">
                        Auto Payout
                    </label>
                </div>
            </div>

            <!-- Timeline -->
            <hr class="mt-0" />
            <h5 class="px-3">Messages <span class="float-right badge badge-pill badge-danger">25</span></h5>
            <hr class="mb-0" />
            <div class="p-3">

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
    <script src="assets/libs/flot-charts/jquery.flot.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.time.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.selection.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

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
                labels: ["Resident Consultant", "Regular Consultant", "Visiting Consultant"],
                datasets: [{
                    data: [resident, regular, visiting],
                    label: "Number of Consultants",
                    backgroundColor: [

                        'rgb(61,133,198)',
                        'rgb(103,78,167)',
                        'rgb(166,77,121)'
                    ],
                    borderColor: [

                        '#800',
                        '#800',
                        '#800'
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
            type: "bar",
            data: {
                labels: ["Resident Consultant", "Regular Consultant", "Visiting Consultant"],
                datasets: [{
                    data: [resident, regular, visiting],
                    label: "test",
                    backgroundColor: ["#8cde90", "#86aae3", "#e39cf0"],
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
                labels: ['Infostaff', 'Medtech', 'Nurse', 'Pharmacist', 'Cashier'],
                datasets: [{
                    label: 'Number of Users',
                    data: [medtech, infostaff, pharma, nurse, billing],
                    label: "Number of Users",
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1,
                    hoverOffset: 4
                }],
            },
            plugins: [ChartDataLabels],
            options: {
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

</body>

</html>