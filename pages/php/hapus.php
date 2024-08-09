<?php

include("./koneksi.php");

if (isset($_GET['id'])) {
    session_start();
    if (isset($_SESSION['id'])) {
        $id_admin = $_SESSION['id'];
    } else {
        die("Admin not logged in");
    }

    $id_hewan = $_GET['id'];

    // Query untuk menghapus data dari tabel hewan
    $sql = "DELETE FROM hewan WHERE id_hewan=$id_hewan";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("Location: ./../admin/dashboard.php?message=deleted&id=$id_admin");
        exit();
    } else {
        die("Gagal menghapus...");
    }
} else {
    die("Akses dilarang...");
}

?>
