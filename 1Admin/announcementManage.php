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

    <title>ICBT VIP GYM - Announcements</title>
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
                    <h1>Manage Announcements</h1>
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
                    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> </a> <a href="#" class="current"></a> </div>
                    <h1 class="text-center"> <i class="fas fa-bullhorn"></i></h1>
                    <br>
                </div>
                <div class="container-fluid">

                    <div class="row-fluid">
                        <div class="span12">

                            <div class='widget-box'>
                                <div class='widget-title'> <span class='icon'> <i class='fas fa-bullhorn'></i> </span>
                                    <h5 style="text-align:center; font-size: 40px;">Announcement Table</h5>
                                </div>
                                <div class='widget-content nopadding'>

                                    <?php

                                    include "dbcon.php";
                                    $qry = "select * from announcements";
                                    $cnt = 1;
                                    $result = mysqli_query($conn, $qry);


                                    echo "<table class='table table-bordered table-hover'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Message</th>
                  <th>Manage</th>
                </tr>
              </thead>";

                                    while ($row = mysqli_fetch_array($result)) {

                                        echo "<tbody> 
               
                <td><div class='text-center'>" . $cnt . "</div></td>
                <td><div class='text-center'>" . $row['date'] . "</div></td>
                <td><div class='text-center'>" . $row['message'] . "</div></td>
                <td><div class='text-center'><a href='announcementRemove.php?id=" . $row['announcementid'] . "' style='color:#F66;' ><i class='fas fa-trash'></i> Remove</a></div></td>
                
              </tbody>";
                                        $cnt++;
                                    }
                                    ?>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="js/script.js"></script>
</body>
<style>
    table {
        border-collapse: collapse;
        width: 130%;
        margin: 25px;
    }

    th,
    td {
        padding: 15px;
        text-align: center;
        border: 1px solid #505050;
    }

    th {
        text-align: left;
    }
</style>

</html>