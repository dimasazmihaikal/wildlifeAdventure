<?php 
session_start();
require_once("./../php/koneksi.php");

if (!isset($_SESSION['id'])) {
    header("Location: ./../login.php");
    exit;
}

$id_admin = $_SESSION['id'];
$username = $_SESSION['username'];

$sql_total_hewan = "SELECT COUNT(*) AS total FROM hewan";
$result_total_hewan = mysqli_query($conn, $sql_total_hewan);
$total_hewan = mysqli_fetch_assoc($result_total_hewan)['total'];

$sql_mamalia = "SELECT COUNT(*) AS total FROM hewan WHERE kelas_hewan = 'Mamalia'";
$result_mamalia = mysqli_query($conn, $sql_mamalia);
$total_mamalia = mysqli_fetch_assoc($result_mamalia)['total'];

$sql_aves = "SELECT COUNT(*) AS total FROM hewan WHERE kelas_hewan = 'Aves'";
$result_aves = mysqli_query($conn, $sql_aves);
$total_aves = mysqli_fetch_assoc($result_aves)['total'];

$sql_reptilia = "SELECT COUNT(*) AS total FROM hewan WHERE kelas_hewan = 'Reptilia'";
$result_reptilia = mysqli_query($conn, $sql_reptilia);
$total_reptilia = mysqli_fetch_assoc($result_reptilia)['total'];

$sql_pisces = "SELECT COUNT(*) AS total FROM hewan WHERE kelas_hewan = 'Pisces'";
$result_pisces = mysqli_query($conn, $sql_pisces);
$total_pisces = mysqli_fetch_assoc($result_pisces)['total'];

$sql_amphibia = "SELECT COUNT(*) AS total FROM hewan WHERE kelas_hewan = 'amphibia'";
$result_amphibia = mysqli_query($conn, $sql_amphibia);
$total_amphibia = mysqli_fetch_assoc($result_amphibia)['total'];

$search_name = isset($_GET['search_name']) ? mysqli_real_escape_string($conn, $_GET['search_name']) : '';
$search_class = isset($_GET['search_class']) ? mysqli_real_escape_string($conn, $_GET['search_class']) : '';

$sql_search = "SELECT * FROM hewan WHERE 1";
if ($search_name) {
    $sql_search .= " AND nama_hewan LIKE '%$search_name%'";
}
if ($search_class) {
    $sql_search .= " AND kelas_hewan = '$search_class'";
}

$query_search = mysqli_query($conn, $sql_search);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="./../../css/output.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const message = urlParams.get('message');
            if (message === 'added') {
                alert('Data hewan dan fakta hewan telah berhasil ditambahkan.');
            }if (message === 'edited'){
                alert('Data hewan telah berhasil diubah.');
            }
        };
    </script>
</head>
<body class="bg-gray-100 font-sans antialiased">
  <div class="flex">
    <!-- Sidebar -->
    <div class="w-72 bg-[#11385a] text-white flex flex-col h-screen">
      <div class="flex items-center justify-center p-6 border-b border-[#355e91]">
        <div class="text-center">
          <div class="w-24 h-24 bg-slate-100 rounded-lg mx-auto shadow-2xl"><img src="./../../img/WA.png" alt=""></div>
          <h2 class="mt-4 text-xl font-semibold"><?php echo $username; ?></h2>
          <p>Admin</p>
        </div>
      </div>
      <nav class="flex flex-col mt-6 ">
        <a href="./dashboard.php" class="px-4 py-2 my-1 flex flex-row font-semibold bg-[#091c2d]">
          <img src="./../../img/dashboard.png" class="w-8 mr-3" alt="">
          <div class="">DASHBOARD</div>
        </a>
      </nav>
      <div class="flex flex-col mt-auto text-center">
        <a href="./../php/logout.php" class="p-3 font-bold bg-red-500 text-white hover:bg-red-600">Logout</a>
      </div>
    </div>

    <div class="flex-1 overflow-hidden h-screen bg-[#e2e6ed] overflow-y-auto">
      <div class="w-full text-3xl my-8 font-semibold mx-10">
        DASHBOARD
      </div>
      <div class="grid grid-cols-5 h-52 gap-6 mx-7 mt-10">
        <div class="grid grid-rows-4 grid-cols-1 p-3 shadow-xl text-white bg-[#11385a]">
          <div class="flex items-center justify-between">
            <h3 class="font-semibold uppercase">HEWAN</h3>
          </div>
          <div class="flex justify-center items-center row-span-2">
            <p class="text-3xl font-semibold"><?php echo $total_hewan; ?> Hewan</p>
          </div>
          <div class="text-sm pt-5"></div>
        </div>
      </div>

      <div class="grid grid-cols-5 h-52 gap-6 mx-7 mt-10">
        <div class="grid grid-rows-4 grid-cols-1 p-3 shadow-xl text-white bg-[#11385a]">
          <div class="flex items-center justify-between">
            <h3 class="font-semibold uppercase">MAMALIA</h3>
          </div>
          <div class="flex justify-center items-center row-span-2">
            <p class="text-3xl font-semibold"><?php echo $total_mamalia; ?> Hewan</p>
          </div>
          <div class="text-sm pt-5"></div>
        </div>
        <div class="grid grid-rows-4 grid-cols-1 p-3 shadow-xl text-white bg-[#11385a]">
          <div class="flex items-center justify-between">
            <h3 class="font-semibold uppercase">AVES</h3>
          </div>
          <div class="flex justify-center items-center row-span-2">
            <p class="text-3xl font-semibold"><?php echo $total_aves; ?> Hewan</p>
          </div>
          <div class="text-sm pt-5"></div>
        </div>
        <div class="grid grid-rows-4 grid-cols-1 p-3 shadow-xl text-white bg-[#11385a]">
          <div class="flex items-center justify-between">
            <h3 class="font-semibold uppercase">REPTILIA</h3>
          </div>
          <div class="flex justify-center items-center row-span-2">
            <p class="text-3xl font-semibold"><?php echo $total_reptilia; ?> Hewan</p>
          </div>
          <div class="text-sm pt-5"></div>
        </div>
        <div class="grid grid-rows-4 grid-cols-1 p-3 shadow-xl text-white bg-[#11385a]">
          <div class="flex items-center justify-between">
            <h3 class="font-semibold uppercase">PISCES</h3>
          </div>
          <div class="flex justify-center items-center row-span-2">
            <p class="text-3xl font-semibold"><?php echo $total_pisces; ?> Hewan</p>
          </div>
          <div class="text-sm pt-5"></div>
        </div>
        <div class="grid grid-rows-4 grid-cols-1 p-3 shadow-xl text-white bg-[#11385a]">
          <div class="flex items-center justify-between">
            <h3 class="font-semibold uppercase">amphibia</h3>
          </div>
          <div class="flex justify-center items-center row-span-2">
            <p class="text-3xl font-semibold"><?php echo $total_amphibia; ?> Hewan</p>
          </div>
          <div class="text-sm pt-5"></div>
        </div>
      </div>





      <div class="grid grid-cols-4 mt-10 mx-7">
        <div class="m-auto ml-0">
          <a href="./tambahewan.php?id=<?php echo $id_admin; ?>" class="bg-[#11385a] text-white font-semibold px-3 py-2 rounded-md">TAMBAH HEWAN</a>
        </div>
        <div></div>
        <div></div>
        <div>
          <div>
            <form class="flex justify-end px-16" method="GET" action="dashboard.php">   
                <label for="search_name" class="mb-2 text-sm font-medium text-gray-900 sr-only">Cari Nama</label>
                <div class="relative">
                    <input type="search" id="search_name" name="search_name" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50" placeholder="Nama" value="<?php echo htmlspecialchars($search_name); ?>" />
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cari</button>
            </form>
          </div>
        </div>
      </div>
      <div class="mt-2 mx-7 h-screen overflow-y-scroll">
        <div class="relative shadow-md">
          <table class="w-full">
            <thead class="uppercase bg-[#11385a] text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Hewan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jenis
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Edit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hapus
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
              $no = 1;
              while($hewan = mysqli_fetch_array($query_search)){
                  echo '<tr class="odd:bg-white even:bg-gray-50 text-center">';
                  echo '<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">' . $no . '</td>';
                  echo '<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">' .$hewan['nama_hewan']. '</td>';
                  echo '<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">' .$hewan['kelas_hewan']. '</td>';
              
                  echo '<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">';
                  echo '<a href="./edit_hewan.php?id=' . $id_admin . '&id_hewan=' . $hewan['id_hewan'] . '" class="font-medium text-white px-5 py-1 rounded-full bg-yellow-400">EDIT</a>';
                  echo '</td>';
                  echo '<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">';
                  echo '<a href="#" onclick="confirmDelete(event, \'./../php/hapus.php?id=' . $hewan['id_hewan'] . '\')" class="font-medium text-white px-5 py-1 rounded-full bg-red-600">HAPUS</a>';
                  echo '</td>';
                  echo '</tr>';
                  $no++;
              }
              ?>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script>
    function confirmDelete(event, url) {
      event.preventDefault(); // Mencegah penghapusan default
      if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        window.location.href = url; // Redirect ke URL hapus jika konfirmasi 'Ya'
      }
    }
  </script>
</body>
</html>
