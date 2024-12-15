<nav role="navigation" class="menu_main_nav_area">
    <ul id="menu_main" class="menu_main_nav">

        <li class="menu-item">
            <a title="Home" href="/">Home</a>
        </li>
        <li class="menu-item current-menu-item- current-menu-ancestor current-menu-parent- menu-item-has-children">
            <a title="Services" href="javascript:void(0);">Services</a>
            <ul class="sub-menu">
                @foreach ($services as $svc)
                <li class="menu-item current-menu-item">
                    <a href="{{$svc->url}}">{{$svc->title}}</a>
                </li>
                @endforeach
            </ul>
        </li>
        @foreach ($pages1 as $item)

        <li class="menu-item">
            <a title="{{$item->title}}" href="{{$item->url}}">{{$item->title}}</a>
        </li>
        @endforeach
        @if ($pages2->count() > 0)
        <li class="menu-item current-menu-item- current-menu-ancestor current-menu-parent- menu-item-has-children">
            <a title="More" href="javascript:void(0);">More</a>
            <ul class="sub-menu">
                @foreach ($pages2 as $item)

                <li class="menu-item current-menu-item">
                    <a title="{{$item->title}}" href="{{$item->url}}">{{$item->title}}</a>
                </li>
                @endforeach
            </ul>
        </li>

        @endif
    </ul>
</nav>


{{-- <nav role="navigation" class="menu_main_nav_area">
    <ul id="menu_main" class="menu_main_nav">
        <li class="menu-item current-menu-item current-menu-ancestor current-menu-parent menu-item-has-children">
            <a title="Home" href="index-2.html">Home</a>
            <ul class="sub-menu">
                <li class="menu-item current-menu-item">
                    <a href="index-2.html">Homepage Default</a>
                </li>
                <li class="menu-item">
                    <a href="index2.html">Homepage Optional</a>
                </li>
            </ul>
        </li>
        <li class="menu-item menu-item-has-children">
            <a title="Features" href="#">Features</a>
            <ul class="sub-menu">
                <li class="menu-item">
                    <a title="Shortcodes" href="features-shortcodes.html">Shortcodes</a>
                </li>
                <li class="menu-item">
                    <a title="Typography" href="features-typography.html">Typography</a>
                </li>
            </ul>
        </li>
        <li class="menu-item menu-item-has-children">
            <a title="Pages" href="#">Pages</a>
            <ul class="sub-menu">
                <li class="menu-item">
                    <a title="About Us" href="pages-we-are-hiring.html">We Are Hiring</a>
                </li>
                <li class="menu-item">
                    <a href="pages-our-staff.html">Our Staff</a>
                </li>
                <li class="menu-item">
                    <a href="pages-about-us.html">About Us</a>
                </li>
                <li class="menu-item">
                    <a title="Price table" href="pages-price-table.html">Price table</a>
                </li>
                <li class="menu-item">
                    <a title="404" href="pages-404.html">404</a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a title="Our Services" href="our-services.html">Our Services</a>
        </li>
        <li class="menu-item menu-item-has-children">
            <a title="Our Blog" href="blog-our-blog.html">Our Blog</a>
            <ul class="sub-menu">
                <li class="menu-item">
                    <a href="blog-with-sidebar.html">With Sidebar</a>
                </li>
                <li class="menu-item">
                    <a href="blog-without-sidebar.html">Without sidebar</a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a title="Contact Us" href="contact-us.html">Contact Us</a>
        </li>
        <li class="advisor_black menu-item">
            <a title="Find Advisor" href="find-advisor.html">Find Advisor</a>
        </li>
    </ul>
</nav> --}}
