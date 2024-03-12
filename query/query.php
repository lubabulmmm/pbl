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
  $pict = $data_project['pict'];
  $category = $data_project['category'];

  $sql_add_projects = "INSERT INTO proyek (id_proyek, nama_proyek, deskripsi_proyek, id_user, req, minggu, status_show, pict, category) VALUES ('', '$nama_proyek', '$desc', '$dosen', '$req', '$minggu', 'No', '$pict', '$category')";


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
  $pict = $data_project['pict'];
  $category = $data_project['category'];
  $total = $data_project['total'];
  $members = $data_project['members'];

  $sql_add_projects = "INSERT INTO proyek (id_proyek, nama_proyek, deskripsi_proyek, id_user, req, minggu, status_show, pict, category, total_members, total_groups) VALUES ('', '$nama_proyek', '$desc', '$dosen', '$req', '$minggu', 'No', '$pict', $category, '$total', $members)";


  mysqli_query($conn, $sql_add_projects);

  return mysqli_affected_rows($conn);
}

function add_archive($pid)
{
  global $conn;

  $archive = "UPDATE proyek SET status_info = 'archive' WHERE proyek.id_proyek =" . $pid;

  mysqli_query($conn, $archive);

  return mysqli_affected_rows($conn);
}
function unarchive($pid)
{
  global $conn;

  $archive = "UPDATE proyek SET status_info = 'no archive' WHERE proyek.id_proyek =" . $pid;

  mysqli_query($conn, $archive);

  return mysqli_affected_rows($conn);
}

function add_task($task_data, $category, $week, $bid)
{
  global $conn;
  $task_name = $task_data['name'];
  $task_member = $task_data['member'];
  $task_desc = $task_data['desc'];
  $date_created = date("F j, Y, g:i a");
  $deadline = date("F j, Y, g:i a", strtotime(date("F j, Y, g:i a")) + (60 * 60 * 24 * 7));

  $sql = "INSERT INTO task (id, task_name, task_desc, category, bunch_id, member_id, minggu, created_at, deadline) VALUES ('', '" . $task_name . "', '" . $task_desc . "', '" . $category . "', $bid, $task_member, $week, '$date_created', '$deadline')";

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


function edit_user($user_data, $user_id)
{
  global $conn;
  $nama_user = $user_data['name'];
  $new_user_id = $user_data['nim'];
  $email = $user_data['email'];

  $sql = "UPDATE user SET nama_user = '" . $nama_user . "', id = '" . $new_user_id . "', email = '" . $email . "' WHERE id = " . $user_id;

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
function task_comment($date_data, $c_bid, $uid)
{
  global $conn;
  date_default_timezone_set('Asia/Jakarta');
  $title = $date_data['title'];
  $comment = $date_data['comment'];
  $time_comment = date("Y-m-d H:i:s");

  $sql = "INSERT INTO comment_task (id_comment, comment_title, comment, date_submit, task_id, user_id) VALUES (NULL, '" . $title . "', '" . $comment . "', '" . $time_comment . "', " . $c_bid . ", '$uid')";

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

function insertData($data)
{
  global $conn;
  $query = "INSERT INTO task_file (tf_id, task_id, name_file, size, ekstensi, path) VALUES ('', " . $data['tf_id'] . ", '" . $data['title'] . "', '" . $data['size'] . "', '" . $data['ekstensi'] . "', '" . $data['berkas'] . "')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function add_links($yt_url, $web_url, $bunch_id)
{
  global $conn;
  $sql_add_links = "INSERT INTO submit_links (links_id, web_url, yt_url, bunch_id) VALUES ('', '" . $yt_url . "', '" . $web_url . "', '" . $bunch_id . "')";

  mysqli_query($conn, $sql_add_links);

  return mysqli_affected_rows($conn);
}

function insertDataSubmitReport($data, $type)
{
  global $conn;
  $query = "INSERT INTO submit_file (sf_id, bunch_id, name_file, size, ekstensi, path) VALUES ('', " . $data['bunch_id'] . ", '" . $data['title'] . "', '" . $data['size'] . "', '" . $data['ekstensi'] . "', '" . $type . "')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function edit_project($proyek_data, $id)
{
  global $conn;
  $proyek_name = $proyek_data['name'];
  $proyek_pic = $proyek_data['dosen'];
  $proyek_desc = $proyek_data['desc'];
  $proyek_week = $proyek_data['week'];
  $proyek_cat = $proyek_data['category'];
  $req = $proyek_data['req'];

  $sql = "UPDATE proyek SET nama_proyek = '" . $proyek_name . "', deskripsi_proyek = '" . $proyek_desc . "', id_user = '" . $proyek_pic . "', minggu = $proyek_week, category = $proyek_cat, req = '$req' WHERE proyek.id_proyek = " . $id . "";

  mysqli_query($conn, $sql);
  return mysqli_affected_rows($conn);
}

function update_to_yes($id)
{
  global $conn;
  $sql = "UPDATE bunch SET status_show = 'Yes' WHERE bunch_id = $id";

  mysqli_query($conn, $sql);
  return mysqli_affected_rows($conn);
}

function add_pm_req($user_data, $user_email, $id_project)
{
  global $conn;

  $bunch_name = $user_data['name'];

  $sql_add_req = "INSERT INTO request_project (r_id, bunch_name, user_id, project_id, status_req) VALUES ('', '" . $bunch_name . "', '" . $user_email . "', " . $id_project . ", 'Belum Diterima')";

  mysqli_query($conn, $sql_add_req);

  return mysqli_affected_rows($conn);
}

function reject_request_pm($id_req)
{
  global $conn;

  $sql_reject = "UPDATE request_project SET status_req = 'Ditolak' WHERE request_project.r_id = " . $id_req . "";

  mysqli_query($conn, $sql_reject);

  return mysqli_affected_rows($conn);
}

function accept_request_pm($id_req)
{
  global $conn;

  $sql_reject = "UPDATE request_project SET status_req = 'Diterima' WHERE request_project.r_id = " . $id_req . "";

  mysqli_query($conn, $sql_reject);

  return mysqli_affected_rows($conn);
}

function add_accept_bunch($data_bunch)
{
  global $conn;
  $user_id = $data_bunch['email'];
  $bunch_name = $data_bunch['name'];
  $project_id = $data_bunch['project_id'];

  $sql_add = "INSERT INTO bunch (bunch_id, bunch_name, leader_id, project_id, grade, status_show) VALUES (NULL, '" . $bunch_name . "', '" . $user_id . "', '" . $project_id . "', '0', 'No')";

  mysqli_query($conn, $sql_add);

  return mysqli_affected_rows($conn);
}

function reg_user($entry)
{
  global $conn;

  $username = $entry["username"];
  $nim = $entry["nim"];
  $email = strtolower(stripslashes($entry["email"]));
  $password = mysqli_real_escape_string($conn, $entry["password"]);
  $confirm = mysqli_real_escape_string($conn, $entry["confirm-password"]);

  if ($password != $confirm) {
    return -4;
  }

  // Encrypt the password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // Check there is same username or not
  $username_checker = mysqli_query($conn, "SELECT nama_user FROM user WHERE nama_user = '$username'");

  if (mysqli_fetch_assoc($username_checker)) {
    return -3;
  }

  // Add user to database
  mysqli_query($conn, "INSERT INTO user VALUES('$email', '$nim', '$username', 'user', 'profile.png', '$password') ");

  return mysqli_affected_rows($conn);
}

function add_roles($data)
{
  global $conn;
  $role_name = $data['role'];
  $c_id = $data['c_id'];

  $sql_add_roles = "INSERT INTO role (role_id, role_name, category) VALUES ('', '$role_name', '$c_id')";

  mysqli_query($conn, $sql_add_roles);

  return mysqli_affected_rows($conn);
}

function add_category($data)
{
  global $conn;
  $category_name = $data['category'];

  $sql_add_cats = "INSERT INTO categories (c_id, category_name) VALUES ('', '$category_name')";

  mysqli_query($conn, $sql_add_cats);

  return mysqli_affected_rows($conn);
}

function edit_role($data)
{
  global $conn;
  $role_name = $data['role'];
  $id = $data['id'];

  $sql_edit_roles = "UPDATE role SET role_name = '$role_name' WHERE role_id = $id";

  mysqli_query($conn, $sql_edit_roles);

  return mysqli_affected_rows($conn);
}

function edit_cats($data)
{
  global $conn;
  $c_name = $data['category'];
  $id = $data['id'];

  $sql_edit_roles = "UPDATE categories SET category_name = '$c_name' WHERE c_id = $id";

  mysqli_query($conn, $sql_edit_roles);

  return mysqli_affected_rows($conn);
}

function delete_role($data)
{
  global $conn;

  $sql_delete_role = "DELETE FROM role WHERE role_id = '$data'";

  mysqli_query($conn, $sql_delete_role);

  return mysqli_affected_rows($conn);
}
function delete_member($data_id, $bunch_id)
{
  global $conn;

  $sql_delete_member = "DELETE FROM bunch_member WHERE member_id = '$data_id' AND bunch_id = '$bunch_id'";

  mysqli_query($conn, $sql_delete_member);

  return mysqli_affected_rows($conn);
}

function delete_task($tid)
{
  global $conn;

  $sql_delete_task = "DELETE FROM task WHERE id = '$tid'";

  mysqli_query($conn, $sql_delete_task);

  return mysqli_affected_rows($conn);
}

function pass_user($entry, $username)
{
  global $conn;

  $password = mysqli_real_escape_string($conn, $entry["password"]);
  $confirm = mysqli_real_escape_string($conn, $entry["confirm-password"]);

  if ($password != $confirm) {
    return -4;
  }

  // Encrypt the password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // Add user to database
  mysqli_query($conn, "UPDATE user SET password = '$password' WHERE email = '$username'");

  return mysqli_affected_rows($conn);
}
