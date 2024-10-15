<?php

// session_start();
// //the isset function to check username is already loged in and stored on the session
// if(!isset($_SESSION['user_id'])){
// header('location:../index.php');	
// }

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    include 'dbcon.php';


    $qry = "delete from announcements where announcementid=$id";
    $result = mysqli_query($conn, $qry);

    if ($result) {
        echo '<script>alert("Announcement Deleted !")</script>';
        echo '<script>window.location.href = "index.php";</script>';
    } else {
        echo "ERROR!!";
    }
}