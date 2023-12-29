<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');

// Check if a netAmount is calculated and passed from JavaScript
if (isset($_POST['netAmount'])) {
    $netAmount = floatval($_POST['netAmount']); // Convert to float if needed
    $_SESSION['netAmount'] = $netAmount;
} else {
    // If netAmount is not available from JavaScript, you can set a default value or perform another action.
    $_SESSION['netAmount'] = 0.00; // Default value
}

check_login();
$aid = $_SESSION['user_id'];
?>


<?php
if (isset($_POST['add_render'])) {
    // $render_code = $_POST['render_code'];
    $render_name = $_POST['render_name'];
    $render_age = $_POST['render_age'];
    $render_room_number = $_POST['render_room_number'];
    // $render_req_number = $_POST['render_req_number'];
    $render_req_date = $_POST['render_req_date'];
    $render_req_doc = $_POST['render_req_doc'];
    $render_doc_number = $_POST['render_doc_number'];
    // $render_perform = $_POST['render_perform'];
    // $render_date_time = $_POST['render_date_time'];
    // $render_amount = $_POST['render_amount'];
    // $render_reg_number = $_POST['render_reg_number'];
    // $render_or_number = $_POST['render_or_number'];
    $render_payment = $_POST['render_payment'];
    $render_payer_name = $_POST['render_payer_name'];
    $render_by = $_POST['render_by'];



    //sql to insert captured values
    // $query = "INSERT INTO his_ancillary (render_code,render_name,render_room_number,render_req_number,render_req_date,
    // render_req_doc,render_doc_number,render_perform,render_date_time,
    // render_amount,render_reg_number,render_or_number,render_payment,render_payer_name,render_by)
    //  VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,)";
    // $stmt = $mysqli->prepare($query);
    // $rc = $stmt->bind_param(
    //     'sssssssssssssss',
    $query = "INSERT INTO his_ancillary (render_name,render_age,render_room_number, render_req_date,render_req_doc,render_doc_number,render_payment,render_payer_name,render_by)
    VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param(
        'sssssssss',
        $render_name,
        $render_age,
        $render_room_number,
        $render_req_date,
        $render_req_doc,
        $render_doc_number,
        $render_payment,
        $render_payer_name,
        $render_by,


    );

    $stmt->execute();

    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Successfully Added";
        header("Location: " . 'http://localhost/HIS-SWU/backend/nurse/his_doc_ancillary.php');
    } else {
        $err = "Please Try Again Or Try Later";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<!-- Add these lines in the head section of your HTML file -->
<link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
<script src="path/to/jquery/jquery.min.js"></script>
<script src="path/to/bootstrap/js/bootstrap.min.js"></script>


<?php include('assets/inc/head.php'); ?>


<body>

    <?php include('his_admin_search.php'); ?>

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

        <?php
        // his_admin_render.php

        if (isset($_GET['pat_id'])) {
            $pat_id = $_GET['pat_id'];
            $pat_number = $_GET['pat_number'];

            $ret = "SELECT * FROM his_patients WHERE pat_id=?";
            $stmt = $mysqli->prepare($ret);
            $stmt->bind_param('i', $pat_id);
            $stmt->execute();
            $res = $stmt->get_result();

            if ($row = $res->fetch_object()) {
                // Retrieve patient information
                $patientName = $row->pat_fname . " " . $row->pat_lname;
                $age =  $row->pat_age;
                $room = $row->pat_room;
                $doctor = $row->pat_doc;
                $id = $row->pat_id;
                // Add more variables for other patient information

                // Display patient information within HTML
        ?>

                <div class="content-page">
                    <div class="content">

                        <!-- Start Content-->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="col-md-6">
                                    </div><!-- end col -->
                                    <div class="col-md-9 ">
                                        <div class="mt-3 ">
                                            <p class="m-b-10 text-center" style="font-size: large;text-align:center;margin-botttom: 0rem;"><strong>Patient Name : <?php echo $patientName; ?> </strong>&nbsp; Age:<?php echo $age; ?> Years Old<strong></strong><span class="float-left"></span></p>
                                        </div>
                                    </div>


                                    <input type="hidden" class="form-control" value="<?php echo $id; ?>">



                            <?php
                        } else {
                            echo "Patient not found.";
                        }
                    } else {
                        echo "Patient information not provided.";
                    }
                            ?>



                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-12 ">
                                <div class="card">
                                    <div class="card-body" style="padding:1rem;">

                                        <form method="post" action="his_admin_render.php" id="myForm">
                                            <div class="form-row" style="margin-left: -2px;margin: right -2px;">
                                                <div class="form-group margin col-md-3">
                                                    <span class="small-text">Transaction Number</span>
                                                    <input type="text" readonly name="" class="form-control small-input" id="inputlg" placeholder="Transaction Number" value="0">
                                                </div>
                                                <div class="form-group margin col-md-3" style="display: none;">
                                                    <span class="small-text">Room</span>
                                                    <input type="text" readonly name="render_room_number" class="form-control small-input" id="inputlg" placeholder="Transaction Number" value="<?php echo $room; ?>">
                                                </div>


                                                <div class="form-group margin col-md-3">
                                                    <span class="small-text">Document Type</span>
                                                    <input type="text" readonly name="" class="form-control small-input" id="inputlg" value="Cash Slip">

                                                </div>
                                                <div class="form-group margin col-md-3">
                                                    <span class="small-text">Requisition Date</span>
                                                    <input type="date" name="render_req_date" class="form-control small-input" id="inputPassword4" placeholder="" value="<?php echo date('Y-m-d'); ?>" readonly>
                                                </div>
                                                <div class="form-group margin col-md-3" style="display: none;">
                                                    <span class="small-text">Doctor</span>
                                                    <input type="text" readonly name="render_req_doc" class="form-control small-input" id="inputlg" placeholder="Transaction Number" value="<?php echo $doctor; ?>">
                                                </div>
                                                <div class="form-group margin col-md-3 " style="display: none;">
                                                    <span class="small-text">Age</span>
                                                    <input type="text" name="render_age" class="form-control small-input" id="inputPassword4" placeholder="" value="<?php echo $age; ?>" readonly>
                                                </div>
                                                <div class="form-group margin col-md-3">
                                                    <span class="small-text"><strong>Gross Amount</strong></span>
                                                    <input type="text" readonly name="" class="form-control small-input" id="grossAmount" placeholder="0.00">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group margin col-md-3">
                                                    <span class="small-text">Price Group</span>
                                                    <input type="text" readonly name="" class="form-control small-input" id="inputlg" value="Standard">

                                                </div>
                                                <div class="form-group margin col-md-3">
                                                    <span class="small-text">Document Date</span>
                                                    <input type="date" name="" class="form-control small-input" id="inputPassword4" placeholder="" value="<?php echo date('Y-m-d'); ?>" readonly>
                                                </div>
                                                <div class="form-group margin col-md-3">
                                                    <span class="small-text">Requisition Number</span>
                                                    <input type="text" readonly class="form-control small-input" id="inputlg" value="0">
                                                </div>
                                                <div class="form-group margin col-md-3">
                                                    <span class="small-text">Discount</span>
                                                    <input type="text" readonly class="form-control small-input" id="inputlg" value="0.00">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group margin col-md-3">
                                                    <span class="small-text">Price Scheme</span>
                                                    <input type="text" readonly class="form-control small-input" id="inputlg" value="OPD-Outpatient">
                                                </div>
                                                <div class="form-group margin col-md-3">
                                                    <span class="small-text">Document Number</span>
                                                    <input type="text" readonly class="form-control small-input" id="inputlg" value="0">
                                                </div>
                                                <div class="form-group margin col-md-3">
                                                    <span class="small-text"><strong>Total Items</strong></span>
                                                    <input type="text" readonly class="form-control small-input" id="total" value="0">
                                                </div>
                                                <div class="form-group margin col-md-3">
                                                    <span class="small-text">Output Tax</span>
                                                    <input type="text" readonly class="form-control small-input" id="inputlg" value="0.00">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group margin col-md-3">
                                                    <span class="small-text">Hospitalization Plan</span>
                                                    <input type="text" readonly class="form-control small-input" id="inputlg" value="Self_Pay">
                                                </div>
                                                <div class="form-group margin col-md-3">
                                                    <span class="small-text">Payer Name</span>
                                                    <input type="text" readonly name="render_payer_name" name="" class="form-control small-input" id="inputlg" value="<?php echo $patientName; ?>">
                                                </div>
                                                <div class="form-group margin col-md-3">
                                                    <span class="small-text"><strong>Total Qty</strong></span>
                                                    <input type="text" readonly class="form-control small-input" id="qty" value="0.00">
                                                </div>
                                                <div class="form-group margin col-md-3">
                                                    <span class="small-text"><strong>Net Amount</strong></span>
                                                    <input type="text" readonly name="" class="form-control small-input" id="netAmount" placeholder="0.00">
                                                </div>
                                            </div>
                                    </div>


                                    <!-- end row -->

                                    <div class="table-responsive">
                                        <table id="transactionsLineItems" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th colspan="8" class="text-center" style="background-color: #4343ad;color: white;">Transaction Line Items</th>
                                                </tr>
                                            </thead>
                                            <thead style="background-color:#bdbdff">
                                                <tr>
                                                    <th>#</th>
                                                    <th data-hide="phone">Item Code</th>
                                                    <th data-hide="phone">Item Description</th>
                                                    <th data-hide="phone">Item Category </th>
                                                    <th data-hide="phone">QTY</th>
                                                    <th data-hide="phone">Price</th>
                                                    <th data-hide="phone">Amount</th>
                                                    <th data-hide="phone">Output Tax</th>
                                                </tr>
                                            </thead>



                                            <tbody>
                                            </tbody>


                                            <tfoot>
                                                <tr class="active">
                                                    <td colspan="10">
                                                        <div class="text-right">
                                                            <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>


                                        <button type="button" class="btn  btn-secondary my-3" style="background-color: #1b1b75;" data-toggle="modal" data-target="#myModal">Select From Item Master File</button>

                                        <div class="modal fade bd-example-modal-xl" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="form-group col-md-12 my-1">
                                                            <input type="text" readonly name="" value="ACCOUNTING Item Selection " class="form-control" style="background-color: #4343ad;color:white;text-align: center;">
                                                        </div>

                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">

                                                            <div class="col-lg-10 col-xl-12">
                                                                <div class="card-box">
                                                                    <ul class="nav nav-pills navtab-bg nav-justified">
                                                                        <li class="nav-item">
                                                                            <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                                                Drugs and Medicines
                                                                            </a>
                                                                        </li>

                                                                        <li class="nav-item">
                                                                            <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                                                Examination
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="#procedure" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                                                Procedure
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                    <script>
                                                                        $(document).ready(function() {
                                                                            $(".btn-secondary").click(function() {
                                                                                $(this).toggleClass("active");
                                                                            });
                                                                        });
                                                                    </script>



                                                                    <div class="tab-content">
                                                                        <div class="tab-pane show active" id="aboutme">


                                                                            <div class="row">
                                                                                <div class="col-12 text-sm-center form-inline searchContainer">
                                                                                    <div class="form-group">
                                                                                        <input type="text" placeholder="Search" data-tablename="his_equipments" data-columntosearch="item_desc" data-resulttable="aboutme_search" class="form-control form-control-sm demo-foo-search" autocomplete="on">
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="table-responsive">
                                                                                <div class="table-content">

                                                                                    <table id="aboutme_search" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                                                                        <thead style="background-color:#d7d7ff">
                                                                                            <tr>

                                                                                                <th data-toggle="true">Select</th>
                                                                                                <th data-toggle="true">Item ID</th>
                                                                                                <th data-hide="phone">Item Category</th>
                                                                                                <th data-toggle="true">Description</th>
                                                                                                <th data-hide="phone">Generic Name</th>
                                                                                                <th data-hide="phone">CPT Code</th>
                                                                                                <th data-hide="phone">Price</th>
                                                                                                <th data-hide="phone">Special Price</th>
                                                                                                <th data-hide="phone">Unit</th>


                                                                                            </tr>
                                                                                        </thead>
                                                                                        <?php
                                                                                        /* Get details of all patients */
                                                                                        $ret = "SELECT * FROM his_equipments";
                                                                                        $stmt = $mysqli->prepare($ret);
                                                                                        $stmt->execute(); //ok
                                                                                        $res = $stmt->get_result();
                                                                                        $cnt = 1;
                                                                                        ?>

                                                                                        <tbody>
                                                                                            <?php while ($row = $res->fetch_object()) { ?>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <a class="badge badge-success select-item-btn" style="background-color: #8383e3; color:white ;" data-id="<?php echo $row->item_code; ?>" data-category="<?php echo $row->item_category; ?>" data-desc="<?php echo $row->item_desc; ?>" data-price="<?php echo $row->item_price; ?>">
                                                                                                            <i class="far fa-eye"></i> Select
                                                                                                        </a>
                                                                                                    </td>
                                                                                                    <td><?php echo $row->item_code; ?></td>
                                                                                                    <td><?php echo $row->item_category; ?></td>
                                                                                                    <td><?php echo $row->item_desc; ?></td>
                                                                                                    <td></td>
                                                                                                    <td></td>
                                                                                                    <td>₱<?php echo $row->item_price; ?>.00</td>
                                                                                                    <td></td>
                                                                                                </tr>
                                                                                            <?php $cnt = $cnt + 1;
                                                                                            } ?>
                                                                                        </tbody>









                                                                                        <tfoot>
                                                                                            <tr class="active">
                                                                                                <td colspan="10">
                                                                                                    <div class="text-right">
                                                                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tfoot>
                                                                                    </table>
                                                                                    <!-- </div> -->
                                                                                </div> <!-- end .table-responsive-->


                                                                            </div>
                                                                        </div>





                                                                        <div class="tab-pane" id="settings">


                                                                            <div class="row">
                                                                                <div class="col-12 text-sm-center form-inline searchContainer">
                                                                                    <div class="form-group">
                                                                                        <input type="text" placeholder="Search" data-tablename="his_examinations" data-columntosearch="exam_desc" data-resulttable="examTable" class="form-control form-control-sm demo-foo-search" autocomplete="on">
                                                                                    </div>
                                                                                </div>
                                                                            </div>



                                                                            <div class="table-responsive">
                                                                                <table id="examTable" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                                                                    <thead style="background-color:#d7d7ff">
                                                                                        <tr>

                                                                                            <th data-toggle="true">Select</th>
                                                                                            <th data-toggle="true">Item Code</th>
                                                                                            <th data-hide="phone">Item Category</th>
                                                                                            <th data-toggle="true">Description</th>
                                                                                            <th data-hide="phone">Generic Name</th>
                                                                                            <th data-hide="phone">CPT Code</th>
                                                                                            <th data-hide="phone">Price</th>
                                                                                            <th data-hide="phone">Special Price</th>
                                                                                            <th data-hide="phone">Unit</th>


                                                                                        </tr>
                                                                                    </thead>
                                                                                    <?php
                                                                                    /*
                                                *get details of allpatients
                                                *
                                                */
                                                                                    $ret = "SELECT * FROM  his_examinations  ";
                                                                                    $stmt = $mysqli->prepare($ret);
                                                                                    $stmt->execute(); //ok
                                                                                    $res = $stmt->get_result();
                                                                                    $cnt = 1;

                                                                                    ?>

                                                                                    <tbody>
                                                                                        <?php while ($row = $res->fetch_object()) { ?>
                                                                                            <tr>
                                                                                                <td> <a class="badge badge-success select-item-btn" style="background-color: #8383e3; color:white ;" data-id="<?php echo $row->exam_code; ?>" data-desc="<?php echo $row->exam_desc; ?>" data-category="<?php echo $row->exam_category; ?>" data-price="<?php echo $row->exam_price; ?>">
                                                                                                        <i class="far fa-eye "></i> Select
                                                                                                    </a>
                                                                                                <td><?php echo $row->exam_code; ?></td>
                                                                                                <td><?php echo $row->exam_category; ?></td>
                                                                                                <td><?php echo $row->exam_desc; ?></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td>₱<?php echo $row->exam_price; ?>.00</td>
                                                                                                <td></td>


                                                                                            </tr>
                                                                                        <?php $cnt = $cnt + 1;
                                                                                        } ?>
                                                                                    </tbody>

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
                                                                            </div>
                                                                        </div>



                                                                        <div class="tab-pane" id="procedure">

                                                                            <div class="row">
                                                                                <div class="col-12 text-sm-center form-inline searchContainer">
                                                                                    <div class="form-group">
                                                                                        <input type="text" placeholder="Search" data-tablename="his_procedures" data-columntosearch="pro_desc" data-resulttable="proTable" class="form-control form-control-sm demo-foo-search" autocomplete="on">
                                                                                    </div>
                                                                                </div>
                                                                            </div>






                                                                            <div class="table-responsive">
                                                                                <table id="proTable" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                                                                    <thead style="background-color:#d7d7ff">
                                                                                        <tr>

                                                                                            <th data-toggle="true">Select</th>
                                                                                            <th data-toggle="true">Item Code</th>
                                                                                            <th data-hide="phone">Item Category</th>
                                                                                            <th data-toggle="true">Description</th>
                                                                                            <th data-hide="phone">Generic Name</th>
                                                                                            <th data-hide="phone">CPT Code</th>
                                                                                            <th data-hide="phone">Price</th>
                                                                                            <th data-hide="phone">Special Price</th>
                                                                                            <th data-hide="phone">Unit</th>


                                                                                        </tr>
                                                                                    </thead>
                                                                                    <?php
                                                                                    /*
        *get details of allpatients
        *
        */
                                                                                    $ret = "SELECT * FROM  his_procedures ";
                                                                                    $stmt = $mysqli->prepare($ret);
                                                                                    $stmt->execute(); //ok
                                                                                    $res = $stmt->get_result();
                                                                                    $cnt = 1;

                                                                                    ?>

                                                                                    <tbody>
                                                                                        <?php while ($row = $res->fetch_object()) { ?>
                                                                                            <tr>
                                                                                                <td> <a class="badge badge-success select-item-btn" style="background-color: #8383e3; color:white ;" data-id="<?php echo $row->pro_code; ?>" data-desc="<?php echo $row->pro_desc; ?>" data-category="<?php echo $row->pro_category; ?>" data-price="<?php echo $row->pro_price; ?>">
                                                                                                        <i class="far fa-eye "></i> Select
                                                                                                    </a></td>
                                                                                                <td><?php echo $row->pro_code; ?></td>
                                                                                                <td><?php echo $row->pro_category; ?></td>
                                                                                                <td><?php echo $row->pro_desc; ?></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td>₱<?php echo $row->pro_price; ?>.00</td>
                                                                                                <td></td>



                                                                                            </tr>
                                                                                        <?php $cnt = $cnt + 1;
                                                                                        } ?>
                                                                                    </tbody>

                                                                                    <tfoot>
                                                                                        <tr class="active">
                                                                                            <td colspan="9">
                                                                                                <div class="text-right">
                                                                                                    <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>
                                                                            </div>

                                                                        </div>


                                                                        <!-- end settings content-->

                                                                    </div> <!-- end tab-content -->

                                                                    <div class="d-grid gap-2 col-6 mx-auto">
                                                                        <strong class="bg-secondary text-white"></strong>
                                                                    </div>
                                                                    <div class="table-responsive table table-sm">
                                                                        <table id="selected-items-table" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                                                            <div class="form-group col-md-12 my-1">
                                                                                <input type="text" readonly name="" value="Selected Item(s)" class="form-control" style="background-color:#4343ad;color:white;text-align: center;">
                                                                            </div>

                                                                            <thead style="background-color:#d7d7ff">
                                                                                <tr>

                                                                                    <th data-toggle="true"></th>
                                                                                    <th data-toggle="true">Item Code</th>
                                                                                    <th data-hide="phone">Item Category</th>
                                                                                    <th data-toggle="true">Item Description</th>
                                                                                    <th data-hide="phone">CPT Code</th>
                                                                                    <th data-hide="phone">Qty</th>
                                                                                    <th data-hide="phone"> Price</th>
                                                                                    <th data-hide="phone">Unit</th>


                                                                                </tr>
                                                                            </thead>


                                                                            <tbody>

                                                                            </tbody>

                                                                            <tfoot>
                                                                                <tr class="active">
                                                                                    <td colspan="10">
                                                                                        <div class="text-right">
                                                                                            <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>






                                                                </div> <!-- end tab-pane -->
                                                                <!-- end about me section content -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button id="continueButton" type="button" class="btn btn-primary">Continue</button>
                                                                <button id="discardButton" type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>







                                            </div> <!-- end .table-responsive-->
                                        </div> <!-- end card-box -->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->


                                <!-- Button trigger modal -->
                                <a href="his_doc_ancillary.php"><button type="button" class="btn btn btn-danger float-right" style="margin-left: 15px;">
                                        Go back
                                    </button> </a>
                                <button type="button" class="btn btn btn-success float-right" id="saveBtn">
                                    Next
                                </button>

                                <script>
                                    $("#saveBtn").click(() => {
                                        if (!$.trim($("#transactionsLineItems tbody").html())) {
                                            alert("No data selected!");
                                        } else {
                                            $("#exampleModal").modal('show');

                                            const items = $("#transactionsLineItems").data("selectedItems");
                                            const price = items.reduce((totalPrice, item) => totalPrice + item.itemPrice, 0);

                                            // Calculate the net amount and send it to the server via AJAX
                                            const netAmount = price; // Modify this calculation as needed
                                            $.ajax({
                                                type: "POST",
                                                url: "his_admin_render.php", // The URL of your PHP file
                                                data: {
                                                    netAmount: netAmount
                                                },
                                                success: function(response) {
                                                    // Handle the response if needed
                                                    console.log("Net Amount sent to the server.");
                                                }
                                            });

                                            // Update the client-side display (if needed)
                                            $("#totalPrice").val("₱ " + price);
                                            $("#grossAmount").val("₱ " + price);
                                            $("#netAmount").val("₱ " + price);


                                            // Calculate the total number of selected items and display in "Total Items" input
                                            const totalItems = items.length;
                                            $("#total").val(totalItems);
                                            $("#qty").val(totalItems + ".00");
                                        }
                                    });
                                </script>





                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" role="dialog" aria-labelledby="exampleModalLabel" area-hidden="true">
                                    <div class="modal-dialog  modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Print Transaction Slip Document</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Please double check the information of the transaction you are about to print. Make sure that the target printer
                                                is on and ready then press "Print" button to print or "Preview" button to view in the screen. Otherwise, press
                                                "Close" button to continue.....

                                                <div class="card-body">




                                                    <?php

                                                    if (isset($_GET['pat_id'])) {
                                                        $pat_id = $_GET['pat_id'];
                                                        $ret = "SELECT * FROM his_patients WHERE pat_id=?";
                                                        $stmt = $mysqli->prepare($ret);
                                                        $stmt->bind_param('i', $pat_id);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();
                                                        $cnt = 1;

                                                        if ($row = $res->fetch_object()) {
                                                            $mysqlDateTime = $row->pat_date_joined;
                                                            $rendered_by = "Nurse";
                                                            $age = $row->pat_age;
                                                            $bday = $row->pat_dob;
                                                            $doc = $row->pat_doc;
                                                            $id = $row->pat_id;



                                                    ?>

                                                            <div class="form-row">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="inputGroup-sizing-default">IPD Case No.</span>
                                                                    </div>
                                                                    <?php
                                                                    $length = 6;
                                                                    $regulated_number =  substr(str_shuffle('0123456789Z'), 1, $length);
                                                                    ?>
                                                                    <input type="text" readonly name="" class="form-control input-sm" id="" value="<?php echo $regulated_number ?>">
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="inputGroup-sizing-default">Patient ID</span>
                                                                    </div>
                                                                    <input type="text" readonly name="" class="form-control input-sm" id="inputlg" value="<?php echo $pat_number ?>">
                                                                </div>
                                                                <div class="input-group mb-3" style="display: none;">
                                                                    <div class="input-group-prepend">

                                                                        <span class="input-group-text" id="inputGroup-sizing-default">Rendered By:</span>
                                                                    </div>
                                                                    <input type="text" readonly name="render_by" class="form-control input-sm" id="inputlg" value="<?php echo $rendered_by; ?>">
                                                                </div>



                                                                <input type="hidden" class="form-control" value="<?php echo $age; ?>">
                                                                <input type="hidden" class="form-control" value="<?php echo $bday; ?>">
                                                                <input type="hidden" class="form-control" value="<?php echo $doc; ?>">


                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="inputGroup-sizing-default">Patient Name</span>
                                                                    </div>
                                                                    <input type="text" readonly name="render_name" class="form-control input-sm" id="inputlg" value="<?php echo $patientName ?>">
                                                                </div>

                                                                <!-- <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="inputGroup-sizing-default">Document Type</span>
                                                                </div>
                                                                <input type="text" readonly name="document_type" class="form-control input-sm" id="inputlg" value="CA">
                                                            </div> -->

                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="inputGroup-sizing-default">Document Date</span>
                                                                    </div>
                                                                    <input type="text" readonly name="" class="form-control input-sm" id="" value="<?php echo date("d/m/Y - h:m", strtotime($mysqlDateTime)); ?>">
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="inputGroup-sizing-default">Document Number</span>
                                                                    </div>
                                                                    <input type="text" readonly name="" class="form-control input-sm" id="inputlg" value="1">
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="inputGroup-sizing-default">Regulated Doc. No.</span>
                                                                    </div>
                                                                    <?php
                                                                    $length = 10;
                                                                    $regulated_number =  substr(str_shuffle('0123456789'), 1, $length);
                                                                    ?>
                                                                    <input type="text" readonly name="" class="form-control input-sm" id="inputlg" value="<?php echo $regulated_number; ?>">
                                                                </div>



                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="inputGroup-sizing-default">Net Amount</span>
                                                                    </div>

                                                                    <input type="text" readonly name="render_payment" class="form-control input-sm" id="totalPrice">
                                                                </div>

                                                                <div class="form-group col-md-2" style="display:none">
                                                                    <?php

                                                                    $currentDate = date("Ymd"); // Get current date in the format YYYYMMDD
                                                                    $randomNumber = rand(1, 9); // Generate a random number from 1 to 9
                                                                    $randomSuffix = substr(str_shuffle("0123456789"), 0, 4); // Generate a random 7-digit number

                                                                    $patient_id = $currentDate . $randomNumber;

                                                                    $admission_number = "CH-" . substr(str_shuffle("0123456789"), 0, 4); // Generate a random 4-digit admission number

                                                                    ?>
                                                                    <label for="inputZip" class="col-form-label">Patient Number</label>
                                                                    <input type="text" name="render_doc_number" value="<?php echo $admission_number; ?>" class="form-control small-input" id="inputZip">
                                                                </div>

                                                            </div>
                                                            <input type="hidden" class="form-control" value="<?php echo $id; ?>">

                                                </div>
                                            </div>
                                            <div class=" modal-footer">
                                                <!-- <a href="his_admin_print_render.php?pat_id=<?php echo $row->pat_id; ?>&pat_number=<?php echo $row->pat_number; ?>" class="btn btn-primary" role="button">Preview</a> -->
                                                <a href="his_admin_print_render.php?pat_id=<?php echo $row->pat_id; ?>" class="btn btn-primary" role="button" id="printButton">Print</a>
                                                <!-- <a href="his_admin_swu_ancillary.php" class="btn btn-danger" name="add_render" type="submit">Close</a> -->
                                                <!-- <button type="button" id="editFields" class="btn btn-success">Edit</button> -->
                                                <button type="submit" name="add_render" class="btn btn-danger" data-style="expand-right">Save and Close</button>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                </form>

                        <?php
                                                        } else {
                                                            echo "Patient not found.";
                                                        }
                                                    } else {
                                                        echo "Patient information not provided.";
                                                    }
                        ?>


                        <!-- <div>

                                <a href="his_admin_print_render.php?" class=" btn btn-success float-right" role="button">Next</a>


                            </div> -->


                        <!-- <button type="button" name="his_admin_print_render.php" class="ladda-button btn btn-success float-right" data-style="expand-left"></button> -->


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

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const editFieldsButton = document.getElementById("editFields");
                        const form = document.getElementById("myForm");
                        const readOnlyFields = form.querySelectorAll("[readonly]");

                        editFieldsButton.addEventListener("click", function() {
                            // Remove readonly attribute from the fields
                            readOnlyFields.forEach(function(field) {
                                field.removeAttribute("readonly");
                            });

                            // Disable the "Edit" button
                            editFieldsButton.setAttribute("disabled", "true");
                        });
                    });
                </script>
                <script>
                    $(document).ready(function() {
                        const columnNames = {
                            his_equipments: {
                                code: "item_code",
                                category: "item_category",
                                desc: "item_desc",
                                price: "item_price"
                            },
                            his_examinations: {
                                code: "exam_code",
                                category: "exam_category",
                                desc: "exam_desc",
                                price: "exam_price"
                            },
                            his_procedures: {
                                code: "pro_code",
                                category: "pro_category",
                                desc: "pro_desc",
                                price: "pro_price"
                            }
                        }
                        // Create a variable to store the AJAX request
                        var currentRequest = null;

                        $('.demo-foo-search').on('input', function() {
                            var searchQuery = $(this).val();
                            const tableName = $(this).data("tablename");
                            const columnToSearch = $(this).data("columntosearch");
                            const resultTable = $(this).data("resulttable");
                            console.log(searchQuery);

                            // Cancel the previous AJAX request if it exists
                            if (currentRequest) {
                                currentRequest.abort();
                            }

                            // Send a new AJAX request
                            currentRequest = $.ajax({
                                url: 'http://localhost/HIS-SWU/backend/nurse/his_admin_search.php',
                                method: 'GET',
                                data: {
                                    search: searchQuery,
                                    tableName: tableName,
                                    columnToSearch: columnToSearch
                                },
                                dataType: 'json',
                                success: function(data) {
                                    console.log('Data Received:', data);

                                    // Clear the table before appending new results
                                    $(`#${resultTable} tbody`).empty();

                                    // Populate the table with search results
                                    $.each(data, function(index, item) {
                                        const code = item[columnNames[tableName].code];
                                        const category = item[columnNames[tableName].category];
                                        const desc = item[columnNames[tableName].desc];
                                        const price = item[columnNames[tableName].price];

                                        $(`#${resultTable} tbody`).append(`
                                        <tr>
                                            <td><a class="badge badge-success select-item-btn" style="background-color: #8383e3; color:white ;"  data-id="${code}" data-category="${category}" data-desc="${desc}" data-price="${price}"><i class="far fa-eye "></i> Select</a></td>
                                            <td>${code}</td>
                                            <td>${category}</td>
                                            <td>${desc}</td>
                                            <td></td>
                                            <td></td>
                                            <td>₱${price}.00</td>
                                            <td></td>
                                        </tr>
                                        `);
                                    });
                                },
                                error: function(xhr, status, error) {
                                    console.error('AJAX Error:', status, error);
                                }
                            });
                        });
                    });
                </script>








                <script>
                    // Click event handler for the "Discard" button
                    $("#discardButton").click(function() {
                        // Clear the selected items in the transaction table
                        clearTransactionLineItems();

                        // Close the modal
                        $("#myModal").modal("hide");
                    });

                    // Function to clear the transaction line items table
                    function clearTransactionLineItems() {
                        $('#demo-foo-filtering tbody').empty();
                    }
                </script>


                <script>
                    document.getElementById("printButton").addEventListener("click", function(event) {
                        event.preventDefault(); // Prevent the default link behavior

                        // Get the URL from the "href" attribute of the "Print" button
                        var url = this.getAttribute("href");

                        // Open the URL in a new window or tab
                        window.open(url, "_blank");
                    });
                </script>


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

</body>

</html>