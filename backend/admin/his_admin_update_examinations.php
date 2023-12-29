<?php
session_start();
include('assets/inc/config.php');
if (isset($_POST['update_examinations'])) {
    $exam_code = $_GET['exam_code'];
    $exam_desc = $_POST['exam_desc'];
    $exam_category = $_POST['exam_category'];
    $exam_abb = $_POST['exam_abb'];
    $exam_unit = $_POST['exam_unit'];
    $exam_big = $_POST['exam_big'];
    $exam_conv = $_POST['exam_conv'];
    $exam_bar = $_POST['exam_bar'];
    $exam_price = $_POST['exam_price'];


    //sql to update captured values
    $query = "UPDATE  his_examinations SET  exam_desc=?,exam_category=?,exam_abb=?,exam_unit=?,exam_big=?,exam_conv=?,exam_bar=?, exam_price=? WHERE exam_code = ?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('sssssssss',  $exam_desc, $exam_category, $exam_abb, $exam_unit, $exam_big, $exam_conv, $exam_bar, $exam_price, $exam_code);
    $stmt->execute();
    /*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Examination Updated ";
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
                                        <li class="breadcrumb-item"><a href="his_admin_equipments_inventory_copy.php">Equipments</a></li>
                                        <li class="breadcrumb-item active">Drugs and Medicines</li>
                                    </ol>
                                </div>
                                <!-- <h4 class="page-title">Update Examination Details</h4> -->
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Form row -->
                    <?php
                    $exam_code = $_GET['exam_code'];
                    $ret = "SELECT  * FROM his_examinations WHERE exam_code=?";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->bind_param('s', $exam_code);
                    $stmt->execute(); //ok
                    $res = $stmt->get_result();
                    //$cnt=1;
                    while ($row = $res->fetch_object()) {
                    ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group col-md-12 my-2">
                                            <input type="text" readonly name="" value="Update Examination Details" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                        </div>
                                        <!--Add Patient Form-->
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-group col-md-6" style="display: none;">
                                                    <label for="inputEmail4" class="col-form-label">Code</label>
                                                    <input type="text" required="required" value="<?php echo $row->exam_code; ?>" name="exam_code" class="form-control" id="inputEmail4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Item Category</label>
                                                    <select id="inputState" required="required" name="exam_category" value="<?php echo $row->exam_category; ?>" class="form-control">
                                                        <option <?= $row->exam_category == 'CT SCAN' ? ' selected="selected"' : ''; ?>>CT SCAN</option>
                                                        <option <?= $row->exam_category == '2D Echo' ? ' selected="selected"' : ''; ?>>2D Echo</option>
                                                        <option <?= $row->exam_category == 'Laboratory Examinations' ? ' selected="selected"' : ''; ?>>Laboratory Examinations</option>
                                                        <option <?= $row->exam_category == 'X-Ray' ? ' selected="selected"' : ''; ?>>X-Ray</option>
                                                        <option <?= $row->exam_category == 'Laboratory-Sent Out' ? ' selected="selected"' : ''; ?>>Laboratory-Sent Out</option>
                                                        <option <?= $row->exam_category == 'CT Scan - Sent Out ' ? ' selected="selected"' : ''; ?>>CT Scan - Sent Out </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Item Description</label>
                                                    <input type="text" required="required" value="<?php echo $row->exam_desc; ?>" name="exam_desc" class="form-control" id="itemDesc" oninput="updateAbbreviation()">
                                                </div>
                                            </div>

                                            <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Abbreviation</label>
                                                    <input required="required" readonly type="text" value="<?php echo $row->exam_abb; ?>" name="exam_abb" class="form-control" id="itemAbb">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Price</label>
                                                    <input type="number" required="required" value="<?php echo $row->exam_price; ?>" name="exam_price" class="form-control" id="inputEmail4">
                                                </div>
                                                <div class="form-group col-md-6" style="display: none;">
                                                    <label for="inputEmail4" class="col-form-label">Unit</label>
                                                    <select id="inputState" name="exam_unit" value="<?php echo $row->exam_unit; ?>" class="form-control">
                                                        <option>None</option>
                                                        <option>Ampule</option>
                                                        <option>Cap</option>
                                                        <option>Bottle</option>
                                                        <option>Vial</option>
                                                        <option>Pieces</option>
                                                        <option>Tablet</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">

                                                <div class="form-group col-md-6" style="display: none;">
                                                    <label for="inputEmail4" class="col-form-label">Big Unit</label>
                                                    <select id="inputState" name="exam_big" value="<?php echo $row->exam_big; ?>" class="form-control">
                                                        <option>None</option>
                                                        <option>Ampule</option>
                                                        <option>Box</option>
                                                        <option>Pieces</option>
                                                        <option>Vial</option>
                                                        <option>Tablet</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6" style="display: none;">
                                                    <label for="inputEmail4" class="col-form-label">Conversion</label>
                                                    <input type="number" value="<?php echo $row->exam_conv; ?>" name="exam_conv" class="form-control" id="inputEmail4">
                                                </div>
                                            </div>

                                            <div class="form-row">

                                                <div class="form-group col-md-6" style="display: none;">
                                                    <label for="inputPassword4" class="col-form-label">Barcode ID</label>
                                                    <input type="text" value="<?php echo $row->exam_bar; ?>" name="exam_bar" class="form-control" id="inputPassword4">
                                                </div>

                                            </div>

                                            <!-- <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Profile Picture</label>
                                                    <input required="required"  type="file" name="doc_dpic" class="btn btn-success form-control"  id="inputCity">
                                                </div>
                                           </div> -->

                                            <a href="his_admin_equipments_inventory_copy.php" button type="button" class="ladda-button btn maroon-outline-btn my-3"> Cancel</a>
                                            <button type="submit" name="update_examinations" class="ladda-button btn maroon-outline-btn my-3" data-style="expand-right">Update Examination</button>

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
        function updateAbbreviation() {
            // Get the value from the "Item Description" input
            var itemDescriptionValue = document.getElementById("itemDesc").value;

            // Set the value of the "Abbreviation" input to the value of the "Item Description" input
            document.getElementById("itemAbb").value = itemDescriptionValue;
        }
    </script>

</body>

</html>