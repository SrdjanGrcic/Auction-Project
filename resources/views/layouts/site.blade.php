<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{config('app.name', '135Auctions')}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/app.css')}}" />
    </head>
    <body>
        <div class="container page">
            <header>
                @include('inc.navbar')

                @include('inc.headerInfo')
                
                @include('inc.carousel')
            </header>

            <section>
                <div class="container">
                    @yield('content')
                </div>
            </section>

            <footer>
                &copy;
                <script type="text/javascript">
                    //<![CDATA[
                    var d = new Date()
                    document.write(d.getFullYear())
                    //]]>
                </script>
                <a href="http://www.google.com">135auctions.com</a>
                | All Rights Reserved.
            </footer>
        </div>
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="{{asset('js/main.js')}}"></script>
        <script src="\js\app.js"></script>
    </body>
</html>