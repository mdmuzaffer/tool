<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{-- @hasSection ('title') @yield('title') | @endif --}}
        @isset($loginTitle) {{ $loginTitle }} | @endisset {{config('app.name')}}
        {{-- @hasSection ('title-after') | @yield('title-after')@endif --}}
    </title>
    <link href="{{asset('th/sbap/css/styles.css?v='.uniqid())}}" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{asset('th/sbap/assets/img/favicon.png')}}" />
    <script data-search-pseudo-elements defer src="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js">
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="font-weight-light my-2">{{ $loginTitle }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="list-group list-group-flush">
                                        @foreach ($loginArr as $login)
                                        <div class="p-3 list-group-item list-group-item-action text-center ">
                                            <a href="{{route($login['route.login'])}}" class="btn btn-link w-100">{{$login['text.login']}}</a>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                                {{-- <div class="card-footer text-center">
                                    <div class="small"><a href="register-basic.html">Need an account? Sign up!</a></div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer mt-auto footer-light">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 small">Copyright &#xA9; {{config('app.name')}} {{now()->format('Y')}}</div>
                        <div class="col-md-6 text-md-right small">
                            <a href="javascript:void(0);">Privacy Policy</a>
                            &#xB7;
                            <a href="javascript:void(0);">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="//code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    </script>
    <script src="{{asset('th/sbap/js/scripts.js?v='.uniqid())}}"></script>

    <script src="{{ asset('th/common/common.lib.js?v='.uniqid()) }}"></script>
</body>

</html>
