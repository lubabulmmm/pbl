<?php

require '../../query/query.php';

$project_id = $_GET['id'];

if (delete_project($project_id) > 0) {
  header("Location: projects-list.php?info=success");
} else {
  header("Location: projects-list.php?info=failed");
}
