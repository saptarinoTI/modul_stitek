<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Data User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('patch')
                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Nama Lengkap')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                value="{{ $user->name }}" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div>
                            <x-input-label for="email" :value="__('Alamat Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                value="{{ $user->email }}" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <x-input-label for="password" :value="__('Kata Sandi')" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                :value="old('password')" required autofocus />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Level -->
                        <div>
                            <x-input-label for="level" :value="__('Level')" />
                            <x-text-select id="level" class="block mt-1 w-full" name="level" required>
                                <option value="admin" {{ $user->level == 'admin' ? ' selected' : '' }}>Admin</option>
                                <option value="laboran" {{ $user->level == 'laboran' ? ' selected' : '' }}>Laboran
                                </option>
                            </x-text-select>
                            <x-input-error :messages="$errors->get('level')" class="mt-2" />
                        </div>

                    </div>

                    <div class="flex justify-end mt-6">
                        <x-btn-save />
                    </div>
                </form>
            </div>
        </section>
    </div>
</x-app-layout>
