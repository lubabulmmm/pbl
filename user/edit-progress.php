<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
}

if (isset($_SESSION["level"])) {
  if ($_SESSION["level"] == "superadmin") {
    header("Location: /PBL/superadmin/superadmin.php");
    exit;
  } elseif ($_SESSION["level"] == "admin") {
    header("Location: /PBL/dosen/dashadmin.php");
    exit;
  }
}

require '../query/query.php';
$get_taskinfo = [];
$members = [];

try {
  $get_taskinfo = execThis("SELECT task.id AS task_id, task_name, task_desc, task.bunch_id AS bid, category, user.nama_user, project_id, bunch_member.role AS member_role, bunch_member.id AS member_id FROM task INNER JOIN bunch_member ON task.member_id = bunch_member.id INNER JOIN user ON bunch_member.member_id = user.email INNER JOIN bunch ON bunch_member.bunch_id = bunch.bunch_id WHERE task.id =" . $_GET['tid'] . "");

  $members = execThis("SELECT bunch_member.id AS member_id, nama_user, role FROM bunch_member INNER JOIN user ON bunch_member.member_id = user.email WHERE bunch_id =" . $get_taskinfo[0]['bid'] . "");
} catch (\Throwable $th) {
  echo $th;
  header("Location: ../content/not-found.php");
  exit;
}

if (empty($get_taskinfo) || empty($members)) {
  header("Location: restricted.php");
}

if (isset($_POST["submit"])) {
  if (edit_task($_POST, $_GET['tid']) > 0) {
    header("Location: details-progress.php?tid=" . $_GET['tid'] . "&id=" . $_GET['id'] . "&bid=" . $_GET['bid'] . "&info=success");
  } else {
    header("Location: details-progress.php?tid=1" . $_GET['tid'] . "&id=" . $_GET['id'] . "&bid=" . $_GET['bid'] . "&info=failed");
  }
}

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
  <title>Proyek Kamu | PBL Vokasi</title>
  <?php include("./includes/head.php") ?>
</head>

<body class="">

  <?php include("./includes/navbar.php") ?>

  <!-- Side Bar -->
  <?php include("./includes/aside.php") ?>
  <div class="p-4 sm:ml-64">
    <!-- important -->
    <div class="rounded-lg mt-14 flex flex-col item-start">
      <div class="mx-auto w-full px-4 lg:px-12">
        <!-- BreadCrumbs -->

        <nav class="flex my-7" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <a href="./dashboard.php" class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-amber-500">
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
                <a href="./projects.php?bid=<?= $get_taskinfo[0]['bid'] ?>&id=<?= $get_taskinfo[0]['project_id'] ?>" class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-amber-500">
                  <span class="ms-1 text-lg font-medium text-gray-900 hover:text-amber-500 md:ms-2">Proyek Kamu</span>
                </a>
              </div>
            </li>
            <li class="inline-flex items-center">
              <div class="flex items-center">
                <svg class="ms-1 rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <a href="./details-progress.php?tid=<?= $_GET['tid'] ?>&id=<?= $_GET['id'] ?>&bid=<?= $get_taskinfo[0]['bid'] ?>" class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-amber-500">
                  <span class="ms-1 text-lg font-medium text-gray-900 hover:text-amber-500 md:ms-2">Detail Tugas</span>
                </a>
              </div>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-lg font-medium text-amber-500 md:ms-2">Edit Progress</span>
              </div>
            </li>
          </ol>
        </nav>


        <section class="">
          <div class="py-8 px-4 mx-auto max-w-2xl lg:py-13">
            <h2 class="mb-4 text-xl font-bold text-gray-900">Edit Progress</h2>
            <form action="" method="post">
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Progress</label>
                  <input type="text" name="name" id="name" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Tulis Nama Progress.." required="" value="<?= $get_taskinfo[0]['task_name'] ?>">
                </div>
                <div>
                  <label for="member" class="block mb-2 text-sm font-medium text-gray-900">Pilih</label>
                  <select id="member" name="member" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                    <option value="<?= $get_taskinfo[0]['member_id'] ?>" selected><?= $get_taskinfo[0]['nama_user'] ?> - <?= $get_taskinfo[0]['member_role'] ?></option>
                    <?php foreach ($members as $member) : ?>
                      <option value="<?php echo $member["member_id"] ?>"><?= $member["nama_user"]; ?> - <?= $member["role"] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="sm:col-span-2">
                  <label for="desc" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Progress</label>
                  <textarea id="desc" name="desc" rows="8" class="block p-4 w-full text-sm text-gray-900  rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Tulis Deskripsi Kamu.."><?= $get_taskinfo[0]['task_desc'] ?></textarea>
                </div>
              </div>
              <button type="submit" name="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-amber-500 rounded-lg focus:ring-4 focus:ring-amber-200 hover:bg-amber-400">
                Simpan
              </button>
            </form>
          </div>
        </section>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>