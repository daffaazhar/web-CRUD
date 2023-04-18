<?php
session_start();
include("config.php");
$students = query("SELECT * FROM STUDENT");
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
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>HIMIT Satu Atap</title>
</head>

<body class="p-8 overflow-x-hidden">
  <?php if (isset($_SESSION["message"])) : ?>
    <div class="toast">
      <div class="toast-content">
        <i class="bx bx-check check"></i>
        <div class="message">
          <span class="text text-1">Sukses</span>
          <span class="text text-2"><?= $_SESSION["message"] ?></span>
        </div>
        <i class="bx bx-x close"></i>
        <div class="progress"></div>
      </div>
    </div>
  <?php endif ?>

  <header class="flex justify-between items-center mb-6">
    <div>
      <h1 class="font-semibold text-4xl mb-2">HIMIT Satu Atap</h1>
      <h3 class="font-normal text-xl text-gray-600">Kumpulan Data Mahasiswa HIMIT</h3>
    </div>
    <a class="inline-block bg-[#2363DE] text-white px-4 py-2 rounded" href="form/tambah.php">Tambah Data</a>
  </header>

  <div>
    <table class="w-full border mb-4">
      <thead class="border-b">
        <tr>
          <th scope="col" class="w-[40px] max-w-[40px] py-2 border-r">No</th>
          <th scope="col" class="w-[115px] max-w-[115px] py-2 border-r">NRP</th>
          <th scope="col" class="w-[210px] max-w-[210px] py-2 border-r">Nama</th>
          <th scope="col" class="w-[100px] max-w[100px] py-2 border-r">Kelamin</th>
          <th scope="col" class="w-[165px] max-w-[165px] py-2 border-r">Jurusan</th>
          <th scope="col" class="w-[220px] max-w-[220px] py-2 border-r">Email</th>
          <th scope="col" class="w-[300px] max-w-[300px] py-2 border-r">Alamat</th>
          <th scope="col" class="w-[140px] max-w-[140px] py-2 border-r">Foto Profil</th>
          <th scope="col" class="w-[120px] max-w-[120px] py-2">Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php $i = 1; ?>
        <?php if (count($students) == 0) : ?>
          <tr>
            <td colspan="9" class="text-center py-4">Sepertinya belum ada data yang dapat ditampilkan. Coba untuk tambahkan data terlebih dahulu.</td>
          </tr>
        <?php else : ?>
          <?php foreach ($students as $student) : ?>
            <tr>
              <td class="w-[40px] max-w-[40px] font-normal truncate py-2 border-r border-b px-2 text-center"><?= $i++ ?></td>
              <td class="w-[115px] max-w-[115px] truncate py-2 border-r border-b px-2 text-center"><?= $student["nrp"] ?></td>
              <td class="w-[210px] max-w-[210px] truncate py-2 border-r border-b px-2"><?= $student["nama"] ?></td>
              <td class="w-[100px] max-w[100px] truncate py-2 border-r border-b px-2 text-center"><?= $student["jenis_kelamin"] ?></td>
              <td class="w-[165px] max-w-[165px] truncate py-2 border-r border-b px-2 text-center"><?= $student["jurusan"] ?></td>
              <td class="w-[220px] max-w-[220px] truncate py-2 border-r border-b px-2"><?= $student["email"] ?></td>
              <td class="w-[300px] max-w-[300px] truncate py-2 border-r border-b px-2"><?= $student["alamat"] ?></td>
              <td class="w-[140px] max-w-[140px] truncate py-2 border-r border-b px-2">
                <a class="w-full" href='controller/download.php?file=<?= $student["gambar"] ?>'>
                  <div class="bg-[#2363DE] rounded p-1 flex justify-center items-center gap-x-2">
                    <i class='bx bxs-download text-white text-lg'></i>
                    <span class="text-white">Unduh</span>
                  </div>
                </a>
              </td>
              <td class='w-[120px] max-w-[120px] p-2 flex gap-x-1.5'>
                <a class="w-full" href='form/edit.php?nrp=<?= $student["nrp"] ?>'>
                  <div class="bg-[#2363DE] rounded p-1 flex justify-center items-center">
                    <i class='bx bxs-edit text-white text-lg'></i>
                  </div>
                </a>
                <a class='w-full' href="controller/hapus.php?nrp=<?= $student["nrp"] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data dengan NRP <?= $student['nrp'] ?>')">
                  <div class="bg-red-600 rounded p-1 flex justify-center items-center">
                    <i class='bx bxs-trash text-white text-lg'></i>
                  </div>
                </a>
              </td>
            </tr>
          <?php endforeach ?>
      </tbody>
    <?php endif ?>
    </table>

    <?php if (!count($students) == 0) : ?>
      <p>Total Mahasiswa: <?= count($students) ?></p>
    <?php endif ?>
  </div>
</body>

<script src="./js/main.js"></script>

<?php if (isset($_SESSION["message"])) : ?>
  <script>
    showToast();
  </script>
<?php endif ?>
<?php unset($_SESSION["message"]) ?>

</html>