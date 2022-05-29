<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="{{ route('admin.home')}}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">FS EAD</a>
    </div>
    <nav class="text-white text-base font-semibold pt-3">


        @foreach (config('template.menus') as $menu)
        <a href="{{ $menu['url'] }}"
            class="flex items-center text-white opacity-75 py-4 pl-6 nav-item active-nav-link">
            <i class="{{ $menu['icon'] }}"></i>
            {{ $menu['name'] }}
        </a>
        @endforeach

    </nav>
    <a href="{{ route('logout') }}"
        class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
        <i class="fas fa-sign-out-alt mr-3"></i> Sair
    </a>
</aside>
