<?php
session_start();
unset($_SESSION['sup_id']);
session_destroy();

header("Location: his_supadmin_logout.php");
exit;
