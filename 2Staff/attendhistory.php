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
   
    <title>ICBT VIP GYM - Attendance History</title>
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
            <li class="active">
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
                    <h1>Attendance History</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="attendance.php">Attendance</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="attendhistory.php">Attendance History</a>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- css -->

            <div id="content2">
                <div id="content2-header">
                    <br>
                    <h1 class="text-center" style="text-align:center; font-size: 40px;">Attendance List <i class="fas fa-calendar"></i></h1>
                </div>
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span12">

                            <div class='widget-box'>
                                <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
                                    <h5 style="margin:15px; font-size: 16px;">Attendance Table</h5>
                                </div>
                                <div class='widget-content nopadding'>


                                    <table class='table table-bordered'>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Fullname</th>
                                                <th>Plan</th>
                                                <th>Attendance</th>
                                            </tr>
                                        </thead>

                                        <?php include "dbcon.php";

                                        $qry = "SELECT * FROM members WHERE status = 'Active'";
                                        $result = mysqli_query($conn, $qry);

                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($result)) { ?>

                                            <tbody>

                                                <td>
                                                    <div class='text-center'><?php echo $cnt; ?></div>
                                                </td>
                                                <td>
                                                    <div class='text-center'><?php echo $row['fullname']; ?></div>
                                                </td>
                                                <td>
                                                    <div class='text-center'><?php if ($row['plan'] == 1) {
                                                                                    echo $row['plan'] . ' Months';
                                                                                } else if ($row['plan'] == '0') {
                                                                                    echo 'Expired';
                                                                                } else {
                                                                                    echo $row['plan'] . ' Months';
                                                                                } ?></div>
                                                </td>
                                                <td>
                                                    <div class='text-center'><?php if ($row['attendance_count'] == 1) {
                                                                                    echo $row['attendance_count'] . ' Day';
                                                                                } else if ($row['attendance_count'] == '0') {
                                                                                    echo 'None';
                                                                                } else {
                                                                                    echo $row['attendance_count'] . ' Days';
                                                                                } ?> </div>
                                                </td>
                                            </tbody>
                                        <?php $cnt++;
                                        } ?>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </main>
    </section>
    <style>
        table {
            border-collapse: collapse;
            width: 95%;
            margin: 25px;
        }

        th,
        td {
            padding: 15px;
            text-align: center;
            border: 1px solid #505050;
        }

        th {
            text-align: center;
        }
    </style>
</body>

</html>