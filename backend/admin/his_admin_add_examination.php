<?php
session_start();
include('assets/inc/config.php');
if (isset($_POST['add_examinations'])) {
    $exam_code = $_POST['exam_code'];
    $exam_desc = $_POST['exam_desc'];
    $exam_category = $_POST['exam_category'];
    $exam_abb = $_POST['exam_abb'];
    $exam_unit = $_POST['exam_unit'];
    $exam_big = $_POST['exam_big'];
    $exam_conv = $_POST['exam_conv'];
    $exam_bar = $_POST['exam_bar'];

    //sql to insert captured values
    $query = "INSERT INTO his_examinations (exam_code, exam_desc, exam_category, exam_abb, exam_unit, exam_big, exam_conv,exam_bar) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssssss', $exam_code,  $exam_desc, $exam_category, $exam_abb, $exam_unit, $exam_big, $exam_conv, $exam_bar);
    $stmt->execute();
    /*
         *Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
         *echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
         */
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Examination Added";
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
                                        <li class="breadcrumb-item"><a href="his_admin_equipments_inventory_copy.php">Drugs and Medicine</a></li>
                                        <li class="breadcrumb-item active">Add Examination</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Examination</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Form row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Fill all fields</h4>
                                    <!--Add Patient Form-->
                                    <form method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4" class="col-form-label">Code</label>
                                                <input type="text" required="required" name="exam_code" class="form-control" id="inputEmail4">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4" class="col-form-label">Item Category</label>
                                                <input required="required" type="text" name="exam_category" class="form-control" id="inputPassword4">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4" class="col-form-label">Item Description </label>
                                                <input required="required" type="text" name="exam_desc" class="form-control" id="inputPassword4">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label">Abbreviation</label>
                                                <input type="text" required="required" name="exam_abb" class="form-control" id="inputEmail4">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputState" class="col-form-label">Unit</label>
                                                <select id="inputState" required="required" name="exam_unit" class="form-control">
                                                    <option>None</option>
                                                    <option>Ampule</option>
                                                    <option>Cap</option>
                                                    <option>Bottle</option>
                                                    <option>Vial</option>
                                                    <option>Pieces</option>
                                                    <option>Tablet</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3 ">
                                                <label for="inputState" class="col-form-label">Big Unit</label>
                                                <select id="inputState" required="required" name="exam_big" class="form-control">
                                                    <option>None</option>
                                                    <option>Ampule</option>
                                                    <option>Box</option>
                                                    <option>Pieces</option>
                                                    <option>Vial</option>
                                                    <option>Tablet</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4" class="col-form-label">Conversion</label>
                                                <select id="inputState" required="required" name="exam_conv" class="form-control">
                                                    <option>0</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <label for="inputEmail4" class="col-form-label">Barcode ID</label>
                                                <input type="text" required="required" name="exam_bar" class="form-control" id="inputEmail4">
                                            </div>
                                        </div>

                                        <!-- <div class="form-group">
                                                                    <label for="inputPassword4" class="col-form-label">Equipment Barcode</label>
                                                                    <?php
                                                                    // $length = 10;
                                                                    //     $bcode = substr(str_shuffle('0123456789'), 1, $length);
                                                                    ?>
                                                            <input required="required" readonly type="text" value="<?php //echo $bcode; 
                                                                                                                    ?>" name="exam_code" class="form-control"  id="inputPassword4">
                                                            </div>

                                                            <div class="form-group" style="style:display-none">
                                                                <label for="inputAddress" class="col-form-label">Pharmaceutical Category Description</label>
                                                                <textarea required="required" type="text" class="form-control" name="exam_desc" id="editor"></textarea>
                                                            </div> -->
                                        <button type="submit" name="add_examinations" class="ladda-button btn btn-success" data-style="expand-right">Add Examination</button>


                                        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="add_equipments" class="ladda-button btn btn-primary" data-style="expand-right">Save changes</button> -->

                                    </form>

                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
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
    <!--Load CK EDITOR Javascript-->
    <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('editor')
    </script>

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