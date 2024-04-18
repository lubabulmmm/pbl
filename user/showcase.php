<?php

session_start();
require "../query/query.php";
$categories = execThis("SELECT * FROM categories");

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
    <div class="grid max-w-[85rem] w-full px-4 py-8 md:py-0 mx-auto lg:gap-8 xl:gap-0 lg:grid-cols-12">
      <div class="mr-auto place-self-center lg:col-span-8">
        <h1 class="max-w-2xl mb-7 text-4xl font-bold tracking-tight leading-none">Showcase Project Based Learning</h1>
        <p class="max-w-3xl mb-6 font-normal text-gray-500 lg:mb-8 text-base md:text-lg lg:text-lg ">Project Based Learning dari seluruh jurusan di Fakultas Vokasi mulai dari Teknologi Informasi, Desain Grafis Administrasi Bisnis, Manajemen Perhotelan dan Keuangan Perbankan tersedia dan dapat anda lihat di sini.</p>

        <form class="mx-auto">
          <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
          <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
              </svg>
            </div>
            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 " placeholder="Cari Showcase..." required />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-gradient-to-tl from-blue-600 to-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
          </div>
        </form>
      </div>
      <div class="hidden lg:mt-0 lg:col-span-4 lg:flex">
        <img src="../assets/img/img1.svg" alt="mockup">
      </div>
    </div>
  </section>

  <!-- Content -->

  <?php include("../content/showcase/ti.php") ?>

  <!-- Hero -->
  <div class="relative overflow-hidden before:absolute before:top-0 before:start-1/2 before:bg-[url('/pbl/assets/img/squared-bg-element.svg')] before:bg-no-repeat before:bg-top before:size-full before:-z-[1] before:transform before:-translate-x-1/2 mt-20">
    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-10 mt-12 mb-52">
      <!-- Announcement Banner -->
      <div class="flex justify-center">
        <a class="inline-flex items-center gap-x-2 bg-white border border-gray-200 text-xs text-gray-600 p-2 px-3 rounded-full transition hover:border-blue-600" href="#">
          Jelajahi proyek yang telah dibuat
          <span class="flex items-center gap-x-1">
            <span class="border-s border-gray-200 text-blue-600 ps-2">Jelajahi</span>
            <svg class="flex-shrink-0 size-4 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m9 18 6-6-6-6" />
            </svg>
          </span>
        </a>
      </div>
      <!-- End Announcement Banner -->

      <!-- Title -->
      <div class="mt-5 max-w-2xl text-center mx-auto">
        <h1 class="block font-bold text-gray-800 text-4xl md:text-5xl lg:text-6xl">
          Kelola tugas kelompok dengan mudah.
        </h1>
      </div>
      <!-- End Title -->

      <div class="mt-5 max-w-2xl text-center mx-auto">
        <p class="text-lg text-gray-600">Pembelajaran berbasis proyek adalah metode pembelajaran yang menggunakan proyek/kegiatan sebagai medianya.</p>
      </div>

      <!-- Buttons -->
      <div class="mt-8 gap-3 flex justify-center">
        <a class="inline-flex justify-center items-center gap-x-3 text-center bg-gradient-to-tl from-amber-500 to-amber-400  transition duration-300 hover:underline text-white text-sm font-medium rounded-full py-3 px-4" href="#">

          Coba Sekarang
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
          </svg>

        </a>
      </div>
      <!-- End Buttons -->
    </div>
  </div>
  <!-- End Hero -->


  <!-- Footer -->
  <?php include("./includes/footer.php") ?>


</body>

</html>