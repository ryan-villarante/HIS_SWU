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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Billing Schedules</a></li>
                                        <li class="breadcrumb-item active">Billing Schedules</li>
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
                                    <button type="button" class="fa fa-plus lg-4 bi-plus btn btn-outline-success btn-lg-2" data-toggle="modal" data-target="#myModal"> New </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog modal-lg">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    Search Entity
                                                </div>
                                                <div class="modal-body">

                                                    <div class="form-outline">
                                                        <input type="search" id="form1" class="form-control" placeholder="Search" aria-label="Search" />
                                                    </div>


                                                    <div class="card-body">

                                                        <table class="table table-hover ">
                                                            <thead>
                                                                <tr class="bg-primary text-white ">
                                                                    <th class="text-center">Full Name</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="table-primary">Nilo Velarde</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-primary">Marvin Obiedo</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-primary">Ira Pongasi</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-primary">Nilo Velarde</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-primary">Marvin Obiedo</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-primary">Ira Pongasi</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-primary">Nilo Velarde</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-primary">Marvin Obiedo</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-primary">Ira Pongasi</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>











                                                        <div class="modal-footer">

                                                            <button type="submit" name="add_doc" class="btn btn-outline-primary" data-style="expand-right">Select</button>
                                                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>


                                                        </div>






                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>



                                <!-- <div class="card-box">
                                        Billing Schedules
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
                                            </div> -->



                            </div>
                        </div>



                        <div class="table-responsive table-success">
                            <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th data-toggle="true">Bill No.</th>
                                        <th data-toggle="true">Bill Date</th>
                                        <th data-hide="phone">Customer Name</th>
                                        <th data-hide="phone">Amount</th>
                                        <th data-hide="phone">Remarks</th>
                                        <th data-hide="phone">Received Date</th>
                                    </tr>
                                </thead>
                                <?php
                                /*
                                                *get details of allpatients
                                                *
                                            */
                                $ret = "SELECT * FROM  his_emergency ORDER BY RAND() ";
                                $stmt = $mysqli->prepare($ret);
                                $stmt->execute(); //ok
                                $res = $stmt->get_result();
                                $cnt = 1;
                                while ($row = $res->fetch_object()) {
                                ?>

                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <!--<td>
                                                        <a href="his_admin_view_single_eqp.php?eqp_code=<?php echo $row->eqp_code; ?>" class="badge badge-success"><i class="far fa-eye "></i> View</a>
                                                    </td>-->
                                        </tr>
                                    </tbody>
                                <?php $cnt = $cnt + 1;
                                } ?>
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