<x-app-layout>
    @if (auth()->user()->level != 'mahasiswa')
    <x-slot name="header">
        <h2 class="font-semibold mt-6 text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @elseif(auth()->user()->level == 'mahasiswa')
    <x-slot name="header">
        <h2 class="font-semibold mt-6 text-xl text-gray-800 leading-tight">
            {{ __('Modul Praktikum Berlangsung') }}
        </h2>
    </x-slot>
    @endif

    @if (auth()->user()->level != 'mahasiswa')
    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-4">
                <x-dashboard-card src="{{ asset('assets/img/group.png') }}">
                    <x-slot:title>Total User</x-slot>
                        {{ $user->count() }}
                        <x-slot:desc>User</x-slot>
                </x-dashboard-card>
                <x-dashboard-card src="{{ asset('assets/img/student-with-graduation-cap.png') }}">
                    <x-slot:title>Total Mahasiswa</x-slot>
                        {{ $mahasiswa->count() }}
                        <x-slot:desc>Mahasiswa</x-slot>
                </x-dashboard-card>
                <x-dashboard-card src="{{ asset('assets/img/open-book.png') }}">
                    <x-slot:title>Modul Praktikum</x-slot>
                        {{ $modul->count() }}
                        <x-slot:desc>Modul</x-slot>
                </x-dashboard-card>
            </div>
        </div>
    </div>
    @endif


    @if (auth()->user()->level == 'mahasiswa')

    <div class="flex flex-col lg:flex-row gap-4 mt-6">
        @if ($modul->isEmpty())
        <div class="p-6 bg-red-500 w-full rounded shadow-lg">
            <p class="font-semibold text-white">Modul Praktikum Tidak Tesedia Untuk Semester Ini!</p>
        </div>
        @else
        @foreach ($modul as $mdl)
        <x-dashboard-card-mhs src="{{ asset('cover/'. $mdl->name . '.jpg') }}">
            {{-- <x-slot:title>{{ $mdl->name }}</x-slot>
                <span>{{ $mdl->desc }}</span> --}}
                <x-slot:href>{{ route('flipbook.show', $mdl->id) }}</x-slot>
                    {{-- <x-slot:desc>View</x-slot> --}}
        </x-dashboard-card-mhs>
        @endforeach
        @endif
    </div>
    @endif

</x-app-layout>