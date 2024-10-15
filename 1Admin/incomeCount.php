<?php

include "dbcon.php";

if (!$conn) {
    die("Connection Failed");
}

$sql = "SELECT SUM( amount) FROM members";
$amountsum = mysqli_query($conn, $sql);
$row_amountsum = mysqli_fetch_assoc($amountsum);
$totalRows_amountsum = mysqli_num_rows($amountsum);
echo $row_amountsum['SUM( amount)'];