<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['update_rooms']))
		{
			$room_bldg = $_POST['room_bldg'];
			$room_bname = $_POST['room_bname'];
            $room_fname = $_POST['room_fname'];
            $room_number = $_GET['room_number'];
            $room_status = $_POST['room_status'];
            $room_beds_number = $_POST['room_beds_number'];
            $room_classification = $_POST['room_classification'];
            $room_station = $_POST['room_station'];
            $room_fea = $_POST['room_fea'];
            
            
            //sql to update captured values
			$query="UPDATE  his_rooms_beds SET  room_bldg=?,room_bname=?,room_fname=?,room_status=?,room_beds_number=?,room_classification=?,room_station=?,room_fea=? WHERE room_number = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssssss',  $room_bldg, $room_bname, $room_fname, $room_status, $room_beds_number, $room_classification, $room_station, $room_fea, $room_number );
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Rooms Updated ";
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
                                            <li class="breadcrumb-item"><a href="his_admin_swu_room.php">Rooms and Beds</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Update Rooms and Bed Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <?php
                            $room_number=$_GET['room_number'];
                            $ret="SELECT  * FROM his_rooms_beds WHERE room_number=?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('s',$room_number);
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
                                            <div class="form-group col-md-2">
                                                    <label for="inputState" class="col-form-label">Building Name</label>
                                                    <select id="inputState" required="required" value="<?php echo $row->room_bldg;?>" name="room_bldg" class="form-control">
                                                        <option>Building 1</option>
                                                        <option>Building 2</option>
                                                        <option>Building 3</option>
                                                        <option>Building 4</option>
                                                        <option>Building 5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputState" class="col-form-label">Branch Name</label>
                                                    <select id="inputState" required="required" value="<?php echo $row->room_bname;?>" name="room_bname" class="form-control">
                                                        <option>Main</option>
                                                        <option>Central</option>
                                                        <option>Minor</option>
                                                        <option>Secondary</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputState" class="col-form-label">Floor Name</label>
                                                    <select id="inputState" required="required" value="<?php echo $row->room_fname;?>" name="room_fname" class="form-control">
                                                        <option>1st Central Wing</option>
                                                        <option>2nd Central Wing</option>
                                                        <option>3rd Central Wing</option>
                                                        <option>4th Central Wing</option>
                                                        <option>1st East Wing</option>
                                                        <option>2nd East Wing</option>
                                                        <option>3rd East Wing</option>
                                                        <option>4th East Wing</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail4" class="col-form-label">Room No.</label>
                                                    <input type="text" required="required" value="<?php echo $row->room_number;?>" name="room_number" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label for="inputEmail4" class="col-form-label">No. of Beds</label>
                                                    <input type="text" required="required" value="<?php echo $row->room_beds_number;?>" name="room_beds_number" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputState" class="col-form-label">Room Status</label>
                                                    <select id="inputState" required="required" value="<?php echo $row->room_status;?>" name="room_status" class="form-control">
                                                        <option>Available</option>
                                                        <option>Occupied</option>
                                                        <option>Fully Occupied</option>
                                                        <option>For Renovation</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputState" class="col-form-label">Room Classification</label>
                                                    <select id="inputState" required="required" value="<?php echo $row->room_classification;?>" name="room_classification" class="form-control">
                                                        <option>PRIVATE</option>
                                                        <option>SEMI PRIVATE</option>
                                                        <option>WARD</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail4" class="col-form-label">Nursing Station</label>
                                                    <input type="text" required="required" value="<?php echo $row->room_station;?>" name="room_station" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-5" style="style:display-none">
                                                <label for="inputAddress" class="col-form-label">Room feature</label>
                                                <textarea required="required" value="<?php echo $row->room_fea;?>" type="text" class="form-control" name="room_fea" id="editor"></textarea>
                                                </div> 
                                                </div>
                                            <div>
                                            <button type="submit" name="update_rooms" class="ladda-button btn btn-success" data-style="expand-right">Update Room</button>
                                            </div>
                        
                                        
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