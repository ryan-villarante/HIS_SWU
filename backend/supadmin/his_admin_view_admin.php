<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['sup_id'];
?>

<?php


// Delete Record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteRecordId'])) {
    $id = intval($_POST['deleteRecordId']);
    $adn = "DELETE FROM his_admin WHERE ad_id=?";
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
if (isset($_POST['add_admin'])) {
    $ad_number = $_POST['ad_number'];
    $ad_fname = $_POST['ad_fname'];
    $ad_lname = $_POST['ad_lname'];
    $ad_email = $_POST['ad_email'];
    $ad_type = $_POST['ad_type'];
    $ad_pwd = sha1(md5($_POST['ad_pwd']));
    $ad_dpic = $_FILES["ad_dpic"]["name"];
    move_uploaded_file($_FILES["ad_dpic"]["tmp_name"], "../admin/assets/images/users/" . $_FILES["ad_dpic"]["name"]);



    // SQL query to insert captured values
    $query = "INSERT INTO his_admin (ad_number,ad_fname, ad_lname,  ad_email, ad_pwd, ad_dpic,ad_type) VALUES (?,?,?,?,?,?,?)";

    try {
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('sssssss', $ad_number, $ad_fname, $ad_lname,  $ad_email, $ad_pwd, $ad_dpic, $ad_type);
        $stmt->execute();
        $stmt->close();
        $success = " New Admin Added";
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Super Admin</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">System Accounts</a></li>
                                        <li class="breadcrumb-item active">Admin Account</li>
                                    </ol>
                                </div>
                                <!-- <h4 class="page-title">Admin Account</h4> -->
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->



                    <!-- Modal -->
                    <div class="modal fade" id="newAdmin" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    Fill all fields
                                </div>
                                <div class="modal-body ">
                                    <div class="card-body">
                                        <!--Add User Form-->
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6" style="display: none;">
                                                        <label for="inputEmail4" class="col-form-label">Admin Type</label>
                                                        <input type="text" required="required" name="ad_type" class="form-control" id="inputEmail4" value="System_Admin">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4" class="col-form-label">First Name</label>
                                                        <input type="text" required="required" name="ad_fname" class="form-control" id="inputEmail4">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                        <input required="required" type="text" name="ad_lname" class="form-control" id="inputPassword4">
                                                    </div>
                                                    <div class="form-group col-md-2" style="display: none;">
                                                        <?php

                                                        $currentDate = date("Ymd"); // Get current date in the format YYYYMMDD
                                                        $randomNumber = rand(1, 9); // Generate a random number from 1 to 9
                                                        $randomSuffix = substr(str_shuffle("0123456789"), 0, 4); // Generate a random 7-digit number
                                                        $ad_id = "AD-" . substr(str_shuffle("0123456789"), 0, 6);
                                                        ?>
                                                        <label for="inputZip" class="col-form-label">Admin Number</label>
                                                        <input type="text" name="ad_number" value="<?php echo $ad_id; ?>" class="form-control small-input" id="inputZip">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress" class="col-form-label">Email</label>
                                                        <input required="required" type="email" class="form-control" name="ad_email" id="inputAddress">
                                                    </div>


                                                    <div class="form-group col-md-6">
                                                        <label for="inputCity" class="col-form-label">Password</label>
                                                        <input required="required" type="password" name="ad_pwd" class="form-control" id="inputCity">


                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputCity" class="col-form-label">Profile Picture</label>
                                                        <input type="file" name="ad_dpic" class="btn btn-secondary form-control" id="inputCity">
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" name="add_admin" class="ladda-button btn btn-success my-3" data-style="expand-right">Add Admin</button>

                                                </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- END MODAL -->

                <!-- START VIEW MODAL -->

                <div class="modal fade" id="viewAdmin" tabindex="-1" role="dialog" aria-labelledby="viewAdminLabel" aria-hidden="true">
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
                                                    <input type="text" readonly name="" value="Admin Details" class="form-control" style="background-color: #38414a;color:white;text-align: center;">
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

                <form method="post" action="his_admin_view_admin.php">

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

                    <div class="row">

                        <div class="col-12">
                            <div class="card-box">

                                <!-- Trigger the modal with a button -->
                                <button type="button" class="	fa fa-plus lg-4 bi-plus btn btn-secondary btn-lg-2" data-toggle="modal" data-target="#newAdmin"> Add New </button>



                                <h4 class="header-title"></h4>
                                <div class="mb-2">
                                    <div class="row">
                                        <div class="col-12 text-sm-center form-inline">


                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th>#</th>
                                                <th data-hide="phone">Admin ID</th>
                                                <th data-toggle="true">Firstname</th>
                                                <th data-hide="phone">Lastname</th>
                                                <th data-hide="phone">Email</th>
                                                <th data-hide="phone">Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        /*
                                                *get details of allpatients
                                                *
                                            */
                                        $ret = "SELECT * FROM  his_admin ";
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
                                                    <td><?php echo $row->ad_number; ?></td>
                                                    <td><?php echo $row->ad_fname; ?></td>
                                                    <td><?php echo $row->ad_lname; ?></td>
                                                    <td><?php echo $row->ad_email; ?></td>

                                                    <td>
                                                        <a href="#" class="badge badge-success" data-toggle="modal" data-target="#viewAdmin" data-usernumber="<?php echo $row->ad_number; ?>" data-username="<?php echo $row->ad_fname . ' ' . $row->ad_lname; ?>" data-useremail="<?php echo $row->ad_email; ?>" data-userimage="<?php echo $row->ad_dpic; ?>">
                                                            <i class="mdi mdi-eye"></i> View
                                                        </a>
                                                        <a href="his_supadmin_update_admin.php?ad_number=<?php echo $row->ad_number; ?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                        <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteConfirmationModal" data-recordid="<?php echo $row->ad_id; ?>">
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
            $('#viewAdmin').on('show.bs.modal', function(event) {
                var link = $(event.relatedTarget); // Link that triggered the modal
                var userId = link.data('userid'); // Get data attributes from the link
                var userName = link.data('username');
                var userNumber = link.data('usernumber');
                var userEmail = link.data('useremail');
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
                                        <input type="text" readonly name="" value="Admin Details" class="form-control" style="background-color: #38414a;color:white;text-align: center;">
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
                                                  
                
                                        
                                    </div>
                                    <div class="col-md-6">
        <!-- Image goes here -->
        <img style="border: 3px solid; border-color:#38414a; height:100%" src="../admin/assets/images/users/${userImage}" alt="Image Description" class="img-fluid">
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