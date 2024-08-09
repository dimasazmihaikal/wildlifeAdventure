<?php 
require_once("./../php/auth.php"); 

if (isset($_GET['id'])) {
  $id_admin = $_GET['id'];
} else {
  header("Location: ./../login.php");
  exit;
}
// if (isset($_GET['message']) && $_GET['message'] == 'deleted') {
//   echo "<p style='color:green;'>Data telah dihapus</p>";
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../../css/output.css">
    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const message = urlParams.get('message');
            if (message === 'added') {
                alert('Data hewan telah berhasil ditambahkan.');
            }
        };
    </script>
</head>
<body class="bg-[#e2e6ed]">
    <div class="h-16 w-screen  flex items-center">
        <a href="./dashboard.php?id=<?php echo $id_admin; ?>&message=added" class="bg-[#11385a] text-white py-1 px-6 text-xl rounded-full font-semibold ml-9">Batal</a>
    </div>
    <div class="  m-auto mt-10">
        <form class="min-w-md max-w-2xl mx-auto bg-white p-12" action="proses_tambah_fakta.php?id_hewan=<?php echo $_GET['id_hewan']; ?>" method="post" enctype="multipart/form-data">
            <div class="text-2xl font-semibold">FAKTA MENGENAI HEWAN</div>
            <hr class="border-black border-2 w-11  mb-7">
            <div class="relative z-0 w-full mb-5 group">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="nama_fakta" id="nama_fakta" class="block py-2.5 px-0 w-full text-sm  bg-transparent border-0 border-b-2 appearance-none outline-none border-gray-600 peer" placeholder=" " required />
                    <label for="nama_fakta" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Fakta</label>
                </div>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label for="deskripsi_fakta" class="block mb-2 text-sm font-medium text-gray-900 ">Deskripsi Fakta</label>
                <textarea id="deskripsi_fakta" name="deskripsi_fakta" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 " placeholder="Tentang Makanan..."></textarea>
            </div>  
            <div class="relative z-0 w-full mb-10 group flex items-center space-x-6">
                <label for="gambar_fakta" class="text-sm text-gray-500">Gambar Fakta</label>
                <div class="shrink-0">
                    <img id='preview_hewan' class="h-16 w-16 object-cover rounded-full" src="./../../image/KUDAPAN.png" />
                  </div>
                  <label class="block">
                    <span class="sr-only">pilih Foto Fakta</span>
                    <input type="file" name="gambar_fakta" onchange="loadFile(event)" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#11385a] file:text-white hover:file:bg-violet-100
                    "/>
                  </label>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Tambahkan Fakta</button>
        </form>  
    </div>

<script>
    var loadFile = function(event) {
        var input = event.target;
        var file = input.files[0];
        var type = file.type;
        var output = document.getElementById('preview_hewan');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
    };
</script>
</body>
</html>