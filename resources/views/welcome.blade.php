<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMS — Student Management System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; background: #f9f9f8; color: #111; }

        .hero-grid {
            background-image:
                linear-gradient(rgba(99,102,241,0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(99,102,241,0.04) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        @keyframes fade-up {
            from { opacity: 0; transform: translateY(18px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fade-up 0.55s ease both; }
        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.22s; }
        .delay-3 { animation-delay: 0.34s; }
    </style>
</head>
<body>

{{-- ── TOP NAV ──────────────────────────────────── --}}
<header class="sticky top-0 z-50 bg-white/80 backdrop-blur border-b border-gray-100">
    <div class="max-w-6xl mx-auto px-6 h-14 flex items-center justify-between">
        <div class="flex items-center gap-2.5">
            <div class="w-7 h-7 rounded-lg bg-indigo-600 flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <span class="text-sm font-semibold tracking-tight text-gray-900">SMS</span>
        </div>

        <nav class="hidden md:flex items-center gap-1">
            <a href="{{ route('departments') }}" class="px-3 py-1.5 text-sm text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-md transition">Departments</a>
            <a href="{{ route('teachers') }}"    class="px-3 py-1.5 text-sm text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-md transition">Teachers</a>
            <a href="{{ route('students') }}"    class="px-3 py-1.5 text-sm text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-md transition">Students</a>
        </nav>

        <div class="flex items-center gap-2">
            @auth
                <a href="{{ route('dashboard') }}"
                   class="px-3.5 py-1.5 text-sm font-medium bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="px-3 py-1.5 text-sm text-gray-500 hover:text-gray-900 transition">Log in</a>
                <a href="{{ route('register') }}"
                   class="px-3.5 py-1.5 text-sm font-medium bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    Get started
                </a>
            @endauth
        </div>
    </div>
</header>


{{-- ── HERO ─────────────────────────────────────── --}}
<section class="hero-grid relative py-24 md:py-36 overflow-hidden">

    {{-- accent blob --}}
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-indigo-100 rounded-full blur-3xl opacity-50 pointer-events-none"></div>
    <div class="absolute -bottom-16 right-0 w-72 h-72 bg-violet-100 rounded-full blur-3xl opacity-40 pointer-events-none"></div>

    <div class="relative max-w-4xl mx-auto px-6 text-center">

        <span class="fade-up inline-flex items-center gap-1.5 px-3 py-1 rounded-full border border-indigo-200 bg-indigo-50 text-indigo-600 text-xs font-medium mb-6">
            <span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span>
            Student Management System
        </span>

        <h1 class="fade-up delay-1 text-4xl md:text-6xl font-semibold tracking-tight text-gray-900 leading-tight mb-6">
            One place for<br>
            <span class="text-indigo-600">students, teachers</span><br>
            &amp; departments.
        </h1>

        <p class="fade-up delay-2 text-lg text-gray-500 max-w-xl mx-auto mb-10 leading-relaxed">
            A clean, fast system to manage your institution's students, faculty and department structure — no spreadsheets needed.
        </p>

        <div class="fade-up delay-3 flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('students') }}"
               class="px-5 py-2.5 text-sm font-medium bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition shadow-sm">
                View Students
            </a>
            <a href="{{ route('departments') }}"
               class="px-5 py-2.5 text-sm font-medium text-gray-700 border border-gray-200 bg-white rounded-lg hover:border-gray-300 hover:bg-gray-50 transition">
                View Departments
            </a>
        </div>
    </div>
</section>


{{-- ── STATS BAR ─────────────────────────────────── --}}
<div class="border-y border-gray-100 bg-white">
    <div class="max-w-6xl mx-auto px-6 py-8 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
        @php
            $stats = [
                ['label' => 'Departments',      'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16'],
                ['label' => 'Teachers',         'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                ['label' => 'Students',         'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
                ['label' => 'Assignments',      'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
            ];
        @endphp
        @foreach ($stats as $s)
        <div class="flex flex-col items-center gap-2 text-gray-500">
            <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $s['icon'] }}"/>
            </svg>
            <span class="text-xs font-medium tracking-wide uppercase">{{ $s['label'] }}</span>
        </div>
        @endforeach
    </div>
</div>


{{-- ── FEATURE GRID ─────────────────────────────── --}}
<section class="max-w-6xl mx-auto px-6 py-20">
    <div class="grid md:grid-cols-3 gap-6">

        {{-- Card 1 --}}
        <div class="group relative bg-white border border-gray-100 rounded-2xl p-7 hover:shadow-md hover:border-indigo-100 transition duration-200 overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-indigo-50 rounded-bl-full opacity-0 group-hover:opacity-100 transition duration-300"></div>
            <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center mb-5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
            <h3 class="text-base font-semibold text-gray-900 mb-2">Manage Students</h3>
            <p class="text-sm text-gray-400 leading-relaxed mb-5">Add, update, or remove student records. Assign them to departments instantly.</p>
            <a href="{{ route('students') }}" class="text-xs font-medium text-indigo-600 hover:text-indigo-800 inline-flex items-center gap-1 transition">
                Open Students
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        {{-- Card 2 --}}
        <div class="group relative bg-white border border-gray-100 rounded-2xl p-7 hover:shadow-md hover:border-indigo-100 transition duration-200 overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-violet-50 rounded-bl-full opacity-0 group-hover:opacity-100 transition duration-300"></div>
            <div class="w-10 h-10 bg-violet-50 text-violet-600 rounded-xl flex items-center justify-center mb-5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <h3 class="text-base font-semibold text-gray-900 mb-2">Manage Teachers</h3>
            <p class="text-sm text-gray-400 leading-relaxed mb-5">Keep a clean roster of all teaching staff and track their department assignments.</p>
            <a href="{{ route('teachers') }}" class="text-xs font-medium text-violet-600 hover:text-violet-800 inline-flex items-center gap-1 transition">
                Open Teachers
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        {{-- Card 3 --}}
        <div class="group relative bg-white border border-gray-100 rounded-2xl p-7 hover:shadow-md hover:border-indigo-100 transition duration-200 overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-emerald-50 rounded-bl-full opacity-0 group-hover:opacity-100 transition duration-300"></div>
            <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center mb-5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </div>
            <h3 class="text-base font-semibold text-gray-900 mb-2">Manage Departments</h3>
            <p class="text-sm text-gray-400 leading-relaxed mb-5">Create and organise departments, then assign teachers and track student enrollment.</p>
            <a href="{{ route('departments') }}" class="text-xs font-medium text-emerald-600 hover:text-emerald-800 inline-flex items-center gap-1 transition">
                Open Departments
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>


{{-- ── CTA BANNER ───────────────────────────────── --}}
<div class="max-w-6xl mx-auto px-6 pb-20">
    <div class="relative bg-indigo-600 rounded-2xl px-8 py-10 md:py-12 overflow-hidden flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
        {{-- subtle pattern --}}
        <div class="absolute inset-0 opacity-10"
             style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 24px 24px;"></div>

        <div class="relative">
            <h2 class="text-xl md:text-2xl font-semibold text-white mb-2">Ready to get started?</h2>
            <p class="text-indigo-200 text-sm max-w-sm">All your institution's data in one clean, organised place.</p>
        </div>

        <div class="relative flex flex-wrap gap-3">
            @auth
                <a href="{{ route('students') }}"
                   class="px-5 py-2.5 text-sm font-medium bg-white text-indigo-700 rounded-lg hover:bg-indigo-50 transition">
                    Go to Students
                </a>
                <a href="{{ route('departments') }}"
                   class="px-5 py-2.5 text-sm font-medium border border-white/30 text-white rounded-lg hover:bg-white/10 transition">
                    Go to Departments
                </a>
            @else
                <a href="{{ route('register') }}"
                   class="px-5 py-2.5 text-sm font-medium bg-white text-indigo-700 rounded-lg hover:bg-indigo-50 transition">
                    Create account
                </a>
                <a href="{{ route('login') }}"
                   class="px-5 py-2.5 text-sm font-medium border border-white/30 text-white rounded-lg hover:bg-white/10 transition">
                    Log in
                </a>
            @endauth
        </div>
    </div>
</div>


{{-- ── FOOTER ───────────────────────────────────── --}}
<footer class="border-t border-gray-100 bg-white">
    <div class="max-w-6xl mx-auto px-6 py-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-gray-400">
        <div class="flex items-center gap-2">
            <div class="w-5 h-5 rounded bg-indigo-600 flex items-center justify-center">
                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <span class="font-medium text-gray-600">SMS</span>
        </div>
        <span>&copy; {{ date('Y') }} Student Management System. All rights reserved.</span>
    </div>
</footer>

</body>
</html>