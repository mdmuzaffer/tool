<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js?v='.uniqid()) }}" no-defer></script>
    <script src="{{ asset('js/app.admin.common.js?v='.uniqid()) }}" defer></script>

    <script src="{{ url('th/common/bootstrap-confirm-button.src.js?v='.uniqid()) }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css?v='.uniqid()) }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                    {{-- {{ config('app.name', 'ABC') }} --}} RO CARE
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dist.login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('admin.register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <!-- oo -->

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->first_name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('dist.logout') }}">
                                    {{ __('Logout') }}
                                </a>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <style>
        .areas_list .action_buttons {
            /* font-size: 1.6em; */
        }

        .areas_list_each_area {
            list-style: none;

        }

        .areas_list {
            list-style: none;

        }

        a.action_buttons {
            font-size: 2.2em;
            padding: 0px 6px;
        }

        .nav-link.active {
            font-weight: 600;
            background-color: rgba(204, 204, 204, 0.38);
        }
    </style>
    <script src="{{ url('th/common/common.lib.js') }}"></script>
    @yield('footer_end')
    @yield('css')
    @yield('script')
</body>

</html>
