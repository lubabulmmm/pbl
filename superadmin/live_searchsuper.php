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
