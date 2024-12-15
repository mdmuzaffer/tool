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
    document.location = "{{route('user.booking.gj')}}?vehicleno="+d;
    }else{
    alert("Please enter vehicle number");
    }
    }
    </script>
    <script>
    function validateform()
    {
    var vehicleno = document.forms["master_Layout_form"]["vehicleno"];
    var chassisno = document.forms["master_Layout_form"]["chassisno"];
    var ownername = document.forms["master_Layout_form"]["ownername"];
    var mobile = document.forms["master_Layout_form"]["mobile"];
    var from_state = document.forms["master_Layout_form"]["from_state"];
    var VehicleType = document.forms["master_Layout_form"]["VehicleType"];
    var VehicleClass = document.forms["master_Layout_form"]["VehicleClass"];
    var seating_c = document.forms["master_Layout_form"]["seating_c"];
    var ServiceType = document.forms["master_Layout_form"]["ServiceType"];
    var TaxMode = document.forms["master_Layout_form"]["TaxMode"];
    var border_entry = document.forms["master_Layout_form"]["border_entry"];
    var tax_from = document.forms["master_Layout_form"]["tax_from"];
    var tax_upto = document.forms["master_Layout_form"]["tax_upto"];
    var PermitType = document.forms["master_Layout_form"]["PermitType"];
    if (vehicleno.value == "")
    {
    window.alert("Please enter vehicle number.");
    vehicleno.focus();
    return false;
    }
    if (chassisno.value == "")
    {
    window.alert("Please enter chassis number.");
    chassisno.focus();
    return false;
    }
    if (ownername.value == "")
    {
    window.alert("Please enter owner name.");
    ownername.focus();
    return false;
    }
    if (mobile.value == "")
    {
    window.alert("Please enter mobile number.");
    mobile.focus();
    return false;
    }
    if (from_state.selectedIndex < 1)
    {
    alert("Please select state.");
    from_state.focus();
    return false;
    }
    if (VehicleType.selectedIndex < 1)
    {
    alert("Please select vehicle permit type.");
    from_state.focus();
    return false;
    }
    if (VehicleClass.selectedIndex < 1)
    {
    alert("Please select vehicle class.");
    VehicleClass.focus();
    return false;
    }
    if (seating_c.value == "")
    {
    window.alert("Please enter seating capacity.");
    seating_c.focus();
    return false;
    }
    if (TaxMode.selectedIndex < 1)
    {
    alert("Please select service type.");
    TaxMode.focus();
    return false;
    }
    if (TaxMode.selectedIndex < 1)
    {
    alert("Please select tax mode.");
    TaxMode.focus();
    return false;
    }
    if (border_entry.selectedIndex < 1)
    {
    alert("Please select entery border.");
    border_entry.focus();
    return false;
    }
    if (tax_from.value == "")
    {
    window.alert("Please enter tax from.");
    tax_from.focus();
    return false;
    }
    if (PermitType.value == "")
    {
    window.alert("Please enter Permit type.");
    PermitType.focus();
    return false;
    }
    if (tax_upto.value == "")
    {
    window.alert("Please enter tax upto.");
    tax_from.focus();
    return false;
    }
    return true;
    }
    </script>
    <!DOCTYPE html>
    <!-- saved from url=(0092)https://vahan.parivahan.gov.in/checkpost/faces/public/payment/TaxCollectionMainOnline.xhtml# -->
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
    document.location = "{{route('user.booking.gj')}}?vehicleno="+d;
    }else{
    alert("Please enter vehicle number");
    }
    }
    </script>

    <form id="master_Layout_form" name="master_Layout_form" method="post" action="{{ route('user.booking.create.gj')}}" enctype="application/x-www-form-urlencoded" onSubmit="return validateform();">
        @csrf
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
        <a href="{{route('select-state')}}"><span class="glyphicon glyphicon-arrow-right"></span> Change State</a>
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
    <div class="ui-grid ui-grid-responsive">
    <div class="ui-grid-row top-space center-position contents-Space">
    <h1 class="header-main">Vehicle Tax Payment For,<span class="red"> GUJARAT</span></h1>
    </div>
    <div class="ui-grid-row">
    <div class="ui-grid-col-12 center-position contents-Space">
    </div>
    </div>
    <div class="ui-grid-row top-space">
    <div class="ui-grid-col-1 resp-blank-height"></div>
    <div class="ui-grid-col-10"><div id="gjtaxcollection" class="ui-panel ui-widget ui-widget-content ui-corner-all bottom-space" data-widget="widget_gjtaxcollection" aria-busy="false" style="position: relative;"><div id="gjtaxcollection_header" class="ui-panel-titlebar ui-widget-header ui-helper-clearfix ui-corner-all"><span class="ui-panel-title">Tax Payment Details</span></div><div id="gjtaxcollection_content" class="ui-panel-content ui-widget-content">
    <div class="ui-grid-row">
    <div class="ui-grid-col-6">
    <label class="field-label resp-label-section"><label id="j_idt40" class="ui-outputlabel ui-widget field-label-mandate">Vehicle / Serial No.</label>
    </label><input name="vehicleno" type="text" id="vehicleno" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" value="{{$recpt->vehicleno}}" />
    </div>
    <div class="ui-grid-col-6">
    <div class="ui-grid-row">
    <div class="ui-grid-col-12 top_mar1 mar-left5"><button id="j_idt425" name="j_idt425" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onClick="clickfunction2();" title="Click to get owner and vehicle details from Vahan 4." role="button" type="button" aria-disabled="false"><span class="ui-button-icon-left ui-icon ui-c ui-icon-arrowthick-1-s"></span><span class="ui-button-text ui-c">Get Details</span></button>
    </div>
    </div>
    </div>
    </div>
    <div class="ui-grid-row">
    <div class="ui-grid-col-6">
    <label class="field-label resp-label-section"><label id="j_idt46" class="ui-outputlabel ui-widget field-label-mandate">Chassis No.</label>
    </label>
    <input name="chassisno" type="text" id="chassisno" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" value="{{$recpt->chassisno}}"/>
    </div>
    <div class="ui-grid-col-6">
    <label class="field-label resp-label-section"><label id="j_idt50" class="ui-outputlabel ui-widget field-label-mandate">Owner Name</label>
    </label>
    <input name="ownername" type="text" id="ownername" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " value="{{$recpt->ownername}}" />
    </div>
    </div>
    <div class="ui-grid-row">
    <div class="ui-grid-col-6">
    <label class="field-label resp-label-section"><label id="j_idt54" class="ui-outputlabel ui-widget field-label-mandate">Mobile No.</label>
    </label>
    <input name="mobile" type="text" id="mobile" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" value="{{$recpt->mobile}}" />
    </div>
    <div class="ui-grid-col-6">
    <label class="field-label resp-label-section"><label id="j_idt57" class="ui-outputlabel ui-widget field-label-mandate">From State</label>
    </label><div id="j_idt59" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false" aria-owns="j_idt59_items" style="min-width: 191px;"><select name="from_state" style="width:100%" id="from_state">
    <option value="" selected="selected">------------Select State------------</option>
    <option @if($recpt->from_state=='Andaman and Nicobar Islands') selected="selected"  @endif value="Andaman and Nicobar Islands"   >Andaman and Nicobar Islands</option>
                                                                <option @if($recpt->from_state=='Andhra Pradesh') selected="selected"  @endif value="Andhra Pradesh" >Andhra Pradesh</option>
                                                                <option @if($recpt->from_state=='Arunachal Pradesh') selected="selected"  @endif value="Arunachal Pradesh" >Arunachal Pradesh</option>
                                                                <option @if($recpt->from_state=='Assam') selected="selected"  @endif value="Assam" >Assam</option>
                                                                <option @if($recpt->from_state=='Bihar') selected="selected"  @endif value="Bihar" >Bihar</option>
                                                                <option @if($recpt->from_state=='Chandigarh') selected="selected"  @endif value="Chandigarh" >Chandigarh</option>
                                                                <option @if($recpt->from_state=='Chhattisgarh') selected="selected"  @endif value="Chhattisgarh" >Chhattisgarh</option>
                                                                <option @if($recpt->from_state=='Dadra and Nagar Haveli') selected="selected"  @endif value="Dadra and Nagar Haveli" >Dadra and Nagar Haveli</option>
                                                                <option @if($recpt->from_state=='Daman and Diu') selected="selected"  @endif value="Daman and Diu" >Daman and Diu</option>
                                                                <option @if($recpt->from_state=='Delhi') selected="selected"  @endif value="Delhi" >Delhi</option>
                                                                <option @if($recpt->from_state=='Goa') selected="selected"  @endif value="Goa" >Goa</option>
                                                                <option @if($recpt->from_state=='Gujarat') selected="selected"  @endif value="Gujarat" >Gujarat</option>
                                                                <option @if($recpt->from_state=='Haryana') selected="selected"  @endif  value="Haryana" >Haryana</option>
                                                                <option @if($recpt->from_state=='Himachal Pradesh') selected="selected"  @endif value="Himachal Pradesh" >Himachal Pradesh</option>
                                                                <option @if($recpt->from_state=='Jammu and Kashmir') selected="selected"  @endif value="Jammu and Kashmir" >Jammu and Kashmir</option>
                                                                <option @if($recpt->from_state=='Jharkhand') selected="selected"  @endif value="Jharkhand" >Jharkhand</option>
                                                                <option @if($recpt->from_state=='Karnataka') selected="selected"  @endif value="Karnataka" >Karnataka</option>
                                                                <option @if($recpt->from_state=='Kerala') selected="selected"  @endif value="Kerala" >Kerala</option>
                                                                <option @if($recpt->from_state=='Lakshadweep') selected="selected"  @endif value="Lakshadweep" >Lakshadweep</option>
                                                                <option @if($recpt->from_state=='Madhya Pradesh') selected="selected"  @endif value="Madhya Pradesh" >Madhya Pradesh</option>
                                                                <option @if($recpt->from_state=='Maharashtra') selected="selected"  @endif value="Maharashtra" >Maharashtra</option>
                                                                <option @if($recpt->from_state=='Manipur') selected="selected"  @endif value="Manipur" >Manipur</option>
                                                                <option @if($recpt->from_state=='Meghalaya') selected="selected"  @endif value="Meghalaya" >Meghalaya</option>
                                                                <option @if($recpt->from_state=='Mizoram') selected="selected"  @endif value="Mizoram" >Mizoram</option>
                                                                <option @if($recpt->from_state=='Nagaland') selected="selected"  @endif value="Nagaland"  >Nagaland</option>
                                                                <option @if($recpt->from_state=='Orissa') selected="selected"  @endif value="Orissa" >Orissa</option>
                                                                <option @if($recpt->from_state=='Pondicherry') selected="selected"  @endif value="Pondicherry" >Pondicherry</option>
                                                                <option @if($recpt->from_state=='Punjab') selected="selected"  @endif value="Punjab" >Punjab</option>
                                                                <option @if($recpt->from_state=='Rajasthan') selected="selected"  @endif value="Rajasthan" >Rajasthan</option>
                                                                <option @if($recpt->from_state=='Sikkim') selected="selected"  @endif value="Sikkim" >Sikkim</option>
                                                                <option @if($recpt->from_state=='Tamil Nadu') selected="selected"  @endif value="Tamil Nadu" >Tamil Nadu</option>
                                                                <option  @if($recpt->from_state=='Tripura') selected="selected"  @endif value="Tripura" >Tripura</option>
                                                                <option @if($recpt->from_state=='Uttaranchal') selected="selected"  @endif value="Uttaranchal" >Uttaranchal</option>
                                                                <option  @if($recpt->from_state=='Uttar Pradesh') selected="selected"  @endif value="Uttar Pradesh" >Uttar Pradesh</option>
                                                                <option @if($recpt->from_state=='West Bengal') selected="selected"  @endif value="West Bengal" >West Bengal</option>

    </select></div>
    </div>
    </div>
    <div class="ui-grid-row">
    <div class="ui-grid-col-3">
    <label class="field-label resp-label-section"><label id="j_idt63" class="ui-outputlabel ui-widget field-label-mandate">Vehicle Type</label>
    </label><div id="j_idt65" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false" aria-owns="j_idt65_items" style="min-width: 140px;"><select id="VehicleType" name="VehicleType" onChange="myFunction()" style="width:100%">
    <option value="" selected="selected" >-- Select Vehicle Type --</option>
    <option @if($recpt->VehicleType=='CONTRACT CARRIAGE/PASSENGER VEHICLES') selected="selected"  @endif value="CONTRACT CARRIAGE/PASSENGER VEHICLES" >CONTRACT CARRIAGE/PASSENGER VEHICLES</option>
    <option @if($recpt->VehicleType=='PRIVATE SERVICE VEHICLE') selected="selected"  @endif value="PRIVATE SERVICE VEHICLE" >PRIVATE SERVICE VEHICLE</option>
    <option @if($recpt->VehicleType=='GOODS VEHICLE') selected="selected"  @endif value="GOODS VEHICLE" >GOODS VEHICLE</option>
    <option @if($recpt->VehicleType=='STAGE CARRIAGE') selected="selected"  @endif value="STAGE CARRIAGE" >STAGE CARRIAGE</option>
    <option @if($recpt->VehicleType=='CONSTRUCTION EQUIPMENT VEHICLE') selected="selected"  @endif value="CONSTRUCTION EQUIPMENT VEHICLE" >CONSTRUCTION EQUIPMENT VEHICLE</option>
    <option @if($recpt->VehicleType=='TEMPORARY REGISTERED VEHICLE') selected="selected"  @endif value="TEMPORARY REGISTERED VEHICLE" >TEMPORARY REGISTERED VEHICLE</option>
    </select></div>
    </div>
    <div class="ui-grid-col-3">
    <label class="field-label resp-label-section"><label id="j_idt69" class="ui-outputlabel ui-widget field-label-mandate">Vehicle Class</label>
    </label><div id="vehicle_class" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all " role="combobox" aria-haspopup="true" aria-expanded="false" aria-owns="vehicle_class_items" style="min-width: 177px;"><select id="VehicleClass" name="VehicleClass" style="width:100%">
    <option value="" selected="selected">-- Select Vehicle Class --</option>
    <option  @if($recpt->VehicleClass=='MOTOR CAB') selected="selected"  @endif value="MOTOR CAB" >MOTOR CAB</option>
    <option @if($recpt->VehicleClass=='MAXI CAB') selected="selected"  @endif value="MAXI CAB" >MAXI CAB</option>
    <option @if($recpt->VehicleClass=='OMNI BUS') selected="selected"  @endif value="OMNI BUS" >OMNI BUS</option>
    <option @if($recpt->VehicleClass=='BUS') selected="selected"  @endif value="BUS" >BUS</option>
    <option @if($recpt->VehicleClass=='LIGHT GOODS VEHICLE') selected="selected"  @endif value="LIGHT GOODS VEHICLE" >LIGHT GOODS VEHICLE</option>
    <option @if($recpt->VehicleClass=='MEDIUM GOODS VEHICLE') selected="selected"  @endif value="MEDIUM GOODS VEHICLE" >MEDIUM GOODS VEHICLE</option>
    <option @if($recpt->VehicleClass=='HEAVY GOODS VEHICLE') selected="selected"  @endif value="HEAVY GOODS VEHICLE" >HEAVY GOODS VEHICLE</option>
    <option @if($recpt->VehicleClass=='OTHERS') selected="selected"  @endif value="OTHERS" >OTHERS</option>
    </select></div>
    </div><img id="j_idt74" width="30px;" alt="" src="{{asset('gj/Checkpost _135_8_files/dot_clear.gif')}}">
    <div class="ui-grid-col-6">
    <label class="field-label resp-label-section"><label id="j_idt76" class="ui-outputlabel ui-widget field-label-mandate">Service Type</label>
    </label><div id="cmb_service_type" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false" aria-owns="cmb_service_type_items" style="min-width: 174px;"><select id="ServiceType" name="ServiceType" style="width:100%">
    <option value="" selected="selected">-- Select Service Type --</option>
    <option  @if($recpt->ServiceType=='NOT APPLICABLE') selected="selected"  @endif    value="NOT APPLICABLE" >NOT APPLICABLE</option>
    <option  @if($recpt->ServiceType=='LUXURY') selected="selected"  @endif    value="LUXURY" >LUXURY</option>
    <option  @if($recpt->ServiceType=='ORDINARY') selected="selected"  @endif    value="ORDINARY" >ORDINARY</option>
    <option  @if($recpt->ServiceType=='SLEEPER') selected="selected"  @endif    value="SLEEPER" >SLEEPER</option>
    <option  @if($recpt->ServiceType=='SUPER LUZURY (SLEEPER)') selected="selected"  @endif    value="SUPER LUZURY (SLEEPER)" >SUPER LUZURY (SLEEPER)</option>
    {{-- <option  @if($recpt->ServiceType=='NOT APPLICABLE') selected="selected"  @endif    value="SUPER LUZURY (SHEATING)" >SUPER LUZURY (SLEEPER)</option> --}}
    <option  @if($recpt->ServiceType=='AIR CONDITIONED') selected="selected"  @endif    value="AIR CONDITIONED" >AIR CONDITIONED</option>
    </select></div>
    </div>
    </div>
    <div class="ui-grid-row">
    <div class="ui-grid-col-3">
    <label class="field-label resp-label-section"><label id="lbl_seat_cap" class="ui-outputlabel ui-widget field-label-mandate">Seating Cap(Ex. Driver)</label>
    </label><input name="seating_c" type="text" onKeyPress="return NumericOnly(event, &#39;&#39;);" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " id="seating_c" value="" />
    </div>
    <div class="ui-grid-col-3">
    <label class="field-label resp-label-section"><label id="lbl_sleeper_cap" class="ui-outputlabel ui-widget">Sleeper Cap</label>
    </label><input id="txt_sleeper_cap" name="txt_sleeper_cap" type="text" value="" maxlength="2" onKeyPress="return NumericOnly(event, &#39;&#39;);" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " role="textbox">
    </div>
    <div class="ui-grid-col-3">
    <label id="j_idt87" class="ui-outputlabel ui-widget field-label-mandate">Owner Type</label>
    </label><div id="owner_code" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" style="">
    <select id="ownertype" name="ownertype" style="width:100%;" >
    <option value="" selected="selected">-- Select Owner Type --</option>

    <option @if($recpt->ownername=='INDIVIDUAL') selected="selected"  @endif  value="INDIVIDUAL" >INDIVIDUAL</option>
    <option @if($recpt->ownername=='COMPNAY') selected="selected"  @endif  value="COMPNAY" >COMPNAY</option>
    </select>
    </div>
    </div>
    <div class="ui-grid-col-3">
    <label class="field-label resp-label-section"><label id="j_idt92" class="ui-outputlabel ui-widget field-label-mandate">Maker Status</label>
    </label><div id="imported_vehicle" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all">
    <select id="makerstatus" name="makerstatus" style="width:100%;" >
    <option value="" selected="selected">-- Select Owner Type --</option>
    <option @if($recpt->makerstatus=='INDIAN') selected="selected"  @endif   value="INDIAN" >INDIAN</option>
    <option @if($recpt->makerstatus=='IMPORTED') selected="selected"  @endif   value="IMPORTED" >IMPORTED</option>
    </select>
    </div>
    </div>
    </div>
    <div class="ui-grid-row">
    <div class="ui-grid-col-3">
    <label class="field-label resp-label-section"><label id="j_idt97" class="ui-outputlabel ui-widget">Permit Type</label>
    </label><div id="cmb_permit_type" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false" aria-owns="cmb_permit_type_items" style="min-width: 168px;"><select id="ptype" name="ptype" style="width:100%;" >
    <option value="" selected="selected">-- Select Permit Type --</option>
    <option @if($recpt->makerstatus=='TOURIST PERMIT') selected="selected"  @endif    value="TOURIST PERMIT" >TOURIST PERMIT</option>
    <option @if($recpt->makerstatus=='SPECIAL PERMIT') selected="selected"  @endif    value="SPECIAL PERMIT" >SPECIAL PERMIT</option>
    <option @if($recpt->makerstatus=='SINGLE RETURN TRIP PERMIT') selected="selected"  @endif    value="SINGLE RETURN TRIP PERMIT" >SINGLE RETURN TRIP PERMIT</option>
    </select></div>
    </div>
    <div class="ui-grid-col-3">
    <label class="field-label resp-label-section"><label id="j_idt102" class="ui-outputlabel ui-widget">Permit Upto</label>
    </label>
    <input id="permit_upto" name="permit_upto" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all" placeholder="DD-MM-YYYY" value="">
    <img id="j_idt106" width="30px" alt="" src="{{asset('gj/Checkpost _135_8_files/dot_clear.gif')}}"> </div>
    <div class="ui-grid-col-3">
    <label class="field-label resp-label-section"><label id="j_idt108" class="ui-outputlabel ui-widget field-label-mandate">Tax Mode</label>
    </label><div id="cmb_payment_mode" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false" aria-owns="cmb_payment_mode_items" style="min-width: 154px;"><select id="TaxMode" name="TaxMode" style="width:100%">
    <option value="" selected="selected">-- Select Tax Mode --</option>
    <option @if($recpt->TaxMode=='WEEKLY') selected="selected"  @endif  value="WEEKLY" >WEEKLY</option>
    <option @if($recpt->TaxMode=='Monthly') selected="selected"  @endif  value="Monthly" >MONTHLY</option>
    <option @if($recpt->TaxMode=='Quarterly') selected="selected"  @endif  value="Quarterly" >QUARTERLY</option>
    </select></div>
    </div>
    <div class="ui-grid-col-3">
    <label class="field-label resp-label-section"><label id="j_idt113" class="ui-outputlabel ui-widget field-label-mandate">Barrier Name</label>
    </label><div id="cmb_checkpost_name" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false" aria-owns="cmb_checkpost_name_items" style="min-width: 144px;">
    <select name="border_entry" id="border_entry">
    <option value="-1" data-escape="true">---Select Barrier---</option>
    <option @if($recpt->TaxMode=='AMBAJI') selected="selected"  @endif  value="AMBAJI" data-escape="true">AMBAJI</option>
    <option @if($recpt->TaxMode=='AMIRGADH') selected="selected"  @endif  value="AMIRGADH" data-escape="true">AMIRGADH</option>
    <option @if($recpt->TaxMode=='BHILAD') selected="selected"  @endif  value="BHILAD" data-escape="true">BHILAD</option>
    <option @if($recpt->TaxMode=='CHHOTA UDEPUR') selected="selected"  @endif  value="CHHOTA UDEPUR" data-escape="true">CHHOTA UDEPUR</option>
    <option @if($recpt->TaxMode=='DAHOD') selected="selected"  @endif  value="DAHOD" data-escape="true">DAHOD</option>
    <option @if($recpt->TaxMode=='GUNDARI') selected="selected"  @endif  value="GUNDARI" data-escape="true">GUNDARI</option>
    <option @if($recpt->TaxMode=='HAZIRA') selected="selected"  @endif  value="HAZIRA" data-escape="true">HAZIRA</option>
    <option @if($recpt->TaxMode=='JAMNAGAR') selected="selected"  @endif  value="JAMNAGAR" data-escape="true">JAMNAGAR</option>
    <option @if($recpt->TaxMode=='KAPRADA') selected="selected"  @endif  value="KAPRADA" data-escape="true">KAPRADA</option>
    <option @if($recpt->TaxMode=='SAGBARA') selected="selected"  @endif  value="SAGBARA" data-escape="true">SAGBARA</option>
    <option @if($recpt->TaxMode=='SAMKHIYALI') selected="selected"  @endif  value="SAMKHIYALI" data-escape="true">SAMKHIYALI</option>
    <option @if($recpt->TaxMode=='SHAMLAJI') selected="selected"  @endif  value="SHAMLAJI" data-escape="true">SHAMLAJI</option>
    <option @if($recpt->TaxMode=='SONGADH') selected="selected"  @endif  value="SONGADH" data-escape="true">SONGADH</option>
    <option @if($recpt->TaxMode=='THARAD(KHODA)') selected="selected"  @endif  value="THARAD(KHODA)" data-escape="true">THARAD(KHODA)</option>
    <option @if($recpt->TaxMode=='THAVAR') selected="selected"  @endif  value="THAVAR" data-escape="true">THAVAR</option>
    <option @if($recpt->TaxMode=='WAGHAI') selected="selected"  @endif  value="WAGHAI" data-escape="true">WAGHAI</option>
    <option @if($recpt->TaxMode=='ZALOD') selected="selected"  @endif  value="ZALOD" data-escape="true">ZALOD</option>
    </select></div>
    </div>
    </div>
    <div class="ui-grid-row">
    <div class="ui-grid-col-3">
    <label class="field-label resp-label-section"><label id="j_idt118" class="ui-outputlabel ui-widget">Permit No.</label>
    </label>
    <input id="permit_no" name="permit_no" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all input" value="">
    </div>
    <div class="ui-grid-col-3">
    <label class="field-label resp-label-section"><label id="j_idt122" class="ui-outputlabel ui-widget">Issuing Authority</label>
    </label><input id="permit_ia" name="permit_ia" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all input" value="">
    <img id="j_idt126" width="30px" alt="" src="{{asset('gj/Checkpost _135_8_files/dot_clear.gif')}}"> </div>
    <div class="ui-grid-col-3">
    <label class="field-label resp-label-section"><label id="j_idt128" class="ui-outputlabel ui-widget field-label-mandate">Tax From</label>

    </label>
    @php
                                $timePaid = strtoupper(now()->format('d-M-Y'));
                                @endphp
    <input id="tax_from" name="tax_from" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all " placeholder="DD-MM-YYYY" value="{{$timePaid}}">
    </div>
    <div class="ui-grid-col-3">
    <label class="field-label resp-label-section"><label id="j_idt131" class="ui-outputlabel ui-widget field-label-mandate">Tax Upto</label>
    </label>
    <input id="tax_upto" name="tax_upto" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all" placeholder="DD-MM-YYYY" >
    </div>
    </div>
    <div class="ui-grid-row">
    <div class="ui-grid-col-12">
    <br><div id="j_idt136" class="ui-datatable ui-widget"><div class="ui-datatable-tablewrapper"><table role="grid"><thead id="j_idt136_head"><tr role="row"><th id="j_idt136:j_idt137" class="ui-state-default" role="columnheader" aria-label="Sl. No." scope="col" style="width: 40px;"><span class="ui-column-title">Sl. No.</span></th><th id="j_idt136:j_idt139" class="ui-state-default" role="columnheader" aria-label="Particulars" scope="col"><span class="ui-column-title">Particulars</span></th><th id="j_idt136:j_idt141" class="ui-state-default" role="columnheader" aria-label="Tax From" scope="col"><span class="ui-column-title">Tax From</span></th><th id="j_idt136:j_idt143" class="ui-state-default" role="columnheader" aria-label="Tax Upto" scope="col"><span class="ui-column-title">Tax Upto</span></th><th id="j_idt136:j_idt145" class="ui-state-default" role="columnheader" aria-label="Amount" scope="col"><span class="ui-column-title">Amount</span></th></tr></thead><tbody id="j_idt136_data" class="ui-datatable-data ui-widget-content"><tr class="ui-widget-content ui-datatable-empty-message"><td colspan="5">No records found.</td></tr></tbody></table></div></div>
    </div>
    </div>
    <div class="ui-grid-row">
    <div class="ui-grid-col-6">
    <label class="field-label resp-label-section"><label id="j_idt148" class="ui-outputlabel ui-widget field-label-mandate">Total Amount</label>
    </label>
    <input id="total_tax_amount" name="total_tax_amount" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" role="textbox">
    </div><img id="j_idt151" width="13" alt="" src="{{asset('gj/Checkpost _135_8_files/dot_clear.gif')}}">
    <div class="ui-grid-col-6">
    <div class="ui-grid-row">
    <div class="ui-grid-col-12 top_mar1 mar-left5"><input type="button" style="padding:5px;" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" name="Calculate_Tax" id="Calculate_Tax" value="Calculate Tax">
    <input type="submit" style="padding:5px;" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" name="Pay_Tax" id="Pay_Tax" value="Pay Tax">
    <input type="reset" style="padding:5px;" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" name="Reset" id="Reset" value="Reset">
    </div>
    </div>
    </div>
    </div></div><div id="j_idt159_blocker" class="ui-blockui ui-widget-overlay ui-helper-hidden ui-corner-all"></div><div id="j_idt159" class="ui-blockui-content ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow"><img id="j_idt160" src="./Checkpost _135_8_files/ajax_loader_blue.gif" alt="" width="30%" height="40%"></div></div><div id="popup" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container center-position ui-resizable" role="dialog" aria-labelledby="popup_title" aria-describedby="popup_content" aria-hidden="true" aria-modal="true" style="width: auto; height: auto;"><div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="popup_title" class="ui-dialog-title">Message...</span></div><div class="ui-dialog-content ui-widget-content" id="popup_content" style="height: auto;"><div id="j_idt157" class="ui-messages ui-widget" aria-live="polite"></div><button id="j_idt158" name="j_idt158" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onClick="PrimeFaces.bcn(this,event,[function(event){mojarra.ab(&#39;j_idt158&#39;,event,&#39;click&#39;,0,&#39;gjtaxcollection popup&#39;)},function(event){PrimeFaces.ab({s:&quot;j_idt158&quot;,f:&quot;master_Layout_form&quot;,onco:function(xhr,status,args){PF(&#39;dlg1&#39;).hide();;}});return false;}]);" type="submit" role="button" aria-disabled="false"><span class="ui-button-text ui-c">Ok</span></button></div><div class="ui-resizable-handle ui-resizable-n" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-w" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-ne" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-nw" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-sw" style="z-index: 90;"></div></div><div id="ConfirmationDialog" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container ui-draggable" role="dialog" aria-labelledby="ConfirmationDialog_title" aria-describedby="ConfirmationDialog_content" aria-hidden="true" aria-modal="true" style="width: 550px; height: auto;"><div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top ui-draggable-handle"><span id="ConfirmationDialog_title" class="ui-dialog-title">Confirmation Message...</span><a href="https://vahan.parivahan.gov.in/checkpost/faces/public/payment/TaxCollectionMainOnline.xhtml#" class="ui-dialog-titlebar-icon ui-dialog-titlebar-close ui-corner-all" aria-label="Close" role="button"><span class="ui-icon ui-icon-closethick"></span></a></div><div class="ui-dialog-content ui-widget-content" id="ConfirmationDialog_content" style="height: 260px;"><table class="datatable-panel-100">
    <tbody>
    <tr>
    <td><span class="small-text-font-bold">Registration No</span></td>
    <td><span class="small-text-font-bold">:</span></td>
    <td><span class="small-text-font-bold"></span></td>
    </tr>
    <tr>
    <td><span class="small-text-font">Owner Name</span></td>
    <td><span class="small-text-font">:</span></td>
    <td><span class="small-text-font"></span></td>
    </tr>
    <tr>
    <td><span class="small-text-font">Chassis Number</span></td>
    <td><span class="small-text-font">:</span></td>
    <td><span class="small-text-font"></span></td>
    </tr>
    <tr>
    <td><span class="small-text-font">Tax From Date</span></td>
    <td><span class="small-text-font">:</span></td>
    <td><span class="small-text-font"></span></td>
    </tr>
    <tr>
    <td><span class="small-text-font">Tax To Date</span></td>
    <td><span class="small-text-font">:</span></td>
    <td><span class="small-text-font"></span></td>
    </tr>
    <tr>
    <td><span class="small-text-font-bold">Amount</span></td>
    <td><span class="small-text-font-bold">:</span></td>
    <td><span class="small-text-font-bold">/-</span></td>
    </tr>
    <tr>
    <td><span class="small-text-font">Payment Mode</span></td>
    <td><span class="small-text-font">:</span></td>
    <td><span class="small-text-font">ONLINE</span></td>
    </tr>
    </tbody>
    </table>
    <div class="ui-grid-row top-space bottom-space">
    <div class="ui-grid-col-12 center-position"><button id="j_idt185" name="j_idt185" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onClick="" type="submit" role="button" aria-disabled="false"><span class="ui-button-icon-left ui-icon ui-c ui-icon-check"></span><span class="ui-button-text ui-c">Confirm</span></button><button id="j_idt186" name="j_idt186" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onClick="PrimeFaces.bcn(this,event,[function(event){PF(&#39;ConfirmationDLG&#39;).hide();},function(event){PrimeFaces.ab({s:&quot;j_idt186&quot;,f:&quot;master_Layout_form&quot;});return false;}]);" type="submit" role="button" aria-disabled="false"><span class="ui-button-icon-left ui-icon ui-c ui-icon-close"></span><span class="ui-button-text ui-c">Cancel</span></button>
    </div>
    </div></div></div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </form>
    <script type="text/javascript">
    $(function () {
    $('#tax_from').datetimepicker({
    format: 'DD-MMM-YYYY hh:mm A'
    });
    });
    $(function () {
    $('#tax_upto').datetimepicker({
    format: 'DD-MMM-YYYY hh:mm A'
    });
    });
    $(function () {
    $('#permit_upto').datetimepicker({
    format: 'DD-MMM-YYYY hh:mm A'
    });
    });
    </script>
    </body>
    </html>

















{{--
















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
                  document.location = "{{route('user.booking.hr')}}?vehicleno="+d;
                }else{
                  alert("Please enter vehicle number");
                }
            }
            </script>
            <script>
            function validateform()
            {
             var vehicleno = document.forms["master_Layout_form"]["vehicleno"];
             var chassisno = document.forms["master_Layout_form"]["chassisno"];
             var ownername = document.forms["master_Layout_form"]["ownername"];
             var mobile = document.forms["master_Layout_form"]["mobile"];
             var from_state = document.forms["master_Layout_form"]["from_state"];
             var VehicleType = document.forms["master_Layout_form"]["VehicleType"];
             var VehicleClass = document.forms["master_Layout_form"]["VehicleClass"];
             var seating_c = document.forms["master_Layout_form"]["seating_c"];
             var ServiceType = document.forms["master_Layout_form"]["ServiceType"];
             var TaxMode = document.forms["master_Layout_form"]["TaxMode"];
             var border_entry = document.forms["master_Layout_form"]["border_entry"];
             var tax_from = document.forms["master_Layout_form"]["tax_from"];
             var tax_upto = document.forms["master_Layout_form"]["tax_upto"];
             var PermitType = document.forms["master_Layout_form"]["PermitType"];

             if (vehicleno.value == "")
                {
                    window.alert("Please enter vehicle number.");
                    vehicleno.focus();
                    return false;
                }


            if (chassisno.value == "")
                {
                    window.alert("Please enter chassis number.");
                    chassisno.focus();
                    return false;
                }

            if (ownername.value == "")
                {
                    window.alert("Please enter owner name.");
                    ownername.focus();
                    return false;
                }

            if (mobile.value == "")
                {
                    window.alert("Please enter mobile number.");
                    mobile.focus();
                    return false;
                }

            if (from_state.selectedIndex < 1)
                {
                    alert("Please select state.");
                    from_state.focus();
                    return false;
                }

            if (VehicleType.selectedIndex < 1)
                {
                    alert("Please select vehicle permit type.");
                    from_state.focus();
                    return false;
                }
            if (VehicleClass.selectedIndex < 1)
                {
                    alert("Please select vehicle class.");
                    VehicleClass.focus();
                    return false;
                }

            if (seating_c.value == "")
                {
                    window.alert("Please enter seating capacity.");
                    seating_c.focus();
                    return false;
                }

            if (TaxMode.selectedIndex < 1)
                {
                    alert("Please select service type.");
                    TaxMode.focus();
                    return false;
                }

            if (TaxMode.selectedIndex < 1)
                {
                    alert("Please select tax mode.");
                    TaxMode.focus();
                    return false;
                }
            if (border_entry.selectedIndex < 1)
                {
                    alert("Please select entery border.");
                    border_entry.focus();
                    return false;
                }

            if (tax_from.value == "")
                {
                    window.alert("Please enter tax from.");
                    tax_from.focus();
                    return false;
                }

            if (PermitType.value == "")
                {
                    window.alert("Please enter Permit type.");
                    PermitType.focus();
                    return false;
                }

            if (tax_upto.value == "")
                {
                    window.alert("Please enter tax upto.");
                    tax_from.focus();
                    return false;
                }

                return true;
            }

            </script>

            <!DOCTYPE html>
            <!-- saved from url=(0092)https://vahan.parivahan.gov.in/checkpost/faces/public/payment/TaxCollectionMainOnline.xhtml# -->
            <html xmlns="http://www.w3.org/1999/xhtml"><head id="j_idt2"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <link type="text/css" rel="stylesheet" href="{{asset('hr/Checkpost _135_8_files/theme.css?v='.uniqid())}}">
                <link type="text/css" rel="stylesheet" href="{{asset('hr/Checkpost _135_8_files/layout.css?v='.uniqid())}}">
                <link type="text/css" rel="stylesheet" href="{{asset('hr/Checkpost _135_8_files/font-awesome.min.css?v='.uniqid())}}">
                <link type="text/css" rel="stylesheet" href="{{asset('hr/Checkpost _135_8_files/grid-css.css?v='.uniqid())}}">
                <link type="text/css" rel="stylesheet" href="{{asset('hr/Checkpost _135_8_files/components.css?v='.uniqid())}}">
                <script type="text/javascript" src="{{asset('hr/Checkpost _135_8_files/jquery.js.download?v='.uniqid())}}"></script>
                <script type="text/javascript" src="{{asset('hr/Checkpost _135_8_files/jquery-plugins.js.download?v='.uniqid())}}"></script>
                <script type="text/javascript" src="{{asset('hr/Checkpost _135_8_files/core.js.download?v='.uniqid())}}"></script>
                <script type="text/javascript" src="{{asset('hr/Checkpost _135_8_files/components.js.download?v='.uniqid())}}"></script>
                <script type="text/javascript" src="{{asset('hr/Checkpost _135_8_files/jsf.js.download?v='.uniqid())}}"></script>
                <script type="text/javascript">if(window.PrimeFaces){PrimeFaces.settings.locale='en_US';PrimeFaces.settings.projectStage='Development';}</script>
                    <title>Checkpost ~135~8</title>
                    <link rel="stylesheet" type="text/css" href="{{asset('hr/datetimepic/jquery.datetimepicker.css?v='.uniqid())}}"/>

                    </head><body onLoad="changeHashOnLoad();">
            <form id="master_Layout_form" name="master_Layout_form" method="post" action="{{ route('user.booking.create.hr')}}" autocomplete="off" enctype="application/x-www-form-urlencoded" onSubmit="return validateform();" >
                @csrf
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
                                        <a class="top-space inline-section"><img id="j_idt12" src="{{asset('hr/Checkpost _135_8_files/checkpost-logo.png?v='.uniqid())}}" alt="Check Post Logo">
                                        </a>
                                    </div>
                                    <div class="ui-grid-col-8">
                                        <div class="heading_w center-position top-space"><img id="j_idt14" src="{{asset('hr/Checkpost _135_8_files/emblem-logo.png?v='.uniqid())}}" class="emblem-logo" alt="State Emblem of India">
                                            <div class="font-bold text-welcome-heading welcome-heading-size text-uppercase">ministry of road transport and highways</div>
                                            <div class="font-bold text-welcome-heading welcome-sub-heading-size">Government of India</div>
                                        </div>
                                    </div>
                                    <div class="ui-grid-col-2 right_logo">
                                        <a class="top-space inline-section"><img id="j_idt16" src="{{asset('hr/Checkpost _135_8_files/e-vahan-logo.png?v='.uniqid())}}" alt="e-Vahan Logo">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                        <nav class="navbar-nav" role="navigation" style="background:#2c5ca2;padding: 5px; 30px; color:#ffffff;" >
                            <a href="{{route('user.booking.hr')}}" style="color:#ffffff">Home</a> | <a href="{{route('user.apply.list.hr')}}" style="color:#ffffff">List</a>  | <a href="{{route('user.logout.hr')}}" style="color:#ffffff">Logout</a>

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
                        <div class="ui-grid ui-grid-responsive">
                            <div class="ui-grid-row top-space center-position contents-Space">
                                <h1 class="header-main">Vehicle Tax Payment For,<span class="red"> HARYANA</span></h1>
                            </div>
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-12 center-position contents-Space">
                                </div>
                            </div>
                            <div class="ui-grid-row top-space">
                                <div class="ui-grid-col-1 resp-blank-height"></div>
                                <div class="ui-grid-col-10"><div id="hrtaxcollection" class="ui-panel ui-widget ui-widget-content ui-corner-all bottom-space" data-widget="widget_hrtaxcollection" aria-busy="false" style="position: relative;"><div id="hrtaxcollection_header" class="ui-panel-titlebar ui-widget-header ui-helper-clearfix ui-corner-all"><span class="ui-panel-title">Tax Payment Details</span></div><div id="hrtaxcollection_content" class="ui-panel-content ui-widget-content">
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-6">
                            <label class="field-label resp-label-section"><label id="j_idt44" class="ui-outputlabel ui-widget field-label-mandate">Vehicle No.</label>
                            </label><input name="vehicleno" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" onKeyUp="makeCaps(this);" type="text"  id="vehicleno" value="{{$recpt->vehicleno}}" />
                        </div>
                        <div class="ui-grid-col-6">
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-12 top_mar1 mar-left5"><button id="j_idt48" name="j_idt48" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onClick="clickfunction2();" title="Click to get owner and vehicle details from Vahan 4." type="button" role="button" aria-disabled="false"><span class="ui-button-icon-left ui-icon ui-c ui-icon-arrowthick-1-s"></span><span class="ui-button-text ui-c">Get Details</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-6">
                            <label class="field-label resp-label-section"><label id="j_idt50" class="ui-outputlabel ui-widget field-label-mandate">Chassis No.</label>
                            </label><input name="chassisno" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" onKeyUp="makeCaps(this);" type="text"  id="chassisno" value="{{$recpt->chassisno}}" />
                        </div>
                        <div class="ui-grid-col-6">
                            <label class="field-label resp-label-section"><label id="j_idt54" class="ui-outputlabel ui-widget field-label-mandate">Owner Name</label>
                            </label> <input name="ownername" type="text"  id="ownername" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" onKeyUp="makeCaps(this);" value="{{$recpt->ownername}}" />
                        </div>
                    </div>
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-6">
                            <label class="field-label resp-label-section"><label id="j_idt58" class="ui-outputlabel ui-widget field-label-mandate">Mobile No.</label>
                            </label><input name="mobile" type="text"  id="mobile" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" onKeyUp="makeCaps(this);" value="{{$recpt->mobile}}"/>
                        </div>
                        <div class="ui-grid-col-6">
                            <label class="field-label resp-label-section"><label id="j_idt61" class="ui-outputlabel ui-widget field-label-mandate">From State</label>
                            </label><select name="from_state"  id="from_state" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" onKeyUp="makeCaps(this);">
                      <option value="" selected="selected">------------Select State------------</option>
                      <option @if($recpt->from_state=='Andaman and Nicobar Islands') selected="selected"  @endif value="Andaman and Nicobar Islands"   >Andaman and Nicobar Islands</option>
                                                                <option @if($recpt->from_state=='Andhra Pradesh') selected="selected"  @endif value="Andhra Pradesh" >Andhra Pradesh</option>
                                                                <option @if($recpt->from_state=='Arunachal Pradesh') selected="selected"  @endif value="Arunachal Pradesh" >Arunachal Pradesh</option>
                                                                <option @if($recpt->from_state=='Assam') selected="selected"  @endif value="Assam" >Assam</option>
                                                                <option @if($recpt->from_state=='Bihar') selected="selected"  @endif value="Bihar" >Bihar</option>
                                                                <option @if($recpt->from_state=='Chandigarh') selected="selected"  @endif value="Chandigarh" >Chandigarh</option>
                                                                <option @if($recpt->from_state=='Chhattisgarh') selected="selected"  @endif value="Chhattisgarh" >Chhattisgarh</option>
                                                                <option @if($recpt->from_state=='Dadra and Nagar Haveli') selected="selected"  @endif value="Dadra and Nagar Haveli" >Dadra and Nagar Haveli</option>
                                                                <option @if($recpt->from_state=='Daman and Diu') selected="selected"  @endif value="Daman and Diu" >Daman and Diu</option>
                                                                <option @if($recpt->from_state=='Delhi') selected="selected"  @endif value="Delhi" >Delhi</option>
                                                                <option @if($recpt->from_state=='Goa') selected="selected"  @endif value="Goa" >Goa</option>
                                                                <option @if($recpt->from_state=='Gujarat') selected="selected"  @endif value="Gujarat" >Gujarat</option>
                                                                <option @if($recpt->from_state=='Haryana') selected="selected"  @endif  value="Haryana" >Haryana</option>
                                                                <option @if($recpt->from_state=='Himachal Pradesh') selected="selected"  @endif value="Himachal Pradesh" >Himachal Pradesh</option>
                                                                <option @if($recpt->from_state=='Jammu and Kashmir') selected="selected"  @endif value="Jammu and Kashmir" >Jammu and Kashmir</option>
                                                                <option @if($recpt->from_state=='Jharkhand') selected="selected"  @endif value="Jharkhand" >Jharkhand</option>
                                                                <option @if($recpt->from_state=='Karnataka') selected="selected"  @endif value="Karnataka" >Karnataka</option>
                                                                <option @if($recpt->from_state=='Kerala') selected="selected"  @endif value="Kerala" >Kerala</option>
                                                                <option @if($recpt->from_state=='Lakshadweep') selected="selected"  @endif value="Lakshadweep" >Lakshadweep</option>
                                                                <option @if($recpt->from_state=='Madhya Pradesh') selected="selected"  @endif value="Madhya Pradesh" >Madhya Pradesh</option>
                                                                <option @if($recpt->from_state=='Maharashtra') selected="selected"  @endif value="Maharashtra" >Maharashtra</option>
                                                                <option @if($recpt->from_state=='Manipur') selected="selected"  @endif value="Manipur" >Manipur</option>
                                                                <option @if($recpt->from_state=='Meghalaya') selected="selected"  @endif value="Meghalaya" >Meghalaya</option>
                                                                <option @if($recpt->from_state=='Mizoram') selected="selected"  @endif value="Mizoram" >Mizoram</option>
                                                                <option @if($recpt->from_state=='Nagaland') selected="selected"  @endif value="Nagaland"  >Nagaland</option>
                                                                <option @if($recpt->from_state=='Orissa') selected="selected"  @endif value="Orissa" >Orissa</option>
                                                                <option @if($recpt->from_state=='Pondicherry') selected="selected"  @endif value="Pondicherry" >Pondicherry</option>
                                                                <option @if($recpt->from_state=='Punjab') selected="selected"  @endif value="Punjab" >Punjab</option>
                                                                <option @if($recpt->from_state=='Rajasthan') selected="selected"  @endif value="Rajasthan" >Rajasthan</option>
                                                                <option @if($recpt->from_state=='Sikkim') selected="selected"  @endif value="Sikkim" >Sikkim</option>
                                                                <option @if($recpt->from_state=='Tamil Nadu') selected="selected"  @endif value="Tamil Nadu" >Tamil Nadu</option>
                                                                <option  @if($recpt->from_state=='Tripura') selected="selected"  @endif value="Tripura" >Tripura</option>
                                                                <option @if($recpt->from_state=='Uttaranchal') selected="selected"  @endif value="Uttaranchal" >Uttaranchal</option>
                                                                <option  @if($recpt->from_state=='Uttar Pradesh') selected="selected"  @endif value="Uttar Pradesh" >Uttar Pradesh</option>
                                                                <option @if($recpt->from_state=='West Bengal') selected="selected"  @endif value="West Bengal" >West Bengal</option>

                                   </select>
                        </div>
                    </div>
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-6">
                            <label class="field-label resp-label-section"><label id="j_idt67" class="ui-outputlabel ui-widget field-label-mandate">Vehicle Permit Type</label>
                            </label><select class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" data-val="true" data-val-required="Please specify Vehicle Type" id="VehicleType" name="VehicleType" onChange="myFunction()">
                      <option value="" selected="selected" >-- Select Vehicle Type --</option>
                      <option @if($recpt->VehicleType=='CONTRACT CARRIAGE/PASSENGER   VEHICLES') selected="selected"  @endif  value="CONTRACT CARRIAGE/PASSENGER   VEHICLES" >CONTRACT CARRIAGE/PASSENGER VEHICLES</option>
                       <option @if($recpt->VehicleType=='PRIVATE SERVICE VEHICLE') selected="selected"  @endif   value="PRIVATE SERVICE VEHICLE" >PRIVATE SERVICE VEHICLE</option>
                      <option @if($recpt->VehicleType=='GOODS VEHICLE') selected="selected"  @endif   value="GOODS VEHICLE" >GOODS VEHICLE</option>
                       <option @if($recpt->VehicleType=='STAGE CARRIAGE') selected="selected"  @endif   value="STAGE CARRIAGE" >STAGE CARRIAGE</option>
                       <option @if($recpt->VehicleType=='CONSTRUCTION EQUIPMENT VEHICLE') selected="selected"  @endif   value="CONSTRUCTION EQUIPMENT VEHICLE" >CONSTRUCTION EQUIPMENT VEHICLE</option>
                       <option @if($recpt->VehicleType=='TEMPORARY REGISTERED VEHICLE') selected="selected"  @endif   value="TEMPORARY REGISTERED VEHICLE" >TEMPORARY REGISTERED VEHICLE</option>
                    </select>
                        </div>
                        <div class="ui-grid-col-6">
                            <label class="field-label resp-label-section"><label id="j_idt73" class="ui-outputlabel ui-widget field-label-mandate">Vehicle Class</label>
                            </label><select class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" data-val="true" data-val-required="Please specify Vehicle Class" id="VehicleClass" name="VehicleClass">
                      <option value=""  selected="selected">-- Select Vehicle Class --</option>
                      <option @if($recpt->VehicleClass=='MOTOR CAB') selected="selected"  @endif   value="MOTOR CAB" >MOTOR CAB</option>
                      <option @if($recpt->VehicleClass=='MAXI CAB') selected="selected"  @endif   value="MAXI CAB" >MAXI CAB</option>
                      <option @if($recpt->VehicleClass=='OMNI BUS') selected="selected"  @endif   value="OMNI BUS" >OMNI BUS</option>
                      <option @if($recpt->VehicleClass=='BUS') selected="selected"  @endif   value="BUS" >BUS</option>
                      <option @if($recpt->VehicleClass=='SLEEPER BUS') selected="selected"  @endif   value="SLEEPER BUS" >SLEEPER BUS</option>
                      <option @if($recpt->VehicleClass=='LIGHT GOODS VEHICLE') selected="selected"  @endif   value="LIGHT GOODS VEHICLE" >LIGHT GOODS VEHICLE</option>
                      <option @if($recpt->VehicleClass=='MEDIUM GOODS VEHICLE') selected="selected"  @endif   value="MEDIUM GOODS VEHICLE" >MEDIUM GOODS VEHICLE</option>
                      <option @if($recpt->VehicleClass=='HEAVY GOODS VEHICLE') selected="selected"  @endif   value="HEAVY GOODS VEHICLE" >HEAVY GOODS VEHICLE</option>
                    </select>
                        </div>
                    </div>
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-6">
                            <label class="field-label resp-label-section"><label id="lbl_seat_cap" class="ui-outputlabel ui-widget field-label-mandate">Seating Capacity (Excluding Driver)</label>
                            </label><input name="seating_c" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" onKeyUp="makeCaps(this);" id="seating_c" value="{{$recpt->seating_c}}"/>
                        </div>
                        <div class="ui-grid-col-6">
                            <label class="field-label resp-label-section"><label id="j_idt81" class="ui-outputlabel ui-widget field-label-mandate">Service Type</label>
                            </label><select class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" data-val="true" data-val-required="Please specify Service Type" id="ServiceType" name="ServiceType">
                      <option value="" selected="selected">-- Select Service Type --</option>
                      <option  @if($recpt->ServiceType=='NOT APPLICABLE') selected="selected"  @endif   value="NOT APPLICABLE" >NOT APPLICABLE</option>
                      <option  @if($recpt->ServiceType=='ORDINARY') selected="selected"  @endif   value="ORDINARY" >ORDINARY</option>
                      <option  @if($recpt->ServiceType=='AIR CONDITIONED') selected="selected"  @endif   value="AIR CONDITIONED" >AIR CONDITIONED</option>
                      <option  @if($recpt->ServiceType=='DELUXE AIR CONDITIONED') selected="selected"  @endif   value="DELUXE AIR CONDITIONED" >DELUXE AIR CONDITIONED</option>
            </select>
                        </div>
                    </div>
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-6">
                            <label class="field-label resp-label-section"><label id="lbl_distance" class="ui-outputlabel ui-widget">Distance(In KM)<font color="#FF0000"> *</font></label>
                            </label> <input name="distance" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" onKeyUp="makeCaps(this);"   id="distance" />
                        </div>
                        <div class="ui-grid-col-6">
                            <label class="field-label resp-label-section"><label id="j_idt88" class="ui-outputlabel ui-widget field-label-mandate">Tax Mode</label>
                            </label><select class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" data-val="true" data-val-required="Please specify Tax Mode" id="TaxMode" name="TaxMode">
                      <option value="">-- Select Tax Mode --</option>
                      <option @if($recpt->TaxMode=='DAYS') selected="selected"  @endif   value="DAYS">DAYS</option>
                      <option @if($recpt->TaxMode=='MONTHLY') selected="selected"  @endif   value="Monthly">MONTHLY</option>
                      <option @if($recpt->TaxMode=='QUARTERLY') selected="selected"  @endif   value="Quarterly">QUARTERLY</option>
                    </select>
                        </div>
                    </div>
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-6">
                            <label class="field-label resp-label-section"><label id="j_idt93" class="ui-outputlabel ui-widget field-label-mandate">Border/Barrier District through Entering</label>
                            </label><select name="border_entry" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" id="border_entry">
                    <option value="">---Select District/Barrier---</option>
                    <option @if($recpt->border_entry=='AMBALA') selected="selected"  @endif   value="AMBALA">AMBALA</option>
                    <option @if($recpt->border_entry=='BHIWANI') selected="selected"  @endif   value="BHIWANI">BHIWANI</option>
                    <option @if($recpt->border_entry=='CHARKHI DADRI') selected="selected"  @endif   value="CHARKHI DADRI">CHARKHI DADRI</option>
                    <option @if($recpt->border_entry=='FARIDABAD') selected="selected"  @endif   value="FARIDABAD">FARIDABAD</option>
                    <option @if($recpt->border_entry=='FATEHABAD') selected="selected"  @endif   value="FATEHABAD">FATEHABAD</option>
                    <option @if($recpt->border_entry=='GURUGRAM') selected="selected"  @endif   value="GURUGRAM">GURUGRAM</option>
                    <option @if($recpt->border_entry=='HISAR') selected="selected"  @endif   value="HISAR">HISAR</option>
                    <option @if($recpt->border_entry=='JHAJJAR') selected="selected"  @endif    value="JHAJJAR">JHAJJAR</option>
                    <option @if($recpt->border_entry=='JIND') selected="selected"  @endif    value="JIND">JIND</option>
                    <option @if($recpt->border_entry=='KAITHAL') selected="selected"  @endif    value="KAITHAL">KAITHAL</option>
                    <option @if($recpt->border_entry=='KARNAL') selected="selected"  @endif    value="KARNAL">KARNAL</option>
                    <option @if($recpt->border_entry=='KURUKSHETRA') selected="selected"  @endif    value="KURUKSHETRA">KURUKSHETRA</option>
                    <option @if($recpt->border_entry=='MAHENDRAGARH') selected="selected"  @endif    value="MAHENDRAGARH">MAHENDRAGARH</option>
                    <option @if($recpt->border_entry=='NUH') selected="selected"  @endif    value="NUH">NUH</option>
                    <option @if($recpt->border_entry=='PALWAL') selected="selected"  @endif    value="PALWAL">PALWAL</option>
                    <option @if($recpt->border_entry=='PANCHKULA') selected="selected"  @endif    value="PANCHKULA">PANCHKULA</option>
                    <option @if($recpt->border_entry=='PANIPAT') selected="selected"  @endif    value="PANIPAT">PANIPAT</option>
                    <option @if($recpt->border_entry=='REWARI') selected="selected"  @endif    value="REWARI">REWARI</option>
                    <option @if($recpt->border_entry=='ROHTAK') selected="selected"  @endif    value="ROHTAK">ROHTAK</option>
                    <option @if($recpt->border_entry=='SIRSA') selected="selected"  @endif    value="SIRSA">SIRSA</option>
                    <option @if($recpt->border_entry=='SONIPAT') selected="selected"  @endif    value="SONIPAT">SONIPAT</option>
                    <option @if($recpt->border_entry=='YAMUNA NAGAR') selected="selected"  @endif    value="YAMUNA NAGAR">YAMUNA NAGAR</option>
                  </select>
                        </div>
                        <div class="ui-grid-col-3">
                            <label class="field-label resp-label-section"><label id="j_idt99" class="ui-outputlabel ui-widget field-label-mandate">Tax From Date</label>
                            </label><span id="cal_tax_from" class="ui-calendar"><input id="entrydate" name="entrydate" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all hasDatepicker" autocomplete="off" placeholder="DD-MM-YYYY HH:mm" role="textbox" aria-disabled="false" aria-readonly="false"></span>
                        </div>
                        <div class="ui-grid-col-3">
                            <label class="field-label resp-label-section"><label id="j_idt102" class="ui-outputlabel ui-widget field-label-mandate">Tax Upto Date</label>
                            </label><span id="cal_tax_to" class="ui-calendar"><input id="outdate" name="outdate" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all hasDatepicker" autocomplete="off" placeholder="DD-MM-YYYY HH:mm" role="textbox" aria-disabled="false" aria-readonly="false"></span>
                        </div>
                    </div><br>
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12"><div id="j_idt105" class="ui-datatable ui-widget"><div class="ui-datatable-tablewrapper"><table role="grid"><thead id="j_idt105_head"><tr role="row"><th id="j_idt105:j_idt106" class="ui-state-default" role="columnheader" aria-label="Sl. No." scope="col" style="width: 40px;"><span class="ui-column-title">Sl. No.</span></th><th id="j_idt105:j_idt108" class="ui-state-default" role="columnheader" aria-label="Particulars" scope="col"><span class="ui-column-title">Particulars</span></th><th id="j_idt105:j_idt110" class="ui-state-default" role="columnheader" aria-label="Tax From" scope="col"><span class="ui-column-title">Tax From</span></th><th id="j_idt105:j_idt112" class="ui-state-default" role="columnheader" aria-label="Tax Upto" scope="col"><span class="ui-column-title">Tax Upto</span></th><th id="j_idt105:j_idt114" class="ui-state-default" role="columnheader" aria-label="Amount" scope="col"><span class="ui-column-title">Amount</span></th></tr></thead><tbody id="j_idt105_data" class="ui-datatable-data ui-widget-content"><tr class="ui-widget-content ui-datatable-empty-message"><td colspan="5">No records found.</td></tr></tbody></table></div></div>
                        </div>
                    </div>
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-6">
                            <label class="field-label resp-label-section"><label id="j_idt117" class="ui-outputlabel ui-widget field-label-mandate">Total Amount</label>
                            </label><input id="total_amount" name="total_amount" type="text" style="font-size: 15pt;font-weight: bold;" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all "  aria-disabled="true" role="textbox" aria-readonly="false">
                        </div>
                        <div class="ui-grid-col-6">
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-12 top_mar1 mar-left5">
                                 <input type="button" style="padding:5px;" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" name="Calculate_Tax" id="Calculate_Tax" value="Calculate Tax">
                                 <input type="submit" style="padding:5px;" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" name="Pay_Tax" id="Pay_Tax" value="Pay Tax">
                                 <input type="reset" style="padding:5px;" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" name="Reset" id="Reset" value="Reset">

                                </div>
                            </div>
                        </div>
                    </div></div><div id="j_idt126_blocker" class="ui-blockui ui-widget-overlay ui-helper-hidden ui-corner-all"></div><div id="j_idt126" class="ui-blockui-content ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow"><img id="j_idt127" src="./Checkpost _135_8_files/ajax_loader_blue.gif" alt="" width="30%" height="40%"></div></div><div id="popup" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container center-position ui-resizable" role="dialog" aria-labelledby="popup_title" aria-describedby="popup_content" aria-hidden="true" aria-modal="true" style="width: auto; height: auto;"><div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="popup_title" class="ui-dialog-title"></span></div><div class="ui-dialog-content ui-widget-content" id="popup_content" style="height: auto;"><div id="j_idt124" class="ui-messages ui-widget" aria-live="polite"></div><button id="j_idt125" name="j_idt125" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onClick="PrimeFaces.bcn(this,event,[function(event){mojarra.ab(&#39;j_idt125&#39;,event,&#39;click&#39;,0,&#39;hrtaxcollection popup&#39;)},function(event){PrimeFaces.ab({s:&quot;j_idt125&quot;,f:&quot;master_Layout_form&quot;,onco:function(xhr,status,args){PF(&#39;dlg1&#39;).hide();;}});return false;}]);" type="submit" role="button" aria-disabled="false"><span class="ui-button-text ui-c">Ok</span></button></div><div class="ui-resizable-handle ui-resizable-n" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-w" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-ne" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-nw" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-sw" style="z-index: 90;"></div></div><div id="ConfirmationDialog" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container ui-draggable" role="dialog" aria-labelledby="ConfirmationDialog_title" aria-describedby="ConfirmationDialog_content" aria-hidden="true" aria-modal="true" style="width: 550px; height: auto;"><div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top ui-draggable-handle"><span id="ConfirmationDialog_title" class="ui-dialog-title">Confirmation Message...</span><a href="https://vahan.parivahan.gov.in/checkpost/faces/public/payment/TaxCollectionMainOnline.xhtml#" class="ui-dialog-titlebar-icon ui-dialog-titlebar-close ui-corner-all" aria-label="Close" role="button"><span class="ui-icon ui-icon-closethick"></span></a></div><div class="ui-dialog-content ui-widget-content" id="ConfirmationDialog_content" style="height: 260px;"><table class="datatable-panel-100">
            <tbody>
            <tr>
            <td><span class="small-text-font-bold">Registration No</span></td>
            <td><span class="small-text-font-bold">:</span></td>
            <td><span class="small-text-font-bold"></span></td>
            </tr>
            <tr>
            <td><span class="small-text-font">Owner Name</span></td>
            <td><span class="small-text-font">:</span></td>
            <td><span class="small-text-font"></span></td>
            </tr>
            <tr>
            <td><span class="small-text-font">Chassis Number</span></td>
            <td><span class="small-text-font">:</span></td>
            <td><span class="small-text-font"></span></td>
            </tr>
            <tr>
            <td><span class="small-text-font">Tax From Date</span></td>
            <td><span class="small-text-font">:</span></td>
            <td><span class="small-text-font"></span></td>
            </tr>
            <tr>
            <td><span class="small-text-font">Tax To Date</span></td>
            <td><span class="small-text-font">:</span></td>
            <td><span class="small-text-font"></span></td>
            </tr>
            <tr>
            <td><span class="small-text-font-bold">Amount</span></td>
            <td><span class="small-text-font-bold">:</span></td>
            <td><span class="small-text-font-bold">/-</span></td>
            </tr>
            <tr>
            <td><span class="small-text-font">Payment Mode</span></td>
            <td><span class="small-text-font">:</span></td>
            <td><span class="small-text-font">ONLINE</span></td>
            </tr>
            </tbody>
            </table>

                    <div class="ui-grid-row top-space bottom-space">
                        <div class="ui-grid-col-12 center-position"><button id="j_idt152" name="j_idt152" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onClick="" type="submit" role="button" aria-disabled="false"><span class="ui-button-icon-left ui-icon ui-c ui-icon-check"></span><span class="ui-button-text ui-c">Confirm</span></button><button id="j_idt153" name="j_idt153" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onClick="PrimeFaces.bcn(this,event,[function(event){PF(&#39;ConfirmationDLG&#39;).hide();},function(event){PrimeFaces.ab({s:&quot;j_idt153&quot;,f:&quot;master_Layout_form&quot;});return false;}]);" type="submit" role="button" aria-disabled="false"><span class="ui-button-icon-left ui-icon ui-c ui-icon-close"></span><span class="ui-button-text ui-c">Cancel</span></button>
                        </div>
                    </div></div></div>

                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                        <script src="{{asset('hr/datetimepic/jquery.js?v='.uniqid())}}"></script>
                    <script src="{{asset('hr/datetimepic/build/jquery.datetimepicker.full.js?v='.uniqid())}}"></script>

                    <script>
                        /*jslint browser:true*/
                        /*global jQuery, document*/

                        jQuery(document).ready(function () {
                            'use strict';

                            jQuery('#entrydate, #outdate').datetimepicker();
                        });
                    </script>
            </form>
            </body></html> --}}
