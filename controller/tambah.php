<?php
include("../config.php");

if (isset($_POST["tambah"])) {
  if (addData($_POST) > 0) {
    header("Location: ../index.php?status=sukses");
  } else {
    header("Location: ../index.php?status=gagal");
  }
} else {
  die("Akses dilarang...");
}
