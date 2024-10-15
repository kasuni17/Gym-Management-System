<?php

include "dbcon.php";
$qry = "SELECT gender, count(*) as number FROM members GROUP BY gender";
$result = mysqli_query($conn, $qry);
?>

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
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/attendance.css">
    <title>ICBT VIP GYM - Chart Representation</title>


    <!-- Charts -->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Gender', 'Number'],
            <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo "['" . $row["gender"] . "', " . $row["number"] . "],";
                }
                ?>
        ]);
        var options = {
            title: 'Percentage of Male and Female GYM Members',
            //is3D:true,  
            pieHole: 0.0
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
    </script>

    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['Terms', 'Total Amount', ],

            <?php
                $query1 = "SELECT gender, SUM(amount) as numberone FROM members; ";

                $rezz = mysqli_query($conn, $query1);
                while ($data = mysqli_fetch_array($rezz)) {
                    $services = 'Earnings';
                    $numberone = $data['numberone'];
                    // $numbertwo=$data['numbertwo'];
                ?>['<?php echo $services; ?>', <?php echo $numberone; ?>, ],
            <?php
                }
                ?>

            <?php
                $query10 = "SELECT quantity, SUM(amount) as numbert FROM equipment";
                $res1000 = mysqli_query($conn, $query10);
                while ($data = mysqli_fetch_array($res1000)) {
                    $expenses = 'Expenses';
                    $numbert = $data['numbert'];

                ?>['<?php echo $expenses; ?>', <?php echo $numbert; ?>, ],
            <?php
                }
                ?>


        ]);

        var options = {

            width: "1050",
            legend: {
                position: 'none'
            },

            bars: 'horizontal', // Required for Material Bar Charts.
            axes: {
                x: {
                    0: {
                        side: 'top',
                        label: 'Total'
                    } // Top x-axis.
                }
            },
            bar: {
                groupWidth: "100%"
            }
        };

        var chart = new google.charts.Bar(document.getElementById('top_y_div'));
        chart.draw(data, options);
    };
    </script>

    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['Services', 'Total Numbers'],
            // ["King's pawn (e4)", 44],
            // ["Queen's pawn (d4)", 31],
            // ["Knight to King 3 (Nf3)", 12],
            // ["Queen's bishop pawn (c4)", 10],
            // ['Other', 3]

            <?php
                $query = "SELECT services, count(*) as number FROM members GROUP BY services";
                $res = mysqli_query($conn, $query);
                while ($data = mysqli_fetch_array($res)) {
                    $services = $data['services'];
                    $number = $data['number'];
                ?>['<?php echo $services; ?>', <?php echo $number; ?>],
            <?php
                }
                ?>

        ]);

        var options = {
            // title: 'Chess opening moves',
            width: 1050,
            legend: {
                position: 'none'
            },
            // chart: { title: 'Chess opening moves',
            //          subtitle: 'popularity by percentage' },
            bars: 'horizontal', // Required for Material Bar Charts.
            axes: {
                x: {
                    0: {
                        side: 'top',
                        label: 'Total'
                    } // Top x-axis.
                }
            },
            bar: {
                groupWidth: "100%"
            }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
    };
    </script>

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

            <li>
                <a href="managestaff.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">Staff Management</span>
                </a>
            </li>

            <li class="active">
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
                    <h1>Chart Representation</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="report.php">Reports</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="reportCharts.php">Chart Representation</a>
                        </li>
                    </ul>
                </div>
            </div>



            <!-- css -->

            <br>
            <div id="content2" style="margin-left:4px ;">
                <div class="chart" id="content-header">
                    <br>
                    <h1 style="color:white; margin: 30px;" class="text-center">Earning and Expenses Report <i
                            class="fas fa-chart-bar"></i></h1>

                    <div style="margin: 30px" class="container-fluid">

                        <div class="row-fluid">
                            <div class="span12">
                                <div id="top_y_div" style="width: 800px; height: 220px;"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="chart" id="content-header">
                    <br>
                    <h1 style="color:white; margin: 30px;" class="text-center">Services Report <i
                            class="fas fa-chart-bar"></i></h1>
                    <div style="margin: 30px" class="container-fluid">

                        <div class="row-fluid">
                            <div class="span12">
                                <div id="top_x_div" style="width: 600px; height: 200px;"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="chart" id="content-header">
                    <br>
                    <h1 style="color:white; margin: 30px;" class="text-center">Registered Member's Report <i
                            class="fas fa-chart-bar"></i></h1>

                    <div class="container-fluid">

                        <div class="row-fluid">
                            <div class="span12">
                                <div id="piechart"
                                    style="width: 600px; height: 300px; margin-left:auto; margin-right:auto;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <style>
            .chart {
                background-color: #0C0C1E;
                margin-bottom: 40px;
                border-radius: 20px;
                padding-bottom: 30px;
                align-content: center;
                width: 1100px;
                
            }
            </style>






        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="js/script.js"></script>
</body>

</html>