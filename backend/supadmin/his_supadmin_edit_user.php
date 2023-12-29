<?php
session_start();
include('assets/inc/config.php');
if (isset($_POST['update_user'])) {
    $user_fname = $_POST['user_fname'];
    $user_lname = $_POST['user_lname'];
    $user_number = $_GET['user_number'];
    $user_cat = $_POST['user_cat'];
    $user_dept = $_POST['user_dept'];
    $user_email = $_POST['user_email'];
    $user_pwd = sha1(md5($_POST['user_pwd']));
    $user_dpic = $_FILES["user_dpic"]["name"];
    move_uploaded_file($_FILES["user_dpic"]["tmp_name"], "../admin/assets/images/users/" . $_FILES["user_dpic"]["name"]);

    //sql to insert captured values
    $query = "UPDATE his_user SET user_fname=?, user_lname=?,user_cat=?, user_cat=?, user_email=?, user_pwd=?, user_dpic=? WHERE user_number = ?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssssss', $user_fname, $user_lname, $user_cat, $user_cat, $user_email, $user_pwd, $user_dpic, $user_number);
    $stmt->execute();
    /*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "User Details Updated";
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
                                        <li class="breadcrumb-item"><a href="his_supadmin_dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="his_admin_view_user.php">Users</a></li>
                                        <li class="breadcrumb-item active">Manage User</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Update User Details</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Form row -->
                    <?php
                    $user_number = $_GET['user_number'];
                    $ret = "SELECT  * FROM his_user WHERE user_number=?";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->bind_param('i', $user_number);
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
                                                <!-- <div class="form-group col-md-2">
                                                    <label for="inputEmail4" class="col-form-label">User ID</label>
                                                    <input type="text" required="required" value="<?php echo $row->user_number; ?>" name="" readonly class="form-control" id="inputEmail4">
                                                </div> -->
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">First Name</label>
                                                    <input type="text" required="required" value="<?php echo $row->user_fname; ?>" name="user_fname" class="form-control" id="inputEmail4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                    <input required="required" type="text" value="<?php echo $row->user_lname; ?>" name="user_lname" class="form-control" id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-6" style="display: none;">
                                                    <label for="inputPassword4" class="col-form-label">Category</label>
                                                    <input required="required" type="text" value="<?php echo $row->user_cat; ?>" name="user_cat" class="form-control" id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Specialization</label>
                                                    <select id="inputState" required="required" name="user_dept" class="form-control">
                                                        <option <?= $row->user_dept == 'Infostaff' ? ' selected="selected"' : ''; ?>>Infostaff</option>
                                                        <option <?= $row->user_dept == 'Pharmacy' ? ' selected="selected"' : ''; ?>>Pharmacy</option>
                                                        <option <?= $row->user_dept == 'Medtech' ? ' selected="selected"' : ''; ?>>Medtech</option>
                                                        <option <?= $row->user_dept == 'Nurse' ? ' selected="selected"' : ''; ?>>Nurse</option>
                                                        <option <?= $row->user_dept == 'Billing' ? ' selected="selected"' : ''; ?>>Billing</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress" class="col-form-label">Email</label>
                                                    <input required="required" type="email" value="<?php echo $row->user_email; ?>" class="form-control" name="user_email" id="inputAddress">

                                                </div>
                                            </div>



                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Password</label>
                                                    <input required="required" type="password" name="user_pwd" class="form-control" id="inputCity">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Profile Picture</label>
                                                    <input type="file" style="background-color: #800;" name="user_dpic" class="btn btn-success form-control" id="inputCity" value="<?php echo $row->user_dpic; ?>">
                                                </div>
                                            </div>

                                            <div>
                                                <button type="submit" name="update_user" style="background-color: #800;" class="ladda-button btn btn-success my-2" data-style="expand-right">Update User</button>

                                            </div>



                                        </form>
                                        <!--End User Form-->
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