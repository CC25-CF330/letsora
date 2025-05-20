<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 dark:bg-gray-900 h-full overflow-hidden">
    <button data-drawer-target="cta-button-sidebar" data-drawer-toggle="cta-button-sidebar" aria-controls="cta-button-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <!-- Sidebar -->
    <aside id="cta-button-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <nav class="flex flex-col justify-between h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <div>
                <a href="#" class="flex items-center mb-5 ps-2.5">
                    <img src="http://letsora.test/img/logo-letsora-light.png" alt="" class="size-10">
                    <span class="ml-3 self-center font-semibold whitespace-nowrap dark:text-white text-3xl">Letsora</span>
                </a>
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3V6ZM3 15.75a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-2.25Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3v-2.25Z" clip-rule="evenodd" />
                            </svg>                
                            <span class="ms-3">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="/schedule" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                                <path d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                            </svg>                
                            <span class="ms-3">Jadwal</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                                <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                            </svg>
                            <span class="ms-3">Laporan</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                                <path fill-rule="evenodd" d="M12 2.25c-2.429 0-4.817.178-7.152.521C2.87 3.061 1.5 4.795 1.5 6.741v6.018c0 1.946 1.37 3.68 3.348 3.97.877.129 1.761.234 2.652.316V21a.75.75 0 0 0 1.28.53l4.184-4.183a.39.39 0 0 1 .266-.112c2.006-.05 3.982-.22 5.922-.506 1.978-.29 3.348-2.023 3.348-3.97V6.741c0-1.947-1.37-3.68-3.348-3.97A49.145 49.145 0 0 0 12 2.25ZM8.25 8.625a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Zm2.625 1.125a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z" clip-rule="evenodd" />
                            </svg>
                            <span class="ms-3">Chatbot</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
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
    <div class="flex-1 sm:ml-64 h-screen">
        <main class="h-full p-6 md:p-10 overflow-y-auto">
            <!-- Header -->
            <header class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-2xl font-semibold dark:text-white">Hi, Letsora</h1>
                    <p class="text-sm text-gray-500">Ayo selesaikan tugasmu hari ini!</p>
                </div>
                <div class="flex items-center space-x-6">
                    <button aria-label="Notifications" class="relative text-gray-400 hover:text-gray-600">
                        <i class="far fa-bell text-xl"></i>
                        <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                    <img src="https://storage.googleapis.com/a1aa/image/d645b794-8518-4051-0a2d-e539edf0df02.jpg" alt="Photo Profile" class="w-10 h-10 rounded-full object-cover">
                </div>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Left Content (Timer, Activity, Schedule) -->
                <div class="lg:col-span-8 space-y-8">
                    <!-- Timer and Activity Section -->
                    <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Timer Card -->
                        <div class="bg-[#0F1226] rounded-xl p-6 text-white">
                            <div class="flex flex-col items-center space-y-4">
                                <div class="relative w-32 h-32">
                                    <svg class="absolute top-0 left-0 w-32 h-32" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="45" stroke="#1E293B" stroke-width="10" fill="none"/>
                                        <circle cx="50" cy="50" r="45" stroke="#4F46E5" stroke-width="10" fill="none"
                                            stroke-dasharray="282.6" stroke-dashoffset="94.2" transform="rotate(-90 50 50)"/>
                                    </svg>
                                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                                        <span class="text-2xl font-semibold">02:00</span>
                                        <span class="text-sm">Sisa Waktu</span>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3 w-full">
                                    <img src="https://storage.googleapis.com/a1aa/image/936ec31c-f1b0-4765-ab0d-bd5ec1ad9fdb.jpg" alt="Profile" class="w-6 h-6 rounded-full">
                                    <div class="flex-1">
                                        <div class="text-sm truncate">Mustafa Jaan E Rehmat Pe</div>
                                        <div class="text-xs text-gray-400 truncate">Atif Aslam, Boss Menn</div>
                                    </div>
                                    <button class="w-8 h-8 rounded-full bg-white text-[#0F1226] flex items-center justify-center">
                                        <i class="fas fa-pause"></i>
                                    </button>
                                </div>
                                <input type="range" class="w-full accent-[#4F46E5]" value="30">
                            </div>
                        </div>

                        <!-- Activity Chart -->
                        <div class="bg-white rounded-xl p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-sm font-semibold">Aktivitas</h2>
                                <select class="text-xs text-gray-500 border rounded px-3 py-1">
                                    <option>Minggu Ini</option>
                                    <option>Minggu Lalu</option>
                                    <option>Bulan Ini</option>
                                </select>
                            </div>
                            <div class="relative h-40">
                                <div class="absolute inset-0">
                                    <svg class="w-full h-full" viewBox="0 0 300 100">
                                        <path d="M20 70 Q60 20 100 50 T180 40 T260 60" fill="none" stroke="#111827" stroke-width="3"/>
                                        <circle cx="212" cy="25" r="6" fill="#4F46E5" stroke="#111827" stroke-width="2"/>
                                        <rect x="213" y="0" width="40" height="20" rx="4" fill="#111827"/>
                                        <text x="233" y="14" fill="white" text-anchor="middle" font-size="10" font-weight="600">2 Task</text>
                                    </svg>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 flex justify-between text-xs text-gray-500 px-2">
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

                    <!-- Schedule Section -->
                    <section class="bg-gray-100 rounded-xl p-6">
                        <div class="flex justify-between items-center mb-6">
                            <div class="flex space-x-12 text-sm font-medium text-gray-600">
                                <span>Time</span>
                                <span>Course</span>
                            </div>
                            <button class="text-[#4F46E5]">
                                <i class="fas fa-th-large"></i>
                            </button>
                        </div>

                        <div class="space-y-4">
                            <!-- Schedule Items -->
                            <!-- Matematika Teknik -->
                            <div class="flex space-x-6">
                                <div class="w-20">
                                    <div class="text-sm font-medium text-gray-600">08:35</div>
                                    <div class="text-xs text-gray-500">13:05</div>
                                </div>
                                <div class="flex-1 bg-[#4F46E5] rounded-xl p-4 text-white">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <h3 class="font-medium">Matematika Teknik</h3>
                                            <p class="text-sm mt-1">Chapter 1:<br>Introduction</p>
                                        </div>
                                        <div class="flex items-center space-x-4 text-sm">
                                            <div class="flex items-center space-x-1">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span>Room 6-205</span>
                                            </div>
                                            <div class="flex items-center space-x-1">
                                                <img src="https://storage.googleapis.com/a1aa/image/6802f75c-babb-4e50-00b2-5e572b738674.jpg" class="w-5 h-5 rounded-full">
                                                <span>Brooklyn Williamson</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pemrograman Dasar -->
                            <div class="flex space-x-6">
                                <div class="w-20">
                                    <div class="text-sm font-medium text-gray-600">13:05</div>
                                    <div class="text-xs text-gray-500">15:00</div>
                                </div>
                                <div class="flex-1 bg-[#4F46E5] rounded-xl p-4 text-white">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <h3 class="font-medium">Pemrograman Dasar</h3>
                                            <p class="text-sm mt-1">Chapter 3:<br>Materi Perulangan</p>
                                        </div>
                                        <div class="flex items-center space-x-4 text-sm">
                                            <div class="flex items-center space-x-1">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span>Room 2-123</span>
                                            </div>
                                            <div class="flex items-center space-x-1">
                                                <img src="https://storage.googleapis.com/a1aa/image/6802f75c-babb-4e50-00b2-5e572b738674.jpg" class="w-5 h-5 rounded-full">
                                                <span>Pak Ihsan TMJ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Rapat Himpunan -->
                            <div class="flex space-x-6">
                                <div class="w-20">
                                    <div class="text-sm font-medium text-gray-600">17:00</div>
                                    <div class="text-xs text-gray-500">18:30</div>
                                </div>
                                <div class="flex-1 bg-[#4F46E5] rounded-xl p-4 text-white">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <h3 class="font-medium">Rapat Himpunan</h3>
                                            <p class="text-sm mt-1">Rapat ke 4 - Pembahasan Tema<br>dan Penentuan Tempat</p>
                                        </div>
                                        <div class="flex items-center space-x-4 text-sm">
                                            <div class="flex items-center space-x-1">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span>Ruang Himpunan HIMATIK</span>
                                            </div>
                                            <div class="flex items-center space-x-1">
                                                <img src="https://storage.googleapis.com/a1aa/image/6802f75c-babb-4e50-00b2-5e572b738674.jpg" class="w-5 h-5 rounded-full">
                                                <span>Ketua Himpunan</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Cafee Zero -->
                            <div class="flex space-x-6">
                                <div class="w-20">
                                    <div class="text-sm font-medium text-gray-600">20:00</div>
                                    <div class="text-xs text-gray-500">22:05</div>
                                </div>
                                <div class="flex-1 bg-[#4F46E5] rounded-xl p-4 text-white">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <h3 class="font-medium">Cafee Zero</h3>
                                            <p class="text-sm mt-1">Nongki</p>
                                        </div>
                                        <div class="flex items-center space-x-4 text-sm">
                                            <div class="flex items-center space-x-1">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span>Zero Cafe, Pintu 0 Unhas</span>
                                            </div>
                                            <div class="flex items-center space-x-1">
                                                <img src="https://storage.googleapis.com/a1aa/image/6802f75c-babb-4e50-00b2-5e572b738674.jpg" class="w-5 h-5 rounded-full">
                                                <span>Me</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Right Content (Profile, Calendar, Night Owl) -->
                <div class="lg:col-span-4 bg-white rounded-xl p-6 space-y-8">
                    <!-- Profile Section -->
                    <section>
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="font-semibold">Profile</h2>
                            <button class="text-[#4F46E5]">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                        <div class="flex flex-col items-center text-center">
                            <img src="https://storage.googleapis.com/a1aa/image/d5540fe8-fb38-45d8-9ffe-584fa5aee26d.jpg" alt="Profile" class="w-24 h-24 rounded-full mb-4">
                            <h3 class="font-semibold text-lg mb-2">Anna White</h3>
                            <p class="text-sm text-gray-500">D4 Teknik Multimedia dan Jaringan</p>
                        </div>
                    </section>

                    <!-- Calendar Section -->
                    <section>
                        <div id="datepicker-inline" inline-datepicker data-date="02/25/2024" class="flex items-center justify-center"></div>
                    </section>

                    <!-- Night Owl Section -->
                    <section class="bg-[#0F1226] rounded-xl p-6 text-center text-white">
                        <img class="mx-auto rounded-lg mb-4" src="https://storage.googleapis.com/a1aa/image/e5f56ea0-58dc-4554-e3a3-a1e0178d4a0b.jpg" width="320" height="120" alt="Night owl logo">
                        <h3 class="text-lg font-semibold mb-1">Night Owl</h3>
                        <p class="text-xs mb-4">
                            Having Trouble in Learning?
                            <br>
                            Please Contact Us for more information.
                        </p>
                        <button class="bg-white text-[#0F1226] px-4 py-2 rounded-md text-xs font-semibold">
                            Lihat Selengkapnya
                        </button>
                    </section>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
