<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
  if(isset($_GET['delete']))
  {
        $id=intval($_GET['delete']);
        $adn="delete from his_rooms_beds where room_id=?";
        $stmt= $mysqli->prepare($adn);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	 
  
          if($stmt)
          {
            $success = "Rooms successfully deleted";
          }
            else
            {
                $err = "Try Again Later";
            }
    }
?>


<?php
	include('assets/inc/config.php');
        if(isset($_POST['add_rooms']))
        
        {
            $room_bldg = $_POST['room_bldg'];
		    $room_bname = $_POST['room_bname'];
			$room_fname = $_POST['room_fname'];
            $room_number = $_POST['room_number'];
            $room_status = $_POST['room_status'];
            $room_beds_number = $_POST['room_beds_number'];
            $room_classification = $_POST['room_classification'];
            $room_station = $_POST['room_station'];
            $room_fea = $_POST['room_fea'];
                
            //sql to insert captured values
			$query="INSERT INTO his_rooms_beds (room_bldg, room_bname, room_fname, room_number, room_status, room_beds_number, room_classification,room_station,room_fea) VALUES (?,?,?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssssss', $room_bldg, $room_bname, $room_fname, $room_number, $room_status, $room_beds_number, $room_classification, $room_station,$room_fea);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Room Added";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}
			
			
		}
?>

<!DOCTYPE html>
<html lang="en">
    
<?php include('assets/inc/head.php');?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
                <?php include('assets/inc/nav.php');?>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Rooms and Beds</a></li>
                                            <li class="breadcrumb-item active">View Rooms and Beds</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>    

                        <!-- end page title --> 

                                <div class="row">
                                <div class="mb-2">
                                        <div class="row">
                                            <div class="col-12 text-sm-center form-inline" >
                                                <div class="form-group mr-2" style="display:none">
                                                    <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                                        <option value="">Show all</option>
                                                        <option value="Discharged">Discharged</option>
                                                        <option value="OutPatients">OutPatients</option>
                                                        <option value="InPatients">InPatients</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <div class="col-15">
                                <div class="card-box">
                                <div class="col-md-12 d-flex justify-content-end">
                            <!-- Trigger the modal with a button -->
                            <button type="button" class="	fa fa-plus lg-2 bi-plus btn btn-success btn-lg-2 " 
                            data-toggle="modal" data-target="#myModal">  Add Room/Beds </button>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header ">
                                    Fill all fields
                                    </div>
                                    <div class="modal-body">
                                    <div class="card-body">
                                        <!--Add Patient Form-->
                                        <form method="post">
                                            <div class="form-row">
                                            <div class="form-group col-md-7">
                                                    <label for="inputState" class="col-form-label">Building Name</label>
                                                    <select id="inputState" required="required" name="room_bldg" class="form-control">
                                                        <option>Choose</option>
                                                        <option>Building 1</option>
                                                        <option>Building 2</option>
                                                        <option>Building 3</option>
                                                        <option>Building 4</option>
                                                        <option>Building 5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="inputState" class="col-form-label">Branch Name</label>
                                                    <select id="inputState" required="required" name="room_bname" class="form-control">
                                                        <option>Choose</option>
                                                        <option>Main</option>
                                                        <option>Central</option>
                                                        <option>Minor</option>
                                                        <option>Secondary</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="inputState" class="col-form-label">Floor Name</label>
                                                    <select id="inputState" required="required" name="room_fname" class="form-control">
                                                        <option>Choose</option>
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
                                                <div class="form-group col-md-7">
                                                    <label for="inputEmail4" class="col-form-label">Room No.</label>
                                                    <input type="text" required="required" name="room_number" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">No. of Beds</label>
                                                    <input type="text" required="required" name="room_beds_number" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Room Status</label>
                                                    <select id="inputState" required="required" name="room_status" class="form-control">
                                                        <option>Choose</option>
                                                        <option>Available</option>
                                                        <option>Occupied</option>
                                                        <option>Fully Occupied</option>
                                                        <option>For Renovation</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Room Classification</label>
                                                    <select id="inputState" required="required" name="room_classification" class="form-control">
                                                        <option>Choose</option>
                                                        <option>PRIVATE</option>
                                                        <option>SEMI PRIVATE</option>
                                                        <option>WARD</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Nursing Station</label>
                                                    <input type="text" required="required" name="room_station" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6" style="style:display-none">
                                                <label for="inputAddress" class="col-form-label">Room feature</label>
                                                <textarea required="required" type="text" class="form-control" name="room_fea" id="editor"></textarea>
                                                </div> 
                                 
                                            </div>
                                            <div>

                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>  
                                           <button type="submit" name="add_rooms" class="ladda-button btn btn-primary" data-style="expand-right">Save changes</button>
                                           

                                            </div>

                                        </form>
                                     
                                    </div>
                                    </div>
                                </div>
                                
                                </div>
                            </div>
                            
                            </div>

                                <a href="" class="dropdown-item">
                                            <i class=""></i>
                                                 <span> </span>
                                        </a> 

                                    
                                    <div class="table-responsive">
                                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th data-toggle="true">Building Name</th>
                                                <th data-toggle="true">Branch Name</th>
                                                <th data-hide="phone">Floor Name</th>
                                                <th data-hide="phone">Room No.</th>
                                                <th data-hide="phone">No. of Beds</th>
                                                <th data-hide="phone">Room Status</th>
                                                <th data-hide="phone">Room Classification</th>
                                                <th data-hide="phone">Nursing Station</th>
                                                <th data-hide="phone">Room Feature</th>
                                                <th data-hide="phone">Action</th>
                                                
                                            </tr>
                                            </thead>
                                            <?php
                                            /*
                                                *get details of allpatients
                                                *
                                            */
                                                $ret="SELECT * FROM  his_rooms_beds ORDER BY RAND() "; 
                                                $stmt= $mysqli->prepare($ret) ;
                                                $stmt->execute() ;//ok
                                                $res=$stmt->get_result();
                                                $cnt=1;
                                                while($row=$res->fetch_object())
                                                {
                                            ?>

                                                <tbody>
                                                <tr>
                                                    <td><?php echo $cnt;?></td>
                                                    <td><?php echo $row->room_bldg;?></td>
                                                    <td><?php echo $row->room_bname;?></td>
                                                    <td><?php echo $row->room_fname;?></td>
                                                    <td><?php echo $row->room_number;?></td>
                                                    <td><?php echo $row->room_beds_number;?></td>
                                                    <td><?php echo $row->room_status;?></td>
                                                    <td><?php echo $row->room_classification;?></td>
                                                    <td><?php echo $row->room_station;?></td>
                                                    <td><?php echo $row->room_fea;?></td>
                                                    <td>
                                                        <a href="his_admin_view_room.php?room_number=<?php echo $row->room_number;?>" class="badge badge-success"><i class="far fa-eye "></i> View</a>
                                                        <a href="his_admin_update_room.php?room_number=<?php echo $row->room_number;?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                        <a href="his_admin_swu_room.php?delete=<?php echo $row->room_id;?>" class="badge badge-danger"><i class=" mdi mdi-trash-can-outline "></i> Delete</a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            <?php  $cnt = $cnt +1 ; }?>
                                           <!-- <tfoot>
                                            <tr class="active">
                                                <td colspan="8">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tfoot> -->
                                        </table>
                                    </div> <!-- end .table-responsive-->
                                </div> <!-- end card-box -->
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

        <!-- Footable js -->
        <script src="assets/libs/footable/footable.all.min.js"></script>

        <!-- Init js -->
        <script src="assets/js/pages/foo-tables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>