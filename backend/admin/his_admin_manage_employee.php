<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
  if(isset($_GET['delete']))
  {
        $id=intval($_GET['delete']);
        $adn="delete from his_docs where doc_id=?";
        $stmt= $mysqli->prepare($adn);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	 
  
          if($stmt)
          {
            $success = "Consultant Deleted";
          }
            else
            {
                $err = "Try Again Later";
            }
    }
    
?>

<?php

		if(isset($_POST['add_doc']))
		{
			$doc_fname=$_POST['doc_fname'];
			$doc_lname=$_POST['doc_lname'];
			$doc_number=$_POST['doc_number'];
            $doc_cat=$_POST['doc_cat'];
            $doc_dept=$_POST['doc_dept'];
            $doc_email=$_POST['doc_email'];
            
            //sql to insert captured values
			$query="INSERT INTO his_docs (doc_fname, doc_lname, doc_number,doc_cat,doc_dept, doc_email) values(?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssss', $doc_fname, $doc_lname, $doc_number,$doc_cat,$doc_dept, $doc_email, );
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Consultant Details Added";
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Consultant</a></li>
                                            <li class="breadcrumb-item active">Manage Consultant</li>
                                        </ol>
                                    </div>
                                    <div>
                                        <!--<a href="his_admin_add_employee.php" class="dropdown-item">
                                            <i class="fe-users mr-2"></i>
                                             <span>Add Consultant</span>
                                        </a>-->
                                    </div>

                                    
                                    
                                </div>
                                
                            </div>
                        </div>   
                        
                        
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                
                                <div class="card-box">

                                
                        <div class="col-md-12 d-flex justify-content-end">
                            <!-- Trigger the modal with a button -->
                            <button type="button" class="fa fa-plus lg-4 bi-plus btn btn-success btn-lg-2"
                             data-toggle="modal" data-target="#myModal">  Add Consultant</button>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                    Fill all fields
                                    </div>
                                    <div class="modal-body">
                                    <div class="card-body">
                                        <!--Add Patient Form-->
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">First Name</label>
                                                    <input type="text" required="required" name="doc_fname" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                    <input required="required" type="text" name="doc_lname" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-2" style="display:none">
                                                    <?php 
                                                        $length = 5;    
                                                        $doc_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                    ?>
                                                    <label for="inputZip" class="col-form-label">Doctor Number</label>
                                                    <input type="text" name="doc_number" value="<?php echo $doc_number;?>" class="form-control" id="inputZip">
                                                </div> 
                                                <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Email</label>
                                                <input required="required" type="email" class="form-control" name="doc_email" id="inputAddress">
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Category</label>
                                                    <select id="inputState" required="required" name="doc_cat" class="form-control">
                                                        <option>Choose</option>
                                                        <option>Resident</option>
                                                        <option>Regular Consultant</option>
                                                        <option>Visiting Consultant</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label for="inputState" class="col-form-label">Specialization</label>
                                                    <select id="inputState" required="required" name="doc_dept" class="form-control">
                                                        <option>Choose</option>
                                                        <option>Obstetrics </option>
                                                        <option>Medicine</option>
                                                        <option>Pediatrics</option>
                                                        <option>Gynecology</option>
                                                        <option>Pathology</option>
                                                        <option>Anesthesiology</option>
                                                        <option>Ophthalmology</option>
                                                        <option>Surgery</option>
                                                        <option>Psychiatry </option>
                                                        <option>Neurology</option>
                                                    </select>
                                                </div>
                                 
                                            </div>
                                            <div>

                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>  
                                           <button type="submit" name="add_doc" class="ladda-button btn btn-primary" data-style="expand-right">Save changes</button>
                                           

                                            </div>

                                        </form>
                                     
                                    </div>
                                    </div>
                                </div>
                                
                                </div>
                            </div>
                            
                            </div>

                                    
                                    <h4 class="header-title"></h4>

                                    
                                    
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
                                    
                                    <div class="table-responsive">
                                        
                                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th data-hide="phone">Code</th>
                                                <th data-toggle="true">Category</th>
                                                <th data-hide="phone">Specialization</th>
                                                <th data-toggle="true">Name</th>
                                                <th data-hide="phone">Email</th>
                                                <th data-hide="phone">Action</th>
                                            </tr>
                                            </thead>
                                            <?php
                                            /*
                                                *get details of allpatients
                                                *
                                            */
                                                $ret="SELECT * FROM  his_docs ORDER BY RAND() "; 
                                                //sql code to get to ten docs  randomly
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
                                                    <td><?php echo $row->doc_number;?></td>
                                                    <td><?php echo $row->doc_cat;?></td>
                                                    <td><?php echo $row->doc_dept;?></td>
                                                    <td><?php echo $row->doc_fname;?> <?php echo $row->doc_lname;?></td>
                                                    <td><?php echo $row->doc_email;?></td>
                                                    <td>
                                                        <a href="his_admin_manage_employee.php?delete=<?php echo $row->doc_id;?>" class="badge badge-danger"><i class=" mdi mdi-trash-can-outline "></i> Delete</a>
                                                        <a href="his_admin_view_single_employee.php?doc_id=<?php echo $row->doc_id;?>&&doc_number=<?php echo $row->doc_number;?>" class="badge badge-success"><i class="mdi mdi-eye"></i> View</a>
                                                        <a href="his_admin_update_single_employee.php?doc_number=<?php echo $row->doc_number;?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            <?php  $cnt = $cnt +1 ; }?>
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