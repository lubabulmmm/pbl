<?php

$projects = execThis("SELECT id_user, deskripsi_proyek, id_proyek, pict, minggu, total_groups, nama_proyek, nama_user FROM proyek JOIN user ON user.email = proyek.id_user WHERE id_user = '" . $_SESSION['email'] . "' AND status_info = 'archive'");

?>

<div class="py-1 max-w-screen-xl lg:py-2">
  <?php if ($projects == []) {
    $projects = execThis("SELECT nama_proyek FROM proyek WHERE id_proyek = " . $_GET['id'] . "");
  ?>
    <h2 class="text-2xl pb-6 font-medium"><?= $projects[0]['nama_proyek'] ?></h2>
    <div class="h-fit">
      <h2 class="text-center font-normal text-gray-400 leading-loose">Belum ada arsip</h2>
    </div>
  <?php } else { ?>
    <div class="grid gap-8 lg:grid-cols-3">

      <?php foreach ($projects as $project) : ?>
        <div class="max-w-full shadow-md p-6 bg-white border border-gray-200 flex flex-col justify-between items-start rounded-lg">
          <div class="flex justify-between w-full items-center mb-4">
            <a href="./kelproj.php?id=<?= $project['id_proyek'] ?>" class="flex flex-col justify-between">
              <h5 class="mb-1 text-lg font-bold tracking-tight text-gray-900 hover:underline "><?= $project['nama_proyek'] ?></h5>
              <span class="text-sm py-1 text-gray-500">Dosen PIC: <span class="font-bold"><?= $project['nama_user'] ?></span></span>
              <span class="text-sm text-gray-500 py-1">Jumlah Kelompok: <span class="font-bold"><?= $project['total_groups'] ?></span></span>
              <span class="text-sm text-gray-500 py-1">Total Minggu: <span class="font-bold"><?= $project['minggu'] ?></span></span>
            </a>
            <img class="w-16 h-16 rounded-full" src="/PBL/assets/img/<?= $project['pict'] ?>.svg" alt="Rounded avatar">
          </div>
          <div class="flex">
            <a href="./kelproj.php?id=<?= $project['id_proyek'] ?>" class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-blue-800 rounded-lg hover:scale-105 duration-300 ease-in-out mt-2 focus:ring-4 focus:outline-none focus:ring-blue-300">
              Detail Proyek
              <svg class="rtlamberate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
              </svg>
            </a>
            <form action="" method="post">
              <input type="hidden" name="pid" value="<?= $project['id_proyek'] ?>">
              <button type="submit" name="unarchive" class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-green-600 rounded-lg hover:scale-105 duration-300 ease-in-out mt-2 focus:ring-4 focus:outline-none focus:ring-green-300 ml-2">
                Batal Arsipkan
              </button>
            </form>
          </div>

        </div>
      <?php endforeach; ?>
    </div>
  <?php } ?>

</div>