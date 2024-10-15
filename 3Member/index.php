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

    <title>ICBT VIP GYM - Member Dashboard</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
        <i class='bx bx-dumbbell bx-tada' ></i>
            <span class="text">Hi, <?php echo $_SESSION['fullname']; ?> </span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="index.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
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
            <a class="nav-link">Welcome to ICBT VIP GYM</a>
           
        </nav>
        <!-- NAVBAR -->
        <section id="content2">

            <!-- MAIN -->
            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>Dashboard</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Dashboard</a>
                            </li>
                            <li><i class='bx bx-chevron-right'></i></li>
                            <li>
                                <a class="active" href="index.php">Home</a>
                            </li>
                        </ul>
                    </div>
                        <div class="count" style="float:right; width:500px;">
                            <li>
                            
                            <span class="text">
                                <h3 style="color:white; "><i class='bx bx-calendar' ></i>&emsp;Current occupied level &nbsp&nbsp=
                                        <?php include 'checkinCount.php' ?></h3>
                                    </span>
                        </li>
                    </div>
                </div>



                <br><br>
                
                <style>
                .count {
                    background-color: #0C0C1E;
                    margin-bottom: 10px;
                    border-radius: 20px;
                    padding-top: 15px;
                    padding-bottom: 15px;
                    align-content: center;
                    width: 500px;
                    padding-left: 30px;
                }
                </style>



                <div class="table-data" >
                    <div class="order">
                        <div class="head">
                            <h3>Announcements </h3>
                          
                        </div>
                        <ul class="recent-posts">
                            <li>

                                <?php

                                include "dbcon.php";
                                $qry = "SELECT * FROM announcements";
                                $result = mysqli_query($conn, $qry);

                                while ($row = mysqli_fetch_array($result)) {
                                    //echo "<div class='user-thumb'> <img width='70' height='40' alt='User' src='../img/demo/av1.jpg'> </div>";
                                    echo "<div class='article-post'>";
                                    echo "<span class='user-info'> By: System Administrator &nbsp &nbsp| &nbsp &nbsp  Date: " . $row['date'] . " </span> ";
                                    echo "<p>" . $row['message'] . "</p><br>";
                                }
                                echo "</div>";
                                echo "</li>";
                                ?>

                               
                            </li>
                        </ul>
                    </div>

                </div>
            
            <!-- MAIN -->

          
                 <div class="table-data">

                    <div class="todo">
                        <div class="head">
                            <h3>To-do List</h3>
                            <i class='bx bx-plus'></i>
                            <i class='bx bx-filter'></i>
                        </div>
                   




                        <!-- css -->

                        <div class="span6">

                            <div class="widget-box">
                                <div class="widget-content nopadding">

                                    <?php
                                    include "dbcon.php";
                                    include "session.php";
                                    $qry = "SELECT * FROM todo WHERE user_id='" . $_SESSION['user_id'] . "'";
                                    $result = mysqli_query($conn, $qry);

                                    echo "<table class='table table-striped table-bordered'>
              <thead >
                <tr>
                  <th style='width:300px; text-align:left; font-size:19px; padding:10px; padding-top:0px;'>Description</th>
                  <th  style='width:200px; text-align:left; font-size:19px;'>Status</th>
                  <th>Opts</th>
                </tr>
              </thead>";
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<tbody>
                <tr>
                  <td class='taskDesc'><a href='to-do.php'><i class='icon-plus-sign'></i></a>" . $row['task_desc'] . "</td>
                  <td class='taskStatus'><span class='in-progress'>" . $row['task_status'] . "</span></td>
                <td class='taskOptions'><a href='update-todo.php?id=" . $row['taskid'] . "' class='tip-top' data-original-title='Update'><i class='icon-edit'></i></a>  <a href='actions/remove-todo.php?id=" . $row['taskid'] . "' class='tip-top' data-original-title='Done'><i class='icon-ok'></i></a></td>
                </tr>
				
               
              </tbody>";
                                    }
                                    ?>

                                    </table>
                                </div>
                            </div>



                        </div> <!-- End of ToDo List Bar -->





                    </div>
                </div>
            </main>
        </section>
        <!-- CONTENT -->

    </section>
        <script src="js/script.js"></script>
</body>

</html>