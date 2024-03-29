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

require "../query/query.php";

$get_bunch_name = execThis("SELECT bunch_id, bunch_name, project_id, nama_proyek FROM bunch INNER JOIN proyek ON bunch.project_id = proyek.id_proyek WHERE bunch_id =" . $_GET['bid'] . "");

$get_comments = execThis("SELECT * FROM comment WHERE bunch_id =" . $_GET['bid'] . " ORDER BY date_submit DESC");

$get_week = execThis("SELECT minggu FROM proyek WHERE id_proyek =" . $_GET['id'] . "");

$week_num = (int) $get_week[0]['minggu'];


$tasks_user = execThis("SELECT task.id AS task_id, task_name, task_desc, category, task.member_id AS tmid, bunch_member.member_id AS bmid FROM task INNER JOIN bunch_member ON task.member_id = bunch_member.id WHERE bunch_member.member_id = '" . $_SESSION['email'] . "' AND category != 'Done' AND task.bunch_id =" . $_GET['bid'] . "");

$get_leader = execThis("SELECT * FROM bunch WHERE leader_id ='" . $_SESSION['email'] . "' AND project_id = " . $_GET['id'] . "");

$get_members = execThis("SELECT * FROM bunch_member WHERE member_id ='" . $_SESSION['email'] . "' AND bunch_id = " . $_GET['bid'] . "");

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
  <title>Proyek Kamu | PBL Vokasi</title>
  <?php include("./includes/head.php") ?>
</head>

<body class="bg-white">

  <?php include("./includes/navbar.php") ?>

  <!-- Side Bar -->
  <?php include("./includes/aside.php") ?>
  <div class="p-4 sm:ml-64">
    <!-- important -->
    <div class="rounded-lg mt-14 flex flex-col item-start">
      <div class="mx-auto w-full px-4 lg:px-12">

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
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 lg:text-lg text-sm font-medium text-amber-500 md:ms-2">Proyek Kamu</span>
              </div>
            </li>
          </ol>
        </nav>

        <div class="flex flex-wrap w-full mb-2">
          <h2 class="text-2xl font-medium"><?= $get_bunch_name[0]['nama_proyek'] ?></h2>
          <span class="bg-amber-100 lg:ml-2 lg:mt-0 text-xs mt-3 text-amber-800 font-medium me-2 px-2.5 py-0.5 rounded-xl h-5 border border-amber-300"><?= $get_bunch_name[0]['bunch_name'] ?> - <?= $get_bunch_name[0]['project_id'] ?></span>
        </div>

        <div class="w-full flex items-center my-2 flex-wrap">
          <a href="./dashboard.php" type="button" class="shadow text-red-500 hover:text-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-4 py-2 text-center inline-flex items-center me-2 my-2">
            <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 5H1m0 0 4 4M1 5l4-4" />
            </svg>
            Kembali
          </a>

          <a href="./details-anggota.php?bid=<?= $_GET['bid'] ?>&id=<?= $_GET['id'] ?>" type="button" class="shadow text-blue-500 hover:text-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-4 py-2 text-center inline-flex items-center me-2 my-2">
            <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
            </svg>
            Detail Anggota
          </a>

          <a href="./list-tasks.php?bid=<?= $_GET['bid'] ?>&id=<?= $_GET['id'] ?>" type="button" class="shadow text-amber-500 hover:text-amber-400 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-xs px-4 py-2 text-center inline-flex items-center me-2 my-2">
            <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 5V4c0-.6-.4-1-1-1H9a1 1 0 0 0-.8.3l-4 4a1 1 0 0 0-.2.6V20c0 .6.4 1 1 1h12c.6 0 1-.4 1-1v-5M9 3v4c0 .6-.4 1-1 1H4m11.4.8 2.7 2.7m1.2-3.9a2 2 0 0 1 0 3l-6.6 6.6L9 18l.7-3.7 6.7-6.7a2 2 0 0 1 3 0Z" />
            </svg>
            Daftar Tugas
          </a>

          <?php if (!empty($get_leader)) : ?>
            <a href="./request.php?bid=<?= $_GET['bid'] ?>&id=<?= $_GET['id'] ?>" type="button" class="shadow text-violet-500 hover:text-violet-400 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-xs px-4 py-2 text-center inline-flex items-center me-2 my-2">
              <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 8v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8m18 0-8-4.5a2 2 0 0 0-2 0L3 8m18 0-9 6.5L3 8" />
              </svg>
              Permintaan Bergabung
            </a>

            <a href="./submit-projects.php?bid=<?= $_GET['bid'] ?>&id=<?= $_GET['id'] ?>" type="button" class="shadow text-green-500 hover:text-green-400 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-4 py-2 text-center inline-flex items-center me-2 my-2">
              <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3m-5.5 0V1.07M5.5 5l4-4 4 4" />
              </svg>
              Pengumpulan
            </a>
          <?php endif; ?>


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
            <div class="hidden rounded-lg bg-white grid gap-4 lg:gap-12 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 pb-5 border-b border-gray-200" id="data<?= $i ?>" role="tabpanel" aria-labelledby="data<?= $i ?>-tab">
              <?php include("../content/progress_list/progress.php") ?>


            </div>
          <?php endfor ?>
        </div>

        <!-- //! TAB CONTENT END -->

      </div>

      <?php include('../content/chat-task.php') ?>
    </div>
  </div>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>