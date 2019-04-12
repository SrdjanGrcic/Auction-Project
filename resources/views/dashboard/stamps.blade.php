@extends('layouts.dashboard')

@section('content')

<section>
    <h3>All stamps</h3>
    <hr/>

    @if(count($stamps) > 0)
    <table class="table table-responsive">
        <caption>List of stamps</caption>
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Collection</th>
                <th>Price</th>
                <th>Created by</th>
                <th>Image</th>
                <th>Bids</th>
                <th></th>
                <th>
                    <a href="{{ route('dashboard./stamps/create') }}" class="btn btn-primary float-right mb-2">Add</a>
                </th>
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
                    <td><a href="/dashboard/stamps/{{ $stamp->id}}/edit">Edit</a></td>
                    <td>
                    {!!Form::open(['action' => ['StampController@destroy', $stamp->id], 'method' => 'POST', 'onsubmit' => 'return ConfirmDelete()'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
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