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
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js'></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Schedule</title>
</head>
<body class="bg-gray-100 dark:bg-gray-900 h-full overflow-hidden">
    <!-- Sidebar -->
    <button data-drawer-target="cta-button-sidebar" data-drawer-toggle="cta-button-sidebar" aria-controls="cta-button-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <aside id="cta-button-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <nav class="flex flex-col justify-between h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <div>
                <a href="/" class="flex items-center mb-5 ps-2.5">
                    <img src="http://letsora.test/img/logo-letsora-light.png" alt="" class="size-10">
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
                    <p class="text-sm text-gray-500 dark:text-gray-400">Kelola jadwalmu dengan mudah!</p>
                </div>
                <div class="flex items-center space-x-6">
                    <button aria-label="Notifications" class="relative text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <i class="far fa-bell text-xl"></i>
                        <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white dark:border-gray-800"></span>
                    </button>
                    <img src="{{ auth()->user()->profile_photo_url }}" alt="Photo Profile" class="w-10 h-10 rounded-full object-cover">
                </div>
            </header>

            <!-- Schedule Content -->
            <div class="bg-white dark:bg-gray-800 rounded-xl p-6">
                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center space-x-4">
                        <h2 class="text-xl font-semibold dark:text-white">Jadwal Saya</h2>
                        <div class="flex items-center space-x-2">
                            <button id="toggleCalendarView" class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-3 py-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition flex items-center space-x-2">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Tampilan Kalender</span>
                            </button>
                            <button id="toggleListView" class="bg-[#4F46E5] text-white px-3 py-2 rounded-lg hover:bg-[#4338CA] transition flex items-center space-x-2">
                                <i class="fas fa-list"></i>
                                <span>Tampilan List</span>
                            </button>
                        </div>
                    </div>
                    <button id="openAddModalBtn" class="bg-[#4F46E5] text-white px-4 py-2 rounded-lg hover:bg-[#4338CA] transition flex items-center space-x-2">
                        <i class="fas fa-plus"></i>
                        <span>Tambah Jadwal</span>
                    </button>
                </div>

                <!-- Calendar View -->
                <div id="calendar-view" class="hidden">
                    <div id="calendar" class="bg-white dark:bg-gray-800 rounded-lg"></div>
                </div>

                <!-- List View -->
                <div id="list-view">
                    <!-- Schedule Filters -->
                    <div class="flex items-center space-x-4 mb-6">
                        <select id="filter-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="today">Hari Ini</option>
                            <option value="week">Minggu Ini</option>
                            <option value="month">Bulan Ini</option>
                            <option value="all">Semua</option>
                        </select>
                        <select id="filter-type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="all">Semua Tipe</option>
                            <option value="class">Kelas</option>
                            <option value="meeting">Rapat</option>
                            <option value="personal">Personal</option>
                        </select>
                        <div class="relative">
                            <input type="text" id="search-schedule" placeholder="Cari jadwal..." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Schedule List -->
                    <div class="space-y-4" id="schedule-list">
                        @foreach($schedules as $schedule)
                        <div class="flex space-x-6 group" data-type="{{ $schedule->type }}" data-date="{{ $schedule->start_time }}">
                            <div class="w-20">
                                <div class="text-sm font-medium text-gray-500">{{ $schedule->start_time->format('H:i') }}</div>
                                <div class="text-xs text-gray-500">{{ $schedule->end_time->format('H:i') }}</div>
                            </div>
                            <div class="flex-1 bg-[#4F46E5] rounded-xl p-4 text-white group-hover:bg-[#4338CA] transition">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h3 class="font-medium">{{ $schedule->title }}</h3>
                                        <p class="text-sm mt-1">{{ $schedule->description }}</p>
                                    </div>
                                    <div class="flex items-center space-x-4">
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
                                        <div class="flex items-center space-x-2">
                                            <button class="text-white hover:text-gray-200" onclick="editSchedule({{ $schedule->id }})">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-white hover:text-gray-200" onclick="deleteSchedule({{ $schedule->id }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Add/Edit Schedule Modal -->
    <div id="scheduleModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white" id="modal-title">
                        Tambah Jadwal Baru
                    </h3>
                    <button type="button" id="closeModalBtn" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <form id="schedule-form" class="p-4 md:p-5">
                    <input type="hidden" id="schedule-id" name="id">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                            <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                            <textarea name="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="start_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu Mulai</label>
                            <input type="datetime-local" name="start_time" id="start_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="end_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu Selesai</label>
                            <input type="datetime-local" name="end_time" id="end_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>
                        <div class="col-span-2">
                            <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi</label>
                            <input type="text" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>
                        <div class="col-span-2">
                            <label for="instructor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengajar</label>
                            <input type="text" name="instructor" id="instructor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>
                        <div class="col-span-2">
                            <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe</label>
                            <select name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                <option value="class">Kelas</option>
                                <option value="meeting">Rapat</option>
                                <option value="personal">Personal</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <i class="fas fa-save me-1"></i>
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script>
        // Dark mode functionality
        if (localStorage.getItem('darkMode') === 'true' || 
            (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }

        // Pass schedule data to JavaScript
        window.scheduleData = @json($schedules);
    </script>
    @vite(['resources/js/schedule.js'])
    <script>
        // Dark mode functionality
        if (localStorage.getItem('darkMode') === 'true' || 
            (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>
</body>
</html>