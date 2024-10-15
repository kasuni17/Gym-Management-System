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

    <title>ICBT VIP GYM - Announcements</title>
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

            <li class="active">
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
                    <h1>Announcements</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="announcement.php">Announcements</a>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- css -->

            <div id="content2">
              
                <div class="container-fluid">
                    <hr>
                    <br>
                    
                    <div class="row-fluid">
                        <fieldset>
                            <legend>Make Announcements</legend>

                            <div class="widget-box">
                                <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>

                                </div>
                                <div class="widget-content">
                                    <div class="control-group">
                                        <form action="announcementPost.php" method="POST">
                                            <div class="controls">
                                                <textarea class="span12" required name="message" rows="10" cols="60" placeholder="Enter text ..." style ="font-size:25px;"></textarea>
                                            </div><br>
                                            <div class="controls">
                                                <h5><label for="Announce Date" style ="font-size:20px;">Applied Date :
                                                       <br> <input type="date" required name="date" class="span11" style ="font-size:20px;"></h5> </label>
                                            </div><br>
                                            <div class="text-center">
                                                <button type="submit" class="btn-publish">Publish Now</button>
                                                <a href="announcementManage.php"><button class="btn btn-danger" type="button">Manage Your Announcements</button></a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
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
    fieldset {
        border: 1px solid #000;
        border-radius: 10px;
        margin: 20px;
        padding-left: 20px;

    }

    legend {
        font-weight: bold;
        font-size: 22px;
        text-align: center;

    }

    .span11 {
        width: 250px;
        height: 35px;
        border-radius: 8px;
        padding: 10px;
    }

    .btn-publish {
        
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
    .btn-danger {
        
        border: none;
        padding: 10px;
        border-radius: 8px;
        width: 300px;
        height: 50px;
        background: #1a1a47;
        color: #fff;
        font-size: 20px;
        -webkit-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
        -moz-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
        box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
        margin:15px;
       

}
</style>

</html>