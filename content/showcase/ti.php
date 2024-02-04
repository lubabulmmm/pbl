<?php

foreach ($categories as $category) :

?>

    <section class="bg-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-4 lg:px-6">
            <div class="text-left lg:my-5 mb-3">
                <h2 class="mb-1 text-3xl lg:text-2xl tracking-tight font-semibold text-gray-900"><?= $category['category_name'] ?></h2>
            </div>

            <!-- Lakukan Perulangan Data di sini -->

            <?php $ps = execThis("SELECT bunch_name, nama_user, project_id, bunch_id, nama_proyek, pict, deskripsi_proyek FROM bunch INNER JOIN user ON bunch.leader_id = user.email INNER JOIN proyek ON bunch.project_id = proyek.id_proyek WHERE category =" . $category['c_id'] . " AND bunch.status_show = 'Yes'"); ?>
            <!-- Card Blog -->
            <div class="max-w-[85rem] px-2 py-5 sm:px-6 lg:px-4 lg:py-1 mx-auto">
                <!-- Grid -->
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Card -->
                    <?php foreach ($ps as $p) : ?>
                        <?php $rand_color = rand(1, 3) ?>
                        <div class="group flex flex-col h-full bg-white border border-gray-200 shadow-md shadow-gray-100 rounded-xl">
                            <div class="h-52 flex flex-col justify-center items-center bg-white-500 rounded-t-xl">
                                <img class="w-48 h-48" src="../assets/img/<?= $p['pict'] ?>.svg" alt="alo">
                            </div>
                            <div class="p-4 md:p-6">
                                <span class="block mb-1 text-xs font-semibold uppercase <?= $rand_color == 1 ? 'text-blue-600' : '' ?> <?= $rand_color == 2 ? 'text-rose-600' : '' ?> <?= $rand_color == 3 ? 'text-amber-500' : '' ?>">
                                    <?= $p['bunch_name'] ?>
                                </span>
                                <h3 class="text-xl font-semibold text-gray-800  ">
                                    <?= $p['nama_proyek'] ?>
                                </h3>
                                <p class="mt-3 text-gray-500 overflow-hidden truncate w-full">
                                    <?= $p['deskripsi_proyek'] ?>
                                </p>
                            </div>
                            <div class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200 ">
                                <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-es-xl bg-white text-gray-800 shadow-md shadow-gray-100 hover:bg-blue-500 hover:text-white hover:underline duration-200 transition disabled:opacity-50 disabled:pointer-events-none " href="#">
                                    Detail Proyek
                                </a>
                                <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-ee-xl bg-white text-gray-800 shadow-md hover:bg-amber-500 hover:text-white hover:underline duration-200 transition shadow-gray-100 disabled:opacity-50 disabled:pointer-events-none " href="#">
                                    Demo Proyek
                                </a>
                            </div>
                        </div>
                        <!-- End Card -->
                    <?php endforeach; ?>

                </div>
                <!-- End Grid -->
            </div>
            <!-- End Card Blog -->

        </div>
    </section>
<?php endforeach; ?>