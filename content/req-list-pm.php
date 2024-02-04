<?php

$list_projects = execThis("SELECT id_proyek, nama_proyek FROM proyek WHERE id_user ='" . $_SESSION['email'] . "'");

?>

<div id="req-list" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-md max-h-full ">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow req-modal transition-all duration-300">
      <!-- Modal header -->
      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
        <h3 class="text-lg font-semibold text-gray-900">
          Daftar Permintaan
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="req-list">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="p-4 md:p-5">
        <p class="text-gray-500 mb-4 ml-2">Daftar permintaan proyek:</p>
        <ul class="space-y-4 mb-4">
          <?php if (empty($list_projects)) : ?>
            <p class="my-3 text-sm text-gray-400 text-center">Tidak ada proyek <a href="add-projects.php" class="text-blue-700">Tambah proyek</a></p>
          <?php endif; ?>
          <?php foreach ($list_projects as $lp) : ?>
            <li>

              <a href="./request-pm.php?id=<?= $lp['id_proyek'] ?>" for="job-1" class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100">
                <div class="block">
                  <div class="w-full text-sm font-semibold"><?= $lp['nama_proyek'] ?></div>
                </div>
                <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-amber-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
              </a>
            </li>
          <?php endforeach; ?>

        </ul>
        <button data-modal-toggle="req-list" class="text-white inline-flex w-full justify-center bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
          Tutup
        </button>
      </div>
    </div>
  </div>
</div>