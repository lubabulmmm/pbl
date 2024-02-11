<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
}

if (isset($_SESSION["level"])) {
  if ($_SESSION["level"] == "user") {
    header("Location: /PBL/user/dashboard.php");
    exit;
  } elseif ($_SESSION["level"] == "admin") {
    header("Location: /PBL/dosen/dashadmin.php");
    exit;
  }
}

require '../query/query.php';

$get_userinfo = execThis("SELECT * FROM user WHERE id =" . $_GET['uid']);
$user_id = $_GET['uid'];



if (isset($_POST["submit"])) {
  if (edit_user($_POST, $user_id) > 0) {
    header("Location: users.php?info=success");
  } else {
    header("Location: users.php?info=failed");
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User | PBL Vokasi</title>
  <?php include("../user/includes/head.php") ?>
</head>

<body class="">
  <!-- SIDEBAR -->
  <?php include("./includes/aside.php") ?>

  <div class=" sm:ml-64">
    <!-- important -->
    <div class="rounded-lg flex flex-col item-start">

      <?php include("./includes/navbar.php") ?>

      <section class="p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
          <nav class="flex my-7" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
              <li class="inline-flex items-center">
                <a href="./superadmin.php"
                  class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-blue-800">
                  <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                      d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                  </svg>
                  Daftar Proyek
                </a>
              </li>
              <li aria-current="page">
                <div class="flex items-center">
                  <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 9 4-4-4-4" />
                  </svg>
                  <span class="ms-1 text-lg font-medium text-blue-800 md:ms-2">Edit User</span>
                </div>
              </li>
            </ol>
          </nav>


          <section class="">
            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-13">
              <h2 class="mb-4 text-xl font-bold text-gray-900">Edit User</h2>
              <form action="" method="post">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                  <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama User</label>
                    <input type="text" name="name" id="name"
                      class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                      placeholder="Tulis Nama User.." value="<?php echo $get_userinfo[0]['nama_user']; ?>" required>
                  </div>

                  <div class="sm:col-span-2">
                    <label for="nim" class="block mb-2 text-sm font-medium text-gray-900">NIM</label>
                    <input type="text" name="nim" id="nim"
                      class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                      placeholder="Tulis NIM.." value="<?php echo $get_userinfo[0]['id']; ?>" required>
                  </div>

                  <div class="sm:col-span-2">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" name="email" id="email"
                      class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                      placeholder="Tulis Email.." value="<?php echo $get_userinfo[0]['email']; ?>" required>
                  </div>
                </div>
                <button type="submit" name="submit"
                  class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-amber-500 rounded-lg focus:ring-4 focus:ring-amber-200 hover:bg-amber-400">Edit</button>
              </form>
            </div>
          </section>
        </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>