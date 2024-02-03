<?php
require "../query/query.php";

if (update_to_yes($_GET['bid']) > 0) {
  header("Location: ./submit-projects.php?info=success&id=" . $_GET['id'] . "&bid=" . $_GET['bid'] . "");
} else {
  header("Location: ./submit-projects.php?info=failed&id=" . $_GET['id'] . "&bid=" . $_GET['bid'] . "");
}
