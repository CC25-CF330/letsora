<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 dark:bg-gray-900 ">
    
<button data-drawer-target="cta-button-sidebar" data-drawer-toggle="cta-button-sidebar" aria-controls="cta-button-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>
 
 <aside id="cta-button-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <nav class="flex flex-col justify-between h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
      <div>
         <a href="#" class="flex items-center mb-5 ps-2.5">
            <img src="http://letsora.test/img/logo-letsora-light.png" alt="" class="size-10">
            <span class="ml-3 self-center font-semibold whitespace-nowrap dark:text-white text-3xl">Letsora</span>
         </a>
         <ul class="space-y-2 font-medium">
            <li>
               <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                     <path fill-rule="evenodd" d="M3 6a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3V6ZM3 15.75a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-2.25Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3v-2.25Z" clip-rule="evenodd" />
                  </svg>                
                  <span class="ms-3">Beranda</span>
               </a>
            </li>
            <li>
               <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                     <path d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                  </svg>                
                  <span class="flex-1 ms-3 whitespace-nowrap">Jadwal</span>
               </a>
            </li>
            <li>
               <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                     <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                     <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Laporan</span>
               </a>
            </li>
            <li>
               <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                     <path fill-rule="evenodd" d="M12 2.25c-2.429 0-4.817.178-7.152.521C2.87 3.061 1.5 4.795 1.5 6.741v6.018c0 1.946 1.37 3.68 3.348 3.97.877.129 1.761.234 2.652.316V21a.75.75 0 0 0 1.28.53l4.184-4.183a.39.39 0 0 1 .266-.112c2.006-.05 3.982-.22 5.922-.506 1.978-.29 3.348-2.023 3.348-3.97V6.741c0-1.947-1.37-3.68-3.348-3.97A49.145 49.145 0 0 0 12 2.25ZM8.25 8.625a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Zm2.625 1.125a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z" clip-rule="evenodd" />
                  </svg>
                  
                  <span class="flex-1 ms-3 whitespace-nowrap">Chatbot</span>
               </a>
            </li>
            <li>
               <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                     <path fill-rule="evenodd" d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 0 0-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 0 0-2.282.819l-.922 1.597a1.875 1.875 0 0 0 .432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 0 0 0 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 0 0-.432 2.385l.922 1.597a1.875 1.875 0 0 0 2.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 0 0 2.28-.819l.923-1.597a1.875 1.875 0 0 0-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 0 0 0-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 0 0-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 0 0-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 0 0-1.85-1.567h-1.843ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" clip-rule="evenodd" />
                  </svg>                
                  <span class="flex-1 ms-3 whitespace-nowrap">Pengaturan</span>
               </a>
            </li>
         </ul>
      </div>
      
       <div class="p-4 m-4 rounded-lg bg-black dark:bg-gray-700 text-center">
          <div class="mb-3">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
             </button>
          </div>
          <h2 class="mb-3 text-sm text-white dark:text-white">Tanya AI Aja!</h2>
          <p class="mb-3 text-sm text-white dark:text-white">
            Bingung cara ngatur jadwal ?
            AI siap membantumu 24/7. 
          </p>
          <button class="mt-3 p-2 w-40 rounded-xl bg-white dark:bg-gray-900 text-black dark:text-white">Chat Sekarang</button>
       </div>
      </nav>
 </aside>

 {{-- <div class="p-4 sm:ml-64">
      <div class="grid grid-rows-4 grid-cols-3 gap-4 mb-4 max-h-screen">
         <div class="col-span-2 flex items-start justify-between h-10">
            <div>
               <h1 class="text-3xl dark:text-white">Hi, Letsora</h1>
               <p class="text-lg text-gray-400 dark:text-gray-500">Ayo selesaikan tugasmu hari ini!</p>
            </div>
            <div class="flex items-center">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7 dark:text-white mr-8">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
               </svg>
               <img class="object-cover w-14 h-14 rounded-full" src="https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&h=764&q=100" alt="">
            </div>

         </div>
         <div class="flex flex-col justify-start w-70 h-full row-span-3">
            <div class="flex justify-between">
               <span class="text-xl dark:text-white">Profile</span>
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 dark:text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
               </svg>
            </div>
            <div id="datepicker-inline" class="self-center" inline-datepicker data-date="05/11/2025"></div>
         </div>
         <div class="flex items-center justify-center h-24 rounded-sm bg-gray-50 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">3
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         
         <div class="flex items-center justify-center rounded-sm bg-gray-50 dark:bg-gray-800">
            
            <div class="max-w-sm w-full bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between">
               <div>
                  <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">32.4k</h5>
                  <p class="text-base font-normal text-gray-500 dark:text-gray-400">Users this week</p>
               </div>
               <div
                  class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                  12%
                  <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                  </svg>
               </div>
            </div>
            <div id="area-chart"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
               <div class="flex justify-between items-center pt-5">
                  <!-- Button -->
                  <button
                  id="dropdownDefaultButton"
                  data-dropdown-toggle="lastDaysdropdown"
                  data-dropdown-placement="bottom"
                  class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                  type="button">
                  Last 7 days
                  <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
                  </button>
                  <!-- Dropdown menu -->
                  <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                     <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                        </li>
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                        </li>
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
                        </li>
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
                        </li>
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>
                        </li>
                     </ul>
                  </div>
                  <a
                  href="#"
                  class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                  Users Report
                  <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
                  </a>
               </div>
            </div>
            </div>

         </div>
         <div class="flex items-center justify-center h-full rounded-sm row-span-2 col-span-2 bg-gray-50 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">5
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center h-24 rounded-sm bg-gray-50 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">6
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
      </div>
 </div> --}}

 <main class="flex-1 p-6 md:p-10 space-y-8 overflow-auto sm:ml-64">
   <header class="flex items-center justify-between mb-8">
      <div>
         <h1 class="text-lg font-semibold dark:text-white">
            Hi, Letsora
         </h1>
         <p class="text-xs text-gray-100">
            Ayo selesaikan tugasmu hari ini!
         </p>
      </div>
      <div class="flex items-center space-x-6">
         <button aria-label="Notifications" class="relative text-gray-400 hover:text-gray-600">
            <i class="far fa-bell text-xl"></i>
            <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
         </button>
         <img src="https://storage.googleapis.com/a1aa/image/d645b794-8518-4051-0a2d-e539edf0df02.jpg" alt="Photo Profile" class="w-10 h-10 rounded-full object-cover" height="40" width="40">
      </div>
   </header>

   <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="bg-[#0F1226] rounded-xl p-6 w-full max-w-xs text-white flex flex-col justify-center">
         <div class="flex flex-col items-center space-y-4">
            <div class="relative w-32 h-32">
               <svg class="absolute top-0 left-0 w-32 h-32" fill="none" viewbox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="50" cy="50" r="45" stroke="#1E293B" stroke-width="10">
                  </circle>
                  <circle cx="50" cy="50" r="45" stroke="#4F46E5" stroke-dasharray="282.6" stroke-dashoffset="94.2" stroke-linecap="round" stroke-width="10" transform="rotate(-90 50 50)">
                  </circle>
               </svg>
               <div class="absolute inset-0 flex flex-col items-center justify-center text-xs font-semibold">
                  <span>
                     02:00
                  </span>
                  <span>
                     Sisa Waktu
                  </span>
               </div>
            </div>
            <div class="flex items-center space-x-3 w-full">
               <img alt="Profile picture of Mustafa John with a blurred background" class="w-6 h-6 rounded-full object-cover" height="24" src="https://storage.googleapis.com/a1aa/image/936ec31c-f1b0-4765-ab0d-bd5ec1ad9fdb.jpg" width="24"/>
               <div class="flex-1 text-[9px] leading-tight truncate">
                  Mustafa Jaan E Rehmat Pe
                  <p class="text-[5px] truncate">
                     Atif Aslam, Boss Menn
                  </p>
               </div>
               <button aria-label="Pause Timer" class="w-6 h-6 rounded-full bg-white text-[#0F1226] flex items-center justify-center ">
                  <i class="fas fa-pause text-xs"></i>
               </button>
            </div>
            <input aria-label="Progress Slider" class="w-full h-1 rounded-full bg-[#4F46E5] accent-[#4F46E5]" max="100" min="0" type="range" value="30">
         </div>
      </div>

      {{-- Chart --}}
      <div class="bg-white rounded-xl p-6 w-full max-w-md shadown-sm flex flex-col">
         <div class="flex justify-between items-center mb-4">
            <h2 class="text-sm font-semibold text-black dark:text-white">
               Aktivitas
            </h2>
            <select aria-label="Select week filter" class="text-xs text-[#6B7280] border border-gray-200 rounded px-5 py-1">
               <option selected=" ">
                  Minggu Ini 
               </option>
               <option>
                  Minggu Lalu 
               </option>
               <option>
                  Bulan Ini 
               </option>
            </select>
         </div>
         <div class="relative w-full h-24">
            <svg class="w-full h-full" fill="none" viewbox="0 0 300 100" xmlns="http://www.w3.org/2000/svg">
               <path d="M20 70 Q60 20 100 50 T180 40 T260 60 T280 100" fill="none" stroke="#111827" stroke-linejoin="round" stroke-width="3">
               </path>
               <circle cx="212" cy="25" fill="#4F46E5" r="6" stroke="#111827" stroke-width="2">
               </circle>
               <rect fill="#111827" height="20" opacity="0.9" rx="4" ry="4" width="40" x="213" y="0">
               </rect>
               <text fill="white" font-size="10" font-weight="600" text-anchor="middle" x="233" y="14">
                  2 Task
               </text>
            </svg>
            <div class="flex justify-between text-xs text-[#6B7280] mt-2 px-1 select-none"> 
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

   {{-- Schedule --}}
   <section aria-label="Schedule" class="bg-[#F3F4F6] rounded-xl p-6 max-w-4xl mx-auto space-y-6">
      <div class="flex justify-between items-center mb-4">
         <div class="flex space-x-12 text-xs font-semibold text-[#374151]">
            <span>Time</span>
            <span>Course</span>
         </div>
         <button></button>
      </div>
   </section>
 </main>
 </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
