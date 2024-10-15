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

    <title>ICBT VIP GYM - Members Change_Password</title>
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
            <li class="active">
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
                        <h1>Change Password</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Dashboard</a>
                            </li>
                            <li><i class='bx bx-chevron-right'></i></li>
                            <li>
                                <a class="active" href="changePass.php">Change Password</a>
                            </li>
                        </ul>
                    </div>
                </div>


            </main>
            <!-- MAIN -->

            <!-- css -->

            <div class="container">



                <div class="row">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-6">

                        <div class="login_form">
                            <?php
                            include "dbcon.php";
                            if (isset($_POST['change_password'])) {
                                $currentPassword = $_POST['currentPassword'];
                                $password = $_POST['password'];
                                $passwordConfirm = $_POST['passwordConfirm'];
                                $sql = "SELECT password from members where fullname='$userName' ";


                                $res = mysqli_query($conn, $sql);
                                $res = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($res);
                                // if ($currentPassword = $row['password']) {
                                if ($currentPassword == $row['password']) {
                                    if ($passwordConfirm == '') {
                                        $error[] = 'Please confirm the password.';
                                    }
                                    if ($password != $passwordConfirm) {
                                        $error[] = 'Passwords do not match.';
                                    }
                                    // if (strlen($password) < 5) { // min 
                                    //     $error[] = 'The password is 6 characters long.';
                                    // }

                                    // if (strlen($password) > 20) { // Max 
                                    //     $error[] = 'Password: Max length 20 Characters Not allowed';
                                    // }
                                    if (!isset($error)) {
                                        // $options = array("cost" => 4);
                                        // $password = password_hash($password, PASSWORD_BCRYPT, $options);

                                        $result = mysqli_query($conn, "UPDATE members SET password='$password' WHERE fullname='$userName'");
                                        if ($result) {
                                            // header("location:index.php?password_updated=1");
                                            echo '<script>alert("Password chainged !")</script>';
                                            echo '<script>window.location.href = "index.php";</script>';
                                        } else {
                                            $error[] = 'Something went wrong';
                                        }
                                    }
                                } else {
                                    $error[] = 'Current password does not match.';
                                }
                            }
                            if (isset($error)) {

                                foreach ($error as $error) {
                                    echo '<p class="errmsg">' . $error . '</p>';
                                }
                            }
                            ?>
                            <form method="post" enctype='multipart/form-data' action="">
                                <div class="row">
                                    <div class="col"></div>

                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label>Current Password: </label>
                                            <input type="password" name="currentPassword" class="form-control"
                                                style="height:30px; width:200px;">
                                        </div><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label>New Password: </label>
                                            <input type="password" name="password" class="form-control"
                                                style="height:30px; width:200px;">
                                        </div><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label>Confirm New Password:</label>
                                            <input type="password" name="passwordConfirm" class="form-control"
                                                style="height:30px; width:200px;">
                                        </div><br><br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                    </div>
                                    <div class="col-sm-6">
                                        <button class="btn-success" name="change_password">Change
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-3">
                        </div>

                    </div>






                    <!-- <script>
            function validatePassword() {
                var currentPassword, newPassword, confirmPassword, output = true;

                currentPassword = document.frmChange.currentPassword;
                newPassword = document.frmChange.newPassword;
                confirmPassword = document.frmChange.confirmPassword;

                if (!currentPassword.value) {
                    currentPassword.focus();
                    document.getElementById("currentPassword").innerHTML = "required";
                    output = false;
                } else if (!newPassword.value) {
                    newPassword.focus();
                    document.getElementById("newPassword").innerHTML = "required";
                    output = false;
                } else if (!confirmPassword.value) {
                    confirmPassword.focus();
                    document.getElementById("confirmPassword").innerHTML = "required";
                    output = false;
                }
                if (newPassword.value != confirmPassword.value) {
                    newPassword.value = "";
                    confirmPassword.value = "";
                    newPassword.focus();
                    document.getElementById("confirmPassword").innerHTML = "not same";
                    output = false;
                }
                return output;
            }
            </script> -->



                    </main>



        </section>
        <!-- CONTENT -->


        <script src="js/script.js"></script>
</body>

<style>
.container {
    width: 750px;
    height: 35px;
    border-radius: 8px;
    padding: 10px;
    font-size: 20px;
    margin: 18px;
    margin-top: 1px;
}

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

.span12 {
    width: 750px;
    height: 35px;
    border-radius: 8px;
    padding: 10px;
    font-size: 20px;
    margin: 18px;
}

.btn-success {
    border: none;
    padding: 10px;
    border-radius: 8px;
    width: 140px;
    height: 40px;
    background: #1a1a47;
    color: #fff;
    font-size: 15px;
    -webkit-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    -moz-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    float: left;

}

</style>