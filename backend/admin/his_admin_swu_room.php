<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['ad_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteRecordId'])) {
    $id = intval($_POST['deleteRecordId']);

    // Delete related rows in his_beds table
    $delete_beds_query = "DELETE FROM his_beds WHERE room_id = ?";
    $stmt_beds = $mysqli->prepare($delete_beds_query);
    $stmt_beds->bind_param('i', $id);
    $stmt_beds->execute();
    $stmt_beds->close();

    // Now you can safely delete the room from his_rooms_beds
    $delete_room_query = "DELETE FROM his_rooms_beds WHERE room_id = ?";
    $stmt_room = $mysqli->prepare($delete_room_query);
    $stmt_room->bind_param('i', $id);
    $stmt_room->execute();
    $stmt_room->close();

    if ($stmt_room) {
        $success = "Room successfully deleted";
    } else {
        $err = "Room not found or could not be deleted";
    }
}
?>


<?php
include('assets/inc/config.php');
if (isset($_POST['add_rooms'])) {
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



    //sql to insert captured values
    $query = "INSERT INTO his_rooms_beds (room_bldg, room_bname, room_fname, room_number, room_status, room_beds_number, room_classification,room_station,room_fea,roomIn_price) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssssssss', $room_bldg, $room_bname, $room_fname, $room_number, $room_status, $room_beds_number, $room_classification, $room_station, $room_fea, $roomIn_price);
    $stmt->execute();

    $room_id = $mysqli->insert_id;

    $beds = json_decode($_POST['beds']);

    if ($beds) {
        for ($i = 0; $i < count($beds); $i++) {

            $bed = $beds[$i];
            $hisBedQuery = "INSERT INTO his_beds (bed_number, bed_status, room_id) VALUES (?, ?, ?)";


            $stmt2 = $mysqli->prepare($hisBedQuery);
            $stmt2->bind_param('sss', $bed->bed_number, $bed->bed_status, $room_id);
            $stmt2->execute();
        }
    }


    /*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Room Added";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}
?>

<?php
// include('assets/inc/config.php');
// if (isset($_POST['add_beds'])) {
//     $bed_number = $_POST['bed_number'];
//     $bed_status = $_POST['bed_status'];


//     //sql to insert captured values
//     $query = "INSERT INTO his_beds (bed_number,bed_status) VALUES (?,?)";
//     $stmt = $mysqli->prepare($query);
//     $rc = $stmt->bind_param('ss', $bed_number, $bed_status);
//     $stmt->execute();
/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
//declare a varible which will be passed to alert function
// if ($stmt) {
//     $success = "Room Added";
// } else {
//     $err = "Please Try Again Or Try Later";
// }
// }
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

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Rooms and Beds</a></li>

                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end page title -->

                    <div class="row">

                        <div class="col-15">
                            <div class="card-box">




                                <div class="col-md-12 d-flex justify-content-start">
                                    <!-- Trigger the modal with a button -->
                                    <button type="button" class="	fa fa-plus lg-2 bi-plus btn maroon-outline-btn btn-lg-2 " data-toggle="modal" data-target="#myModal"> Add New </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog modal-xl">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header ">
                                                    Fill all fields
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <!--Add Patient Form-->
                                                        <form method="post">
                                                            <div class="form-row required">
                                                                <div class="form-group col-md-5">
                                                                    <label for="inputState" class="col-form-label">Branch Name</label>
                                                                    <input type="text" value="Main" name="room_bname" class="form-control small-input" id="inputEmail4" readonly>

                                                                    <!-- <select id="inputState" required="required" name="room_bname" class="form-control small-input ">
                                                                        <option>Choose</option>
                                                                        <option>Main</option>
                                                                        <option>Central</option>
                                                                        <option>Minor</option>
                                                                        <option>Secondary</option>
                                                                    </select> -->
                                                                </div>
                                                                <div class="form-group col-md-7">
                                                                    <label for="inputState" class="col-form-label">Building Name</label>
                                                                    <select id="inputState" required="required" name="room_bldg" class="form-control small-input">
                                                                        <option></option>
                                                                        <option>Building 1</option>
                                                                        <option>Building 2</option>
                                                                        <option>Building 3</option>
                                                                        <option>Building 4</option>
                                                                        <option>Building 5</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group col-md-5">
                                                                    <label for="inputState" class="col-form-label">Floor Name</label>
                                                                    <select id="inputState" required="required" name="room_fname" class="form-control small-input">
                                                                        <option></option>
                                                                        <option>Ground Floor</option>
                                                                        <option>2nd Floor</option>
                                                                        <option>3rd East Wing</option>
                                                                        <option>4th East Wing</option>
                                                                        <option>Mezzanine</option>
                                                                        <option>3rd Central Wing</option>
                                                                        <option>4th Central Wing</option>


                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-7">
                                                                    <label for="inputEmail4" class="col-form-label">Room No.</label>
                                                                    <input type="text" required="required" name="room_number" value="" class="form-control small-input" id="room_number">
                                                                </div>
                                                                <div class="form-group col-md-2" style="display: none;">
                                                                    <label for="inputEmail4" class="col-form-label">No. of Beds</label>
                                                                    <input type="number" readonly required="required" value="0" name="room_beds_number" class="form-control small-input " id="room_beds_number">
                                                                </div>
                                                                <div class="form-group col-md-5 ">
                                                                    <label for="inputState" class="col-form-label">Room Status</label>
                                                                    <select id="inputState" required="required" name="room_status" class="form-control small-input">
                                                                        <option></option>
                                                                        <option>Available</option>
                                                                        <option>Occupied</option>
                                                                        <option>Fully Occupied</option>
                                                                        <option>For Renovation</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-5">
                                                                    <label class="col-form-label">Room Classification</label>
                                                                    <select required="required" name="room_classification" id="room_classification" class="form-control small-input">
                                                                        <option></option>
                                                                        <option>EMERGENCY</option>
                                                                        <option>PRIVATE</option>
                                                                        <option>SEMI PRIVATE</option>
                                                                        <option>WARD</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6" style="display: none;">
                                                                    <label for="inputEmail4" class="col-form-label">Nursing Station</label>
                                                                    <input type="text" required="required" name="room_station" class="form-control small-input" id="room_station">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputAddress" class="col-form-label">Room feature</label>
                                                                    <textarea type="text" class="form-control small-input" name="room_fea" id="editor"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-6" style="display: none;">
                                                                    <label for="inputAddress" class="col-form-label">Beds</label>
                                                                    <textarea type="text" class="form-control small-input" name="beds" id="beds"></textarea>
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

                                                                                <!-- Add more bed rows here -->
                                                                            </tbody>
                                                                        </table>
                                                                        <div>
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
                                                                            <thead class="table-danger">
                                                                                <tr>
                                                                                    <th>Price Category</th>
                                                                                    <th>Price Amount</th>
                                                                                    <!-- Add more price-related columns here -->
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>Room in</td>
                                                                                    <td><input type="number" class="form-control small-input" id="roomIn_price_temp" name="roomIn_price" value="0.00"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="modal-footer my-4">

                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" name="add_rooms" class="ladda-button btn btn-primary" data-style="expand-right">Save changes</button>


                                                            </div>

                                                        </form>


                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <form method="post" action="his_admin_swu_room.php">

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


                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-12 text-sm-center form-inline">
                                                <div class="form-group mr-2" style="display:none">
                                                    <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                                        <option value="">Show all</option>
                                                        <option value="Discharged">Discharged</option>
                                                        <option value="OutPatients">OutPatients</option>
                                                        <option value="InPatients">InPatients</option>
                                                    </select>
                                                </div>
                                                <div class="form-group my-2">
                                                    <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="table-responsive ">
                                        <table id="demo-foo-filtering" class="table table-borderless table-hover mb-0 table-sm" data-page-size="7">
                                            <thead class="table-danger">
                                                <tr>
                                                    <th>#</th>
                                                    <th data-toggle="true">Building Name</th>
                                                    <th data-toggle="true">Branch Name</th>
                                                    <th data-hide="phone">Floor Name</th>
                                                    <th data-hide="phone">Room No.</th>
                                                    <th data-hide="phone">No. of Beds</th>
                                                    <th data-hide="phone">Room Status</th>
                                                    <th data-hide="phone">Room Classification</th>
                                                    <th data-hide="phone">Nursing Station</th>
                                                    <th data-hide="phone">Room Feature</th>
                                                    <th data-hide="phone">Action</th>

                                                </tr>
                                            </thead>
                                            <?php
                                            /*
                                                *get details of allpatients
                                                *
                                            */
                                            $ret = "SELECT * FROM  his_rooms_beds  ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            $cnt = 1;
                                            while ($row = $res->fetch_object()) {
                                            ?>

                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td><?php echo $row->room_bldg; ?></td>
                                                        <td><?php echo $row->room_bname; ?></td>
                                                        <td><?php echo $row->room_fname; ?></td>
                                                        <td><?php echo $row->room_number; ?></td>
                                                        <td><?php echo $row->room_beds_number; ?></td>
                                                        <td><?php echo $row->room_status; ?></td>
                                                        <td><?php echo $row->room_classification; ?></td>
                                                        <td><?php echo $row->room_station; ?></td>
                                                        <td><?php echo $row->room_fea; ?></td>
                                                        <td>
                                                            <a href="his_admin_view_room_copy.php?room_id=<?php echo $row->room_id; ?>" class="badge badge-success"><i class="far fa-eye "></i> View</a>
                                                            <a href="his_admin_update_room.php?room_id=<?php echo $row->room_id; ?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                            <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteConfirmationModal" data-recordid="<?php echo $row->room_id; ?>">
                                                                <i class="mdi mdi-trash-can-outline"></i> Delete
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            <?php $cnt = $cnt + 1;
                                            } ?>
                                            <tfoot>
                                                <tr class="active">
                                                    <td colspan="11">
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
                            </div> <!-- end card-box -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

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


    <!-- Footable js -->
    <script src="assets/libs/footable/footable.all.min.js"></script>

    <!-- Init js -->
    <script src="assets/js/pages/foo-tables.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.badge-danger').click(function() {
                var recordId = $(this).data('recordid');
                console.log("Record ID:", recordId); // Check if the correct ID is printed
                $('#deleteRecordId').val(recordId);
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $("#addBed").click(function() {
                const table = $("#listOfBeds tbody")
                const lastCl = table.find("tr:last-child").attr("id")
                const count = (lastCl ? parseInt(lastCl.split("-")[1]) + 1 : 1)
                const cl = "bed-" + count

                const type = $("#room_number").val();
                const roomClassification = $("#room_classification").val();
                const maxBeds = (roomClassification === "PRIVATE") ? 1 : (roomClassification === "SEMI PRIVATE") ? 3 : (roomClassification === "EMERGENCY") ? 3 : Infinity;


                if (!type) {
                    alert("Please input Room Number first");
                } else if (Number(table.find("tr").length) >= Number(maxBeds)) {
                    alert(`Maximum allowed beds for ${roomClassification} is ${maxBeds}`);
                } else {

                    table.append(
                        `
                            <tr id="${cl}">
                            <td class="bedNumber">${type} - ${count}</td>
                            <td class="bedStatus"><select class="form-control" id="bedType-${count}">
                            <option>Available</option>
                            <option>Occupied</option>
                            <option>For Cleaning</option>
                            <option>For Repair</option>
                            </select></td>
                            <td><input class="radioInput" type="checkbox"></td>
                            </tr>
                        `
                    )
                    updateNumberOfBeds()
                    saveValues()
                }


                $(document).on("change", `#bedType-${count}`, function() {
                    if ($(this).val() == "Occupied") {
                        alert("Bed status cannot be changed to occupied")
                        $(this).val("Available")
                    }
                    saveValues()
                })
            })


            function updateNumberOfBeds() {
                $("#room_beds_number").val($("#listOfBeds tbody tr").length)
            }

            function saveValues() {
                let beds = []
                $("#listOfBeds tbody tr").each(function() {
                    const bed = {
                        bed_number: $(this).find(".bedNumber").text(),
                        bed_status: $(this).find(".bedStatus").find("select").val()
                    }
                    beds.push(bed)
                })
                console.log("beds: ", beds)
                $("#beds").val(JSON.stringify(beds))
            }



            $("#room_classification").change(function() {
                const roomClassification = $(this).val().toUpperCase();
                console.log("Selected Room Classification:", roomClassification);

                const maxBedsInput = $("#room_beds_number");

                if (roomClassification === "PRIVATE") {
                    maxBedsInput.val(1);
                } else if (roomClassification === "EMERGENCY") {
                    maxBedsInput.val(3);
                } else if (roomClassification === "SEMI PRIVATE") {
                    maxBedsInput.val(3);
                } else if (roomClassification === "WARD") {
                    // Set to a large number or use 0 for unlimited
                    maxBedsInput.val(0);
                } else {
                    maxBedsInput.val("");
                }
            });

            $("#deleteBed").click(function() {
                $("#listOfBeds tbody tr").each(function() {
                    const isChecked = $(this).find(".radioInput").is(':checked')
                    if (isChecked) {
                        $(this).remove()
                        updateNumberOfBeds()
                        saveValues()
                    }
                })

            })

            $("#room_number").change(function() {
                $("#room_station").val($(this).val())
            })




        })
    </script>
</body>

</html>