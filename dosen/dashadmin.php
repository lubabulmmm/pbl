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
        <div class="relative overflow-hidden bg-white dark:sm:rounded-lg">
          <div class="flex-row items-center justify-between p-4 space-y-3 md:flex lg:flex-row sm:flex sm:space-y-0 sm:space-x-4">
            <div class="flex w-5/12 items-center">
              <img class="w-20 h-20 rounded-xl" src="/pbl/assets/img/<?= $_SESSION['gambar'] ?>" alt="Default avatar">
              <div class="ml-6">
                <h5 class="mr-3 font-semibold dark:text-gray-900"><?= $_SESSION['nama_user'] ?>'s Dashboard</h5>
                <p class="text-gray-500 dark:text-gray-400"><?= $_SESSION['email'] ?></p>
              </div>
            </div>
            <a href="./add-projects.php" type="button" class="flex items-center justify-center text-blue-700 bg-white shadow hover:shadow-md transition duration-300 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ml-4">
              <svg class="h-3.5 w-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 5.757v8.486M5.757 10h8.486M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
              </svg>
              Tambah Proyek
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
      </div>

      <?php include("./content/chsadmin.php") ?>
      <?php include("../content/req-list-pm.php") ?>


    </div>
  </div>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>