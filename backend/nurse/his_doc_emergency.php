<?php

session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['user_id'];



?>


<?php
if (isset($_POST['add_emergency'])) {
    $pat_fname = $_POST['pat_fname'];
    $pat_lname = $_POST['pat_lname'];
    $pat_number = $_POST['pat_number'];
    $pat_phone = $_POST['pat_phone'];
    $pat_type = $_POST['pat_type'];
    $pat_addr = $_POST['pat_addr'];
    $pat_age = $_POST['pat_age'];
    $pat_dob = $_POST['pat_dob'];
    $pat_status = $_POST['pat_status'];
    $pat_gender = $_POST['pat_gender'];
    $pat_er_case = $_POST['pat_er_case'];
    $pat_er_date = $_POST['pat_er_date'];
    $pat_er_series = $_POST['pat_er_series'];



    $query = "INSERT INTO his_patients (pat_fname, pat_lname, pat_age, pat_dob, pat_status, pat_gender, pat_number, pat_phone,
     pat_type, pat_addr, pat_er_case, pat_er_date, pat_er_series )
     VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param(
        'sssssssssssss',
        $pat_fname,
        $pat_lname,
        $pat_age,
        $pat_dob,
        $pat_status,
        $pat_gender,
        $pat_number,
        $pat_phone,
        $pat_type,
        $pat_addr,
        $pat_er_case,
        $pat_er_date,
        $pat_er_series
    );
    $stmt->execute();
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

        <div class="content-page-inpatient">
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
                                        <li class="breadcrumb-item active">Emergency</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">

                            <div class="card-box-inpatient ">

                                <!-- button for CRUD -->
                                <div class="d-flex justify-content-start">
                                    <!-- <button type="button" class=" lg-4 bi-plus btn maroon-outline-btn-inpatient  btn-lg-2" data-toggle="modal" data-target="#myModal"> Add New </button> -->
                                    <button type="button" class=" lg-4 bi-plus btn maroon-outline-btn-inpatient  btn-lg-2 for_modal_buttons" id="viewInpatient"> View </button>
                                    <!-- <button type="button" class=" lg-4 bi-plus btn maroon-outline-btn-inpatient  btn-lg-2 for_modal_buttons" id="updateInpatient"> Edit</button>
                                    <button type="button" class=" lg-4 bi-plus btn maroon-outline-btn-inpatient  btn-lg-2 for_modal_buttons for_delete_button" data-modal_id="deleteConfirmationModal" data-recordid=" .$Id."> Delete </button> -->

                                    <div class="row inpatient-search my-1">
                                        <input type="text" id="searchInput" placeholder="Search" data-tablename="his_ancillary" data-columntosearch="render_name" data-resulttable="ancillaryData" class="form-control form-control-sm demo-foo-search" autocomplete="on" onkeyup="searchTable()">
                                    </div>


                                </div>
                                <!-- end -->

                                <div class="container-inpatient">


                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog modal-lg">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    Fill all fields
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <!--Add Patient Form-->
                                                        <form id="addpatient_emergency">
                                                            <div class="form-row">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputEmail4" class="col-form-label">First Name</label>
                                                                        <input type="text" required="required" name="pat_fname" class="form-control" id="inputEmail4" placeholder=" First Name">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                                        <input required="required" type="text" name="pat_lname" class="form-control" id="inputPassword4" placeholder=" Last Name">
                                                                    </div>

                                                                    <div class="form-group col-md-2" style="display:none">
                                                                        <?php
                                                                        $length = 5;
                                                                        $patient_number =  "EME-" . substr(str_shuffle("0123456789"), 0, 6);
                                                                        ?>
                                                                        <label for="inputZip" class="col-form-label">Patient Number</label>
                                                                        <input type="text" name="pat_number" value="<?php echo $patient_number; ?>" class="form-control" id="inputZip">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputEmail4" class="col-form-label">Date Of Birth</label>
                                                                        <input type="date" required="required" name="pat_dob" class="form-control" id="bday" placeholder="DD/MM/YYYY">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Age</label>
                                                                        <input required="required" type="number" name="pat_age" class="form-control" id="age" placeholder=" " readonly>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputCity" class="col-form-label">Civil Status</label>
                                                                        <select id="inputState" name="pat_status" class="form-control">
                                                                            <option></option>
                                                                            <option>Single</option>
                                                                            <option>Married</option>
                                                                            <option>Divorced</option>
                                                                            <option>Widowed</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputCity" class="col-form-label">Gender</label>
                                                                        <select name="pat_gender" class="form-control">
                                                                            <option></option>
                                                                            <option>Male</option>
                                                                            <option>Female</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4 ">
                                                                        <label for="inputAddress" class="col-form-label">Address</label>
                                                                        <input required="required" type="text" class="form-control" name="pat_addr" id="inputAddress" placeholder="Patient's Addresss">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputCity" class="col-form-label">Mobile Number</label>
                                                                        <input required="required" type="text" name="pat_phone" class="form-control" id="inputCity" placeholder="mobile number">
                                                                    </div>
                                                                    <div class="form-group col-md-4" style="display: none;">
                                                                        <label for="inputState" class="col-form-label">Patient's Type</label>
                                                                        <input id="inputState" required="required" name="pat_type" class="form-control" value="Emergency">
                                                                    </div>


                                                                    <div class="form-group col-md-2" style="display:none">
                                                                        <?php
                                                                        $length = 6;
                                                                        $patient_er_case =  substr(str_shuffle('0123456789'), 1, $length);
                                                                        ?>
                                                                        <label for="inputZip" class="col-form-label">E.R. Case No.</label>
                                                                        <input type="text" name="pat_er_case" value="<?php echo $patient_er_case; ?>" class="form-control" id="inputZip">
                                                                    </div>


                                                                    <div class="form-group col-md-6" style="display: none;">
                                                                        <label for="inputCity" class="col-form-label">E.R. Case DateTime</label>
                                                                        <input required="required" type="date" name="pat_er_date" class="form-control" id="inputCity" value="<?php echo date('Y-m-d'); ?>">
                                                                    </div>

                                                                    <div class="form-group col-md-2" style="display:none">
                                                                        <?php
                                                                        $length = 6;
                                                                        $patient_er_series =  substr(str_shuffle('0123456789'), 1, $length);
                                                                        ?>
                                                                        <label for="inputZip" class="col-form-label">E.R. Series No.</label>
                                                                        <input type="text" name="pat_er_series" value="<?php echo $patient_er_series; ?>" class="form-control" id="inputZip">
                                                                    </div>

                                                                    <div class="form-group col-md-6" style="display: none;">
                                                                        <input type="number" name="add_new_case" class="form-control" value="0">
                                                                    </div>

                                                                    <!-- <div class="form-group col-md-4" style="display: none;">
                                                                        <label for="inputCity" class="col-form-label">E.R. Area</label>
                                                                        <input type="text" name="pat_er_area" class="form-control" id="inputCity">
                                                                    </div> -->
                                                                    <!-- 
                                                                    <div class="form-group col-md-4" style="display: none;">
                                                                        <label for="inputState" class="col-form-label">E.R. Bed No</label>
                                                                        <select id="inputState" name="pat_bed" class="form-control">
                                                                            <option>None</option>
                                                                            <option>5CW PVT RM IN</option>
                                                                            <option>333</option>
                                                                            <option>6CW PVT RM IN </option>
                                                                            <option>3CW PVT RM IN </option>
                                                                        </select>
                                                                    </div> -->

                                                                </div>
                                                                <!-- START ROOM SELECTIONS -->




                                                                <div class="modal-footer my-3 ">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="ladda-button btn btn-primary" data-style="expand-right" name="add_emergency">Save changes</button>

                                                                </div>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- POST CHARGES MODAL -->
                            <div class="modal" id="postChargesModal" tabindex="-1" role="dialog" aria-labelledby="postChargesModalLabel">
                                <div class="modal-dialog " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="postChargesModalLabel"></h5>
                                            Ancillary Department Selection List
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">

                                                <div class="table-responsive table-sm">
                                                    <table class="table table-hover">
                                                        <thead class="table-danger">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Department Name</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="post_charges_checkbox" style="cursor: pointer;">
                                                                <th><input type="checkbox"></th>
                                                                <td class="text">Laboratory Services</td>

                                                            </tr>
                                                            <tr class="post_charges_checkbox" style="cursor: pointer;">
                                                                <th><input class="post_charges_checkbox" type="checkbox"></th>
                                                                <td class="text">Accounting</td>

                                                            </tr>
                                                            <!-- <tr>
                                                                        <th><input type="checkbox"></th>
                                                                        <td></td>

                                                                    </tr> -->
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="post_charges_select_button" class="btn btn-primary">Select</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END POST CHARGES-->

                            <!-- TAG for MGH Clearance MODAL -->
                            <div class="modal" id="tagMghModal" tabindex="-1" role="dialog" aria-labelledby="tagMghModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tagMghModalLabel"></h5>
                                            List of Departments subject for notification of MGH tagging
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Please notify the following department that this patient account is now subject for May-Go-Home tagging. All departments must confirm that there are no longer floating or unrendered transactions especially requisitions for this account before you could push through with May-Go-Home processing.
                                            <hr>
                                            You may exclude and include and include departments which you think notification is not necessary for inclusion by clicking the leftmost checkbox.
                                            <hr>
                                            <div class="form-row">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered   table-sm" data-page-size="7">
                                                        <thead class="table-danger">
                                                            <tr>
                                                                <!-- <th>Select </th> -->
                                                                <th></th>
                                                                <th>Department Name</th>

                                                            </tr>
                                                        </thead>


                                                        <tbody>
                                                            <tr class="user_dep_row" style="cursor: pointer">
                                                                <td><input class="to_tag_checkbox" type="checkbox"></td>

                                                                <td class="department_name">Billing</td>

                                                            </tr>
                                                            <!-- <tr class="user_dep_row" style="cursor: pointer">
                                                                        <td><input class="to_tag_checkbox" type="checkbox"></td>

                                                                        <td class="department_name">Pharmacy</td>

                                                                    </tr>
                                                                    <tr class="user_dep_row" style="cursor: pointer">
                                                                        <td><input class="to_tag_checkbox" type="checkbox"></td>

                                                                        <td class="department_name">Information Staff</td>

                                                                    </tr> -->
                                                            <tr class="user_dep_row" style="cursor: pointer">
                                                                <td><input class="to_tag_checkbox" type="checkbox"></td>

                                                                <td class="department_name">Laboratory Services</td>

                                                            </tr>
                                                            <!-- <tr class="user_dep_row" style="cursor: pointer">
                                                                        <td><input class="to_tag_checkbox" type="checkbox"></td>

                                                                        <td class="department_name">Nurse</td>

                                                                    </tr> -->

                                                        </tbody>



                                                    </table>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="notify_button" class="btn btn-primary">Notify</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END TAG for MGH Clearance MODAL-->


                            <!-- Start unTAG for MGH Clearance MODAL -->
                            <div class="modal" id="untagMghModal" tabindex="-1" role="dialog" aria-labelledby="untagMghModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="untagMghModalLabel"></h5>
                                            Untag for May-Go-Home Clearance
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            You are about to untag this registry for May-Go-Home clearance. Please Specify in the remarks entry box reasons behind this untagging process.
                                            <hr>
                                            By default, all the department sent with the " Untag..." notice are selected for unclearing process.You may deselect the department you want it excluded in this process, then click "Untag..." button.

                                            Click "Close" button otherwise.
                                            <hr>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label"> reference date</label>
                                                <input type="text" readonly class="form-control " value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label"> reference date</label>
                                                <input type="text" readonly class="form-control " value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                            <!-- <div class="form-group col-md-6">
                                                        <label for="inputPassword4" class="col-form-label">Notes. Remarks </label>
                                                        <textarea class="form-control" id="" rows="2"></textarea>
                                                    </div> -->
                                            <hr>
                                            <div class="form-row">
                                                <div class="table-responsive">
                                                    <table id="unclear_mgh" class="table table-bordered   table-sm" data-page-size="7">
                                                        <thead class="table-danger">
                                                            <tr>
                                                                <!-- <th>Select </th> -->
                                                                <th><input id="select_all_tags" type="checkbox" /></th>
                                                                <th>DateTime Notified</th>
                                                                <th>Department Name</th>

                                                            </tr>
                                                        </thead>


                                                        <tbody>



                                                        </tbody>



                                                    </table>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="untag_button" class="btn btn-primary">Untag</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END for UnTAG for MGH Clearance MODAL-->

                            <!--START TAG for MGH  MODAL -->
                            <div class="modal" id="MghModal" tabindex="-1" role="dialog" aria-labelledby="MghModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="MghModalLabel"></h5>
                                            May-Go-Home Clearing Status Window per Department
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Tagging of patient Registry as May-Go-Home status requires all departments concerned to confirm clearance to avoid unnecessary problems related to transaction charges that may result to delays of discharging the patient.
                                            <hr>
                                            Listed below are the notified departments for your reference.
                                            <hr>
                                            <div class="form-row">
                                                <div class="table-responsive">
                                                    <table id="mgh_table" class="table table-bordered   table-sm" data-page-size="7">
                                                        <thead class="table-danger">
                                                            <tr>
                                                                <!-- <th>Select </th> -->
                                                                <th>Status</th>
                                                                <th>Department Name</th>

                                                            </tr>
                                                        </thead>


                                                        <tbody>



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="tas_as_mgh" class="btn btn-primary">Tag as MGH</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END TAG for MGH  MODAL-->

                            <!--START TAG for DISCHARGE  MODAL -->
                            <div class="modal" id="dischargeModal" tabindex="-1" role="dialog" aria-labelledby="dischargeModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="dischargeModalLabel"></h5>
                                            Discharge Patient
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            The hospital discharges a patient after medical assessment, documentation, and providing necessary instructions for post-hospital care.
                                            <hr>
                                            Only patient tagged as 'May-Go-Home' can be discharged.
                                            <hr>
                                            <div class="form-row">

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="proceed_discharge" class="btn btn-primary">Proceed</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END TAG for DISCHARGE  MODAL-->









                            <!-- Modal -->
                            <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this record?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" id="inpatient_delete_button" class="btn btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- END MODAL -->


                            <div class="row-inpatient">
                                <div class="col-lg-9 my-1">
                                    <!-- Content for the first column goes here -->




                                    <div class="table-responsive ">
                                        <table id="patient-table" class="table table-borderless table-hover mb-0" data-page-size="7">
                                            <thead class="table-danger">
                                                <tr>
                                                    <th>#</th>
                                                    <th data-toggle="true">Patient Name</th>
                                                    <th data-hide="phone">Birth Date</th>
                                                    <th data-hide="phone">Patient ID</th>
                                                    <th data-hide="phone">E.R. Case No.</th>
                                                    <th data-hide="phone">E.R. Case DateTime</th>
                                                    <th data-hide="phone">E.R. Series No.</th>
                                                    <th data-hide="phone">Tagged as MGH</th>

                                                </tr>
                                            </thead>
                                            <tbody data-toggle="true" data-show="4">


                                                <?php
                                                /*
                                                *get details of allpatients
                                                *
                                            */
                                                $ret = "SELECT * FROM  his_patients WHERE pat_type = 'Emergency' AND deleted = 0 AND discharged = 0  ";
                                                //sql code to get to ten docs  randomly
                                                $stmt = $mysqli->prepare($ret);
                                                $stmt->execute(); //ok
                                                $res = $stmt->get_result();
                                                $cnt = 1;
                                                while ($row = $res->fetch_object()) {
                                                ?>

                                                    <tr class="inpatient_table" data-id="<?php echo $row->pat_id; ?>" data-pat_number="<?php echo $row->pat_number; ?>" data-pat_name="<?php echo $row->pat_fname . " " . $row->pat_lname; ?>" style="cursor:pointer; ">
                                                        <td><?php echo $cnt; ?></td>
                                                        <td><?php echo $row->pat_fname; ?> <?php echo $row->pat_lname; ?></td>
                                                        <td><?php echo $row->pat_dob; ?></td>
                                                        <td><?php echo $row->pat_number; ?></td>
                                                        <td><?php echo $row->pat_er_case; ?></td>
                                                        <td><?php echo $row->pat_er_date; ?></td>
                                                        <td><?php echo $row->pat_er_series; ?></td>
                                                        <td><?php echo ($row->tagged_as_mgh == 1 ? "Yes" : "No"); ?></td>

                                                    </tr>

                                                <?php $cnt = $cnt + 1;
                                                } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr class="active">
                                                    <td colspan="12">
                                                        <div class="text-right">
                                                            <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div> <!-- end .table-responsive-->

                                </div>
                                <div class="col-lg-3 my-2 ">
                                    <!-- Content for the second column goes here -->

                                    <!-- Modal Buttons  -->
                                    <div class="d-flex flex-column justify-content-end">
                                        <button type="button" class="btn btn maroon-outline-btn-tag btn-xs ml-1">Sub Components⬇️</button>
                                        <!-- <button type="button" class="btn btn maroon-outline-btn-tags btn-xs ml-1 for_modal_buttons" data-modal_id="postChargesModal">Post Charges</button> -->
                                        <button type="button" class="btn btn maroon-outline-btn-tags btn-xs ml-1 for_modal_buttons" data-modal_id="tagMghModal">Tag for MGH Clearance</button>
                                        <button type="button" class="btn btn maroon-outline-btn-tags btn-xs ml-1 for_modal_buttons" data-modal_id="untagMghModal">Untag for MGH Clearance</button>
                                        <!-- <button type="button" class="btn btn maroon-outline-btn-tags btn-xs ml-1 for_modal_buttons" data-modal_id="MghModal">Tag for MGH</button> -->
                                        <!-- <button type="button" class="btn btn maroon-outline-btn-tags btn-xs ml-1 for_modal_buttons" data-modal_id="noMghModal">Untag as MGH</button> -->
                                        <!-- <button type="button" class="btn btn maroon-outline-btn-tags btn-xs ml-1 for_modal_buttons" data-modal_id="dischargeModal">Discharge</button> -->
                                    </div>
                                    <!-- end -->

                                </div>
                            </div>







                        </div> <!-- container -->

                    </div> <!-- content -->

                    <!-- Footer Start -->
                    <?php include('assets/inc/footer.php'); ?>
                    <!-- end Footer -->

                </div>

                <!-- Modal -->
                <div class="modal fade" id="existing_patient_modal" role="dialog">
                    <div class="modal-dialog modal-m">
                        <div class="modal-content">
                            <div class="modal-header" style="font-size: 20px">
                                Patient already registered!
                            </div>
                            <div class="modal-body">
                                <p style="margin-bottom: 0; font-size: 16px;">Add new case for this patient?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" id="do_not_add" data-dismiss="modal">No</button>
                                <button type="button" class="ladda-button btn btn-primary" id="add_new_case" data-style="expand-right">Yes</button>
                            </div>
                        </div>
                    </div>
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
                    // Initialize Footable
                    $('#patient-table').footable();
                });
            </script>

            <script>
                document.getElementById("bday").addEventListener("change", function() {
                    const dob = new Date(this.value);
                    if (!isNaN(dob.getTime())) {
                        const today = new Date();
                        const age = today.getFullYear() - dob.getFullYear();

                        // Check if the birthday has occurred this year
                        if (today.getMonth() < dob.getMonth() || (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())) {
                            age--;
                        }

                        document.getElementById("age").value = age;
                    } else {
                        document.getElementById("age").value = ""; // Invalid date, clear the age field
                    }
                });
            </script>

            <script>
                // JavaScript function to filter the table based on the input
                function searchTable() {
                    var input = document.getElementById("searchInput").value.toUpperCase();
                    var table = document.getElementById("patient-table");
                    var rows = table.getElementsByTagName("tr");

                    for (var i = 0; i < rows.length; i++) {
                        var patientNameCell = rows[i].getElementsByTagName("td")[1];
                        if (patientNameCell) {
                            var patientName = patientNameCell.textContent || patientNameCell.innerText;
                            if (patientName.toUpperCase().indexOf(input) > -1) {
                                rows[i].style.display = "";
                            } else {
                                rows[i].style.display = "none";
                            }
                        }
                    }
                }
            </script>




            <script>
                $(document).ready(function() {

                    var currentRequest = null;

                    $("#add_new_case").click(function() {
                        $("input[name='add_new_case']").val("1")
                        $('#addpatient_emergency').submit();
                    })

                    $("#do_not_add").click(function() {
                        $(':input', '#addpatient_emergency').not(':button, :submit, :reset, :hidden').val('')
                        $("#existing_patient_modal").modal("hide");

                    })

                    $('#addpatient_emergency').on('submit', function(e) {
                        e.preventDefault();

                        var currentRequest = null;
                        // Cancel the previous AJAX request if it exists
                        if (currentRequest) {
                            currentRequest.abort();
                        }

                        const patientData = {
                            pat_fname: $('input[name="pat_fname"]').val(),
                            pat_lname: $('input[name="pat_lname"]').val(),
                            pat_number: $('input[name="pat_number"]').val(),
                            pat_phone: $('input[name="pat_phone"]').val(),
                            pat_type: $('input[name="pat_type"]').val(),
                            pat_addr: $('input[name="pat_addr"]').val(),
                            pat_age: $('input[name="pat_age"]').val(),
                            pat_dob: $('input[name="pat_dob"]').val(),
                            pat_status: $('input[name="pat_status"]').val(),
                            pat_gender: $('input[name="pat_gender"]').val(),
                            pat_er_case: $('input[name="pat_er_case"]').val(),
                            pat_er_date: $('input[name="pat_er_date"]').val(),
                            pat_er_series: $('input[name="pat_er_series"]').val(),
                            add_new_case: $('input[name="add_new_case"]').val(),
                        }

                        // Send a new AJAX request
                        currentRequest = $.ajax({
                            url: 'http://localhost/HIS-SWU/backend/admin/case.php',
                            method: 'POST',
                            data: patientData,
                            dataType: 'json',
                            success: function(data) {
                                console.log('Data Received:', data);

                                if (data?.existing) {
                                    $("#myModal").modal("hide");
                                    $("#existing_patient_modal").modal("show");


                                } else {
                                    setTimeout(function() {
                                            swal("Success", data?.message, "success");
                                        },
                                        100);


                                    $(':input', '#addpatient_emergency')
                                        .not(':button, :submit, :reset, :hidden')
                                        .val('')

                                    $("#existing_patient_modal").modal("hide");
                                    $("#myModal").modal("hide");
                                    $("input[name='add_new_case']").val("0")

                                    $("#demo-foo-filtering").find("tbody").append(`
                                <tr>
                                <td>${$("#demo-foo-filtering").find("tbody").children().length + 1}</td>
                                <td>${patientData.pat_fname} ${patientData.pat_lname}</td>
                                <td>${patientData.pat_dob}</td>
                                <td>${patientData.pat_number}</td>
                                <td>${patientData.pat_status}</td>
                                <td>${patientData.pat_gender}</td>
                                <td>${patientData.pat_er_case}</td>
                                <td>${patientData.pat_er_date}</td>
                                <td>${patientData.pat_er_series}</td>
                                <td>
                                    <a href="his_admin_view_single_patient.php?pat_id=${data.pat_id}&&pat_number=${patientData.pat_number}" class="badge badge-success"><i class="mdi mdi-eye"></i> View</a>
                                    <a href="his_admin_update_emergency.php?pat_id=${data.pat_id}" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                    <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteConfirmationModal" data-recordid="${data.pat_id}">
                                        <i class="mdi mdi-trash-can-outline"></i> Delete
                                    </a>
                                </td>
                            </tr>
                                `);
                                }


                            },
                            error: function(xhr, status, error) {
                                console.error('AJAX Error:', status, error);
                                $("input[name='add_new_case']").val("0")
                            },

                        });
                    });
                })
            </script>

            <script>
                $(document).ready(function() {
                    var pat_id = null;
                    var pat_name = "";
                    var pat_number = null;
                    var department_selected = null;
                    var to_notify = []

                    $(".inpatient_table").on("click", function() {
                        $(".inpatient_table").removeClass("selected")
                        pat_id = $(this).data("id");
                        pat_number = $(this).data("pat_number");
                        pat_name = $(this).data("pat_name")
                        $(this).addClass("selected")
                    })

                    $(".for_modal_buttons").click(function() {
                        $(".for_modal_buttons").removeClass("selected");
                        to_notify = []
                        var modalId = $(this).data("modal_id")
                        $(".user_dep_row").find("input").prop("checked", false)
                        if (pat_id == null) {
                            alert("Please select a record first!")
                        } else {
                            $("#" + modalId).modal("toggle")
                        }

                        $(this).addClass("selected");

                        if (modalId == "untagMghModal") {
                            showUntagMghModal()
                        } else if (modalId == "MghModal") {
                            showMghModal()
                        }
                    })

                    $("#select_all_tags").change(function() {
                        const val = $(this).is(":checked");
                        $(".tag_checkbox").prop('checked', val);
                    })

                    $("#untag_button").click(function() {
                        let deleteRecordIds = []
                        $(".tag_row").each(function(idx, elem) {
                            console.log($(this).find(".dept").text())
                            const cb = $(this).find("input")
                            if (cb) {
                                if (cb.is(":checked")) {
                                    deleteRecordIds.push($(this).prop("id"))
                                }
                            }
                        })
                        if (deleteRecordIds.length == 0) {
                            alert("No tag selected!")
                        } else {


                            $.ajax({
                                url: '/HIS-SWU/backend/billing/his_billing_clear_notif.php',
                                method: 'POST',
                                data: {
                                    deleteRecordId: deleteRecordIds,
                                },
                                dataType: 'json',
                                success: function(data) {
                                    deleteRecordIds.forEach(id => $("#" + id).remove())
                                }
                            })
                        }
                    })

                    function showMghModal() {
                        $("#mgh_table").data("pat_id", pat_id)
                        $.ajax({
                            url: '/HIS-SWU/backend/admin/his_admin_notify.php',
                            method: 'POST',
                            data: {
                                pat_id: pat_id,
                                cleared: "all",
                            },
                            dataType: "json",
                            success: function(data) {
                                $("#mgh_table tbody").empty()
                                $.each(data, function(index, item) {

                                    $("#mgh_table tbody").append(`
                                    <tr class="mgh_row" id="${item.no_id}">
                                        <td>${item.cleared == 1 ? "Cleared" : "Not cleared"}</td>
                                        <td>${item.no_dept}</td>
                                    </tr>
                                `);

                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('AJAX Error:', status, error);
                            }
                        })
                    }

                    function showUntagMghModal() {
                        $("#unclear_mgh").data("pat_id", pat_id)
                        $.ajax({
                            url: '/HIS-SWU/backend/admin/his_admin_notify.php',
                            method: 'POST',
                            data: {
                                pat_id: pat_id,
                                cleared: 0,
                            },
                            dataType: "json",
                            success: function(data) {
                                $("#unclear_mgh tbody").empty()
                                $.each(data, function(index, item) {

                                    $("#unclear_mgh tbody").append(`
                                    <tr class="tag_row" id="${item.no_id}">
                                        <td><input class="tag_checkbox" type="checkbox" ></td>
                                        <td>${item.no_date}</td>
                                        <td class="dept">${item.no_dept}</td>
                                    </tr>
                                `);

                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('AJAX Error:', status, error);
                            }
                        })
                    }


                    $(".post_charges_checkbox").click(function() {
                        $(".post_charges_checkbox").find("input").prop("checked", false)
                        $(this).find("input").prop("checked", true)
                        department_selected = $(this).find(".text").text()
                    })

                    // CRUD for inpatient
                    $("#viewInpatient").click(function() {
                        // Check if any row is selected
                        if ($(".inpatient_table.selected").length > 0) {
                            // Get the pat_id and pat_number of the selected row
                            var pat_id = $(".inpatient_table.selected").data("id");
                            var pat_number = $(".inpatient_table.selected").data("pat_number");

                            // Redirect to the view page with the selected data
                            location.href = `/HIS-SWU/backend/nurse/his_doc_view_single_patient.php?pat_id=${pat_id}&pat_number=${pat_number}`;
                        } else {
                            // Prevent the default action of the click event (disabling the link)
                            return false;
                        }
                    });

                    $("#updateInpatient").click(function() {
                        // Check if any row is selected
                        if ($(".inpatient_table.selected").length > 0) {
                            // Get the pat_id and pat_number of the selected row
                            var pat_id = $(".inpatient_table.selected").data("id");
                            var pat_number = $(".inpatient_table.selected").data("pat_number");

                            // Redirect to the update page with the selected data
                            location.href = `/HIS-SWU/backend/infostaff/his_doc_update_emergency.php?pat_id=${pat_id}&pat_number=${pat_number}`;
                        }
                    });





                    // END



                    $("#post_charges_select_button").click(function() {
                        location.href = `/HIS-SWU/backend/infostaff/his_admin_render.php?pat_id=${pat_id}&pat_number=${pat_number}&department=${department_selected}`
                    })


                    $(".inpatient_table").on("mouseenter", function() {
                        $(this).addClass("active")
                    })

                    $(".inpatient_table").on("mouseleave", function() {
                        $(this).removeClass("active")
                    })

                    $(".to_tag_checkbox").change(function() {
                        var isChecked = $(this).is(":checked")
                        var dep_name = $(this).parent().parent().find(".department_name").text()
                        if (isChecked) {
                            to_notify.push(dep_name)
                        } else {
                            to_notify = to_notify.filter(i => i != dep_name)
                        }
                        console.log(to_notify)
                    })

                    $("#notify_button").click(function() {
                        var message = "Please tag patient " + pat_name + " with the patient ID " + pat_number + " as cleared"
                        $.ajax({
                            url: '/HIS-SWU/backend/admin/his_admin_notify.php',
                            method: 'POST',
                            data: {
                                pat_id: pat_id,
                                to_notify: to_notify.join(","),
                                message: message
                            },
                            dataType: 'json',
                            success: function(data) {
                                $("#tagMghModal").modal("toggle")
                                alert(data)
                            },
                            error: function(xhr, status, error) {
                                console.error('AJAX Error:', status, error);
                            }
                        })
                    })

                    $("#tas_as_mgh").click(function() {
                        $.ajax({
                            url: '/HIS-SWU/backend/admin/his_admin_notify.php',
                            method: 'POST',
                            data: {
                                pat_id: pat_id,
                                tag_as_mgh: true
                            },
                            dataType: 'json',
                            success: function(data) {
                                $("#MghModal").modal("toggle")
                                alert(data)
                            },
                            error: function(xhr, status, error) {
                                console.error('AJAX Error:', status, error);
                            }
                        })
                    })

                    $("#proceed_discharge").click(function() {
                        $.ajax({
                            url: '/HIS-SWU/backend/admin/his_admin_notify.php',
                            method: 'POST',
                            data: {
                                pat_id: pat_id,
                                discharge: true
                            },
                            dataType: 'json',
                            success: function(data) {
                                $("#dischargeModal").modal("toggle")
                                alert(data)
                            },
                            error: function(xhr, status, error) {
                                console.error('AJAX Error:', status, error);
                            }
                        })
                    })

                    $("#inpatient_delete_button").click(function() {
                        $.ajax({
                            url: '/HIS-SWU/backend/admin/his_admin_notify.php',
                            method: 'POST',
                            data: {
                                pat_id: pat_id,
                                delete: true
                            },
                            dataType: 'json',
                            success: function(data) {
                                $("#deleteConfirmationModal").modal("toggle")
                                alert(data)
                            },
                            error: function(xhr, status, error) {
                                console.error('AJAX Error:', status, error);
                            }
                        })
                    })


                })
            </script>


</body>

</html>