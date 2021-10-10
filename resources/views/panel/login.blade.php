<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login Page</title>

    <link href="{{asset('admin')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('admin')}}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{asset('admin')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('admin')}}/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>


            </div>
            <h3>Admin Panel Login Page</h3>

            <p>Please login.</p>



            <form method="post" class="m-t" role="form" action="{{route('login')}}">
              @csrf
                <div class="form-group">
                    <input name="email" type="email" class="form-control" placeholder="E-mail" required="">
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="Şifre" required="">
                </div>

                @if (session('emailError'))
                      <div class="alert alert-danger">
                          {{session('emailError')}}
                      </div>
                @endif

                @if (session('passError'))
                      <div class="alert alert-danger">
                          {{session('passError')}}
                      </div>
                @endif

                @if (session('loginError'))
                      <div class="alert alert-danger">
                          {{session('loginError')}}
                      </div>
                @endif
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('admin')}}/js/jquery-3.1.1.min.js"></script>
    <script src="{{asset('admin')}}/js/popper.min.js"></script>
    <script src="{{asset('admin')}}/js/bootstrap.js"></script>

</body>
