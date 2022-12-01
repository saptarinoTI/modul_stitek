<div
  class="flex flex-row items-center justify-between w-full lg:max-w-sm overflow-hidden rounded-lg shadow-lg dark:bg-gray-800 py-4">
  <div class="flex items-center h-full justify-center w-full">
    <a href="{{ $href }}">
      <img {{ $attributes }} class="object-fill w-60 bg-cover">
    </a>
  </div>

  {{-- <div class="w-2/3 px-4 md:px-4">
    <h2 class="text-base md:text-sm font-bold text-gray-800 dark:text-white pt-2 ">{{ $title }}</h2>
    <h1 class="text-sm mt-2 mb-4 font-normal text-gray-800 dark:text-white">Semester {{ $slot }}</h1>

    <a href="{{ $href }}" class="text-sm text-white dark:text-white"><span
        class="bg-blue-500 px-3 py-1 hover:bg-blue-600 rounded">{{ $desc }}</span></a>
  </div> --}}
</div>