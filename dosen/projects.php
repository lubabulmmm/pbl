<?php

session_start();
if (!isset($_SESSION["login"])) {
  header("Location: /PBL/login.php");
}

if (isset($_SESSION["level"])) {
  if ($_SESSION["level"] == "user") {
    header("Location: dashboard.php");
    exit;
  } elseif ($_SESSION["level"] == "superadmin") {
    header("Location: superadmin/superadmin.php");
    exit;
  }
}

require '../query/query.php';

if (isset($_POST["record"])) {

  if (input_date($_POST, $_GET['bid']) > 0) {
    header("Location: projects.php?bid=" . $_POST['bid'] . "&id=" . $_POST['pid'] . "&info=success");
  } else {
    header("Location: projects.php?bid=" . $_POST['bid'] . "&id=" . $_POST['pid'] . "&info=failed");
  }
}

$get_bunch_name = execThis("SELECT bunch_id, bunch_name, project_id, nama_proyek FROM bunch INNER JOIN proyek ON bunch.project_id = proyek.id_proyek WHERE bunch_id =" . $_GET['bid'] . "");

$get_comments = execThis("SELECT * FROM comment WHERE bunch_id =" . $_GET['bid'] . " ORDER BY date_submit DESC");



$get_week = execThis("SELECT minggu FROM proyek WHERE id_proyek =" . $_GET['id'] . "");

$week_num = (int) $get_week[0]['minggu'];

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
  <title>Proyek Kamu | PBL Vokasi</title>
  <?php include("../user/includes/head.php") ?>
</head>

<body class="bg-gray-50">

  <?php include("./includes/navbar.php") ?>

  <!-- Side Bar -->
  <?php include("./includes/aside.php") ?>
  <div class="p-4 sm:ml-64">
    <!-- important -->
    <div class="rounded-lg mt-14 flex flex-col item-start">
      <div class="mx-auto w-full px-4 lg:px-12">
        <nav class="flex mt-7 mb-5" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <a href="./dashadmin.php" class="inline-flex items-center text-md lg:text-lg font-medium text-gray-700 hover:text-blue-500">
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
                <a href="./kelproj.php?id=<?= $_GET['id'] ?>" class="inline-flex items-center text-md lg:text-lg font-medium text-gray-700 hover:text-blue-800">
                  <span class="ms-1 text-md lg:text-lg font-medium text-gray-900 hover:text-blue-500 md:ms-2">Daftar Proyek</span>
                </a>
              </div>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-md lg:text-lg font-medium text-blue-500 md:ms-2">Proyek Kamu</span>
              </div>
            </li>
          </ol>
        </nav>

        <div class="flex flex-wrap w-full mb-5">
          <h2 class="text-2xl"><?= $get_bunch_name[0]['nama_proyek'] ?></h2>
          <span class="bg-amber-100 lg:ml-2 lg:mt-0 text-xs mt-3 text-amber-800 font-medium me-2 px-2.5 py-0.5 rounded-xl h-5 border border-amber-300"><?= $get_bunch_name[0]['bunch_name'] ?> - <?= $get_bunch_name[0]['project_id'] ?></span>
        </div>


        <div class="w-full flex items-center my-2 flex-wrap">
          <a href="./dashadmin.php" type="button" class="text-white bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
            <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
            </svg>
            Kembali
          </a>

          <a href="/PBL/dosen/details-anggota.php?bid=<?= $_GET['bid'] ?>&id=<?= $_GET['id'] ?>" type="button" class="text-white bg-blue-500 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
            <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
            </svg>
            Detail Anggota
          </a>

          <a href="./submit-projects.php?bid=<?= $_GET['bid'] ?>&id=<?= $_GET['id'] ?>" type="button" class="text-white bg-green-500 hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
            <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3m-5.5 0V1.07M5.5 5l4-4 4 4" />
            </svg>
            Pengumpulan Proyek
          </a>
        </div>

        <!-- //! TAB CONTENT -->

        <div class="mb-4 border-b border-gray-200">
          <ul class="flex flex-wrap font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
            <?php for ($i = 1; $i <= $week_num; $i++) : ?>
              <li class="me-2" role="presentation">
                <button class="inline-block text-sm p-3 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#data<?= $i ?>" type="button" role="tab" aria-controls="data<?= $i ?>" aria-selected="false">Minggu Ke-<?= $i ?></button>
              </li>
            <?php endfor ?>
          </ul>
        </div>

        <div id="default-tab-content">
          <?php for ($i = 1; $i <= $week_num; $i++) : ?>
            <?php
            $get_task_todo = execThis("SELECT * FROM task WHERE bunch_id = " . $_GET['bid'] . " AND minggu =" . $i . " HAVING category = 'To Do'");

            $get_task_doing = execThis("SELECT * FROM task WHERE bunch_id = " . $_GET['bid'] . " AND minggu =" . $i . " HAVING category = 'Doing'");

            $get_task_done = execThis("SELECT * FROM task WHERE bunch_id = " . $_GET['bid'] . " AND minggu =" . $i . " HAVING category = 'Done'");

            ?>
            <div class="hidden rounded-lg bg-gray-50 grid gap-4 lg:gap-2 grid-cols-1 md:grid-cols-2 lg:grid-cols-3" id="data<?= $i ?>" role="tabpanel" aria-labelledby="data<?= $i ?>-tab">
              <?php include("./content/progress_list/progress.php") ?>


            </div>
          <?php endfor ?>
        </div>

        <!-- //! TAB CONTENT END -->

      </div>

      <hr class="w-11/12 ml-4 lg:ml-12 my-5 lg:my-9">

      <!-- //! CHAT CONTENT -->

      <?php include('./content/chat.php') ?>
    </div>
  </div>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>