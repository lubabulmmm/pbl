<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
}

if (isset($_SESSION["level"])) {
  if ($_SESSION["level"] == "user") {
    header("Location: /PBL/user/dashboard.php");
    exit;
  } elseif ($_SESSION["level"] == "admin") {
    header("Location: /PBL/dosen/dashadmin.php");
    exit;
  }
}

require '../query/query.php';

$get_userinfo = execThis("SELECT * FROM user WHERE id =" . $_GET['uid']);

if (isset($_POST["edit-pass"])) {
  if (pass_user($_POST, $get_userinfo[0]['email']) > 0) {
    header("Location: /pbl/superadmin/users.php");
  } else {
    header("Location: /pbl/superadmin/pass-user.php?info=failed&uid=" . $_GET['uid']);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User | PBL Vokasi</title>
  <?php include("../user/includes/head.php") ?>
</head>

<body class="">
  <!-- SIDEBAR -->
  <?php include("./includes/aside.php") ?>

  <div class=" sm:ml-64">
    <!-- important -->
    <div class="rounded-lg flex flex-col item-start">

      <?php include("./includes/navbar.php") ?>

      <section class="p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
          <nav class="flex my-7" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
              <li class="inline-flex items-center">
                <a href="./superadmin.php" class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-blue-800">
                  <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                  </svg>
                  Daftar Proyek
                </a>
              </li>

              <li aria-current="page">
                <div class="flex items-center">
                  <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                  </svg>
                  <span class="ms-1 text-lg font-medium text-blue-800 md:ms-2">Edit Password <?= $get_userinfo[0]['nama_user'] ?></span>
                </div>
              </li>
            </ol>
          </nav>


          <section class="">
            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-13">
              <h2 class="mb-4 text-xl font-bold text-gray-900">Edit Password</h2>
              <form action="" method="post">
                <div class="flex flex-col">
                  <div class="mb-6">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-amber-600 self-start">Kata sandi:</label>
                    <input type="password" name="password" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5" placeholder="Masukkan Kata Sandi">
                  </div>
                  <div class="mb-6">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-amber-600">Konfirmasi kata sandi:</label>
                    <input type="password" name="confirm-password" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5" placeholder="Masukkan Konfirmasi Kata Sandi">
                  </div>
                  <div class="flex justify-evenly">
                    <button type="submit" name="edit-pass" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                      Ganti Password
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </section>
        </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>