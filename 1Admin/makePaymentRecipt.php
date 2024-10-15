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

    <title>ICBT VIP GYM - Payment Receipt</title>
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


            <div id="content">
               
                <form role="form" action="index.php" method="POST">
                    <?php

                    if (isset($_POST['amount'])) {

                        $fullname = $_POST['fullname'];
                        $paid_date = $_POST['paid_date'];
                        // $p_year = date('Y');
                        $services = $_POST["services"];
                        $amount = $_POST["amount"];
                        $plan = $_POST["plan"];
                        $status = $_POST["status"];
                        $id = $_POST['id'];


                        $amountpayable = $amount * $plan;

                        include 'dbcon.php';
                        date_default_timezone_set('Asia/Colombo');
                        //$current_date = date('Y-m-d h:i:s');
                        $current_date = date('Y-m-d h:i A');
                        $exp_date_time = explode(' ', $current_date);
                        $curr_date =  $exp_date_time['0'];
                        $curr_time =  $exp_date_time['1'] . ' ' . $exp_date_time['2'];
                        //code after connection is successfull
                        //update query
                        $qry = "UPDATE members SET amount='$amountpayable', plan='$plan', status='$status', paid_date='$curr_date', reminder='0' WHERE user_id='$id'";
                        $result = mysqli_query($conn, $qry); //query executes

                        if (!$result) { ?>

                            <h3 class="text-center">Something went wrong!</h3>

                        <?php } else { ?>

                            <?php if ($status == 'Active') { ?>
                                <br>
                                <table class="body-wrap">
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td class="container" width="600">
                                                <div class="content">
                                                    <table class="main" width="100%" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="content-wrap aligncenter print-container">
                                                                    <table width="100%" cellpadding="0" cellspacing="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="content-block">
                                                                                    <h3 class="text-center">Payment Receipt</h3>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="content-block">
                                                                                    <table class="invoice">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <div style="float:left">Invoice
                                                                                                        #GMS_<?php echo (rand(100000, 10000000)); ?>
                                                                                                        <br> No, 363 A9, Kandy
                                                                                                    </div>
                                                                                                    <div style="float:right"> Last
                                                                                                        Payment:
                                                                                                        <?php echo $paid_date ?>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>

                                                                                            <tr>
                                                                                                <td class="text-center" style="font-size:14px;">
                                                                                                    <b>Member:
                                                                                                        <?php echo $fullname; ?></b>
                                                                                                    <br>
                                                                                                    Paid On:
                                                                                                    <?php echo date("F j, Y - g:i a"); ?>
                                                                                                </td>

                                                                                            </tr>

                                                                                            <tr>
                                                                                                <td>
                                                                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                                                                        <tbody>
                                                                                                            <br>
                                                                                                            <tr>
                                                                                                                <td><b>Service
                                                                                                                        Taken</b>
                                                                                                                </td>
                                                                                                                <td class="alignright">
                                                                                                                    <b>Valid
                                                                                                                        Upto</b>
                                                                                                                </td>
                                                                                                            </tr>


                                                                                                            <tr>
                                                                                                                <td><?php echo $services; ?>
                                                                                                                </td>
                                                                                                                <td class="alignright">
                                                                                                                    <?php echo $plan ?>
                                                                                                                    Month/s</td>
                                                                                                            </tr>

                                                                                                            <tr>
                                                                                                                <td><?php echo 'Charge Per Month'; ?>
                                                                                                                </td>
                                                                                                                <td class="alignright">
                                                                                                                    <?php echo '$' . $amount ?>
                                                                                                                </td>
                                                                                                            </tr>


                                                                                                            <tr class="total">
                                                                                                                <td class="alignright" width="80%">
                                                                                                                    Total Amount
                                                                                                                </td>
                                                                                                                <td class="alignright">
                                                                                                                    $<?php echo $amountpayable; ?>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td class="content-block text-center">
                                                                                    We sincerely appreciate your promptness
                                                                                    regarding all payments from your side.
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="footer">
                                                        <table width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="aligncenter content-block"><button class="btn btn-danger" onclick="window.print()"><i class="fas fa-print"></i> Print</button></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>

                            <?php } else { ?>

                                <div class='error_ex'>
                                    <h1>409</h1>
                                    <h3>Looks like you've deactivated the customer's account!</h3>
                                    <p>The selected member's account will no longer be ACTIVATED until the next payment.</p>
                                    <a class='btn btn-danger btn-big' href='paymentmb.php'>Go Back</a>
                                </div>

                            <?php } ?>

                        <?php   }
                    } else { ?>
                        <h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='index.php'> DASHBOARD </a>
                        </h3>
                    <?php }
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
    <script src="js/script.js"></script>
</body>

</html>


<style>
    #footer {
        color: white;
    }


    body {
        -webkit-font-smoothing: antialiased;
        -webkit-text-size-adjust: none;
        width: 100% !important;
        height: 100%;
        line-height: 1.6;
    }

    /* Let's make sure all tables have defaults */
    table td {
        vertical-align: top;
    }

    /* -------------------------------------
    BODY & CONTAINER
------------------------------------- */


    .body-wrap {
        background-color: #f6f6f6;
        width: 100%;
    }

    .container {
        display: block !important;
        max-width: 600px !important;
        margin: 0 auto !important;
        /* makes it centered */
        clear: both !important;
    }

    .content {
        max-width: 600px;
        margin: 0 auto;
        display: block;
        padding: 20px;
    }

    /* -------------------------------------
    HEADER, FOOTER, MAIN
------------------------------------- */
    .main {
        background: #fff;
        border: 1px solid #e9e9e9;
        border-radius: 3px;
    }

    .content-wrap {
        padding: 20px;
    }



    .footer {
        width: 100%;
        clear: both;
        color: #999;
        padding: 20px;
    }


    /* -------------------------------------
    INVOICE
    Styles for the billing table
------------------------------------- */
    .invoice {
        margin: 22px auto;
        text-align: left;
        width: 80%;
    }

    .invoice td {
        padding: 7px 0;
    }

    .invoice .invoice-items {
        width: 100%;
    }

    .invoice .invoice-items td {
        border-top: #eee 1px solid;
    }

    .invoice .invoice-items .total td {
        border-top: 2px solid #333;
        border-bottom: 2px solid #333;
        font-weight: 700;
    }

    /* -------------------------------------
    RESPONSIVE AND MOBILE FRIENDLY STYLES
------------------------------------- */
    @media only screen and (max-width: 640px) {


        h2 {
            font-size: 18px !important;
        }


        .container {
            width: 100% !important;
        }

        .content,
        .content-wrap {
            padding: 10px !important;
        }

        .invoice {
            width: 100% !important;
        }
    }

    @media print {
        body * {
            visibility: hidden;
        }

        .print-container,
        .print-container * {
            visibility: visible;
        }

        .print-container {
            position: absolute;
            left: 0px;
            top: 0px;
            right: 0px;
        }
    }
</style>