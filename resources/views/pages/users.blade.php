@extends('layouts.site')

@section('content')

    <h1>Users list</h1>

    @if(count($users) > 0)
        @foreach($users as $user)
            <div class = "well">
                <h3>{{$user->name}}</h3>
            </div>
        @endforeach
    @else
        <p>No users found</p>
    @endif

@endsection