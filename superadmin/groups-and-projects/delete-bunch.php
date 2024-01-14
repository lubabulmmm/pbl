<?php

require '../../query/query.php';

$bunch_id = $_GET['bid'];

if (delete_bunch($bunch_id) > 0) {
  header("Location: ../superadmin.php?info=success");
} else {
  header("Location: ../superadmin.php?info=failed");
}
