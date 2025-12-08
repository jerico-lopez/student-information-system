@extends('layout.main')
@section('content')
<form action="/logout" method="POST">
    @csrf
    <h1>Are you sure you want to logout?</h1>
    <button class="btn btn-danger">Yes</button>
    <a href="/" class="btn btn-primary">Cancel</a>
</form>
@endsection