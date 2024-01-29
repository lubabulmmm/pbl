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

$projects = execThis("SELECT id_proyek, nama_proyek, deskripsi_proyek, nama_user, gambar FROM proyek INNER JOIN user ON proyek.id_user = user.email");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | PBL Vokasi</title>
  <?php include("./includes/head.php") ?>
</head>

<body class="bg-gray-50 ">
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
        <div class="relative overflow-hidden bg-gray-50 sm:rounded-lg">
          <div class="flex-row items-center justify-between p-4 space-y-3 md:flex lg:flex-row sm:flex sm:space-y-0 sm:space-x-4">
            <div class="flex w-5/12 items-center">
              <img class="w-20 h-20 rounded-xl" src="/pbl/assets/img/pfp.jpg" alt="Default avatar">
              <div class="ml-6">
                <h5 class="mr-3 font-semibold text-gray-900"><?= $_SESSION["nama_user"] ?>'s Dashboard</h5>
                <p class=" text-gray-400"><?= $_SESSION["email"] ?></p>
              </div>
            </div>
            <a href="./groups.php" class="flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white rounded-lg bg-amber-500 hover:scale-105 duration-300 ease-in-out hover:shadow-md hover:shadow-gray-300 focus:ring-4 focus:ring-amber-300 focus:outline-none">
              <svg class="h-3.5 w-3.5 mr-2 -ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
              </svg>
              Temukan Kelompok
            </a>
          </div>
        </div>
      </div>

      <!-- PROYEK PENGERJAAN -->
      <h2 class="text-xl self-start font-medium px-7 w-full">Proyek kamu saat ini</h2>

      <div class="py-8 max-w-screen-xl lg:py-6 lg:px-6">
        <div class="grid gap-8 lg:grid-cols-2">
          <?php include("../content/user-project.php") ?>
        </div>
      </div>


      <!-- Proyek yang dapat dipilih -->
      <h2 class="text-xl self-start font-medium px-7 mt-5 w-full">Judul Project Based Learning yang bisa dipilih</h2>

      <?php include("../content/chsproject.php") ?>


    </div>
  </div>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
  <script>
    // import('tailwindcss').Config;
    module.exports = {
      theme: {
        colors: {
          'tr': '#FFAA2A'
        },
      },
    }
  </script>
</body>

</html>