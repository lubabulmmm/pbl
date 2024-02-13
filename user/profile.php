<?php
ob_start();

session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
}

if (isset($_SESSION["level"])) {
  if ($_SESSION["level"] == "superadmin") {
    header("Location: /PBL/superadmin/superadmin.php");
    exit;
  }
}

require "../query/query.php";

if (isset($_POST["edit"])) {
  if (edit_user($_POST, $_SESSION['id']) > 0) {
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['nama_user'] = $_POST['name'];
    $_SESSION['id'] = $_POST['nim'];
    header("Location: /pbl/user/login.php?info=success");
  } else {
    header("Location: /pbl/user/login.php?info=failed");
  }
}

if (isset($_POST["edit-pass"])) {
  if (pass_user($_POST, $_SESSION['email']) > 0) {
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['nama_user'] = $_POST['name'];
    $_SESSION['id'] = $_POST['nim'];
    if ($_SESSION['level'] == 'user') {
      header("Location: /pbl/user/dashboard.php?info=success");
    }
    if ($_SESSION['level'] == 'admin') {
      header("Location: /pbl/dosen/dashadmin.php?info=success");
    }
  } else {
    if ($_SESSION['level'] == 'user') {
      header("Location: /pbl/user/dashboard.php?info=failed");
    }
    if ($_SESSION['level'] == 'admin') {
      header("Location: /pbl/dosen/dashadmin.php?info=failed");
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Kamu | PBL Vokasi</title>
  <link rel="shortcut icon" href="/PBL/assets/img/favicon/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="180x180" href="/PBL/assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/PBL/assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/PBL/assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap');

    body {
      font-family: 'Inter', sans-serif;
    }

    html {
      scroll-behavior: smooth;
    }

    .os:hover {
      background-color: #FFAA2A;
    }

    .od:hover {
      background-color: #53659F;
    }

    @media screen and (max-width: 600px) {
      .name {
        display: none;
      }
    }
  </style>
</head>

<body class="">
  <!-- Navigation Bar -->
  <?php if ($_SESSION['level'] == 'user') : ?>
    <?php include("./includes/navbar.php") ?>
  <?php endif; ?>
  <?php if ($_SESSION['level'] == 'admin') : ?>
    <?php include("../dosen/includes/navbar.php") ?>
  <?php endif; ?>


  <!-- Side Bar -->
  <?php if ($_SESSION['level'] == 'user') : ?>
    <?php include("./includes/aside.php") ?>
  <?php endif; ?>
  <?php if ($_SESSION['level'] == 'admin') : ?>
    <?php include("../dosen/includes/aside.php") ?>
  <?php endif; ?>

  <!-- Content Wrap-->
  <div class="p-4 sm:ml-64">
    <!-- important -->
    <div class="rounded-lg mt-14 flex flex-col item-start">
      <!-- Contents -->

      <div class="mx-auto w-full px-4 lg:px-12">

        <nav class="flex mt-7 mb-5" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <a href="./dashboard.php" class=" inline-flex items-center text-lg font-medium text-gray-700 hover:text-blue-500">
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
                <span class="ms-1 text-lg font-medium text-blue-500 md:ms-2">Profil</span>
              </div>
            </li>
          </ol>
        </nav>

        <?php $get_userinfo = execThis("SELECT * FROM user WHERE email ='" . $_SESSION['email'] . "'") ?>
        <div class="pt-4 border-t border-gray-200">
          <dl class="divide-y divide-gray-100">
            <div class="px-1 sm:grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-md font-medium leading-6 text-gray-900 flex flex-col col-span-2 lg:col-span-1">
                <form class="form" id="form" enctype="multipart/form-data" method="post">
                  <div class="space-y-12">
                    <div class=" pb-5">
                      <h2 class="text-xl font-semibold leading-7 text-gray-900">Profil Kamu</h2>

                      <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                          <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Ganti Foto</label>
                          <div class="mt-2 flex items-center gap-x-3 ">
                            <img src="../assets/img/<?= $_SESSION['gambar'] ?>" class="h-28 w-28 rounded-full" alt="">
                            <div class="w-2/12">

                              <input type="file" name="pfp" id="pfp" accept="image/png, image/gif, image/jpeg" class="text-sm file:bg-white file:border-blue-700 file:text-blue-700 file:text-sm file:border file:py-1 file:px-3 file:rounded-full">
                            </div>

                          </div>

                        </div>
                      </div>
                    </div>
                </form>
              </dt>
              <dd class="mt-1 font-medium leading-6 text-gray-900 sm:col-span-2 sm:mt-0">
              </dd>

            </div>
            <form action="" method="post">
              <div class="px-1 py-6 sm:grid grid-cols-1 lg:grid-cols-3 sm:gap-4 sm:px-0 flex md:items-center md:flex-row flex-col items-start">
                <dt class="text-md font-medium leading-6 text-gray-900">Username</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                  <input type="text" name="name" id="small-input" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5" placeholder="nama" value="<?= $_SESSION['nama_user'] ?>">
                </dd>
              </div>

              <div class="px-1 py-6 sm:grid grid-cols-1 lg:grid-cols-3 sm:gap-4 sm:px-0 flex md:items-center md:flex-row flex-col items-start">
                <dt class="text-md font-medium leading-6 text-gray-900">NIM</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                  <input type="text" name="nim" id="small-input" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5" placeholder="nim" value="<?= $_SESSION['id'] ?>">
                </dd>
              </div>
              <div class="px-1 py-6 sm:grid grid-cols-1 lg:grid-cols-3 sm:gap-4 sm:px-0 flex md:items-center md:flex-row flex-col items-start">
                <dt class="text-md font-medium leading-6 text-gray-900">Email</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                  <input type="text" name="email" id="small-input" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5" placeholder="email" value="<?= $_SESSION['email'] ?>">
                </dd>
              </div>
              <div class="px-1 py-6 sm:grid grid-cols-1 lg:grid-cols-3 sm:gap-4 sm:px-0 flex md:items-center md:flex-row flex-col items-start">
                <dt class="text-md font-medium leading-6 text-gray-900"></dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0 flex items-end">
                  <button type="submit" name="edit" class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    <svg class="w-5 h-5 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2" d="M7 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h1m4-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm7.4 1.6a2 2 0 0 1 0 2.7l-6 6-3.4.7.7-3.4 6-6a2 2 0 0 1 2.7 0Z" />
                    </svg>
                    Edit Profil
                  </button>
                  <button type="button" data-modal-target="edit-pass" data-modal-toggle="edit-pass" class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-amber-500 rounded-lg hover:bg-amber-600 focus:ring-4 ml-2 focus:outline-none focus:ring-amber-300">
                    <svg class="w-5 h-5 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10.8 17.8-6.4 2.1 2.1-6.4m4.3 4.3L19 9a3 3 0 0 0-4-4l-8.4 8.6m4.3 4.3-4.3-4.3m2.1 2.1L15 9.1m-2.1-2 4.2 4.2" />
                    </svg>
                    Ubah Password
                  </button>
                  <?php include("../content/edit-pass.php") ?>
                </dd>
              </div>
            </form>
          </dl>
        </div>



      </div>

    </div>
  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
  <script type="text/javascript">
    document.getElementById("pfp").onchange = function() {
      document.getElementById("form").submit();
    }
  </script>
  <?php

  if (isset($_FILES['pfp']['name'])) {
    $imageName = $_FILES['pfp']['name'];
    $imageSize = $_FILES['pfp']['size'];
    $tmpName = $_FILES['pfp']['tmp_name'];

    $validImageExt = ['jpg', 'jpeg', 'png'];
    $imageExt = explode('.', $imageName);
    $imageExt = strtolower(end($imageExt));
    if (!in_array($imageExt, $validImageExt)) {
      echo
      "<script>
        alert('Masukkan file .jpg, .jpeg atau .png');
        document.location.href = '../user/profile.php';
      </script>";
    } else if ($imageSize > 1200000) {
      echo
      "<script>
        alert('File terlalu besar');
        document.location.href = '../user/profile.php';
      </script>";
    } else {
      $newImageName = $get_userinfo[0]['id'] . "-" . date("Y-m-d") . "-" . date("h.i.sa");
      $newImageName .= "." . $imageExt;
      $upPfp = "UPDATE user SET gambar = '$newImageName' WHERE email = '" . $_SESSION['email'] . "'";
      mysqli_query($conn, $upPfp);
      move_uploaded_file($tmpName, '../assets/img/' . $newImageName);
      $_SESSION["gambar"] = $newImageName;
      header("Location: ./dashboard.php");
    }
  }

  ?>


</body>

</html>