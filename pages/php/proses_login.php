<?php
session_start();
include("koneksi.php");

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND Password='$password' ") or die("Select Error");
    $row = mysqli_fetch_assoc($result);

    if($row){
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id']; // Menyimpan id di sesi
        header("Location: ./../admin/dashboard.php?id=" . $row['id']); // Menambahkan id_admin ke URL pengalihan
    } else {
        echo "<p style='color:red;'>Invalid Username or Password</p>";
    }
}
?>
