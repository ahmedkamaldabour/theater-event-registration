<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>SignIn Boxed | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="{{asset('AdminAssets')}}/src/assets/img/favicon.ico"/>
    <link href="{{asset('AdminAssets')}}/layouts/horizontal-dark-menu/css/light/loader.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('AdminAssets')}}/layouts/horizontal-dark-menu/css/dark/loader.css" rel="stylesheet"
          type="text/css"/>
    <script src="{{asset('AdminAssets')}}/layouts/horizontal-dark-menu/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('AdminAssets')}}/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <link href="{{asset('AdminAssets')}}/layouts/horizontal-dark-menu/css/light/plugins.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('AdminAssets')}}/src/assets/css/light/authentication/auth-boxed.css" rel="stylesheet"
          type="text/css"/>

    <link href="{{asset('AdminAssets')}}/layouts/horizontal-dark-menu/css/dark/plugins.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('AdminAssets')}}/src/assets/css/dark/authentication/auth-boxed.css" rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->

</head>
<body class="form">

<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
<!--  END LOADER -->

<div class="auth-container d-flex">

    <div class="container mx-auto align-self-center">

        <div class="row">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                <div class="card mt-3 mb-3">
                    <div class="card-body">
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif
                        <form method="post" action="{{route('login')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">

                                    <h2>Sign In</h2>
                                    <p>Enter your email and password to login</p>

                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="admin@admin.com">
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="123456">
                                        @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-12">
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-secondary w-100">SIGN IN</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('AdminAssets')}}/src/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
</body>
</html>
