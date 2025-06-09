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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/js/timer.js', 'resources/js/calendar.js', 'resources/js/activity.js'])
    <title>Homepage</title>
</head>
<body class="bg-gray-100 dark:bg-gray-900 h-full overflow-hidden">
    <button data-drawer-target="cta-button-sidebar"         data-drawer-toggle="cta-button-sidebar" aria-controls="cta-button-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <!-- Sidebar -->
    <aside id="cta-button-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <nav class="flex flex-col justify-between h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <div>
                <a href="/" class="flex items-center mb-5 ps-2.5">
                    <img src="{{ asset('img/logo-letsora-light.png') }}" alt="Logo" class="size-10">
                    <span class="ml-3 self-center font-semibold whitespace-nowrap text-3xl dark:text-white">Letsora</span>
                </a>
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="/" class="flex items-center p-2 text-gray-900 dark:text-white rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-400 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3V6ZM3 15.75a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-2.25Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3v-2.25Z" clip-rule="evenodd" />
                            </svg>                
                            <span class="ms-3">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="/schedule" class="flex items-center p-2 text-gray-900 dark:text-white rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white">
                                <path d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                            </svg>                
                            <span class="ms-3">Jadwal</span>
                        </a>
                    </li>
                    <li>
                        <a href="/chart" class="flex items-center p-2 text-gray-900 dark:text-white rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                                <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                            </svg>
                            <span class="ms-3">Laporan</span>
                        </a>
                    </li>
                    <li>
                        <a href="/settings" class="flex items-center p-2 text-gray-900 dark:text-white rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white">
                                <path fill-rule="evenodd" d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 0 0-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 0 0-2.282.819l-.922 1.597a1.875 1.875 0 0 0 .432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 0 0 0 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 0 0-.432 2.385l.922 1.597a1.875 1.875 0 0 0 2.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 0 0 2.28-.819l.923-1.597a1.875 1.875 0 0 0-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 0 0 0-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 0 0-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 0 0-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 0 0-1.85-1.567h-1.843ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" clip-rule="evenodd" />
                            </svg>                
                            <span class="ms-3">Pengaturan</span>
                        </a>
                    </li>
                </ul>
            </div>
            
            <div class="relative w-full max-w-xs mx-auto">
                <div class="bg-white dark:bg-gradient-to-b from-[#0f1226] to-[#1a1c2e] rounded-2xl p-6 text-center dark:text-white relative" style="box-shadow: 0 0 15px rgb(15 18 38 / 0.1)">
                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-12 h-12 rounded-full bg-white dark:bg-[#0f1226] border-4 border-gray-700 dark:border-white flex items-center justify-center dark:text-white font-semibold text-lg select-none">
                    AI
                    </div>
                    <p class="mt-6 font-semibold text-lg leading-tight select-none">
                    Tanya Sora Aja!
                    </p>
                    <p class="mt-2 text-xs leading-snug select-none">
                    Bingung cara ngatur jadwal?
                    <br/>
                    AI siap membantumu 24/7.
                    </p>
                    <button class="mt-6 dark:bg-white bg-gray-700 dark:text-black text-white rounded-md px-6 py-2 text-sm font-semibold select-none hover:bg-gray-800 dark:hover:bg-gray-200 transition" type="button">
                    Coming Soon
                    </button>
                </div>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 sm:ml-64 h-screen">
        <main class="h-full p-6 md:p-10 overflow-y-auto">
            <!-- Header -->
            <header class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-2xl font-semibold dark:text-white">Hi, {{ auth()->user()->name }}</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Ayo selesaikan tugasmu hari ini!</p>
                </div>
                <div class="flex items-center space-x-6">
                    <button aria-label="Notifications" class="relative text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <i class="far fa-bell text-xl"></i>
                        <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white dark:border-gray-800"></span>
                    </button>
                    <img src="{{ auth()->user()->profile_photo_url }}" alt="Photo Profile" class="w-10 h-10 rounded-full object-cover">
                </div>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Left Content (Timer, Activity, Schedule) -->
                <div class="lg:col-span-8 space-y-8">
                    <!-- Timer and Activity Section -->
                    <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Timer Card -->
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 dark:text-white flex flex-col items-center">
                            <div class="relative w-32 h-32 mb-4">
                                <svg class="absolute top-0 left-0 w-32 h-32" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="45" stroke="currentColor" stroke-width="10" fill="none" class="text-gray-200 dark:text-gray-700"/>
                                    <circle id="timer-progress" cx="50" cy="50" r="45" stroke="#4F46E5" stroke-width="10" fill="none"
                                        stroke-dasharray="282.6" stroke-dashoffset="282.6" transform="rotate(-90 50 50)"/>
                                </svg>
                                <div class="absolute inset-0 flex flex-col items-center justify-center">
                                    <span id="timer-display" class="text-2xl font-semibold">25:00</span>
                                </div>
                            </div>
                            <div class="flex space-x-4">
                                <button id="start-timer" class="bg-[#4F46E5] text-white px-4 py-2 rounded-lg hover:bg-[#4338CA] transition">
                                    <i class="fas fa-play"></i>
                                </button>
                                <button id="pause-timer" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition hidden">
                                    <i class="fas fa-pause"></i>
                                </button>
                                <button id="reset-timer" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                                    <i class="fas fa-redo"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Activity Chart -->
                        <div class="bg-white dark:bg-[#1f2937] rounded-xl p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-sm dark:text-white font-semibold">Aktivitas</h2>
                                <select class="bg-white dark:bg-[#111827] text-xs text-gray-500 dark:text-gray-400 border rounded px-3 py-1">
                                    <option>Minggu Ini</option>
                                    <option>Minggu Lalu</option>
                                    <option>Bulan Ini</option>
                                </select>
                            </div>
                            <div class="relative h-40">
                                <div class="absolute inset-0">
                                    <svg class="w-full h-full" viewBox="0 0 300 100">
                                        <path d="M20 70 Q60 20 100 50 T180 40 T260 60" fill="none" stroke="white" stroke-width="3"/>
                                        <circle cx="212" cy="25" r="6" fill="#4F46E5" stroke="#111827" stroke-width="2"/>
                                        <rect x="213" y="0" width="40" height="20" rx="4" fill="#111827"/>
                                        <text x="233" y="14" fill="white" text-anchor="middle" font-size="10" font-weight="600">2 Task</text>
                                    </svg>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 flex justify-between text-xs text-gray-500 dark:text-gray-400 px-2">
                                    <span>S</span>
                                    <span>M</span>
                                    <span>T</span>
                                    <span>W</span>
                                    <span>T</span>
                                    <span>F</span>
                                    <span>S</span>
                                </div>
                            </div>
                        </div>
                    </section>

                        <!-- Today's Schedules (replacing Activity Chart) -->
                    <section class="bg-white dark:bg-[#1f2937] rounded-xl p-6">
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-sm font-semibold dark:text-white">Aktivitas Hari Ini</h2>
                                {{-- You can add filter options here later if needed --}}
                            </div>
                            <div class="space-y-4" id="activity-list">
                                @forelse($schedules as $schedule)
                                <div class="flex space-x-6 group">
                                    <div class="w-20">
                                        <div class="text-sm font-medium text-gray-500">{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}</div>
                                        <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}</div>
                                    </div>
                                    <div class="flex-1 bg-[#4F46E5] rounded-xl p-4 text-white group-hover:bg-[#4338CA] transition">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <h3 class="font-medium">{{ $schedule->title }}</h3>
                                                <p class="text-sm mt-1">{{ $schedule->description }}</p>
                                            </div>
                                            <div class="flex items-center space-x-4 text-sm">
                                                <div class="flex items-center space-x-1">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <span>{{ $schedule->location }}</span>
                                                </div>
                                                <div class="flex items-center space-x-1">
                                                    <img src="{{ $schedule->instructor_photo_url ?? 'https://ui-avatars.com/api/?name='.urlencode($schedule->instructor) }}" class="w-5 h-5 rounded-full">
                                                    <span>{{ $schedule->instructor }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                    <p class="text-gray-500 dark:text-gray-400">Tidak ada jadwal untuk hari ini.</p>
                                @endforelse
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Right Content (Profile, Calendar, Night Owl) -->
                <div class="lg:col-span-4 bg-white dark:bg-gray-800 rounded-xl p-6 space-y-8">
                    <!-- Profile Section -->
                    <section>
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="font-semibold dark:text-white">Profile</h2>
                            <a href="{{ route('profile.edit') }}" class="text-[#4F46E5]">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                        <div class="flex flex-col items-center text-center">
                            <img src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : asset('img/profile-default.png') }}" alt="Foto Profil" class="rounded-full w-16 h-16 object-cover">
                            <h3 class="font-semibold text-lg mb-2 dark:text-white">{{ auth()->user()->name }}</h3>
                            <p class="text-sm text-gray-500 dark:text-white">{{ auth()->user()->major ?? 'Student' }}</p>
                        </div>
                    </section>

                    <!-- Calendar Section -->
                    <section>
                        <div id="datepicker-inline" data-datepicker-format="mm/dd/yyyy" data-datepicker-inline="true" class="flex items-center justify-center"></div>
                    </section>

                    <!-- Night Owl Section -->
                    <section class="dark:bg-[#0F1226] bg-white rounded-xl p-6 text-center dark:text-white"
                    style="box-shadow: 0 0 15px rgb(15 18 38 / 0.1)">
                        <img class="mx-auto rounded-lg mb-4" src="https://storage.googleapis.com/a1aa/image/e5f56ea0-58dc-4554-e3a3-a1e0178d4a0b.jpg" width="320" height="120" alt="Night owl logo">
                        <h3 class="text-lg font-semibold mb-1">Night Owl</h3>
                        <p class="text-xs mb-4">
                            Having Trouble in Learning?
                            <br>
                            Please Contact Us for more information.
                        </p>
                        <button class="dark:bg-white bg-gray-700 dark:text-[#0F1226] text-white px-4 py-2 rounded-md text-xs font-semibold">
                            Lihat Selengkapnya
                        </button>
                    </section>
                </div>
            </div>
        </main>
    </div>

    <!-- Add Schedule Modal -->
    <div id="addScheduleModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Add New Schedule
                    </h3>
                    <button type="button" id="closeAddModalBtn" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <form id="schedule-form" class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                            <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea name="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="start_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Time</label>
                            <input type="datetime-local" name="start_time" id="start_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="end_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Time</label>
                            <input type="datetime-local" name="end_time" id="end_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>
                        <div class="col-span-2">
                            <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                            <input type="text" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>
                        <div class="col-span-2">
                            <label for="instructor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instructor</label>
                            <input type="text" name="instructor" id="instructor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <i class="fas fa-plus me-1"></i>
                        Add Schedule
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite(['resources/js/timer.js'])
    <script>
        // Dark mode functionality
        if (localStorage.getItem('darkMode') === 'true' || 
            (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>
</body>
</html>
