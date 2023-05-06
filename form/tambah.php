<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: ./login.php");
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
  <title>HIMIT Satu Atap</title>
</head>

<body class="flex justify-center items-center py-12 overflow-x-hidden">
  <?php if (isset($_SESSION["message"])) : ?>
    <div class="toast-warning">
      <div class="toast-content">
        <i class='bx bx-x warning'></i>
        <div class="message">
          <span class="text text-1">Gagal Menambahkan Data</span>
          <span class="text text-2"><?= $_SESSION["message"] ?></span>
        </div>
        <i class="bx bx-x close"></i>
        <div class="progress-warning"></div>
      </div>
    </div>
  <?php endif ?>

  <div>
    <h3 class="font-bold text-[32px] text-[#2d333a] text-center">Tambah Data Mahasiswa</h3>
    <p class="text-[#2d333a] mb-6">Isi kolom di bawah ini untuk menambahkan data mahasiswa.</p>

    <form class="relative w-[27.5rem]" action="../controller/tambah.php" method="POST" enctype="multipart/form-data">
      <div class="relative mb-3 h-[50px]">
        <input id="nrp" class="form__input" type="number" name="nrp" autocomplete="off" placeholder=" " required />
        <label for="nrp" class="form__label">NRP</label>
      </div>
      <div class="relative mb-3 h-[50px]">
        <input id="nama" class="form__input" type="text" name="nama" autocomplete="off" placeholder=" " required pattern="[A-Za-z ]+" />
        <label class="form__label" for="nama">Nama</label>
      </div>
      <div class="flex gap-x-4 items-center mb-3 w-full">
        <label class="text-[#6f7780] w-[35%]">Jenis Kelamin</label>
        <div class="flex w-full gap-x-2">
          <div class="flex items-center pl-4 border border-[#c2c8d0] border-[1.5px] rounded-md w-full">
            <input id="bordered-radio-1" type="radio" value="laki-laki" name="jenis_kelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300" checked>
            <label for="bordered-radio-1" class="w-full py-2 pr-3 ml-2 text-gray-900">Laki-laki</label>
          </div>
          <div class="flex items-center pl-4 border border-[#c2c8d0] border-[1.5px] rounded-md w-full">
            <input id="bordered-radio-2" type="radio" value="perempuan" name="jenis_kelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
            <label for="bordered-radio-2" class="w-full py-2 pr-3 ml-2 text-gray-900">Perempuan</label>
          </div>
        </div>
      </div>

      <div class="relative mb-3 h-[50px]">
        <select id="jurusan" name="jurusan" class="form__input" required>
          <option disabled selected>-- Pilih Jurusan --</option>
          <option>Teknik Informatika</option>
          <option>Sains Data Terapan</option>
        </select>
        <label class="form__label" for="jurusan"></label>
      </div>
      <div class="relative mb-3 h-[50px]">
        <input id="email" class="form__input" type="email" name="email" autocomplete="off" placeholder=" " required />
        <label class="form__label" for="email">Email</label>
      </div>
      <div class="relative mb-3 h-[75px]">
        <textarea id="alamat" class="form__input resize-none" name="alamat" autocomplete="off" placeholder=" " required></textarea>
        <label class="form__label" for="alamat">Alamat</label>
      </div>
      <div class="mb-6">
        <label class="block text-[#6f7780] mb-3" for="gambar">Foto Profil</label>
        <div class="flex justify-between items-center">
          <img src="../img/avatar-placeholder.jpeg" alt="" id="image-preview" class="w-20 h-20 rounded-full object-cover">
          <div>
            <input type="file" accept="image/png, image/jpeg, image/jpg, image/webp" name="gambar" id="gambar" class="w-full relative py-2 px-3 flex items-center text-sm border-[1.5px] border-[#c2c8d0] rounded-md cursor-pointer focus:outline-none file:float-right file:ml-4 file:bg-[#2363DE] file:border-none file:absolute file:top-0 file:-right-1 file:text-white file:h-full file:px-4 file:cursor-pointer" onchange="imagePreview()">
            <p class="mt-1 text-sm text-gray-500">PNG, JPG, WEBP, atau JPEG (Max. 3 MB)</p>
          </div>
        </div>
      </div>
      <div class="flex items-center mt-10 gap-x-3">
        <a href="../index.php" class="w-1/2 text-center px-4 py-2 bg-[#e1e1e1] rounded">Kembali</a>
        <button type="submit" name="tambah" class="w-1/2 inline-block bg-[#2363DE] text-white px-4 py-2 rounded">Tambah</button>
      </div>
    </form>
  </div>
</body>

<script src="../js/main.js"></script>
<?php if (isset($_SESSION["message"])) : ?>
  <script>
    showToast();
  </script>
<?php endif ?>
<?php unset($_SESSION["message"]) ?>

</html>