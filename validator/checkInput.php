<?php
include("../functions.php");

$inputName = isset($_GET["inputName"]) ? $_GET["inputName"] : "";
$inputValue = isset($_GET[$inputName]) ? $_GET[$inputName] : "";

if ($inputName === "username") {
  $result = query("SELECT * FROM users WHERE username='$inputValue'");
  echo count($result) > 0 ? "
  <div class='flex items-center mt-2 gap-x-2 error'>
    <i class='bx bxs-error-circle text-red-600'></i>
    <p class='text-sm text-red-600'>Username telah digunakan</p>
  </div>
  " : "";
} elseif ($inputName === "email") {
  $result = query("SELECT * FROM users WHERE email='$inputValue'");
  echo count($result) > 0 ? "
  <div class='flex items-center mt-2 gap-x-2 error'>
    <i class='bx bxs-error-circle text-red-600'></i>
    <p class='text-sm text-red-600'>Email telah digunakan</p>
  </div>
  " : "";
}
