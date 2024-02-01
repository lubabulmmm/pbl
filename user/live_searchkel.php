<?php

// Include your database connection or query file here
require "../query/query.php";
$itemsPerPage = 5; // limit

if (isset($_POST['keyword'])) {
    $searchTerm = $_POST['keyword'];

    // Modify the query to match your database structure
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

    $searchResults = execThis($searchQuery);
    
    // Correct variable name for array_slice
    $searchResults = array_slice($searchResults, 0, $itemsPerPage);

    // Return the results as JSON
    echo json_encode($searchResults);
}

?>
