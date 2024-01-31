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

function check_user_admin($data_user, $project_id)
{
  global $conn;
  $sql_check = "SELECT * FROM proyek WHERE id_user= '" . $data_user . "' AND id_proyek = " . $project_id . "";

  $check_user = mysqli_query($conn, $sql_check);

  if (mysqli_num_rows($check_user) != 1) {
    return 404;
  }

  return 200;
}

function add_grade($grade, $bunch_id)
{
  global $conn;
  $sql_add_grade = "UPDATE bunch SET grade = '" . $grade['grade'] . "' WHERE bunch.bunch_id = " . $bunch_id . "";

  mysqli_query($conn, $sql_add_grade);

  return mysqli_affected_rows($conn);
}
function add_bunch($user_data, $user_email, $id_project)
{
  global $conn;

  $bunch_name = $user_data['name'];

  $sql_add_bunch = "INSERT INTO bunch (bunch_id, bunch_name, leader_id, project_id, grade) VALUES ('', '" . $bunch_name . "', '" . $user_email . "', '" . $id_project . "', '0')";

  mysqli_query($conn, $sql_add_bunch);

  return mysqli_affected_rows($conn);
}

function add_request($role_data, $user_email, $bunch_id)
{
  global $conn;

  $role_name = $role_data['role'];

  $sql_add_request = "INSERT INTO `request` (`request_id`, `bunch_id`, `user_id`, `role`, `status_req`) VALUES ('', " . $bunch_id . ", '" . $user_email . "', '" . $role_name . "', 'Belum Diterima')";

  mysqli_query($conn, $sql_add_request);

  return mysqli_affected_rows($conn);
}

function reject_request($id_req)
{
  global $conn;

  $sql_reject = "UPDATE request SET status_req = 'Ditolak' WHERE request.request_id = " . $id_req . "";

  mysqli_query($conn, $sql_reject);

  return mysqli_affected_rows($conn);
}

function accept_request($id_req)
{
  global $conn;

  $sql_reject = "UPDATE request SET status_req = 'Diterima' WHERE request.request_id = " . $id_req . "";

  mysqli_query($conn, $sql_reject);

  return mysqli_affected_rows($conn);
}

function add_accept_member($data_member)
{
  global $conn;
  $user_id = $data_member['email'];
  $bunch_id = $data_member['bunch_id'];
  $role = $data_member['role'];

  $sql_add = "INSERT INTO bunch_member (id, bunch_id, member_id, role) VALUES (NULL, '" . $bunch_id . "', '" . $user_id . "', '" . $role . "')";

  mysqli_query($conn, $sql_add);

  return mysqli_affected_rows($conn);
}

function change_role($data_change)
{
  global $conn;

  $role_name = $data_change['role'];
  $id_member = $data_change['member'];

  $sql_change = "UPDATE bunch_member SET role = '" . $role_name . "' WHERE bunch_member.id = " . $id_member . "";

  mysqli_query($conn, $sql_change);

  return mysqli_affected_rows($conn);
}
