<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
  <div class="px-3 py-3 sm:py-3 lg:px-6 lg:pl-3">
    <div class="flex items-center justify-between px-3">
      <div class="flex items-center justify-start">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-blue-900 sm:hidden rounded-lg hover:bg-amber-500 focus:outline-none focus:ring-1 focus:ring-gray-200">
          <span class="sr-only">Open sidebar</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
          </svg>
        </button>
        <a href="#" class="flex ml-2 md:mr-24 items-center">
          <img src="/pbl/assets/img/logo.png" class="h-8 mr-3" alt="PBL Logo" />
          <span class="self-center text-lg text-blue-900 font-semibold sm:text-xl whitespace-nowrap logo-text">PBL Vokasi | <span class="text-amber-500 text-lg">PIC</span></span>
        </a>
      </div>
      <div class="flex items-center">
        <div class="name px-3 text-sm">Hai, <?= $_SESSION['nama_user'] ?></div>
        <div class="flex items-center ml-3">
          <div>
            <button type="button" class="flex text-sm bg-amber-500 rounded-full focus:ring-4 focus:ring-blue-300" aria-expanded="false" data-dropdown-toggle="dropdown-user">
              <span class="sr-only">Open user menu</span>
              <img class="w-9 h-9 rounded-full" src="/pbl/assets/img/<?= $_SESSION['gambar'] ?>" alt="user photo">
            </button>
          </div>
          <div class="z-50 hidden my-4 text-base text-gray-900 list-none divide-y rounded shadow-lg bg-white divide-gray-300" id="dropdown-user">
            <div class="px-4 py-3" role="none">
              <p class="text-sm text-gray-900" role="none">
                <?= $_SESSION['nama_user'] ?>
              </p>
              <p class="text-sm font-medium text-gray-900 truncate" role="none">
                <?= $_SESSION['email'] ?>
              </p>
            </div>
            <ul class="py-1" role="none">
              <li>
                <a href="/PBL/user/logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 " role="menuitem">Keluar</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>