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
$projects = [];

try {
  $projects = execThis("SELECT id_user, id_proyek, req, deskripsi_proyek, nama_proyek, nama_user FROM proyek JOIN user ON user.email = proyek.id_user WHERE id_proyek = " . $_GET['id'] . "");
} catch (\Throwable $th) {
  echo $th;
  header("Location: ../content/not-found.php");
  exit;
}

if (isset($_POST["submit"])) {

  if (add_bunch($_POST, $_SESSION['email'], $_GET['id']) > 0) {
    $get_sheet = execThis("SELECT * FROM bunch WHERE project_id = " . $_GET['id'] . " AND leader_id = '" . $_SESSION['email'] . "'");
    header("Location: projects.php?bid=" . $get_sheet[0]['bunch_id'] . "&id=" . $_GET['id'] . "&info=success");
  } else {
    header("Location: detail-project.php?id=" . $_GET['id'] . "&info=failed");
  }
}

$projects = execThis("SELECT id_user, id_proyek, req, deskripsi_proyek, nama_proyek, nama_user FROM proyek JOIN user ON user.email = proyek.id_user WHERE id_proyek = " . $_GET['id'] . "");

$sum_bunch = mysqli_query($conn, "SELECT * FROM bunch WHERE project_id = " . $_GET['id'] . "");
$sum_num = mysqli_num_rows($sum_bunch);

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
  <title>Detail Proyek | PBL Vokasi</title>
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
              <a href="./dashboard.php" class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-amber-500">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                </svg>
                Beranda
              </a>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-lg font-medium text-amber-500 md:ms-2">Detail Proyek</span>
              </div>
            </li>
          </ol>
        </nav>

        <?php include("../dosen/content/info.php") ?>

        <div class="flex w-full flex-wrap justify-between items-center">
          <div class="">
            <h2 class="text-2xl mb-2 font-semibold"><?= $projects[0]['nama_proyek'] ?></h2>
            <?php if ($sum_num == 3) : ?>
              <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Proyek Penuh</span>
            <?php endif; ?>
          </div>


          <div class="flex items-center flex-wrap">

            <a href="./dashboard.php" type="button" class="text-white bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
              <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
              </svg>
              Kembali
            </a>
            <?php if ($sum_num == 3) : ?>
              <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button" class="text-white bg-gray-300  focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3" disabled>
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                  <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2 1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z" />
                </svg>
                Pilih Judul
              </button>
            <?php endif; ?>
            <?php if ($sum_num < 3) : ?>
              <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button" class="text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                  <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2 1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z" />
                </svg>
                Pilih Judul
              </button>.
            <?php endif; ?>

          </div>
        </div>

        <div class="mt-6 border-t border-gray-100">
          <dl class="divide-y divide-gray-100">
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-md font-medium leading-6 text-gray-900">Dosen PIC</dt>
              <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= $projects[0]['nama_user'] ?></dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-md font-medium leading-6 text-gray-900">Jumlah Kelompok</dt>
              <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0"> <span class="font-semibold text-amber-500"><?= $sum_num ?></span> /3</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-md font-medium leading-6 text-gray-900">Deskripsi</dt>
              <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= $projects[0]['deskripsi_proyek'] ?></dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-md font-medium leading-6 text-gray-900">Fitur Utama</dt>
              <dd class="mt-2 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                <?= $projects[0]['req'] ?>
              </dd>
            </div>
          </dl>
        </div>
      </div>
    </div>

    <?php include "../content/confirm-project.php" ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>