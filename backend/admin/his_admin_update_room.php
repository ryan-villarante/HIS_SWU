<?php
session_start();
include('assets/inc/config.php');
if (isset($_POST['update_rooms'])) {
    $room_bldg = $_POST['room_bldg'];
    $room_bname = $_POST['room_bname'];
    $room_fname = $_POST['room_fname'];
    $room_number = $_POST['room_number'];
    $room_status = $_POST['room_status'];
    $room_beds_number = $_POST['room_beds_number'];
    $room_classification = $_POST['room_classification'];
    $room_station = $_POST['room_station'];
    $room_fea = $_POST['room_fea'];
    $roomIn_price = $_POST['roomIn_price'];
    $room_id = $_POST['room_id'];
    $toBeDeleted = $_POST['beds'];

    $toBeDeletedIds = json_decode($toBeDeleted);
    $ids = $toBeDeletedIds ? join(",", $toBeDeletedIds) : "";


    //sql to update captured values
    $query = "UPDATE  his_rooms_beds SET  room_bldg=?,room_bname=?,room_fname=?,room_status=?,room_beds_number=?,room_classification=?,room_station=?,room_fea=?,roomIn_price=?, room_number=? WHERE room_id = ?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('sssssssssss',  $room_bldg, $room_bname, $room_fname, $room_status, $room_beds_number, $room_classification, $room_station, $room_fea, $roomIn_price, $room_number, $room_id);
    $stmt->execute();

    $newBeds = json_decode($_POST['new_beds']);
    if ($newBeds) {

        for ($i = 0; $i < count($newBeds); $i++) {


            $bed = $newBeds[$i];
            $hisBedQuery = "INSERT INTO his_beds (bed_number, bed_status, room_id) VALUES (?, ?, ?)";


            $stmt2 = $mysqli->prepare($hisBedQuery);
            $stmt2->bind_param('sss', $bed->bed_number, $bed->bed_status, $room_id);
            $stmt2->execute();
        }
    }

    if ($ids !=  "") {

        $query2 = "DELETE from his_beds WHERE bed_id IN (?)";
        $stmt3 = $mysqli->prepare($query2);
        $stmt3->bind_param('s', $ids);
        $stmt3->execute();
    }




    /*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Rooms Updated ";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}
?>
<!--End Server Side-->
<!DOCTYPE html>
<html lang="en">

<!--Head-->
<?php include('assets/inc/head.php'); ?>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include("assets/inc/nav.php"); ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include("assets/inc/sidebar.php"); ?>
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
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="his_admin_swu_room.php">Rooms and Beds</a></li>
                                        <li class="breadcrumb-item"><a href="#"><strong>Update Rooms and Bed Details</strong></a></li>

                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Form row -->
                    <?php
                    $room_id = $_GET['room_id'];
                    $ret = "SELECT  * FROM his_rooms_beds WHERE room_id=?";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->bind_param('s', $room_id);
                    $stmt->execute(); //ok
                    $res = $stmt->get_result();
                    //$cnt=1;
                    while ($row = $res->fetch_object()) {
                    ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Fill all fields</h4>
                                        <!--Add Patient Form-->
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row">

                                                <?php
                                                if (isset($_SESSION['form_error'])) {
                                                    echo $_SESSION['form_error'];
                                                    unset($_SESSION['form_error']);
                                                }
                                                ?>
                                                <input type="hidden" value="<?php echo $row->room_id; ?>" name="room_id" class="form-control  small-input" readonly />



                                                <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label"><strong>Branch Name</strong></label>
                                                    <input style="background-color: #ffa7a745; font-weight:bold;" type="text" id="inputState" value="<?php echo $row->room_bname; ?>" name="room_bname" class="form-control  small-input" readonly>
                                                    <!-- <option>Main</option>
                                                        <option>Central</option>
                                                        <option>Minor</option>
                                                        <option>Secondary</option> -->

                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Building Name</label>
                                                    <select id="inputState" required="required" name="room_bldg" class="form-control  small-input">
                                                        <option <?= $row->room_bldg == 'Building 1' ? ' selected="selected"' : ''; ?>>Building 1</option>
                                                        <option <?= $row->room_bldg == 'Building 2' ? ' selected="selected"' : ''; ?>>Building 2</option>
                                                        <option <?= $row->room_bldg == 'Building 3' ? ' selected="selected"' : ''; ?>>Building 3</option>
                                                        <option <?= $row->room_bldg == 'Building 4' ? ' selected="selected"' : ''; ?>>Building 4</option>
                                                        <option <?= $row->room_bldg == 'Building 5' ? ' selected="selected"' : ''; ?>>Building 5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Floor Name</label>
                                                    <select id="inputState" required="required" name="room_fname" class="form-control  small-input">
                                                        <option <?= $row->room_fname == '1st Central Wing' ? ' selected="selected"' : ''; ?>>1st Central Wing</option>
                                                        <option <?= $row->room_fname == '2nd Central Wing' ? ' selected="selected"' : ''; ?>>2nd Central Wing</option>
                                                        <option <?= $row->room_fname == '3rd Central Wing' ? ' selected="selected"' : ''; ?>>3rd Central Wing</option>
                                                        <option <?= $row->room_fname == '4th Central Wing' ? ' selected="selected"' : ''; ?>>4th Central Wing</option>
                                                        <option <?= $row->room_fname == '1st East Wing' ? ' selected="selected"' : ''; ?>>1st East Wing</option>
                                                        <option <?= $row->room_fname == '2nd East Wing' ? ' selected="selected"' : ''; ?>>2nd East Wing</option>
                                                        <option <?= $row->room_fname == '3rd East Wing' ? ' selected="selected"' : ''; ?>>3rd East Wing</option>
                                                        <option <?= $row->room_fname == '4th East Wing' ? ' selected="selected"' : ''; ?>>4th East Wing</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Room No.</label>
                                                    <input type="text" required="required" value="<?php echo $row->room_number; ?>" name="room_number" class="form-control  small-input" id="room_number">
                                                </div>
                                                <div class="form-group col-md-6" style="display: none;">
                                                    <label for="inputEmail4" class="col-form-label">No. of Beds</label>
                                                    <input type="number" required="required" value="<?php echo $row->room_beds_number; ?>" readonly name="room_beds_number" class="form-control  small-input" id="room_beds_number">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Room Status</label>
                                                    <select id="inputState" required="required" name="room_status" class="form-control  small-input">
                                                        <option <?= $row->room_status == 'Available' ? ' selected="selected"' : ''; ?>>Available</option>
                                                        <option <?= $row->room_status == 'Occupied' ? ' selected="selected"' : ''; ?>>Occupied</option>
                                                        <option <?= $row->room_status == 'Fully Occupied' ? ' selected="selected"' : ''; ?>>Fully Occupied</option>
                                                        <option <?= $row->room_status == 'For Renovation' ? ' selected="selected"' : ''; ?>>For Renovation</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Room Classification</label>
                                                    <select id="inputState" required="required" name="room_classification" class="form-control  small-input">
                                                        <option <?= $row->room_classification == 'PRIVATE' ? ' selected="selected"' : ''; ?>>PRIVATE</option>
                                                        <option <?= $row->room_classification == 'SEMI PRIVATE' ? ' selected="selected"' : ''; ?>>SEMI PRIVATE</option>
                                                        <option <?= $row->room_classification == 'WARD' ? ' selected="selected"' : ''; ?>>WARD</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6" style="display: none;">
                                                    <label for="inputEmail4" class="col-form-label">Nursing Station</label>
                                                    <input style="background-color: #ffa7a745; font-weight:bold;" type="text" readonly required="required" value="<?php echo $row->room_station; ?>" name="room_station" class="form-control  small-input" id="room_station">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputAddress" class="col-form-label">Room feature</label>
                                                    <textarea type="text" class="form-control  small-input" name="room_fea" id="editor"><?php echo $row->room_fea; ?></textarea>
                                                </div>
                                                <div class="form-group col-md-6" style="display: none">
                                                    <label for="beds" class="col-form-label">Beds</label>
                                                    <textarea type="text" class="form-control small-input" name="beds" id="beds"></textarea>
                                                </div>
                                                <div class="form-group col-md-6" style="display: none;">
                                                    <label for="new_beds" class="col-form-label">new_beds</label>
                                                    <textarea type="text" class="form-control small-input" name="new_beds" id="new_beds"></textarea>
                                                </div>
                                            </div>
                                            <div class="container-fluid my-3">
                                                <div class="row">

                                                    <!-- Left Column -->
                                                    <div class="col-md-6">
                                                        <!-- First Table - Beds -->
                                                        <table id="listOfBeds" class="table table-bordered toggle-circle mb-0 table-sm">
                                                            <thead class="text-center">
                                                                <h3 class="text-center" style="font-size:medium;font-family: Nunito,sans-serif;">List of Beds</h3>
                                                            </thead>

                                                            <thead class="table-danger">
                                                                <tr>
                                                                    <th>Bed Number</th>
                                                                    <th>Bed Type</th>
                                                                    <th></th>
                                                                    <!-- Add more bed-related columns here -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                /*
                                                *get details of allpatients
                                                *
                                            */
                                                                $ret = "SELECT * FROM  his_beds WHERE room_id = ?";
                                                                //sql code to get to ten docs  randomly
                                                                $stmt = $mysqli->prepare($ret);
                                                                $stmt->bind_param('s', $row->room_id);
                                                                $stmt->execute(); //ok
                                                                $res = $stmt->get_result();
                                                                $cnt = 1;
                                                                while ($row2 = $res->fetch_object()) {
                                                                ?>
                                                                    <tr>
                                                                        <td class="bedNumber"><?php echo $row2->bed_number; ?></td>
                                                                        <td>
                                                                            <select class="form-control bedType" id="bedType-${count}">
                                                                                <option <?= $row2->bed_status == 'Available' ? ' selected="selected"' : ''; ?>>Available</option>
                                                                                <option <?= $row2->bed_status == 'Occupied' ? ' selected="selected"' : ''; ?>>Occupied</option>
                                                                                <option <?= $row2->bed_status == 'For Cleaning' ? ' selected="selected"' : ''; ?>>For Cleaning</option>
                                                                                <option <?= $row2->bed_status == 'For Repair' ? ' selected="selected"' : ''; ?>>For Repair</option>
                                                                            </select>
                                                                        </td>
                                                                        <td><input class="radioInput" data-bed_id="<?php echo $row2->bed_id; ?>" type="checkbox"></td>

                                                                        <!-- Add more bed rows here -->
                                                                    </tr>
                                                                <?php
                                                                } ?>
                                                            </tbody>
                                                        </table>
                                                        <div>
                                                            <!-- <button type="button" class="btn btn-danger my-2">Add</button> -->
                                                            <button type="button" id="addBed" class="btn btn-danger my-2">Add</button>
                                                            <button type="button" id="deleteBed" class="btn btn-danger my-2">Delete</button>
                                                        </div>
                                                    </div>

                                                    <!-- Right Column -->
                                                    <div class="col-md-6">
                                                        <!-- Second Table - Price -->
                                                        <table class="table table-bordered toggle-circle mb-0 table-sm">
                                                            <thead class="text-center">
                                                                <h3 class="text-center" style="font-size:medium;font-family: Nunito,sans-serif;">Price Schemes</h3>
                                                            </thead>
                                                            <?php
                                                            /*
                                                *get details of allpatients
                                                *
                                            */
                                                            $ret = "SELECT * FROM  his_beds WHERE room_id = ?";
                                                            //sql code to get to ten docs  randomly
                                                            $stmt = $mysqli->prepare($ret);
                                                            $stmt->bind_param('s', $row->room_id);
                                                            $stmt->execute(); //ok
                                                            $res = $stmt->get_result();
                                                            $cnt = 1;
                                                            while ($row2 = $res->fetch_object()) {
                                                            }
                                                            ?>
                                                            <thead class="table-danger">
                                                                <tr>
                                                                    <th>Price Category</th>
                                                                    <th>Price Amount</th>
                                                                    <!-- Add more price-related columns here -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>


                                                                <tr>
                                                                    <td>Room-in Price</td>
                                                                    <td><input type="number" class="form-control small-input" id="roomIn_price_temp" name="roomIn_price" value="<?php echo $row->roomIn_price ?>"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <button type="submit" name="update_rooms" class="ladda-button btn maroon-outline-btn my-3" data-style="expand-right">Update Room</button>
                                            </div>


                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    <?php } ?>

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


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js-->
    <script src="assets/js/app.min.js"></script>

    <!-- Loading buttons js -->
    <script src="assets/libs/ladda/spin.js"></script>
    <script src="assets/libs/ladda/ladda.js"></script>

    <!-- Buttons init js-->
    <script src="assets/js/pages/loading-btn.init.js"></script>

    <script>
        $(document).ready(function() {
            var deletedBeds = [];

            var nextNum = 1
            $("#addBed").click(function() {
                const table = $("#listOfBeds tbody");
                console.log("add bed!")

                // Increment the bed count
                const lastChild = $("#listOfBeds tbody tr:last-child")
                nextNum = 1
                if (lastChild) {
                    var bed = lastChild.find(".bedNumber").text()
                    if (bed) {
                        var bedNameArr = bed.split("-")
                        nextNum = parseInt(bedNameArr[bedNameArr.length - 1]) + 1
                    }
                }

                const type = $("#room_number").val();
                if (!type) {
                    alert("Please input Room Number first");
                } else {
                    table.append(
                        `
                        <tr>
                            <td class="bedNumber">${type} - ${nextNum}</td>
                            <td class="bedStatus">
                                <select class="form-control bedType" data-bed="${nextNum}">
                                    <option>Available</option>
                                    <option>Occupied</option>
                                    <option>For Cleaning</option>
                                    <option>For Repair</option>
                                </select>
                            </td>
                            <td><input class="radioInput" type="checkbox"></td>
                        </tr>
                `
                    );
                    updateNumberOfBeds();
                    saveValues();
                }
            });

            // Add an event listener for changes on bedType select elements
            $(document).on("change", ".bedType", function() {
                if ($(this).val() == "Occupied") {
                    alert("Bed status cannot be changed to occupied");
                    $(this).val("Available");
                }
                saveValues();
            });

            function updateNumberOfBeds() {
                $("#room_beds_number").val($("#listOfBeds tbody").children().length);
            }

            function saveValues() {
                let beds = [];
                $("#listOfBeds tbody tr").each(function(index) {
                    if (!$(this).find(".radioInput").data("bed_id")) {
                        const bed = {
                            bed_number: $(this).find(".bedNumber").text(),
                            bed_status: $(this).find(".bedStatus").find("select").val()
                        }
                        beds.push(bed);
                    }
                });
                $("#new_beds").val(JSON.stringify(beds));
            }

            $("#deleteBed").click(function() {
                $("#listOfBeds tbody tr").each(function() {
                    const radio = $(this).find(".radioInput");
                    const isChecked = radio.is(":checked");

                    if (isChecked) {
                        if (radio.data("bed_id")) {
                            deletedBeds.push(radio.data("bed_id"))
                            $("#beds").val(JSON.stringify(deletedBeds))
                        }
                        $(this).remove();
                        updateNumberOfBeds();
                        saveValues();

                    }
                });
            });

            $("#room_number").change(function() {
                $("#room_station").val($(this).val());
            });
        });
    </script>

</body>

</html>