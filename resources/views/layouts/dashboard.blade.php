<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>{{config('app.name', '135Auctions')}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/135.png">
        
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/app.css')}}" />
    </head>
    <body>
        <div class="pageStyle">
            <header>
                <div class="container">
                    @include('inc.dashboardNavbar')
                </div>
            </header>

            <section>
                <div class="container">
                    @yield('content')
                </div>
            </section>

            <footer>
                @include('inc.footer')
            </footer>
        </div>

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="{{asset('js/main.js')}}"></script>
        <script src="\js\app.js"></script>
    </body>
</html>