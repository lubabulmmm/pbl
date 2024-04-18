<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang | PBL Vokasi</title>
    <?php include("./user/includes/head.php") ?>
    <link rel="stylesheet" />
    <link rel="stylesheet" href="./styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</head>

<body>

    <?php include("./user/includes/navbarshowcase.php") ?>

    <section class="bg-white ">
        <div class="grid max-w-[85rem] px-4 py-8 lg:py-4 mx-auto lg:gap-8 xl:gap-0 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-3xl font-extrabold tracking-tight leading-none md:text-4xl xl:text-6xl ">Permudah pekerjaan kelompok peserta didik.</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl ">Pembelajaran berbasis proyek adalah metode pembelajaran yang menggunakan proyek/kegiatan sebagai media.</p>
                <a href="/pbl/user/login.php" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-gradient-to-tl from-blue-600 to-blue-400 hover:from-blue-400 hover:to-blue-600 transition duration-300 ">
                    Coba Sekarang
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="/pbl/user/showcase.php" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100  ">
                    Lihat Showcase
                </a>
            </div>
            <div class=" lg:mt-0 lg:col-span-5 lg:flex hidden">
                <img src="./assets/img/img_lp1.svg" alt="mockup">
            </div>
        </div>
    </section>

    <!-- Icon Blocks -->
    <div class="max-w-[85rem] px-4 py-10 lg:mt-8 lg:mb-4 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="grid md:grid-cols-2 gap-12">
            <div class="lg:w-3/4">
                <h2 class="text-3xl text-gray-800 font-bold lg:text-4xl">
                    Tentang PBL Vokasi
                </h2>
                <p class="mt-3 text-gray-800">
                    Dengan website ini peserta didik melakukan eksplorasi, penilaian, interpretasi, sintesis, dan informasi untuk menghasilkan berbagai bentuk hasil belajar.
                </p>
                <p class="mt-5">
                    <a class="inline-flex items-center gap-x-1 font-medium text-blue-600 hover:underline" href="#">
                        Coba Sekarang!
                        <svg class="flex-shrink-0 size-4 transition ease-in-out group-hover:translate-x-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </a>
                </p>
            </div>
            <!-- End Col -->

            <div class="space-y-6 lg:space-y-10">
                <!-- Icon Block -->
                <div class="flex">
                    <!-- Icon -->
                    <span class="flex-shrink-0 inline-flex justify-center items-center size-[46px] rounded-full border border-amber-500 bg-white text-amber-500 shadow-sm mx-auto">
                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                        </svg>
                    </span>
                    <div class="ms-5 sm:ms-8">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                            Industry-leading documentation
                        </h3>
                        <p class="mt-1 text-gray-600">
                            Our documentation and extensive Client libraries contain everything a business needs to build a custom integration in a fraction of the time.
                        </p>
                    </div>
                </div>
                <!-- End Icon Block -->

                <!-- Icon Block -->
                <div class="flex">
                    <!-- Icon -->
                    <span class="flex-shrink-0 inline-flex justify-center items-center size-[46px] rounded-full border border-amber-500 bg-white text-amber-500 shadow-sm mx-auto">
                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2v5Z" />
                            <path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1" />
                        </svg>
                    </span>
                    <div class="ms-5 sm:ms-8">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                            Developer community support
                        </h3>
                        <p class="mt-1 text-gray-600">
                            We actively contribute to open-source projects—giving back to the community through development, patches, and sponsorships.
                        </p>
                    </div>
                </div>
                <!-- End Icon Block -->

                <!-- Icon Block -->
                <div class="flex">
                    <!-- Icon -->
                    <span class="flex-shrink-0 inline-flex justify-center items-center size-[46px] rounded-full border border-amber-500 bg-white text-amber-500 shadow-sm mx-auto">
                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 10v12" />
                            <path d="M15 5.88 14 10h5.83a2 2 0 0 1 1.92 2.56l-2.33 8A2 2 0 0 1 17.5 22H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2.76a2 2 0 0 0 1.79-1.11L12 2h0a3.13 3.13 0 0 1 3 3.88Z" />
                        </svg>
                    </span>
                    <div class="ms-5 sm:ms-8">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                            Simple and affordable
                        </h3>
                        <p class="mt-1 text-gray-600">
                            From boarding passes to movie tickets, there's pretty much nothing you can't store with Preline.
                        </p>
                    </div>
                </div>
                <!-- End Icon Block -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Icon Blocks -->


    <!-- Hero -->
    <div class="relative overflow-hidden before:absolute before:top-0 before:start-1/2 before:bg-[url('/pbl/assets/img/squared-bg-element.svg')] before:bg-no-repeat before:bg-top before:size-full before:-z-[1] before:transform before:-translate-x-1/2">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-10 mb-52">
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


    <?php include("./user/includes/footer.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./node_modules/preline/dist/preline.js"></script>
    <script src="../js/script.js"></script>

</body>

</html>