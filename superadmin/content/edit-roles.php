<div id="popup-edit-roles-<?= $role['role_id'] ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-7 w-full max-w-md max-h-full">
    <div class="relative bg-white rounded-lg shadow">
      <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-hide="popup-edit-roles-<?= $role['role_id'] ?>">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close modal</span>
      </button>
      <div class="p-4 md:p-5 text-center">
        <svg class="mx-auto mb-4 text-amber-500 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 8v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8m18 0-8-4.5a2 2 0 0 0-2 0L3 8m18 0-9 6.5L3 8" />
        </svg>
        <form action="" method="post">
          <div class="flex flex-col">
            <div class="mb-6">
              <label for="default-input" class="block mb-2 text-sm font-medium text-amber-600">Edit role:</label>
              <input placeholder="Tulis nama kategori.." name="role" type="text" class="w-full border-2 rounded-md border-gray-200 p-2" value="<?= $role['role_name'] ?>">
              <input placeholder="Tulis nama kategori.." name="id" type="hidden" class="w-full border-2 rounded-md border-gray-200 p-2" value="<?= $role['role_id'] ?>">
            </div>
            <div class="flex justify-evenly">
              <button type="submit" name="edit_role" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                Tambahkan Role
              </button>
              <button data-modal-hide="popup-edit-roles-<?= $role['role_id'] ?>" type="button" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">Batalkan dan tutup</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>