<?php
include("../config.php");

$nrp = $_GET["nrp"];

if (deleteData($nrp) > 0) {
  header("Location: ../index.php?status=sukses_hapus");
} else {
  header("Location: ../index.php?status=gagal_hapus");
}
