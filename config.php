<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "student_information";

$conn = mysqli_connect($server, $user, $password, $database);
if (!$conn) {
  die("Database connection error " . mysqli_connect_error());
}

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function addData($data)
{
  global $conn;
  $nrp = htmlspecialchars($data["nrp"]);
  $nama = htmlspecialchars($data["nama"]);
  $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  $email = htmlspecialchars($data["email"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $asal_sekolah = htmlspecialchars($data["asal_sekolah"]);

  $query = "INSERT INTO STUDENT (nrp, nama, jenis_kelamin, jurusan, email, alamat, asal_sekolah) VALUES ('$nrp', '$nama', '$jenis_kelamin', '$jurusan', '$email', '$alamat', '$asal_sekolah')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function deleteData($nrp)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM STUDENT WHERE nrp = '$nrp'");

  return mysqli_affected_rows($conn);
}
