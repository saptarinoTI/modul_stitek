<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('mahasiswa.update', $mhs->nim) }}">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                        <!-- NIM -->
                        <div>
                            <x-input-label for="nim" :value="__('NIM Mahasiswa')" />
                            <x-text-input id="nim" class="block mt-1 w-full bg-slate-200" type="text" name="nim"
                                value="{{ $mhs->nim }}" required autofocus readonly />
                            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
                        </div>

                        <!-- NAMA -->
                        <div>
                            <x-input-label for="nama" :value="__('Nama Lengkap')" />
                            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama"
                                value="{{ $mhs->nama }}" required autofocus />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>

                        <!-- KELAS -->
                        <div>
                            <x-input-label for="kelas" :value="__('kelas')" />
                            <x-text-select id="kelas" class="block mt-1 w-full" name="kelas" required>
                                <option value="sore" {{ ($mhs->kelas == 'sore') ? 'selected' : '' }}>Sore</option>
                                <option value="pagi" {{ ($mhs->kelas == 'pagi') ? 'selected' : '' }}>Pagi</option>
                            </x-text-select>
                            <x-input-error :messages="$errors->get('kelas')" class="mt-2" />
                        </div>

                        <!-- TTL -->
                        <div>
                            <x-input-label for="ttl" :value="__('Tempat Tanggal Lahir')" />
                            <x-text-input id="ttl" class="block mt-1 w-full" type="text" name="ttl"
                                value="{{ $mhs->ttl }}" required autofocus />
                            <x-input-error :messages="$errors->get('ttl')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="mt-3">
                        <x-input-label for="alamat" :value="__('Alamat')" />
                        <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat"
                            value="{{ $mhs->alamat }}" required autofocus />
                        <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                    </div>

                    <div class="flex justify-end mt-6">
                        <x-btn-save />
                    </div>
                </form>
            </div>
        </section>
    </div>
</x-app-layout>