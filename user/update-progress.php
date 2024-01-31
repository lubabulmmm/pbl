<?php

session_start();

require '../query/query.php';

$get_leader = execThis("SELECT * FROM bunch WHERE leader_id ='" . $_SESSION['email'] . "' AND project_id = " . $_GET['id'] . "");

$get_members = execThis("SELECT * FROM bunch_member WHERE member_id ='" . $_SESSION['email'] . "' AND bunch_id = " . $_GET['bid'] . "");

if (empty($get_leader) && empty($get_members)) {
  header("Location: restricted.php");
  exit;
}

$task_id = $_GET['tid'];
$category = $_GET['category'];
$bunch_id = $_GET['bid'];

if (update_task($task_id, $category) > 0) {
  header("Location: ./details-progress.php?info=success&tid=" . $task_id . "&id=" . $_GET['id'] . "&bid=" . $bunch_id . "");
} else {
  header("Location: ./details-progress.php?info=failed&tid=" . $task_id . "&id=" . $_GET['id'] . "&bid=" . $bunch_id . "");
}
