<?php


$koneksi = mysqli_connect("localhost","root","root","informatik");

if(!$koneksi)
{
    die('Koneksi Gagal'.mysqli_connect_error());
}


function tampildata($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi,$query);

    $rows = [];

    while($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }

    return $rows;
}

function hapusdata($id)
{
    global $koneksi;

    $query = "DELETE FROM mahasiswa WHERE id = $id";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function editdata($data, $id)
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
        $query = "UPDATE mahasiswa SET 
        foto = '$namafile',
        nama = '$nama',
        nim = '$nim',
        jurusan = '$jurusan',
        alamat = '$alamat'

        WHERE id = $id;
        ";
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
  
}
}

?>