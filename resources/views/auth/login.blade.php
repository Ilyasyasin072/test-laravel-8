@include('includes/header')

<body>
    <div class="container" id="login">
        <div class="wrapper">
            <div class="status"></div>
            <div class="card">
                <div class="card-header">
                    <div class="col-md-4">
                        <h3><strong>Login</strong></h3>
                    </div>
                    <div class="col-lg-7 col-md-3">
                        <p> Simple Apps</p>
                    </div>
                </div>
                <div class="card-body">
                    <form id="form-login" method="POST">
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-login">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    @stack('js')
    @show

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#form-login").submit(function(e) {
                e.preventDefault();
                const email = $('#email').val();
                const password = $('#password').val();
                console.log(email, password);
                const url = "{{ url('/checkLogin') }}";
                var datastring = $("#form-login").serialize();
                // console.log(email)
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        email: email,
                        password: password
                    },
                    // data: datastring,
                    dataType: "html",
                    // dataType: 'JSON',
                    success: function(data) {
                        window.location.href = "{{ url('/home') }}";
                        // console.log(data);
                    },
                    error: function(err) {

                        $('.status').empty();

                        if(err.status === 401) {
                            var res = JSON.parse(err.responseText)
                            var output = '<div class="alert alert-danger" role="alert">'+res.error+'</div>';
                            $('.status').html(output);
                        }

                        if (err.status === 400) {
                            var res = JSON.parse(err.responseText)
                            var output = '<div class="alert alert-danger" role="alert">'+res.error+'</div>';
                            $('.status').html(output);
                        }

                        if (err.status === 500) {
                            var res = JSON.parse(err.responseText)
                            var output = '<div class="alert alert-danger" role="alert">'+res.error+'</div>';
                            $('.status').html(output);
                        }
                    }
                })
            })
        })
    </script>

</body>

</html>
