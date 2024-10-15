<?php

include 'dbcon.php';

if(!$conn){
    die("Connection Failed");
}

$sql = "SELECT * FROM equipment";
                $query = $conn->query($sql);

                echo "$query->num_rows";
