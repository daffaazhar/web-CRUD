<?php
session_start();
if (isset($_SESSION["login"])) {
  header("Location: ../index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../css/style.css">
  <title>HIMIT Satu Atap - Register</title>
</head>

<body>
  <div class="flex justify-center items-center bg-gradient-to-r from-cyan-500 to-blue-500">
    <div class="flex justify-center items-center h-screen">
      <form action="../controller/register.php" method="POST" class="bg-white w-96 px-8 pt-8 pb-6 rounded-xl shadow-[0_10px_25px_rgba(92,99,105,0.2)]">
        <img src="../img/logo-himit.png" alt="Logo HIMIT" class="w-20">
        <h1 class="mt-2 text-3xl font-bold text-[#34364a] leading-relaxed">Buat Akun.</h1>
        <p class="text-base text-[#868686] mb-6">Yuk isi data berikut untuk menjadi admin!</p>
        <div class="mb-3.5">
          <div class="relative h-[50px]">
            <input type="text" name="username" id="username" class="form__input" autocomplete="off" placeholder=" " onblur="validateInput('username')" required />
            <label for="username" class="form__label">Username</label>
          </div>
          <div id="username-message"></div>
        </div>
        <div class="mb-3.5">
          <div class="relative h-[50px]">
            <input type="email" name="email" id="email" class="form__input" autocomplete="off" placeholder=" " onblur="validateInput('email')" required />
            <label for="email" class="form__label">Email</label>
          </div>
          <div id="email-message"></div>
        </div>
        <div class="mb-3.5">
          <div class="relative h-[50px]">
            <input type="password" name="password" id="password" class="form__input" autocomplete="off" placeholder=" " onblur="validateInput('password')" required />
            <i class='eye-icon bx bx-hide absolute text-xl text-[#939393] cursor-pointer right-3 inset-y-1/4' onclick="togglePasswordVisibility('password')"></i>
            <label for="password" class="form__label">Password</label>
          </div>
          <div id="password-message"></div>
        </div>
        <div class="mb-3.5">
          <div class="relative h-[50px]">
            <input type="password" name="confirmPassword" id="confirmPassword" class="form__input" autocomplete="off" onblur="validateInput('confirmPassword')" placeholder=" " required />
            <i class='eye-icon bx bx-hide absolute text-xl text-[#939393] cursor-pointer right-3 inset-y-1/4' onclick="togglePasswordVisibility('confirmPassword')"></i>
            <label for="confirmPassword" class="form__label">Konfirmasi Password</label>
          </div>
          <div id="confirmPassword-message"></div>
        </div>
        <div class="mb-9">
          <button type="submit" name="register" id="submit-button" class="w-full mt-2 inline-block bg-[#2363DE] text-white px-4 py-2 rounded">Daftar</button>
        </div>
        <div class="flex justify-center">
          <p class="text-sm text-[#868686]">Sudah punya akun? <a class="font-semibold text-[#2363DE]" href="login.php">Login Disini</a></p>
        </div>
      </form>
    </div>
  </div>

  <script src="../js/main.js"></script>
</body>

</html>