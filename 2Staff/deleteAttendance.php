<?php

// session_start();
// //the isset function to check username is already loged in and stored on the session
// if(!isset($_SESSION['user_id'])){
// header('location:../index.php');	
// }

include('dbcon.php');

$user_id = $_GET['id'];


$sql = "DELETE FROM attendance WHERE user_id='" . $_GET["id"] . "'";
$res = $conn->query($sql);


$attend = "select * from members where user_id = '$user_id'";
$result_attend = $conn->query($attend);
$row_attend = mysqli_fetch_array($result_attend);
$cnt = $row_attend['attendance_count'];
$attend_count = $cnt;
$sql1 = "update members set attendance_count ='$attend_count' where user_id='$user_id'";
$conn->query($sql1);
?>

<script>
// alert("Delete Successfully");
window.location = "checkin.php";
</script>