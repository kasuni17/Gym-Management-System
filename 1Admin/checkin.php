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

    <title>ICBT VIP GYM - Check In / Check Out</title>
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
                    <h1>Check In / Check Out</h1>
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
                            <a class="active" href="checkin.php">Check In / Check Out</a>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- css -->

            <div id="content2">
                <div id="content2-header">
                    <h1 class="text-center" style="text-align:center; font-size: 40px;">Attendance List <i
                            class="fas fa-calendar"></i></h1>
                </div>
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span12">

                            <div class='widget-box'>
                                <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
                                    <h5 style="margin:15px; font-size: 16px;">Attendance Table</h5>
                                </div>
                                <div class='widget-content nopadding'>


                                    <table class='table table-bordered table-hover'>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Fullname</th>
                                                <th>Contact Number</th>
                                                <th>Choosen Service</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <?php include "dbcon.php";
                                        date_default_timezone_set('Asia/Colombo');
                                        //$current_date = date('Y-m-d h:i:s');
                                        $current_date = date('Y-m-d h:i A');
                                        $exp_date_time = explode(' ', $current_date);
                                        $todays_date =  $exp_date_time['0'];
                                        $qry = "SELECT * FROM members WHERE status = 'Active'";
                                        $result = mysqli_query($conn, $qry);
                                        $i = 1;
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
                                                <div class='text-center'><?php echo $row['contact']; ?></div>
                                            </td>
                                            <td>
                                                <div class='text-center'><?php echo $row['services']; ?></div>
                                            </td>

                                            <!-- <span>count</span><br>CHECK IN</td> -->
                                            <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">

                                            <?php
                                                $qry = "SELECT * FROM attendance WHERE curr_date = '$todays_date' AND user_id = '" . $row['user_id'] . "'";
                                                $res = $conn->query($qry);
                                                $num_count  = mysqli_num_rows($res);
                                                $row_exist = mysqli_fetch_array($res);
                                                $curr_date = isset($row_exist['curr_date']);
                                                // $curr_date = $row_exist['curr_date'];
                                                if ($curr_date == $todays_date) {

                                                ?>
                                            <td>
                                                <div class='text-center'><span
                                                        class="label label-inverse"><?php echo $row_exist['curr_date']; ?>
                                                        <?php echo $row_exist['curr_time']; ?></span></div>
                                                <div class='text-center'><a
                                                        href='deleteAttendance.php?id=<?php echo $row['user_id']; ?>'><button
                                                            class='btn-danger'>Check Out <i
                                                                class='fas fa-clock'></i></button> </a></div>
                                            </td>

                                            <?php

                                                } else {

                                                ?>

                                            <td>
                                                <div class='text-center'><a
                                                        href='checkAttendance.php?id=<?php echo $row['user_id']; ?>'><button
                                                            class='btn-info'>Check In <i
                                                                class='fas fa-map-marker-alt'></i></button> </a></div>
                                            </td>

                                            <?php }
                                                ?>
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
</body>
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
    text-align: left;
}

.btn-info {
    border: none;
    padding: 10px;
    border-radius: 8px;
    width: 180px;
    height: 50px;
    background: #1a1a47;
    color: #fff;
    font-size: 20px;
    -webkit-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    -moz-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);

}

.btn-danger {
    border: none;
    padding: 10px;
    border-radius: 8px;
    width: 180px;
    height: 50px;
    background: #8B0000;
    color: #fff;
    font-size: 20px;
    -webkit-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    -moz-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);

}
</style>

</html>