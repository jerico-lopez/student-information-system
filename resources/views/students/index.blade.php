@extends('layout.main')
@section('content')
    @include('components.nav')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <a href="/students/create" class="btn btn-primary">Add student</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Firstname</th>
                <th scope="col">Middlename</th>
                <th scope="col">Lastname</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <th scope="row">{{ $student->id }}</th>
                    <td>
                        <img src="{{ $student->photo ? asset('storage/students/' . $student->photo) : asset('img/default-photo.png') }}" class="rounded" alt="..." width="100">
                    </td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->middle_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="/students/{{ $student->id }}" class="btn btn-success">View</a>
                            <a href="/students/edit/{{ $student->id }}" class="btn btn-warning">Edit</a>
                            <a href="/students/delete/{{ $student->id }}" class="btn btn-danger">Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
