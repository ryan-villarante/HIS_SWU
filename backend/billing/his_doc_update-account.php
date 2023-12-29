<?php
session_start();
include('assets/inc/config.php');
if (isset($_POST['update_profile'])) {
    $user_fname = $_POST['user_fname'];
    $user_lname = $_POST['user_lname'];
    $user_id = $_SESSION['user_id'];
    $user_email = $_POST['user_email'];
    // $doc_pwd=sha1(md5($_POST['doc_pwd']));
    $user_dpic = $_FILES["user_dpic"]["name"];
    move_uploaded_file($_FILES["user_dpic"]["tmp_name"], "../admin/assets/images/users/" . $_FILES["user_dpic"]["name"]);

    //sql to insert captured values
    $query = "UPDATE his_user SET user_fname=?, user_lname=?,  user_email=?, user_dpic=? WHERE user_id = ?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssi', $user_fname, $user_lname, $user_email, $user_dpic, $user_id);
    $stmt->execute();
    /*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Profile Updated";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}
//Change Password
if (isset($_POST['update_pwd'])) {
    $user_number = $_SESSION['user_number'];
    $user_pwd = sha1(md5($_POST['user_pwd'])); //double encrypt 

    //sql to insert captured values
    $query = "UPDATE his_user SET user_pwd =? WHERE user_number = ?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('si', $user_pwd, $user_number);
    $stmt->execute();
    /*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Password Updated";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}
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
        <?php include('assets/inc/sidebar.php'); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <?php
        $user_id = $_SESSION['user_id'];
        $ret = "SELECT * FROM  his_user where user_id=?";
        $stmt = $mysqli->prepare($ret);
        $stmt->bind_param('i', $user_id);
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Profile</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"> Profile</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-4 col-xl-4">
                                <div class="card-box text-center">
                                    <img src="../admin/assets/images/users/<?php echo $row->user_dpic; ?>" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image" style="border-color: #800;">


                                    <div class="text-centre mt-3">

                                        <p class="text-muted mb-2 font-13"><strong>User Full Name :</strong> <span class="ml-2"><?php echo $row->user_fname; ?> <?php echo $row->user_lname; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>User Department :</strong> <span class="ml-2"><?php echo $row->user_dept; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>user Number :</strong> <span class="ml-2"><?php echo $row->user_number; ?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>User Email :</strong> <span class="ml-2"><?php echo $row->user_email; ?></span></p>


                                    </div>

                                </div> <!-- end card-box -->

                            </div> <!-- end col-->

                            <div class="col-lg-8 col-xl-8">
                                <div class="card-box">
                                    <ul class="nav nav-pills navtab-bg nav-justified">
                                        <li class="nav-item">
                                            <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Update Profile
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                Change Password
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="aboutme">

                                            <form method="post" enctype="multipart/form-data">
                                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="firstname">First Name</label>
                                                            <input type="text" name="user_fname" class="form-control" id="firstname" value="<?php echo $row->user_fname; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lastname">Last Name</label>
                                                            <input type="text" name="user_lname" class="form-control" id="lastname" value="<?php echo $row->user_lname; ?>">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="useremail">Email Address</label>
                                                            <input type="email" name="user_email" class="form-control" id="useremail" value="<?php echo $row->user_email; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="useremail">Profile Picture</label>
                                                            <input type="file" name="user_dpic" style="background-color: #800;" class="form-control btn btn-secondary" id="useremail">
                                                        </div>
                                                    </div>

                                                </div> <!-- end row -->



                                                <div class="text-right">
                                                    <button type="submit" name="update_profile" class="btn maroon-outline-btn waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                                </div>
                                            </form>


                                        </div> <!-- end tab-pane -->
                                        <!-- end about me section content -->



                                        <div class="tab-pane" id="settings">
                                            <form method="post">
                                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="firstname">Old Password</label>
                                                            <input type="password" class="form-control" id="firstname" placeholder="Enter Old Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lastname">New Password</label>
                                                            <input type="password" class="form-control" name="user_pwd" id="lastname" placeholder="Enter New Password">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->

                                                <div class="form-group">
                                                    <label for="useremail">Confirm Password</label>
                                                    <input type="password" class="form-control" id="useremail" placeholder="Confirm New Password">
                                                </div>

                                                <div class="text-right">
                                                    <button type="submit" style="background-color: #800;" name="update_pwd" class="btn btn-secondary waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Update Password</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end settings content-->

                                    </div> <!-- end tab-content -->
                                </div> <!-- end card-box-->

                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include("assets/inc/footer.php"); ?>
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