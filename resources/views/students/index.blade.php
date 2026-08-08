@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Students</h1>
        <p class="text-sm text-gray-400 mt-0.5">All enrolled students</p>
    </div>
    <a href="{{ route('student.create') }}" class="btn-primary">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Add Student
    </a>
</div>

<div class="card">
    <div class="overflow-x-auto">

    <form action="{{ route('student.index') }}" method="GET" class="row mb-4">
    <div class="col-md-4">
        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Search by student name..."
            value="{{ request('search') }}">
    </div>
    <div class="col-auto">
        <button class="btn btn-success">
            Search
        </button>
        <a href="{{ route('student.index') }}" class="btn btn-secondary">
            Reset
        </a>
    </div>
</form>
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                <tr>
                    <td class="text-gray-400 tabular-nums w-12">{{ $loop->iteration }}</td>
                    <td class="font-medium text-gray-900">{{ $student->name }}</td>
                    <td>
                        <span class="badge">{{ $student->department->name ?? '—' }}</span>
                    </td>
                    <td>
                        @if($student->image)
                       
                        <img
                         src="{{ asset('storage/' . $student->image) }}"
                         alt="{{ $student->name }}"
                         width='80'
                         height='80'
                         class='rounded border'
                         style='object-fit:cover;'
                         >
                    @else
                    <span class='text-gray-400'>
                        No image available
                    </span>
                    @endif
                        
                    </td>
                    <td class="text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('student.edit', $student) }}" class="btn-warning">Edit</a>
                            <form action="{{ route('student.destroy', $student) }}" method="POST"
                                  onsubmit="return confirm('Delete this student?');" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-16 text-center text-gray-400 text-sm">
                        <svg class="w-10 h-10 mx-auto mb-3 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        No students yet.
                        <a href="{{ route('student.create') }}" class="text-indigo-600 hover:underline">Add the first one →</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-3">
            {{ $students->links() }}
        </div>
    </div>
</div>
@endsection