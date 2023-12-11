<?php 

  require '../query.php';

  $projects = execThis("SELECT id_user, deskripsi_proyek, nama_proyek, nama_user FROM proyek JOIN user ON user.email = proyek.id_user WHERE id_user = '". $_SESSION['email']. "'");

?>

<h2 class="text-xl self-start font-medium px-7 w-full">Judul Project Based Learning yang ditangani</h2>

    

      <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-6 lg:px-6">
          <div class="grid gap-8 lg:grid-cols-2">
            <?php foreach($projects as $project): ?>
          <article class="p-6 bg-amber-100 rounded-xl border border-amber-400 shadow-sm dark:bg-white dark:border-blue-400 hover:shadow-lg hover:shadow-gray-00 duration-300 h-72 flex box-border flex-col justify-between ease-in-out">
              <div class="flex justify-between items-center mb-5 text-gray-500">
                  <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
                      <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                      Teknologi Informasi
                  </span>           
              </div>
              <h2 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-gray-900"><a href="#"><?= $project['nama_proyek'] ?></a></h2>
              <p class="mb-5 font-light text-sm text-gray-500">
                <?= $project['deskripsi_proyek'] ?>
              </p>
              <div class="flex justify-between items-center">
                  <div class="flex items-center space-x-4">
                      <img class="w-7 h-7 rounded-full" src="../assets/img/flora.jpg" alt="" />
                      <span class="font-medium dark:text-gray-900">
                          <?= $project['nama_user'] ?>
                      </span>
                  </div>
                  <a href="./kelproj.php" class="inline-flex items-center font-medium text-primary-600 dark:text-blue-500 hover:underline">
                      Lihat Proyek
                      <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </a>
              </div>
          </article>   
    
    

          <?php endforeach; ?>  
        </div>
      </div>
      