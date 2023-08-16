<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['ad_id'];

?>







<!DOCTYPE html>
<html lang="en">

<?php include('assets/inc/head.php'); ?>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include('assets/inc/nav.php'); ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include("assets/inc/sidebar.php"); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <?php
        $pat_number = $_GET['pat_number'];
        $pat_id = $_GET['pat_id'];
        $ret = "SELECT  * FROM his_patients WHERE pat_id=?";
        $stmt = $mysqli->prepare($ret);
        $stmt->bind_param('i', $pat_id);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        //$cnt=1;
        while ($row = $res->fetch_object()) {
            $mysqlDateTime = $row->pat_date_joined;
        ?>

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">




                        <div class="row">



                            <div class="col-12">


                                <div class="col-md-6">

                                </div><!-- end col -->
                                <div class="col-md-4 float-left">
                                    <div class="mt-3 float-left">
                                        <p class="m-b-10"><strong>Patient Name: </strong><span class="float-left" <?php echo $row->pat_fname; ?> <?php echo $row->pat_lname; ?>></span> </p>

                                    </div>

                                    <div class="col-md-4 float-left">
                                        <div class="mt-3 float-left">
                                            <p class="m-b-10"><strong>Gender: </strong> <span class="float-left"><span class="badge badge-success"></span></span></p>
                                        </div>

                                    </div>

                                    <div class="col-md-4 float-left">
                                        <div class="mt-3 float-left">
                                            <p class="m-b-10"><strong>Age: </strong> <span class="float-left"><span class="badge badge-success"></span></span></p>
                                        </div>

                                    </div>


                                </div>

                            <?php } ?>

                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12 ">
                            <div class="card">
                                <div class="card-body">

                                    <!--Add Patient Form-->
                                    <form method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <span>Transaction Number</span>
                                                <input type="text" required="required" name="" class="form-control input-sm" id="inputlg" placeholder="Transaction Number">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <span>Document Type</span>
                                                <select id="inputState" required="required" name="" class="form-control">
                                                    <option>Cash Slip</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <span>Requisition Date</span>
                                                <input required="required" type="date" name="" class="form-control" id="inputPassword4" placeholder="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <span>Gross Amount</span>
                                                <input required="required" type="text" name="" class="form-control" id="inputPassword4" placeholder="0.00">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <span>Price Group</span>
                                                <select id="inputState" required="required" name="" class="form-control">
                                                    <option>Standard</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <span>Document Date</span>
                                                <input required="required" type="date" name="" class="form-control" id="inputPassword4" placeholder="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <span>Requisition Number</span>
                                                <input required="required" type="text" name="" class="form-control" id="inputPassword4" placeholder="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <span>Discount</span>
                                                <input required="required" type="text" name="" class="form-control" id="inputPassword4" placeholder="0.00">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <span>Price Scheme</span>
                                                <select id="inputState" required="required" name="" class="form-control">
                                                    <option>OPD-Outpatient</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <span>Document Number</span>
                                                <input required="required" type="text" name="" class="form-control" id="inputPassword4" placeholder="0">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <span>Total Items</span>
                                                <input required="required" type="text" name="" class="form-control" id="inputPassword4" placeholder="0">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <span>Output Tax</span>
                                                <input required="required" type="text" name="" class="form-control" id="inputPassword4" placeholder="0.00">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <span>Hospitalization Plan</span>
                                                <select id="inputState" required="required" name="" class="form-control">
                                                    <option>Self_Pay</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <span>Regualted Docu Number</span>
                                                <input required="required" type="text" name="" class="form-control" id="inputPassword4" placeholder="0">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <span>Total Qty</span>
                                                <input required="required" type="text" name="" class="form-control" id="inputPassword4" placeholder="0.00">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <span><strong>Net Amount</strong></span>
                                                <input required="required" type="text" name="" class="form-control" id="inputPassword4" placeholder="0.00">
                                            </div>
                                        </div>
                                </div>

                                </form>






                                <button type="button" class="btn btn-secondary btn-sm btn-block">Transaction Line Items</button>







                                <!-- end row -->




                                <div class="row">


                                </div>

                                <div class="table-responsive">
                                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                        <thead>
                                            <tr>
                                                <th class="table-primary">#</th>
                                                <th class="table-primary" data-toggle="true">Frequency</th>
                                                <th class="table-primary" data-toggle="true">Route</th>
                                                <th class="table-primary" data-hide="phone">Description</th>
                                                <th class="table-primary" data-hide="phone">Balance</th>
                                                <th class="table-primary" data-hide="phone">Qty </th>
                                                <th class="table-primary" data-hide="phone">Stat %</th>
                                                <th class="table-primary" data-hide="phone">Price</th>
                                                <th class="table-primary" data-hide="phone">Amount</th>
                                                <th class="table-primary" data-hide="phone">Output Tax</th>
                                            </tr>
                                        </thead>



                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>


                                            </tr>
                                        </tbody>


                                        <tfoot>
                                            <tr class="active">
                                                <td colspan="10">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Select From Item Master File</button>



                                    <!-- Large modal -->
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="">Select From Item Template</button>

                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">ACCOUNTING Item Selection</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">

                                                        <div class="col-lg-10 col-xl-12">
                                                            <div class="card-box">
                                                                <ul class="nav nav-pills navtab-bg nav-justified">
                                                                    <li class="nav-item">
                                                                        <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                                            Drugs and Medicines
                                                                        </a>
                                                                    </li>

                                                                    <li class="nav-item">
                                                                        <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                                            Examination
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="#procedure" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                                            Procedure
                                                                        </a>
                                                                    </li>
                                                                </ul>



                                                                <div class="tab-content">
                                                                    <div class="tab-pane show active" id="aboutme">



                                                                    </div>

                                                                </div>


                                                                <a href="" class="dropdown-item">
                                                                    <i class=""></i>
                                                                    <span> </span>
                                                                </a>





                                                                <div class="table-responsive table table-sm">
                                                                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="table-primary">#</th>
                                                                                <th class="table-primary" data-toggle="true">Item Code</th>
                                                                                <th class="table-primary" data-hide="phone">Item Category</th>
                                                                                <th class="table-primary" data-toggle="true">Description</th>
                                                                                <th class="table-primary" data-hide="phone">Generic Name</th>
                                                                                <th class="table-primary" data-hide="phone">CPT Code</th>
                                                                                <th class="table-primary" data-hide="phone">Price</th>
                                                                                <th class="table-primary" data-hide="phone">Special Price</th>
                                                                                <th class="table-primary" data-hide="phone">Unit</th>
                                                                                <th class="table-primary" data-hide="phone">Selections</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <?php
                                                                        /*
                                *get details of allpatients
                                *
                                */
                                                                        $ret = "SELECT * FROM  his_equipments LIMIT 2 ";
                                                                        $stmt = $mysqli->prepare($ret);
                                                                        $stmt->execute(); //ok
                                                                        $res = $stmt->get_result();
                                                                        $cnt = 1;
                                                                        while ($row = $res->fetch_object()) {
                                                                        ?>

                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><?php echo $cnt; ?></td>
                                                                                    <td><?php echo $row->item_code; ?></td>
                                                                                    <td><?php echo $row->item_category; ?></td>
                                                                                    <td><?php echo $row->item_desc; ?></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td>0.00</td>
                                                                                    <td>None</td>
                                                                                    <td>
                                                                                        <a class="badge badge-success"><i class="far fa-eye "></i> Select</a>

                                                                                    </td>

                                                                                </tr>
                                                                            </tbody>
                                                                        <?php $cnt = $cnt + 1;
                                                                        } ?>
                                                                        <tfoot>
                                                                            <tr class="active">
                                                                                <td colspan="10">
                                                                                    <div class="text-right">
                                                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div> <!-- end .table-responsive-->

                                                                <div class="d-grid gap-2 col-6 mx-auto">
                                                                    <strong class=" bg-secondary text-white">Selected Item(s)</strong>

                                                                </div>


                                                                <div class="table-responsive table table-sm">
                                                                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="table-primary">#</th>
                                                                                <th class="table-primary" data-toggle="true">Item Code</th>
                                                                                <th class="table-primary" data-hide="phone">Item Category</th>
                                                                                <th class="table-primary" data-toggle="true">Item Description</th>
                                                                                <th class="table-primary" data-hide="phone">CPT Code</th>
                                                                                <th class="table-primary" data-hide="phone">Qty</th>
                                                                                <th class="table-primary" data-hide="phone"> Price</th>
                                                                                <th class="table-primary" data-hide="phone">Unit</th>


                                                                            </tr>
                                                                        </thead>
                                                                        <?php
                                                                        /*
                                *get details of allpatients
                                *
                                */
                                                                        $ret = "SELECT * FROM  his_equipments LIMIT 0 ";
                                                                        $stmt = $mysqli->prepare($ret);
                                                                        $stmt->execute(); //ok
                                                                        $res = $stmt->get_result();
                                                                        $cnt = 1;
                                                                        while ($row = $res->fetch_object()) {
                                                                        ?>

                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><?php echo $cnt; ?></td>
                                                                                    <td><?php echo $row->item_code; ?></td>
                                                                                    <td><?php echo $row->item_category; ?></td>
                                                                                    <td><?php echo $row->item_desc; ?></td>
                                                                                    <td></td>
                                                                                    <td>0.00</td>
                                                                                    <td>None</td>
                                                                                    <td></td>

                                                                                </tr>
                                                                            </tbody>
                                                                        <?php $cnt = $cnt + 1;
                                                                        } ?>
                                                                        <tfoot>
                                                                            <tr class="active">
                                                                                <td colspan="10">
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
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Discard</button>
                                                            <button type="button" class="btn btn-primary">Continue</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>







                                        </div> <!-- end .table-responsive-->
                                    </div> <!-- end card-box -->
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->


                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                                Next
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Print Transaction Slip Document</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Please double check the information of the transaction you are about to print. Make sure that the target printer
                                            is on and ready then press "Print" button to print or "Preview" button to view in the screen. Otherwise, press
                                            "Close" button to continue.....

                                            <div class="card-body">

                                                <?php

                                                $ret = "SELECT * FROM  his_patients, his_payrolls LIMIT 1 ";
                                                $stmt = $mysqli->prepare($ret);
                                                $stmt->execute(); //ok
                                                $res = $stmt->get_result();
                                                $cnt = 1;
                                                while ($row = $res->fetch_object()) {
                                                    $mysqlDateTime = $row->pat_date_joined;
                                                ?>

                                                    <div class="form-row">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">IPD Case No.</span>
                                                            </div>
                                                            <select id="inputState" required="required" name="item_category" class="form-control">
                                                                <option>123</option>

                                                            </select>
                                                        </div>

                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">Patient ID</span>
                                                            </div>
                                                            <select id="inputState" required="required" name="item_category" class="form-control">
                                                                <option><?php echo $pat_number ?></option>

                                                            </select>
                                                        </div>

                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">Patient Name</span>
                                                            </div>
                                                            <select id="inputState" required="required" name="item_category" class="form-control">
                                                                <option><?php echo $row->pat_fname; ?> <?php echo $row->pat_lname; ?></option>

                                                            </select>
                                                        </div>

                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">Document Type</span>
                                                            </div>
                                                            <select id="inputState" required="required" name="item_category" class="form-control">
                                                                <option>CA</option>

                                                            </select>
                                                        </div>

                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">Document Date</span>
                                                            </div>
                                                            <select id="inputState" required="required" name="item_category" class="form-control">
                                                                <option><?php echo date("d/m/Y - h:m", strtotime($mysqlDateTime)); ?></option>

                                                            </select>
                                                        </div>

                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">Document Number</span>
                                                            </div>
                                                            <select id="inputState" required="required" name="item_category" class="form-control">
                                                                <option>1</option>

                                                            </select>
                                                        </div>

                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">Regulated Doc. No.</span>
                                                            </div>
                                                            <select id="inputState" required="required" name="item_category" class="form-control">
                                                                <option>12345</option>

                                                            </select>
                                                        </div>

                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroup-sizing-default">Net Amount</span>
                                                            </div>
                                                            <select id="inputState" required="required" name="item_category" class="form-control">
                                                                <option>0.00</option>

                                                            </select>
                                                        </div>

                                                    </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="his_admin_print_render.php?pay_number=<?php echo $row->pay_number; ?>&&pay_doc_number=<?php echo $row->pay_doc_number; ?>" class="btn btn-primary" role="button">Preview</a>
                                            <a href="javascript:window.print()" class="btn btn-primary" role="button">Print</a>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $cnt = $cnt + 1;
                                                } ?>
                        <!-- <div>

                                <a href="his_admin_print_render.php?" class=" btn btn-success float-right" role="button">Next</a>


                            </div> -->


                        <!-- <button type="button" name="his_admin_print_render.php" class="ladda-button btn btn-success float-right" data-style="expand-left"></button> -->


                        </div> <!-- container -->

                    </div> <!-- content -->

                    <!-- Footer Start -->
                    <?php include('assets/inc/footer.php'); ?>
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