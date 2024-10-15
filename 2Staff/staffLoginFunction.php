<?php
include "dbcon.php";

// If user clicks the login button
if (isset($_POST["staffLoginBtn"])) {
    // Get form input data
    $email = $_POST["email"];
    $pass = $_POST["password"];


    // Input validation
    if (inputsEmptyLogin($email, $pass)) {

        header("location: loginStaff.php?err=empty_inputs");
    } else if (emailInvalid($email)) {

        header("location: loginStaff.php?err=invalid_email");
    } else if (passwordInvalid($pass)) {

        header("location: loginStaff.php?err=invalid_password");
    } else {
        // If all inputs are error free
        loginUser($conn, $email, $pass);
    }
} else {
    header("location: loginStaff.php?err=inva");
}



// Function for Staff login
function loginUser($conn, $email, $pass)
{
    $sql = "SELECT * FROM staff WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: loginStaff.php?err=failedstmt");
    } else {

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $data = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($data)) {
            if ($pass == $row["password"]) {
                session_start();
                $_SESSION["username"] = $row["username"];
                $_SESSION["staffid"] = $row["staffid"];
            } else {
                echo '<script>alert("wrong password !")</script>';
                echo '<script>window.location.href = "loginStaff.php";</script>';
                // header("location: loginStaff.php?err=loginfailedpass");
                exit();
            }
        } else {
            echo '<script>alert("wrong email !")</script>';
            echo '<script>window.location.href = "loginStaff.php";</script>';
            // header("location: loginStaff.php?err=loginfailedemail");
            exit();
        }
    }
    // Close the statement
    mysqli_stmt_close($stmt);
    header("location: index.php?err=noerrors");
}



// Validations
function inputsEmptyLogin($email, $pass)
{
    global $value;
    if (empty($email) || empty($pass)) {
        $value = true;
    } else {
        $value = false;
    }
    return $value;
}

function emailInvalid($email)
{
    global $value;
    if (!preg_match("/^[a-zA-Z\d\._-]+@[a-zA-Z\d_-]+\.[a-zA-Z\d\.]{2,}$/", $email)) {
        $value = true;
    } else {
        $value = false;
    }
    return $value;
}

function passwordInvalid($pass)
{
    global $value;
    if (!preg_match("/^.{4,}$/", $pass)) {
        $value = true;
    } else {
        $value = false;
    }
    return $value;
}
