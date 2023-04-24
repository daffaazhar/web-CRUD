<?php
session_start();
unset($_SESSION["login"]);
unset($_SESSION["username"]);
$_SESSION["logout_message"] = "Anda telah logout";
header("Location: ../form/login.php");
