<?php

require '../../query/query.php';

$r_id = $_GET['rid'];

if (delete_role($r_id) > 0) {
  header("Location: cats-roles-list.php?info=success-delete");
} else {
  header("Location: cats-roles-list.php?info=failed-delete");
}
