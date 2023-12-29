<?php
session_start();
include 'assets/inc/config.php';
include 'assets/inc/checklogin.php';
check_login();
$aid = $_SESSION['sup_id'];
?>
<!DOCTYPE html>
<html lang="en">

<!--Head Code-->
<?php include "assets/inc/head.php"; ?>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include 'assets/inc/nav.php'; ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'assets/inc/sidebar.php'; ?>
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

                                <h4 style="font-family: Nunito,sans-serif;" class="page-title">Super Administrator Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">
                        <!--Start OutPatients-->
                        <div class="col-md-6 col-xl-4">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-dark border-secondary border">
                                            <i class="		fas fa-user-shield  font-22 avatar-title text-secondary" style="color: #38414a;"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <?php
                                            //code for summing up number of out patients
                                            $result = "SELECT count(*)  FROM his_supadmin ORDER BY RAND() LIMIT 10 ";
                                            $stmt = $mysqli->prepare($result);
                                            $stmt->execute();
                                            $stmt->bind_result($outpatient);
                                            $stmt->fetch();
                                            $stmt->close();
                                            ?>
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $outpatient; ?></span></h3>
                                            <p class="text-muted mb-1 text-truncate">Super Admin</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                        <!--End Out Patients-->


                        <!--Start InPatients-->
                        <div class="col-md-6 col-xl-4">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-dark border-secondary border">
                                            <i class="	fas fa-user-cog  font-22 avatar-title text-secondary"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <?php
                                            //code for summing up number of in / admitted  patients
                                            $result = "SELECT count(*) FROM his_admin ORDER BY RAND() LIMIT 10 ";
                                            $stmt = $mysqli->prepare($result);
                                            $stmt->execute();
                                            $stmt->bind_result($inpatient);
                                            $stmt->fetch();
                                            $stmt->close();
                                            ?>
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $inpatient; ?></span></h3>
                                            <p class="text-muted mb-1 text-truncate">Admin Accounts</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                        <!--End InPatients-->

                        <!--Start Users-->
                        <div class="col-md-6 col-xl-4">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-dark border-secondary border">
                                            <i class="	fas fa-user-md   font-22 avatar-title text-secondary"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <?php
                                            //code for summing up number of in / admitted  patients
                                            $result = "SELECT count(*) FROM his_user ORDER BY RAND() LIMIT 10 ";
                                            $stmt = $mysqli->prepare($result);
                                            $stmt->execute();
                                            $stmt->bind_result($inpatient);
                                            $stmt->fetch();
                                            $stmt->close();
                                            ?>
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $inpatient; ?></span></h3>
                                            <p class="text-muted mb-1 text-truncate">User Accounts</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                        <!--End InPatients-->

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


                        <!--Start Users-->
                        <div class=" col-xl-12">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">

                                    <div class="col-xl-12">
                                        <div class="card-box">
                                            <h4 style="font-family: Nunito,sans-serif;" class="header-title mb-3">System Administrators</h4>

                                            <div class="table-responsive">
                                                <table class="table table-borderless table-hover table-centered m-0">

                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Picture</th>
                                                            <th>Admin ID</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    $ret = "SELECT * FROM his_admin ORDER BY RAND() LIMIT 10 ";
                                                    //sql code to get to ten docs  randomly
                                                    $stmt = $mysqli->prepare($ret);
                                                    $stmt->execute(); //ok
                                                    $res = $stmt->get_result();
                                                    $cnt = 1;
                                                    while ($row = $res->fetch_object()) {
                                                    ?>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <img src="../admin/assets/images/users/<?php echo $row->ad_dpic; ?>" alt="img" title="contact-img" class="rounded-circle avatar-sm" />
                                                                </td>
                                                                <td>
                                                                    <?php echo $row->ad_number; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row->ad_fname; ?> <?php echo $row->ad_lname; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row->ad_email; ?>
                                                                </td>

                                                                <td>
                                                                    <a href="#" class="badge badge-secondary" data-toggle="modal" data-target="#viewAdmin" data-usernumber="<?php echo $row->ad_number; ?>" data-username="<?php echo $row->ad_fname . ' ' . $row->ad_lname; ?>" data-useremail="<?php echo $row->ad_email; ?>" data-userimage="<?php echo $row->ad_dpic; ?>">
                                                                        <i class="mdi mdi-eye"></i> View
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->


                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                        <!--End InPatients-->





                    </div>

                    <div class="row">





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
                                                        <input type="text" readonly name="" value="User Details" class="form-control" style="background-color: #38414a;color:white;text-align: center;">
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

                    <!--Recently Employed Employees-->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <h4 style="font-family: Nunito,sans-serif;" class="header-title mb-3">System Users</h4>

                                <div class="table-responsive">
                                    <table class="table table-borderless table-hover table-centered m-0">

                                        <thead class="thead-light">
                                            <tr>
                                                <th colspan="2">Picture</th>
                                                <th>User Number</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $ret = "SELECT * FROM his_user ORDER BY RAND() LIMIT 10 ";
                                        //sql code to get to ten docs  randomly
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute(); //ok
                                        $res = $stmt->get_result();
                                        $cnt = 1;
                                        while ($row = $res->fetch_object()) {
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td style="width: 36px;">
                                                        <img src="../admin/assets/images/users/<?php echo $row->user_dpic; ?>" alt="img" title="contact-img" class="rounded-circle avatar-sm" />
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                        <?php echo $row->user_number; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row->user_fname; ?> <?php echo $row->user_lname; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row->user_email; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row->user_dept; ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="badge badge-secondary" data-toggle="modal" data-target="#viewModal" data-userid="<?php echo $row->user_id; ?>" data-usernumber="<?php echo $row->user_number; ?>" data-username="<?php echo $row->user_fname . ' ' . $row->user_lname; ?>" data-useremail="<?php echo $row->user_email; ?>" data-usercat="<?php echo $row->user_dept; ?>" data-userimage="<?php echo $row->user_dpic; ?>">
                                                            <i class="mdi mdi-eye"></i> View
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->


                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include 'assets/inc/footer.php'; ?>
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

    <!-- Plugins js-->
    <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>
    <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.time.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.selection.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

    <!-- Dashboar 1 init js-->
    <script src="assets/js/pages/dashboard-1.init.js"></script>

    <!-- App js-->
    <script src="assets/js/app.min.js"></script>

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
                                        <input type="text" readonly name="" value="User Details" class="form-control" style="background-color: #38414a;color:white;text-align: center;">
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