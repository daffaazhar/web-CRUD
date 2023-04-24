<?php
include("../functions.php");
$keyword = $_GET["keyword"];
$students = query("SELECT * FROM STUDENT WHERE nrp LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR jenis_kelamin LIKE '%$keyword%' OR jurusan LIKE '%$keyword%' OR email LIKE '%$keyword%' OR alamat LIKE '%$keyword%'");
?>

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
          <td class="w-[100px] max-w[100px] truncate py-2 border-r border-b px-2"><?= $student["jenis_kelamin"] ?></td>
          <td class="w-[165px] max-w-[165px] truncate py-2 border-r border-b px-2"><?= $student["jurusan"] ?></td>
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