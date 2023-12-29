<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['user_id'];
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
                    <!-- <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Patient</a></li>
                                        <li class="breadcrumb-item active">View Patient Masterlist</li>
                                    </ol>
                                </div>
                            </div>

                        </div>
                    </div> -->


                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">


                            <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                        </div>
                                        <div class="modal-body">
                                            <div class="col-lg-8 col-xl-12">
                                                <div class="card-box">
                                                    <ul class="nav nav-pills navtab-bg nav-justified">
                                                        <li class="nav-item">
                                                            <div class="form-group col-md-12 my-1">
                                                                <input type="text" readonly name="" value="Patient Details" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="text-left mt-3">

                                                        <?php
                                                        $pat_id = $_GET['pat_id'];
                                                        $ret = "SELECT  * FROM his_patients WHERE pat_id=?";
                                                        $stmt = $mysqli->prepare($ret);
                                                        $stmt->bind_param('i', $pat_id);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();
                                                        while ($row = $res->fetch_object()) {
                                                        ?>

                                                            <!-- Rest of your code for displaying Patient details goes here -->
                                                            <div class="form-row">
                                                                <div class="col-md-6">
                                                                    <!-- Patient details as in your code -->
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <!-- Image goes here -->
                                                                    <img style="border: 3px solid; border-color:#800" src="../admin/assets/images/patient.png" alt="Image Description" class="img-fluid">
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <!-- end page title -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box my-3">

                                        <div class="form-group col-md-12 my-1">
                                            <!-- <input type="text" readonly name="" value="Patient Master List" class="form-control" style="background-color: #800;color:white;text-align: center;"> -->
                                        </div>

                                        <div class="mb-2">
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
                                                        <input id="demo-foo-search" type="text" placeholder="Search Patient" class="form-control form-control-sm" autocomplete="on">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="table-responsive">
                                            <table id="demo-foo-filtering" class="table table-borderless table-hover mb-0 table-sm" data-page-size="10">
                                                <thead class="table-danger">
                                                    <tr>
                                                        <th>#</th>
                                                        <th data-hide="phone">Patient ID</th>
                                                        <th data-toggle="true">Patient Name</th>
                                                        <th data-hide="phone">Contact Number</th>
                                                        <th data-hide="phone">Birthdayy</th>
                                                        <th data-hide="phone">Age</th>
                                                        <th data-hide="phone">Address</th>
                                                        <th data-hide="phone">Patient Type</th>
                                                        <th data-hide="phone">Discharged</th>
                                                        <th data-hide="phone">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    /*
                                                *get details of allpatients
                                                *
                                            */
                                                    $ret = "SELECT * FROM  his_patients WHERE deleted = 0  ";
                                                    //sql code to get to ten docs  randomly
                                                    $stmt = $mysqli->prepare($ret);
                                                    $stmt->execute(); //ok
                                                    $res = $stmt->get_result();
                                                    $cnt = 1;
                                                    while ($row = $res->fetch_object()) {
                                                    ?>


                                                        <tr>
                                                            <td><?php echo $cnt; ?></td>
                                                            <td><?php echo $row->pat_number; ?></td>
                                                            <td><?php echo $row->pat_fname; ?> <?php echo $row->pat_lname; ?></td>
                                                            <td><?php echo $row->pat_phone; ?></td>
                                                            <td><?php echo $row->pat_dob; ?></td>
                                                            <td><?php echo $row->pat_age; ?> Years</td>
                                                            <td><?php echo $row->pat_addr; ?></td>
                                                            <td><?php echo $row->pat_type; ?></td>
                                                            <td><?php echo ($row->discharged == 1 ? "Yes" : "No"); ?></td>


                                                            <td>

                                                                <a style="background-color: #800;" href="#" class="badge badge-success" data-toggle="modal" data-target="#viewModal" data-docid="<?php echo $row->pat_id; ?>" data-docnumber="<?php echo $row->pat_number; ?>" data-docname="<?php echo $row->pat_fname . ' ' . $row->pat_lname; ?>" data-docphone="<?php echo $row->pat_phone; ?>" data-docbday="<?php echo $row->pat_dob; ?>" data-docage="<?php echo $row->pat_age; ?>" data-docaddress="<?php echo $row->pat_addr; ?>" data-docgender="<?php echo $row->pat_gender; ?>" data-docstatus="<?php echo $row->pat_status; ?>" data-doctype="<?php echo $row->pat_type; ?>" data-docdate="<?php echo $row->pat_date_joined; ?>" data-docdoctor="<?php echo $row->pat_doc; ?>">
                                                                    <i class="mdi mdi-eye"></i> View
                                                                </a>

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
                                    </div> <!-- end card-box -->
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                        </div> <!-- container -->

                    </div> <!-- content -->


                    <!-- Footer Start -->
                    <!-- <?php include('assets/inc/footer.php'); ?> -->
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

            <script>
                $(document).ready(function() {
                    // Listen for the modal to be shown
                    $('#viewModal').on('show.bs.modal', function(event) {
                        var link = $(event.relatedTarget); // Link that triggered the modal
                        var docId = link.data('docid'); // Get data attributes from the link
                        var docNumber = link.data('docnumber');
                        var docName = link.data('docname');
                        var docPhone = link.data('docphone');
                        var docBday = link.data('docbday');
                        var docAge = link.data('docage');
                        var docAddress = link.data('docaddress');
                        var docGender = link.data('docgender');
                        var docStatus = link.data('docstatus');
                        var docType = link.data('doctype');
                        var docDate = link.data('docdate');
                        var docDoctor = link.data('docdoctor');




                        // Modify the modal content
                        var modal = $(this);
                        modal.find('.modal-content').html(`
                <div class="modal-header">
                    
                </div>
                <div class="modal-body">
                    <div class="col-lg-8 col-xl-12">
                        <div class="card-box">
                            <ul class="nav nav-pills navtab-bg nav-justified">
                                <li class="nav-item">
                                    <div class="form-group col-md-12 my-1">
                                        <input type="text" readonly name="" value="Patient Details" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                    </div>
                                </li>
                            </ul>
                           
                            <div class="text-left mt-3">  
                                <div class="form-row">
                                    <div class="col-md-6">

                                    <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Patient ID</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${docNumber}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Name</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${docName}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Contact Number</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${docPhone}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Birthdate</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${docBday}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Age</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${docAge} Years Old">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Address</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${docAddress}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Gender</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${docGender}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe"> CIvil Status</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${docStatus}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Patient Type</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${docType}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Date Recorded</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${docDate}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Physician</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${docDoctor}">
                                            </div>

                                            
                                    
                
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Image goes here -->
                                        <img style="border: 3px solid; border-color:#800; height:100%" src="../admin/assets/images/patient.png" alt="Image Description" class="img-fluid">
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            `);
                    });
                });
            </script>


</body>

</html>