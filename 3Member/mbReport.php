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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="css\style.css">

    <title>ICBT VIP GYM - Member Report</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
    <a href="#" class="brand">
            <i class='bx bx-dumbbell bx-tada' ></i>
            <span class="text">Hi, <?php echo $_SESSION['fullname']; ?> </span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="index.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="toDo.php">
                    <i class='bx bxs-pen'></i>
                    <span class="text">To-Do</span>
                </a>
                </div>
            </li>
            <li>
                <a href="Reminders.php">
                    <i class='bx bxs-error'></i>
                    <span class="text">Reminders</span>
                </a>
            </li>
            <li>
                <a href="Announcement.php">
                    <i class='bx bxs-bell-ring'></i>
                    <span class="text">Announcement</span>
                </a>
            </li>

            <li class="active">
                <a href="mbReport.php">
                    <i class='bx bxs-report'></i>
                    <span class="text">Report</span>
                </a>
            </li>
            <li>
                <a href="changePass.php">
                    <i class='bx bi-person-fill-lock'></i>
                    <span class="text">Change Password</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <!-- <li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li> -->
            <li>
                <a href="logOut.php" class="logout">
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
            <a class="nav-link">Welcome to ICBT VIP GYM!</a>
        </nav>
        <!-- NAVBAR -->
        <section id="content2">

            <!-- MAIN -->
            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>Report</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Dashboard</a>
                            </li>
                            <li><i class='bx bx-chevron-right'></i></li>
                            <li>
                                <a class="active" href="mbReport.php">Report</a>
                            </li>
                        </ul>
                    </div>
                </div>


            </main>
            <!-- MAIN -->

            <!-- css -->

            <?php
            include 'dbcon.php';
            // include "session.php";
            // $id=$_GET['id'];
            $qry = "select * from members WHERE user_id='" . $_SESSION['user_id'] . "'";
            $result = mysqli_query($conn, $qry);
            while ($row = mysqli_fetch_array($result)) {
            ?>


                <div id="content2">
                    <div id="content-header">
                    </div>
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="widget-box">

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
                                                            <td>No 363 A9, Kandy 20000</td>
                                                        </tr>

                                                        <tr>
                                                            <td>Tel: 0814 777 888</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email: icbtvipgym@gmail.com</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <br>

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
                                                                <div class="text-center"><?php echo $row['plan']; ?> Month/s
                                                                </div>
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
                                                <br>
                                                <table class="table table-bordered table-invoice-full">
                                                    <tbody>
                                                        <tr>
                                                            <td class="msg-invoice" width="55%">
                                                                <div class="text-center">
                                                                    <h4>Last Payment Done: $<?php echo $row['amount']; ?>/-
                                                                    </h4>
                                                                    <em><a href="#" class="tip-bottom" title="Registration Date" style="font-size:15px;">Member Since:
                                                                            <?php echo $row['dor']; ?> </a></em>
                                                            </td>
                                            </div>
                                            </tr>
                                            </tbody>
                                            </table>
                                        </div> <!-- end of span 12 -->

                                    </div>

                                    <br>

                                    <div class="row-fluid" style ="margin:25px;">
                                        <div class="pull-left">
                                            <h4>Dear Member <?php echo $row['fullname']; ?>,<br /> <br />Your Membership is
                                                currently <?php echo $row['status']; ?>! <br /></h4>
                                            <p>Thank you for choosing our services.<br />- on the behalf of whole team</p>
                                        </div>
                                        <div class="pull-right">
                                            <h4><span>Approved By:</h4>
                                            <img src="../img/report/stamp-sample.png" width="124px;" alt="">
                                            <p class="text-center">Note:AutoGenerated</p><br><br><br>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
                ?>
                </div>
                



                </main>



        </section>
        <!-- CONTENT -->


        <script src="js/script.js"></script>
</body>
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
</html>