<?php

require '../query/query.php';
$itemsPerPage = 5; // limit

if (isset($_POST["keyword"])) {
    $keyword = $_POST["keyword"];

    $query = "SELECT bunch_id, bunch_name, leader.nama_user AS leader_name, nama_proyek, observer.nama_user AS observer_name 
              FROM bunch 
              INNER JOIN proyek ON bunch.project_id = proyek.id_proyek 
              INNER JOIN user AS leader ON bunch.leader_id = leader.email 
              INNER JOIN user AS observer ON proyek.id_user = observer.email 
              WHERE bunch_name LIKE '%$keyword%' OR nama_proyek LIKE '%$keyword%' OR leader.nama_user LIKE '%$keyword%' OR observer.nama_user LIKE '%$keyword%'";

    $result = execThis($query);
    $result = array_slice($result, 0, $itemsPerPage);

    // Return the results as JSON
    header('Content-Type: application/json');
    echo json_encode($result);
    exit;
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

            // request to live_searchsuper.php
            $.ajax({
                type: 'POST',
                url: 'live_searchsuper.php',
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
            <td class="px-4 py-3">${project.bunch_name}</td>
            <td class="px-4 py-3">${project.leader_name}</td>
            <td class="px-4 py-3">${project.observer_name}</td>
            <td class="px-4 py-3">
            <a href="./groups-and-projects/details.php?bid=<?= $lb['bunch_id'] ?>" type="button" class="text-blue-700 border-2 border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center">
                          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9h2v5m-2 0h4M9.408 5.5h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                          </svg>
                          <span class="sr-only">Icon description</span>
                        </a>
                        <a href="./groups-and-projects/delete-bunch.php?bid=<?= $lb['bunch_id'] ?>" type="button" class="text-red-700 border-2 border-red-700 hover:bg-red-700 hover:text-white ml-2 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center">
                          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
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