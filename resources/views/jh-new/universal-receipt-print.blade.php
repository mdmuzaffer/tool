<!DOCTYPE html>
<!-- saved from url=(0088)http://164.100.78.32/qrCodeV/vahan/view/checkpostverifyreceipt.xhtml?faces-redirect=true -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head id="j_idt3">
    <link type="text/css" rel="stylesheet" href="/Online Tax Payment Portal_files/theme.css">
    <link type="text/css" rel="stylesheet" href="/Online Tax Payment Portal_files/layout.css">
    <link type="text/css" rel="stylesheet" href="/Online Tax Payment Portal_files/grid-css.css">
    <link type="text/css" rel="stylesheet" href="/Online Tax Payment Portal_files/components.css">
    <script type="text/javascript" src="/Online Tax Payment Portal_files/jquery.js.download"></script>
    <script type="text/javascript" src="/Online Tax Payment Portal_files/core.js.download"></script>
    <script type="text/javascript" src="/Online Tax Payment Portal_files/components.js.download"></script>
    <script type="text/javascript" src="/Online Tax Payment Portal_files/jquery-plugins.js.download"></script>
    <script type="text/javascript">
        if(window.PrimeFaces){PrimeFaces.settings.locale='en_US';PrimeFaces.settings.projectStage='Development';}
    </script>
    <title>Online Tax Payment Portal</title>
    <script type="text/javascript" src="/Online Tax Payment Portal_files/bootstrap.js.download"></script>
</head>

@php
$timePaid = strtoupper($rectdata->created_at->format('d-M-Y h:i a'));
@endphp

<body>
    <form id="formPrint" name="formPrint" method="post" action="" enctype="application/x-www-form-urlencoded">
        <input type="hidden" name="formPrint" value="formPrint">


        <div class="table-responsive">
            <div id="j_idt10" class="ui-outputpanel ui-widget">
                <input id="regn_number" type="hidden" name="regn_number" value="{{$rectdata->vehicleno}}">
                <input id="payment_date" type="hidden" name="payment_date" value="{{$timePaid}}">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr valign="top">
                            <td width="17%"></td>
                            <td width="65%" align="center">
                                <div
                                    style="font-size:18px; font-weight:bold; color:#000000; text-decoration:underline; padding-right:15px;">
                                    GOVERNMENT OF {{strtoupper($rectdata->state_name)}}</div>
                                <div style="font-weight: bold;">Department of Transport</div>
                                <div>Checkpost e-Receipt</div>
                            </td>

                        </tr>

                        <tr valign="top">
                            <td colspan="3">
                                .
                                <table width="100%" border="0" cellspacing="0" cellpadding="0"
                                    style="padding-top:10px;">


                                    <tbody>
                                        <tr>
                                            <td width="50%" class="row-p"><label>Registration No. </label></td>
                                            <td width="50%" class="row-p"><span id="regn_no"
                                                    style="font-weight: bold;">: {{$rectdata->vehicleno}}</span> </td>
                                        </tr>



                                        <tr>
                                            <td width="50%" class="row-p"><label>Receipt No</label></td>
                                            <td width="50%" class="row-p">: {{$rectdata->receipt_no_gen}} </td>
                                        </tr>



                                        <tr>
                                            <td width="50%" class="row-p"><label>Payment Date</label></td>
                                            <td width="50%" class="row-p">: {{$timePaid}} </td>
                                        </tr>
                                        <tr>
                                            <td width="50%" class="row-p"><label>Owner Name</label></td>
                                            <td width="50%" class="row-p">: {{strtoupper($rectdata->ownername)}} </td>
                                        </tr>



                                        <tr>
                                            <td width="50%" class="row-p"><label>Chassis No.</label></td>
                                            <td width="50%" class="row-p">: {{$rectdata->chassisno}} </td>
                                        </tr>
                                        <tr>
                                            <td width="50%" class="row-p"><label>Tax Mode</label></td>
                                            <td width="50%" class="row-p">: {{strtoupper($rectdata->TaxMode)}} </td>
                                        </tr>
                                        <tr>
                                            <td width="50%" class="row-p"><label>Vehilce Type</label></td>
                                            <td width="50%" class="row-p">: {{strtoupper($rectdata->VehicleType)}} </td>
                                        </tr>
                                        <tr>
                                            <td width="50%" class="row-p"><label>Vehicle Class</label></td>
                                            <td width="50%" class="row-p">: {{strtoupper($rectdata->VehicleClass)}}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%" class="row-p"><label>Mobile No.</label></td>
                                            <td width="50%" class="row-p">: {{$rectdata->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%" class="row-p"><label>Checkpost Name</label></td>
                                            <td width="50%" class="row-p">: {{strtoupper($rectdata->border_entry)}} </td>
                                        </tr>
                                        <tr>
                                            <td width="50%" class="row-p"><label>Service Type</label></td>
                                            <td width="50%" class="row-p">: {{strtoupper($rectdata->ServiceType)}} </td>
                                        </tr>
                                        <tr>
                                            <td width="50%" class="row-p"><label>Seat Cap(Excluding Driver)</label></td>
                                            <td width="50%" class="row-p">: {{$rectdata->seating_c}} </td>
                                        </tr>
                                        <tr>
                                            <td width="50%" class="row-p"><label>Bank Ref. No.</label></td>
                                            <td width="50%" class="row-p">:
                                                @if($rectdata->payment_mode=='CASH') {{$rectdata->receipt_no_gen}} @else {{$rectdata->bank_ref_no_gen}}  @endif
                                                </td>
                                        </tr>
                                        <tr>
                                            <td width="50%" class="row-p"><label>Payment Mode</label></td>
                                            <td width="50%" class="row-p">:

                                                {{strtoupper($rectdata->payment_mode)}}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%" class="row-p"><label>Distance Traveled</label></td>

                                            <td width="50%" class="row-p">: NA</td>
                                        </tr>
                                        <tr>
                                            <td width="50%" class="row-p"><label>No of Visit</label></td>
                                            <td width="50%" class="row-p">: NOT APPLICABLE </td>
                                        </tr>
                                        <tr>

                                            @if ($rectdata->VehicleType == "GOODS VEHICLE")

                                            <td width="50%" class="row-p"><label>
                                                    Laden Weight
                                                </label></td>
                                            <td width="50%" class="row-p">: {{$rectdata->seating_c}} KG
                                                . </td>
                                            @else

                                            <td width="50%" class="row-p"><label>
                                                    Seat Cap(Ex. Driver)
                                                </label></td>
                                            <td width="50%" class="row-p">: {{$rectdata->seating_c}}
                                                . </td>
                                            @endif

                                        </tr>
                                        <tr>
                                            <td width="50%" class="row-p"><label>Document Name</label> </td>
                                            <td width="50%" class="row-p">: NA </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="row-p">
                                <div>
                                    <div class="ui-grid ui-grid-responsive">
                                        <div class="ui-grid-row"
                                            style="border-top: 1px #000 solid;border-bottom: 1px #000 solid;border-left: none; border-right: none;">
                                            <div class="ui-grid-col-9 left-position hed-right">Particular</div>
                                            <div class="ui-grid-col-1 left-position hed-right">Fees/Tax</div>
                                            <div class="ui-grid-col-1 left-position hed-right">Fine</div>
                                            <div class="ui-grid-col-1 right-position hed-right">Total Amount</div>
                                        </div>
                                        <div id="j_idt83" class="ui-datalist ui-widget">
                                            <div id="j_idt83_content" class="ui-datalist-content ui-widget-content">
                                                <ul id="j_idt83_list" class="ui-datalist-data">
                                                    <li class="ui-datalist-item">
                                                        <div class="ui-grid-row">
                                                            <div class="ui-grid-col-9 left-position hed-bot">MV Tax( {{$rectdata->tax_from}} TO
                                                                {{$rectdata->tax_upto}} )</div>
                                                            <div class="ui-grid-col-1 right-position hed-bot"><span
                                                                    class="ui-grid-col-1 right-position">{{$rectdata->total_tax_amount}}</span>
                                                            </div>
                                                            <div class="ui-grid-col-1 right-position hed-bot">0</div>
                                                            <div class="ui-grid-col-1 right-position hed-bot"><span
                                                                    class="ui-grid-col-1 right-position">{{$rectdata->total_tax_amount}}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @if ($rectdata->service_amount!="")
                                                    <li class="ui-datalist-item">
                                                        <div class="ui-grid-row">
                                                            <div class="ui-grid-col-9 left-position hed-bot">Service/User Charge</div>
                                                            <div class="ui-grid-col-1 right-position hed-bot"><span
                                                                    class="ui-grid-col-1 right-position">{{$rectdata->service_amount}}</span>
                                                            </div>
                                                            <div class="ui-grid-col-1 right-position hed-bot">0</div>
                                                            <div class="ui-grid-col-1 right-position hed-bot"><span
                                                                    class="ui-grid-col-1 right-position">{{$rectdata->service_amount}}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endif

                                                    @if ($rectdata->civik_amount!="")
                                                    <li class="ui-datalist-item">
                                                        <div class="ui-grid-row">
                                                            <div class="ui-grid-col-9 left-position hed-bot">Civic Infra Cess</div>
                                                            <div class="ui-grid-col-1 right-position hed-bot"><span
                                                                    class="ui-grid-col-1 right-position">{{$rectdata->civik_amount}}</span>
                                                            </div>
                                                            <div class="ui-grid-col-1 right-position hed-bot">0</div>
                                                            <div class="ui-grid-col-1 right-position hed-bot"><span
                                                                    class="ui-grid-col-1 right-position">{{$rectdata->civik_amount}}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endif
                                                    @if ($rectdata->return_amont!=0.00)
                                                    <li class="ui-datalist-item">
                                                        <div class="ui-grid-row">
                                                            <div class="ui-grid-col-9 left-position hed-bot">Single Return Trip Permit Fee</div>
                                                            <div class="ui-grid-col-1 right-position hed-bot"><span
                                                                    class="ui-grid-col-1 right-position">{{$rectdata->return_amont}}</span>
                                                            </div>
                                                            <div class="ui-grid-col-1 right-position hed-bot">0</div>
                                                            <div class="ui-grid-col-1 right-position hed-bot"><span
                                                                    class="ui-grid-col-1 right-position">{{$rectdata->return_amont}}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endif




                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="3"><span style="font-weight: bold;">Grand Total : {{$rectdata->total_tax_amount+(($rectdata->service_amount!="") ? $rectdata->service_amount : 0)+(($rectdata->civik_amount!="") ? $rectdata->civik_amount : 0)+$rectdata->return_amont   }}/-</span> </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div><input type="hidden" name="javax.faces.ViewState" id="j_id1:javax.faces.ViewState:0"
            value="2832645013055247187:-1691781665510573931" autocomplete="off">
    </form>
    <div id="textarea_simulator" style="position: absolute; top: 0px; left: 0px; visibility: hidden;"></div>
</body>

</html>
