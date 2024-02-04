<div class="py-8 px-4 max-w-screen-xl lg:py-6 lg:px-6">
    <div class="grid gap-8 grid-cols-1 lg:grid-cols-3">

        <?php foreach ($projects as $project) : ?>

            <div class="max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow flex flex-col justify-between items-start">
                <div class="flex justify-between w-full items-center mb-4">
                    <a href="./detail-project.php?id=<?= $project['id_proyek'] ?>" class="flex flex-col justify-between">
                        <h5 class="mb-1 text-md font-bold tracking-tight text-gray-900 hover:underline "><?= $project['nama_proyek'] ?></h5>
                        <span class="text-sm text-gray-500">Dosen PIC: <?= $project['nama_user'] ?></span>
                    </a>
                    <img class="w-10 h-10 rounded-full" src="../assets/img/ian.jpeg" alt="Rounded avatar">
                </div>
                <p class="my-4 font-normal text-sm text-ellipsis overflow-hidden whitespace-nowrap w-11/12 text-gray-700"><?= $project['deskripsi_proyek'] ?></p>
                <a href="./detail-project.php?id=<?= $project['id_proyek'] ?>" class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-amber-500 rounded-lg hover:scale-105 duration-300 ease-in-out focus:ring-4 focus:outline-none focus:ring-amber-300">
                    Detail Proyek
                    <svg class="rtlamberate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>