<?php
include("./../php/koneksi.php");

$id_fakta = isset($_GET['id_fakta']) ? (int)$_GET['id_fakta'] : 0;
$id_hewan = isset($_GET['id_hewan']) ? (int)$_GET['id_hewan'] : 0;
$id_admin = isset($_GET['id']) ? (int)$_GET['id'] : 0;
echo "id_admin: $id_admin<br>";
echo "id_hewan: $id_hewan<br>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_fakta = isset($_POST['nama_fakta']) ? $_POST['nama_fakta'] : '';
    $deskripsi_fakta = isset($_POST['deskripsi_fakta']) ? $_POST['deskripsi_fakta'] : '';

    $gambar_fakta = '';
    if (isset($_FILES['gambar_fakta']) && $_FILES['gambar_fakta']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['gambar_fakta']['tmp_name'];
        $fileName = $_FILES['gambar_fakta']['name'];
        $fileSize = $_FILES['gambar_fakta']['size'];
        $fileType = $_FILES['gambar_fakta']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = './../../img/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $gambar_fakta = $newFileName;
            } else {
                echo 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
                exit;
            }
        } else {
            echo 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
            exit;
        }
    }

    if ($gambar_fakta) {
        $sql = $conn->prepare("UPDATE fakta_hewan SET nama_fakta = ?, deskripsi_fakta = ?, gambar_fakta = ? WHERE id_fakta = ?");
        $sql->bind_param("sssi", $nama_fakta, $deskripsi_fakta, $gambar_fakta, $id_fakta);
    } else {
        $sql = $conn->prepare("UPDATE fakta_hewan SET nama_fakta = ?, deskripsi_fakta = ? WHERE id_fakta = ?");
        $sql->bind_param("ssi", $nama_fakta, $deskripsi_fakta, $id_fakta);
    }

    if ($sql->execute()) {
        header("Location: ./edit_hewan.php?id=$id_admin&id_hewan=$id_hewan");
        exit;
    } else {
        echo "Error: " . $sql->error;
        exit;
    }
} else {
    header("Location: ./dashboard.php?id=$id_admin");
    exit;
}
?>
