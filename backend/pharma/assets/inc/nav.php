<?php
$user_id = $_SESSION['user_id'];
$user_number = $_SESSION['user_number'];
$ret = "SELECT * FROM  his_user WHERE user_id = ? AND user_number = ?";
$stmt = $mysqli->prepare($ret);
$stmt->bind_param('is', $user_id, $user_number);
$stmt->execute(); //ok
$res = $stmt->get_result();
//$cnt=1;
while ($row = $res->fetch_object()) {
?>
    <div class="navbar-custom" style="background-color: #800;">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <!-- <li class="d-none d-sm-block">
                <form class="app-search">
                    <div class="app-search-box">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn" type="submit">
                                    <i class="fe-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </li> -->


            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="../admin/assets/images/users/<?php echo $row->user_dpic; ?>" alt="dpic" class="rounded-circle">
                    <span class="pro-user-name ml-1 text-light">
                        <?php echo $row->user_fname; ?> <?php echo $row->user_lname; ?> <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <!-- <a href="his_doc_account.php" class="dropdown-item notify-item">
                        <i class="fas fa-user"></i>
                        <span>My Account</span>
                    </a> -->

                    <a href="his_doc_update-account.php" class="dropdown-item notify-item">
                        <i class="fas fa-user-tag"></i>
                        <span>Manage Account</span>
                    </a>

                    <!-- <a href="his_doc_account.php" class="dropdown-item notify-item">
                        <i class="fas fa-user-tag"></i>
                        <span> My Profile</span>
                    </a> -->



                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="his_doc_logout_partial.php" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>



        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="his_pharma_dashboard.php" class="logo text-center">
                <span class="logo-lg">
                    <img src="assets/images/logos.png" alt="" height="75">
                    <span class="logo-lg-text-light">HIS</span>
                </span>
                <span class="logo-sm">
                    <!-- <span class="logo-sm-text-dark">U</span> -->
                    <img src="assets/images/logos.png" alt="" height="24">
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
                <span class="logo-lg-text-light" style="color: white;font-size:large;font-weight:bold">PHARMACY</span>

            </li>

            <li class="dropdown d-none d-lg-block">
                <!-- <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="text-light"><strong>CREATE NEW </strong></span>
                    <i class="mdi mdi-chevron-down"></i> -->
                </a>
                <div class="dropdown-menu">


                    <!-- item-->
                    <a href="his_doc_register_patient.php" class="dropdown-item">
                        <i class="fe-activity mr-1"></i>
                        <span>Patient</span>
                    </a>



                    <!-- item-->
                    <a href="his_doc_lab_report.php" class="dropdown-item">
                        <i class="fe-hard-drive mr-1"></i>
                        <span>Laboratory Report</span>
                    </a>


                    <div class="dropdown-divider"></div>


                </div>
            </li>

        </ul>
    </div>
<?php } ?>