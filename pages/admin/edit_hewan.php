<?php
session_start();
require_once("./../php/koneksi.php");

if (!isset($_SESSION['id'])) {
    header("Location: ./../login.php");
    exit;
}

$id_admin = $_SESSION['id'];

if (!isset($_GET['id_hewan'])) {
    header("Location: ./../admin/dashboard.php?id=" . $id_admin);
    exit;
}

$id_hewan = $_GET['id_hewan'];

$query = mysqli_query($conn, "SELECT * FROM hewan WHERE id_hewan='$id_hewan'");
$hewan = mysqli_fetch_assoc($query);
$selected_kelas_hewan = htmlspecialchars($hewan['kelas_hewan']);
$selected_status_hewan = htmlspecialchars($hewan['status_hewan']);
$selected_jenis_makanan = htmlspecialchars($hewan['jenis_makanan']);

if (!$hewan) {
    echo "Hewan tidak ditemukan!";
    exit;
}

$query_fakta = mysqli_query($conn, "SELECT * FROM fakta_hewan WHERE id_hewan='$id_hewan'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hewan</title>
    <link rel="stylesheet" href="./../../css/output.css">
</head>
<body class="bg-[#e2e6ed]">
    <div class="h-16 w-screen flex items-center">
        <a href="./dashboard.php?id=<?php echo $id_admin; ?>" class="bg-[#11385a] text-white py-1 px-6 text-xl rounded-full font-semibold ml-9">KEMBALI</a>
    </div>
    <div class="grid grid-cols-2">
        <div class="m-auto mt-10">
            <form class="min-w-md max-w-2xl mx-auto bg-white p-12" action="proses_edit_hewan.php" method="post" enctype="multipart/form-data">
                <div class="text-2xl font-semibold">DATA HEWAN</div>
                <hr class="border-black border-2 w-11 mb-7">
                <input type="hidden" name="id_hewan" value="<?php echo $id_hewan; ?>">
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" value="<?php echo htmlspecialchars($hewan['nama_hewan']); ?>" name="nama_hewan" id="nama_hewan" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none outline-none border-gray-600 peer" placeholder=" " required />
                        <label for="nama_hewan" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Hewan</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" value="<?php echo htmlspecialchars($hewan['nama_latin']); ?>" name="nama_latin" id="nama_latin" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none outline-none border-gray-600 peer" placeholder=" " required />
                        <label for="nama_latin" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Latin</label>
                    </div>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" value="<?php echo htmlspecialchars($hewan['asal_hewan']); ?>" name="asal_hewan" id="asal_hewan" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none outline-none border-gray-600 peer" placeholder=" " required />
                    <label for="asal_hewan" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Dari Benua</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" value="<?php echo htmlspecialchars($hewan['daerah_dijumpai']); ?>" name="daerah_dijumpai" id="daerah_dijumpai" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none outline-none border-gray-600 peer" placeholder=" " required />
                    <label for="daerah_dijumpai" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Daerah Banyak Dijumpai</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" value="<?php echo htmlspecialchars($hewan['kalimat_pengantar']); ?>" name="kalimat_pengantar" id="kalimat_pengantar" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none outline-none border-gray-600 peer" placeholder=" " required />
                    <label for="kalimat_pengantar" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kalimat Pengenal</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" value="<?php echo htmlspecialchars($hewan['link_video']); ?>" name="link_video" id="link_video" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none outline-none border-gray-600 peer" placeholder=" " required />
                    <label for="link_video" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Link Video</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <label for="kelas_hewan" class="block mb-2 text-sm font-medium text-gray-900">Jenis hewan</label>
                    <select id="kelas_hewan" name="kelas_hewan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        <option value="Mamalia" <?php echo ($selected_kelas_hewan == 'Mamalia') ? 'selected' : ''; ?>>Mamalia</option>
                        <option value="Aves" <?php echo ($selected_kelas_hewan == 'Aves') ? 'selected' : ''; ?>>Aves</option>
                        <option value="Reptilia" <?php echo ($selected_kelas_hewan == 'Reptilia') ? 'selected' : ''; ?>>Reptilia</option>
                        <option value="Amphibia" <?php echo ($selected_kelas_hewan == 'Amphibia') ? 'selected' : ''; ?>>Amphibia</option>
                        <option value="Pisces" <?php echo ($selected_kelas_hewan == 'Pisces') ? 'selected' : ''; ?>>Pisces</option>
                    </select>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <label for="deskripsi_hewan"  class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Singkat</label>
                    <textarea id="deskripsi_hewan" name="deskripsi_hewan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300" placeholder="Tentang hewan..."><?php echo htmlspecialchars($hewan['deskripsi_hewan']); ?></textarea>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="status_hewan" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                        <select id="status_hewan" name="status_hewan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                            <option value="Tidak Terancam" <?php echo ($selected_status_hewan == 'Tidak Terancam') ? 'selected' : ''; ?>>Tidak Terancam</option>
                            <option value="Hampir Terancam" <?php echo ($selected_status_hewan == 'Hampir Terancam') ? 'selected' : ''; ?>>Hampir Terancam</option>
                            <option value="Terancam Punah" <?php echo ($selected_status_hewan == 'Terancam Punah') ? 'selected' : ''; ?>>Terancam Punah</option>
                            <option value="Sangat Terancam Punah" <?php echo ($selected_status_hewan == 'Sangat Terancam Punah') ? 'selected' : ''; ?>>Sangat Terancam Punah</option>
                            <option value="Punah" <?php echo ($selected_status_hewan == 'Punah') ? 'selected' : ''; ?>>Punah</option>
                        </select>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="jenis_makanan" class="block mb-2 text-sm font-medium text-gray-900">Jenis Makanan</label>
                        <select id="jenis_makanan" name="jenis_makanan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                            <option value="Herbivora" <?php echo ($selected_jenis_makanan == 'Herbivora') ? 'selected' : ''; ?>>Herbivora</option>
                            <option value="Karnivora" <?php echo ($selected_jenis_makanan == 'Karnivora') ? 'selected' : ''; ?>>Karnivora</option>
                            <option value="Omnivora" <?php echo ($selected_jenis_makanan == 'Omnivora') ? 'selected' : ''; ?>>Omnivora</option>
                        </select>
                    </div>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" value="<?php echo htmlspecialchars($hewan['populasi']); ?>" name="populasi" id="populasi" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none outline-none border-gray-600 peer" placeholder=" " required />
                    <label for="populasi" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Populasi</label>
                </div>
                <div class="relative z-0 w-full mb-10 group flex items-center space-x-6">
                    <label for="gambar_hewan" class="text-sm text-gray-500">Gambar Hewan</label>
                    <div class="shrink-0">
                        <img id="preview_hewan" class="h-16 w-16 object-cover rounded-full" src="<?php echo htmlspecialchars($hewan['gambar_hewan']); ?>" />
                    </div>
                    <label class="block">
                        <span class="sr-only">Pilih Foto Hewan</span>
                        <input type="file" name="gambar_hewan" onchange="loadFile(event)" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#11385a] file:text-white hover:file:bg-violet-100" />
                    </label>
                </div>
                <div class="relative z-0 w-full mb-10 group flex items-center space-x-6">
                    <label for="gambar_penyebaran" class="text-sm text-gray-500">Gambar Map Penyebaran</label>
                    <div class="shrink-0">
                        <img id="preview_map" class="h-16 w-16 object-cover rounded-full" src="<?php echo htmlspecialchars($hewan['gambar_penyebaran']); ?>" />
                    </div>
                    <label class="block">
                        <span class="sr-only">Pilih Foto Map</span>
                        <input type="file" name="gambar_penyebaran" onchange="loadFile1(event)" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#11385a] file:text-white hover:file:bg-violet-100" />
                    </label>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Perbarui Hewan</button>
            </form>
        </div>
        <div class="mt-10 bg-white p-12 mr-44 shadow-xl">
            <a href="./tambah_fakta.php?id=<?php echo $id_admin; ?>&id_hewan=<?php echo $id_hewan; ?>" class="bg-[#11385a] text-white font-semibold px-3 py-2 rounded-md">TAMBAH FAKTA</a>
            <table class="w-full text-sm text-gray-500 text-center">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Fakta Hewan</th>
                        <th scope="col" class="px-6 py-3">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = $query_fakta->fetch_assoc()) {
                        echo "<tr class='bg-white border-b'>";
                        echo "<td class='px-6 py-4'>" . $no++ . "</td>";
                        echo "<td class='px-6 py-4'>" . htmlspecialchars($row['nama_fakta']) . "</td>";
                        echo "<td class='px-6 py-4'>
                            <a href='./edit_fakta.php?id=" . htmlspecialchars($id_admin) . "&id_hewan=" . htmlspecialchars($id_hewan) . "&id_fakta=" . htmlspecialchars($row['id_fakta']) . "' class='text-blue-600 hover:underline'>Edit</a> | 
                            <a href='./hapus_fakta.php?id_fakta=" . htmlspecialchars($row['id_fakta']) . "' class='text-red-600 hover:underline'>Hapus</a>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('preview_hewan');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src);
            }
        };
        var loadFile1 = function(event) {
            var output = document.getElementById('preview_map');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src);
            }
        }
    </script>
</body>
</html>
