@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="p-5 mb-4 bg-white rounded-3 shadow-sm border text-center">
        <h1 class="display-5 fw-bold">Student Management System</h1>
        <p class="fs-5 text-muted">Manage departments and students efficiently.</p>
        <div class="d-flex justify-content-center gap-2 mt-4">
            <a href="{{ route('students') }}" class="btn btn-primary">View Students</a>
            <a href="{{ route('departments') }}" class="btn btn-outline-secondary">View Departments</a>
        </div>
    </div>
</div>
@endsection