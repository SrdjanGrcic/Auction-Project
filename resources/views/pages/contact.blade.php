@extends('layouts.site')

@section('content')

    <form method="post" action="contactform.php">
                            
        <div class="form-group-lg">
            <label>Name and Surname:</label>
            <input type="text" name="name" id="Name" class="contact_input" required>
        </div>
                            
        <div class="form-group-lg">
            <label>Phone:</label>
            <input type="text" name="phone" id="Phone" class="contact_input" required>
        </div>
                            
        <div class="form-group-lg">
            <label>Email:</label>
            <input type="text" name="email" id="Email" class="contact_input" required>
        </div>
                            
        <div class="form-group-lg">
            <label>Message:</label>
            <textarea id="Message" cols="50" rows="5" name="message"></textarea>
        </div>
                            
        <input type="submit" value="send">
    </form>

@endsection