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

    <title>ICBT VIP GYM - Member Report</title>
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

            <li class="active">
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
                    <h1>Member Report</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="report.php">Reports</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="reportMember.php">Member Reports</a>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- css -->


            <div id="content2">
                <div id="content-header">
                    <br>
                    <!-- <h1 class="text-center">Member's Report <i class="fas fa-file"></i></h1> -->
                </div>
                <div class="container-fluid print-container">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="widget-box">
                                <?php
                                include 'dbcon.php';
                                $id = $_GET['id'];
                                $qry = "select * from members where user_id='$id'";
                                $result = mysqli_query($conn, $qry);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>

                                    <div class="widget-content">
                                        <div class="row-fluid">
                                            <div class="span4">
                                                <table class="">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h4>ICBT VIP GYM</h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>No, 363 A9, Kandy </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Tel: 081 477 7888</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email: icbtvipgym@gmail.com</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="span8">
                                                <table class="table table-bordered table-invoice-full">
                                                    <thead>
                                                        <tr>
                                                            <th class="head0">Membership ID</th>
                                                            <th class="head1">Services Taken</th>
                                                            <th class="head0 right">My Plans (Upto)</th>
                                                            <th class="head1 right">Address</th>
                                                            <th class="head0 right">Charge</th>
                                                            <th class="head0 right">Attendance Count</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="text-center">
                                                                    PGC-SS-<?php echo $row['user_id']; ?></div>
                                                            </td>
                                                            <td>
                                                                <div class="text-center"><?php echo $row['services']; ?>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-center"><?php if ($row['plan'] == 0) {
                                                                                                echo 'NONE';
                                                                                            } else {
                                                                                                echo $row['plan'] . ' Month/s';
                                                                                            } ?></div>
                                                            </td>
                                                            <td>
                                                                <div class="text-center"><?php echo $row['address']; ?>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-center"><?php echo '$' . $row['amount']; ?>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-center">
                                                                    <?php echo $row['attendance_count']; ?> Day/s</div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-bordered table-invoice-full">
                                                    <tbody>
                                                        <tr>
                                                            <td class="msg-invoice" width="55%">
                                                                <div class="text-center">
                                                                    <h4>Last Payment Done: $<?php echo $row['amount']; ?>/-
                                                                    </h4>
                                                                    <em class="tip-bottom" title="Registration Date" style="font-size:15px;">Member Since:
                                                                            <?php echo $row['dor']; ?></em>
                                                            </td>
                                            </div>
                                            </tr>
                                            </tbody>
                                            </table>
                                        </div> <!-- end of span 12 -->
                                    </div>

                                    <div class="row-fluid" style="margin:25px;">
                                        <div class="pull-left">
                                            <h4>Member <?php echo $row['fullname']; ?>,<br /> <br /> Membership is currently
                                                <?php echo $row['status']; ?>! <br /></h4>
                                            <p>Thank you for choosing our services.<br />- on the behalf of whole team</p>
                                        </div>
                                        <div class="pull-right">
                                            <h4><span>Approved By:</h4>
                                            <img src="../img/report/stamp-sample.png" width="124px;" alt="">
                                            <p class="text-center">Note:AutoGenerated</p>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                <?php
                                }
                ?>
                </div>
                <div class="text-center">
                <button class="btn-danger" onclick="window.print()"><i class="fas fa-print"></i> Print</button><br><br>
               </div>
                </div>
            </div>

            


        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="js/script.js"></script>

</body>

</html>


<style>
    #footer {
        color: white;
    }

    @media print {
        body * {
            visibility: hidden;
            margin-right: 20px;
        }

        .print-container,
        .print-container * {
            visibility: visible;
        }

        .print-container {
            position: fixed;
            /* left: 10px;
        top: 10px;
        right: 10px; */
        }
    }

    table {
        border-collapse: collapse;
        width: 50%;
        margin: 25px;
        border-radius: 1em;
    }

    th,
    td {
        padding: 15px;
        text-align: left;
        border: solid #0C0C1E;

    }
    .btn-danger{
        border: none;
            padding: 10px;
            border-radius: 8px;
            width: 180px;
            height: 50px;
            background: #1a1a47;
            color: #fff;
            font-weight: bold;
            font-size: 20px;
            -webkit-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
            -moz-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
            box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
            float: right;
    }
</style>