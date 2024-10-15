<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['username'])) {
    header("location: loginSaff.php");
    // exit();
}
$session_id = $_SESSION['username'];
$session_id = $_SESSION["staffid"];
