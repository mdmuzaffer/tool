<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $svcQuery->qid }}</title>
    <link rel="stylesheet" href="{{ url('/css/app.css') }}" />
    <link rel="stylesheet" href="{{ url('/css/paper.css') }}" />
    <style>
        /* body{
            position: relative;
        }
        .page{
            width: 8.27in;
            height: 11.69in;
            margin: 0 auto;
        }
        @page{
            size: A4 portrait;
            margin: 0.2in;
        } */
        body {
            font-size: 1.3rem;
        }
    </style>
</head>

<body onload="doPrint()">

    <div class="A4">
        <div class="sheet padding-10mm">
            <div class="container-fluid">
                <h3 class="text-right">INVOICE - {{ $svcQuery->qid }}</h3>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th colspan="2">Consumer Details</th>
                        </tr>
                        <tr>
                            <td><span class="text-bold key-text">Name: </span> <span
                                    class="value-text">{{$svcQuery->consumer_name}}</span></td>
                            <td><span class="text-bold key-text">Phone: </span> <span
                                    class="value-text">{{$svcQuery->consumer_phone}}</span></td>
                        </tr>
                        <tr>
                            <td><span class="text-bold key-text">Email: </span> <span
                                    class="value-text">{{$svcQuery->consumer_email}}</span></td>
                            <td><span class="text-bold key-text">City / District / Area: </span> <span
                                    class="value-text">{{$svcQuery->service_area}}</span></td>
                        </tr>
                        <tr>
                            <td colspan="2"><span class="text-bold key-text">Address: </span> <span class="value-text">
                                    <p>{{$svcQuery->consumer_address_1}}</p>
                                    <p>{{$svcQuery->consumer_address_2}}</p>
                                    <p>{{$svcQuery->consumer_address_3}}</p>
                                </span></td>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <th colspan="2">Service Details</th>
                        </tr>
                        <tr>
                            <td><span class="text-bold key-text">Service: </span> <span
                                    class="value-text">{{$svcQuery->service}}</span></td>
                            <td><span class="text-bold key-text">Call Charge: </span> <span
                                    class="value-text">{{$svcQuery->PriceWithTaxFormatted()}}</span></td>
                        </tr>
                        <tr>
                            <td><span class="text-bold key-text">Service Description: </span> <span
                                    class="value-text">{!! $svcQuery->consumer_query_description !!}</span></td>
                            <td><span class="text-bold key-text">Service Time: </span> <span class="value-text">
                                    @if(isset($svcQuery->CurrentProviderQuery,$svcQuery->CurrentProviderQuery->service_date_time))
                                    {{$svcQuery->CurrentProviderQuery->service_date_time->format('d/m/Y h:i A')}}
                                    @else
                                    {{-- <b><i><span class="text-danger">NOT SET YET</span></i></b> --}}
                                    @endif
                                </span></td>
                        </tr>

                    </tbody>
                    <tbody>
                        <tr>
                            <th colspan="2">Service Item Details</th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Service Item</th>
                                            <th>Qty.</th>
                                            <th>Price(₹)</th>
                                            <th>GST Rate</th>
                                            <th>GST Amount</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Call Charge For {{$svcQuery->service}}</td>
                                            <td>1</td>
                                            <td>{{ $svcQuery->PriceWithTaxFormatted()}}</td>
                                            <td>---</td>
                                            <td>---</td>
                                            <td>{{ $svcQuery->PriceWithTaxFormatted()}}</td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        {{-- `billno`, `produnt`, `qnty`, `price`, `gstrate`, `gstamount`, `service_query_id`, `bill_id`, `item_no` --}}
                                        @foreach ($svcQuery->Bill->BillItems as $billItem)
                                        <tr>
                                            <td>{{$billItem->item_no}}</td>
                                            <td>{{$billItem->produnt}}</td>
                                            <td>{{$billItem->qnty}}</td>
                                            <td>₹{{$billItem->price}}/-</td>
                                            <td>{{$billItem->gstrate}}</td>
                                            <td>₹{{$billItem->gstamount}}/-</td>
                                            <td>
                                                ₹{{ (($billItem->qnty*$billItem->price ) + $billItem->gstamount) }}/-
                                            </td>

                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>
        </div>

    </div>
    <script>
    function doPrint() {
        window.print();
        window.close();
    }
    </script>
</body>

</html>
