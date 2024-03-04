<?php
$list_bunch = execThis("SELECT nama_user, nama_proyek, bunch_id, project_id FROM bunch INNER JOIN user ON bunch.leader_id = user.email INNER JOIN proyek ON bunch.project_id = proyek.id_proyek WHERE project_id =" . $project['id_proyek']);
?>

<div id="list-groups-<?= $project['id_proyek'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-md max-h-full ">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow req-modal transition-all duration-300">
      <!-- Modal header -->
      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
        <h3 class="text-lg font-semibold text-gray-900">
          <?= $project['nama_proyek'] ?>
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="list-groups-<?= $project['id_proyek'] ?>">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="p-4 md:p-5">
        <p class="text-black-500 mb-4 ml-2">Daftar Kelompok Mengambil:</p>
        <ul class="space-y-4 mb-4">

          <?php if (empty($list_bunch)) : ?>
            <p class="text-center text-gray-500 text-sm font-light">Belum ada kelompok yang mengambil.</p>
          <?php endif; ?>

          <?php foreach ($list_bunch as $rul) : ?>
            <li>

              <a href="./detail-kelompok.php?bid=<?= $rul['bunch_id'] ?>&id=<?= $rul['project_id'] ?>" for="job-1" class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100">
                <div class="block">
                  <div class="w-full text-sm font-semibold"><?= $rul['nama_proyek'] ?></div>
                  <div class="w-full text-gray-500 text-xs mt-1">

                    <span class="text-green-600">Ketua Kelompok: <?= $rul['nama_user'] ?></span>
                  </div>
                </div>
                <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-amber-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
              </a>
            </li>
          <?php endforeach; ?>

        </ul>
        <button data-modal-toggle="list-groups-<?= $project['id_proyek'] ?>" class="text-white inline-flex w-full justify-center bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
          Kembali
        </button>
      </div>
    </div>
  </div>
</div>