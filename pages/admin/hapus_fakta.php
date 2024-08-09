<?php
include("./../php/koneksi.php");

if (isset($_GET['id_fakta'])) {
    $id_fakta = (int)$_GET['id_fakta'];

    $stmt = $conn->prepare("DELETE FROM fakta_hewan WHERE id_fakta = ?");
    $stmt->bind_param("i", $id_fakta);

    if ($stmt->execute()) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
} else {
    header("Location: ./dashboard.php");
    exit;
}

$conn->close();
?>
