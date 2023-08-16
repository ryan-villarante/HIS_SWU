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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ancillary Services</a></li>
                                        <li class="breadcrumb-item active">Ancillary Services</li>
                                    </ol>
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
                                    <button type="button" class="fa fa-plus lg-4 bi-plus btn btn-outline-success btn-lg-2" data-toggle="modal" data-target="#myModal"> Direct Render</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog modal-lg">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    Patient Register Selection
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <!--Add Patient Form-->

                                                        <?php

                                                        $ret = "SELECT * FROM  his_patients,his_rooms_beds,his_docs  LIMIT 1 ";
                                                        $stmt = $mysqli->prepare($ret);
                                                        $stmt->execute(); //ok
                                                        $res = $stmt->get_result();
                                                        $cnt = 1;
                                                        while ($row = $res->fetch_object()) {
                                                            $mysqlDateTime = $row->pat_date_joined;
                                                        ?>

                                                            <form method="post">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputAddress" class="col-form-label">Patient Type</label>
                                                                        <select id="inputState" required="required" name="" class="form-control">
                                                                            <option>All Registry Case Type</option>
                                                                            <option>InPatient</option>
                                                                            <option>Emergency</option>
                                                                            <option>OutPatient</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputAddress" class="col-form-label">Admission Date</label>
                                                                        <select id="inputState" required="required" name="" class="form-control">
                                                                            <option><span class="ml-2"><?php echo date("d/m/Y - h:m", strtotime($mysqlDateTime)); ?></span></option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputAddress" class="col-form-label">Case Status</label>
                                                                        <select id="inputState" required="required" name="" class="form-control">
                                                                            <option>Active</option>
                                                                            <option>Discharged</option>
                                                                            <option>For MGH Clearance</option>
                                                                            <option>Cleared for MGH</option>
                                                                            <option>May-Go-Home</option>
                                                                            <option>Untagged MGH</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputAddress" class="col-form-label">OPD.ERD Case Date</label>
                                                                        <select id="inputState" required="required" name="" class="form-control">
                                                                            <option><span class="ml-2"><?php echo date("d/m/Y - h:m", strtotime($mysqlDateTime)); ?></span></option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputAddress" class="col-form-label">Discharged Date</label>
                                                                        <select id="inputState" required="required" name="" class="form-control">
                                                                            <option><span class="ml-2"><?php echo date("d/m/Y - h:m", strtotime($mysqlDateTime)); ?></span></option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputAddress" class="col-form-label">Nurse Station</label>
                                                                        <select id="inputState" required="required" name="" class="form-control">
                                                                            <option>None</option>
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                            <?php $cnt = $cnt + 1;
                                                        } ?>


                                                            </form>



                                                            <div class="table-responsive">
                                                                <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th data-toggle="true">Case Number</th>
                                                                            <th data-toggle="true">Reference Date</th>
                                                                            <th data-toggle="true">Patient ID</th>
                                                                            <th data-toggle="true">Full Name</th>
                                                                            <th data-hide="phone">Room No/ Bed No.</th>
                                                                            <th data-hide="phone">Action</th>


                                                                        </tr>
                                                                    </thead>
                                                                    <?php

                                                                    $ret = "SELECT * FROM  his_patients,his_rooms_beds,his_docs  LIMIT 1 ";
                                                                    $stmt = $mysqli->prepare($ret);
                                                                    $stmt->execute(); //ok
                                                                    $res = $stmt->get_result();
                                                                    $cnt = 1;
                                                                    while ($row = $res->fetch_object()) {
                                                                        $mysqlDateTime = $row->pat_date_joined;
                                                                    ?>


                                                                        <tbody>
                                                                            <tr>
                                                                                <td><?php echo $cnt; ?></td>
                                                                                <td>12345</td>
                                                                                <td><span class="ml-2"><?php echo date("d/m/Y - h:m", strtotime($mysqlDateTime)); ?></span></td>
                                                                                <td><?php echo $row->pat_number; ?></td>
                                                                                <td><?php echo $row->pat_fname; ?> <?php echo $row->pat_lname; ?></td>
                                                                                <td><?php echo $row->room_number; ?></td>
                                                                                <td>
                                                                                    <a href="his_admin_render.php?pat_id=<?php echo $row->pat_id; ?>&&pat_number=<?php echo $row->pat_number; ?>" class="badge badge-success"><i class="mdi mdi-eye"></i> Select</a>
                                                                                </td>


                                                                            </tr>
                                                                        </tbody>
                                                                    <?php $cnt = $cnt + 1;
                                                                    } ?>

                                                                </table>
                                                            </div> <!-- end .table-responsive-->

                                                            <div class="modal-footer">

                                                                <!-- <button type="submit" name="add_doc" class="ladda-button btn btn-primary" data-style="expand-right">Select</button> -->
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>


                                                            </div>






                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>



                                <div class="row">
                                    <div class="col-12">
                                        <div class="card-box">

                                            <!-- div class="mb-2">
                                                <div class="row">
                                                    <div class="col-12 text-sm-center form-inline">
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
                                                        </div> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th data-toggle="true">Patient Name</th>
                                                <th data-toggle="true">Age</th>
                                                <th data-toggle="true">Room No./Bed No.</th>
                                                <th data-toggle="true">Requisition No.</th>
                                                <th data-hide="phone">Requisition DateTime</th>
                                                <th data-hide="phone">Requesting Doctor</th>
                                                <th data-hide="phone">Requesting Department</th>
                                                <th data-hide="phone">Document No.</th>
                                                <th data-hide="phone">DateTime To Perform</th>
                                                <th data-hide="phone">Render DateTime</th>
                                                <th data-hide="phone">Amount</th>
                                                <th data-hide="phone">Registry No.</th>
                                                <th data-hide="phone">OR No.</th>
                                                <th data-hide="phone">Payment Amount</th>
                                                <th data-hide="phone">Payer Name</th>
                                                <th data-hide="phone">Requested By</th>
                                                <th data-hide="phone">Rendered By</th>
                                                <th data-hide="phone">Cancelled By</th>

                                            </tr>
                                        </thead>

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