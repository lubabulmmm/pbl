<?php

require '../query/query.php';

$task_id = $_GET['tid'];
$category = $_GET['category'];

if (update_task($task_id, $category) > 0) {
  header("Location: ./details-progress.php?info=success&tid=$task_id");
} else {
  header("Location: ./details-progress.php?info=failed&tid=$task_id");
}
