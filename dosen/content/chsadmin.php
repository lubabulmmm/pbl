<?php

$projects = execThis("SELECT id_user, deskripsi_proyek, id_proyek, pict, nama_proyek, nama_user FROM proyek JOIN user ON user.email = proyek.id_user WHERE id_user = '" . $_SESSION['email'] . "'");

?>

<h2 class="text-xl self-start font-medium px-7 w-full">Daftar Proyek</h2>

<div class="py-8 px-4 max-w-screen-xl lg:py-6 lg:px-6">
  <div class="grid gap-8 lg:grid-cols-2">
    <?php if (empty($projects)) : ?>
      <a href="./add-projects.php" class="flex py-5 flex-col items-center justify-center bg-white w-full lg:w-3/12 border rounded-lg shadow hover:scale-105 transition duration-300 hover:shadow-sm hover:shadow-blue-100 shadow-blue-200">
        <svg class="w-12 h-12 text-blue-800 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 7.8v8.4M7.8 12h8.4m4.8 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <p class="w-full text-sm text-center mt-2.5 text-blue-800">Tambah Proyek</p>
      </a>
    <?php endif; ?>
    <?php foreach ($projects as $upm) : ?>
      <a href="./kelproj.php?id=<?= $upm['id_proyek'] ?>" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
        <img class="p-4 object-cover w-full rounded-t-lg h-96 md:h-auto md:w-40 md:rounded-none md:rounded-s-lg" src="../assets/img/<?= $upm['pict'] ?>.svg" alt="">
        <div class="flex flex-col justify-between p-4 leading-normal">
          <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900"><?= $upm['nama_proyek'] ?><span class="bg-purple-800 text-purple-200 text-xs font-medium me-2 ml-1.5 px-2.5 py-0.5 rounded"><?= $upm['id_proyek'] ?></span></h5>
          <div class="mb-3 font-normal text-sm text-gray-700">
            <p class="hover:underline  text-blue-700 text-md font-semibold flex align-center">Kunjungi Proyek <svg class="w-5 h-5 text-blue-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
              </svg></p>
          </div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</div>