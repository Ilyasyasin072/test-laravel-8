@include('includes/header')

<body>
    @include('includes/navbar')
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
    @include('includes/footer')
