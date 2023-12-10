<?php 

  require '/pbl/db/connectdb.php';

  function add_admin($data_admin){
    global $conn;
    $nama_dosen = $data_admin["nama_dosen"];
    $nip = $data_admin["nip"];
    $email = $data_admin["email"];
    $password = mysqli_real_escape_string($conn, $data_admin["password"]);

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql_add_admin = "INSERT INTO user VALUES ('$email', '$nip', '$nama_dosen', 'admin', 'profile.png', '$password')";

    mysqli_query($conn, $sql_add_admin);

    return mysqli_affected_rows($conn);
  }

?>