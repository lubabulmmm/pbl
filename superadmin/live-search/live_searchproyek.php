<?php

require '../../query/query.php';

$itemsPerPage = 5; // Set the desired limit

if (isset($_POST['keyword'])) {
  $searchTerm = $_POST['keyword'];

  $allProjects = execThis("SELECT nama_proyek, nama_user, id_proyek, status_show FROM proyek INNER JOIN user ON proyek.id_user = user.email");

  $filteredProjects = array_filter($allProjects, function ($project) use ($searchTerm) {
    $searchTerm = strtolower($searchTerm);

    return (
      stripos($project['id_proyek'], $searchTerm) !== false ||
      stripos($project['nama_proyek'], $searchTerm) !== false ||
      stripos($project['nama_user'], $searchTerm) !== false
    );

  });

  // Limit the results to $itemsPerPage
  $filteredProjects = array_slice($filteredProjects, 0, $itemsPerPage);

  echo json_encode(array_values($filteredProjects));
}
?>
<script>
  $(document).ready(function () {

    $('form').submit(function (e) {
      e.preventDefault();
      liveSearch();
    });

    // input
    $('#simple-search').on('input', function () {
      liveSearch();
    });

    function liveSearch() {
      // keyword
      var keyword = $('#simple-search').val();

      // request to live_searchproyek.php
      $.ajax({
        type: 'POST',
        url: 'live_searchproyek.php',
        data: {
          keyword: keyword
        },
        dataType: 'json',
        success: function (data) {
          updateTable(data);
        }
      });
    }

    function updateTable(projects) {
      var tableBody = $('tbody');
      tableBody.empty();

      // table
      $.each(projects, function (index, project) {
        var row = `<tr class="border-b hover:bg-gray-100">
            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">${index + 1}</th>
            <td class="px-4 py-3">${project.nama_proyek}</td>
            <td class="px-4 py-3">${project.nama_user}</td>  
            <td class="px-4 py-3"><span class="text-amber-500 font-semibold">0</span>/8</td>                    
            <td class="px-4 py-3">
              <a href="./details-projects.php?id=${project.id_proyek}" type="button" class="text-blue-700 border-2 border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center">
              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9h2v5m-2 0h4M9.408 5.5h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                          </svg>
                          <span class="sr-only">Icon info</span>
              </a>
              <a href="./edits-projects.php" type="button" class="text-amber-500 border-2 border-amber-500 hover:bg-amber-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center my-1 lg:m-1">
                          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                            <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                          </svg>
                          <span class="sr-only">Icon edit</span>
                        </a>                        
                        <a href="./delete-projects.php?id=<?= $project['id_proyek'] ?>" type="button" class="text-red-700 border-2 border-red-700 hover:bg-red-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center">
                          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                          </svg>
                          <span class="sr-only">Icon trash</span>
                        </a>
            </td>
          </tr>`;

        tableBody.append(row);
      });
    }

  });
</script>