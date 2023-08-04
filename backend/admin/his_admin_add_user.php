<!--Server side code to handle  User Registration-->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['add_user']))
		{
			$user_fname=$_POST['user_fname'];
			$user_lname=$_POST['user_lname'];
			$user_number=$_POST['user_number'];
            $user_cat=$_POST['user_cat'];
            $user_dept=$_POST['user_dept'];
            $user_email=$_POST['user_email'];
            $user_pwd=sha1(md5($_POST['user_pwd']));
            
            //sql to insert captured values
			$query="INSERT INTO his_user (user_fname, user_lname, user_number,user_cat,user_dept, user_email, user_pwd) values(?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssss', $user_fname, $user_lname, $user_number,$user_cat,$user_dept, $user_email, $user_pwd);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "User Details Added";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}
			
			
		}
?>
<!--End Server Side-->
<!--End User Registration-->
<!DOCTYPE html>
<html lang="en">
    
    <!--Head-->
    <?php include('assets/inc/head.php');?>
    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include("assets/inc/nav.php");?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include("assets/inc/sidebar.php");?>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                                            <li class="breadcrumb-item active">Add User</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add User Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Fill all fields</h4>
                                        <!--Add Patient Form-->
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">First Name</label>
                                                    <input type="text" required="required" name="user_fname" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                    <input required="required" type="text" name="user_lname" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-2" style="display:none">
                                                    <?php 
                                                        $length = 5;    
                                                       $patient_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                    ?>
                                                    <label for="inputZip" class="col-form-label">Doctor Number</label>
                                                    <input type="text" name="user_number" value="<?php echo $patient_number;?>" class="form-control" id="inputZip">
                                                </div> 

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Email</label>
                                                <input required="required" type="email" class="form-control" name="user_email" id="inputAddress">
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Category</label>
                                                    <input type="text" required="required" name="user_cat" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Specialization</label>
                                                    <input required="required" type="text" name="user_dept" class="form-control"  id="inputPassword4">
                                                </div>
                                            

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Password</label>
                                                    <input required="required" type="password" name="user_pwd" class="form-control" id="inputCity">
                                                </div>
                                                
                                            </div>

                                            <button type="submit" name="add_user" class="ladda-button btn btn-success" data-style="expand-right">Add User</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include('assets/inc/footer.php');?>
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