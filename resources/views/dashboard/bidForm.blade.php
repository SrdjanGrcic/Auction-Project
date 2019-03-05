@extends('layouts.dashboard')

@section('content')

Bid Form
<hr/>

<div class="row">
        <label class="col-3 col-form-label">Name: </label>
        <label class="col-9 col-form-label">{{$stamp->name}}</label>
    </div>

    <div class="row">
        <label class="col-3 col-form-label">Collection </label>
        <label class="col-9 col-form-label">collection</label>
    </div>
    
    <div class="row">
        <label class="col-3 col-form-label">Price: </label>
        <label class="col-9 col-form-label">{{$stamp->price}}</label>
    </div>
    
    <hr/>

    {!! Form::open(['action' => 'DashboardController@createBid', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    <div class="row">
        {{Form::label('bid', 'Bid', ['class' => 'col-2 col-form-label'])}}
        {{Form::text('bid', '', ['class' => 'col-6 form-control border border-primary', 'placeholder'=>'Bid'])}}
        {!! Form::hidden('stamp_id', $value = $stamp->id, ['class'=>'form-control']) !!}
        {{Form::submit('Make a bid', ['class' => 'col-4 btn btn-info mb-2'])}}
    </div>
    
    
{!! Form::close() !!}

@endsection