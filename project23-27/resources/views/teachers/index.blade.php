@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Список преподавателей</h1>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->first_name }}</td>
                    <td>{{ $teacher->last_name }}</td>
                    <td>{{ $teacher->email }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Преподавателей пока нет.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
