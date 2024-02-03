<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Showcase PBL | PBL Vokasi</title>
  <?php include("./includes/head.php") ?>
</head>

<body class="">

  <?php include("./includes/navbarshowcase.php") ?>

  <section class="">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-8 lg:grid-cols-12">
      <div class="mr-auto place-self-center lg:col-span-9">
        <h1 class="max-w-2xl mb-4 text-2xl font-semibold tracking-tight leading-none md:text-2xl xl:text-4xl">Showcase Project Based Learning</h1>
        <p class="max-w-3xl mb-6 font-normal text-gray-500 lg:mb-8 md:text-lg lg:text-lg ">Project Based Learning dari seluruh jurusan di Fakultas Vokasi mulai dari Teknologi Informasi, Desain Grafis Administrasi Bisnis, Manajemen Perhotelan dan Keuangan Perbankan tersedia dan dapat anda lihat di sini.</p>
        <form>
          <div class="flex">
            <label for="search-dropdown" class="mb-2 text-sm font-medium text-white sr-only">Your Email</label>
            <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-white bg-green-500 border border-green-300 rounded-l-lg hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-100 ease-in-out duration-500" type="button">Kategori Jurusan <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
              </svg>
            </button>
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
              <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdown-button">
                <li>
                  <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 text-left">Teknologi Informasi</button>
                </li>
                <li>
                  <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 text-left">Desain Grafis</button>
                </li>
                <li>
                  <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 text-left">Administrasi Bisnis</button>
                </li>
                <li>
                  <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 text-left">Keuangan dan Perbankan</button>
                </li>
                <li>
                  <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 text-left">Manajemen Perhotelan</button>
                </li>
              </ul>
            </div>
            <div class="relative w-full">
              <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900  rounded-r-lg border-l-gray-300 border-l-2 ease-in-out duration-500 border border-gray-300 focus:ring-amber-500 focus:border-amber-500" placeholder="Cari Proyek." required>
              <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full text-white bg-amber-500 rounded-r-lg border border-amber-600 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-amber-300">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <span class="sr-only">Search</span>
              </button>
            </div>
          </div>
        </form>


      </div>
      <div class="hidden lg:mt-0 lg:col-span-3 lg:flex">
        <img src="../assets/img/img1.png" alt="mockup">
      </div>
    </div>
  </section>

  <!-- Content -->

  <?php include("../content/showcase/ti.php") ?>
  <?php include("../content/showcase/dg.php") ?>
  <?php include("../content/showcase/adbis.php") ?>
  <?php include("../content/showcase/kb.php") ?>
  <?php include("../content/showcase/mp.php") ?>



  <!-- Hero Section -->
  <section class="">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-20 lg:px-12">
      <a href="#" class="inline-flex ease-in-out duration-300 justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full hover:text-white hover:bg-amber-400" role="alert">
        <span class="text-xs bg-amber-600 rounded-full text-white px-4 py-1.5 mr-3">Eksplor</span> <span class="text-sm font-medium">Project Based Learning Vokasi Telah Rilis!</span>
        <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
        </svg>
      </a>
      <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-5xl">PBL Vokasi UB: Inovasi dan Implementasi Praktis!</h1>
      <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 ">Lihat proyek dari Project Based Learning Vokasi dari berbagai jurusan di Fakultas Vokasi kapanpun dan dimanapun </p>
      <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
        <a href="./moreshowcase.php" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-amber-500 rounded-lg bg-primary-700 hover:bg-amber-500 hover:text-white ease-in duration-300 focus:ring-4 focus:ring-primary-300">
          Lihat Proyek Lainnya
          <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </a>
        <a href="./index.php" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-amber-500 hover:text-white rounded-lg border border-amber-300 hover:bg-amber-500 focus:ring-4 focus:ring-amber-100 ease-in-out duration-300">
          Kembali ke halaman utama
        </a>
      </div>
    </div>
    </div>
  </section>

  <!-- Footer -->
  <?php include("./includes/footer.php") ?>


</body>

</html>