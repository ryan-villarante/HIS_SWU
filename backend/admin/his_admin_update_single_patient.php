<!--Server side code to handle  Patient Registration-->
<?php
session_start();
include('assets/inc/config.php');
if (isset($_POST['update_patient'])) {
    $pat_id = $_GET['pat_id'];
    $pat_fname = $_POST['pat_fname'];
    $pat_lname = $_POST['pat_lname'];
    $pat_number = $_POST['pat_number'];
    $pat_phone = $_POST['pat_phone'];
    $pat_type = $_POST['pat_type'];
    $pat_addr = $_POST['pat_addr'];
    $pat_age = $_POST['pat_age'];
    $pat_dob = $_POST['pat_dob'];
    $pat_ailment = $_POST['pat_ailment'];
    $pat_doc = $_POST['pat_doc'];
    $pat_room = $_POST['pat_room'];
    $pat_bed = $_POST['pat_bed'];
    $pat_admit = $_POST['pat_admit'];
    $pat_admit_time = $_POST['pat_admit_time'];
    $pat_admit_type = $_POST['pat_admit_type'];
    $pat_nurse = $_POST['pat_nurse'];
    $pat_billed = $_POST['pat_billed'];
    //sql to insert captured values
    $query = "UPDATE  his_patients  SET pat_fname=?, pat_lname=?, pat_age=?, pat_dob=?, pat_number=?, pat_phone=?, pat_type=?, pat_addr=?, pat_doc=?,  pat_room=?, pat_bed=?, pat_admit=?, pat_admit_time=?, pat_admit_type=?, pat_nurse=?, pat_billed=?,  pat_ailment=? WHERE pat_id = ?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('sssssssssssssssssi', $pat_fname, $pat_lname, $pat_age, $pat_dob, $pat_number, $pat_phone, $pat_type, $pat_addr, $pat_doc, $pat_room, $pat_bed, $pat_admit, $pat_admit_time, $pat_admit_type, $pat_nurse, $pat_billed, $pat_ailment, $pat_id);
    $stmt->execute();
    /*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Patient Details Updated";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}
?>
<!--End Server Side-->
<!--End Patient Registration-->
<!DOCTYPE html>
<html lang="en">

<!--Head-->
<?php include('assets/inc/head.php'); ?>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include("assets/inc/nav.php"); ?>
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
                                        <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="his_admin_inpatient_records.php">Patients</a></li>
                                        <li class="breadcrumb-item active">Manage Patients</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Update Patient Details</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Form row -->
                    <!--LETS GET DETAILS OF SINGLE PATIENT GIVEN THEIR ID-->
                    <?php
                    $pat_id = $_GET['pat_id'];
                    $ret = "SELECT  * FROM his_patients WHERE pat_id=?";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->bind_param('i', $pat_id);
                    $stmt->execute(); //ok
                    $res = $stmt->get_result();
                    //$cnt=1;
                    while ($row = $res->fetch_object()) {
                    ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Fill all fields</h4>
                                        <!--Add Patient Form-->
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">First Name</label>
                                                    <input type="text" required="required" value="<?php echo $row->pat_fname; ?>" name="pat_fname" class="form-control" id="inputEmail4" placeholder="Patient's First Name">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_lname; ?>" name="pat_lname" class="form-control" id="inputPassword4" placeholder="Patient`s Last Name">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Date Of Birth</label>
                                                    <input type="text" required="required" value="<?php echo $row->pat_dob; ?>" name="pat_dob" class="form-control" id="inputEmail4" placeholder="DD/MM/YYYY">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Age</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_age; ?>" name="pat_age" class="form-control" id="inputPassword4" placeholder="Patient`s Age">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Mobile Number</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_phone; ?>" name="pat_phone" class="form-control" id="inputCity">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Ailment</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_ailment; ?>" name="pat_ailment" class="form-control" id="inputCity">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Patient's Type</label>
                                                    <select id="inputState" required="required" value="<?php echo $row->pat_type; ?>" name="pat_type" class="form-control">

                                                        <option>InPatient</option>

                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputAddress" class="col-form-label">Address</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_addr; ?>" class="form-control" name="pat_addr" id="inputAddress" placeholder="Patient's Addresss">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Attending Physician</label>
                                                    <select id="inputState" required="required" value="<?php echo $row->pat_doc; ?>" name="pat_doc" class="form-control">
                                                        <option>None</option>
                                                        <option>Marlo Getutua</option>
                                                        <option>Marvin Lachica</option>
                                                        <option>Zandra Salas </option>
                                                        <option>Leoncio Lachica </option>
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Room Number</label>
                                                    <select id="inputState" required="required" value="<?php echo $row->pat_room; ?>" name="pat_room" class="form-control">
                                                        <option>None</option>
                                                        <option>5CW PVT RM IN</option>
                                                        <option>333</option>
                                                        <option>6CW PVT RM IN </option>
                                                        <option>3CW PVT RM IN </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Admission Number</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_admit; ?>" name="pat_admit" class="form-control" id="inputCity">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Bed Number</label>
                                                    <select id="inputState" required="required" value="<?php echo $row->pat_bed; ?>" name="pat_bed" class="form-control">
                                                        <option>None</option>
                                                        <option>5CW PVT RM IN</option>
                                                        <option>333</option>
                                                        <option>6CW PVT RM IN </option>
                                                        <option>3CW PVT RM IN </option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-2" style="display:none">
                                                    <?php
                                                    $length = 5;
                                                    $patient_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);
                                                    ?>
                                                    <label for="inputZip" class="col-form-label">Patient Number</label>
                                                    <input type="text" name="pat_number" value="<?php echo $patient_number; ?>" class="form-control" id="inputZip">
                                                </div>
                                            </div>


                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputAddress" class="col-form-label">Admission DateTime</label>
                                                    <input required="required" type="date" value="<?php echo $row->pat_admit_time; ?>" class="form-control" name="pat_admit_time" id="inputAddress" placeholder="Patient's Addresss">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Admission Type</label>
                                                    <select id="inputState" required="required" value="<?php echo $row->pat_admit_type; ?>" name="pat_admit_type" class="form-control">
                                                        <option>None</option>
                                                        <option>New Patient</option>
                                                        <option>Old Patient</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Nurse Station</label>
                                                    <select id="inputState" required="required" value="<?php echo $row->pat_nurse; ?>" name="pat_nurse" class="form-control">
                                                        <option>None</option>
                                                        <option>WARD- 3rd East Wing</option>
                                                        <option>private 3rd Central Wing</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputAddress" class="col-form-label">Billed By</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_billed; ?>" class="form-control" name="pat_billed" id="inputAddress" placeholder="Patient's Addresss">
                                                </div>

                                            </div>



                                            <button type="submit" name="update_patient" class="ladda-button btn btn-success" data-style="expand-right">Update Patient</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                    <?php  } ?>
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

    <!-- App js-->
    <script src="assets/js/app.min.js"></script>

    <!-- Loading buttons js -->
    <script src="assets/libs/ladda/spin.js"></script>
    <script src="assets/libs/ladda/ladda.js"></script>

    <!-- Buttons init js-->
    <script src="assets/js/pages/loading-btn.init.js"></script>

</body>

</html>