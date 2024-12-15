<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>For Invoice</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

    <style>
        h1 {
            /* border: 1px solid #CCC; */
            /* text-align: center; */
            margin: 0pt;
        }

        .underline-this {
            text-decoration: underline;
            text-decoration-color: black;
        }

        #page {
            width: 14.8cm;
            height: 21cm;
            /* box-shadow: 2pt 2pt; */
            /* background-color: #ccc; */
            padding-left: 10pt;
            margin: 0 auto;
            font-family: 'Raleway', sans-serif;
        }

        #span1 {
            text-align: center;
            width: 100%;
        }

        .heading1 {
            margin-top: -25px;
            text-align: center;
        }

        .heading2 {
            margin-top: -23px;
            text-align: center;
        }

        .p1 {
            text-align: center;
            font-weight: 600;
            font-size: 17px;
            margin-top: -23px;
        }

        .p2 {
            font-weight: 600;
        }

        .heading3 {
            margin-top: -19px;
            text-align: center;
        }

        .p3 {
            margin-top: -20px;
            font-size: 17px;
            font-family: cursive;
        }

        .span2 {
            border-bottom: 1pt dotted black;
            display: inline-block;
            width: 46%;
            font-family: Arial;
        }

        .span3 {
            border-bottom: 1pt dotted black;
            display: inline-block;
            width: 98%;
            font-family: Arial;
            text-align:center;
        }

        .p4 {
            margin-top: 4px;
            font-size: 17px;
            font-family: cursive;
        }

        .span4 {
            border-bottom: 1pt dotted black;
            display: inline-block;
            width: 88%;
            font-family: Arial;
            text-align:center;
        }

        .p5 {
            margin-top: -13px;
            font-size: 17px;
            font-family: cursive;
        }

        .span5 {
            border-bottom: 1pt dotted black;
            display: inline-block;
            width: 86%;
            font-family: Arial;
            text-align:center;
        }

        .p6 {
            margin-top: -14px;
            font-size: 17px;
            font-family: cursive;
        }

        .span6 {
            border-bottom: 1pt dotted black;
            display: inline-block;
            width: 65%;
            font-family: Arial;
            text-align:center;
        }

        .p7 {
            margin-top: -14px;
            font-size: 17px;
            font-family: cursive;
        }

        .span7 {
            border-bottom: 1pt dotted black;
            display: inline-block;
            width: 68%;
            font-family: Arial;
            text-align:center;
        }

        .p8 {
            margin-top: -14px;
            font-size: 17px;
            font-family: cursive;
        }

        .sapn8 {
            border-bottom: 1pt dotted black;
            display: inline-block;
            width: 34%;
            font-family: Arial;
            text-align:center;
        }

        .span9 {
            border-bottom: 1pt dotted black;
            display: inline-block;
            width: 98%;
            font-family: Arial;
        }

        .p9 {
            margin-top: 3px;
            font-size: 17px;
            font-family: cursive;
        }

        .span10 {
            border-bottom: 1pt dotted black;
            display: inline-block;
            width: 68%;
            font-family: Arial;
            text-align:center;
        }

        .p10 {
            margin-top: -14px;
            font-size: 17px;
            font-family: cursive;
        }

        .span11 {
            border-bottom: 1pt dotted black;
            display: inline-block;
            width: 83%;
            font-family: Arial;
            text-align:center;
        }

        .p11 {
            margin-top: -14px;
            font-size: 17px;
            font-family: cursive;
        }

        .span12 {
            border-bottom: 1pt dotted black;
            display: inline-block;
            width: 69%;
            font-family: Arial;
            text-align:center;
        }

        .span13 {
            border-bottom: 1pt dotted black;
            display: inline-block;
            width: 98%;
            font-family: Arial;
            text-align:center;
        }

        .tab1 {
            border: 3px solid black;
            width: 98%;
            border-collapse: collapse;
        }

        .tabtd1 {
            border: 1px solid black;
            width: 10%;
            font-weight: bolder;
            font-size: 35px;
            padding-left: 10pt;
        }

        .tabtd2 {
            border: 1px solid black;
            font-family: arial;
            font-weight: bolder;
            font-size: 28px;
        }

        .p12 {
            margin-top: 7px;
            font-size: 17px;
            font-family: cursive;
        }

        /* .span13 {
            border-bottom: 1pt dotted black;
            display: inline-block;
            width: 78%;
        } */

        .heading4 {
            margin-top: 0px;
            float: right;
            margin-right: 10px;
        }
        .p13{
            margin-top: 3px;
            font-size: 17px;
            font-family: cursive;
        }
        .span14{
            border-bottom: 1pt dotted black;
            display: inline-block;
            width: 78%;
            font-family: Arial;
            text-align:center;

        }
        .p14{
            margin-top: -14px;
            font-size: 17px;
            font-family: cursive;
        }
        .span15{
            border-bottom: 1pt dotted black;
            display: inline-block;
            width: 86%;
            font-family: Arial;
            text-align:center;

        }
        .slno{
            border-bottom: 1pt dotted black;
            display: inline-block;
            width: 23%;
            font-family: Arial;
        }
    </style>
</head>

<body onload="doprint();">
    @if (isset($Customer) && isset($BillAc) && isset($PackageBill))
    <div id="page">
        <div id="span1" style=" ">

            <span style="font-size: 25pt;
            font-weight: bold;"> <span><span class="underline-this">{{$BillAc->company_name}}</span></span>
        </div>
        {{-- <div style="text-align: center; ">
            <span style="font-size: 20pt;
            font-weight: bold;"><span class="heading1" style="">BoardBand Connection & Lease Line</span></span>

        </div>
        <div style="text-align: center;">
            <span style="font-size: 20pt;
            font-weight: bold;"><span class="heading2" style=""><span class="underline-this">(Powerd BY:ANI NETWORK PVT.LTD.)</span></span>

        </div> --}}
        <br>

        <div style="text-align: center;">
            <span style="font-size: 20pt;
            font-weight: bold;"><span class="p1" style="">{{$BillAc->address1}}, {{$BillAc->address2}}, {{$BillAc->address3}}</span></span>

        </div>
        <div style="">
            <p class="p2" style="">No. <span class="slno">{{$PackageBill->slno_gen}}</span></p>
            <h2 class="heading3" style=" "> <span class="underline-this">RECEIPT</span> </h2>
        </div>
        <div>
            <p class="p3" style="">Received with thanks from Mr./Mrs <span class="span2" style=""></span></p>
            <span class="span3" style=" ">{{$Customer->name}} </span>
        </div>
        <div>
            <p class="p4" style="">Mobile <span class="span4" style="">{{$Customer->phone1}}</span></p>
        </div>
        <div>
            <p class="p5" style="">Login Id <span class="span5" style=" ">{{$Customer->isp_username}}</span></p>
        </div>
        <div>
            <p class="p6" style="">Package Starting Date <span class="span6" style="">{{$PackageBill->package_start_date->format('d/m/Y')}}</span></p>
        </div>
        <div>
            <p class="p7" style=" ">Package Expire Date <span class="span7" style=" ">{{$PackageBill->package_end_date->format('d/m/Y')}}</span></p>
        </div>
        <div>
            <p class="p8" style=" ">On account of subscription for the
                month of <span class="sapn8" style=""></span></p>
            <span class="span9" style=" "></span>
        </div>
        <div>
            <p class="p9" style="">By Cheque Cash NO. <span class="span10" style=" "></span> </p>
        </div>
        <div>
            <p class="p10" style="">Drawn On <span class="span11" style=""></span></p>
        </div>
        <div>
            <p class="p11" style="">The Sum Of Rupees <span class="span12" style="">{{getIndianCurrencyInWord($PackageBill->bill_amount)}}</span></p>
            <span class="span13" style=" "></span>
        </div>
        <div>
            @if ($PackageBill->discount_amount > 0)
                <p class="p13">Extra Charge <span class="span14"></span> </p>
            @else

            @endif

        </div>
        <div>
           @if ($PackageBill->charge_amount > 0)
           <p class="p14">Discount<span class="span15"></span></p>
           @else

           @endif

        </div>
        <div>
            <table class="tab1" style=" ">
                <tr>
                    <td class="tabtd1" style="">₹</td>
                    <td class="tabtd2" style="text-align: center;">{{number_format($PackageBill->bill_amount, 2)}}/-</td>
                </tr>
            </table>
        </div>
        <div>
            <p class="p12" style=" ">Balance Due<span class="span13" style="">{{number_format($Customer->pym_discount, 2)}}/-</span></p>
        </div>
        <div style="">
            <span style="font-size: 25pt;
            font-weight: bold;"><span class="heading4" style="">{{$BillAc->company_name}}</span></span>

        </div>
    </div>
    @else
        <p class="text-center text-danger"><i class="hsssd">Nothing to show here!!!</i></p>
    @endif
<style>
    @page {
        size: A5;
        margin: 0;
    }
    @media print {
        html, body, #page {
            margin:0px;

        }

    }
</style>
<script>
    function doprint(){
        window.print();
            window.close();
    }
</script>
</body>

</html>
