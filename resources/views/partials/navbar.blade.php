<!-- Top Navigation Bar -->
<nav
    class="fixed top-0 w-full z-50 flex justify-between items-center px-4 md:px-margin-desktop h-20 bg-surface/80 dark:bg-inverse-surface/80 backdrop-blur-md border-b border-outline-variant/30 shadow-sm">
    <div class="flex items-center gap-3">
        <!-- Hamburger Button (mobile only) -->
        <button id="hamburger-btn"
            class="lg:hidden flex flex-col justify-center items-center w-10 h-10 rounded-xl hover:bg-surface-container-high transition-colors focus:outline-none"
            aria-label="Toggle Menu">
            <span class="block w-5 h-0.5 bg-on-surface rounded-full transition-all duration-300" id="ham-1"></span>
            <span class="block w-5 h-0.5 bg-on-surface rounded-full mt-1.5 transition-all duration-300"
                id="ham-2"></span>
            <span class="block w-5 h-0.5 bg-on-surface rounded-full mt-1.5 transition-all duration-300"
                id="ham-3"></span>
        </button>
        <a href="{{ url('/') }}"
            class="font-display-lg text-display-lg font-black text-primary dark:text-primary-fixed tracking-tight">SIPA</a>
    </div>
    <div class="flex items-center gap-3">
        @auth
            <a href="{{ url('/profil') }}"
                class="h-10 w-10 rounded-full overflow-hidden border-2 border-primary/20 block cursor-pointer hover:border-primary transition-colors flex items-center justify-center bg-surface-container-high shrink-0">
                @php $navUserId = auth()->id(); @endphp
                @if (file_exists(public_path('profiles/user_' . $navUserId . '.jpg')))
                    <img alt="User Profile Avatar"
                        src="{{ asset('profiles/user_' . $navUserId . '.jpg') }}?v={{ time() }}"
                        class="w-full h-full object-cover" />
                @else
                    <span class="material-symbols-outlined text-on-surface-variant">person</span>
                @endif
            </a>
        @else
            <div class="flex gap-3">
                <a href="{{ route('login') }}"
                    class="hidden md:flex items-center justify-center px-5 py-2 border-2 border-primary text-primary rounded-xl font-bold text-[14px] hover:bg-primary/5 transition-all">Masuk</a>
                <a href="{{ route('register') }}"
                    class="flex items-center justify-center px-5 py-2 bg-primary text-on-primary rounded-xl font-bold text-[14px] hover:opacity-90 transition-all shadow-md">Daftar</a>
            </div>
        @endauth
    </div>
</nav>
