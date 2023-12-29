<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Proyek Lainnya | PBL Vokasi</title>
  <?php include("./includes/head.php") ?>
</head>
<body>
  <!-- Navbar -->
  <?php include("./includes/navbarshowcase.php") ?>
  
  <!-- Hero Section -->
  <section class="bg-white dark:bg-gray-50">
      <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:pt-20 lg:pb-5 lg:px-12">
          <a href="#" class="inline-flex ease-in-out duration-300 justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-amber-200 dark:text-amber-600 dark:hover:text-white dark:hover:bg-amber-400" role="alert">
              <span class="text-xs bg-amber-600 rounded-full text-white px-4 py-1.5 mr-3">Eksplor</span> <span class="text-sm font-medium">Project Based Learning Vokasi Telah Rilis!</span> 
              <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          </a>
          <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-5xl dark:text-gray-900 leading-10">Jelajahi Project Based Learning di PBL Vokasi!</h1>
          <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Lihat proyek dari Project Based Learning Vokasi dari berbagai jurusan di Fakultas Vokasi kapanpun dan dimanapun</p>
          <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4 items-center">
              <div class="flex items-center"><span>Filter Kategori:</span></div>
              <!-- PROGRAM STUDI -->

              <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-3 text-center inline-flex items-center dark:bg-green-500 dark:hover:bg-green-400 dark:focus:ring-green-300" type="button">Program Studi<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
              </button>
              <!-- Dropdown menu -->
              <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-white">
                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-900 text-left" aria-labelledby="dropdownDefaultButton">
                    <li>
                      <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:text-green-500">Dashboard</a>
                    </li>
                    <li>
                      <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:text-green-500">Settings</a>
                    </li>
                    <li>
                      <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:text-green-500">Earnings</a>
                    </li>
                    <li>
                      <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:text-green-500">Sign out</a>
                    </li>
                  </ul>
              </div>

              <!-- Kategori -->

              <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-3 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Kategori<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
              </button>
              <!-- Dropdown menu -->
              <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-white">
                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-900 text-left" aria-labelledby="dropdownDefaultButton">
                    <li>
                      <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:text-green-500">Dashboard</a>
                    </li>
                    <li>
                      <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:text-green-500">Settings</a>
                    </li>
                    <li>
                      <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:text-green-500">Earnings</a>
                    </li>
                    <li>
                      <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:text-green-500">Sign out</a>
                    </li>
                  </ul>
              </div>

              <!-- <button type="button" class="focus:outline-none text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm p-3 mr-2 mb-2 dark:bg-amber-500 dark:hover:bg-amber-400 dark:focus:ring-amber-300">Cari Sekarang</button> -->
          </div>
        </div> 
      </div>
    </section>

    <!-- More Content -->
    <?php include("../content/showcase/more.php") ?>

    <!-- Hero Section -->
    <section class="bg-white dark:bg-gray-50">
      <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 bg-gray-50">
        <div class="bg-gradient-to-r from-yellow-400 to-orange-500 border border-gray-200 rounded-xl p-8 md:p-12 mb-8">
            <a href="#" class="bg-blue-100 text-yellow-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-amber-200 dark:text-amber-600 mb-2">
                <svg class="w-2.5 h-2.5 mr-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                    <path d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z"/>
                </svg>
                Fakultas Vokasi
            </a>
              <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold my-7">Jelajahi Project Based Learning di PBL Vokasi!</h1>
              <p class="text-lg font-normal text-amber-600 dark:text-gray-50 mb-7">Static websites are now used to bootstrap lots of websites and are becoming the basis for a variety of tools that even influence both web designers and developers.</p>
              <a href="#" class="inline-flex justify-center items-center py-2.5 px-5 text-base font-medium text-center text-white rounded-lg bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:ring-amber-300 dark:focus:ring-amber-900">
                  Back to the top
              </a>
          </div>
        </div>
      </div>
    </section>


<!-- Footer -->
<?php include("./includes/footer.php") ?>
</body>
</html>