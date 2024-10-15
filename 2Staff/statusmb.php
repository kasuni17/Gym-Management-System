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

    <title>ICBT VIP GYM - Member Status</title>
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

            <li class="active">
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
                    <h1>Member Status</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="statusmb.php">Member Status</a>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- css -->

            <div id="content">
                <div id="content-header">
                    <br>
                    <h1 class="text-center" style="text-align:center; font-size: 40px;">Member's Current Status <i class="fas fa-eye"></i></h1>
                </div>
                <div class="container-fluid">

                    <div class="row-fluid">
                        <div class="span12">

                            <div class='widget-box'>

                                <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
                                    <br>
                               
                                </div>
                                <div class='widget-content nopadding'>

                                    <?php

                                    include "dbcon.php";
                                    $qry = "SELECT * FROM members";
                                    $cnt = 1;
                                    $result = mysqli_query($conn, $qry);


                                    echo "<table class='table table-bordered table-hover data-table'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Fullname</th>
                  <th>Contact Number</th>
                  <th>Choosen Service</th>
                  <th>Plan</th>
                  <th>Membership Status</th>
                </tr>
              </thead>";

                                    while ($row = mysqli_fetch_array($result)) { ?>

                                        <tbody>

                                            <td>
                                                <div class='text-center'><?php echo $cnt; ?></div>
                                            </td>
                                            <td>
                                                <div class='text-center'><?php echo $row['fullname']; ?></div>
                                            </td>
                                            <td>
                                                <div class='text-center'><?php echo $row['contact']; ?></div>
                                            </td>
                                            <td>
                                                <div class='text-center'><?php echo $row['services']; ?></div>
                                            </td>
                                            <td>
                                                <div class='text-center'><?php echo $row['plan']; ?> Month/s</div>
                                            </td>
                                            <td>
                                                <div class='text-center'><?php if ($row['status'] == 'Active') {
                                                                                echo '<i class="fas fa-circle" style="color:green;"></i> Active';
                                                                            } else if ($row['status'] == 'Expired') {
                                                                                echo '<i class="fas fa-circle" style="color:red;"></i> Expired';
                                                                            } else {
                                                                                echo '<i class="fas fa-circle" style="color:orange;"></i> Pending Reg';
                                                                            } ?></div>
                                            </td>

                                        </tbody>
                                    <?php
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
    <style>
        table {
        border-collapse: collapse;
        width: 80%;
        margin: -5px;
        }
        th,td {
        padding: 15px;
        text-align: center;
        border: 1px solid #505050;
        }
        th{
        text-align: left;
        }
        </style>

</body>

</html>