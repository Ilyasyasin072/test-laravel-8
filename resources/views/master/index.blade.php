<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/custome.css">
    <title>Welcome</title>
</head>

<body>
    @include('includes/navbar')
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12">
            @yield('page_title')
            <div class="card-header">
            </div>

            <div class="card">
                <div class="card-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    {{-- FOOTER --}}
    @section('scripts')
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    @stack('js')
    @show
</body>

</html>
