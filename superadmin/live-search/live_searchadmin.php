<?php
require '../../query/query.php';

$itemsPerPage = 5; // limit

if (isset($_POST['keyword'])) {
  $keyword = $_POST['keyword'];

  $admins = execThis("SELECT * FROM user WHERE level = 'admin' AND (nama_user LIKE '%$keyword%' OR email LIKE '%$keyword%' OR id LIKE '%$keyword%')");

  // $itemsPerPage
  $admins = array_slice($admins, 0, $itemsPerPage);

  // Output JSON
  header('Content-Type: application/json');
  echo json_encode($admins);
}
?>
