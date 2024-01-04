<?php 

$conn = mysqli_connect("localhost", "root", "", "ecommercea");

function Query($query){
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

function registrasi($data){
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

    mysqli_query($conn, "INSERT INTO admin (email, username, password) VALUES ('$username', '$password')");

    return mysqli_affected_rows($conn);
}