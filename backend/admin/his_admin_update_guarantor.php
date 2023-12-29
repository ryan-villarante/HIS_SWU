<?php
session_start();
include('assets/inc/config.php');
if (isset($_POST['update_guarantors'])) {
    $g_code = $_GET['g_code'];
    $g_gid = $_POST['g_gid'];
    $g_name = $_POST['g_name'];
    $g_lname = $_POST['g_lname'];
    $g_tele = $_POST['g_tele'];
    $g_type = $_POST['g_type'];
    $g_email = $_POST['g_email'];
    $g_address = $_POST['g_address'];

    //sql to update captured values
    $query = "UPDATE  his_guarantors SET g_gid=?,g_name=?, g_lname=?,g_tele=?,g_email=?,g_address=?,g_type=? WHERE g_code = ?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssssss',  $g_gid, $g_name, $g_lname, $g_tele, $g_email, $g_address, $g_type, $g_code);
    $stmt->execute();
    /*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Guarantor Successfully Updated ";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}
?>
<!--End Server Side-->
<!DOCTYPE html>
<html lang="en">

<!--Head-->
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
                                        <li class="breadcrumb-item"><a href="his_admin_swu_guarantors.php"> Master Files</a></li>
                                        <li class="breadcrumb-item active"> Guarantors</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Update Guarantor Details</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Form row -->
                    <?php
                    $g_code = $_GET['g_code'];
                    $ret = "SELECT  * FROM his_guarantors WHERE g_code=?";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->bind_param('s', $g_code);
                    $stmt->execute(); //ok
                    $res = $stmt->get_result();
                    //$cnt=1;
                    while ($row = $res->fetch_object()) {
                    ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Fill all fields</h4>
                                        <!--Add Patient Form-->
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-group col-md-3" style="display: none;">
                                                    <label for="inputEmail4" class="col-form-label">Code</label>
                                                    <input type="text" value="<?php echo $row->g_code; ?>" name="g_code" class="form-control" id="inputEmail4">
                                                </div>
                                                <div class="form-group col-md-3" style="display: none;">
                                                    <label for="inputPassword4" class="col-form-label">ID</label>
                                                    <input type="text" value="<?php echo $row->g_gid; ?>" name="g_gid" class="form-control" id="inputPassword4">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">First Name</label>
                                                    <input type="text" required="required" value="<?php echo $row->g_name; ?>" name="g_name" class="form-control" id="inputEmail4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Last Name</label>
                                                    <input type="text" required="required" value="<?php echo $row->g_lname; ?>" name="g_lname" class="form-control" id="inputEmail4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Telephone No.</label>
                                                    <input required="required" type="text" value="<?php echo $row->g_tele; ?>" name="g_tele" class="form-control" id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Email Address</label>
                                                    <input type="text" required="required" value="<?php echo $row->g_email; ?>" name="g_email" class="form-control" id="inputEmail4">
                                                </div>
                                            </div>
                                            <div class="form-row">


                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Address</label>
                                                    <input type="text" required="required" value="<?php echo $row->g_address; ?>" name="g_address" class="form-control" id="inputEmail4">
                                                </div>




                                                <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Health Insurance</label>
                                                    <select id="inputCategory" required="required" name="g_type" class="form-control">
                                                        <option <?= $row->g_type == 'HMO' ? ' selected="selected"' : ''; ?>>HMO</option>
                                                        <option <?= $row->g_type == 'Philhealth' ? ' selected="selected"' : ''; ?>>Philhealth</option>
                                                        <option <?= $row->g_type == 'Private Insurance Companies' ? ' selected="selected"' : ''; ?>>Private Insurance Companies</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <a href="his_admin_swu_guarantors.php" button type="button" class="ladda-button btn maroon-btn my-3 " data-style="expand-right">Cancel</button></a>

                                            <button type="submit" name="update_guarantors" class="ladda-button btn maroon-outline-btn my-3" data-style="expand-right">Update Guarantor</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    <?php } ?>

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

    <!-- App js-->
    <script src="assets/js/app.min.js"></script>

    <!-- Loading buttons js -->
    <script src="assets/libs/ladda/spin.js"></script>
    <script src="assets/libs/ladda/ladda.js"></script>

    <!-- Buttons init js-->
    <script src="assets/js/pages/loading-btn.init.js"></script>

</body>

</html>