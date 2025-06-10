<header class="flex items-center justify-between mb-8">
    <div>
        {{-- Variabel dinamis untuk judul dan subjudul --}}
        <h1 class="text-2xl font-semibold dark:text-white">{{ $title ?? 'Judul Halaman' }}</h1>
        @if(isset($subtitle))
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $subtitle }}</p>
        @endif
    </div>
    <div class="flex items-center space-x-6">
        <button aria-label="Notifications" class="relative text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
            <i class="far fa-bell text-xl"></i>
            <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white dark:border-gray-800"></span>
        </button>
        <img src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : asset('img/profile-default.png') }}" alt="Foto Profil" class="rounded-full w-10 h-10 object-cover">
    </div>
</header>