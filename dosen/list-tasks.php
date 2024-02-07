<?php

session_start();
if (!isset($_SESSION["login"])) {
  header("Location: /PBL/login.php");
}

if (isset($_SESSION["level"])) {
  if ($_SESSION["level"] == "user") {
    header("Location: /PBL/user/dashboard.php");
    exit;
  } elseif ($_SESSION["level"] == "superadmin") {
    header("Location: superadmin/superadmin.php");
    exit;
  }
}


require '../query/query.php';

// ! TO DO
$todo_fetch = mysqli_query($conn, "SELECT task.id AS task_id, task_name, task.bunch_id, category, nama_user, minggu, gambar, project_id FROM task INNER JOIN bunch_member ON task.member_id = bunch_member.id INNER JOIN user ON bunch_member.member_id = user.email INNER JOIN bunch ON bunch_member.bunch_id = bunch.bunch_id WHERE task.bunch_id =" . $_GET['bid'] . " AND category = 'To Do'");

$todo_sum = mysqli_num_rows($todo_fetch);

// ? DOING
$doing_fetch = mysqli_query($conn, "SELECT task.id AS task_id, task_name, task.bunch_id, category, nama_user, minggu, gambar, project_id FROM task INNER JOIN bunch_member ON task.member_id = bunch_member.id INNER JOIN user ON bunch_member.member_id = user.email INNER JOIN bunch ON bunch_member.bunch_id = bunch.bunch_id WHERE task.bunch_id =" . $_GET['bid'] . " AND category = 'Doing'");

$doing_sum = mysqli_num_rows($doing_fetch);

// * DONE
$done_fetch = mysqli_query($conn, "SELECT task.id AS task_id, task_name, task.bunch_id, category, nama_user, minggu, gambar, project_id FROM task INNER JOIN bunch_member ON task.member_id = bunch_member.id INNER JOIN user ON bunch_member.member_id = user.email INNER JOIN bunch ON bunch_member.bunch_id = bunch.bunch_id WHERE task.bunch_id =" . $_GET['bid'] . " AND category = 'Done'");

$done_sum = mysqli_num_rows($done_fetch);



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/img/favicon/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <title>Daftar Tugas | PBL Vokasi</title>
  <?php include("./includes/head.php") ?>
</head>

<body class="">

  <?php include("./includes/navbar.php") ?>

  <!-- Side Bar -->
  <?php include("./includes/aside.php") ?>
  <div class="p-4 sm:ml-64">
    <!-- important -->
    <div class="rounded-lg mt-14 flex flex-col item-start">

      <section class="bg-white p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
          <nav class="flex mt-7 mb-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
              <li class="inline-flex items-center">
                <a href="./dashadmin.php" class="inline-flex items-center text-md lg:text-lg font-medium text-gray-900 hover:text-blue-500">
                  <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                  </svg>
                  Beranda
                </a>
              </li>
              <li class="inline-flex items-center">
                <div class="flex items-center">
                  <svg class="ms-1 rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                  </svg>
                  <a href="./projects.php?bid=<?= $_GET['bid'] ?>&id=<?= $_GET['id'] ?>" class="inline-flex items-center text-md lg:text-lg font-medium text-gray-700 hover:text-blue-800">
                    <span class="ms-1 text-md lg:text-lg font-medium text-gray-900 hover:text-blue-500 md:ms-2">Proyek Kamu</span>
                  </a>
                </div>
              </li>
              <li aria-current="page">
                <div class="flex items-center">
                  <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                  </svg>
                  <span class="ms-1 text-md lg:text-lg font-medium text-blue-500 md:ms-2">Daftar Tugas</span>
                </div>
              </li>
            </ol>
          </nav>

          <div class="pt-4 border-t border-gray-200">
            <div class="px-1 sm:grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 sm:gap-4 sm:px-0">
              <div>

                <p class="text-md font-semibold text-red-600">To Do (total: <?= $todo_sum ?>)</p>

                <div class="bg-white border shadow border-gray-200 mt-5 p-5 rounded-lg col-span-2">

                  <ul class="max-w-full">
                    <?php if (empty($todo_fetch)) : ?>
                      <p class="text-center text-gray-500 text-sm font-light">Belum ada tugas.</p>
                    <?php endif; ?>
                    <?php foreach ($todo_fetch as $tf) : ?>
                      <li class="pb-3 sm:pb-4 mt-2.5 last:border-0 last:pb-0 first:mt-0 border-b border-gray-200">
                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                          <div class="flex-shrink-0">
                            <img class="w-6 h-6 rounded-full" src="../assets/img/<?= $tf['gambar'] ?>" alt="">
                          </div>
                          <div class="flex-1 min-w-0">
                            <a href="details-progress.php?tid=<?= $tf['task_id'] ?>&id=<?= $tf['project_id'] ?>&bid=<?= $tf['bunch_id'] ?>" class="text-xs font-semibold text-gray-900 truncate hover:underline ">
                              <?= $tf['task_name'] ?>
                            </a>
                            <p class="text-xs font-semibold text-gray-500 truncate">
                              <?= $tf['nama_user'] ?> | <span class="bg-red-200 inline-block rounded-lg px-2 text-red-600">To Do</span>
                            </p>
                          </div>
                        </div>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>

              <div>

                <p class="text-md font-semibold text-amber-500">Doing (total: <?= $doing_sum ?>)</p>

                <div class="bg-white border shadow border-gray-200 mt-5 p-5 rounded-lg col-span-2">

                  <ul class="max-w-full">
                    <?php if (empty($doing_fetch)) : ?>
                      <p class="text-center text-gray-500 text-sm font-light">Belum ada tugas.</p>
                    <?php endif; ?>
                    <?php foreach ($doing_fetch as $tf) : ?>
                      <li class="pb-3 sm:pb-4 mt-2.5 last:border-0 last:pb-0 first:mt-0 border-b border-gray-200">
                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                          <div class="flex-shrink-0">
                            <img class="w-6 h-6 rounded-full" src="../assets/img/<?= $tf['gambar'] ?>" alt="">
                          </div>
                          <div class="flex-1 min-w-0">
                            <a href="details-progress.php?tid=<?= $tf['task_id'] ?>&id=<?= $tf['project_id'] ?>&bid=<?= $tf['bunch_id'] ?>" class="text-xs font-semibold text-gray-900 truncate hover:underline ">
                              <?= $tf['task_name'] ?>
                            </a>
                            <p class="text-xs font-semibold text-gray-500 truncate">
                              <?= $tf['nama_user'] ?> | <span class="bg-amber-200 inline-block rounded-lg px-2 text-amber-600">Doing</span>
                            </p>
                          </div>
                        </div>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>

              <div>

                <p class="text-md font-semibold text-green-500">Done (total: <?= $done_sum ?>)</p>

                <div class="bg-white border shadow border-gray-200 mt-5 p-5 rounded-lg col-span-2">

                  <ul class="max-w-full">
                    <?php if (empty($done_fetch)) : ?>
                      <p class="text-center text-gray-500 text-sm font-light">Belum ada tugas.</p>
                    <?php endif; ?>
                    <?php foreach ($done_fetch as $tf) : ?>
                      <li class="pb-3 sm:pb-4 mt-2.5 last:border-0 last:pb-0 first:mt-0 border-b border-gray-200">
                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                          <div class="flex-shrink-0">
                            <img class="w-6 h-6 rounded-full" src="../assets/img/<?= $tf['gambar'] ?>" alt="">
                          </div>
                          <div class="flex-1 min-w-0">
                            <a href="details-progress.php?tid=<?= $tf['task_id'] ?>&id=<?= $tf['project_id'] ?>&bid=<?= $tf['bunch_id'] ?>" class="text-xs font-semibold text-gray-900 truncate hover:underline ">
                              <?= $tf['task_name'] ?>
                            </a>
                            <p class="text-xs font-semibold text-gray-500 truncate">
                              <?= $tf['nama_user'] ?> | <span class="bg-green-200 inline-block rounded-lg px-2 text-green-600">Done</span>
                            </p>
                          </div>
                        </div>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>

      </section>

    </div>
  </div>

  <!-- ... (your previous HTML code) ... -->

  <!-- ... (your previous HTML code) ... -->

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>