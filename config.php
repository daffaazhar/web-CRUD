<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "student_information";

$conn = mysqli_connect($server, $user, $password, $database);
if (!$conn) {
  die("Database connection error " . mysqli_connect_error());
}
