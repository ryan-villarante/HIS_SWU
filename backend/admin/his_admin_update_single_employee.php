<?php
session_start();
include('assets/inc/config.php');
if (isset($_POST['update_doc'])) {
    $doc_fname = $_POST['doc_fname'];
    $doc_lname = $_POST['doc_lname'];
    $doc_number = $_GET['doc_number'];
    $doc_cat = $_POST['doc_cat'];
    $doc_dept = $_POST['doc_dept'];
    $doc_role = $_POST['doc_role'];
    $doc_email = $_POST['doc_email'];
    $doc_fee = $_POST['doc_fee'];

    //sql to insert captured values
    $query = "UPDATE his_docs SET doc_fname=?, doc_lname=?,doc_cat=?, doc_dept=?, doc_role=?, doc_email=?, doc_fee=?  WHERE doc_number = ?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssssss', $doc_fname, $doc_lname, $doc_cat, $doc_dept, $doc_role, $doc_email, $doc_fee,  $doc_number);
    $stmt->execute();
    /*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Consultant Details Updated";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}
?>
<!--End Server Side-->
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
                                        <li class="breadcrumb-item"><a href="his_admin_manage_employee.php">Consultant</a></li>
                                        <li class="breadcrumb-item active">Manage Consultant</li>
                                    </ol>
                                </div>
                                <!-- <h4 class="page-title">Update Consultant Details</h4> -->
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Form row -->
                    <?php
                    $doc_number = $_GET['doc_number'];
                    $ret = "SELECT  * FROM his_docs WHERE doc_number=?";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->bind_param('i', $doc_number);
                    $stmt->execute(); //ok
                    $res = $stmt->get_result();
                    //$cnt=1;
                    while ($row = $res->fetch_object()) {
                    ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-12 my-1">
                                                <input type="text" readonly name="" value="Update Consultant" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                            </div>

                                        </div>
                                        <!--Add Patient Form-->
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">First Name</label>
                                                    <input type="text" required="required" value="<?php echo $row->doc_fname; ?>" name="doc_fname" class="form-control" id="inputEmail4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                    <input required="required" type="text" value="<?php echo $row->doc_lname; ?>" name="doc_lname" class="form-control" id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress" class="col-form-label">Email</label>
                                                    <input required="required" type="email" value="<?php echo $row->doc_email; ?>" class="form-control" name="doc_email" id="inputAddress">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Category</label>
                                                    <select id="inputCategory" required="required" name="doc_cat" class="form-control">
                                                        <option <?= $row->doc_cat == 'Resident' ? ' selected="selected"' : ''; ?>>Resident</option>
                                                        <option <?= $row->doc_cat == 'Regular Consultant' ? ' selected="selected"' : ''; ?>>Regular Consultant</option>
                                                        <option <?= $row->doc_cat == 'Visiting Consultant' ? ' selected="selected"' : ''; ?>>Visiting Consultant</option>

                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Specialization</label>
                                                    <select id="inputState" required="required" name="doc_dept" class="form-control">
                                                        <option <?= $row->doc_dept == 'Anesthesiology' ? ' selected="selected"' : ''; ?>>Anesthesiology</option>
                                                        <option <?= $row->doc_dept == 'Cardiology' ? ' selected="selected"' : ''; ?>>Cardiology</option>
                                                        <option <?= $row->doc_dept == 'Dermatology' ? ' selected="selected"' : ''; ?>>Dermatology</option>
                                                        <option <?= $row->doc_dept == 'Emergency medicine' ? ' selected="selected"' : ''; ?>>Emergency medicine</option>
                                                        <option <?= $row->doc_dept == 'Endocrinology' ? ' selected="selected"' : ''; ?>>Endocrinology</option>
                                                        <option <?= $row->doc_dept == 'Family medicine' ? ' selected="selected"' : ''; ?>>Family medicine</option>
                                                        <option <?= $row->doc_dept == 'Gastroenterology' ? ' selected="selected"' : ''; ?>>Gastroenterology</option>
                                                        <option <?= $row->doc_dept == 'General practitioner' ? ' selected="selected"' : ''; ?>>General practitioner</option>
                                                        <option <?= $row->doc_dept == 'Geriatrics' ? ' selected="selected"' : ''; ?>>Geriatrics</option>
                                                        <option <?= $row->doc_dept == 'Gynecology' ? ' selected="selected"' : ''; ?>>Gynecology</option>
                                                        <option <?= $row->doc_dept == 'Internal medicine' ? ' selected="selected"' : ''; ?>>Internal medicine</option>
                                                        <option <?= $row->doc_dept == 'Medicine' ? ' selected="selected"' : ''; ?>>Medicine</option>
                                                        <option <?= $row->doc_dept == 'Neurology' ? ' selected="selected"' : ''; ?>>Neurology</option>
                                                        <option <?= $row->doc_dept == 'Neurosurgery' ? ' selected="selected"' : ''; ?>>Neurosurgery</option>
                                                        <option <?= $row->doc_dept == 'Oncology' ? ' selected="selected"' : ''; ?>>Oncology</option>
                                                        <option <?= $row->doc_dept == 'Ophthalmology' ? ' selected="selected"' : ''; ?>>Ophthalmology</option>
                                                        <option <?= $row->doc_dept == 'Orthopedics' ? ' selected="selected"' : ''; ?>>wow</option>
                                                        <option <?= $row->doc_dept == 'Otorhinolaryngology' ? ' selected="selected"' : ''; ?>>Otorhinolaryngology</option>
                                                        <option <?= $row->doc_dept == 'Pathology' ? ' selected="selected"' : ''; ?>>Pathology</option>
                                                        <option <?= $row->doc_dept == 'Pediatrics' ? ' selected="selected"' : ''; ?>>Pediatrics</option>
                                                        <option <?= $row->doc_dept == 'Psychiatry' ? ' selected="selected"' : ''; ?>>Psychiatry</option>
                                                        <option <?= $row->doc_dept == 'Radiology' ? ' selected="selected"' : ''; ?>>Radiology</option>
                                                        <option <?= $row->doc_dept == 'Surgery' ? ' selected="selected"' : ''; ?>>Surgery</option>
                                                        <option <?= $row->doc_dept == 'Urology' ? ' selected="selected"' : ''; ?>>Urology</option>

                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6" style="display: none;">
                                                    <label for="inputState" class="col-form-label">Role</label>
                                                    <select id="inputRole" readonly required="required" name="doc_role" class="form-control">
                                                        <option <?= $row->doc_role == 'Attending' ? ' selected="selected"' : ''; ?>>Attending</option>
                                                        <option <?= $row->doc_role == 'Admitting' ? ' selected="selected"' : ''; ?>>Admitting</option>

                                                    </select>

                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress" class="col-form-label">Consultation Fee</label>
                                                    <input required="required" type="number" class="form-control" name="doc_fee" value="<?php echo $row->doc_fee; ?>">
                                                </div>

                                            </div>





                                            <div>
                                                <a href="his_admin_manage_employee.php" button type="button" name="update_doc" class="ladda-button btn maroon-btn my-3 " data-style="expand-right">Cancel</button></a>
                                                <button type="submit" name="update_doc" class="ladda-button btn maroon-btn my-3 " data-style="expand-right">Update Consultant</button>

                                            </div>



                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>


                        <!-- end row -->
                    <?php } ?>

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
        // Get references to the Category and Role dropdowns
        var categoryDropdown = document.getElementById("inputCategory");
        var roleDropdown = document.getElementById("inputRole");

        // Add an event listener to the Category dropdown
        categoryDropdown.addEventListener("change", function() {
            // Get the selected value from the Category dropdown
            var selectedCategory = categoryDropdown.value;

            // Set the Role dropdown value based on the selected Category
            if (selectedCategory === "Resident") {
                roleDropdown.value = "Admitting";
            } else if (selectedCategory === "Regular Consultant" || selectedCategory === "Visiting Consultant") {
                roleDropdown.value = "Attending";
            } else {
                roleDropdown.value = "None";
            }
        });
    </script>

</body>

</html>