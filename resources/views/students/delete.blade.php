@extends('layout.main')
@section('content')
<form action="/students/destroy/{{ $student->id }}" method="POST">
    @method("DELETE")
    @csrf
    <h1>Are you sure you want to remove this student? {{ $student->first_name . " " . $student->last_name }}</h1>
    <button class="btn btn-danger">Yes</button>
    <a href="/students" class="btn btn-primary">Cancel</a>
</form>
@endsection