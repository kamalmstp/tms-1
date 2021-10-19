<!doctype html>
<html lang="en" class="no-focus">
    <head>
        <meta charset="utf-8">
        <title>Transprotation || Admin Login</title>
        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('asset/backend_asset/assets/media/favicons/favicon-192x192.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('asset/backend_asset/assets/media/favicons/apple-touch-icon-180x180.png')}}">
        <!-- END Icons -->
        <!-- Stylesheets -->
        <!-- Fonts and Codebase framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{ asset('asset/backend_asset/assets/css/codebase.min.css')}}">
    </head>
    <body>
        <div id="page-container" class="main-content-boxed">

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="bg-image bg-pattern" style="background-image: url('/asset/backend_asset/assets/media/photos/photo34@2x.jpg');">
                    <div class="row mx-0 justify-content-center bg-white-op-95">
                        <div class="hero-static col-lg-6 col-xl-4">
                            <div class="content content-full overflow-hidden">
                                <!-- Header -->
                                <div class="py-30 text-center">
                                    <a class="link-effect text-pulse font-w700" href="index.html">
                                        <i class="si si-fire"></i>
                                        <span class="font-size-xl text-pulse-dark">Transprotation</span><span class="font-size-xl"> (Admin Panel)</span>
                                    </a>
                                    <h2 class="h5 font-w400 text-muted mb-0">Please Enter Your E-mail & Password</h2>
                                </div>
                                <!-- END Header -->

                                <!-- Unlock Form -->
                                <!-- jQuery Validation functionality is initialized with .js-validation-lock class in js/pages/op_auth_lock.min.js which was auto compiled from _es6/pages/op_auth_lock.js -->
                                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form class="js-validation-lock" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="block block-themed block-rounded block-shadow">
                                        <div class="block-header bg-gd-pulse">
                                            <h3 class="block-title text-center"><b>Unlock Account</b></h3>
                                        </div>
                                        <div class="block-content">
                                            <div class="form-group text-center">
                                                <img class="img-avatar img-avatar96" src="{{ asset('asset/backend_asset/assets/media/avatars/avatar15.jpg')}}" alt="">
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="lock-email">Email</label>
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="lock-email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                    @error('email')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="lock-password">Password</label>
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="lock-password" name="password" required autocomplete="current-password">
                                                    @error('password')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-alt-danger">
                                                    <i class="si si-lock-open mr-10"></i> Unlock
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Unlock Form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->
        <script src="{{ asset('asset/backend_asset/assets/js/codebase.core.min.js')}}"></script>
        <script src="{{ asset('asset/backend_asset/assets/js/codebase.app.min.js')}}"></script>

        <!-- Page JS Plugins -->
        <script src="{{ asset('asset/backend_asset/assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

        <!-- Page JS Code -->
        <script src="{{ asset('asset/backend_asset/assets/js/pages/op_auth_lock.min.js')}}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
