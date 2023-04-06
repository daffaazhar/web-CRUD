<?php

include("../config.php");

if (!isset($_GET["nrp"])) {
  header("Location: ../index.php");
}

$nrp = $_GET["nrp"];
$sql = "SELECT * FROM STUDENT WHERE nrp = $nrp";
$query = mysqli_query($db, $sql);
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
  <title>HIMIT Satu Atap</title>
</head>

<body>
  <header>
    <h3>Edit Mahasiswa</h3>
  </header>

  <form action="../controller/edit.php" method="POST">
    <div>
      <input type="text" name="nrp" hidden value="<?= $mahasiswa["nrp"] ?>" />
    </div>

    <div>
      <label for="nrp_ui">NRP: </label>
      <input type="text" name="nrp_ui" disabled value="<?= $mahasiswa["nrp"] ?>" />
    </div>
    <div>
      <label for="nama">Nama: </label>
      <input type="text" name="nama" value="<?= $mahasiswa["nama"] ?>" />
    </div>
    <div>
      <label for="jenis_kelamin">Jenis Kelamin: </label>
      <?php $jenis_kelamin = $mahasiswa["jenis_kelamin"]; ?>
      <input type="radio" name="jenis_kelamin" value="Laki-laki" <?= ($jenis_kelamin == "Laki-laki") ? "checked" : ""; ?>>Laki-laki
      <input type="radio" name="jenis_kelamin" value="Perempuan" <?= ($jenis_kelamin == "Perempuan") ? "checked" : ""; ?>>Perempuan
    </div>
    <div>
      <label for="jurusan">Jurusan: </label>
      <?php $jurusan = $mahasiswa["jurusan"] ?>
      <select name="jurusan">
        <option <?= ($jurusan == "Teknik Informatika") ? "selected" : "" ?>>Teknik Informatika</option>
        <option <?= ($jurusan == "Sains Data Terapan") ? "selected" : "" ?>>Sains Data Terapan</option>
      </select>
    </div>
    <div>
      <label for="email">Email: </label>
      <input type="text" name="email" placeholder="Masukkan email ..." value="<?= $mahasiswa["email"] ?>" />
    </div>
    <div>
      <label for="alamat">Alamat: </label>
      <textarea name="alamat"><?= $mahasiswa["alamat"] ?></textarea>
    </div>
    <div>
      <label for="asal_sekolah">Sekolah Asal: </label>
      <input type="text" name="asal_sekolah" value="<?= $mahasiswa["asal_sekolah"] ?>" />
    </div>
    <div>
      <input type="submit" value="Simpan" name="simpan" />
    </div>
  </form>
</body>

</html>