<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "student_information";
$db = mysqli_connect($server, $user, $password, $database);

if (!$db) {
  die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
