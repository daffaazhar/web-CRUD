<?php

include("../config.php");

if (isset($_POST["simpan"])) {
  $nrp = $_POST["nrp"];
  $nama = $_POST["nama"];
  $jenis_kelamin = $_POST["jenis_kelamin"];
  $jurusan = $_POST["jurusan"];
  $email = $_POST["email"];
  $alamat = $_POST["alamat"];
  $asal_sekolah = $_POST["asal_sekolah"];

  $sql = "UPDATE student SET nama = '$nama', jenis_kelamin = '$jenis_kelamin', jurusan = '$jurusan', email = '$email', alamat = '$alamat', asal_sekolah = '$asal_sekolah' WHERE nrp = '$nrp'";
  $query = mysqli_query($db, $sql);

  if ($query) {
    header("Location: ../index.php");
  } else {
    header("Gagal menyimpan perubahan...");
  }
} else {
  die("Akses dilarang...");
}
