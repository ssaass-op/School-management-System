@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Teacher's Department</h1>
        <p class="text-sm text-gray-400 mt-0.5">All teacher–department assignments</p>
    </div>
    <a href="{{ route('department_teacher.create') }}" class="btn-primary">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Assign Teacher
    </a>
</div>

<div class="card">
    <div class="overflow-x-auto">
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Teacher</th>
                    <th>Department</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $sno = 1; @endphp
                @forelse ($assignments as $department)
                    @foreach ($department->teachers as $teacher)
                        @php
                            $row = \DB::table('department_has_teachers')
                                ->where('department_id', $department->id)
                                ->where('teacher_id', $teacher->id)
                                ->first();
                        @endphp
                        <tr>
                            <td class="text-gray-400 tabular-nums w-12">{{ $sno++ }}</td>
                            <td class="font-medium text-gray-900">{{ $teacher->name }}</td>
                            <td>
                                <span class="badge">{{ $department->name }}</span>
                            </td>
                            <td class="text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('department_teacher.edit', $row->id) }}" class="btn-warning">Edit</a>
                                    <form action="{{ route('department_teacher.destroy', $row->id) }}" method="POST"
                                          onsubmit="return confirm('Remove this assignment?');" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @empty
                <tr>
                    <td colspan="4" class="py-16 text-center text-gray-400 text-sm">
                        <svg class="w-10 h-10 mx-auto mb-3 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        No assignments yet.
                        <a href="{{ route('department_teacher.create') }}" class="text-indigo-600 hover:underline">Assign the first teacher →</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
