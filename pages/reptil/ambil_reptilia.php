<?php
require_once("./../php/koneksi.php");

$query = "SELECT id_hewan, nama_hewan, gambar_hewan FROM hewan WHERE kelas_hewan='reptilia'";
$result = mysqli_query($conn, $query);

$hewan = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $hewan[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($hewan);
?>
