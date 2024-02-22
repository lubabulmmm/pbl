<?php

$pagename = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);

if ($pagename == 'todo_add.php'  || $pagename == 'doing_add.php' || $pagename == 'done_add.php') {
   require_once '../../query/query.php';
} else {
   require_once "../query/query.php";
}



$user_projects_pm = execThis("SELECT bunch.bunch_id, project_id, bunch_name, nama_proyek FROM bunch INNER JOIN proyek ON bunch.project_id = proyek.id_proyek WHERE leader_id = '" . $_SESSION['email'] . "'");

$user_projects_member = execThis("SELECT bunch.bunch_id, project_id, bunch_name, nama_proyek FROM bunch INNER JOIN proyek ON bunch.project_id = proyek.id_proyek INNER JOIN bunch_member ON bunch.bunch_id = bunch_member.bunch_id WHERE bunch_member.member_id = '" . $_SESSION['email'] . "'");



?>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 px-4 transition-transform -translate-x-full bg-white border-r shadow-sm border-gray-200 sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-1 pb-6 overflow-y-auto bg-white flex flex-col justify-between align-center">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="/PBL/user/dashboard.php" class="flex
            <?= $pagename == 'dashboard.php' ? 'bg-blue-50' : '' ?>
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
               <span class="flex-1 ml-4 text-left whitespace-nowrap">Proyek Kamu</span>
               <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m1 1 4 4 4-4" />
               </svg>
            </button>
            <ul id="dropdown-example" class="<?= ($pagename == 'projects.php' || $pagename == 'details-anggota.php' || $pagename == 'details-progress.php' || $pagename == 'submit-projects.php' || $pagename == 'request.php' || $pagename == 'todo_add.php'  || $pagename == 'doing_add.php' || $pagename == 'done_add.php' || $pagename == 'edit-progress.php') ? '' : 'hidden' ?> py-2 space-y-2 duration-300">
               <?php foreach ($user_projects_pm as $upm) : ?>
                  <li>
                     <a href="/PBL/user/projects.php?bid=<?= $upm['bunch_id'] ?>&id=<?= $upm['project_id'] ?>" class="flex 
                     <?php if ($pagename == 'projects.php' || $pagename == 'details-anggota.php' || $pagename == 'details-progress.php' || $pagename == 'submit-projects.php' || $pagename == 'request.php' || $pagename == 'todo_add.php'  || $pagename == 'doing_add.php' || $pagename == 'done_add.php' || $pagename == 'edit-progress.php') : ?>
                     <?=
                        $_GET['id'] == $upm['project_id'] ? 'bg-blue-50' : ''
                     ?>
                     <?php endif; ?>
                     items-center w-full hover:bg-blue-50 py-2 px-3 font-medium text-blue-800 text-sm transition duration-75 rounded-lg pl-11 group "><?= $upm['nama_proyek'] ?></a>
                  </li>
               <?php endforeach; ?>
               <?php foreach ($user_projects_member as $u_member) : ?>
                  <li>
                     <a href="/PBL/user/projects.php?bid=<?= $u_member['bunch_id'] ?>&id=<?= $u_member['project_id'] ?>" class="flex 
                     <?php if ($pagename == 'projects.php' || $pagename == 'details-anggota.php' || $pagename == 'details-progress.php' || $pagename == 'submit-projects.php' || $pagename == 'request.php' || $pagename == 'todo_add.php'  || $pagename == 'doing_add.php' || $pagename == 'done_add.php' || $pagename == 'edit-progress.php') : ?>
                     <?=
                        $_GET['id'] == $u_member['project_id'] ? 'bg-blue-50' : ''
                     ?>
                     <?php endif; ?>
                      items-center w-full hover:bg-blue-50 py-2 px-3 font-medium text-blue-800 text-sm transition duration-75 rounded-lg pl-11 group "><?= $u_member['nama_proyek'] ?></a>
                  </li>
               <?php endforeach; ?>
            </ul>
         </li>
         <li>
            <a href="/PBL/user/profile.php" class="flex
            <?= $pagename == 'profile.php' ? 'bg-blue-50' : '' ?>
            items-center hover:bg-blue-50 py-2 px-3 font-medium text-blue-800 text-sm rounded-lg  group">
               <svg class="flex-shrink-0 w-4 h-4 text-blue-800 text-sm transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-2 3h4a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
               </svg>
               <span class="flex-1 ml-4 whitespace-nowrap">Profil</span>
            </a>
         </li>
         <li>
            <a href="/PBL/user/showcase.php" class="flex items-center hover:bg-blue-50 py-2 px-3 font-medium text-blue-800 text-sm rounded-lg  group">
               <svg class="flex-shrink-0 w-4 h-4 text-blue-800 text-sm transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 5h1v12a2 2 0 0 1-2 2m0 0a2 2 0 0 1-2-2V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v15a2 2 0 0 0 2 2h14ZM10 4h2m-2 3h2m-8 3h8m-8 3h8m-8 3h8M4 4h3v3H4V4Z" />
               </svg>
               <span class="flex-1 ml-4 whitespace-nowrap">Showcase PBL</span>
            </a>
         </li>
         <li>
            <a href="/PBL/user/logout.php" class="flex items-center hover:bg-blue-50 py-2 px-3 font-medium text-blue-800 text-sm rounded-lg  group">
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