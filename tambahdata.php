<?php

require 'function.php';

if(isset($_POST['submit']))
{
    if (tambahdata($_POST) > 0 )
    {
        echo "<script> alert('Data Berhasil Ditambahkan');
            document.location.href='datamahasiswa.php'</script>";
    }else
    {
        echo "<script> alert('Gagal');
            document.location.href='datamahasiswa.php'</script>";
    }
    
    



    

    }



function tambahdata($data)
{
    global $koneksi;
    $nama = $data["nama"];
    $nim = $data["nim"];
    $jurusan = $data["jurusan"];
    $alamat = $data["alamat"];
    
    $file = $_FILES['foto']['name'];
    $namafile = date('DMY_Hm') . '_' . $file;
    $tmp = $_FILES['foto']['tmp_name'];
    $folder = 'images/mhs/';
    $path = $folder . $namafile;

    if(move_uploaded_file($tmp, $path))
    {
        $query = "INSERT INTO mahasiswa (foto, nama, nim, jurusan, alamat) VALUES ('$namafile', '$nama', '$nim', '$jurusan', '$alamat')";

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
  
}

}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>

    <div class="card" style="width: 18rem; background-color:aqua;">
    <div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="nama" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
    <!-- <form action="" method="post" enctype="multipart/form-data">
        <label for="name">Nama : </label>
        <input type="text" name="nama" id="name" required><br>
        <label for="nim">NIM : </label>
        <input type="text" name="nim" id="nim" required><br>
        <label for="jurusan">Jurusan : </label>
        <input type="text" name="jurusan" id="jurusan" required><br>
        <label for="alamat">Alamat : </label>
        <input type="text" name="alamat" id="alamat" required><br>
        <label for="jurusan">Upload Foto : </label>
        <input type="file" name="foto"><br>
        <button type="submit" name="submit">Tambah</button>
    </form> -->
</body>
</html>