<?php
session_start();

// Check if a netAmount is calculated and passed from JavaScript
if (isset($_POST['netAmount'])) {
    $netAmount = floatval($_POST['netAmount']); // Convert to float if needed
    $_SESSION['netAmount'] = $netAmount;
} else {
    // If netAmount is not available from JavaScript, you can set a default value or perform another action.
    $_SESSION['netAmount'] = 0.00; // Default value
}



include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['ad_id'];


?>


<?php
if (isset($_POST['add_cash'])) {
    $cash_or_number = $_POST['cash_or_number'];
    $cash_date = $_POST['cash_date'];
    $cash_payer = $_POST['cash_payer'];
    $cash_amount = $_POST['cash_amount'];
    $cash_check = $_POST['cash_check'];
    $cash_credit = $_POST['cash_credit'];
    $cash_applied = $_POST['cash_applied'];
    $uamount = $_POST['uamount'];
    $cash_cashier = $_POST['cash_cashier'];
    $cash_remark = $_POST['cash_remark'];



    $query = "INSERT INTO his_cash (cash_or_number,cash_date,cash_payer, cash_amount,cash_check,cash_credit,cash_applied,uamount,cash_cashier,cash_remark)
    VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param(
        'ssssssssss',
        $cash_or_number,
        $cash_date,
        $cash_payer,
        $cash_amount,
        $cash_check,
        $cash_credit,
        $cash_applied,
        $uamount,
        $cash_cashier,
        $cash_remark,


    );

    $stmt->execute();

    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Successfully Added";
        header("Location: " . 'http://localhost/HIS-SWU/backend/admin/his_admin_swu_cash.php');
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

                <form method="post" action="his_admin_swu_render_cash.php" id="cashForm">

                    <?php
                    // Assuming you have a valid database connection in $mysqli

                    // Get the user number of the currently logged-in user (you need to implement this logic)
                    $loggedInUserID = $_SESSION['ad_id'];

                    // You should execute the prepared statement with a WHERE clause to filter by the unique identifier
                    $ret = "SELECT ad_fname,ad_lname FROM his_admin WHERE ad_id = ?";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->bind_param("s", $loggedInUserID); // Bind the unique identifier parameter
                    $stmt->execute();

                    // You should fetch the result into a variable
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        // Assuming you want to fetch the first row
                        $row = $result->fetch_assoc();
                        $cashier = $row['ad_fname'] . ' ' . $row['ad_lname'] . '  ' . '-Admin'; // Concatenate first name and last name
                    } else {
                        $cashier = "No data found"; // Handle the case where there are no matching rows
                    }
                    ?>

                    <input type="hidden" class="form-control" value="<?php echo $cashier ?>">


                    <?php


                    if (isset($_GET['render_id'])) {
                        $render_id = $_GET['render_id'];

                        $ret = "SELECT * FROM his_ancillary WHERE render_id=?";
                        $stmt = $mysqli->prepare($ret);
                        $stmt->bind_param('i', $render_id);
                        $stmt->execute();
                        $res = $stmt->get_result();

                        if ($row = $res->fetch_object()) {
                            // Retrieve patient information
                            $renderName = $row->render_name;
                            $age =  $row->render_age;
                            $payment_data = $row->render_payment;
                            $bill = (float) preg_replace("/[^0-9.]/", "", $payment_data);
                            $rendered_by = "System_admin";

                            // $room = $row->pat_room;
                            // $doctor = $row->pat_doc;
                            // Add more variables for other patient information

                            // Display patient information within HTML
                    ?>

                            <!-- Start Content-->
                            <div class="container-fluid">
                                <div class="card-body">
                                    <div class="card-box">

                                        <div class="row">

                                            <div class="form-group col-md-12 my-1">
                                                <input type="text" readonly name="" value="Examination Result Entry Form" class="form-control" style="background-color: #6c757d;color:white;text-align: center;">
                                            </div>



                                            <div class="col-12 ">
                                                <div class="card">
                                                    <div class="card-body" style="padding:1rem;">


                                                        <div class="form-row" style="margin-left: -2px;margin: right -2px;">
                                                            <div class="form-group margin col-md-3">
                                                                <span class="small-text">Patient ID</span>
                                                                <input type="text" readonly name="" class="form-control small-input" id="inputlg" placeholder="" value="">
                                                            </div>
                                                            <div class="form-group margin col-md-3">
                                                                <span class="small-text">Room No.</span>
                                                                <input type="text" readonly name="" class="form-control small-input" id="inputlg" value="">

                                                            </div>
                                                            <div class="form-group margin col-md-3">
                                                                <span class="small-text">Age</span>
                                                                <input type="text" name="render_req_date" class="form-control small-input" id="inputPassword4" placeholder="" value="<?php echo $age; ?>" readonly>
                                                            </div>
                                                            <div class="form-group margin col-md-3 ">
                                                                <span class="small-text">Request Date</span>
                                                                <input type="date" name="render_age" class="form-control small-input" id="inputPassword4" placeholder="" value="" readonly>
                                                            </div>

                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group margin col-md-3">
                                                                <span class="small-text">Patient Name</span>
                                                                <input type="text" readonly name="" class="form-control small-input" id="inputlg" value="<?php echo $renderName; ?>">

                                                            </div>
                                                            <div class="form-group margin col-md-3">
                                                                <span class="small-text">Birth Date</span>
                                                                <input type="date" name="" class="form-control small-input" id="inputPassword4" placeholder="" value=">" readonly>
                                                            </div>
                                                            <div class="form-group margin col-md-3">
                                                                <span class="small-text">Requesting Physician</span>
                                                                <input type="text" readonly class="form-control small-input" id="inputlg" value="">
                                                            </div>
                                                            <div class="form-group margin col-md-3">
                                                                <span class="small-text">Release Date/Time</span>
                                                                <input type="text" readonly class="form-control small-input" id="inputlg" value="">
                                                            </div>
                                                        </div>


                                                    </div>



                                                    <div class="row">
                                                        <div class="form-group col-md-12 my-1">
                                                            <input type="text" readonly name="" value="Complete Blood Count Differential" class="form-control" style="background-color: #6c757d;color:white;text-align: center;">
                                                        </div>

                                                        <div class="input-group mb-0 my-0">

                                                            <input type="text" name="cash_payer" class="form-control ref  " id="inputlg" value="" style="font-weight: bold;">
                                                            <input type="text" readonly name="cash_payer" class="form-control refs" id="inputlg" style="font-weight: bold;" value="              Reference Range:">
                                                        </div>

                                                        <div class="input-group mb-2 my-2">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text exam"><strong>WBC:</strong></span>
                                                            </div>
                                                            <input type="text" name="cash_payer" class="form-control exam   " id="inputlg" value="" style="font-weight: bold;">
                                                            <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                5.000 - 17.0000^3/mm^3">
                                                        </div>
                                                        <div class="input-group mb-2 ">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text exam"><strong>SEG:</strong></span>
                                                            </div>
                                                            <input type="text" name="" class="form-control exam  " id="inputlg" value="">
                                                            <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                37.0000 - 80.0000 %">
                                                        </div>
                                                        <div class="input-group mb-2 ">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text exam"><strong>LYM:</strong></span>
                                                            </div>
                                                            <input type="text" name="" class="form-control exam   " id="hosBill" value="">
                                                            <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                10.000 - 50.0000 %">
                                                        </div>
                                                        <div class="input-group mb-2 ">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text exam"><strong>MON:</strong></span>
                                                            </div>
                                                            <input type="text" name="" class="form-control exam " id="inputlg" value="">
                                                            <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                0.0000 - 12.0000 %">
                                                        </div>
                                                        <div class="input-group mb-2 ">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text exam"><strong>EOS:</strong></span>
                                                            </div>
                                                            <input type="text" name="" class="form-control exam  " id="inputlg" value="">
                                                            <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                0.0000 - 7.0000 %">
                                                        </div>
                                                        <div class="input-group mb-2 ">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text exam"><strong>BAS:</strong></span>
                                                            </div>
                                                            <input type="text" name="" class="form-control exam   " id="hosBill" value="">
                                                            <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                0.0000 - 2.5000 %">
                                                        </div>
                                                        <div class="input-group mb-2 ">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text exam"><strong>RBC:</strong></span>
                                                            </div>
                                                            <input type="text" name="" class="form-control exam " id="inputlg" value="">
                                                            <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                4.0000 - 5.4000 10/mm^3">
                                                        </div>
                                                        <div class="input-group mb-2 ">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text exam"><strong>HGB:</strong></span>
                                                            </div>
                                                            <input type="text" name="" class="form-control exam  " id="inputlg" value="">
                                                            <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                12.0000 - 15.0000 g/dl">
                                                        </div>
                                                        <div class="input-group mb-2 ">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text exam"><strong>HCT:</strong></span>
                                                            </div>
                                                            <input type="text" name="" class="form-control exam   " id="hosBill" value="">
                                                            <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                41.9000 - 51.1000 %">
                                                        </div>
                                                        <div class="input-group mb-2 ">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text exam"><strong>MCV:</strong></span>
                                                            </div>
                                                            <input type="text" name="" class="form-control exam " id="inputlg" value="">
                                                            <input type="text" readonly name="cash_payer" class="form-control value" id="inputlg" value="                150.0000 - 450.0000 10^3/mm^3">
                                                        </div>








                                                        <div class="col-md-8">

                                                            <div class="col-md-6">
                                                                <!-- Content for the second column -->




                                                            </div>
                                                        </div>
                                                    </div>




                                                    <div class="form-row  justify-content-end">
                                                        <!-- <button type="button" id="applyButton" class="ladda-button btn btn-secondary mr-2" data-style="expand-right" data-toggle="modal" data-target="#myNewModal">Apply</button> -->
                                                        <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#exampleModal">Save</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>



                                                    </div>
                                                </div> <!-- end col -->


                                                <!-- Modal -->
                                                <div class="modal fade" id="myNewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">

                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Modal content goes here -->


                                                                <div class="d-grid gap-12 text-center">
                                                                    <button class="btn btn-secondary btn-sm btn-block" type="button">Transaction Item List</button>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Payer Name</label>
                                                                        <input required="required" type="text" name="payer_name" class="form-control" id="inputPassword4s" placeholder="Payer Name" value="<?php echo $renderName; ?>">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">O.R. Date</label>
                                                                        <input required="required" type="Date" name="pat_age" class="form-control" id="inputPassword4" placeholder="Outstanding" value="<?php echo date('Y-m-d'); ?>" readonly>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">O.R. Amount</label>
                                                                        <input required="required" type="number" name="or_amount" class="form-control" id="orAmount" value="" readonly>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Amount for Application</label>
                                                                        <input required="required" type="number" name="app_amount" class="form-control" id="appAmount" value="" readonly>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Applied Amount</label>
                                                                        <input required="required" type="number" name="pat_age" class="form-control" id="" readonly>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4" class="col-form-label">Balance</label>
                                                                        <input required="required" type="number" name="balance" class="form-control" id="balance" value="0.00" readonly>

                                                                    </div>

                                                                    <div class="col-lg-10 col-xl-12">
                                                                        <div class="card-box">
                                                                            <ul class="nav nav-pills navtab-bg nav-justified">
                                                                                <li class="nav-item">
                                                                                    <a href="#register" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                                                        Items and Services
                                                                                    </a>
                                                                                </li>

                                                                                <!-- <li class="nav-item">
                                                                    <a href="#doctor" data-toggle="tab" aria-expanded="true" class="nav-link">
                                                                        Rooms and Beds
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="#rooms" data-toggle="tab" aria-expanded="true" class="nav-link">
                                                                        Professional Fees
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="#rooms" data-toggle="tab" aria-expanded="true" class="nav-link">
                                                                        Miscellaneous
                                                                    </a>
                                                                </li> -->
                                                                            </ul>

                                                                            <div class="tab-content">
                                                                                <div class="tab-pane show active" id="register">
                                                                                    <ul class="list-unstyled ">



                                                                                        <div class="table-responsive">
                                                                                            <table id="itemServices" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                                                                                <thead class="table-danger">
                                                                                                    <tr>
                                                                                                        <th>Select </th>
                                                                                                        <th data-toggle="true">Transaction No.</th>
                                                                                                        <th data-toggle="true">Reference Date</th>
                                                                                                        <!-- <th data-toggle="true">Item Description</th> -->
                                                                                                        <th data-toggle="true">Qty</th>
                                                                                                        <th data-toggle="true" data-price="<?php echo $bill; ?>">Price</th>
                                                                                                        <th data-toggle="true">Charge Amount</th>
                                                                                                        <th data-toggle="true">Credits</th>
                                                                                                        <th data-toggle="true">Balance</th>
                                                                                                        <th data-toggle="true">Net of RF Discount</th>
                                                                                                        <th data-toggle="true">Amount Applys</th>
                                                                                                    </tr>
                                                                                                </thead>


                                                                                                <tbody>

                                                                                                    <td><input type="checkbox" id="checkbox" class="checkboxes" name="pat_doc" data-price="<?php echo $bill; ?>"></td>
                                                                                                    <td></td>
                                                                                                    <td><?php echo date('Y-m-d'); ?></td>
                                                                                                    <!-- <td></td> -->
                                                                                                    <td>1</td>
                                                                                                    <td><?php echo $bill; ?></td>
                                                                                                    <td><?php echo $bill ?>.00</td>
                                                                                                    <td>0.00</td>
                                                                                                    <td><?php echo $bill ?>.00</td>
                                                                                                    <td>0.00</td>
                                                                                                    <td><?php echo $bill ?>.00</td>


                                                                                                </tbody>


                                                                                            </table>


                                                                                        </div>


                                                                                        <!-- This is your modal content. -->
                                                                                </div>
                                                                                <div class="modal-footer my-2">
                                                                                    <!-- <button type="submit" name="" class="ladda-button btn btn-success mr-2" data-style="expand-right">Apply</button> -->
                                                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
                                                                                    <!-- You can add additional buttons or actions here if needed -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>







                                                                </div>



                                                                <!-- end row-->
                                                            </div>


                                                        </div>
                                                    </div>

                                                </div>

                                            </div>


                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Print Cash Receipt </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">



                                                            <div class="modal-footer">
                                                                <button type="submit" name="add_cash" class="btn btn-secondary" data-style="expand-right">Save and Close</button>
                                                                <a href="his_admin_swu_render_cash_print.php?render_id=<?php echo $row->render_id; ?>" class="btn btn-primary" role="button" id="printButton">Print</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                        </div> <!-- container -->

                                    </div> <!-- content -->
                            <?php
                        } else {
                            echo "Patient not found.";
                        }
                    } else {
                        echo "Patient information not provided.";
                    }
                            ?>
                </form>
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
        <!-- Include jQuery before your scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Your JavaScript code -->


</body>

</html>