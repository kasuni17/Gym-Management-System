<?php
session_start();

if (!isset($_SESSION["fullname"])) {
    header("location:loginMember.php");
}
$userId = $_SESSION["user_id"];
$userName = $_SESSION['fullname'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="css\style.css">

    <title>ICBT VIP GYM - ToDo List</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
    <a href="#" class="brand">
            <i class='bx bx-dumbbell bx-tada' ></i>
            <span class="text">Hi, <?php echo $_SESSION['fullname']; ?> </span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="index.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="toDo.php">
                    <i class='bx bxs-pen'></i>
                    <span class="text">To-Do</span>
                </a>
                </div>
            </li>
            <li>
                <a href="Reminders.php">
                    <i class='bx bxs-error'></i>
                    <span class="text">Reminders</span>
                </a>
            </li>
            <li>
                <a href="Announcement.php">
                    <i class='bx bxs-bell-ring'></i>
                    <span class="text">Announcement</span>
                </a>
            </li>

            <li>
                <a href="mbReport.php">
                    <i class='bx bxs-report'></i>
                    <span class="text">Report</span>
                </a>
            </li>
            <li>
                <a href="changePass.php">
                    <i class='bx bi-person-fill-lock'></i>
                    <span class="text">Change Password</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            
            <li>
                <a href="logOut.php" class="logout">
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
            <a class="nav-link">Welcome to ICBT VIP GYM!</a>
        </nav>
        <!-- NAVBAR -->
        <section id="content2">

            <!-- MAIN -->
            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>To-Do List</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Dashboard</a>
                            </li>
                            <li><i class='bx bx-chevron-right'></i></li>
                            <li>
                                <a class="active" href="toDo.php">To-Do List</a>
                            </li>
                        </ul>
                    </div>
                </div>


            </main>

            <!-- css -->

            <div class="span12">
             
                    <div class="widget-content nopadding">
                        <form id="form-wizard" class="form-horizontal" action="addToDo.php" method="POST">
                            <div id="form-wizard-1" class="step">

                                <div class="control-group">
                                    <label class="control-label controls">Please Enter Your Task :</label>&nbsp&nbsp
                                    
                                        <input type="text" class="span11" name="task_desc" style= "height:40px; width:350px; font-size:15px;" placeholder="I'll be doing 12 set up and . . ." />
                                    
                                </div>

                                <br>

                                <div class="control-group">
                                    <label class="control-label controls">Please Select a Status :</label>&emsp;
                                    
                                        <select name="task_status" required="required" id="select"  style= "height:40px; width:350px; font-size:15px;">
                                            <option value="In Progress">In Progress</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Complete">Complete</option>
                                        </select>
                                    
                                </div>

                                <br>

                                <div class="form-actions">
                                    <input type="hidden" name="userid" value="<?php echo $user_id; ?>">
                                    <input id="add" class="btn-primary" type="submit" value="Add To List" />
                                    <div id="status"></div>
                                </div>
                                <div id="submitted"></div>
                        </form>
                    </div>
                    <!--end of widget-content -->
                </div>
                <!--end of widget box-->
      

             </div>
            <!--end of span 12 -->





            </main>



        </section>
        <!-- CONTENT -->
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
        .span12{
            width: 750px;
			height: 35px;
			border-radius: 8px;
			padding: 10px;
            font-size: 20px;
            margin:18px;
            margin-top:0px;
        }
        .btn-primary {
            border: none;
            padding: 10px;
            border-radius: 8px;
            width: 140px;
            height: 40px;
            background: #1a1a47;
            color: #fff;
            font-size: 17px;
            -webkit-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
            -moz-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
            box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
            float: left;
    }

    
        
    </style>


        <script src="js/script.js"></script>
</body>

</html>