<!DOCTYPE html>
<!-- saved from url=(0083)https://vahan.parivahan.gov.in/checkpost/faces/public/reports/CustomerReceipt.xhtml -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head id="j_idt2"> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link type="text/css" rel="stylesheet" href="{{asset('ka/Online Tax Payment Portal_files/theme.css?v='.uniqid())}}">
    <link type="text/css" rel="stylesheet" href="{{asset('ka/Online Tax Payment Portal_files/layout.css?v='.uniqid())}}">
    <link type="text/css" rel="stylesheet" href="{{asset('ka/Online Tax Payment Portal_files/grid-css.css?v='.uniqid())}}">
    <link type="text/css" rel="stylesheet" href="{{asset('ka/Online Tax Payment Portal_files/primefaces.css?v='.uniqid())}}">
    <script type="text/javascript" src="{{asset('ka/Online Tax Payment Portal_files/jquery.js.download?v='.uniqid())}}"></script>
    <script type="text/javascript" src="{{asset('ka/Online Tax Payment Portal_files/primefaces.js.download?v='.uniqid())}}"></script>
    <script type="text/javascript" src="{{asset('ka/Online Tax Payment Portal_files/jquery-plugins.js.download?v='.uniqid())}}"></script>
    <script type="text/javascript" src="{{asset('ka/Online Tax Payment Portal_files/primefaces-extensions.js.download?v='.uniqid())}}">
    </script>
    <script type="text/javascript" src="{{asset('ka/Online Tax Payment Portal_files/qrcode.js.download?v='.uniqid())}}"></script>
    <title>Online Tax Payment Portal</title>
    <script type="text/javascript" src="{{asset('ka/Online Tax Payment Portal_files/bootstrap.js.download?v='.uniqid())}}"></script>
    <style>
        @page {
            size: auto;
            margin: 2mm;
        }

        @media print {
            .watermark {
                color: #d0d0d0;
                position: absolute;
                z-index: -1;
                left: 280px;
                top: 210px;
                opacity: 0.5;
                filter: alpha(opacity=50);
            }
        }
		#j_idt105_list table tr {
			height: 25px;
		   
		}
		
		.row-p {
			padding-top: 15px;
			
		}

        @media screen {
            .watermark {
                color: #d0d0d0;
                position: absolute;
                image-orientation: 45deg flip;
                font-size: 44px;
                background-position-x: repeat-y !important;
                z-index: -1;
                opacity: 0.5;
                filter: alpha(opacity=70);
                left: 850px;
                top: 193px;
            }
        }

        #regn_date {
            position: absolute;
            z-index: -1;
            opacity: 0.2;
            font-size: 20px;
            filter: alpha(opacity=50);
            /*                -webkit-transform: rotate(-45deg);
                                -moz-transform: rotate(-45deg);*/
        }

        .border-un {
            border-bottom: 1px #000 solid !important;
            border-right: none !important;
            border-left: none !important;
        }

        .ui-widget-content {
            border: none !important;
        }
    </style>
    <script>
        function textRepeat() {
                var str = document.getElementById("regn_number").value + " / " + document.getElementById("payment_date").value + ", ";
                document.getElementById("regn_date").innerHTML = str.repeat(34);
            }
    </script>
</head>
@php
$timePaid = strtoupper($rectdata->created_at->format('d-M-Y h:i a'));
@endphp

<body onLoad="window.print(), textRepeat()">
    <!-- ,textRepeat()     -->
    <div class="watermark">
        <!--            &lt;p style="font-size:100px;"&gt;Sample&lt;/p&gt;--><img id="j_idt10"
            src="{{asset('ka/Online Tax Payment Portal_files/logo-center.png?v='.uniqid())}}" alt="">
    </div>
    <form id="formPrint" name="formPrint" method="get"
        action="{{ route('user.apply.list.ka') }}"
        enctype="application/x-www-form-urlencoded">
        <input type="hidden" name="formPrint" value="formPrint">

        <div class="center-position"><button id="j_idt13" name="j_idt13"
                class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left display-none"
                onClick="PrimeFaces.ab({s:&quot;j_idt13&quot;,f:&quot;formPrint&quot;});return false;" type="submit"
                role="button" aria-disabled="false"><span
                    class="ui-button-icon-left ui-icon ui-c ui-icon-arrowreturnthick-1-w"></span><span
                    class="ui-button-text ui-c">Back</span></button>
					<!--<a href="/list" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left display-none"><span
                    class="ui-button-icon-left ui-icon ui-c ui-icon-arrowreturnthick-1-w"></span><span
                    class="ui-button-text ui-c">Back</span></a>-->
            <button id="j_idt14" name="j_idt14"
                class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left display-none"
                {{-- onClick="PrimeFaces.bcn(this,event,[function(event){window.print();},function(event){PrimeFaces.ab({s:&quot;j_idt14&quot;,f:&quot;formPrint&quot;});return false;}]);" --}}
                onclick="window.print();"
                type="button" role="button" aria-disabled="false"><span
                    class="ui-button-icon-left ui-icon ui-c ui-icon-print"></span><span
                    class="ui-button-text ui-c">Print</span></button>
        </div>
        <div class="table-responsive" style="margin-left: 30px;margin-right: 10px;margin-top: 10px;">
            <div id="j_idt16" class="ui-outputpanel ui-widget"><input id="regn_number" type="hidden" name="regn_number"
                    value="{{strtoupper($rectdata->vehicleno)}}">
                <input id="payment_date" type="hidden" name="payment_date" value="{{$timePaid}}">
                <!--<p id="regn_date"></p>-->
                <table width="100%" border="0" cellspacing="0" cellpadding="0">

                    <tbody>
                        <tr valign="top">
                            <td width="17%">Receipt Printing date <br><?php echo date('d-M-Y H:i:s');?>
                                <img id="j_idt10"
            src="{{asset('ka/Online Tax Payment Portal_files/logo-left.png?v='.uniqid())}}" alt=""></td>
                            <td width="61%" align="center">
                                <div
                                    style="font-size:18px; font-weight:bold; color:#000000;text-decoration:underline; padding-right:15px;">
                                    GOVERNMENT OF KARNATAKA</div>
                                <div style="font-weight: bold;font-size: 18px;"><b>Department of Transport</b></div>
                                <div style="font-weight: bold;font-size: 16px;"><b>Checkpost Tax e-Receipt</b></div><br>
								<div style="font-weight: bold;font-size: 18px;"><b style="border: 1px solid;padding: 2px;">Receipt No.: {{$rectdata->receipt_no_gen}}</b></div>
                            </td>
                            <td width="22%" rowspan="2" align="left" style="margin-right: 50px;"><span id="j_idt19">
                                    {!! QrCode::size(140)->generate($rectdata->universal_link); !!}
                                </span>
                                {{-- <script id="j_idt19_s" type="text/javascript">
                                    $(function() {PrimeFacesExt.cw('QRCode', 'widget_j_idt19', {id:'j_idt19',render:'canvas',mode:0,minVersion:1,maxVersion:40,left:0,top:0,size:140,fill:'000000',ecLevel:'H',text:'{{$rectdata->universal_link}}',radius:0.0,quiet:0,mSize:0.1,mPosX:0.5,mPosY:0.5,label:'QR
                                Code'}, false);});
                                </script> --}}
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4">
                                
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="3">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0"
                                    style="padding-top:10px;">
                                    <tbody>
									<tr>
                                            <td width="15%" class="row-p"><label>Vehicle No.</label></td>
                                            <td width="35%" class="row-p"><span id="regn_no"
                                                    style="font-weight: bold;">: {{strtoupper($rectdata->vehicleno)}}</span> </td>
													<td width="15%" class="row-p"><label>Payment Date</label></td>
                                            <td width="35%" class="row-p">:
                                                {{strtoupper($rectdata->created_at->format('d-M-Y h:i a'))}}</td>
                                        </tr>
									 <tr>
                                            <td width="15%" class="row-p"><label>Owner Name</label></td>
                                            <td width="35%" class="row-p">: {{strtoupper($rectdata->ownername)}} </td>
											  <td width="15%" class="row-p"><label>Mobile No.</label></td>
                                            <td width="35%" class="row-p">: {{$rectdata->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <td width="15%" class="row-p"><label>Chassis No.</label></td>
                                            <td width="35%" class="row-p">: {{strtoupper($rectdata->chassisno)}}</td>
                                            <td width="15%" class="row-p"><label>Tax Mode</label></td>
                                            <td width="35%" class="row-p">: {{$rectdata->TaxMode}} </td>
                                        </tr>
                                        <tr>
                                            <td width="15%" class="row-p"><label>Vehilce Type</label></td>
                                            <td width="45%" class="row-p">: {{$rectdata->VehicleType}} </td>
                                            <td width="15%" class="row-p"><label>Vehicle Class</label></td>
                                            <td width="35%" class="row-p">: {{$rectdata->VehicleClass}}</td>
                                        </tr>
										<tr>
                                            <td width="15%" class="row-p"><label>Permit Type</label></td>
                                            <td width="35%" class="row-p">: {{$rectdata->PermitType}}</td>
											@if ($rectdata->VehicleType == "GOODS VEHICLE" || $rectdata->VehicleType == "CONSTRUCTION EQUIPMENT VEHICLE")

                                            <td width="15%" class="row-p"><label>Floor Area</label></td>
                                            <td width="35%" class="row-p">: {{($rectdata->txt_floor_area)?$rectdata->txt_floor_area:'NA'}}</td>
                                            @else

                                            <td width="20%" class="row-p"><label>
                                                    Seat Cap(Ex. Driver)
                                                </label></td>
                                            <td width="35%" class="row-p">: {{$rectdata->seating_c}}
                                                 </td>
                                            @endif
                                            
                                        </tr>
                                        <tr>
										@if ($rectdata->VehicleType == "GOODS VEHICLE" || $rectdata->VehicleType == "CONSTRUCTION EQUIPMENT VEHICLE")

                                            <td width="15%" class="row-p"><label>
                                                    Laden Weight
                                                </label></td>
                                            <td width="35%" class="row-p">: {{$rectdata->seating_c}} KG
                                                . </td>
										@endif
                                            <td width="15%" class="row-p"><label>{{($rectdata->VehicleType == "GOODS VEHICLE" || $rectdata->VehicleType == "CONSTRUCTION EQUIPMENT VEHICLE")?'Un Laden Weight':'Sleeper Cap.'}}</label></td>
                                            <td width="35%" class="row-p">: {{($rectdata->txt_sleeper_cap)?$rectdata->txt_sleeper_cap:0}}</td>
										@if ($rectdata->VehicleType != "GOODS VEHICLE" && $rectdata->VehicleType != "CONSTRUCTION EQUIPMENT VEHICLE")
											<td width="15%" class="row-p"><label>Floor Area</label></td>
                                            <td width="35%" class="row-p">: {{($rectdata->txt_floor_area)?$rectdata->txt_floor_area:'NA'}}</td>
										@endif
                                            
                                        </tr>
                                        <tr>
                                           
                                            <td width="15%" class="row-p"><label>Permit Validity</label></td>
                                            <td width="35%" class="row-p">: {{$rectdata->permit_upto}}</td>
											<td width="15%" class="row-p"><label>Fitness Validity</label></td>
                                            <td width="35%" class="row-p">: {{$rectdata->fitdate}}</td>
                                        </tr>
										<tr>
                                           
                                            <td width="15%" class="row-p"><label>Insurance Validity</label></td>
                                            <td width="35%" class="row-p">: {{$rectdata->ins_upto}}</td>
											<td width="15%" class="row-p"><label>Tax Validity</label></td>
                                            <td width="35%" class="row-p">: {{$rectdata->tax_validity}}</td>
                                        </tr>
										<tr>
                                           
                                            <td width="15%" class="row-p"><label>Checkpost Name</label></td>
                                            <td width="35%" class="row-p">: {{$rectdata->border_entry}}</td>
											<td width="15%" class="row-p"><label>Bank Ref. No.</label></td>
                                            <td width="35%" class="row-p">:
                                                {{$rectdata->bank_ref_no_gen}}</td>
                                        </tr>
                                        <tr>
                                            
                                            <td width="15%" class="row-p"><label>Payment Mode</label></td>
                                            <td width="35%" class="row-p">: ONLINE</td>
											<td width="15%" class="row-p"><label>Payment Status</label></td>
                                            <td width="35%" class="row-p">: SUCCESS</td>
                                        </tr>
                                       
                                        <!--<tr>
                                            <td width="15%" class="row-p"><label>Permit from Date</label></td>
                                            <td width="35%" class="row-p">: {{strtoupper($rectdata->permit_from)}}</td>
                                          <td width="15%" class="row-p"><label>Permit upto Date</label></td>
                                            <td width="35%" class="row-p">: {{strtoupper($rectdata->permit_upto)}}</td>
                                        </tr>-->
                                        <!--<tr>
                                            <td width="15%" class="row-p"><label>Service Type</label></td>
                                            <td width="35%" class="row-p">:  {{($rectdata->ServiceType)?$rectdata->ServiceType:'NOT APPLICABILE'}}</td>
                                            <td width="15%" class="row-p"></td>
                                            <td width="35%" class="row-p"></td>
                                        </tr>-->
										
                                        <!--<tr>
                                            <td width="15%" class="row-p"><label>Permit Type</label></td>
                                            <td width="35%" class="row-p">: {{$rectdata->PermitType}}</td>
                                        </tr>-->
                                        
                                        
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="row-p">
                                <div>
                                    <div class="ui-grid-responsive">
                                        <table width="99%" border="0" cellspacing="0"
                                            style="border-top: 1px #000 solid;border-bottom: 1px #000 solid;border-left: none; border-right: none;"
                                            cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td width="64%" style="font-weight:bold;">Particular</td>
                                                    <td width="12%" style="font-weight:bold;">Fees/Tax</td>
                                                    <td width="12%" style="font-weight:bold;">Fine</td>
                                                    <td width="12%" style="font-weight:bold;">Total</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div id="j_idt105" class="ui-datalist ui-widget">
                                            <div id="j_idt105_content" class="ui-datalist-content ui-widget-content">
                                                <ul id="j_idt105_list" class="ui-datalist-data">
                                                    <li class="ui-datalist-item">
                                                        <table width="99%" border="1" cellspacing="0"
                                                            style="border-top: none;border-bottom: 1px #000 solid;border-left: none; border-right: none;"
                                                            cellpadding="0">
                                                            <tbody><tr>
                                                                <td width="64%">MV Tax( {{strtoupper($rectdata->tax_from)}} TO
                                                                    {{strtoupper($rectdata->tax_upto)}} )</td>
                                                                <td width="12%" style="align: right;"><span
                                                                    class="ui-grid-col-1 right-position">{{$rectdata->total_tax_amount}}</td>
                                                                <td width="12%" style="align: right;">0</td>
                                                                <td width="12%" style="align: right;"><span
                                                                    class="ui-grid-col-1 right-position">{{$rectdata->total_tax_amount}}</span></td>
                                                            </tr>
                                                        </tbody>
                                                            {{-- <tbody>
                                                                <tr>
                                                                    <td width="64%">MV Tax( {{strtoupper($rectdata->tax_from)}} TO
                                                                        {{strtoupper($rectdata->tax_upto)}} )
                                                                    </td>
                                                                    <td width="12%" style="align: right;"><span
                                                                            class="ui-grid-col-1 right-position">{{$rectdata->total_tax_amount}}</span>
                                                                    </td>
                                                                    <td width="12%" style="align: right;">0</td>
                                                                    <td width="12%" style="align: right;"><span
                                                                            class="ui-grid-col-1 right-position">{{$rectdata->total_tax_amount}}</span>
                                                                    </td>
                                                                </tr>
                                                            </tbody> --}}

                                                        </table>
                                                    </li>
													@if($rectdata->service_amount)
                                                     <li class="ui-datalist-item">
                                                        <table width="99%" border="1" cellspacing="0" style="border-top: none;border-bottom: 1px #000 solid;border-left: none; border-right: none;" cellpadding="0">
                                                            <tbody><tr>
                                                                <td width="64%">Cess</td>
                                                                <td width="12%" style="align: right;"><span class="ui-grid-col-1 right-position">{{($rectdata->service_amount)?$rectdata->service_amount:0}}</span></td>
                                                                <td width="12%" style="align: right;">0</td>
                                                                <td width="12%" style="align: right;"><span class="ui-grid-col-1 right-position">{{($rectdata->service_amount)?$rectdata->service_amount:0}}</span></td>
                                                            </tr>
                                                        </tbody></table> 
                                                    </li>
													@endif
													@if($rectdata->infra_cess)
													<li class="ui-datalist-item">
                                                        <table width="99%" border="1" cellspacing="0" style="border-top: none;border-bottom: 1px #000 solid;border-left: none; border-right: none;" cellpadding="0">
                                                            <tbody><tr>
                                                                <td width="64%">Infra Cess</td>
                                                                <td width="12%" style="align: right;"><span class="ui-grid-col-1 right-position">{{($rectdata->infra_cess)?$rectdata->infra_cess:0}}</span></td>
                                                                <td width="12%" style="align: right;">0</td>
                                                                <td width="12%" style="align: right;"><span class="ui-grid-col-1 right-position">{{($rectdata->infra_cess)?$rectdata->infra_cess:0}}</span></td>
                                                            </tr>
                                                        </tbody></table> 
                                                    </li>
													@endif
													@if($rectdata->permit_fee)
													<li class="ui-datalist-item">
                                                        <table width="99%" border="1" cellspacing="0" style="border-top: none;border-bottom: 1px #000 solid;border-left: none; border-right: none;" cellpadding="0">
                                                            <tbody><tr>
                                                                <td width="64%">Permit Fee</td>
                                                                <td width="12%" style="align: right;"><span class="ui-grid-col-1 right-position">{{($rectdata->permit_fee)?$rectdata->permit_fee:0}}</span></td>
                                                                <td width="12%" style="align: right;">0</td>
                                                                <td width="12%" style="align: right;"><span class="ui-grid-col-1 right-position">{{($rectdata->permit_fee)?$rectdata->permit_fee:0}}</span></td>
                                                            </tr>
                                                        </tbody></table> 
                                                    </li>
													@endif
													@if($rectdata->permit_endoresment_variation)
													<li class="ui-datalist-item">
                                                        <table width="99%" border="1" cellspacing="0" style="border-top: none;border-bottom: 1px #000 solid;border-left: none; border-right: none;" cellpadding="0">
                                                            <tbody><tr>
                                                                <td width="64%">Permit Endoresment/Variation</td>
                                                                <td width="12%" style="align: right;"><span class="ui-grid-col-1 right-position">{{($rectdata->permit_endoresment_variation)?$rectdata->permit_endoresment_variation:0}}</span></td>
                                                                <td width="12%" style="align: right;">0</td>
                                                                <td width="12%" style="align: right;"><span class="ui-grid-col-1 right-position">{{($rectdata->permit_endoresment_variation)?$rectdata->permit_endoresment_variation:0}}</span></td>
                                                            </tr>
                                                        </tbody></table> 
                                                    </li>
													@endif
													
                                                    {{-- <li class="ui-datalist-item">
                                                        <table width="99%" border="1" cellspacing="0" style="border-top: none;border-bottom: 1px #000 solid;border-left: none; border-right: none;" cellpadding="0">
                                                            <tbody><tr>
                                                                <td width="64%">Civic Infra Cess</td>
                                                                <td width="12%" style="align: right;"><span class="ui-grid-col-1 right-position">{{$rectdata->civik_amount}}</span></td>
                                                                <td width="12%" style="align: right;">0</td>
                                                                <td width="12%" style="align: right;"><span class="ui-grid-col-1 right-position">{{$rectdata->civik_amount}}</span></td>
                                                            </tr>
                                                        </tbody></table>
                                                    </li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="3"><span style="font-weight: bold;">Grand Total : </span><img id="j_idt109"
                                    src="{{asset('ka/Online Tax Payment Portal_files/rupees_sign.png?v='.uniqid())}}" alt="" width="10px"
                                    height="10px"> <span
                                    style="font-weight: bold;">{{$rectdata->total_tax_amount+$rectdata->service_amount+$rectdata->infra_cess+$rectdata->permit_fee+$rectdata->permit_endoresment_variation}}</span>/- ( <span
                                    style="text-transform:uppercase;">{{strtoupper(getIndianCurrencyInWordV2($rectdata->total_tax_amount+$rectdata->service_amount+$rectdata->infra_cess+$rectdata->permit_fee+$rectdata->permit_endoresment_variation))}}
                                    ONLY</span>) </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="3"><span style="font-style: italic;">Note : 1) This is a computer generated printout and no signature is required.</span><br><span style="font-style: italic;">2) Incorrect  mentioning of vehicle class or seating capacity may lead to tax evasion and defaulter shall be liable for penal action.</span><br><span style="font-style: italic;">3) To get a Green Card issued for Chardham Yatra: It is mandatory to produce passenger's list duly verified by any border checkpost of Uttarakhand.</span><span style="font-style: italic;"><br>You will also receive the payment confirmation message.</span>
                            </td>
                        </tr>

                         <tr valign="top" style="margin-top:20px">
                            <td colspan="3" style="font-weight: 1000; font-size:14px;">
                                <br><br>
                                Scan the QR code for genuinity of the receipt, It should land at <span style="color:blue;">https://kms.parivahan.gov.in</span> site. In case <br> the URL is different, then receipt could be a fake one, please raise a complain
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div style="float: right;">
                </div>
            </div>
        </div><input type="hidden" name="javax.faces.ViewState" id="j_id1:javax.faces.ViewState:0"
            value="-3810988453043415378:-5599655139029637065" autocomplete="off">
    </form>
    <div id="textarea_simulator" style="position: absolute; top: 0px; left: 0px; visibility: hidden;"></div>
</body>

</html>
