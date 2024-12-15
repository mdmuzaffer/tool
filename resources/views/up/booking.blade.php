

<!DOCTYPE html>
<!-- saved from url=(0091)https://vahan.parivahan.gov.in/checkpost/faces/public/payment/TaxCollectionMainOnline.xhtml -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><link type="text/css" rel="stylesheet" href="../Checkpost_135_8_files/theme.css"><link type="text/css" rel="stylesheet" href="../Checkpost_135_8_files/layout.css"><link type="text/css" rel="stylesheet" href="../Checkpost_135_8_files/grid-css.css"><link type="text/css" rel="stylesheet" href="../Checkpost_135_8_files/primefaces.css"><script type="text/javascript" src="../Checkpost_135_8_files/jquery.js.download"></script><script type="text/javascript" src="../Checkpost_135_8_files/jquery-plugins.js.download"></script><script type="text/javascript" src="../Checkpost_135_8_files/primefaces.js.download"></script><script type="text/javascript" src="../Checkpost_135_8_files/jsf.js.download"></script>
        <title>Checkpost~135~8</title>
        <link rel="icon" href="https://vahan.parivahan.gov.in/vahan-icon.png" sizes="16x16" type="image/png"><script type="text/javascript" src="../Checkpost_135_8_files/bootstrap.js.download"></script><script type="text/javascript" src="../Checkpost_135_8_files/commonvalidation.js.download"></script>
        <link rel="icon" href="https://vahan.parivahan.gov.in/images/vahan-icon.png" sizes="16x16" type="image/png">
        <style>
        input {

            text-transform:uppercase;
        }


        </style>
        </head><body style="">
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
      document.location = "{{route('user.booking')}}?vehicleno="+d;
	}else{
	  alert("Please enter vehicle number");
	}
}
</script>

<!-- validation -->
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
<!-- validation end -->

<form id="master_Layout_form" name="master_Layout_form" method="post" action="{{ route('user.booking.create')}}" autocomplete="off" enctype="application/x-www-form-urlencoded" onSubmit="return validateform();">
    @csrf
    <input type="hidden" name="master_Layout_form" value="master_Layout_form">

            <div>
                <!--                &lt;ui:include src="/headerBeforeLogin.xhtml"/&gt;-->
                <!-- from header before login.xhtml start        -->
                <nav class="navbar navbar-default navigation-background" role="navigation">
                    <div class="ui-grid ui-grid-responsive">
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2 left_logo">
                                <a style="display: inline-block;" class="top-space"><img id="j_idt11" src="../Checkpost_135_8_files/logo_e-vahan.png" alt="Parivahan Sewa" style="width: auto;">
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
                       <a href="{{route('user.booking')}}" style="color:#FFFFFF; padding:5px;">Home</a> | <a style="color:#FFFFFF; padding:5px;" href="{{route('user.apply.list')}}">Print Vehicle receipt</a> | <a
                       style="color:#FFFFFF; padding:5px;" href="{{route('select-state')}}">Change State</a> |  <a
                       style="color:#FFFFFF; padding:5px;" href="{{route('all-booking')}}">All Booking</a>  | <a style="color:#FFFFFF; padding:5px;" href="{{route('user.logout')}}">Logout</a>
                    </div>


                <div class="main_news_w">
                    <div class="news_w">
                        <div style="color: #FFFFFF;font-weight: bold;font-size: 13pt;">
                            <marquee scrollamount="2" behavior="alternate" scrolldelay="1" onMouseOver="this.stop();" onMouseOut="this.start();" direction="left">Please pay tax in advance to avoid any last minute hassle.</marquee>
                        </div>
                    </div>
                </div>
                <!-- from header before login.xhtml end        -->
            </div>
            <div>
        <div><div id="popup" class="ui-dialog ui-widget ui-widget-content ui-overlay-hidden ui-corner-all ui-shadow center-position ui-resizable" role="dialog" aria-labelledby="popup_title" aria-hidden="true" style="width: auto; height: auto;"><div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="popup_title" class="ui-dialog-title"></span></div><div class="ui-dialog-content ui-widget-content" style="height: auto;"><div id="j_idt33" class="ui-messages ui-widget" aria-live="polite"></div><button id="j_idt34" name="j_idt34" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onClick="mojarra.ab(&#39;j_idt34&#39;,event,&#39;click&#39;,0,&#39;uptaxcollection popup&#39;);PrimeFaces.ab({source:&#39;j_idt34&#39;,oncomplete:function(xhr,status,args){PF(&#39;dlg1&#39;).hide();;}});return false;" type="submit" role="button" aria-disabled="false"><span class="ui-button-text ui-c">Ok</span></button></div><div class="ui-resizable-handle ui-resizable-n" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-w" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-ne" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-nw" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-sw" style="z-index: 90;"></div></div>
    <div class="container">
        <div class="ui-grid ui-grid-responsive">
            <div class="ui-grid-row">
                <div class="ui-grid-col-12 center-position contents-Space">
                    <h1 class="header-main">Vehicle Tax Payment For,<span class="red"> UTTAR PRADESH</span></h1>
                </div>
            </div>
            <center><div style="color: #006bb3;font-weight: bold;font-size: 10pt;"></div>
            </center>
            <div class="ui-grid-row">
                <div class="ui-grid-col-2 resp-blank-height"></div>
                <div class="ui-grid-col-8"><div id="uptaxcollection" class="ui-panel ui-widget ui-widget-content ui-corner-all bottom-space" data-widget="widget_uptaxcollection"><div id="uptaxcollection_header" class="ui-panel-titlebar ui-widget-header ui-helper-clearfix ui-corner-all"><span class="ui-panel-title">Tax Payment Details</span></div><div id="uptaxcollection_content" class="ui-panel-content ui-widget-content">
                        <div class="ui-grid-row">
                          <div class="ui-grid-col-6">
                                <label class="field-label resp-label-section"><label id="j_idt37" class="ui-outputlabel ui-widget">Vehicle No.<font color="#FF0000"> *</font></label>
                                </label>
                                <input name="vehicleno" type="text"  id="vehicleno" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" value="{{$recpt->vehicleno}}" />
                          </div>
                            <div class="ui-grid-col-6">
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-12 top_mar1 mar-left5">
									<button id="j_idt425" name="j_idt425" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onClick="clickfunction2();" title="Click to get owner and vehicle details from Vahan 4." role="button" type="button" aria-disabled="false"><span class="ui-button-icon-left ui-icon ui-c ui-icon-arrowthick-1-s"></span><span class="ui-button-text ui-c">Get Details</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-6">
                                <label class="field-label resp-label-section"><label id="j_idt43" class="ui-outputlabel ui-widget">Chassis No.<font color="#FF0000"> *</font></label>
                                </label><input name="chassisno" type="text" value="{{$recpt->chassisno}}"  id="chassisno" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" />
                            </div>
                            <div class="ui-grid-col-6">
                                <label class="field-label resp-label-section"><label id="j_idt47" class="ui-outputlabel ui-widget">Owner Name<font color="#FF0000"> *</font></label>
                                </label><input name="ownername" type="text"  id="ownername" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " value="{{$recpt->ownername}}" />
                            </div>
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-6">
                                <label class="field-label resp-label-section"><label id="j_idt51" class="ui-outputlabel ui-widget">Mobile No.<font color="#FF0000"> *</font></label>
                                </label><input name="mobile" type="text"  id="mobile" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" value="{{$recpt->mobile}}" />
                            </div>
                            <div class="ui-grid-col-6">
                                <label class="field-label resp-label-section"><label id="j_idt54" class="ui-outputlabel ui-widget">From State<font color="#FF0000"> *</font></label>
                                </label><div id="j_idt56" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix" style="width: 196px;"><div >


                                    <select name="from_state" class="form-control" id="from_state">
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
                        </select></div><div class="ui-selectonemenu-trigger ui-state-default ui-corner-right"><span class="ui-icon ui-icon-triangle-1-s"></span></div></div>
                            </div>
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-6">
                                <label class="field-label resp-label-section"><label id="j_idt60" class="ui-outputlabel ui-widget">Vehicle Permit Type<font color="#FF0000"> *</font></label>
                                </label><div id="j_idt321" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix" style="width: 345px;"><div>
                                    <select class="form-control" data-val="true" data-val-required="Please specify Vehicle Type" id="VehicleType" name="VehicleType" onChange="myFunction()">
          <option value="" selected="selected" >-- Select Vehicle Type --</option>
          <option @if($recpt->VehicleType=='CONTRACT CARRIAGE/PASSENGER   VEHICLES') selected="selected"  @endif  value="CONTRACT CARRIAGE/PASSENGER   VEHICLES" >CONTRACT CARRIAGE/PASSENGER VEHICLES</option>
           <option @if($recpt->VehicleType=='PRIVATE SERVICE VEHICLE') selected="selected"  @endif value="PRIVATE SERVICE VEHICLE" >PRIVATE SERVICE VEHICLE</option>
          <option @if($recpt->VehicleType=='GOODS VEHICLE') selected="selected"  @endif value="GOODS VEHICLE" >GOODS VEHICLE</option>
           <option @if($recpt->VehicleType=='STAGE CARRIAGE') selected="selected"  @endif value="STAGE CARRIAGE" >STAGE CARRIAGE</option>
           <option @if($recpt->VehicleType=='CONSTRUCTION EQUIPMENT VEHICLE') selected="selected"  @endif value="CONSTRUCTION EQUIPMENT VEHICLE" >CONSTRUCTION EQUIPMENT VEHICLE</option>
           <option @if($recpt->VehicleType=='TEMPORARY REGISTERED VEHICLE') selected="selected"  @endif value="TEMPORARY REGISTERED VEHICLE" >TEMPORARY REGISTERED VEHICLE</option>
        </select></div></div>
                            </div>
                          <div class="ui-grid-col-6">
                                <label class="field-label resp-label-section"><label id="j_idt66" class="ui-outputlabel ui-widget">Vehicle Class<font color="#FF0000"> *</font></label>
                                </label><div id="j_idt68" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix" style="width: 182px;"><div>
                                    <select class="form-control" data-val="true" data-val-required="Please specify Vehicle Class" id="VehicleClass" name="VehicleClass">
          <option value=""  selected="selected">-- Select Vehicle Class --</option>
          <option @if($recpt->VehicleClass=='MOTOR CAB') selected="selected"  @endif value="MOTOR CAB" >MOTOR CAB</option>
          <option @if($recpt->VehicleClass=='MAXI CAB') selected="selected"  @endif value="MAXI CAB" >MAXI CAB</option>
          <option @if($recpt->VehicleClass=='OMNI BUS') selected="selected"  @endif value="OMNI BUS" >OMNI BUS</option>
          <option @if($recpt->VehicleClass=='BUS') selected="selected"  @endif value="BUS" >BUS</option>
          <option @if($recpt->VehicleClass=='LIGHT GOODS VEHICLE') selected="selected"  @endif value="LIGHT GOODS VEHICLE" >LIGHT GOODS VEHICLE</option>
          <option @if($recpt->VehicleClass=='MEDIUM GOODS VEHICLE') selected="selected"  @endif value="MEDIUM GOODS VEHICLE" >MEDIUM GOODS VEHICLE</option>
          <option @if($recpt->VehicleClass=='HEAVY GOODS VEHICLE') selected="selected"  @endif value="HEAVY GOODS VEHICLE" >HEAVY GOODS VEHICLE</option>
        </select></div></div>
                            </div>
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section"><label id="lbl_seat_cap" class="ui-outputlabel ui-widget"><span id="demo">Seating Capacity(Exc. Driver)</span><font color="#FF0000"> *</font></label>
                                </label><input name="seating_c" type="text" onKeyPress="return NumericOnly(event, &#39;&#39;);" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all "  id="seating_c" value="{{$recpt->seating_c}}" />
                            </div>
<div class="ui-grid-col-3">
                                <label class="field-label resp-label-section"><label id="lbl_sleeper_cap" class="ui-outputlabel ui-widget">Sleeper Cap</label>
                                </label><input id="txt_sleeper_cap" name="txt_sleeper_cap" type="text" value="0" maxlength="2" onKeyPress="return NumericOnly(event, &#39;&#39;);" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " role="textbox"  >
                            </div>
                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section"><label id="j_idt74" class="ui-outputlabel ui-widget">Service Type<font color="#FF0000"> *</font></label>
                                </label><div id="service_type" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix ui-state-focus" style="width: 206px;"><div>
                                    <select class="form-control" data-val="true" data-val-required="Please specify Service Type" id="ServiceType" name="ServiceType">
          <option value="" selected="selected">-- Select Service Type --</option>
          <option @if($recpt->ServiceType=='NOT APPLICABLE') selected="selected"  @endif value="NOT APPLICABLE" >NOT APPLICABLE</option>
          <option @if($recpt->ServiceType=='ORDINARY') selected="selected"  @endif value="ORDINARY" >ORDINARY</option>
          <option @if($recpt->ServiceType=='AIR CONDITIONED') selected="selected"  @endif value="AIR CONDITIONED" >AIR CONDITIONED</option>
        </select></div></div>
                            </div>
                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section"><label id="j_idt79" class="ui-outputlabel ui-widget">Tax Mode<font color="#FF0000"> *</font></label>
                                </label><div id="cmb_payment_mode" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix" style="width: 192px;"><div>
                                    <select class="form-control" data-val="true" data-val-required="Please specify Tax Mode" id="TaxMode" name="TaxMode">
          <option value="" selected="selected">-- Select Tax Mode --</option>
          <option @if($recpt->TaxMode=='DAYS') selected="selected"  @endif value="DAYS" >DAYS</option>
          <option @if($recpt->TaxMode=='Monthly') selected="selected"  @endif value="Monthly" >MONTHLY</option>
          <option @if($recpt->TaxMode=='Quarterly') selected="selected"  @endif value="Quarterly" >QUARTERLY</option>
          </select></div></div>

                            </div>
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-6">
                                <label class="field-label resp-label-section"><label id="j_idt84" class="ui-outputlabel ui-widget">Border/Barrier District through Entering<font color="#FF0000"> *</font></label>
                                </label><div id="j_idt86" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix" style="width: 203px;"><div >
								<select name="border_entry" class="form-control" id="border_entry">
								<option value="" selected="selected">---Select Barrier---</option>
								<option @if($recpt->border_entry=='AGRA') selected="selected"  @endif  value="AGRA" >AGRA</option>
								<option @if($recpt->border_entry=='ALIGARH') selected="selected"  @endif  value="ALIGARH" >ALIGARH</option>
								<option @if($recpt->border_entry=='BAGHPAT') selected="selected"  @endif  value="BAGHPAT" >BAGHPAT</option>
								<option @if($recpt->border_entry=='BAHRAICH') selected="selected"  @endif  value="BAHRAICH" >BAHRAICH</option>
								<option @if($recpt->border_entry=='BALLIA') selected="selected"  @endif  value="BALLIA" >BALLIA</option>
								<option @if($recpt->border_entry=='BALRAMPUR') selected="selected"  @endif  value="BALRAMPUR" >BALRAMPUR</option>
								<option @if($recpt->border_entry=='BANDA') selected="selected"  @endif  value="BANDA" >BANDA</option>
								<option @if($recpt->border_entry=='BAREILLY') selected="selected"  @endif  value="BAREILLY" >BAREILLY</option>
								<option @if($recpt->border_entry=='BIJNOR') selected="selected"  @endif  value="BIJNOR" >BIJNOR</option>
								<option @if($recpt->border_entry=='CHANDAULI') selected="selected"  @endif  value="CHANDAULI" >CHANDAULI</option>
								<option @if($recpt->border_entry=='CHITRAKOOT') selected="selected"  @endif  value="CHITRAKOOT" >CHITRAKOOT</option>
								<option @if($recpt->border_entry=='DEORIA') selected="selected"  @endif  value="DEORIA" >DEORIA</option>
								<option @if($recpt->border_entry=='ETAWAH') selected="selected"  @endif  value="ETAWAH" >ETAWAH</option>
								<option @if($recpt->border_entry=='GAUTAM BUDDHA NAGAR') selected="selected"  @endif  value="GAUTAM BUDDHA NAGAR" >GAUTAM BUDDHA NAGAR</option>
								<option @if($recpt->border_entry=='GHAZIABAD') selected="selected"  @endif  value="GHAZIABAD" >GHAZIABAD</option>
								<option @if($recpt->border_entry=='GHAZIPUR') selected="selected"  @endif  value="GHAZIPUR" >GHAZIPUR</option>
								<option @if($recpt->border_entry=='HAMIRPUR') selected="selected"  @endif  value="HAMIRPUR" >HAMIRPUR</option>
								<option @if($recpt->border_entry=='JHANSI') selected="selected"  @endif  value="JHANSI" >JHANSI</option>
								<option @if($recpt->border_entry=='KUSHINAGAR') selected="selected"  @endif  value="KUSHINAGAR" >KUSHINAGAR</option>
								<option @if($recpt->border_entry=='LAKHIMPUR') selected="selected"  @endif  value="LAKHIMPUR" >LAKHIMPUR</option>
								<option @if($recpt->border_entry=='LALITPUR') selected="selected"  @endif  value="LALITPUR" >LALITPUR</option>
								<option @if($recpt->border_entry=='MAHARAJGANJ') selected="selected"  @endif  value="MAHARAJGANJ" >MAHARAJGANJ</option>
								<option @if($recpt->border_entry=='MAHOBA') selected="selected"  @endif  value="MAHOBA" >MAHOBA</option>
								<option @if($recpt->border_entry=='MATHURA') selected="selected"  @endif  value="MATHURA" >MATHURA</option>
								<option @if($recpt->border_entry=='MIRZAPUR') selected="selected"  @endif  value="MIRZAPUR" >MIRZAPUR</option>
								<option @if($recpt->border_entry=='MUZAFFARNAGAR') selected="selected"  @endif  value="MUZAFFARNAGAR" >MUZAFFARNAGAR</option>
								<option @if($recpt->border_entry=='ORAI') selected="selected"  @endif  value="ORAI" >ORAI</option>
								<option @if($recpt->border_entry=='PILIBHIT') selected="selected"  @endif  value="PILIBHIT" >PILIBHIT</option>
								<option @if($recpt->border_entry=='PRAYAGRAJ') selected="selected"  @endif  value="PRAYAGRAJ" >PRAYAGRAJ</option>
								<option @if($recpt->border_entry=='RAMPUR') selected="selected"  @endif  value="RAMPUR" >RAMPUR</option>
								<option @if($recpt->border_entry=='SAHARANPUR') selected="selected"  @endif  value="SAHARANPUR" >SAHARANPUR</option>
								<option @if($recpt->border_entry=='SHAMLI') selected="selected"  @endif  value="SHAMLI" >SHAMLI</option>
								<option @if($recpt->border_entry=='SHRAVASTI') selected="selected"  @endif  value="SHRAVASTI" >SHRAVASTI</option>
								<option @if($recpt->border_entry=='SIDDHARTH NAGAR') selected="selected"  @endif  value="SIDDHARTH NAGAR" >SIDDHARTH NAGAR</option>
								<option @if($recpt->border_entry=='SONBHADRA') selected="selected"  @endif  value="SONBHADRA" >SONBHADRA</option>
								</select>
								</div>
								</div>
                            </div>
                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section"><label id="j_idt90" class="ui-outputlabel ui-widget">Tax From<font color="#FF0000"> *</font></label>
                                @php
                                $timePaid = strtoupper(now()->format('d-M-Y'));
                                @endphp
                                </label><span id="cal_tax_from"><input id="tax_from" name="tax_from" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all " placeholder="DD-MM-YYYY" value="{{$timePaid}}" ></span>
                            </div>
                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section"><label id="j_idt93" class="ui-outputlabel ui-widget">Tax Upto<font color="#FF0000"> *</font></label>
                                </label><span id="cal_tax_to"><input id="tax_upto" name="tax_upto" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all"  placeholder="DD-MM-YYYY" ></span>
                            </div>
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section"><label id="j_idt96" class="ui-outputlabel ui-widget">Permit Type</label>
                                </label><div id="cmb_permit_type" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix" style="width: 173px;"><div>
                                    <select class="form-control" data-val="true" data-val-required="Please Permit Type" id="PermitType" name="PermitType">
				<option value="" selected="selected">---Select Permit Type---</option>
				<option @if($recpt->PermitType=='NOT APPLICABLE') selected="selected"  @endif  value="NOT APPLICABLE" >NOT APPLICABLE</option>
				<option @if($recpt->PermitType=='TEMPORARY PERMIT') selected="selected"  @endif  value="TEMPORARY PERMIT" >TEMPORARY PERMIT</option>
				<option @if($recpt->PermitType=='TOURIST PERMIT') selected="selected"  @endif  value="TOURIST PERMIT" >TOURIST PERMIT</option>
				<option @if($recpt->PermitType=='SEPECIAL PERMIT') selected="selected"  @endif  value="SEPECIAL PERMIT" >SEPECIAL PERMIT</option></select></div></div>
                            </div>
                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section"><label id="j_idt101" class="ui-outputlabel ui-widget">Permit Upto</label>
                                </label><span id="j_idt103"><input id="permit_upto" name="permit_upto" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all" placeholder="DD-MM-YYYY" value="{{$recpt->permit_upto}}"></span>
                            </div><img id="j_idt105" width="13" alt="" src="../Checkpost_135_8_files/dot_clear.gif">
                            <div class="ui-grid-col-6">
                                <label class="field-label resp-label-section"><label id="j_idt107" class="ui-outputlabel ui-widget">Permit No.</label>
                                </label><input id="permit_no" name="permit_no" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all input" value="{{$recpt->permit_no}}">
                            </div>
                        </div>
                        <br>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-12"><div id="qqq" class="ui-datatable ui-widget"><div class="ui-datatable-tablewrapper"><table role="grid"><thead id="qqq_head"><tr role="row"><th id="qqq:j_idt111" class="ui-state-default" role="columnheader" style="width: 40px;"><span>Sl. No.</span></th><th id="qqq:j_idt113" class="ui-state-default" role="columnheader"><span>Particulars</span></th><th id="qqq:j_idt115" class="ui-state-default" role="columnheader"><span>Tax From</span></th><th id="qqq:j_idt117" class="ui-state-default" role="columnheader"><span>Tax Upto</span></th><th id="qqq:j_idt119" class="ui-state-default" role="columnheader"><span>Amount</span></th></tr></thead><tfoot></tfoot><tbody id="qqq_data" class="ui-datatable-data ui-widget-content"><tr class="ui-widget-content ui-datatable-empty-message"><td colspan="5">No records found.</td></tr></tbody></table></div></div>
                            </div>
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-6">
                                <label class="field-label resp-label-section"><label id="j_idt404" class="ui-outputlabel ui-widget">Tax Amount<font color="#FF0000"> *</font></label>
                                </label><input id="total_tax_amount" name="total_tax_amount" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" role="textbox">
                            </div>
							<!--<div class="ui-grid-col-6">
                                <label class="field-label resp-label-section"><label id="j_idt404" class="ui-outputlabel ui-widget">Service/User Charge<font color="#FF0000"> *</font></label>
                                </label><input id="service_amount" name="service_amount" type="text"  class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" role="textbox">
                            </div>
							<div class="ui-grid-col-6">
                                <label class="field-label resp-label-section"><label id="j_idt404" class="ui-outputlabel ui-widget">Civic Infra Cess<font color="#FF0000"> *</font></label>
                                </label><input id="civic_amount" name="civik_amount" type="text"  class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " role="textbox">
                            </div>  -->
                            <div class="ui-grid-col-6">
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-12 top_mar1 mar-left5">
									<button id="calculate" name="calculate" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onClick="calculatefunction();" type="button" role="button" aria-disabled="false"><span class="ui-button-icon-left ui-icon ui-c ui-icon-calculator"></span><span class="ui-button-text ui-c">Calculate Tax</span></button>
        <button id="Pay_Tax" name="Pay_Tax" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onClick="" type="submit" role="button" aria-disabled="false"><span class="ui-button-icon-left ui-icon ui-c ui-icon-calculator"></span><span class="ui-button-text ui-c">Pay Tax</span></button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        </div></div>
                </div>
            </div>
        </div>
    </div><div id="ConfirmationDialog" class="ui-dialog ui-widget ui-widget-content ui-overlay-hidden ui-corner-all ui-shadow ui-draggable" role="dialog" aria-labelledby="ConfirmationDialog_title" aria-hidden="true" style="width: 550px; height: auto;"><div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="ConfirmationDialog_title" class="ui-dialog-title">Confirmation Message...</span><a href="https://vahan.parivahan.gov.in/checkpost/faces/public/payment/TaxCollectionMainOnline.xhtml#" class="ui-dialog-titlebar-icon ui-dialog-titlebar-close ui-corner-all" role="button"><span class="ui-icon ui-icon-closethick"></span></a></div><div class="ui-dialog-content ui-widget-content" style="height: 260px;">
        <center><table>
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
<hr id="j_idt162" class="ui-separator ui-state-default ui-corner-all"><button id="j_idt164" name="j_idt164" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="submit" role="button" aria-disabled="false"><span class="ui-button-text ui-c">Confirm</span></button><button id="j_idt165" name="j_idt165" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onClick="PF(&#39;ConfirmationDLG&#39;).hide();;PrimeFaces.ab({source:&#39;j_idt165&#39;});return false;" type="submit" role="button" aria-disabled="false"><span class="ui-button-text ui-c">Cancel</span></button>
        </center></div></div>

        </div>
            </div>
</form>

<script src="../jquery/external/jquery/jquery.js"></script>
<script src="../jquery/jquery-ui.js"></script>
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
	  if(capacity2 == ""){
	    alert('Please enter Capacity');
		exit;
	  }

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
</div></body></html>
