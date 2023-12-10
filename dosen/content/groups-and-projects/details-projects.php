<?php 

  session_start();
  if (!isset($_SESSION["login"])) {
    header("Location: /PBL/login.php");
  }

  if (isset($_SESSION["level"])) {
    if ($_SESSION["level"] == "user") {
      header("Location: dashboard.php");
      exit;
    } elseif ($_SESSION["level"] == "superadmin"){
      header("Location: superadmin/superadmin.php");
      exit;
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Proyek | PBL Vokasi</title>
  <?php include("../../includes/head.php") ?>
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

            <nav class="flex my-7" aria-label="Breadcrumb">
              <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                  <a href="./projects-list.php" class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-blue-800">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    Daftar Proyek
                  </a>
                </li>
                <li aria-current="page">
                  <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-lg font-medium text-blue-800 md:ms-2">Detail Proyek</span>
                  </div>
                </li>
              </ol>
            </nav>

            <div>
              <div class="flex flex-wrap w-full justify-between">
                <div class="px-4 sm:px-0 flex justify-center items-center">
                  <h3 class="text-2xl font-semibold leading-7 text-gray-900">Detail Kelompok dan Proyek</h3>
                </div>


                <a href="./list-submitted.php" class="flex items-center flex-wrap">
                  <button type="button" class="text-white bg-green-500 hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
                    <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7.708 2.292.706-.706A2 2 0 0 1 9.828 1h6.239A.97.97 0 0 1 17 2v12a.97.97 0 0 1-.933 1H15M6 5v4a1 1 0 0 1-1 1H1m11-4v12a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V9.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 5h5.239A.97.97 0 0 1 12 6Z"/>
                    </svg> 
                    
                    Data Pengumpulan Kelompok
                  </button>
                </a>
              </div>

              <div class="mt-6 border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                  <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-md font-medium leading-6 text-gray-900">Nama Proyek</dt>
                    <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">Sistem Informasi E-Complain</dd>
                  </div>
                  <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-md font-medium leading-6 text-gray-900">Dosen PIC</dt>
                    <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">Pep Guardiola</dd>
                  </div>
                  <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-md font-medium leading-6 text-gray-900">Deskripsi Proyek</dt>
                    <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.</dd>
                  </div>
                  <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-md font-medium leading-6 text-gray-900">Kelompok yang mengambil</dt>
                    <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0"> <span class="font-semibold text-amber-500">3</span> /8</dd>
                  </div>
                  <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-md font-medium leading-6 text-gray-900">Kebutuhan Aplikasi</dt>
                    <dd class="text-md text-gray-900 sm:col-span-2">
                      <ul class="max-w-xl leading-loose text-md text-gray-500 list-disc list-inside">
                        <li class="mt-2">
                            At least 10 characters (and up to 100 characters)
                        </li>
                        <li class="mt-2">
                            At least one lowercase character
                        </li>
                        <li class="mt-2">
                            Inclusion of at least one special character, e.g., ! @ # ?
                        </li>
                      </ul>
                    </dd>
                  </div>
                  
                </dl>
              </div>
            </div>

        </div>
      </div>
  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>
</html>