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
        @hasSection ('title') @yield('title') | @endif
        {{config('app.name')}}
        @hasSection ('title-after') | @yield('title-after')@endif
    </title>
    <link href="{{asset('th/sbap/css/styles.css?v='.uniqid())}}" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{asset('th/sbap/assets/img/favicon.png')}}" />
    <script data-search-pseudo-elements defer src="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js">
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    @include('common.scrpts.head.c1')

</head>

<body>
    <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
        <a class="navbar-brand d-none d-sm-block" href="{{route('admin.dashboard')}}">Admin Panel</a><button
            class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i
                data-feather="menu"></i></button>
        <form class="form-inline mr-auto d-none d-lg-block"><input class="form-control form-control-solid mr-sm-2"
                type="search" placeholder="Search" aria-label="Search" /></form>
        <ul class="navbar-nav align-items-center ml-auto">
            <!--
                <li class="nav-item dropdown no-caret mr-3">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownDocs" href="javascript:void(0);" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="d-inline d-md-none font-weight-500">Docs</div>
                        <div class="d-none d-md-inline font-weight-500">Documentation</div>
                        <i class="fas fa-chevron-right dropdown-arrow"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right py-0 o-hidden mr-n15 mr-lg-0 animated--fade-in-up"
                        aria-labelledby="navbarDropdownDocs">
                        <a class="dropdown-item py-3" href="//docs.startbootstrap.com/sb-admin-pro.html" target="_blank">
                            <div class="icon-stack bg-primary-soft text-primary mr-4"><i data-feather="book"></i></div>
                            <div>
                                <div class="small text-gray-500">Documentation</div>
                                Usage instructions and reference
                            </div>
                        </a>
                        <div class="dropdown-divider m-0"></div>
                        <a class="dropdown-item py-3" href="//docs.startbootstrap.com/sb-admin-pro/components.html"
                            target="_blank">
                            <div class="icon-stack bg-primary-soft text-primary mr-4"><i data-feather="code"></i></div>
                            <div>
                                <div class="small text-gray-500">Components</div>
                                Code snippets and reference
                            </div>
                        </a>
                        <div class="dropdown-divider m-0"></div>
                        <a class="dropdown-item py-3" href="//docs.startbootstrap.com/sb-admin-pro/changelog.html"
                            target="_blank">
                            <div class="icon-stack bg-primary-soft text-primary mr-4"><i data-feather="file-text"></i></div>
                            <div>
                                <div class="small text-gray-500">Changelog</div>
                                Updates and changes
                            </div>
                        </a>
                    </div>
                </li>
            -->
            <!--
                <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts"
                        href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i data-feather="bell"></i></a>
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                        aria-labelledby="navbarDropdownAlerts">
                        <h6 class="dropdown-header dropdown-notifications-header"><i class="mr-2"
                                data-feather="bell"></i>Alerts Center</h6>
                        <a class="dropdown-item dropdown-notifications-item" href="javascript:void(0);">
                            <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="activity"></i></div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 29, 2019</div>
                                <div class="dropdown-notifications-item-content-text">This is an alert message. It&apos;s
                                    nothing serious, but it requires your attention.</div>
                            </div>
                        </a>
                        <a class="dropdown-item dropdown-notifications-item" href="javascript:void(0);">
                            <div class="dropdown-notifications-item-icon bg-info"><i data-feather="bar-chart"></i></div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 22, 2019</div>
                                <div class="dropdown-notifications-item-content-text">A new monthly report is ready. Click
                                    here to view!</div>
                            </div>
                        </a>
                        <a class="dropdown-item dropdown-notifications-item" href="javascript:void(0);">
                            <div class="dropdown-notifications-item-icon bg-danger"><i
                                    class="fas fa-exclamation-triangle"></i></div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 8, 2019</div>
                                <div class="dropdown-notifications-item-content-text">Critical system failure, systems
                                    shutting down.</div>
                            </div>
                        </a>
                        <a class="dropdown-item dropdown-notifications-item" href="javascript:void(0);">
                            <div class="dropdown-notifications-item-icon bg-success"><i data-feather="user-plus"></i></div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 2, 2019</div>
                                <div class="dropdown-notifications-item-content-text">New user request. Woody has requested
                                    access to the organization.</div>
                            </div>
                        </a>
                        <a class="dropdown-item dropdown-notifications-footer" href="javascript:void(0);">View All
                            Alerts</a>
                    </div>
                </li>
                <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages"
                        href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i data-feather="mail"></i></a>
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                        aria-labelledby="navbarDropdownMessages">
                        <h6 class="dropdown-header dropdown-notifications-header"><i class="mr-2"
                                data-feather="mail"></i>Message Center</h6>
                        <a class="dropdown-item dropdown-notifications-item" href="javascript:void(0);">
                            <img class="dropdown-notifications-item-img"
                                src="https://source.unsplash.com/vTL_qy03D1I/60x60" />
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet,
                                    consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                                <div class="dropdown-notifications-item-content-details">Emily Fowler &#xB7; 58m</div>
                            </div>
                        </a>
                        <a class="dropdown-item dropdown-notifications-item" href="javascript:void(0);">
                            <img class="dropdown-notifications-item-img"
                                src="https://source.unsplash.com/4ytMf8MgJlY/60x60" />
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet,
                                    consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                                <div class="dropdown-notifications-item-content-details">Diane Chambers &#xB7; 2d</div>
                            </div>
                        </a>
                        <a class="dropdown-item dropdown-notifications-footer" href="javascript:void(0);">Read All
                            Messages</a>
                    </div>
                </li>
            -->
            <!--
                <li class="nav-item dropdown no-caret mr-3 dropdown-user">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                        href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><img class="img-fluid"
                            src="https://source.unsplash.com/QAB-WJcbgJk/60x60" /></a>
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                        aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img class="dropdown-user-img" src="https://source.unsplash.com/QAB-WJcbgJk/60x60" />
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name">Valerie Luna</div>
                                <div class="dropdown-user-details-email">vluna@aol.com</div>
                            </div>
                        </h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0);">
                            <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                            Account
                        </a>
                        <a class="dropdown-item" href="javascript:void(0);">
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Logout
                        </a>
                    </div>
                </li>
            -->

            @if (isset($u))
            <li class="nav-item dropdown no-caret mr-3 dropdown-user">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                    href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="avatar">
                        {{-- <img class="avatar-img img-fluid" src="{{$u->dp_url}}" /> --}}
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                    aria-labelledby="navbarDropdownUserImage">
                    <h6 class="dropdown-header d-flex align-items-center">
                        <img class="dropdown-user-img" src="{{$u->dp_url}}" />
                        <div class="dropdown-user-details">
                            {{-- <div class="dropdown-user-details-name">{{$u->full_name}}</div> --}}
                            {{-- <div class="dropdown-user-details-email">{{$u->email}}</div> --}}
                        </div>
                    </h6>
                    <div class="dropdown-divider"></div>
                    {{-- <a class="dropdown-item" href="{{route('admin.edit-profile.view')}}"> --}}
                        <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                        Account
                    </a>
                    <a class="dropdown-item" href="{{route('admin.logout')}}">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                        Logout
                    </a>
                </div>
            </li>

            @else

            @endif
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('admin.layouts.includes.nav-menu')
        </div>
        <div id="layoutSidenav_content">
            <main>
                @yield('content')

            </main>
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
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            // if($.fn.dataTable){
                $('.DataTable').DataTable(window.defaultInitializeDataTable);
            // }

        })
    </script>
    <link href="//cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script>
        $('.select-date').selectpicker();
    </script>
    @yield('footer_end')
    @include('common.scrpts.foot.c1')
    @stack('styles')

    @yield('css')
    @yield('script')

    @stack('scripts')



    @if($errors->any())
    <div style="position: fixed; top: 5rem; right: 1rem;">
        <div class="toast toastMsgs" role="alert" aria-live="assertive" data-autohide='false' aria-atomic="true"
            data-delay-x="10000">
            <div class="toast-header bg-danger text-white">
                <i data-feather="alert-circle"></i>
                <strong class="mr-auto">Error!!!</strong>
                <small class="text-white-50 ml-2">just now</small>
                <button class="ml-2 mb-1 close text-white" type="button" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="toast-body">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif

    @if(session('success'))
    <div style="position: fixed; top: 5rem; right: 1rem;">
        <div class="toast toastMsgs" role="alert" aria-live="assertive" data-autohide='false' aria-atomic="true"
            data-delay-x="10000" xstyle="opacity: 1">
            <div class="toast-header bg-success text-white">
                <i data-feather="bell"></i>
                <strong class="mr-auto">Success!!!</strong>
                <small class="text-white-50 ml-2">just now</small>
                <button class="ml-2 mb-1 close text-white" type="button" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="toast-body">
                {{session('success')}}
            </div>
        </div>
    </div>
    @endif

    <script>
        $(document).ready(function () {
            $('.toastMsgs').toast('show');
        });
    </script>
</body>

</html>
