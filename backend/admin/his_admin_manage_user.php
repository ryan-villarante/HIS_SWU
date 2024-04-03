<?php
session_start();
include('assets/inc/config.php');

// Delete Record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteRecordId'])) {
    $id = intval($_POST['deleteRecordId']);
    $adn = "DELETE FROM his_user WHERE user_id=?";
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
    } else {
        $err = "Try Again Later";
    }
}

// Add User
if (isset($_POST['add_user'])) {
    $user_fname = $_POST['user_fname'];
    $user_lname = $_POST['user_lname'];
    $user_number = $_POST['user_number'];
    $user_cat = $_POST['user_cat'];
    $user_dept = $_POST['user_dept'];
    $user_email = $_POST['user_email'];
    $user_pwd = sha1(md5($_POST['user_pwd']));
    $user_dpic = $_FILES["user_dpic"]["name"];
    move_uploaded_file($_FILES["user_dpic"]["tmp_name"], "../admin/assets/images/users/" . $_FILES["user_dpic"]["name"]);



    // SQL query to insert captured values
    $query = "INSERT INTO his_user (user_fname, user_lname, user_number, user_cat, user_dept, user_email, user_pwd, user_dpic) VALUES (?,?,?,?,?,?,?,?)";

    try {
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('ssssssss', $user_fname, $user_lname, $user_number, $user_cat, $user_dept, $user_email, $user_pwd, $user_dpic);
        $stmt->execute();
        $stmt->close();
        $success = "User Details Added";
    } catch (Exception $e) {
        $err = "Please Try Again Or Try Later: " . $e->getMessage();
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                        <li class="breadcrumb-item active">Manage Users</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="container">


                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        Fill all fields
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body ">
                                        <div class="card-body">
                                            <!--Add User Form-->
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="form-row required">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4" class="col-form-label">First Name</label>
                                                            <input type="text" required="required" name="user_fname" class="form-control" id="inputEmail4">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                            <input required="required" type="text" name="user_lname" class="form-control" id="inputPassword4">
                                                        </div>
                                                        <div class="form-group col-md-2" style="display:none">
                                                            <?php
                                                            $length = 5;
                                                            $patient_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);
                                                            ?>
                                                            <label for="inputZip" class="col-form-label">Doctor Number</label>
                                                            <input type="text" name="user_number" value="<?php echo $patient_number; ?>" class="form-control" id="inputZip">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputAddress" class="col-form-label">Email</label>
                                                            <input required="required" type="email" class="form-control" name="user_email" id="inputAddress">
                                                        </div>
                                                        <div class="form-group col-md-6" style="display: none;">
                                                            <label for="inputState" class="col-form-label">Category</label>
                                                            <select id="inputState" name="user_cat" class="form-control">
                                                                <option>Choose</option>
                                                                <option>InfoTech</option>
                                                                <option>Medtech</option>
                                                                <option>Pharmacist</option>
                                                                <option>Staff</option>
                                                                <option>Billing</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputState" class="col-form-label">User Type</label>
                                                            <select id="inputState" required="required" name="user_dept" class="form-control">
                                                                <option>choose</option>
                                                                <option>Receptionist</option>
                                                                <option>Pharmacist</option>
                                                                <option>Medtech</option>
                                                                <option>Nurse</option>
                                                                <option>Cashier</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="inputCity" class="col-form-label">Profile Picture</label>
                                                            <input type="file" name="user_dpic" class="btn btn-secondary form-control" id="inputCity">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="inputCity" class="col-form-label">Password</label>
                                                            <input required="required" type="password" name="user_pwd" class="form-control" id="inputCity">


                                                        </div>

                                                    </div>

                                                    <div class="modal-footer ">
                                                        <button type="submit" name="add_user" class="ladda-button btn btn-success my-3" data-style="expand-right">Add User</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">

                            <!-- Trigger the modal with a button -->
                            <button type="button" class="	fa fa-plus lg-4 bi-plus btn maroon-outline-btn btn-lg-2" data-toggle="modal" data-target="#myModal"> Add User </button>


                            <h4 class="header-title"></h4>
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-12 text-sm-center form-inline">

                                        <!-- <div class="form-group">
                                                    <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                                </div> -->
                                    </div>
                                </div>
                            </div>

                            <!-- START VIEW MODAL -->

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
                                                                <input type="text" readonly name="" value="User Details" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="text-left mt-3">

                                                        <?php
                                                        if (isset($_GET['user_id'])) {
                                                            $user_id = $_GET['user_id'];
                                                            $ret = "SELECT  * FROM his_user WHERE user_id=?";
                                                            $stmt = $mysqli->prepare($ret);
                                                            $stmt->bind_param('i', $user_id);
                                                            $stmt->execute();
                                                            $res = $stmt->get_result();

                                                            if ($row = $res->fetch_object()) {
                                                                // Rest of your code for displaying user details goes here
                                                        ?>
                                                                <div class="form-row">
                                                                    <div class="col-md-6">
                                                                        <!-- Consultant details as in your code -->
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <!-- Image goes here -->
                                                                    </div>
                                                                </div>
                                                        <?php
                                                            }
                                                        } else {
                                                            // Handle the case when 'user_id' is not set, for example, display an error message or redirect
                                                            echo "User ID is not set.";
                                                        }
                                                        ?>
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


                            <!-- END VIEW MODAL -->



                            <form method="post" action="his_admin_manage_user.php">

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

                                <div class="table-responsive">
                                    <table id="demo-foo-filtering" class="table table-borderless table-hover mb-0" data-page-size="7">
                                        <thead class="table-danger">
                                            <tr>
                                                <th>#</th>
                                                <th data-hide="phone">Code</th>
                                                <th data-hide="phone">Department</th>
                                                <th data-toggle="true">Name</th>
                                                <th data-hide="phone">Email</th>
                                                <th data-hide="phone">Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        /*
                                                *get details of all user
                                                *
                                            */
                                        $ret = "SELECT * FROM  his_user ";
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
                                                    <td><?php echo $row->user_number; ?></td>

                                                    <td><?php echo $row->user_dept; ?></td>
                                                    <td><?php echo $row->user_fname; ?> <?php echo $row->user_lname; ?></td>
                                                    <td><?php echo $row->user_email; ?></td>
                                                    <td>

                                                        <a href="#" class="badge badge-success" data-toggle="modal" data-target="#viewModal" data-userid="<?php echo $row->user_id; ?>" data-usernumber="<?php echo $row->user_number; ?>" data-username="<?php echo $row->user_fname . ' ' . $row->user_lname; ?>" data-useremail="<?php echo $row->user_email; ?>" data-usercat="<?php echo $row->user_dept; ?>" data-userimage="<?php echo $row->user_dpic; ?>">
                                                            <i class="mdi mdi-eye"></i> View
                                                        </a>

                                                        <a href="his_admin_update_user.php?user_number=<?php echo $row->user_number; ?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                        <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteConfirmationModal" data-recordid="<?php echo $row->user_id; ?>">
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
                var userId = link.data('userid'); // Get data attributes from the link
                var userNumber = link.data('usernumber');
                var userName = link.data('username');
                var userEmail = link.data('useremail');
                var userCat = link.data('usercat');
                var userImage = link.data('userimage'); // Retrieve the image source

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
                                        <input type="text" readonly name="" value="User Details" class="form-control" style="background-color: #800;color:white;text-align: center;">
                                    </div>
                                </li>
                            </ul>
                            <div class="text-left mt-3">
                            <div class="text-left mt-3">  
                                <div class="form-row">
                                    <div class="col-md-6">

                                    <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">User ID</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${userNumber}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Name</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${userName}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Email</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${userEmail}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text hehe hehe">Department</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control hehe  " id="inputlg" value="${userCat}">
                                            </div>        
                
                                        
                                    </div>
                                    <div class="col-md-6">
        <!-- Image goes here -->
        <img style="border: 3px solid; border-color:#800; height:100%" src="../admin/assets/images/users/${userImage}" alt="Image Description" class="img-fluid">
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