<?php 

  session_start();
  if (!isset($_SESSION["login"])) {
    header("Location: login.php");
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

  <!-- Content Wrap-->
  <div class="p-4 sm:ml-64">
      <!-- important -->
    <div class="rounded-lg mt-14 flex flex-col item-start">
      <!-- Contents -->


      <!-- INFORMASI PENGGUNA -->
      <div class="w-full max-w-screen-xl px-4 mx-auto lg:px-3 py-4">
        <!-- Start coding here -->
        <div class="relative overflow-hidden bg-gray-50 sm:rounded-lg">
          <div class="flex-row items-center justify-between p-4 space-y-3 md:flex lg:flex-row sm:flex sm:space-y-0 sm:space-x-4">
              <div class="flex w-5/12 items-center">
              <img class="w-20 h-20 rounded-xl" src="./assets/img/pfp.jpg" alt="Default avatar">
              <div class="ml-6">
                <h5 class="mr-3 font-semibold text-gray-900"><?= $_SESSION["nama_user"] ?>'s Dashboard</h5>
                <p class="text-gray-500 text-gray-400"><?= $_SESSION["email"] ?></p>
              </div>
            </div>
            <a href="./user/groups.php"
                    class="flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white rounded-lg bg-amber-500 hover:scale-105 duration-300 ease-in-out hover:shadow-md hover:shadow-gray-300 focus:ring-4 focus:ring-amber-300 focus:outline-none">
              <svg class="h-3.5 w-3.5 mr-2 -ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
              </svg>
              Temukan Kelompok
            </a>
          </div>
        </div>
      </div>

      <!-- PROYEK PENGERJAAN -->
      <h2 class="text-xl self-start font-medium px-7 w-full">Proyek kamu saat ini</h2>

      <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-6 lg:px-6">
        <div class="grid gap-8 lg:grid-cols-2">
          <article class="p-6 bg-amber-100 rounded-xl border border-amber-400 shadow-sm bg-white border-amber-400 hover:shadow-lg duration-300 h-72 flex box-border flex-col justify-between ease-in-out">
              <div class="flex justify-between items-center mb-5 text-gray-500">
                  <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded bg-amber-200 text-amber-800">
                      <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                      Teknologi Informasi
                  </span>
                  <span class="text-sm"></span>
              </div>
              <h2 class="mb-2 text-xl font-bold tracking-tight text-gray-900"><a href="#">Sistem Informasi E-Complain</a></h2>
              <p class="mb-5 font-light text-sm text-gray-500">
                Static websites are now used to bootstrap lots of websites and are becoming the basis for a variety of tools that even influence both web designers and developers influence both web designers and developers.
              </p>
              <div class="flex justify-between items-center">
                  <div class="flex items-center space-x-4">
                      <img class="w-7 h-7 rounded-full" src="./assets/img/flora.jpg" alt="" />
                      <span class="font-medium">
                          Flora Shafiq Riyadi
                      </span>
                  </div>
                  <a href="" class="inline-flex items-center font-medium text-amber-500 hover:underline">
                      Kunjungi Proyek
                      <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </a>
              </div>
          </article>                  
        </div>  
      </div>


      <!-- Proyek yang dapat dipilih -->
      <h2 class="text-xl self-start font-medium px-7 mt-5 w-full">Judul Project Based Learning yang bisa dipilih</h2>

      <?php include("./content/chsproject.php") ?>
      

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