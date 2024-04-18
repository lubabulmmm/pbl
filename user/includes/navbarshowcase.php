<header class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full border-b border-gray-200 text-sm py-3 sm:py-0 sticky top-0 left-0 backdrop-blur-md">
  <nav class="relative max-w-[85rem] w-full mx-auto px-4  sm:flex sm:items-center sm:justify-between" aria-label="Global">
    <div class="flex items-center justify-between">
      <a class="flex items-center" href="/pbl" aria-label="Brand">
        <img src="/pbl/assets/img/logo.png" class="h-8 mr-3" alt="Logo" />
        <span class="self-center text-lg text-blue-900 font-semibold sm:text-xl whitespace-nowrap logo-text">PBL Vokasi</span>
      </a>
      <div class="sm:hidden">
        <button type="button" class="hs-collapse-toggle size-9 flex justify-center items-center text-sm font-semibold rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
          <svg class="hs-collapse-open:hidden size-4" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
          </svg>
          <svg class="hs-collapse-open:block flex-shrink-0 hidden size-4" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
          </svg>
        </button>
      </div>
    </div>
    <div id="navbar-collapse-with-animation" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
      <div class="flex flex-col gap-y-4 gap-x-0 mt-5 sm:flex-row sm:items-center sm:justify-end sm:gap-y-0 sm:gap-x-7 sm:mt-0 sm:ps-7">
        <a class="font-medium text-gray-800 hover:text-blue-600 sm:py-6" href="/pbl/#tentang">Tentang</a>
        <a class="font-medium text-gray-800 hover:text-blue-600 sm:py-6" href="/pbl/user/showcase.php">Showcase</a>

        <?php if (isset($_SESSION["login"])) { ?>
          <!-- Profile dropdown -->
          <div class="inline-flex ml-2 justify-center items-center mr-1.5">
            <button type="button" class="flex text-sm bg-amber-500 rounded-full focus:ring-4 focus:ring-amber-300" aria-expanded="false" data-dropdown-toggle="dropdown-user">
              <span class="sr-only">Open user menu</span>
              <img class="w-9 h-9 rounded-full " src="/pbl/assets/img/<?= $_SESSION["gambar"] ?>" alt="user photo">
            </button>

          </div>

          <div class="z-50 hidden my-4 text-base text-gray-900 list-none divide-y rounded shadow-lg bg-white divide-gray-300" id="dropdown-user">
            <div class="px-4 py-3" role="none">
              <p class="text-sm text-gray-900" role="none"><?= $_SESSION["nama_user"] ?>
              </p>
              <p class="text-sm font-medium text-gray-900 truncate" role="none"><?= $_SESSION["email"] ?>
              </p>
            </div>
            <ul class="py-1" role="none">
              <li>
                <a href="/PBL/user/dashboard.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 " role="menuitem">Dashboard</a>
              </li>
              <li>
                <a href="/PBL/user/logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 " role="menuitem">Keluar</a>
              </li>
            </ul>
          </div>

          <!-- DROP DOWN -->
          <div class="hidden pfpMenu absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-violet-200 py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none duration-300 ease-in-out" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <a href="./dashboard.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-violet-500 hover:text-white" role="menuitem" tabindex="-1" id="user-menu-item-0">Dashboard</a>
            <a href="./logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-violet-500 hover:text-white" role="menuitem" tabindex="-1" id="user-menu-item-2">Logout</a>
          </div>
        <?php } else { ?>
          <a class="flex items-center gap-x-2 font-medium text-white bg-gradient-to-tl from-amber-500 to-amber-400 py-1.5 px-3.5 sm:my-6 rounded-2xl" href="/pbl/user/login.php">

            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
            </svg>
            Log in
          </a>
        <?php } ?>
      </div>
    </div>
  </nav>
</header>