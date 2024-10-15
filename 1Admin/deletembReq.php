<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    include 'dbcon.php';


    $qry = "delete from members where user_id=$id";
    $result = mysqli_query($conn, $qry);

    if ($result) {

        echo '<script>alert("Record Deleted !")</script>';
        echo '<script>window.location.href = "deletemb.php";</script>';
    } else {
        echo '<script>alert("ERROR !")</script>';
        echo '<script>window.location.href = "deletemb.php";</script>';
    }
}
