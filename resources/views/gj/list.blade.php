<html xmlns="http://www.w3.org/1999/xhtml"><head id="j_idt2">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <html xmlns="http://www.w3.org/1999/xhtml"><head id="j_idt2"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link type="text/css" rel="stylesheet" href="{{asset('gj/Checkpost _135_8_files/theme.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('gj/Checkpost _135_8_files/layout.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('gj/Checkpost _135_8_files/font-awesome.min.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('gj/Checkpost _135_8_files/grid-css.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('gj/Checkpost _135_8_files/components.css')}}">
        <script type="text/javascript" src="{{asset('gj/Checkpost _135_8_files/jquery.js.download')}}"></script>
        <script type="text/javascript" src="{{asset('gj/Checkpost _135_8_files/jquery-plugins.js.download')}}"></script>
        <script type="text/javascript" src="{{asset('gj/Checkpost _135_8_files/core.js.download')}}"></script>
        <script type="text/javascript" src="{{asset('gj/Checkpost _135_8_files/components.js.download')}}"></script>
        <script type="text/javascript" src="{{asset('gj/Checkpost _135_8_files/jsf.js.download')}}"></script>
        <script type="text/javascript">if(window.PrimeFaces){PrimeFaces.settings.locale='en_US';PrimeFaces.settings.projectStage='Development';}</script>
        <link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
        <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
    <title>Checkpost ~135~8</title>
    </head><body>
    <script>
    function myFunction() {
    var x = document.getElementById("VehicleType").value;
    if(x == "GOODS VEHICLE"){
    document.getElementById("demo").innerHTML = "Gross Vehicle Weight(In Kg.) ";
    }else{
    document.getElementById("demo").innerHTML = "Seating Capacity(Exc Driver) ";
    }
    }

    function clickfunction2(){
    var d = document.getElementById("vehicleno").value
    if(d != "")
    {
    document.location = "booking.php?vehicleno="+d;
    }else{
    alert("Please enter vehicle number");
    }
    }
    </script>
    <form id="master_Layout_form" name="master_Layout_form" method="post" action="booking.php" enctype="application/x-www-form-urlencoded" onSubmit="return validateform();">
    <div class="container-fluid topbar-menu">
    <div class="mar-bot">
    <div>
    <div class="row">
    <div class="col-md-6 left-position">
    <div class="marquee marquee-top mar-common-f">
    <div>
    <span>Please pay tax in advance to avoid any last minute hassle.</span>
    </div>
    </div>
    </div>
    <div class="col-md-5 right-position top-pad-top">
    </div>
    </div>
    </div>
    </div>
    </div>


    <nav class="navbar navbar-default navigation-background hide-header" role="navigation">
    <div class="ui-grid ui-grid-responsive">
    <div class="ui-grid-row">
    <div class="ui-grid-col-2 left_logo">
    <a class="top-space inline-section"><img id="j_idt12" src="{{asset('gj/Checkpost _135_8_files/checkpost-logo.png')}}" alt="Check Post Logo">
    </a>
    </div>
    <div class="ui-grid-col-8">
    <div class="heading_w center-position top-space"><img id="j_idt14" src="{{asset('gj/Checkpost _135_8_files/emblem-logo.png')}}" class="emblem-logo" alt="State Emblem of India">
    <div class="font-bold text-welcome-heading welcome-heading-size text-uppercase">ministry of road transport and highways</div>
    <div class="font-bold text-welcome-heading welcome-sub-heading-size">Government of India</div>
    </div>
    </div>
    <div class="ui-grid-col-2 right_logo">
    <a class="top-space inline-section"><img id="j_idt16" src="{{asset('gj/Checkpost _135_8_files/e-vahan-logo.png')}}" alt="e-Vahan Logo">
    </a>
    </div>
    </div>
    </div>
    </nav>
    <nav class=" navbar-default navigation-background" role="navigation">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    </div>
    <div class="collapse navbar-collapse navigation-background-nav" id="navbar">
        <ul class="nav navbar-nav">
            <li><a href="{{route('user.booking.gj')}}" title=""> <span class="glyphicon glyphicon-home"></span> Home </a>
            </li>
            <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown" rendered=""><span class="glyphicon glyphicon-user"></span> Payment<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href=""><span class="glyphicon glyphicon-arrow-right"></span> Tax Payment</a>
            </li>
            <li><a href=""><span class="glyphicon glyphicon-arrow-right"></span> Check Pending Transaction</a>
            </li>
            <li><a href=""><span class="glyphicon glyphicon-arrow-right"></span> Reverify Failed Transaction </a>
            </li>
            </ul>
            </li>
            <li class="dropdown">
            <a href="{{route('user.apply.list.gj')}}" class="dropdown-toggle" data-toggle="dropdown" rendered=""><span class="glyphicon glyphicon-print"></span> Reports<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="{{route('user.apply.list.gj')}}"><span class="glyphicon glyphicon-arrow-right"></span> Print Payment Receipt</a>
            </li>
            <li><a href=""><span class="glyphicon glyphicon-arrow-right"></span> Check Receipt Details</a>
            </li>
            </ul>
            </li>
            <li>
                <a href="{{route('select-state')}}"><span class="glyphicon glyphicon-arrow-right"></span> Change state</a>
            </li>
            <li>
                <a href="{{route('all-booking')}}"><span class="glyphicon glyphicon-print"></span> All Booking</a>
            </li>
            <li>
                <a href="{{route('user.logout.gj')}}"><span class="glyphicon glyphicon-arrow-right"></span> Logout</a>
            </li>
            </ul>
    </div>
    </nav>
    <div class="main_news_w">
    <div class="news_w">
    <div data-direction="left" class="marquee-with-options">
    <marquee scrollamount="2" onMouseOver="this.stop();" onMouseOut="this.start();" direction="left" behavior="alternate">
    Verify the validity of the receipt by sending sms <font color="#ff83dc">VAHAN &lt;STATE CODE&gt; CP &lt;VEHICLE NO&gt; </font> to 7738299899 (e.g. <font color="#ff83dc">VAHAN XX CP XXXXXXXXXX</font>)
    </marquee>
    </div>
    </div>
    </div>
    <div>
    <div class="container-fluid">
    <table id="structure">
    <tr>
    <td id="page">

    <table style="margin:20px 10px;" cellpadding="5" cellspacing="5">
        <tr style="background-color:#ccc;border-bottom:1px solid #ccc;">
            <th colspan="9" style="text-align: right">Total Amount</th>
        <th style="text-align: left">{{$total_amunt}}</th>

        </tr>
    <tr style="background-color:#ccc;border-bottom:1px solid #ccc;">
    <td>Receipt No</td>
    <td>Regis. No</td>
    <td>Name</td>
    <td>Vehicle Category</td>
    <td>State</td>
    <td>Tax Period</td>
    <td>Tax From Date</td>
    <td>Tax To Date</td>
    <td>Mobile No.</td>
    <td>Total Amount</td>
    </tr>

    @if ($applyrecp != null)
        @foreach ($applyrecp as $rec)
        <tr>
            <td style="padding: 10px;">
                <a target="_blank"
                    href="{{ route('user.Recpt.print.gj',['rec'=>$rec->receipt_no]) }}">{{$rec->receipt_no_gen}}</a>
                    {{-- <a target="_blank"
                        href="{{$rec->universal_link}}">p2</a> --}}
            </td>
            {{-- <td style="padding: 10px;">{{$rec->VehicleType}}</td> --}}
            <td style="padding: 10px;">{{$rec->vehicleno}}</td>
            <td style="padding: 10px;">{{$rec->ownername}}</td>
            <td style="padding: 10px;">{{$rec->VehicleType}}</td>
            <td style="padding: 10px;">{{$rec->from_state}}</td>
            <td style="padding: 10px;">{{$rec->TaxMode}}</td>
            <td style="padding: 10px;">{{$rec->tax_from}}</td>
            <td style="padding: 10px;">{{$rec->tax_upto}}</td>
            <td style="padding: 10px;">{{$rec->mobile}}</td>
            {{-- <td style="padding: 10px;">{{$rec->service_amount}}</td> --}}
            <td style="padding: 10px;">{{$rec->total_tax_amount + $rec->return_amont}}</td>
        </tr>
        @endforeach
        @endif
    </table>
    </td>
    </tr>
    </table>
    </div>
    </div>
    </form>
    </body></html>






















