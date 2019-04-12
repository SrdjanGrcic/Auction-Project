@extends('layouts.dashboard')

@section('content')

    <h3>Bids list</h3>
    <hr/>

    @if(count($bids) > 0)
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Stamp</th>
                    <th>Collection</th>
                    <th>Price</th>
                    <th>Bid</th>
                    <th>User</th>
                </tr>
            </thead>
            
            @foreach($bids as $bid)
                <tbody>
                    <tr>
                        <td>{{$bid->name}}</td>
                        <td>{{$bid->collection}}</td>
                        <td>{{$bid->price}}</td>
                        <td>{{$bid->bid_value}}</td>
                        <td>{{$bid->userName}}</td>
                    </tr>
                </tbody>
            @endforeach   
        </table>
    @else
        <p>No bids found</p>
    @endif
@endsection