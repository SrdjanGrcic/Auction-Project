@extends('layouts.site')

@section('content')

    <form method="post" action="contactform.php">
                            
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Name:</label>
            <input  type="text" name="name" id="Name" placeholder="Name" required>
        </div>
                            
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Phone:</label>
            <input type="text" name="phone" id="Phone" placeholder="Phone">
        </div>
                            
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email:</label>
            <input type="text" name="email" id="Email" placeholder="Email" required>
        </div>
                            
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Message:</label>
            <textarea id="Message" cols="50" rows="5" name="message" placeholder="Message"></textarea>
        </div>
                            
        <button type="submit" class="btn btn-info mb-2">Send</button>
    </form>

@endsection