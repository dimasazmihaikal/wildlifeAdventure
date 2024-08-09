<?php
session_start();
require_once("./../php/koneksi.php");

if (!isset($_SESSION['id'])) {
    header("Location: ./../login.php");
    exit;
}

$id_admin = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_hewan = mysqli_real_escape_string($conn, $_POST['id_hewan']);
    $nama_hewan = mysqli_real_escape_string($conn, $_POST['nama_hewan']);
    $kelas_hewan = mysqli_real_escape_string($conn, $_POST['kelas_hewan']);
    $asal_hewan = mysqli_real_escape_string($conn, $_POST['asal_hewan']);
    $daerah_dijumpai = mysqli_real_escape_string($conn, $_POST['daerah_dijumpai']);
    $kalimat_pengantar = mysqli_real_escape_string($conn, $_POST['kalimat_pengantar']);
    $link_video = mysqli_real_escape_string($conn, $_POST['link_video']);
    $deskripsi_hewan = mysqli_real_escape_string($conn, $_POST['deskripsi_hewan']);
    $status_hewan = mysqli_real_escape_string($conn, $_POST['status_hewan']);
    $jenis_makanan = mysqli_real_escape_string($conn, $_POST['jenis_makanan']);
    $populasi = mysqli_real_escape_string($conn, $_POST['populasi']);

    $gambar_hewan = $_FILES['gambar_hewan']['name'];
    $gambar_hewan_tmp = $_FILES['gambar_hewan']['tmp_name'];
    $upload_dir = './../../img/';
    if ($gambar_hewan) {
        $gambar_hewan_path = $upload_dir . basename($gambar_hewan);
        move_uploaded_file($gambar_hewan_tmp, $gambar_hewan_path);
        $gambar_hewan_name = basename($gambar_hewan);
    } else {
        $gambar_hewan_name = $_POST['gambar_hewan_existing'];
    }

    $gambar_penyebaran = $_FILES['gambar_penyebaran']['name'];
    $gambar_penyebaran_tmp = $_FILES['gambar_penyebaran']['tmp_name'];
    if ($gambar_penyebaran) {
        $gambar_penyebaran_path = $upload_dir . basename($gambar_penyebaran);
        move_uploaded_file($gambar_penyebaran_tmp, $gambar_penyebaran_path);
        $gambar_penyebaran_name = basename($gambar_penyebaran);
    } else {
        $gambar_penyebaran_name = $_POST['gambar_penyebaran_existing'];
    }

    $query = "UPDATE hewan SET 
                nama_hewan='$nama_hewan', 
                kelas_hewan='$kelas_hewan', 
                asal_hewan='$asal_hewan',
                daerah_dijumpai='$daerah_dijumpai',
                kalimat_pengantar='$kalimat_pengantar',
                link_video='$link_video',
                deskripsi_hewan='$deskripsi_hewan',
                status_hewan='$status_hewan',
                jenis_makanan='$jenis_makanan',
                populasi='$populasi',
                gambar_hewan='$gambar_hewan_name',
                gambar_penyebaran='$gambar_penyebaran_name'
              WHERE id_hewan='$id_hewan'";

    if (mysqli_query($conn, $query)) {
        header("Location: ./../admin/dashboard.php?id=" . $id_admin . "&message=edited");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
