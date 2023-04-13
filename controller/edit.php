<?php
include("../config.php");

if (isset($_POST["edit"])) {
  if (editData($_POST) > 0) {
    header("Location: ../index.php?status=sukses_edit");
  } else {
    header("Location: ../index.php?status=gagal_edit");
  }
} else {
  die("Akses dilarang...");
}
