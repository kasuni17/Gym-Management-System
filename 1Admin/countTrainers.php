<?php

include 'dbcon.php';

if(!$conn){
    die("Connection Failed");
}

$sql = "SELECT * FROM staff WHERE designation='Trainer'";
                $query = $conn->query($sql);

                echo "$query->num_rows";
