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
