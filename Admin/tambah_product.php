<?php  
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: sign-in.php");
  exit;
}
require "../function.php";

if (isset($_POST["tambah"])) {
    if (addProduct($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil di tambahkan uwu >_<');
            window.location.href = 'tables.php';
        </script>";
    } else {
        echo "
        <script>
            alert('data gagal di tambahkan XD');
            window.location.href = 'tables.php';
        </script>
        ";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Anda</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama_produk">Nama Produk</label>
                <input type="text" name="nama_produk" id="nama_produk">
            </li>
            <li>
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga">
            </li>
            <li>
                <label for="stok">Stok</label>
                <input type="number" name="stok" id="stok">
            </li>
            <li>
                <label for="description">Deskripsi</label>
                <input type="text" name="description" id="description">
            </li>
            <li>
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <input type="submit" name="tambah" value="tambahkan">
            </li>
        </ul>
    </form>
</body>
</html>