<?php

require '../query/query.php';

$request_id = $_GET['rid'];

if (delete_member($request_id, $_GET['bid']) > 0) {
  header("Location: ./request.php?bid=" . $_GET['bid'] . "&id=" . $_GET['id'] . "&rinfo=200");
} else {
  header("Location: ./request.php?bid=" . $_GET['bid'] . "&id=" . $_GET['id'] . "&rinfo=404");
}
