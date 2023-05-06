<?php
session_start();
unset($_SESSION["login"]);
unset($_SESSION["username"]);
$_SESSION["logout_message"] = "Anda telah logout";
setcookie("id", "", time() - 3600, "/");
setcookie("key", "", time() - 3600, "/");
if (isset($_SERVER['HTTP_COOKIE'])) {
  $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
  foreach ($cookies as $cookie) {
    $parts = explode('=', $cookie);
    $name = trim($parts[0]);
    setcookie($name, '', time() - 3600);
    setcookie($name, '', time() - 3600, '/');
  }
}
header("Location: ../form/login.php");
