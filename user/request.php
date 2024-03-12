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

if (isset($_POST["submit"])) {
  if (accept_request($_POST['request_id']) > 0 && add_accept_member($_POST) > 0) {
    header("Location: ./request.php?bid=" . $_GET['bid'] . "&id=" . $_GET['id'] . "&ainfo=200");
  } else {
    header("Location: ./request.php?bid=" . $_GET['bid'] . "&id=" . $_GET['id'] . "&ainfo=404");
  }
}

$list_request = execThis("SELECT request_id, bunch_id, user_id, role, status_req, nama_user FROM request INNER JOIN user ON request.user_id = user.email WHERE request.bunch_id =" . $_GET['bid'] . " AND status_req = 'Belum Diterima'");

$get_all_members = execThis("SELECT member_id, bunch_member.id AS id_member, role, nama_user FROM bunch_member INNER JOIN user ON bunch_member.member_id = user.email WHERE bunch_id =" . $_GET['bid'] . "");

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
  <title>Permintaan | PBL Vokasi</title>
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
              <a href="./dashboard.php" class="inline-flex lg:text-lg text-sm items-center text-lg font-medium text-gray-700 hover:text-amber-500">
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
                <a href="./projects.php?bid=<?= $_GET['bid'] ?>&id=<?= $_GET['id'] ?>" class="inline-flex items-center lg:text-lg text-sm md:text-md font-medium text-gray-700 hover:text-amber-800">
                  <span class="ms-1 lg:text-lg md:text-md font-medium text-gray-900 hover:text-amber-500 md:ms-2">Proyek Kamu</span>
                </a>
              </div>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 lg:text-lg text-sm font-medium text-amber-500 md:ms-2">Permintaan Bergabung</span>
              </div>
            </li>
          </ol>
        </nav>

        <div class="flex w-full flex-wrap justify-between items-center">
          <h2 class="lg:text-2xl text-xl mb-3 font-semibold">Pemintaan Bergabung Ke Kelompok</h2>

          <div class="flex items-center flex-wrap">
            <a href="./projects.php?bid=<?= $_GET['bid'] ?>&id=<?= $_GET['id'] ?>" type="button" class="text-white bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
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
                    <?php if (empty($get_all_members)) : ?>
                      <p class="text-center text-gray-500 text-sm font-light">Belum memiliki anggota.</p>
                    <?php endif; ?>
                    <?php foreach ($get_all_members as $all) : ?>
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
                              <?= $all['role'] ?>
                            </p>
                          </div>
                          <div class="inline-flex items-center text-xs font-semibold text-gray-900 ">
                            <button type="button" data-modal-target="kick-modal-reject-<?= $all['member_id'] ?>" data-modal-toggle="kick-modal-reject-<?= $all['member_id'] ?>" class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-md text-xs px-2.5 py-1.5 me-1 mb-1 ">Tendang</button>
                          </div>
                        </div>
                      </li>
                      <?php include("../content/kick-member.php") ?>
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
                                <?= $lr['nama_user'] ?> - <?= $lr['role'] ?>
                              </p>
                              <input type="hidden" name="request_id" value="<?= $lr['request_id'] ?>" />
                              <input type="hidden" name="bunch_id" value="<?= $lr['bunch_id'] ?>" />
                              <input type="hidden" name="email" value="<?= $lr['user_id'] ?>" />
                              <input type="hidden" name="role" value="<?= $lr['role'] ?>" />
                              <p class="text-sm text-gray-500 truncate">
                                <?= $lr['user_id'] ?>
                              </p>
                            </div>
                            <div class="inline-flex items-center">
                              <button type="submit" name="submit" class="focus:outline-none text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-xs px-2.5 py-1.5 me-1 mb-1 ">Terima</button>
                              <button type="button" data-modal-target="popup-modal-reject-<?= $lr['request_id'] ?>" data-modal-toggle="popup-modal-reject-<?= $lr['request_id'] ?>" class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-2.5 py-1.5 me-1 mb-1 ">Tolak</button>
                            </div>
                          </div>
                        </form>
                        <?php include("../content/reject-req.php") ?>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </dd>
            </div>
          </dl>
        </div>



</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

</html>