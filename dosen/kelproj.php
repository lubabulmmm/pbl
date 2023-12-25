<?php 

  session_start();
  if (!isset($_SESSION["login"])) {
    header("Location: /PBL/login.php");
  }

  if (isset($_SESSION["level"])) {
    if ($_SESSION["level"] == "user") {
      header("Location: /PBL/user/dashboard.php");
      exit;
    } elseif ($_SESSION["level"] == "superadmin"){
      header("Location: /PBL/superadmin/superadmin.php");
      exit;
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | PBL Vokasi</title>
  <?php include("./includes/head.php") ?>
</head>
<body class="bg-gray-50 ">
  <!-- Navigation Bar -->
  <?php include("./includes/navbar.php") ?>

  <!-- Side Bar -->
  <?php include("./includes/aside.php") ?>
  <div class="p-4 sm:ml-64">
  <div class="rounded-lg mt-14 flex flex-col item-start">
      <div class="mx-auto w-full px-4 lg:px-12">
        <!-- BreadCrumbs -->

        <nav class="flex my-7" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
              <li class="inline-flex items-center">
                <a href="./dashadmin.php" class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-blue-500">
                  <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                  </svg>
                  Beranda
                </a>
              </li>
              <li aria-current="page">
                <div class="flex items-center">
                  <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
                  <span class="ms-1 text-lg font-medium text-blue-500 md:ms-2">Daftar Proyek</span>
                </div>
              </li>
            </ol>
          </nav>

          <div class="flex w-full justify-between items-center">
            <!-- <h2 class="text-2xl mb-3 font-semibold">Sistem Informasi E-Complain</h2> -->
            <h2 class="text-xl self-start font-medium px-7 mt-5 w-full">Daftar Kelompok Sistem Informasi PBL</h2>


            <!-- <div class="flex items-center flex-wrap">

              <a href="../dashboard.php" type="button" class="text-white bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                </svg>
                Kembali
              </a>
              <button type="button" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                  <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2 1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z"/>
                </svg>
                Pilih Proyek Ini
              </button>
            </div> -->
          </div>

       

  <!-- Content Wrap-->
  <!-- <div class="p-4 sm:ml-64"> -->
      <!-- important -->
    <!-- <div class="rounded-lg mt-14 flex flex-col item-start"> -->
      <!-- Contents -->


    <!-- Proyek yang dapat dipilih -->
      <!-- <h2 class="text-xl self-start font-medium px-7 mt-5 w-full">Daftar Kelompok Sistem Informasi PBL</h2> -->

      <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-6 lg:px-6">
        <div class="grid gap-8 lg:grid-cols-2">
          <article class="p-6 bg-amber-100 rounded-xl border border-amber-400 shadow-sm dark:bg-white dark:border-blue-400 hover:shadow-lg hover:shadow-gray-00 duration-300 h-72 flex box-border flex-col justify-between ease-in-out">
              <div class="flex justify-between items-center mb-5 text-gray-500">
                  <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
                      <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                      Teknologi Informasi
                  </span>         
                  <span class="text-sm">Kelompok 1</span>  
              </div>
              <h2 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-gray-900"><a href="#">Sistem Informasi PBL</a></h2>
              <p class="mb-5 font-light text-sm text-gray-500 dark:text-gray-400">
                Static websites are now used to bootstrap lots of websites and are becoming the basis for a variety of tools that even influence both web designers and developers influence both web designers and developers.
              </p>
              <div class="flex justify-between items-center">
                  <div class="flex items-center space-x-4">
                      <img class="w-7 h-7 rounded-full" src="../assets/img/flora.jpg" alt="" />
                      <span class="font-medium dark:text-gray-900">
                          Flora Shafiq Riyadi
                      </span>
                  </div>
                  <a href="./projects.php" class="inline-flex items-center font-medium text-primary-600 dark:text-blue-500 hover:underline">
                      Lihat Proyek
                      <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </a>
              </div>
          </article>   
          
          <article class="p-6 bg-amber-100 rounded-xl border border-amber-400 shadow-sm dark:bg-white dark:border-blue-400 hover:shadow-lg hover:shadow-gray-00 duration-300 h-72 flex box-border flex-col justify-between ease-in-out">
              <div class="flex justify-between items-center mb-5 text-gray-500">
                  <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
                      <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                      Teknologi Informasi
                  </span>           
                  <span class="text-sm">Kelompok 2</span>
              </div>
              <h2 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-gray-900"><a href="#">Sistem Informasi E-Complain</a></h2>
              <p class="mb-5 font-light text-sm text-gray-500 dark:text-gray-400">
                Static websites are now used to bootstrap lots of websites and are becoming the basis for a variety of tools that even influence both web designers and developers influence both web designers and developers.
              </p>
              <div class="flex justify-between items-center">
                  <div class="flex items-center space-x-4">
                      <img class="w-7 h-7 rounded-full" src="../assets/img/flora.jpg" alt="" />
                      <span class="font-medium dark:text-gray-900">
                          Flora Shafiq Riyadi
                      </span>
                  </div>
                  <a href="" class="inline-flex items-center font-medium text-primary-600 dark:text-blue-500 hover:underline">
                      Lihat Proyek
                      <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </a>
              </div>
          </article>

          <article class="p-6 bg-amber-100 rounded-xl border border-amber-400 shadow-sm dark:bg-white dark:border-blue-400 hover:shadow-lg hover:shadow-gray-00 duration-300 h-72 flex box-border flex-col justify-between ease-in-out">
              <div class="flex justify-between items-center mb-5 text-gray-500">
                  <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
                      <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                      Teknologi Informasi
                  </span>           
                  <span class="text-sm">Kelompok 3</span>
              </div>
              <h2 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-gray-900"><a href="#">Sistem Informasi E-Complain</a></h2>
              <p class="mb-5 font-light text-sm text-gray-500 dark:text-gray-400">
                Static websites are now used to bootstrap lots of websites and are becoming the basis for a variety of tools that even influence both web designers and developers influence both web designers and developers.
              </p>
              <div class="flex justify-between items-center">
                  <div class="flex items-center space-x-4">
                      <img class="w-7 h-7 rounded-full" src="../assets/img/flora.jpg" alt="" />
                      <span class="font-medium dark:text-gray-900">
                          Flora Shafiq Riyadi
                      </span>
                  </div>
                  <a href="" class="inline-flex items-center font-medium text-primary-600 dark:text-blue-500 hover:underline">
                      Lihat Proyek
                      <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </a>
              </div>
          </article>

        </div>  
      </div>

        

      <!-- Proyek yang dapat dipilih -->
      <!-- <h2 class="text-xl self-start font-medium px-7 mt-5 w-full">Daftar Kelompok</h2> -->


    </div>
  </div>

  

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
<script>
// import('tailwindcss').Config;
  module.exports = {
    theme: {
      colors: {
        'tr': '#FFAA2A'
      },
    },
  }
</script>
</body>
</html>