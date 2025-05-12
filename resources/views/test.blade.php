<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Letsora Dashboard
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: 'Inter', sans-serif;
    }
  </style>
 </head>
 <body class="bg-[#F9FAFB] text-[#111827]">
  <div class="min-h-screen flex flex-col md:flex-row">
   <!-- Sidebar -->
   <aside class="bg-white w-full md:w-60 border-r border-gray-200 flex flex-col px-6 py-8">
    <div class="flex items-center space-x-2 mb-12">
     <img alt="Letsora logo black circle with arrow" class="w-6 h-6" height="24" src="https://storage.googleapis.com/a1aa/image/dd33aae7-62e8-43f6-b62b-3eba09ac3c1b.jpg" width="24"/>
     <span class="text-lg font-semibold text-black select-none">
      Letsora
     </span>
    </div>
    <nav class="flex flex-col space-y-6 text-sm font-medium">
     <a class="flex items-center space-x-3 px-3 py-2 rounded-lg bg-gray-100 text-black" href="#">
      <i class="fas fa-th-large text-gray-700 text-base">
      </i>
      <span>
       Beranda
      </span>
     </a>
     <a class="flex items-center space-x-3 px-3 py-2 rounded text-[#6B7280] hover:text-[#4B5563] text-sm" href="#">
      <i class="fas fa-book-open text-[#A5B4FC] text-base">
      </i>
      <span>
       Jadwal
      </span>
     </a>
     <a class="flex items-center space-x-3 px-3 py-2 rounded text-[#6B7280] hover:text-[#4B5563] text-sm" href="#">
      <i class="fas fa-chart-bar text-[#A5B4FC] text-base">
      </i>
      <span>
       Report
      </span>
     </a>
     <a class="flex items-center space-x-3 px-3 py-2 rounded text-[#6B7280] hover:text-[#4B5563] text-sm" href="#">
      <i class="fas fa-comment-alt text-[#A5B4FC] text-base">
      </i>
      <span>
       Chatbot
      </span>
     </a>
     <a class="flex items-center space-x-3 px-3 py-2 rounded text-[#6B7280] hover:text-[#4B5563] text-sm" href="#">
      <i class="fas fa-cog text-[#A5B4FC] text-base">
      </i>
      <span>
       Settings
      </span>
     </a>
    </nav>
    <div class="mt-auto">
     <div class="relative bg-[#0F1226] rounded-xl w-44 h-44 flex flex-col items-center justify-center px-5 py-6 text-center text-white mx-auto">
      <div class="absolute -top-5 bg-[#0F1226] rounded-full w-10 h-10 flex items-center justify-center text-white font-semibold text-sm shadow-[0_0_10px_#fff]">
       AI
      </div>
      <h3 class="font-semibold text-lg leading-tight mb-2">
       Tanya AI Aja!
      </h3>
      <p class="text-xs leading-snug mb-6">
       Bingung cara ngatur jadwal? AI siap membantumu 24/7.
      </p>
      <button class="bg-white text-[#0F1226] rounded-md text-xs font-semibold px-4 py-2 w-full">
       Chat Sekarang
      </button>
     </div>
    </div>
   </aside>
   <!-- Main content -->
   <main class="flex-1 p-6 md:p-10 space-y-8 overflow-auto">
    <header class="flex items-center justify-between mb-8">
     <div>
      <h1 class="text-lg font-semibold text-black">
       Hi, Letsora
      </h1>
      <p class="text-xs text-[#6B7280]">
       Ayo selesaikan tugasmu hari ini!
      </p>
     </div>
     <div class="flex items-center space-x-6">
      <button aria-label="Notifications" class="relative text-gray-400 hover:text-gray-600">
       <i class="far fa-bell text-xl">
       </i>
       <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white">
       </span>
      </button>
      <img alt="Profile picture of a blonde woman with blurred background" class="w-10 h-10 rounded-full object-cover" height="40" src="https://storage.googleapis.com/a1aa/image/d645b794-8518-4051-0a2d-e539edf0df02.jpg" width="40"/>
     </div>
    </header>
    <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
     <!-- Timer card -->
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
         <span class="text-[8px] text-[#94A3B8]">
          Sisa Waktu
         </span>
        </div>
       </div>
       <div class="flex items-center space-x-3 w-full">
        <img alt="Profile picture of Mustafa John with a blurred background" class="w-6 h-6 rounded-full object-cover" height="24" src="https://storage.googleapis.com/a1aa/image/936ec31c-f1b0-4765-ab0d-bd5ec1ad9fdb.jpg" width="24"/>
        <div class="flex-1 text-[9px] leading-tight truncate">
         Mustafa John &amp; Rahmat Re
         <p class="text-[7px] text-[#F87171] truncate">
          AI Focus Task
         </p>
        </div>
        <button aria-label="Pause timer" class="w-6 h-6 rounded-full bg-white text-[#0F1226] flex items-center justify-center">
         <i class="fas fa-pause text-xs">
         </i>
        </button>
       </div>
       <input aria-label="Progress slider" class="w-full h-1 rounded-full bg-[#4F46E5] accent-[#4F46E5]" max="100" min="0" type="range" value="30"/>
      </div>
     </div>
     <!-- Activity card -->
     <div class="bg-white rounded-xl p-6 w-full max-w-md shadow-sm flex flex-col">
      <div class="flex justify-between items-center mb-4">
       <h2 class="text-sm font-semibold text-black">
        Aktivitas
       </h2>
       <select aria-label="Select week filter" class="text-xs text-[#6B7280] border border-gray-200 rounded px-2 py-1">
        <option selected="">
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
        <path d="M20 70 Q60 20 100 50 T180 40 T260 60 T280 55" fill="none" stroke="#111827" stroke-linejoin="round" stroke-width="3">
        </path>
        <circle cx="60" cy="20" fill="#4F46E5" r="6" stroke="#111827" stroke-width="2">
        </circle>
        <rect fill="#111827" height="20" opacity="0.9" rx="4" ry="4" width="40" x="50" y="0">
        </rect>
        <text fill="white" font-size="10" font-weight="600" text-anchor="middle" x="70" y="14">
         2 Task
        </text>
       </svg>
       <div class="flex justify-between text-xs text-[#6B7280] mt-2 px-1 select-none">
        <span>
         S
        </span>
        <span>
         M
        </span>
        <span>
         T
        </span>
        <span>
         W
        </span>
        <span>
         T
        </span>
        <span>
         F
        </span>
        <span>
         S
        </span>
       </div>
      </div>
     </div>
    </section>
    <!-- Schedule section -->
    <section aria-label="Schedule" class="bg-[#F3F4F6] rounded-xl p-6 max-w-4xl mx-auto space-y-6">
     <div class="flex justify-between items-center mb-4">
      <div class="flex space-x-12 text-xs font-semibold text-[#374151]">
       <span>
        Time
       </span>
       <span>
        Course
       </span>
      </div>
      <button aria-label="Toggle view" class="text-[#4F46E5] text-xl focus:outline-none">
       <i class="fas fa-th-large">
       </i>
      </button>
     </div>
     <!-- Schedule items -->
     <div class="space-y-4">
      <!-- Item 1 -->
      <div class="flex items-center space-x-6">
       <div class="w-16 text-xs font-semibold text-[#6B7280]">
        <div>
         08:35
        </div>
        <div class="text-[9px]">
         13:05
        </div>
       </div>
       <div class="flex-1 bg-[#4F46E5] rounded-xl p-4 text-white flex flex-col md:flex-row md:items-center md:justify-between">
        <div class="mb-2 md:mb-0">
         <h3 class="font-semibold text-sm leading-tight">
          Matematika Teknik
         </h3>
         <p class="text-[9px] leading-snug">
          Chapter 1:
          <br/>
          Introduction
         </p>
        </div>
        <div class="flex items-center space-x-6 text-[9px]">
         <div class="flex items-center space-x-1">
          <i class="fas fa-map-marker-alt text-xs">
          </i>
          <span>
           Room 6-205
          </span>
         </div>
         <div class="flex items-center space-x-1">
          <img alt="Profile picture of Brooklyn Williamson with blurred background" class="w-4 h-4 rounded-full object-cover" height="16" src="https://storage.googleapis.com/a1aa/image/6802f75c-babb-4e50-00b2-5e572b738674.jpg" width="16"/>
          <span>
           Brooklyn Williamson
          </span>
         </div>
        </div>
       </div>
      </div>
      <!-- Item 2 -->
      <div class="flex items-center space-x-6">
       <div class="w-16 text-xs font-semibold text-[#6B7280]">
        <div>
         13:05
        </div>
        <div class="text-[9px]">
         15:00
        </div>
       </div>
       <div class="flex-1 bg-white rounded-xl p-4 flex flex-col md:flex-row md:items-center md:justify-between">
        <div class="mb-2 md:mb-0">
         <h3 class="font-semibold text-sm leading-tight text-black">
          Pemrograman Dasar
         </h3>
         <p class="text-[9px] leading-snug text-[#374151]">
          Chapter 3:
          <br/>
          Materi Perulangan
         </p>
        </div>
        <div class="flex items-center space-x-6 text-[9px] text-[#374151]">
         <div class="flex items-center space-x-1">
          <i class="fas fa-map-marker-alt text-xs">
          </i>
          <span>
           Room 2-123
          </span>
         </div>
         <div class="flex items-center space-x-1">
          <img alt="Profile picture of Pak Ihsan TMJ with blurred background" class="w-4 h-4 rounded-full object-cover" height="16" src="https://storage.googleapis.com/a1aa/image/75102b02-bb55-45fe-89ca-29052e9dca51.jpg" width="16"/>
          <span>
           Pak Ihsan TMJ
          </span>
         </div>
        </div>
       </div>
      </div>
      <!-- Item 3 -->
      <div class="flex items-center space-x-6">
       <div class="w-16 text-xs font-semibold text-[#6B7280]">
        <div>
         17:00
        </div>
        <div class="text-[9px]">
         18:30
        </div>
       </div>
       <div class="flex-1 bg-white rounded-xl p-4 flex flex-col md:flex-row md:items-center md:justify-between">
        <div class="mb-2 md:mb-0">
         <h3 class="font-semibold text-sm leading-tight text-black">
          Rapat Himpunan
         </h3>
         <p class="text-[9px] leading-snug text-[#374151]">
          Rapat ke 4 - Pembahasan Tema
          <br/>
          dan Penentuan Tempat
         </p>
        </div>
        <div class="flex items-center space-x-6 text-[9px] text-[#374151]">
         <div class="flex items-center space-x-1">
          <i class="fas fa-map-marker-alt text-xs">
          </i>
          <span>
           Ruang Himpunan HIMATIK
          </span>
         </div>
         <div class="flex items-center space-x-1">
          <img alt="Profile picture of Ketua Himpunan with blurred background" class="w-4 h-4 rounded-full object-cover" height="16" src="https://storage.googleapis.com/a1aa/image/2de826b4-aca5-4613-9d52-81158e5f38b5.jpg" width="16"/>
          <span>
           Ketua Himpunan
          </span>
         </div>
        </div>
       </div>
      </div>
      <!-- Item 4 -->
      <div class="flex items-center space-x-6">
       <div class="w-16 text-xs font-semibold text-[#6B7280]">
        <div>
         20:00
        </div>
        <div class="text-[9px]">
         22:05
        </div>
       </div>
       <div class="flex-1 bg-white rounded-xl p-4 flex flex-col md:flex-row md:items-center md:justify-between">
        <div class="mb-2 md:mb-0">
         <h3 class="font-semibold text-sm leading-tight text-black">
          Cafee Zero
         </h3>
         <p class="text-[9px] leading-snug text-[#374151]">
          Nongki"
         </p>
        </div>
        <div class="flex items-center space-x-6 text-[9px] text-[#374151]">
         <div class="flex items-center space-x-1">
          <i class="fas fa-map-marker-alt text-xs">
          </i>
          <span>
           Zero Cafe, Pintu 0 Unhas
          </span>
         </div>
         <div class="flex items-center space-x-1">
          <img alt="Profile picture of Me with blurred background" class="w-4 h-4 rounded-full object-cover" height="16" src="https://storage.googleapis.com/a1aa/image/a14d723d-f911-4f93-e173-3e91e084e452.jpg" width="16"/>
          <span>
           Me
          </span>
         </div>
        </div>
       </div>
      </div>
     </div>
    </section>
   </main>
   <!-- Right sidebar -->
   <aside class="bg-white w-full md:w-72 border-l border-gray-200 flex flex-col px-6 py-8 space-y-8">
    <section>
     <div class="flex justify-between items-center mb-6">
      <h2 class="text-black font-semibold text-base">
       Profile
      </h2>
      <button aria-label="Edit profile" class="text-[#4F46E5] text-lg focus:outline-none">
       <i class="fas fa-edit">
       </i>
      </button>
     </div>
     <div class="flex flex-col items-center space-y-3">
      <img alt="Profile picture of Anna White, blonde woman with blurred background" class="w-24 h-24 rounded-full object-cover" height="96" src="https://storage.googleapis.com/a1aa/image/d5540fe8-fb38-45d8-9ffe-584fa5aee26d.jpg" width="96"/>
      <h3 class="font-semibold text-black text-lg">
       Anna White
      </h3>
      <p class="text-xs text-[#6B7280] text-center max-w-[13rem]">
       D4 Teknik Multimedia dan Jaringan
      </p>
     </div>
    </section>
    <section aria-label="Calendar" class="text-center">
     <div class="flex justify-center items-center space-x-6 mb-4 text-xs text-[#6B7280] font-semibold select-none">
      <button aria-label="Previous month" class="focus:outline-none">
       <i class="fas fa-chevron-left">
       </i>
      </button>
      <span>
       June 2025
      </span>
      <button aria-label="Next month" class="focus:outline-none">
       <i class="fas fa-chevron-right">
       </i>
      </button>
     </div>
     <div class="grid grid-cols-7 gap-2 text-xs text-[#6B7280] font-semibold select-none mb-2">
      <span>
       S
      </span>
      <span>
       M
      </span>
      <span>
       T
      </span>
      <span>
       W
      </span>
      <span>
       T
      </span>
      <span>
       F
      </span>
      <span>
       S
      </span>
     </div>
     <div class="grid grid-cols-7 gap-2 text-xs text-[#374151] font-semibold select-none">
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       1
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       2
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       3
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       4
      </button>
      <button aria-current="date" class="rounded-full w-7 h-7 bg-[#1E293B] text-white font-semibold">
       5
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       6
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       7
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       8
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       9
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       10
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       11
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       12
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       13
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       14
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       15
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       16
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       17
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       18
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       19
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       20
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       21
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       22
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       23
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       24
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       25
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       26
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       27
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       28
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       29
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       30
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       1
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       2
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       3
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       4
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       5
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       6
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       7
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       8
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       9
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       10
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       11
      </button>
      <button class="rounded-full w-7 h-7 bg-[#E5E7EB] text-[#374151]">
       12
      </button>
     </div>
    </section>
    <section class="bg-[#0F1226] rounded-xl p-6 w-full max-w-md mx-auto text-center text-white">
     <img alt="Night owl logo with purple background and white owl mascot with glowing effect" class="mx-auto rounded-lg mb-4" height="120" src="https://storage.googleapis.com/a1aa/image/e5f56ea0-58dc-4554-e3a3-a1e0178d4a0b.jpg" width="320"/>
     <h3 class="font-semibold text-lg mb-1">
      Night owl
     </h3>
     <p class="text-xs mb-4">
      Having Trouble in Learning.
      <br/>
      Please contact us for more questions.
     </p>
     <button class="bg-white text-[#0F1226] rounded-md text-xs font-semibold px-4 py-2">
      Lihat Selengkapnya
     </button>
    </section>
   </aside>
  </div>
 </body>
</html>
