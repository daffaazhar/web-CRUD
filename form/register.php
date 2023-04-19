<!DOCTYPE html>
<html lang="en">

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
      <form action="" class="bg-white w-96 px-8 pt-8 pb-6 rounded-xl shadow-[0_10px_25px_rgba(92,99,105,0.2)]">
        <h1 class="mt-4 text-3xl font-bold text-[#34364a] leading-relaxed">Buat Akunmu!</h1>
        <p class="text-base text-[#868686] mb-6">Masukkan Nama, Email, dan Password Anda membuat akun EduCode</p>
        <div class="relative mb-3.5 h-[50px]">
          <input type="text" class="form__input" autocomplete="off" placeholder=" " />
          <label for="" class="form__label">Username</label>
        </div>
        <div class="relative mb-3.5 h-[50px]">
          <input type="text" class="form__input" autocomplete="off" placeholder=" " />
          <label for="" class="form__label">Email</label>
        </div>
        <div class="relative mb-3.5 h-[50px]">
          <input type="password" class="form__input" autocomplete="off" placeholder=" " />
          <label for="" class="form__label">Password</label>
        </div>
        <div class="relative mb-3.5 h-[50px]">
          <input type="password" class="form__input" autocomplete="off" placeholder=" " />
          <label for="" class="form__label">Konfirmasi Password</label>
        </div>
        <div class="mb-9">
          <button type="submit" class="w-full mt-2  inline-block bg-[#2363DE] text-white px-4 py-2 rounded">Daftar</button>
        </div>
        <div class="flex justify-center">
          <p class="text-sm text-[#868686]">Sudah punya akun? <a class="font-semibold text-[#2363DE]" href="login.html">Login Disini</a></p>
        </div>
      </form>
    </div>
  </div>
</body>

</html>