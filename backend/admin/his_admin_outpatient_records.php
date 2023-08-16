<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['ad_id'];
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $adn = "delete from his_patients where pat_id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();

    if ($stmt) {
        $success = "InPatients Records Deleted";
    } else {
        $err = "Try Again Later";
    }
}
?>

<?php
if (isset($_POST['add_patient'])) {
    $pat_fname = $_POST['pat_fname'];
    $pat_lname = $_POST['pat_lname'];
    $pat_number = $_POST['pat_number'];
    $pat_phone = $_POST['pat_phone'];
    $pat_type = $_POST['pat_type'];
    $pat_addr = $_POST['pat_addr'];
    $pat_age = $_POST['pat_age'];
    $pat_dob = $_POST['pat_dob'];
    $pat_ailment = $_POST['pat_ailment'];
    $pat_series = $_POST['pat_series'];
    $pat_case = $_POST['pat_case'];
    $pat_case_type = $_POST['pat_case_type'];
    $pat_num = $_POST['pat_num'];
    $pat_doc = $_POST['pat_doc'];
    $pat_billed = $_POST['pat_billed'];

    //sql to insert captured values
    $query = "insert into his_patients (pat_fname, pat_ailment, pat_lname, pat_age, pat_dob, pat_number, pat_phone, pat_type, pat_addr, pat_series, pat_case, pat_case_type, pat_num, pat_doc, pat_billed) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('sssssssssssssss', $pat_fname, $pat_ailment, $pat_lname, $pat_age, $pat_dob, $pat_number, $pat_phone, $pat_type, $pat_addr, $pat_series, $pat_case, $pat_case_type, $pat_num, $pat_doc, $pat_billed);
    $stmt->execute();
    /*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Patient Details Added";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Reporting</a></li>
                                        <li class="breadcrumb-item active">Outpatient</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">

                            <div class="card-box">


                                <div class="container">
                                    <!-- Trigger the modal with a button -->
                                    <button type="button" class="	fa fa-plus lg-4 bi-plus btn btn-success btn-lg-2" data-toggle="modal" data-target="#myModal"> Add OutPatient </button>

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
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputEmail4" class="col-form-label">First Name</label>
                                                                        <input type="text" required="required" name="pat_fname" class="form-control" id="inputEmail4" placeholder="First Name">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                                        <input required="required" type="text" name="pat_lname" class="form-control" id="inputPassword4" placeholder=" Last Name">
                                                                    </div>
                                                                    <div class="form-group col-md-2" style="display:none">
                                                                        <?php
                                                                        $length = 5;
                                                                        $patient_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);
                                                                        ?>
                                                                        <label for="inputZip" class="col-form-label">Patient ID</label>
                                                                        <input type="text" name="pat_number" value="<?php echo $patient_number; ?>" class="form-control" id="inputZip">
                                                                    </div>

                                                                    <div class="form-group col-md-2" style="display:none">
                                                                        <?php
                                                                        $length = 6;
                                                                        $patient_series =  substr(str_shuffle('0123456789'), 1, $length);
                                                                        ?>
                                                                        <label for="inputZip" class="col-form-label">OPD Series No.</label>
                                                                        <input type="text" name="pat_series" value="<?php echo $patient_series; ?>" class="form-control" id="inputZip">
                                                                    </div>

                                                                    <div class="form-group col-md-2" style="display:none">
                                                                        <?php
                                                                        $length = 6;
                                                                        $patient_case =  substr(str_shuffle('0123456789'), 1, $length);
                                                                        ?>
                                                                        <label for="inputZip" class="col-form-label">OPD Case No.</label>
                                                                        <input type="text" name="pat_case" value="<?php echo $patient_case; ?>" class="form-control" id="inputZip">
                                                                    </div>


                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputEmail4" class="col-form-label">Date Of Birth</label>
                                                                        <input type="date" required="required" name="pat_dob" class="form-control" id="inputEmail4" placeholder="DD/MM/YYYY">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Age</label>
                                                                        <input required="required" type="text" name="pat_age" class="form-control" id="inputPassword4" placeholder="Age">
                                                                    </div>
                                                                    <div class="form-group col-md-4 ">
                                                                        <label for="inputAddress" class="col-form-label">Address</label>
                                                                        <input required="required" type="text" class="form-control" name="pat_addr" id="inputAddress" placeholder=" Addresss">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputCity" class="col-form-label">Mobile Number</label>
                                                                        <input required="required" type="text" name="pat_phone" class="form-control" id="inputCity">
                                                                    </div>

                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputCity" class="col-form-label">Patient Ailment</label>
                                                                        <input required="required" type="text" name="pat_ailment" class="form-control" id="inputCity">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputState" class="col-form-label">Patient's Type</label>
                                                                        <select id="inputState" required="required" name="pat_type" class="form-control">
                                                                            <option>OutPatient</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputCity" class="col-form-label">OPD Case DateTime</label>
                                                                        <input required="required" type="date" name="pat_case_type" class="form-control" id="inputCity">
                                                                    </div>

                                                                    <div class="form-group col-md-2" style="display:none">
                                                                        <?php
                                                                        $length = 6;
                                                                        $patient_num =  substr(str_shuffle('0123456789Z'), 1, $length);
                                                                        ?>
                                                                        <label for="inputZip" class="col-form-label">Patient No.</label>
                                                                        <input type="text" name="pat_num" value="<?php echo $patient_num; ?>" class="form-control" id="inputZip">
                                                                    </div>

                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label"> Physician Name</label>
                                                                        <select id="inputState" required="required" name="pat_doc" class="form-control">
                                                                            <option>None</option>
                                                                            <option>Marlo Getutua</option>
                                                                            <option>Marvin Lachica</option>
                                                                            <option>Zandra Salas </option>
                                                                            <option>Leoncio Lachica </option>


                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputCity" class="col-form-label">Billed By</label>
                                                                        <input required="required" type="text" name="pat_billed" class="form-control" id="inputCity">
                                                                    </div>

                                                                </div>
                                                                <div>

                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    <button type="submit" name="add_patient" class="ladda-button btn btn-primary" data-style="expand-right">Save changes</button>


                                                                </div>

                                                        </form>

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
                                        <h4 class="header-title"></h4>
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
                                                        <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive table-sm">
                                            <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th data-toggle="true">Patient Name</th>
                                                        <th data-hide="phone">Patient ID</th>
                                                        <th data-hide="phone">OPD Series No.</th>
                                                        <th data-hide="phone">OPD Case No.</th>
                                                        <th data-hide="phone">OPD Case DateTime</th>
                                                        <th data-hide="phone">Patient No.</th>
                                                        <th data-hide="phone">Physician Name</th>
                                                        <th data-hide="phone">Billed By</th>
                                                        <th data-hide="phone">Action</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                /*
                                                *get details of allpatients
                                                *
                                            */
                                                $ret = "SELECT * FROM  his_patients WHERE pat_type = 'OutPatient' ORDER BY RAND() ";
                                                //sql code to get to ten docs  randomly
                                                $stmt = $mysqli->prepare($ret);
                                                $stmt->execute(); //ok
                                                $res = $stmt->get_result();
                                                $cnt = 1;
                                                while ($row = $res->fetch_object()) {
                                                ?>

                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $cnt; ?></td>
                                                            <td><?php echo $row->pat_fname; ?> <?php echo $row->pat_lname; ?></td>
                                                            <td><?php echo $row->pat_number; ?></td>
                                                            <td><?php echo $row->pat_series; ?></td>
                                                            <td><?php echo $row->pat_case; ?></td>
                                                            <td><?php echo $row->pat_case_type; ?></td>
                                                            <td><?php echo $row->pat_num; ?></td>
                                                            <td><?php echo $row->pat_doc; ?></td>
                                                            <td><?php echo $row->pat_billed; ?></td>

                                                            <td>
                                                                <a href="his_admin_view_single_patient.php?pat_id=<?php echo $row->pat_id; ?>&&pat_number=<?php echo $row->pat_number; ?>" class="badge badge-success"><i class="mdi mdi-eye"></i> View</a>
                                                                <a href="his_admin_update_single_outpatient.php?pat_id=<?php echo $row->pat_id; ?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                                <a href="his_admin_outpatient_records.php?delete=<?php echo $row->pat_id; ?>" class="badge badge-danger"><i class=" mdi mdi-trash-can-outline "></i> Delete</a>
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