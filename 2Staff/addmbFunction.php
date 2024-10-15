<?php
include "dbcon.php";

if (isset($_POST['submit'])) {

    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];
    $dor = $_POST["dor"];
    $services = $_POST["services"];
    $amount = $_POST["amount"];
    $plan = $_POST["plan"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];


    //code after connection is successfull
    $qry = "INSERT INTO members(fullname,email,password,gender,dor,services,amount,plan,address,contact) values ('$fullname','$email','$password','$gender','$dor','$services','$amount','$plan','$address','$contact')";
    $result = mysqli_query($conn, $qry); //query executes

    if (!$result) {

        echo '<script>alert("Error!")</script>';
        echo '<script>window.location.href = "addmb.php";</script>';
    } else {


        echo '<script>alert("Member details has been added !")</script>';
        echo '<script>window.location.href = "addmb.php";</script>';
    }
} else {
    echo "<h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='index.php'> DASHBOARD </a></h3>";
}
