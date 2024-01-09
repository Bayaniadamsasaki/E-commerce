<?php

$conn = mysqli_connect("localhost", "root", "", "ecommercea");

function Query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("query gagal");
    }
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data)
{
    global $conn;
    $username = strtolower(stripcslashes(htmlspecialchars($data["username"])));
    $email = htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
            alert('Username sudah ada')
        </script>
        ";
        return false;
    }

    if ($password !== $password2) {
        echo "
        <script>
            alert('Konfirmasi password tida valid')
        </script>
        ";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO admin (email, username, password) VALUES ('$email', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

function addProduct($data)
{
    global $conn;
    $nama_product = htmlspecialchars($data["nama_produk"]);
    $harga = htmlspecialchars($data["harga"]);
    $stok = htmlspecialchars($data["stok"]);
    $description = htmlspecialchars($data["description"]);
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    $query = "INSERT INTO produk (nama_product, harga, stok, description, gambar) 
              VALUES ('$nama_product', '$harga', '$stok', '$description', '$gambar')
              ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $eror = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];
    if ($eror === 4) {
        echo "<script>
           alert('pilih gambar dengan benar');
        </script>";
        return false;
    }
    $extensiGambarValid = ['jpg', 'jpeg', 'png', 'jfif'];
    $extensiGambar = explode('.', $namaFile);
    $extensiGambar = strtolower(end($extensiGambar));
    if (!in_array($extensiGambar, $extensiGambarValid)) {
        echo "<script>
           alert('yang anda upload bukan gambar');
        </script>";
    }
    if ($ukuranFile > 10000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar');
     </script>";
    }
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiGambar;
    move_uploaded_file($tmpName, 'imgp/' . $namaFileBaru);
    return $namaFileBaru;
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM produk WHERE id_product=$id");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    $id = $data["id"];
    $nama_product = htmlspecialchars($data["nama_produk"]);
    $harga = htmlspecialchars($data["harga"]);
    $stok = htmlspecialchars($data["stok"]);
    $description = htmlspecialchars($data["description"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE produk SET
                nama_product = '$nama_product',
                harga = '$harga',
                stok = '$stok',
                description = '$description',
                gambar = '$gambar'
                WHERE id_product = '$id'
                ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
}
?>