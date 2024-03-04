<?php

$get_all_members = execThis("SELECT member_id, bunch_member.id AS id_member, role, nama_user, gambar FROM bunch_member INNER JOIN user ON bunch_member.member_id = user.email WHERE bunch_id =" . $_GET['bid'] . "");

?>

<div id="member-list-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-md max-h-full ">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow member-modal transition-all duration-300">
      <!-- Modal header -->
      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
        <h3 class="text-md font-semibold text-gray-900">
          <?= $projects[0]['nama_proyek'] ?>
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="member-list-modal">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="p-4 md:p-5">
        <p class="text-black-500 mb-2 text-sm ml-2">Daftar Anggota:</p>
        <div class="bg-white border shadow border-gray-200 my-3 p-5 rounded-lg col-span-2">

          <ul class="max-w-full">
            <?php if (empty($get_all_members)) : ?>
              <p class="text-center text-gray-500 text-sm font-light">Belum memiliki anggota.</p>
            <?php endif; ?>
            <?php foreach ($get_all_members as $all) : ?>
              <li class="pb-3 sm:pb-4 mt-2.5 last:border-0 last:pb-0 first:mt-0 border-b border-gray-200">
                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                  <div class="flex-shrink-0">
                    <img class="w-8 h-8 rounded-full" src="../assets/img/<?= $all['gambar'] ?>" alt="">
                  </div>
                  <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate ">
                      <?= $all['nama_user'] ?>
                    </p>
                    <p class="text-sm text-gray-500 truncate">
                      <?= $all['member_id'] ?>
                    </p>
                  </div>
                  <div class="inline-flex items-center text-xs font-semibold text-gray-900 ">
                    <?= $all['role'] ?>
                  </div>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <button data-modal-toggle="member-list-modal" class="text-white inline-flex w-full justify-center bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
          Kembali
        </button>
      </div>
    </div>
  </div>
</div>