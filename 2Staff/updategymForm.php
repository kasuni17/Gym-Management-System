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

    <title>ICBT VIP GYM - Update Equipment Details </title>
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


            <?php
            include 'dbcon.php';
            $eqpid = $_GET['id'];
            $qry = "select * from equipment where eqpid='$eqpid'";
            $result = mysqli_query($conn, $qry);
            while ($row = mysqli_fetch_array($result)) {
            ?>


                <div id="content2">
                    <div id="content2-header">
                        <h1>Equipment Entry Form</h1>
                    </div>
                    <div class="container-fluid">
                        <hr>
                        <div class="row-fluid">
                            <div class="span6">
                                <fieldset>
                                    <legend>Eqipment-info</legend>
                                <div class="widget-box">
                                    
                                    <div class="widget-content nopadding">
                                        <form action="updategymReq.php" method="POST" class="form-horizontal">
                                            <div class="control-group">
                                                <label class="control-label">Equipment Name :</label>
                                                <div class="controls">
                                                    <input type="text" class="span11" name="name" value='<?php echo $row['name']; ?>' required />
                                                </div><br>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Description :</label>
                                                <div class="controls">
                                                    <input type="text" class="span11" name="description" value='<?php echo $row['description']; ?>' required />
                                                </div><br>
                                            </div>


                                            <div class="control-group">
                                                <label class="control-label">Date of Purchase :</label>
                                                <div class="controls">
                                                    <input type="date" name="date" value='<?php echo $row['date']; ?>' class="span11" />
                                                    
                                                </div><br>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Quantity :</label>
                                                <div class="controls">
                                                    <input type="number" class="span11" class="span4" name="quantity" value='<?php echo $row['quantity']; ?>' required />
                                                </div><br>
                                            </div>
                                    </div>


                                    <div class="widget-content nopadding">
                                        <div class="form-horizontal">

                                        </div>
                                        <div class="widget-content nopadding">
                                            <div class="form-horizontal">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </fieldset>
                            </div>



                            <div class="span6">
                                <fieldset>
                                    <legend>Other Details</legend>
                                
                                <div class="widget-box">
                                    
                                    <div class="widget-content nopadding">
                                        <div class="form-horizontal">
                                            <div class="control-group">
                                                <label for="normal" class="control-label">Contact Number</label>
                                                <div class="controls">
                                                    <input type="text" id="mask-phone" class="span11" name="contact" minlength="10" maxlength="10" value='<?php echo $row['contact']; ?>' class="span8 mask text" required>
                                                    
                                                </div><br>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Vendor :</label>
                                                <div class="controls">
                                                    <input type="text" class="span11" name="vendor" value='<?php echo $row['vendor']; ?>' required />
                                                </div><br>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Address :</label>
                                                <div class="controls">
                                                    <input type="text" class="span11" name="address" value='<?php echo $row['address']; ?>' required />
                                                </div><br>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>Pricing</legend>

                                        <div class="widget-content nopadding">
                                            <div class="form-horizontal">
                                                <div class="control-group">
                                                    <label class="control-label">Total Cost: </label>
                                                    <div class="controls">
                                                        <div class="input-append">
                                                            <span class="add-on">$</span>
                                                            <input type="number" placeholder="120000" name="amount" value='<?php echo $row['amount']; ?>' class="span11" required>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-actions text-center">
                                                    <!-- user's ID is hidden here -->
                                                    <input type="hidden" name="id" value="<?php echo $row['eqpid']; ?>">
                                                    <button type="submit" class="btn btn-success">Submit Details</button>
                                                </div>
                                                </form>

                                            </div>

                                        <?php
                                    }
                                        ?>


                                        </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



        </main>
    </section>
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
    .span11 {
        width: 250px;
        height: 35px;
        border-radius: 8px;
        padding: 10px;
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
            float: right;
    }
</style>
</html>