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

    <title>ICBT VIP GYM - Announcement</title>
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
            <li>
                <a href="toDo.php">
                    <i class='bx bxs-pen'></i>
                    <span class="text">To - Do</span>
                </a>
                </div>
            </li>
            <li>
                <a href="Reminders.php">
                    <i class='bx bxs-error'></i>
                    <span class="text">Reminders</span>
                </a>
            </li>
            <li class="active">
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
            <i class='bx bx-dumbbell bx-tada' ></i>
            <a class="nav-link">Welcome to ICBT VIP GYM!</a>
        </nav>
        <!-- NAVBAR -->
        <section id="content2">

            <!-- MAIN -->
            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>Announcement</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Dashboard</a>
                            </li>
                            <li><i class='bx bx-chevron-right'></i></li>
                            <li>
                                <a class="active" href="Announcement.php">Announcement</a>
                            </li>
                        </ul>
                    </div>
                </div>


            </main>
            <!-- MAIN -->

            <!-- css -->


            <div class="row-fluid" style="padding-left:20px; ">

                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i
                                    class="icon-chevron-down"></i></span>
                            <h2>Gym Announcement</h2>
                        </div><br>
                        <div class="widget-content nopadding collapse in" id="collapseG2">
                            <ul class="recent-posts" style="font-size:18px;">
                                <li>

                                    <?php

                                    include "dbcon.php";
                                    $qry = "select * from announcements";
                                    $result = mysqli_query($conn, $qry);

                                    while ($row = mysqli_fetch_array($result)) {

                                        echo "<div class='article-post'>";
                                        echo "<span class='user-info'> By: System Administrator &nbsp &nbsp| &nbsp &nbspDate: " . $row['date'] . " </span>";
                                        echo "<p>" . $row['message'] . "</p><br>";
                                    }

                                    echo "</div>";
                                    echo "</li>";
                                    ?>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--end of span 12 -->



            </div><!-- End of row-fluid -->




            </main>



        </section>
        <!-- CONTENT -->


        <script src="js/script.js"></script>
</body>

</html>