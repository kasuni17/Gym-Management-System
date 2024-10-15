<?php
$Server = "localhost";
$User = "root";
$Pass = "";
$database = "project_gym_db";

$conn = mysqli_connect($Server, $User, $Pass, $database);
if (!$conn) {
  die("Connection Failed : " . mysqli_connect_error());
}