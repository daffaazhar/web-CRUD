<?php
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
  <?php if (isset($_GET["status"])) : ?>
    <div class="toast">
      <div class="toast-content">
        <i class="bx bx-check check"></i>
        <div class="message">
          <span class="text text-1">Sukses</span>
          <span class="text text-2">
            <?php if ($_GET["status"] == "sukses_tambah") : ?>
              Data berhasil ditambahkan
            <?php elseif ($_GET["status"] == "sukses_hapus") : ?>
              Data berhasil dihapus
            <?php elseif ($_GET["status"] == "sukses_edit") : ?>
              Data berhasil diubah
            <?php endif ?>
          </span>
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
          <th scope="col" class="py-2 border-r">No</th>
          <th scope="col" class="py-2 border-r">NRP</th>
          <th scope="col" class="py-2 border-r">Nama</th>
          <th scope="col" class="py-2 border-r">Kelamin</th>
          <th scope="col" class="py-2 border-r">Jurusan</th>
          <th scope="col" class="py-2 border-r">Email</th>
          <th scope="col" class="py-2 border-r">Alamat</th>
          <th scope="col" class="py-2 border-r">Asal Sekolah</th>
          <th scope="col" class="py-2">Aksi</th>
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
              <td class="font-normal whitespace-nowrap py-2 border-r border-b px-2"><?= $i++ ?></td>
              <td class="whitespace-nowrap py-2 border-r border-b px-2"><?= $student["nrp"] ?></td>
              <td class="whitespace-nowrap py-2 border-r border-b px-2"><?= $student["nama"] ?></td>
              <td class="whitespace-nowrap py-2 border-r border-b px-2"><?= $student["jenis_kelamin"] ?></td>
              <td class="whitespace-nowrap py-2 border-r border-b px-2"><?= $student["jurusan"] ?></td>
              <td class="whitespace-nowrap py-2 border-r border-b px-2"><?= $student["email"] ?></td>
              <td class="whitespace-nowrap py-2 border-r border-b px-2"><?= $student["alamat"] ?></td>
              <td class="whitespace-nowrap py-2 border-r border-b px-2"><?= $student["asal_sekolah"] ?></td>

              <td class='text-center border-b px-2'>
                <a class='font-semibold text-[#2363DE] cursor-pointer' href='form/edit.php?nrp=<?= $student["nrp"] ?>'>Edit</a> |
                <a class='delete-btn font-semibold text-red-600' href="controller/hapus.php?nrp=<?= $student["nrp"] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data dengan NRP <?= $student['nrp'] ?>')">Hapus</a>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./js/main.js"></script>

<?php if (isset($_GET["status"])) : ?>
  <script>
    showToast();
  </script>
<?php endif ?>

</html>