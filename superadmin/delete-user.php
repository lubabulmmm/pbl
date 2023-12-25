<?php 

require '../query/query.php';

$user_id = $_GET['id'];

  if (delete_user($user_id) > 0) {
    header("Location: users.php?info=success");
  } else {
    header("Location: users.php?info=failed");
  }


?>