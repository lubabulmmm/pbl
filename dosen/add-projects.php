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

require '../query/query.php';

if (isset($_POST["submit"])) {
  if (add_this_project($_POST) > 0) {
    header("Location: add-projects.php?info=success");
  } else {
    header("Location: add-projects.php?info=failed");
  }
}

$rand_pict = rand(1, 8);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tambah Proyek | PBL Vokasi</title>
  <?php include("./includes/head.php") ?>
</head>

<body class=" ">
  <!-- Navigation Bar -->
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
              <a href="./dashadmin.php" class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-blue-500">
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
                <span class="ms-1 text-lg font-medium text-blue-500 md:ms-2">Tambah Proyek</span>
              </div>
            </li>
          </ol>
        </nav>


        <section class="">
          <div class="py-8 px-4 mx-auto max-w-2xl lg:py-13">
            <h2 class="mb-4 text-xl font-bold text-gray-900">Tambah Proyek</h2>
            <form action="" method="post">
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Proyek</label>
                  <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Tambah Nama Proyek.." required="">
                </div>
                <div class="hidden">
                  <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Pilih Dosen</label>
                  <select id="category" name="dosen" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                    <option value="<?php echo $_SESSION["email"] ?>" selected><?= $_SESSION['email'] ?></option>
                  </select>
                </div>
                <div>

                  <label for="week" class="block mb-2 text-sm font-medium text-gray-900">Minggu</label>
                  <input type="number" name="week" id="number-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan Angka" required>
                </div>
                <div class="sm:col-span-2">
                  <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                  <textarea id="description" name="description" rows="8" class="block p-4 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Masukkan Deskripsi"></textarea>
                </div>
                <input type="hidden" value="<?= $rand_pict ?>" name="pict">
                <div class="sm:col-span-2">

                  <label for="features" class="block mb-2 text-sm font-medium text-gray-900">Fitur Wajib</label>
                  <textarea id="features" name="features" rows="8" class="block p-4 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Masukkan Fitur Wajib"></textarea>
                </div>
              </div>
              <button type="submit" name="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-800 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-400">
                Tambah
              </button>
              <button type="cancle" name="cancle" class="inline-flex items-center px-7 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-amber-500 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-amber-400">
                Batal
              </button>
              <a href="dashadmin.php" type="button" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-red-500 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-red-400">
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