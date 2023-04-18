<?php
session_start();
include("../config.php");

$result = deleteData($_GET["nrp"]);

if ($result["status"] > 0 || $result["status"] < 0) {
  $_SESSION["message"] = $result["result"];
  header("Location: ../index.php");
}
