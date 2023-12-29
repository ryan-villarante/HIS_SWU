<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['user_id'];


?>




<!DOCTYPE html>
<html lang="en">
<?php include 'assets/inc/head.php'; ?>

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

                    <div class="col-lg-10 col-xl-12">
                        <div class="card-box">
                            <ul class="nav nav-pills navtab-bg nav-justified">
                                <li class="nav-item">
                                    <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                        Drugs and Medicines
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#settings" id="examinationTabLink" data-toggle="tab" aria-expanded="false" class="nav-link">
                                        Examination
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#procedure" data-toggle="tab" aria-expanded="false" class="nav-link">
                                        Procedure
                                    </a>
                                </li>
                            </ul>



                            <div class="tab-content">
                                <div class="tab-pane show active" id="aboutme">

                                    <form method="post" enctype="multipart/form-data">

                                        <div class="col-md-12 d-flex justify-content-start">

                                            <!-- Trigger the modal with a button -->
                                            <!-- <button type="button" class="	fa fa-plus lg-3 bi-plus btn maroon-outline-btn btn-lg-2" data-toggle="modal" data-target="#myModal"> Add Item</button> -->

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
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-3" style="display: none;">
                                                                            <?php


                                                                            $currentDate = date("Ymd"); // Get current date in the format YYYYMMDD
                                                                            $randomNumber = rand(1, 9); // Generate a random number from 1 to 9
                                                                            $randomSuffix = substr(str_shuffle("0123456789"), 0, 4); // Generate a random 7-digit number

                                                                            $drugs_code = $currentDate . $randomNumber;
                                                                            $shabu_code =   "MEDS" . substr(str_shuffle("0123456789"), 0, 6);
                                                                            ?>
                                                                            <label for="inputEmail4" class="col-form-label">Code</label>
                                                                            <input type="text" required="required" name="item_code" value="<?php echo $shabu_code ?>" class="form-control" id="inputEmail4">
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label for="inputState" class="col-form-label">Item Category</label>
                                                                            <select id="inputState" required="required" name="item_category" class="form-control">
                                                                                <option>Choose</option>
                                                                                <option>Medicine</option>
                                                                                <option>Tablets and Capsules</option>
                                                                                <option>Ampoules and Vials</option>
                                                                                <option>Syrups,Suspensions and Drops</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputPassword4" class="col-form-label">Item Description </label>
                                                                            <input required="required" type="text" name="item_desc" class="form-control" id="inputPassword4">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputEmail4" class="col-form-label">Abbreviation</label>
                                                                            <input type="text" required="required" name="item_abb" class="form-control" id="inputEmail4">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputState" class="col-form-label">Unit</label>
                                                                            <select id="inputState" required="required" name="item_unit" class="form-control">
                                                                                <option>Choose</option>
                                                                                <option>Ampule</option>
                                                                                <option>Cap</option>
                                                                                <option>Bottle</option>
                                                                                <option>Vial</option>
                                                                                <option>Pieces</option>
                                                                                <option>Tablet</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputState" class="col-form-label">Big Unit</label>
                                                                            <select id="inputState" required="required" name="item_big" class="form-control">
                                                                                <option>Choose</option>
                                                                                <option>Ampule</option>
                                                                                <option>Box</option>
                                                                                <option>Pieces</option>
                                                                                <option>Vial</option>
                                                                                <option>Tablet</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputEmail4" class="col-form-label">Conversion</label>
                                                                            <input type="number" required="required" name="item_conv" class="form-control" id="inputEmail4">
                                                                        </div>
                                                                        <div class="form-group col-md-8" style="display: none;">
                                                                            <?php


                                                                            $currentDate = date("Ymd"); // Get current date in the format YYYYMMDD
                                                                            $randomNumber = rand(1, 9); // Generate a random number from 1 to 9
                                                                            $randomSuffix = substr(str_shuffle("0123456789"), 0, 4); // Generate a random 7-digit number

                                                                            $drugs_code = $currentDate . $randomNumber;
                                                                            $shabu_code =   "MEDS" . substr(str_shuffle("0123456789"), 0, 6);
                                                                            ?>

                                                                            <label for="inputEmail4" class="col-form-label">Barcode ID</label>
                                                                            <input type="text" required="required" name="item_bar" value="<?php echo $shabu_code ?>" class="form-control" id="inputEmail4">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputEmail4" class="col-form-label">Price</label>
                                                                            <input type="number" required="required" name="item_price" class="form-control" id="inputEmail4">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer my-3">


                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                        <button type="submit" name="add_equipments" class="ladda-button btn btn-primary" data-style="expand-right">Save changes</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>







                                        <form method="post" action="his_admin_equipments_inventory_copy.php">

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





                                            <div class="table-responsive my-3">
                                                <table id="demo-foo-filtering" class="table table-borderless table-hover mb-0 table-sm" data-page-size="9">
                                                    <thead class="table-danger">
                                                        <tr>
                                                            <th>#</th>
                                                            <th data-toggle="true">Code</th>
                                                            <th data-hide="phone">Item Category</th>
                                                            <th data-toggle="true">Item Description</th>
                                                            <th data-hide="phone">Abbreviation</th>
                                                            <th data-hide="phone">Unit</th>
                                                            <th data-hide="phone">Big Unit</th>
                                                            <th data-hide="phone">Price</th>
                                                            <th data-hide="phone">Barcode ID</th>
                                                            <th data-hide="phone">Action</th>

                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    /*
                                                          *get details of allpatients
                                                          *
                                                          */
                                                    $ret = "SELECT * FROM  his_equipments  ";
                                                    $stmt = $mysqli->prepare($ret);
                                                    $stmt->execute(); //ok
                                                    $res = $stmt->get_result();
                                                    $cnt = 1;
                                                    while ($row = $res->fetch_object()) {
                                                    ?>

                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo $cnt; ?></td>
                                                                <td><?php echo $row->item_code; ?></td>
                                                                <td><?php echo $row->item_category; ?></td>
                                                                <td><?php echo $row->item_desc; ?></td>
                                                                <td><?php echo $row->item_abb; ?></td>
                                                                <td><?php echo $row->item_unit; ?></td>
                                                                <td><?php echo $row->item_big; ?></td>
                                                                <td>₱<?php echo $row->item_price; ?> .00</td>
                                                                <td><?php echo $row->item_bar; ?></td>
                                                                <td>
                                                                    <a style="background-color: #800;" href="his_doc_view_single_eqp.php?item_code=<?php echo $row->item_code; ?>" class="badge badge-success "><i class="far fa-eye "></i> View</a>
                                                                    <!-- <a href="his_admin_update_equipments.php?item_code=<?php echo $row->item_code; ?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                                        <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteConfirmationModal" data-recordid="<?php echo $row->item_id; ?>">
                                                                            <i class="mdi mdi-trash-can-outline"></i> Delete
                                                                        </a> -->
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    <?php $cnt = $cnt + 1;
                                                    } ?>
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
                                            </div> <!-- end .table-responsive-->




                                            <input type="hidden" name="deleteRecordId" id="deleteRecordId" value="">

                                        </form>


                                        <script>
                                            $(document).ready(function() {
                                                $('.badge-danger').click(function() {
                                                    var recordId = $(this).data('recordid');
                                                    console.log("Record ID:", recordId); // Check if the correct ID is printed
                                                    $('#deleteRecordId').val(recordId);
                                                });
                                            });
                                        </script>


                                </div> <!-- end tab-pane -->
                                <!-- end about me section content -->



                                <!-- Start setting section content -->
                                <div class="tab-pane" id="settings">
                                    <form method="post" enctype="multipart/form-data" id="examinationForm">

                                        <div class="col-md-12 d-flex justify-content-start">


                                            <!-- Trigger the modal with a button -->
                                            <!-- <button type="button" class="fa fa-plus lg-3 bi-plus btn maroon-outline-btn" data-toggle="modal" data-target="#exampleModal"> Add Examination -->
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content ">
                                                        <div class="modal-header">
                                                            Fill all Fields
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form method="post">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-4" style="display: none;">
                                                                        <?php
                                                                        $length = 10;
                                                                        $ecode = substr(str_shuffle('0123456789'), 1, $length);
                                                                        ?>
                                                                        <label for="inputEmail4" class="col-form-label">Code</label>
                                                                        <input type="text" required="required" name="exam_code" value="<?php echo $ecode ?>" class="form-control" id="inputEmail4">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label for="inputPassword4" class="col-form-label">Item Category</label>
                                                                        <select id="inputState" required="required" name="exam_category" class="form-control">
                                                                            <option>None</option>
                                                                            <option>CT Scan</option>
                                                                            <option>2D Echo</option>
                                                                            <option>Laboratory Examinations</option>
                                                                            <option>X-Ray</option>
                                                                            <option>Laboratory-Sent Out</option>
                                                                            <option>CT Scan - Sent Out </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputPassword4" class="col-form-label">Item Description </label>
                                                                        <input required="required" type="text" name="exam_desc" class="form-control" id="inputPassword4">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputEmail4" class="col-form-label">Abbreviation</label>
                                                                        <input type="text" required="required" name="exam_abb" class="form-control" id="inputEmail4">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputState" class="col-form-label">Unit</label>
                                                                        <select id="inputState" required="required" name="exam_unit" class="form-control">
                                                                            <option>None</option>
                                                                            <option>Ampule</option>
                                                                            <option>Cap</option>
                                                                            <option>Bottle</option>
                                                                            <option>Vial</option>
                                                                            <option>Pieces</option>
                                                                            <option>Tablet</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6 ">
                                                                        <label for="inputState" class="col-form-label">Big Unit</label>
                                                                        <select id="inputState" required="required" name="exam_big" class="form-control">
                                                                            <option>None</option>
                                                                            <option>Ampule</option>
                                                                            <option>Box</option>
                                                                            <option>Pieces</option>
                                                                            <option>Vial</option>
                                                                            <option>Tablet</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputEmail4" class="col-form-label">Conversion</label>
                                                                        <input type="number" required="required" name="exam_conv" class="form-control" id="inputEmail4">
                                                                    </div>
                                                                    <div class="form-group col-md-6" style="display: none;">
                                                                        <label for="inputEmail4" class="col-form-label">Barcode ID</label>
                                                                        <input type="text" required="required" name="exam_bar" value="<?php echo $ecode ?>" class="form-control" id="inputEmail4">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputEmail4" class="col-form-label">Price</label>
                                                                        <input type="number" required="required" name="exam_price" class="form-control" id="inputEmail4">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer my-3">

                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    <button type="submit" id="saveChangesButton" name="add_examinations" class="ladda-button btn btn-primary" data-style="expand-right">Save changes</button>
                                                                </div>
                                                            </form>



                                                        </div>
                                                        <!-- <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                  <button type="button" class="btn btn-primary">Save changes</button>
                                                              </div> -->
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <a href="" class="dropdown-item ">
                                            <i class=""></i>
                                            <span> </span>
                                        </a>

                                        <div class="table-responsive">
                                            <table id="demo-foo-filtering" class="table table-borderless table-hover mb-0 table-sm" data-page-size="7">
                                                <thead class="table-danger">
                                                    <tr>
                                                        <th>#</th>
                                                        <th data-toggle="true">Code</th>
                                                        <th data-hide="phone">Item Category</th>
                                                        <th data-toggle="true">Item Description</th>
                                                        <th data-hide="phone">Abbreviation</th>
                                                        <th data-hide="phone">Price</th>
                                                        <th data-hide="phone">Barcode ID</th>
                                                        <th data-hide="phone">Action</th>

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
                                                while ($row = $res->fetch_object()) {
                                                ?>

                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $cnt; ?></td>
                                                            <td><?php echo $row->exam_code; ?></td>
                                                            <td><?php echo $row->exam_category; ?></td>
                                                            <td><?php echo $row->exam_desc; ?></td>
                                                            <td><?php echo $row->exam_abb; ?></td>
                                                            <td>₱<?php echo $row->exam_price; ?>.00</td>
                                                            <td><?php echo $row->exam_bar; ?></td>
                                                            <td>
                                                                <a style="background-color: #800;" href="his_doc_view_exam.php?exam_code=<?php echo $row->exam_code; ?>" class="badge badge-success"><i class="far fa-eye "></i> View</a>
                                                                <!-- <a href="his_admin_update_examinations.php?exam_code=<?php echo $row->exam_code; ?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                                    <a href="his_admin_equipments_inventory_copy.php?delete=<?php echo $row->exam_id; ?>" class="badge badge-danger"><i class=" mdi mdi-trash-can-outline "></i> Delete</a> -->
                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                <?php $cnt = $cnt + 1;
                                                } ?>
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
                                </div>



                                <!-- Start Procedure Tab Pane -->
                                <div class="tab-pane" id="procedure">


                                    <form method="post" enctype="multipart/form-data">

                                        <div class="col-md-12 d-flex justify-content-start">

                                            <!-- Button trigger modal -->
                                            <!-- <button type="button" class="fa fa-plus lg-3 bi-plus btn maroon-outline-btn" data-toggle="modal" data-target="#exampleModalCenter">
                                                    Add Procedure
                                                </button> -->

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="header-title">Fill all fields</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6" style="display: none;">
                                                                        <?php
                                                                        $length = 9;
                                                                        $pcode = substr(str_shuffle('0123456789'), 1, $length);
                                                                        ?>
                                                                        <label for="inputEmail4" class="col-form-label">Code</label>
                                                                        <input type="text" required="required" name="pro_code" value="<?php echo $pcode ?>" class="form-control" id="inputEmail4">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label for="inputPassword4" class="col-form-label">Item Category</label>
                                                                        <select id="inputState" required="required" name="pro_category" class="form-control">
                                                                            <option>None</option>
                                                                            <option>RHB Procedures</option>
                                                                            <option>OR Procedures</option>
                                                                            <option>RHU Procedures</option>
                                                                            <option>Procedures</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputPassword4" class="col-form-label">Item Description </label>
                                                                        <input required="required" type="text" name="pro_desc" class="form-control" id="inputPassword4">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputEmail4" class="col-form-label">Abbreviation</label>
                                                                        <input type="text" required="required" name="pro_abb" class="form-control" id="inputEmail4">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputState" class="col-form-label">Unit</label>
                                                                        <select id="inputState" required="required" name="pro_unit" class="form-control">
                                                                            <option>None</option>

                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6 ">
                                                                        <label for="inputState" class="col-form-label">Big Unit</label>
                                                                        <select id="inputState" required="required" name="pro_big" class="form-control">
                                                                            <option>None</option>

                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputEmail4" class="col-form-label">Conversion</label>
                                                                        <input type="number" required="required" name="pro_conv" class="form-control" id="inputEmail4">
                                                                    </div>
                                                                    <div class="form-group col-md-6" style="display: none;">
                                                                        <label for="inputEmail4" class="col-form-label">Barcode ID</label>
                                                                        <input type="text" required="required" name="pro_bar" value="<?php echo $pcode ?>" class="form-control" id="inputEmail4">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputEmail4" class="col-form-label">Price</label>
                                                                        <input type="number" required="required" name="pro_price" class="form-control" id="inputEmail4">
                                                                    </div>
                                                                </div>





                                                        </div>
                                                        <div class="modal-footer my-3">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="add_procedures" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                    </form>
                                </div>
                            </div>

                        </div>


                        <a href="" class="dropdown-item ">
                            <i class=""></i>
                            <span> </span>
                        </a>

                        <div class="table-responsive">
                            <table id="demo-foo-filtering" class="table table-borderless table-hover table-sm" data-page-size="7">
                                <thead class="table-danger">
                                    <tr>
                                        <th>#</th>
                                        <th data-toggle="true">Code</th>
                                        <th data-hide="phone">Item Category</th>
                                        <th data-toggle="true">Item Description</th>
                                        <th data-hide="phone">Abbreviation</th>
                                        <th data-hide="phone">Price</th>
                                        <th data-hide="phone">Barcode ID</th>
                                        <th data-hide="phone">Action</th>

                                    </tr>
                                </thead>
                                <?php
                                /*
                                                  *get details of allpatients
                                                  *
                                                  */
                                $ret = "SELECT * FROM  his_procedures  ";
                                $stmt = $mysqli->prepare($ret);
                                $stmt->execute(); //ok
                                $res = $stmt->get_result();
                                $cnt = 1;
                                while ($row = $res->fetch_object()) {
                                ?>

                                    <tbody>
                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $row->pro_code; ?></td>
                                            <td><?php echo $row->pro_category; ?></td>
                                            <td><?php echo $row->pro_desc; ?></td>
                                            <td><?php echo $row->pro_abb; ?></td>
                                            <td>₱<?php echo $row->pro_price; ?>.00</td>
                                            <td><?php echo $row->pro_bar; ?></td>
                                            <td>
                                                <a style="background-color: #800;" href="his_doc_view_procedure.php?pro_code=<?php echo $row->pro_code; ?>" class="badge badge-success"><i class="far fa-eye "></i> View</a>
                                                <!-- <a href="his_admin_update_procedure.php?pro_code=<?php echo $row->pro_code; ?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                    <a href="his_admin_equipments_inventory_copy.php?delete=<?php echo $row->pro_id; ?>" class="badge badge-danger"><i class=" mdi mdi-trash-can-outline "></i> Delete</a> -->
                                            </td>

                                        </tr>
                                    </tbody>
                                <?php $cnt = $cnt + 1;
                                } ?>
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
                    </div>
                    </form>
                </div>


                <!-- end settings content-->

            </div> <!-- end tab-content -->
        </div> <!-- end card-box-->

    </div> <!-- end col -->
    </div>
    <!-- end row-->

    </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <?php include "assets/inc/footer.php"; ?>
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

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>


</html>