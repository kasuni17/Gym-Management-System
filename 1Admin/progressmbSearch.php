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
    <link href="../font-awesome/css/all.css" rel="stylesheet" />

    <title>ICBT VIP GYM - Member Progress </title>
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
                    <span class="text">Member progress</span>
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
                            <a class="active" href="progressmb.php" >Member Progress</a>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- css -->


            <div id="content2">
                <div id="content2-header">
                    <br>
                    <h1 class="text-center" style="text-align:center;font-size: 40px;">Member Search Result <i class="fas fa-signal"></i></h1>
                </div><br><br>
                <div class="container-fluid">
                    
                    <div class="row-fluid">
                        <div class="span12">

                            <div class='widget-box'>
                                <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
                                    <h3>Progress Table</h3>
                                    <form id="custom-search-form" role="search" method="POST" action="progressmbSearch.php" class="form-search form-horizontal pull-right">
                                        <div class="input-append span12">
                                            <input type="text" class="search-query" placeholder="Search" name="search" style="width:280px; height:35px; font-size:18px" required>
                                            <button type="submit" class="btn"><i class="fas fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>

                                <div class='widget-content nopadding'>

                                    <?php

                                    include "dbcon.php";
                                    // $search = isset($_POST['search']);
                                    $search = $_POST['search'];
                                    $cnt = 1;
                                    $qry = "select * from members where fullname like '%$search%' or email like '%$search%'";
                                    $result = mysqli_query($conn, $qry);

                                    if (mysqli_num_rows($result) == 0) {

                                        echo "<div class='error_ex'>
            <h1>403</h1>
            <h3>Opps, Results Not Found!!</h3>
            <p>It seems like there's no such record available in our database.</p>
            <a class='btn btn-danger btn-big'  href='progressmb.php'>Go Back</a> </div>'";
                                    } else {

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
                <td><div class='text-center'>" . $row['plan'] . " Days</div></td>
                <td><div class='text-center'><a href='progressmbUpdate.php?id=" . $row['user_id'] . "'><button class='btn btn-warning btn-mini'> Update Progress</button></a></div></td>
                
              </tbody>";
                                            $cnt++;
                                        }
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
</body>
<style>
	table {
		border-collapse: collapse;
		width: 95%;
        margin-top:20px;
		
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
            margin:10px;
    }
</style>
</html>