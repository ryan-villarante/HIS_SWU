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
        $room_number = $_GET['room_id'];
        $ret = "SELECT  * FROM his_rooms_beds WHERE room_id = ?";
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
                                            <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="his_admin_swu_room.php">Rooms and Beds</a></li>
                                            <li class="breadcrumb-item active">View Rooms and Beds</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="col-lg-8 col-xl-12">
                            <div class="card-box ">
                                <ul class="nav nav-pills navtab-bg nav-justified">
                                    <li class="nav-item">
                                        <!-- <div class="form-group col-md-12 my-2">
                                            <input type="text" readonly name="" value="Rooms and Bed Maintenance" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                        </div> -->
                                    </li>
                                </ul>
                                <!-- <img src="assets/images/users/patient.png" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image"> -->

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputState" class="col-form-label">Branch Name</label>
                                        <input type="text" value="<?php echo $row->room_bname ?>" name="room_bname" class="form-control small-input" id="inputEmail4" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputState" class="col-form-label">Room No.</label>
                                        <input type="text" value="<?php echo $row->room_number ?>" name="room_bname" class="form-control small-input" id="inputEmail4" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputState" class="col-form-label">Building Name</label>
                                        <input type="text" value="<?php echo $row->room_bldg ?>" name="room_bname" class="form-control small-input" id="inputEmail4" readonly>
                                    </div>
                                    <div class="form-group col-md-6" style="display: none;">
                                        <label for="inputState" class="col-form-label">No. of Beds</label>
                                        <input type="text" value="<?php echo $row->room_beds_number ?>" name="room_bname" class="form-control small-input" id="inputEmail4" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputState" class="col-form-label">Floor Level</label>
                                        <input type="text" value="<?php echo $row->room_fname ?>" name="room_bname" class="form-control small-input" id="inputEmail4" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputState" class="col-form-label">Room Status</label>
                                        <input type="text" value="<?php echo $row->room_status ?>" name="room_bname" class="form-control small-input" id="inputEmail4" readonly>
                                    </div>
                                    <div class="form-group col-md-6" style="display: none;">
                                        <label for="inputState" class="col-form-label">Nursing Station</label>
                                        <input type="text" value="<?php echo $row->room_station ?>" name="room_bname" class="form-control small-input" id="inputEmail4" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputState" class="col-form-label">Room Type / Class</label>
                                        <input type="text" value="<?php echo $row->room_classification ?>" name="room_bname" class="form-control small-input" id="inputEmail4" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputState" class="col-form-label">Room Feature</label>
                                        <textarea type="text" value="<?php echo $row->room_fea ?>" name="room_bname" class="form-control small-input" id="inputEmail4" readonly></textarea>
                                    </div>

                                </div>
                                <div class="container-fluid my-3">
                                    <div class="row">

                                        <!-- Left Column -->
                                        <div class="col-md-6">
                                            <!-- First Table - Beds -->
                                            <table id="listOfBeds" class="table table-bordered toggle-circle mb-0 table-sm">
                                                <thead class="text-center">
                                                    <h3 class="text-center" style="font-size:medium;font-family: Nunito,sans-serif;">List of Beds</h3>
                                                </thead>
                                                <thead class="table-danger">
                                                    <tr>
                                                        <th>Bed Number</th>
                                                        <th>Bed Type</th>
                                                        <!-- Add more bed-related columns here -->
                                                    </tr>
                                                </thead>
                                                <?php
                                                /*
                                                *get details of allpatients
                                                *
                                            */
                                                $ret = "SELECT * FROM  his_beds WHERE room_id = ?";
                                                //sql code to get to ten docs  randomly
                                                $stmt = $mysqli->prepare($ret);
                                                $stmt->bind_param('s', $row->room_id);
                                                $stmt->execute(); //ok
                                                $res = $stmt->get_result();
                                                $cnt = 1;
                                                while ($row2 = $res->fetch_object()) {
                                                ?>
                                                    <tbody>
                                                        <td><?php echo $row2->bed_number; ?></td>
                                                        <td><?php echo $row2->bed_status; ?></td>

                                                        <!-- Add more bed rows here -->
                                                    </tbody>
                                                <?php $cnt = $cnt + 1;
                                                } ?>
                                            </table>
                                            <!-- <div>
                                                <button type="button" id="addBed" class="btn btn-danger my-2">Add</button>
                                                <button type="button" id="deleteBed" class="btn btn-danger my-2">Delete</button>
                                            </div> -->
                                        </div>

                                        <!-- Right Column -->
                                        <div class="col-md-6">
                                            <!-- Second Table - Price -->
                                            <table class="table table-bordered toggle-circle mb-0 table-sm">
                                                <thead class="text-center">
                                                    <h3 class="text-center" style="font-size:medium;font-family: Nunito,sans-serif;">Price Schemes</h3>
                                                </thead>
                                                <?php
                                                /*
                                                *get details of allpatients
                                                *
                                            */
                                                $ret = "SELECT * FROM  his_beds WHERE room_id = ?";
                                                //sql code to get to ten docs  randomly
                                                $stmt = $mysqli->prepare($ret);
                                                $stmt->bind_param('s', $row->room_id);
                                                $stmt->execute(); //ok
                                                $res = $stmt->get_result();
                                                $cnt = 1;
                                                while ($row2 = $res->fetch_object()) {
                                                }
                                                ?>
                                                <thead class="table-danger">
                                                    <tr>
                                                        <th>Price Category</th>
                                                        <th>Price Amount</th>
                                                        <!-- Add more price-related columns here -->
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <tr>
                                                        <td>Room-in Price</td>
                                                        <td><?php echo $row->roomIn_price ?>.00</td>
                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>







                                <!-- <div class="col-md-7">
                                        <div class="table-responsive">
                                            <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                                <thead class="table-danger">
                                                    <tr>
                                                        <th>#</th>
                                                        <th data-hide="phone">Bed Number</th>
                                                        <th data-toggle="true">Bed Status</th>
                                                        <th data-hide="phone">Bed Scheme</th>
                                                        <th data-hide="phone">Bed Price</th>

                                                    </tr>
                                                </thead> -->


                                <!-- <tbody>
                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $row2->bed_number; ?></td>
                                                <td><?php echo $row2->bed_status; ?></td>
                                                <td><?php echo $row->roomIn_price; ?></td>
                                                <td><?php echo $row->standard_price; ?></td>
                                            </tr>
                                        </tbody> -->

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
                        </div>


                        </ul>
                    </div>



                </div>

            </div> <!-- end card-box -->

    </div> <!-- end col-->

<?php } ?>
<div class="col-lg-8 col-xl-8">

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