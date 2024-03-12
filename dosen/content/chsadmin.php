<?php

$projects = execThis("SELECT id_user, deskripsi_proyek, id_proyek, pict, minggu, total_groups, nama_proyek, nama_user FROM proyek JOIN user ON user.email = proyek.id_user WHERE id_user = '" . $_SESSION['email'] . "' AND status_info = 'no archive'");

?>

<h2 class="text-xl self-start font-medium px-7 w-full">Daftar Proyek</h2>

<div class="bg-white my-5 border shadow border-gray-200 py-8 px-4 max-w-screen-full lg:py-6 lg:px-6  rounded-lg mx-7">

  <ul class="max-w-full">
    <?php if (empty($projects)) : ?>
      <div class="h-fit">
        <h2 class="text-center font-normal text-gray-400 leading-loose">Belum Ada Proyek, <a href="add-projects.php" class="text-blue-600 underline hover:text-amber-500">Tambah Proyek</a></h2>
      </div>
    <?php endif; ?>
    <?php foreach ($projects as $project) : ?>

      <li class="pb-3 sm:pb-4 mt-2.5 last:border-0 last:pb-0 first:mt-0 border-b border-gray-200">
        <form action="" method="post">
          <div class="flex items-center space-x-4 justify-center rtl:space-x-reverse flex-wrap">
            <div class="flex-shrink-0">
              <img class="w-8 h-8 rounded-full" src="../assets/img/<?= $project['pict'] ?>.svg" alt="">
            </div>
            <div class="flex-1 min-w-0">
              <a href="./kelproj.php?id=<?= $project['id_proyek'] ?>" class="text-sm my-1 hover:underline font-medium text-gray-900 text-ellipsis overflow-hidden whitespace-nowrap w-11/12 lg:block">
                <?= $project['nama_proyek'] ?>
              </a>
              <p class="my-1 font-normal text-sm text-ellipsis overflow-hidden whitespace-nowrap w-full lg:w-11/12 text-gray-700">Dosen PIC: <?= $project['nama_user'] ?></p>
            </div>
            <div class="flex-1 hidden lg:block min-w-0">
              <p class="my-1 font-normal text-sm text-ellipsis overflow-hidden whitespace-nowrap w-10/12 text-gray-700">Jumlah Kelompok: <?= $project['total_groups'] ?></p>
            </div>
            <div class="flex-1 hidden lg:block min-w-0">
              <p class="my-1 font-normal text-sm text-ellipsis overflow-hidden whitespace-nowrap w-10/12 text-gray-700">Total Minggu: <?= $project['minggu'] ?></p>
            </div>
            <div class="inline-flex items-center">
              <a href="./kelproj.php?id=<?= $project['id_proyek'] ?>" class="focus:outline-none text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 font-medium rounded-lg text-xs px-2.5 py-1.5 me-1 mb-1 hidden lg:block ">Detail Proyek</a>
            </div>
            <div class="inline-flex items-center">
              <input type="number" class="hidden" name="pid" value="<?= $project['id_proyek'] ?>">
              <button type="submit" name="archive" class="focus:outline-none text-white bg-violet-500 hover:bg-violet-600 focus:ring-4 focus:ring-violet-300 font-medium rounded-lg text-xs px-2.5 py-1.5 me-1 mb-1 hidden lg:block ">Arsipkan</button>
            </div>
          </div>
        </form>
        <?php include("../content/reject-req.php") ?>
      </li>
    <?php endforeach; ?>
  </ul>
</div>