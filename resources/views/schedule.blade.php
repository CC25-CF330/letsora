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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Schedule</title>

    <style>
        :root {
            --fc-bg-color: #ffffff;
            --fc-text-color: #374151;
            --fc-border-color: #e5e7eb;
            --fc-header-bg-color: #f9fafb;
            --fc-today-bg-color: #f3f4f6;
            --fc-button-bg-color: #ffffff;
            --fc-button-text-color: #374151;
            --fc-button-hover-bg-color: #f3f4f6;
            --fc-button-active-bg-color: #4F46E5;
            --fc-button-active-text-color: #ffffff;
            --fc-event-text-color: #ffffff;
            --fc-day-header-bg-color: #f3f4f6;
            --fc-day-header-text-color: #6b7280;
        }

        html.dark {
            --fc-bg-color: #1f2937;
            --fc-text-color: #d1d5db;
            --fc-border-color: #4b5563;
            --fc-header-bg-color: #374151;
            --fc-today-bg-color: #4b5563;
            --fc-button-bg-color: #374151;
            --fc-button-text-color: #d1d5db;
            --fc-button-hover-bg-color: #4b5563;
            --fc-button-active-bg-color: #4F46E5;
            --fc-button-active-text-color: #ffffff;
            --fc-day-header-bg-color: #374151;
            --fc-day-header-text-color: #9ca3af;
        }

        #calendar {
            background-color: var(--fc-bg-color);
            color: var(--fc-text-color);
            border-radius: 0.75rem;
            padding: 1rem;
        }
        
        .fc-header-toolbar {
            margin-bottom: 1.5rem !important;
        }
        .fc .fc-toolbar-title {
            font-size: 1.25rem;
            font-weight: 600;
        }
        .fc .fc-button {
            background-color: var(--fc-button-bg-color);
            color: var(--fc-button-text-color);
            border: 1px solid var(--fc-border-color);
            box-shadow: none;
            transition: background-color 0.2s;
        }
        .fc .fc-button:hover {
            background-color: var(--fc-button-hover-bg-color);
        }
        .fc .fc-button-primary:not(:disabled).fc-button-active,
        .fc .fc-button-primary:not(:disabled):active {
            background-color: var(--fc-button-active-bg-color);
            color: var(--fc-button-active-text-color);
            border-color: var(--fc-button-active-bg-color);
        }

        .fc .fc-col-header-cell {
        background-color: var(--fc-day-header-bg-color) !important;
        color: var(--fc-day-header-text-color);
        font-weight: 600;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        }

        .fc-theme-standard th, .fc-theme-standard td, .fc-scrollgrid {
            border-color: var(--fc-border-color);
        }

        .fc .fc-daygrid-day.fc-day-today {
            background-color: var(--fc-today-bg-color);
        }

        .fc-event {
            border-radius: 4px;
            padding: 4px 6px;
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--fc-event-text-color) !important;
            border: none;
        }
        .fc-daygrid-event {
            white-space: normal;
        }
        .fc-event-main-frame {
            flex-direction: column;
            align-items: start;
        }
        .fc-event-time {
            font-weight: 600;
        }
        .fc-event-title {
            white-space: normal;
        }
    </style>
    
</head>
<body class="bg-gray-100 dark:bg-gray-900 h-full overflow-hidden">
    <!-- Sidebar -->
    @include('layouts.partials.sidebar')

    <!-- Main Content -->
    <div class="flex-1 sm:ml-64 h-screen">
        <main class="h-full p-6 md:p-10 overflow-y-auto">
            <!-- Header -->
            @include('layouts.partials.header', [
                'title' => 'Jadwal',
                'subtitle' => 'Kelola jadwalmu dengan mudah!'
            ])

            <!-- Schedule Content -->
            <div class="bg-white dark:bg-gray-800 rounded-xl p-6">
                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center space-x-4">
                        <h2 class="text-xl font-semibold dark:text-white">Jadwal Saya</h2>
                        <div class="flex items-center space-x-2">
                            <button id="toggleCalendarView" class="dark:text-white hover:text-gray-200 px-3 py-2 rounded-lg hover:bg-[#4338CA] transition flex items-center space-x-2">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Tampilan Kalender</span>
                            </button>
                            <button id="toggleListView" class="bg-[#4F46E5] dark:text-white hover:text-gray-200 px-3 py-2 rounded-lg hover:bg-[#4338CA] transition flex items-center space-x-2">
                                <i class="fas fa-list"></i>
                                <span>Tampilan List</span>
                            </button>
                        </div>
                    </div>
                    <button id="openAddModalBtn" class="bg-[#4F46E5] dark:text-white px-4 py-2 rounded-lg hover:bg-[#4338CA] transition flex items-center space-x-2">
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
                            <option value="all">Semua</option>
                            <option value="today">Hari Ini</option>
                            <option value="week">Minggu Ini</option>
                            <option value="month">Bulan Ini</option>
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

<!-- MODAL -->
<div id="scheduleModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
        <h3 id="modal-title" class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Tambah Jadwal</h3>

        <button type="button"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"
                onclick="closeModal()">
            <i class="fas fa-times text-lg"></i>
        </button>

        <form id="schedule-form" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" id="schedule-id" name="id">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-white">Judul</label>
                    <input type="text" id="title" name="title" required class="form-input w-full">
                </div>

                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 dark:text-white">Tipe</label>
                    <select id="type" name="type" required class="form-select w-full">
                        <option value="class">Kelas</option>
                        <option value="meeting">Rapat</option>
                        <option value="personal">Personal</option>
                    </select>
                </div>

                <div>
                    <label for="start_time" class="block text-sm font-medium text-gray-700 dark:text-white">Waktu Mulai</label>
                    <input type="datetime-local" id="start_time" name="start_time" required class="form-input w-full">
                </div>

                <div>
                    <label for="end_time" class="block text-sm font-medium text-gray-700 dark:text-white">Waktu Selesai</label>
                    <input type="datetime-local" id="end_time" name="end_time" required class="form-input w-full">
                </div>
            </div>

            <div>
                <label for="location" class="block text-sm font-medium text-gray-700 dark:text-white">Lokasi</label>
                <input type="text" id="location" name="location" required class="form-input w-full">
            </div>

            <div>
                <label for="instructor" class="block text-sm font-medium text-gray-700 dark:text-white">Pengajar</label>
                <input type="text" id="instructor" name="instructor" required class="form-input w-full">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-white">Deskripsi</label>
                <textarea id="description" name="description" rows="3" class="form-textarea w-full"></textarea>
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    <i class="fas fa-save mr-1"></i> Simpan
                </button>
            </div>
        </form>
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
    @push('styles')
<style>
    .form-input {
        @apply bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5
               dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400;
    }
    .form-textarea { @apply form-input; }
    .form-select { @apply form-input; }
</style>
@endpush
</body>



</html>