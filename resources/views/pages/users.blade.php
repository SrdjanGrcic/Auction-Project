@extends('layouts.dashboard')

@section('content')

    <h1>Users list</h1>

    @if(count($users) > 0)
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>email</th>
                </tr>
            </thead>
            
            @foreach($users as $user)
                <tbody>
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                </tbody>
            @endforeach   
        </table>
    @else
        <p>No users found</p>
    @endif
@endsection