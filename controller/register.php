<?php
session_start();
include("../functions.php");

if (isset($_POST["register"])) {
  $result = registration($_POST);
  $_SESSION["message"] = $result["result"];
  if ($result > 0)
    header("Location: ../form/login.php");
  else
    header("Location: ../form/register.php");
} else {
  die("Akses dilarang...");
}
