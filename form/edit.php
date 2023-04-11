<?php

include("../config.php");

if (!isset($_GET["nrp"])) {
  header("Location: ../index.php");
}

$nrp = $_GET["nrp"];
$sql = "SELECT * FROM STUDENT WHERE nrp = $nrp";
$query = mysqli_query($conn, $sql);
$mahasiswa = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) < 1) {
  die("Data tidak ditemukan...");
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
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../css/style.css">
  <title>HIMIT Satu Atap</title>
</head>

<body class="flex justify-center items-center h-screen">
  <div>
    <h3 class="font-bold text-[32px] text-[#2d333a] text-center">Edit Data Mahasiswa</h3>
    <p class="text-[#2d333a] mb-6">Isi kolom di bawah ini untuk menambahkan data mahasiswa.</p>

    <form class="relative w-[27.5rem]" action="../controller/edit.php" method="POST">
      <input id="nrp" class="form__input" type="number" name="nrp" autocomplete="off" placeholder=" " value="<?= $mahasiswa["nrp"] ?>" hidden />
      <div class="relative mb-3 h-[50px]">
        <input id="nrp" class="form__input" type="number" name="nrp" autocomplete="off" placeholder=" " value="<?= $mahasiswa["nrp"] ?>" disabled />
        <label for="nrp" class="form__label">NRP</label>
      </div>
      <div class="relative mb-3 h-[50px]">
        <input id="nama" class="form__input" type="text" name="nama" autocomplete="off" placeholder=" " value="<?= $mahasiswa["nama"] ?>" pattern="[A-Za-z ]+" required />
        <label class="form__label" for="nama">Nama</label>
      </div>
      <div class="flex gap-x-4 items-center mb-3 w-full">
        <label class="text-[#6f7780] font-semibold w-[35%]">Jenis Kelamin</label>
        <div class="flex w-full gap-x-2">
          <div class="flex items-center pl-4 border border-[#c2c8d0] border-[1.5px] rounded-md w-full">
            <input id="bordered-radio-1" type="radio" value="laki-laki" name="jenis_kelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300" <?= $mahasiswa["jenis_kelamin"] ? "checked" : "" ?>>
            <label for="bordered-radio-1" class="w-full py-2 pr-3 ml-2 font-medium text-gray-900">Laki-laki</label>
          </div>
          <div class="flex items-center pl-4 border border-[#c2c8d0] border-[1.5px] rounded-md w-full">
            <input id="bordered-radio-2" type="radio" value="perempuan" name="jenis_kelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300" <?= $mahasiswa["jenis_kelamin"] ? "checked" : "" ?>>
            <label for="bordered-radio-2" class="w-full py-2 pr-3 ml-2 font-medium text-gray-900">Perempuan</label>
          </div>
        </div>
      </div>

      <div class="relative mb-3 h-[50px]">
        <select id="jurusan" name="jurusan" class="form__input" required>
          <option disabled selected>-- Pilih Jurusan --</option>
          <option <?= $mahasiswa["jurusan"] == "Teknik Informatika" ? "selected" : "" ?>>Teknik Informatika</option>
          <option <?= $mahasiswa["jurusan"] == "Sains Data Terapan" ? "selected" : "" ?>>Sains Data Terapan</option>
        </select>
        <label class="form__label" for="jurusan"></label>
      </div>
      <div class="relative mb-3 h-[50px]">
        <input id="email" class="form__input" type="email" name="email" autocomplete="off" placeholder=" " value="<?= $mahasiswa["email"] ?>" required />
        <label class="form__label" for="email">Email</label>
      </div>
      <div class="relative mb-3 h-[75px]">
        <textarea id="alamat" class="form__input" name="alamat" autocomplete="off" placeholder=" " required><?= $mahasiswa["alamat"] ?></textarea>
        <label class="form__label" for="alamat">Alamat</label>
      </div>
      <div class="relative mb-3 h-[50px]">
        <input class="form__input" id="asal_sekolah" type="text" name="asal_sekolah" autocomplete="off" placeholder=" " value="<?= $mahasiswa["asal_sekolah"] ?>" required />
        <label class="form__label" for="asal_sekolah">Sekolah Asal</label>
      </div>
      <div>
        <button type="submit" name="simpan" class="mt-2 w-full inline-block bg-[#2363DE] text-white px-4 py-2 rounded">Simpan</button>
      </div>
    </form>
  </div>
</body>

<script src="../js/main.js"></script>

</html>