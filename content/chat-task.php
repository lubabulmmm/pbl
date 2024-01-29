<div class="w-full px-0 lg:pl-4 lg:pr-12 grid grid-cols-1 lg:grid-cols-3 m-0 lg:m-8">
  <div class="p-5 mr-0 my-5 lg:my-0 lg:mr-5 border shadow-sm border-gray-200 rounded-lg bg-gray-50 col-span-1 lg:col-span-2">
    <h1 class="text-lg font-semibold text-gray-900">Komentar Dosen</h1>

    <?php if ($get_comments == []) : ?>
      <div class="w-full py-6">
        <p class="text-gray-400 font-light text-center">Dosen belum memberikan komentar apapun.</p>
      </div>
    <?php endif; ?>

    <?php if ($get_comments != []) : ?>
      <ol class="relative border-s border-gray-200 mt-5 h-48 ov">
        <?php foreach ($get_comments as $comment) : ?>
          <li class="mb-5 ms-4">
            <div class="absolute w-3 h-3 bg-amber-300 rounded-full mt-1.5 -start-1.5 border border-white "></div>
            <time class="mb-3 text-xs font-normal leading-none text-gray-400 "><?= get_time_diff(strtotime($comment['date_submit'])) ?></time>
            <h3 class="text-md my-2 font-semibold text-gray-900"><?= $comment['comment_title'] ?></h3>
            <p class="mb-4 text-sm font-normal text-gray-500"><?= $comment['comment'] ?></p>
          </li>
        <?php endforeach; ?>
      </ol>
    <?php endif; ?>

  </div>

  <!-- //! KOLOM TUGAS WAKK -->

  <div class="p-5 mr-0 lg:mr-10 border shadow-sm border-gray-200 rounded-lg bg-gray-50 col-span-1">
    <h1 class="text-lg font-semibold mb-2.5 text-gray-900">Tugas Anda</h1>

    <ul class="max-w-md h-48 ov">
      <?php
      $todo_color = "text-red-600";
      $doing_color = "text-amber-600";
      ?>
      <?php if (empty($tasks_user)) : ?>
        <p class="text-sm font-light text-center text-gray-400">Anda tidak memiliki tugas</p>
      <?php endif; ?>
      <?php foreach ($tasks_user as $task) : ?>
        <li class="pb-3 sm:pb-4 mt-2.5 border-b border-gray-200">
          <div class="flex items-center space-x-4 rtl:space-x-reverse">
            <div class="flex-shrink-0">
              <svg class="w-8 h-8 
              <?php
              if ($task['category'] == 'To Do') {
                echo $todo_color;
              } else {
                echo $doing_color;
              }
              ?> " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 5V4c0-.6-.4-1-1-1H9a1 1 0 0 0-.8.3l-4 4a1 1 0 0 0-.2.6V20c0 .6.4 1 1 1h12c.6 0 1-.4 1-1v-5M9 3v4c0 .6-.4 1-1 1H4m11.4.8 2.7 2.7m1.2-3.9a2 2 0 0 1 0 3l-6.6 6.6L9 18l.7-3.7 6.7-6.7a2 2 0 0 1 3 0Z" />
              </svg>
            </div>
            <div class="flex-1 min-w-0">
              <a href="./details-progress.php?tid=<?= $task['task_id'] ?>&id=<?= $_GET['id'] ?>" class="text-sm hover:underline font-medium text-gray-900 truncate ">
                <?= $task['task_name'] ?> | <?= $task['category'] ?>
              </a>
              <p class="text-sm text-gray-500 truncate ">
                <?= $task['task_desc'] ?>
              </p>
            </div>
            <div class="inline-flex items-center text-base font-semibold text-gray-900 ">

            </div>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>