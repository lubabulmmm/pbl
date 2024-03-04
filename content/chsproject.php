<div class="bg-white my-5 border shadow border-gray-200 py-8 px-4 lg:py-6 lg:px-6  rounded-lg mx-7">

    <ul class="max-w-full">
        <?php foreach ($projects as $project) : ?>
            <?php

            $sum_bunch = mysqli_query($conn, "SELECT * FROM bunch WHERE project_id = " . $project['id_proyek'] . "");
            $sum_num = mysqli_num_rows($sum_bunch);

            ?>
            <li class="pb-3 sm:pb-4 mt-2.5 last:border-0 last:pb-0 first:mt-0 border-b border-gray-200">
                <form action="" method="post">
                    <div class="flex items-center space-x-4 justify-center rtl:space-x-reverse flex-wrap">
                        <div class="flex-shrink-0">
                            <img class="w-8 h-8 rounded-full" src="../assets/img/<?= $project['pict'] ?>.svg" alt="">
                        </div>
                        <div class="flex-1 min-w-0">
                            <a href="./detail-project.php?id=<?= $project['id_proyek'] ?>" class="text-sm my-1 hover:underline font-medium text-gray-900 truncate ">
                                <?= $project['nama_proyek'] ?>
                            </a>
                            <p class="my-1 font-normal text-sm text-ellipsis overflow-hidden whitespace-nowrap w-11/12 text-gray-700">Dosen PIC: <?= $project['nama_user'] ?></p>
                        </div>
                        <div class="flex-1 invisible lg:visible min-w-0">
                            <p class="my-1 font-normal text-sm text-ellipsis overflow-hidden whitespace-nowrap w-11/12 text-gray-700">Total Minggu: <?= $project['minggu'] ?></p>
                        </div>
                        <div class="flex-1 invisible lg:visible min-w-0">
                            <p class="my-1 font-normal text-sm text-ellipsis overflow-hidden whitespace-nowrap w-11/12 text-gray-700">Kuota Kelompok: <span class="text-amber-600 font-bold"><?= $sum_num ?></span> /<?= $project['total_groups'] ?></p>
                        </div>
                        <div class="inline-flex items-center">
                            <a href="./detail-project.php?id=<?= $project['id_proyek'] ?>" class="focus:outline-none text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 font-medium rounded-lg text-xs px-2.5 py-1.5 me-1 mb-1 invisible lg:visible ">Detail Proyek</a>
                        </div>
                        <div class="inline-flex items-center">
                            <button type="button" data-modal-toggle="list-groups-<?= $project['id_proyek'] ?>" data-modal-target="list-groups-<?= $project['id_proyek'] ?>" class="focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-2.5 py-1.5 me-1 mb-1 invisible lg:visible ">Bergabung</button>
                        </div>
                    </div>
                </form>
                <?php include("../content/reject-req.php") ?>

            </li>
            <?php include("../content/list-groups.php") ?>
        <?php endforeach; ?>
    </ul>
</div>