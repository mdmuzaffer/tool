<!DOCTYPE html>
<!-- saved from url=(0091)https://vahan.parivahan.gov.in/checkpost/faces/public/payment/TaxCollectionMainOnline.xhtml -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
document.location = "{{route('user.booking.mh')}}?vehicleno="+d;
}else{
alert("Please enter vehicle number");
}
}
</script>

<form id="master_Layout_form" name="master_Layout_form" method="post" autocomplete="off" action="{{ route('user.booking.create.mh')}}" enctype="application/x-www-form-urlencoded">
    @csrf
    <input type="hidden" name="master_Layout_form" value="master_Layout_form">
<div class="container-fluid topbar-menu">
<nav class="navbar navbar-default navigation-background" role="navigation">
<div class="ui-grid ui-grid-responsive">
<div class="ui-grid-row">
<div class="ui-grid-col-2 left_logo">
<a style="display: inline-block;" class="top-space"><img id="j_idt15" src="{{asset('mh/Checkpost_135_8_files/logo_e-vahan.png')}}" alt="Parivahan Sewa" style="width: auto;">
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
<div>
<span class="resize-font"><a href="javascript:void(0);" onClick="changemysize(10);" style="text-decoration: none; color: white">A<sup>-</sup></a></span>
<span class="resize-font"><a href="javascript:void(0);" onClick="changemysize(12);" style="text-decoration: none; color: white">A</a></span>
<span class="resize-font"><a href="javascript:void(0);" onClick="changemysize(14);" style="text-decoration: none; color: white">A<sup>+</sup></a></span>
</div>
<div class="input-group input-group-unstyled">
<input type="text" class="form-control" style="visibility: hidden" disabled="disabled">
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
<div class="navbar-collapse navigation-background-nav collapse in" id="navbar" aria-expanded="true" style="padding: 10px;">
<a href="{{route('user.booking.mh')}}" style="color:#FFFFFF; padding:5px;">Home</a> | <a style="color:#FFFFFF; padding:5px;" href="{{route('user.apply.list.mh')}}">Print Vehicle receipt</a> | <a style="color:#FFFFFF; padding:5px;" href="{{route('select-state')}}">Change State</a> | <a style="color:#FFFFFF; padding:5px;" href="{{route('all-booking')}}">All Booking</a> | <a style="color:#FFFFFF; padding:5px;" href="{{route('user.logout.mh')}}">Logout</a>
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
<div><div id="popup" class="ui-dialog ui-widget ui-widget-content ui-overlay-hidden ui-corner-all ui-shadow center-position ui-resizable" role="dialog" aria-labelledby="popup_title" aria-hidden="true" style="width: auto; height: auto;"><div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="popup_title" class="ui-dialog-title"></span></div><div class="ui-dialog-content ui-widget-content" style="height: auto;"><div id="j_idt292" class="ui-messages ui-widget" aria-live="polite"></div><button id="j_idt293" name="j_idt293" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onClick="mojarra.ab(&#39;j_idt293&#39;,event,&#39;click&#39;,0,&#39;uktaxcollection popup&#39;);PrimeFaces.ab({source:&#39;j_idt293&#39;,oncomplete:function(xhr,status,args){PF(&#39;dlg1&#39;).hide();;}});return false;" type="submit" role="button" aria-disabled="false"><span class="ui-button-text ui-c">Ok</span></button></div><div class="ui-resizable-handle ui-resizable-n" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-w" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-ne" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-nw" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-sw" style="z-index: 90;"></div></div>
<div class="container-fluid">
<div class="ui-grid ui-grid-responsive">
<div class="ui-grid-row top-space center-position contents-Space">
<h1 class="header-main">BORDER TAX PAYMENT FOR ENTRY INTO <span class="red"> MAHARASHTRA</span></h1>
</div>
<div class="ui-grid-row">
<div class="ui-grid-col-12 center-position contents-Space">
</div>
</div>
<div class="ui-grid-row top-space">
<div class="ui-grid-col-1 resp-blank-height"></div>
<div class="ui-grid-col-10"><div id="mhtaxcollection" class="ui-panel ui-widget ui-widget-content ui-corner-all bottom-space" data-widget="widget_mhtaxcollection" aria-busy="false" style="position: relative;"><div id="mhtaxcollection_header" class="ui-panel-titlebar ui-widget-header ui-helper-clearfix ui-corner-all"><span class="ui-panel-title">Tax Payment Details</span></div><div id="mhtaxcollection_content" class="ui-panel-content ui-widget-content">
<div class="ui-grid-row">
<div class="ui-grid-col-6">
<label class="field-label resp-label-section"><label id="j_idt955" class="ui-outputlabel ui-widget field-label-mandate">Vehicle No.</label>
</label>
<input name="vehicleno" type="text" id="vehicleno" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" value="{{$recpt->vehicleno}}" />
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
<label class="field-label resp-label-section"><label id="j_idt961" class="ui-outputlabel ui-widget field-label-mandate">Chassis No.</label>
</label>
<input name="chassisno" type="text" id="chassisno" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" value="{{$recpt->chassisno}}"/>
</div>
<div class="ui-grid-col-6">
<label class="field-label resp-label-section"><label id="j_idt965" class="ui-outputlabel ui-widget field-label-mandate">Owner Name</label>
</label>
<input name="ownername" type="text" id="ownername" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " value="{{$recpt->ownername}}" />
</div>
</div>
<div class="ui-grid-row">
<div class="ui-grid-col-6">
<label class="field-label resp-label-section"><label id="j_idt969" class="ui-outputlabel ui-widget field-label-mandate">Mobile No.</label>
</label>
<input name="mobile" type="text" id="mobile" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" value="{{$recpt->mobile}}" />
</div>
<div class="ui-grid-col-6">
<label class="field-label resp-label-section"><label id="j_idt972" class="ui-outputlabel ui-widget field-label-mandate">From State</label>
</label>
<div id="j_idt315" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix" style="width: 196px;">
<div >
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
</select>
</div>
</div>
</div>
</div>
<div class="ui-grid-row">
<div class="ui-grid-col-3">
<label class="field-label resp-label-section"><label id="j_idt978" class="ui-outputlabel ui-widget field-label-mandate">Vehicle Type</label>
</label><div id="j_idt980" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-state-disabled" role="combobox" aria-haspopup="true" aria-expanded="false" aria-owns="j_idt980_items" style="min-width: 340px;">
<select class="form-control" data-val="true" data-val-required="Please specify Vehicle Type" id="VehicleType" name="VehicleType" onChange="myFunction()">
<option value="" selected="selected" >-- Select Vehicle Type --</option>
<option @if($recpt->VehicleType=='CONTRACT CARRIAGE') selected="selected"  @endif   value="CONTRACT CARRIAGE" >CONTRACT CARRIAGE</option>
<option @if($recpt->VehicleType=='CONTRACT CARRIAGE/PASSENGER VEHICLES') selected="selected"  @endif   value="CONTRACT CARRIAGE/PASSENGER VEHICLES" >CONTRACT CARRIAGE/PASSENGER VEHICLES</option>
<option @if($recpt->VehicleType=='PRIVATE SERVICE VEHICLE') selected="selected"  @endif   value="PRIVATE SERVICE VEHICLE" >PRIVATE SERVICE VEHICLE</option>
<option @if($recpt->VehicleType=='GOODS VEHICLE') selected="selected"  @endif   value="GOODS VEHICLE" >GOODS VEHICLE</option>
<option @if($recpt->VehicleType=='EDUCATIONAL INSTITUTIONAL BUS') selected="selected"  @endif   value="EDUCATIONAL INSTITUTIONAL BUS" >EDUCATIONAL INSTITUTIONAL BUS</option>
<option @if($recpt->VehicleType=='CONSTRUCTION EQUIPMENT VEHICLE') selected="selected"  @endif   value="CONSTRUCTION EQUIPMENT VEHICLE" >CONSTRUCTION EQUIPMENT VEHICLE</option>
<option @if($recpt->VehicleType=='VOLVO OR MERECEDEZ ETC') selected="selected"  @endif   value="VOLVO OR MERECEDEZ ETC" >VOLVO OR MERECEDEZ ETC</option>
<option @if($recpt->VehicleType=='EDUCATION BUS') selected="selected"  @endif   value="EDUCATION BUS" >EDUCATION BUS</option>
<option @if($recpt->VehicleType=='SLEEPER BUS') selected="selected"  @endif   value="SLEEPER BUS" >2WHEELER</option>
<option @if($recpt->VehicleType=='EDUCATIONAL BUS USED BY SCHHOOL') selected="selected"  @endif   value="EDUCATIONAL BUS USED BY SCHHOOL" >EDUCATIONAL BUS USED BY SCHHOOL</option>
<option @if($recpt->VehicleType=='PRIVATE ORGANIZATIONS') selected="selected"  @endif   value="PRIVATE ORGANIZATIONS" >PRIVATE ORGANIZATIONS</option>
</select>
<label id="j_idt980_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">---Select Vehicle Type---</label><div class="ui-selectonemenu-trigger ui-state-default ui-corner-right"><span class="ui-icon ui-icon-triangle-1-s ui-c"></span></div><div id="j_idt980_panel" class="ui-selectonemenu-panel ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow ui-input-overlay"><div class="ui-selectonemenu-items-wrapper" style="max-height:200px"><ul id="j_idt980_items" class="ui-selectonemenu-items ui-selectonemenu-list ui-widget-content ui-widget ui-corner-all ui-helper-reset" role="listbox" aria-activedescendant="j_idt980_0"><li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all ui-state-highlight" data-label="---Select Vehicle Type---" tabindex="-1" role="option" id="j_idt980_0">---Select Vehicle Type---</li><li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="CONTRACT CARRIAGE/PASSENGER VEHICLES" tabindex="-1" role="option" id="j_idt980_1">CONTRACT CARRIAGE/PASSENGER VEHICLES</li><li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all" data-label="GOODS VEHICLE" tabindex="-1" role="option" id="j_idt980_2">GOODS VEHICLE</li></ul></div></div></div>
</div>
<div class="ui-grid-col-3">
<label class="field-label resp-label-section"><label id="j_idt984" class="ui-outputlabel ui-widget field-label-mandate">Vehicle Class</label>
</label><div id="j_idt986" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-state-disabled" role="combobox" aria-haspopup="true" aria-expanded="false" aria-owns="j_idt986_items" style="min-width: 177px;"><div >
<div id="j_idt327" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix " style="width: 182px;">
<div >
<select class="form-control" data-val="true" data-val-required="Please specify Vehicle Class" id="VehicleClass" name="VehicleClass">
<option value="" selected="selected">-- Select Vehicle Class --</option>
<option @if($recpt->VehicleClass=='3 WHEELER') selected="selected"  @endif  value="3 WHEELER" >3 WHEELER</option>
<option @if($recpt->VehicleClass=='MOTOR CAB') selected="selected"  @endif   value="MOTOR CAB" >MOTOR CAB</option>
<option @if($recpt->VehicleClass=='MAXI CAB') selected="selected"  @endif   value="MAXI CAB" >MAXI CAB</option>
<option @if($recpt->VehicleClass=='OMNI BUS') selected="selected"  @endif   value="OMNI BUS" >OMNI BUS</option>
<option @if($recpt->VehicleClass=='BUS') selected="selected"  @endif   value="BUS" >BUS</option>
<option @if($recpt->VehicleClass=='EDUCATIONAL BUS') selected="selected"  @endif   value="EDUCATIONAL BUS" >EDUCATIONAL BUS</option>
<option @if($recpt->VehicleClass=='LIGHT GOODS VEHICLE') selected="selected"  @endif   value="LIGHT GOODS VEHICLE" >LIGHT GOODS VEHICLE</option>
<option @if($recpt->VehicleClass=='MEDIUM GOODS VEHICLE') selected="selected"  @endif   value="MEDIUM GOODS VEHICLE" >MEDIUM GOODS VEHICLE</option>
<option @if($recpt->VehicleClass=='HEAVY GOODS VEHICLE') selected="selected"  @endif   value="HEAVY GOODS VEHICLE" >HEAVY GOODS VEHICLE</option>
<option @if($recpt->VehicleClass=='SPECIAL') selected="selected"  @endif   value="SPECIAL" >SPECIAL</option>
</select>
</div>
</div>
</div><label id="j_idt986_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">---Select Vehicle Class---</label><div class="ui-selectonemenu-trigger ui-state-default ui-corner-right"><span class="ui-icon ui-icon-triangle-1-s ui-c"></span></div><div id="j_idt986_panel" class="ui-selectonemenu-panel ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow ui-input-overlay"><div class="ui-selectonemenu-items-wrapper" style="max-height:200px"><ul id="j_idt986_items" class="ui-selectonemenu-items ui-selectonemenu-list ui-widget-content ui-widget ui-corner-all ui-helper-reset" role="listbox" aria-activedescendant="j_idt986_0"><li class="ui-selectonemenu-item ui-selectonemenu-list-item ui-corner-all ui-state-highlight" data-label="---Select Vehicle Class---" tabindex="-1" role="option" id="j_idt986_0">---Select Vehicle Class---</li></ul></div></div></div>
</div><img id="j_idt990" width="30px" alt="" src="./Checkpost _150_8_files/dot_clear.gif">
<div class="ui-grid-col-6">
<label class="field-label resp-label-section"><label id="j_idt992" class="ui-outputlabel ui-widget field-label-mandate">Service Type</label>
</label>
<div id="service_type" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix" style="width: 179px;">
<div >
<select class="form-control" data-val="true" data-val-required="Please specify Service Type" id="ServiceType" name="ServiceType">
<option value="" selected="selected">-- Select Service Type --</option>
<option  @if($recpt->ServiceType=='NOT APPLICABLE') selected="selected"  @endif   value="NOT APPLICABLE" >NOT APPLICABLE</option>
<option  @if($recpt->ServiceType=='ORDINARY') selected="selected"  @endif  value="ORDINARY" >ORDINARY</option>
<option  @if($recpt->ServiceType=='AIR CONDITIONED') selected="selected"  @endif  value="AIR CONDITIONED" >AIR CONDITIONED</option>
<option  @if($recpt->ServiceType=='ORDINARY (3 X 2 SEATER)') selected="selected"  @endif  value="ORDINARY (3 X 2 SEATER)" >ORDINARY (3 X 2 SEATER)</option>
</select>
</div>
</div>
</div>
</div>
<div class="ui-grid-row">
<div class="ui-grid-col-3">
<label class="field-label resp-label-section"><label id="lbl_seat_cap" class="ui-outputlabel ui-widget field-label-mandate">Seating Cap(Ex. Driver)</label>
</label>
<input name="seating_c" type="text" onKeyPress="return NumericOnly(event, &#39;&#39;);" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " id="seating_c" value="{{$recpt->seating_c}}" />
</div>
<div class="ui-grid-col-3">
<label class="field-label resp-label-section"><label id="lbl_sleeper_cap" class="ui-outputlabel ui-widget field-label-mandate">Sleeper Cap</label>
</label>
<input id="txt_sleeper_cap" name="txt_sleeper_cap" type="text" value="" maxlength="2" onKeyPress="return NumericOnly(event, &#39;&#39;);" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " role="textbox">
</div><img id="j_idt1001" width="30px" alt="" src="./Checkpost _150_8_files/dot_clear.gif">
<div class="ui-grid-col-6">
<label class="field-label resp-label-section"><label id="j_idt1003" class="ui-outputlabel ui-widget field-label-mandate">Tax Mode</label>
</label>
<div id="cmb_payment_mode" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix" style="width: 192px;">
<div>
<div id="cmb_payment_mode" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all ui-helper-clearfix" style="width: 192px;">
<div>
<select class="form-control" data-val="true" data-val-required="Please specify Tax Mode" id="TaxMode" name="TaxMode">
<option value="" selected="selected">-- Select Tax Mode --</option>
<option value="WEEKLY" >WEEKLY</option>
<option value="Monthly" >MONTHLY</option>
<option value="Quarterly" >QUARTERLY</option>
</select>
</div>
</div>
</div>
<label id="cmb_payment_mode_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all" style="width: 187px;">---Select Payment Mode---</label>
</div>
</div>
</div>
<div class="ui-grid-row">
<div class="ui-grid-col-3">
<label class="field-label resp-label-section"><label id="j_idt1008" class="ui-outputlabel ui-widget field-label-mandate">RTO Name</label>
</label><div id="j_idt1010" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false" aria-owns="j_idt1010_items" style="min-width: 177px;"><div><select id="districtname" name="districtname">
<option value="" selected="selected">---Select District Name---</option>
<option value="AMRAVATI" >AMRAVATI</option>
<option value="BHANDARA" >BHANDARA</option>
<option value="CHANDRAPUR" >CHANDRAPUR</option>
<option value="DHULE" >DHULE</option>
<option value="JALGAON" >JALGAON</option>
<option value="KOLHAPUR" >KOLHAPUR</option>
<option value="NAGPUR EAST" >NAGPUR EAST</option>
<option value="NANDURBAR" >NANDURBAR</option>
<option value="NASHIK" >NASHIK</option>
<option value="OSMANABAD" >OSMANABAD</option>
<option value="SINDHUDURG" >SINDHUDURG</option>
<option value="SOLAPUR" >SOLAPUR</option>
<option value="THANE" >THANE</option>
<option value="YAVATMAL" >YAVATMAL</option>
</select></div><label id="j_idt1010_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">---Select District Name---</label><div class="ui-selectonemenu-trigger ui-state-default ui-corner-right"><span class="ui-icon ui-icon-triangle-1-s ui-c"></span></div></div>
</div>
<div class="ui-grid-col-3">
<label class="field-label resp-label-section"><label id="j_idt1014" class="ui-outputlabel ui-widget">Checkpost Name</label>
</label><div id="cmb_checkpost_name" class="ui-selectonemenu ui-widget ui-state-default ui-corner-all" role="combobox" aria-haspopup="true" aria-expanded="false" aria-owns="cmb_checkpost_name_items" style="min-width: 201px;"><div ><select id="checkpost" name="checkpost" >
<option value="" >---Select Checkpost Name---</option>
<option value="KHARPI" >KHARPI</option>
<option value="WARUD" >WARUD</option>
<option value="DEORI" >DEORI</option>
<option value="RAJURA" >RAJURA</option>
<option value="PALASNER" >PALASNER</option>
<option value="CHORWAD" >CHORWAD</option>
<option value="PURNAD" >PURNAD</option>
<option value="KAGAL" >KAGAL</option>
<option value="MANEGAON TEK" >MANEGAON TEK</option>
<option value="NAWAPUR" >NAWAPUR</option>
<option value="BORGAON" >BORGAON</option>
<option value="OMERGA" >OMERGA</option>
<option value="INSULI" >INSULI</option>
<option value="MANDRUP" >MANDRUP</option>
<option value="WARUD" >WARUD</option>
<option value="ACHAD" >ACHAD</option>
<option value="PIMPALKUTTI" >PIMPALKUTTI</option>
</select></div><label id="cmb_checkpost_name_label" class="ui-selectonemenu-label ui-inputfield ui-corner-all">---Select Checkpost Name---</label><div class="ui-selectonemenu-trigger ui-state-default ui-corner-right"><span class="ui-icon ui-icon-triangle-1-s ui-c"></span></div></div>
</div><img id="j_idt1019" width="30px" alt="" src="./Checkpost _150_8_files/dot_clear.gif">
<div class="ui-grid-col-3">
<label class="field-label resp-label-section"><label id="j_idt1021" class="ui-outputlabel ui-widget field-label-mandate">Tax From</label>
</label><span id="cal_tax_from" class="ui-calendar">
    @php
                        $timePaid = strtoupper(now()->format('d-M-Y'));
                        @endphp
<input id="tax_from" name="tax_from" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all " placeholder="DD-MM-YYYY" value="{{$timePaid}}">
</span></div>
<div class="ui-grid-col-3">
<label class="field-label resp-label-section"><label id="j_idt1024" class="ui-outputlabel ui-widget field-label-mandate">Tax Upto</label>
</label><span id="cal_tax_to" class="ui-calendar"><input id="tax_upto" name="tax_upto" type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all" placeholder="DD-MM-YYYY" value=""></span>
</div>
</div>
<div class="ui-grid-row top-space">
<div class="ui-grid-col-12"><div id="qqq" class="ui-datatable ui-widget"><div class="ui-datatable-tablewrapper"><table role="grid"><thead id="qqq_head"><tr role="row"><th id="qqq:j_idt1027" class="ui-state-default center-position collumn-width" role="columnheader" aria-label="Sl. No." scope="col"><span class="ui-column-title">Sl. No.</span></th><th id="qqq:j_idt1029" class="ui-state-default" role="columnheader" aria-label="Particulars" scope="col"><span class="ui-column-title">Particulars</span></th><th id="qqq:j_idt1031" class="ui-state-default" role="columnheader" aria-label="Tax From" scope="col"><span class="ui-column-title">Tax From</span></th><th id="qqq:j_idt1033" class="ui-state-default" role="columnheader" aria-label="Tax Upto" scope="col"><span class="ui-column-title">Tax Upto</span></th><th id="qqq:j_idt1035" class="ui-state-default" role="columnheader" aria-label="Amount" scope="col"><span class="ui-column-title">Amount</span></th></tr></thead><tbody id="qqq_data" class="ui-datatable-data ui-widget-content"><tr class="ui-widget-content ui-datatable-empty-message"><td colspan="5">No records found.</td></tr></tbody></table></div></div>
</div>
</div>
<div class="ui-grid-row">
<div class="ui-grid-col-3">
<label class="field-label resp-label-section"><label id="j_idt1038" class="ui-outputlabel ui-widget field-label-mandate">Total Amount</label>
</label><input id="total_tax_amount" name="total_tax_amount" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all ui-state-disabled" aria-disabled="true" role="textbox" aria-readonly="false">
</div><div class="ui-grid-col-3">
<label class="field-label resp-label-section"><label id="j_idt1038" class="ui-outputlabel ui-widget field-label-mandate">Permit Fee</label>
</label><input id="service_amount" name="service_amount" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all ui-state-disabled" aria-disabled="true" role="textbox" aria-readonly="false">
</div><div class="ui-grid-col-1"></div>
<div class="ui-grid-col-5">
<div class="ui-grid-row">
<div class="ui-grid-col-12 top_mar1 mar-left5">
<div class="ui-grid-col-12 top_mar1 mar-left5">
<input type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" name="Pay_Tax" id="Pay_Tax" value="Pay Tax">
</div>
</div>
</div>
</div>
</div></div><div id="j_idt1047_blocker" class="ui-blockui ui-widget-overlay ui-helper-hidden ui-corner-all"></div><div id="j_idt1047" class="ui-blockui-content ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow"><img id="j_idt1048" src="./Checkpost _150_8_files/ajax_loader_blue.gif" alt="" width="30%" height="40%"></div></div><div id="popup" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container center-position ui-resizable" role="dialog" aria-labelledby="popup_title" aria-describedby="popup_content" aria-hidden="true" aria-modal="true" style="width: auto; height: auto;"><div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="popup_title" class="ui-dialog-title"></span></div>
<div class="ui-dialog-content ui-widget-content" id="popup_content" style="height: auto;"></div>
<div class="ui-resizable-handle ui-resizable-n" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-w" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-ne" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-nw" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-sw" style="z-index: 90;"></div></div>
</div>
</div>
</div>
</div>
</div><input type="hidden" name="javax.faces.ViewState" id="j_id1:javax.faces.ViewState:0" value="803488800218286797:6721007446073889934" autocomplete="off">
</form>
<script src="{{asset('mh/jquery/external/jquery/jquery.js')}}"></script>
<script src="{{asset('mh/jquery/jquery-ui.js')}}"></script>
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
</body></html>

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
                            <a href="{{route('user.booking.hr')}}" style="color:#ffffff">Home</a> | <a href="{{route('user.booking.hr')}}{{route('user.apply.list.hr')}}" style="color:#ffffff">List</a>  | <a href="{{route('user.booking.hr')}}{{route('user.apply.list.hr')}}{{route('user.logout.hr')}}" style="color:#ffffff">Logout</a>

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
