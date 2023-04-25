<?php
session_start();
include("../functions.php");

if (isset($_POST["edit"])) {
  $result = editData($_POST);
  $_SESSION["message"] = $result["result"];
  if ($result["status"] >= 0)
    header("Location: ../index.php");
  else
    header("Location: ../form/edit.php?nrp=" . $_POST["nrp"]);
} else {
  die("Akses dilarang...");
}
