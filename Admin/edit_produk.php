<?php  
require "../function.php";

$id = $_GET["id"];
$produk = Query("SELECT * FROM produk WHERE id_product = $id")[0];


if (isset($_POST["ubah"])) {
    if (ubah($_POST)>0) {
        echo "
        <script>
            alert('data berhasil di diubah uwu >_<');
            window.location.href = 'tables.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal di diubah uwu XD');
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
        <input type="hidden" name="id" value="<?= $produk["id_product"] ?>">
        <input type="hidden" name="gambarLama" value="<?= $produk["gambar"] ?>">
        <ul>
            <li>
                <label for="nama_produk">Nama Produk</label>
                <input type="text" name="nama_produk" id="nama_produk" value="<?= $produk["nama_product"] ?>">
            </li>
            <li>
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" value="<?= $produk["harga"] ?>">
            </li>
            <li>
                <label for="stok">Stok</label>
                <input type="number" name="stok" id="stok" value="<?= $produk["stok"] ?>">
            </li>
            <li>
                <label for="description">Deskripsi</label>
                <input type="text" name="description" id="description" value="<?= $produk["description"] ?>">
            </li>
            <li>
                <label for="gambar">Gambar</label>
                <img src="imgp/<?= $produk["gambar"] ?>" alt="">
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <input type="submit" name="ubah" value="ubah">
            </li>
        </ul>
    </form>
</body>
</html>