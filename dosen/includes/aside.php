<?php

require_once '/xampp/htdocs/pbl/query/query.php';

$project_list = execThis("SELECT id_proyek, nama_proyek FROM proyek WHERE id_user = '" . $_SESSION['email'] . "' AND status_info = 'no archive'");

$pagename = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
?>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 px-4 transition-transform -translate-x-full bg-white border-r shadow-sm border-gray-200 sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-1 pb-6 overflow-y-auto bg-white flex flex-col justify-between align-center">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="/PBL/dosen/dashadmin.php" class="flex
            <?= $pagename == 'dashadmin.php' ? 'bg-blue-50' : '' ?>
            items-center hover:bg-blue-50 py-2 px-3 font-medium text-blue-800 text-sm rounded-lg group">
               <svg class="flex-shrink-0 w-4 h-4 text-blue-800 text-sm transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8v10a1 1 0 0 0 1 1h4v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5h4a1 1 0 0 0 1-1V8M1 10l9-9 9 9" />
               </svg>
               <span class="ml-4">Beranda</span>
            </a>
         </li>
         <li>
            <button type="button" class="flex items-center w-full hover:bg-blue-50 py-2 px-3 font-medium text-blue-800 text-sm transition duration-75 rounded-lg group " aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
               <svg class="flex-shrink-0 w-4 h-4 text-blue-800 text-sm transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.143 1H1.857A.857.857 0 0 0 1 1.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 7 6.143V1.857A.857.857 0 0 0 6.143 1Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 17 6.143V1.857A.857.857 0 0 0 16.143 1Zm-10 10H1.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 7 16.143v-4.286A.857.857 0 0 0 6.143 11Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
               </svg>
               <span class="flex-1 ml-4 text-left whitespace-nowrap">Proyek Mahasiswa</span>
               <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m1 1 4 4 4-4" />
               </svg>
            </button>
            <ul id="dropdown-example" class="<?= ($pagename == 'projects.php' || $pagename == 'details-anggota.php' || $pagename == 'details-progress.php' || $pagename == 'submit-projects.php' || $pagename == 'todo_add.php' || $pagename == 'doing_add.php' || $pagename == 'done_add.php' || $pagename == 'kelproj.php' || $pagename == 'edit-progress.php') ? '' : 'hidden' ?> py-2 space-y-2 duration-300">
               <?php foreach ($project_list as $project) : ?>
                  <li>
                     <a href="/PBL/dosen/kelproj.php?id=<?= $project['id_proyek'] ?>" class="flex 
                     <?php if ($pagename == 'projects.php' || $pagename == 'details-anggota.php' || $pagename == 'details-progress.php' || $pagename == 'submit-projects.php' || $pagename == 'todo_add.php' || $pagename == 'kelproj.php' || $pagename == 'doing_add.php' || $pagename == 'done_add.php' || $pagename == 'edit-progress.php') : ?>
                     <?=
                        $_GET['id'] == $project['id_proyek'] ? 'bg-blue-50' : ''
                     ?>
                     <?php endif; ?>
                     items-center w-full hover:bg-blue-50 py-2 px-3 font-medium text-blue-800 text-sm transition duration-75 rounded-lg pl-11 group "><?= $project['nama_proyek'] ?></a>
                  </li>
               <?php endforeach; ?>
            </ul>
         </li>
         <li>
            <a href="/PBL/user/profile.php" class="flex <?= $pagename == 'profile.php' ? 'bg-blue-50' : '' ?> items-center hover:bg-blue-50 py-2 px-3 font-medium text-blue-800 text-sm rounded-lg  group">
               <svg class="flex-shrink-0 w-4 h-4 text-blue-800 text-sm transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-2 3h4a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
               </svg>
               <span class="flex-1 ml-4 whitespace-nowrap">Profil</span>
            </a>
         </li>
         <li>
            <a href="/PBL/dosen/archive.php" class="flex items-center hover:bg-blue-50 py-2 px-3 font-medium text-blue-800 text-sm rounded-lg  group">
               <svg class="flex-shrink-0 w-4 h-4 text-blue-800 text-sm transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M10 12v1h4v-1m4 7H6a1 1 0 0 1-1-1V9h14v9a1 1 0 0 1-1 1ZM4 5h16c.6 0 1 .4 1 1v2c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1V6c0-.6.4-1 1-1Z" />
               </svg>
               <span class="flex-1 ml-4 whitespace-nowrap">Arsip Proyek</span>
            </a>
         </li>
         <li>
            <a href="/PBL/user/logout.php" class="flex items-center py-2 px-3 font-medium text-sm rounded-lg text-blue-800 hover:bg-blue-50 group">
               <svg class="flex-shrink-0 w-4 h-4 text-blue-800 text-sm transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3" />
               </svg>
               <span class="flex-1 ml-4 whitespace-nowrap">Keluar</span>
            </a>
         </li>
      </ul>
      <div>
         <p class="text-xs text-blue-800 text-center">&#169; Copyright 2024 by PBL Vokasi</p>
      </div>
   </div>
</aside>