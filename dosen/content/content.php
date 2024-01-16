<?php

$bunches = execThis("SELECT bunch_id, project_id, bunch_name, nama_user, nama_proyek FROM bunch INNER JOIN user ON bunch.leader_id = user.email INNER JOIN proyek ON bunch.project_id = proyek.id_proyek WHERE project_id = " . $_GET['id'] . "");

?>

<div class="py-1 max-w-screen-xl lg:py-2">
  <?php if ($bunches == []) {
    $bunches = execThis("SELECT nama_proyek FROM proyek WHERE id_proyek = " . $_GET['id'] . "");
  ?>
    <h2 class="text-2xl pb-6 font-medium"><?= $bunches[0]['nama_proyek'] ?></h2>
    <div class="h-fit">
      <h2 class="text-center font-normal text-gray-400 leading-loose">Belum ada kelompok yang mengambil</h2>
    </div>
  <?php } else { ?>
    <h2 class="text-2xl pb-6 font-medium"><?= $bunches[0]['nama_proyek'] ?></h2>
    <div class="grid gap-8 lg:grid-cols-3">

      <?php foreach ($bunches as $bunch) : ?>
        <div class="max-w-full shadow-lg p-6 bg-white border border-blue-800 flex flex-col justify-between items-start rounded-lg">
          <div class="flex justify-between w-full items-center mb-4">
            <a href="./projects.php?bid=<?= $bunch['bunch_id'] ?>" class="flex flex-col justify-between">
              <h5 class="mb-1 text-md font-bold tracking-tight text-gray-900 hover:underline ">Kelompok <?= $bunch['bunch_name'] ?></h5>
              <span class="text-sm text-gray-500">Ketua Kelompok (PM): <span class="font-bold"><?= $bunch['nama_user'] ?></span></span>
            </a>
            <img class="w-10 h-10 rounded-full" src="/PBL/assets/img/ian.jpeg" alt="Rounded avatar">
          </div>
          <a href="./projects.php?bid=<?= $bunch['bunch_id'] ?>&id=<?= $_GET['id'] ?>" class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-blue-800 rounded-lg hover:scale-105 duration-300 ease-in-out mt-2 focus:ring-4 focus:outline-none focus:ring-blue-300">
            Detail Kelompok
            <svg class="rtlamberate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  <?php } ?>

</div>