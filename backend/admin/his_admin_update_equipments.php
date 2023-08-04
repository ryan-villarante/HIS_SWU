<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['update_equipments']))
		{
			$item_code = $_GET['item_code'];
			$item_desc = $_POST['item_desc'];
            $item_category = $_POST['item_category'];
            $item_abb = $_POST['item_abb'];
            $item_unit = $_POST['item_unit'];
            $item_big = $_POST['item_big'];
            $item_conv = $_POST['item_conv'];
            $item_bar = $_POST['item_bar'];
            
            
            //sql to update captured values
			$query="UPDATE  his_equipments SET  item_desc=?,item_category=?,item_abb=?,item_unit=?,item_big=?,item_conv=?,item_bar=? WHERE item_code = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssssss',  $item_desc, $item_category, $item_abb, $item_unit, $item_big, $item_conv, $item_bar, $item_code );
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
                                            <li class="breadcrumb-item"><a href="his_admin_equipments_inventory_copy.php">Equipments</a></li>
                                            <li class="breadcrumb-item active">Drugs and Medicines</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Update Equipment Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <?php
                            $item_code=$_GET['item_code'];
                            $ret="SELECT  * FROM his_equipments WHERE item_code=?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('s',$item_code);
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
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Code</label>
                                                    <input type="text" required="required" value="<?php echo $row->item_code;?>" name="item_code" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Item Category</label>
                                                    <input required="required" type="text" value="<?php echo $row->item_category;?>" name="item_category" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Item Description</label>
                                                    <input type="text" required="required" value="<?php echo $row->item_desc;?>" name="item_desc" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Abbreviation</label>
                                                    <input required="required" type="text" value="<?php echo $row->item_abb;?>" name="item_abb" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Unit</label>
                                                    <input type="text" required="required" value="<?php echo $row->item_unit;?>" name="item_unit" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Big Unit</label>
                                                    <input type="text" required="required" value="<?php echo $row->item_big;?>" name="item_big" class="form-control" id="inputEmail4" >
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Conversion</label>
                                                    <input type="text" required="required" value="<?php echo $row->item_conv;?>" name="item_conv" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Barcode ID</label>
                                                    <input required="required" type="text" value="<?php echo $row->item_bar;?>" name="item_bar" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>
                                            
                                           <!-- <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Profile Picture</label>
                                                    <input required="required"  type="file" name="doc_dpic" class="btn btn-success form-control"  id="inputCity">
                                                </div>
                                           </div> -->                                           

                                            <button type="submit" name="update_equipments" class="ladda-button btn btn-success" data-style="expand-right">Update Equipment</button>

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