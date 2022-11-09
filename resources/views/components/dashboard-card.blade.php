<div class="flex w-full lg:max-w-sm overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 py-4">
    <div class="w-1/3 flex items-center h-full justify-center">
        <img {{ $attributes }} class="object-fill h-1/2 w-1/2 bg-cover">
    </div>

    <div class="w-2/3 px-4 md:px-4">
        <h2 class="text-base font-bold text-gray-800 dark:text-white pt-2 ">{{ $title }}</h2>
        <h1 class="text-2xl mt-2 font-bold text-gray-800 dark:text-white">{{ $slot }}</h1>

        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $desc }}</p>
    </div>
</div>
