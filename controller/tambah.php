<?php
session_start();
include("../config.php");

if (isset($_POST["tambah"])) {
  $result = addData($_POST);
  if ($result["status"] > 0) {
    $_SESSION["message"] = $result["result"];
    header("Location: ../index.php");
  } else {
    $_SESSION["message"] = $result["result"];
    header("Location: ../form/tambah.php");
  }
} else {
  die("Akses dilarang...");
}
