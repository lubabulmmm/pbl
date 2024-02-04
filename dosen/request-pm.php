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

try {
  $list_request = execThis("SELECT r_id, project_id, user_id, bunch_name, nama_user FROM request_project INNER JOIN user ON request_project.user_id = user.email WHERE project_id =" . $_GET['id'] . " AND status_req = 'Belum Diterima'");

  $get_all_pms = execThis("SELECT nama_user, leader_id FROM bunch INNER JOIN user ON bunch.leader_id = user.email WHERE project_id =" . $_GET['id']);
} catch (\Throwable $th) {
  echo $th;
  header("Location: ../content/not-found.php");
  exit;
}

if (empty($_GET['id'])) {
  header("Location: restricted.php");
}

if (check_user_admin($_SESSION['email'], $_GET['id']) == 404) {
  header("Location: restricted.php");
  exit;
}

if (isset($_POST["submit"])) {
  if (accept_request_pm($_POST['r_id']) > 0 && add_accept_bunch($_POST) > 0) {
    header("Location: ./request-pm.php?id=" . $_GET['id'] . "&ainfo=200");
  } else {
    header("Location: ./request-pm.php?id=" . $_GET['id'] . "&ainfo=404");
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Permintaan Kamu | PBL Vokasi</title>
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
        <nav class="flex mt-7 mb-5" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <a href="./dashadmin.php" class="inline-flex items-center text-md lg:text-lg font-medium text-gray-900 hover:text-blue-500">
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
                <span class="ms-1 text-md lg:text-lg font-medium text-blue-500 md:ms-2">Permintaan</span>
              </div>
            </li>
          </ol>
        </nav>

        <div class="flex w-full flex-wrap justify-between items-center">
          <h2 class="lg:text-2xl text-xl mb-3 font-semibold">Pemintaan Ketua Kelompok</h2>

          <div class="flex items-center flex-wrap">
            <a href="./dashadmin.php" type="button" class="text-white bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
              <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
              </svg>
              Kembali
            </a>

          </div>
        </div>

        <div class="pt-4 border-t border-gray-200">
          <dl class="divide-y divide-gray-100">
            <div class="px-1 sm:grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-md font-medium leading-6 text-gray-900 flex flex-col col-span-2 lg:col-span-1">
                <p class="text-md text-gray-900">Daftar Anggota & Role</p>

                <div class="bg-white border shadow border-gray-200 mt-5 p-5 rounded-lg col-span-2">

                  <ul class="max-w-full">
                    <?php if (empty($get_all_pms)) : ?>
                      <p class="text-center text-gray-500 text-sm font-light">Belum ada kelompok mengambil.</p>
                    <?php endif; ?>
                    <?php foreach ($get_all_pms as $all) : ?>
                      <li class="pb-3 sm:pb-4 mt-2.5 last:border-0 last:pb-0 first:mt-0 border-b border-gray-200">
                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                          <div class="flex-shrink-0">
                            <img class="w-8 h-8 rounded-full" src="../assets/img/ian.jpeg" alt="">
                          </div>
                          <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate ">
                              <?= $all['nama_user'] ?>
                            </p>
                            <p class="text-sm text-gray-500 truncate">
                              <?= $all['leader_id'] ?>
                            </p>
                          </div>
                        </div>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </dt>
              <dd class="mt-1 font-medium leading-6 text-gray-900 sm:col-span-2 sm:mt-0">
                <p class="text-md text-gray-900">Daftar Permintaan Bergabung</p>

                <div class="bg-white border shadow border-gray-200 mt-5 p-5 rounded-lg">

                  <ul class="max-w-full">
                    <?php if (empty($list_request)) : ?>
                      <p class="text-center text-gray-500 text-sm font-light">Belum ada permintaan.</p>
                    <?php endif; ?>
                    <?php foreach ($list_request as $lr) : ?>
                      <li class="pb-3 sm:pb-4 mt-2.5 last:border-0 last:pb-0 first:mt-0 border-b border-gray-200">
                        <form action="" method="post">
                          <div class="flex items-center space-x-4 rtl:space-x-reverse">
                            <div class="flex-shrink-0">
                              <img class="w-8 h-8 rounded-full" src="../assets/img/ian.jpeg" alt="">
                            </div>

                            <div class="flex-1 min-w-0">
                              <p class="text-sm font-medium text-gray-900 truncate ">
                                <?= $lr['nama_user'] ?>
                              </p>
                              <input type="hidden" name="project_id" value="<?= $lr['project_id'] ?>" />
                              <input type="hidden" name="r_id" value="<?= $lr['r_id'] ?>" />
                              <input type="hidden" name="email" value="<?= $lr['user_id'] ?>" />
                              <input type="hidden" name="name" value="<?= $lr['bunch_name'] ?>" />
                              <p class="text-sm text-gray-500 truncate">
                                <?= $lr['user_id'] ?>
                              </p>
                            </div>
                            <div class="inline-flex items-center">
                              <button type="submit" name="submit" class="focus:outline-none text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-xs px-2.5 py-1.5 me-1 mb-1 ">Terima</button>
                              <button type="button" data-modal-target="popup-modal-rp" data-modal-toggle="popup-modal-rp" class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-2.5 py-1.5 me-1 mb-1 ">Tolak</button>
                            </div>
                          </div>
                        </form>
                        <?php include("../content/reject-pm.php") ?>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </dd>
            </div>
          </dl>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>