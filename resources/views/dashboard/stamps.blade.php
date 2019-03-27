@extends('layouts.dashboard')

@section('content')

<section>
    <h4>List of stamps</h4>
    
    <a href="{{ route('dashboard.add') }}" class="btn btn-primary float-right mb-2">Add new</a>
    
    @if(count($stamps) > 0)
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Collection</th>
                <th>Price</th>
                <th>Created by</th>
                <th>Image</th>
                <th>Bids</th>
                <th></th>
            </tr>
        </thead>
        
        @foreach($stamps as $stamp)

            <tbody>
                <tr>
                    <td>{{$stamp->name}}</td>
                    <td>{{$stamp->collection}}</td>
                    <td>{{$stamp->price}}</td>
                    <td>{{$stamp->userName}}</td>
                    <td>
                        <img src="/storage/stamp_images/{{$stamp->stamp_image}}">
                    </td>
                <td><a href="#">{{$stamp->total_bids}}</a></td>
                    <td><a href="{{ route('dashboard.edit_stamp', ['stamp_id' => $stamp->id]) }}">Edit</a></td>
                </tr>
            </tbody>
        @endforeach
        
    </table>
    @else
        <p>No stamps found</p>
    @endif
</section>

@endsection