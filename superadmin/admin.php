<?php

session_start();
if (!isset($_SESSION["login"])) {
  header("Location: /PBL/user/login.php");
}

if (isset($_SESSION["level"])) {
  if ($_SESSION["level"] == "user") {
    header("Location: /PBL/user/dashboard.php");
    exit;
  } elseif ($_SESSION["level"] == "admin") {
    header("Location: /PBL/dosen/dashadmin.php");
    exit;
  }
}

require '../query/query.php';

$admins = execThis("SELECT * FROM user WHERE level = 'admin'");

if (isset($_POST["keyword"])) {
  $keyword = $_POST["keyword"];


  $admins = execThis("SELECT * FROM user WHERE level = 'admin' AND (nama_user LIKE '%$keyword%' OR email LIKE '%$keyword%' OR id LIKE '%$keyword%')");
} else {

  $admins = execThis("SELECT * FROM user WHERE level = 'admin'");
}


$itemsPerPage = 5;

$totalPages = ceil(count($admins) / $itemsPerPage);

$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$offset = ($current_page - 1) * $itemsPerPage;

$adminsOnCurrentPage = array_slice($admins, $offset, $itemsPerPage);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Admin | PBL Vokasi</title>
  <?php include("../user/includes/head.php") ?>
</head>

<body class="bg-gray-50">

  <!-- SIDEBAR -->
  <?php include("./includes/aside.php") ?>

  <div class=" sm:ml-64">
    <!-- important -->
    <div class="rounded-lg flex flex-col item-start">

      <?php include("./includes/navbar.php") ?>

      <section class="bg-gray-50 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
          <nav class="flex my-10" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
              <li class="inline-flex items-center">
                <a href="#" class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-blue-900">
                  <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                  </svg>
                  Dosen
                </a>
              </li>
            </ol>
          </nav>

          <?php if (!empty($_GET['info'])) : ?>
            <!-- Berhasil Dihapus -->
            <?php if ($_GET['info'] == "success") : ?>
              <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                  Data berhasil di hapus!
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
                  <span class="sr-only">Close</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                  </svg>
                </button>
              </div>
            <?php endif; ?>

            <!-- Gagal Dihapus -->
            <?php if ($_GET['info'] == "failed") : ?>
              <div id="alert-3" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                  Data gagal di hapus!
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
                  <span class="sr-only">Close</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                  </svg>
                </button>
              </div>
            <?php endif; ?>

          <?php endif; ?>

          <!-- Start coding here -->
          <div class="bg-white relative shadow-md sm:rounded-lg rounded-lg overflow-hidden">
            <div class="bg-blue-900 flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

              <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">

                <h2 class="text-xl font-semibold text-white">Daftar Dosen</h2>
              </div>

              <div class="w-full md:w-1/2">
                <form class="flex items-center" method="POST">
                  <label for="simple-search" class="sr-only">Search</label>
                  <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                      </svg>
                    </div>
                    <input type="text" name="keyword" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-blue-900 block w-full pl-10 p-2 mr-3" placeholder="Cari Dosen">
                  </div>

                  <button type="submit" class="flex items-center justify-center text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 font-medium rounded-lg text-sm px-4 py-2 ml-4">
                    <svg class="h-3.5 w-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    Cari
                  </button>
                  <a href="./add-admin.php" type="button" class="flex items-center justify-center text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 ml-4">
                    <svg class="h-3.5 w-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 5.757v8.486M5.757 10h8.486M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Tambah
                  </a>
                </form>
              </div>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-50 uppercase bg-blue-900">
                  <tr>
                    <th scope="col" class="lg:px-4 lg:py-3 px-2 py-3">No</th>
                    <th scope="col" class="lg:px-4 lg:py-3 px-2 py-3">NIP</th>
                    <th scope="col" class="lg:px-4 lg:py-3 px-2 py-3">Nama</th>
                    <th scope="col" class="lg:px-4 lg:py-3 px-2 py-3">Email</th>
                    <th scope="col" class="lg:px-4 lg:py-3 px-2 py-3">
                      <span class="sr-only">Action</span>
                    </th>
                  </tr>
                </thead>
                <?php $count = ($current_page - 1) * $itemsPerPage + 1; ?>
                <tbody>
                  <?php foreach ($adminsOnCurrentPage as $admin) : ?>
                    <tr class="border-b hover:bg-gray-100">
                      <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap"><?= $count++; ?></th>
                      <td class="px-4 py-3"><?= $admin['id'] ?></td>
                      <td class="px-4 py-3"><?= $admin['nama_user'] ?></td>
                      <td class="px-4 py-3"><?= $admin['email'] ?></td>
                      <td class="px-4 py-3">
                        <a href="./delete-admin.php?id=<?= $admin['id'] ?>" type="button" class="text-red-700 border-2 border-red-700 hover:bg-red-700 hover:text-white ml-2 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center">
                          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                          </svg>
                          <span class="sr-only">Icon description</span>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>

            <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
              <span class="text-sm font-normal text-gray-500">
                Showing
                <span class="font-semibold text-gray-900"><?= $offset + 1 ?></span>
                to
                <span class="font-semibold text-gray-900"><?= min($offset + $itemsPerPage, count($admins)) ?></span>
                of
                <span class="font-semibold text-gray-900"><?= count($admins) ?></span>
              </span>
              <ul class="inline-flex items-stretch -space-x-px">
                <li>
                  <?php if ($current_page > 1) : ?>
                    <a href="?page=<?= $current_page - 1 ?>" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-blue-900 bg-white rounded-l-lg border border-blue-300 hover:bg-blue-100 hover:text-blue-700">
                      <span class="sr-only">Previous</span>
                      <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
                      </svg>
                    </a>
                  <?php else : ?>
                    <span class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 cursor-not-allowed">
                      <span class="sr-only">Previous</span>
                      <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
                      </svg>
                    </span>
                  <?php endif; ?>
                </li>
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                  <li>
                    <a href="?page=<?= $i ?>" class="flex items-center justify-center text-sm py-2 px-3 leading-tight <?php echo $current_page === $i ? 'text-blue-600 bg-blue-50' : 'text-blue-900 bg-white'; ?> border border-blue-300 hover:bg-blue-100 hover:text-blue-700">
                      <?= $i ?>
                    </a>
                  </li>
                <?php endfor; ?>
                <li>
                  <?php if ($current_page < $totalPages) : ?>
                    <a href="?page=<?= $current_page + 1 ?>" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-blue-900 bg-white rounded-r-lg border border-blue-300 hover:bg-blue-100 hover:text-blue-700">
                      <span class="sr-only">Next</span>
                      <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                      </svg>
                    </a>
                  <?php else : ?>
                    <span class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 cursor-not-allowed">
                      <span class="sr-only">Next</span>
                      <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                      </svg>
                    </span>
                  <?php endif; ?>
                </li>
              </ul>
            </nav>

          </div>
        </div>
      </section>

    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script>
    $(document).ready(function() {

      $('form').submit(function(e) {
        e.preventDefault();
        liveSearch();
      });

      // input
      $('#simple-search').on('input', function() {
        liveSearch();
      });

      function liveSearch() {
        // keyword
        var keyword = $('#simple-search').val();

        // request to live_searchadmin.php
        $.ajax({
          type: 'POST',
          url: './live-search/live_searchadmin.php',
          data: {
            keyword: keyword
          },
          dataType: 'json',
          success: function(data) {
            updateTable(data);
          }
        });
      }

      function updateTable(admins) {
        var tableBody = $('tbody');
        tableBody.empty();

        // table
        $.each(admins, function(index, admin) {
          var row = '<tr class="border-b hover:bg-gray-100">' +
            '<th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">' + (index + 1) + '</th>' +
            '<td class="px-4 py-3">' + admin.id + '</td>' +
            '<td class="px-4 py-3">' + admin.nama_user + '</td>' +
            '<td class="px-4 py-3">' + admin.email + '</td>' +
            '<td class="px-4 py-3">' +
            '<a href="./delete-admin.php?id=' + admin.id + '" type="button" class="text-red-700 border-2 border-red-700 hover:bg-red-700 hover:text-white ml-2 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center">' +
            '<svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">' +
            '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />' +
            '</svg>' +
            '<span class="sr-only">Icon description</span>' +
            '</a>' +
            '</td>' +
            '</tr>';
          tableBody.append(row);
        });
      }
    });
  </script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>