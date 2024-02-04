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
    header("Location: /PBL/dosen/dashadmin.php");
    exit;
  }
}

require '../../query/query.php';

if (isset($_POST["submit"])) {

  if (edit_project($_POST, $_GET['id']) > 0) {
    header("Location: projects-list.php");
  } else {
    header("Location: edit-projects.php");
  }
}

$project = execThis("SELECT id_proyek, nama_proyek, category, deskripsi_proyek, id_user, req, nama_user, minggu FROM proyek INNER JOIN user ON proyek.id_user = user.email WHERE id_proyek =" . $_GET['id']);

$dos = execThis("SELECT * FROM user WHERE level = 'admin'");
$cats = execThis("SELECT * FROM categories");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Edit Proyek | PBL Vokasi</title>
  <?php include("../../user/includes/head.php") ?>
</head>

<body class="bg-gray-50">

  <!-- Side Bar -->
  <?php include("../includes/aside.php") ?>
  <div class="sm:ml-64">
    <!-- important -->
    <div class="rounded-lg flex flex-col item-start">
      <?php include("../includes/navbar.php") ?>

      <div class="mx-auto w-full px-4 lg:px-12">
        <!-- BreadCrumbs -->

        <nav class="flex my-7" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <a href="./projects-list.php" class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-blue-800">
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
                <span class="ms-1 text-lg font-medium text-blue-800 md:ms-2">Edit Proyek</span>
              </div>
            </li>
          </ol>
        </nav>

        <section class="bg-gray-50">
          <div class="py-8 px-4 mx-auto max-w-2xl lg:py-13">
            <h2 class="mb-4 text-xl font-bold text-gray-900">Edit Proyek</h2>
            <form action="" method="post">
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Judul</label>
                  <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Edit Judul" value="<?= $project[0]['nama_proyek'] ?>" required="">
                </div>
                <div>
                  <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Dosen PIC</label>
                  <select id="category" name="dosen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                    <option value="<?= $project[0]['id_user'] ?>" selected><?= $project[0]['nama_user'] ?></option>
                    <?php foreach ($dos as $do) : ?>
                      <option value="<?php echo $do["email"] ?>"><?= $do["nama_user"]; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div>
                  <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Pilih Kategori</label>
                  <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                    <option value="<?= $project[0]['category'] ?>" selected>Pilih Kategori</option>
                    <?php foreach ($cats as $cat) : ?>
                      <option value="<?php echo $cat["c_id"] ?>"><?= $cat["category_name"]; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div>
                  <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900">Minggu</label>
                  <input type="number" name="week" id="number-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Edit Angka" value="<?= $project[0]['minggu'] ?>" required>
                </div>
                <div class="sm:col-span-2">
                  <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                  <textarea id="description" name="desc" rows="8" class="block p-4 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Edit Deskripsi"><?= $project[0]['deskripsi_proyek'] ?></textarea>
                </div>
                <div class="sm:col-span-2">
                  <label for="features" class="block mb-2 text-sm font-medium text-gray-900">Fitur Utama</label>
                  <textarea id="req" name="req" rows="8" class="block p-4 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Edit Fitur Wajib"><?= $project[0]['req'] ?></textarea>
                </div>
              </div>
              <button type="submit" name="submit" class="inline-flex items-center px-6 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-800 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-400">
                Simpan
              </button>
              <button type="cancle" name="cancle" class="inline-flex items-center px-7 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-amber-500 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-amber-400">
                Batal
              </button>
              <a href="./projects-list.php" type="button" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-red-500 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-red-400">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                Kembali
              </a>
            </form>
          </div>
        </section>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>