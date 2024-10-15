<?php
include "dbcon.php";
session_start();

// if (!isset($_SESSION["fullname"])) {
//     header("location:loginMember.php");
// }
// $userId = $_SESSION["user_id"];
// $userName = $_SESSION['fullname'];


// If user clicks the login button
if (isset($_POST["btnLogin"])) {
    // Get form input data
    $email = $_POST["email"];
    $pass = $_POST["password"];


    // Input validation
    if (inputsEmptyLogin($email, $pass)) {

        header("location: loginMember.php?err=empty_inputs");
    } else if (emailInvalid($email)) {

        header("location: loginMember.php?err=invalid_email");
    } else if (passwordInvalid($pass)) {

        header("location: loginMember.php?err=invalid_password");
    } else {
        // If all inputs are error free
        loginUser($conn, $email, $pass);
    }
} else {
    header("location: loginMember.php?err=inva");
}



// Function for login
function loginUser($conn, $email, $pass)
{

    $sql = "SELECT * FROM members WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: loginMember.php?err=failedstmt");
    } else {

        // Bind data with the statement
        mysqli_stmt_bind_param($stmt, "s", $email);
        // Execute the statement
        mysqli_stmt_execute($stmt);
        // Save results if available
        $data = mysqli_stmt_get_result($stmt);
        // Check if there is at least one result
        if ($row = mysqli_fetch_assoc($data)) {
            // Verify password
            if ($pass == $row["password"]) {
                // Setup session variables
                // session_start();
                $_SESSION["user_id"] = $row["user_id"];
                $_SESSION["fullname"] = $row["fullname"];
            } else {
                echo '<script>alert("wrong password !")</script>';
                echo '<script>window.location.href = "loginMember.php";</script>';
                // header("location: loginStaff.php?err=loginfailedpass");
                exit();
            }
        } else {
            echo '<script>alert("wrong email !")</script>';
            echo '<script>window.location.href = "loginMember.php";</script>';
            // header("location: loginStaff.php?err=loginfailedemail");
            exit();
        }
    }
    // Close the statement
    mysqli_stmt_close($stmt);
    header("location: index.php?err=noerrors");
}


// Validations

// function inputsEmptyRegister($name, $email, $mobile, $pass){
//     global $value;
//     if(empty($name) || empty($mobile) || empty($email) || empty($pass)){
//         $value = true;
//     }else{
//         $value = false;
//     }
//     return $value;
// }

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

// function nameInvalid($name){
//     global $value;
//     if(!preg_match("/^[a-z A-Z]+$/",$name)){
//         $value = true;
//     }

//     else{
//         $value = false;
//     }
//     return $value;
// }

// function mobileInvalid($mobile){
//     global $value;
//     if(!preg_match("/^[0][\d]{12}$/",$mobile)){
//         $value = true; 
//     }
//     else{
//         $value = false;
//     }
//     return $value;
// }



?>

<script src="jquery-3.6.1.min.js"></script>
<script src="sweetalert2.all.min.js"> </script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>