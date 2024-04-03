<head>
    <meta charset="utf-8" />
    <title>Hospital Information System -SouthWestern University </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="NilvelCasptone" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Plugins css -->
    <link href="assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- Loading button css -->
    <link href="assets/libs/ladda/ladda-themeless.min.css" rel="stylesheet" type="text/css" />

    <!-- Footable css -->
    <link href="assets/libs/footable/footable.core.min.css" rel="stylesheet" type="text/css" />

    <!-- Include jQuery library (required for your code to work) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>


    <!--Load Sweet Alert Javascript-->
    <script src="assets/js/swal.js"></script>

    <!--Inject SWAL-->
    <?php if (isset($success)) { ?>
        <!--This code for injecting an alert-->
        <script>
            setTimeout(function() {
                    swal("Success", "<?php echo $success; ?>", "success");
                },
                100);
        </script>

    <?php } ?>

    <?php if (isset($err)) { ?>
        <!--This code for injecting an alert-->
        <script>
            setTimeout(function() {
                    swal("Failed", "<?php echo $err; ?>", "Failed");
                },
                100);
        </script>

    <?php } ?>
    <style>
        #sidebar-menu>ul>li>a.active {
            color: #800;
        }

        .nav-pills .nav-link.active {
            background-color: #800;
            /* Maroon background color for the active tab */
            color: #fff !important;
            /* White text color for the active tab */
        }

        .searchContainer {
            margin-bottom: 15px;
        }

        /* Define a class for smaller text and input fields */
        .small-text {
            font-size: 15px;
            /* Adjust the font size as needed */
            text-align: center;
        }

        .small-input {
            font-size: 13px;
            /* Adjust the font size as needed */
            height: 30px;
            /* Adjust the height as needed */
        }

        .margin {
            margin-bottom: 0.5rem;

        }

        .form-control.small-input {
            border: 1px solid;
        }

        .form-control.hehe {
            border: 1px solid;
            border-color: #800;
        }

        .input-group-text.hehe {
            border: 1px solid;
            border-color: #800;

        }

        /* Adjust the width of the tabs */
        .nav-item {
            width: 150px;
            /* You can change this value to your desired width */
        }

        .form-group {
            margin-bottom: 0rem;
        }

        .maroon-outline-btn {
            color: #800;
            /* Text color */
            background-color: transparent;
            /* Transparent background */
            border: 3px solid #800;
            /* Maroon 
            border */
        }

        /* Clicked/toggled state */
        .maroon-outline-btn.active {
            background-color: #800;
            /* Maroon background when clicked */
            color: #fff;
            /* White text color when clicked */
        }

        .maroon-btn {
            background-color: #800;
            /* Maroon background color */
            color: #fff;
            /* White text color */
            border: none;
            /* Remove border if needed */
        }


        .roomsTableRow {
            cursor: pointer;
        }

        .roomsTableRow.active,
        .priceTable.active,
        .bedRow.active {
            background-color: #e9ecf2;
            font-weight: bold;
        }

        #itemsPieChart {
            max-width: 100%;
            max-height: 96%;
        }

        .col-xl-6 canvas#itemsPieChart {
            max-width: 100%;
            /* Make the chart responsive */
            margin-right: auto;
            /* Push the chart to the left */
            margin-left: 0;
            /* Ensure no extra left margin */
        }


        /* Style for the rectangular container div */
        .rectangle-container {
            max-width: 100%;
            /* Make the container responsive */
            padding-bottom: 60%;
            /* Set the aspect ratio for a rectangle (e.g., 3:2) */
            position: relative;
            /* Ensure the canvas is positioned within the container */
        }

        /* Style for the canvas inside the rectangular container */
        .rectangle-container canvas {
            position: absolute;
            /* Position the canvas absolutely within the container */
            top: 0;
            /* Position at the top */
            left: 0;
            /* Position at the left */
            width: 100%;
            /* Fill the container's width */
            height: 100%;
            /* Fill the container's height */
        }

        .graphBox {
            position: relative;
            width: 100%;
            height: 70%;
            padding: 5px;
            display: grid;
            grid-template-columns: 1fr 2fr;
            grid-gap: 10px;
            min-height: 200px;
        }

        .graphBox .box {
            position: relative;
            background: white;
            padding: 5px;
            width: 100%;
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
            border-radius: 20px;

        }

        .form-control.exam {
            border: 1px solid;
            border-color: #800;
            height: 30px;
        }

        .input-group-text.exam {
            border: 1px solid;
            border-color: #800;
            height: 30px;
            background-color: none;

        }

        .form-control.value {
            border: 1px solid;
            border-color: #800;
            height: 30px;
            background-color: #e9ecef;
        }

        .form-control.refs {
            border: none;
            border-color: none;
            height: 30px;
            background-color: none;
        }

        .form-control.ref {
            border: none;
            border-color: none;
            height: 30px;
            background-color: none;
        }

        .card-box-xray {
            border: 1px solid;
            border-color: #d1d1d1;
        }

        .maroon-outline-btn-inpatient {
            color: #800;
            font-weight: 100;
            /* Text color */
            background-color: transparent;
            /* Transparent background */
            border: 0px solid #800;
            /* Maroon 
            border */
        }


        .maroon-outline-btn-tags {
            color: #800;
            background-color: aliceblue;
            border: 1px solid #800;
        }

        .maroon-outline-btn-tag {
            font-size: 15px;
            color: #800;
            background-color: #ffe6fc;
            border: 2px solid #800;
        }

        .for_modal_buttons.selected {
            background-color: #800;
            color: white;
        }

        .container-inpatient {
            width: 103%;
            padding-right: 12px;
            padding-left: 12px;
            margin-right: auto;
            margin-left: auto;

        }

        .card-box-inpatient {

            background-color: #fff;
            padding: 0.5rem;
            -webkit-box-shadow: 0 0.75rem 6rem rgba(56, 65, 74, .03);
            box-shadow: 0 0.75rem 6rem rgba(56, 65, 74, .03);
            margin-bottom: 24px;
            border-radius: 0.25rem;
        }

        .content-page-inpatient {
            margin-left: 220px;
            overflow: hidden;
            padding: 0px 15px 5px 15px;
            min-height: 80vh;
            margin-top: 56px;

        }

        .row-inpatient {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: 5px;
            margin-left: -15px;
        }

        .inpatient-search {
            margin-left: 5%;
        }

        .col-lg-3 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 24%;
        }


        .exam-btn {
            color: #800;
            /* Text color */
            background-color: transparent;
            /* Transparent background */
            border: 2px solid #800;
            /* Maroon 
            border */
            border-radius: 1.15rem;
        }

        li.notif-li {
            height: 70px;
            flex-direction: column;
            align-items: center;
            display: flex;
            color: #fff;
            justify-content: center;
        }

        .notif-cont {
            position: relative;
            font-size: 24px;
            padding: 8px;
        }


        .notif-count {
            position: absolute;
            left: 26px;
            top: 3px;
            background-color: red;
            padding: 1px 4px;
            font-weight: bold;
            font-size: 13px !important;
            z-index: 1;
            border-radius: 45%;
            margin: 0 !important;
        }
    </style>

</head>