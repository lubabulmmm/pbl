<?php

require '../query/query.php';

if (isset($_POST["register"])) {

    if (reg_user($_POST) > 0) {
        header("Location: login.php");
    } else if (reg_user($_POST) == -3) {
        header("Location: login.php");
    } else if (reg_user($_POST) == -4) {
        header("Location: login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | PortaLearn</title>
    <?php include("./includes/head.php") ?>
</head>

<body>

    <section class="bg-gradient-to-tr from-violet-200 to-purple-300 h-screen">
        <div class="flex flex-col items-center bg-gray-50 justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-blue-800">
                <img class="w-8 h-8 mr-2 shadow-lg" src="../assets/img/pbl_logo.svg" alt="logo">
                PBL Vokasi
            </a>

            <?php if (!empty($_GET['err'])): ?>
                <?php if ($_GET['err'] == "uname"): ?>
                    <div class="p-4 mb-4 text-sm text-yellow-600 rounded-lg bg-yellow-50 border border-yellow-600" role="alert">
                        <span class="font-bolf">Username telah dipakai!</span> Cari username lain yang sesuai.
                    </div>
                <?php endif; ?>
                <?php if ($_GET['err'] == "confirm"): ?>
                    <div class="p-4 mb-4 text-sm text-red-600 rounded-lg bg-red-50 border border-red-600" role="alert">
                        <span class="font-bolf">Kata Sandi tidak Sama!</span> Masukkan dengan teliti kata sandi anda.
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="w-full rounded-2xl shadow-lg md:mt-0 sm:max-w-md xl:p-0 bg-gray-50">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Buat akunmu sekarang!
                    </h1>
                    <form class="space-y-2 md:space-y-4" action="" method="post">
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                            <input type="username" name="username" id="username"
                                class="bg-gray-50 border border-amber-500 text-gray-900 sm:text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5"
                                placeholder="Masukkan Username" required="">
                        </div>
                        <div>
                            <label for="nim" class="block mb-2 text-sm font-medium text-gray-900">Nim</label>
                            <input type="nim" name="nim" id="nim"
                                class="bg-gray-50 border border-amber-500 text-gray-900 sm:text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5"
                                placeholder="Masukkan Nim" required="">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-amber-500 text-gray-900 sm:text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5"
                                placeholder="Masukkan Email" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Kata
                                Sandi</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-amber-500 text-gray-900 sm:text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5"
                                required="">
                        </div>
                        <div>
                            <label for="confirm-password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Konfirmasi
                                Password</label>
                            <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••"
                                class="bg-gray-50 border border-amber-500 text-gray-900 sm:text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5"
                                required="">
                        </div>
                        <button name="register" type="submit"
                            class="w-full text-white bg-amber-600 hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Buat
                            akun</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-700">
                            Sudah memiliki akun? <a href="login.php"
                                class="font-medium text-blue-600 hover:underline ">Masuk di sini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>