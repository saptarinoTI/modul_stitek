<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col items-center justify-center sm:flex-row  sm:justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
                {{ __('Data User') }}
            </h2>
            <a href="{{ route('users.create') }}"
                class="mt-2 sm:mt-0 text-sm bg-blue-600 px-3 py-2 rounded shadow border-none text-white">Tambah
                Data</a>
        </div>
    </x-slot>


    <div class="py-6 w-full">
        <section class="max-w-7xl mx-auto">

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg p-3">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded-lg"
                        id="datatables-data">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <x-th-table>Name</x-th-table>
                                <x-th-table>Email</x-th-table>
                                <x-th-table>Level</x-th-table>
                                <x-th-table>Aksi</x-th-table>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <x-td-table>{{ ucwords($user->name) }}</x-td-table>
                                <x-td-table>{{ ucwords($user->email) }}</x-td-table>
                                <x-td-table>{{ ucwords($user->level) }}</x-td-table>
                                <td class="block sm:flex gap-2">
                                    <x-btn-edit href="{{ route('users.edit', $user->id) }}" />
                                    <x-btn-delete class="mt-2 sm:mt-0" method="POST"
                                        action="{{ route('users.destroy', $user->id) }}" />
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <x-slot name="script">
        <script>
            $(document).ready(function() {
                $('#datatables-data').DataTable();
            });
        </script>
    </x-slot>
</x-app-layout>