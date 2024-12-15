<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link type="text/css" rel="stylesheet" href="{{asset('mh/Checkpost_135_8_files/theme.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('mh/Checkpost_135_8_files/layout.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('mh/Checkpost_135_8_files/grid-css.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('mh/Checkpost_135_8_files/primefaces.css')}}">
    <script type="text/javascript" src="{{asset('mh/Checkpost_135_8_files/jquery.js.download')}}"></script>
    <script type="text/javascript" src="{{asset('mh/Checkpost_135_8_files/jquery-plugins.js.download')}}"></script>
    <script type="text/javascript" src="{{asset('mh/Checkpost_135_8_files/primefaces.js.download')}}"></script>
    <script type="text/javascript" src="{{asset('mh/Checkpost_135_8_files/jsf.js.download')}}"></script>
    <title>Checkpost~135~8</title>
    <link rel="icon" href="https://vahan.parivahan.gov.in/vahan-icon.png" sizes="16x16" type="image/png">
    <script type="text/javascript" src="{{asset('mh/Checkpost_135_8_files/bootstrap.js.download')}}"></script>
    <script type="text/javascript" src="{{asset('mh/Checkpost_135_8_files/commonvalidation.js.download')}}"></script>
    <link rel="icon" href="https://vahan.parivahan.gov.in/images/vahan-icon.png" sizes="16x16" type="image/png"></head>
    <body style="">
    <div>
    <!-- &lt;ui:include src="/headerBeforeLogin.xhtml"/&gt;-->
    <!-- from header before login.xhtml start -->
    <nav class="navbar navbar-default navigation-background" role="navigation">
    <div class="ui-grid ui-grid-responsive">
    <div class="ui-grid-row">
    <div class="ui-grid-col-2 left_logo">
    <a style="display: inline-block;" class="top-space"><img id="j_idt11" src="{{asset('mh/Checkpost_135_8_files/logo_e-vahan.png')}}" alt="Parivahan Sewa" style="width: auto;">
    </a>
    </div>
    <div class="ui-grid-col-8">
    <div class="heading_w center-position top-space">
    <div class="font-bold text-welcome-heading welcome-heading-size text-uppercase">ministry of road transport and highways</div>
    <div class="font-bold text-welcome-heading welcome-sub-heading-size">Government of India</div>
    </div>
    </div>
    <div class="ui-grid-col-2">
    <div class="right_head_w">
    <div>
    <div style="float: right;vertical-align: top;"></div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </nav>
    <div class="navbar-collapse navigation-background-nav collapse in" id="navbar" aria-expanded="true" style="padding: 10px;">
        <a href="{{route('user.booking.mh')}}" style="color:#FFFFFF; padding:5px;">Home</a> | <a style="color:#FFFFFF; padding:5px;" href="{{route('user.apply.list.mh')}}">Print Vehicle receipt</a> | <a style="color:#FFFFFF; padding:5px;" href="{{route('select-state')}}">Change State</a> | <a style="color:#FFFFFF; padding:5px;" href="{{route('all-booking')}}">All Booking</a>  | <a style="color:#FFFFFF; padding:5px;" href="{{route('user.logout.mh')}}">Logout</a>
    </div>
    <div class="main_news_w">
    <div class="news_w">
    <div style="color: #FFFFFF;font-weight: bold;font-size: 13pt;">
    <marquee scrollamount="2" behavior="alternate" scrolldelay="1" onMouseOver="this.stop();" onMouseOut="this.start();" direction="left">Please pay tax in advance to avoid any last minute hassle.</marquee>
    </div>
    </div>
    </div>
    <!-- from header before login.xhtml end -->
    </div>
    <div>
    <table id="structure">
    <tr>
    <td id="page">
    <table style="margin:20px 10px;" >
        <tr style="background-color:#ccc;border-bottom:1px solid #ccc;">
            <td colspan="9" style="text-align: right">Total Amount</th>
        <th style="text-align: left">{{$total_amunt}}</th>

        </tr>
    <tr style="background-color:#ccc;border-bottom:1px solid #ccc;">
    <td style="padding: 10px;">Receipt No</td>
    <td style="padding: 10px;">Vehicle Category</td>
    <td style="padding: 10px;">Regis. No</td>
    <td style="padding: 10px;">Name</td>
    <td style="padding: 10px;">State</td>
    <td style="padding: 10px;">Tax Period</td>
    <td style="padding: 10px;">Tax From Date</td>
    <td style="padding: 10px;">Tax To Date</td>
    <td style="padding: 10px;">Mobile No.</td>
    <td style="padding: 10px;">Tax Amount</td>
    </tr>

    @if ($applyrecp != null)
        @foreach ($applyrecp as $rec)
        <tr>
            <td style="padding: 10px;">
                <a target="_blank"
                    href="{{ route('user.Recpt.print.mh',['rec'=>$rec->receipt_no]) }}">{{$rec->receipt_no_gen}}</a>
                    {{-- <a target="_blank"
                        href="{{$rec->universal_link}}">p2</a> --}}
            </td>
            <td style="padding: 10px;">{{$rec->VehicleType}}</td>
            <td style="padding: 10px;">{{$rec->vehicleno}}</td>
            <td style="padding: 10px;">{{$rec->ownername}}</td>

            <td style="padding: 10px;">{{$rec->from_state}}</td>
            <td style="padding: 10px;">{{$rec->TaxMode}}</td>
            <td style="padding: 10px;">{{$rec->tax_from}}</td>
            <td style="padding: 10px;">{{$rec->tax_upto}}</td>
            <td style="padding: 10px;">{{$rec->mobile}}</td>
            {{-- <td style="padding: 10px;">{{$rec->service_amount}}</td> --}}
            <td style="padding: 10px;">{{$rec->total_tax_amount}}</td>
        </tr>
        @endforeach
        @endif


    </table>
    </td>
    </tr>
    </table>
    </div>
    </body></html>

