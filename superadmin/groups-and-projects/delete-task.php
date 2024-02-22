<?php

require '../../query/query.php';

$project_id = $_GET['tid'];

if (delete_task($project_id) > 0) {
  header("Location: list-task.php?bid=" . $_GET['bid'] . "&info=success");
} else {
  header("Location: list-task.php?bid=" . $_GET['bid'] . "&info=failed");
}
