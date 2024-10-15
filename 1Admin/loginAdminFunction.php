<?php

include('dbcon.php');

session_start();



// If user clicks the login button
if (isset($_POST["btnLogin"])) {
    // Get form input data
    $user = $_POST["username"];
    $pass = $_POST["password"];

    loginUser1($conn, $user, $pass);

    // Input validation
    //     if (inputsEmptyLogin($user, $pass)) {

    //         header("location: loginAdmin.php?err=empty_inputs");
    //     } else {
    //         // If all inputs are error free
    //         loginUser($conn, $user, $pass);
    //     }
    // } else {
    //     header("location: loginAdmin.php?err=inva");
}



// Function for login
function loginUser1($conn, $user, $pass)
{

    $sql = "SELECT * FROM adminn WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: loginAdmin.php?err=failedstmt");
    } else {

        // Bind data with the statement
        mysqli_stmt_bind_param($stmt, "s", $user);
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
                $_SESSION["adminid"] = $row["adminid"];
                $_SESSION["username"] = $row["username"];
            } else {
                echo '<script>alert("wrong password !")</script>';
                echo '<script>window.location.href = "loginAdmin.php";</script>';

                exit();
            }
        } else {
            echo '<script>alert("wrong email !")</script>';
            echo '<script>window.location.href = "loginAdmin.php";</script>';

            exit();
        }
    }
    // Close the statement
    mysqli_stmt_close($stmt);
    header("location: index.php?err=noerrors");
}


// Validations

// function inputsEmptyRegister($name, $email, $mobile, $pass){
// global $value;
// if(empty($name) || empty($mobile) || empty($email) || empty($pass)){
// $value = true;
// }else{
// $value = false;
// }
// return $value;
// }

function inputsEmptyLogin($user, $pass)
{
    global $value;
    if (empty($user) || empty($pass)) {
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
// global $value;
// if(!preg_match("/^[a-z A-Z]+$/",$name)){
// $value = true;
// }

// else{
// $value = false;
// }
// return $value;
// }

// function mobileInvalid($mobile){
// global $value;
// if(!preg_match("/^[0][\d]{12}$/",$mobile)){
// $value = true;
// }
// else{
// $value = false;
// }
// return $value;
// }