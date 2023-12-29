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
        <?php include("assets/inc/nav.php"); ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include("assets/inc/sidebar.php"); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <!--Get Details Of A Single User And Display Them Here-->

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
                                        <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="his_admin_view_patients.php">Patients</a></li>
                                        <li class="breadcrumb-item active">View Patients</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->




                    <div class="col-lg-8 col-xl-12">
                        <div class="card-box">
                            <ul class="nav nav-pills navtab-bg nav-justified">
                                <li class="nav-item">
                                    <div class="form-group col-md-12 my-1">
                                        <input type="text" readonly name="" value="Patient Details" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                    </div>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="#timeline" data-toggle="tab" aria-expanded="true" class="nav-link ">
                                        Consultant and Rooms
                                    </a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                        Lab Records
                                    </a>
                                </li> -->
                            </ul>
                            <!--Medical History-->


                            <!-- <img src="assets/images/users/patient.png" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image"> -->


                            <div class="text-left mt-3">
                                <?php
                                $pat_number = $_GET['pat_number'];
                                $pat_id = $_GET['pat_id'];
                                $ret = "SELECT  * FROM his_patients WHERE pat_id=?";
                                $stmt = $mysqli->prepare($ret);
                                $stmt->bind_param('i', $pat_id);
                                $stmt->execute(); //ok
                                $res = $stmt->get_result();
                                //$cnt=1;
                                while ($row = $res->fetch_object()) {
                                    $mysqlDateTime = $row->pat_date_joined;
                                ?>

                                    <div class="form-row">
                                        <div class="col-md-6">

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Patient ID</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="<?php echo $pat_number ?>">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe">Full Name</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe " id `="" value="<?php echo $row->pat_fname; ?> <?php echo $row->pat_lname; ?>">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe">Mobile Number</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe " id `="inputlg" value="<?php echo $row->pat_phone; ?>">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe">Address</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe " id `="inputlg" value="<?php echo $row->pat_addr; ?>">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe">Date Of Birth </span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe " id `="inputlg" value="<?php echo $row->pat_dob; ?>">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe">Age </span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe " id `="inputlg" value="<?php echo $row->pat_age; ?> Years Old">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe">Gender </span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe " id `="inputlg" value="<?php echo $row->pat_gender; ?> ">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe">Civil Status </span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe " id `="inputlg" value="<?php echo $row->pat_status; ?> ">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe">Patient Type </span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe " id `="inputlg" value="<?php echo $row->pat_type; ?>">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe">Date Recorded </span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe " id `="inputlg" value="<?php echo date("d/m/Y - h:m", strtotime($mysqlDateTime)); ?>">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe">Attending Physician </span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe " id `="inputlg" value="<?php echo $row->pat_doc; ?>">
                                            </div>




                                        </div>

                                        <div class="col-md-6">
                                            <!-- New column for the image -->
                                            <img style="border: 3px solid; border-color:#800" src="../admin/assets/images/1.avif" alt="Image Description" class="img-fluid">
                                        </div>


                                        </ul>

                                    </div>
                                <?php } ?> <!-- end tab-pane -->
                                <!-- end Prescription section content -->



                                <div class="tab-pane" id="settings">

                                </div>
                            </div>
                            <!-- end lab records content-->

                        </div> <!-- end tab-content -->
                    </div> <!-- end card-box-->

                </div> <!-- end col -->
            </div>
            <!-- end row-->

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

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>


</html>