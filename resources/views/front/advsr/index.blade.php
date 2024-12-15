{{-- @extends('customer.layouts.blank-vanilla') --}}
@extends('front.advsr.layouts.blank')
@section('title')
Home
@endsection
@section('content')
{{-- @dump($errors) --}}
@if (isset($homeSliders) && $homeSliders->count() > 0)

<section id="mainslider_1" class="slider_wrap slider_fullwide slider_engine_revo slider_alias_homepage1">

    <div id="rev_slider_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container">
        <div id="rev_slider_1" class="rev_slider fullwidthabanner">
            <ul>
                @foreach ($homeSliders as $item)
                <!-- SLIDE  -->
                <li data-transition="random" data-slotamount="7" data-masterspeed="650" data-saveperformance="off">
                    <!-- MAIN IMAGE -->
                    <img src="{{ $item->image }}" alt="home1_slide1" data-bgposition="center top" data-bgfit="cover"
                        data-bgrepeat="no-repeat">
                    <!-- LAYERS -->
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption adviserbigblack tp-fade tp-resizeme" data-x="47" data-y="115"
                        data-speed="850" data-start="700" data-easing="Power3.easeInOut" data-splitin="none"
                        data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-end="7500"
                        data-endspeed="1000">
                        {{ $item->title }}
                    </div>

                </li>
                @endforeach

            </ul>
        </div>
    </div>

</section>

@endif
<div class="page_content_wrap">

    <section class="grey_section">
        <div class="container">
            <div class="row">
                <div class="content_wrap">
                    <h2 class="sc_title sc_align_center aligncenter fig_border">We Provide Best Services</h2>
                    <div class="sc_under_title sc_section aligncenter column-3_5"
                        data-animation="animated fadeInUp normal">
                        There are lots of reasons why people need advice from a financial adviser but there are also
                        lots of different types of adviser, so it pays to know who to go to and when
                    </div>
                    <div class="columns_wrap sc_columns" data-animation="animated fadeInUp normal">
                        @foreach ($servicesChunked as $row)
                        <div class="row">
                            @foreach ($row as $svc)
                            <div class="column-1_4 sc_column_item">
                                <div class="sc_column_item_inner">
                                    <div class="sc_section">
                                        <img src="{{ $svc->logo }}"
                                            style="width: 50%; height: 90px; margin-left: 44px; object-fit: contain;">
                                        {{-- <span class="sc_icon style_2 icon-calculator sc_icon_shape_none sc_icon_bg_custom"></span> --}}
                                        <h5 class="sc_title sc_align_left">{{ $svc->title }}</h5>
                                        <p>{{ $svc->short_description }}</p>
                                        <a href="{{$svc->url}}"
                                            class="sc_button button-hover sc_button_square sc_button_style_clear sc_button_bg_link sc_button_size_mini  sc_button_iconed inherit"
                                            data-text="Learn more">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                    <div class="columns_wrap sc_columns" style="display:none;"
                        data-animation="animated fadeInUp normal">
                        <div class="row">
                            <div class="column-1_4 sc_column_item">
                                <div class="sc_column_item_inner">
                                    <div class="sc_section">
                                        <img src="{{ asset('th/advsr/images/tax.jpg?v=' . uniqid()) }}"
                                            style="width: 50%; height: 90px; margin-left: 44px;">
                                        {{-- <span class="sc_icon style_2 icon-calculator sc_icon_shape_none sc_icon_bg_custom"></span> --}}
                                        <h5 class="sc_title sc_align_left">Tax Service</h5>
                                        <p>We will work through the process to identify your needs, goals and strategy,
                                            and put your plan into action</p>
                                        <a href="#"
                                            class="sc_button button-hover sc_button_square sc_button_style_clear sc_button_bg_link sc_button_size_mini  sc_button_iconed inherit"
                                            data-text="Learn more">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="column-1_4 sc_column_item">
                                <div class="sc_column_item_inner">
                                    <div class="sc_section">
                                        <img src="{{ asset('th/advsr/images/empbenefit.png?v=' . uniqid()) }}"
                                            style="width: 50%; height: 90px; margin-left: 44px;">
                                        {{-- <span class="sc_icon style_2 icon-moneybag sc_icon_shape_none sc_icon_bg_custom"></span> --}}
                                        <h5 class="sc_title sc_align_left">Employees Benefit</h5>
                                        <p>We’ll give you independent advice and help you search over thousands of
                                            mortgages to find the right deal for you</p>
                                        <a href="#"
                                            class="sc_button button-hover sc_button_square sc_button_style_clear sc_button_bg_link sc_button_size_mini  sc_button_iconed inherit"
                                            data-text="Learn more">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="column-1_4 sc_column_item">
                                <div class="sc_column_item_inner">
                                    <div class="sc_section">
                                        <img alt="India - Government Of India Ministry Of Micro, Small And Medium Enterprises Small Business Industry PNG"
                                            class="ptmb" src="{{ asset('th/advsr/images/msme.png?v=' . uniqid()) }}"
                                            style="width: 50%; height: 53px; margin-left: 44px; margin-top: 38px;">
                                        {{-- <span class="sc_icon style_2 icon-moneypig sc_icon_shape_none sc_icon_bg_custom"></span> --}}
                                        <h5 class="sc_title sc_align_left">M S M E</h5>
                                        <p>Our professionals will provide you with independent and custom-tailored
                                            investment analysis and advice</p>
                                        <a href="#"
                                            class="sc_button button-hover sc_button_square sc_button_style_clear sc_button_bg_link sc_button_size_mini  sc_button_iconed inherit"
                                            data-text="Learn more">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="column-1_4 sc_column_item sc_column_item_4">
                                <div class="sc_column_item_inner">
                                    <div class="sc_section">
                                        <img alt="Accounting and Taxation" class="n3VNCb"
                                            src="{{ asset('th/advsr/images/accounting.png?v=' . uniqid()) }}"
                                            style="width: 50%; height: 90px; margin-left: 44px;">
                                        {{-- <span class="sc_icon style_2 icon-gold2 sc_icon_shape_none sc_icon_bg_custom"></span> --}}
                                        <h5 class="sc_title sc_align_left">Accounting Service</h5>
                                        <p>We will be happy to give you information and guidance on occupational or
                                            private pension arrangement</p>
                                        <a href="#"
                                            class="sc_button button-hover sc_button_square sc_button_style_clear sc_button_bg_link sc_button_size_mini  sc_button_iconed inherit"
                                            data-text="Learn more">Learn more</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column-1_4 sc_column_item" style="margin-top: 20px;">
                                <div class="sc_column_item_inner">
                                    <div class="sc_section">
                                        <img src="{{ asset('th/advsr/images/startups.png?v=' . uniqid()) }}"
                                            style="width: 50%; height: 90px; margin-left: 44px;">
                                        {{-- <span class="sc_icon style_2 icon-calculator sc_icon_shape_none sc_icon_bg_custom"></span> --}}
                                        <h5 class="sc_title sc_align_left">Start a Business</h5>
                                        <p>We will work through the process to identify your needs, goals and strategy,
                                            and put your plan into action</p>
                                        <a href="#"
                                            class="sc_button button-hover sc_button_square sc_button_style_clear sc_button_bg_link sc_button_size_mini  sc_button_iconed inherit"
                                            data-text="Learn more">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="column-1_4 sc_column_item" style="margin-top: 20px;">
                                <div class="sc_column_item_inner">
                                    <div class="sc_section">
                                        <img src="{{ asset('th/advsr/images/govtreg.png?v=' . uniqid()) }}"
                                            style="width: 50%; height: 90px; margin-left: 44px;">
                                        {{-- <span class="sc_icon style_2 icon-moneybag sc_icon_shape_none sc_icon_bg_custom"></span> --}}
                                        <h5 class="sc_title sc_align_left">Govt. Registration</h5>
                                        <p>We’ll give you independent advice and help you search over thousands of
                                            mortgages to find the right deal for you</p>
                                        <a href="#"
                                            class="sc_button button-hover sc_button_square sc_button_style_clear sc_button_bg_link sc_button_size_mini  sc_button_iconed inherit"
                                            data-text="Learn more">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="column-1_4 sc_column_item" style="margin-top: 20px;">
                                <div class="sc_column_item_inner">
                                    <div class="sc_section">
                                        <img alt="" class="ptmb"
                                            src="{{ asset('th/advsr/images/ngo.jpg?v=' . uniqid()) }}"
                                            style="width: 50%; height: 90px; margin-left: 44px;">
                                        {{-- <span class="sc_icon style_2 icon-moneypig sc_icon_shape_none sc_icon_bg_custom"></span> --}}
                                        <h5 class="sc_title sc_align_left">NGO Registration</h5>
                                        <p>Our professionals will provide you with independent and custom-tailored
                                            investment analysis and advice</p>
                                        <a href="#"
                                            class="sc_button button-hover sc_button_square sc_button_style_clear sc_button_bg_link sc_button_size_mini  sc_button_iconed inherit"
                                            data-text="Learn more">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="column-1_4 sc_column_item sc_column_item_4" style="margin-top: 20px;">
                                <div class="sc_column_item_inner">
                                    <div class="sc_section">
                                        <img alt="Accounting and Taxation" class="n3VNCb"
                                            src="{{ asset('th/advsr/images/fundadvice.png?v=' . uniqid()) }}"
                                            style="width: 50%; height: 90px; margin-left: 44px;">
                                        {{-- <span class="sc_icon style_2 icon-gold2 sc_icon_shape_none sc_icon_bg_custom"></span> --}}
                                        <h5 class="sc_title sc_align_left">Fundingn Advisory</h5>
                                        <p>We will be happy to give you information and guidance on occupational or
                                            private pension arrangement</p>
                                        <a href="#"
                                            class="sc_button button-hover sc_button_square sc_button_style_clear sc_button_bg_link sc_button_size_mini  sc_button_iconed inherit"
                                            data-text="Learn more">Learn more</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column-1_4 sc_column_item" style="margin-top: 20px;">
                                <div class="sc_column_item_inner">
                                    <div class="sc_section">
                                        <img src="{{ asset('th/advsr/images/annualcom.png?v=' . uniqid()) }}"
                                            style="width: 50%; height: 90px; margin-left: 44px;">
                                        {{-- <span class="sc_icon style_2 icon-calculator sc_icon_shape_none sc_icon_bg_custom"></span> --}}
                                        <h5 class="sc_title sc_align_left">Annual Comliance</h5>
                                        <p>We will work through the process to identify your needs, goals and strategy,
                                            and put your plan into action</p>
                                        <a href="#"
                                            class="sc_button button-hover sc_button_square sc_button_style_clear sc_button_bg_link sc_button_size_mini  sc_button_iconed inherit"
                                            data-text="Learn more">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="column-1_4 sc_column_item" style="margin-top: 20px;">
                                    <div class="sc_column_item_inner">
                                        <div class="sc_section">
                                            <img src="https://cdn0.iconfinder.com/data/icons/business-management-and-growth-13/64/655-128.png" style="width: 50%; height: 50%; margin-left: 44px;">
                                            {{-- <span class="sc_icon style_2 icon-moneybag sc_icon_shape_none sc_icon_bg_custom"></span> --}}
                            {{-- <h5 class="sc_title sc_align_left">Updation Of Company</h5>
                                            <p>We’ll give you independent advice and help you search over thousands of mortgages to find the right deal for you</p>
                                            <a href="#" class="sc_button button-hover sc_button_square sc_button_style_clear sc_button_bg_link sc_button_size_mini  sc_button_iconed inherit" data-text="Learn more">Learn more</a>
                                        </div>
                                    </div>
                                </div>  --}}
                            <div class="column-1_4 sc_column_item" style="margin-top: 20px;">
                                <div class="sc_column_item_inner">
                                    <div class="sc_section">
                                        <img alt="India - Government Of India Ministry Of Micro, Small And Medium Enterprises Small Business Industry PNG"
                                            class="ptmb"
                                            src="https://img.favpng.com/8/0/20/government-of-india-ministry-of-micro-small-and-medium-enterprises-small-business-industry-png-favpng-gPRwm4NLRzK5UdBYY5VsaMZ67_t.jpg"
                                            style="width: 50%; height: 50%; margin-left: 44px;">
                                        {{-- <span class="sc_icon style_2 icon-moneypig sc_icon_shape_none sc_icon_bg_custom"></span> --}}
                                        <h5 class="sc_title sc_align_left">Conversion</h5>
                                        <p>Our professionals will provide you with independent and custom-tailored
                                            investment analysis and advice</p>
                                        <a href="#"
                                            class="sc_button button-hover sc_button_square sc_button_style_clear sc_button_bg_link sc_button_size_mini  sc_button_iconed inherit"
                                            data-text="Learn more">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="column-1_4 sc_column_item sc_column_item_4" style="margin-top: 20px;">
                                <div class="sc_column_item_inner">
                                    <div class="sc_section">
                                        <img alt="Accounting and Taxation" class="n3VNCb"
                                            src="{{ asset('th/advsr/images/ligaldocument.png?v=' . uniqid()) }}"
                                            style="width: 50%; height: 90px; margin-left: 44px;">
                                        {{-- <span class="sc_icon style_2 icon-gold2 sc_icon_shape_none sc_icon_bg_custom"></span> --}}
                                        <h5 class="sc_title sc_align_left">Legal Documents</h5>
                                        <p>We will be happy to give you information and guidance on occupational or
                                            private pension arrangement</p>
                                        <a href="#"
                                            class="sc_button button-hover sc_button_square sc_button_style_clear sc_button_bg_link sc_button_size_mini  sc_button_iconed inherit"
                                            data-text="Learn more">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="column-1_4 sc_column_item" style="margin-top: 20px;">
                                    <div class="sc_column_item_inner">
                                        <div class="sc_section">
                                            <img src="https://lh3.googleusercontent.com/proxy/M5-U6HcTupQC0buv2JDjDQXSnge9SMKYr0HwppGWyMUX63xxRgCkiSrSFfk82l_Z8U90-QzK_klOlaNXcuNhP4zntQkt_18idb2rF52opNxP38QzN4dj-4LljZG8AFt0QTOvN_ZQZX8" style="width: 50%; height: 50%; margin-left: 44px;">
                                            {{-- <span class="sc_icon style_2 icon-calculator sc_icon_shape_none sc_icon_bg_custom"></span> --}}
                            {{-- <h5 class="sc_title sc_align_left">Other Services</h5>
                                            <p>We will work through the process to identify your needs, goals and strategy, and put your plan into action</p>
                                            <a href="#" class="sc_button button-hover sc_button_square sc_button_style_clear sc_button_bg_link sc_button_size_mini  sc_button_iconed inherit" data-text="Learn more">Learn more</a>
                                        </div>
                                    </div>
                                </div>  --}}
                            <div class="column-1_4 sc_column_item" style="margin-top: 20px;">
                                <div class="sc_column_item_inner">
                                    <div class="sc_section">
                                        <img src="{{ asset('th/advsr/images/businesspln.png?v=' . uniqid()) }}"
                                            style="width: 50%; height: 90px; margin-left: 44px;">
                                        {{-- <span class="sc_icon style_2 icon-moneybag sc_icon_shape_none sc_icon_bg_custom"></span> --}}
                                        <h5 class="sc_title sc_align_left">Business Planning</h5>
                                        <p>We’ll give you independent advice and help you search over thousands of
                                            mortgages to find the right deal for you</p>
                                        <a href="#"
                                            class="sc_button button-hover sc_button_square sc_button_style_clear sc_button_bg_link sc_button_size_mini  sc_button_iconed inherit"
                                            data-text="Learn more">Learn more</a>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>

                </div>
            </div>

        </div>
    </section>

    {{-- <section class="no_padding custom_columns">
        <div class="container">
            <div class="row">
                <div class="column-1_3 blue_section">
                    <div class="sc_section bg_tint_dark fixed_height_1">
                        <div class="sc_section_container">
                            <h2 class="sc_title sc_align_left fig_border_white margin_bottom_small"
                                data-animation="animated fadeInUp normal">Some Interesting Facts About Us</h2>
                            <div class="sc_section" data-animation="animated fadeInUp normal">We deliver only premium
                                quality comprehensive financial services to our clients. This is one of the highest
                                priorities of our company.</div>
                        </div>
                    </div>
                </div>
                <div class="column-2_3 no_padding bg_section_2">
                    <div class="sc_section bg_tint_dark fixed_height_1">
                        <div class="sc_section_overlay">
                            <div class="sc_section_container">
                                <div class="columns_wrap sc_columns padding text-center"
                                    data-animation="animated fadeInUp normal">
                                    <div class="column-1_3 sc_column_item">
                                        <figure class="sc_image margin_bottom_mini sc_image_shape_square">
                                            <div>
                                                <img src="images/round-pig.png" alt="" />
                                            </div>
                                            <figcaption>
                                                <span class="inherit"></span>
                                            </figcaption>
                                        </figure>
                                        <div class="sc_skills sc_skills_counter" data-type="counter"
                                            data-subtitle="Skills">
                                            <div class="sc_skills_item sc_skills_style_1">
                                                <div class="sc_skills_count">
                                                </div>
                                                <div class="sc_skills_total" data-start="0" data-stop="4325"
                                                    data-step="43" data-max="4325" data-speed="38" data-duration="3822"
                                                    data-ed="">0</div>
                                                <div class="sc_skills_info">
                                                    <div class="sc_skills_label">Successful Deals</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column-1_3 sc_column_item">
                                        <figure class="sc_image margin_bottom_mini sc_image_shape_square">
                                            <div>
                                                <img src="{{ asset('images/wallet.png')}}" alt="" />
</div>
<figcaption>
    <span class="inherit"></span>
</figcaption>
</figure>
<div class="sc_skills sc_skills_counter" data-type="counter" data-subtitle="Skills">
    <div class="sc_skills_item sc_skills_style_1">
        <div class="sc_skills_count">
        </div>
        <div class="sc_skills_total" data-start="0" data-stop="986" data-step="10" data-max="1000" data-speed="20"
            data-duration="1972" data-ed="">0</div>
        <div class="sc_skills_info">
            <div class="sc_skills_label">Advisors</div>
        </div>
    </div>
</div>
</div>
<div class="column-1_3 sc_column_item">
    <figure class="sc_image margin_bottom_mini sc_image_shape_square">
        <div>
            <img src="{{ asset('images/gold-bag.png')}}" alt="" />
        </div>
        <figcaption>
            <span class="inherit"></span>
        </figcaption>
    </figure>
    <div id="sc_skills_diagram_2107737207" class="sc_skills sc_skills_counter" data-type="counter"
        data-subtitle="Skills">
        <div class="sc_skills_item sc_skills_style_1">
            <div class="sc_skills_count">
            </div>
            <div class="sc_skills_total" data-start="0" data-stop="5012" data-step="60" data-max="6000" data-speed="10"
                data-duration="835" data-ed="">0</div>
            <div class="sc_skills_info">
                <div class="sc_skills_label">Happy Clients</div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<section class="calculator_section bg_section_1">
    <div class="container">
        <div class="row">
            <div class="content_wrap">
                <h2 class="sc_title sc_align_left fig_border" data-animation="animated fadeInUp normal">Lease
                    Calculator</h2>
                <div class="columns_wrap sc_columns" data-animation="animated fadeInUp normal">
                    <div class="column-1_2 sc_column_item">
                        <form name="cp_calculatedfieldsf_pform_1" id="cp_calculatedfieldsf_pform_1" action="#"
                            method="post">
                            <input type="hidden" name="form_structure_1" id="form_structure_1"
                                value="[[{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname1&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:0,&quot;ftype&quot;:&quot;fdiv&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;fields&quot;:[&quot;fieldname2&quot;,&quot;fieldname3&quot;],&quot;columns&quot;:&quot;2&quot;,&quot;title&quot;:&quot;div&quot;,&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname16&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:1,&quot;ftype&quot;:&quot;fCommentArea&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;title&quot;:&quot;Results based in the data entered above:&quot;,&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname3&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:2,&quot;ftype&quot;:&quot;fdiv&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;fields&quot;:[&quot;fieldname14&quot;,&quot;fieldname15&quot;],&quot;columns&quot;:1,&quot;title&quot;:&quot;div&quot;,&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname2&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:3,&quot;ftype&quot;:&quot;fdiv&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;fields&quot;:[&quot;fieldname12&quot;,&quot;fieldname13&quot;],&quot;columns&quot;:1,&quot;title&quot;:&quot;div&quot;,&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname9&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:4,&quot;ftype&quot;:&quot;fdiv&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;testik&quot;,&quot;fields&quot;:[&quot;fieldname17&quot;,&quot;fieldname19&quot;],&quot;columns&quot;:&quot;2&quot;,&quot;title&quot;:&quot;div&quot;,&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname19&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:5,&quot;ftype&quot;:&quot;ffieldset&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;interest-amount&quot;,&quot;fields&quot;:[&quot;fieldname23&quot;],&quot;columns&quot;:1,&quot;title&quot;:&quot;&quot;,&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname17&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:6,&quot;ftype&quot;:&quot;ffieldset&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;fields&quot;:[&quot;fieldname22&quot;,&quot;fieldname21&quot;],&quot;columns&quot;:1,&quot;title&quot;:&quot;&quot;,&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname21&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:7,&quot;ftype&quot;:&quot;fCalculated&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;title&quot;:&quot;&lt;h5&gt;Total Payment&lt;/h5&gt;&quot;,&quot;predefined&quot;:&quot;&quot;,&quot;required&quot;:false,&quot;size&quot;:&quot;medium&quot;,&quot;toolbar&quot;:&quot;default|mathematical&quot;,&quot;eq&quot;:&quot;prec(fieldname22*fieldname15,2)&quot;,&quot;optimizeEq&quot;:true,&quot;eq_factored&quot;:&quot;&quot;,&quot;suffix&quot;:&quot;&quot;,&quot;prefix&quot;:&quot;&quot;,&quot;decimalsymbol&quot;:&quot;.&quot;,&quot;groupingsymbol&quot;:&quot;,&quot;,&quot;dependencies&quot;:[{&quot;rule&quot;:&quot;&quot;,&quot;complex&quot;:false,&quot;fields&quot;:[&quot;&quot;]}],&quot;readonly&quot;:true,&quot;hidefield&quot;:false,&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname23&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:8,&quot;ftype&quot;:&quot;fCalculated&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;title&quot;:&quot;&lt;h5&gt;Interest Amount&lt;/h5&gt;&quot;,&quot;predefined&quot;:&quot;&quot;,&quot;required&quot;:false,&quot;size&quot;:&quot;medium&quot;,&quot;toolbar&quot;:&quot;default|mathematical&quot;,&quot;eq&quot;:&quot;prec(fieldname14+fieldname21-fieldname12,2)&quot;,&quot;optimizeEq&quot;:true,&quot;eq_factored&quot;:&quot;&quot;,&quot;suffix&quot;:&quot;&quot;,&quot;prefix&quot;:&quot;&quot;,&quot;decimalsymbol&quot;:&quot;.&quot;,&quot;groupingsymbol&quot;:&quot;,&quot;,&quot;dependencies&quot;:[{&quot;rule&quot;:&quot;&quot;,&quot;complex&quot;:false,&quot;fields&quot;:[&quot;&quot;]}],&quot;readonly&quot;:true,&quot;hidefield&quot;:false,&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname22&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:9,&quot;ftype&quot;:&quot;fCalculated&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;title&quot;:&quot;&lt;h5&gt;Monthly Payment&lt;/h5&gt;&quot;,&quot;predefined&quot;:&quot;&quot;,&quot;required&quot;:false,&quot;size&quot;:&quot;medium&quot;,&quot;toolbar&quot;:&quot;default|mathematical&quot;,&quot;eq&quot;:&quot;prec((fieldname12*fieldname13/1200*pow(1+fieldname13/1200,fieldname15)-fieldname14*fieldname13/1200)/(pow(1+fieldname13/1200,fieldname15)-1),2)&quot;,&quot;optimizeEq&quot;:true,&quot;eq_factored&quot;:&quot;&quot;,&quot;suffix&quot;:&quot;&quot;,&quot;prefix&quot;:&quot;&quot;,&quot;decimalsymbol&quot;:&quot;.&quot;,&quot;groupingsymbol&quot;:&quot;,&quot;,&quot;dependencies&quot;:[{&quot;rule&quot;:&quot;&quot;,&quot;complex&quot;:false,&quot;fields&quot;:[&quot;&quot;]}],&quot;readonly&quot;:true,&quot;hidefield&quot;:false,&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname12&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:10,&quot;ftype&quot;:&quot;ftextarea&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;title&quot;:&quot;&lt;h5&gt;Loan Amount&lt;/h5&gt;&quot;,&quot;predefined&quot;:&quot;20000&quot;,&quot;predefinedClick&quot;:false,&quot;required&quot;:false,&quot;size&quot;:&quot;medium&quot;,&quot;minlength&quot;:&quot;0&quot;,&quot;maxlength&quot;:&quot;17&quot;,&quot;rows&quot;:&quot;1&quot;,&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname13&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:11,&quot;ftype&quot;:&quot;ftextarea&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;title&quot;:&quot;&lt;h5&gt;Interest Rate %&lt;/h5&gt;&quot;,&quot;predefined&quot;:&quot;7.5&quot;,&quot;predefinedClick&quot;:false,&quot;required&quot;:false,&quot;size&quot;:&quot;medium&quot;,&quot;minlength&quot;:&quot;0&quot;,&quot;maxlength&quot;:&quot;5&quot;,&quot;rows&quot;:&quot;1&quot;,&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname14&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:12,&quot;ftype&quot;:&quot;ftextarea&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;title&quot;:&quot;&lt;h5&gt;Residual Value&lt;/h5&gt;&quot;,&quot;predefined&quot;:&quot;10000&quot;,&quot;predefinedClick&quot;:false,&quot;required&quot;:false,&quot;size&quot;:&quot;medium&quot;,&quot;minlength&quot;:&quot;0&quot;,&quot;maxlength&quot;:&quot;17&quot;,&quot;rows&quot;:&quot;1&quot;,&quot;fBuild&quot;:{}},{&quot;form_identifier&quot;:&quot;&quot;,&quot;name&quot;:&quot;fieldname15&quot;,&quot;shortlabel&quot;:&quot;&quot;,&quot;index&quot;:13,&quot;ftype&quot;:&quot;ftextarea&quot;,&quot;userhelp&quot;:&quot;&quot;,&quot;userhelpTooltip&quot;:false,&quot;csslayout&quot;:&quot;&quot;,&quot;title&quot;:&quot;&lt;h5&gt;Number of Months&lt;/h5&gt;&quot;,&quot;predefined&quot;:&quot;36&quot;,&quot;predefinedClick&quot;:false,&quot;required&quot;:false,&quot;size&quot;:&quot;medium&quot;,&quot;minlength&quot;:&quot;0&quot;,&quot;maxlength&quot;:&quot;3&quot;,&quot;rows&quot;:&quot;1&quot;,&quot;fBuild&quot;:{}}],[{&quot;title&quot;:&quot;&quot;,&quot;description&quot;:&quot;&quot;,&quot;formlayout&quot;:&quot;top_aligned&quot;,&quot;formtemplate&quot;:&quot;&quot;,&quot;evalequations&quot;:1,&quot;autocomplete&quot;:1}]]" />
                            <div id="fbuilder">
                                <div id="fbuilder_1">
                                    <div id="formheader_1"> </div>
                                    <div id="fieldlist_1"> </div>
                                </div>
                            </div>
                            <div class="clearer"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="with_isotope">
    <div class="container">
        <div class="row">
            <div class="content_wrap" data-animation="animated fadeInUp normal">
                <div class="sc_section aligncenter">TIPS, NEWS AND VIDEOS</div>
                <h2 class="sc_title sc_align_center aligncenter content_wrap margin_bottom_middle fig_border">Your
                    Money Advice Blog</h2>
                <div class="sc_blogger layout_classic_3 template_masonry sc_blogger_horizontal">
                    <div class="isotope_wrap" data-columns="3">
                        <div class="isotope_item isotope_item_classic isotope_item_classic_3 isotope_column_3">
                            <div class="post_featured">
                                <div class="post_thumb"
                                    data-image="{{ asset('th/advsr/images/Depositphotos_36647991_original.jpg') }}"
                                    data-title="Ten Facts You Might Not Know About Stamp Duty">
                                    <a class="hover_icon_link" href="#">
                                        <img alt="Ten Facts You Might Not Know About Stamp Duty"
                                            src="{{ asset('images/Depositphotos_36647991_original-365x240.jpg' )}}">
                                        <div class="img-hover">
                                            <span class="hover_icon"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="post_content isotope_item_content">
                                <h4 class="post_title">Ten Facts You Might Not Know About Stamp Duty</h4>
                                <div class="post_info">
                                    <span class="post_info_item post_info_posted">
                                        <a href="#" class="post_info_date">April 28, 2015</a>
                                    </span>
                                </div>
                                <div class="post_descr">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                        veniam...</p>
                                    <a href="#"
                                        class="sc_button button-hover sc_button_square sc_button_style_clear sc_button_bg_link sc_button_size_small"
                                        data-text="Learn more">Learn more</a>
                                </div>
                            </div>
                        </div>
                        <div class="isotope_item isotope_item_classic isotope_item_classic_3 isotope_column_3">
                            <div class="post_featured">
                                <div class="post_thumb" data-image="images/Depositphotos_52751897_original.jpg"
                                    data-title="Muni Bonds, Taxable Bonds or CDs: Which is Best?">
                                    <a class="hover_icon_link" href="#">
                                        <img alt="Muni Bonds, Taxable Bonds or CDs: Which is Best?"
                                            src="{{ asset('th/advsr/images/Depositphotos_52751897_original-365x240.jpg') }}">
                                        <div class="img-hover">
                                            <span class="hover_icon"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="post_content isotope_item_content">
                                <h4 class="post_title">Muni Bonds, Taxable Bonds or CDs: Which is Best?</h4>
                                <div class="post_info">
                                    <span class="post_info_item post_info_posted">
                                        <a href="#" class="post_info_date">April 28, 2015</a>
                                    </span>
                                </div>
                                <div class="post_descr">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                        veniam...</p>
                                    <a href="#"
                                        class="sc_button button-hover sc_button_square sc_button_style_clear sc_button_bg_link sc_button_size_small"
                                        data-text="Learn more">Learn more</a>
                                </div>
                            </div>
                        </div>
                        <div class="isotope_item isotope_item_classic isotope_item_classic_3 isotope_column_3">
                            <div class="post_featured">
                                <div class="post_thumb" data-image="images/Depositphotos_24652881_original.jpg"
                                    data-title="The Five Top Financial Advisor Credentials">
                                    <a class="hover_icon_link" href="#">
                                        <img alt="The Five Top Financial Advisor Credentials"
                                            src="{{ asset('th/advsr/images/Depositphotos_24652881_original-365x240.jpg' ) }}">
                                        <div class="img-hover">
                                            <span class="hover_icon"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="post_content isotope_item_content">
                                <h4 class="post_title">The Five Top Financial Advisor Credentials</h4>
                                <div class="post_info">
                                    <span class="post_info_item post_info_posted">
                                        <a href="#" class="post_info_date">April 28, 2015</a>
                                    </span>
                                </div>
                                <div class="post_descr">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                        veniam...</p>
                                    <a href="#"
                                        class="sc_button button-hover sc_button_square sc_button_style_clear sc_button_bg_link sc_button_size_small"
                                        data-text="Learn more">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blue_section">
    <div class="container">
        <div class="bg_tint_dark aligncenter">
            <div class="sc_section_overlay">
                <div class="content_wrap">
                    <h2 class="sc_title sc_align_center" data-animation="animated fadeInUp normal">Keep Yourself
                        Posted</h2>
                    <div class="aligncenter column-2_5" data-animation="animated fadeInUp normal">
                        <h6 class="sc_title">Sign up to receive featured articles from finance experts, products
                            updates, and more from Adviser</h6>
                    </div>
                    <div class="aligncenter margin_top_middle">
                        <div class="sc_emailer aligncenter sc_emailer_opened">
                            <form class="sc_emailer_form icon-mail-1">
                                <input type="text" class="sc_emailer_input" name="email" value=""
                                    placeholder="Your Email Address" />
                                <a href="#" class="sc_emailer_button" title="Submit"
                                    data-group="E-mailer subscription">Join Us Today</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

</div>






@endsection
