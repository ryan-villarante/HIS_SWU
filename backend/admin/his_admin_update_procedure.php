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


    //sql to update captured values
    $query = "UPDATE  his_procedures SET  pro_desc=?,pro_category=?,pro_abb=?,pro_unit=?,pro_big=?,pro_conv=?,pro_bar=? WHERE pro_code = ?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssssss',  $pro_desc, $pro_category, $pro_abb, $pro_unit, $pro_big, $pro_conv, $pro_bar, $pro_code);
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
                                        <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="his_admin_equipments_inventory_copy.php">Procedures</a></li>
                                        <li class="breadcrumb-item active">Update Procedures</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Update Procedure Details</h4>
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
                                        <h4 class="header-title">Fill all fields</h4>
                                        <!--Add Patient Form-->
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Code</label>
                                                    <input type="text" required="required" value="<?php echo $row->pro_code; ?>" name="pro_code" class="form-control" id="inputEmail4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Item Category</label>
                                                    <input required="required" type="text" value="<?php echo $row->pro_category; ?>" name="pro_category" class="form-control" id="inputPassword4">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Item Description</label>
                                                    <input type="text" required="required" value="<?php echo $row->pro_desc; ?>" name="pro_desc" class="form-control" id="inputEmail4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Abbreviation</label>
                                                    <input required="required" type="text" value="<?php echo $row->pro_abb; ?>" name="pro_abb" class="form-control" id="inputPassword4">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Unit</label>
                                                    <input type="text" required="required" value="<?php echo $row->pro_unit; ?>" name="pro_unit" class="form-control" id="inputEmail4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Big Unit</label>
                                                    <input type="text" required="required" value="<?php echo $row->pro_big; ?>" name="pro_big" class="form-control" id="inputEmail4">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Conversion</label>
                                                    <input type="text" required="required" value="<?php echo $row->pro_conv; ?>" name="pro_conv" class="form-control" id="inputEmail4">
                                                </div>
                                                <div class="form-group col-md-6">
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

                                            <button type="submit" name="update_procedures" class="ladda-button btn btn-success" data-style="expand-right">Update Procedures</button>

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

</body>

</html>