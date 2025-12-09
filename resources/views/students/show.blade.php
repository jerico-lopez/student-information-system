@extends('layout.main')
@section('content')
    <form action="/students" method="POST">
        @csrf
        <div class="mb-3">
            <label for="first_name" class="form-label">Firstname</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $student->first_name }}"
                disabled>
            @error('first_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="middle_name" class="form-label">Middlename</label>
            <input type="text" class="form-control" id="middle_name" name="middle_name"
                value="{{ $student->middle_name }}" disabled>
            @error('middle_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $student->last_name }}"
                disabled>
            @error('last_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="text" class="form-control" id="age" name="age" value="{{ $student->age }}" disabled>
            @error('age')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="contact_number" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="contact_number" name="contact_number"
                value="{{ $student->contact_number }}" disabled>
            @error('contact_number')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $student->email }}"
                disabled>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <select class="form-select" name="course" disabled>
                @foreach ($courses as $course)
                    <option value="{{ $course }}" {{ $course == $student->course ? 'selected' : '' }}>
                        {{ $course->name }}</option>
                @endforeach
            </select>
            @error('course')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $student->address }}"
                disabled>
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <a href="/students" class="btn btn-danger">Go back</a>
    </form>
@endsection
