<?php
  session_start();
  if(isset($_SESSION["login"])){
      header("Location: beranda.php");
      exit;
    // jika sudah melakukan login dan benar akan dikembalikan
    // ke halaman beranda
  }

  require './db/connectdb.php';
  if(isset($_POST["login"])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql =  "SELECT * FROM user WHERE email='$email' AND password='$password'";

    $query = mysqli_query($conn, $sql);

    if($query){
      if(mysqli_num_rows($query) > 0){
        $data = array();
        while($row = mysqli_fetch_assoc($query)){
          $data[] = $row;
        }
        mysqli_data_seek($query, 0); // Mengatur kursor kembali ke baris pertama

        foreach ($data as $user) {
          $level = $user['level']; // Ambil level pengguna dari hasil query
          $id_user = $user['id']; // Ambil ID user dari hasil query
          $_SESSION['id'] = $id; // Simpan ID user

          // Tentukan alamat redirect berdasarkan level pengguna
          if($level == "user"){
            $_SESSION['login'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['level'] = "user"; // Simpan level pengguna
            header('Location: dashboard.php');
            exit;
          } elseif($level == "admin"){
            $_SESSION['login'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['level'] = $level; // Simpan level admin
            header('Location: admin/dashadmin.php');
            exit;
          }
          else {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['level'] = "super admin"; // Simpan level super admin
            header('Location: superadmin/superadmin.php');
            exit;
          }
        }
      }
    } else {
      $error = true;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk | PBL Vokasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <?php include("./includes/head.php") ?>
</head>
<body>

<section class="bg-gray-50 h-screen">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-blue-900">
          <img class="w-8 h-8 mr-2 shadow-lg" src="./assets/img/pbl_logo.svg" alt="logo">
          PBL Vokasi    
      </a>
      <div class="w-full rounded-2xl shadow-lg md:mt-0 sm:max-w-md xl:p-0 bg-gray-50">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                  Selamat Datang Kembali, Vokasioner!
              </h1>
              <form class="space-y-4 md:space-y-6" action="" method="post">
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900">E-mail</label>
                      <input type="email" name="email" id="email" class="bg-gray-50 border border-blue-600 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Masukkan email kamu" required="">
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Kata Sandi</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-blue-600 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" required="">
                  </div>
                  <div class="flex items-center justify-between">
                      <div class="flex items-start">
                      </div>
                      <a href="#" class="text-sm font-medium text-blue-600 hover:underline">Lupa Kata Sandi?</a>
                  </div>
                  <button type="submit" name="login" class="w-full text-white bg-blue-800 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Masuk</button>
                  <p class="text-sm font-light text-gray-500">
                      Belum punya akun? <a href="register.php" class="font-medium text-blue-600 hover:underline">Registrasi</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>
</html>