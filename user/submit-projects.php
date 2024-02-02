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
$get_leader = [];
$get_members = [];

try {
  $get_leader = execThis("SELECT * FROM bunch WHERE leader_id ='" . $_SESSION['email'] . "' AND project_id = " . $_GET['id'] . "");

  $get_members = execThis("SELECT * FROM bunch_member WHERE member_id ='" . $_SESSION['email'] . "' AND bunch_id = " . $_GET['bid'] . "");
} catch (\Throwable $th) {
  echo $th;
  header("Location: ../content/not-found.php");
  exit;
}



if (empty($get_leader) && empty($get_members)) {
  header("Location: restricted.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/img/favicon/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <title>Pengumpulan Proyek | PBL Vokasi</title>
  <?php include("./includes/head.php") ?>
</head>

<body class="">

  <?php include("./includes/navbar.php") ?>

  <!-- Side Bar -->
  <?php include("./includes/aside.php") ?>
  <div class="p-4 sm:ml-64">
    <!-- important -->
    <div class="rounded-lg mt-14 flex flex-col item-start">
      <div class="mx-auto w-full px-4 lg:px-12">
        <!-- BreadCrumbs -->

        <nav class="flex my-7" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <a href="./dashboard.php" class="inline-flex items-center lg:text-lg text-sm font-medium text-gray-700 hover:text-amber-500">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                </svg>
                Beranda
              </a>
            </li>
            <li class="inline-flex items-center">
              <div class="flex items-center">
                <svg class="ms-1 rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <a href="projects.php?bid=<?= $_GET['bid']  ?>&id=<?= $_GET['id'] ?>" class="inline-flex items-center lg:text-lg text-sm font-medium text-gray-700 hover:text-amber-500">
                  <span class="ms-1 lg:text-lg text-sm font-medium text-gray-900 hover:text-amber-500 md:ms-2">Proyek Kamu</span>
                </a>
              </div>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 lg:text-lg text-sm font-medium text-amber-500 md:ms-2">Pengumpulan Proyek</span>
              </div>
            </li>
          </ol>
        </nav>

        <div>
          <div class="flex flex-wrap w-full justify-between">
            <div class="px-1 sm:px-0 flex justify-center items-center">
              <h3 class="text-2xl font-semibold leading-7 text-gray-900">Pengumpulan Proyek</h3>
            </div>


            <div class="flex items-center flex-wrap">

              <a href="projects.php?bid=<?= $_GET['bid']  ?>&id=<?= $_GET['id'] ?>" type="button" class="text-white bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-2.5 py-2 text-center inline-flex items-center me-2 my-3">
                <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 5H1m0 0 4 4M1 5l4-4" />
                </svg>
                Kembali
              </a>
            </div>
          </div>

          <div class="mt-2 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
              <div class="px-1 py-6 sm:grid grid-cols-1 lg:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">Nilai Proyek</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0"> <span class="font-semibold text-amber-500">0</span> /100</dd>
              </div>
              <div class="px-1 py-6 sm:grid grid-cols-1 lg:grid-cols-3 my-1 sm:gap-4 sm:px-0 flex items-center">
                <dt class="text-md font-medium leading-6 text-gray-900">URL Video Youtube</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                  <input type="text" id="small-input" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5" <?= $identifier = (!empty($get_leader)) ? '' : 'disabled' ?> placeholder="Masukkan URL Video Youtube">
                </dd>
              </div>
              <div class="px-1 py-6 sm:grid grid-cols-1 lg:grid-cols-3 my-1 sm:gap-4 sm:px-0 flex items-center">
                <dt class="text-md font-medium leading-6 text-gray-900">URL Web/Aplikasi</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                  <input type="text" id="small-input" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5" <?= $identifier = (!empty($get_leader)) ? '' : 'disabled' ?> placeholder="Masukkan URL Web/Aplikasi">
                </dd>
              </div>
              <div class="px-1 py-6 sm:grid grid-cols-1 lg:grid-cols-3 my-1 sm:gap-4 sm:px-0 flex items-center">
                <dt class="text-md font-medium leading-6 text-gray-900">Unggah Poster</dt>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer  focus:outline-none sm:col-span-2" id="file_input" <?= $identifier = (!empty($get_leader)) ? '' : 'disabled' ?> type="file">
              </div>
              <div class="px-1 py-6 sm:grid grid-cols-1 lg:grid-cols-3 my-1 sm:gap-4 sm:px-0 flex items-center">
                <dt class="text-md font-medium leading-6 text-gray-900">Unggah Laporan</dt>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer  focus:outline-none sm:col-span-2" id="file_input" <?= $identifier = (!empty($get_leader)) ? '' : 'disabled' ?> type="file">
              </div>
              <div class="px-1 py-6 sm:grid grid-cols-1 lg:grid-cols-3 my-1 sm:gap-4 sm:px-0 flex">
                <button class="text-white text-center w-20 bg-green-500 hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 inline-flex items-center me-2 my-3" <?= $identifier = (!empty($get_leader)) ? '' : 'disabled' ?> type="button">

                  Submit
                </button>
                <dt class="text-md font-medium leading-6 text-gray-900"></dt>
              </div>

            </dl>
          </div>
        </div>

      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>