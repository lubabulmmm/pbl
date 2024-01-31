<?php

require '../query/query.php';

$request_id = $_GET['rid'];

if (reject_request($request_id) > 0) {
  header("Location: ./request.php?bid=" . $_GET['bid'] . "&id=" . $_GET['id'] . "&rinfo=200");
} else {
  header("Location: ./request.php?bid=" . $_GET['bid'] . "&id=" . $_GET['id'] . "&rinfo=404");
}
