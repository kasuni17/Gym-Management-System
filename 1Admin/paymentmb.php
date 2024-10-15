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
    <link rel="stylesheet" href="css/Style.css">

    <title>ICBT VIP GYM - Payments</title>
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

            <li class="active">
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
                    <h1>Payments</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="paymentmb.php">Payments</a>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- css -->


            <div id="content2">
                <div id="content2-header">
                    <br>
                    <h1 class="text-center" style="text-align:center; font-size: 40px;">Registered Member's Payment <i
                            class="fas fa-group"></i></h1>
                </div>
                <div class="container-fluid">

                    <div class="row-fluid">
                        <div class="span12">

                            <div class='widget-box'>
                                <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
                                    <h3 style="margin:25px;">Member's Payment table</h5>
                                        <form id="custom-search-form" role="search" method="POST"
                                            style="margin:25px; font-size: 16px;" action="paymentmbSearch.php"
                                            class="form-search form-horizontal pull-right">
                                            <div class="input-append span12">
                                                <input type="text" class="search-query"
                                                    style="width:280px; height:35px; font-size:18px"
                                                    placeholder="Search" name="search" required>
                                                <button type="submit" class="btn"><i class="fas fa-search"></i></button>
                                            </div>
                                        </form>
                                </div>

                                <div class='widget-content nopadding'>



                                    <!-- <form action="search-result.php" role="search" method="POST">
            <div id="search">
            <input type="text" placeholder="Search Here.." name="search"/>
            <button type="submit" class="tip-bottom" title="Search"><i class="fas fa-search fa-white"></i></button>
          </div>
          </form> -->


                                    <?php

                                    include "dbcon.php";
                                    $qry = "SELECT * FROM members";
                                    $cnt = 1;
                                    $result = mysqli_query($conn, $qry);


                                    echo "<table class='table table-bordered data-table table-hover'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Member</th>
                  <th>Last Payment Date</th>
                  <th>Amount</th>
                  <th>Choosen Service</th>
                  <th>Plan</th>
                  <th>Action</th>
                  <th>Remind</th>
                </tr>
              </thead>";

                                    while ($row = mysqli_fetch_array($result)) { ?>

                                    <tbody>

                                        <td>
                                            <div class='text-center'><?php echo $cnt; ?></div>
                                        </td>
                                        <td>
                                            <div class='text-center'><?php echo $row['fullname'] ?></div>
                                        </td>
                                        <td>
                                            <div class='text-center'>
                                                <?php echo ($row['paid_date'] == 0 ? "New Member" : $row['paid_date']) ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class='text-center'><?php echo '$' . $row['amount'] ?></div>
                                        </td>
                                        <td>
                                            <div class='text-center'><?php echo $row['services'] ?></div>
                                        </td>
                                        <td>
                                            <div class='text-center'><?php echo $row['plan'] . " Month/s" ?></div>
                                        </td>
                                        <td>
                                            <div class='text-center'><a
                                                    href='makePayment.php?id=<?php echo $row['user_id'] ?>'><button
                                                        class='btn-success btn'><i class='fas fa-dollar-sign'></i>
                                                        Payment</button></a></div>
                                        </td>
                                        <td>
                                            <div class='text-center'><a
                                                    href='sendReminder.php?id=<?php echo $row['user_id'] ?>'><button
                                                        class='btn-danger btn'
                                                        <?php echo ($row['reminder'] == 1 ? "disabled" : "") ?>>Alert</button></a>
                                            </div>
                                        </td>
                                    </tbody>
                                    <?php $cnt++;
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

.btn-success {
    border: none;
    padding: 10px;
    border-radius: 8px;
    width: 150px;
    height: 40px;
    background: #1a1a47;
    color: #fff;
    font-size: 18px;
    -webkit-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    -moz-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);

    margin: 10px;
}

.btn-danger {
    border: none;
    padding: 10px;
    border-radius: 8px;
    width: 150px;
    height: 40px;
    background: #8B0000;
    color: #fff;
    font-size: 18px;
    -webkit-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    -moz-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);

    margin: 10px;
}
</style>

</html>