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
    <title>ICBT VIP GYM - Add Member Details</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
        <i class='bx bx-dumbbell bx-tada' ></i>
            <span class="text">ICBT VIP GYM </span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="index.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
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
                    <h1>Add Member Details</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="managemb.php">Manage Members</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="addmb.php">Add Member Details</a>
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
                        <h1>Update Member Details</h1>
                    </div>
                    <div class="container-fluid">
                        <hr>
                        <div class="row-fluid">
                            <div class="span6">
                            <fieldset>
                                <legend>Personal - Info</legend>
                                
                                <div class="widget-box">
                                    
                                    <div class="widget-content nopadding">

                                        <form action="updatembReq.php" method="POST" class="form-horizontal">
                                            <div class="control-group">
                                                <label class="control-label">Full Name :</label>
                                                <div class="controls">
                                                    <input type="text" class="span11" required name="fullname" value='<?php echo $row['fullname']; ?>' />
                                                </div><br>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Email :</label>
                                                <div class="controls">
                                                    <input type="text" required class="span11" name="email" value='<?php echo $row['email']; ?>' />
                                                </div><br>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Password :</label>
                                                <div class="controls">
                                                    <input type="password" required class="span11" name="password" disabled="" placeholder="**********" />
                                                    <span class="help-block">Note: Only the members are allowed to change
                                                        their password
                                                        until and unless it's an emergency.</span>
                                                </div><br>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Gender :</label>
                                                <div class="controls">
                                                    <select name="gender" required="required" id="select" class="span11">
                                                        <option value="Male" selected="selected">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div><br>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Date of Registration :</label>
                                                <div class="controls">
                                                    <input type="date" required name="dor" class="span11" value='<?php echo $row['dor']; ?>' />
                                                   <!-- <span class="help-block">Date of registration</span> -->
                                                </div><br>
                                            </div>


                                    </div>


                                    <div class="widget-content nopadding">
                                        <div class="form-horizontal">

                                        </div>
                                        <div class="widget-content nopadding">
                                            <div class="form-horizontal">
                                                <div class="control-group">
                                                    <label for="normal" class="control-label " >Plans: </label>
                                                    <div class="controls">
                                                        <select name="plan" required="" id="select"class="span11">
                                                            <option value="1" selected="selected">One Month</option required>
                                                            <option value="3">Three Month</option>
                                                            <option value="6">Six Month</option>
                                                            <option value="12">One Year</option>
                                                        </select><br>
                                                    </div>
                                                </div>
                                                <div class="control-group">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </fieldset>
                            </div>


                            <div class="span6">
                                <fieldset>
                                    <legend>Contact Details</legend>
                                
                                <div class="widget-box">
                                    
                                    <div class="widget-content nopadding">
                                        <div class="form-horizontal">
                                            <div class="control-group">
                                                <label for="normal" class="control-label">Contact Number :</label>
                                                <div class="controls">
                                                    <input type="number" class="span11" id="mask-phone" name="contact" value='<?php echo $row['contact']; ?>' class="span8 mask text" placeholder="(000) 000-0000">
                                                    
                                                </div><br>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Address :</label>
                                                <div class="controls">
                                                    <input type="text" class="span11" name="address" value='<?php echo $row['address']; ?>' />
                                                </div><br>
                                            </div>
                                        </div>
                                 </fieldset>
                                <fieldset>
                                    <legend>Service Details</legend>
                                    
                                        <div class="widget-content nopadding">
                                            <div class="form-horizontal">


                                                <div class="control-group">
                                                    <label class="control-label">Services</label>
                                                    <div class="controls">
                                                        <label>
                                                            <input type="radio" value="Fitness" name="services" />
                                                            Fitness <small>- $55 per month</small></label><br>
                                                        <label>
                                                            <input type="radio" value="Sauna" name="services" />
                                                            Sauna <small>- $35 per month</small></label><br>
                                                        <label>
                                                            <input type="radio" value="Cardio" name="services" />
                                                            Cardio <small>- $40 per month</small></label>
                                                    </div><br>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Total Amount</label>
                                                    <div class="controls">
                                                        <div class="input-append">
                                                            <span class="add-on">$</span>
                                                            <input type="number" value='<?php echo $row['amount']; ?>' name="amount" class="span11">
                                                        </div><br>
                                                    </div>
                                                </div>


                                                <div class="form-actions text-center">
                                                    <!-- user's ID is hidden here -->
                                                    <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>">
                                                    <button type="submit" class="btn-success">Update</button>
                                                </div><br>
                                                </form>
                                            </div>
                                        <?php
                                    }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                </fieldset>
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


<!-- <script type="text/javascript">
// This function is called from the pop-up menus to transfer to
// a different page. Ignore if the value returned is a null string:
function goPage(newURL) {

    // if url is empty, skip the menu dividers and reset the menu selection to default
    if (newURL != "") {

        // if url is "-", it is this page -- reset the menu:
        if (newURL == "-") {
            resetMenu();
        }
        // else, send page to designated URL            
        else {
            document.location.href = newURL;
        }
    }
}

// resets the menu selection upon entry to this page:
function resetMenu() {
    document.gomenu.selector.selectedIndex = 2;
}
</script> -->