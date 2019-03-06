@extends('layouts.dashboard')

@section('content')

    <section>
            <h4>List of stamps</h4>
            
            @if(count($stamps) > 0)
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Collection</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                </thead>
                
                @foreach($stamps as $stamp)
    
                    <tbody>
                        <tr>
                            <td>{{$stamp->name}}</td>
                            <td>{{$stamp->collection}}</td>
                            <td>{{$stamp->price}}</td>
                            <td>
                                <img src="/storage/stamp_images/{{$stamp->stamp_image}}">
                            </td>
                            <td>
                                <a href="{{ route('dashboard.make_bid', ['stamp_id' => $stamp->id]) }}">Bid</a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
                
            </table>
            @else
                <p>No stamps found</p>
            @endif
        </section>
@endsection