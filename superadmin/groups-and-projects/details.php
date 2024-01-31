<?php

session_start();
if (!isset($_SESSION["login"])) {
  header("Location: /PBl/user/login.php");
}

if (isset($_SESSION["level"])) {
  if ($_SESSION["level"] == "user") {
    header("Location: /PBL/user/dashboard.php");
    exit;
  } elseif ($_SESSION["level"] == "admin") {
    header("Location: dosen/dashadmin.php");
    exit;
  }
}

require '../../query/query.php';

$details_bunch = execThis("SELECT bunch_id, id_proyek, bunch_name, leader.nama_user AS leader_name, nama_proyek, observer.nama_user AS observer_name, deskripsi_proyek FROM bunch INNER JOIN proyek ON bunch.project_id = proyek.id_proyek INNER JOIN user AS leader ON bunch.leader_id = leader.email INNER JOIN user AS observer ON proyek.id_user = observer.email WHERE bunch_id = " . $_GET['bid'] . "");

$bunch_members = execThis("SELECT nama_user FROM bunch_member INNER JOIN user ON bunch_member.member_id = user.email WHERE bunch_id = " . $_GET['bid'] . "");

// ! TO DO
$todo_fetch = mysqli_query($conn, "SELECT * FROM task WHERE category = 'To Do' AND bunch_id = " . $_GET['bid'] . "");
$todo_sum = mysqli_num_rows($todo_fetch);

// ? DOING
$doing_fetch = mysqli_query($conn, "SELECT * FROM task WHERE category = 'Doing' AND bunch_id = " . $_GET['bid'] . "");
$doing_sum = mysqli_num_rows($doing_fetch);

// * DONE
$done_fetch = mysqli_query($conn, "SELECT * FROM task WHERE category = 'Done' AND bunch_id = " . $_GET['bid'] . "");
$done_sum = mysqli_num_rows($done_fetch);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Kelompok | PBL Vokasi</title>
  <?php include("../../user/includes/head.php") ?>
</head>

<body class="bg-gray-50">

  <!-- SIDEBAR -->
  <?php include("../includes/aside.php") ?>

  <div class=" sm:ml-64">
    <!-- important -->
    <div class="rounded-lg flex flex-col item-start">

      <?php include("../includes/navbar.php") ?>

      <div class="mx-auto w-full px-4 lg:px-12">
        <!-- BreadCrumbs -->

        <nav class="flex my-7 flex-wrap lg:mx-1 mx-4" aria-label="Breadcrumb">
          <ol class="flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <a href="./projects-list.php" class="inline-flex items-center lg:text-lg text-xs md:text-md font-medium text-gray-700 hover:text-blue-800">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                </svg>
                Daftar Proyek
              </a>
            </li>
            <li class="inline-flex items-center">
              <div class="flex items-center">
                <svg class="ms-1 rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <a href="./details-projects.php?id=<?= $details_bunch[0]['id_proyek'] ?>" class="inline-flex items-center lg:text-lg text-xs md:text-md font-medium text-gray-700 hover:text-blue-800">
                  <span class="ms-1 lg:text-lg text-xs md:text-md font-medium text-gray-900 hover:text-blue-800 md:ms-2">Detail Proyek</span>
                </a>
              </div>
            </li>
            <li class="inline-flex items-center">
              <div class="flex items-center">
                <svg class="ms-1 rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <a href="./list-submitted.php?id=<?= $details_bunch[0]['id_proyek'] ?>" class="inline-flex items-center lg:text-lg text-xs md:text-md font-medium text-gray-700 hover:text-blue-800">
                  <span class="ms-1 lg:text-lg text-xs md:text-md font-medium text-gray-900 hover:text-blue-800 md:ms-2">Daftar Kelompok</span>
                </a>
              </div>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 lg:text-lg text-xs md:text-md font-medium text-blue-800 md:ms-2">Detail Kelompok</span>
              </div>
            </li>
          </ol>
        </nav>

        <div>
          <div class="flex flex-wrap w-full justify-between">
            <div class="px-4 sm:px-0 flex justify-center items-center">
              <h3 class="text-2xl font-semibold leading-7 text-gray-900">Detail Kelompok</h3>
            </div>

            <div class="flex items-center flex-wrap">
              <a href="./list-submitted.php?id=<?= $details_bunch[0]['id_proyek'] ?>" type="button" class="text-white bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                </svg>
                Kembali
              </a>                            
            <a href="./submitted.php?id=<?= $details_bunch[0]['id_proyek'] ?>&bid=<?= $details_bunch[0]['bunch_id'] ?>" class="flex items-center flex-wrap">
              <button type="button" class="text-white bg-green-500 hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7.708 2.292.706-.706A2 2 0 0 1 9.828 1h6.239A.97.97 0 0 1 17 2v12a.97.97 0 0 1-.933 1H15M6 5v4a1 1 0 0 1-1 1H1m11-4v12a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V9.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 5h5.239A.97.97 0 0 1 12 6Z" />
                </svg>

                Data Pengumpulan
              </button>
            </a>
          </div>
          </div>

          <?php foreach ($details_bunch as $detail) : ?>
            <div class="mt-6 border-t border-gray-100">
              <dl class="divide-y divide-gray-100">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                  <dt class="text-md font-medium leading-6 text-gray-900">Judul</dt>
                  <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= $detail['nama_proyek'] ?></dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                  <dt class="text-md font-medium leading-6 text-gray-900">Dosen PIC</dt>
                  <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= $detail['observer_name'] ?></dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                  <dt class="text-md font-medium leading-6 text-gray-900">Deskripsi</dt>
                  <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= $detail['deskripsi_proyek'] ?></dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                  <dt class="text-md font-medium leading-6 text-gray-900">Status Pengumpulan</dt>
                  <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><span class="text-green-600">Telah Mengumpulkan</span></dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                  <dt class="text-md font-medium leading-6 text-gray-900">Ketua Kelompok (PM)</dt>
                  <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= $detail['leader_name'] ?></dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                  <dt class="text-md font-medium leading-6 text-gray-900">Nilai</dt>
                  <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0"> <span class="font-semibold text-amber-500">80</span> /100</dd>
                </div>
                <!-- // ! Anggota Kelompok -->
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                  <dt class="text-md font-medium leading-6 text-gray-900">Anggota</dt>
                  <dd class="mt-2 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                    <ul class="max-w-xl leading-loose text-md text-gray-500 list-disc list-inside">
                      <?php foreach ($bunch_members as $bm) : ?>
                        <li class="mt-2 ">
                          <?= $bm['nama_user'] ?>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  </dd>
                </div>
                <!-- // ! Total Progress -->
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                  <dt class="text-md font-medium leading-6 text-gray-900">Progress</dt>
                  <dd class="mt-2 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                    <ul class="max-w-xl leading-loose text-md text-gray-500 list-disc list-inside">
                      <li class="mt-2 text-red-500">
                        To Do: <?= $todo_sum ?> Progress
                      </li>
                      <li class="mt-2 text-amber-500">
                        Doing: <?= $doing_sum ?> Progress
                      </li>
                      <li class="mt-2 text-green-500">
                        Done: <?= $done_sum ?> Progress
                      </li>
                    </ul>
                  </dd>
                </div>
                <!-- // ! FILE DILAMPIRKAN -->
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                  <dt class="text-md font-medium leading-6 text-gray-900">Lampiran File</dt>
                  <dd class="mt-2 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                    <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                      <!-- // ! LIST FILE DISINI -->

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
          <?php endforeach ?>
        </div>


      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>