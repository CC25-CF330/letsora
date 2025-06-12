<!DOCTYPE html>
<html lang="en" x-data="{
    theme: localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'),
    setTheme(t) {
        this.theme = t;
        localStorage.setItem('theme', t);
        if (t === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }
}" x-init="setTheme(theme)" :class="{ 'dark': theme === 'dark' }" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>Pengaturan - Letsora</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 dark:bg-gray-900 h-full overflow-hidden">
    @include('layouts.partials.sidebar')

    <!-- Main Content -->
    <div class="flex-1 sm:ml-64 h-screen">
        <main class="h-full p-6 md:p-10 overflow-y-auto">
            <!-- Header -->
            @include('layouts.partials.header', [
                'title' => 'Pengaturan',
                'subtitle' => 'Atur profil dan preferensi aplikasi Anda'
            ])

            {{-- Formulir utama yang mencakup semua bagian --}}
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div x-data="{ tab: 'profile' }" class="w-full max-w-6xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow p-8 mt-2">
                    <div class="border-b border-gray-200 dark:border-gray-700 mb-8">
                        <div class="flex space-x-8" aria-label="Tabs">
                            <button type="button" @click="tab = 'umum'" :class="tab === 'umum' ? 'border-indigo-500 text-indigo-600 dark:text-indigo-400' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-600 dark:hover:text-gray-300'" class="py-2 px-1 border-b-2 font-medium text-sm focus:outline-none">Umum</button>
                            <button type="button" @click="tab = 'profile'" :class="tab === 'profile' ? 'border-indigo-500 text-indigo-600 dark:text-indigo-400' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-600 dark:hover:text-gray-300'" class="py-2 px-1 border-b-2 font-medium text-sm focus:outline-none">Profile</button>
                        </div>
                    </div>

                    <!-- Tab Umum -->
                    <div x-show="tab === 'umum'" class="space-y-8" x-cloak>
                        <div class="space-y-6">
                            {{-- Zona Waktu --}}
                            <div>
                                <label for="timezone" class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-2">Zona Waktu</label>
                                <select id="timezone" name="timezone" class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 py-2 px-3 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                                    <option value="">-- Pilih Zona Waktu --</option>
                                    @foreach(timezone_identifiers_list() as $timezone)
                                        <option value="{{ $timezone }}" @selected(old('timezone', $user->timezone) == $timezone)>
                                            {{ $timezone }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('timezone')" class="mt-2" />
                            </div>
                            {{-- Pengaturan Tema hanya visual, tidak perlu disimpan ke server --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-2">Tema Layar</label>
                                <div class="flex space-x-4">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="theme" value="light" class="form-radio text-indigo-600" :checked="theme === 'light'" @change="setTheme('light')">
                                        <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Light Mode</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="theme" value="dark" class="form-radio text-indigo-600" :checked="theme === 'dark'" @change="setTheme('dark')">
                                        <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Dark Mode</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Profile -->
                    <div x-show="tab === 'profile'" x-cloak>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div class="md:col-span-1 bg-white dark:bg-gray-800 border dark:border-gray-700 rounded-2xl p-8 flex flex-col items-center self-start">
                                <!-- Tombol ganti foto -->
                                <div class="mb-2 w-full flex justify-end">
                                    <label for="profile_photo" class="cursor-pointer inline-flex items-center px-2 py-1 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-medium rounded">
                                        <i class="fas fa-camera mr-1"></i> Ganti Foto
                                    </label>
                                    <input type="file" id="profile_photo" name="profile_photo" accept="image/*" class="hidden">
                                </div>
                                <!-- Gambar profil -->
                                <div class="relative w-40 h-40 rounded-full overflow-hidden mb-4 shadow border border-gray-300 dark:border-gray-600">
                                    <img src="{{ auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : asset('img/profile-default.png') }}"
                                        alt="Foto Profil"
                                        class="w-full h-full object-cover object-center" />
                                </div>



                                <div class="text-center">
                                    <div class="font-semibold text-lg dark:text-white">{{ $user->name }}</div>
                                    <div class="text-gray-500 dark:text-gray-400 text-sm mt-1">{{ $user->email }}</div>
                                </div>
                            </div>
                            
                            <!-- Edit Profile Form (Sekarang bagian dari form utama) -->
                            <div class="md:col-span-2 space-y-6">
                                {{-- Nama --}}
                                <div>
                                    <x-input-label for="name" :value="__('Nama Lengkap')" class="dark:text-gray-400"/>
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:border-gray-500" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                {{-- Email --}}
                                <div>
                                    <x-input-label for="email" :value="__('Email')" class="dark:text-gray-400"/>
                                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:border-gray-500" :value="old('email', $user->email)" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    {{-- ... bagian verifikasi email ... --}}
                                </div>
                                {{-- Umur --}}
                            <div>
                                <x-input-label for="age" :value="__('Umur')" class="dark:text-gray-400"/>
                                <x-text-input id="age" name="age" type="number" min="17" max="30"
                                    class="mt-1 block w-full dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:border-gray-500"
                                    :value="old('age', $user->age)" />
                                <x-input-error :messages="$errors->get('age')" class="mt-2" />
                            </div>

                            {{-- Jenis Kelamin --}}
                            <div>
                                <x-input-label for="gender_encoded" :value="__('Jenis Kelamin')" class="dark:text-gray-400"/>
                                <select id="gender_encoded" name="gender_encoded"
                                    class="mt-1 block w-full dark:bg-gray-700 dark:text-white dark:border-gray-500 border rounded">
                                    <option value="0" {{ old('gender_encoded', $user->gender_encoded) == 0 ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="1" {{ old('gender_encoded', $user->gender_encoded) == 1 ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                <x-input-error :messages="$errors->get('gender_encoded')" class="mt-2" />
                            </div>

                            {{-- Kehadiran --}}
                            <div>
                                <x-input-label for="attendance_percentage" :value="__('Persentase Kehadiran')" class="dark:text-gray-400"/>
                                <x-text-input id="attendance_percentage" name="attendance_percentage" type="number" step="0.1" min="0" max="100"
                                    class="mt-1 block w-full dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:border-gray-500"
                                    :value="old('attendance_percentage', $user->attendance_percentage)" />
                                <x-input-error :messages="$errors->get('attendance_percentage')" class="mt-2" />
                            </div>

                            {{-- Mental Health --}}
                            <div>
                                <x-input-label for="mental_health_rating" :value="__('Rating Mental Health (1-10)')" class="dark:text-gray-400"/>
                                <x-text-input id="mental_health_rating" name="mental_health_rating" type="number" step="0.1" min="1" max="10"
                                    class="mt-1 block w-full dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:border-gray-500"
                                    :value="old('mental_health_rating', $user->mental_health_rating)" />
                                <x-input-error :messages="$errors->get('mental_health_rating')" class="mt-2" />
                            </div>

                            {{-- Nilai Ujian --}}
                            <div>
                                <x-input-label for="exam_score" :value="__('Nilai Ujian')" class="dark:text-gray-400"/>
                                <x-text-input id="exam_score" name="exam_score" type="number" step="0.1" min="0" max="100"
                                    class="mt-1 block w-full dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:border-gray-500"
                                    :value="old('exam_score', $user->exam_score)" />
                                <x-input-error :messages="$errors->get('exam_score')" class="mt-2" />
                            </div>

                            

                            {{-- Keterampilan --}}

                            </div>
                        </div>
                    </div>

                    {{-- Tombol Simpan --}}
                    <div class="mt-8 flex items-center gap-4 ">
                        <x-primary-button class="dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">{{ __('Simpan Perubahan') }}</x-primary-button>
                        @if (session('status') === 'profile-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Tersimpan.') }}</p>
                        @endif
                    </div>
                </div>
            </form>

            {{-- Form untuk Update Password (Terpisah untuk keamanan) --}}
            <div class="max-w-6xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow p-8 mt-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Form untuk Hapus Akun (Terpisah untuk keamanan) --}}
            <div class="max-w-6xl mx-auto bg-white dark:bg-gray-800 shadow sm:rounded-lg p-8 mt-8">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </main>
    </div>

    {{-- Script Flowbite jika masih dibutuhkan --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>