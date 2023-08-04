<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
  if(isset($_GET['delete']))
  {
        $id=intval($_GET['delete']);
        $adn="delete from his_guarantors where g_id=?";
        $stmt= $mysqli->prepare($adn);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	 
  
          if($stmt)
          {
            $success = "Guarantor successfully deleted";
          }
            else
            {
                $err = "Try Again Later";
            }
    }
?>

<?php
		if(isset($_POST['add_guarantor']))
		{
			$g_code=$_POST['g_code'];
			$g_gid=$_POST['g_gid'];
			$g_name=$_POST['g_name'];
            $g_tele=$_POST['g_tele'];
            $g_fax=$_POST['g_fax'];
            $g_email=$_POST['g_email'];
            $g_address=$_POST['g_address'];
            
            //sql to insert captured values
			$query="INSERT INTO his_guarantors (g_code, g_gid, g_name,g_tele,g_fax, g_email, g_address) values(?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssss', $g_code, $g_gid, $g_name,$g_tele,$g_fax, $g_email, $g_address);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Guarantor Details Added";
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Guarantors</a></li>
                                            <li class="breadcrumb-item active">Guarantors</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

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


                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">

                                <div class="col-15">
                                <div class="card-box">
                                <div class="col-md-12 d-flex justify-content-end">
                            <!-- Trigger the modal with a button -->
                            <button type="button" class="	fa fa-plus lg-2 bi-plus btn btn-success btn-lg-2 " 
                            data-toggle="modal" data-target="#myModal">  Add Guarantor </button>

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
                                            <div class="form-group col-md-3">
                                                    <label for="inputEmail4" class="col-form-label">Code</label>
                                                    <input type="text" required="required" name="g_code" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">ID</label>
                                                    <input required="required" type="text" name=g_gid class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-5">
                                                <label for="inputAddress" class="col-form-label">Guarantor Name</label>
                                                <input required="required" type="text" class="form-control" name="g_name" id="inputAddress">
                                                </div>
                                             <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Telephone No.</label>
                                                    <input type="text" required="required" name="g_tele" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Fax No.</label>
                                                    <input required="required" type="text" name="g_fax" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Email Address</label>
                                                    <input required="required" type="text" name="g_email" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Address</label>
                                                    <input required="required" type="text" name="g_address" class="form-control"  id="inputPassword4">
                                                </div> 
                                            </div>

                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>  
                                           <button type="submit" name="add_guarantor" class="ladda-button btn btn-primary" data-style="expand-right">Save changes</button>
                                           

                                            

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
                                                <th data-toggle="true">Code</th>
                                                <th data-toggle="true">ID</th>
                                                <th data-hide="phone">Guarantor Name</th>
                                                <th data-hide="phone">Telephone No.</th>
                                                <th data-hide="phone">Fax No.</th>
                                                <th data-hide="phone">Email Address </th>
                                                <th data-hide="phone">Address</th>
                                                <th data-hide="phone">Action</th>
                                            </tr>
                                            </thead>
                                            <?php
                                            /*
                                                *get details of allpatients
                                                *
                                            */
                                                $ret="SELECT * FROM  his_guarantors ORDER BY RAND() "; 
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
                                                    <td><?php echo $row->g_code;?></td>
                                                    <td><?php echo $row->g_gid;?></td>
                                                    <td><?php echo $row->g_name;?></td>
                                                    <td><?php echo $row->g_tele;?></td>
                                                    <td><?php echo $row->g_fax;?></td>
                                                    <td><?php echo $row->g_email;?></td>
                                                    <td><?php echo $row->g_address;?></td>
                                                    <td>
                                                        <a href="his_admin_view_guarantor.php?g_id=<?php echo $row->g_id;?>" class="badge badge-success"><i class="far fa-eye "></i> View</a>
                                                        <a href="his_admin_update_guarantor.php?g_code=<?php echo $row->g_code;?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                        <a href="his_admin_swu_guarantors.php?delete=<?php echo $row->g_id;?>" class="badge badge-danger"><i class=" mdi mdi-trash-can-outline "></i> Delete</a>
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