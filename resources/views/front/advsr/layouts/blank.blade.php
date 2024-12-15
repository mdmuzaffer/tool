<!DOCTYPE html>
<html lang="en-US">


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico" />

    <title>
        @hasSection ('title') @yield('title') | @endif
        {{config('app.name')}}
        @hasSection ('title-after') | @yield('title-after')@endif
    </title>

    <meta name='robots' content='noindex,follow' />
    <link rel='stylesheet' id='rs-plugin-settings-css'
        href="{{ asset('th/advsr/js/vendor/revslider/rs-plugin/css/settings.css?v=' . uniqid()) }}" type='text/css'
        media='all' />
    <link rel='stylesheet' href="{{ asset('th/advsr/css/fontello/css/fontello.css?v=' . uniqid()) }}" type='text/css'
        media='all' />
    <link rel="stylesheet"
        href="{{ asset('th/advsr/js/vendor/calculated-fields-form/css/stylepublic.css?v=' . uniqid()) }}"
        type="text/css" />
    <link rel="stylesheet"
        href="{{ asset('th/advsr/js/vendor/calculated-fields-form/css/cupertino/jquery-ui-1.8.20.custom.css?v=' . uniqid()) }}"
        type="text/css" />
    <link rel='stylesheet' href="{{ asset('th/advsr/css/style.css?v=' . uniqid()) }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ asset('th/advsr/css/core.animation.css?v=' . uniqid()) }}" type='text/css'
        media='all' />
    <link rel='stylesheet' href="{{ asset('th/advsr/css/responsive.css?v=' . uniqid()) }}" type='text/css'
        media='all' />
    <link rel='stylesheet' href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        type='text/css' media='all' />
    <style>
        @media (max-width: 479px) {
            .body_style_boxed .page_wrap {
                width: 100%;
            }

            .slider_boxed,
            .content_wrap,
            .content_container {
                width: 280px;
            }

            .inline.bottom {
                display: inline-block;
                float: right !important;
            }

        }

        * {

            font-family: Spinnaker, serif;
        }

        .body_style_boxed .page_wrap {
            width: 100%;
        }

        .slider_boxed,
        .content_wrap,
        .content_container {
            width: 95%;
        }
    </style>
</head>

<body
    class="home page body_style_boxed fullboxed body_filled article_style_stretch top_panel_style_light top_panel_opacity_solid top_panel_show top_panel_above menu_center sidebar_hide body_bg1">
    <div class="body_wrap">
        <div class="page_wrap">
            <div class="top_panel_fixed_wrap"></div>
            <header class="top_panel_wrap bg_tint_light">

                <div class="border_bottom_grey font_086em display_none">
                    <div class="content_wrap clearfix top_div">
                        {{-- <div class="inline bottom top-panel_disclaimer">
                            Advice and guides to help improve your finances!
                        </div> --}}

                        <div class="inline bottom side-right">
                            <div class="menu_user_area menu_user_left ">
                                <a style="margin-left: 10px;" href="{{route('office.login')}}"><i
                                        class="fa fa-paper-plane" aria-hidden="true"> </i>Office Logins</a>
                            </div>
                        </div>
                        <div class="inline bottom side-right">
                            <div class="menu_user_area menu_user_left "><a style="margin-left: 10px;"
                                    href="{{route('customer.login')}}"><i class="fa fa-paper-plane" aria-hidden="true">
                                    </i> User Login</a>
                            </div>
                        </div>
                        <div class="inline bottom side-right">
                            <div class="menu_user_area menu_user_left "><a style="margin-left: 10px;"><i
                                        class="fa fa-paper-plane" aria-hidden="true"></i> GST Filing</a>
                            </div>
                        </div>
                        <div class="inline bottom side-right">
                            <div class="menu_user_area menu_user_left "><a style="margin-left: 10px;"><i
                                        class="fa fa-paper-plane" aria-hidden="true"></i> Business Tax</a></div>
                        </div>
                        <div class="inline bottom side-right">
                            <div class="menu_user_area menu_user_left "><a style="margin-left: 10px;"><i
                                        class="fa fa-paper-plane" aria-hidden="true"></i> Personal Tax</a></div>
                        </div>
                        <div class="inline bottom side-right">
                            <div class="menu_user_area menu_user_left "><a style=" margin-left: 10px;"><i
                                        class="fa fa-paper-plane" aria-hidden="true"></i> Save & Invest</a></div>
                        </div>


                        <!--
                            <div class="inline side-right search_s">
                                <div class="search_wrap search_style_regular  inited" title="Open/close search form">
                                    <a href="#" class="search_icon icon-search-2"> </a>
                                    <div class="search_form_wrap">
                                        <form role="search" method="get" class="search_form" action="index.html">
                                            <button type="submit" class="search_submit" data-text="Search" title="Start search">Search</button>
                                            <input type="text" class="search_field" placeholder="Search" value="" name="s" title="">
                                        </form>
                                    </div>
                                    <div class="search_results widget_area bg_tint_light">
                                        <a class="search_results_close icon-delete-2"> </a>
                                        <div class="search_results_content"> </div>
                                    </div>
                                </div>
                            </div>
                        -->
                    </div>
                </div>

                <div class="menu_main_wrap with_text menu_show">

                    <div class="content_wrap clearfix display_none">

                        <div class="logo">
                            <div class="logo_img">
                                <a href="/">
                                    <img src="images/logo_light.png" class="logo_main" alt="">
                                    <img src="images/logo_dark.png" class="logo_fixed" alt="">
                                </a>
                            </div>
                            <div class="contein_logo_text">
                                <a href="/">
                                    <span class="logo_text">{{config('app.name')}}</span>
                                    {{-- <span class="logo_slogan">We help save your money</span> --}}
                                </a>
                            </div>
                        </div>
                        <div class="inline image side-right marg_top_2em top-panel_blocks">
                            <div class="inline">
                                <div class="inline-wrapper">
                                    <div class="side-right marg_null marg_top top-panel_left">
                                        <div class="icon_user-top">
                                            <i class="user_top_icon icon-telephone"></i>
                                        </div>
                                        <h4>{{current(array_get($web,'website-phones'))}}</h4>
                                        {{-- <span class="font_086em">
                                            <a href="javascript:void(0);">
                                                <span class="__cf_email__" >sumitallb6@gmail.com</span>
                                            </a>
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="inline pad_left_2em">
                                <div class="inline-wrapper">
                                    <div class="side-right marg_null marg_top top-panel_right">
                                        <div class="icon_user-top">
                                            <i class="user_top_icon icon-clock-4"> </i>
                                        </div>
                                        <h4>{{current(array_get($web,'website-emails'))}}</h4>
                                        {{-- <span class="font_086em">Sunday closed</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="menu_main_responsive_button icon-menu">Menu</a>

                    </div>

                    <div class="main-menu_wrap_bg">
                        <div class="main-menu_wrap_content">
                            @include('front.advsr.layouts.includes.nav-menu')
                        </div>
                    </div>
                </div>

            </header>
            @yield('content')

            <footer class="footer_wrap bg_tint_dark footer_style_dark widget_area">
                <div class="content_wrap">
                    <div class="columns_wrap with_padding">

                        {{-- <aside class="column-1_4 widget widget_socials">
                            <div class="widget_inner">
                                <div class="logo">
                                    <a href="index-2.html">
                                        <img src="{{ asset('th/sbap/images/logo-footer.png' )}}" alt="">
                        <span class="logo_text">Adviser</span>
                        </a>
                    </div>
                    <div class="logo_descr">Our professional and caring staff is dedicated to delivering
                        only premium quality and comprehensive financial services. This is one of the
                        highest priorities of our company.</div>
                    <div class="sc_socials sc_socials_size_small">
                        <div class="sc_socials_item">
                            <a href="#" target="_blank" class="social_icons social_tumblr icons">
                                <span class="icon-tumblr"> </span>
                                <span class="sc_socials_hover icon-tumblr"> </span>
                            </a>
                        </div>
                        <div class="sc_socials_item">
                            <a href="#" target="_blank" class="social_icons social_facebook icons">
                                <span class="icon-facebook"> </span>
                                <span class="sc_socials_hover icon-facebook"> </span>
                            </a>
                        </div>
                        <div class="sc_socials_item">
                            <a href="#" target="_blank" class="social_icons social_gplus icons">
                                <span class="icon-gplus"> </span>
                                <span class="sc_socials_hover icon-gplus"> </span>
                            </a>
                        </div>
                        <div class="sc_socials_item">
                            <a href="#" target="_blank" class="social_icons social_skype icons">
                                <span class="icon-skype"> </span>
                                <span class="sc_socials_hover icon-skype"> </span>
                            </a>
                        </div>
                    </div>
                </div>
                </aside> --}}
                {{-- <aside class="column-1_4 widget widget_text">
                            <h5 class="widget_title">Testimonals</h5>
                            <div class="textwidget">
                                <div class="testim">I am absolutely pleased and satisfied with this company’s service.
                                    It is so great to work with a financial adviser who is truly interested in their
                                    client’s needs, goals and preferences. I am really impressed with their commitment.
                                    <br>
                                    <br>
                                    <em>- Alexander Davis</em>
                                    <br>
                                    <br>
                                    <a href="#">View All Testimonials</a>
                                </div>
                            </div>
                        </aside> --}}
                <aside class="column-1_4 widget widget_text">
                    <h5 class="widget_title">Contact Info</h5>
                    <div class="textwidget">
                        <ul class="sc_list  sc_list_style_iconed">
                            <li class="sc_list_item">
                                <span class="sc_list_icon icon-home-1"> </span>
                                @php
                                $addr = (object)array_get($web,'website-address');
                                $phones = array_get($web,'website-phones');
                                $emails = array_get($web,'website-emails');

                                @endphp
                                @if (!empty($addr->line1))
                                {{$addr->line1}}<br>
                                @endif
                                @if (!empty($addr->line2))
                                {{$addr->line2}}<br>
                                @endif
                                @if (!empty($addr->line3))
                                {{$addr->line3}}<br>
                                @endif
                                {{$addr->po}}, {{$addr->district}}
                            </li>
                            <li class="sc_list_item">
                                <span class="sc_list_icon icon-smartphone"> </span>
                                {!! join(", ", $phones)!!}
                            </li>
                            <li class="sc_list_item">
                                <span class="sc_list_icon icon-mail-2"> </span>
                                {!! join(", ", $emails)!!}
                            </li>
                            {{-- <li class="sc_list_item">
                                        <span class="sc_list_icon icon-location-1"> </span>
                                        <a class="footer_map" href="#">Map & Directions</a>
                                    </li> --}}
                        </ul>
                    </div>
                </aside>
                {{-- <aside class="column-1_4 widget widget_flickr">
                            <h5 class="widget_title">Photo Gallery</h5>
                            <div class="flickr_images">
                                <script data-cfasync="false"
                                    src="{{ asset('th/advsr/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}">
                </script>
                <script type="text/javascript"
                    src="http://www.flickr.com/badge_code_v2.gne?count=6&amp;display=random&amp;flickr_display=random&amp;size=s&amp;layout=x&amp;source=user&amp;user=49707497%40N06">
                </script>
        </div>
        </aside> --}}
    </div>
    </div>
    </footer>

    <div class="copyright_wrap bottom_cont">
        <div class="content_wrap">
            <p><a href="#">Copyright &#xA9; {{config('app.name')}} {{now()->format('Y')}}</a> All Rights
                Reserved</p>
        </div>
    </div>

    </div>
    </div>
    <div id="preloader" class="preloader">
        <div class="preloader_image"></div>
    </div>

    <a href="#" class="scroll_to_top icon-up-2" title="Scroll to top"></a>

    <div class="custom_html_section"></div>




    <script type="text/javascript" src="{{ asset('th/advsr/js/vendor/jquery-1.11.3.min.js?v=' . uniqid()) }}"></script>
    <script type="text/javascript" src="{{ asset('th/advsr/js/vendor/jquery-migrate.min.js?v=' . uniqid()) }}"></script>
    <script type="text/javascript"
        src="{{ asset('th/advsr/js/vendor/revslider/rs-plugin/js/jquery.themepunch.tools.min.js?v=' . uniqid()) }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('th/advsr/js/vendor/revslider/rs-plugin/js/jquery.themepunch.revolution.min.js?v=' . uniqid()) }}">
    </script>

    <script type="text/javascript" src="{{ asset('th/advsr/js/vendor/__packed.js?v=' . uniqid()) }}"></script>
    <script type="text/javascript" src="{{ asset('th/advsr/js/custom/_main.js?v=' . uniqid()) }}"></script>
    <script type="text/javascript" src="{{ asset('th/advsr/js/custom/core.utils.js?v=' . uniqid()) }}"></script>
    <script type="text/javascript" src="{{ asset('th/advsr/js/custom/core.init.js?v=' . uniqid()) }}"></script>
    <script type="text/javascript" src="{{ asset('th/advsr/js/custom/shortcodes.js?v=' . uniqid()) }}"></script>

    <script type="text/javascript" src="{{ asset('th/advsr/js/vendor/datepicker.min.js?v=' . uniqid()) }}"></script>
    <script type="text/javascript"
        src="{{ asset('th/advsr/js/vendor/calculated-fields-form/js/jQuery.stringify.js?v=' . uniqid()) }}"></script>
    <script type="text/javascript"
        src="{{ asset('th/advsr/js/vendor/calculated-fields-form/js/jquery.validate.js?v=' . uniqid()) }}"></script>
    <script type="text/javascript"
        src="{{ asset('th/advsr/js/vendor/calculated-fields-form/js/fbuilder.js?v=' . uniqid()) }}"></script>

</body>


</html>
