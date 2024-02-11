<?php

session_start();
if (!isset($_SESSION["login"])) {
  header("Location: /PBL/login.php");
}

if (isset($_SESSION["level"])) {
  if ($_SESSION["level"] == "user") {
    header("Location: /PBL/dashboard.php");
    exit;
  } elseif ($_SESSION["level"] == "superadmin") {
    header("Location: /PBL/superadmin/superadmin.php");
    exit;
  }
}

require "../query/query.php";
$get_submit_links = [];

try {
  $get_x = execThis("SELECT nama_proyek FROM proyek WHERE id_proyek =" . $_GET['id']);
  $get_submit_links = execThis("SELECT * FROM submit_links WHERE bunch_id =" . $_GET['bid']);
} catch (\Throwable $th) {
  echo $th;
  header("Location: ../content/not-found.php");
  exit;
}

if (check_user_admin($_SESSION['email'], $_GET['id']) == 404) {
  header("Location: restricted.php");
  exit;
}

if (isset($_POST["submit"])) {
  if (add_grade($_POST, $_GET['bid']) > 0) {
    header("Location: submit-projects.php?bid=" . $_GET['bid'] . "&id=" . $_GET['id'] . "&info=success");
  } else {
    header("Location: submit-projects.php?bid=" . $_GET['bid'] . "&id=" . $_GET['id'] . "&info=failed");
  }
}

$status_info = execThis("SELECT status_show FROM bunch WHERE bunch_id =" . $_GET['bid']);
$get_files = execThis("SELECT * FROM submit_file WHERE bunch_id =" . $_GET['bid']);
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</head>

<body class="bg-white">

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
              <a href="./dashadmin.php" class="inline-flex items-center lg:text-lg text-md font-medium text-gray-700 hover:text-blue-500">
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
                <a href="./projects.php?bid=<?= $_GET['bid'] ?>&id=<?= $_GET['id'] ?>" class="inline-flex items-center lg:text-lg text-md font-medium text-gray-700 hover:text-blue-500">
                  <span class="ms-1 lg:text-lg text-md font-medium text-gray-900 hover:text-blue-500 md:ms-2">Detail Kelompok</span>
                </a>
              </div>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 lg:text-lg text-md font-medium text-blue-500 md:ms-2">Pengumpulan Proyek</span>
              </div>
            </li>
          </ol>
        </nav>

        <div>

          <?php include("./content/info.php") ?>

          <div class="flex flex-wrap w-full justify-between">
            <div class="px-4 sm:px-0 flex justify-center items-center">
              <h3 class="text-2xl font-semibold leading-loose text-gray-900">Detail Data Pengumpulan</h3>
            </div>

            <div class="flex items-center flex-wrap">
              <a href="./projects.php?id=<?= $_GET['id'] ?>&bid=<?= $_GET['bid'] ?>" type="button" class="text-white bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                </svg>
                Kembali
              </a>
              <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" type="button" class="text-white bg-amber-500 hover:bg-amber-400 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m11.479 1.712 2.367 4.8a.532.532 0 0 0 .4.292l5.294.769a.534.534 0 0 1 .3.91l-3.83 3.735a.534.534 0 0 0-.154.473l.9 5.272a.535.535 0 0 1-.775.563l-4.734-2.49a.536.536 0 0 0-.5 0l-4.73 2.487a.534.534 0 0 1-.775-.563l.9-5.272a.534.534 0 0 0-.154-.473L2.158 8.48a.534.534 0 0 1 .3-.911l5.294-.77a.532.532 0 0 0 .4-.292l2.367-4.8a.534.534 0 0 1 .96.004Z" />
                </svg>
                Nilai
              </button>

              <?php if ($status_info[0]['status_show'] == 'No') : ?>
                <a href="to-showcase.php?bid=<?= $_GET['bid'] ?>&id=<?= $_GET['id'] ?>" class="flex items-center flex-wrap">
                  <button type="button" class="text-white bg-green-500 hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
                    <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11h4m-2 2V9M2 5h14a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm5.443-4H2a1 1 0 0 0-1 1v3h9.943l-2.7-3.6a1 1 0 0 0-.8-.4Z" />
                    </svg>

                    Tambahkan ke Showcase
                  </button>
                </a>
              <?php endif; ?>
            </div>
          </div>

          <?php include("./content/grade-modal.php") ?>

          <?php if ($get_submit_links == []) { ?>
            <p>Belum mengumpulkan</p>
          <?php exit;
          } ?>

          <div class="mt-6 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
              <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">Link Youtube</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><a href="<?= $get_submit_links[0]['yt_url'] ?>" class="text-amber-500 underline"><?= $get_submit_links[0]['yt_url'] ?></a></dd>
              </div>
              <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">URL Website/Aplikasi</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><a href="<?= $get_submit_links[0]['web_url'] ?>" class="text-amber-500 underline"><?= $get_submit_links[0]['web_url'] ?></a></dd>
              </div>
              <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">Laporan dan Poster</dt>
                <dd class="mt-2 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                  <?php if (empty($get_files)) {
                    echo "<p class=\"text-amber-700\">Tidak Ada File Dilampirkan.</p>";
                  } ?>
                  <?php if (!empty($get_files)) : ?>
                    <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                      <?php foreach ($get_files as $file) : ?>
                        <li class="flex items-center justify-between py-4 pl-4 pr-5 text-md leading-6">
                          <div class="flex w-0 flex-1 items-center">
                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd" />
                            </svg>
                            <div class="ml-4 flex min-w-0 flex-1 gap-2">
                              <span class="truncate font-medium"><?= $file['name_file'] ?></span>
                              <span class="flex-shrink-0 text-gray-400"><?= number_format($file['size'] / (1024 * 1024), 2); ?>mb</span>
                            </div>
                          </div>
                          <div class="ml-4 flex-shrink-0">
                            <a href="../query/download-file.php?url=<?= $file['path']; ?>" class="font-medium text-amber-600 hover:text-amber-500">Download</a>
                          </div>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                </dd>
              </div>
            </div>
          </div>

</body>

</html>