<?php

session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['ad_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteRecordId'])) {
    $id = intval($_POST['deleteRecordId']);
    // echo "ID to delete: " . $id . "<br>"; // Debug: Check if the ID is correct
    $adn = "delete from his_docs where doc_id=?";
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

if (isset($_POST['add_doc'])) {
    $doc_fname = $_POST['doc_fname'];
    $doc_lname = $_POST['doc_lname'];
    $doc_number = $_POST['doc_number'];
    $doc_cat = $_POST['doc_cat'];
    $doc_dept = $_POST['doc_dept'];
    $doc_role = $_POST['doc_role'];
    $doc_email = $_POST['doc_email'];
    $doc_fee = $_POST['doc_fee'];

    //sql to insert captured values
    $query = "INSERT INTO his_docs (doc_fname, doc_lname, doc_number,doc_cat,doc_dept, doc_role, doc_email, doc_fee) values(?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssssss', $doc_fname, $doc_lname, $doc_number, $doc_cat, $doc_dept, $doc_role, $doc_email, $doc_fee);
    $stmt->execute();
    /*
			*Use Sweet Alerts Instead Of Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Consultant Details Added";
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Consultant</a></li>
                                        <li class="breadcrumb-item active">Manage Consultant</li>
                                    </ol>
                                </div>
                                <div>
                                    <!--<a href="his_admin_add_employee.php" class="dropdown-item">
                                            <i class="fe-users mr-2"></i>
                                             <span>Add Consultant</span>
                                        </a>-->
                                </div>



                            </div>

                        </div>
                    </div>


                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">

                            <div class="card-box">


                                <div class="col-md-6 d-flex justify-content-start">
                                    <!-- Trigger the modal with a button -->
                                    <button type="button" class="fa fa-plus lg-4 bi-plus btn  btn-lg-2 maroon-outline-btn" data-toggle="modal" data-target="#myModal"> Add New</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog modal-lg">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    Fill all fields
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <!--Add Patient Form-->
                                                        <form method="post">
                                                            <div class="form-row required">
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputEmail4" class="col-form-label">First Name</label>
                                                                    <input type="text" required="required" name="doc_fname" class="form-control" id="inputEmail4">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                                    <input required="required" type="text" name="doc_lname" class="form-control" id="inputPassword4">
                                                                </div>
                                                                <div class="form-group col-md-2" style="display:none">
                                                                    <?php
                                                                    $length = 5;
                                                                    $doc_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);
                                                                    ?>
                                                                    <label for="inputZip" class="col-form-label">Doctor Number</label>
                                                                    <input type="text" name="doc_number" value="<?php echo $doc_number; ?>" class="form-control" id="inputZip">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputAddress" class="col-form-label">Email</label>
                                                                    <input required="required" type="email" class="form-control" name="doc_email" id="inputAddress">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputState" class="col-form-label">Category</label>
                                                                    <select id="inputCategory" required="required" name="doc_cat" class="form-control">
                                                                        <option>Choose</option>
                                                                        <option>Resident</option>
                                                                        <option>Regular Consultant</option>
                                                                        <option>Visiting Consultant</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputState" class="col-form-label">Specialization</label>
                                                                    <select id="inputState" required="required" name="doc_dept" class="form-control">
                                                                        <option>Choose</option>
                                                                        <option>Anesthesiology</option>
                                                                        <option>Cardiology</option>
                                                                        <option>Dermatology</option>
                                                                        <option>Emergency medicine</option>
                                                                        <option>Endocrinology</option>
                                                                        <option>Family medicine</option>
                                                                        <option>Gastroenterology</option>
                                                                        <option>General practitioner</option>
                                                                        <option>Geriatrics</option>
                                                                        <option>Gynecology</option>
                                                                        <option>Internal medicine</option>
                                                                        <option>Medicine</option>
                                                                        <option>Neurology</option>
                                                                        <option>Neurosurgery</option>
                                                                        <option>Oncology</option>
                                                                        <option>Ophthalmology</option>
                                                                        <option>Orthopedics</option>
                                                                        <option>Otorhinolaryngology</option>
                                                                        <option>Pathology</option>
                                                                        <option>Pediatrics</option>
                                                                        <option>Psychiatry</option>
                                                                        <option>Radiology</option>
                                                                        <option>Surgery</option>
                                                                        <option>Urology</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6" style="display: none;">
                                                                    <label for="inputState" class="col-form-label">Role</label>
                                                                    <select id="inputRole" readonly required="required" name="doc_role" class="form-control">
                                                                        <option>None</option>
                                                                        <option>Attending</option>
                                                                        <option>Admitting</option>
                                                                    </select>

                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label for="inputAddress" class="col-form-label">Consultation Fee</label>
                                                                    <input required="required" type="number" class="form-control" name="doc_fee" min="0" max="50000">
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer my-3">

                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <button type="submit" name="add_doc" class="ladda-button btn btn-primary" data-style="expand-right">Save changes</button>


                                                            </div>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

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


                                <script>
                                    $(document).ready(function() {
                                        $(".maroon-outline-btn").click(function() {
                                            $(this).toggleClass("active");
                                        });
                                    });
                                </script>


                                <h4 class="header-title"></h4>


                                <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                            </div>
                                            <div class="modal-body">
                                                <div class="col-lg-8 col-xl-12">
                                                    <div class="card-box">
                                                        <ul class="nav nav-pills navtab-bg nav-justified">
                                                            <li class="nav-item">
                                                                <div class="form-group col-md-12 my-1">
                                                                    <input type="text" readonly name="" value="Consultant Details" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="text-left mt-3">

                                                            <?php
                                                            $doc_id = $_GET['doc_id'];
                                                            $ret = "SELECT  * FROM his_docs WHERE doc_id=?";
                                                            $stmt = $mysqli->prepare($ret);
                                                            $stmt->bind_param('i', $doc_id);
                                                            $stmt->execute();
                                                            $res = $stmt->get_result();
                                                            while ($row = $res->fetch_object()) {
                                                            ?>

                                                                <!-- Rest of your code for displaying consultant details goes here -->
                                                                <div class="form-row">
                                                                    <div class="col-md-6">
                                                                        <!-- Consultant details as in your code -->
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <!-- Image goes here -->
                                                                        <img style="border: 3px solid; border-color:#800" src="../admin/assets/images/eut.jpg" alt="Image Description" class="img-fluid">
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <form method="post" action="his_admin_manage_employee.php">

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
                                                <div class="form-group">
                                                    <input id="demo-foo-search" type="text" placeholder="Search Consultant" class="form-control form-control-sm" autocomplete="on">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">

                                        <table id="demo-foo-filtering" class="table table-borderless table-hover mb-0" data-page-size="7">
                                            <thead class="table-danger">
                                                <tr>
                                                    <th>#</th>
                                                    <th data-hide="phone">Code</th>
                                                    <th data-toggle="true">Category</th>
                                                    <th data-hide="phone">Specialization</th>
                                                    <th data-toggle="true">Name</th>
                                                    <th data-hide="phone">Email</th>
                                                    <th data-hide="phone">Consultation Fee</th>
                                                    <th data-hide="phone">Action</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            /*
                                                *get details of allpatients
                                                *
                                            */
                                            $ret = "SELECT * FROM  his_docs  ";
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
                                                        <td><?php echo $row->doc_number; ?></td>
                                                        <td><?php echo $row->doc_cat; ?></td>
                                                        <td><?php echo $row->doc_dept; ?></td>
                                                        <td><?php echo $row->doc_fname; ?> <?php echo $row->doc_lname; ?></td>
                                                        <td><?php echo $row->doc_email; ?></td>
                                                        <td>₱<?php echo $row->doc_fee; ?>.00</td>
                                                        <td>

                                                            <a href="#" class="badge badge-success" data-toggle="modal" data-target="#viewModal" data-docid="<?php echo $row->doc_id; ?>" data-docnumber="<?php echo $row->doc_number; ?>" data-docname="<?php echo $row->doc_fname;
                                                                                                                                                                                                                                                            echo $row->doc_lname; ?>" data-docemail="<?php echo $row->doc_email; ?>" data-doccat="<?php echo $row->doc_cat; ?>" data-docrole="<?php echo $row->doc_role; ?>" data-docspec="<?php echo $row->doc_dept; ?>" data-docfee="<?php echo $row->doc_fee; ?>">
                                                                <i class="mdi mdi-eye"></i> View
                                                            </a>
                                                            <a href="his_admin_update_single_employee.php?doc_number=<?php echo $row->doc_number; ?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                            <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteConfirmationModal" data-recordid="<?php echo $row->doc_id; ?>">
                                                                <i class="mdi mdi-trash-can-outline"></i> Delete
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            <?php $cnt = $cnt + 1;
                                            } ?>
                                            <tfoot>
                                                <tr class="active">
                                                    <td colspan="8">
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


    <script>
        $(document).ready(function() {
            // Listen for the modal to be shown
            $('#viewModal').on('show.bs.modal', function(event) {
                var link = $(event.relatedTarget); // Link that triggered the modal
                var docId = link.data('docid'); // Get data attributes from the link
                var docNumber = link.data('docnumber');
                var docName = link.data('docname');
                var docEmail = link.data('docemail');
                var docCat = link.data('doccat');
                var docRole = link.data('docrole');
                var docSpec = link.data('docspec');
                var docFee = link.data('docfee');


                // Modify the modal content
                var modal = $(this);
                modal.find('.modal-content').html(`
                <div class="modal-header">
                    
                </div>
                <div class="modal-body">
                    <div class="col-lg-8 col-xl-12">
                        <div class="card-box">
                            <ul class="nav nav-pills navtab-bg nav-justified">
                                <li class="nav-item">
                                    <div class="form-group col-md-12 my-1">
                                        <input type="text" readonly name="" value="Consultant Details" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                    </div>
                                </li>
                            </ul>
                            <div class="text-left mt-3">
                            <div class="text-left mt-3">  
                                <div class="form-row">
                                    <div class="col-md-6">

                                    <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Consultant ID</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${docNumber}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Name</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${docName}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Email</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${docEmail}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Category</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${docCat}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Role</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${docRole}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Specialization</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${docSpec}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Consultation Fee</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="₱${docFee}.00">
                                            </div>

                                            
                                    
                
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Image goes here -->
                                        <img style="border: 3px solid; border-color:#800; height:100%" src="../admin/assets/images/doc.jpg" alt="Image Description" class="img-fluid">
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            `);
            });
        });
    </script>



</body>

</html>