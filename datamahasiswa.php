<?php

    session_start();

    if(!isset($_SESSION["login"]))
    {
        header("Location: login.php");
        exit;
    }

    require 'function.php';

    $query = "SELECT * FROM mahasiswa";
    $rows = tampildata($query);


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA MAHASISWA</title>
</head>
<body>
    <center>
        <table border="0" cellpadding="10">
        <tr>
          <td><a href="home.html">🏠 Home</a></td>
          <td><a href="aboutus.html">📘 About Us</a></td>
          <td><a href="contact.html">📞 Contact</a></td>
          <td><a href="service.html">🚌 Service</a></td>
          <td><a href="login.php">🔑 Login</a></td>
          <td><a href="datamahasiswa.php">💌 Data</a></td>
          <td><a href="logout.php">🍗 Logout</a></td>
        </tr>
      </table>
    <h1>Data Mahasiswa</h1>
    <a href="tambahdata.php"><button style=" background-color: green; cursor: pointer; margin-bottom: 12px;">Tambah Data</button></a>

    <table border="1" cellspacing="0" cellpadding="10px">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Aksi</th>

        </tr>
        <?php
        $i = 1;
        foreach($rows as $mhs) { ?>
        <tr>
            <td><?= $i ?></td>
            <td><img src="images/mhs/<?= $mhs["foto"]?>" alt="<?= $mhs["foto"]?>" width="170px" /></td>
            <td><?= $mhs["nama"]?></td>
            <td><?= $mhs["nim"]?></td>
            <td><?= $mhs["jurusan"]?></td>
            <td><?= $mhs["alamat"]?></td>
            <td>
                <a href="hapusdata.php/?id=<?php echo $mhs["id"] ?>" onclick="return confirm('yakin?')">Hapus</a>
                <a href="editdata.php/?id=<?php echo $mhs["id"] ?>">Edit</a>
            </td>
        </tr>
        <?php $i++; } ?>
    </table>
    </center>
    
</body>
</html>