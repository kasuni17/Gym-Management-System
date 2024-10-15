<?php
session_start();
if (!isset($_SESSION['adminid'])) {
    header("location: loginAdmin.php");
    // exit();
}
$session_id = $_SESSION['adminid'];
$session_id = $_SESSION["username"];
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

    <title>ICBT VIP GYM - Member Progress</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
        <i class='bx bx-dumbbell bx-tada' ></i>
            <span class="text">ICBT VIP GYM </span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="index.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
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
            <li class="active">
                <a href="progressmb.php">
                    <i class='bx bx-trending-up'></i>
                    <span class="text">Member Progress</span>
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

            <li>
                <a href="announcement.php">
                    <i class='bx bxs-bell'></i>
                    <span class="text">Announcement</span>
                </a>
            </li>

            <li>
                <a href="managestaff.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">Staff Management</span>
                </a>
            </li>

            <li>
                <a href="report.php">
                    <i class='bx bxs-report'></i>
                    <span class="text">Reports</span>
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
            <a class="nav-link">Welcome Admin!</a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Member Progress</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="progressmb.php">Member Progress</a>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- css -->


            <form role="form" action="index.php" method="POST">
                <?php

                if (isset($_POST['ini_weight'])) {
                    $ini_weight = $_POST["ini_weight"];
                    $curr_weight = $_POST["curr_weight"];
                    $ini_bodytype = $_POST["ini_bodytype"];
                    $curr_bodytype = $_POST["curr_bodytype"];
                    $id = $_POST['id'];

                    include 'dbcon.php';
                    date_default_timezone_set('Asia/Colombo');
                    //$current_date = date('Y-m-d h:i:s');
                    $current_date = date('Y-m-d h:i A');
                    $exp_date_time = explode(' ', $current_date);
                    $curr_date =  $exp_date_time['0'];
                    $curr_time =  $exp_date_time['1'] . ' ' . $exp_date_time['2'];

                    $qry = "update members set ini_weight='$ini_weight', curr_weight='$curr_weight', ini_bodytype='$ini_bodytype', curr_bodytype='$curr_bodytype', progress_date='$curr_date' where user_id='$id'";
                    $result = mysqli_query($conn, $qry);

                    if (!$result) {

                        echo '<script>alert("Error occured while updating your details !")</script>';
                        echo '<script>window.location.href = "progressmbUpdate.php";</script>';
                    } else {

                        echo '<script>alert("Changes Done Successfully! ")</script>';
                        echo '<script>window.location.href = "progressmb.php";</script>';
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
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <!-- <script src="js/script.js"></script> -->
</body>

</html>