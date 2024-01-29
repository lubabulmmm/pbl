<?php
// live_searchadmin.php

require '../../query/query.php';

if (isset($_POST['keyword'])) {
  $keyword = $_POST['keyword'];

  $admins = execThis("SELECT * FROM user WHERE level = 'admin' AND (nama_user LIKE '%$keyword%' OR email LIKE '%$keyword%' OR id LIKE '%$keyword%')");

  // Output JSON
  header('Content-Type: application/json');
  echo json_encode($admins);
}
