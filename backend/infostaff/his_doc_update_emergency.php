<!--Server side code to handle  Patient Registration-->
<?php
session_start();
include('assets/inc/config.php');
if (isset($_POST['update_emergency'])) {
    $pat_id = $_GET['pat_id'];
    $pat_fname = $_POST['pat_fname'];
    $pat_lname = $_POST['pat_lname'];
    $pat_number = $_POST['pat_number'];
    $pat_phone = $_POST['pat_phone'];
    $pat_type = $_POST['pat_type'];
    $pat_addr = $_POST['pat_addr'];
    $pat_age = $_POST['pat_age'];
    $pat_dob = $_POST['pat_dob'];
    // $pat_ailment = $_POST['pat_ailment'];
    $pat_er_case = $_POST['pat_er_case'];
    $pat_er_date = $_POST['pat_er_date'];
    $pat_er_series = $_POST['pat_er_series'];
    // $pat_er_area = $_POST['pat_er_area'];
    $pat_bed = $_POST['pat_bed'];
    // $pat_billed = $_POST['pat_billed'];

    //sql to insert captured values
    $query = "UPDATE  his_patients  SET pat_fname=?, pat_lname=?, pat_age=?, pat_dob=?, pat_number=?, pat_phone=?, pat_type=?, 
    pat_addr=?  ,pat_er_case=? ,pat_er_date=? ,pat_er_series=? ,pat_bed=?, pat_num=?  WHERE pat_id = ?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param(
        'sssssssssssssi',
        $pat_fname,
        $pat_lname,
        $pat_age,
        $pat_dob,
        $pat_number,
        $pat_phone,
        $pat_type,
        $pat_addr,
        $pat_er_case,
        $pat_er_date,
        $pat_er_series,
        $pat_bed,
        $pat_num,
        $pat_id
    );
    $stmt->execute();
    /*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Emergency Details Updated";
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
                                        <li class="breadcrumb-item"><a href="his_doc_dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="his_doc_emergency.php">Patients</a></li>
                                        <li class="breadcrumb-item active">Manage Emergency</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Update Emergency Details</h4>
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
                                                    <input type="date" required="required" value="<?php echo $row->pat_dob; ?>" name="pat_dob" class="form-control" id="bday" placeholder="DD/MM/YYYY">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Age</label>
                                                    <input readonly type="number" value="<?php echo $row->pat_age; ?>" name="pat_age" class="form-control" id="age" placeholder="Patient`s Age">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Civil Status</label>
                                                    <select id="inputState" name="pat_status" class="form-control">
                                                        <option <?= $row->pat_status == 'Single' ? ' selected="selected"' : ''; ?>>Single</option>
                                                        <option <?= $row->pat_status == 'Married' ? ' selected="selected"' : ''; ?>>Married</option>
                                                        <option <?= $row->pat_status == 'Divorced' ? ' selected="selected"' : ''; ?>>Divorced</option>
                                                        <option <?= $row->pat_status == 'Widowed' ? ' selected="selected"' : ''; ?>>Widowed</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Gender</label>
                                                    <select name="pat_gender" class="form-control">
                                                        <option <?= $row->pat_gender == 'Male' ? ' selected="selected"' : ''; ?>>Male</option>
                                                        <option <?= $row->pat_gender == 'Female' ? ' selected="selected"' : ''; ?>>Female</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputAddress" class="col-form-label">Address</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_addr; ?>" class="form-control" name="pat_addr" id="inputAddress" placeholder="Patient's Addresss">
                                                </div>


                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Mobile Number</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_phone; ?>" name="pat_phone" class="form-control" id="inputCity">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">E.R. Case DateTime</label>
                                                    <input required="required" type="date" name="pat_er_date" value="<?php echo $row->pat_er_date ?>" class="form-control" id="inputCity">
                                                </div>

                                                <!-- <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Patient Ailment</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_ailment; ?>" name="pat_ailment" class="form-control" id="inputCity">
                                                </div> -->
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4" style="display: none;">
                                                    <label for="inputState" class="col-form-label">Patient's Type</label>
                                                    <select id="inputState" required="required" value="<?php echo $row->pat_type; ?>" name="pat_type" class="form-control">

                                                        <option>Emergency</option>

                                                    </select>
                                                </div>




                                                <div class="form-group col-md-2" style="display:none">
                                                    <?php
                                                    $length = 6;
                                                    $patient_er_case =  substr(str_shuffle('0123456789'), 1, $length);
                                                    ?>
                                                    <label for="inputZip" class="col-form-label">E.R. Case No.</label>
                                                    <input type="text" name="pat_er_case" value="<?php echo $patient_er_case; ?>" class="form-control" id="inputZip">
                                                </div>




                                                <div class="form-group col-md-2" style="display:none">
                                                    <?php
                                                    $length = 6;
                                                    $patient_er_series =  substr(str_shuffle('0123456789'), 1, $length);
                                                    ?>
                                                    <label for="inputZip" class="col-form-label">E.R. Series No.</label>
                                                    <input type="text" name="pat_er_series" value="<?php echo $patient_er_series; ?>" class="form-control" id="inputZip">
                                                </div>

                                                <!-- <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">E.R. Area</label>
                                                    <input required="required" type="text" name="pat_er_area" class="form-control" id="inputCity">
                                                </div> -->

                                                <div class="form-group col-md-4" style="display: none;">
                                                    <label for="inputState" class="col-form-label">E.R. Bed No</label>
                                                    <select id="inputState" name="pat_bed" class="form-control">
                                                        <option>None</option>
                                                        <option>5CW PVT RM IN</option>
                                                        <option>333</option>
                                                        <option>6CW PVT RM IN </option>
                                                        <option>3CW PVT RM IN </option>
                                                    </select>
                                                </div>



                                                <!-- <div class="form-group col-md-4">
                                                    <label for="inputAddress" class="col-form-label">Billed By</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_billed; ?>" class="form-control" name="pat_billed" id="inputAddress" placeholder="">
                                                </div> -->


                                            </div>
                                            <a href="his_doc_emergency.php" button type="submit" name="update_emergency" class="ladda-button btn btn-danger my-3" data-style="expand-right">Cancel</button></a>
                                            <button type="submit" name="update_emergency" class="ladda-button btn btn-secondary my-3" data-style="expand-right">Update Emergency</button>








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
</body>

</html>