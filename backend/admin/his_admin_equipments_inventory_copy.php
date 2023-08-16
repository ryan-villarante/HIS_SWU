<?php
session_start();
include 'assets/inc/config.php';
include 'assets/inc/checklogin.php';
check_login();
$aid = $_SESSION['ad_id'];
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $adn = "delete from his_equipments where item_id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();

    if ($stmt) {
        $success = "Item successfully deleted";
    } else {
        $err = "Try Again Later";
    }
}
?>

<?php
if (isset($_POST['add_equipments'])) {
    $item_code = $_POST['item_code'];
    $item_desc = $_POST['item_desc'];
    $item_category = $_POST['item_category'];
    $item_abb = $_POST['item_abb'];
    $item_unit = $_POST['item_unit'];
    $item_big = $_POST['item_big'];
    $item_conv = $_POST['item_conv'];
    $item_bar = $_POST['item_bar'];

    //sql to insert captured values
    $query = "INSERT INTO his_equipments (item_code, item_desc, item_category, item_abb, item_unit, item_big, item_conv,item_bar) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssssss', $item_code, $item_desc, $item_category, $item_abb, $item_unit, $item_big, $item_conv, $item_bar);
    $stmt->execute();
    /*
     *Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
     *echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
     */
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Equipment Added";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}
?>

<?php
if (isset($_POST['add_examinations'])) {
    $exam_code = $_POST['exam_code'];
    $exam_cat = $_POST['exam_category'];
    $exam_desc = $_POST['exam_desc'];
    $exam_abb = $_POST['exam_abb'];
    $exam_unit = $_POST['exam_unit'];
    $exam_big = $_POST['exam_big'];
    $exam_conv = $_POST['exam_conv'];
    $exam_bar = $_POST['exam_bar'];

    //sql to insert captured values
    $query = "INSERT INTO his_examinations (exam_code, exam_category, exam_desc, exam_abb, exam_unit, exam_big, exam_conv,exam_bar) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssssss', $exam_code, $exam_cat, $exam_desc, $exam_abb, $exam_unit, $exam_big, $exam_conv, $exam_bar);
    $stmt->execute();
    /*
     *Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
     *echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
     */
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Examination Added";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}
?>


<?php
if (isset($_POST['add_procedures'])) {
    $pro_code = $_POST['pro_code'];
    $pro_desc = $_POST['pro_desc'];
    $pro_category = $_POST['pro_category'];
    $pro_abb = $_POST['pro_abb'];
    $pro_unit = $_POST['pro_unit'];
    $pro_big = $_POST['pro_big'];
    $pro_conv = $_POST['pro_conv'];
    $pro_bar = $_POST['pro_bar'];

    //sql to insert captured values
    $query = "INSERT INTO his_procedures (pro_code, pro_desc, pro_category, pro_abb, pro_unit, pro_big, pro_conv,pro_bar) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssssss', $pro_code,  $pro_desc, $pro_category, $pro_abb, $pro_unit, $pro_big, $pro_conv, $pro_bar);
    $stmt->execute();
    /*
         *Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
         *echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
         */
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Procedure Added";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}
?>

<?php

$aid = $_SESSION['ad_id'];
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $adn = "delete from his_examinations where exam_id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();

    if ($stmt) {
        $success = "Examinatiopn successfully deleted";
    } else {
        $err = "Try Again Later";
    }
}
?>

<?php

$aid = $_SESSION['ad_id'];
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $adn = "delete from his_procedures where pro_id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();

    if ($stmt) {
        $success = "Procedure successfully deleted";
    } else {
        $err = "Try Again Later";
    }
}
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



                                <div class="tab-content">
                                    <div class="tab-pane show active" id="aboutme">

                                        <form method="post" enctype="multipart/form-data">

                                            <div class="col-md-12 d-flex justify-content-end">

                                                <!-- Trigger the modal with a button -->
                                                <button type="button" class="	fa fa-plus lg-3 bi-plus btn btn-success btn-lg-2" data-toggle="modal" data-target="#myModal"> Add Item</button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal" role="dialog">
                                                    <div class="modal-dialog">

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
                                                                            <div class="form-group col-md-3">
                                                                                <label for="inputEmail4" class="col-form-label">Code</label>
                                                                                <input type="text" required="required" name="item_code" class="form-control" id="inputEmail4">
                                                                            </div>
                                                                            <div class="form-group col-md-9">
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
                                                                            <div class="form-group col-md-" 6>
                                                                                <label for="inputEmail4" class="col-form-label">Abbreviation</label>
                                                                                <input type="text" required="required" name="item_abb" class="form-control" id="inputEmail4">
                                                                            </div>
                                                                            <div class="form-group col-md-9">
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
                                                                            <div class="form-group col-md-9">
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
                                                                            <div class="form-group col-md-3">
                                                                                <label for="inputEmail4" class="col-form-label">Conversion</label>
                                                                                <input type="text" required="required" name="item_conv" class="form-control" id="inputEmail4">
                                                                            </div>
                                                                            <div class="form-group col-md-8">
                                                                                <label for="inputEmail4" class="col-form-label">Barcode ID</label>
                                                                                <input type="text" required="required" name="item_bar" class="form-control" id="inputEmail4">
                                                                            </div>
                                                                        </div>

                                                                        <!-- <div class="form-group">
                                                    <label for="inputPassword4" class="col-form-label">Equipment Barcode</label>
                                                     <?php
                                                        $length = 10;
                                                        $bcode = substr(str_shuffle('0123456789'), 1, $length);
                                                        ?>
                                            <input required="required" readonly type="text" value="<?php echo $bcode; ?>" name="item_code" class="form-control"  id="inputPassword4">
                                            </div>

                                            <div class="form-group" style="style:display-none">
                                                <label for="inputAddress" class="col-form-label">Pharmaceutical Category Description</label>
                                                <textarea required="required" type="text" class="form-control" name="item_desc" id="editor"></textarea>
                                            </div> -->
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                        <button type="submit" name="add_equipments" class="ladda-button btn btn-primary" data-style="expand-right">Save changes</button>

                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                            <a href="" class="dropdown-item">
                                                <i class=""></i>
                                                <span> </span>
                                            </a>





                                            <div class="table-responsive">
                                                <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th data-toggle="true">Code</th>
                                                            <th data-hide="phone">Item Category</th>
                                                            <th data-toggle="true">Item Description</th>
                                                            <th data-hide="phone">Abbreviation</th>
                                                            <th data-hide="phone">Unit</th>
                                                            <th data-hide="phone">Big Unit</th>
                                                            <th data-hide="phone">Conversion</th>
                                                            <th data-hide="phone">Barcode ID</th>
                                                            <th data-hide="phone">Action</th>

                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    /*
                                                        *get details of allpatients
                                                        *
                                                        */
                                                    $ret = "SELECT * FROM  his_equipments ORDER BY RAND() ";
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
                                                                <td><?php echo $row->item_conv; ?></td>
                                                                <td><?php echo $row->item_bar; ?></td>
                                                                <td>
                                                                    <a href="his_admin_view_single_eqp.php?item_code=<?php echo $row->item_code; ?>" class="badge badge-success"><i class="far fa-eye "></i> View</a>
                                                                    <a href="his_admin_update_equipments.php?item_code=<?php echo $row->item_code; ?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                                    <a href="his_admin_equipments_inventory_copy.php?delete=<?php echo $row->item_id; ?>" class="badge badge-danger"><i class=" mdi mdi-trash-can-outline "></i> Delete</a>
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



                                        </form>

                                    </div> <!-- end tab-pane -->
                                    <!-- end about me section content -->



                                    <!-- Start setting section content -->
                                    <div class="tab-pane" id="settings">
                                        <form method="post" enctype="multipart/form-data">

                                            <div class="col-md-12 d-flex justify-content-end">


                                                <!-- Trigger the modal with a button -->
                                                <button type="button" class="fa fa-plus lg-3 bi-plus btn btn-success" data-toggle="modal" data-target="#exampleModal"> Add Examination
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                Fill all Fields
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form method="post">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label for="inputEmail4" class="col-form-label">Code</label>
                                                                            <input type="text" required="required" name="exam_code" class="form-control" id="inputEmail4">
                                                                        </div>
                                                                        <div class="form-group col-md-8">
                                                                            <label for="inputPassword4" class="col-form-label">Item Category</label>
                                                                            <input required="required" type="text" name="exam_category" class="form-control" id="inputPassword4">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputPassword4" class="col-form-label">Item Description </label>
                                                                            <input required="required" type="text" name="exam_desc" class="form-control" id="inputPassword4">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputEmail4" class="col-form-label">Abbreviation</label>
                                                                            <input type="text" required="required" name="exam_abb" class="form-control" id="inputEmail4">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
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
                                                                        <div class="form-group col-md-4 ">
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
                                                                        <div class="form-group col-md-4">
                                                                            <label for="inputEmail4" class="col-form-label">Conversion</label>
                                                                            <select id="inputState" required="required" name="exam_conv" class="form-control">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>5</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label for="inputEmail4" class="col-form-label">Barcode ID</label>
                                                                            <input type="text" required="required" name="exam_bar" class="form-control" id="inputEmail4">
                                                                        </div>
                                                                    </div>

                                                                    <!-- <div class="form-group">
                                                                    <label for="inputPassword4" class="col-form-label">Equipment Barcode</label>
                                                                    <?php
                                                                    // $length = 10;
                                                                    //     $bcode = substr(str_shuffle('0123456789'), 1, $length);
                                                                    ?>
                                                            <input required="required" readonly type="text" value="<?php //echo $bcode; 
                                                                                                                    ?>" name="exam_code" class="form-control"  id="inputPassword4">
                                                            </div>

                                                            <div class="form-group" style="style:display-none">
                                                                <label for="inputAddress" class="col-form-label">Pharmaceutical Category Description</label>
                                                                <textarea required="required" type="text" class="form-control" name="exam_desc" id="editor"></textarea>
                                                            </div> -->



                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    <button type="submit" name="add_examinations" class="ladda-button btn btn-primary" data-style="expand-right">Save changes</button>

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
                                                <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th data-toggle="true">Code</th>
                                                            <th data-hide="phone">Item Category</th>
                                                            <th data-toggle="true">Item Description</th>
                                                            <th data-hide="phone">Abbreviation</th>
                                                            <th data-hide="phone">Unit</th>
                                                            <th data-hide="phone">Big Unit</th>
                                                            <th data-hide="phone">Conversion</th>
                                                            <th data-hide="phone">Barcode ID</th>
                                                            <th data-hide="phone">Action</th>

                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    /*
                                                *get details of allpatients
                                                *
                                                */
                                                    $ret = "SELECT * FROM  his_examinations ORDER BY RAND() ";
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
                                                                <td><?php echo $row->exam_unit; ?></td>
                                                                <td><?php echo $row->exam_big; ?></td>
                                                                <td><?php echo $row->exam_conv; ?></td>
                                                                <td><?php echo $row->exam_bar; ?></td>
                                                                <td>
                                                                    <a href="his_admin_view_exam.php?exam_code=<?php echo $row->exam_code; ?>" class="badge badge-success"><i class="far fa-eye "></i> View</a>
                                                                    <a href="his_admin_update_examinations.php?exam_code=<?php echo $row->exam_code; ?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                                    <a href="his_admin_equipments_inventory_copy.php?delete=<?php echo $row->exam_id; ?>" class="badge badge-danger"><i class=" mdi mdi-trash-can-outline "></i> Delete</a>
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
                                            </div>
                                    </div>

                                    <!-- Start Procedure Tab Pane -->
                                    <div class="tab-pane" id="procedure">


                                        <form method="post" enctype="multipart/form-data">

                                            <div class="col-md-12 d-flex justify-content-end">

                                                <!-- Button trigger modal -->
                                                <button type="button" class="fa fa-plus lg-3 bi-plus btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                                    Add Procedure
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
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
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputEmail4" class="col-form-label">Code</label>
                                                                            <input type="text" required="required" name="pro_code" class="form-control" id="inputEmail4">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputPassword4" class="col-form-label">Item Category</label>
                                                                            <input required="required" type="text" name="pro_category" class="form-control" id="inputPassword4">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputPassword4" class="col-form-label">Item Description </label>
                                                                            <input required="required" type="text" name="pro_desc" class="form-control" id="inputPassword4">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputEmail4" class="col-form-label">Abbreviation</label>
                                                                            <input type="text" required="required" name="pro_abb" class="form-control" id="inputEmail4">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="inputState" class="col-form-label">Unit</label>
                                                                            <select id="inputState" required="required" name="pro_unit" class="form-control">
                                                                                <option>None</option>

                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-4 ">
                                                                            <label for="inputState" class="col-form-label">Big Unit</label>
                                                                            <select id="inputState" required="required" name="pro_big" class="form-control">
                                                                                <option>None</option>

                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="inputEmail4" class="col-form-label">Conversion</label>
                                                                            <select id="inputState" required="required" name="pro_conv" class="form-control">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>5</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label for="inputEmail4" class="col-form-label">Barcode ID</label>
                                                                            <input type="text" required="required" name="pro_bar" class="form-control" id="inputEmail4">
                                                                        </div>
                                                                    </div>

                                                                    <!-- <div class="form-group">
                                                                    <label for="inputPassword4" class="col-form-label">Equipment Barcode</label>
                                                                    <?php
                                                                    // $length = 10;
                                                                    //     $bcode = substr(str_shuffle('0123456789'), 1, $length);
                                                                    ?>
                                                            <input required="required" readonly type="text" value="<?php //echo $bcode; 
                                                                                                                    ?>" name="exam_code" class="form-control"  id="inputPassword4">
                                                            </div>

                                                            <div class="form-group" style="style:display-none">
                                                                <label for="inputAddress" class="col-form-label">Pharmaceutical Category Description</label>
                                                                <textarea required="required" type="text" class="form-control" name="exam_desc" id="editor"></textarea>
                                                            </div> -->
                                                                    <!-- <button type="submit" name="add_procedures" class="ladda-button btn btn-success" data-style="expand-right">Add Procedure</button> -->


                                                                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="add_equipments" class="ladda-button btn btn-primary" data-style="expand-right">Save changes</button> -->

                                                                </form>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" name="add_procedures" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                            <a href="" class="dropdown-item ">
                                                <i class=""></i>
                                                <span> </span>
                                            </a>

                                            <div class="table-responsive">
                                                <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th data-toggle="true">Code</th>
                                                            <th data-hide="phone">Item Category</th>
                                                            <th data-toggle="true">Item Description</th>
                                                            <th data-hide="phone">Abbreviation</th>
                                                            <th data-hide="phone">Unit</th>
                                                            <th data-hide="phone">Big Unit</th>
                                                            <th data-hide="phone">Conversion</th>
                                                            <th data-hide="phone">Barcode ID</th>
                                                            <th data-hide="phone">Action</th>

                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    /*
                                                *get details of allpatients
                                                *
                                                */
                                                    $ret = "SELECT * FROM  his_procedures ORDER BY RAND() ";
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
                                                                <td><?php echo $row->pro_unit; ?></td>
                                                                <td><?php echo $row->pro_big; ?></td>
                                                                <td><?php echo $row->pro_conv; ?></td>
                                                                <td><?php echo $row->pro_bar; ?></td>
                                                                <td>
                                                                    <a href="his_admin_view_procedure.php?pro_code=<?php echo $row->pro_code; ?>" class="badge badge-success"><i class="far fa-eye "></i> View</a>
                                                                    <a href="his_admin_update_procedure.php?pro_code=<?php echo $row->pro_code; ?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                                    <a href="his_admin_equipments_inventory_copy.php?delete=<?php echo $row->pro_id; ?>" class="badge badge-danger"><i class=" mdi mdi-trash-can-outline "></i> Delete</a>
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
<?php } ?>
<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->


<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="assets/js/vendor.min.js"></script>

<!-- App js -->
<script src="assets/js/app.min.js"></script>

</body>


</html>