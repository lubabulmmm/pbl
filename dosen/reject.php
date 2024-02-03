<?php

require '../query/query.php';

$request_id = $_GET['rid'];

if (reject_request_pm($request_id) > 0) {
  header("Location: ./request.php?id=" . $_GET['id'] . "&rinfo=200");
} else {
  header("Location: ./request-pm.php?id=" . $_GET['id'] . "&rinfo=404");
}
