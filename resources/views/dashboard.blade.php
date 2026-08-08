<x-app-layout>
    <div class="page-header">
        <div>
            <h1 class="page-title">Dashboard</h1>
            <p class="text-sm text-gray-400 mt-0.5">Welcome back, {{ Auth::user()->name }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
        <a href="{{ route('students') }}" class="card p-5 flex items-center gap-4 group hover:border-indigo-200 transition">
            <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-500 flex items-center justify-center shrink-0 group-hover:bg-indigo-100 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Students</p>
                <p class="text-sm font-semibold text-gray-800 mt-0.5">Manage records</p>
            </div>
        </a>

        <a href="{{ route('teachers') }}" class="card p-5 flex items-center gap-4 group hover:border-violet-200 transition">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-500 flex items-center justify-center shrink-0 group-hover:bg-violet-100 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Teachers</p>
                <p class="text-sm font-semibold text-gray-800 mt-0.5">View all staff</p>
            </div>
        </a>

        <a href="{{ route('departments') }}" class="card p-5 flex items-center gap-4 group hover:border-emerald-200 transition">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0 group-hover:bg-emerald-100 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Departments</p>
                <p class="text-sm font-semibold text-gray-800 mt-0.5">View all depts</p>
            </div>
        </a>
    </div>

    <div class="card p-6">
        <p class="text-sm text-gray-500">
            You're logged in as <span class="font-medium text-gray-900">{{ Auth::user()->email }}</span>.
            Use the navigation above to manage your institution's data.
        </p>
    </div>
</x-app-layout>
