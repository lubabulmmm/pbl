<div class="w-full px-4 lg:px-12 grid grid-cols-1 lg:grid-cols-3">
  <div class="p-5 mr-5 border border-gray-200 rounded-lg bg-gray-50 mt-7 col-span-1 lg:col-span-2">
    <h1 class="text-lg font-semibold text-gray-900">Komentar Anda</h1>


    <ol class="relative border-s border-gray-200 mt-5 h-48 ov">
      <li class="mb-5 ms-4">
        <div class="absolute w-3 h-3 bg-amber-300 rounded-full mt-1.5 -start-1.5 border border-white "></div>
        <time class="mb-3 text-xs font-normal leading-none text-gray-400 ">February 2022</time>
        <h3 class="text-md my-2 font-semibold text-gray-900">Application UI code in Tailwind CSS</h3>
        <p class="mb-4 text-sm font-normal text-gray-500">Get access to over 20+ pages including a dashboard layout, charts, kanban board, calendar, and pre-order E-commerce & Marketing pages.</p>
      </li>
      <li class="mb-5 ms-4">
        <div class="absolute w-3 h-3 bg-amber-300 rounded-full mt-1.5 -start-1.5 border border-white "></div>
        <time class="mb-3 text-xs font-normal leading-none text-gray-400 ">February 2022</time>
        <h3 class="text-md my-2 font-semibold text-gray-900">Application UI code in Tailwind CSS</h3>
        <p class="mb-4 text-sm font-normal text-gray-500">Get access to over 20+ pages including a dashboard layout, charts, kanban board, calendar, and pre-order E-commerce & Marketing pages.</p>
      </li>
    </ol>

  </div>

  <form class="my-5 lg:my-7 lg:mr-5">
    <label for="comment" class="text-gray-800">Tulis komentar</label>
    <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-gray-200  my-3 focus:border-gray-200 block w-full p-2.5" placeholder="Tulis Judul Komentar.." required="">
    <div class="w-full border border-gray-200 rounded-lg bg-gray-100 col-span-1">
      <div class="px-4 py-2 bg-gray-50 rounded-t-lg">

        <label for="comment" class="sr-only">Your comment</label>
        <textarea id="comment" rows="4" class="w-full py-2 text-sm text-gray-900 bg-gray-50 border-0 focus:ring-0" placeholder="Tulis Deskripsi Komentar..." required></textarea>
      </div>
      <div class="flex items-center justify-between px-3 py-2 border-t">
        <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">
          Beri Komentar
        </button>
        <div class="flex ps-0 space-x-1 rtl:space-x-reverse sm:ps-2">
          <button type="button" class="inline-flex justify-center items-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 ">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 20">
              <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M1 6v8a5 5 0 1 0 10 0V4.5a3.5 3.5 0 1 0-7 0V13a2 2 0 0 0 4 0V6" />
            </svg>
            <span class="sr-only">Attach file</span>
          </button>
        </div>
      </div>
    </div>
  </form>
</div>