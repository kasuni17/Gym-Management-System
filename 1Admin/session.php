<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['adminid'])) {
    header("location: loginAdmin.php");
    // exit();
}
$session_id = $_SESSION['adminid'];
$session_id = $_SESSION["username"];
