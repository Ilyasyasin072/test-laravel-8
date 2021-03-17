<section id="header">
    <nav class="navbar navbar-expand-lg navbar-light smart-scroll" id="menu">
        <div class="container">
            <a class="navbar-brand" href="#">
                {{-- <img src="assets/img/icon/logo2.png" height="50" width="50" alt=""> --}}
                <h2 style="color: white"><strong>Welcome</strong>&nbsp;Apps</h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    @if(Auth::user())
                    <a class="nav-item nav-link active btn-ripple" href="#" style="color: #fff;">Home <span
                            class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link btn-ripple" href="#" style="color: #fff;">Contact</a>
                    <a class="nav-item nav-link btn-ripple" href="#" style="color: #fff;">About</a>
                    <a class="nav-item nav-link btn-ripple" href="#"
                        style="color: #fff;">{{ (Auth::user() ? Auth::user()->name : 'GUEST') }}</a>
                    <a class="nav-item nav-link btn-ripple" href="{{ url("logout") }}"
                        style="color: #fff;">Logout</a>
                    @else
                    <a class="nav-item nav-link btn-ripple" href="/" style="color: #fff;">Login</a>

                    @endif
                </div>
            </div>
        </div>
    </nav>
</section>
