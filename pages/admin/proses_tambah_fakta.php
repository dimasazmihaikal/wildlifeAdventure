<?php
include("./../php/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    if (isset($_SESSION['id'])) {
        $id_admin = $_SESSION['id'];
    } else {
        die("Admin not logged in");
    }

    if (isset($_GET['id_hewan'])) {
        $id_hewan = $_GET['id_hewan'];
    } else {
        die("Hewan ID tidak ditemukan");
    }

    $nama_fakta = $_POST['nama_fakta'];
    $deskripsi_fakta = $_POST['deskripsi_fakta'];

    $target_dir = "./../../img/";
    $gambar_fakta = basename($_FILES["gambar_fakta"]["name"]);
    move_uploaded_file($_FILES["gambar_fakta"]["tmp_name"], $target_dir . $gambar_fakta);

    $sql = "INSERT INTO fakta_hewan (id_hewan, nama_fakta, deskripsi_fakta, gambar_fakta)
            VALUES ('$id_hewan', '$nama_fakta', '$deskripsi_fakta', '$gambar_fakta')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ./tambah_fakta.php?message=added&id=$id_admin&id_hewan=$id_hewan");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
