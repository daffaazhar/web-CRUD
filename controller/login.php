<?php
session_start();
include("../config.php");

if (isset($_POST["login"])) {
  global $conn;
  $username = $_POST["usernameEmail"];
  $email = $_POST["usernameEmail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM USERS WHERE username = '$username' OR email = '$email'");
  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      $_SESSION["login"] = true;
      $_SESSION["username"] = $row["username"];

      if (isset($_POST["remember"])) {
        setcookie("id", $row["id"], time() + 604800, "/");
        setcookie("key", hash("sha256", $row["username"]), time() + 604800, "/");
      }

      header("Location: ../index.php");
      exit;
    } else {
      $_SESSION["error_message"] = "Username atau password salah";
      header("Location: ../form/login.php");
    }
  } else {
    $_SESSION["error_message"] = "Username/email tidak ditemukan";
    header("Location: ../form/login.php");
  }
} else {
  die("Akses dilarang...");
}
