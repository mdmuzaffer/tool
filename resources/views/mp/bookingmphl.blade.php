






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

<form id="master_Layout_form" name="master_Layout_form" method="post" action="{{ route('user.booking.create.mp')}}" autocomplete="off" enctype="application/x-www-form-urlencoded" onSubmit="return validateform();">


    @csrf
    <input type="hidden" name="master_Layout_form" value="master_Layout_form">
    <input type="hidden" name="mp_hl" value="mp_hl">

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
                       <a href="{{route('user.booking')}}" style="color:#FFFFFF; padding:5px;">Home</a> | <a style="color:#FFFFFF; padding:5px;" href="{{route('user.apply.list.mp')}}">Print Vehicle receipt</a> | <a
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
                    <h1 class="header-main">Vehicle Tax Payment For,<span class="red"> MADHYA PRADESH</span></h1>
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
                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section"><label id="j_idt60" class="ui-outputlabel ui-widget">Vehicle Type<font color="#FF0000"> *</font></label>
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



                          <div class="ui-grid-col-3">
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


                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section">
                                    <label id="j_idt331" class="ui-outputlabel ui-widget">Permit Type<font color="#FF0000"> * </font></label>
                                </label>
                                <div id="cmb_permit_type" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix" style="width: 173px;">
                                    <div>
                                        <select class="form-control" data-val="true" data-val-required="Please Permit Type" id="PermitType" name="PermitType">
                                            <option value="" selected="selected">---Select Permit Type--- </option>
                                            <option value="STAGE CARRIAGE PERMIT">STAGE CARRIAGE PERMIT</option>
                                            <option value="CONTRACT CARRIAGE PERMIT">CONTRACT CARRIAGE PERMIT</option>
                                            <option value="ALL INDIA TOURIST PERMIT">ALL INDIA TOURIST PERMIT</option>
                                            <option value="PRIVATE SERVICE VEHICLE PERMIT">PRIVATE SERVICE VEHICLE PERMIT</option>
                                            <option value="GOODS PERMIT">GOODS PERMIT</option>
                                            <option value="NATIONAL PERMIT">NATIONAL PERMIT</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section"><label id="j_idt74" class="ui-outputlabel ui-widget">Service Type<font color="#FF0000"> *</font></label>
                                </label><div id="service_type" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix ui-state-focus" style="width: 206px;"><div>
                                    <select class="form-control" data-val="true" data-val-required="Please specify Service Type" id="ServiceType" name="ServiceType">
                                      <option value="" selected="selected">-- Select Service Type --</option>
                                      <option @if($recpt->ServiceType=='NOT APPLICABLE') selected="selected"  @endif value="NOT APPLICABLE" >NOT APPLICABLE</option>
                                      <option @if($recpt->ServiceType=='AIR CONDITIONED') selected="selected"  @endif value="AIR CONDITIONED" >AIR CONDITIONED</option>
                                      <option @if($recpt->ServiceType=='DELUXE AIR CONDITIONED') selected="selected"  @endif value="DELUXE AIR CONDITIONED" >DELUXE AIR CONDITIONED</option>
                                      <option @if($recpt->ServiceType=='LUXURY') selected="selected"  @endif value="LUXURY" >LUXURY</option>
                                      <option @if($recpt->ServiceType=='ORDINARY') selected="selected"  @endif value="ORDINARY" >ORDINARY</option>
                                    </select></div></div>
                            </div>

                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section"><label id="lbl_seat_cap" class="ui-outputlabel ui-widget"><span id="demo">Seating Capacity(Exc. Driver)</span><font color="#FF0000"> *</font></label>
                                </label><input id="seating_c" name="seating_c" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" value="{{$recpt->seating_c}}" />
                            </div>
                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section"><label id="lbl_sleeper_cap" class="ui-outputlabel ui-widget">Sleeper Cap</label>
                                </label><input id="txt_sleeper_cap" name="txt_sleeper_cap" type="text" value="0" maxlength="2" onKeyPress="return NumericOnly(event, &#39;&#39;);" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " role="textbox"  >
                            </div>


                           <div class="ui-grid-col-3">
                                <div id="gross_combination" style="display: block;">
                                    <label class="field-label resp-label-section"><label id="lbl_seat_cap" class="ui-outputlabel ui-widget"><span id="demo">Gross combination Wt(In Kg.) </span>
                                            <font color="#FF0000"> *</font>
                                        </label>
                                    </label><input name="gross_combination" type="text" onkeypress="return NumericOnly(event, '');" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " id="gross_combination" value="">
                                </div>
                            </div>

                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section"><label id="j_idt79" class="ui-outputlabel ui-widget">Tax Mode<font color="#FF0000"> *</font></label>
                                </label><div id="cmb_payment_mode" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix" style="width: 192px;"><div>
                                    <select class="form-control" data-val="true" data-val-required="Please specify Tax Mode" id="TaxMode" name="TaxMode">
                                  <option value="" selected="selected">-- Select Tax Mode --</option>
                                  <option @if($recpt->TaxMode=='DAYS') selected="selected"  @endif value="DAYS" >DAYS</option>
                                  <option @if($recpt->TaxMode=='WEEKLY') selected="selected"  @endif value="WEEKLY">WEEKLY</option>
                                  <option @if($recpt->TaxMode=='Monthly') selected="selected"  @endif value="Monthly" >MONTHLY</option>
                                  <option @if($recpt->TaxMode=='Quarterly') selected="selected"  @endif value="Quarterly" >QUARTERLY</option>
                                  </select></div></div>

                            </div>

                        </div>

                        <div class="ui-grid-row">
                            
                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section"><label id="j_idt107" class="ui-outputlabel ui-widget">Standing capacity.</label>
                                </label><input id="standing_capacity" name="standing_capacity" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all input" value="">
                            </div>

                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section"><label id="j_idt107" class="ui-outputlabel ui-widget"> No of Periods</label>
                                </label><input id="periods_no" name="periods_no" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all input" value="">
                            </div>

                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section">
                                    <label id="j_idt353" class="ui-outputlabel ui-widget">Fitness Validity(upto)<font color="#FF0000"> *</font></label>
                                </label>
                                <span id="j_idt355">
                                    <input id="fitdte" name="fitdate" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all"  placeholder="DD-MM-YYYY" >
                                </span>
                            </div>

                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section">
                                    <label id="j_idt353" class="ui-outputlabel ui-widget">Insurance Validity(upto)<font color="#FF0000"> *</font></label>
                                </label>
                                <span id="j_idt355">
                                    <input id="ins_upto" name="ins_upto" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all" placeholder="DD-MM-YYYY" value="">
                                </span>
                            </div>

                        </div>

                        <div class="ui-grid-row"> 

                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section"><label id="j_idt107" class="ui-outputlabel ui-widget"> Permit No </label>
                                </label><input id="permit_no" name="permit_no" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all input" value="">
                            </div>


                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section">
                                    <label id="j_idt353" class="ui-outputlabel ui-widget">Permit Validity<font color="#FF0000"> *</font></label>
                                </label>
                                <span id="j_idt355">
                                    <input id="fitdte2" name="permit_upto" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all" placeholder="DD-MM-YYYY" value="" autocomplete="off">
                                </span>
                            </div>

                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section">
                                    <label id="j_idt353" class="ui-outputlabel ui-widget">PUCC Validity<font color="#FF0000"> *</font></label>
                                </label>
                                <span id="j_idt355">
                                    <input id="tax_validity" name="tax_validity" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all" placeholder="DD-MM-YYYY" value="">
                                </span>
                            </div>


                            <div class="ui-grid-col-3">
                                <label class="field-label resp-label-section">
                                    <label id="j_idt353" class="ui-outputlabel ui-widget">Road tax Validity<font color="#FF0000"> *</font></label>
                                </label>
                                <span id="j_idt355">
                                    <input id="greenTax" name="green_tax" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all" placeholder="DD-MM-YYYY" value="" autocomplete="off">
                                </span>
                            </div>

                        </div>


                        <div class="ui-grid-row">


                            <div class="ui-grid-col-6">
                                <label class="field-label resp-label-section"><label id="j_idt84" class="ui-outputlabel ui-widget">District Name<font color="#FF0000"> *</font></label>
                                </label><div id="j_idt86" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix" style="width: 203px;"><div >
								<select name="border_entry" class="form-control" id="border_entry">
								<option value="" selected="selected">---Select Barrier---</option>
								<option @if($recpt->border_entry=='AGAR MALWA') selected="selected"  @endif  value="AGAR MALWA" >AGAR MALWA</option>
								<option @if($recpt->border_entry=='ALIRAJPUR') selected="selected"  @endif  value="ALIRAJPUR" >ALIRAJPUR</option>
								<option @if($recpt->border_entry=='ANUPPUR') selected="selected"  @endif  value="ANUPPUR" >ANUPPUR</option>
								<option @if($recpt->border_entry=='ASHOK NAGAR') selected="selected"  @endif  value="ASHOK NAGAR" >ASHOK NAGAR</option>
								<option @if($recpt->border_entry=='BALAGHAT') selected="selected"  @endif  value="BALAGHAT" >BALAGHAT</option>
								<option @if($recpt->border_entry=='BARWANI') selected="selected"  @endif  value="BARWANI" >BARWANI</option>

								<option @if($recpt->border_entry=='BETUL') selected="selected"  @endif  value="BETUL" >BETUL</option>
								<option @if($recpt->border_entry=='BHIND') selected="selected"  @endif  value="BHIND" >BHIND</option>
								<option @if($recpt->border_entry=='BURAHANPUR') selected="selected"  @endif  value="BURAHANPUR" >BURAHANPUR</option>
								<option @if($recpt->border_entry=='CHHATARPUR') selected="selected"  @endif  value="CHHATARPUR" >CHHATARPUR</option>
								<option @if($recpt->border_entry=='CHHINDWARA') selected="selected"  @endif  value="CHHINDWARA" >CHHINDWARA</option>
								<option @if($recpt->border_entry=='DATIA') selected="selected"  @endif  value="DATIA" >DATIA</option>
								<option @if($recpt->border_entry=='DINDORI') selected="selected"  @endif  value="DINDORI" >DINDORI</option>
								<option @if($recpt->border_entry=='GUNA') selected="selected"  @endif  value="GUNA" >GUNA</option>
								<option @if($recpt->border_entry=='GWALIOR') selected="selected"  @endif  value="GWALIOR" >GWALIOR</option>
								<option @if($recpt->border_entry=='JHABUA') selected="selected"  @endif  value="JHABUA" >JHABUA</option>

								<option @if($recpt->border_entry=='MANDLA') selected="selected"  @endif  value="MANDLA" >MANDLA</option>
								<option @if($recpt->border_entry=='MANDSAUR') selected="selected"  @endif  value="MANDSAUR" >MANDSAUR</option>
								<option @if($recpt->border_entry=='MORENA') selected="selected"  @endif  value="MORENA" >MORENA</option>
								<option @if($recpt->border_entry=='NEEMUCH') selected="selected"  @endif  value="NEEMUCH" >NEEMUCH</option>
								<option @if($recpt->border_entry=='RAJGARH') selected="selected"  @endif  value="RAJGARH" >RAJGARH</option>
								<option @if($recpt->border_entry=='REWA') selected="selected"  @endif  value="REWA" >REWA</option>
								<option @if($recpt->border_entry=='SAGAR') selected="selected"  @endif  value="SAGAR" >SAGAR</option>
								<option @if($recpt->border_entry=='SATNA') selected="selected"  @endif  value="SATNA" >SATNA</option>
								<option @if($recpt->border_entry=='SEONI') selected="selected"  @endif  value="SEONI" >SEONI</option>
								<option @if($recpt->border_entry=='SHEOPUR') selected="selected"  @endif  value="SHEOPUR" >SHEOPUR</option>
								<option @if($recpt->border_entry=='SHIVPURI') selected="selected"  @endif  value="SHIVPURI" >SHIVPURI</option>
								<option @if($recpt->border_entry=='SINGRAULI') selected="selected"  @endif  value="SINGRAULI" >SINGRAULI</option>
								</select>
								</div>
								</div>
                            </div>


                              <div class="ui-grid-col-6">
                                <label class="field-label resp-label-section"><label id="j_idt84" class="ui-outputlabel ui-widget">Checkpost Name<font color="#FF0000"> *</font></label>
                                </label><div id="j_idt86" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix" style="width: 203px;"><div >
                                <select name="border_entry" class="form-control" id="border_entry">
                                <option value="" selected="selected">---Select Barrier---</option>
                                <option @if($recpt->border_entry=='AGAR MALWA') selected="selected"  @endif  value="AGAR MALWA" >AGAR MALWA</option>
                                <option @if($recpt->border_entry=='ALIRAJPUR') selected="selected"  @endif  value="ALIRAJPUR" >ALIRAJPUR</option>
                                <option @if($recpt->border_entry=='ANUPPUR') selected="selected"  @endif  value="ANUPPUR" >ANUPPUR</option>
                                <option @if($recpt->border_entry=='ASHOK NAGAR') selected="selected"  @endif  value="ASHOK NAGAR" >ASHOK NAGAR</option>
                                <option @if($recpt->border_entry=='BALAGHAT') selected="selected"  @endif  value="BALAGHAT" >BALAGHAT</option>
                                <option @if($recpt->border_entry=='BARWANI') selected="selected"  @endif  value="BARWANI" >BARWANI</option>

                                <option @if($recpt->border_entry=='BETUL') selected="selected"  @endif  value="BETUL" >BETUL</option>
                                <option @if($recpt->border_entry=='BHIND') selected="selected"  @endif  value="BHIND" >BHIND</option>
                                <option @if($recpt->border_entry=='BURAHANPUR') selected="selected"  @endif  value="BURAHANPUR" >BURAHANPUR</option>
                                <option @if($recpt->border_entry=='CHHATARPUR') selected="selected"  @endif  value="CHHATARPUR" >CHHATARPUR</option>
                                <option @if($recpt->border_entry=='CHHINDWARA') selected="selected"  @endif  value="CHHINDWARA" >CHHINDWARA</option>
                                <option @if($recpt->border_entry=='DATIA') selected="selected"  @endif  value="DATIA" >DATIA</option>
                                <option @if($recpt->border_entry=='DINDORI') selected="selected"  @endif  value="DINDORI" >DINDORI</option>
                                <option @if($recpt->border_entry=='GUNA') selected="selected"  @endif  value="GUNA" >GUNA</option>
                                <option @if($recpt->border_entry=='GWALIOR') selected="selected"  @endif  value="GWALIOR" >GWALIOR</option>
                                <option @if($recpt->border_entry=='JHABUA') selected="selected"  @endif  value="JHABUA" >JHABUA</option>

                                <option @if($recpt->border_entry=='MANDLA') selected="selected"  @endif  value="MANDLA" >MANDLA</option>
                                <option @if($recpt->border_entry=='MANDSAUR') selected="selected"  @endif  value="MANDSAUR" >MANDSAUR</option>
                                <option @if($recpt->border_entry=='MORENA') selected="selected"  @endif  value="MORENA" >MORENA</option>
                                <option @if($recpt->border_entry=='NEEMUCH') selected="selected"  @endif  value="NEEMUCH" >NEEMUCH</option>
                                <option @if($recpt->border_entry=='RAJGARH') selected="selected"  @endif  value="RAJGARH" >RAJGARH</option>
                                <option @if($recpt->border_entry=='REWA') selected="selected"  @endif  value="REWA" >REWA</option>
                                <option @if($recpt->border_entry=='SAGAR') selected="selected"  @endif  value="SAGAR" >SAGAR</option>
                                <option @if($recpt->border_entry=='SATNA') selected="selected"  @endif  value="SATNA" >SATNA</option>
                                <option @if($recpt->border_entry=='SEONI') selected="selected"  @endif  value="SEONI" >SEONI</option>
                                <option @if($recpt->border_entry=='SHEOPUR') selected="selected"  @endif  value="SHEOPUR" >SHEOPUR</option>
                                <option @if($recpt->border_entry=='SHIVPURI') selected="selected"  @endif  value="SHIVPURI" >SHIVPURI</option>
                                <option @if($recpt->border_entry=='SINGRAULI') selected="selected"  @endif  value="SINGRAULI" >SINGRAULI</option>
                                </select>
                                </div>
                                </div>
                            </div>

                        </div>


                        <div class="ui-grid-row">
                            <div class="ui-grid-col-6">
                                <label class="field-label resp-label-section"><label id="j_idt90" class="ui-outputlabel ui-widget">Tax From<font color="#FF0000"> *</font></label>
                                @php
                                $timePaid = strtoupper(now()->format('d-M-Y'));
                                @endphp
                                </label><span id="cal_tax_from"><input id="tax_from" name="tax_from" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all " placeholder="DD-MM-YYYY" value="{{$timePaid}}" ></span>
                            </div>
                            <div class="ui-grid-col-6">
                                <label class="field-label resp-label-section"><label id="j_idt93" class="ui-outputlabel ui-widget">Tax Upto<font color="#FF0000"> *</font></label>
                                </label><span id="cal_tax_to"><input id="tax_upto" name="tax_upto" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all"  placeholder="DD-MM-YYYY" ></span>
                            </div>
                        </div>

                        <br>

                        <div class="ui-grid-row">
                            <div class="ui-grid-col-12">
                                <div id="qqq" class="ui-datatable ui-widget">
                                    <div class="ui-datatable-tablewrapper">
                                        <table role="grid">
                                            <thead id="qqq_head">
                                                <tr role="row">
                                                    <th id="qqq:j_idt111" class="ui-state-default" role="columnheader" style="width: 40px;"><span>Sl. No.</span></th>
                                                    <th id="qqq:j_idt113" class="ui-state-default" role="columnheader"><span>Particulars</span></th>
                                                    <th id="qqq:j_idt115" class="ui-state-default" role="columnheader"><span>Tax From</span></th><th id="qqq:j_idt117" class="ui-state-default" role="columnheader"><span>Tax Upto</span></th>
                                                    <th id="qqq:j_idt119" class="ui-state-default" role="columnheader"><span>Amount</span></th>
                                                </tr>


                                                <tr style="background-color: #fff;">
                                                    <td class="ui-state-default" role="columnheader" style="widtd: 40px;"><span>1</span></td>
                                                    <td class="ui-state-default" role="columnheader"><span>MV Tax</span></td>
                                                    <td class="ui-state-default" role="columnheader"><span></span></td>
                                                    <td class="ui-state-default" role="columnheader"><span></span></td>
                                                    <td class="ui-state-default" role="columnheader"><span></span></td>
                                                </tr>

                                                <tr role="row" style=" background-color: #fff;">
                                                    <td class="ui-state-default" role="columnheader" style="widtd: 40px;"><span>2</span></td>
                                                    <td class="ui-state-default" role="columnheader"><span>Service / User Charge</span></td>
                                                     
                                                    <td class="ui-state-default" role="columnheader"><span></span></td>
                                                    <td class="ui-state-default" role="columnheader"><span></span></td>
                                                    <td class="ui-state-default" role="columnheader"><span><input  name="user_service_charge" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" role="textbox"></span></td>
                                                </tr>
                                                
                                                                                <tr role="row" style=" background-color: #fff;">
                                                    <td class="ui-state-default" role="columnheader" style="widtd: 40px;"><span>3</span></td>
                                                    <td class="ui-state-default" role="columnheader"><span>Permit fee</span></td>
                                                     
                                                    <td class="ui-state-default" role="columnheader"><span></span></td>
                                                    <td class="ui-state-default" role="columnheader"><span></span></td>
                                                    <td class="ui-state-default" role="columnheader"><span><input  name="permit_fee_mp" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" role="textbox"></span></td>
                                                </tr>
                                                
                                                
                                                <tr role="row" style="background-color: #fff;">
                                                    <td class="ui-state-default" role="columnheader" style="widtd: 40px;"><span>4</span></td>
                                                    <td class="ui-state-default" role="columnheader"><span>CGST</span></td>
                                                    <td class="ui-state-default" role="columnheader"><span></span></td>
                                                    <td class="ui-state-default" role="columnheader"><span></span></td>
                                                    <td class="ui-state-default" role="columnheader"><span></span><input name="cgst" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" role="textbox"></td>
                                                </tr>

                                                <tr role="row" style="background-color: #fff;">
                                                    <td class="ui-state-default" role="columnheader" style="widtd: 40px;"><span>5</span></td>
                                                    <td class="ui-state-default" role="columnheader"><span>SGST</span></td>
                                                    <td class="ui-state-default" role="columnheader"><span></span></td>
                                                    <td class="ui-state-default" role="columnheader"><span></span></td>
                                                    <td class="ui-state-default" role="columnheader"><span></span><input name="sgst" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" role="textbox"></td>
                                                </tr>

                                            </thead>
                                            <tfoot></tfoot>
                                            <tbody id="qqq_data" class="ui-datatable-data ui-widget-content">
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

  $( function() {
    $( "#ins_upto" ).datepicker({ dateFormat: 'dd-M-yy' });
  } );

   $( function() {
    $( "#tax_validity" ).datepicker({ dateFormat: 'dd-M-yy' });
  } );

   $( function() {
    $( "#fitdte2" ).datepicker({ dateFormat: 'dd-M-yy' });
  } );

    $( function() {
    $( "#greenTax" ).datepicker({ dateFormat: 'dd-M-yy' });
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
