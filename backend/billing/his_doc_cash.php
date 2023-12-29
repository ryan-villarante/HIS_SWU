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
    $adn = "DELETE FROM his_cash WHERE cash_id=?";
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cash Receipt</a></li>
                                        <li class="breadcrumb-item active">Cash Receipt</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->



                    <div class="row">
                        <div class="col-12">

                            <div class="card-box">

                                <div class="d-flex justify-content-start">
                                    <button type="button" class="fa fa-plus lg-4 bi-plus btn btn-lg-2 maroon-outline-btn" data-toggle="modal" data-target="#myModal"> Add New</button>

                                    <!-- Add some space between the button and the search bar -->
                                    <div class="mx-2"></div>

                                    <div class="row inpatient-search my-1">
                                        <input type="text" id="searchPaid" placeholder="Search" class="form-control form-control-sm demo-foo-search" autocomplete="on">
                                    </div>
                                </div>


                                <div class="col-md-12 d-flex justify-content-start">
                                    <!-- Trigger the modal with a button -->



                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog modal-xl">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <input type="text" readonly="" name="" value="Patient Register Selection" class="form-control" style="background-color: #800;color:white; font-weight:bold;text-align: center;">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">



                                                        <!-- 
                                                        <div class="form-row">
                                                            <div class="form-group col-md-8 my-2">
                                                                <label for="inputAddress" class="col-form-label">Patient Data</label>

                                                            </div>

                                                        </div> -->



                                                        <div class="row">
                                                            <div class="col-12 text-sm-center form-inline searchContainer">
                                                                <div class="form-group">
                                                                    <input type="text" id="searchInput" placeholder="Search" data-tablename="his_ancillary" data-columntosearch="render_name" data-resulttable="ancillaryData" class="form-control form-control-sm demo-foo-search" autocomplete="on" onkeyup="searchTable()">
                                                                </div>
                                                            </div>

                                                        </div>






                                                        <div class="table-responsive">
                                                            <table id="ancillaryData" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                                                <thead class="table-danger">
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th data-toggle=" true">Patient Name</th>
                                                                        <th data-toggle="true">Age</th>
                                                                        <th data-toggle="true">Room No.</th>
                                                                        <th data-toggle="true">Requesting Doctor</th>
                                                                        <th data-toggle="true">Payment Amount</th>
                                                                        <th data-hide="phone">Action</th>


                                                                    </tr>
                                                                </thead>
                                                                <?php
                                                                /*
                                                *get details of allpatients
                                                *
                                            */
                                                                $ret = "SELECT * FROM  his_ancillary WHERE paid = 0 ";
                                                                //sql code to get to ten docs  randomly
                                                                $stmt = $mysqli->prepare($ret);
                                                                $stmt->execute(); //ok
                                                                $res = $stmt->get_result();
                                                                $cnt = 1;
                                                                while ($row = $res->fetch_object()) {
                                                                ?>


                                                                    <tbody>

                                                                        <tr>
                                                                            <td><?php echo $cnt; ?></td>
                                                                            <td><?php echo $row->render_name ?></td>
                                                                            <td><?php echo $row->render_age ?></td>
                                                                            <td><?php echo $row->render_room_number ?></td>
                                                                            <td><?php echo $row->render_req_doc ?></td>
                                                                            <td><?php echo $row->render_payment ?></td>
                                                                            <td>
                                                                                <a href="his_admin_swu_render_cash.php?render_id=<?php echo $row->render_id; ?>" class="badge badge-success" style="background-color: #800;"><i class="mdi mdi-eye"></i> Select</a>
                                                                            </td>
                                                                        </tr>

                                                                    </tbody>
                                                                <?php $cnt = $cnt + 1;
                                                                } ?>
                                                                <tfoot>
                                                                    <tr class="active">
                                                                        <td colspan="7">
                                                                            <div class="text-right">
                                                                                <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>

                                                            </table>
                                                        </div> <!-- end .table-responsive-->








                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>


                                <form method="post" action="his_doc_cash.php">

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

                                    <div class="table-responsive mt-3">
                                        <table id="patient-table-paid" class="table table-borderless table-hover table-centered m-0" data-page-size="5">
                                            <thead class="table-danger">
                                                <tr>
                                                    <th>#</th>
                                                    <th data-toggle="true">Official Receipt Number</th>
                                                    <th data-toggle="true">Official Receipt Date</th>
                                                    <th data-hide="phone">Payer Name</th>
                                                    <th data-hide="phone">Cash Amount</th>
                                                    <!-- <th data-hide="phone">Check Amount</th>
                                                    <th data-hide="phone">Credit Card Amount</th> -->
                                                    <!-- <th data-hide="phone">Other Amount</th> -->
                                                    <th data-hide="phone">Applied Amount</th>
                                                    <th data-hide="phone">Change with Discount</th>
                                                    <!-- <th data-hide="phone">Refund Amount</th> -->
                                                    <th data-hide="phone">Cashier Name</th>
                                                    <th data-hide="phone">Remarks</th>
                                                    <!-- <th>Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody data-toggle="true" data-show="4">
                                                <?php
                                                /*
                                                *get details of allpatients
                                                *
                                            */
                                                $ret = "SELECT * FROM  his_cash ";
                                                //sql code to get to ten docs  randomly
                                                $stmt = $mysqli->prepare($ret);
                                                $stmt->execute(); //ok
                                                $res = $stmt->get_result();
                                                $cnt = 1;
                                                while ($row = $res->fetch_object()) {
                                                ?>

                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $row->cash_or_number; ?></td>
                                                    <td><?php echo $row->cash_date; ?></td>
                                                    <td><?php echo $row->cash_payer; ?></td>
                                                    <td><?php echo $row->cash_amount; ?></td>
                                                    <!-- <td><?php echo $row->cash_check; ?></td>
                                                    <td><?php echo $row->cash_credit; ?></td> -->
                                                    <td><?php echo $row->cash_applied; ?></td>
                                                    <td><?php echo $row->discountAmount; ?></td>
                                                    <td><?php echo $row->cash_cashier; ?></td>
                                                    <td><?php echo $row->cash_remark; ?></td>
                                                    <!-- <td>
                                                        <a href="#" class="badge badge-danger" style="background-color: #800;" data-toggle="modal" data-target="#deleteConfirmationModal" data-recordid="<?php echo $row->cash_id; ?>">
                                                            <i class="mdi mdi-trash-can-outline"></i> Delete
                                                        </a>
                                                    </td> -->
                                            </tbody>
                                        <?php $cnt = $cnt + 1;
                                                } ?>
                                        <tfoot>
                                            <tr class="active">
                                                <td colspan="12">
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

    <!-- Footable js -->
    <script src="assets/libs/footable/footable.all.min.js"></script>



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
        // Add an event listener to the keyup event of the search input
        document.getElementById('searchPaid').addEventListener('keyup', function() {
            // Get the value of the search input and convert it to lowercase
            var searchQuery = this.value.toLowerCase();

            // Get all rows in the table body
            var rows = document.querySelectorAll('#patient-table-paid tbody tr');

            // Loop through each row
            rows.forEach(function(row) {
                // Get the text content of each cell and convert it to lowercase
                var rowText = row.textContent.toLowerCase();

                // If the row contains the search query, display it; otherwise, hide it
                if (rowText.includes(searchQuery)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>


    \
    <script>
        // JavaScript function to filter the table based on the input
        function searchTable() {
            var input = document.getElementById("searchInput").value.toUpperCase();
            var table = document.getElementById("ancillaryData");
            var rows = table.getElementsByTagName("tr");

            for (var i = 0; i < rows.length; i++) {
                var patientNameCell = rows[i].getElementsByTagName("td")[1];
                if (patientNameCell) {
                    var patientName = patientNameCell.textContent || patientNameCell.innerText;
                    if (patientName.toUpperCase().indexOf(input) > -1) {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }
        }
    </script>

</body>

</html>