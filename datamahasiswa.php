<?php


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
          <td><a href="login.html">🔑 Login</a></td>
          <td><a href="datamahasiswa.php">💌 Data</a></td>
        </tr>
      </table>
    <h1>Data Mahasiswa</h1>

    <table border="1" cellspacing="0" cellpadding="10px">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Alamat</th>
        </tr>
        <?php
        $i = 1;
        foreach($rows as $mhs) { ?>
        <tr>
            <td><?= $i ?></td>
            <td><img src="images/<?= $mhs["foto"]?>" alt="<?= $mhs["foto"]?>" width="170px" /></td>
            <td><?= $mhs["nama"]?></td>
            <td><?= $mhs["nim"]?></td>
            <td><?= $mhs["jurusan"]?></td>
            <td><?= $mhs["alamat"]?></td>
        </tr>
        <?php $i++; } ?>
    </table>
    </center>
    
</body>
</html>