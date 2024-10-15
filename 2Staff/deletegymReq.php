<?php

// session_start();
// //the isset function to check username is already loged in and stored on the session
// if(!isset($_SESSION['user_id'])){
// header('location:../index.php');	
// }

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    include 'dbcon.php';


    $qry = "delete from equipment where eqpid=$id";
    $result = mysqli_query($conn, $qry);

    if ($result) {
        // echo "DELETED";
        // header('Location:deletegym.php');
        echo '<script>alert("Record Deleted !")</script>';
        echo '<script>window.location.href = "deletegym.php";</script>';
    } else {
        echo '<script>alert("ERROR !")</script>';
        echo '<script>window.location.href = "deletegym.php";</script>';
    }
}