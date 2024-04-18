<?php

session_start();

function get_type($array, $type)
{
    $result = array();
    foreach ($array as $item) {
        if ($item['type'] == $type) {
            $result[] = $item;
        }
    }
    return $result;
}

require '../query/query.php';

$showcase_id = $_GET['id'];


try {
    $get_files_submitted = execThis("SELECT * FROM submit_file WHERE bunch_id = $showcase_id");
    $get_links_submitted = execThis("SELECT * FROM submit_links WHERE bunch_id = $showcase_id");
    $report = get_type($get_files_submitted, 'report');
    $poster = get_type($get_files_submitted, 'poster');
    $source = get_type($get_files_submitted, 'source');
    $video = get_type($get_files_submitted, 'video');
    $links = $get_links_submitted[0];

    $get_bunch = execThis("SELECT * FROM bunch WHERE bunch_id = $showcase_id");
    $get_bunch_members = execThis("SELECT member_id, role, nama_user, gambar FROM bunch_member INNER JOIN user ON bunch_member.member_id = user.email WHERE bunch_id = $showcase_id");
    $get_project_id = $get_bunch[0]['project_id'];

    $get_project = execThis("SELECT id_proyek, nama_proyek, deskripsi_proyek FROM proyek WHERE id_proyek = $get_project_id");
} catch (\Throwable $th) {
    echo $th;
}

if ($get_bunch[0]['status_show'] == 'No') {
    header('Location: ../content/not-found.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showcase PBL | PBL Vokasi</title>
    <?php include("./includes/head.php") ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./styles.css">
</head>

<body class="">

    <?php include("./includes/navbarshowcase.php") ?>

    <!-- Showcase -->
    <!-- Hero -->
    <div class="relative overflow-hidden">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 pb-6 pt-10 lg:pt-20">
            <div class="max-w-4xl leading-loose text-center mx-auto">
                <h1 class="block text-3xl font-bold text-gray-800 sm:text-4xl md:text-5xl mb-2"><?= $get_project[0]['nama_proyek'] ?></h1>
                <h3 class="text-base lg:text-xl font-semibold my-3.5 lg:mt-8 lg:mb-5 text-blue-600">Deskripsi Proyek</h3>
                <p class="w-10/12 mx-auto lg:text-lg text-sm text-gray-600"><?= $get_project[0]['deskripsi_proyek'] ?></p>
            </div>

            <div class="mt-10 relative max-w-4xl mx-auto">
                <video class="w-full rounded-xl" controls>
                    <source src="../query/<?= $video[0]['path'] ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <div class="absolute bottom-12 -start-20 -z-[1] size-48 bg-gradient-to-b from-orange-500 to-white p-px rounded-lg">
                    <div class="bg-white size-48 rounded-lg"></div>
                </div>

                <div class="absolute -top-12 -end-20 -z-[1] size-48 bg-gradient-to-t from-blue-600 to-cyan-400 p-px rounded-full">
                    <div class="bg-white size-48 rounded-full"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero -->

    <div class="max-w-5xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight ">Anggota Kelompok</h2>
            <p class="mt-1 text-gray-600 ">Kelompok <?= $get_bunch[0]['bunch_name'] ?></p>
        </div>
        <!-- End Title -->

        <!-- Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-8 md:gap-12">
            <?php foreach ($get_bunch_members as $bm) : ?>

                <div class="text-center">
                    <img class="rounded-full size-24 mx-auto" src="../assets/img/<?= $bm['gambar'] ?>" alt="Image Description">
                    <div class="mt-2 sm:mt-4">
                        <h3 class="font-medium text-gray-800 ">
                            <?= $bm['nama_user'] ?>
                        </h3>
                        <p class="text-sm text-gray-600 ">
                            <?= $bm['role'] ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Features -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="lg:grid lg:grid-cols-12 lg:items-center">
            <div class="lg:col-span-5">
                <!-- Grid -->
                <div class="grid grid-cols-6 gap-2 sm:gap-6 place-items-center">
                    <div class="col-span-6">
                        <img class="rounded-xl" width="300" height="300" src="../query/<?= $poster[0]['path'] ?>" alt="Image Description">
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Grid -->
            </div>
            <!-- End Col -->

            <div class="mt-5 sm:mt-10 lg:mt-0 lg:col-span-7">
                <div class="space-y-6 sm:space-y-8">
                    <!-- Title -->
                    <div class="space-y-2 md:space-y-6">
                        <h2 class="font-bold text-3xl lg:mt-0 mt-16 lg:text-5xl text-gray-800">
                            <?= $get_project[0]['nama_proyek'] ?>
                        </h2>
                        <p class="text-lg text-gray-500">
                            Tautan Github, Laporan, dan Kode Program Dapat Anda Akses Disini.
                        </p>
                        <a href="<?= $links['github_url'] ?>" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-gradient-to-tl from-blue-600 to-blue-400 hover:from-blue-400 hover:to-blue-600 transition duration-300 ">

                            <svg class="flex-shrink-0 size-4 mr-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path>
                            </svg>

                            Github Repo
                        </a>
                        <a href="<?= $links['github_url'] ?>" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-gradient-to-tl from-amber-600 to-amber-400 hover:from-amber-400 hover:to-amber-600 transition duration-300 ">

                            <svg class="flex-shrink-0 size-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                            </svg>
                            Laporan
                        </a>
                        <a href="../query/<?= $source[0]['path'] ?>" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100  ">
                            Source Code
                        </a>
                    </div>
                    <!-- End Title -->
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Features -->



    <!-- Footer -->
    <?php include("./includes/footer.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../node_modules/preline/dist/preline.js"></script>
    <script src="../js/script.js"></script>


</body>

</html>