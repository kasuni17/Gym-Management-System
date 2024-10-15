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

    <title>ICBT VIP GYM - Add Equipment Details</title>
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
                    <h1>Add Equipment Details</h1>
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
                            <a class="active" href="addgym.php">Add Equipment Details</a>
                        </li>
                    </ul>
                </div>
            </div>
            <br>

            <!-- css -->

            <div id="content2">
                <div id="content-header">
                    <h1>Equipment Entry Form</h1>
                </div>
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span6">
                            <fieldset>
                                <legend>Equipment - Info</legend>

                                <div class="widget-box">
                                    <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i>
                                        </span>
                                        <br>

                                    </div>
                                    <div class="widget-content nopadding">
                                        <form action="addgymReq.php" method="POST" class="form-horizontal">
                                            <div class="control-group">
                                                <label class="control-label">Equipment :</label>
                                                <div class="controls">
                                                    <input type="text" class="span11" name="ename"
                                                        placeholder="Equipment Name" required />
                                                </div><br>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Description :</label>
                                                <div class="controls">
                                                    <input type="text" class="span11" name="description"
                                                        placeholder="Short Description" required />
                                                </div><br>
                                            </div>


                                            <div class="control-group">
                                                <label class="control-label">Date of Purchase :</label>
                                                <div class="controls">
                                                    <input type="date" name="date" required class="span11" />
                                                   
                                                </div><br>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Quantity :</label>
                                                <div class="controls">
                                                    <input type="number" class="span11" name="quantity"
                                                        placeholder="Equipment Qty" required />
                                                </div><br>
                                            </div>
                                    </div>
                            </fieldset><br>

                            <div class="widget-content nopadding">
                                <div class="form-horizontal">
                                </div>

                                <div class="widget-content nopadding">
                                    <div class="form-horizontal">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="span6">
                        <fieldset>
                            <legend>Other Details</legend>
                            <div class="widget-box">
                                <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i>
                                    </span>

                                </div>
                                <div class="widget-content nopadding">
                                    <div class="form-horizontal">

                                        <div class="control-group">
                                            <label class="control-label">Vendor :</label>
                                            <div class="controls">
                                                <input type="text" class="span11" name="vendor" placeholder="Vendor"
                                                    required />
                                            </div><br>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Address :</label>
                                            <div class="controls">
                                                <input type="text" class="span11" name="address"
                                                    placeholder="Vendor Address" required />
                                            </div><br>
                                        </div>

                                        <div class="control-group">
                                            <label for="normal" class="control-label">Contact Number :</label>
                                            <div class="controls">
                                                <input type="text" id="mask-phone" name="contact" minlength="10"
                                                    maxlength="10" class="span11 mask text" placeholder="(000) 000-0000" required>
                                                
                                            </div>
                                        </div><br>
                                    </div>
                        </fieldset><br>
                        <style>
                        fieldset {
                            border: 1px solid #000;
                            border-radius: 10px;
                            padding: 20px;

                        }

                        legend {
                            font-weight: bold;
                            font-size: 20px;
                            text-align: center;

                        }
                        </style>

                        <fieldset>
                            <legend>Pricing</legend>

                            <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i>
                                </span>

                            </div>
                            <div class="widget-content nopadding">
                                <div class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label">Cost Per Item :</label>
                                        <div class="controls">
                                            <div class="input-append">
                                                <span class="add-on">$</span>
                                                <input type="number" placeholder="0000" name="amount" class="span11"
                                                    required>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-actions text-center">
                                        <button type="submit" class="btn-submit">Submit Details</button>
                                    </div>
                                    </form>

                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
           


        </main>
    </section>
    <style>
    .span11 {
        width: 250px;
        height: 35px;
        border-radius: 8px;
        padding: 10px;
    }

    .btn-submit{
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
    }
    
    </style>

</body>

</html>