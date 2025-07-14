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

function register($data)
{
    global $koneksi;

    $username = trim($data["username"]);
    $password1 = trim($data["password1"]);
    $password2 = trim($data["password2"]);

    $queryusername = "SELECT id from user WHERE username = username";

    $username_check = mysqli_query($koneksi,$queryusername);

    if(mysqli_num_rows($username_check) > 0)
    {
        return "Username sudah ada!";
    }
    if(!preg_match('/^[a-zA-Z0-9._-]+$/', $username))
    {
        return "Username tidak valid";
    }
    if($password1 !== $password2 )
    {
        return "Konfirmasi password salah!";
    }

    $hash_password = password_hash($password1,PASSWORD_DEFAULT);

    $query_insert = "INSERT into user (username, password) VALUES ('$username', '$hash_password')";

    if(mysqli_query($koneksi, $query_insert))
    {
        return "Register Berhasil";
    }else
    {
        return "Gagal". mysqli_error($koneksi);
    }
}

?>