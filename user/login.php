<?php
require '../query/connectdb.php';
session_start();

// Initialize error messages
$emailError = $passwordError = $loginError = '';

if (isset($_SESSION["level"])) {
  if ($_SESSION["level"] == "user") {
    header("Location: dashboard.php");
    exit;
  } elseif ($_SESSION["level"] == "admin") {
    header("Location: ../dosen/dashadmin.php");
    exit;
  } elseif ($_SESSION["level"] == "superadmin") {
    header("Location: ../superadmin/superadmin.php");
    exit;
  }
}

if (isset($_POST["login"])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Validate non-empty email and password
  if (empty($email)) {
    $emailError = 'Maaf, email tidak boleh kosong.';
  }

  if (empty($password)) {
    $passwordError = 'Maaf, password tidak boleh kosong.';
  }

  // If both fields are not empty, proceed with login
  if (empty($emailError) && empty($passwordError)) {
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM user WHERE email='$email'";
    $query_email_check = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query_email_check) === 1) {
      $check_result = mysqli_fetch_assoc($query_email_check);

      // Check password
      if (password_verify($password, $check_result["password"])) {
        // Start session
        $_SESSION["login"] = true;
        $_SESSION["id"] = $check_result["id"];
        $_SESSION["nama_user"] = $check_result["nama_user"];
        $_SESSION["email"] = $check_result["email"];
        $_SESSION["level"] = $check_result["level"];
        $_SESSION["gambar"] = $check_result["gambar"];

        if ($_SESSION["level"] == "user") {
          header("Location: dashboard.php");
          exit;
        } elseif ($_SESSION["level"] == "admin") {
          header("Location: ../dosen/dashadmin.php");
          exit;
        } elseif ($_SESSION["level"] == "superadmin") {
          header("Location: ../superadmin/superadmin.php");
          exit;
        }
      } else {
        // Incorrect password
        $loginError = "Mohon Maaf, email atau password Anda salah.";
      }
    } else {
      // Email not found
      $loginError = "Mohon Maaf, email atau password Anda salah.";
    }
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

  <section class=" h-screen">
    <div class="flex flex-col items-center bg-gray-50 justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-blue-800">
        <img class="w-8 h-8 mr-2 shadow-lg" src="../assets/img/pbl_logo.svg" alt="logo">
        PBL Vokasi
      </a>
      <div class="w-full rounded-2xl shadow-lg md:mt-0 sm:max-w-md xl:p-0 bg-gray-50">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
            Selamat Datang, Vokasioner!
          </h1>
          <!-- Display error messages -->
          <?php if (!empty($emailError)) : ?>
            <div class="text-red-500 text-sm mb-4">
              <?php echo $emailError; ?>
            </div>
          <?php endif; ?>

          <?php if (!empty($passwordError)) : ?>
            <div class="text-red-500 text-sm mb-4">
              <?php echo $passwordError; ?>
            </div>
          <?php endif; ?>

          <?php if (!empty($loginError)) : ?>
            <div class="text-red-500 text-sm mb-4">
              <?php echo $loginError; ?>
            </div>
          <?php endif; ?>
          <form class="space-y-4 md:space-y-6" action="" method="post">
            <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
              <input type="email" name="email" id="email" class="bg-gray-50 border border-amber-500 text-gray-900 sm:text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5" placeholder="Masukkan Email" required="">
            </div>
            <div>
              <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Kata Sandi</label>
              <input type="password" name="password" id="password" placeholder="Masukkan Kata Sandi" class="bg-gray-50 border border-amber-500 text-gray-900 sm:text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5" required="">
            </div>
            <div class="flex items-center justify-between">
              <div class="flex items-start">
              </div>
              <a href="register.php" class="text-sm font-medium text-blue-600 hover:underline">Belum Punya Akun?</a>
            </div>
            <button type="submit" name="login" class="w-full text-white bg-amber-500 hover:bg-amber-400 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Masuk</button>
            <p class="text-sm font-light text-gray-500">
              <span class="text-sm  sm:text-center">© 2024 <a href="index.php" class="hover:underline">PBL Vokasi</a>.
                All Rights Reserved.
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>


</body>

</html>