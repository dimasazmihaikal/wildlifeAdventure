<?php
session_start();
if (isset($_GET['id'])) {
    $id_admin = $_GET['id'];
} else {
}
$_SESSION['id'] = $id_admin;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Hewan</title>
    <link rel="stylesheet" href="./../../css/output.css">
    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const status = urlParams.get('status');
            if (status === 'success') {
                alert('Data hewan telah berhasil ditambahkan.');
            } else if (status === 'error') {
                alert('Terjadi kesalahan saat menambahkan data hewan.');
            }
        };
    </script>
</head>
<body class="bg-[#e2e6ed]">
    <div class="h-16 w-screen flex items-center">
        <a href="./dashboard.php?id=<?php echo $id_admin; ?>" class="bg-[#11385a] text-white py-1 px-6 text-xl rounded-full font-semibold ml-9">KEMBALI</a>
    </div>
    <div class="m-auto mt-10">
        <form class="min-w-md max-w-2xl mx-auto bg-white p-12" action="proses_tambah_hewan.php" method="post" enctype="multipart/form-data">
            <div class="text-2xl font-semibold">DATA HEWAN</div>
            <hr class="border-black border-2 w-11 mb-7">
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="nama_hewan" id="nama_hewan" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none outline-none border-gray-600 peer" placeholder=" " required />
                    <label for="nama_hewan" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Hewan</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="nama_latin" id="nama_latin" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none outline-none border-gray-600 peer" placeholder=" " required />
                    <label for="nama_latin" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Latin</label>
                </div>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="asal_hewan" id="asal_hewan" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none outline-none border-gray-600 peer" placeholder=" " required />
                <label for="asal_hewan" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Dari Benua</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="daerah_dijumpai" id="daerah_dijumpai" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none outline-none border-gray-600 peer" placeholder=" " required />
                <label for="daerah_dijumpai" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Daerah Banyak Dijumpai</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="kalimat_pengantar" id="kalimat_pengantar" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none outline-none border-gray-600 peer" placeholder=" " required />
                <label for="kalimat_pengantar" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kalimat Pengenal</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="link_video" id="link_video" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none outline-none border-gray-600 peer" placeholder=" " required />
                <label for="link_video" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Link Video</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label for="kelas_hewan" class="block mb-2 text-sm font-medium text-gray-900">Jenis hewan</label>
                <select id="kelas_hewan" name="kelas_hewan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    <option value="Mamalia">Mamalia</option>
                    <option value="Aves">Aves</option>
                    <option value="Reptilia">Reptilia</option>
                    <option value="Amphibia">Amphibia</option>
                    <option value="Pisces">Pisces</option>
                </select>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label for="deskripsi_hewan" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Singkat</label>
                <textarea id="deskripsi_hewan" name="deskripsi_hewan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300" placeholder="Tentang Hewan..."></textarea>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-5 group">
                    <label for="status_hewan" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                    <select id="status_hewan" name="status_hewan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        <option value="Tidak Terancam">Tidak Terancam</option>
                        <option value="Hampir Terancam">Hampir Terancam</option>
                        <option value="Terancam Punah">Terancam Punah</option>
                        <option value="Sangat Terancam Punah">Sangat Terancam Punah</option>
                        <option value="Punah">Punah</option>
                    </select>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <label for="jenis_makanan" class="block mb-2 text-sm font-medium text-gray-900">Jenis Makanan</label>
                    <select id="jenis_makanan" name="jenis_makanan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        <option value="Omnivora">Omnivora</option>
                        <option value="Karnivora">Karnivora</option>
                        <option value="Herbivora">Herbivora</option>
                    </select>
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="populasi" id="populasi" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none outline-none border-gray-600 peer" placeholder=" " required />
                    <label for="populasi" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Populasi</label>
                </div>
            </div>
            <div class="relative z-0 w-full mb-10 group flex items-center space-x-6">
                <label for="gambar_hewan" class="text-sm text-gray-500">Gambar Hewan</label>
                <div class="shrink-0">
                    <img id="preview_hewan" class="h-16 w-16 object-cover rounded-full" src="./../../image/KUDAPAN.png" />
                </div>
                <label class="block">
                    <span class="sr-only">Pilih Foto Hewan</span>
                    <input type="file" name="gambar_hewan" onchange="loadFile(event)" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#11385a] file:text-white hover:file:bg-violet-100" />
                </label>
            </div>
            <div class="relative z-0 w-full mb-10 group flex items-center space-x-6">
                <label for="gambar_map" class="text-sm text-gray-500">Gambar Map Penyebaran</label>
                <div class="shrink-0">
                    <img id="preview_map" class="h-16 w-16 object-cover rounded-full" src="./../../image/KUDAPAN.png" />
                </div>
                <label class="block">
                    <span class="sr-only">Pilih Foto Map</span>
                    <input type="file" name="gambar_map" onchange="loadFile1(event)" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#11385a] file:text-white hover:file:bg-violet-100" />
                </label>
            </div>
            <div class="relative z-0 w-full mb-10 group flex items-center space-x-6 hidden">
                <input type="text" name="id_admin" value="<?php echo htmlspecialchars($id_admin);?>">
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Tambahkan Hewan</button>
        </form>
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
