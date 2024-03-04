<?php

session_start();
if (!isset($_SESSION["login"])) {
  header("Location: /PBL/login.php");
}

if (isset($_SESSION["level"])) {
  if ($_SESSION["level"] == "user") {
    header("Location: /PBL/user/dashboard.php");
    exit;
  } elseif ($_SESSION["level"] == "superadmin") {
    header("Location: /PBL/superadmin/superadmin.php");
    exit;
  }
}

require "../query/query.php";

if (isset($_POST["archive"])) {
  if (add_archive($_POST['pid']) > 0) {
    header("Location: dashadmin.php");
  } else {
    header("Location: dashadmin.php?info=failed");
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

<body class="">
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
      <div class="w-full px-4 mx-auto lg:px-3 py-4">
        <!-- Start coding here -->
        <div class="relative overflow-hidden bg-white sm:rounded-lg">
          <div class="flex-row items-center justify-between p-4 space-y-3 md:flex lg:flex-row sm:flex sm:space-y-0 sm:space-x-4">
            <div class="flex w-5/12 items-center">
              <img class="w-20 h-20 rounded-xl" src="/pbl/assets/img/<?= $_SESSION['gambar'] ?>" alt="Default avatar">
              <div class="ml-6">
                <h5 class="mr-3 font-semibold text-gray-900"><?= $_SESSION['nama_user'] ?>'s Dashboard</h5>
                <p class="text-gray-500 "><?= $_SESSION['email'] ?></p>
              </div>
            </div>
            <a href="./profile.php" type="button" class="flex items-center justify-center bg-blue-600 text-white shadow hover:shadow-md transition duration-300 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ml-4">
              <svg class="h-3.5 w-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
              </svg>
              Profil
            </a>
          </div>
        </div>
      </div>

      <div class="flex px-7 mb-6 flex-wrap">
        <a href="./add-projects.php" type="button" class="text-blue-600 bg-white focus:ring-4 focus:outline-none focus:ring-blue-100 shadow font-medium rounded-lg text-xs hover:scale-105 duration-300 mr-2 my-2 ml-0 ease-in-out hover:shadow-md hover:shadow-gray-300 px-4 py-2.5 text-center inline-flex items-center me-2 ">
          <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 5.757v8.486M5.757 10h8.486M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          Tambah Proyek
        </a>

        <button type="button" data-modal-target="req-list" data-modal-toggle="req-list" class="text-green-600 bg-white focus:ring-4 focus:outline-none focus:ring-green-100 shadow font-medium rounded-lg text-xs hover:scale-105 duration-300 m-2 ease-in-out hover:shadow-md hover:shadow-gray-300 px-4 py-2.5 text-center inline-flex items-center me-2 ">

          <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 13h3.4a1 1 0 0 1 1 .6 4 4 0 0 0 7.3 0 1 1 0 0 1 .9-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9" />
          </svg>
          Permintaan Bergabung
        </button>

        <a href="archive.php" class="text-violet-600 bg-white focus:ring-4 focus:outline-none focus:ring-violet-100 shadow font-medium rounded-lg text-xs hover:scale-105 duration-300 m-2 ease-in-out hover:shadow-md hover:shadow-gray-300 px-4 py-2.5 text-center inline-flex items-center me-2">
          <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M10 12v1h4v-1m4 7H6a1 1 0 0 1-1-1V9h14v9a1 1 0 0 1-1 1ZM4 5h16c.6 0 1 .4 1 1v2c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1V6c0-.6.4-1 1-1Z" />
          </svg>
          Arsip Proyek
        </a>
      </div>

      <?php include("./content/info.php") ?>

      <?php include("./content/chsadmin.php") ?>
      <?php include("../content/req-list-pm.php") ?>


    </div>
  </div>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>