<?php


session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteRecordId'])) {
    $id = intval($_POST['deleteRecordId']);
    // echo "ID to delete: " . $id . "<br>"; // Debug: Check if the ID is correct
    $adn = "DELETE FROM his_guarantors where g_id=?";
    $stmt = $mysqli->prepare($adn);
    if (!$stmt) {
        die("Error in preparing the delete statement: " . $mysqli->error);
    }
    $stmt->bind_param('i', $id);
    if (!$stmt->execute()) {
        die("Error executing the delete statement: " . $stmt->error);
    }
    $stmt->close();

    if ($stmt) {
        $success = "Record successfully deleted";
        // You can optionally redirect here or update the UI as needed
        // echo "Deletion successful<br>"; // Debug: Check if deletion was successful
    } else {
        $err = "Try Again Later";
    }
}

?>

<?php
if (isset($_POST['add_guarantor'])) {
    $g_code = $_POST['g_code'];
    $g_gid = $_POST['g_gid'];
    $g_name = $_POST['g_name'];
    $g_lname = $_POST['g_lname'];
    $g_tele = $_POST['g_tele'];
    $g_type = $_POST['g_type'];
    $g_email = $_POST['g_email'];
    $g_address = $_POST['g_address'];

    //sql to insert captured values
    $query = "INSERT INTO his_guarantors (g_code, g_gid, g_name, g_lname, g_tele,  g_email, g_address, g_type) values(?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssssss', $g_code, $g_gid, $g_name, $g_lname, $g_tele, $g_email, $g_address, $g_type);
    $stmt->execute();
    /*
			*Use Sweet Alerts Instead Of Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Guarantor Details Added";
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Guarantors</a></li>
                                        <li class="breadcrumb-item active">Guarantors</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->




                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">

                                <div class="col-15">
                                    <div class="card-box">
                                        <div class="col-md-12 d-flex justify-content-start">
                                            <!-- Trigger the modal with a button -->
                                            <button type="button" class="	fa fa-plus lg-2 bi-plus btn maroon-outline-btn btn-lg-2 " data-toggle="modal" data-target="#myModal"> Add New </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal" role="dialog">
                                                <div class="modal-dialog modal-lg">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header ">
                                                            Fill all fields
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card-body">
                                                                <!--Add Patient Form-->
                                                                <form method="post">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-2" style="display:none">
                                                                            <?php
                                                                            $length = 5;
                                                                            $patient_number =  substr(str_shuffle('0123456789'), 1, $length);
                                                                            ?>
                                                                            <label for="inputZip" class="col-form-label">Code</label>
                                                                            <input type="text" name="g_code" value="<?php echo $patient_number; ?>" class="form-control" id="inputZip">
                                                                        </div>
                                                                        <div class="form-group col-md-2" style="display:none">
                                                                            <?php
                                                                            $length = 10;
                                                                            $patient_series =  substr(str_shuffle('0123456789'), 1, $length);
                                                                            ?>
                                                                            <label for="inputZip" class="col-form-label">ID</label>
                                                                            <input type="text" name="g_gid" value="<?php echo $patient_series; ?>" class="form-control" id="inputZip">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputAddress" class="col-form-label">First Name</label>
                                                                            <input required="required" type="text" class="form-control" name="g_name" id="inputAddress">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputAddress" class="col-form-label">Last Name</label>
                                                                            <input required="required" type="text" class="form-control" name="g_lname" id="inputAddress">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputEmail4" class="col-form-label">Telephone No.</label>
                                                                            <input type="text" required="required" name="g_tele" class="form-control" id="inputEmail4">
                                                                        </div>

                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputPassword4" class="col-form-label">Email Address</label>
                                                                            <input required="required" type="text" name="g_email" class="form-control" id="inputPassword4">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputPassword4" class="col-form-label">Address</label>
                                                                            <input required="required" type="text" name="g_address" class="form-control" id="inputPassword4">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputPassword4" class="col-form-label">Health Insurance</label>
                                                                            <select class="form-control" required name="g_type" id="" placeholder=" Health Insurance ">
                                                                                <option>None</option>
                                                                                <option>HMO</option>
                                                                                <option>Philhealth</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer my-3">

                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" name="add_guarantor" class="ladda-button btn btn-primary" data-style="expand-right">Save changes</button>

                                                                    </div>


                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>



                                        <form method="post" action="his_doc_guarantor.php">

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
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- END MODAL -->


                                            <div class="mb-2">
                                                <div class="row">
                                                    <div class="col-12 text-sm-center form-inline">
                                                        <div class="form-group mr-2" style="display:none">
                                                            <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                                                <option value="">Show all</option>
                                                                <option value="Discharged">Discharged</option>
                                                                <option value="OutPatients">OutPatients</option>
                                                                <option value="InPatients">InPatients</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group ">
                                                            <input id="demo-foo-search" type="hidden" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="table-responsive">
                                                <table id="demo-foo-filtering" class="table table-borderless table-hover mb-0" data-page-size="7">
                                                    <thead class="table-danger">
                                                        <tr>
                                                            <th>#</th>
                                                            <th data-toggle="true">Code</th>
                                                            <th data-toggle="true">ID</th>
                                                            <th data-hide="phone">Guarantor Name</th>
                                                            <th data-hide="phone">Telephone No.</th>
                                                            <th data-hide="phone">Email Address </th>
                                                            <th data-hide="phone">Address</th>
                                                            <th data-hide="phone">Health Insurance</th>
                                                            <th data-hide="phone">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    /*
                                                *get details of allpatients
                                                *
                                            */
                                                    $ret = "SELECT * FROM  his_guarantors ";
                                                    $stmt = $mysqli->prepare($ret);
                                                    $stmt->execute(); //ok
                                                    $res = $stmt->get_result();
                                                    $cnt = 1;
                                                    while ($row = $res->fetch_object()) {
                                                    ?>

                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo $cnt; ?></td>
                                                                <td><?php echo $row->g_code; ?></td>
                                                                <td><?php echo $row->g_gid; ?></td>
                                                                <td><?php echo $row->g_name;
                                                                    ?> <?php echo $row->g_lname; ?></td>
                                                                <td><?php echo $row->g_tele; ?></td>
                                                                <td><?php echo $row->g_email; ?></td>
                                                                <td><?php echo $row->g_address; ?></td>
                                                                <td><?php echo $row->g_type; ?></td>
                                                                <td>
                                                                    <a href="his_doc_view_guarantor.php?g_id=<?php echo $row->g_id; ?>" class="badge badge-success"><i class="far fa-eye "></i> View</a>
                                                                    <a href="his_doc_update_guarantor.php?g_code=<?php echo $row->g_code; ?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                                    <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteConfirmationModal" data-recordid="<?php echo $row->g_id; ?>">
                                                                        <i class="mdi mdi-trash-can-outline"></i> Delete
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    <?php $cnt = $cnt + 1;
                                                    } ?>
                                                    <tfoot>
                                                        <tr class="active">
                                                            <td colspan="9">
                                                                <div class="text-right">
                                                                    <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div> <!-- end .table-responsive-->

                                            <input type="hidden" name="deleteRecordId" id="deleteRecordId" value="">

                                        </form>
                                    </div> <!-- end card-box -->
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
                    $('.badge-danger').click(function() {
                        var recordId = $(this).data('recordid');
                        console.log("Record ID:", recordId); // Check if the correct ID is printed
                        $('#deleteRecordId').val(recordId);
                    });
                });
            </script>

</body>

</html>