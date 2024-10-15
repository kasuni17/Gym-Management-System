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

    <title>ICBT VIP GYM - Update Equipment Details</title>
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
            <li class="active">
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
                    <h1>Update Equipment Details</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="managegym.php">Gym Equipment</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="updategym.php">Update Equipment Details</a>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- css -->

            <div id="content2">
                <div id="content-header">
                    <h1 class="text-center" style="text-align:center; font-size: 40px;">Perfect Gym's Equipment List <i class="fas fa-cogs"></i></h1>
                </div>
                <div class="container-fluid">

                    <div class="row-fluid">
                        <div class="span12">

                            <div class='widget-box'>
                                <div class='widget-title'> <span class='icon'> <i class='fas fa-cogs'></i> </span>
                                    <h5 style="margin:15px; font-size: 16px;">Equipment Table</h5>
                                </div>
                                <div class='widget-content nopadding'>

                                    <?php

                                    include "dbcon.php";
                                    $qry = "select * from equipment";
                                    $cnt = 1;
                                    $result = mysqli_query($conn, $qry);


                                    echo "<table class='table table-bordered table-hover'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>E. Name</th>
                  <th>Description</th>
                  <th>Qty</th>
                  <th>Amount</th>
                  <th>Vendor</th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>Purchased Date</th>
                  <th>Action</th>
                </tr>
              </thead>";

                                    while ($row = mysqli_fetch_array($result)) {

                                        echo "<tbody> 
               
                <td><div class='text-center'>" . $cnt . "</div></td>
                <td><div class='text-center'>" . $row['name'] . "</div></td>
                <td><div class='text-center'>" . $row['description'] . "</div></td>
                <td><div class='text-center'>" . $row['quantity'] . "</div></td>
                <td><div class='text-center'>$" . $row['amount'] . "</div></td>
                <td><div class='text-center'>" . $row['vendor'] . "</div></td>
                <td><div class='text-center'>" . $row['address'] . "</div></td>
                <td><div class='text-center'>" . $row['contact'] . "</div></td>
                <td><div class='text-center'>" . $row['date'] . "</div></td>
                <td><div class='text-center'><a href='updategymForm.php?id=" . $row['eqpid'] . "'><i class='fas fa-edit'></i> Edit</a></div></td>
                
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
</style>

</html>