<?php
require '../../query/query.php';

if (isset($_POST["keyword"])) {
    $keyword = $_POST["keyword"];
    $users = execThis("SELECT * FROM user WHERE level = 'user' AND (nama_user LIKE '%$keyword%' OR email LIKE '%$keyword%' OR id LIKE '%$keyword%')");
    echo json_encode($users);
} else {
    echo json_encode([]);
}
