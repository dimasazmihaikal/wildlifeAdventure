<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WildlifeADV</title>
  <link rel="stylesheet" href="../../css/output.css">
</head>

<body class="bg-no-repeat bg-cover bg-[#ece2d0]">
  <nav class="bg-hutan">
    <div class="w-full bg-white flex">
      <a href="../mainmenu.html" class="sm:p-5 mn:p-4 text-[#000116] bg-[#bfead7] hover:bg-[#000116] hover:text-[#bfead7] font-extrabold text-center w-full mn:text-bas sm:text-3xl anima">Kembali</a>
      <button class="sm:p-5 mn:p-4 text-[#000116] bg-green-500 hover:bg-[#000116] hover:text-[#bfead7] font-extrabold text-center w-1/4 mn:text-bas sm:text-3xl show-modal">
        Keterangan
      </button>
      <!-- MODAL MANG -->
      <div class="z-10 modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded shadow-lg w-1/3">
          <div class="border-b px-4 py-2">
            <h1 class="font-semibold text-3xl">AVES</h1>
          </div>
          <div class="p-3">
          Hewan aves adalah nama lain dari burung. Burung sendiri merupakan salah satu anggota hewan yang memiliki tulang belakang atau vertebrata yang memiliki bulu dan sayap
          </div>
          <div class="flex justify-end items-center w-100 border-t p-3">
            <button class="bg-blue-800 px-3 py-1 rounded text-white mr-1 close-modal">TUTUP</button>
          </div>
        </div>
      </div>
      <script>
        const modal = document.querySelector('.modal');
        const showModal = document.querySelector('.show-modal');
        const closeModal = document.querySelectorAll('.close-modal');

        showModal.addEventListener('click', function () {
          modal.classList.remove('hidden');
        });

        closeModal.forEach(close => {
          close.addEventListener('click', function () {
            modal.classList.add('hidden');
          });
        });
      </script>
    </div>
  </nav>
  <div class="items-baseline flex mn:flex-col sm:flex-row bg-fixed h-[880px] w-auto bg-cover bg-center">
    <div class="flex flex-wrap justify-center" id="hewan-container">
      <!-- Data hewan akan dimasukkan di sini melalui JavaScript -->
    </div>
  </div>
  <script>
    // Fungsi untuk mengambil data hewan dari server
    async function fetchHewan() {
      try {
        const response = await fetch('ambil_aves.php');
        const hewan = await response.json();
        return hewan;
      } catch (error) {
        console.error('Error fetching hewan:', error);
      }
    }

    // Fungsi untuk menampilkan data hewan
    function displayHewan(hewan) {
      const container = document.getElementById('hewan-container');
      container.innerHTML = ''; // Kosongkan kontainer

      hewan.forEach(h => {
        const cardLink = document.createElement('a');
        cardLink.href = `detail.php?id_hewan=${h.id_hewan}`;
        cardLink.className = 'card-zoomm';

        const cardImage = document.createElement('div');
        cardImage.className = 'card-zoomm-image';
        const imageUrl = `./../../img/${encodeURIComponent(h.gambar_hewan)}`;
        cardImage.style.backgroundImage = `url(${imageUrl})`;

        // Debugging: Tampilkan URL gambar di console
        console.log(imageUrl);

        const cardText = document.createElement('h1');
        cardText.className = 'card-zoomm-text';
        cardText.innerText = h.nama_hewan;

        cardLink.appendChild(cardImage);
        cardLink.appendChild(cardText);
        container.appendChild(cardLink);
      });
    }

    // Ambil dan tampilkan data hewan saat halaman dimuat
    document.addEventListener('DOMContentLoaded', async () => {
      const hewan = await fetchHewan();
      displayHewan(hewan);
    });
  </script>
</body>
</html>
