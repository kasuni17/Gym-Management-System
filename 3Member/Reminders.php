<?php
session_start();

if (!isset($_SESSION["fullname"])) {
    header("location:loginMember.php");
    exit(); // Added exit to stop further execution
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

    <title>ICBT VIP GYM - Reminder</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bx-dumbbell bx-tada'></i>
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
                    <span class="text">To-Do</span>
                </a>
            </li>
            <li class="active">
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
                        <h1>Reminders</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Dashboard</a>
                            </li>
                            <li><i class='bx bx-chevron-right'></i></li>
                            <li>
                                <a class="active" href="Reminders.php">Reminders</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- MAIN -->

                <!-- css -->

                <div class="span12" style="padding-left:20px; font-size:18px;">
                    <?php
                    include "dbcon.php";
                    $qry = "SELECT reminder FROM members WHERE user_id='" . $_SESSION['user_id'] . "'";
                    $cnt = 1;
                    $result = mysqli_query($conn, $qry);
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <?php if ($row['reminder'] == '1') { ?>
                            <div class="alert alert-danger" role="alert" style="margin:18px;">
                                <h3 class="alert-heading" style="color:red;">ALERT</h3><br>
                                <h4>This is to notify you that your current membership program is going to expire soon. Please clear up your payments before your due dates. <br>IT IS IMPORTANT THAT YOU CLEAR YOUR DUES ON TIME IN ORDER TO AVOID SERVICE DISRUPTIONS.</h4><br>
                                <hr>
                                <p class="mb-0">We value you as our customer and look forward to continue serving you in the future.</p>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">NO REMINDERS YET!</h4>
                            </div>
                    <?php }
                    } ?>
                </div>
            </main>

        </section>
        <!-- CONTENT -->


        <script src="js/script.js"></script>
    </section>
</body>

</html>
