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
        <div class="relative overflow-hidden bg-white dark:bg-gray-50 sm:rounded-lg">
          <div class="flex-row items-center justify-between p-4 space-y-3 md:flex lg:flex-row sm:flex sm:space-y-0 sm:space-x-4">
              <div class="flex w-5/12 items-center">
              <img class="w-20 h-20 rounded-xl" src="../assets/img/pfp.jpg" alt="Default avatar">
              <div class="ml-6">
                <h5 class="mr-3 font-semibold dark:text-gray-900">Jake Pierce's Dashboard</h5>
                <p class="text-gray-500 dark:text-gray-400">thiearsenal@gmail.com</p>
              </div>
            </div>
            <!-- <a href="./user/groups.php"
                    class="flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white rounded-lg bg-amber-500 hover:scale-105 duration-300 ease-in-out hover:shadow-md hover:shadow-gray-300 focus:ring-4 focus:ring-amber-300 focus:outline-none dark:focus:ring-amber-300">
              <svg class="h-3.5 w-3.5 mr-2 -ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
              </svg>
              Temukan Kelompok
            </a> -->
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="flex items-center justify-center px-5 py-2.5 block text-white bg-blue-700 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                <svg class="h-3.5 w-3.5 mr-2 -ml-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                  </svg>  

                Tambah Judul
            </button> 
            <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-screen-xl  max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-blue-500">
                <h3 class="text-lg font-semibold text-gray-900 ">
                    Tambah Judul Proyek
                </h3>
                <button type="button" class="text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Judul Project</label>
                        <input type="text" name="name" id="name" class="bg-white border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 " placeholder="Type product name" required="">
                    </div>
                    <!-- <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                        <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                    </div> -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Jurusan</label>
                        <select id="category" class="bg-white border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected="">Select Jurusan</option>
                            <option value="TI">Teknologi Informasi</option>
                            <option value="DG">Desain Grafis</option>
                            <option value="PH">Perhotelan</option>
                            <option value="AB">Administrasi Bisnis</option>
                            <option value="KP">Keuangan Dan Perbankan</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Deskripsi Judul Proyek</label>
                        <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-blue-500 focus:ring-blue-500 focus:border-blue-500 " placeholder="Tulis deskripsi disini!!!"></textarea>                    
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Tambah Judul Proyek
                </button>
            </form>
        </div>
    </div>
</div> 


          </div>
        </div>
      </div>

      <!-- PROYEK PENGERJAAN -->
      <!-- <h2 class="text-xl self-start font-medium px-7 w-full">Proyek kamu saat ini</h2>

      <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-6 lg:px-6">
        <div class="grid gap-8 lg:grid-cols-2">
          <article class="p-6 bg-amber-100 rounded-xl border border-amber-400 shadow-sm dark:bg-white dark:border-amber-400 hover:shadow-lg hover:shadow-gray-00 duration-300 h-72 flex box-border flex-col justify-between ease-in-out">
              <div class="flex justify-between items-center mb-5 text-gray-500">
                  <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-amber-200 dark:text-amber-800">
                      <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                      Teknologi Informasi
                  </span>
                  <span class="text-sm">14 days ago</span>
              </div>
              <h2 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-gray-900"><a href="#">Sistem Informasi E-Complain</a></h2>
              <p class="mb-5 font-light text-sm text-gray-500 dark:text-gray-400">
                Static websites are now used to bootstrap lots of websites and are becoming the basis for a variety of tools that even influence both web designers and developers influence both web designers and developers.
              </p>
              <div class="flex justify-between items-center">
                  <div class="flex items-center space-x-4">
                      <img class="w-7 h-7 rounded-full" src="./assets/img/flora.jpg" alt="" />
                      <span class="font-medium dark:text-gray-900">
                          Flora Shafiq Riyadi
                      </span>
                  </div>
                  <a href="" class="inline-flex items-center font-medium text-primary-600 dark:text-amber-500 hover:underline">
                      Kunjungi Proyek
                      <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </a>
              </div>
          </article>                  
        </div>  
      </div>
 -->

      <!-- Proyek yang dapat dipilih -->
      <!-- <h2 class="text-xl self-start font-medium px-7 mt-5 w-full">Judul Project Based Learning yang bisa dipilih</h2> -->

      <?php include("./content/chsadmin.php") ?>
      

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