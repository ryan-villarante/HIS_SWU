<div class="navbar-custom" style="background-color: #800;">
    <ul class="list-unstyled topnav-menu float-right mb-0">


        <?php
        $result = "SELECT user_dept FROM his_user WHERE user_id = " . $_SESSION['user_id'];
        $stmt = $mysqli->prepare($result);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($row = $res->fetch_object()) {
            $result2 = "SELECT COUNT(*) as total FROM his_notify WHERE cleared = 0 AND no_dept = '" . 'Billing' . "'";
            $stmt2 = $mysqli->prepare($result2);
            $stmt2->execute();
            $res2 = $stmt2->get_result();
            while ($row2 = $res2->fetch_object()) {
        ?>
                <li class="notif-li">
                    <div class="notif-cont">

                        <a class="fa fa-bell"></a>
                        <div class="notif-count" style="visibility: <?php echo ($row2->total == 0 ? "hidden" : "visible"); ?>"><?php echo $row2->total; ?></div>
                    </div>
                </li>
        <?php
            }
        } ?>


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
        <a href="his_billing_dashboard.php" class="logo text-center">
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
            <span class="logo-lg-text-light" style="color: white;font-size:large;font-weight:bold">BILLING</span>
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

<script>
    $(document).ready(function() {
        $(".notif-cont").click(function() {
            $("#notifications").modal("toggle")
        })
    })
</script>



<!-- Modal -->
<div class="modal fade" id="notifications" tabindex="-1" role="dialog" aria-labelledby="notificationsLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                May-Go-Home Clearance Request
                <h5 class="modal-title" id="notificationsLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php
                $result = "SELECT user_dept FROM his_user WHERE user_id = " . $_SESSION['user_id'];
                $stmt = $mysqli->prepare($result);
                $stmt->execute();
                $res = $stmt->get_result();
                while ($row = $res->fetch_object()) {
                    $result2 = "SELECT * FROM his_notify WHERE cleared  = 0 AND no_dept = '" . 'Billing' . "'";
                    $stmt2 = $mysqli->prepare($result2);
                    $stmt2->execute();
                    $res2 = $stmt2->get_result();
                    while ($row2 = $res2->fetch_object()) {
                ?>

                        <div class="" id="notif-<?php echo $row2->no_id; ?>">
                            <div class="message">
                                <div class="input-group mb-2 ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text exam"><strong><?php echo $row2->no_date; ?></strong></span>
                                    </div>
                                    <input type="text" readonly name="" class="form-control exam" value="<?php echo $row2->no_message; ?>">
                                    <a href="#" class="btn btn-success maroon-outline-btn btn-xs" data-toggle="modal" data-target="#clearModal" data-recordid="<?php echo $row2->no_id; ?>">Cleared</a>
                                </div>

                            </div>
                            <input type="hidden" name="deleteRecordId" id="deleteRecordId" value="">
                        </div>

                <?php
                    }
                } ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- END MODAL -->

<!-- Modal -->
<div class="modal fade" id="clearModal" tabindex="-1" role="dialog" aria-labelledby="clearModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content" style="background-color: #ecffde;">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="clearModalLabel">Confirm Deletion</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to tag this record as cleared?
            </div>
            <div class="modal-footer">
                <button type="button" id="clear_record" class="btn btn-primary">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>




<!-- END MODAL -->

<script>
    $(document).ready(function() {
        $('.btn-success').click(function() {
            var recordId = $(this).data('recordid');
            console.log("Record ID:", recordId); // Check if the correct ID is printed
            $('#deleteRecordId').val(recordId);
            $("#clearModal").data("deleteRecordId", recordId)
        });

        $("#clear_record").click(function() {
            console.log($("#clearModal").data("deleteRecordId"))
            $.ajax({
                url: '/HIS-SWU/backend/billing/his_billing_clear_notif.php',
                method: 'POST',
                data: {
                    clearRecordId: $("#clearModal").data("deleteRecordId"),
                },
                dataType: 'json',
                success: function(data) {
                    alert("Successfully cleared")
                    $("#clearModal").modal("toggle")
                    $("#notif-" + $("#clearModal").data("deleteRecordId")).remove()
                    var count = parseInt($(".notif-count").text())
                    if (count - 1 == 0) $(".notif-count").remove()
                    else $(".notif-count").text(--count)
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                }
            })
        })
    });
</script>