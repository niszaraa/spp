<?php

$id_kelas = $_GET['id_kelas'];

include '../koneksi.php';
$sql = "DELETE FROM kelas WHERE id_kelas='$id_kelas'";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    header("Location:?url=kelas");
} else {
    echo "<script>alert('Sorry, data not deleted'); window.location.assign('?url=kelas');</script>";
}
