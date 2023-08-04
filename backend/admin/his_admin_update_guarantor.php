<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['update_guarantors']))
		{
			$g_code = $_GET['g_code'];
			$g_gid = $_POST['g_gid'];
            $g_name = $_POST['g_name'];
            $g_tele = $_POST['g_tele'];
            $g_fax = $_POST['g_fax'];
            $g_email = $_POST['g_email'];
            $g_address = $_POST['g_address'];

            //sql to update captured values
			$query="UPDATE  his_guarantors SET g_gid=?,g_name=?,g_tele=?,g_fax=?,g_email=?,g_address=? WHERE g_code = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssss',  $g_gid, $g_name, $g_tele, $g_fax, $g_email, $g_address, $g_code );
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Equipment Updated ";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}
			
			
		}
?>
<!--End Server Side-->
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
                                            <li class="breadcrumb-item"><a href="his_admin_swu_guarantors.php">HMO Guarantors</a></li>
                                            <li class="breadcrumb-item active">HMO Guarantors</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Update Guarantor Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <?php
                            $g_code=$_GET['g_code'];
                            $ret="SELECT  * FROM his_guarantors WHERE g_code=?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('s',$g_code);
                            $stmt->execute() ;//ok
                            $res=$stmt->get_result();
                            //$cnt=1;
                            while($row=$res->fetch_object())
                             {
                         ?>      
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Fill all fields</h4>
                                        <!--Add Patient Form-->
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail4" class="col-form-label">Code</label>
                                                    <input type="text" required="required" value="<?php echo $row->g_code;?>" name="g_code" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputPassword4" class="col-form-label">ID</label>
                                                    <input required="required" type="text" value="<?php echo $row->g_gid;?>" name="g_gid" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Guarantor Name</label>
                                                    <input type="text" required="required" value="<?php echo $row->g_name;?>" name="g_name" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Telephone No.</label>
                                                    <input required="required" type="text" value="<?php echo $row->g_tele;?>" name="g_tele" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Fax No.</label>
                                                    <input type="text" required="required" value="<?php echo $row->g_fax;?>" name="g_fax" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Email Address</label>
                                                    <input type="text" required="required" value="<?php echo $row->g_email;?>" name="g_email" class="form-control" id="inputEmail4" >
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Address</label>
                                                    <input type="text" required="required" value="<?php echo $row->g_address;?>" name="g_address" class="form-control" id="inputEmail4" >
                                                </div>
                                            </div>
                                            
                                           <!-- <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Profile Picture</label>
                                                    <input required="required"  type="file" name="doc_dpic" class="btn btn-success form-control"  id="inputCity">
                                                </div>
                                           </div> -->                                           

                                            <button type="submit" name="update_guarantors" class="ladda-button btn btn-success" data-style="expand-right">Update Guarantor</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        <?php }?>

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