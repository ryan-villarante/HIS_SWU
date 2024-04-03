<?php
session_start();
include 'backend/admin/assets/inc/config.php';
//get configuration file
if (isset($_POST['user_login'])) {
    $user_number = $_POST['user_number'];
    $user_pwd = sha1(md5($_POST['user_pwd'])); //double encrypt to increase security
    $stmt = $mysqli->prepare("SELECT user_number, user_pwd, user_id FROM his_user WHERE  user_number=? AND user_pwd=? AND user_dept='Pharmacist'"); //sql to log in user
    $stmt->bind_param('ss', $user_number, $user_pwd); //bind fetched parameters
    $stmt->execute(); //execute bind
    $stmt->bind_result($user_number, $user_pwd, $user_id); //bind result
    $rs = $stmt->fetch();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_number'] = $user_number; //Assign session to user_number id
    // $_SESSION['user_dept'] = $user_dept;
    //$uip=$_SERVER['REMOTE_ADDR'];
    //$ldate=date('d/m/Y h:i:s', time());
    if ($rs) { //if its sucessfull
        header("location:backend/pharma/his_pharma_dashboard.php");
    } else {
        #echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
        $err = "Access Denied Please Check Your Credentials";
    }
}
if (isset($_POST['user_login'])) {
    $user_number = $_POST['user_number'];
    $user_pwd = sha1(md5($_POST['user_pwd'])); //double encrypt to increase security
    $stmt = $mysqli->prepare("SELECT user_number, user_pwd, user_id FROM his_user WHERE  user_number=? AND user_pwd=? AND user_dept='Nurse'"); //sql to log in user
    $stmt->bind_param('ss', $user_number, $user_pwd); //bind fetched parameters
    $stmt->execute(); //execute bind
    $stmt->bind_result($user_number, $user_pwd, $user_id); //bind result
    $rs = $stmt->fetch();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_number'] = $user_number; //Assign session to user_number id
    // $_SESSION['user_dept'] = $user_dept;
    //$uip=$_SERVER['REMOTE_ADDR'];
    //$ldate=date('d/m/Y h:i:s', time());
    if ($rs) { //if its sucessfull
        header("location:backend/nurse/his_nurse_dashboard.php");
    } else {
        #echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
        $err = "Access Denied Please Check Your Credentials";
    }
}


if (isset($_POST['user_login'])) {
    $user_number = $_POST['user_number'];
    $user_pwd = sha1(md5($_POST['user_pwd'])); //double encrypt to increase security
    $stmt = $mysqli->prepare("SELECT user_number, user_pwd, user_id FROM his_user WHERE  user_number=? AND user_pwd=? AND user_dept='Cashier'"); //sql to log in user
    $stmt->bind_param('ss', $user_number, $user_pwd); //bind fetched parameters
    $stmt->execute(); //execute bind
    $stmt->bind_result($user_number, $user_pwd, $user_id); //bind result
    $rs = $stmt->fetch();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_number'] = $user_number; //Assign session to user_number id
    // $_SESSION['user_dept'] = $user_dept;
    //$uip=$_SERVER['REMOTE_ADDR'];
    //$ldate=date('d/m/Y h:i:s', time());
    if ($rs) { //if its sucessfull

        // Set session variables
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_number'] = $user_number;


        header("location:backend/billing/his_billing_dashboard.php");
    } else {
        #echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
        $err = "Access Denied Please Check Your Credentials";
    }
}



if (isset($_POST['user_login'])) {
    $user_number = $_POST['user_number'];
    $user_pwd = sha1(md5($_POST['user_pwd'])); //double encrypt to increase security
    $stmt = $mysqli->prepare("SELECT user_number, user_pwd, user_id FROM his_user WHERE  user_number=? AND user_pwd=? AND user_dept='Medtech'"); //sql to log in user
    $stmt->bind_param('ss', $user_number, $user_pwd); //bind fetched parameters
    $stmt->execute(); //execute bind
    $stmt->bind_result($user_number, $user_pwd, $user_id); //bind result
    $rs = $stmt->fetch();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_number'] = $user_number;
    // $_SESSION['user_dept'] = $user_dept;

    //$uip=$_SERVER['REMOTE_ADDR'];
    //$ldate=date('d/m/Y h:i:s', time());
    if ($rs) { //if its sucessfull
        header("location:backend/medtech/his_medtech_dashboard.php");
    } else {
        #echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
        $err = "Access Denied Please Check Your Credentials";
    }
}

if (isset($_POST['user_login'])) {
    $user_number = $_POST['user_number'];
    $user_pwd = sha1(md5($_POST['user_pwd'])); //double encrypt to increase security
    $stmt = $mysqli->prepare("SELECT user_number, user_pwd, user_id FROM his_user WHERE  user_number=? AND user_pwd=? AND user_dept='Receptionist'"); //sql to log in user
    $stmt->bind_param('ss', $user_number, $user_pwd); //bind fetched parameters
    $stmt->execute(); //execute bind
    $stmt->bind_result($user_number, $user_pwd, $user_id); //bind result
    $rs = $stmt->fetch();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_number'] = $user_number; //Assign session to user_number id
    // $_SESSION['user_dept'] = $user_dept;
    //$uip=$_SERVER['REMOTE_ADDR'];
    //$ldate=date('d/m/Y h:i:s', time());
    if ($rs) { //if its sucessfull
        header("location:backend/infostaff/his_doc_dashboard.php");
    } else {
        #echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
        $err = "Access Denied Please Check Your Credentials";
    }
}



if (isset($_POST['user_login'])) {
    $ad_email = $_POST['user_number'];
    $ad_pwd = sha1(md5($_POST['user_pwd']));
    $stmt = $mysqli->prepare("SELECT ad_email ,ad_pwd , ad_id FROM his_admin WHERE ad_email=? AND ad_pwd=? ");
    $stmt->bind_param('ss', $ad_email, $ad_pwd); //bind fetched parameters
    $stmt->execute(); //execute bind
    $stmt->bind_result($ad_email, $ad_pwd, $ad_id); //bind result
    $rs = $stmt->fetch();
    $_SESSION['ad_id'] = $ad_id; //Assign session to admin id
    $_SESSION['ad_email'] = $ad_email;
    if ($rs) { //if its sucessfull
        $_SESSION['ad_id'] = $ad_id;
        $_SESSION['ad_email'] = $ad_email;

        header("location:backend/admin/his_admin_dashboard.php");
    } else {
        $err = "Access Denied Please Check Your Credentials";
    }
}
if (isset($_POST['user_login'])) {
    $sup_email = $_POST['user_number'];
    $sup_pwd = $_POST['user_pwd'];
    $stmt = $mysqli->prepare("SELECT sup_email ,sup_pwd , sup_id FROM his_supadmin WHERE sup_email=? AND sup_pwd=? ");
    $stmt->bind_param('ss', $sup_email, $sup_pwd); //bind fetched parameters
    $stmt->execute(); //execute bind
    $stmt->bind_result($sup_email, $sup_pwd, $sup_id); //bind result
    $rs = $stmt->fetch();
    $_SESSION['sup_id'] = $sup_id; //Assign session to admin id
    //$uip=$_SERVER['REMOTE_ADDR'];
    //$ldate=date('d/m/Y h:i:s', time());
    if ($rs) { //if its sucessfull
        header("location:backend/supadmin/his_supadmin_dashboard.php");
    } else {
        #echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
        $err = "Access Denied Please Check Your Credentials";
    }
}
?>
<!--End Login-->





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Hospital Information System -A Super Responsive Information System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="NilvelCasptone" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="backend/infostaff/assets/images/favicon.ico">

    <!-- App css -->
    <link href="backend/infostaff/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="backend/infostaff/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="backend/infostaff/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script/feedback.js"></script>
    <!--Load Sweet Alert Javascript-->

    <script src="backend/infostaff/assets/js/swal.js"></script>
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
                    swal("Failed", "<?php echo $err; ?>", "error");
                },
                100);
        </script>

    <?php } ?>



</head>

<body class="authentication-bg authentication-bg-pattern">



    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <a href="index.php">
                                    <span><img src="backend/infostaff/assets/images/logo.png" alt="" height="80"></span>
                                </a>
                                <p class=" mb-3 mt-2">HOSPITAL INFORMATION SYSTEM</p>
                                <p class="text-muted mb-4 mt-3">Enter your Credentials to access Admin or User panel</p>
                            </div>

                            <form method='post'>

                                <div class="form-group mb-3">
                                    <label for="emailaddress">Username or Email</label>
                                    <input class="form-control" name="user_number" type="text" id="emailaddress" required="" placeholder="Enter your user id or user email">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control" name="user_pwd" type="password" required="" id="password" placeholder="Enter your password">
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" name="user_login" type="submit"> Log In </button>
                                    <!-- style="background-color: #800;border-color:black;" -->
                                </div>

                            </form>

                            <!--
                                For Now Lets Disable This
                                This feature will be implemented on later versions
                                <div class="text-center">
                                    <h5 class="mt-3 text-muted">Sign in with</h5>
                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                -->

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <!-- <p> <a href="backend/doc/his_doc_reset_pwd.php" class="text-white-50 ml-1">Forgot your password?</a></p> -->
                            <!-- <p class="text-white-50">Don't have an account? <a href="his_admin_register.php" class="text-white ml-1"><b>Sign Up</b></a></p>-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->




    <!-- Vendor js -->
    <script src="backend/infostaff/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="backend/infostaff/assets/js/app.min.js"></script>

</body>

</html>