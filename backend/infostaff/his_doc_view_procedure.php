<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['user_id'];
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
        <?php
        $pro_code = $_GET['pro_code'];
        $ret = "SELECT  * FROM his_procedures WHERE pro_code = ?";
        $stmt = $mysqli->prepare($ret);
        $stmt->bind_param('i', $pro_code);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        //$cnt=1;
        while ($row = $res->fetch_object()) {
        ?>

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
                                            <li class="breadcrumb-item"><a href="his_doc_dashboard.php">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="his_doc_equipment.php">Procedure</a></li>
                                            <li class="breadcrumb-item"><a href="#">View Procedure</a></li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-xl-5">

                                            <div class="tab-content pt-0">

                                                <div class="tab-pane active show" id="product-1-item">
                                                    <img src="../admin/assets/images/b.webp" alt="" class="img-fluid mx-auto d-block rounded">
                                                </div>

                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-xl-7">
                                            <div class="pl-xl-3 mt-3 mt-xl-0">
                                                <h2 class="mb-3">Description : <?php echo $row->pro_desc; ?></h2>
                                                <hr>
                                                <h4 class="text-secondary">Code: <?php echo $row->pro_code; ?></h4>
                                                <hr>
                                                <h4 class="text-secondary">Category: <?php echo $row->pro_category; ?></h4>
                                                <hr>
                                                <h4 class="text-secondary">Abbreviation : <?php echo $row->pro_abb; ?></h4>
                                                <hr>
                                                <h4 class="text-secondary">Barcode ID: <?php echo $row->pro_bar; ?></h4>
                                                <hr>
                                                <h4 class="text-secondary">Price: ₱<?php echo $row->pro_price; ?>.00</h4>

                                                <!--
                                                    <form class="form-inline mb-4">
                                                        <label class="my-1 mr-2" for="quantityinput">Quantity</label>
                                                        <select class="custom-select my-1 mr-sm-3" id="quantityinput">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                        </select>

                                                        <label class="my-1 mr-2" for="sizeinput">Size</label>
                                                        <select class="custom-select my-1 mr-sm-3" id="sizeinput">
                                                            <option selected>Small</option>
                                                            <option value="1">Medium</option>
                                                            <option value="2">Large</option>
                                                            <option value="3">X-large</option>
                                                        </select>
                                                    </form>

                                                    <div>
                                                        <button type="button" class="btn btn-danger mr-2"><i class="mdi mdi-heart-outline"></i></button>
                                                        <button type="button" class="btn btn-success waves-effect waves-light">
                                                            <span class="btn-label"><i class="mdi mdi-cart"></i></span>Add to cart
                                                        </button>
                                                    </div> -->
                                            </div>
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <!--
                                        <div class="table-responsive mt-4">
                                            <table class="table table-bordered table-centered mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Outlets</th>
                                                        <th>Price</th>
                                                        <th>Stock</th>
                                                        <th>Revenue</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>ASOS Ridley Outlet - NYC</td>
                                                        <td>$139.58</td>
                                                        <td>
                                                            <div class="progress-w-percent mb-0">
                                                                <span class="progress-value">478 </span>
                                                                <div class="progress progress-sm">
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 56%;" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>$1,89,547</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Marco Outlet - SRT</td>
                                                        <td>$149.99</td>
                                                        <td>
                                                            <div class="progress-w-percent mb-0">
                                                                <span class="progress-value">73 </span>
                                                                <div class="progress progress-sm">
                                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 16%;" aria-valuenow="16" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>$87,245</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Chairtest Outlet - HY</td>
                                                        <td>$135.87</td>
                                                        <td>
                                                            <div class="progress-w-percent mb-0">
                                                                <span class="progress-value">781 </span>
                                                                <div class="progress progress-sm">
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>$5,87,478</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nworld Group - India</td>
                                                        <td>$159.89</td>
                                                        <td>
                                                            <div class="progress-w-percent mb-0">
                                                                <span class="progress-value">815 </span>
                                                                <div class="progress progress-sm">
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 89%;" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>$55,781</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> -->

                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include('assets/inc/footer.php'); ?>
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