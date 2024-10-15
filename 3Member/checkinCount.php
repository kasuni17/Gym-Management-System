<?php

include "dbcon.php";

if (!$conn) {
    die("Connection Failed");
}

$sql = "SELECT * FROM attendance";
$query = $conn->query($sql);

// echo "$query->num_rows";

if ($query->num_rows >= 1) {
    echo "&emsp; Low";
} elseif ($query->num_rows >= 4) {
    echo " Moderate";
} elseif ($query->num_rows >= 10) {
    echo " High";
} else {
    echo "";
}