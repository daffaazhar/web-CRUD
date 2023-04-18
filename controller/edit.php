<?php
session_start();
include("../functions.php");

if (isset($_POST["edit"])) {
  $result = editData($_POST);
  if ($result["status"] <= 0) {
    $_SESSION["message"] = $result["result"];
    header("Location: ../form/edit.php");
  } else {
    $_SESSION["message"] = $result["result"];
    header("Location: ../index.php");
  }
} else {
  die("Akses dilarang...");
}
