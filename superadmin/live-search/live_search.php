<?php
require '../../query/query.php';

$itemsPerPage = 5; // limit

if (isset($_POST['keyword'])) {
  $keyword = $_POST['keyword'];

  $users = execThis("SELECT * FROM user WHERE level = 'user' AND (nama_user LIKE '%$keyword%' OR email LIKE '%$keyword%' OR id LIKE '%$keyword%')");

  // $itemsPerPage
  $users = array_slice($users, 0, $itemsPerPage);

  // Output JSON
  header('Content-Type: application/json');
  echo json_encode($users);
}
?>

<script>
  $(document).ready(function () {

    // Fungsi untuk menangani submit form dan input dari pencarian langsung
    $('form').submit(function (e) {
      e.preventDefault();
      liveSearch();
    });

    $('#simple-search').on('input', function () {
      liveSearch();
    });

    function liveSearch() {
      var keyword = $('#simple-search').val();

      $.ajax({
        type: 'POST',
        url: './live-search/live_search.php',
        data: {
          keyword: keyword
        },
        dataType: 'json',
        success: function (data) {
          updateTable(data);
        }
      });
    }

    function updateTable(users) {
      var tableBody = $('#user-table tbody');
      tableBody.empty();

      // Loop melalui setiap pengguna yang ditemukan dan menambahkannya ke tabel
      $.each(users, function (index, user) {
        var row = `<tr class="border-b hover:bg-gray-100"> +
        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">${index + 1}</th>
        <td class="px-4 py-3">${user.id}</td>
        <td class="px-4 py-3">${user.nama_user}</td>
        <td class="px-4 py-3">${user.email}</td>
        <td class="px-4 py-3"> 
          <button type="button" class="text-red-700 border-2 border-red-700 hover:bg-red-700 hover:text-white ml-2 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center delete-button" data-user-id="${user.id}"> 
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
            </svg>
            <span class="sr-only">Icon Trash</span>
          </button>
          <?php include("./content/delete-modal.php") ?>
        </td> 
      </tr>`;
        tableBody.append(row);
      });

      // Menambahkan event listener ke tombol hapus setiap kali tabel diperbarui
      $('.delete-button').click(function () {
        var userId = $(this).data('user-id');
        var modalId = `#popup-modal-delete-${userId}`;
        $(modalId).addClass('active');

      });
    }
  });

</script>