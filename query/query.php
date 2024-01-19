<?php

require 'connectdb.php';
date_default_timezone_set('Asia/Jakarta');
function execThis($query)
{
  global $conn;
  // Exectue Query
  $result = mysqli_query($conn, $query);
  $rows = [];
  // Fetch Data From Query
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function delete_user($id_user)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM user WHERE id = '$id_user'");

  return mysqli_affected_rows($conn);
}

function delete_project($id_user)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM proyek WHERE id_proyek = '$id_user'");

  return mysqli_affected_rows($conn);
}

function delete_bunch($id_bunch)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM bunch WHERE bunch_id = '$id_bunch'");

  return mysqli_affected_rows($conn);
}

function add_admin($data_admin)
{
  global $conn;
  $nama_dosen = htmlspecialchars($data_admin["nama_dosen"]);
  $id_user = htmlspecialchars($data_admin["nip"]);
  $email = htmlspecialchars($data_admin["email"]);
  $password = htmlspecialchars(mysqli_real_escape_string($conn, $data_admin["password"]));

  $password = password_hash($password, PASSWORD_DEFAULT);

  $sql_add_admin = "INSERT INTO user (email, id, nama_user, level, gambar, password) VALUES ('$email', '$id_user', '$nama_dosen', 'admin', 'profile.png', '$password')";

  mysqli_query($conn, $sql_add_admin);

  return mysqli_affected_rows($conn);
}

function add_user($data_mahasiswa)
{
  global $conn;
  $nama_dosen = htmlspecialchars($data_mahasiswa["name"]);
  $id_user = htmlspecialchars($data_mahasiswa["nim"]);
  $email = htmlspecialchars($data_mahasiswa["email"]);
  $password = htmlspecialchars(mysqli_real_escape_string($conn, $data_mahasiswa["password"]));

  $password = password_hash($password, PASSWORD_DEFAULT);

  $sql_add_user = "INSERT INTO user VALUES ('$email', '$id_user', '$nama_dosen', 'user', 'profile.png', '$password')";

  mysqli_query($conn, $sql_add_user);

  return mysqli_affected_rows($conn);
}

function add_project($data_project)
{
  global $conn;
  $nama_proyek = $data_project['name'];
  $dosen = $data_project['dosen'];
  $desc = $data_project['description'];
  $req = $data_project['features'];
  $minggu = $data_project['week'];

  $sql_add_projects = "INSERT INTO proyek (id_proyek, nama_proyek, deskripsi_proyek, id_user, req, minggu, status_show) VALUES ('', '$nama_proyek', '$desc', '$dosen', '$req', '$minggu', 'No')";


  mysqli_query($conn, $sql_add_projects);

  return mysqli_affected_rows($conn);
}

function add_this_project($data_project)
{
  global $conn;
  $nama_proyek = $data_project['name'];
  $dosen = $data_project['dosen'];
  $desc = $data_project['description'];
  $req = $data_project['features'];
  $minggu = $data_project['week'];

  $sql_add_projects = "INSERT INTO proyek (id_proyek, nama_proyek, deskripsi_proyek, id_user, req, minggu, status_show) VALUES ('', '$nama_proyek', '$desc', '$dosen', '$req', '$minggu', 'No')";


  mysqli_query($conn, $sql_add_projects);

  return mysqli_affected_rows($conn);
}

function add_task($task_data, $category, $week, $bid)
{
  global $conn;
  $task_name = $task_data['name'];
  $task_member = $task_data['member'];
  $task_desc = $task_data['desc'];

  $sql = "INSERT INTO task (id, task_name, task_desc, category, bunch_id, member_id, minggu) VALUES ('', '" . $task_name . "', '" . $task_desc . "', '" . $category . "', $bid, $task_member, $week)";

  mysqli_query($conn, $sql);
  return mysqli_affected_rows($conn);
}

function edit_task($task_data, $tid)
{
  global $conn;
  $task_name = $task_data['name'];
  $task_member = $task_data['member'];
  $task_desc = $task_data['desc'];

  $sql = "UPDATE task SET task_name = '" . $task_name . "', task_desc = '" . $task_desc . "', member_id = " . $task_member . " WHERE task.id = " . $tid . "";

  mysqli_query($conn, $sql);
  return mysqli_affected_rows($conn);
}

function update_task($task_id, $category)
{
  global $conn;
  $sql = "UPDATE task SET category = '" . $category . "' WHERE task.id =" . $task_id . "";

  mysqli_query($conn, $sql);
  return mysqli_affected_rows($conn);
}

function input_date($date_data, $c_bid)
{
  global $conn;
  date_default_timezone_set('Asia/Jakarta');
  $title = $date_data['title'];
  $comment = $date_data['comment'];
  $time_comment = date("Y-m-d H:i:s");

  $sql = "INSERT INTO comment (comment_id, comment_title, comment, date_submit, bunch_id) VALUES (NULL, '" . $title . "', '" . $comment . "', '" . $time_comment . "', " . $c_bid . ")";

  mysqli_query($conn, $sql);

  return mysqli_affected_rows($conn);
}

function get_time_diff($time)
{
  $time_diff = time() - $time;

  if ($time_diff < 1) {
    return 'Just Now';
  }

  $condition = array(
    12 * 30 * 24 * 60 * 60 => 'tahun',
    30 * 24 * 60 * 60 => 'bulan',
    24 * 60 * 60 => 'hari',
    60 * 60 => 'jam',
    60 => 'menit',
    1 => 'detik'
  );

  foreach ($condition as $sec => $str) {
    $d = $time_diff / $sec;

    if ($d >= 1) {
      $t = round($d);
      return '' . $t . ' ' . $str . ' yang lalu ';
    }
  }
}
