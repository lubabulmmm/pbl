<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/img/favicon/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <title>Detail Kelompok | PBL Vokasi</title>
  <?php include("./includes/head.php") ?>
</head>
<body class="bg-gray-50">
  
  <?php include("./includes/navbar.php") ?>

  <!-- Side Bar -->
  <?php include("./includes/aside.php") ?>
  <div class="p-4 sm:ml-64">
      <!-- important -->
    <div class="rounded-lg mt-14 flex flex-col item-start">
      <div class="mx-auto w-full px-4 lg:px-12">
        <!-- BreadCrumbs -->

        <nav class="flex my-7" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
              <li class="inline-flex items-center">
                <a href="./dashboard.php" class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-amber-500">
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
                  <a href="./groups.php" class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-amber-500">
                    <span class="ms-1 text-lg font-medium text-gray-900 hover:text-amber-500 md:ms-2">Temukan Kelompok</span>
                  </a>
                </div>
              </li>
              <li aria-current="page">
                <div class="flex items-center">
                  <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
                  <span class="ms-1 text-lg font-medium text-amber-500 md:ms-2">Detail Tugas</span>
                </div>
              </li>
            </ol>
          </nav>

          <div class="flex w-full justify-between items-center">
            <h2 class="text-2xl font-semibold">Detail Kelompok</h2>


            <div class="flex items-center flex-wrap">

              <button type="button" class="text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M10 6v4l3.276 3.276M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                Masuk ke kelompok
              </button>

              <button type="button" class="text-white bg-green-500 hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.994 19a8.999 8.999 0 1 1 3.53-17.281M5.995 9l4 4 7-8m-1 8v5m-2.5-2.5h5"/>
                </svg>  
                
                Anggota Kelompok
              </button>
            </div>
          </div>

          <div class=" w-10/12">

            <h2 class="text-xl mt-6 font-medium">Nama Tugas: <span class="font-light ml-5">Wireframe</span></h2>

            <h2 class="text-xl mt-8 font-medium">Jumlah Anggota: <span class="font-semibold text-amber-500 ml-5">3</span> /8</h2>

            <h2 class="text-xl mt-8 font-medium">Dosen PIC: <span class="font-semibold ml-5">Jurgen Klopp</span></h2>

            <h2 class="text-xl mt-8 font-medium">Ketua Kelompok: <span class="font-semibold ml-5">Mohammed Salah</span></h2>
            
            <h2 class="text-xl mt-8 leading-loose font-medium">Deskripsi Tugas: <span class="font-light ml-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur inventore quo molestias id odit quibusdam, consequatur explicabo quia asperiores debitis neque maiores maxime tempora suscipit blanditiis laudantium delectus? Tempore nulla incidunt asperiores animi rem dolore quia maiores cupiditate, doloribus necessitatibus iste accusamus enim dolorum minima facere omnis in magnam maxime a ipsa veritatis ex distinctio ratione! Ut et adipisci impedit assumenda. Cupiditate iusto libero quas ad necessitatibus commodi aut non ea, eos, excepturi laudantium eius! Culpa expedita exercitationem optio in distinctio delectus facilis ipsum, velit aspernatur impedit esse sint, ex doloribus! Id dolorem aperiam aut ipsa laborum dolorum doloribus modi.</span></h2>

            
            <h2 class="text-xl mt-8 leading-loose font-medium">Kebutuhan Aplikasi:</h2>
            <ul class="max-w-xl leading-loose my-4 space-y-1 text-xl text-gray-500 list-disc list-inside">
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


          </div>

          


    </div>
  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>
</html>