<?php
// koneksi database
include './config.php';

// menangkap data di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$alamat = $_POST['alamat'];

// update data ke database
mysqli_query($koneksi,"UPDATE mahasiswa set nama='$nama', nim='$nim',alamat='$alamat' where id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:index.php");