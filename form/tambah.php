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
</head>

<body class="flex justify-center items-center h-screen bg-gradient-to-r from-cyan-500 to-blue-500">
  <form class="bg-white rounded-md p-8" action="../controller/tambah.php" method="POST">
    <h3 class="font-bold text-4xl text-center mb-4">Tambah Data Mahasiswa</h3>
    <div>
      <label for="nrp">NRP: </label>
      <input type="number" name="nrp" placeholder="Masukkan NRP..." />
    </div>
    <div>
      <label for="nama">Nama: </label>
      <input type="text" name="nama" placeholder="Masukkan Nama Lengkap..." />
    </div>
    <div>
      <label for="jenis_kelamin">Jenis Kelamin: </label>
      <input type="radio" name="jenis_kelamin" value="laki-laki">Laki-laki
      <input type="radio" name="jenis_kelamin" value="perempuan">Perempuan
    </div>
    <div>
      <label for="jurusan">Jurusan: </label>
      <select name="jurusan">
        <option>Teknik Informatika</option>
        <option>Sains Data Terapan</option>
      </select>
    </div>
    <div>
      <label for="email">Email: </label>
      <input type="text" name="email" placeholder="Masukkan email ..." />
    </div>
    <div>
      <label for="alamat">Alamat: </label>
      <textarea name="alamat" placeholder="Masukkan Alamat..."></textarea>
    </div>
    <div>
      <label for="asal_sekolah">Sekolah Asal: </label>
      <input type="text" name="asal_sekolah" placeholder="Masukkan asal sekolah..." />
    </div>
    <div>
      <input class="mt-6 w-full inline-block bg-[#2363DE] text-white px-4 py-2 rounded" type="submit" value="Tambah" name="tambah" />
    </div>
  </form>
</body>

</html>