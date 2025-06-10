<header class="flex items-center justify-between mb-8">
    <div>
        {{-- Variabel dinamis untuk judul dan subjudul --}}
        <h1 class="text-2xl font-semibold dark:text-white">{{ $title ?? 'Judul Halaman' }}</h1>
        @if(isset($subtitle))
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $subtitle }}</p>
        @endif
    </div>
    <div class="flex items-center space-x-6">
        <button aria-label="Notifications" class="relative text-gray-400 hover:text-gray-600">
            <i class="far fa-bell text-xl"></i>
            <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-gray-100 dark:border-gray-900"></span>
        </button>
        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF" alt="Photo Profile" class="w-10 h-10 rounded-full object-cover">
    </div>
</header>