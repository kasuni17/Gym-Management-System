<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: loginStaff.php");
    // exit();
}
$session_id = $_SESSION['username'];
$session_id = $_SESSION["staffid"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>ICBT VIP GYM - Update Member Details</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
        <i class='bx bx-dumbbell bx-tada' ></i>
            <span class="text">ICBT VIP GYM</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="index.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="managemb.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">Manage Members</span>
                </a>
                </div>
            </li>
            <li>
                <a href="managegym.php">
                    <i class='bx bxs-trophy'></i>
                    <span class="text">Gym Equipment</span>
                </a>
            </li>
            <li>
                <a href="attendance.php">
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">Attendance</span>
                </a>
            </li>

            <li>
                <a href="statusmb.php">
                    <i class='bx bxs-analyse'></i>
                    <span class="text">Member Status</span>
                </a>
            </li>

            <li>
                <a href="paymentmb.php">
                    <i class='bx bxs-dollar-circle'></i>
                    <span class="text">Payments</span>
                </a>
            </li>


        </ul>
        <ul class="side-menu">
           
            <li>

                <a href="../logout.php" class="logout">
                    <i class='bx bxs-arrow-to-left'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>

    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a class="nav-link">Welcome User!</a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Update Member Details</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="managemb.php">Manage Members</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="updatemb.php">Update Member Details</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- css -->

            <div id="content">
                <div id="content-header">
                    <h1>Update Member Details</h1>
                </div>
                <form role="form" action="" method="POST">
                    <?php

                    if (isset($_POST['fullname'])) {
                        $fullname = $_POST["fullname"];
                        $email = $_POST["email"];
                        $dor = $_POST["dor"];
                        $gender = $_POST["gender"];
                        $services = $_POST["services"];
                        $amount = $_POST["amount"];
                        $plan = $_POST["plan"];
                        $address = $_POST["address"];
                        $contact = $_POST["contact"];
                        $id = $_POST["id"];

                        $totalamount = $amount * $plan;

                        //noteee--- amount should be 0

                        include 'dbcon.php';
                        $qry = "update members set fullname='$fullname', email='$email',dor='$dor', gender='$gender', services='$services', amount='$totalamount', plan='$plan', address='$address', contact='$contact' where user_id='$id'";
                        $result = mysqli_query($conn, $qry);

                        if (!$result) {

                            echo '<script>alert("Error occured while updating your details !")</script>';
                            echo '<script>window.location.href = "updatemb.php";</script>';
                        } else {

                            echo '<script>alert("Member details has been updated !")</script>';
                            echo '<script>window.location.href = "managemb.php";</script>';
                        }
                    } else {
                        echo "<h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='index.php'> DASHBOARD </a></h3>";
                    }
                    ?>


                </form>
            </div>
            </div>
            </div>
            </div>


        </main>
    </section>
</body>

</html>