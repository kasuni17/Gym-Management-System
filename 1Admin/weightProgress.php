<?php

include "dbcon.php";

if (!$conn) {
    die("Connection Failed");
}

$sql = "SELECT SUM( curr_weight - ini_weight) FROM members WHERE user_id='$id'";
$amountsum = mysqli_query($conn, $sql);
$row_amountsum = mysqli_fetch_assoc($amountsum);
$totalRows_amountsum = mysqli_num_rows($amountsum);
echo $row_amountsum['SUM( curr_weight - ini_weight)'];
