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
        <?php
        $room_number = $_GET['room_number'];
        $ret = "SELECT  * FROM his_rooms_beds WHERE room_number = ?";
        $stmt = $mysqli->prepare($ret);
        $stmt->bind_param('i', $room_number);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        //$cnt=1;
        while ($row = $res->fetch_object()) {
            // $mysqlDateTime = $row->pat_date_joined;
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Rooms and Beds</a></li>
                                            <li class="breadcrumb-item active">View Rooms and Beds</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"> Rooms and Bed Maintenance</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-4 col-xl-4">
                                <div class="card-box text-center">
                                    <!-- <img src="assets/images/users/patient.png" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image"> -->


                                    <div class="text-left mt-3">

                                        <p class="text-muted mb-2 font-13"><strong>Rooom Number :</strong> <span class="ml-2"><?php echo $row->room_number; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Building Name :</strong><span class="ml-2"><?php echo $row->room_bldg; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Branch Name :</strong> <span class="ml-2"><?php echo $row->room_bname; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Floor Name :</strong> <span class="ml-2"><?php echo $row->room_fname; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>No. of Beds :</strong> <span class="ml-2"><?php echo $row->room_beds_number; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Room Status :</strong> <span class="ml-2"><?php echo $row->room_status; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Room Classification :</strong> <span class="ml-2"><?php echo $row->room_classification; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Nursing Station:</strong> <span class="ml-2"><?php echo $row->room_station; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Room Feature :</strong> <span class="ml-2"><?php echo $row->room_fea; ?></span></p>
                                        <hr>



                                    </div>

                                </div> <!-- end card-box -->

                            </div> <!-- end col-->

                        <?php } ?>
                        <div class="col-lg-8 col-xl-8">
                            <div class="card-box">

                                <div class="table-responsive">
                                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th data-hide="phone">Bed Number</th>
                                                <th data-toggle="true">Bed Status</th>
                                                <th data-hide="phone">Bed Scheme</th>
                                                <th data-hide="phone">Bed Price</th>

                                            </tr>
                                        </thead>
                                        <?php
                                        /*
                                                *get details of allpatients
                                                *
                                            */
                                        $ret = "SELECT * FROM  his_beds ORDER BY RAND() ";
                                        //sql code to get to ten docs  randomly
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute(); //ok
                                        $res = $stmt->get_result();
                                        $cnt = 1;
                                        while ($row = $res->fetch_object()) {
                                        ?>

                                            <tbody>
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $row->bed_number; ?></td>
                                                    <td><?php echo $row->bed_status; ?></td>
                                                    <td><?php echo $row->bed_scheme; ?></td>
                                                    <td><?php echo $row->bed_price; ?></td>
                                                </tr>
                                            </tbody>
                                        <?php $cnt = $cnt + 1;
                                        } ?>
                                        <tfoot>
                                            <tr class="active">
                                                <td colspan="8">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div> <!-- end .table-responsive-->


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