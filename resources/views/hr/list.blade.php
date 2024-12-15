


<!DOCTYPE html>
<!-- saved from url=(0092)https://vahan.parivahan.gov.in/checkpost/faces/public/payment/TaxCollectionMainOnline.xhtml# -->
<html xmlns="http://www.w3.org/1999/xhtml"><head id="j_idt2">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link type="text/css" rel="stylesheet" href="{{asset('hr/Checkpost _135_8_files/theme.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('hr/Checkpost _135_8_files/layout.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('hr/Checkpost _135_8_files/font-awesome.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('hr/Checkpost _135_8_files/grid-css.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('hr/Checkpost _135_8_files/components.css')}}">
    <script type="text/javascript" src="{{asset('hr/Checkpost _135_8_files/jquery.js.download')}}"></script>
    <script type="text/javascript" src="{{asset('hr/Checkpost _135_8_files/jquery-plugins.js.download')}}"></script>
    <script type="text/javascript" src="{{asset('hr/Checkpost _135_8_files/core.js.download')}}"></script>
    <script type="text/javascript" src="{{asset('hr/Checkpost _135_8_files/components.js.download')}}"></script>
    <script type="text/javascript" src="{{asset('hr/Checkpost _135_8_files/jsf.js.download')}}"></script>
    <script type="text/javascript">if(window.PrimeFaces){PrimeFaces.settings.locale='en_US';PrimeFaces.settings.projectStage='Development';}</script>
        <title>Checkpost ~135~8</title>
        <link rel="stylesheet" type="text/css" href="{{asset('hr/datetimepic/jquery.datetimepicker.css')}}"/>

        </head><body onLoad="changeHashOnLoad();">
<form id="master_Layout_form" name="master_Layout_form" method="post" action="booking.php" autocomplete="off" enctype="application/x-www-form-urlencoded" onSubmit="return validateform();" >

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

                        </div>
                    </div>
                </div>
            </div>


            <nav class="navbar navbar-default navigation-background hide-header" role="navigation">
                <div class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-2 left_logo">
                            <a class="top-space inline-section"><img id="j_idt12" src="{{asset('hr/Checkpost _135_8_files/checkpost-logo.png')}}" alt="Check Post Logo">
                            </a>
                        </div>
                        <div class="ui-grid-col-8">
                            <div class="heading_w center-position top-space"><img id="j_idt14" src="{{asset('hr/Checkpost _135_8_files/emblem-logo.png')}}" class="emblem-logo" alt="State Emblem of India">
                                <div class="font-bold text-welcome-heading welcome-heading-size text-uppercase">ministry of road transport and highways</div>
                                <div class="font-bold text-welcome-heading welcome-sub-heading-size">Government of India</div>
                            </div>
                        </div>
                        <div class="ui-grid-col-2 right_logo">
                            <a class="top-space inline-section"><img id="j_idt16" src="{{asset('hr/Checkpost _135_8_files/e-vahan-logo.png')}}" alt="e-Vahan Logo">
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
            <nav class="navbar-nav" role="navigation" style="background:#2c5ca2;padding: 5px; 30px; color:#ffffff;" >
                <a href="{{route('user.booking.hr')}}" style="color:#ffffff">Home</a> | <a href="{{route('user.apply.list.hr')}}" style="color:#ffffff">List</a> | <a
                    style="color:#FFFFFF; padding:5px;" href="{{route('select-state')}}">Change State</a> |  <a
                    style="color:#FFFFFF; padding:5px;" href="{{route('all-booking')}}">All Booking</a>   | <a href="{{route('user.logout.hr')}}" style="color:#ffffff">Logout</a>

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
            <tr style="background-color:#ccc;border-bottom:1px solid #ccc;">
                <th colspan="9" style="text-align: right">Total Amount</th>
            <th style="text-align: left">{{$total_amunt}}</th>

            </tr>
	<tr>

		<td id="page">
        		<table  style="margin:20px 10px;" cellpadding="5" cellspacing="5">
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
                    href="{{ route('user.Recpt.print.hr',['rec'=>$rec->receipt_no]) }}">{{$rec->receipt_no_gen}}</a>
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
            <td style="padding: 10px;">{{$rec->total_tax_amount}}</td>
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
