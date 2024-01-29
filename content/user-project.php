<?php

$user_projects = execThis("SELECT bunch.bunch_id, project_id, nama_proyek, bunch_name FROM bunch INNER JOIN bunch_member ON bunch.bunch_id = bunch_member.bunch_id INNER JOIN proyek ON bunch.project_id = proyek.id_proyek WHERE bunch.leader_id = '" . $_SESSION['email'] . "' OR bunch_member.member_id = '" . $_SESSION['email'] . "'");

?>
<?php foreach ($user_projects as $up) : ?>
  <a href="./projects.php?bid=<?= $up['bunch_id'] ?>&id=<?= $up['project_id'] ?>" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
    <img class="p-4 object-cover w-full rounded-t-lg h-96 md:h-auto md:w-40 md:rounded-none md:rounded-s-lg" src="../assets/img/creative-work.svg" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
      <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900"><?= $up['nama_proyek'] ?> <span class="bg-purple-800 text-purple-200 text-xs font-medium me-2 ml-1.5 px-2.5 py-0.5 rounded"><?= $up['bunch_name'] ?></span></h5>
      <div class="mb-3 font-normal text-sm text-gray-700">
        <p class="hover:underline  text-amber-500 text-md font-semibold flex align-center">Kunjungi Proyek <svg class="w-5 h-5 text-amber-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
          </svg></p>
      </div>
    </div>
  </a>
<?php endforeach; ?>