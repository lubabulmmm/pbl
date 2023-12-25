<?php 

  require 'connectdb.php';

  function execThis( $query ) {
    global $conn;
    // Exectue Query
    $result = mysqli_query( $conn, $query );
    $rows = [];
    // Fetch Data From Query
    while ( $row = mysqli_fetch_assoc( $result ) ) {
      $rows[] = $row;
    }
    return $rows;

  }

  function delete_user($id_user){
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE id = '$id_user'");

    return mysqli_affected_rows($conn);
  }

  function delete_project($id_user){
    global $conn;
    mysqli_query($conn, "DELETE FROM proyek WHERE id_proyek = '$id_user'");

    return mysqli_affected_rows($conn);
  }

  function add_admin($data_admin){
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

  function add_user($data_mahasiswa){
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

  function add_project($data_project){
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

?>