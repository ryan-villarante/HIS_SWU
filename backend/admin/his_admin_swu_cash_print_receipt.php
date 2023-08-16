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
                                                                        <label for="inputPassword4" class="col-form-label">Receipt Type</label>
                                                                        <select id="inputState" required="required" name="pat_nurse" class="form-control">
                                                                            <option>Official Receipt</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Series Type</label>
                                                                        <select id="inputState" required="required" name="pat_nurse" class="form-control">
                                                                                    <option>OR1</option>
                                                                                </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Receipt No.</label>
                                                                        <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" placeholder="Receipt No." >
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Receipt Date</label>
                                                                        <input required="required" type="Date" name="pat_age" class="form-control" id="inputPassword4" placeholder="Receipt Date">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">OSCA ID No.</label>
                                                                        <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" placeholder="OSCA ID No.">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">PWD ID No.</label>
                                                                        <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" placeholder="PWD ID No.">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Senior Citizen TIN</label>
                                                                        <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" placeholder="Senior Citizen TIN">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Cash</label>
                                                                        <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" value="0.00">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Checks</label>
                                                                        <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" value="0.00">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Credit Cards</label>
                                                                        <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" value="0.00">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Credit Cards Surcharge</label>
                                                                        <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" value="0.00">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Others</label>
                                                                        <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" value="0.00">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Receipt Amount</label>
                                                                        <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" value="0.00">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Amount Received</label>
                                                                        <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" value="0.00">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Change</label>
                                                                        <input required="required" type="number" name="pat_age" class="form-control" id="inputPassword4" value="0.00">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Print Option</label><br>
                                                                            <input type="radio" id="age2" name="age" value="Official Receipt with VAT details">
                                                                            <label for="age1">Official Receipt with VAT details</label><br>
                                                                            <input type="radio" id="age3" name="age" value="Official Receipt without VAT details">
                                                                            <label for="age2">Official Receipt without VAT details</label><br> 
                                                                    </div>
                                                                
                                                                </div>

                                                                            
                                                                <!-- <button type="submit" name="add_doc" class="ladda-button btn btn-primary" data-style="expand-right">Select</button> -->
                                                                <a href="his_admin_swu_bills.php"><button type="button" class="btn btn-success">Print</button></a>
                                                                <a href="his_admin_swu_cash_receipt.php"><button type="button" class="btn btn-danger ml-1" data-dismiss="modal">Close</button></a>
                                                    </form>
                                                <div class="container-fluid">
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