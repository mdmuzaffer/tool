<!DOCTYPE html>
<!-- saved from url=(0044)http://uktx.diamondfinance.co.in/booking.php -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link type="text/css" rel="stylesheet" href="{{asset('raj/Checkpost_135_8_files/theme.css?v='.uniqid())}}">
    <link type="text/css" rel="stylesheet" href="{{asset('raj/Checkpost_135_8_files/layout.css?v='.uniqid())}}">
    <link type="text/css" rel="stylesheet" href="{{asset('raj/Checkpost_135_8_files/grid-css.css?v='.uniqid())}}">
    <link type="text/css" rel="stylesheet" href="{{asset('raj/Checkpost_135_8_files/primefaces.css?v='.uniqid())}}">
    <script type="text/javascript" src="{{asset('raj/Checkpost_135_8_files/jquery.js.download?v='.uniqid())}}"></script>
    <script type="text/javascript" src="{{asset('raj/Checkpost_135_8_files/jquery-plugins.js.download?v='.uniqid())}}"></script>
    <script type="text/javascript" src="{{asset('raj/Checkpost_135_8_files/primefaces.js.download?v='.uniqid())}}"></script>
    <script type="text/javascript" src="{{asset('raj/Checkpost_135_8_files/jsf.js.download?v='.uniqid())}}"></script>
        <title>Checkpost~135~8</title>
        <link rel="icon" href="https://vahan.parivahan.gov.in/vahan-icon.png" sizes="16x16" type="image/png">
        <script type="text/javascript" src="{{asset('raj/Checkpost_135_8_files/bootstrap.js.download?v='.uniqid())}}"></script>
        <script type="text/javascript" src="{{asset('raj/Checkpost_135_8_files/commonvalidation.js.download?v='.uniqid())}}"></script>
        <link rel="icon" href="https://vahan.parivahan.gov.in/images/vahan-icon.png" sizes="16x16" type="image/png">
    <style>
        input {

            text-transform: uppercase;
        }
		
    </style>
</head>

<body style="" cz-shortcut-listen="true">
    <script>
        function myFunction() {
            var x = document.getElementById("VehicleType").value;
            if (x == "GOODS VEHICLE" ) {
				$("#seating_cap").show();
				//$("#permit_type").hide();
                document.getElementById("demo").innerHTML = "Gross Vehicle Weight(In Kg.) ";
                document.getElementById("lbl_sleeper_cap").innerHTML = "Unladen Wt.(In Kg.) ";
            } else if(x == "CONSTRUCTION EQUIPMENT VEHICLE" ){
				$("#seating_cap").hide();
				 document.getElementById("lbl_sleeper_cap").innerHTML = "Unladen Wt.(In Kg.) ";
				//$("#permit_type").show();
			}else if(x=="TEMPORARY REGISTERED VEHICLES"){
				$("#seating_cap").hide();
				 document.getElementById("lbl_sleeper_cap").innerHTML = "Sleeper Cap ";
			} else {
				$("#seating_cap").show();
				//$("#permit_type").show();
                document.getElementById("demo").innerHTML = "Seating Capacity(Exc Driver) ";
                document.getElementById("lbl_sleeper_cap").innerHTML = "Sleeper Cap ";
            }
        }

        function clickfunction2() {
            var d = document.getElementById("vehicleno").value
            if (d != "") {
                document.location = "{{route('user.booking.raj')}}?vehicleno="+d;
            } else {
                alert("Please enter vehicle number");
            }
        }
    </script>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form id="master_Layout_form" name="master_Layout_form" method="post" action="{{ route('user.booking.create.raj')}}" enctype="application/x-www-form-urlencoded">
            @csrf
        <input type="hidden" name="master_Layout_form" value="master_Layout_form">

        <div>
            <!--                &lt;ui:include src="/headerBeforeLogin.xhtml"/&gt;-->
            <!-- from header before login.xhtml start        -->
            <nav class="navbar navbar-default navigation-background" role="navigation">
                <div class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-2 left_logo">
                            <a style="display: inline-block;" class="top-space"><img id="j_idt15"
                                    src="../ukfiles/entry_page_files/logo_e-vahan.png" alt="Parivahan Sewa"
                                    style="width: auto;">
                            </a>
                        </div>
                        <div class="ui-grid-col-8">
                            <div class="heading_w center-position top-space">
                                <div class="font-bold text-welcome-heading welcome-heading-size text-uppercase">ministry
                                    of road transport and highways</div>
                                <div class="font-bold text-welcome-heading welcome-sub-heading-size">Government of India
                                </div>
                            </div>
                        </div>
                        <div class="ui-grid-col-2">
                            <div class="right_head_w">
                                <div>
                                    <div>
                                        <span class="resize-font"><a href="javascript:void(0);"
                                                onclick="changemysize(10);"
                                                style="text-decoration: none; color: white">A<sup>-</sup></a></span>
                                        <span class="resize-font"><a href="javascript:void(0);"
                                                onclick="changemysize(12);"
                                                style="text-decoration: none; color: white">A</a></span>
                                        <span class="resize-font"><a href="javascript:void(0);"
                                                onclick="changemysize(14);"
                                                style="text-decoration: none; color: white">A<sup>+</sup></a></span>
                                    </div>
                                    <div class="input-group input-group-unstyled">
                                        <input type="text" class="form-control" style="visibility: hidden"
                                            disabled="disabled">
                                    </div>
                                    <div style="float: right;vertical-align: top;">
                                        <select class="left-search-w" style="vertical-align: top;" disabled="disabled">
                                            <option value="volvo">English</option>
                                            <option value="saab">Hindi</option>
                                            <option value="opel">Espanol</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="navbar-collapse navigation-background-nav collapse in" id="navbar" aria-expanded="true"
                style="padding: 10px;">
        <a href="{{route('user.booking.raj')}}" style="color:#FFFFFF; padding:5px;">Home</a> | <a
                    style="color:#FFFFFF; padding:5px;" href="{{route('user.apply.list.raj')}}">Print Vehicle
                    receipt</a> | <a style="color:#FFFFFF; padding:5px;" href="{{route('select-state')}}">Change State</a> | <a style="color:#FFFFFF; padding:5px;" href="{{route('all-booking')}}">All Booking</a>  | <a style="color:#FFFFFF; padding:5px;"
                    href="{{route('user.logout.raj')}}">Logout</a>
            </div>
            <div class="main_news_w">
                <div class="news_w">
                    <div style="color: #FFFFFF;font-weight: bold;font-size: 13pt;">
                        <marquee scrollamount="2" behavior="alternate" scrolldelay="1" onmouseover="this.stop();"
                            onmouseout="this.start();" direction="left">Please pay tax in advance to avoid any last
                            minute hassle.</marquee>
                    </div>
                </div>
            </div>
            <!-- from header before login.xhtml end        -->
        </div>
        <div>
            <div>
                <div id="popup"
                    class="ui-dialog ui-widget ui-widget-content ui-overlay-hidden ui-corner-all ui-shadow center-position ui-resizable"
                    role="dialog" aria-labelledby="popup_title" aria-hidden="true" style="width: auto; height: auto;">
                    <div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span
                            id="popup_title" class="ui-dialog-title"></span></div>
                    <div class="ui-dialog-content ui-widget-content" style="height: auto;">
                        <div id="j_idt292" class="ui-messages ui-widget" aria-live="polite"></div><button id="j_idt293"
                            name="j_idt293"
                            class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only"
                            onclick="mojarra.ab(&#39;j_idt293&#39;,event,&#39;click&#39;,0,&#39;uktaxcollection popup&#39;);PrimeFaces.ab({source:&#39;j_idt293&#39;,oncomplete:function(xhr,status,args){PF(&#39;dlg1&#39;).hide();;}});return false;"
                            type="submit" role="button" aria-disabled="false"><span
                                class="ui-button-text ui-c">Ok</span></button>
                    </div>
                    <div class="ui-resizable-handle ui-resizable-n" style="z-index: 90;"></div>
                    <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
                    <div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div>
                    <div class="ui-resizable-handle ui-resizable-w" style="z-index: 90;"></div>
                    <div class="ui-resizable-handle ui-resizable-ne" style="z-index: 90;"></div>
                    <div class="ui-resizable-handle ui-resizable-nw" style="z-index: 90;"></div>
                    <div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se"
                        style="z-index: 90;"></div>
                    <div class="ui-resizable-handle ui-resizable-sw" style="z-index: 90;"></div>
                </div>
                <div class="container">
                    <div class="ui-grid ui-grid-responsive">
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-12 center-position contents-Space">
                                <h1 class="header-main">Vehicle Tax Payment For,<span class="red"> RAJASTHAN</span>
                                </h1>
                            </div>
                        </div>

                        <div class="ui-grid-row">
                            <div class="ui-grid-col-1 resp-blank-height"></div>
                            <div class="ui-grid-col-10">
                                <div id="uktaxcollection"
                                    class="ui-panel ui-widget ui-widget-content ui-corner-all bottom-space"
                                    data-widget="widget_uktaxcollection" style="position: relative;">
                                    <div id="uktaxcollection_header"
                                        class="ui-panel-titlebar ui-widget-header ui-helper-clearfix ui-corner-all">
                                        <span class="ui-panel-title">Tax Payment Details</span></div>
                                    <div id="uktaxcollection_content" class="ui-panel-content ui-widget-content">
                                        <div class="ui-grid-row">
                                            <div class="ui-grid-col-6">
                                                <label class="field-label resp-label-section"><label id="j_idt296"
                                                        class="ui-outputlabel ui-widget">Vehicle No.<font
                                                            color="#FF0000"> *</font></label>
                                                </label><input name="vehicleno" type="text" id="vehicleno"
                                                    class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all"
                                                    value="{{$recpt->vehicleno}}">
                                            </div>
                                            <div class="ui-grid-col-6">
                                                <div class="ui-grid-row">
                                                    <div class="ui-grid-col-12 top_mar1 mar-left5">
                                                        <button id="j_idt425" name="j_idt425"
                                                            class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left"
                                                            onclick="clickfunction2();"
                                                            title="Click to get owner and vehicle details from Vahan 4."
                                                            role="button" type="button" aria-disabled="false"><span
                                                                class="ui-button-icon-left ui-icon ui-c ui-icon-arrowthick-1-s"></span><span
                                                                class="ui-button-text ui-c">Get Details</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ui-grid-row">
                                            <div class="ui-grid-col-6">
                                                <label class="field-label resp-label-section"><label id="j_idt302"
                                                        class="ui-outputlabel ui-widget">Chassis No.<font
                                                            color="#FF0000"> *</font></label>
                                                </label><input name="chassisno" type="text" id="chassisno"
                                                    class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all"
                                                    value="{{$recpt->chassisno}}">
                                            </div>
                                            <div class="ui-grid-col-6">
                                                <label class="field-label resp-label-section"><label id="j_idt306"
                                                        class="ui-outputlabel ui-widget">Owner Name<font
                                                            color="#FF0000"> *</font></label>
                                                </label><input name="ownername" type="text" id="ownername"
                                                    class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all "
                                                    value="{{$recpt->ownername}}">
                                            </div>
                                        </div>
                                        <div class="ui-grid-row">
                                            <div class="ui-grid-col-6">
                                                <label class="field-label resp-label-section"><label id="j_idt310"
                                                        class="ui-outputlabel ui-widget">Mobile No.<font
                                                            color="#FF0000"> *</font></label>
                                                </label><input name="mobile" type="text" id="mobile"
                                                    class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all"
                                                    value="{{$recpt->mobile}}">
                                            </div>
                                            <div class="ui-grid-col-6">
                                                <label class="field-label resp-label-section"><label id="j_idt313"
                                                        class="ui-outputlabel ui-widget">From State<font
                                                            color="#FF0000"> *</font></label>
                                                </label>
                                                <div id="j_idt315"
                                                    class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix"
                                                    style="width: 196px;">
                                                    <div><select name="from_state" class="form-control" id="from_state">
                                                            <option value="" selected="selected">------------Select
                                                                State------------</option>
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
                                        </div>
                                    
                                    <div class="ui-grid-row">
                                        <div class="ui-grid-col-6">
                                            <label class="field-label resp-label-section"><label id="j_idt319"
                                                    class="ui-outputlabel ui-widget">Vehicle Type<font color="#FF0000">
                                                        *</font></label>
                                            </label>
                                            <div id="j_idt321"
                                                class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix"
                                                style="width: 345px;">
                                                <div><select class="form-control" data-val="true"
                                                        data-val-required="Please specify Vehicle Type" id="VehicleType"
                                                        name="VehicleType" onchange="myFunction()">
                                                        <option value="" selected="selected">-- Select Vehicle Type --
                                                        </option>
														 <option @if($recpt->VehicleType=='CONTRACT CARRIAGE/PASSENGER   VEHICLES') selected="selected"  @endif  value="CONTRACT CARRIAGE/PASSENGER   VEHICLES">CONTRACT
                                                            CARRIAGE/PASSENGER VEHICLES</option>
                                                        
                                                        <option @if($recpt->VehicleType=='GOODS VEHICLE') selected="selected"  @endif  value="GOODS VEHICLE">GOODS VEHICLE</option>
                                                       
                                                        <option @if($recpt->VehicleType=='TEMPORARY REGISTERED VEHICLES') selected="selected"  @endif  value="TEMPORARY REGISTERED VEHICLES">TEMPORARY REGISTERED VEHICLES
                                                        </option>
                                                        <option @if($recpt->VehicleType=='CONSTRUCTION EQUIPMENT VEHICLE') selected="selected"  @endif  value="CONSTRUCTION EQUIPMENT VEHICLE">CONSTRUCTION
                                                            EQUIPMENT VEHICLE</option>
                                                        
                                                    </select></div>
                                            </div>
                                        </div>
                                        <div class="ui-grid-col-6">
                                            <label class="field-label resp-label-section"><label id="j_idt325"
                                                    class="ui-outputlabel ui-widget">Vehicle Class<font color="#FF0000">
                                                        *</font></label>
                                            </label>
                                            <div id="j_idt327"
                                                class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix "
                                                style="width: 182px;">
                                                <div><select class="form-control" data-val="true"
                                                        data-val-required="Please specify Vehicle Class"
                                                        id="VehicleClass" name="VehicleClass">
                                                        <option value="" selected="selected">-- Select Vehicle Class --
                                                        </option>
                                                        <option @if($recpt->VehicleClass=='3 WHEELER') selected="selected"  @endif value="3 WHEELER">3 WHEELER</option>
                                                        <option @if($recpt->VehicleClass=='MOTOR CAB') selected="selected"  @endif value="MOTOR CAB">MOTOR CAB</option>
                                                        <option @if($recpt->VehicleClass=='MAXI CAB') selected="selected"  @endif value="MAXI CAB">MAXI CAB</option>
                                                        <option @if($recpt->VehicleClass=='BUS') selected="selected"  @endif value="BUS">BUS</option>
                                                        
                                                        <option @if($recpt->VehicleClass=='OMNI BUS') selected="selected"  @endif value="OMNI BUS">OMNI BUS</option>
														<option @if($recpt->VehicleClass=='TRACTOR') selected="selected"  @endif value="TRACTOR">TRACTOR</option>
														<option @if($recpt->VehicleClass=='CHASSIS OF VEHICLES') selected="selected"  @endif value="CHASSIS OF VEHICLES">CHASSIS OF VEHICLES</option>
														<option @if($recpt->VehicleClass=='LIGHT GOODS VEHICLES') selected="selected"  @endif value="LIGHT GOODS VEHICLES">LIGHT GOODS VEHICLES</option>
														<option @if($recpt->VehicleClass=='MEDIUM GOODS VEHICLES') selected="selected"  @endif value="MEDIUM GOODS VEHICLES">MEDIUM GOODS VEHICLES</option>
														<option @if($recpt->VehicleClass=='HEAVY GOODS VEHICLES') selected="selected"  @endif value="HEAVY GOODS VEHICLES">HEAVY GOODS VEHICLES</option>
														<option @if($recpt->VehicleClass=='CONSTRUCTION EQUIPMENT VEHICLES') selected="selected"  @endif value="CONSTRUCTION EQUIPMENT VEHICLES">CONSTRUCTION EQUIPMENT VEHICLES</option>
														
														<option @if($recpt->VehicleClass=='OTHER') selected="selected"  @endif value="OTHER">OTHER</option>
                                                        
                                                                                                        </select></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="ui-grid-row">
                                        <div class="ui-grid-col-3" >
										<div id="seating_cap">
                                            <label class="field-label resp-label-section"><label id="lbl_seat_cap"
                                                    class="ui-outputlabel ui-widget"><span id="demo">Seating
                                                        Capacity(Exc. Driver)</span>
                                                    <font color="#FF0000"> *</font>
                                                </label>
                                            </label><input name="seating_c" type="text"
                                                onkeypress="return NumericOnly(event, &#39;&#39;);"
                                                class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all "
                                                id="seating_c" value="{{$recpt->seating_c}}">
                                        </div>
                                        </div>
										  <div class="ui-grid-col-3">
                                            <label class="field-label resp-label-section"><label id="lbl_sleeper_cap"
                                                    class="ui-outputlabel ui-widget">Sleeper Cap</label>
                                            </label><input id="txt_sleeper_cap" name="txt_sleeper_cap" type="text"
                                                value="" 
                                                onkeypress="return NumericOnly(event, &#39;&#39;);"
                                                class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all "
                                                role="textbox">
                                        </div><img id="j_idt340" width="14" alt=""
                                            src="../ukfiles/entry_page_files/dot_clear.gif">
											    <div class="ui-grid-col-6">
												<div id="permit_type">
                                            <label class="field-label resp-label-section"><label id="j_idt331"
                                                    class="ui-outputlabel ui-widget">Permit Type<font color="#FF0000"> *
                                                    </font></label>
                                            </label>
                                            <div id="cmb_permit_type"
                                                class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix"
                                                style="width: 173px;">
                                                <div>
                                                    <select class="form-control" data-val="true"
                                                        data-val-required="Please Permit Type" id="PermitType"
                                                        name="PermitType">
                                                        <option value="" selected="selected">---Select Permit Type---
                                                        </option>
                                                        <option  @if($recpt->PermitType=='NOT APPLICABLE') selected="selected"  @endif value="NOT APPLICABLE">NOT APPLICABLE</option>
                                                        <option @if($recpt->PermitType=='TEMPORARY PERMIT') selected="selected"  @endif value="TEMPORARY PERMIT">TEMPORARY PERMIT</option>
                                                        <option @if($recpt->PermitType=='TOURIST PERMIT') selected="selected"  @endif value="TOURIST PERMIT">TOURIST PERMIT</option>
                                                        <option @if($recpt->PermitType=='SEPECIAL PERMIT') selected="selected"  @endif value="SEPECIAL PERMIT">SEPECIAL PERMIT</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    
										<!--<div class="ui-grid-col-3">
                                            <label class="field-label resp-label-section"><label id="lbl_sleeper_cap"
                                                    class="ui-outputlabel ui-widget">Sleeper Cap</label>
                                            </label><input id="txt_sleeper_cap" name="txt_sleeper_cap" type="text"
                                                value="" maxlength="2"
                                                onkeypress="return NumericOnly(event, &#39;&#39;);"
                                                class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all "
                                                role="textbox">
                                        </div><img id="j_idt340" width="14" alt=""
                                            src="./ukfiles/entry_page_files/dot_clear.gif">-->
                                        <!--<div class="ui-grid-col-6">
                                            <label class="field-label resp-label-section"><label id="j_idt342"
                                                    class="ui-outputlabel ui-widget">Service Type<font color="#FF0000">
                                                        *</font></label>
                                            </label>
                                            <div id="service_type"
                                                class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix"
                                                style="width: 179px;">
                                                <div> <select class="form-control" data-val="true"
                                                        data-val-required="Please specify Service Type" id="ServiceType"
                                                        name="ServiceType">
                                                        <option value="" selected="selected">-- Select Service Type --
                                                        </option>
                                                        <option  @if($recpt->ServiceType=='NOT APPLICABLE') selected="selected"  @endif value="NOT APPLICABLE">NOT APPLICABLE</option>
                                                        <option @if($recpt->ServiceType=='ORDINARY') selected="selected"  @endif value="ORDINARY">ORDINARY</option>
                                                        <option @if($recpt->ServiceType=='AIR CONDITIONED') selected="selected"  @endif value="AIR CONDITIONED">AIR CONDITIONED</option>
                                                        <option @if($recpt->ServiceType=='ORDINARY (3 X 2 SEATER)') selected="selected"  @endif value="ORDINARY (3 X 2 SEATER)">ORDINARY (3 X 2 SEATER)
                                                        </option>
                                                    </select></div>
                                            </div>
                                        </div>-->
                                    </div>
                                    <div class="ui-grid-row">
									   <div class="ui-grid-col-6">
                                            <label class="field-label resp-label-section"><label id="j_idt361"
                                                    class="ui-outputlabel ui-widget">District through Entering<font color="#FF0000">
                                                        *</font></label>
                                            </label>
                                            <div id="j_idt363"
                                                class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix"
                                                style="width: 140px;">
                                                <div>
                                                    <select name="border_entry" class="form-control" id="border_entry">
                                                        <option value="" selected="selected">---Select Barrier---
                                                        </option>
							<option value="ALWAR" >ALWAR</option>
							<option value="BANSWARA" data-escape="true">BANSWARA</option>
							<option value="BARAN" data-escape="true">BARAN</option>
							<option value="BHARATPUR" data-escape="true">BHARATPUR</option>
							<option value="CHITTORGARH" data-escape="true">CHITTORGARH</option>
							<option value="CHURU" data-escape="true">CHURU</option>
							<option value="DHOLPUR" data-escape="true">DHOLPUR</option>
							<option value="DUNGARPUR" data-escape="true">DUNGARPUR</option>
							<option value="GANGANAGAR" data-escape="true">GANGANAGAR</option>
							<option value="HANUMANGARH" data-escape="true">HANUMANGARH</option>
							<option value="JAIPUR" data-escape="true">JAIPUR</option>
							<option value="JALORE" data-escape="true">JALORE</option>
							<option value="JHALAWAR" data-escape="true">JHALAWAR</option>
							<option value="JHUNJHUNU" data-escape="true">JHUNJHUNU</option>
							<option value="PRATAPGARH" data-escape="true">PRATAPGARH</option>
							<option value="SIROHI" data-escape="true">SIROHI</option>
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="ui-grid-col-6">
                                            <label class="field-label resp-label-section"><label id="j_idt361"
                                                    class="ui-outputlabel ui-widget">Check Post Name Through Entering<font color="#FF0000">
                                                        *</font></label>
                                            </label>
                                            <div id="j_idt363"
                                                class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix"
                                                style="width: 140px;">
                                                <div>
                                                    <select name="checkpost_name" class="form-control" id="checkpost_name">
                                                        <option value="" selected="selected">---Select Checckpost---
                                                        </option>
														<option value="AAKERA MOD, ALWAR(ON BILASPUR - BHIWADI ROUTE)" data-escape="true">AAKERA MOD, ALWAR(ON BILASPUR - BHIWADI ROUTE)</option>
<option value="BHIWARI MOD, RADHIWAS, BHIWADI(ON DHARUHEDA - BHIWADI ROUTE)" data-escape="true">BHIWARI MOD, RADHIWAS, BHIWADI(ON DHARUHEDA - BHIWADI ROUTE)</option>
<option value="DHARUDHA MOD, BHIWARI(ON DHARUHEDA - BHIWADI ROUTE)" data-escape="true">DHARUDHA MOD, BHIWARI(ON DHARUHEDA - BHIWADI ROUTE)</option>
<option value="NAREDA KALAN, ALWAR(ON NARNAUL - BEHROD ROUTE)" data-escape="true">NAREDA KALAN, ALWAR(ON NARNAUL - BEHROD ROUTE)</option>
<option value="NOVGAON,  ALWAR(ON SOHANA - ALWAR ROUTE)" data-escape="true">NOVGAON,  ALWAR(ON SOHANA - ALWAR ROUTE)</option>
<option value="PAKKA BAAG, ALWAR(ON AGRA - BHARATPUR ROUTE)" data-escape="true">PAKKA BAAG, ALWAR(ON AGRA - BHARATPUR ROUTE)</option>
<option value="SAHAJAHAPUR(ON GURGAON - JAIPUR ROUTE)" data-escape="true">SAHAJAHAPUR(ON GURGAON - JAIPUR ROUTE)</option>
<option value="TAWADU MOD, BHIWADI(ON SOHNA - BHIWADI ROUTE)" data-escape="true">TAWADU MOD, BHIWADI(ON SOHNA - BHIWADI ROUTE)</option>
<option value="DANPUR, BANSWARA(ON RATLAM - BANSWARA ROUTE)" data-escape="true">DANPUR, BANSWARA(ON RATLAM - BANSWARA ROUTE)</option>
<option value="MONA DUNGAR, BANSWARA(ON JHALOD - BANSWARA ROUTE)" data-escape="true">MONA DUNGAR, BANSWARA(ON JHALOD - BANSWARA ROUTE)</option>
<option value="KASBA THANA, BARAN(ON SHIVPURI - BARAN ROUTE)" data-escape="true">KASBA THANA, BARAN(ON SHIVPURI - BARAN ROUTE)</option>
<option value="BAHAJ, BHARATPUR(ON MATHURA - DEEG ROUTE)" data-escape="true">BAHAJ, BHARATPUR(ON MATHURA - DEEG ROUTE)</option>
<option value="DHILAWATI, BHARATPUR(ON KOSHI - KAMAN ROUTE)" data-escape="true">DHILAWATI, BHARATPUR(ON KOSHI - KAMAN ROUTE)</option>
<option value="JURHARA, KAMA(ON PUNHANA - KAMAN ROUTE)" data-escape="true">JURHARA, KAMA(ON PUNHANA - KAMAN ROUTE)</option>
<option value="RARAH, BHARATPUR(ON MATHURA - BHARATPUR ROUTE)" data-escape="true">RARAH, BHARATPUR(ON MATHURA - BHARATPUR ROUTE)</option>
<option value="UNCHA NANGLA, BHARATPUR(ON AGRA - BHARATPUR ROUTE)" data-escape="true">UNCHA NANGLA, BHARATPUR(ON AGRA - BHARATPUR ROUTE)</option>
<option value="NIMBAHERA, CHITTORGARH(ON NIMACH CHITTORGARH - DHOLPUR ROUTE)" data-escape="true">NIMBAHERA, CHITTORGARH(ON NIMACH CHITTORGARH - DHOLPUR ROUTE)</option>
<option value="RAJGARH, CHURU(ON HISAR - RAJGARH - CHURU ROUTE)" data-escape="true">RAJGARH, CHURU(ON HISAR - RAJGARH - CHURU ROUTE)</option>
<option value="BARETHA, DHOLPUR(ON AGRA - DHOLPUR ROUTE)" data-escape="true">BARETHA, DHOLPUR(ON AGRA - DHOLPUR ROUTE)</option>
<option value="CHAMBAL, DHOLPUR(ON MURENA - DHOLPUR ROUTE)" data-escape="true">CHAMBAL, DHOLPUR(ON MURENA - DHOLPUR ROUTE)</option>
<option value="RATANPUR, DUNGARPUR(ON AHMEDABAD - UDAIPUR ROUTE)" data-escape="true">RATANPUR, DUNGARPUR(ON AHMEDABAD - UDAIPUR ROUTE)</option>
<option value="SIMMALWADA, DUNGARPUR(ON MODASA - DUNGARPUR ROUTE)" data-escape="true">SIMMALWADA, DUNGARPUR(ON MODASA - DUNGARPUR ROUTE)</option>
<option value="PATLI, S.GANGANAGAR(ON ABOHAR - HANUMANGARH ROUTE)" data-escape="true">PATLI, S.GANGANAGAR(ON ABOHAR - HANUMANGARH ROUTE)</option>
<option value="SADHUWALI, S.GANGANAGAR(ON ABOHAR - GANGANAGAR ROUTE)" data-escape="true">SADHUWALI, S.GANGANAGAR(ON ABOHAR - GANGANAGAR ROUTE)</option>
<option value="BHADARA, HANUMANGARH(ON HISAR - HANUMANGARH ROUTE)" data-escape="true">BHADARA, HANUMANGARH(ON HISAR - HANUMANGARH ROUTE)</option>
<option value="SANGARIA, HANUMANGARH(ON DABWALI - HANUMANGARH ROUTE)" data-escape="true">SANGARIA, HANUMANGARH(ON DABWALI - HANUMANGARH ROUTE)</option>
<option value="GONERA, JAIPUR(ON NARNAUL - KOTPUTLI ROUTE)" data-escape="true">GONERA, JAIPUR(ON NARNAUL - KOTPUTLI ROUTE)</option>
<option value="MAKHUPURA, JALORE(ON DEESA - THARAD - BARMER ROUTE)" data-escape="true">MAKHUPURA, JALORE(ON DEESA - THARAD - BARMER ROUTE)</option>
<option value="MANDARADI, JALORE(ON BANSAKANTHA - BHINMAL ROUTE)" data-escape="true">MANDARADI, JALORE(ON BANSAKANTHA - BHINMAL ROUTE)</option>
<option value="RAIPUR, JHALAWAR(ON SOYAG - JHALAWAR ROUTE)" data-escape="true">RAIPUR, JHALAWAR(ON SOYAG - JHALAWAR ROUTE)</option>
<option value="TEENDHAR, TEEN-DHAR JHALAWAR(ON RAJGARH - JHALAWAR ROUTE)" data-escape="true">TEENDHAR, TEEN-DHAR JHALAWAR(ON RAJGARH - JHALAWAR ROUTE)</option>
<option value="NAWATA KI DHANI, JHUNJHUNU(ON NARNAUL - JHUNJHUNU ROUTE)" data-escape="true">NAWATA KI DHANI, JHUNJHUNU(ON NARNAUL - JHUNJHUNU ROUTE)</option>
<option value="PILOD, JHUNJHUNU(ON NARNAUL - LOHARU SURAJGARH JHUNJHUNU ROUTE)" data-escape="true">PILOD, JHUNJHUNU(ON NARNAUL - LOHARU SURAJGARH JHUNJHUNU ROUTE)</option>
<option value="PIPLI, JHUNJHUNU(ON LOHARU - PILANI JHUNJHUNU ROUTE)" data-escape="true">PIPLI, JHUNJHUNU(ON LOHARU - PILANI JHUNJHUNU ROUTE)</option>
<option value="GOMANA, CHHOTI SHADRI, PRATAPGARH(ON NEEMACH - CHOTI SADRI ROUTE)" data-escape="true">GOMANA, CHHOTI SHADRI, PRATAPGARH(ON NEEMACH - CHOTI SADRI ROUTE)</option>
<option value="PRATAPGARH(ON PRATAPGARH - MANSOR ROUTE)" data-escape="true">PRATAPGARH(ON PRATAPGARH - MANSOR ROUTE)</option>
<option value="MANDAR, JALORE(ON DEESA - SIROHI ROUTE)" data-escape="true">MANDAR, JALORE(ON DEESA - SIROHI ROUTE)</option>
<option value="MAWAL, ABU ROAD(ON PALANPUR - ABU ROAD ROUTE)" data-escape="true">MAWAL, ABU ROAD(ON PALANPUR - ABU ROAD ROUTE)</option>
							
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    
                                    </div>
                                   <!-- <div class="ui-grid-row">
                                        <div class="ui-grid-col-3">
                                            <label class="field-label resp-label-section"><label id="j_idt357"
                                                    class="ui-outputlabel ui-widget">Permit Number:<font
                                                        color="#FF0000"> *</font></label>
                                            </label><input id="permit_no" name="permit_no" type="text"
                                                class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all input"
                                                value="{{$recpt->permit_no}}">
                                        </div>
                                        <div class="ui-grid-col-3">
                                            <label class="field-label resp-label-section"><label id="j_idt361"
                                                    class="ui-outputlabel ui-widget">Barrier Name<font color="#FF0000">
                                                        *</font></label>
                                            </label>
                                            <div id="j_idt363"
                                                class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix"
                                                style="width: 140px;">
                                                <div>
                                                    <select name="border_entry" class="form-control" id="border_entry">
                                                        <option value="" selected="selected">---Select Barrier---
                                                        </option>
                                                        <option @if($recpt->border_entry=='ASHARODI') selected="selected"  @endif value="ASHARODI">ASHARODI</option>
                                                        <option @if($recpt->border_entry=='KULHAL') selected="selected"  @endif value="KULHAL">KULHAL</option>
                                                        <option @if($recpt->border_entry=='TIMLI') selected="selected"  @endif value="TIMLI">TIMLI</option>
                                                        <option @if($recpt->border_entry=='TUNI') selected="selected"  @endif value="TUNI">TUNI</option>
                                                        <option @if($recpt->border_entry=='BHAGWANPUR (IQBALPUR)') selected="selected"  @endif value="BHAGWANPUR (IQBALPUR)">BHAGWANPUR (IQBALPUR)
                                                        </option>
                                                        <option @if($recpt->border_entry=='CHIDYAPUR') selected="selected"  @endif value="CHIDYAPUR">CHIDYAPUR</option>
                                                        <option @if($recpt->border_entry=='MANGLORE(GURUKUL NARSEN)') selected="selected"  @endif value="MANGLORE(GURUKUL NARSEN)">MANGLORE(GURUKUL
                                                            NARSEN)</option>
                                                        <option @if($recpt->border_entry=='KAUDIA') selected="selected"  @endif value="KAUDIA">KAUDIA</option>
                                                        <option @if($recpt->border_entry=='BAJPUR (DORAHA)') selected="selected"  @endif value="BAJPUR (DORAHA)">BAJPUR (DORAHA)</option>
                                                        <option @if($recpt->border_entry=='BANBASA') selected="selected"  @endif value="BANBASA">BANBASA</option>
                                                        <option @if($recpt->border_entry=='DAURAHA') selected="selected"  @endif value="DAURAHA">DAURAHA</option>
                                                        <option @if($recpt->border_entry=='JASPUR') selected="selected"  @endif value="JASPUR">JASPUR</option>
                                                        <option @if($recpt->border_entry=='KASHIPUR (THAKURDWARA)') selected="selected"  @endif value="KASHIPUR (THAKURDWARA)">KASHIPUR (THAKURDWARA)
                                                        </option>
                                                        <option @if($recpt->border_entry=='MANJHOLA') selected="selected"  @endif value="MANJHOLA">MANJHOLA</option>
                                                        <option @if($recpt->border_entry=='MELAGHAT') selected="selected"  @endif value="MELAGHAT">MELAGHAT</option>
                                                        <option @if($recpt->border_entry=='NADEHI') selected="selected"  @endif value="NADEHI">NADEHI</option>
                                                        <option @if($recpt->border_entry=='PULBHATTA') selected="selected"  @endif value="PULBHATTA">PULBHATTA</option>
                                                        <option @if($recpt->border_entry=='RUDRAPUR') selected="selected"  @endif value="RUDRAPUR">RUDRAPUR</option>
                                                        <option @if($recpt->border_entry=='SITARGANJ') selected="selected"  @endif value="SITARGANJ">SITARGANJ</option>
                                                    </select>
                                                </div><label id="j_idt363_label"
                                                    class="ui-selectonemenu-label ui-inputfield ui-corner-all"
                                                    style="width: 187px;">---Select Barrier---</label>
                                            </div>
                                        </div><img id="j_idt367" width="14px;" alt=""
                                            src="./ukfiles/entry_page_files/dot_clear.gif">
                                        <div class="ui-grid-col-3">
                                            <label class="field-label resp-label-section"><label id="j_idt369"
                                                    class="ui-outputlabel ui-widget">Permit From<font color="#FF0000"> *
                                                    </font></label>
                                            </label><span id="j_idt371"><input id="permit_from" name="permit_from"
                                                    type="text"
                                                    class="ui-inputfield ui-widget ui-state-default ui-corner-all  "
                                            placeholder="DD-MM-YYYY" value="{{$recpt->permit_from}}"></span>
                                        </div>
                                        <div class="ui-grid-col-3">
                                            <label class="field-label resp-label-section"><label id="j_idt373"
                                                    class="ui-outputlabel ui-widget">Permit Upto<font color="#FF0000"> *
                                                    </font></label>
                                            </label><span id="j_idt375"><input id="permit_upto" name="permit_upto"
                                                    type="text"
                                                    class="ui-inputfield ui-widget ui-state-default ui-corner-all "
                                                    placeholder="DD-MM-YYYY" value="{{$recpt->permit_upto}}"></span>
                                        </div>
                                    </div>-->
                                    <div class="ui-grid-row">
                                        <div class="ui-grid-col-3">
                                            <label class="field-label resp-label-section"><label id="j_idt377"
                                                    class="ui-outputlabel ui-widget">Tax Mode<font color="#FF0000"> *
                                                    </font></label>
                                            </label>
                                            <div id="cmb_payment_mode"
                                                class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix"
                                                style="width: 192px;">
                                                <div>
                                                    <div id="cmb_payment_mode"
                                                        class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix"
                                                        style="width: 192px;">
                                                        <div><select class="form-control" data-val="true"
                                                                data-val-required="Please specify Tax Mode" id="TaxMode"
                                                                name="TaxMode">
                                                                <option value="" selected="selected">-- Select Tax Mode
                                                                    --</option>
                                                                <option @if($recpt->TaxMode=='DAYS') selected="selected"  @endif value="DAYS">DAYS</option>
                                                                <option @if($recpt->TaxMode=='WEEKLY') selected="selected"  @endif value="WEEKLY">WEEKLY</option>
                                                                <option @if($recpt->TaxMode=='Monthly') selected="selected"  @endif value="Monthly">MONTHLY</option>
                                                                <option @if($recpt->TaxMode=='Quarterly') selected="selected"  @endif value="Quarterly">QUARTERLY</option>
                                                            </select></div>
                                                    </div>
                                                </div><label id="cmb_payment_mode_label"
                                                    class="ui-selectonemenu-label ui-inputfield ui-corner-all"
                                                    style="width: 187px;">---Select Payment Mode---</label>
                                            </div>
                                        </div>
                                        <div class="ui-grid-col-3">
                                            <label class="field-label resp-label-section"><label id="j_idt382"
                                                    class="ui-outputlabel ui-widget">No of Period<font color="#FF0000">
                                                        *</font></label>
                                            </label><input id="txt_no_of_weeks" name="txt_no_of_weeks" type="text"
                                                maxlength="2" onkeypress="return NumericOnly(event, &#39;&#39;);"
                                                class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all "
                                                role="textbox" >
                                        </div><img id="j_idt385" width="14px;" alt=""
                                            src="../ukfiles/entry_page_files/dot_clear.gif">
                                        <div class="ui-grid-col-3">
                                            <label class="field-label resp-label-section"><label id="j_idt387"
                                                    class="ui-outputlabel ui-widget">Tax From<font color="#FF0000"> *
                                                    </font></label>
                                            </label><span id="cal_tax_from">
                                                @php
                                                $timePaid = strtoupper(now()->format('d-M-Y'));
                                                @endphp
                                                <input id="tax_from" name="tax_from"
                                                    type="text"
                                                    class="ui-inputfield ui-widget ui-state-default ui-corner-all  "
                                            placeholder="DD-MM-YYYY" value="{{$timePaid}}"></span>
                                        </div>
                                        <div class="ui-grid-col-3">
                                            <label class="field-label resp-label-section"><label id="j_idt390"
                                                    class="ui-outputlabel ui-widget">Tax Upto<font color="#FF0000"> *
                                                    </font></label>
                                            </label><span id="cal_tax_to"><input id="tax_upto" name="tax_upto"
                                                    type="text"
                                                    class="ui-inputfield ui-widget ui-state-default ui-corner-all "
                                                    placeholder="DD-MM-YYYY"></span>
                                        </div>
                                    </div>
                                    <div class="ui-grid-row top-space">
                                        <div class="ui-grid-col-12">
                                            <div id="qqq" class="ui-datatable ui-widget">
                                                <div class="ui-datatable-tablewrapper">
                                                    <table role="grid">
                                                        <thead id="qqq_head">
                                                            <tr role="row">
                                                                <th id="qqq:j_idt393" class="ui-state-default"
                                                                    role="columnheader" style="width: 40px;"><span>Sl.
                                                                        No.</span></th>
                                                                <th id="qqq:j_idt395" class="ui-state-default"
                                                                    role="columnheader"><span>Particulars</span></th>
                                                                <th id="qqq:j_idt397" class="ui-state-default"
                                                                    role="columnheader"><span>Tax From</span></th>
                                                                <th id="qqq:j_idt399" class="ui-state-default"
                                                                    role="columnheader"><span>Tax Upto</span></th>
                                                                <th id="qqq:j_idt401" class="ui-state-default"
                                                                    role="columnheader"><span>Amount</span></th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot></tfoot>
                                                        <tbody id="qqq_data"
                                                            class="ui-datatable-data ui-widget-content">
                                                            <tr class="ui-widget-content ui-datatable-empty-message">
                                                                <td colspan="5">No records found.</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ui-grid-row">
                                        <div class="ui-grid-col-6">
                                            <label class="field-label resp-label-section"><label id="j_idt404"
                                                    class="ui-outputlabel ui-widget">Tax Amount<font color="#FF0000"> *
                                                    </font></label>
                                            </label><input id="total_tax_amount" name="total_tax_amount" type="text"
                                                class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all"
                                                role="textbox">
                                        </div>
                                        
										<div class="ui-grid-col-6">
                                            <label class="field-label resp-label-section"><label id="j_idt404"
                                                    class="ui-outputlabel ui-widget">Counter Signature Fee<font
                                                        color="#FF0000"> *</font></label>
                                            </label><input id="civic_amount" name="civik_amount" type="text"
                                                class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all "
                                                role="textbox">
                                        </div>
										<div class="ui-grid-col-6">
                                            <label class="field-label resp-label-section"><label id="j_idt404"
                                                    class="ui-outputlabel ui-widget">Surcharge fee<font
                                                        color="#FF0000"> *</font></label>
                                            </label><input id="service_amount" name="service_amount" type="text"
                                                class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all"
                                                role="textbox">
                                        </div>
                                        
                                        <!--<div class="ui-grid-col-6">
                                            <div class="ui-grid-row">
                                                <div class="ui-grid-col-12 top_mar1 mar-left5">
                                                    <input type="submit"
                                                        class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left"
                                                        name="Pay_Tax" id="Pay_Tax" value="Pay Tax">

                                                </div>
                                            </div>
                                        </div>-->
										
										<div class="ui-grid-col-6">
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-12 top_mar1 mar-left5">
									<button id="calculate" name="calculate" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onClick="calculatefunction();" type="button" role="button" aria-disabled="false"><span class="ui-button-icon-left ui-icon ui-c ui-icon-calculator"></span><span class="ui-button-text ui-c">Calculate Tax</span></button>
        <button id="Pay_Tax" name="Pay_Tax" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onClick="" type="submit" role="button" aria-disabled="false"><span class="ui-button-icon-left ui-icon ui-c ui-icon-calculator"></span><span class="ui-button-text ui-c">Pay Tax</span></button>

                                    </div>
                                </div>
                            </div>
                                    </div>
                                </div>
								</div>
                                <div id="j_idt412_blocker"
                                    class="ui-blockui ui-widget-overlay ui-helper-hidden ui-corner-all"></div>
                                <div id="j_idt412"
                                    class="ui-blockui-content ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow">
                                    <img id="j_idt413" src="../ukfiles/entry_page_files/ajax_loader_blue.gif" alt=""
                                        width="30%" height="40%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="uktaxcollectionDLG"
                class="ui-dialog ui-widget ui-widget-content ui-overlay-hidden ui-corner-all ui-shadow ui-draggable"
                role="dialog" aria-labelledby="uktaxcollectionDLG_title" aria-hidden="true"
                style="width: 550px; height: auto;">
                <div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span
                        id="uktaxcollectionDLG_title" class="ui-dialog-title">Confirmation Message...</span><a
                        href="https://vahan.parivahan.gov.in/checkpost/faces/public/payment/TaxCollectionMainOnline.xhtml#"
                        class="ui-dialog-titlebar-icon ui-dialog-titlebar-close ui-corner-all" role="button"><span
                            class="ui-icon ui-icon-closethick"></span></a></div>
                <div class="ui-dialog-content ui-widget-content" style="height: 260px;">
                    <center>
                        <table id="confirmationdlg">
                            <tbody>
                                <tr>
                                    <td><span style="font-size: 13pt;font-weight: bold;">Registration No</span></td>
                                    <td><span style="font-size: 13pt;font-weight: bold;">:</span></td>
                                    <td><span style="font-size: 13pt;font-weight: bold;"></span></td>
                                </tr>
                                <tr>
                                    <td><span style="font-size: 12pt;">Owner Name</span></td>
                                    <td><span style="font-size: 12pt;">:</span></td>
                                    <td><span style="font-size: 12pt;"></span></td>
                                </tr>
                                <tr>
                                    <td><span style="font-size: 12pt;">Chassis Number</span></td>
                                    <td><span style="font-size: 12pt;">:</span></td>
                                    <td><span style="font-size: 12pt;"></span></td>
                                </tr>
                                <tr>
                                    <td><span style="font-size: 12pt;">Tax From Date</span></td>
                                    <td><span style="font-size: 12pt;">:</span></td>
                                    <td><span style="font-size: 12pt;"></span></td>
                                </tr>
                                <tr>
                                    <td><span style="font-size: 12pt;">Tax To Date</span></td>
                                    <td><span style="font-size: 12pt;">:</span></td>
                                    <td><span style="font-size: 12pt;"></span></td>
                                </tr>
                                <tr>
                                    <td><span style="font-size: 12pt;">Amount</span></td>
                                    <td><span style="font-size: 12pt;">:</span></td>
                                    <td><span style="font-size: 12pt;">/-</span></td>
                                </tr>
                                <tr>
                                    <td><span style="font-size: 12pt;">Payment Mode</span></td>
                                    <td><span style="font-size: 12pt;">:</span></td>
                                    <td><span style="font-size: 12pt;">ONLINE</span></td>
                                </tr>
                            </tbody>
                        </table>
                        <hr id="j_idt437" class="ui-separator ui-state-default ui-corner-all"><button id="j_idt439"
                            name="j_idt439"
                            class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="submit"
                            role="button" aria-disabled="false"><span
                                class="ui-button-text ui-c">Confirm</span></button><button id="j_idt440" name="j_idt440"
                            class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only"
                            onclick="PF(&#39;ConfirmationDLG&#39;).hide();;PrimeFaces.ab({source:&#39;j_idt440&#39;});return false;"
                            type="submit" role="button" aria-disabled="false"><span
                                class="ui-button-text ui-c">Cancel</span></button>
                    </center>
                </div>
            </div>

        </div>

    </form>

    <script src="{{asset('raj/jquery/external/jquery/jquery.js?v='.uniqid())}}"></script>
    <script src="{{asset('raj/jquery/jquery-ui.js?v='.uniqid())}}"></script>

<script>
  $( function() {
    $( "#fitdte" ).datepicker({ dateFormat: 'dd-M-yy' });
  } );
  $( function() {
    $( "#permit_from" ).datepicker({ dateFormat: 'dd-M-yy' });
  } );
  $( function() {
    $( "#permit_upto" ).datepicker({ dateFormat: 'dd-M-yy' });
  } );
  $( function() {
    $( "#tax_from" ).datepicker({ dateFormat: 'dd-M-yy' });
  } );
  $( function() {
    $( "#tax_upto" ).datepicker({ dateFormat: 'dd-M-yy' });
  } );
  </script>
   <script>
  function calculatefunction(){
      var date3 = document.getElementById("tax_from").value
	  var date4 = document.getElementById("tax_upto").value
      var date2 = new Date(date4);
      var date1 = new Date(date3);
      var timeDiff = Math.abs(date2.getTime() - date1.getTime());
          var timedif = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1;
	 var capacity2 = document.getElementById("seating_c").value
	  /* if(capacity2 == ""){
	    alert('Please enter Capacity');
		exit;
	  } */

	  if( document.getElementById("VehicleClass").value == 'MOTOR CAB' || document.getElementById("VehicleClass").value == 'MAXI CAB' || document.getElementById("VehicleClass").value == 'OMNI BUS' || document.getElementById("VehicleClass").value == 'BUS')
	  {
	     if(document.getElementById("TaxMode").value == 'DAYS')
		 {
		   if(document.getElementById("ServiceType").value == 'AIR CONDITIONED'){

		      var totaltax = timedif * 30 * capacity2;
			  document.getElementById("total_tax_amount").value = totaltax;

		   }else{
		      var totaltax = timedif * 20 * capacity2;
			 document.getElementById("total_tax_amount").value = totaltax;
		   }
		 }

		 if(document.getElementById("TaxMode").value == 'Monthly')
		 {
		   if(document.getElementById("ServiceType").value == 'AIR CONDITIONED'){

		      var totaltax = 12 * 30 * capacity2;
			  document.getElementById("total_tax_amount").value = totaltax;

		   }else{
		      var totaltax = 12 * 20 * capacity2;
			 document.getElementById("total_tax_amount").value = totaltax;
		   }
		 }
	  }else{

	     if(document.getElementById("VehicleClass").value == 'LIGHT GOODS VEHICLE'){
		     var totaltax = timedif * 50;
			 document.getElementById("total_tax_amount").value = totaltax;
		 }else if(document.getElementById("VehicleClass").value == 'MEDIUM GOODS VEHICLE'){
		     var totaltax = timedif * 75;
			 document.getElementById("total_tax_amount").value = totaltax;
		 }else{
		     var totaltax = timedif * 100;
			 document.getElementById("total_tax_amount").value = totaltax;
		 }


	  }
  }
  </script>
</body></html>
