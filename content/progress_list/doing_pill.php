<!-- PILL PROGRESS 1 -->
<?php foreach ($get_task_doing as $tdoing) : ?>
  <a href="./details-progress.php?tid=<?= $tdoing['id'] ?>" class="focus:ring-4 focus:outline-none focus:ring-gray-200 flex items-center justify-between hover:bg-gray-100 text-sm w-9/12 px-3 py-2 border-2 border-gray-200 my-1.5 rounded-lg">
    <?= $tdoing['task_name'] ?>
    <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1" />
    </svg>
  </a>
<?php endforeach; ?>