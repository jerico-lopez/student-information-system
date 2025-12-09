@extends('layout.main')
@section('content')
    <div class="container">
        <form action="/courses" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Course</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
