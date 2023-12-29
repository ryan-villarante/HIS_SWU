<?php


session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['user_id'];


?>


<?php
if (isset($_POST['add_inpatient'])) {
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
    $pat_doc = $_POST['pat_doc'];
    // $pat_room = $_POST['pat_room'];
    // $pat_bed = $_POST['pat_bed'];
    $pat_admit = $_POST['pat_admit'];
    $pat_admit_time = $_POST['pat_admit_time'];
    $pat_admit_type = $_POST['pat_admit_type'];
    // Retrieve the selected doctor's fee
    $pat_fee = $_POST['selected_doc_fee'];
    $room_id = $_POST['room_id'];
    $bed_id = $_POST['bed_id'];
    // $pat_nurse = $_POST['pat_nurse'];
    // $pat_billed = $_POST['pat_billed'];
    //sql to insert captured values
    $query = "insert into his_patients (pat_fname, pat_lname, pat_age, pat_dob, pat_status, pat_gender, pat_number, pat_phone, pat_doc, pat_room, pat_type, pat_addr,pat_admit, pat_admit_time, pat_admit_type, room_id, bed_id, pat_fee )
     values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssssssssssssssss', $pat_fname, $pat_lname, $pat_age, $pat_dob, $pat_status, $pat_gender, $pat_number, $pat_phone, $pat_doc, $pat_room, $pat_type, $pat_addr,  $pat_admit, $pat_admit_time, $pat_admit_type, $room_id, $bed_id, $pat_fee);
    $stmt->execute();

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
                                        <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Transactions</a></li>
                                        <li class="breadcrumb-item active">In Patients</li>
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
                                    <button type="button" class=" lg-4 bi-plus btn maroon-outline-btn-inpatient  btn-lg-2" data-toggle="modal" data-target=".bd-example-modal-xl"> Add New </button>
                                    <button type="button" class=" lg-4 bi-plus btn maroon-outline-btn-inpatient  btn-lg-2 for_modal_buttons" id="viewInpatient"> View </button>
                                    <button type="button" class=" lg-4 bi-plus btn maroon-outline-btn-inpatient  btn-lg-2 for_modal_buttons" id="updateInpatient"> Edit</button>
                                    <button type="button" class=" lg-4 bi-plus btn maroon-outline-btn-inpatient  btn-lg-2 for_modal_buttons for_delete_button" data-modal_id="deleteConfirmationModal" data-recordid=" .$Id."> Delete </button>

                                    <div class="row inpatient-search my-1">
                                        <input type="text" id="searchInput" placeholder="Search" data-tablename="his_ancillary" data-columntosearch="render_name" data-resulttable="ancillaryData" class="form-control form-control-sm demo-foo-search" autocomplete="on" onkeyup="searchTable()">
                                    </div>


                                </div>
                                <!-- end -->


                                <div class="container-inpatient">
                                    <!-- Trigger the modal with a button -->

                                    <!-- Modal -->
                                    <div class="modal fade bd-example-modal-xl" role="dialog">
                                        <!-- <div class="modal fade bd-example-modal-xl" id="PatientRegister" role="dialog"> -->
                                        <div class="modal-dialog modal-xl">

                                            <!-- Modal content-->
                                            <div class="modal-content">


                                                <div class="col-lg-10 col-xl-12">
                                                    <div class="card-box" style="font-size: smaller;">


                                                        <div class="card-body">


                                                            <form method="post" id="patientForm">
                                                                <div class="form-group col-md-12 my-3">
                                                                    <input type="text" readonly name="" value="Patient Registration" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputEmail4" class="col-form-label">First Name</label>
                                                                        <input type="text" required="required" name="pat_fname" class="form-control small-input" id="inputEmail4" placeholder=" First Name">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                                        <input type="text" required="required" name="pat_lname" class="form-control small-input" id="inputPassword4" placeholder=" Last Name">
                                                                    </div>



                                                                    <div class="form-group col-md-2" style="display:none">
                                                                        <?php

                                                                        $currentDate = date("Ymd"); // Get current date in the format YYYYMMDD
                                                                        $randomNumber = rand(1, 9); // Generate a random number from 1 to 9
                                                                        $randomSuffix = substr(str_shuffle("0123456789"), 0, 4); // Generate a random 7-digit number

                                                                        $patient_id = "INP-" . substr(str_shuffle("0123456789"), 0, 6);

                                                                        $admission_number = "ADM" . substr(str_shuffle("0123456789"), 0, 4); // Generate a random 4-digit admission number

                                                                        ?>
                                                                        <label for="inputZip" class="col-form-label">Patient Number</label>
                                                                        <input type="text" name="pat_number" value="<?php echo $patient_id; ?>" class="form-control small-input" id="inputZip">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputEmail4" class="col-form-label">Date Of Birth</label>
                                                                        <input type="date" name="pat_dob" class="form-control small-input" id="bday" placeholder="DD/MM/YYYY">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label for="inputPassword4" class="col-form-label">Age</label>
                                                                        <input readonly type="number" name="pat_age" class="form-control small-input" id="age" placeholder="Patient`s Age">
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label for="inputCity" class="col-form-label">Civil Status</label>
                                                                        <select id="inputState" name="pat_status" class="form-control form-control small-input">
                                                                            <option></option>
                                                                            <option>Single</option>
                                                                            <option>Married</option>
                                                                            <option>Divorced</option>
                                                                            <option>Widowed</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label for="inputCity" class="col-form-label">Gender</label>
                                                                        <select name="pat_gender" class="form-control form-control small-input">
                                                                            <option></option>
                                                                            <option>Male</option>
                                                                            <option>Female</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6 ">
                                                                        <label for="inputAddress" class="col-form-label">Address</label>
                                                                        <input type="text" class="form-control small-input" name="pat_addr" id="inputAddress" placeholder="Patient's Addresss">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputCity" class="col-form-label">Mobile Number</label>
                                                                        <input type="text" name="pat_phone" class="form-control small-input" id="inputCity" placeholder="Mobile number">
                                                                    </div>



                                                                    <div class="form-group col-md-4" style="display: none;">
                                                                        <label for="inputState" class="col-form-label">Patient's Type</label>
                                                                        <select id="inputState" name="pat_type" class="form-control small-input">
                                                                            <option>InPatient</option>
                                                                        </select>
                                                                    </div>




                                                                    <div class="form-group col-md-4" style="display: none;">
                                                                        <label for="inputCity" class="col-form-label">Admission Number</label>
                                                                        <input type="text" name="pat_admit" value="<?php echo $admission_number; ?>" class="form-control small-input" id="inputZip">

                                                                    </div>



                                                                    <div class="form-group col-md-4" style="display: none;">
                                                                        <label for="inputCity" class="col-form-label">Admission DateTime</label>
                                                                        <input type="date" name="pat_admit_time" class="form-control small-input" id="inputCity" value="<?php echo date('Y-m-d'); ?>">
                                                                    </div>

                                                                    <div class="form-group col-md-4" style="display: none;">
                                                                        <label for="inputCity" class="col-form-label">Admission Type</label>
                                                                        <select id="inputState" name="pat_admit_type" class="form-control small-input">
                                                                            <option>None</option>
                                                                            <option>New Patient</option>
                                                                            <option>Old Patient</option>

                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4" style="display: none;">
                                                                        <label class="col-form-label">Room Id</label>
                                                                        <input type="text" name="room_id" class="form-control small-input" id="room_id">
                                                                    </div>
                                                                    <div class="form-group col-md-4" style="display: none;">
                                                                        <label class="col-form-label">Bed Id</label>
                                                                        <input type="text" name="bed_id" class="form-control small-input" id="bed_id">
                                                                    </div>

                                                                </div>

                                                                <!-- SELECT PHYSICIAN -->

                                                                <div class="form-group col-md-12 my-1">
                                                                    <input type="text" readonly name="" value="Select Physician" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                                                </div>

                                                                <div class="form-row">

                                                                    <div class="table-responsive">
                                                                        <table id="demo-foo-filtering" class="table table-bordered  mb-0 table-sm" data-page-size="7">
                                                                            <thead class="table-danger">
                                                                                <tr>
                                                                                    <th>Select </th>
                                                                                    <th data-toggle="true">Full Name</th>
                                                                                    <th>Specializations</th>
                                                                                    <th data-toggle="true">Role</th>
                                                                                    <th data-toggle="true">Professional Fee</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <?php

                                                                            $ret = "SELECT * FROM  his_docs  ";
                                                                            $stmt = $mysqli->prepare($ret);
                                                                            $stmt->execute(); //ok
                                                                            $res = $stmt->get_result();
                                                                            $cnt = 1;
                                                                            while ($row = $res->fetch_object()) {
                                                                            ?>

                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td><input type="radio" name="pat_doc" required="required" value="<?php echo $row->doc_fname; ?> <?php echo $row->doc_lname; ?>" onclick="updateDocFee(<?php echo $row->doc_fee; ?>)"></td>
                                                                                        <td><?php echo $row->doc_fname; ?> <?php echo $row->doc_lname; ?></td>
                                                                                        <td><?php echo $row->doc_dept; ?></td>
                                                                                        <td><?php echo $row->doc_role ?></td>
                                                                                        <td>₱<?php echo $row->doc_fee; ?>.00</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            <?php
                                                                            } ?>

                                                                        </table>
                                                                        <input type="hidden" name="selected_doc_fee" id="selectedDocFee" value="">

                                                                    </div>
                                                                </div>


                                                                <!-- START ROOM SELECTIONS -->


                                                                <div class="form-group col-md-12 my-1">
                                                                    <input type="text" readonly name="" value="Select Rooms" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="table-responsive">
                                                                        <table id="roomsTable" class="table table-bordered   table-sm" data-page-size="7">
                                                                            <thead class="table-danger">
                                                                                <tr>
                                                                                    <!-- <th>Select </th> -->
                                                                                    <th>Room</th>
                                                                                    <th>Room Type</th>
                                                                                    <th>Room Status</th>

                                                                                </tr>
                                                                            </thead>
                                                                            <?php

                                                                            $ret = "SELECT * FROM  his_rooms_beds  ";
                                                                            $stmt = $mysqli->prepare($ret);
                                                                            $stmt->execute(); //ok
                                                                            $res = $stmt->get_result();
                                                                            $cnt = 1;
                                                                            while ($row = $res->fetch_object()) {
                                                                            ?>

                                                                                <tbody>
                                                                                    <tr class="roomsTableRow" data-standard_price="<?php echo $row->standard_price; ?>" data-roomIn_price="<?php echo $row->roomIn_price; ?>" data-room_id="<?php echo $row->room_id; ?>">
                                                                                        <!-- <td><input type="radio" required="required" name="pat_room" value="<?php echo $row->room_number; ?>;"></td> -->
                                                                                        <td><?php echo $row->room_number; ?></td>
                                                                                        <td><?php echo $row->room_classification; ?></td>
                                                                                        <td><?php echo $row->room_status; ?></td>

                                                                                    </tr>

                                                                                </tbody>

                                                                            <?php $cnt = $cnt + 1;
                                                                            } ?>

                                                                        </table>
                                                                    </div>

                                                                    <div class="container-fluid ">
                                                                        <div class="row">
                                                                            <!-- Left Column -->
                                                                            <div class="col-md-6">
                                                                                <!-- First Table - Beds -->
                                                                                <table id="bedsTable" class="table table-bordered toggle-circle mb-0 table-sm">
                                                                                    <div class="form-group col-md-12 my-1">
                                                                                        <input type="text" readonly name="" value="Beds" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                                                                    </div>
                                                                                    <thead class="table-danger">
                                                                                        <tr>
                                                                                            <th>Beds</th>

                                                                                            <!-- Add more bed-related columns here -->
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>

                                                                                        <!-- Add more bed rows here -->
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <!-- Right Column -->
                                                                            <div class="col-md-6">
                                                                                <!-- Second Table - Price -->
                                                                                <table class="table table-bordered toggle-circle mb-0 table-sm" id="roomPriceSchemes">
                                                                                    <div class="form-group col-md-12 my-1">
                                                                                        <input type="text" readonly name="" value="Room Price Schemes" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                                                                    </div>
                                                                                    <thead class="table-danger">
                                                                                        <tr>
                                                                                            <th>Description</th>
                                                                                            <th>Room Price</th>
                                                                                            <!-- Add more price-related columns here -->
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>




                                                                </div>

                                                                <div class="modal-footer my-4">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Discard</button>
                                                                    <button type="submit" name="add_inpatient" class="ladda-button btn btn-success" data-style="expand-right">Save Changes</button>



                                                                </div>


                                                            </form>
                                                        </div>
                                                    </div>


                                                </div>
                                                <!-- end row-->


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
                                                        <!-- <div class="col-12 text-sm-center form-inline searchContainer">
                                                            <div class="form-group">
                                                                <input type="text" id="searchInput" placeholder="Search" data-tablename="" data-columntosearch="" data-resulttable="" class="form-control form-control-sm demo-foo-search" autocomplete="on" onkeyup="">
                                                            </div>
                                                        </div> -->
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




                                            <div class="table-responsive table-sm">
                                                <table id="patient-table" class="table table-borderless table-hover mb-0" data-page-size="5">
                                                    <thead class="table-danger">
                                                        <tr>
                                                            <th>#</th>
                                                            <th data-toggle="true">Patient Name</th>
                                                            <th data-hide="phone">Patient ID</th>
                                                            <th data-hide="phone">Attending Physician</th>
                                                            <th data-hide="phone">Room No.</th>
                                                            <th data-hide="phone">Admission No.</th>
                                                            <th data-hide="phone">Bed No.</th>
                                                            <th data-hide="phone">Admission DateTime</th>
                                                            <th data-hide="phone">Tagged as MGH</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody data-toggle="true" data-show="4">

                                                        <?php
                                                        /*
                                                *get details of allpatients
                                                *
                                            */
                                                        $ret = "SELECT * FROM  his_patients p 
                                                LEFT JOIN his_rooms_beds r  ON p.room_id = r.room_id
                                                LEFT JOIN his_beds b  ON p.bed_id = b.bed_id
                                                WHERE p.pat_type = 'InPatient' AND p.deleted = 0 AND p.discharged != 1 ";
                                                        //sql code to get to ten docs  randomly
                                                        $stmt = $mysqli->prepare($ret);
                                                        $stmt->execute(); //ok
                                                        $res = $stmt->get_result();
                                                        $cnt = 1;
                                                        while ($row = $res->fetch_object()) {
                                                        ?>

                                                            <tr class="inpatient_table" data-id="<?php echo $row->pat_id; ?>" data-pat_number="<?php echo $row->pat_number; ?>" data-pat_name="<?php echo $row->pat_fname . " " . $row->pat_lname; ?>" style="cursor:pointer;">
                                                                <td><?php echo $cnt; ?></td>
                                                                <td><?php echo $row->pat_fname; ?> <?php echo $row->pat_lname; ?></td>
                                                                <td><?php echo $row->pat_number; ?></td>
                                                                <td><?php echo $row->pat_doc; ?></td>
                                                                <td><?php echo $row->room_number; ?></td>
                                                                <td><?php echo $row->pat_admit; ?></td>
                                                                <td><?php echo $row->bed_number; ?></td>
                                                                <td><?php echo $row->pat_admit_time; ?></td>
                                                                <td><?php echo ($row->tagged_as_mgh == 1 ? "Yes" : "No"); ?></td>

                                                            </tr>
                                                        <?php $cnt = $cnt + 1;
                                                        } ?>
                                                    </tbody>

                                                    <tfoot>
                                                        <tr class="active">
                                                            <td colspan="10">

                                                                <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>

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
                                                <!-- <button type="button" class="btn btn maroon-outline-btn-tags btn-xs ml-1 for_modal_buttons" data-modal_id="tagMghModal">Tag for MGH Clearance</button>
                                                <button type="button" class="btn btn maroon-outline-btn-tags btn-xs ml-1 for_modal_buttons" data-modal_id="untagMghModal">Untag for MGH Clearance</button> -->
                                                <button type="button" class="btn btn maroon-outline-btn-tags btn-xs ml-1 for_modal_buttons" data-modal_id="MghModal">Tag for MGH</button>
                                                <!-- <button type="button" class="btn btn maroon-outline-btn-tags btn-xs ml-1 for_modal_buttons" data-modal_id="noMghModal">Untag as MGH</button> -->
                                                <button type="button" class="btn btn maroon-outline-btn-tags btn-xs ml-1 for_modal_buttons" data-modal_id="dischargeModal">Discharge</button>
                                            </div>
                                            <!-- end -->

                                        </div>
                                    </div>













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

                <script>
                    $(document).ready(function() {
                        // Initialize Footable
                        $('#patient-table').footable();
                    });
                </script>

                <script>
                    function updateDocFee(docFee) {
                        document.getElementById('selectedDocFee').value = docFee;
                    }
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
                    document.addEventListener("DOMContentLoaded", function() {
                        var patientForm = document.getElementById("patientForm");

                        // Add a submit event listener to the form
                        patientForm.addEventListener("submit", function(event) {
                            var selectedRole = document.querySelector('input[name="pat_doc"]:checked');

                            if (selectedRole) {
                                var roleText = selectedRole.parentNode.nextElementSibling.nextElementSibling.textContent;
                                if (roleText.trim() === "Admitting") {
                                    alert("The following field(s) which are marked with exclamation point symbol should be mandatorily supplied with proper information : Attending Doctor");
                                    event.preventDefault(); // Prevent the form from submitting
                                }
                            } else {
                                alert("Please select a physician before proceeding.");
                                event.preventDefault(); // Prevent the form from submitting
                            }
                        });
                    });
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
                                location.href = `/HIS-SWU/backend/infostaff/his_doc_view_single_patient.php?pat_id=${pat_id}&pat_number=${pat_number}`;
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
                                location.href = `/HIS-SWU/backend/infostaff/his_doc_update_single_patient.php?pat_id=${pat_id}&pat_number=${pat_number}`;
                            }
                        });





                        // END



                        $("#post_charges_select_button").click(function() {
                            location.href = `/HIS-SWU/backend/admin/his_admin_render.php?pat_id=${pat_id}&pat_number=${pat_number}&department=${department_selected}`
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



                        $("#roomsTable tbody tr").click(function() {
                            $("#roomsTable tbody tr").removeClass("active");
                            $(this).addClass("active");
                            const room_id = $(this).data("room_id");
                            $("#room_id").val(room_id)
                            $("#bed_id").val("");
                            $.ajax({
                                url: '/HIS-SWU/backend/admin/his_admin_select_room_info.php',
                                method: 'GET',
                                data: {
                                    room_id: room_id
                                },
                                dataType: 'json',
                                success: function(data) {
                                    $("#bed_id").val("");

                                    var bedsTable = $(`#bedsTable tbody`)

                                    bedsTable.empty();

                                    // Populate the table with search results
                                    $.each(data, function(index, item) {

                                        bedsTable.append(`
                                        <tr class="bedRow" id="bed-${item.bed_id}">
                                            <td>${item.bed_number}</td>
                                        </tr>
                                        `);

                                        $(document).on("click", "tr.bedRow", function() {
                                            $(".bedRow").removeClass("active")
                                            $(this).addClass('active')
                                            $("#bed_id").val($(this).attr("id").split("-")[1])
                                        })
                                    });
                                },
                                error: function(xhr, status, error) {
                                    console.error('AJAX Error:', status, error);
                                }
                            });

                            $("#roomPriceSchemes tbody").empty()
                            $("#roomPriceSchemes tbody").append(`
                            <tr class="priceTable">
                               
                            </tr>
                            <tr class="priceTable">
                                <td>ROOM IN</td>
                                <td>${$(this).data("roomin_price")}</td>
                            </tr>
                        `)

                            $(document).on("click", "tr.priceTable", function() {
                                $(".priceTable").removeClass("active")
                                $(this).addClass('active')
                            })
                        })



                    })
                </script>



</body>

</html>