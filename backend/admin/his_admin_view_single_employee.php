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

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="his_admin_manage_employee.php">Consultant</a></li>
                                        <li class="breadcrumb-item active">View Consultant</li>
                                    </ol>
                                </div>
                                <!-- <h4 class="page-title"><?php echo $row->doc_lname; ?>'s Profile</h4> -->

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="col-lg-8 col-xl-12">
                        <div class="card-box">
                            <ul class="nav nav-pills navtab-bg nav-justified">
                                <li class="nav-item">
                                    <div class="form-group col-md-12 my-1">
                                        <input type="text" readonly name="" value="Consultant Details" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                    </div>
                                </li>

                            </ul>




                            <div class="text-left mt-3">
                                <?php
                                $doc_id = $_GET['doc_id'];
                                $ret = "SELECT  * FROM his_docs WHERE doc_id=?";
                                $stmt = $mysqli->prepare($ret);
                                $stmt->bind_param('i', $doc_id);
                                $stmt->execute(); //ok
                                $res = $stmt->get_result();
                                //$cnt=1;
                                while ($row = $res->fetch_object()) {
                                ?>

                                    <div class="form-row">
                                        <div class="col-md-6">

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Code</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="<?php echo $row->doc_number ?>">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe">Full Name</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe " id `="" value="<?php echo $row->doc_fname; ?> <?php echo $row->doc_lname; ?>">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe">Email Address</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe " id `="" value=" <?php echo $row->doc_email; ?>">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe">Category</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe " id `="" value=" <?php echo $row->doc_cat; ?>">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe">Role</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe " id `="" value=" <?php echo $row->doc_role; ?>">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe">Specialization</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe " id `="" value=" <?php echo $row->doc_dept; ?>">
                                            </div>



                                        </div>


                                        <div class="col-md-6">
                                            <!-- New column for the image -->
                                            <img style="border: 3px solid; border-color:#800" src="../admin/assets/images/doc.jpg" alt="Image Description" class="img-fluid">
                                        </div>


                                        </ul>

                                    </div>




                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row-->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include('assets/inc/footer.php'); ?>
            <!-- end Footer -->

        </div>
    <?php } ?>

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