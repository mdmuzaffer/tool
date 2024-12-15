<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Urban </title>
    <link rel="shortcut icon" type="image/png" href="/th/pub/uploads/78341ebb3bb307b2e58f9357adf6e9771523928b.png" />


    <!-- Styles -->
    <link href="/th/pub/css/app.css" rel="stylesheet">
    <link href="/th/pub/asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="/th/pub/asset/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/th/pub/asset/css/style.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {
            "csrfToken":"{{ csrf_token() }}"
        };
    </script>
</head>

<body>
    <div class="full-page-bg" style="background-image: url(/th/pub/asset/img/login-bg.jpg);">
        <div class="log-overlay"></div>
        <div class="full-page-bg-inner">
            <div class="row no-margin">
                <div class="col-md-6 log-left">
                    <span class="login-logo">
                        <img src="/th/pub/uploads/5460c0f3c5cc7ecd856eb51de1913543fc18e93b.png">
                    </span>
                    <h2>Admin Log In</h2>
                    {{-- <p>Drive with Urban and earn great money as an independent contractor. Get paid weekly just for
                        helping our community of riders get rides around town. Be your own boss and get paid in fares
                        for driving on your own schedule.</p> --}}
                </div>
                <div class="col-md-6 log-right">
                    <div class="login-box-outer">
                        <div class="login-box row no-margin">
                            <div class="col-md-12">

                                {{-- <a class="log-blk-btn" href="register.html">CREATE NEW ACCOUNT</a> --}}
                                <h3>Admin Log In</h3>
                            </div>

                            <div class="col-md-12">
                                <form role="form" method="POST" action="{{ route('dist.login') }}">
                                    @csrf

                                    <input id="email" type="email" class="form-control" name="email" value=""
                                        placeholder="Email" autofocus>


                                    <input id="password" type="password" class="form-control" name="password"
                                        placeholder="Password" />


                                    <div class="checkbox">
                                        <input type="checkbox" name="remember" id="remember" /><label for="remember">
                                            Remember Me</label>
                                    </div>


                                    <button type="submit" class="log-teal-btn">
                                        Login
                                    </button>

                                    <p class="helper"><a href="password/reset.html">Forgot Your Password?</a></p>
                                </form>
                            </div>
                        </div>
                        <div class="log-copy">
                            <p class="no-margin">&copy; 2019 Urban </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="/th/pub/asset/js/jquery.min.js"></script>
    <script src="/th/pub/asset/js/bootstrap.min.js"></script>
    <script src="/th/pub/asset/js/scripts.js"></script>
</body>

</html>
