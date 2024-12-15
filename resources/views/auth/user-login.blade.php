<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rto Login </title>

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
                         <div id="loginformid" class="ui-grid-col-4 ">
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-12  ">
                                <form name="form1" role="form" method="POST" action="{{route('user.login.submit')}}"  id="form1">
                                    @csrf
                                    <div class="login-form text-center">
                                        <div class="heading-login">
                                            <h2>Authenticated Login</h2>
                                        </div>
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-user "></i>
                                                </span>
                                                <input name="email" id="UserName"  type="text" value="{{ old('email') }}" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control no-copy-paste" autocomplete="off" placeholder="User Name" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-lock"></i>
                                                </span>
                                                <input name="password" id="txtPassword" type="password" value="" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all form-control no-copy-paste" autocomplete="off" placeholder="Password" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="ui-grid-row">
                                                <div class="ui-grid-col-12 center-position">
                                                    <button id="btnisValidate" type="submit" name="btnisValidate" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left btn btn-primary btn-block btn-login" type="submit">
                                                        <span class="ui-button-icon-left ui-icon ui-c ui-icon-unlocked"></span><span class="ui-button-text ui-c">Submit</span></button>
                                                </div>
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
    </div>

    <script src="/th/pub/asset/js/jquery.min.js"></script>
    <script src="/th/pub/asset/js/bootstrap.min.js"></script>
    <script src="/th/pub/asset/js/scripts.js"></script>

</body>

</html>