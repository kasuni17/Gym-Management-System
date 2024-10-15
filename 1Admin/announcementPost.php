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

    <title>ICBT VIP GYM</title>
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
            <li>
                <a href="progressmb.php">
                    <i class='bx bx-trending-up'></i>
                    <span class="text">Member progress</span>
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

            <li class="active">
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
                  <!--  <h1>Error</h1>-->
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="announcement.php">Announcements</a>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- css -->


            <div id="content">
                <div id="content-header">
                    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i></a> <a href="#" class="current"></a> </div>
                    <h1>Announcement</h1>
                </div>
                <form role="form" action="index.php" method="POST">
                    <?php

                    if (isset($_POST['message'])) {
                        $message = $_POST["message"];
                        $date = $_POST["date"];

                        include 'dbcon.php';
                        $qry = "insert into announcements(message,date) values ('$message','$date')";
                        $result = mysqli_query($conn, $qry);

                        if (!$result) {
                            echo "<div class='container-fluid'>";
                            echo "<div class='row-fluid'>";
                            echo "<div class='span12'>";
                            echo "<div class='widget-box'>";
                            echo "<div class='widget-title'> <span class='icon'> <i class='fas fa-info'></i> </span>";
                            echo "<h5>Error Message</h5>";
                            echo "</div>";
                            echo "<div class='widget-content'>";
                            echo "<div class='error_ex'>";
                            echo "<h1 style='color:maroon;'>Error 404</h1>";
                            echo "<h3>Error occured while entering your details</h3>";
                            echo "<p>Please Try Again</p>";
                            echo "<a class='btn btn-warning btn-big'  href='edit-member.php'>Go Back</a> </div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        } else {
                            echo '<script>alert("Announcement added successfuly!")</script>';
                            echo ("<script>location.href = 'index.php';</script>");
                        }
                    } else {
                        echo "<h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='index.php'> DASHBOARD </a></h3>";
                    }

                    ?>

                </form>
          


        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="js/script.js"></script>
</body>

</html>