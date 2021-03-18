<section id="header">
    <nav class="navbar navbar-expand-lg navbar-light smart-scroll mb-5 fixed-top" id="menu">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h2 style="color: white"><strong>Welcome</strong>&nbsp;Apps</h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    @if(Auth::user())
                    <a class="nav-item nav-link active btn-ripple" href="{{ url('home') }}" style="color: #fff;">Home <span
                            class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link btn-ripple" href="{{ url('users') }}" style="color: #fff;">Manage Users</a>
                    <li class="dropdown"> <a href="javascript:void(0)" class="btn btn-secondary services dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Setting <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <div class="card setting">
                                <div class="card-body">
                                    <h6>Username&nbsp;:&nbsp;{{ Auth::user()->name }}</h6>
                                    <hr>
                                    <a href="{{ url('logout') }}">Logout</a>
                                </div>
                            </div>
                        </ul>
                    </li>
                    @else
                    <a class="nav-item nav-link btn-ripple" href="/" style="color: #fff;">Login</a> @endif
                </div>
            </div>
        </div>
    </nav>
</section>