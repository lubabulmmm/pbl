<?php

require '../query/query.php';

$user_id = $_GET['id'];

if (delete_user($user_id) > 0) {
  header("Location: admin.php?info=success");
} else {
  header("Location: admin.php?info=failed");
}
