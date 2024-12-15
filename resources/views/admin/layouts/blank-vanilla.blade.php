<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- ============================================================== -->
    <script src="//res.cloudinary.com/cblpay/raw/upload/webres/apl/assets/plugins/jquery/jquery.min.js"></script>

    {{-- <!-- Bootstrap popper Core JavaScript -->
    <script src="//res.cloudinary.com/cblpay/raw/upload/webres/apl/assets/plugins/twbs4/js/popper.min.js"></script>
    <script src="//res.cloudinary.com/cblpay/raw/upload/webres/apl/assets/plugins/twbs4/js/bootstrap.bundle.min.js">
    </script> --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js?v='.uniqid()) }}" no-defer></script>
    {{-- <script>
        (function ($) {
        $.fn.size =function () {
            // return 0;
            try {
               return $(this).val().length;
            } catch (error) {
                return 0;
            }
        }
    })(jQuery);
    </script> --}}
    <script src="{{ asset('js/app.admin.common.js?v='.uniqid()) }}" defer></script>

    <script src="{{ url('th/common/bootstrap-confirm-button.src.js?v='.uniqid()) }}"></script>
    <!--Chart.js-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
    <script src="{{ url('th/common/chart-js.util.js?v='.uniqid()) }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css?v='.uniqid()) }}" rel="stylesheet">
    {{-- <link href="//res.cloudinary.com/cblpay/raw/upload/webres/apl/assets/plugins/twbs4/css/bootstrap.css"
        rel="stylesheet" /> --}}

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <!-- -->
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet">
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
    </script> --}}
    <!--bsdp-->
    <link href="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bsdp/css/bootstrap-datepicker.css" rel="stylesheet" />
    <script src="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bsdp/js/bootstrap-datepicker.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                    {{ config('app.name') }}
                </a>
                <small class="small">[Admin Panel]</small>
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
                            <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('admin.register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link {{ Nav::isRoute('admin.customer.get')}}"
                                href="{{ route('admin.customer.get') }}">{{ __('Customer')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Nav::isRoute('admin.admin-staff.get')}}"
                                href="{{ route('admin.admin-staff.get') }}">{{ __('Staffs')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Nav::isRoute('admin.areas.get')}}"
                                href="{{ route('admin.areas.get') }}">{{ __('Area')}}</a>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link {{ Nav::isRoute('admin.packages.get')}}"
                        href="{{ route('admin.packages.get') }}">{{ __('Packages')}}</a>
                        </li> --}}
                        <li
                            class="nav-item dropdown  {{ Nav::isRoute('admin.packages.get')}}  {{ Nav::isRoute('admin.customer.auto-renewals.get') }}   ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Packages <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                                <a class="nav-link {{ Nav::isRoute('admin.packages.get')}} "
                                    href="{{ route('admin.packages.get') }}">{{ __('Packages')}}</a>
                                <a class="nav-link {{ Nav::isRoute('admin.customer.auto-renewals.get') }} "
                                    href="{{ route('admin.customer.auto-renewals.get') }}">{{ __('Package Renewals') }}</a>

                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Nav::isRoute('admin.staff-area.get')}}"
                                href="{{ route('admin.staff-area.get') }}">{{ __('Staff-Area')}}</a>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link {{ Nav::isRoute('admin.payment.get')}}"
                        href="{{ route('admin.payment.get') }}">{{ __('Payments')}}</a>
                        </li> --}}

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                More <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                                <a class="nav-link {{ Nav::isRoute('admin.payment.get') }} "
                                    href="{{ route('admin.payment.get') }}">{{ __('Payment') }}</a>


                                <a href="{{ route('admin.expense.get') }}"
                                    class="nav-link {{ Nav::isRoute('admin.expense.get') }}">{{ __('Expense') }}</a>
                                <a href="{{ route('admin.comission.get') }}"
                                    class="nav-link {{ Nav::isRoute('admin.comission.get') }}">{{ __('Comission') }}</a>
                                <a href="{{ route('admin.report.get') }}"
                                    class="nav-link {{ Nav::isRoute('admin.report.get') }}">{{ __('Report') }}</a>
                            </div>
                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>Expense <span class="caret"></span></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                            </div>
                        </li> --}}

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>Settings</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="nav-link {{ Nav::isRoute('admin.paymentmode.get') }} "
                                    href="{{ route('admin.paymentmode.get') }}">{{ __('Payment Modes') }}</a>

                                <a class="nav-link {{ Nav::isRoute('admin.paymenthead.get') }} "
                                    href="{{ route('admin.paymenthead.get') }}">{{ __('Payment Heads') }}</a>
                                <a class="nav-link {{Nav::isRoute('admin.expensehead.get')}}"
                                    href="{{route('admin.expensehead.get')}}">{{__('Expense Heads')}}</a>
                                <a class="nav-link {{ NAV::isRoute('admin.billingaccount.get')}}"
                                    href="{{Route('admin.billingaccount.get')}}">{{__('Billing Accounts')}}</a>
                                <a class="nav-link {{ NAV::isRoute('admin.ipbillapisett.get')}}"
                                    href="{{Route('admin.ipbillapisett.get')}}">{{__('Ip Bill Api Setting')}}</a>

                                <a class="nav-link {{ NAV::isRoute('admin.ipbillpackage.get')}}"
                                    href="{{Route('admin.ipbillpackage.get')}}">{{__('IP Bill Package')}}</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->first_name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.logout') }}">
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
            <div class="container-fluid">
                <div class="mx-5 px-5" id="alert-place">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <strong>Success!!</strong> {{session('success')}}
                        <button class="close"data-dismiss="alert"><span>&times;</span></button>
                    </div>
                    @endif

                    @if ($errors->any())
                    <ul class="alert alert-danger  alert-dismissible">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        @foreach ($errors->all() as $msg)
                        <li>{{$msg}}</li>
                        @endforeach
                    </ul>
                    @endif

                </div>
            </div>
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
    <script>
        (function($){
            $.fn.alert = function(msg,type,RenderHtml){

                type = type=="fail"?"danger":"success";
                msgTitle = type=="danger"?"Oops!!":"Success!!";
                if(!RenderHtml){
                    msg = $("<span>").text(msg).html();
                }
                var defaults={
                "place":"#alert-place"
                };
                $(this).each(function () {
                    $(this).append(`
                    <div class="alert alert-${type}  alert-dismissible"">
                        <strong>${msgTitle}</strong> ${msg}
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                    </div>
                    `).find(".alert")[0].scrollIntoView();
                });
            }
            $.fn.alert.defaults={
                "place":"#alert-place"
            };
            $.alert = function (msg,type,RenderHtml) {
                $($.fn.alert.defaults.place).alert.apply(
                    $($.fn.alert.defaults.place),
                    Array.from(arguments)
                );
            }
        })(jQuery);

    </script>
    <script src="{{ url('th/common/common.lib.js') }}"></script>
    @yield('footer_end')
    @yield('css')
    @yield('script')
</body>

</html>
