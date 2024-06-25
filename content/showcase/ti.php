<section class="bg-white">
    <div class="py-8 px-4 mx-auto max-w-[85rem] lg:py-2 lg:px-6">
        <div class="text-left lg:my-5 mb-3">
            <h2 class="mb-1 text-3xl lg:text-2xl tracking-tight font-semibold text-gray-900">Semua Showcase</h2>
        </div>
        <?php $ps = execThis("SELECT bunch_name, nama_user, project_id, bunch_id, nama_proyek, pict, deskripsi_proyek FROM bunch INNER JOIN user ON bunch.leader_id = user.email INNER JOIN proyek ON bunch.project_id = proyek.id_proyek WHERE bunch.status_show = 'Yes'"); ?>
        <!-- Card Blog -->
        <div class="max-w-[85rem] py-5 lg:py-1 mx-auto">
            <!-- Grid -->
            <div class="grid lg:grid-cols-4 grid-cols-1 gap-4">
                <!-- Card -->
                <?php foreach ($ps as $p) : ?>
                    <?php $rand_color = rand(1, 3) ?>
                    <?php $bunchID = $p['bunch_id'] ?>
                    <?php $getPoster = execThis("SELECT * FROM submit_file WHERE bunch_id = $bunchID AND type = 'poster'") ?>

                    <div class="group flex flex-col h-full bg-white border border-gray-200 shadow-md shadow-gray-100 rounded-xl">
                        <div class="h-52 pt-7 flex flex-col justify-center items-center bg-white-500 rounded-t-xl">
                            <img class="w-48 h-48 rounded-lg" src="../query/<?= $getPoster[0]['path'] ?>" alt=" alo">
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
                            <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-es-xl bg-white text-gray-800 shadow-md shadow-gray-100 hover:bg-blue-500 hover:text-white hover:underline duration-200 transition disabled:opacity-50 disabled:pointer-events-none " href="detailshowcase.php?id=<?= $p['bunch_id'] ?>">
                                Detail Proyek
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
