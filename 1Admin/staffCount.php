<?php

$Server = "localhost";
$User = "root";
$Pass = "";
$database = "project_gym_db";

$conn = mysqli_connect($Server, $User, $Pass, $database);

if(!$conn){
    die("Connection Failed");
}

$sql = "SELECT * FROM staff";
                $query = $conn->query($sql);

                echo "$query->num_rows";
