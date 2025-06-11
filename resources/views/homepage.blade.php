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
    @include('layouts.partials.sidebar')

    <!-- Main Content -->
    <div class="flex-1 sm:ml-64 h-screen">
        <main class="h-full p-6 md:p-10 overflow-y-auto">
            @include('layouts.partials.header', [
                'title' => 'Beranda',
                'subtitle' => 'Ayo selesaikan tugasmu hari ini!'
            ])

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
                                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                        {{ $schedule->start_time->setTimezone($userTimezone)->format('H:i') }}
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-500">
                                        {{ $schedule->end_time->setTimezone($userTimezone)->format('H:i') }}
                                    </div>
                                    </div>
                                    <div class="flex-1 rounded-xl p-4 text-white transition" style="background-color: {{ $schedule->color }}">
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
                            <a href="{{ route('settings') }}" class="text-[#4F46E5]">
                                <i class="fas fa-gear"></i>
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
