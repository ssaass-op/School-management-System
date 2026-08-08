@extends('layouts.app')

@section('content')
<div class="max-w-xl">

    {{-- Back link --}}
    <a href="{{ route('students') }}" class="inline-flex items-center gap-1.5 text-sm text-gray-400 hover:text-gray-700 mb-6 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Back to Students
    </a>

    <div class="card">
        <div class="px-6 py-5 border-b border-gray-50">
            <h1 class="text-base font-semibold text-gray-900">Add New Student</h1>
            <p class="text-sm text-gray-400 mt-0.5">Fill in the details below to create a student record.</p>
        </div>

        <div class="p-6">
            @if ($errors->any())
            <div class="mb-5 flex gap-3 bg-red-50 border border-red-100 rounded-lg p-4">
                <svg class="w-5 h-5 text-red-400 shrink-0 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <ul class="text-sm text-red-600 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('students.store') }}" method="POST" class="space-y-5" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="name" class="field-label">Student Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                           placeholder="e.g. John Doe" required
                           class="field-input @error('name') error @enderror">
                    @error('name')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="department_id" class="field-label">Department</label>
                    <select id="department_id" name="department_id" required
                            class="field-input @error('department_id') error @enderror">
                        <option value="">Select a department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
`                   <div class="flex flex-col gap-3">
                    <label for="image" class="field-label">Image</label>
                    <input type="file" name="image" class="field-input @error('image') error @enderror">
                    @error('image')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                  

                <div class="flex items-center justify-end gap-3 pt-2">
                    <a href="{{ route('student.index') }}" class="btn-ghost">Cancel</a>
                    <button type="submit" class="btn-primary">Create Student</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
