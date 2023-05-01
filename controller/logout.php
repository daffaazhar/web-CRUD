<?php
session_start();
unset($_SESSION["login"]);
unset($_SESSION["username"]);
$_SESSION["logout_message"] = "Anda telah logout";
setcookie("id", "", time() - 3600, "/");
setcookie("key", "", time() - 3600, "/");
header("Location: ../form/login.php");
