<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    include 'dbcon.php';


    $qry = "UPDATE members SET reminder = '1' where user_id=$id";
    $result = mysqli_query($conn, $qry);

    if ($result) {
        echo '<script>alert("Notification sent to selected customer!")</script>';
        echo '<script>window.location.href = "paymentmb.php";</script>';
    } else {
        echo "ERROR!!";
    }
}
