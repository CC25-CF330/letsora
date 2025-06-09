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
    <title>Dashboard</title>
    @vite('resources/css/app.css')
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
                    <h1 class="text-2xl font-semibold dark:text-white">Pengaturan</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Atur preferensi aplikasi Anda</p>
                </div>
                <div class="flex items-center space-x-6">
                    <button aria-label="Notifications" class="relative text-gray-400 hover:text-gray-600">
                        <i class="far fa-bell text-xl"></i>
                        <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                    <img src="https://storage.googleapis.com/a1aa/image/d645b794-8518-4051-0a2d-e539edf0df02.jpg" alt="Photo Profile" class="w-10 h-10 rounded-full object-cover">
                </div>
            </header>

            <div x-data="{
                tab: 'umum',
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
            }"
            x-init="setTheme(theme)"
            class="w-full max-w-6xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow p-8 mt-2">
                <div class="border-b border-gray-200 dark:border-gray-400 mb-8">
                    <div class="flex space-x-8" aria-label="Tabs">
                        <button type="button" @click="tab = 'umum'" :class="tab === 'umum' ? 'border-indigo-500 text-indigo-600 dark:text-indigo-400' : 'border-transparent text-gray-500 dark:text-gray-200'" class="py-2 px-1 border-b-2 font-medium text-sm focus:outline-none">Umum</button>
                        <button type="button" @click="tab = 'profile'" :class="tab === 'profile' ? 'border-indigo-500 text-indigo-600 dark:text-indigo-400' : 'border-transparent text-gray-500 dark:text-gray-200'" class="py-2 px-1 border-b-2 font-medium text-sm focus:outline-none">Profile</button>
                    </div>
                </div>
                <!-- Tab Umum -->
                <form x-show="tab === 'umum'" class="space-y-8" x-cloak>
                    <div class="space-y-6">
                        <div>
                            <label for="language" class="block text-sm font-medium text-gray-500 dark:text-gray-200 mb-2">Bahasa</label>
                            <select id="language" name="language" class="block w-full rounded-lg border border-gray-200 dark:border-gray-500 bg-gray-50 dark:bg-gray-700 py-2 px-3 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                                <option selected>Indonesia (Default)</option>
                                <option>English</option>
                            </select>
                        </div>
                        <div>
                            <label for="timezone" class="block text-sm font-medium text-gray-500 dark:text-gray-200 mb-2">Zona Waktu</label>
                            <select id="timezone" name="timezone" class="block w-full rounded-lg border border-gray-200 dark:border-gray-500 bg-gray-50 dark:bg-gray-700 py-2 px-3 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                                <option selected>WIB</option>
                                <option>WITA</option>
                                <option>WIT</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-200 mb-2">Tema Layar</label>
                            <div class="flex space-x-4">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="theme" value="light" class="form-radio accent-indigo-500" :checked="theme === 'light'" @change="setTheme('light')">
                                    <span class="ml-2 text-sm font-medium dark:text-gray-200">Light Mode</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="theme" value="dark" class="form-radio accent-indigo-500" :checked="theme === 'dark'" @change="setTheme('dark')">
                                    <span class="ml-2 text-sm font-medium dark:text-gray-200">Dark Mode</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="w-40 py-2 px-4 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-50">Simpan</button>
                    </div>
                </form>
                <!-- Tab Profile -->
                <div x-show="tab === 'profile'" x-cloak class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Profile Card -->
                    <div class="bg-white dark:bg-gray-800 border dark:border-gray-500 rounded-2xl p-8 flex flex-col items-center">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Profile" class="w-32 h-32 rounded-full object-cover mb-4">
                        <div class="text-center">
                            <div class="font-semibold text-lg dark:text-white">Anna White</div>
                            <div class="text-gray-500 dark:text-gray-200 text-sm mt-1">D4 Teknik Multimedia dan Jaringan</div>
                            <div class="text-gray-700 dark:text-gray-400 text-base mt-1">Politeknik Negeri Ujung Pandang</div>
                        </div>
                        <div class="w-full border-t my-6"></div>
                        <div class="w-full space-y-3">
                            <div class="flex items-center space-x-3 text-gray-700 dark:text-gray-400">
                                <i class="fas fa-user text-gray-400 dark:text-gray-100"></i>
                                <span>UI/UX Desainer</span>
                            </div>
                            <div class="flex items-center space-x-3 text-gray-700 dark:text-gray-400">
                                <i class="fas fa-graduation-cap text-gray-400 dark:text-gray-100"></i>
                                <span>Semester 7</span>
                            </div>
                            <div class="flex items-center space-x-3 text-gray-700 dark:text-gray-400">
                                <i class="fas fa-phone text-gray-400 dark:text-gray-100"></i>
                                <span>+62 7264462982</span>
                            </div>
                            <div class="flex items-center space-x-3 text-gray-700 dark:text-gray-400">
                                <i class="fas fa-envelope text-gray-400 dark:text-gray-100"></i>
                                <span>Annawhite@asite.com</span>
                            </div>
                            <div class="flex items-center space-x-3 text-gray-700 dark:text-gray-400">
                                <i class="fas fa-building text-gray-400 dark:text-gray-100"></i>
                                <span>PDT - I</span>
                            </div>
                        </div>
                    </div>
                    <!-- Edit Profile Form -->
                    <form class="bg-white dark:bg-gray-800 border dark:border-gray-500 rounded-2xl p-8">
                        <div class="text-2xl font-semibold text-gray-800 dark:text-gray-300 mb-6">Edit Profile</div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-1">Nama Depan</label>
                                <input type="text" class="w-full rounded-lg border border-gray-200 dark:border-gray-500 bg-gray-50 dark:bg-gray-700 py-2 px-3 dark:text-white text-sm" value="Anna">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-1">Nama belakang</label>
                                <input type="text" class="w-full rounded-lg border border-gray-200 dark:border-gray-500 bg-gray-50 dark:bg-gray-700 py-2 px-3 dark:text-white text-sm" value="White">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-1">Email</label>
                            <input type="email" class="w-full rounded-lg border border-gray-200 dark:border-gray-500 bg-gray-50 dark:bg-gray-700 py-2 px-3 text-gray-400 dark:text-gray-300 text-sm" value="annawhite@asite.com" disabled>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-1">Kata Sandi</label>
                                <input type="password" class="w-full rounded-lg border border-gray-200 dark:border-gray-500 bg-gray-50 dark:bg-gray-700 py-2 px-3 text-gray-400 dark:text-gray-300 text-sm" placeholder="Change Password">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-1">Negara</label>
                                <select class="w-full rounded-lg border border-gray-200 dark:border-gray-500 bg-gray-50 dark:bg-gray-700 py-2 px-3 dark:text-white text-sm">
                                    <option selected>Indonesia</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-8">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-1">Posisi atau Pekerjaan</label>
                            <select class="w-full rounded-lg border border-gray-200 dark:border-gray-500 bg-gray-50 dark:bg-gray-700 py-2 px-3 dark:text-white text-sm">
                                <option selected>UI/UX Intern</option>
                                <option>Frontend Developer</option>
                                <option>Backend Developer</option>
                            </select>
                        </div>
                        <button type="submit" class="w-40 py-2 px-4 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-50">Simpan</button>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script>
        // Check for saved dark mode preference
        const darkModeToggle = document.getElementById('darkModeToggle');
        
        // Set initial state
        if (localStorage.getItem('darkMode') === 'true' || 
            (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            darkModeToggle.checked = true;
        }
        
        // Toggle dark mode
        darkModeToggle.addEventListener('change', function() {
            if (this.checked) {
                document.documentElement.classList.add('dark');
                localStorage.setItem('darkMode', 'true');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('darkMode', 'false');
            }
        });
    </script>
</body>
</html>
