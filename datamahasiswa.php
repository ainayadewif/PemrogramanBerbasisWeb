<?php

    $koneksi = mysqli_connect("localhost","root","root","informatik");

    if(!$koneksi)
    {
        die('Koneksi Gagal'.mysqli_connect_error());
    }
    $result = mysqli_query($koneksi,"SELECT * FROM mahasiswa");
    
   

    //mysqli_fetch_row()
    //mysqli_fetch_assoc()
    //mysqli_fetch_array()
    //mysqli_fetch_object()

    $mhs = mysqli_fetch_row($result);

    var_dump($mhs[1]);




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
    </table>
    </center>
    
</body>
</html>