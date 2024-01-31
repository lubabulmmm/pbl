<div class="flex flex-col">
  <div class="flex mb-1.5">
    <div class="w-full shadow bg-white h-full text-sm flex items-center px-3 py-2 border-2 border-red-200 mr-2 rounded-lg">To Do</div>
    <a href="./add-progress/todo_add.php?wid=<?= $i ?>&bid=<?= $_GET['bid'] ?>&id=<?= $_GET['id'] ?>" type="button" class="text-red-500 border border-red-500 hover:bg-red-500 bg-red-200 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2">
      <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
      </svg>
      <span class="sr-only">Icon description</span>
    </a>
  </div>

  <!-- PILL PROGRESS TO DO-->
  <?php include("../content/progress_list/todo_pill.php") ?>
</div>

<div class="flex flex-col">
  <div class="flex mb-1.5">
    <div class="w-full shadow bg-white h-full text-sm flex items-center px-3 py-2 border-2 border-amber-200 mr-2 rounded-lg">Doing</div>
    <a href="./add-progress/doing_add.php?wid=<?= $i ?>&bid=<?= $_GET['bid'] ?>&id=<?= $_GET['id'] ?>" type="button" class="text-amber-500 border border-amber-500 hover:bg-amber-500 bg-amber-200 hover:text-white focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2">
      <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
      </svg>
      <span class="sr-only">Icon description</span>
    </a>
  </div>

  <!-- PILL PROGRESS DOING-->
  <?php include("../content/progress_list/doing_pill.php") ?>
</div>

<div class="flex flex-col">
  <div class="flex mb-1.5">
    <div class="w-full shadow bg-white h-full text-sm flex items-center px-3 py-2 border-2 border-green-200 mr-2 rounded-lg">Done</div>
    <a href="./add-progress/done_add.php?wid=<?= $i ?>&bid=<?= $_GET['bid'] ?>&id=<?= $_GET['id'] ?>" type="button" class="text-green-500 border border-green-500 hover:bg-green-500 bg-green-200 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2">
      <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
      </svg>
      <span class="sr-only">Icon description</span>
    </a>
  </div>
  <!-- PILL PROGRESS -->
  <?php include("../content/progress_list/done_pill.php") ?>
</div>