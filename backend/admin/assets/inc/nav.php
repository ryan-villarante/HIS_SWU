<?php
$aid = $_SESSION['ad_id'];
$ret = "select * from his_admin where ad_id=?";
$stmt = $mysqli->prepare($ret);
$stmt->bind_param('i', $aid);
$stmt->execute(); //ok
$res = $stmt->get_result();
//$cnt=1;
while ($row = $res->fetch_object()) {
?>
    <div class="navbar-custom " style="background-color: #800;">
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
                    <img src="assets/images/users/<?php echo $row->ad_dpic; ?>" alt="dpic" class="rounded-circle">
                    <span class="pro-user-name ml-1 text-light">
                        <?php echo $row->ad_fname; ?> <?php echo $row->ad_lname; ?> <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">


                    <!-- item-->
                    <a href="his_admin_account.php" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>My Account</span>
                    </a>


                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="his_admin_logout_partial.php" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>



        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="his_admin_dashboard.php" class="logo text-center">
                <span class="logo-lg">
                    <img src="assets/images/logos.png" alt="" height="75">
                    <span class="logo-lg-text-light">HIS</span>
                </span>
                <span class="logo-sm">
                    <!-- <span class="logo-sm-text-dark">U</span> -->
                    <img src="assets/images/hehe.png" alt="" height="24">
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
                <span class="logo-lg-text-light" style="color: white;font-size:large;font-weight:bold">ADMIN</span>
            </li>

            <li class="dropdown d-none d-lg-block">
                <!-- <a class="nav-link dropdown-toggle waves-effect waves-light " data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="text-light"><strong>CREATE NEW </strong></span>
                    <i class="mdi mdi-chevron-down"></i>
                </a> -->
                <div class="text-light dropdown-menu">

                    <!-- item-->
                    <a href="his_admin_add_user.php" class="dropdown-item">
                        <i class="fe-user mr-1"></i>
                        <span>User</span>
                    </a>

                    <!-- item-->
                    <!-- <a href="his_admin_register_patient.php" class="dropdown-item">
                        <i class="fe-activity mr-1"></i>
                        <span>InPatient</span>
                    </a> -->

                    <!-- item-->
                    <!-- <a href="his_admin_register_patient.php" class="dropdown-item">
                        <i class="fe-activity mr-1"></i>
                        <span>OutPatient</span>
                    </a> -->
                    <!-- item-->
                    <a href="his_admin_add_employee.php" class="dropdown-item">
                        <i class="fe-users mr-1"></i>
                        <span>Consultant</span>
                    </a>

                    <!-- item-->
                    <!--<a href="his_admin_add_payroll.php" class="dropdown-item">
                        <i class="fe-layers mr-1"></i>
                        <span>Payroll</span>
                    </a> -->

                    <!-- item-->
                    <a href="his_admin_add_equipment.php" class="dropdown-item">
                        <i class="fe-shopping-cart mr-1"></i>
                        <span>Equipment</span>
                    </a>

                    <a href="his_admin_add_examination.php" class="dropdown-item">
                        <i class="	fas fa-book-medical"></i>
                        <span>Examination</span>
                    </a>

                    <a href="his_admin_add_procedure.php" class="dropdown-item">
                        <i class="		fas fa-medkit"></i>
                        <span>Procedure</span>
                    </a>


                    <a href="his_admin_add_room.php" class="dropdown-item">
                        <i class="fas fa-bed mr-1"></i>
                        <span>Rooms</span>
                    </a>

                    <a href="his_admin_add_guarantor.php" class="dropdown-item">
                        <i class="	fas fa-user-nurse mr-1"></i>
                        <span>HMO Guarantor</span>
                    </a>



                    <a href="his_admin_add_medical_record.php" class="dropdown-item">
                        <i class="fe-list mr-1"></i>
                        <span>Medical Report</span>
                    </a>

                    <a href="his_admin_lab_report.php" class="dropdown-item">
                        <i class="fe-hard-drive mr-1"></i>
                        <span>Laboratory Report</span>
                    </a>


                    <a href="his_admin_surgery_records.php" class="dropdown-item">
                        <i class="fe-anchor mr-1"></i>
                        <span>Surgical Report</span>
                    </a>


                    <div class="dropdown-divider"></div>


                </div>
            </li>

        </ul>
    </div>
<?php } ?>