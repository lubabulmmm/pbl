<nav class="sticky top-0 l-0 w-full bg-white z-50">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" class="mMenu relative inline-flex items-center justify-center rounded-md p-2 text-amber-500 hover:bg-amber-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
          <img class="h-8 w-auto" src="/pbl/assets/img/logo.png" alt="Your Company">
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="../index.php" class="rounded-md px-3 py-2 text-md font-medium hover:text-amber-500 z-50" aria-current="page">Beranda</a>
            <!-- <a href="../index.php/#tentang" class=" hover:text-amber-500 z-50 rounded-md px-3 py-2 text-md font-medium">Tentang</a> -->
            <a href="./user/showcase.php" class="bg-amber-500 text-white rounded-md px-3 py-2 text-md font-medium">Showcase PBL</a>
          </div>
        </div>
      </div>

      <!-- Profile dropdown -->
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <!-- HERE -->
        <?php if (isset($_SESSION["login"])) { ?>
          <span class="text-sm mx-2">Hi, <?= $_SESSION["nama_user"] ?></span>

          <!-- Profile dropdown -->
          <div>
            <button type="button" class="flex text-sm bg-amber-500 rounded-full focus:ring-4 focus:ring-amber-300" aria-expanded="false" data-dropdown-toggle="dropdown-user">
              <span class="sr-only">Open user menu</span>
              <img class="w-9 h-9 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="user photo">
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
      </div>
      <a href="./user/login.php" class="hidden inline-flex items-center px-4 py-2 text-md font-medium text-center text-gray-800 rounded-lg hover:bg-amber-500 focus:ring-4 focus:outline-none ">Login</a>
    <?php } else { ?>
      <a href="./user/login.php" class="inline-flex items-center px-4 py-2 text-md font-medium text-center text-gray-800  rounded-lg hover:bg-amber-500 focus:ring-4 focus:outline-none ">Login</a>
    <?php } ?>
    </div>
  </div>
  </div>


  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden navHam hidden duration-300 ease-in-out" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2 duration-300 ease-in-out">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="../index.php" class="rounded-md px-3 py-2 text-md font-medium hover:text-amber-500 z-50" aria-current="page">Beranda</a>
      <!-- <a href="../index.php/#tentang" class=" hover:text-amber-500 z-50 rounded-md px-3 py-2 text-md font-medium">Tentang</a> -->
      <a href="./user/showcase.php" class="bg-amber-500 text-white rounded-md px-3 py-2 text-md font-medium">Showcase PBL</a>
    </div>
  </div>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
<script src="../js/script.js"></script>