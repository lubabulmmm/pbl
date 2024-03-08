<?php

$get_comments = execThis("SELECT * FROM comment_task WHERE task_id =" . $_GET['tid'] . " ORDER BY date_submit DESC");

?>

<div class="grid grid-cols-2 mt-7">
  <div class="p-5 mr-0 lg:mr-10 border shadow-sm border-gray-200 rounded-lg col-span-1 lg:col-span-1">
    <h1 class="text-lg font-semibold text-gray-900">Komentar Tugas</h1>

    <?php if ($get_comments == []) : ?>
      <div class="w-full py-6">
        <p class="text-gray-400 font-light text-center">Anda belum memberikan komentar apapun!</p>
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


  <form class="my-7 lg:my-0 lg:mr-5" method="post">
    <label for="comment" class="text-gray-800 text-lg font-semibold">Tulis Komentar</label>
    <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-gray-200  my-3 focus:border-gray-200 block w-full p-2.5" placeholder="Tulis Subjek" required="">
    <input type="text" name="tid" id="tid" value="<?= $_GET['tid'] ?>" class="sr-only" placeholder="bid" required="">
    <div class="w-full border border-gray-200 rounded-lg bg-gray-100 col-span-1">
      <div class="px-4 py-2 bg-gray-50 rounded-t-lg">
        <label for="comment" class="sr-only">Your comment</label>
        <textarea id="comment" name="comment" rows="4" class="w-full resize-none py-2 text-sm text-gray-900 bg-gray-50 border-0 focus:ring-0" placeholder="Tulis Deskripsi" required></textarea>
      </div>
      <div class="flex items-center justify-between px-3 py-2 border-t">
        <button type="submit" name="record" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">
          Kirim
        </button>
      </div>
    </div>
</div>
</form>
</div>