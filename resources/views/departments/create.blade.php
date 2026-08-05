@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 fw-bold">Create Department</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('departments.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label small text-muted">Department Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter department name" required>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('departments') }}" class="btn btn-light btn-sm">Cancel</a>
                            <button type="submit" class="btn btn-primary btn-sm px-4">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection