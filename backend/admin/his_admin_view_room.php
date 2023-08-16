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
        $room_number = $_GET['room_number'];
        $ret = "SELECT  * FROM his_rooms_beds WHERE room_number = ?";
        $stmt = $mysqli->prepare($ret);
        $stmt->bind_param('i', $room_number);
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
                                            <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="his_admin_swu_room.php">Rooms and Beds</a></li>
                                            <li class="breadcrumb-item active">View Rooms and Beds</li>
                                        </ol>
                                    </div>

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
                                                    <img src="assets/images/1.jpg" alt="" class="img-fluid mx-auto d-block rounded">
                                                </div>

                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-xl-7">
                                            <div class="pl-xl-3 mt-3 mt-xl-0">
                                                <h2 class="text-dark">Room Number : <?php echo $row->room_number; ?></h2>
                                                <hr>
                                                <h4 class="text-muted">Builduing Name: <?php echo $row->room_bldg; ?></h4>
                                                <hr>
                                                <h4 class="text-muted">Branch Name: <?php echo $row->room_bname; ?></h4>
                                                <hr>
                                                <h4 class="text-muted">Floor Name : <?php echo $row->room_fname; ?></h4>
                                                <hr>
                                                <h4 class="text-muted">No. Of Beds: <?php echo $row->room_beds_number; ?></h4>
                                                <hr>
                                                <h4 class="text-muted">Room Status: <?php echo $row->room_status; ?></h4>
                                                <hr>
                                                <h4 class="text-muted">Room Classification: <?php echo $row->room_classification; ?></h4>
                                                <hr>
                                                <h4 class="text-muted">Nursing Station: <?php echo $row->room_station; ?></h4>
                                                <hr>
                                                <h4 class="text-muted">Room Feature: <?php echo $row->room_fea; ?></h4>
                                                <hr>


                                            </div>
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div> <!-- end card-->

                                <div>
                                    sdsds
                                </div>
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