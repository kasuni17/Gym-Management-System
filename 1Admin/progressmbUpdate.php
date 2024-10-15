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

    <title>ICBT VIP GYM - Progress Update</title>
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


            <?php
            include 'dbcon.php';
            $id = $_GET['id'];
            $qry = "select * from members where user_id='$id'";
            $result = mysqli_query($conn, $qry);
            while ($row = mysqli_fetch_array($result)) {
            ?>

                <div id="content2">
                    <div id="content2-header">
                        <br>
                        
                        
                    </div>


                    <div class="container-fluid" style="margin-top:-38px;">
                        <div class="row-fluid">
                            <div class="span12">
                            <fieldset>
                            <legend><h1 class="text-center">Update Customer's Progress <i class="fas fa-signal"></i></h1></legend>
                                <div class="widget-box">
                                    <div class="widget-title"> <span class="icon"> <i class="fas fa-signal"></i> </span>
                                     </div>
                                    <div class="widget-content">
                                        <div class="row-fluid">

                                            <div class="span2"></div>

                                            <div class="span8">
                                                <table class="table table-bordered table-invoice">

                                                    <tbody>
                                                        <form action="progressmbReq.php" method="POST">
                                                            <tr>
                                                            <tr>
                                                                <td class="width30">Member's Fullname:</td>
                                                                <td class="width70">
                                                                    <strong><?php echo $row['fullname']; ?></strong>
                                                                </td>
                                                            </tr><tr></tr>
                                                            <tr>
                                                                <td>Service Taken:</td>
                                                                <td><strong><?php echo $row['services']; ?></strong></td>
                                                            </tr><tr></tr>
                                                            <tr>
                                                                <td>Initial Weight: (KG)</td>
                                                                <td><input id="weight" required type="number" name="ini_weight" value='<?php echo $row['ini_weight']; ?>' /></td>
                                                            </tr><tr></tr>

                                                            <tr>
                                                                <td>Current Weight: (KG)</td>
                                                                <td><input id="weight" required type="number" name="curr_weight" value='<?php echo $row['curr_weight']; ?>' /></td>
                                                            </tr><tr></tr>

                                                            <tr>
                                                                <td>Initial Body Type:</td>
                                                                <td><input id="ini_bodytype" required type="text" name="ini_bodytype" value='<?php echo $row['ini_bodytype']; ?>' /></td>
                                                            </tr><tr></tr>

                                            </div>

                                            </td>

                                            <tr>

                                            </tr>

                                            <tr>
                                                <td>Current Body Type:</td>
                                                <td><input id="curr_bodytype" required type="text" name="curr_bodytype" value='<?php echo $row['curr_bodytype']; ?>' /></td>
                                            </tr><tr></tr>

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
                                            <button class="btn-primary btn-large" type="SUBMIT" href="">Save
                                                Changes</button>
                                        </div>

                                        </form>
                                        </fieldset>
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
    <!-- <script src="js/script.js"></script> -->
</body>
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
   .btn-primary{
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

</html>