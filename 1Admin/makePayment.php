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

    <title>ICBT VIP GYM - Payments</title>
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

            <?php
            include 'dbcon.php';
            $id = $_GET['id'];
            $qry = "select * from members where user_id='$id'";
            $result = mysqli_query($conn, $qry);
            while ($row = mysqli_fetch_array($result)) {
            ?>

                <div id="content2" style="margin-left:30px;">
                    <div id="content2-header">

                        <br>
                        <h1>Payment Form</h1>
                        <br>
                    </div>


                    <div class="container-fluid" style="margin-top:-38px;">
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="widget-box">
                                    <div class="widget-title"> <span class="icon"> <i class="fas fa-money"></i> </span>
                                        <br>
                                        <!-- <h5>Payments</h5> -->
                                    </div>
                                    <div class="widget-content">
                                        <div class="row-fluid">
                                            <div class="span5">
                                                <table class="">
                                                    <tbody>
                                                        <tr>
                                                            <td><img src="../img/logo.jpg" alt="Gym Logo" height="250" width="350">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h4>ICBT VIP GYM</h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>No, 363 A9, Kandy</td>
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
                                            <br>

                                            <div class="span7">
                                                <table class="table table-bordered table-invoice">

                                                    <tbody>
                                                        <form action="makePaymentRecipt.php" method="POST">
                                                            <tr>
                                                            <tr>
                                                                <td class="width30">Member's Fullname:</td>
                                                                <input type="hidden" name="fullname" value="<?php echo $row['fullname']; ?>">
                                                                <td class="width70">
                                                                    <strong><?php echo $row['fullname']; ?></strong>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Service:</td>
                                                                <input type="hidden" required name="services" value="<?php echo $row['services']; ?>">
                                                                <td><strong><?php echo $row['services']; ?></strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Amount Per Month:</td>
                                                                <td><input id="amount" required type="number" name="amount" value='<?php if ($row['services'] == 'Fitness') {
                                                                                                                                        echo '55';
                                                                                                                                    } elseif ($row['services'] == 'Sauna') {
                                                                                                                                        echo '35';
                                                                                                                                    } else {
                                                                                                                                        echo '40';
                                                                                                                                    } ?>' />
                                                                </td>
                                                            </tr>

                                                            <input type="hidden" name="paid_date" value="<?php echo $row['paid_date']; ?>">

                                                            <td class="width30">Plan:</td>
                                                            <td class="width70">
                                                                <div class="controls">
                                                                    <select name="plan" required="required" id="select">
                                                                        <option value="1" selected="selected">One Month
                                                                        </option>
                                                                        <option value="3">Three Month</option>
                                                                        <option value="6">Six Month</option>
                                                                        <option value="12">One Year</option>
                                                                        <option value="0">None-Expired</option>

                                                                    </select>
                                                                </div>



                                                            </td>

                                                            <tr>

                                                            </tr>
                                                            <td class="width30">Member's Status:</td>
                                                            <td class="width70">
                                                                <div class="controls">
                                                                    <select name="status" required="required" id="select">
                                                                        <option value="Active" selected="selected">Active
                                                                        </option>
                                                                        <option value="Expired">Expired</option>

                                                                    </select>
                                                                </div>


                                                            </td>
                                                            </tr>
                                                    </tbody>

                                                </table>
                                            </div>


                                        </div> <!-- row-fluid ends here -->


                                        <div class="row-fluid">
                                            <div class="span12">

                                                <div class="text-center">
                                                    <!-- user's ID is hidden here -->

                                                    <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>">

                                                    <button class="btn-success btn-large" type="SUBMIT" href="">Make
                                                        Payment</button><br>
                                                </div><br>

                                                </form>
                                            </div><!-- span12 ends here -->
                                        </div><!-- row-fluid ends here -->

                                    <?php
                                }
                                    ?>
                                    </div><!-- widget-content ends here -->


                                </div><!-- widget-box ends here -->
                            </div><!-- span12 ends here -->
                        </div> <!-- row-fluid ends here -->
                    </div> <!-- container-fluid ends here -->
                </div> <!-- div id content ends here -->




        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="js/script.js"></script>
</body>
<style>
    table {
        border-collapse: collapse;
        width: 80%;
        margin: 25px;
    }

    th,
    td {
        padding: 15px;
        text-align: left;
        border: 1px solid #505050;
    }

    th {
        text-align: left;
    }
    .btn-success{
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
            float:right;
            margin:10px;
    }
    
    
</style>
</html>