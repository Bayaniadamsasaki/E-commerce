<?php  
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: sign-in.php");
  exit;
}
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyAq5LJLOlrD0/UJ92MbS+6qDVFYw8uSiD"
        crossorigin="anonymous">

    <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <!-- <link href="./assets/css/nucleo-icons.css" rel="stylesheet" /> -->
  <!-- <link href="./assets/css/nucleo-svg.css" rel="stylesheet" /> -->
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet"> -->
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $produk["id_product"] ?>">
            <input type="hidden" name="gambarLama" value="<?= $produk["gambar"] ?>">
            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk" id="nama_produk"
                    value="<?= $produk["nama_product"] ?>">
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" name="harga" id="harga" value="<?= $produk["harga"] ?>">
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" name="stok" id="stok" value="<?= $produk["stok"] ?>">
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <input type="text" class="form-control" name="description" id="description"
                    value="<?= $produk["description"] ?>">
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <img src="imgp/<?= $produk["gambar"] ?>" alt="" class="img-thumbnail">
                <input type="file" class="form-control-file" name="gambar" id="gambar">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="ubah" value="Ubah">
            </div>
        </form>
    </div>

    

    <!-- Bootstrap JS and other script tags -->

</body>

</html>
</html>