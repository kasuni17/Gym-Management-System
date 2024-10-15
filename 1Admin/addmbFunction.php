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


 //send mail

 $to = 'tanuli@gmail.com';
 $mail_subject = 'ICBT VIP GYM';
 $email_body = 'massage from uf';
 $email_body .= "<b>From:</b> {$fullname} <br>";
 $email_body .= "<b>email:</b>: {$email} <br>";
 // $email_body .= "<b>Message:</b><br>" . nl2br(strip_tags($message));
 $email_body .= "<b>Message:</b> {$password}";

 $header = "From: {$email}/r/n Content-Type: text/html;";

 $send_mail_result = mail($to, $mail_subject, $email_body, $header);



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