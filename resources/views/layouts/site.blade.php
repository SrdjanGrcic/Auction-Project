<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>135Auctions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/app.css')}}" />
</head>
<body>
<div class="container page">
        <header>
            <nav id='navigationId' class="navbar-default">
        
                <div class="navbar-header container">
                
                    <img src="images/logo_mobile.png" class="visible-xs-inline" alt="logo">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav text-center">
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="current">Current Auction</a></li>
                        <li><a href="form">Bid Form</a></li>
                        <li><a href="terms">Terms of Sale</a></li>
                        <li><a href="results">Results of Auction</a></li>
                        <li><a href="contact">Contact</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </nav>

            <div class="headerContactInfo container">
                <div class="row">
                    <div class="col-xs-2 hidden-xs">
                        <img src="images/logo_mobile.png" class="hidden-xs" alt="logo">
                    </div>
                    <div class="col-xs-6 rightInfo">

                        <h4>Stamps expertise</h4>
                        <h4>100 Rue De Rivoli Paris</h4>
                        <h4><a href="tel:01-02-03-04-11">Tel: 01-02-03-04-11</a></h4>
                        <h4> Fax: 01-02-03-05-12</h4>
                        <h4><a href="mailto:contact@135auctions.com">contact@135auctions.com</a></h4>
                    </div>

                    <div class="col-xs-4 language">
                        <a href="en/index.html"><img src="images/en.png" alt=""></a>
                        <a href="#"><img src="images/fr.png" alt=""></a>
                    </div>
                </div>
            </div>
            
            <div class="container">
            
                <div id="myCarousel" class="carousel slide slideshow_border" data-ride="carousel">

                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                        <li data-target="#myCarousel" data-slide-to="4"></li>
                        <li data-target="#myCarousel" data-slide-to="5"></li>
                        <li data-target="#myCarousel" data-slide-to="6"></li>
                        <li data-target="#myCarousel" data-slide-to="7"></li>
                        <li data-target="#myCarousel" data-slide-to="8"></li>
                        <li data-target="#myCarousel" data-slide-to="9"></li>
                        <li data-target="#myCarousel" data-slide-to="10"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                            
                        <div class="item active">
                            <img src="images/s1.jpg" alt="stamp image">
                        </div>
                        
                        <div class="item">
                             <img src="images/s2.jpg" alt="stamp image">
                        </div>

                        <div class="item">
                            <img src="images/s3.jpg" alt="stamp image">    
                        </div>
                            
                        <div class="item">
                            <img src="images/s4.jpg" alt="stamp image">    
                        </div>
                            
                        <div class="item">
                            <img src="images/s5.jpg" alt="stamp image">    
                        </div>
                            
                        <div class="item">
                            <img src="images/s6.jpg" alt="stamp image">    
                        </div>
                            
                        <div class="item">
                            <img src="images/s7.jpg" alt="stamp image">    
                        </div>
                            
                        <div class="item">
                            <img src="images/s8.jpg" alt="stamp image">    
                        </div>
                            
                        <div class="item">
                            <img src="images/s9.jpg" alt="stamp image">
                        </div>
                            
                        <div class="item">
                            <img src="images/s10.jpg" alt="stamp image">    
                        </div>
                            
                        <div class="item">
                            <img src="images/s11.jpg" alt="stamp image">    
                        </div>
                            
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>      
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
</body>
</html>