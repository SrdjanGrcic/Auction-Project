@extends('layouts.dashboard')

@section('content')

    <h3>Bid Form</h3>
    <hr/>

    <div class="row">
        <div class="col-7">
            <div class="row">
                <label class="col-4 col-form-label">Name: </label>
                <label class="col-8 col-form-label">{{$stamp->name}}</label>
            </div>

            <div class="row">
                <label class="col-4 col-form-label">Collection </label>
                <label class="col-8 col-form-label">{{$stamp->collection}}</label>
            </div>
            
            <div class="row">
                <label class="col-4 col-form-label">Price: </label>
                <label class="col-8 col-form-label">{{$stamp->price}}</label>
            </div>
        </div>
        <div class="col-5">
                <img class="w-100" src="/storage/stamp_images/{{$stamp->stamp_image}}">
        </div>
    </div> 
    
    <hr/>

    {!! Form::open(['action' => 'BidController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    <div class="row">
        <div class="col-1">
                {{Form::label('bid', 'Bid', ['class' => 'col-form-label'])}}
        </div>
        <div class="col-4">
                {{Form::text('bid', '', ['class' => 'form-control border border-primary', 'placeholder'=>'Bid'])}}
        </div>
        
        {!! Form::hidden('stamp_id', $value = $stamp->id, ['class'=>'form-control']) !!}
        <div class="col-7">
                {{Form::submit('Make a bid', ['class' => 'btn btn-info mb-2'])}}
        </div>
        
    </div>
    
    
{!! Form::close() !!}

@endsection