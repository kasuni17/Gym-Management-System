<?php
session_start();

// unset($_SESSION["user_id"]);
// header('location:../index.php');

if (session_destroy()) {

    header('location:../index.php');
}
