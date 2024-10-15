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

    <title>ICBT VIP GYM - Add New Staff</title>
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

            <li class="active">
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
                    <h1>Add New Staff</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="managestaff.php">Manage Staff</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="addstaff.php">Add New Staff</a>
                        </li>
                    </ul>
                </div>
            </div>
        </main>


        <!-- css -->


        <div id="content2">
            <div id="content-header">

                <h1 class="text-center">GYM's Staff Entry Form <i class="fas fa-briefcase"></i></h1>
            </div>
            <div class="container-fluid">

                <div class="row-fluid">
                    <div class="span12">
                        <fieldset>
                            <legend>Staff Details</legend>

                            <div class="widget-box">
                                <div class="widget-title"> <span class="icon"> <i class="fas fa-briefcase"></i> </span>
                                    <br>

                                </div>
                                <div class="widget-content nopadding">
                                    <form id="form-wizard" action="addStaffFunction.php" class="form-horizontal" method="POST">
                                        <div id="form-wizard-1" class="step">

                                            <div class="control-group">
                                                <label class="control-label">Enter Staff's Fullname :</label>
                                                <div class="controls">
                                                    <input id="fullname" type="text" name="fullname" class="span11" required />
                                                </div><br>
                                            </div>




                                            <div class="control-group">
                                                <label class="control-label">Enter a Username :</label>
                                                <div class="controls">
                                                    <input id="username" type="text" name="username" class="span11" />
                                                </div><br>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Password :</label>
                                                <div class="controls">
                                                    <input id="password" type="password" name="password" class="span11" />
                                                </div><br>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Confirm Password :</label>
                                                <div class="controls">
                                                    <input id="password2" type="password" name="password2" class="span11" />
                                                </div><br>
                                            </div>
                                        </div>

                                        <div id="form-wizard-2" class="step">
                                            <div class="control-group">
                                                <label class="control-label">Email ID :</label>
                                                <div class="controls">
                                                    <input id="email" type="text" name="email" required class="span11" />
                                                </div><br>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Address :</label>
                                                <div class="controls">
                                                    <input id="address" type="text" name="address" required class="span11" />
                                                </div><br>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Designation :</label>
                                                <div class="controls">
                                                    <select name="designation" id="designation" class="span11">
                                                        <option value="Cashier">Cashier</option>
                                                        <option value="Trainer">Trainer</option>
                                                        <option value="GYM Assistant">GYM Assistant</option>
                                                        <option value="Front Desk Staff">Front Desk Staff</option>
                                                        <option value="Manager">Manager</option>
                                                    </select>
                                                </div><br>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Gender :</label>
                                                <div class="controls">
                                                    <select name="gender" id="gender" class="span11">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div><br>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Contact Number :</label>
                                                <div class="controls">
                                                    <input id="contact" type="number" name="contact" class="span11" required />
                                                </div><br>
                                            </div>

                                        </div>

                                        <div class="form-actions">
                                            <input id="back" class="btn-primary" type="reset" value="Reset" />
                                            <input id="next" class="btn-primary" type="submit" value="Proceed" />
                                            <div id="status"></div>
                                        </div>
                                        <div id="submitted"></div>
                                    </form>
                                </div>
                            </div>
                            <!--end of widget box-->
                        </fieldset>
                    </div>
                    <!--end of span 12 -->
                </div>
            </div>
        </div>



    </section>
</body>
<style>
    fieldset {
        border: 1px solid #000;
        border-radius: 10px;
        margin: 20px;
        padding-left: 20px;

    }

    legend {
        font-weight: bold;
        font-size: 20px;
        text-align: center;

    }

    .span11 {
        height: 35px;
        border-radius: 8px;
        padding: 10px;
    }

    .btn-primary {
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
            float: right;
            margin:10px;
    }

    
</style>

</html>