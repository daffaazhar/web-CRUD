<?php
session_start();
include("../functions.php");

if (isset($_POST["register"])) {
  $result = registration($_POST);
  if ($result > 0) {
    $_SESSION["message"] = $result["result"];
    header("Location: ../form/login.php");
  } else {
    $_SESSION["message"] = $result["result"];
    header("Location: ../form/register.php");
  }
} else {
  die("Akses dilarang...");
}
