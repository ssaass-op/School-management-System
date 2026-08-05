@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 fw-bold">Create Student</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label small text-muted">Student Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter student name" required>
                        </div>
                        <div class="mb-4">
                            <label for="department_id" class="form-label small text-muted">Department</label>
                            <select class="form-select" id="department_id" name="department_id" required>
                                <option value="">Select Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('students') }}" class="btn btn-light btn-sm">Cancel</a>
                            <button type="submit" class="btn btn-primary btn-sm px-4">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
