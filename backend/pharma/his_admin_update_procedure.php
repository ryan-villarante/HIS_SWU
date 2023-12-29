<?php
session_start();
include('assets/inc/config.php');
if (isset($_POST['update_procedures'])) {
    $pro_code = $_GET['pro_code'];
    $pro_desc = $_POST['pro_desc'];
    $pro_category = $_POST['pro_category'];
    $pro_abb = $_POST['pro_abb'];
    $pro_unit = $_POST['pro_unit'];
    $pro_big = $_POST['pro_big'];
    $pro_conv = $_POST['pro_conv'];
    $pro_bar = $_POST['pro_bar'];
    $pro_price = $_POST['pro_price'];


    //sql to update captured values
    $query = "UPDATE  his_procedures SET  pro_desc=?,pro_category=?,pro_abb=?,pro_unit=?,pro_big=?,pro_conv=?,pro_bar=?,pro_price=? WHERE pro_code = ?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('sssssssss',  $pro_desc, $pro_category, $pro_abb, $pro_unit, $pro_big, $pro_conv, $pro_bar, $pro_price, $pro_code);
    $stmt->execute();
    /*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Procedure Updated ";
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
                                        <li class="breadcrumb-item"><a href="his_pharma_dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="his_doc_equipment.php">Equipments</a></li>
                                        <li class="breadcrumb-item active">Update Procedures</li>
                                    </ol>
                                </div>
                                <!-- <h4 class="page-title">Update Procedure Details</h4> -->
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Form row -->
                    <?php
                    $pro_code = $_GET['pro_code'];
                    $ret = "SELECT  * FROM his_procedures WHERE pro_code=?";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->bind_param('s', $pro_code);
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
                                            <input type="text" readonly name="" value="Update Procedure Details" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                        </div>
                                        <!--Add Patient Form-->
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-group col-md-6" style="display: none;">
                                                    <label for="inputEmail4" class="col-form-label">Code</label>
                                                    <input type="text" required="required" value="<?php echo $row->pro_code; ?>" name="pro_code" class="form-control" id="inputEmail4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Category</label>
                                                    <select id="inputState" required="required" name="pro_category" class="form-control">
                                                        <option <?= $row->pro_category == 'RHB Procedures' ? ' selected="selected"' : ''; ?>>RHB Procedures</option>
                                                        <option <?= $row->pro_category == 'OR Procedures' ? ' selected="selected"' : ''; ?>>OR Procedures</option>
                                                        <option <?= $row->pro_category == 'RHU Procedures' ? ' selected="selected"' : ''; ?>>RHU Procedures</option>
                                                        <option <?= $row->pro_category == 'Procedures' ? ' selected="selected"' : ''; ?>>Procedures</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="proDesc" class="col-form-label">Item Description</label>
                                                    <input type="text" required="required" value="<?php echo $row->pro_desc; ?>" name="pro_desc" class="form-control" id="proDesc" oninput="updateProAbbreviation()">
                                                </div>
                                            </div>

                                            <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label for="proAbb" class="col-form-label">Abbreviation</label>
                                                    <input required="required" readonly type="text" value="<?php echo $row->pro_abb; ?>" name="pro_abb" class="form-control" id="proAbb">
                                                </div>
                                                <div class="form-group col-md-6" style="display: none;">
                                                    <label for="inputEmail4" class="col-form-label">Unit</label>
                                                    <select id="inputState" name="pro_unit" value="<?php echo $row->pro_unit; ?>" class="form-control">
                                                        <option>None</option>

                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Price</label>
                                                    <input type="number" required="required" value="<?php echo $row->pro_price; ?>" name="pro_price" class="form-control" id="inputPassword4">
                                                </div>
                                            </div>
                                            <div class="form-row">

                                                <div class="form-group col-md-6" style="display: none;">
                                                    <label for="inputEmail4" class="col-form-label">Big Unit</label>
                                                    <select id="inputState" name="pro_big" value="<?php echo $row->pro_big; ?>" class="form-control">
                                                        <option>None</option>

                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6" style="display: none;">
                                                    <label for="inputEmail4" class="col-form-label">Conversion</label>
                                                    <input type="number" value="<?php echo $row->pro_conv; ?>" name="pro_conv" class="form-control" id="inputEmail4">
                                                </div>
                                            </div>

                                            <div class="form-row">

                                                <div class="form-group col-md-6" style="display: none;">
                                                    <label for="inputPassword4" class="col-form-label">Barcode ID</label>
                                                    <input required="required" type="text" value="<?php echo $row->pro_bar; ?>" name="pro_bar" class="form-control" id="inputPassword4">
                                                </div>

                                            </div>

                                            <!-- <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Profile Picture</label>
                                                    <input required="required"  type="file" name="doc_dpic" class="btn btn-success form-control"  id="inputCity">
                                                </div>
                                           </div> -->
                                            <a href="his_doc_equipment.php" button type="button" class="ladda-button btn maroon-outline-btn my-3"> Cancel</a>
                                            <button type="submit" name="update_procedures" class="ladda-button btn maroon-outline-btn my-3" data-style="expand-right">Update Procedures</button>

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
        function updateProAbbreviation() {
            // Get the value from the "Item Description" input
            var itemDescriptionValue = document.getElementById("proDesc").value;

            // Set the value of the "Abbreviation" input to the value of the "Item Description" input
            document.getElementById("proAbb").value = itemDescriptionValue;
        }
    </script>

</body>

</html>