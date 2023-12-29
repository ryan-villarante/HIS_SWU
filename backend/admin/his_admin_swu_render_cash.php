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
    $discount_type = $_POST['discounttype'];
    $discount_amount = $_POST['discountAmount'];

    if ($cash_amount >= $cash_applied) {
        $query = "INSERT INTO his_cash (cash_or_number, cash_date, cash_payer, cash_amount, cash_check, cash_credit, cash_applied, uamount, cash_cashier, cash_remark, discounttype, discountamount)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $query1 = "UPDATE his_ancillary SET paid = 1 WHERE render_name = ?";

        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param(
            'ssssssssssss',
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
            $discount_type,
            $discount_amount
        );

        $stmt->execute();

        // Bind parameter for the DELETE query
        $stmt_delete = $mysqli->prepare($query1);
        $rc_delete = $stmt_delete->bind_param('s', $cash_payer);

        // Execute the DELETE query
        $stmt_delete->execute();

        // Check for success
        if ($stmt && $stmt_delete) {
            $success = "Successfully Added";
            header("Location: /HIS-SWU/backend/admin/his_admin_swu_cash.php");
        } else {
            $err = "Please Try Again Or Try Later";
        }
    } else {
        $query = "INSERT INTO his_cash (cash_or_number, cash_date, cash_payer, cash_amount, cash_check, cash_credit, cash_applied, uamount, cash_cashier, cash_remark, discounttype, discountamount)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $query_update = "UPDATE his_ancillary SET render_payment = ? WHERE render_name = ?";

        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param(
            'ssssssssssss',
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
            $discount_type,
            $discount_amount
        );

        $stmt->execute();


        $total = $cash_applied - $cash_amount;
        // Prepare and bind parameter for the UPDATE query
        $stmt_update = $mysqli->prepare($query_update);
        $rc_update = $stmt_update->bind_param('ss', $total, $cash_payer);

        // Execute the UPDATE query
        $stmt_update->execute();

        // Check for success
        if ($stmt_update) {
            $success = "Successfully Updated";
            header("Location: /HIS-SWU/backend/admin/his_admin_swu_cash.php");
        } else {
            $err = "Update failed. Please Try Again Or Try Later";
        }
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
                    $render = $row['ad_fname'] . ' ' . $row['ad_lname'] . '  ' . '-Admin'; // Concatenate first name and last name
                } else {
                    $render = "No data found"; // Handle the case where there are no matching rows
                }
                ?>


                <input type="hidden" class="form-control" value="<?php echo $render ?>">

                <!-- ENDDDDDDD -->


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
                        $type  = $row->render_pat_type;
                        $roomPrice = $row->render_room_price;
                        $itemPrice = $row->render_item_price;
                        $professionalFee = $row->render_pro_fee;

                        // Remove currency symbol and commas, then extract the numeric part
                        $numericPart = preg_replace('/[^\d.]/', '', $itemPrice);

                        // Convert the numeric part to a float and round it (adjust as needed)
                        $floatValue = round(floatval($numericPart));

                        // Convert the float value to an integer
                        $itemPriceAsInt = intval($floatValue);

                        // Output the result
                        // echo "Debug: Item Price - {$itemPriceAsInt}";



                        // $room = $row->pat_room;
                        // $doctor = $row->pat_doc;
                        // Add more variables for other patient information

                        // Display patient information within HTML
                ?>

                        <!-- Start Content-->
                        <div class="container-fluid">
                            <div class="card-box my-3">
                                <form method="post" action="his_admin_swu_render_cash.php" id="cashForm">

                                    <div class="row">

                                        <div class="form-group col-md-12 my-1">
                                            <input type="text" readonly name="" value="Cash Receipt Details" class="form-control" style="background-color: none;color:#555d65;text-align: center; border:none;font-weight:bold;">
                                        </div>


                                        <!-- First div (Account Information) -->
                                        <div class="col-md-4 cash">
                                            <div class="form-group col-md-12 my-1">
                                                <input style="background-color: none;color:#555d65;font-weight:bold;text-align: left; height: 30px;border:none" type="text" readonly name="" value="Account Information" class="form-control" style="background-color: #6c757d;color:white;text-align: center;">

                                            </div>

                                            <div class="input-group mb-2 my-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text cash ">Payer Name</span>
                                                </div>
                                                <input type="text" readonly name="cash_payer" class="form-control cash  " id="inputlg" value="<?php echo $renderName; ?>" style="font-weight: bold;">
                                            </div>
                                            <div class="input-group mb-2 ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text cash hehe">Type of Patient</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control cash " id="inputlg" value="<?php echo $type ?>">
                                            </div>
                                            <div class="input-group mb-2 ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text cash hehe">Total Amount Due</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control cash  " id="hosBill" value="<?php echo $bill; ?>" style="font-weight: bold;">
                                            </div>
                                            <div class="form-group col-md-12 my-1">
                                                <input style="background-color: none;color:#555d65;font-weight:bold;text-align: left; height: 30px;border:none" type="text" readonly name="" value="Receipt Document Details" class="form-control" style="background-color: #6c757d;color:white;text-align: center;">
                                            </div>

                                            <div class="input-group mb-2 ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text cash hehe">Document Type</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control cash  " id="inputlg" value="Official Receipt">
                                            </div>
                                            <div class="input-group mb-2 " style="display:none">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text cash hehe">Series Type</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control cash  " id="inputlg" value="Official Receipt Series One">
                                            </div>
                                            <div class="input-group mb-2 ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text cash hehe">Cash Flow Type</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control cash  " id="inputlg" value="Collection From Patients">
                                            </div>
                                            <div class="input-group mb-2 " style="display: none;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text cash hehe">Contract Type</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control cash  " id="inputlg" value="">
                                            </div>
                                            <div class="input-group mb-2 ">
                                                <?php
                                                $length = 6;
                                                $regulated_number =  "OR1-" . substr(str_shuffle('0123456789'), 1, $length);
                                                ?>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text cash hehe">Receipt No.</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control cash  " id="inputlg" value="<?php echo $regulated_number ?>">
                                            </div>
                                            <div class="input-group mb-2 ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text cash hehe">Receipt Date</span>
                                                </div>
                                                <input type="text" readonly name="cash_date" class="form-control cash  " id="inputlg" value="<?php echo date('Y-m-d'); ?>">
                                            </div>




                                        </div>




                                        <div class="col-md-8 cash ">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group col-md-12 my-1">
                                                        <input style="background-color: none;color:#555d65;font-weight:bold;text-align: left; height: 30px;border:none" type="text" readonly name="" value="Billing Information" class="form-control" style="background-color: #6c757d;color:white;text-align: center;">
                                                    </div>
                                                    <div class="input-group mb-2 my-1">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash hehe">Pharmacy</span>
                                                        </div>
                                                        <input type="number" readonly name="" class="form-control cash  " id="pharmacy" value="<?php echo $itemPriceAsInt ?>">
                                                    </div>
                                                    <div class="input-group mb-2 " style="display: none;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash hehe">Laboratory</span>
                                                        </div>
                                                        <input type="number" readonly name="" class="form-control cash  " id="inputlg" value="0.00">
                                                    </div>

                                                    <div class="input-group mb-2 ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash hehe">Professional Fee</span>
                                                        </div>
                                                        <input type="number" readonly name="" class="form-control cash  " id="professionalFee" value="<?php echo $professionalFee ?>">
                                                    </div>
                                                    <div class="input-group mb-2 ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash hehe">Rooms & Beds</span>
                                                        </div>
                                                        <input type="number" readonly name="" class="form-control cash  " id="roomsBeds" value="<?php echo $roomPrice ?>">
                                                    </div>
                                                    <div class="input-group mb-2 ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash hehe">Total Hospital Bill</span>
                                                        </div>
                                                        <input type="number" readonly name="" class="form-control cash  " id="totalbill" value="0.00" style="font-weight: bold;">
                                                    </div>

                                                    <div class="form-group col-md-12 my-1">
                                                        <input type="text" style="background-color: none;color:#555d65;font-weight:bold;text-align: left; height: 30px;border:none" readonly name="" value="Payment Details" class="form-control">
                                                    </div>

                                                    <div class="input-group mb-2 " style="display: none;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash hehe">Cash Advances</span>
                                                        </div>
                                                        <input type="number" readonly name="" class="form-control cash  " id="inputlg" value="0.00">
                                                    </div>
                                                    <div class="input-group mb-2 ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash hehe">Cash</span>
                                                        </div>
                                                        <input type="number" name="cash" class="form-control cash  " id="cash" onchange="calculateCharge()" min="0" max="9999999999" value="0.00" style="background-color: #feffc878;font-weight:bolder;font-size:large; border:2px solid;">
                                                        <!-- <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-exclamation-circle text-danger"></i>
                                                            </span>
                                                        </div> -->
                                                    </div>
                                                    <div class="input-group mb-2 " style="display: none;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash hehe">Checks</span>
                                                        </div>
                                                        <input type="number" readonly name="cash_check" class="form-control cash  " id="inputlg" onkeyup="displayInput(this.value)" value="0.00">
                                                    </div>
                                                    <div class="input-group mb-2 " style="display: none;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash hehe">Credit Cards</span>
                                                        </div>
                                                        <input type="number" readonly name="cash_credit" class="form-control cash  " id="inputlg" value="0.00">
                                                    </div>
                                                    <div class="input-group mb-2 ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash hehe">Total Amount Paid</span>
                                                        </div>
                                                        <input type="number" readonly name="" class="form-control cash  " id="totalPaid" value="0.00" style="font-weight: bold;">
                                                    </div>


                                                    <div class="input-group mb-2 " style="display: none;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash hehe">Total Amount Due</span>
                                                        </div>
                                                        <input type="number" readonly name="cash_applied" class="form-control cash  " id="totalAmount" value="0.00" style="font-weight: bold;">
                                                    </div>



                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Content for the second column -->

                                                    <!-- 
                                                    <div class="input-group mb-2 " style="display: none;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash hehe">Miscellaneous</span>
                                                        </div>
                                                        <input type="number" readonly name="" class="form-control cash  " id="inputlg" value="0.00">
                                                    </div>
                                                    <div class="input-group mb-2 " style="display: none;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash hehe">Total Amount Due</span>
                                                        </div>
                                                        <input type="number" readonly name="cash_applied" class="form-control cash  " id="totalAmount" value="0.00" style="font-weight: bold;">
                                                    </div>

                                                    <div class="input-group mb-2 mt-3" style="display: none;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash hehe">Hospital Bill</span>
                                                        </div>
                                                        <input type="number" readonly name="" class="form-control cash  " id="hbill" value="0.00" style="font-weight: bold;">
                                                    </div>
                                                    <div class="input-group mb-2 " style="display: none;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash hehe">Professional Fee</span>
                                                        </div>
                                                        <input type="number" readonly name="" class="form-control cash  " id="inputlg" value="0.00">
                                                    </div>
                                                    <div class="input-group mb-2 " style="display: none;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash hehe">Other Receivables</span>
                                                        </div>
                                                        <input type="number" readonly name="" class="form-control cash  " id="inputlg" value="0.00">
                                                    </div>
                                                    <div class="input-group mb-2 " style="display: none;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash hehe">Other Credit Adjustment</span>
                                                        </div>
                                                        <input type="number" readonly name="" class="form-control cash  " id="inputlg" value="0.00">
                                                    </div>
                                                    <div class="input-group mb-2 " style="display: none;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash hehe">Non-Trade Transaction</span>
                                                        </div>
                                                        <input type="number" readonly name="" class="form-control cash  " id="inputlg" value="0.00">
                                                    </div>
                                                    <div class="input-group mb-2 " style="display: none;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash hehe">Unapplied Amount</span>
                                                        </div>
                                                        <input type="number" readonly name="uamount" class="form-control cash  " id="uamount" value="0.00" style="font-weight: bold;">
                                                    </div> -->
                                                    <div class="form-group col-md-12 my-1">
                                                        <input type="text" style="background-color: none;color:#555d65;font-weight:bold;text-align: left; height: 30px;border:none" readonly name="" value="Discount" class="form-control">
                                                    </div>
                                                    <div class="input-group mb-2">
                                                        <?php
                                                        $ret = "SELECT * FROM his_guarantors";
                                                        $stmt = $mysqli->prepare($ret);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();
                                                        $cnt = 1;

                                                        // Check if there are any records
                                                        if ($res->num_rows > 0) {
                                                        ?>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text cash">Tag Guarantors</span>
                                                            </div>
                                                            <select class="form-control cash" id="discountType" name="discounttype" onchange="calculateCharge()">
                                                                <option value="Choose">None</option>
                                                                <?php
                                                                while ($row = $res->fetch_object()) {
                                                                ?>
                                                                    <option value="<?php echo $row->g_type; ?>"><?php echo $row->g_name . ' ' . $row->g_lname . ' - ' . $row->g_type; ?></option>
                                                                <?php
                                                                }

                                                                ?>
                                                            <?php
                                                        } else {
                                                            // Handle the case where there are no records
                                                            ?>
                                                                <div class="input-group mb-2 ">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text cash">No guarantors found!!!!</span>
                                                                    </div>
                                                                    <input type="number" readonly class="form-control cash  " value="No guarantors found!!!!" style="font-weight: bold;">
                                                                </div>

                                                            <?php
                                                        }
                                                            ?>

                                                            </select>

                                                    </div>

                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash ">Amount Tendered</span>
                                                        </div>
                                                        <input type="number" name="AmountTendered" class="form-control cash " id="tendered" onkeyup="calculateCharge()" value="0.00">
                                                    </div>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text cash ">Change</span>
                                                        </div>
                                                        <input type="number" readonly name="discountAmount" class="form-control cash " id="charge" value="0.00">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleTextarea">Remarks / Notes</label>
                                                        <textarea class="form-control hehe" id="exampleTextarea" name="cash_remark" rows="2" placeholder="Enter Remarks" value="Paid"></textarea>
                                                    </div>


                                                </div>



                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-row  justify-content-end my-2">
                                        <button type="button" id="applyButton" class="ladda-button btn btn-secondary mr-2" data-style="expand-right" data-toggle="modal" data-target="#myNewModal">Apply</button>
                                        <button type="button" id="postButton" class="btn btn-primary mr-2" data-toggle="modal" data-target="#exampleModal">Post</button>
                                        <a href="his_admin_swu_cash.php" button type="button" class="btn btn-danger">Cancel</button></a>



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
                                                    <input required="required" type="number" name="balance" class="form-control" id="balance" value="<?php echo $bill; ?>" readonly>

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
                                                                                    <th data-toggle="true">Reference Date</th>
                                                                                    <!-- <th data-toggle="true">Qty</th> -->
                                                                                    <th data-toggle="true" data-price="<?php echo $bill; ?>">Price</th>
                                                                                    <th data-toggle="true">Balance</th>
                                                                                </tr>
                                                                            </thead>


                                                                            <tbody>

                                                                                <td><input type="checkbox" id="checkbox" class="checkboxes" name="pat_doc" data-price="<?php echo $bill; ?>"></td>
                                                                                <td><?php echo date('Y-m-d'); ?></td>
                                                                                <td id="price"> ₱<?php echo $bill; ?>.00</td>
                                                                                <td id="price1">₱ <?php echo $bill; ?>.00</td>


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

                                        <div class="form-row">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Payer Name</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control input-sm" id="inputlg" value="<?php echo $renderName ?>">
                                            </div>

                                            <div class="input-group mb-3" style="margin-top: 1px;margin-bottom:1px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Receipt Type</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control input-sm" id="inputlg" value="Official Receipt">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Series Type</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control input-sm" id="inputlg" value="OR1">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Receipt Number</span>
                                                </div>

                                                <input type="text" readonly name="cash_or_number" class="form-control input-sm" id="inputlg" value="<?php echo $regulated_number ?>">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Receipt Date</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control input-sm" id="" value="<?php echo date("d/m/Y - h:m"); ?>">
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Cash</span>
                                                </div>
                                                <input type="text" readonly name="cash_amount" class="form-control input-sm" id="cashtoPrint" value="0.00">
                                            </div>
                                            <div class="input-group mb-3" style="display: none;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Checks</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control input-sm" id="inputlg" value="0.00">
                                            </div>
                                            <div class="input-group mb-3" style="display: none;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Credit Cards</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control input-sm" id="inputlg" value="0.00">
                                            </div>
                                            <div class="input-group mb-3" style="display: none;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Discount Type</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control input-sm" id="distype">
                                            </div>

                                            <div class="input-group mb-3" style="display: none;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Discount Amount</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control input-sm" id="disamount" value="0.00">
                                            </div>

                                            <div class="input-group mb-3 my-2">
                                                <div class=" input-group-prepend">
                                                    <span class="input-group-text" id="">Receipt Amount</span>
                                                </div>
                                                <input type="text" readonly name="" class="form-control input-sm" id="receiptAmount" value="0.00">
                                            </div>
                                            <!-- <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">Amount Received</span>
                                                    </div>
                                                    <input type="text" readonly name="" class="form-control input-sm" id="inputlg" value="0.00">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">Change</span>
                                                    </div>
                                                    <input type="text" readonly name="" class="form-control input-sm" id="inputlg" value="0.00">
                                                </div> -->
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Cashier</span>
                                                </div>

                                                <input type="text" readonly name="cash_cashier" class="form-control input-sm" id="inputlg" value="<?php echo $render ?>">
                                            </div>


                                        </div>

                                    </div>

                                    <input type="hidden" name="render_id" class="form-control" value="<?php echo $render_id ?>">

                                    <div class="modal-footer">
                                        <button type="submit" name="add_cash" class="btn btn-secondary" data-style="expand-right">Save and Close</button>

                                        <a type="submit" name="add_cash" href="his_admin_swu_render_cash_print.php?render_id=<?php echo $render_id ?>" class="btn btn-primary" role="button" id="printButton">Print</a>

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

<!-- Footer Start -->
<!-- <?php include('assets/inc/footer.php'); ?> -->
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
    <!-- Include jQuery before your scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Your JavaScript code -->


    <script>
        document.getElementById("printButton").addEventListener("click", function(event) {
            var url = this.getAttribute("href");
            if (url) {
                event.preventDefault();
                window.open(url, "_blank");
            }
        });
    </script>

    <script>
        // Get references to input elements by their IDs
        const discountTypeSelects = document.getElementById("discountType");
        var distype = document.getElementById("distype");

        // Add an event listener to the source input to detect changes
        discountTypeSelects.addEventListener("input", function() {
            // Get the value of the source input
            var discount = discountTypeSelects.value;

            // Set the value of the target input to the source input's value
            distype.value = discount;
        });

        function calculateCharge() {
            // Get the selected discount type value
            const discountTypeSelect = document.getElementById("discountType");
            const selectedDiscount = discountTypeSelect.value;

            if (selectedDiscount == 'HMO') {
                const originalAmount = parseFloat("<?php echo $bill; ?>");

                // Get the amount tendered
                const amountTenderedInput = document.getElementById("hosBill");
                const amountTendered = parseFloat(amountTenderedInput.value);

                const balanceTenderedInput = document.getElementById("balance");
                const balanceTendered = parseFloat(balanceTenderedInput.value);

                var valuecheckboxInput = document.getElementById("checkbox");
                const valuecheckbox = parseFloat(valuecheckboxInput.value);


                // Get amount of cash
                const cash = document.getElementById("cash");
                let cashValue = parseFloat(cash.value); // Parse the cash value as a float

                // Calculate the charge
                const discountAmount = 0.15 * originalAmount;
                const charge = discountAmount;

                // Calculate the initial change
                let changeAmount = cashValue - (originalAmount - charge);
                let charges = changeAmount;

                // Display the calculated charge
                const chargeInput = document.getElementById("charge");

                if (cashValue <= charges || charges < 0) {
                    // Display 0 in the chargeInput if cashValue is less than or equal to charges, or if charges is negative
                    chargeInput.value = 0.00;
                } else {
                    // Display the calculated charge
                    chargeInput.value = charges.toFixed(2);
                }

                if (chargeInput.value == 0) {
                    amountTenderedInput.value = originalAmount.toFixed(2);
                }

                // Add an event listener to the "cash" input
                cash.addEventListener("input", function() {
                    // Update cashValue with the live value of the "cash" input
                    cashValue = parseFloat(cash.value);

                    // Recalculate the change and update the display
                    changeAmount = cashValue - (originalAmount - charge);
                    charges = changeAmount;

                    if (cashValue <= charges || charges < 0) {
                        // Display 0 in the chargeInput if cashValue is less than or equal to charges, or if charges is negative
                        chargeInput.value = 0.00;
                    } else {
                        // Display the calculated charge
                        chargeInput.value = charges.toFixed(2);
                    }
                });

                // Update the amount tendered based on the live cash value
                applyvalue = originalAmount - charge;
                amountTenderedInput.value = applyvalue.toFixed(2);
                balanceTenderedInput.value = applyvalue.toFixed(2);
                valuecheckboxInput.setAttribute("data-price", applyvalue.toFixed(2));

                const applyvalueCell = document.getElementById("price");
                const applyvalueCell1 = document.getElementById("price1");
                const applyvalueCell2 = document.getElementById("price2");
                const applyvalueCell3 = document.getElementById("price3");
                if (applyvalueCell) {
                    applyvalueCell.innerHTML = applyvalue.toFixed(2);
                }
                if (applyvalueCell1) {
                    applyvalueCell1.innerHTML = applyvalue.toFixed(2);
                }
                if (applyvalueCell2) {
                    applyvalueCell2.innerHTML = applyvalue.toFixed(2);
                }
                if (applyvalueCell3) {
                    applyvalueCell3.innerHTML = applyvalue.toFixed(2);
                }
            } else if (selectedDiscount == 'Philhealth') {
                const originalAmount = parseFloat("<?php echo $bill; ?>");

                // Get the amount tendered
                const amountTenderedInput = document.getElementById("hosBill");
                const amountTendered = parseFloat(amountTenderedInput.value);

                const balanceTenderedInput = document.getElementById("balance");
                const balanceTendered = parseFloat(balanceTenderedInput.value);

                var valuecheckboxInput = document.getElementById("checkbox");
                const valuecheckbox = parseFloat(valuecheckboxInput.value);

                // Get amount of cash   
                const cash = document.getElementById("cash");
                let cashValue = parseFloat(cash.value); // Parse the cash value as a float

                // Calculate the charge
                const discountAmount = 0.20 * originalAmount;
                const charge = discountAmount;

                // Calculate the initial change
                let changeAmount = cashValue - (originalAmount - charge);
                let charges = changeAmount;

                // Display the calculated charge
                const chargeInput = document.getElementById("charge");

                if (cashValue <= charges || charges < 0) {
                    // Display 0 in the chargeInput if cashValue is less than or equal to charges, or if charges is negative
                    chargeInput.value = 0.00;
                } else {
                    // Display the calculated charge
                    chargeInput.value = charges.toFixed(2);
                }

                if (chargeInput.value == 0) {
                    amountTenderedInput.value = originalAmount.toFixed(2);
                }

                // Add an event listener to the "cash" input
                cash.addEventListener("input", function() {
                    // Update cashValue with the live value of the "cash" input
                    cashValue = parseFloat(cash.value);

                    // Recalculate the change and update the display
                    changeAmount = cashValue - (originalAmount - charge);
                    charges = changeAmount;

                    if (cashValue <= charges || charges < 0) {
                        // Display 0 in the chargeInput if cashValue is less than or equal to charges, or if charges is negative
                        chargeInput.value = 0.00;
                    } else {
                        // Display the calculated charge
                        chargeInput.value = charges.toFixed(2);
                    }
                });

                // Update the amount tendered based on the live cash value
                applyvalue = originalAmount - charge;
                amountTenderedInput.value = applyvalue.toFixed(2);
                balanceTenderedInput.value = applyvalue.toFixed(2);
                valuecheckboxInput.setAttribute("data-price", applyvalue.toFixed(2));

                const applyvalueCell = document.getElementById("price");
                const applyvalueCell1 = document.getElementById("price1");
                const applyvalueCell2 = document.getElementById("price2");
                const applyvalueCell3 = document.getElementById("price3");
                if (applyvalueCell) {
                    applyvalueCell.innerHTML = applyvalue.toFixed(2);
                }
                if (applyvalueCell1) {
                    applyvalueCell1.innerHTML = applyvalue.toFixed(2);
                }
                if (applyvalueCell2) {
                    applyvalueCell2.innerHTML = applyvalue.toFixed(2);
                }
                if (applyvalueCell3) {
                    applyvalueCell3.innerHTML = applyvalue.toFixed(2);
                }
            } else if (selectedDiscount == "Choose") {
                const originalAmount = parseFloat("<?php echo $bill; ?>");

                // Get the amount tendered
                const amountTenderedInput = document.getElementById("hosBill");
                const amountTendered = parseFloat(amountTenderedInput.value);

                // Get amount of cash
                const cash = document.getElementById("cash");
                let cashValue = parseFloat(cash.value); // Parse the cash value as a float

                const balanceTenderedInput = document.getElementById("balance");
                const balanceTendered = parseFloat(balanceTenderedInput.value);

                // Calculate the charge
                const discountAmount = 0;
                const charge = discountAmount;

                // Calculate the initial change
                let changeAmount = cashValue - (originalAmount - charge);
                let charges = changeAmount;

                // Display the calculated charge
                const chargeInput = document.getElementById("charge");

                if (cashValue <= charges || charges < 0) {
                    // Display 0 in the chargeInput if cashValue is less than or equal to charges, or if charges is negative
                    chargeInput.value = 0.00;
                } else {
                    // Display the calculated charge
                    chargeInput.value = charges.toFixed(2);
                }

                if (chargeInput.value == 0) {
                    amountTenderedInput.value = originalAmount.toFixed(2);
                }

                // Add an event listener to the "cash" input
                cash.addEventListener("input", function() {
                    // Update cashValue with the live value of the "cash" input
                    cashValue = parseFloat(cash.value);

                    // Recalculate the change and update the display
                    changeAmount = cashValue - (originalAmount - charge);
                    charges = changeAmount;

                    if (cashValue <= charges || charges < 0) {
                        // Display 0 in the chargeInput if cashValue is less than or equal to charges, or if charges is negative
                        chargeInput.value = 0.00;
                    } else {
                        // Display the calculated charge
                        chargeInput.value = charges.toFixed(2);
                    }
                });

                // Update the amount tendered based on the live cash value
                applyvalue = originalAmount - charge;
                amountTenderedInput.value = applyvalue.toFixed(2);
                balanceTenderedInput.value = applyvalue.toFixed(2);
            }


        }
    </script>


    <script>
        $(document).ready(function() {
            // References to input fields
            var cashInput = $('#cash');
            var hbillInput = $('#hbill');
            var uamountInput = $('#uamount');
            var totalPaidInput = $('#totalPaid');
            var balanceInput = $('#balance');
            var appAmountInput = $('#appAmount');
            var orAmountInput = $('#orAmount');
            var udeposittInput = $('#udeposit');
            var outstandingInput = $('#outstanding');
            var hosBillInput = $('#hosBill');
            var totalbillInput = $('#totalbill');
            var itemInput = $('#item');
            var totalAmountInput = $('#totalAmount');
            var cashtoPrintInput = $('#cashtoPrint');
            var receiptAmountInput = $('#receiptAmount');
            var amountTendereds = $('#tendered');

            // Get the initial value from the database (assuming it's PHP-generated)
            var initialOutstanding = parseFloat(<?php echo $bill; ?>) || 0;
            var initialhosBill = parseFloat(<?php echo $bill; ?>) || 0;

            // Function to update all related input fields
            function updateFields(value) {
                hbillInput.val(value.toFixed(2));
                uamountInput.val(value.toFixed(2));
                totalPaidInput.val(value.toFixed(2));
                //balanceInput.val(value.toFixed(2));
                appAmountInput.val(value.toFixed(2));
                orAmountInput.val(value.toFixed(2));
                //this will display in print modal
                cashtoPrintInput.val(value.toFixed(2));
                receiptAmountInput.val(value.toFixed(2));
                amountTendereds.val(value.toFixed(2));
            }

            // Function to handle the "Cash" input field change
            function handleCashInputChange() {
                // Get the value of the "Cash" input
                var cashValue = parseFloat(cashInput.val()) || 0;

                // Update all related input fields
                updateFields(cashValue);
            }

            // Function to handle checkbox changes
            function handleCheckboxChange() {
                // Get the data-price attribute value from the clicked checkbox
                var priceString = $(this).data('price');

                // Parse the priceString as a float
                var price = parseFloat(priceString);

                // Check if price is a valid number
                if (!isNaN(price)) {
                    // Determine if the checkbox is checked
                    var isChecked = $(this).is(':checked');

                    // Update the balance based on the checkbox state
                    if (isChecked) {
                        // Subtract the price from the cash input field value
                        var currentCashValue = parseFloat(cashInput.val()) || 0;

                        if (currentCashValue <= price) {
                            currentCashValue -= price;
                            if (currentCashValue < 0) {
                                currentCashValue *= -1;
                            }
                        } else {
                            currentCashValue = 0;
                        }

                        balanceInput.val(currentCashValue.toFixed(2));

                        // Update only the desired fields
                        uamountInput.val(currentCashValue.toFixed(2));
                        udeposittInput.val(currentCashValue.toFixed(2));

                        // Update the "outstanding" field to 0.00
                        outstandingInput.val('0.00');
                        hosBillInput.val('0.00');

                        // Set values from PHP variables
                        var hospitalBillValue = <?php echo $bill; ?>;
                        hbillInput.val(hospitalBillValue.toFixed(2));

                        var totalbillValue = <?php echo $bill; ?>;
                        totalbillInput.val(totalbillValue.toFixed(2));

                        var totalAmountValue = <?php echo $bill; ?>;
                        totalAmountInput.val(totalAmountValue.toFixed(2));

                        var itemValue = <?php echo $bill; ?>;
                        itemInput.val(itemValue.toFixed(2));
                    }

                    // You can also add additional logic here to handle the unchecked state if needed.
                } else {
                    alert('Invalid price data for this item.');
                }
            }

            // Function to handle the modal shown event
            function handleModalShow() {
                // Get the value of the "cash" input field
                var cashValue = parseFloat(cashInput.val()) || 0;

                // Update the "balance" field inside the modal with the cash value
                //balanceInput.val(cashValue.toFixed(2));
            }

            // Function to handle the modal hidden event
            function handleModalHidden() {
                // Use setTimeout to ensure the modal is fully hidden before updating

                // Recalculate and update the Outstanding field based on the current values
                var balance = parseFloat(balanceInput.val()) || 0;
                var price = parseFloat(totalPaidInput.val()) || 0;

                // Call the function to update outstanding
                updateOutstanding(balance, price);

                // Set the outstanding to 0.00
                outstandingInput.val('0.00');
            }

            // Function to update Total Amount Due
            function updateTotalAmount() {
                // Get the values of Pharmacy, Rooms & Beds, and Professional Fee
                var pharmacy = parseFloat($('#pharmacy').val()) || 0;
                var roomsBeds = parseFloat($('#roomsBeds').val()) || 0;
                var professionalFee = parseFloat($('#professionalFee').val()) || 0;

                // Calculate the Total Amount Due
                var totalAmountDue = pharmacy + roomsBeds + professionalFee;

                // Update the value of hosBill with the new Total Amount Due
                $('#hosBill').val(totalAmountDue.toFixed(2));
            }

            // Add an event listener to the "professionalFee" input
            $('#professionalFee').on('input', function() {
                // Update Total Amount Due based on the sum of Pharmacy, Rooms & Beds, and Professional Fee
                updateTotalAmount();
            });

            // Add an event listener to the "saveBtn" button
            $('#saveBtn').click(function() {
                // Get the hosBill value
                var hosBillValue = parseFloat($('#hosBill').val());

                // Perform actions with hosBillValue, e.g., pass it to the server
                console.log('HosBill Value:', hosBillValue);

                // For demonstration, you can replace the above log with the actual logic to save the data
                // to the server or perform other actions.
            });


            // Function to handle the modal hidden event
            function handleModalHidden() {
                // Use setTimeout to ensure the modal is fully hidden before updating

                // Recalculate and update the Outstanding field based on the current values
                var balance = parseFloat(balanceInput.val()) || 0;
                var price = parseFloat(totalPaidInput.val()) || 0;

                // Call the function to update outstanding
                updateOutstanding(balance, price);

                // Set the outstanding to 0.00
                outstandingInput.val('0.00');


            }

            function checkCashAndShowModal() {
                var cashValue = parseFloat($('#cash').val());
                var totalAmountDue = parseFloat($('#hosBill').val());

                // Check if the cash value is less than the total amount due
                if (isNaN(cashValue) || cashValue < totalAmountDue) {
                    // Display an alert
                    alert("Cash amount is less than the total amount due. Please input a sufficient amount.");

                    // Return false to prevent the default action
                    return false;
                }

                // Display the modal or perform other actions
                $('#exampleModal').modal('show');
            }

            // Attach the function to the click event of the button
            $('#postButton').click(function() {
                return checkCashAndShowModal();
            });

            // Add an event listener to the "Apply" button
            $('#applyButton').click(function() {
                // Get the value of the cash input field
                var cashValue = parseFloat($('#cash').val());

                // Check if the cash value is empty or 0
                if (isNaN(cashValue) || cashValue <= 0) {
                    // Display an alert
                    alert("Please input cash first.");
                    // Prevent the default behavior (opening the modal)
                    return false;
                } else {
                    // Display the modal
                    return checkCashAndShowModal();
                }
            });

            // Add event listeners
            cashInput.on("input", handleCashInputChange);
            $('.checkboxes').change(handleCheckboxChange);
            $('#myNewModal').on('show.bs.modal', handleModalShow);
            $('#myNewModal').on('hidden.bs.modal', handleModalHidden);

        });
    </script>






</body>

</html>