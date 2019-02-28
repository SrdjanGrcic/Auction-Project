@extends('layouts.site')

@section('content')

    <form method="post" action="contactform.php">
                            
        <div class="row">
            <label class="col-sm-2 col-form-label">Name:</label>
            <div class="col-sm-2">
                <input class="border border-primary"  type="text" name="name" id="Name" placeholder="Name" required>
            </div>
        </div>
                            
        <div class="row">
            <label class="col-sm-2 col-form-label">Phone:</label>
            <div class="col-sm-2">
                <input class="border border-primary" type="text" name="phone" id="Phone" placeholder="Phone">
            </div>
        </div>
                            
        <div class="row">
            <label class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-2">
                <input class="border border-primary" type="text" name="email" id="Email" placeholder="Email" required>
            </div>
        </div>
                            
        <div class="row">
            <label class="col-sm-2 col-form-label">Message:</label>
            <div class="col-sm-10">
                <textarea id="Message" class="border border-primary" cols="50" rows="5" name="message" placeholder="Message"></textarea>
            </div>
        </div>
                            
        <button type="submit" class="btn btn-info mb-2">Send</button>
    </form>

@endsection
