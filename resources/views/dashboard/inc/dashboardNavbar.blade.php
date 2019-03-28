<nav class="container navbar navbar-light navbar-expand-md bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="/images/135_logo.png" class="d-block d-sm-none" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
        
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                
        <ul class="navbar-nav navbarStyle mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="/"><img src="/images/back_icon.png" class="back_icon"/>Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.stamps/offer') }}">Stamps offer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.bids') }}">Bids</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.results') }}">Results of Auction</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.stamps') }}">Stamps</a>
                </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.users')}}">Users</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-info" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                        
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>  
</nav>