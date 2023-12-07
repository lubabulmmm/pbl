<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Showcase PBL | PBL Vokasi</title>
  <?php include("./includes/head.php") ?>
</head>
<body class="bg-gray-50">

  <?php include("./includes/navbarshowcase.php") ?>

  <section class="bg-white dark:bg-gray-50">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-9">
            <h1 class="max-w-2xl mb-4 text-xl font-semibold tracking-tight leading-none md:text-5xl xl:text-4xl">Showcase Project Based Learning</h1>
            <p class="max-w-3xl mb-6 font-normal text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-500">Project Based Learning dari seluruh jurusan di Fakultas Vokasi mulai dari Teknologi Informasi, Desain Grafis Administrasi Bisnis, Manajemen Perhotelan dan Keuangan Perbankan tersedia dan dapat anda lihat di sini.</p>
            <!-- <a href="#" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-amber-500 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                Get started
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
            <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-amber-500 dark:border-amber-500 dark:hover:bg-amber-500 dark:hover:text-white dark:focus:ring-gray-800">
                Speak to Sales
            </a>  -->
          <div class="w-full flex h-10 justify-between align-center">
            <form class="w-10/12">   
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="default-search" class="block w-full pl-10 p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-500 dark:placeholder-gray-500 dark:text-gray-500 dark:focus:ring-amber-500 dark:focus:border-amber-500" placeholder="Cari Proyek.." required>
                </div>
            </form> 

            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 h-10 border-box text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">Kategori<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
              </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-white">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-900" aria-labelledby="dropdownDefaultButton">
                  <li>
                    <a href="#" class="block px-4 py-2 hover:bg-amber-500 dark:hover:bg-amber-500 dark:hover:text-white">Teknologi Informasi</a>
                  </li>
                  <li>
                    <a href="#" class="block px-4 py-2 hover:bg-amber-500 dark:hover:bg-amber-500 dark:hover:text-white">Desain Grafis</a>
                  </li>
                  <li>
                    <a href="#" class="block px-4 py-2 hover:bg-amber-500 dark:hover:bg-amber-500 dark:hover:text-white">Administrasi Bisnis</a>
                  </li>
                  <li>
                    <a href="#" class="block px-4 py-2 hover:bg-amber-500 dark:hover:bg-amber-500 dark:hover:text-white">Manajemen Perhotelan</a>
                  </li> 
                  <li>
                    <a href="#" class="block px-4 py-2 hover:bg-amber-500 dark:hover:bg-amber-500 dark:hover:text-white">Keuangan dan Perbankan</a>
                  </li>
                </ul>
            </div>
          </div>

        </div>
        <div class="hidden lg:mt-0 lg:col-span-3 lg:flex">
            <img src="./assets/img/img1.png" alt="mockup">
        </div>                
    </div>
  </section>

</body>
</html>