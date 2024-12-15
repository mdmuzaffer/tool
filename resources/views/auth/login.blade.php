<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Urban </title>

    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" type="image/png" href="/th/pub/uploads/78341ebb3bb307b2e58f9357adf6e9771523928b.png" />
    <link href="/th/pub/asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="/th/pub/asset/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/th/pub/asset/css/style.css" rel="stylesheet">

</head>

<body>


    <div class="full-page-bg" style="background-image: url(/th/pub/asset/img/login-user-bg.jpg);">
        <div class="log-overlay"></div>
        <div class="full-page-bg-inner">
            <div class="row no-margin">
                <div class="col-md-6 log-left">
                    <span class="login-logo"><img
                            src="/th/pub/uploads/5460c0f3c5cc7ecd856eb51de1913543fc18e93b.png"></span>
                    <h2>Create your account and get moving in minutes</h2>
                    <p>Welcome to Urban , the easiest way to get around at the tap of a button.</p>
                </div>
                <div class="col-md-6 log-right">
                    <div class="login-box-outer">
                        <div class="login-box row no-margin">
                            <div class="col-md-12">
                                <a class="log-blk-btn" href="{{ route('user.regi') }}">CREATE NEW ACCOUNT</a>
                                <h3>Sign In</h3>
                            </div>
                            <form role="form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" placeholder="Email Address"
                                        name="email" value="" required autofocus>

                                </div>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" placeholder="Password"
                                        name="password" required>

                                </div>

                                <div class="col-md-12">
                                        <input type="checkbox" name="remember" id="remember" /><label for="remember" > Remember Me</label>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="log-teal-btn">LOGIN</button>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <p class="helper"> <a href="/th/pub/password/reset">Forgot Password</a></p>
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

    <script src="/th/pub/asset/js/jquery.min.js"></script>
    <script src="/th/pub/asset/js/bootstrap.min.js"></script>
    <script src="/th/pub/asset/js/scripts.js"></script>

</body>

</html>