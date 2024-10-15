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

    <title>ICBT VIP GYM - Edit Staff</title>
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
                    <h1>Update Staff details</h1>
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
                            <a class="active" href="viewstaff.php">Update Staff Details</a>
                        </li>
                    </ul>
                </div>
            </div>
        </main>


        <!-- css -->

        <?php
        include 'dbcon.php';
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id === null || !is_numeric($id)) {
            
        }
        $qry = "select * from staff where staffid='$id'";
        $result = mysqli_query($conn, $qry);
        while ($row = mysqli_fetch_array($result)) {
        ?>

            <div id="content2">
                <div id="content2-header">

                    <h1 class="text-center" style="padding-left:20px;">Update Staff's Detail <i class="fas fa-briefcase"></i></h1>
                    <br>
                </div>
                <div class="container-fluid">
                    
                    <div class="row-fluid">
                        <div class="span6">
                            <fieldset>
                                <legend>Staff-Details</legend>

                           
                            <div class="widget-box">
                                
                                <div class="widget-content nopadding">

                                    <form action="editStaffReq.php" method="POST" class="form-horizontal">
                                        <div class="control-group">
                                            <label class="control-label">Full Name :</label>
                                            <div class="controls">
                                                <input type="text" class="span11" name="fullname" value='<?php echo $row['fullname']; ?>' />
                                            </div><br>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Username :</label>
                                            <div class="controls">
                                                <input type="text" class="span11" name="username" value='<?php echo $row['username']; ?>' />
                                            </div><br>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Password :</label>
                                            <div class="controls">
                                                <input type="password" class="span11" name="password" disabled="" placeholder="**********" />
                                                <span class="help-block">Note: Only the members are allowed to change their
                                                    password until and unless it's an emergency.</span>
                                            </div><br>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Gender :</label>
                                            <div class="controls">
                                                <input type="text" class="span11" name="gender" value='<?php echo $row['gender']; ?>' />
                                            </div><br>
                                        </div>
                                </div>
                                </fieldset>


                                <div class="widget-content nopadding">
                                    <div class="form-horizontal"></div>
                                    <div class="widget-content nopadding">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="span6">
                            <fieldset>
                                <legend>Staff-Details </legend>

                           
                            <div class="widget-box">
                                
                                <div class="widget-content nopadding">
                                    <div class="form-horizontal">
                                        <div class="control-group">
                                            <label for="normal" class="control-label">Contact Number</label>
                                            <div class="controls">
                                                <input type="number" class="span11" id="mask-phone" name="contact" value='<?php echo $row['contact']; ?>' class="span8 mask text">
                                                <!--<span class="help-block blue span8">(999) 999-9999</span> -->
                                            </div><br>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Address :</label>
                                            <div class="controls">
                                                <input type="text" class="span11" name="address" value='<?php echo $row['address']; ?>' />
                                            </div><br>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Designation</label>
                                            <div class="controls">
                                                <select name="designation" id="designation" class="span11">
                                                    <option value="Cashier">Cashier</option>
                                                    <option value="Trainer">Trainer</option>
                                                    <option value="GYM Assistant">GYM Assistant</option>
                                                    <option value="Front Desk Staff">Front Desk Staff</option>
                                                    <option value="Manager">Manager</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="form-actions text-center">
                                        <!-- user's ID is hidden here -->
                                        <input type="hidden" name="id" value="<?php echo $row['staffid']; ?>">
                                        <button type="submit" class="btn btn-success">Update </button>
                                    </div>

                                    </form>

                                </div>
                            <?php
                        }
                            ?>

                            </div>
                        </div>
                        </fieldset>
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

    .btn-success {
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