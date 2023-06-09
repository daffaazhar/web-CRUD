<?php
include("config.php");

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

  try {
    $gambar = upload();
  } catch (Exception $e) {
    return array("status" => -1, "result" => $e->getMessage());
  }

  $query = "INSERT INTO STUDENT (nrp, nama, jenis_kelamin, jurusan, email, alamat, gambar) VALUES ('$nrp', '$nama', '$jenis_kelamin', '$jurusan', '$email', '$alamat', '$gambar')";
  mysqli_query($conn, $query);

  return array("status" => mysqli_affected_rows($conn), "result" => "Data berhasil ditambahkan");
}

function upload()
{
  $fileName = $_FILES["gambar"]["name"];
  $fileSize = $_FILES["gambar"]["size"];
  $error = $_FILES["gambar"]["error"];
  $tmpName = $_FILES["gambar"]["tmp_name"];
  $validExt = ['jpg', 'jpeg', 'png', 'webp'];
  $tmp = explode(".", $fileName);
  $fileExt = strtolower(end($tmp));

  if ($error === 4) {
    throw new Exception("Upload file gambar terlebih dahulu.");
  }

  if (!in_array($fileExt, $validExt)) {
    throw new Exception("File gambar harus berekstensi jpg, jpeg, atau png.");
  }

  if ($fileSize > 3145728) {
    throw new Exception("Ukuran gambar tidak boleh melebihi 3 MB.");
  }

  $newFileName = uniqid() . "." . $fileExt;
  move_uploaded_file($tmpName, "../img/" . $newFileName);
  return $newFileName;
}

function deleteData($nrp)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM STUDENT WHERE nrp = '$nrp'");

  return array("status" => mysqli_affected_rows($conn), "result" => "Data berhasil dihapus");
}

function editData($data)
{
  global $conn;
  $nrp = htmlspecialchars($data["nrp"]);
  $nama = htmlspecialchars($data["nama"]);
  $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  $email = htmlspecialchars($data["email"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $gambarLama = htmlspecialchars($data["gambarLama"]);

  if ($_FILES["gambar"]["error"] === 4) {
    $gambar = $gambarLama;
  } else {
    try {
      $gambar = upload();
    } catch (Exception $e) {
      return array("status" => -1, "result" => $e->getMessage());
    }
  }

  $query = "UPDATE student SET nama = '$nama', jenis_kelamin = '$jenis_kelamin', jurusan = '$jurusan', email = '$email', alamat = '$alamat', gambar = '$gambar' WHERE nrp = '$nrp'";
  mysqli_query($conn, $query);

  return array("status" => mysqli_affected_rows($conn), "result" => "Data berhasil diubah");
}

function registration($data)
{
  global $conn;
  $username = strtolower(stripslashes($data["username"]));
  $email = $data["email"];
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password = password_hash($password, PASSWORD_DEFAULT);
  mysqli_query($conn, "INSERT INTO USERS VALUES(null, '$username', '$email', '$password')");

  return array("status" => mysqli_affected_rows($conn), "result" => "Silakan lakukan login untuk melanjutkan");
}

function greeting()
{
  date_default_timezone_set('Asia/Jakarta');
  $hour = date("H");
  if ($hour < 12)
    return "Pagi";
  else if ($hour >= 12 && $hour < 15)
    return "Siang";
  else if ($hour >= 15 && $hour < 18)
    return "Sore";
  else if ($hour >= 18)
    return "Malam";
}
