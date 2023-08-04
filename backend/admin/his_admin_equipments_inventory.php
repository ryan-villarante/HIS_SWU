<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
  if(isset($_GET['delete']))
  {
        $id=intval($_GET['delete']);
        $adn="delete from his_equipments where item_id=?";
        $stmt= $mysqli->prepare($adn);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	 
  
          if($stmt)
          {
            $success = "Item successfully deleted";
          }
            else
            {
                $err = "Try Again Later";
            }
    }
?>
<?php
        if(isset($_POST['add_equipments']))
        
        {
            $item_code = $_POST['item_code'];
		    $item_desc = $_POST['item_desc'];
			$item_category = $_POST['item_category'];
            $item_abb = $_POST['item_abb'];
            $item_unit = $_POST['item_unit'];
            $item_big = $_POST['item_big'];
            $item_conv = $_POST['item_conv'];
            $item_bar = $_POST['item_bar'];
                
            //sql to insert captured values
			$query="INSERT INTO his_equipments (item_code, item_desc, item_category, item_abb, item_unit, item_big, item_conv,item_bar) VALUES (?,?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssssss', $item_code, $item_desc, $item_category, $item_abb, $item_unit, $item_big, $item_conv, $item_bar);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Equipment Added";
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                                            <li class="breadcrumb-item active">Drugs and Medicines</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 


                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <!--<div>
                                        <a href="his_admin_add_equipment.php" class="dropdown-item">
                                            <i class="fe-shopping-cart mr-1"></i>
                                                 <span> Add New Equipment</span>
                                        </a> 
                                    </div>-->


                        <div class="container">
                            <!-- Trigger the modal with a button -->
                            <button type="button" class="fe-shopping-cart lg-3 bi-plus btn btn-success btn-lg-2" data-toggle="modal" data-target="#myModal">  Add Item</button>

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
                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail4" class="col-form-label">Code</label>
                                                    <input type="text" required="required" name="item_code" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <label for="inputPassword4" class="col-form-label">Item Category</label>
                                                    <input required="required" type="text" name="item_category" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Item Description </label>
                                                    <input required="required" type="text"  name="item_desc" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-"6>
                                                    <label for="inputEmail4" class="col-form-label">Abbreviation</label>
                                                    <input type="text" required="required" name="item_abb" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Unit</label>
                                                    <input type="text" required="required" name="item_unit" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Big Unit</label>
                                                    <input type="text" required="required" name="item_big" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail4" class="col-form-label">Conversion</label>
                                                    <input type="text" required="required" name="item_conv" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="inputEmail4" class="col-form-label">Barcode ID</label>
                                                    <input type="text" required="required" name="item_bar" class="form-control" id="inputEmail4" >
                                                </div>
                                            </div>

                                           <!-- <div class="form-group">
                                                    <label for="inputPassword4" class="col-form-label">Equipment Barcode</label>
                                                     <?php 
                                                        $length = 10;    
                                                        $bcode =  substr(str_shuffle('0123456789'),1,$length);
                                                    ?>
                                                    <input required="required" readonly type="text" value="<?php echo $bcode;?>" name="item_code" class="form-control"  id="inputPassword4">
                                            </div> 

                                            <div class="form-group" style="style:display-none">
                                                <label for="inputAddress" class="col-form-label">Pharmaceutical Category Description</label>
                                                <textarea required="required" type="text" class="form-control" name="item_desc" id="editor"></textarea>
                                            </div> -->
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>  
                                           <button type="submit" name="add_equipments" class="ladda-button btn btn-primary" data-style="expand-right">Save changes</button>
                                           
                                        </form>
                                     
                                    </div>
                                    </div>
                                </div>
                                
                                </div>
                            </div>
                            
                            </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
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
                                    <div>

                                    </div>
                              
                                    <div class="table-responsive">
                                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th data-toggle="true">Code</th>
                                                <th data-hide="phone">Item Category</th>
                                                <th data-toggle="true">Item Description</th>
                                                <th data-hide="phone">Abbreviation</th>
                                                <th data-hide="phone">Unit</th>
                                                <th data-hide="phone">Big Unit</th>
                                                <th data-hide="phone">Conversion</th>
                                                <th data-hide="phone">Barcode ID</th>
                                                <th data-hide="phone">Action</th>
                                                
                                            </tr>
                                            </thead>
                                            <?php
                                            /*
                                                *get details of allpatients
                                                *
                                            */
                                                $ret="SELECT * FROM  his_equipments ORDER BY RAND() "; 
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
                                                    <td><?php echo $row->item_code;?></td>
                                                    <td><?php echo $row->item_category;?></td>
                                                    <td><?php echo $row->item_desc;?></td>
                                                    <td><?php echo $row->item_abb;?></td>
                                                    <td><?php echo $row->item_unit;?></td>
                                                    <td><?php echo $row->item_big;?></td>
                                                    <td><?php echo $row->item_conv;?></td>
                                                    <td><?php echo $row->item_bar;?></td>
                                                    <td>
                                                    <a href="his_admin_view_single_eqp.php?item_code=<?php echo $row->item_code;?>" class="badge badge-success"><i class="far fa-eye "></i> View</a>
                                                        <a href="his_admin_update_equipments.php?item_code=<?php echo $row->item_code;?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                        <a href="his_admin_equipments_inventory.php?delete=<?php echo $row->item_id;?>" class="badge badge-danger"><i class=" mdi mdi-trash-can-outline "></i> Delete</a>
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