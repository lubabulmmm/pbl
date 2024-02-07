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

require "../../query/query.php";
$categories = execThis("SELECT * FROM categories");

if (isset($_POST["submit"])) {
  if (add_roles($_POST) > 0) {
    header("Location: cats-roles-list.php?info=success");
  } else {
    header("Location: cats-roles-list.php?info=failed");
  }
}

if (isset($_POST["cats"])) {
  if (add_category($_POST) > 0) {
    header("Location: cats-roles-list.php?info=success");
  } else {
    header("Location: cats-roles-list.php?info=failed");
  }
}

if (isset($_POST["edit_role"])) {
  if (edit_role($_POST) > 0) {
    header("Location: cats-roles-list.php?info=success");
  } else {
    header("Location: cats-roles-list.php?info=failed");
  }
}

if (isset($_POST["edit_cats"])) {
  if (edit_cats($_POST) > 0) {
    header("Location: cats-roles-list.php?info=success");
  } else {
    header("Location: cats-roles-list.php?info=failed");
  }
}
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
              <a href="../superadmin.php" class="inline-flex items-center lg:text-lg text-xs md:text-md font-medium text-gray-700 hover:text-blue-800">
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
                <span class="ms-1 lg:text-lg text-xs md:text-md font-medium text-blue-800 md:ms-2">Kategori dan Roles</span>
              </div>
            </li>
          </ol>
        </nav>

        <section class="flex items-center bg-gray-50">
          <div class="w-full max-w-screen-xl px-4 mx-auto lg:px-12">
            <!-- Start coding here -->
            <div class="relative overflow-hidden bg-white shadow-lg border shadow-gray-100 sm:rounded-lg">
              <div class="flex-row items-center justify-between py-4 px-5 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                <div>
                  <h5 class="mr-3 font-semibold text-xl">List Kategori dan Roles</h5>
                </div>
                <button data-modal-target="popup-modal-cats" data-modal-toggle="popup-modal-cats" type="button" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 -ml-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                  </svg>
                  Tambah Kategori
                </button>
                <?php include("../content/add-category.php") ?>
              </div>
            </div>
          </div>
        </section>

        <?php foreach ($categories as $category) : ?>
          <section class="flex items-center bg-gray-50 mt-3 mb-5">
            <div class="w-full max-w-screen-xl px-4 mx-auto lg:px-12">
              <!-- Start coding here -->
              <div class="relative overflow-hidden bg-white shadow-lg border shadow-gray-100 sm:rounded-lg pb-3">
                <div class="flex-row items-center justify-between py-4 px-5 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                  <div>
                    <h5 class="mr-3 font-semibold text-xl"><?= $category['category_name'] ?></h5>
                  </div>
                  <div class="flex">
                    <button type="button" data-modal-target="popup-modal-edits-<?= $category['c_id'] ?>" data-modal-toggle="popup-modal-edits-<?= $category['c_id'] ?>" class="flex items-center justify-center mr-1.5 py-2.5 px-2.5 text-xs font-medium text-white rounded-lg bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300">
                      Edit
                    </button>
                    <button type="button" data-modal-target="popup-modal-roles-<?= $category['c_id'] ?>" data-modal-toggle="popup-modal-roles-<?= $category['c_id'] ?>" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:ring-amber-300">
                      <svg class="h-3.5 w-3.5 mr-2 -ml-1 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                      </svg>
                      Tambah Role
                    </button>
                  </div>
                  <?php include("../content/add-roles.php") ?>
                  <?php include("../content/edit-cats.php") ?>
                </div>
                <div class="px-7">
                  <?php $roles = execThis("SELECT * FROM role WHERE category =" . $category['c_id']) ?>
                  <ul class="w-full divide-gray-200 divide-y">
                    <?php foreach ($roles as $role) : ?>
                      <li class="text-md py-4 flex flex-wrap justify-between mx-1 focus:ring-green-200"><span><?= $role['role_name'] ?></span>
                        <div><button data-modal-target="popup-edit-roles-<?= $role['role_id'] ?>" data-modal-toggle="popup-edit-roles-<?= $role['role_id'] ?>" class="bg-green-500 hover:bg-green-400 text-white text-xs px-2 py-1 rounded-lg">Edit</button><button data-modal-target="popup-modal-delete-<?= $role['role_id'] ?>" data-modal-toggle="popup-modal-delete-<?= $role['role_id'] ?>" class="bg-red-500 mx-1 focus:ring-red-200 hover:bg-red-400 text-white text-xs px-2 py-1 rounded-lg">Hapus</button></div>
                      </li>
                      <?php include("../content/edit-roles.php") ?>
                      <?php include("../content/delete-role.php") ?>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
          </section>
        <?php endforeach; ?>

      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>