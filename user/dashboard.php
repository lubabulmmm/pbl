<?php

session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
}

if (isset($_SESSION["level"])) {
  if ($_SESSION["level"] == "superadmin") {
    header("Location: /PBL/superadmin/superadmin.php");
    exit;
  } elseif ($_SESSION["level"] == "admin") {
    header("Location: /PBL/dosen/dashadmin.php");
    exit;
  }
}

require "../query/query.php";

$fetch_project = execThis("SELECT * FROM bunch_member WHERE member_id = '" . $_SESSION['email'] . "'");

$projects = execThis("SELECT id_proyek, nama_proyek, deskripsi_proyek, pict, total_groups, minggu, nama_user, gambar FROM proyek INNER JOIN user ON proyek.id_user = user.email");

// Check if the form is submitted
if (isset($_POST["cari"])) {
  $keyword = $_POST["keyword"];

  if (empty($keyword)) {
    $projects = execThis("SELECT id_proyek, nama_proyek, pict, total_groups, minggu, deskripsi_proyek, nama_user, gambar FROM proyek INNER JOIN user ON proyek.id_user = user.email");
  } else {
    $projects = execThis("SELECT id_proyek, nama_proyek, pict, total_groups, minggu, deskripsi_proyek, nama_user, gambar FROM proyek INNER JOIN user ON proyek.id_user = user.email WHERE nama_proyek LIKE '%$keyword%' ");
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | PBL Vokasi</title>
  <?php include("./includes/head.php") ?>
</head>

<body class="bg-white">
  <!-- Navigation Bar -->
  <?php include("./includes/navbar.php") ?>

  <!-- Side Bar -->
  <?php include("./includes/aside.php") ?>

  <!-- Content Wrap-->
  <div class="p-4 sm:ml-64">
    <!-- important -->
    <div class="rounded-lg mt-14 flex flex-col item-start">
      <!-- Contents -->


      <!-- INFORMASI PENGGUNA -->
      <div class="w-full px-4 lg:px-3 py-4">
        <!-- Start coding here -->
        <div class="relative overflow-hidden bg-white sm:rounded-lg">
          <div class="flex-row items-center justify-between p-4 space-y-3 md:flex lg:flex-row sm:flex sm:space-y-0 sm:space-x-4">
            <div class="flex w-5/12 items-center">
              <img class="w-20 h-20 rounded-xl" src="/pbl/assets/img/<?= $_SESSION['gambar'] ?>" alt="Default avatar">
              <div class="ml-6">
                <h5 class="mr-3 font-semibold text-gray-900">
                  <?= $_SESSION["nama_user"] ?>'s Dashboard
                </h5>
                <p class=" text-gray-400">
                  <?= $_SESSION["email"] ?>
                </p>
              </div>
            </div>
            <a href="./profile.php" type="button" class="text-white bg-amber-400 focus:ring-4 focus:outline-none focus:ring-amber-300 shadow font-medium rounded-lg text-xs hover:scale-105 duration-300 ease-in-out hover:shadow-md hover:shadow-gray-300 px-4 py-2.5 text-center inline-flex items-center me-2 ">
              <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
              </svg>
              Profil
            </a>
          </div>
        </div>
      </div>

      <!-- PROYEK PENGERJAAN -->
      <div class="flex px-7 mb-6 flex-wrap">
        <a href="./groups.php" type="button" class="text-amber-500 bg-white focus:ring-4 focus:outline-none focus:ring-amber-300 shadow font-medium rounded-lg text-xs hover:scale-105 duration-300 ml-0 mr-2 my-2 ease-in-out hover:shadow-md hover:shadow-gray-300 px-4 py-2.5 text-center inline-flex items-center me-2 ">
          <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
          </svg>
          Cari Kelompok
        </a>
        <button type="button" data-modal-target="req-list-modal" data-modal-toggle="req-list-modal" class="text-green-600 bg-white focus:ring-4 focus:outline-none focus:ring-green-100 shadow font-medium rounded-lg text-xs hover:scale-105 duration-300 m-2 ease-in-out hover:shadow-md hover:shadow-gray-300 px-4 py-2.5 text-center inline-flex items-center me-2 ">
          <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 13h3.4a1 1 0 0 1 1 .6 4 4 0 0 0 7.3 0 1 1 0 0 1 .9-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9" />
          </svg>
          Kotak Masuk
        </button>
        <a href="#chs" class="text-violet-600 bg-white focus:ring-4 focus:outline-none focus:ring-violet-100 shadow font-medium rounded-lg text-xs hover:scale-105 duration-300 m-2 ease-in-out hover:shadow-md hover:shadow-gray-300 px-4 py-2.5 text-center inline-flex items-center me-2">
          <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M10 12v1h4v-1m4 7H6a1 1 0 0 1-1-1V9h14v9a1 1 0 0 1-1 1ZM4 5h16c.6 0 1 .4 1 1v2c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1V6c0-.6.4-1 1-1Z" />
          </svg>
          Proyek Lainnya
        </a>
      </div>

      <h2 class="text-xl self-start font-medium px-7 w-full">Proyek Yang Sedang Dikerjakan</h2>


      <div class="py-8 max-w-screen-xl px-7 lg:py-4 lg:px-6">
        <div class="grid gap-8 lg:grid-cols-2">

          <?php include("../content/user-project.php") ?>
        </div>
      </div>

      <!-- Proyek yang dapat dipilih -->
      <h2 class="text-xl self-start font-medium px-7 mt-5 w-full" id="chs">Daftar Kumpulan Judul Project Based Learning
      </h2>
      <div class="w-full md:w-1/2 px-7 mt-5">
        <form id="liveSearchForm" class="flex items-center" method="POST">
          <label for="simple-search" class="sr-only">Search</label>
          <div class="relative w-full">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
              </svg>
            </div>
            <input type="text" name="keyword" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 block w-full pl-10 p-2 mr-3" placeholder="Cari">
          </div>

          <button type="submit" name="cari" class="flex items-center justify-center text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ml-4">
            <svg class="h-3.5 w-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
            Cari
          </button>
        </form>

      </div>
      <?php include("../content/chsproject.php") ?>
    </div>
  </div>

  <?php include("../content/req-list.php") ?>

  <div id="choose" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full ">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow req-modal transition-all duration-300">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
          <h3 class="text-lg font-semibold text-gray-900">
            Tambah Proyek Kamu
          </h3>
          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="choose">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 md:p-5">
          <p class="text-black-500 mb-4 ml-2">Pilih preferensi role kamu:</p>
          <div class="grid grid-cols-2 gap-3 mb-5">

            <a href="#chs" data-modal-toggle="choose" class="flex py-5 flex-col items-center justify-center bg-white w-full col-span-1 rounded-lg shadow transition focus:ring-4 focus:outline-none focus:ring-blue-100 duration-300 hover:shadow-lg hover:shadow-blue-100 shadow-blue-200">
              <svg class="w-10 h-10 text-blue-800 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a9 9 0 0 0 5-1.5 4 4 0 0 0-4-3.5h-2a4 4 0 0 0-4 3.5 9 9 0 0 0 5 1.5Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
              </svg>
              <p class="w-full text-center mt-2.5 text-sm text-blue-800">Jadi Ketua Kelompok</p>
            </a>

            <a href="groups.php" class="flex py-5 flex-col items-center justify-center bg-white w-full col-span-1 rounded-lg shadow transition focus:ring-4 focus:outline-none focus:ring-blue-100 duration-300 hover:shadow-lg hover:shadow-blue-100 shadow-blue-200">
              <svg class="w-10 h-10 text-blue-800 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="1" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3a2.5 2.5 0 1 1 2-4.5M19.5 17h.5c.6 0 1-.4 1-1a3 3 0 0 0-3-3h-1m0-3a2.5 2.5 0 1 0-2-4.5m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3c0 .6-.4 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
              </svg>
              <p class="w-full text-center mt-2.5 text-sm text-blue-800">Gabung Kelompok</p>
            </a>


          </div>
          <button data-modal-toggle="choose" class="text-white inline-flex w-full justify-center bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Kembali
          </button>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>