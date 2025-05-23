<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <!-- FullCalendar CSS -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css' rel='stylesheet' />
    @vite('resources/css/app.css')
    <title>Jadwal | Letsora</title>
</head>
<body class="bg-gray-50 h-full overflow-hidden">
    <button data-drawer-target="cta-button-sidebar" data-drawer-toggle="cta-button-sidebar" aria-controls="cta-button-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <!-- Sidebar -->
    <aside id="cta-button-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <nav class="flex flex-col justify-between h-full px-3 py-4 overflow-y-auto bg-gray-50">
            <div>
                <a href="#" class="flex items-center mb-5 ps-2.5">
                    <img src="http://letsora.test/img/logo-letsora-light.png" alt="" class="size-10">
                    <span class="ml-3 self-center font-semibold whitespace-nowrap text-3xl">Letsora</span>
                </a>
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="/" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3V6ZM3 15.75a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-2.25Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3v-2.25Z" clip-rule="evenodd" />
                            </svg>                
                            <span class="ms-3">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="/schedule" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900">
                                <path d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                            </svg>                
                            <span class="ms-3">Jadwal</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                                <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                            </svg>
                            <span class="ms-3">Laporan</span>
                        </a>
                    </li>
                    <li>
                        <a href="/chatbot" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900">
                                <path fill-rule="evenodd" d="M12 2.25c-2.429 0-4.817.178-7.152.521C2.87 3.061 1.5 4.795 1.5 6.741v6.018c0 1.946 1.37 3.68 3.348 3.97.877.129 1.761.234 2.652.316V21a.75.75 0 0 0 1.28.53l4.184-4.183a.39.39 0 0 1 .266-.112c2.006-.05 3.982-.22 5.922-.506 1.978-.29 3.348-2.023 3.348-3.97V6.741c0-1.947-1.37-3.68-3.348-3.97A49.145 49.145 0 0 0 12 2.25ZM8.25 8.625a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Zm2.625 1.125a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z" clip-rule="evenodd" />
                            </svg>
                            <span class="ms-3">Chatbot</span>
                        </a>
                    </li>
                    <li>
                        <a href="/settings" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900">
                                <path fill-rule="evenodd" d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 0 0-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 0 0-2.282.819l-.922 1.597a1.875 1.875 0 0 0 .432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 0 0 0 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 0 0-.432 2.385l.922 1.597a1.875 1.875 0 0 0 2.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 0 0 2.28-.819l.923-1.597a1.875 1.875 0 0 0-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 0 0 0-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 0 0-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 0 0-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 0 0-1.85-1.567h-1.843ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" clip-rule="evenodd" />
                            </svg>                
                            <span class="ms-3">Pengaturan</span>
                        </a>
                    </li>
                </ul>
            </div>
            
            <div class="relative w-full max-w-xs mx-auto">
                <div class="bg-gradient-to-b from-[#0f1226] to-[#1a1c2e] rounded-2xl p-6 text-center text-white relative" style="box-shadow: 0 0 15px rgb(15 18 38 / 0.5)">
                 <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-12 h-12 rounded-full bg-[#0f1226] border-4 border-white flex items-center justify-center text-white font-semibold text-lg select-none">
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
                 <button class="mt-6 bg-white text-black rounded-md px-6 py-2 text-sm font-semibold select-none hover:bg-gray-100 transition" type="button">
                  Chat Sekarang
                 </button>
                </div>
               </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex flex-col sm:flex-1 sm:ml-64 min-h-screen">
        <main class="p-2 sm:p-6 md:p-10 w-full">
            <header class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 sm:mb-8 gap-2 sm:gap-0">
                <div>
                    <h1 class="text-xl sm:text-2xl font-semibold">Jadwal</h1>
                </div>
                <div class="flex items-center space-x-4 sm:space-x-6">
                    <button aria-label="Notifications" class="relative text-gray-400 hover:text-gray-600">
                        <i class="far fa-bell text-lg sm:text-xl"></i>
                        <span class="absolute -top-1 -right-1 w-2 h-2 sm:w-2.5 sm:h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                    <img src="https://storage.googleapis.com/a1aa/image/d645b794-8518-4051-0a2d-e539edf0df02.jpg" alt="Photo Profile" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full object-cover">
                </div>
            </header>
            <div class="w-full max-w-full sm:max-w-6xl mx-auto" style="overflow-y:auto; max-height:80vh;">
                <div id="calendar" class="bg-slate-800 rounded-2xl shadow-lg p-6">
                    <style>
                        .fc {
                            @apply bg-slate-800;
                        }
                        .fc-toolbar-title {
                            @apply text-xl font-semibold text-slate-100;
                        }
                        .fc-button {
                            @apply bg-slate-700 text-slate-100 border border-slate-600 rounded-md font-medium hover:bg-slate-600 transition-colors;
                        }
                        .fc-button-primary:not(:disabled).fc-button-active, 
                        .fc-button-primary:not(:disabled):active {
                            @apply bg-indigo-600 text-white border-indigo-500;
                        }
                        .fc-daygrid-event {
                            @apply rounded-lg border-none text-sm py-0.5 px-1.5 shadow-sm;
                        }
                        .fc-daygrid-event-dot {
                            @apply hidden;
                        }
                        .fc-col-header-cell-cushion {
                            @apply font-semibold text-slate-100;
                        }
                        .fc-scrollgrid-section-header > th {
                            @apply border-t-0 border-slate-700;
                        }
                        .fc-daygrid-day-number {
                            @apply text-slate-100 font-medium;
                        }
                        .fc-daygrid-day {
                            @apply bg-emerald-900/20 border-slate-700;
                        }
                        .fc-daygrid-day.fc-day-today {
                            @apply bg-emerald-800/40;
                        }
                        .fc-daygrid-day-frame {
                            @apply bg-emerald-900/20;
                        }
                        .fc-daygrid-day.fc-day-other {
                            @apply bg-slate-950/30;
                        }
                        .fc-daygrid-day.fc-day-other .fc-daygrid-day-number {
                            @apply text-slate-500;
                        }
                        .fc-daygrid-day.fc-day-other .fc-col-header-cell-cushion {
                            @apply text-slate-500;
                        }
                        .fc-theme-standard td, .fc-theme-standard th {
                            @apply border-slate-700;
                        }
                        .fc-list {
                            @apply bg-slate-800 text-slate-100;
                        }
                        .fc-list-day-cushion {
                            @apply bg-slate-700/50;
                        }
                        .fc-list-event:hover td {
                            @apply bg-slate-700/30;
                        }
                        .fc-list-event-time {
                            @apply text-slate-300;
                        }
                        .fc-list-event-title a {
                            @apply text-slate-100 hover:text-white;
                        }
                    </style>
                </div>
            </div>
        </main>
    </div>

    <!-- FullCalendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          headerToolbar: {
            left: 'title',
            center: 'dayGridMonth,timeGridWeek',
            right: 'today prev,next'
          },
          height: 'auto',
          events: [
            {
              title: 'Contact customers with failed new payents',
              start: '2025-06-02T10:00:00',
              end: '2025-06-02T12:00:00',
              color: '#F6C177'
            },
            {
              title: 'Extension: show totals',
              start: '2025-06-02T10:00:00',
              end: '2025-06-03T12:00:00',
              color: '#A7D7D9'
            },
            {
              title: 'Dashboard: concept',
              start: '2025-06-04T10:00:00',
              end: '2025-06-04T12:00:00',
              color: '#B7E4C7'
            },
            {
              title: 'Task detail modal',
              start: '2025-06-03T10:00:00',
              end: '2025-06-03T12:00:00',
              color: '#F7CAD0'
            },
            {
              title: 'Task detail modal',
              start: '2025-06-10T10:00:00',
              end: '2025-06-10T12:00:00',
              color: '#F7CAD0'
            },
            {
              title: 'Help Docs: update screenshot',
              start: '2025-06-05T10:00:00',
              end: '2025-06-05T12:00:00',
              color: '#E9ECEF'
            },
            {
              title: 'Reporting: Design concept of visual dashboard',
              start: '2025-06-09T10:00:00',
              end: '2025-06-09T12:00:00',
              color: '#B5D0F7'
            },
            {
              title: 'Reporting: Design concept of visual dashboard',
              start: '2025-06-12T10:00:00',
              end: '2025-06-12T12:00:00',
              color: '#B5D0F7'
            },
            {
              title: 'Dashboard: concept',
              start: '2025-06-16T10:00:00',
              end: '2025-06-16T12:00:00',
              color: '#B7E4C7'
            },
            {
              title: 'Extension: show totals',
              start: '2025-06-17T10:00:00',
              end: '2025-06-18T12:00:00',
              color: '#A7D7D9'
            },
            {
              title: 'Dashboard: concept',
              start: '2025-06-19T10:00:00',
              end: '2025-06-20T12:00:00',
              color: '#B7E4C7'
            },
            {
              title: 'Contact customers with failed new payents',
              start: '2025-06-27T10:00:00',
              end: '2025-06-28T12:00:00',
              color: '#F6C177'
            },
            {
              title: 'Task detail modal',
              start: '2025-06-24T10:00:00',
              end: '2025-06-24T12:00:00',
              color: '#F7CAD0'
            },
            {
              title: 'Help Docs: update screenshot',
              start: '2025-06-30T10:00:00',
              end: '2025-06-30T12:00:00',
              color: '#E9ECEF'
            }
          ],
          locale: 'id',
          buttonText: {
            today: 'Today',
            month: 'Month',
            week: 'Week',
            day: 'Day',
            list: 'List'
          },
          dayMaxEvents: true
        });
        calendar.render();
      });
    </script>
    <!-- Flowbite JS for sidebar toggle -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
