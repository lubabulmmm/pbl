<?php
  session_start();
  if (!isset($_SESSION["login"])) {
    header("Location: login.php");
  }

  if (isset($_SESSION["level"])) {
    if ($_SESSION["level"] == "superadmin") {
      header("Location: /PBL/superadmin/superadmin.php");
      exit;
    } elseif ($_SESSION["level"] == "admin"){
      header("Location: /PBL/dosen/dashadmin.php");
      exit;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../assets/img/favicon/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="180x180" href="../../assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <title>Tambah Doing | PBL Vokasi</title>
  <?php include("../includes/head.php") ?>
</head>
<body class="bg-gray-50">
  
  <?php include("../includes/navbar.php") ?>

  <!-- Side Bar -->
  <?php include("../includes/aside.php") ?>
  <div class="p-4 sm:ml-64">
      <!-- important -->
    <div class="rounded-lg mt-14 flex flex-col item-start">
      <div class="mx-auto w-full px-4 lg:px-12">
        <!-- BreadCrumbs -->

        <nav class="flex my-7" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
              <li class="inline-flex items-center">
                <a href="../dashboard.php" class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-amber-500">
                  <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                  </svg>
                  Beranda
                </a>
              </li>
              <li class="inline-flex items-center">
                <div class="flex items-center">
                  <svg class="ms-1 rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
                  <a href="../projects.php" class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-amber-500">
                    <span class="ms-1 text-lg font-medium text-gray-900 hover:text-amber-500 md:ms-2">Proyek Kamu</span>
                  </a>
                </div>
              </li>
              <li aria-current="page">
                <div class="flex items-center">
                  <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
                  <span class="ms-1 text-lg font-medium text-amber-500 md:ms-2">Tambah Progress</span>
                </div>
              </li>
            </ol>
          </nav>
        

          <section class="bg-gray-50">
            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-13">
                <h2 class="mb-4 text-xl font-bold text-gray-900">Tambah Progress Ke Doing</h2>
                <form action="#">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Progress</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Tulis Nama Progress.." required="">
                        </div>
                        <div>
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Pilih</label>
                            <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                <option selected="">Pilih Anggota</option>
                                <option value="TV">daniadhitya@gmail.com</option>
                                <option value="PC">anaknyakeren17@outlook.com</option>
                                <option value="GA">emangboleh88@yahoo.com</option>
                                <option value="PH">tengokkakilahmail@gmail.com</option>
                            </select>
                        </div> 
                        <div>
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Pilih Minggu</label>
                            <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                <option selected="">Pilih Minggu</option>
                                <option value="TV">Minggu Ke-1</option>
                                <option value="PC">Minggu Ke-2</option>
                                <option value="GA">Minggu Ke-3</option>
                                <option value="PH">Minggu Ke-4</option>
                            </select>
                        </div> 
                        <div class="sm:col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Progress</label>
                            <textarea id="description" rows="8" class="block p-4 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Tulis Deskripsi Kamu.."></textarea>
                        </div>
                    </div>
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-amber-500 rounded-lg focus:ring-4 focus:ring-amber-200 hover:bg-amber-400">
                        Tambah ke Doing
                    </button>
                </form>
            </div>
          </section>
      </div>
    </div>
  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>
</html>