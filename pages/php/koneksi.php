<?php
$conn = mysqli_connect("localhost", "root", "", "wdav");

if (!$conn) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
?>