<div class="headerData">
    <div class="row">
        <div class="col-xs-2 hidden-xs">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="images/135_logo.png" class="d-none d-sm-block mr-2" alt="logo_image">
            </a>
        </div>
        <div class="col-xs-6 contactData">

            <h4>Stamps expertise</h4>
            <h4>100 Rue De Rivoli Paris</h4>
            <h4><a href="tel:01-02-03-04-11">Tel: 01-02-03-04-11</a></h4>
            <h4> Fax: 01-02-03-05-12</h4>
            <h4><a href="mailto:contact@135auctions.com">contact@135auctions.com</a></h4>
        </div>

        <div class="col-xs-4 language">
            <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li>
                                <a href="#"><img src="images/en.png" alt="Language: English"></a>
                                <a href="#"><img src="images/fr.png" alt="Language: French"></a>
                        </li>
                        
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    
                                    <a class="dropdown-item" href="dashboard">Dashboard</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
        </div>
    </div>
</div>