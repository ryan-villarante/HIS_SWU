<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Transactions</a></li>
                                            <li class="breadcrumb-item active">Cash Receipt</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 


                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    Account Information
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
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <form method="post">
                                                            <div class="form-row">
                                                                <div class="form-row">
                                                                <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Payer Name</label>
                                                                        <input required="required" type="text" name="pat_age" class="form-control" id="inputPassword4" placeholder="Payer Name">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Credit Limit</label>
                                                                        <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" placeholder="Credit Limit" value="00.0">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Hospital Bill</label>
                                                                        <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" placeholder="Hospital Bill" value="00.0">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Professional Fee</label>
                                                                        <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" placeholder="Professional Fee" value="00.0">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Unapplied Deposit</label>
                                                                        <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" placeholder="Unapplied Deposit" value="00.0">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Outstanding</label>
                                                                        <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" placeholder="Outstanding" value="00.0">
                                                                    </div>

                                                                    <div class="form-row mt-3 ml-1">
                                                                        <div class="form-group col-md-3">
                                                                            <label for="inputPassword4" class="col-form-label fs-1 ml-1" style="position: absolute;">Receipt Document Details</label>
                                                                        </div>
                                                                        <div class="form-row mt-3">
                                                                            
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputPassword4" class="col-form-label">Document Type</label>
                                                                                <select id="inputState" required="required" name="pat_nurse" class="form-control">
                                                                                    <option>Official Receipt</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputPassword4" class="col-form-label">Series Type</label>
                                                                                <select id="inputState" required="required" name="pat_nurse" class="form-control">
                                                                                    <option>Official Receipt Series One</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputPassword4" class="col-form-label">Cash Flow Type</label>
                                                                                <select id="inputState" required="required" name="pat_nurse" class="form-control">
                                                                                    <option>Collection From Patients</option>
                                                                                    <option>Deposit Only?</option>
                                                                                    <option>None-Trade Transaction?</option>
                                                                                    <option>Co-payment?</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputPassword4" class="col-form-label">Contact Type</label>
                                                                                <select id="inputState" required="required" name="pat_nurse" class="form-control">
                                                                                    <option></option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputPassword4" class="col-form-label">Receipt No.</label>
                                                                                <select id="inputState" required="required" name="pat_nurse" class="form-control">
                                                                                    <option>OR1</option>
                                                                                    <option>OR2</option>
                                                                                    <option>OR3</option>
                                                                                </select>
                                                                                <input required="required" type="number" name="pat_age" class="form-control mt-1" id="inputPassword4" placeholder="Receipt No. Amount" value="00.0">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputPassword4" class="col-form-label">Receipt Date</label>
                                                                                <input required="required" type="Date" name="pat_age" class="form-control" id="inputPassword4" placeholder="Outstanding" value="00.0">
                                                                </div>
                                                                <div class="form-row mt-3 ml-1">
                                                                        <div class="form-group col-md-3">
                                                                            <label for="inputPassword4" class="col-form-label fs-1 ml-1" style="position: absolute;">Application Details</label>
                                                                        </div>
                                                                        <div class="form-row mt-3">
                                                                            
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputPassword4" class="col-form-label">Items and Services</label>
                                                                                <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" placeholder="Amount" value="00.0">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputPassword4" class="col-form-label">Professional Fee</label>
                                                                                <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" placeholder="Amount" value="00.0">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputPassword4" class="col-form-label">Rooms and Beds</label>
                                                                                <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" placeholder="Amount" value="00.0">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputPassword4" class="col-form-label">Other Receivables</label>
                                                                                <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" placeholder="Amount" value="00.0">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputPassword4" class="col-form-label">Miscellaneous</label>
                                                                                <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" placeholder="Amount" value="00.0">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputPassword4" class="col-form-label">None-Trade Transaction</label>
                                                                                <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" value="00.0">
                                                                    
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <b><label for="inputPassword4" class="col-form-label">Total Hospital Bill</label></b>
                                                                                <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" value="00.0">
                                                                    
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <b><label for="inputPassword4" class="col-form-label">Total Amount Applied</label></b>
                                                                                <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" value="00.0">
                                                                    
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="form-row mt-3 ml-1">
                                                                        <div class="form-group col-md-3">
                                                                            <b><label for="inputPassword4" class="col-form-label fs-1 ml-1" style="position: absolute;">Payment Details</label></b>
                                                                        </div>
                                                                        <div class="form-row mt-3">
                                                                            
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputPassword4" class="col-form-label">Cash Advances</label>
                                                                                <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" placeholder="Amount" value="00.0">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <b><label for="inputPassword4" class="col-form-label">Hospital Bill</label></b>
                                                                                <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" placeholder="Amount" value="00.0">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputPassword4" class="col-form-label">Cash</label>
                                                                                <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" placeholder="Amount" value="00.0">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputPassword4" class="col-form-label">Professional Fee</label>
                                                                                <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" placeholder="Amount" value="00.0">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputPassword4" class="col-form-label">Checks</label>
                                                                                <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" placeholder="Amount" value="00.0">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputPassword4" class="col-form-label">Other Receivables</label>
                                                                                <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" value="00.0">
                                                                    
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <b><label for="inputPassword4" class="col-form-label">Credit Cards</label></b>
                                                                                <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" value="00.0">
                                                                    
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <b><label for="inputPassword4" class="col-form-label">Other Credit Adjustment</label></b>
                                                                                <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" value="00.0">
                                                                    
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <b><label for="inputPassword4" class="col-form-label">Total Amount Paid</label></b>
                                                                                <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" value="00.0">
                                                                    
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <b><label for="inputPassword4" class="col-form-label">None-Trade Transaction</label></b>
                                                                                <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" value="00.0">
                                                                    
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <b><label for="inputPassword4" class="col-form-label">Unapplied Amount</label></b>
                                                                                <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" value="00.0">
                                                                    
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <b><label for="inputPassword4" class="col-form-label">Remarks. Notes</label></b>
                                                                                <Textarea rows="4" cols="40" class="form-control"></Textarea>
                                                                            </div>
                                                                        </div>
                                                                </div>

                                                                            
                                                                    
                                                                    
                                                    </form>
                                                    <div class="container-fluid">

                            <div class="col-lg-10 col-xl-12">
                                <div class="card-box">
                                    <ul class="nav nav-pills navtab-bg nav-justified">
                                        <li class="nav-item">
                                            <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Credit Cards
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                Checks
                                            </a>
                                        </li>

                                    </ul>



                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="aboutme">

                                            <form method="post" enctype="multipart/form-data">

                                                <div class="col-md-12 d-flex justify-content-end">

                                                    <!-- Trigger the modal with a button -->
                                                    <button type="button" class="	fa fa-plus lg-3 bi-plus btn btn-success btn-lg-2" data-toggle="modal" data-target="#myModal"> Add Credit Cards</button>

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
                                                                                    <input type="text" required="required" name="item_code" class="form-control" id="inputEmail4">
                                                                                </div>
                                                                                <div class="form-group col-md-9">
                                                                                    <label for="inputState" class="col-form-label">Item Category</label>
                                                                                    <select id="inputState" required="required" name="item_category" class="form-control">
                                                                                        <option>Choose</option>
                                                                                        <option>Medicine</option>
                                                                                        <option>Tablets and Capsules</option>
                                                                                        <option>Ampoules and Vials</option>
                                                                                        <option>Syrups,Suspensions and Drops</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="inputPassword4" class="col-form-label">Item Description </label>
                                                                                    <input required="required" type="text" name="item_desc" class="form-control" id="inputPassword4">
                                                                                </div>
                                                                                <div class="form-group col-md-" 6>
                                                                                    <label for="inputEmail4" class="col-form-label">Abbreviation</label>
                                                                                    <input type="text" required="required" name="item_abb" class="form-control" id="inputEmail4">
                                                                                </div>
                                                                                <div class="form-group col-md-9">
                                                                                    <label for="inputState" class="col-form-label">Unit</label>
                                                                                    <select id="inputState" required="required" name="item_unit" class="form-control">
                                                                                        <option>Choose</option>
                                                                                        <option>Ampule</option>
                                                                                        <option>Cap</option>
                                                                                        <option>Bottle</option>
                                                                                        <option>Vial</option>
                                                                                        <option>Pieces</option>
                                                                                        <option>Tablet</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group col-md-9">
                                                                                    <label for="inputState" class="col-form-label">Big Unit</label>
                                                                                    <select id="inputState" required="required" name="item_big" class="form-control">
                                                                                        <option>Choose</option>
                                                                                        <option>Ampule</option>
                                                                                        <option>Box</option>
                                                                                        <option>Pieces</option>
                                                                                        <option>Vial</option>
                                                                                        <option>Tablet</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group col-md-3">
                                                                                    <label for="inputEmail4" class="col-form-label">Conversion</label>
                                                                                    <input type="text" required="required" name="item_conv" class="form-control" id="inputEmail4">
                                                                                </div>
                                                                                <div class="form-group col-md-8">
                                                                                    <label for="inputEmail4" class="col-form-label">Barcode ID</label>
                                                                                    <input type="text" required="required" name="item_bar" class="form-control" id="inputEmail4">
                                                                                </div>
                                                                            </div>

                                                                            <!-- <div class="form-group">
                                                        <label for="inputPassword4" class="col-form-label">Equipment Barcode</label>
                                                        <?php
                                                            $length = 10;
                                                            $bcode = substr(str_shuffle('0123456789'), 1, $length);
                                                            ?>
                                                <input required="required" readonly type="text" value="<?php echo $bcode; ?>" name="item_code" class="form-control"  id="inputPassword4">
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

                                                <a href="" class="dropdown-item">
                                                    <i class=""></i>
                                                    <span> </span>
                                                </a>





                                                <div class="table-responsive">
                                                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th data-toggle="true">Card Name</th>
                                                                <th data-hide="phone">Card No.</th>
                                                                <th data-toggle="true">Cardholder Name</th>
                                                                <th data-hide="phone">Expiration Date</th>
                                                                <th data-hide="phone">Amount</th>
                                                                <th data-hide="phone">Action</th>

                                                            </tr>
                                                        </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>RCBC</td>
                                                                    <td>123123155</td>
                                                                    <td>Stephen Curry</td>
                                                                    <td>10/23/2023</td>
                                                                    <td>1231232</td>
                                                                    <td>
                                                                        <a href="his_admin_view_single_eqp.php?item_code" class="badge badge-success"><i class="far fa-eye "></i> View</a>
                                                                        <a href="his_admin_update_equipments.php" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                                        <a href="his_admin_equipments_inventory_copy.php" class="badge badge-danger"><i class=" mdi mdi-trash-can-outline "></i> Delete</a>
                                                                    </td>

                                                                </tr>
                                                            </tbody>
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



                                            </form>

                                        </div> <!-- end tab-pane -->
                                        <!-- end about me section content -->



                                        <!-- Start setting section content -->
                                        <div class="tab-pane" id="settings">
                                            <form method="post" enctype="multipart/form-data">

                                                <div class="col-md-12 d-flex justify-content-end">


                                                    <!-- Trigger the modal with a button -->
                                                    <button type="button" class="fa fa-plus lg-3 bi-plus btn btn-success" data-toggle="modal" data-target="#exampleModal"> Add Checks
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    Fill all Fields
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <form method="post">
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputEmail4" class="col-form-label">Code</label>
                                                                                <input type="text" required="required" name="exam_code" class="form-control" id="inputEmail4">
                                                                            </div>
                                                                            <div class="form-group col-md-8">
                                                                                <label for="inputPassword4" class="col-form-label">Item Category</label>
                                                                                <input required="required" type="text" name="exam_category" class="form-control" id="inputPassword4">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="inputPassword4" class="col-form-label">Item Description </label>
                                                                                <input required="required" type="text" name="exam_desc" class="form-control" id="inputPassword4">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="inputEmail4" class="col-form-label">Abbreviation</label>
                                                                                <input type="text" required="required" name="exam_abb" class="form-control" id="inputEmail4">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputState" class="col-form-label">Unit</label>
                                                                                <select id="inputState" required="required" name="exam_unit" class="form-control">
                                                                                    <option>None</option>
                                                                                    <option>Ampule</option>
                                                                                    <option>Cap</option>
                                                                                    <option>Bottle</option>
                                                                                    <option>Vial</option>
                                                                                    <option>Pieces</option>
                                                                                    <option>Tablet</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4 ">
                                                                                <label for="inputState" class="col-form-label">Big Unit</label>
                                                                                <select id="inputState" required="required" name="exam_big" class="form-control">
                                                                                    <option>None</option>
                                                                                    <option>Ampule</option>
                                                                                    <option>Box</option>
                                                                                    <option>Pieces</option>
                                                                                    <option>Vial</option>
                                                                                    <option>Tablet</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputEmail4" class="col-form-label">Conversion</label>
                                                                                <select id="inputState" required="required" name="exam_conv" class="form-control">
                                                                                    <option>0</option>
                                                                                    <option>1</option>
                                                                                    <option>2</option>
                                                                                    <option>3</option>
                                                                                    <option>4</option>
                                                                                    <option>5</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                <label for="inputEmail4" class="col-form-label">Barcode ID</label>
                                                                                <input type="text" required="required" name="exam_bar" class="form-control" id="inputEmail4">
                                                                            </div>
                                                                        </div>

                                                                        <!-- <div class="form-group">
                                                                        <label for="inputPassword4" class="col-form-label">Equipment Barcode</label>
                                                                        <?php
                                                                        // $length = 10;
                                                                        //     $bcode = substr(str_shuffle('0123456789'), 1, $length);
                                                                        ?>
                                                                <input required="required" readonly type="text" value="<?php //echo $bcode; 
                                                                                                                        ?>" name="exam_code" class="form-control"  id="inputPassword4">
                                                                </div>

                                                                <div class="form-group" style="style:display-none">
                                                                    <label for="inputAddress" class="col-form-label">Pharmaceutical Category Description</label>
                                                                    <textarea required="required" type="text" class="form-control" name="exam_desc" id="editor"></textarea>
                                                                </div> -->



                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                        <button type="submit" name="add_examinations" class="ladda-button btn btn-primary" data-style="expand-right">Save changes</button>

                                                                    </form>



                                                                </div>
                                                                <!-- <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <a href="" class="dropdown-item ">
                                                    <i class=""></i>
                                                    <span> </span>
                                                </a>

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
                                                        $ret = "SELECT * FROM  his_examinations ORDER BY RAND() ";
                                                        $stmt = $mysqli->prepare($ret);
                                                        $stmt->execute(); //ok
                                                        $res = $stmt->get_result();
                                                        $cnt = 1;
                                                        while ($row = $res->fetch_object()) {
                                                        ?>

                                                            <tbody>
                                                                <tr>
                                                                    <td><?php echo $cnt; ?></td>
                                                                    <td><?php echo $row->exam_code; ?></td>
                                                                    <td><?php echo $row->exam_category; ?></td>
                                                                    <td><?php echo $row->exam_desc; ?></td>
                                                                    <td><?php echo $row->exam_abb; ?></td>
                                                                    <td><?php echo $row->exam_unit; ?></td>
                                                                    <td><?php echo $row->exam_big; ?></td>
                                                                    <td><?php echo $row->exam_conv; ?></td>
                                                                    <td><?php echo $row->exam_bar; ?></td>
                                                                    <td>
                                                                        <a href="his_admin_view_exam.php?exam_code=<?php echo $row->exam_code; ?>" class="badge badge-success"><i class="far fa-eye "></i> View</a>
                                                                        <a href="his_admin_update_examinations.php?exam_code=<?php echo $row->exam_code; ?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                                        <a href="his_admin_equipments_inventory_copy.php?delete=<?php echo $row->exam_id; ?>" class="badge badge-danger"><i class=" mdi mdi-trash-can-outline "></i> Delete</a>
                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        <?php $cnt = $cnt + 1;
                                                        } ?>
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
                                                </div>
                                        </div>

                                        <!-- Start Procedure Tab Pane -->
                                        <div class="tab-pane" id="procedure">


                                            <form method="post" enctype="multipart/form-data">

                                                <div class="col-md-12 d-flex justify-content-end">

                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="fa fa-plus lg-3 bi-plus btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                                        Add Procedure
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="header-title">Fill all fields</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post">
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="inputEmail4" class="col-form-label">Code</label>
                                                                                <input type="text" required="required" name="pro_code" class="form-control" id="inputEmail4">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="inputPassword4" class="col-form-label">Item Category</label>
                                                                                <input required="required" type="text" name="pro_category" class="form-control" id="inputPassword4">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="inputPassword4" class="col-form-label">Item Description </label>
                                                                                <input required="required" type="text" name="pro_desc" class="form-control" id="inputPassword4">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="inputEmail4" class="col-form-label">Abbreviation</label>
                                                                                <input type="text" required="required" name="pro_abb" class="form-control" id="inputEmail4">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputState" class="col-form-label">Unit</label>
                                                                                <select id="inputState" required="required" name="pro_unit" class="form-control">
                                                                                    <option>None</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4 ">
                                                                                <label for="inputState" class="col-form-label">Big Unit</label>
                                                                                <select id="inputState" required="required" name="pro_big" class="form-control">
                                                                                    <option>None</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inputEmail4" class="col-form-label">Conversion</label>
                                                                                <select id="inputState" required="required" name="pro_conv" class="form-control">
                                                                                    <option>0</option>
                                                                                    <option>1</option>
                                                                                    <option>2</option>
                                                                                    <option>3</option>
                                                                                    <option>4</option>
                                                                                    <option>5</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                <label for="inputEmail4" class="col-form-label">Barcode ID</label>
                                                                                <input type="text" required="required" name="pro_bar" class="form-control" id="inputEmail4">
                                                                            </div>
                                                                        </div>

                                                                        <!-- <div class="form-group">
                                                                        <label for="inputPassword4" class="col-form-label">Equipment Barcode</label>
                                                                        <?php
                                                                        // $length = 10;
                                                                        //     $bcode = substr(str_shuffle('0123456789'), 1, $length);
                                                                        ?>
                                                                <input required="required" readonly type="text" value="<?php //echo $bcode; 
                                                                                                                        ?>" name="exam_code" class="form-control"  id="inputPassword4">
                                                                </div>

                                                                <div class="form-group" style="style:display-none">
                                                                    <label for="inputAddress" class="col-form-label">Pharmaceutical Category Description</label>
                                                                    <textarea required="required" type="text" class="form-control" name="exam_desc" id="editor"></textarea>
                                                                </div> -->
                                                                        <!-- <button type="submit" name="add_procedures" class="ladda-button btn btn-success" data-style="expand-right">Add Procedure</button> -->


                                                                        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="add_equipments" class="ladda-button btn btn-primary" data-style="expand-right">Save changes</button> -->

                                                                    </form>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" name="add_procedures" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <a href="" class="dropdown-item ">
                                                    <i class=""></i>
                                                    <span> </span>
                                                </a>

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
                                                        $ret = "SELECT * FROM  his_procedures ORDER BY RAND() ";
                                                        $stmt = $mysqli->prepare($ret);
                                                        $stmt->execute(); //ok
                                                        $res = $stmt->get_result();
                                                        $cnt = 1;
                                                        while ($row = $res->fetch_object()) {
                                                        ?>

                                                            <tbody>
                                                                <tr>
                                                                    <td><?php echo $cnt; ?></td>
                                                                    <td><?php echo $row->pro_code; ?></td>
                                                                    <td><?php echo $row->pro_category; ?></td>
                                                                    <td><?php echo $row->pro_desc; ?></td>
                                                                    <td><?php echo $row->pro_abb; ?></td>
                                                                    <td><?php echo $row->pro_unit; ?></td>
                                                                    <td><?php echo $row->pro_big; ?></td>
                                                                    <td><?php echo $row->pro_conv; ?></td>
                                                                    <td><?php echo $row->pro_bar; ?></td>
                                                                    <td>
                                                                        <a href="his_admin_view_procedure.php?pro_code=<?php echo $row->pro_code; ?>" class="badge badge-success"><i class="far fa-eye "></i> View</a>
                                                                        <a href="his_admin_update_procedure.php?pro_code=<?php echo $row->pro_code; ?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                                        <a href="his_admin_equipments_inventory_copy.php?delete=<?php echo $row->pro_id; ?>" class="badge badge-danger"><i class=" mdi mdi-trash-can-outline "></i> Delete</a>
                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        <?php $cnt = $cnt + 1;
                                                        } ?>
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
                                                </div>
                                        </div>
                                        </form>
                                        <div class="modal-footer">

                                                                <!-- <button type="submit" name="add_doc" class="ladda-button btn btn-primary" data-style="expand-right">Select</button> -->
                                            <a href="his_admin_swu_transaction_list.php" style="text-decoration:none;"><button type="button" class="btn btn-success" data-dismiss="modal">Apply</button></a>
                                            <a href="his_admin_swu_cash_receipt.php" style="text-decoration:none;"><button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></a>
                                        </div>
                                        
                                    </div>


                                    <!-- end settings content-->

                                </div> <!-- end tab-content -->
                                
                            </div> <!-- end card-box--> 
                                    </div> <!-- end card-box -->
                                </div> <!-- end col -->
                            </div>
                            
                            <!-- end row -->

                        </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                 <?php include('./assets/inc/footer.php');?>
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