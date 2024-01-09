<?php  
require "../function.php";

$id = $_GET["id"];

if (hapus($id)) {
    echo "
        <script>
            alert('beneran mau di hapus T_T');
            window.location.href = 'tables.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert('gagal menghapus XD');
            window.location.href = 'tables.php';
        </script>
        ";
}

?>