<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-5 px-3 transition-transform -translate-x-full bg-blue-900 border-r border-gray-200 sm:translate-x-0 dark:border-gray-200" aria-label="Sidebar">
    <div class="h-full px-1 pb-4 overflow-y-auto bg-blue-900">
       <ul class="space-y-2 font-medium">
         <li>
            <img src="/PBL/assets/img/vokasi.png" alt="" srcset="">
         </li>
         <li>
            <a href="/PBL/superadmin/superadmin.php" class="flex items-center od py-2 px-3 font-medium text-white rounded-lg hover:bg-white-200 group">
            <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8v10a1 1 0 0 0 1 1h4v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5h4a1 1 0 0 0 1-1V8M1 10l9-9 9 9"/>
            </svg>
               <span class="ml-4">Beranda</span>
            </a>
         </li>
         <li>
            <a href="/PBL/superadmin/users.php" class="flex items-center od py-2 px-3 font-medium text-white rounded-lg hover:bg-white-200 group">
               <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.656 12.115a3 3 0 0 1 5.682-.015M13 5h3m-3 3h3m-3 3h3M2 1h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Zm6.5 4.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
               </svg>
               <span class="ml-4">Mahasiswa</span>
            </a>
         </li>

         <!-- // ! Proyek --> 
         <li>
            <button type="button" class="flex items-center w-full od py-2 px-3 font-medium text-base text-white transition duration-75 rounded-lg group " aria-controls="dropdown-project" data-collapse-toggle="dropdown-project">
                  <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5h6M9 8h6m-6 3h6M4.996 5h.01m-.01 3h.01m-.01 3h.01M2 1h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z"/>
                  </svg>
                  <span class="flex-1 ml-4 text-left whitespace-nowrap">Proyek</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m1 1 4 4 4-4"/>
                  </svg>
            </button>
            <ul id="dropdown-project" class="hidden py-2 space-y-2 duration-300">
               <li>
                  <a href="/PBL/superadmin/groups-and-projects/projects-list.php" class="flex items-center w-full od py-2 px-3 font-medium text-white transition duration-75 rounded-lg pl-11 group ">Daftar Proyek</a>
               </li>
            </ul>
         </li> 
         <!-- // ! Admin --> 
         <li>
            <button type="button" class="flex items-center w-full od py-2 px-3 font-medium text-base text-white transition duration-75 rounded-lg group " aria-controls="dropdown-admin" data-collapse-toggle="dropdown-admin">
                  <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 3a3 3 0 1 1-1.614 5.53M15 12a4 4 0 0 1 4 4v1h-3.348M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
                  </svg>
                  <span class="flex-1 ml-4 text-left whitespace-nowrap">Admin</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m1 1 4 4 4-4"/>
                  </svg>
            </button>
            <ul id="dropdown-admin" class="hidden py-2 space-y-2 duration-300">
               <li>
                  <a href="./admin.php" class="flex items-center w-full od py-2 px-3 font-medium text-white transition duration-75 rounded-lg pl-11 group ">Daftar Admin</a>
               </li>
            </ul>
         </li> 
       </ul>
    </div>
 </aside>