<?php
include("./../php/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    if (isset($_SESSION['id'])) {
        $id_admin = $_SESSION['id'];
    } else {
        die("Admin not logged in");
    }

    $nama_hewan = $_POST['nama_hewan'];
    $nama_latin = $_POST['nama_latin'];
    $asal_hewan = $_POST['asal_hewan'];
    $daerah_dijumpai = $_POST['daerah_dijumpai'];
    $kalimat_pengantar = $_POST['kalimat_pengantar'];
    $link_video = $_POST['link_video'];
    $kelas_hewan = $_POST['kelas_hewan'];
    $deskripsi = $_POST['deskripsi_hewan'];
    $status_hewan = $_POST['status_hewan'];
    $jenis_makanan = $_POST['jenis_makanan'];
    $populasi = $_POST['populasi'];

    $target_dir = "./../../img/";
    $gambar_hewan_name = basename($_FILES["gambar_hewan"]["name"]);
    $gambar_map_name = basename($_FILES["gambar_map"]["name"]);
    $gambar_hewan = $target_dir . $gambar_hewan_name;
    $gambar_map = $target_dir . $gambar_map_name;

    if (move_uploaded_file($_FILES["gambar_hewan"]["tmp_name"], $gambar_hewan) && move_uploaded_file($_FILES["gambar_map"]["tmp_name"], $gambar_map)) {
        $sql = "INSERT INTO hewan (nama_hewan, nama_latin, asal_hewan, daerah_dijumpai, kalimat_pengantar, link_video, kelas_hewan, deskripsi_hewan, status_hewan, jenis_makanan, populasi, gambar_hewan, gambar_penyebaran, id_admin)
                VALUES ('$nama_hewan', '$nama_latin', '$asal_hewan', '$daerah_dijumpai', '$kalimat_pengantar', '$link_video', '$kelas_hewan', '$deskripsi', '$status_hewan', '$jenis_makanan', '$populasi', '$gambar_hewan_name', '$gambar_map_name', '$id_admin')";

        if (mysqli_query($conn, $sql)) {
            $id_hewan = mysqli_insert_id($conn);
            header("Location: ./tambah_fakta.php?message=added&id=$id_admin&id_hewan=$id_hewan");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error uploading files.";
    }

    mysqli_close($conn);
}
?>
