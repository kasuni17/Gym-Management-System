<?php



if (isset($_POST['fullname'])) {
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $gender = $_POST["gender"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $designation = $_POST["designation"];
    $id = $_POST["id"];

    include 'dbcon.php';
    $qry = "update staff set fullname='$fullname', username='$username', gender='$gender', contact='$contact',  address='$address', designation='$designation' where staffid='$id'";
    $result = mysqli_query($conn, $qry);

    if (!$result) {
        // echo "ERROR!!";
        echo '<script>alert("Error !")</script>';
        echo '<script>window.location.href = "viewstaff.php";</script>';
    } else {

        echo '<script>alert("Updated !")</script>';
        echo '<script>window.location.href = "viewstaff.php";</script>';
    }
} else {
    echo "<h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='index.php'> DASHBOARD </a></h3>";
}
