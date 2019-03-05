@extends('layouts.dashboard')

@section('content')

    <h1>Bids list</h1>

    @if(count($bids) > 0)
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Stamp</th>
                    <th>Price</th>
                    <th>Bid</th>
                    <th>User</th>
                </tr>
            </thead>
            
            @foreach($bids as $bid)
                <tbody>
                    <tr>
                        <td>{{$bid->name}}</td>
                        <td>{{$bid->price}}</td>
                        <td>{{$bid->user_bid}}</td>
                        <td>{{$bid->userName}}</td>
                    </tr>
                </tbody>
            @endforeach   
        </table>
    @else
        <p>No bids found</p>
    @endif
@endsection