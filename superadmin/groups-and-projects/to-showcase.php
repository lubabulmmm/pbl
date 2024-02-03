<?php
require "../../query/query.php";

if (update_to_yes($_GET['bid']) > 0) {
  header("Location: ./submitted.php?info=success&tid=" . $task_id . "&id=" . $_GET['id'] . "&bid=" . $_GET['bid'] . "");
} else {
  header("Location: ./submitted.php?info=failed&tid=" . $task_id . "&id=" . $_GET['id'] . "&bid=" . $_GET['bid'] . "");
}
