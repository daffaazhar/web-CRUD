<?php

include("../config.php");

if (isset($_POST["tambah"])) {
  $nrp = $_POST["nrp"];
  $nama = $_POST["nama"];
  $jenis_kelamin = $_POST["jenis_kelamin"];
  $jurusan = $_POST["jurusan"];
  $email = $_POST["email"];
  $alamat = $_POST["alamat"];
  $asal_sekolah = $_POST["asal_sekolah"];

  $sql = "INSERT INTO STUDENT (nrp, nama, jenis_kelamin, jurusan, email, alamat, asal_sekolah) VALUES ('$nrp', '$nama', '$jenis_kelamin', '$jurusan', '$email', '$alamat', '$asal_sekolah')";
  $query = mysqli_query($db, $sql);

  if ($query) {
    header("Location: ../index.php?status=sukses");
  } else {
    header("Location: ../index.php?status=gagal");
  }
} else {
  die("Akses dilarang...");
}
