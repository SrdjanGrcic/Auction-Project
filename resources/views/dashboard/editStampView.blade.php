@extends('layouts.dashboard')

@section('content')

<h3>Update stamp</h3>
<hr/>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open(['action' => ['StampController@update', $stamp->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $stamp->name, ['class' => 'form-control', 'placeholder'=>'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('collection', 'Collection')}}
        {{Form::text('collection', $stamp->collection, ['class' => 'form-control', 'placeholder'=>'Collection'])}}
    </div>
    <div class="form-group">
        {{Form::label('price', 'Price')}}
        {{Form::text('price', $stamp->price, ['class' => 'form-control', 'placeholder'=>'Price'])}}
    </div>
    <img src="/storage/stamp_images/{{$stamp->stamp_image}}" class="editViewImg">
    {{ Form::hidden('_method', 'PUT')}}
    <div class="form-group">
        {{Form::file('stamp_image')}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
@endsection