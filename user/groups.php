<?php

session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
}

if (isset($_SESSION["level"])) {
  if ($_SESSION["level"] == "superadmin") {
    header("Location: /PBL/superadmin/superadmin.php");
    exit;
  } elseif ($_SESSION["level"] == "admin") {
    header("Location: /PBL/dosen/dashadmin.php");
    exit;
  }
}

require "../query/query.php";

$list_bunch = execThis('SELECT bunch_id, bunch_name, leader.nama_user AS leader_name, nama_proyek, observer.nama_user AS observer_name, proyek.id_proyek FROM bunch INNER JOIN proyek ON bunch.project_id = proyek.id_proyek INNER JOIN user AS leader ON bunch.leader_id = leader.email INNER JOIN user AS observer ON proyek.id_user = observer.email');

if (isset($_POST['search'])) {
  $keyword = $_POST['keyword'];


  $searchQuery = "SELECT bunch_id, bunch_name, leader.nama_user AS leader_name, 
                  nama_proyek, observer.nama_user AS observer_name, proyek.id_proyek 
                  FROM bunch 
                  INNER JOIN proyek ON bunch.project_id = proyek.id_proyek 
                  INNER JOIN user AS leader ON bunch.leader_id = leader.email 
                  INNER JOIN user AS observer ON proyek.id_user = observer.email 
                  WHERE bunch_name LIKE '%$searchTerm%' 
                  OR nama_proyek LIKE '%$searchTerm%' 
                  OR leader.nama_user LIKE '%$searchTerm%' 
                  OR observer.nama_user LIKE '%$searchTerm%'";

  $list_bunch = execThis($searchQuery);
} else {
  // Use the original query if search form is not submitted
  $list_bunch = execThis('SELECT bunch_id, bunch_name, leader.nama_user AS leader_name, 
                          nama_proyek, observer.nama_user AS observer_name, proyek.id_proyek 
                          FROM bunch 
                          INNER JOIN proyek ON bunch.project_id = proyek.id_proyek 
                          INNER JOIN user AS leader ON bunch.leader_id = leader.email 
                          INNER JOIN user AS observer ON proyek.id_user = observer.email');
}



$itemsPerPage = 5;


$totalPages = ceil(count($list_bunch) / $itemsPerPage);

$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$offset = ($current_page - 1) * $itemsPerPage;

$list_bunchOnCurrentPage = array_slice($list_bunch, $offset, $itemsPerPage);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/img/favicon/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <title>Temukan Kelompokmu | PBL Vokasi</title>
  <?php include("./includes/head.php") ?>
</head>

<body class="">

  <?php include("./includes/navbar.php") ?>

  <!-- Side Bar -->
  <?php include("./includes/aside.php") ?>
  <div class="p-4 sm:ml-64">
    <!-- important -->
    <div class="rounded-lg mt-14 flex flex-col item-start">

      <section class="bg-white p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
          <nav class="flex my-10" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
              <li class="inline-flex items-center">
                <a href="./dashboard.php" class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-amber-500">
                  <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                  </svg>
                  Beranda
                </a>
              </li>
              <li aria-current="page">
                <div class="flex items-center">
                  <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                  </svg>
                  <span class="ms-1 text-lg font-medium text-amber-500 md:ms-2">Cari Kelompok</span>
                </div>
              </li>
            </ol>
            <div class="flex items-center flex-wrap ml-auto">
                <a href="dashboard.php" type="button" class="text-white bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
                  <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                  </svg>
                  Kembali
                </a>
              </div>
          </nav>

          
          <!-- Start coding here -->
          <div class="bg-white relative shadow sm:rounded-lg rounded-lg overflow-hidden border border-gray-200">
            <div class="bg-white flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

              <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">

                <h2 class="text-xl font-semibold text-blue-700">Cari Dan Temukan Kelompok</h2>
              </div>

              <div class="w-full md:w-1/2">
                <form method="post" action="" class="flex items-center">
                  <label for="simple-search" class="sr-only">Search</label>
                  <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                      </svg>
                    </div>
                    <!-- Correct the input ID to match the jQuery selector -->
                    <input type="text" name="keyword" id="simple-search" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-amber-500 block w-full pl-10 p-2 mr-3" placeholder="Cari" required="">
                  </div>

                  <button type="submit" name="search" class="flex items-center justify-center text-white bg-green-600 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 ml-4">
                    <svg class="h-3.5 w-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    Cari
                  </button>
                </form>
              </div>

            </div>
            <div class="overflow-x-auto">
              <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-blue-700 border-b uppercase bg-white">
                  <tr>
                    <th scope="col" class="lg:px-4 lg:py-3 px-2 py-3">No</th>
                    <th scope="col" class="lg:px-4 lg:py-3 px-2 py-3">Judul</th>
                    <th scope="col" class="lg:px-4 lg:py-3 px-2 py-3">Kelompok</th>
                    <th scope="col" class="lg:px-4 lg:py-3 px-2 py-3">Ketua Kelompok (PM)</th>
                    <th scope="col" class="lg:px-4 lg:py-3 px-2 py-3">Dosen PIC</th>
                    <th scope="col" class="lg:px-4 lg:py-3 px-2 py-3">
                      <span class="sr-only">Action</span>
                    </th>
                  </tr>
                </thead>
                <?php $count = ($current_page - 1) * $itemsPerPage + 1; ?>
                <tbody>
                  <?php foreach ($list_bunchOnCurrentPage as $lb) : ?>
                    <tr class="border-b hover:bg-gray-100">
                      <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap"><?= $count++ ?>.</th>
                      <td class="px-4 py-3"><?= $lb['nama_proyek'] ?></td>
                      <td class="px-4 py-3"><?= $lb['bunch_name'] ?></td>
                      <td class="px-4 py-3"><?= $lb['leader_name'] ?></td>
                      <td class="px-4 py-3"><?= $lb['observer_name'] ?></td>
                      <td class="px-4 py-3">
                        <a href="./detail-kelompok.php?bid=<?= $lb['bunch_id'] ?>&id=<?= $lb['id_proyek'] ?>" type="button" class="text-blue-700 border-2 border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center">
                          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9h2v5m-2 0h4M9.408 5.5h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                          </svg>
                          <span class="sr-only">Icon description</span>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <nav class="flex flex-col justify-between items-start md:items-end space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
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

  <!-- ... (your previous HTML code) ... -->

  <!-- ... (your previous HTML code) ... -->

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> <!-- Include jQuery library -->

  <script>
    $(document).ready(function() {

      $('form').submit(function(e) {
        e.preventDefault();
        liveSearch();
      });

      // Correct the input ID to match the jQuery selector
      $('#simple-search').on('input', function() {
        liveSearch();
      });

      function liveSearch() {
        // Correct the input ID to match the jQuery selector
        var keyword = $('#simple-search').val();

        $.ajax({
          type: 'POST',
          url: 'live_searchkel.php',
          data: {
            keyword: keyword
          },
          dataType: 'json',
          success: function(data) {
            updateTable(data);
          }
        });
      }

      function updateTable(projects) {
        var tableBody = $('tbody');
        tableBody.empty();

        $.each(projects, function(index, project) {
          var count = index + 1;

          var row = `<tr class="border-b hover:bg-gray-100">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">${count}.</th>
                            <td class="px-4 py-3">${project['nama_proyek']}</td>
                            <td class="px-4 py-3">${project['bunch_name']}</td>
                            <td class="px-4 py-3">${project['leader_name']}</td>
                            <td class="px-4 py-3">${project['observer_name']}</td>
                            <td class="px-4 py-3">
                                <a href="./detail-kelompok.php?bid=${project['bunch_id']}&id=${project['id_proyek']}" type="button" class="text-blue-700 border-2 border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9h2v5m-2 0h4M9.408 5.5h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <span class="sr-only">Icon description</span>
                                </a>
                            </td>
                        </tr>`;

          tableBody.append(row);
        });
      }
    });
  </script>

  <!-- ... (your previous HTML code) ... -->






  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>