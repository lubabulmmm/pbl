<?php 

  session_start();
  if (!isset($_SESSION["login"])) {
    header("Location: /PBL/login.php");
  }

  if (isset($_SESSION["level"])) {
    if ($_SESSION["level"] == "user") {
      header("Location: dashboard.php");
      exit;
    } elseif ($_SESSION["level"] == "admin"){
      header("Location: dosen/dashadmin.php");
      exit;
    }
  }

  require '../query.php';

  if(isset($_POST["submit"])){
    
    if( add_admin($_POST) > 0 ){
      header("Location: add-admin.php?info=success");
    } else {
      header("Location: add-admin.php?info=failed");
    }

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tambah Admin | PBL Vokasi</title>
  <?php include("../includes/head.php") ?>
</head>
<body class="bg-gray-50">

  <!-- Side Bar -->
  <?php include("./includes/aside.php") ?>
  <div class="sm:ml-64">
      <!-- important -->
    <div class="rounded-lg flex flex-col item-start">
      <?php include("./includes/navbar.php") ?>

      <div class="mx-auto w-full px-4 lg:px-12">
        <!-- BreadCrumbs -->

        <nav class="flex my-7" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
              <li class="inline-flex items-center">
                <a href="./users.php" class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-blue-800">
                  <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                  </svg>
                  Admin (Dosen)
                </a>
              </li>
              <li aria-current="page">
                <div class="flex items-center">
                  <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
                  <span class="ms-1 text-lg font-medium text-blue-800 md:ms-2">Tambah Admin (Dosen)</span>
                </div>
              </li>
            </ol>
          </nav>
        
          
          <?php if(!empty($_GET['info'])): ?>
            <!-- Berhasil Menambahkan -->
            <?php if($_GET['info'] == "success"): ?>
              <div class="p-4 mb-4 text-sm text-green-600 rounded-lg bg-green-50 border border-green-600" role="alert">
                <span class="font-bolf">Data Berhasil Ditambahkan</span>
              </div>
            <?php endif; ?>

            <!-- Gagal Menambahkan -->
            <?php if($_GET['info'] == "failed"): ?>
              <div class="p-4 mb-4 text-sm text-red-600 rounded-lg bg-red-50 border border-red-600" role="alert">
                <span class="font-bolf">Data Berhasil Ditambahkan</span>
              </div>
            <?php endif; ?>

          <?php endif; ?>

          <section class="bg-gray-50">
            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-13">
                <h2 class="mb-4 text-xl font-bold text-gray-900">Tambah Admin (Dosen)</h2>
                <form action="" method="post">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="nama_dosen" class="block mb-2 text-sm font-medium text-gray-900">Nama Admin (Dosen)</label>
                            <input type="text" name="nama_dosen" id="nama_dosen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Tambah Nama Admin.." required="">
                        </div>
                        <div>
                            <label for="nip" class="block mb-2 text-sm font-medium text-gray-900">NIP</label>
                            <input type="text" name="nip" id="nip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Masukkan NIP" required="">
                        </div> 
                        <div class="sm:col-span-2">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">E-mail</label>
                            <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Masukkan E-Mail" required="">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Masukkan E-Mail" required="">
                        </div>
                    </div>
                    <button type="submit" name="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-800 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-400">
                        Tambah
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