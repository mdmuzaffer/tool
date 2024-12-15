<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice - {{$invoice->slno_gen}}</title>
    <STYLE type="text/css">
        body {
            margin-top: 0px;
            margin-left: 0px;
        }

        #page_1 {
            position: relative;
            overflow: hidden;
            /* margin: 52px 0px 207px 53px; */
            padding: 0px;
            border: 1pt ;
            width: 740px;

        }

        #page_1 #id1_1 {
            border: none;
            margin: 0px 0px 0px 0px;
            padding: 0px;
            border: none;
            width: 740px;
            overflow: hidden;
        }

        #page_1 #id1_1 #id1_1_1 {
            float: left;
            border: none;
            margin: 5px 0px 0px 0px;
            padding: 0px;
            border: none;
            width: 601px;
            overflow: hidden;
        }

        #page_1 #id1_1 #id1_1_2 {
            float: left;
            border: none;
            margin: 0px 0px 0px 0px;
            padding: 0px;
            border: none;
            width: 139px;
            overflow: hidden;
        }

        #page_1 #id1_2 {
            border: none;
            margin: 53px 0px 0px 0px;
            padding: 0px;
            border: none;
            width: 740px;
            overflow: hidden;
        }

        #page_1 #p1dimg1 {
            position: absolute;
            top: 155px;
            left: 0px;
            z-index: -1;
            width: 686px;
            height: 3px;
            font-size: 1px;
            line-height: nHeight;
        }

        #page_1 #p1dimg1 #p1img1 {
            width: 686px;
            height: 3px;
        }




        .ft0 {
            font: 19px 'Arial';
            line-height: 22px;
        }

        .ft1 {
            font: 12px 'Arial';
            line-height: 20px;
        }

        .ft2 {
            font: 12px 'Arial';
            line-height: 19px;
        }

        .ft3 {
            font: bold 25px 'Arial';
            line-height: 30px;
        }

        .ft4 {
            font: bold 12px 'Arial';
            line-height: 15px;
        }

        .ft5 {
            font: 12px 'Arial';
            line-height: 15px;
        }

        .ft6 {
            font: 1px 'Arial';
            line-height: 1px;
        }

        .ft7 {
            font: 1px 'Arial';
            line-height: 6px;
        }

        .ft8 {
            font: 1px 'Arial';
            line-height: 7px;
        }

        .p0 {
            text-align: left;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .p1 {
            text-align: left;
            padding-right: 454px;
            margin-top: 2px;
            margin-bottom: 0px;
        }

        .p2 {
            text-align: left;
            padding-right: 453px;
            margin-top: 22px;
            margin-bottom: 0px;
        }

        .p3 {
            text-align: left;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p4 {
            text-align: right;
            padding-right: 19px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p5 {
            text-align: left;
            padding-left: 1px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p6 {
            text-align: right;
            padding-right: 20px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p7 {
            text-align: left;
            padding-left: 6px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p8 {
            text-align: left;
            padding-left: 5px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p9 {
            text-align: left;
            padding-left: 4px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p10 {
            text-align: left;
            margin-top: 52px;
            margin-bottom: 0px;
        }

        .p11 {
            text-align: left;
            padding-left: 382px;
            margin-top: 149px;
            margin-bottom: 0px;
        }

        .p12 {
            text-align: left;
            padding-left: 382px;
            margin-top: 6px;
            margin-bottom: 0px;
        }

        .p13 {
            text-align: left;
            padding-left: 382px;
            margin-top: 5px;
            margin-bottom: 0px;
        }

        .td0 {
            padding: 0px;
            margin: 0px;
            width: 64px;
            vertical-align: bottom;
        }

        .td1 {
            padding: 0px;
            margin: 0px;
            width: 137px;
            vertical-align: bottom;
        }

        .td2 {
            padding: 0px;
            margin: 0px;
            width: 156px;
            vertical-align: bottom;
        }

        .td3 {
            padding: 0px;
            margin: 0px;
            width: 163px;
            vertical-align: bottom;
        }

        .td4 {
            padding: 0px;
            margin: 0px;
            width: 111px;
            vertical-align: bottom;
        }

        .td5 {
            padding: 0px;
            margin: 0px;
            width: 56px;
            vertical-align: bottom;
        }

        .td6 {
            padding: 0px;
            margin: 0px;
            width: 53px;
            vertical-align: bottom;
        }

        .td7 {
            padding: 0px;
            margin: 0px;
            width: 58px;
            vertical-align: bottom;
        }

        .td8 {
            padding: 0px;
            margin: 0px;
            width: 293px;
            vertical-align: bottom;
        }

        .td9 {
            border-bottom: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 201px;
            vertical-align: bottom;
        }

        .td10 {
            border-bottom: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 156px;
            vertical-align: bottom;
        }

        .td11 {
            border-bottom: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 163px;
            vertical-align: bottom;
        }

        .td12 {
            border-bottom: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 53px;
            vertical-align: bottom;
        }

        .td13 {
            border-bottom: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 58px;
            vertical-align: bottom;
        }

        .td14 {
            border-bottom: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 56px;
            vertical-align: bottom;
        }

        .td15 {
            border-left: #555555 1px solid;
            border-right: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 199px;
            vertical-align: bottom;
            background: #f5f5f5;
        }

        .td16 {
            border-right: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 155px;
            vertical-align: bottom;
            background: #f5f5f5;
        }

        .td17 {
            padding: 0px;
            margin: 0px;
            width: 163px;
            vertical-align: bottom;
            background: #f5f5f5;
        }

        .td18 {
            border-right: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 52px;
            vertical-align: bottom;
            background: #f5f5f5;
        }

        .td19 {
            padding: 0px;
            margin: 0px;
            width: 58px;
            vertical-align: bottom;
            background: #f5f5f5;
        }

        .td20 {
            border-right: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 55px;
            vertical-align: bottom;
            background: #f5f5f5;
        }

        .td21 {
            border-left: #555555 1px solid;
            border-bottom: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 63px;
            vertical-align: bottom;
            background: #f5f5f5;
        }

        .td22 {
            border-right: #555555 1px solid;
            border-bottom: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 136px;
            vertical-align: bottom;
            background: #f5f5f5;
        }

        .td23 {
            border-right: #555555 1px solid;
            border-bottom: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 155px;
            vertical-align: bottom;
            background: #f5f5f5;
        }

        .td24 {
            border-bottom: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 163px;
            vertical-align: bottom;
            background: #f5f5f5;
        }

        .td25 {
            border-right: #555555 1px solid;
            border-bottom: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 52px;
            vertical-align: bottom;
            background: #f5f5f5;
        }

        .td26 {
            border-bottom: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 58px;
            vertical-align: bottom;
            background: #f5f5f5;
        }

        .td27 {
            border-right: #555555 1px solid;
            border-bottom: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 55px;
            vertical-align: bottom;
            background: #f5f5f5;
        }

        .td28 {
            border-left: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 63px;
            vertical-align: bottom;
        }

        .td29 {
            border-right: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 136px;
            vertical-align: bottom;
        }

        .td30 {
            border-right: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 155px;
            vertical-align: bottom;
        }

        .td31 {
            border-right: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 52px;
            vertical-align: bottom;
        }

        .td32 {
            border-right: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 55px;
            vertical-align: bottom;
        }

        .td33 {
            border-left: #555555 1px solid;
            border-bottom: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 63px;
            vertical-align: bottom;
        }

        .td34 {
            border-right: #555555 1px solid;
            border-bottom: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 136px;
            vertical-align: bottom;
        }

        .td35 {
            border-right: #555555 1px solid;
            border-bottom: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 155px;
            vertical-align: bottom;
        }

        .td36 {
            border-right: #555555 1px solid;
            border-bottom: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 52px;
            vertical-align: bottom;
        }

        .td37 {
            border-right: #555555 1px solid;
            border-bottom: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 113px;
            vertical-align: bottom;
        }

        .td38 {
            border-right: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 113px;
            vertical-align: bottom;
        }

        .td39 {
            padding: 0px;
            margin: 0px;
            width: 114px;
            vertical-align: bottom;
        }

        .td40 {
            border-bottom: #555555 1px solid;
            padding: 0px;
            margin: 0px;
            width: 114px;
            vertical-align: bottom;
        }

        .tr0 {
            height: 22px;
        }

        .tr1 {
            height: 19px;
        }

        .tr2 {
            height: 21px;
        }

        .tr3 {
            height: 20px;
        }

        .tr4 {
            height: 28px;
        }

        .tr5 {
            height: 23px;
        }

        .tr6 {
            height: 6px;
        }

        .tr7 {
            height: 7px;
        }

        .t0 {
            width: 687px;
            font: 12px 'Arial';
        }
    </STYLE>
</head>

<body>
    <DIV id="page_1">
        <DIV id="p1dimg1">

            <DIV id="id1_1">
                <DIV id="id1_1_1">
                    <P class="p0 ft0">[Business Name]</P>
                    <P class="p1 ft1">[Business Address 1] [City], [State] [Postal Code]</P>
                    <P class="p2 ft2">[Business Phone Number] [Business Email Address]</P>
                </DIV>
                <DIV id="id1_1_2">
                    <P class="p0 ft3">Invoice</P>
                </DIV>
            </DIV>
            <DIV id="id1_2">
                <TABLE cellpadding=0 cellspacing=0 class="t0">
                    <TR>
                        <TD class="tr0 td0">
                            <P class="p3 ft4">Bill To</P>
                        </TD>
                        <TD class="tr0 td1">
                            <P class="p3 ft5">[Client Name ]</P>
                        </TD>
                        <TD class="tr0 td2">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr0 td3">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD colspan=2 class="tr0 td4">
                            <P class="p4 ft4">Invoice Number</P>
                        </TD>
                        <TD class="tr0 td5">
                            <P class="p5 ft5">2001321</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr1 td0">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr1 td1">
                            <P class="p3 ft5">[Client Address line 1]</P>
                        </TD>
                        <TD class="tr1 td2">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr1 td3">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr1 td6">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr1 td7">
                            <P class="p6 ft4">Date</P>
                        </TD>
                        <TD class="tr1 td5">
                            <P class="p5 ft5">5/17/2020</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr2 td0">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD colspan=2 class="tr2 td8">
                            <P class="p3 ft5">[City], [State] [Postal code]</P>
                        </TD>
                        <TD class="tr2 td3">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD colspan=2 class="tr2 td4">
                            <P class="p6 ft4">Due Date</P>
                        </TD>
                        <TD class="tr2 td5">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr3 td0">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr3 td1">
                            <P class="p3 ft5">[Contact No]</P>
                        </TD>
                        <TD class="tr3 td2">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr3 td3">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD colspan=2 class="tr3 td4">
                            <P class="p6 ft4">File No</P>
                        </TD>
                        <TD class="tr3 td5">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr2 td0">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr2 td1">
                            <P class="p3 ft5">[Mail ID]</P>
                        </TD>
                        <TD class="tr2 td2">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr2 td3">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD colspan=2 class="tr2 td4">
                            <P class="p4 ft4">PAN No</P>
                        </TD>
                        <TD class="tr2 td5">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr3 td0">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr3 td1">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr3 td2">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr3 td3">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD colspan=2 class="tr3 td4">
                            <P class="p6 ft4">Reference</P>
                        </TD>
                        <TD class="tr3 td5">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr3 td0">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr3 td1">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr3 td2">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr3 td3">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD colspan=2 class="tr3 td4">
                            <P class="p4 ft4">Ref Contact No</P>
                        </TD>
                        <TD class="tr3 td5">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD colspan=2 class="tr4 td9">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr4 td10">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr4 td11">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr4 td12">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr4 td13">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr4 td14">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD colspan=2 class="tr5 td15">
                            <P class="p7 ft4">Description</P>
                        </TD>
                        <TD class="tr5 td16">
                            <P class="p8 ft4">Quantity</P>
                        </TD>
                        <TD class="tr5 td17">
                            <P class="p8 ft4">Fees</P>
                        </TD>
                        <TD class="tr5 td18">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr5 td19">
                            <P class="p8 ft4">Amount</P>
                        </TD>
                        <TD class="tr5 td20">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr6 td21">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td22">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td23">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td24">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td25">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td26">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td27">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr0 td28">
                            <P class="p7 ft5">Service 1</P>
                        </TD>
                        <TD class="tr0 td29">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr0 td30">
                            <P class="p8 ft5">1</P>
                        </TD>
                        <TD class="tr0 td3">
                            <P class="p8 ft5">Rs. 1,000</P>
                        </TD>
                        <TD class="tr0 td31">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr0 td7">
                            <P class="p8 ft5">Rs. 1,000</P>
                        </TD>
                        <TD class="tr0 td32">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr6 td33">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td34">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td35">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td11">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td36">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD colspan=2 class="tr6 td37">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr0 td28">
                            <P class="p7 ft5">Service 2</P>
                        </TD>
                        <TD class="tr0 td29">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr0 td30">
                            <P class="p8 ft5">1</P>
                        </TD>
                        <TD class="tr0 td3">
                            <P class="p8 ft5">Rs. 10,000</P>
                        </TD>
                        <TD class="tr0 td31">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD colspan=2 class="tr0 td38">
                            <P class="p8 ft5">Rs. 10,000</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr7 td33">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                        <TD class="tr7 td34">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                        <TD class="tr7 td35">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                        <TD class="tr7 td11">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                        <TD class="tr7 td36">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                        <TD colspan=2 class="tr7 td37">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr5 td0">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr5 td1">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr5 td2">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr5 td3">
                            <P class="p9 ft4">Subtotal</P>
                        </TD>
                        <TD class="tr5 td6">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD colspan=2 class="tr5 td39">
                            <P class="p9 ft5">Rs. 11,000</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr7 td0">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                        <TD class="tr7 td1">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                        <TD class="tr7 td2">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td11">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td12">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td13">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td14">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr0 td0">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr0 td1">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr0 td2">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr0 td3">
                            <P class="p9 ft4">Discount</P>
                        </TD>
                        <TD class="tr0 td6">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr0 td7">
                            <P class="p9 ft5">Rs. 100</P>
                        </TD>
                        <TD class="tr0 td5">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr7 td0">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                        <TD class="tr7 td1">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                        <TD class="tr7 td2">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td11">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td12">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD colspan=2 class="tr6 td40">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr5 td0">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr5 td1">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr5 td2">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr5 td3">
                            <P class="p9 ft4">Total</P>
                        </TD>
                        <TD class="tr5 td6">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD colspan=2 class="tr5 td39">
                            <P class="p9 ft5">Rs. 10,900</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr7 td0">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                        <TD class="tr7 td1">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                        <TD class="tr7 td2">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td11">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td12">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td13">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td14">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr5 td0">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr5 td1">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr5 td2">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr5 td3">
                            <P class="p9 ft4">Paid Amount</P>
                        </TD>
                        <TD class="tr5 td6">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr5 td7">
                            <P class="p9 ft5">Rs. 100</P>
                        </TD>
                        <TD class="tr5 td5">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr7 td0">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                        <TD class="tr7 td1">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                        <TD class="tr7 td2">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td11">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td12">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD colspan=2 class="tr6 td40">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr5 td0">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr5 td1">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr5 td2">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD class="tr5 td3">
                            <P class="p9 ft4">Balance Due</P>
                        </TD>
                        <TD class="tr5 td6">
                            <P class="p3 ft6">&nbsp;</P>
                        </TD>
                        <TD colspan=2 class="tr5 td39">
                            <P class="p9 ft5">Rs. 10,800</P>
                        </TD>
                    </TR>
                    <TR>
                        <TD class="tr7 td0">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                        <TD class="tr7 td1">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                        <TD class="tr7 td2">
                            <P class="p3 ft8">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td11">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td12">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td13">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                        <TD class="tr6 td14">
                            <P class="p3 ft7">&nbsp;</P>
                        </TD>
                    </TR>
                </TABLE>
                <P class="p10 ft5">Terms and Conditions :</P>
                <P class="p11 ft5">Invoice Generated By : Name of Employee</P>
                <P class="p12 ft5">Payment Received By : Name of Employee</P>
                <P class="p13 ft5">Time : Auto Generated Time</P>
            </DIV>
</body>

</html>


@section('title')
Invoice - {{$invoice->slno_gen}}
@endsection
@section('content----')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Invoice - {{$invoice->slno_gen}}</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4 card-header-actions">
        {{-- <div class="card-header">Invoices
            <a href="{{route('job.customer.add')}}" class="btn btn-primary btn-sm">
        <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add New</a>
    </div> --}}
    <div class="card-body p-3">
        <div class="row">
            <div class="col-md-2">
                <small class="small ">Invoice #</small>
                <p>{{$invoice->slno_gen}}</p>
            </div>
            <div class="col-md-2">
                <small class="small ">Date</small>
                <p>{{$invoice->generated_at->format('d-M-Y')}}</p>
            </div>
            <div class="col-md-2">
                <small class="small ">Total </small>
                <p>{{$invoice->job_total_amount_f}}</p>
            </div>
            <div class="col-md-2">
                <small class="small ">Discount </small>
                <p>{{$invoice->discount_amount_f}}</p>
            </div>
            <div class="col-md-2">
                <small class="small ">Payable </small>
                <p>{{$invoice->invoice_amount_f}}</p>
            </div>
            <div class="col-md-2">
                <small class="small ">Paid </small>
                <p>{{$invoice->paid_amount_f}}</p>
            </div>
            <div class="col-md-2">
                <small class="small ">Total Jobs </small>
                <p>{{$invoice->jobs_count}}</p>
            </div>
            <div class="col-md-2">
                <small class="small ">Total Payments </small>
                <p>{{$invoice->payments_count}}</p>
            </div>
        </div>

        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Job Type</td>
                            <td>Job ID</td>
                            <td>Status</td>
                            <td>Price</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice->Jobs as $indx => $job)
                        <tr>
                            <td>{{$indx+1}}</td>
                            <td>{{$job->job_title}}</td>
                            <td>{{$job->slno_gen}}</td>
                            <td>{{$job->status}}</td>
                            <td>{{$job->price_f}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-right">Total</td>
                            <td colspan="1">{{$invoice->job_total_amount_f}}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">Discount</td>
                            <td colspan="1"> <i class="text-danger">-</i> {{$invoice->discount_amount_f}}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">Payable</td>
                            <td colspan="1">{{$invoice->invoice_amount_f}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <form action="{{route('job.customer.invoice.update-basic.post',[ 'id' => $client->id, 'inv'=>$invoice->id ])}}"
            method="post" class="col-md-12">
            @csrf
            <div class="row">
                <div class="form-group col-4">
                    <label for="discount_amount">Change Discount Amount</label>
                    <input type="text" name="discount_amount" id="discount_amount" class="form-control"
                        value="{{$invoice->discount_amount}}">
                </div>
            </div>
            <div class="col-12 text-right p-2">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection

