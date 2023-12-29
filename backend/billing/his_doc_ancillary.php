<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteRecordId'])) {
    $id = intval($_POST['deleteRecordId']);
    // echo "ID to delete: " . $id . "<br>"; // Debug: Check if the ID is correct
    $adn = "DELETE FROM his_ancillary WHERE render_id=?";
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

<!DOCTYPE html>
<html lang="en">

<?php include('assets/inc/head.php'); ?>

<body>

    <?php include('his_admin_patient_type.php'); ?>

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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ancillary Services</a></li>
                                        <li class="breadcrumb-item active">Ancillary Services</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">

                            <div class="card-box">


                                <div class="col-md-12 d-flex justify-content-start">
                                    <!-- Trigger the modal with a button -->
                                    <!-- <button type="button" class="fa fa-plus lg-4 bi-plus btn btn-lg-2 btn-secondary" style="background-color: #1b1b75;" data-toggle="modal" data-target="#myModal"> Direct Render</button> -->


                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog modal-xl">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <input type="text" readonly="" name="" value="Patient Register Selection" class="form-control" style="background-color: #1b1b75;color:white; font-weight:bold;text-align: center;">

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">


                                                        <?php

                                                        $ret = "SELECT * FROM  his_patients  LIMIT 1  ";
                                                        $stmt = $mysqli->prepare($ret);
                                                        $stmt->execute(); //ok
                                                        $res = $stmt->get_result();
                                                        $cnt = 1;
                                                        while ($row = $res->fetch_object()) {
                                                            $mysqlDateTime = $row->pat_date_joined;
                                                        ?>

                                                            <form method="post">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-8 my-2">
                                                                        <label for="inputAddress" class="col-form-label">Patient Type</label>

                                                                        <select id="patientType" required="required" name="" class="form-control" style="background-color:#b3b3ff ;">
                                                                            <option>OutPatient</option>
                                                                            <option>InPatient</option>
                                                                            <option>Emergency</option>
                                                                            <option>All Registry Case Type</option>
                                                                        </select>
                                                                    </div>
                                                                    <!-- <div class="form-group col-md-4">
                                                                        <label for="inputAddress" class="col-form-label">Admission Date</label>
                                                                        <input type="text" readonly name="ad_date" class="form-control" value="<?php echo date("d/m/Y - h:m", strtotime($mysqlDateTime)); ?>">
                                                                    </div> -->
                                                                    <div class="form-group col-md-4 my-2">
                                                                        <label for="inputAddress" class="col-form-label">Case Status</label>
                                                                        <input style="background-color: #b3b3ff;" type="text" readonly name="case_status" class="form-control input-sm" id="inputlg" value="Active">
                                                                        <!-- <select id="inputState" required="required" name="" class="form-control">
                                                                            <option>Active</option>
                                                                            <option>Discharged</option>
                                                                            <option>For MGH Clearance</option>
                                                                            <option>Cleared for MGH</option>
                                                                            <option>May-Go-Home</option>
                                                                            <option>Untagged MGH</option>
                                                                        </select> -->
                                                                    </div>
                                                                    <!-- <div class="form-group col-md-4">
                                                                        <label for="inputAddress" class="col-form-label">OPD.ERD Case Date</label>
                                                                        <input type="text" readonly name="opd_date" class="form-control" value="<?php echo date("d/m/Y - h:m", strtotime($mysqlDateTime)); ?>">

                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputAddress" class="col-form-label">Discharged Date</label>
                                                                        <input type="text" readonly name="dis_date" class="form-control" value="<?php echo date("d/m/Y - h:m", strtotime($mysqlDateTime)); ?>">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputAddress" class="col-form-label">Nurse Station</label>
                                                                        <input type="text" readonly name="nurse_station" class="form-control input-sm" id="inputlg" value="None">
                                                                        <select id="inputState" required="required" name="" class="form-control">
                                                                            <option>None</option>
                                                                        </select>
                                                                    </div> -->

                                                                </div>
                                                            <?php $cnt = $cnt + 1;
                                                        } ?>


                                                            </form>

                                                            <script>
                                                                $("#patientType").change(function() {
                                                                    const type = $(this).val();
                                                                    var currentRequest = null;
                                                                    if (currentRequest) {
                                                                        currentRequest.abort();
                                                                    }

                                                                    // Send a new AJAX request
                                                                    currentRequest = $.ajax({
                                                                        url: 'http://localhost/HIS-SWU/backend/nurse/his_admin_patient_type.php',
                                                                        method: 'GET',
                                                                        data: {
                                                                            patientType: type,
                                                                        },
                                                                        dataType: 'json',
                                                                        success: function(data) {

                                                                            // Populate the table with search results
                                                                            $("#patientTypeTable tbody").empty()
                                                                            $.each(data, function(index, item) {
                                                                                $("#patientTypeTable tbody").append(
                                                                                    `
                                                                                    <tr>
                                                                                        <td>${index + 1}</td>
                                                                                        <td>${item.pat_case}</td>
                                                                                        <td><span class="ml-2">${item.pat_date_joined}</span></td>
                                                                                        <td>${item.pat_number}</td>
                                                                                        <td>${item.pat_fname} ${item.pat_lname}</td>
                                                                                        <td>
                                                                                            <a href="his_admin_render.php?pat_id=${item.pat_id}&pat_number=${item.pat_number}" class="badge badge-success" style="background-color: #8383e3;"><i class="mdi mdi-eye"></i> Select</a>
                                                                                        </td>
                                                                                    </tr>
                                                                                    `
                                                                                )
                                                                            })
                                                                        },
                                                                        error: function(e) {
                                                                            console.log("error: ", e)
                                                                        }
                                                                    })

                                                                })
                                                            </script>



                                                            <div class="table-responsive">
                                                                <table id="patientTypeTable" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                                                    <thead style="background-color:#d1d1f5">
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th data-toggle="true">Case Number</th>
                                                                            <th data-toggle="true">Reference Date</th>
                                                                            <th data-toggle="true">Patient ID</th>
                                                                            <th data-toggle="true">Full Name</th>
                                                                            <th data-hide="phone">Action</th>


                                                                        </tr>
                                                                    </thead>
                                                                    <?php
                                                                    $ret = "SELECT DISTINCT p.pat_id, p.pat_case, p.pat_number, p.pat_fname, p.pat_lname, p.pat_date_joined, rb.room_number
                                                                        FROM his_patients p
                                                                        LEFT JOIN his_rooms_beds rb ON p.room_id = rb.room_id
                                                                        WHERE p.pat_type = 'outpatient'  ";
                                                                    $stmt = $mysqli->prepare($ret);
                                                                    $stmt->execute();
                                                                    $res = $stmt->get_result();
                                                                    $cnt = 1;

                                                                    ?>


                                                                    <tbody>
                                                                        <?php while ($row = $res->fetch_object()) {
                                                                            $mysqlDateTime = $row->pat_date_joined; ?>
                                                                            <tr>
                                                                                <td><?php echo $cnt; ?></td>
                                                                                <td><?php echo $row->pat_case; ?></td>
                                                                                <td><span class="ml-2"><?php echo date("d/m/Y - h:m", strtotime($mysqlDateTime)); ?></span></td>
                                                                                <td><?php echo $row->pat_number; ?></td>
                                                                                <td><?php echo $row->pat_fname; ?> <?php echo $row->pat_lname; ?></td>
                                                                                <td>
                                                                                    <a href="his_admin_render.php?pat_id=<?php echo $row->pat_id; ?>&pat_number=<?php echo $row->pat_number; ?>" class="badge badge-success" style="background-color: #8383e3;"><i class="mdi mdi-eye"></i> Select</a>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                    <?php $cnt = $cnt + 1;
                                                                    ?>

                                                                </table>
                                                            </div> <!-- end .table-responsive-->







                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $(".btn-secondary").click(function() {
                                            $(this).toggleClass("active");
                                        });
                                    });
                                </script>
                                <form method="post" action="his_doc_ancillary.php">


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






                                    <div class="table-responsive my-3 ">
                                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0 table-sm " data-page-size="7">
                                            <thead class="table-secondary">
                                                <tr>
                                                    <th>#</th>
                                                    <th data-toggle="true">Patient Name</th>
                                                    <th data-toggle="true">Age</th>
                                                    <!-- <th data-toggle="true">Room No./Bed No.</th> -->
                                                    <!-- <th data-toggle="true">Requisition No.</th> -->
                                                    <!-- <th data-hide="phone">Requisition DateTime</th> -->
                                                    <th data-hide="phone">Requesting Doctor</th>
                                                    <!-- <th data-hide="phone">Requesting Department</th> -->
                                                    <th data-hide="phone">Document No.</th>
                                                    <!-- <th data-hide="phone">DateTime To Perform</th> -->
                                                    <th data-hide="phone">Render DateTime</th>
                                                    <th data-hide="phone">Amount</th>
                                                    <!-- <th data-hide="phone">Registry No.</th>
                                                <th data-hide="phone">OR No.</th> -->
                                                    <th data-hide="phone">Payment Amount</th>
                                                    <th data-hide="phone">Payer Name</th>
                                                    <!-- <th data-hide="phone">Requested By</th> -->
                                                    <th data-hide="phone">Rendered By</th>
                                                    <!-- <th data-hide="phone">Cancelled By</th> -->
                                                    <!-- <th>Action</th> -->

                                                </tr>
                                            </thead>
                                            <?php
                                            /*
                                                *get details of allpatients
                                                *
                                            */
                                            $ret = "SELECT * FROM  his_ancillary ";
                                            //sql code to get to ten docs  randomly
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            $cnt = 1;
                                            while ($row = $res->fetch_object()) {
                                            ?>
                                                <tbody>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $row->render_name; ?></td>
                                                    <td class="text-center"><?php echo $row->render_age; ?></td>
                                                    <!-- <td><?php echo $row->render_room_number; ?></td> -->
                                                    <td><?php echo $row->render_req_doc; ?></td>
                                                    <td><?php echo $row->render_doc_number; ?></td>
                                                    <td><?php echo $row->render_req_date; ?></td>
                                                    <td class="text-center"><?php echo $row->render_payment; ?></td>
                                                    <td class="text-center">0.00</td>
                                                    <td><?php echo $row->render_payer_name; ?></td>
                                                    <td><?php echo $row->render_by; ?></td>
                                                    <!-- <td>
                                                        <a href="#" style="background-color: #8383e3;" class="badge badge-danger" data-toggle="modal" data-target="#deleteConfirmationModal" data-recordid="<?php echo $row->render_id; ?>">
                                                            <i class="mdi mdi-trash-can-outline"></i> Delete
                                                        </a>
                                                    </td> -->

                                                </tbody>

                                            <?php $cnt = $cnt + 1;
                                            } ?>

                                            <tfoot>
                                                <tr class="active">
                                                    <td colspan="16">
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