<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between h-14">

            {{-- Logo --}}
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5 shrink-0">
                <div class="w-7 h-7 rounded-lg bg-indigo-600 flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <span class="text-sm font-semibold text-gray-900 tracking-tight">SMS</span>
            </a>

            {{-- Desktop nav links --}}
            <div class="hidden sm:flex items-center gap-1">
                @php
                    $links = [
                        ['route' => 'departments',             'match' => 'departments*',            'label' => 'Departments'],
                        ['route' => 'teachers',                'match' => 'teachers*',               'label' => 'Teachers'],
                        ['route' => 'students',                'match' => 'students*',               'label' => 'Students'],
                        ['route' => 'department_teacher.index','match' => 'department_teacher*',     'label' => "Teacher's Dept"],
                    ];
                @endphp
                @foreach ($links as $link)
                    @php $active = request()->routeIs($link['match']); @endphp
                    <a href="{{ route($link['route']) }}"
                       class="px-3 py-1.5 text-sm rounded-md transition duration-150 {{ $active ? 'bg-indigo-50 text-indigo-700 font-medium' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>

            {{-- Right: user dropdown --}}
            <div class="hidden sm:flex items-center gap-3">
                <x-dropdown align="right" width="44">
                    <x-slot name="trigger">
                        <button class="flex items-center gap-2 px-2 py-1.5 rounded-md hover:bg-gray-50 transition">
                            <div class="w-7 h-7 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center text-xs font-semibold">
                                {{ strtoupper(substr(Auth::user()->name ?? 'user', 0, 1)) }}
                            </div>
                            <span class="text-sm text-gray-700 font-medium">{{ Auth::user()->name ?? 'username' }}</span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <div class="px-4 py-3 border-b border-gray-100">
                            <p class="text-xs font-semibold text-gray-800">{{ Auth::user()->name ?? 'user' }}</p>
                            <p class="text-xs text-gray-400 mt-0.5 truncate">{{ Auth::user()->email ?? 'random'}}</p>
                        </div>
                        <x-dropdown-link :href="route('profile.edit')" class="text-sm text-gray-600">
                            Profile
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="text-sm text-red-500 hover:bg-red-50">
                                Log out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            {{-- Hamburger --}}
            <button @click="open = !open" class="sm:hidden p-2 rounded-md text-gray-400 hover:text-gray-600 hover:bg-gray-50 transition">
                <svg class="w-5 h-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden border-t border-gray-100 bg-white">
        <div class="px-4 py-3 space-y-1">
            <x-responsive-nav-link :href="route('departments')" :active="request()->routeIs('departments*')">Departments</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('teachers')" :active="request()->routeIs('teachers*')">Teachers</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('students')" :active="request()->routeIs('students*')">Students</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('department_teacher.index')" :active="request()->routeIs('department_teacher*')">Teacher's Dept</x-responsive-nav-link>
        </div>
        <div class="px-4 py-3 border-t border-gray-100">
            <p class="text-sm font-medium text-gray-800">{{ Auth::user()->name ?? 'user' }}</p>
            <p class="text-xs text-gray-400">{{ Auth::user()->email ?? 'random' }}</p>
            <div class="mt-2 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">Profile</x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-500">
                        Log out
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
