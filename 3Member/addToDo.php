<?php
session_start();

if (!isset($_SESSION["fullname"])) {
    header("location:loginMember.php");
}
$userId = $_SESSION["user_id"];
$userName = $_SESSION['fullname'];

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Add ToDo List </title>

</head>

<body>


    <div class="row-fluid">
        <form role="form" action="" method="POST">
            <?php

            include 'session.php';

            if (isset($_POST['task_desc'])) {
                $task_status = $_POST["task_status"];
                $task_desc = $_POST["task_desc"];
                // $_SESSION["user_id"] = $row["user_id"];
                $user_id = $_SESSION["user_id"];
                include 'dbcon.php';

                //code after connection is successfull
                $qry = "insert into todo(task_status,task_desc,user_id) values ('$task_status','$task_desc','$user_id')";
                $result = mysqli_query($conn, $qry); //query executes

                if (!$result) {

                    echo '<script>alert("Error occured while entering your details !")</script>';
                    echo '<script>window.location.href = "toDo.php";</script>';
                } else {

                    echo '<script>alert("Your task has been added !")</script>';
                    echo '<script>window.location.href = "index.php";</script>';
                }
            } else {
                echo "<h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='index.php'> DASHBOARD </a></h3>";
            }

            ?>
        </form>


    </div><!-- End of row-fluid -->







</body>

</html>