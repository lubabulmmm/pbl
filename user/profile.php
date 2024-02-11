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
    header("Location: dosen/dashadmin.php");
    exit;
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Kamu | PBL Vokasi</title>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <link rel="shortcut icon" href="/PBL/assets/img/favicon/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="180x180" href="/PBL/assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/PBL/assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/PBL/assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap');

    body {
      font-family: 'Inter', sans-serif;
    }

    html {
      scroll-behavior: smooth;
    }

    .os:hover {
      background-color: #FFAA2A;
    }

    .od:hover {
      background-color: #53659F;
    }

    @media screen and (max-width: 600px) {
      .name {
        display: none;
      }
    }
  </style>
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

      <div class="mx-auto w-full px-4 lg:px-12">

        <nav class="flex my-7" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <a href="./dashboard.php"
                class=" inline-flex items-center text-lg font-medium text-gray-700 hover:text-blue-500">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                  viewBox="0 0 20 20">
                  <path
                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                </svg>
                Beranda
              </a>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-lg font-medium text-blue-500 md:ms-2">Profil</span>
              </div>
            </li>
          </ol>
        </nav>

        <form>
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-5">
              <h2 class="text-xl font-semibold leading-7 text-gray-900">Profil Kamu</h2>

              <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                  <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                  <div class="mt-2 flex items-center gap-x-3">
                    <img src="../assets/img/profile.png" class="h-20 w-20" alt="">
                    <div class="w-2/12">

                      <input type="file" name="" id=""
                        class="text-sm file:bg-white file:border-blue-700 file:text-blue-700 file:text-sm file:border file:py-1 file:px-3 file:rounded-full">
                    </div>
                    <button
                      class="flex items-center flex-wrap ml-auto bg-amber-500 text-white rounded-xl mx-3 px-2 py-1 text-sm ">Ubah</button>
                  </div>

                </div>
              </div>
            </div>
        </form>

      </div>

    </div>
  </div>



</body>

</html>