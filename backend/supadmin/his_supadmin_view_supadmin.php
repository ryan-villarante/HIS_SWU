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
        <?php
        $sup_id = $_GET['sup_id'];
        $ret = "SELECT  * FROM his_supadmin WHERE sup_id=?";
        $stmt = $mysqli->prepare($ret);
        $stmt->bind_param('i', $sup_id);
        $stmt->execute(); //ok
        $res = $stmt->get_result();

        //$cnt=1;
        while ($row = $res->fetch_object()) {
        ?>

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
                                            <li class="breadcrumb-item"><a href="his_supadmin_dashboard.php">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="#">SupAdmin</a></li>
                                            <li class="breadcrumb-item active">View SupAdmin</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?php echo $row->sup_fname; ?> <?php echo $row->sup_lname; ?>'s Profile</h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-xl-5">

                                            <div class="tab-content pt-0">

                                                <div class="tab-pane active show" id="product-1-item">
                                                    <img src="../admin/assets/images/users/<?php echo $row->sup_dpic; ?>" clalt="" class="img-fluid mx-auto d-block rounded">
                                                </div>

                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-xl-7">
                                            <div class="pl-xl-3 mt-3 mt-xl-0">
                                                <h2 class="text-muted mb-3 font-50"><strong>Full Name :</strong> <span class="ml-2"><?php echo $row->sup_fname; ?> <?php echo $row->sup_lname; ?></span></h2>
                                                <hr>
                                                <h4 class="text-muted mb-3 font-50"><strong>Email :</strong> <span class="ml-2"><?php echo $row->sup_email; ?></span></h4>
                                                <hr>
                                                <h4 class="text-muted mb-3 font-50"><strong>Encrypted Password :</strong> <span class="ml-2"><?php echo $row->sup_pwd; ?></span></h4>
                                                <hr>


                                            </div>
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->


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