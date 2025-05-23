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

    <div class="flex-1 sm:ml-64 h-screen">
        <main class="h-full p-6 md:p-10 overflow-y-auto">
            <!-- Header -->
            <header class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-2xl font-semibold">Chatbot</h1>
                </div>
                <div class="flex items-center space-x-6">
                    <button aria-label="Notifications" class="relative text-gray-400 hover:text-gray-600">
                        <i class="far fa-bell text-xl"></i>
                        <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                    <img src="https://storage.googleapis.com/a1aa/image/d645b794-8518-4051-0a2d-e539edf0df02.jpg" alt="Photo Profile" class="w-10 h-10 rounded-full object-cover">
                </div>
            </header>

            {{-- Lanjutkan disini --}}
            <div class="flex flex-col items-center w-full min-h-[calc(100vh-180px)] px-2 sm:px-8">
                <!-- Today Label -->
                <div class="flex justify-center w-full mb-6 mt-2">
                    <span class="bg-gray-900 text-white text-xs font-semibold px-4 py-1 rounded-full">Today</span>
                </div>
                <!-- Chat Bubbles -->
                <div class="flex-1 w-full flex flex-col gap-6 pb-4">
                    <!-- User Message 1 -->
                    <div class="flex justify-end">
                        <div class="max-w-lg w-full">
                            <div class="bg-indigo-500 text-white rounded-2xl rounded-br-sm px-5 py-3 text-sm shadow">
                                Hai, Bisa bantu aku menambah Foto kedalam jadwal ku di hari Senin nggk?
                            </div>
                            <div class="text-xs text-gray-400 text-right mt-1">Hari Ini 11:52</div>
                        </div>
                    </div>

                    <!-- Bot Message 1 -->
                    <div class="flex justify-start">
                        <div class="max-w-lg w-full">
                            <div class="bg-white text-gray-900 rounded-2xl rounded-bl-sm px-5 py-3 text-sm">
                                Tentu saja, Foto apa yuang ingin anda masukkan?
                            </div>
                            <div class="text-xs text-gray-400 mt-1">Hari Ini 11:53</div>
                        </div>
                    </div>

                    <!-- User Message with Image -->
                    <div class="flex justify-end">
                        <div class="max-w-lg w-full">
                            <div class="bg-indigo-500 rounded-2xl rounded-br-sm p-2 shadow">
                                <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=400&q=80" alt="Preview" class="rounded-xl mb-2 w-full">
                                <div class="text-white text-xs px-2 pb-1">Masukkan Foto ini kedalam Jadwal ku di hari senin.</div>
                            </div>
                            <div class="bg-indigo-500 text-indigo-100 rounded-xl px-4 py-2 mt-2 text-xs">Pastikan memberikan nama file tersebut "Tugas 2"</div>
                            <div class="text-xs text-gray-400 text-right mt-1">Hari Ini 11:52</div>
                        </div>
                    </div>
                    
                    <!-- Bot Message 2 -->
                    <div class="flex justify-start">
                        <div class="max-w-lg w-full">
                            <div class="bg-white text-gray-900 rounded-2xl rounded-bl-sm px-5 py-3 text-sm">
                                Oke, Tentu saja. Saya akan menambah foto tersebut kedalam jadwal anda di hari senin
                            </div>
                            <div class="bg-white text-gray-900 rounded-2xl rounded-bl-sm px-5 py-3 text-sm mt-2">
                                Tugas anda telah saya tambahkan dengan nama "Tugas 2". Apa ada lagi yang bisa saya bantu ?
                            </div>
                            <div class="text-xs text-gray-400 mt-1">Hari Ini 11:53</div>
                        </div>
                    </div>
                </div>
                <!-- Input Area -->
                <form class="w-full flex items-center gap-2 pt-2">
                    <input type="text" placeholder="Send your message..." class="flex-1 rounded-full border border-gray-200 px-5 py-3 text-sm bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-400" />
                    <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white rounded-full p-3 transition flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l15.75-7.5-7.5 15.75-2.25-6.75-6.75-2.25z" />
                        </svg>
                    </button>
                </form>
            </div>
        </main>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</html>