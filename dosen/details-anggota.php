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
  <title>Detail Kelompok | PBL Vokasi</title>
  <?php include("../includes/head.php") ?>
</head>
<body class="bg-gray-50">
  
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
                <a href="../dashboard.php" class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-amber-500">
                  <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                  </svg>
                  Beranda
                </a>
              </li>
              <li class="inline-flex items-center">
                <div class="flex items-center">
                  <svg class="ms-1 rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
                  <a href="./projects.php" class="inline-flex items-center lg:text-lg text-xs md:text-md font-medium text-gray-700 hover:text-amber-800">
                    <span class="ms-1 lg:text-lg text-xs md:text-md font-medium text-gray-900 hover:text-amber-500 md:ms-2">Proyek</span>
                  </a>
                </div>
              </li>
              <li aria-current="page">
                <div class="flex items-center">
                  <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
                  <span class="ms-1 text-lg font-medium text-amber-500 md:ms-2">Detail Anggota</span>
                </div>
              </li>
            </ol>
          </nav>

          <div class="flex w-full justify-between items-center">
            <h2 class="text-2xl mb-3 font-semibold">Sistem Informasi E-Complain</h2>


            <div class="flex items-center flex-wrap">
              <a href="./projects.php" type="button" class="text-white bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                </svg>
                Kembali
              </a>
              <button type="button" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 my-3">
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                  <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2 1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z"/>
                </svg>
                Simpan
              </button>
              
            </div>
          </div>

          <div class="mt-6 border-t border-gray-100">
              <dl class="divide-y divide-gray-100">
                <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                  <dt class="text-md font-medium leading-6 text-gray-900">Ketua Kelompok (PM)</dt>
                  <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                    <div class="w-full">
                      <!-- Start coding here -->
                      <div class="relative overflow-hidden bg-white shadow-md sm:rounded-xl">
                        <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                          <div class="flex items-center gap-4">
                              <img class="w-10 h-10 rounded-full" src="/PBL/assets/img/flora.jpg" alt="">
                              <div class="font-medium">
                                  <div>John Doe</div>
                                  <div class="text-sm text-gray-500">johndoe@yahoo.com</div>
                              </div>
                          </div>
                          <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                            <option selected>PM</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </dd>
                </div>
                <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                  <dt class="text-md font-medium leading-6 text-gray-900"></dt>
                  <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                    <div class="w-full">
                      <!-- Start coding here -->
                      <div class="relative overflow-hidden bg-white shadow-md sm:rounded-xl">
                        <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                          <div class="flex items-center gap-4">
                              <img class="w-10 h-10 rounded-full" src="/PBL/assets/img/ian.jpeg" alt="">
                              <div class="font-medium">
                                  <div>John Doe</div>
                                  <div class="text-sm text-gray-500">johndoe@yahoo.com</div>
                              </div>
                          </div>
                          <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                            <option selected>Pilih role</option>
                            <option value="US">System Analyst</option>
                            <option value="CA">Business Analyst</option>
                            <option value="FR">Front End</option>
                            <option value="DE">Back End</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </dd>
                </div>
                <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                  <dt class="text-md font-medium leading-6 text-gray-900"></dt>
                  <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                    <div class="w-full">
                      <!-- Start coding here -->
                      <div class="relative overflow-hidden bg-white shadow-md sm:rounded-xl">
                        <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                          <div class="flex items-center gap-4">
                              <img class="w-10 h-10 rounded-full" src="/PBL/assets/img/pfp.jpg" alt="">
                              <div class="font-medium">
                                  <div>John Doe</div>
                                  <div class="text-sm text-gray-500">johndoe@yahoo.com</div>
                              </div>
                          </div>
                          <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                            <option selected>Pilih role</option>
                            <option value="US">System Analyst</option>
                            <option value="CA">Business Analyst</option>
                            <option value="FR">Front End</option>
                            <option value="DE">Back End</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </dd>
                </div>
                <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                  <dt class="text-md font-medium leading-6 text-gray-900"></dt>
                  <dd class="mt-2 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                    <div class="w-full">
                      <!-- Start coding here -->
                      <div class="relative overflow-hidden bg-white shadow-md sm:rounded-xl">
                        <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                          <div class="flex items-center gap-4">
                              <img class="w-10 h-10 rounded-full" src="/PBL/assets/img/flora.jpg" alt="">
                              <div class="font-medium">
                                  <div>John Doe</div>
                                  <div class="text-sm text-gray-500">johndoe@yahoo.com</div>
                              </div>
                          </div>
                          <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                            <option selected>Pilih role</option>
                            <option value="US">System Analyst</option>
                            <option value="CA">Business Analyst</option>
                            <option value="FR">Front End</option>
                            <option value="DE">Back End</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </dd>
                </div>
                <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                  <dt class="text-md font-medium leading-6 text-gray-900"></dt>
                  <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                    <div class="w-full">
                      <!-- Start coding here -->
                      <div class="relative overflow-hidden bg-white shadow-md sm:rounded-xl">
                        <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                          <div class="flex items-center gap-4">
                              <img class="w-10 h-10 rounded-full" src="/PBL/assets/img/ian.jpeg" alt="">
                              <div class="font-medium">
                                  <div>John Doe</div>
                                  <div class="text-sm text-gray-500">johndoe@yahoo.com</div>
                              </div>
                          </div>
                          <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                            <option selected>Pilih role</option>
                            <option value="US">System Analyst</option>
                            <option value="CA">Business Analyst</option>
                            <option value="FR">Front End</option>
                            <option value="DE">Back End</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </dd>
                </div>
                <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                  <dt class="text-md font-medium leading-6 text-gray-900"></dt>
                  <dd class="mt-2 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                    <div class="w-full">
                      <!-- Start coding here -->
                      <div class="relative overflow-hidden bg-white shadow-md sm:rounded-xl">
                        <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                          <div class="flex items-center gap-4">
                              <img class="w-10 h-10 rounded-full" src="/PBL/assets/img/pfp.jpg" alt="">
                              <div class="font-medium">
                                  <div>John Doe</div>
                                  <div class="text-sm text-gray-500">johndoe@yahoo.com</div>
                              </div>
                          </div>
                          <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                            <option selected>Pilih role</option>
                            <option value="US">System Analyst</option>
                            <option value="CA">Business Analyst</option>
                            <option value="FR">Front End</option>
                            <option value="DE">Back End</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </dd>
                </div>
                <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                  <dt class="text-md font-medium leading-6 text-gray-900"></dt>
                  <dd class="mt-2 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                    <div class="w-full">
                      <!-- Start coding here -->
                      <div class="relative overflow-hidden bg-white shadow-md sm:rounded-xl">
                        <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                          <div class="flex items-center gap-4">
                              <img class="w-10 h-10 rounded-full" src="/PBL/assets/img/pfp.jpg" alt="">
                              <div class="font-medium">
                                  <div>John Doe</div>
                                  <div class="text-sm text-gray-500">johndoe@yahoo.com</div>
                              </div>
                          </div>
                          <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                            <option selected>Pilih role</option>
                            <option value="US">System Analyst</option>
                            <option value="CA">Business Analyst</option>
                            <option value="FR">Front End</option>
                            <option value="DE">Back End</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </dd>
                </div>
                <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                  <dt class="text-md font-medium leading-6 text-gray-900"></dt>
                  <dd class="mt-2 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                    <div class="w-full">
                      <!-- Start coding here -->
                      <div class="relative overflow-hidden bg-white shadow-md sm:rounded-xl">
                        <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                          <div class="flex items-center gap-4">
                              <img class="w-10 h-10 rounded-full" src="/PBL/assets/img/flora.jpg" alt="">
                              <div class="font-medium">
                                  <div>John Doe</div>
                                  <div class="text-sm text-gray-500">johndoe@yahoo.com</div>
                              </div>
                          </div>
                          <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                            <option selected>Pilih role</option>
                            <option value="US">System Analyst</option>
                            <option value="CA">Business Analyst</option>
                            <option value="FR">Front End</option>
                            <option value="DE">Back End</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </dd>
                </div>
              </dl>
            </div>

      </div>
    </div>
  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>
</html>