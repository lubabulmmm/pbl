<!-- PILL PROGRESS 1 -->
<?php foreach ($get_task_done as $tdone) : ?>
  <a href="./details-progress.php?tid=<?= $tdone['id'] ?>&id=<?= $_GET['id'] ?>&bid=<?= $_GET['bid'] ?>" class="focus:ring-4 focus:outline-none bg-white shadow focus:ring-gray-200 flex items-center justify-between hover:bg-gray-100 w-10/12 text-sm px-3 py-2 my-1.5 rounded-lg">
    <?= $tdone['task_name'] ?>
    <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1" />
    </svg>
  </a>
<?php endforeach; ?>