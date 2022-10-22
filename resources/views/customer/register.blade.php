<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.9.3/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jan 2021 12:01:23 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customer | Register</title>

    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Register to IN+</h3>
            <p>Create account to see it in action.</p>
            <form class="m-t" role="form" method="POST" action="{{ route('cust_create') }}">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name"  name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name"  name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"  name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @error('contact_no') is-invalid @enderror" placeholder="Contact No"  name="contact_no" value="{{ old('contact_no') }}" required autocomplete="contact_no" minlength="10" maxlength="10">
                    @error('contact_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"  name="password" required autocomplete="new-password">
                    @error('password')
                    
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                    

                            
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"required autocomplete="new-password">
                            
                </div>
                
                
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ url('/') }}">Login</a>
            </form>
            
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('template/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('template/js/popper.min.js') }}"></script>
    <script src="{{ asset('template/js/bootstrap.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('template/js/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.9.3/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jan 2021 12:01:23 GMT -->
</html>
