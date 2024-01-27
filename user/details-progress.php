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

$get_taskinfo = execThis("SELECT task.id AS task_id, task_name, task_desc, task.bunch_id AS bid, category, user.nama_user, project_id FROM task INNER JOIN bunch_member ON task.member_id = bunch_member.id INNER JOIN user ON bunch_member.member_id = user.email INNER JOIN bunch ON bunch_member.bunch_id = bunch.bunch_id WHERE task.id =" . $_GET['tid'] . "");


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
  <title>Detail Progress | PBL Vokasi</title>
  <?php include("./includes/head.php") ?>
</head>

<body class="bg-gray-50">

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
            <li class="inline-flex items-center">
              <div class="flex items-center">
                <svg class="ms-1 rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <a href="./projects.php?bid=<?= $get_taskinfo[0]['bid'] ?>&id=<?= $get_taskinfo[0]['project_id'] ?>" class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-amber-500">
                  <span class="ms-1 text-lg font-medium text-gray-900 hover:text-amber-500 md:ms-2">Proyek Kamu</span>
                </a>
              </div>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-lg font-medium text-amber-500 md:ms-2">Detail Tugas</span>
              </div>
            </li>
          </ol>
        </nav>

        <?php if (!empty($_GET['info'])) : ?>
          <!-- Berhasil Menambahkan -->
          <?php if ($_GET['info'] == "success") : ?>
            <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
              <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
              </svg>
              <span class="sr-only">Info</span>
              <div class="ms-3 text-sm font-medium">
                Data berhasil diubah!
              </div>
              <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
              </button>
            </div>
          <?php endif; ?>

          <!-- Gagal Menambahkan -->
          <?php if ($_GET['info'] == "failed") : ?>
            <div id="alert-3" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50" role="alert">
              <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
              </svg>
              <span class="sr-only">Info</span>
              <div class="ms-3 text-sm font-medium">
                Data gagal diubah!
              </div>
              <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
              </button>
            </div>
          <?php endif; ?>

        <?php endif; ?>

        <div>
          <div class="flex flex-wrap w-full justify-between">
            <div class="px-4 sm:px-0 flex justify-center items-center">
              <h3 class="text-2xl font-semibold leading-7 text-gray-900">Detail Tugas</h3>
            </div>


            <div class="flex items-center flex-wrap">

              <a href="./edit-progress.php?tid=<?= $_GET['tid'] ?>&id=<?= $_GET['id'] ?>" type="button" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                  <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                  <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                </svg>
                Edit Tugas
              </a>

              <button type="button" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3m-5.5 0V1.07M5.5 5l4-4 4 4" />
                </svg>
                Unggah File
              </button>


              <?php if ($get_taskinfo[0]['category'] == 'To Do') : ?>
                <a href="./update-progress.php?tid=<?= $get_taskinfo[0]['task_id'] ?>&id=<?= $get_taskinfo[0]['project_id'] ?>&category=Doing" class="text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
                  <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M10 6v4l3.276 3.276M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                  Tandai sebagai Doing
                </a>
              <?php endif; ?>

              <?php if ($get_taskinfo[0]['category'] == 'Doing') : ?>
                <a href="./update-progress.php?tid=<?= $get_taskinfo[0]['task_id'] ?>&id=<?= $get_taskinfo[0]['project_id'] ?>&category=Done" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
                  <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M10 6v4l3.276 3.276M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                  Tandai sebagai Done
                </a>
              <?php endif; ?>
            </div>
          </div>
          <div class="mt-6 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
              <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">Nama Tugas</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= $get_taskinfo[0]['task_name'] ?></dd>
              </div>
              <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">Diperuntukkan</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= $get_taskinfo[0]['nama_user'] ?></dd>
              </div>
              <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">Deskripsi Tugas</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= $get_taskinfo[0]['task_desc'] ?></dd>
              </div>
              <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">File Dilampirkan</dt>
                <dd class="mt-2 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                  <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                    <li class="flex items-center justify-between py-4 pl-4 pr-5 text-md leading-6">
                      <div class="flex w-0 flex-1 items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-4 flex min-w-0 flex-1 gap-2">
                          <span class="truncate font-medium">resume_back_end_developer.pdf</span>
                          <span class="flex-shrink-0 text-gray-400">2.4mb</span>
                        </div>
                      </div>
                      <div class="ml-4 flex-shrink-0">
                        <a href="#" class="font-medium text-amber-600 hover:text-amber-500">Download</a>
                      </div>
                    </li>
                    <li class="flex items-center justify-between py-4 pl-4 pr-5 text-md leading-6">
                      <div class="flex w-0 flex-1 items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-4 flex min-w-0 flex-1 gap-2">
                          <span class="truncate font-medium">coverletter_back_end_developer.pdf</span>
                          <span class="flex-shrink-0 text-gray-400">4.5mb</span>
                        </div>
                      </div>
                      <div class="ml-4 flex-shrink-0">
                        <a href="#" class="font-medium text-amber-600 hover:text-amber-500">Download</a>
                      </div>
                    </li>
                  </ul>
                </dd>
              </div>
            </dl>
          </div>
        </div>

      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>