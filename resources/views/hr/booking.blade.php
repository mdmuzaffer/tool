
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
                            <a href="{{route('user.booking.hr')}}" style="color:#ffffff">Home</a> | <a href="{{route('user.apply.list.hr')}}" style="color:#ffffff">List</a> | <a
                                style="color:#FFFFFF; padding:5px;" href="{{route('select-state')}}">Change State</a> |  <a
                                style="color:#FFFFFF; padding:5px;" href="{{route('all-booking')}}">All Booking</a>  | <a href="{{route('user.logout.hr')}}" style="color:#ffffff">Logout</a>

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
            </body></html>
