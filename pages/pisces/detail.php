<?php
include("./../php/koneksi.php");

$id_hewan = $_GET['id_hewan'];
$sql_hewan = "SELECT * FROM hewan WHERE id_hewan = $id_hewan";
$result_hewan = $conn->query($sql_hewan);

if ($result_hewan->num_rows > 0) {
    $hewan = $result_hewan->fetch_assoc();
} else {
    echo "Data hewan tidak ditemukan.";
    exit();
}

$sql_fakta = "SELECT * FROM fakta_hewan WHERE id_hewan = $id_hewan";
$result_fakta = $conn->query($sql_fakta);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WildlifeADV</title>
    <link rel="stylesheet" href="../../css/output.css">
</head>
<body>
    <div class="top-0 bottom-0 left-0 right-0 absolute">
        <svg id="eg7cjOCnvbq1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 0 1920 1080" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" width="1920"
            height="1080">
            <ellipse rx="1198.759242" ry="629.348602" transform="translate(962.195073 230.234114)" fill="#ece2d0"
                stroke-width="0" />
        </svg>
        <div class="absolute -top-14 -left-8">
            <a href="./pisces.php"><img src="../../img/back.png" alt="" class="animate-joget w-[300px]"></a>
        </div>
        <div class="absolute -top-0 right-3">
            <a href="../mainmenu.html"><img src="../../img/WA.png" alt="" class="animate-joget w-[200px]"></a>
        </div>

        <div class="top-[6%] bottom-0 left-[35%] right-0 absolute w-[40%]">
            <img src="../../img/bubble.png" alt="">
        </div>
    </div>
    <div class="mt-[400px] -z-10 bg-local bg-cover w-full h-[80vh] bg-center bg-slate-500"
        style="background-image: url(../../img/laut.jpg);">a</div>
    <div class="grid grid-cols-2 absolute top-[44%] w-full">
        <div class="flex justify-end"><img src="../../img/<?php echo $hewan['gambar_hewan']; ?>" alt="" class="w-2/3"></div>
        <div>
            <div class="font-bold text-7xl"><?php echo $hewan['nama_hewan']; ?></div>
            <div class="font-semibold text-2xl italic">&nbsp; <?php echo $hewan['nama_latin']; ?></div>
        </div>
    </div>
    <div class="text-center font-bold text-5xl text-[#fca43e] w-[70%] m-auto pt-10 mb-10">
        <?php echo $hewan['kalimat_pengantar']; ?>
        <hr class="w-80% h-1 mx-auto my-4 border-0 rounded bg-gradient-to-r from-white via-[#c65f24] to-white">
    </div>
    <div class="w-[30%] m-auto pt-10 mb-10">
        <?php echo $hewan['link_video']; ?>
        <hr class="w-full h-1 mx-auto my-4 border-0 rounded bg-gradient-to-r from-white via-black to-white">
    </div>
    <div class="m-4 p-4 text-center text-xl ">
        <?php echo $hewan['deskripsi_hewan']; ?>
    </div>
    <div class="flex place-content-between shadow-xl m-6 mb-10 h-1/2 bg-[#129a6d] text-center text-white">
        <div class="p-6 w-full">
            <div class="justify-center flex">
                <ul class="flex items-center justify-between w-[30%] text-white">
                    <li class="mx-4 my-6">
                        <div class="bg-green-700 p-3 rounded-full border-gray-600 border"></div>
                    </li>
                    <li class="mx-4 my-6">
                        <div class="bg-orange-400 p-3 rounded-full border-gray-600 border ">TERANCAM PUNAH</div>
                    </li>
                    <li class="mx-4 my-6">
                        <div class="bg-red-600 p-3 rounded-full border-gray-600 border"></div>
                    </li>
                </ul>
            </div>
            <div>POPULASI DI DUNIA : <i><?php echo $hewan['populasi']; ?></i></div>
            <hr class="w-80% h-1 mx-auto my-4 border-0 rounded bg-gradient-to-r from-[#129a6d] via-white to-[#129a6d]">
            <div>BERASAL DARI BENUA : <i><?php echo $hewan['asal_hewan']; ?></i></div>
            <hr class="w-80% h-1 mx-auto my-4 border-0 rounded bg-gradient-to-r from-[#129a6d] via-white to-[#129a6d]">
            <div>DAERAH BANYAK DIJUMPAI DI <i><?php echo $hewan['daerah_dijumpai']; ?></i></div>
            <hr class="w-80% h-1 mx-auto my-4 border-0 rounded bg-gradient-to-r from-[#129a6d] via-white to-[#129a6d]">
            <div>GOLONGAN HEWAN : <?php echo $hewan['kelas_hewan']; ?></div>
            <hr class="w-80% h-1 mx-auto my-4 border-0 rounded bg-gradient-to-r from-[#129a6d] via-white to-[#129a6d]">
            <div>JENIS MAKANAN : <?php echo $hewan['jenis_makanan']; ?></div>
            <hr class="w-80% h-1 mx-auto my-4 border-0 rounded bg-gradient-to-r from-[#129a6d] via-white to-[#129a6d]">
        </div>
        <div class="w-[35%]">
            <img src="./../../img/<?php echo $hewan['gambar_penyebaran']; ?>"
                class="object-fill place-self-end w-full h-[455px]" alt="">
        </div>
    </div>
    <div class="bg-[#129a6d] w-[40%] m-auto text-center text-5xl rounded-xl text-white p-5 my-5">
        <div>?!? FAKTA BINATANG ?!?</div>
    </div>
    <div class="flex flex-wrap justify-center p-5">
        <?php while ($fakta = $result_fakta->fetch_assoc()): ?>
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md mx-3 mb-3">
            <div class="-1/2">
                <img class="rounded-t-lg object-fill w-full h-[220px]"
                    src="./../../img/<?php echo $fakta['gambar_fakta']; ?>" alt="" />
            </div>
            <div class="p-5">
                <div>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"><?php echo $fakta['nama_fakta']; ?></h5>
                </div>
                <p class="mb-3 font-xl text-gray-700 dark:text-gray-400"><?php echo $fakta['deskripsi_fakta']; ?></p>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
