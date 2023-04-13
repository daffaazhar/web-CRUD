<?php
include("../config.php");

if (isset($_POST["tambah"])) {
  if (addData($_POST) > 0) {
    header("Location: ../index.php?status=sukses_tambah");
  } else {
    header("Location: ../index.php?status=gagal_tambah");
  }
} else {
  die("Akses dilarang...");
}
