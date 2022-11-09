<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{--
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" /> --}}
    <script src="{{ asset('assets/js/alpine.min.js') }}"></script>
    <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
    {{--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" /> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script> --}}
    {{-- <script src="./assets/js/charts-lines.js" defer></script> --}}
    {{-- <script src="./assets/js/charts-pie.js" defer></script> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('layouts._sidebar')
        <div class="flex flex-col flex-1 w-full">
            @include('layouts._navbar')
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">

                    <!-- Page Heading -->
                    @if (isset($header))
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-6">
                        {{ $header }}
                    </h2>
                    @endif

                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    @include('sweetalert::alert')
    @if (isset($script))
    {{ $script }}
    @endif
</body>

</html>