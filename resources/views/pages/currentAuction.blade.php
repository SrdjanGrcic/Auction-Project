@extends('layouts.site')

@section('content')

    <section>
        <h4>List of stamps</h4>
        
        @if(count($stamps) > 0)
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Price</th>
                    <th>Image</th>
                </tr>
            </thead>
            
            @foreach($stamps as $stamp)

                <tbody>
                    <tr>
                        <td>{{$stamp->name}}</td>
                        <td>country</td>
                        <td>{{$stamp->price}}</td>
                        <td>
                            <img src="/storage/stamp_images/{{$stamp->stamp_image}}">
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