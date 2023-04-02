<?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>HIMIT Satu Atap</title>
  <style>
    * {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>

<body class="p-8">
  <header class="flex justify-between items-center mb-6">
    <div>
      <h1 class="font-semibold text-4xl mb-2">HIMIT Satu Atap</h1>
      <h3 class="font-normal text-xl text-gray-600">Kumpulan Data Mahasiswa HIMIT</h3>
    </div>
    <a class="inline-block bg-[#2363DE] text-white px-4 py-2 rounded" href="form/tambah.php">Tambah Data</a>
  </header>

  <table class="w-full border mb-6">
    <thead class="border-b">
      <tr>
        <th scope="col" class="py-2 border-r">No</th>
        <th scope="col" class="py-2 border-r">NRP</th>
        <th scope="col" class="py-2 border-r">Nama</th>
        <th scope="col" class="py-2 border-r">Gender</th>
        <th scope="col" class="py-2 border-r">Jurusan</th>
        <th scope="col" class="py-2 border-r">Email</th>
        <th scope="col" class="py-2 border-r">Alamat</th>
        <th scope="col" class="py-2 border-r">Asal Sekolah</th>
        <th scope="col" class="py-2">Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php
      $i = 1;
      $sql = "SELECT * FROM STUDENT";
      $query = mysqli_query($db, $sql);

      while ($mahasiswa = mysqli_fetch_array($query)) {
        echo "<tr>";

        echo "<th scope='row' class='whitespace-nowrap py-2 border-r border-b px-2'>" . $i . "</th>";
        echo "<td class='whitespace-nowrap py-2 border-r border-b px-2'>" . $mahasiswa['nrp'] . "</td>";
        echo "<td class='whitespace-nowrap py-2 border-r border-b px-2'>" . $mahasiswa['nama'] . "</td>";
        echo "<td class='whitespace-nowrap py-2 border-r border-b px-2'>" . $mahasiswa['jenis_kelamin'] . "</td>";
        echo "<td class='whitespace-nowrap py-2 border-r border-b px-2'>" . $mahasiswa['jurusan'] . "</td>";
        echo "<td class='whitespace-nowrap py-2 border-r border-b px-2'>" . $mahasiswa['email'] . "</td>";
        echo "<td class='whitespace-nowrap py-2 border-r border-b px-2'>" . $mahasiswa['alamat'] . "</td>";
        echo "<td class='whitespace-nowrap py-2 border-r border-b px-2'>" . $mahasiswa['asal_sekolah'] . "</td>";

        echo "<td class='text-center border-b px-2'>";
        echo "<a class='font-semibold text-[#2363DE]' href='form/edit.php?nrp=" . $mahasiswa['nrp'] . "'>Edit</a> | ";
        echo "<a class='font-semibold text-red-600' href='controller/hapus.php?nrp=" . $mahasiswa['nrp'] . "'>Hapus</a>";
        echo "</td>";

        echo "</tr>";

        $i++;
      }
      ?>
    </tbody>
  </table>

  <p>Total Mahasiswa: <?= mysqli_num_rows($query); ?></p>
</body>

</html>