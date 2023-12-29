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
    $pat_status = $_POST['pat_status'];
    $pat_gender = $_POST['pat_gender'];
    $pat_doc = $_POST['pat_doc'];
    // $pat_billed = $_POST['pat_billed'];
    $pat_series = $_POST['pat_series'];
    $pat_case = $_POST['pat_case'];
    $pat_case_type = $_POST['pat_case_type'];
    $pat_num = $_POST['pat_num'];

    //sql to insert captured values
    $query = "UPDATE  his_patients  SET pat_fname=?, pat_lname=?, pat_age=?, pat_dob=?,  pat_status=?, pat_gender=?, pat_number=?, pat_phone=?, pat_type=?, pat_addr=?, pat_doc=?,  pat_series=?,  pat_case=?,  pat_case_type=? ,  pat_num=?  WHERE pat_id = ?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('sssssssssssssssi', $pat_fname, $pat_lname, $pat_age, $pat_dob, $pat_status, $pat_gender, $pat_number, $pat_phone, $pat_type, $pat_addr, $pat_doc, $pat_series, $pat_case, $pat_case_type, $pat_num, $pat_id);
    $stmt->execute();
    /*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
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
                                        <li class="breadcrumb-item"><a href="his_admin_outpatient_records.php">Patients</a></li>
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
                                                    <input type="text" required="required" value="<?php echo $row->pat_fname; ?>" name="pat_fname" class="form-control small-input" id="inputEmail4" placeholder="Patient's First Name">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_lname; ?>" name="pat_lname" class="form-control small-input" id="inputPassword4" placeholder="Patient`s Last Name">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Date Of Birth</label>
                                                    <input type="date" required="required" value="<?php echo $row->pat_dob; ?>" name="pat_dob" class="form-control small-input" id="bday" placeholder="DD/MM/YYYY">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="inputPassword4" class="col-form-label">Age</label>
                                                    <input required="required" type="number" readonly value="<?php echo $row->pat_age; ?>" name="pat_age" class="form-control small-input" id="age" placeholder="Patient`s Age">
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="inputCity" class="col-form-label">Civil Status</label>
                                                    <select id="inputState" name="pat_status" class="form-control form-control small-input" value="<?php echo $row->pat_status; ?>">
                                                        <option <?= $row->pat_status == 'Single' ? ' selected="selected"' : ''; ?>>Single</option>
                                                        <option <?= $row->pat_status == 'Married' ? ' selected="selected"' : ''; ?>>Married</option>
                                                        <option <?= $row->pat_status == 'Divorced' ? ' selected="selected"' : ''; ?>>Divorced</option>
                                                        <option <?= $row->pat_status == 'Widowed' ? ' selected="selected"' : ''; ?>>Widowed</option>

                                                    </select>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="inputCity" class="col-form-label">Gender</label>
                                                    <select name="pat_gender" class="form-control form-control small-input" value="<?php echo $row->pat_gender; ?>">
                                                        <option <?= $row->pat_gender == 'Male' ? ' selected="selected"' : ''; ?>>Male</option>
                                                        <option <?= $row->pat_gender == 'Female' ? ' selected="selected"' : ''; ?>>Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Mobile Number</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_phone; ?>" name="pat_phone" class="form-control small-input" id="inputCity">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputAddress" class="col-form-label">Address</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_addr; ?>" class="form-control small-input" name="pat_addr" id="inputAddress" placeholder="Patient's Addresss">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputAddress" class="col-form-label">OPD Case DateTime</label>
                                                    <input required="required" type="date" value="<?php echo $row->pat_case_type; ?>" class="form-control small-input" name="pat_case_type" id="inputAddress" placeholder="">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4" style="display: none;">
                                                    <label for="inputState" class="col-form-label">Patient's Type</label>
                                                    <select id="inputState" required="required" value="<?php echo $row->pat_type; ?>" name="pat_type" class="form-control small-input">
                                                        <option <?= $row->pat_type == 'OutPatient' ? ' selected="selected"' : ''; ?>>OutPatient</option>
                                                    </select>
                                                </div>


                                                <div class="form-group col-md-4" style="display: none;">
                                                    <label for="inputState" class="col-form-label"> Physician Name</label>
                                                    <select id="inputState" value="<?php echo $row->pat_doc; ?>" name="pat_doc" class="form-control small-input">
                                                        <option>Not Applicable</option>
                                                        <option>Marlo Getutua</option>
                                                        <option>Marvin Lachica</option>
                                                        <option>Zandra Salas </option>
                                                        <option>Leoncio Lachica </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-2" style="display:none">
                                                <?php
                                                $length = 5;
                                                $patient_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);
                                                ?>
                                                <label for="inputZip" class="col-form-label">Patient Number</label>
                                                <input type="text" name="pat_number" value="<?php echo $patient_number; ?>" class="form-control small-input" id="inputZip">
                                            </div>

                                            <div class="form-group col-md-2" style="display:none">
                                                <?php
                                                $length = 6;
                                                $patient_series =  substr(str_shuffle('0123456789'), 1, $length);
                                                ?>
                                                <label for="inputZip" class="col-form-label">OPD Series No.</label>
                                                <input type="text" name="pat_series" value="<?php echo $patient_series; ?>" class="form-control small-input" id="inputZip">
                                            </div>
                                            <div class="form-group col-md-2" style="display:none">
                                                <?php
                                                $length = 6;
                                                $patient_case =  substr(str_shuffle('0123456789'), 1, $length);
                                                ?>
                                                <label for="inputZip" class="col-form-label">OPD Case No.</label>
                                                <input type="text" name="pat_case" value="<?php echo $patient_case; ?>" class="form-control small-input" id="inputZip">
                                            </div>
                                            <div class="form-group col-md-2" style="display:none">
                                                <?php
                                                $length = 6;
                                                $patient_num =  substr(str_shuffle('0123456789'), 1, $length);
                                                ?>
                                                <label for="inputZip" class="col-form-label">Patient No.</label>
                                                <input type="text" name="pat_num" value="<?php echo $patient_num; ?>" class="form-control small-input" id="inputZip">
                                            </div>
                                            <div class="form-group col-md-4" style="display: none;">
                                                <label class="col-form-label">Room Id</label>
                                                <input type="text" name="room_id" class="form-control small-input" id="room_id">
                                            </div>
                                            <div class="form-group col-md-4" style="display: none;">
                                                <label class="col-form-label">Bed Id</label>
                                                <input type="text" name="bed_id" class="form-control small-input" id="bed_id">
                                            </div>

                                            <!-- <div class="form-group col-md-4">
                                                <label for="inputAddress" class="col-form-label">Billed By</label>
                                                <input required="required" type="text" value="<?php echo $row->pat_billed; ?>" class="form-control small-input" name="pat_billed" id="inputAddress" placeholder="">
                                            </div> -->

                                            <!-- SELECT PHYSICIAN -->

                                            <div class="form-group col-md-12 my-1">
                                                <input type="text" readonly name="" value="Update Physician" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                            </div>



                                            <div class="table-responsive">
                                                <table id="demo-foo-filtering" class="table table-bordered  mb-0 table-sm" data-page-size="7">
                                                    <thead class="table-danger">
                                                        <tr>
                                                            <th>Select </th>
                                                            <th data-toggle="true">Full Name</th>
                                                            <th data-toggle="true">Role</th>
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
                                                                <td><input type="radio" name="pat_doc" required="required" value="<?php echo $row->doc_fname; ?> <?php echo $row->doc_lname; ?>"></td>
                                                                <td><?php echo $row->doc_fname; ?> <?php echo $row->doc_lname; ?></td>
                                                                <td><?php echo $row->doc_role ?></td>
                                                            </tr>
                                                        </tbody>
                                                    <?php
                                                    } ?>

                                                </table>

                                            </div>


                                            <!-- START ROOM SELECTIONS -->


                                            <div class="form-group col-md-12 my-1">
                                                <input type="text" readonly name="" value="Update Rooms" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                            </div>

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




                                                <a href="his_admin_outpatient_records.php" button type="submit" name="update_patient" class="ladda-button btn maroon-outline-btn my-3" data-style="expand-right">Cancel</button></a>
                                                <button type="submit" name="update_patient" class="ladda-button btn maroon-outline-btn my-3" data-style="expand-right">Update Patient</button>


                                            </div>

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

    <script>
        $(document).ready(function() {
            $('.badge-danger').click(function() {
                var recordId = $(this).data('recordid');
                console.log("Record ID:", recordId); // Check if the correct ID is printed
                $('#deleteRecordId').val(recordId);
            });
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
        document.addEventListener("DOMContentLoaded", function() {
            // Get the modal element by its id
            var modal = document.getElementById("PatientRegister");

            // Listen for the form submission event
            modal.addEventListener("submit", function(e) {
                e.preventDefault(); // Prevent the default form submission behavior

                // Trigger the tab switch to the "Select Physician" tab
                var tabLink = modal.querySelector('a[href="#doctor"]');
                if (tabLink) {
                    tabLink.click(); // Programmatically click the tab link
                } else {
                    console.log("Tab link not found.");
                }
            });
        });
    </script>
    <script>
        function switchToRoomTab() {
            // Prevent default form submission
            event.preventDefault();

            // Trigger the tab switch to the "rooms" tab
            var tabLink = document.querySelector('a[href="#rooms"]');
            if (tabLink) {
                tabLink.click(); // Programmatically click the tab link
            }
        }
    </script>

    <script>
        $(document).ready(function() {

            $("#roomsTable tbody tr").click(function() {
                $("#roomsTable tbody tr").removeClass("active");
                $(this).addClass("active");
                const room_id = $(this).data("room_id");
                $("#room_id").val(room_id)
                $("#bed_id").val("");
                $.ajax({
                    url: 'http://localhost/HIS-SWU/backend/admin/his_admin_select_room_info.php',
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