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


    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
    <link href="../font-awesome/css/all.css" rel="stylesheet" />

    <title>ICBT VIP GYM - Member Progress</title>
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
                    <h1>Member Progress</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="progressmb.php">Member Progress</a>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- css -->


            <div id="content2">
                <div id="content2-header">
                    <br><br>
                    <h1 class="text-center" style="text-align:center; font-size: 40px;">Update Customer's Progress <i class="fas fa-signal"></i></h1>
                </div>
                <div class="container-fluid">

                    <div class="row-fluid">
                        <div class="span12">

                            <div class='widget-box'>
                                <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
                                    <h5 style="margin:25px; font-size: 20px;">Member's Table</h5>
                                    <form id="custom-search-form" role="search" method="POST" style="margin:25px; font-size: 16px;" action="progressmbSearch.php" class="form-search form-horizontal pull-right">
                                        <div class="input-append span12">
                                            <input type="text" class="search-query" placeholder="Search" name="search" style="width:280px; height:35px; font-size:18px" required ><button style="height:35px; width:35px; border:none;"><i class='bx bx-search'></i></button>
                                            <button type="submit" class="btn"><i class="fas fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>

                                <div class='widget-content nopadding'>



                                    <!-- <form action="search-result.php" role="search" method="POST">
            <div id="search">
            <input type="text" placeholder="Search Here.." name="search"/>
            <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
          </div>
          </form> -->


                                    <?php

                                    include "dbcon.php";
                                    $qry = "select * from members";
                                    $cnt = 1;
                                    $result = mysqli_query($conn, $qry);


                                    echo "<table class='table table-bordered table-hover'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Fullname</th>
                  <th>Choosen Service</th>
                  <th>Plan</th>
                  <th>Action</th>
                </tr>
              </thead>";

                                    while ($row = mysqli_fetch_array($result)) {

                                        echo "<tbody> 
               
                <td><div class='text-center'>" . $cnt . "</div></td>
                <td><div class='text-center'>" . $row['fullname'] . "</div></td>
                <td><div class='text-center'>" . $row['services'] . "</div></td>
                <td><div class='text-center'>" . $row['plan'] . " Month/s</div></td>
                <td><div class='text-center'><a href='progressmbUpdate.php?id=" . $row['user_id'] . "'><button class='btn-warning btn'> Update Progress</button></a></div></td>
                
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
    <!-- <script src="js/script.js"></script> -->
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
        .btn-warning{
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
    </style>
</body>

</html>