@extends('layout.main')
@section('content')
    @include('components.nav')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Firstname</th>
                <th scope="col">Middlename</th>
                <th scope="col">Lastname</th>
                <th scope="col">Age</th>
                <th scope="col">Address</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Email</th>
                <th scope="col">Course</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <th scope="row">{{ $student->id }}</th>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->middle_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->contact_number }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->course }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
