<div id="member-upload-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-md max-h-full ">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow member-modal transition-all duration-300">
      <!-- Modal header -->
      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
        <h3 class="text-md font-semibold text-gray-900">
          Unggah File
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="member-upload-modal">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="p-4 md:p-5">
        <form action="../query/file-upload.php?tid=<?= $_GET['tid'] ?>&id=<?= $_GET['id'] ?>&bid=<?= $_GET['bid'] ?>" method="post" enctype="multipart/form-data">
          <div class="px-3 flex flex-wrap">
            <div class="w-full">
              <label class="block mb-2 text-xs font-medium text-gray-900" for="small_size">Sisipkan file</label>
              <input class="w-full mb-1 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" name="berkas" type="file" accept=".pdf, .csv, .jpg, .jpeg, .png, .svg, .xlsx">
              <p class="mt-1 text-xs text-gray-500 " id="file_input_help">PDF, CSV, JPG, SVG, XLSX.</p>
            </div>
            <input type="hidden" name="tf_id" value="<?= $_GET['tid'] ?>">
            <button type="submit" name="submit" class="py-2 focus:ring-4 w-full focus:outline-none focus:ring-amber-300 px-3 my-1.5 rounded-md text-white text-xs bg-amber-500">Unggah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>