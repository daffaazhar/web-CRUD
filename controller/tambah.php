<?php
session_start();
include("../functions.php");

if (isset($_POST["tambah"])) {
  $result = addData($_POST);
  $_SESSION["message"] = $result["result"];
  if ($result["status"] > 0)
    header("Location: ../index.php");
  else
    header("Location: ../form/tambah.php");
} else {
  die("Akses dilarang...");
}
