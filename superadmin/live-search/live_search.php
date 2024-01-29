<?php
// live_searchadmin.php

require '../../query/query.php';

$itemsPerPage = 5; // Set the desired limit

if (isset($_POST['keyword'])) {
  $keyword = $_POST['keyword'];

  $users = execThis("SELECT * FROM user WHERE level = 'user' AND (nama_user LIKE '%$keyword%' OR email LIKE '%$keyword%' OR id LIKE '%$keyword%')");

  // Limit the results to $itemsPerPage
  $users = array_slice($users, 0, $itemsPerPage);

  // Output JSON
  header('Content-Type: application/json');
  echo json_encode($users);
}
?>
