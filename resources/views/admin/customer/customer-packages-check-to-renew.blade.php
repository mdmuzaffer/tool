@extends('admin.layouts.blank')

@section('content')
{{-- @if (session('success'))
<div class="alert alert-success alert-dismissible fade show">
    <strong>Success!!</strong> {{session('success')}}
<button type="button" class="close" data-dismiss="alert" aria-level="close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif --}}


<div class="container-fluid">
    <div class="row d-justify-content-center">
        <div class="col-md-12">
            {{-- @dump($Customer) --}}
            {{-- <p class="text-center-x h3">Package of Customer: [{{$Customer->customer_id}}] {{$Customer->name}}</p>
            --}}
            <div class="row">
                <div class="col-md-12">
                    <h5>Proceed to Renew Package to Customer: [{{$Customer->customer_id}}] {{$Customer->name}}</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <span class="h3 text-center">Old Package Details</span>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="dateofbirth" class="col-md-12 col-sm-6">Package</label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="internet_package_id" id="" value="" disabled>
                                            {{-- @foreach ($u->Packages as $p) --}}
                                            @php
                                            $p = $currentPackage->InternetPackage;
                                            @endphp
                                            <option value="{{$p->id}}">{{$p->package_name}} [ {{$p->package_category}} ]
                                                [ {{$p->package_duration_text}} ]
                                                [ w/o GST: ₹{{number_format($p->package_amount_wo_tax,2)}} ]
                                                [ with GST: ₹{{number_format($p->package_amount_w_tax,2)}} ]
                                            </option>
                                            {{-- @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="startdate" class="col-md-12 col-md-6">Start Date </label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control datepicker" disabled
                                            value="{{$currentPackage->package_start_date->format('d/m/Y')}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="startdate" class="col-md-12 col-md-6">End Date </label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control datepicker" disabled
                                            value="{{$currentPackage->package_end_date->format('d/m/Y')}}">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="fordiscount" class="col-md-12 col-md-6">Packages Discount</label>
                                    <div class="col-md-12">
                                        <input  class="form-control" type="text" name="" value="{{$currentPackage->discount_amount}}" disabled>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="fordiscount" class="col-md-12 col-md-6">Packages Extra Charges</label>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" name="" value="{{$currentPackage->charge_amount}}" disabled>
                                    </div>
                                </div>

                                <div class="form-group col-md-6 disabled-control">
                                    <label for="isactive" class="col-md-12 col-md-6">Is GST Enabled</label>
                                    <div class="col-md-12">

                                        <input @if($currentPackage->is_gst_bill) checked="checked" @endif
                                        type="checkbox"
                                        data-toggle="toggle" data-on="Enabled" data-off="Disabled"
                                        data-onstyle="success" data-offstyle="danger" data-width="10rem" value="1"
                                        disabled data-value="1" />

                                    </div>
                                </div>
                                <div class="form-group col-md-6 disabled-control">
                                    <label for="isactive" class="col-md-12 col-md-6">Assign Pack to ipBill
                                        Server</label>
                                    <div class="col-md-12">

                                        <input @if($currentPackage->renew_to_api_also) checked="checked" @endif
                                        type="checkbox"
                                        data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success"
                                        data-offstyle="danger" data-width="10rem" value="1" disabled data-value="1" />

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <span class="h3 text-center">New Package Details</span>
                            @if ($packageChecked)
                            <form
                                action="{{route('admin.customer.package.proceed-to-renew.post',[ 'Customer' => $Customer->id,'Package' => $pkg->id])}}"
                                method="post" id="update_form_x">
                                @csrf
                                <input type="hidden" name="cus" value="{{$Customer->id}}" />
                                <input type="hidden" name="chksmc" value="{{$Customer->chksm}}" />
                                <input type="hidden" name="ob" value="{{$oJson}}" />
                                <input type="hidden" name="chksmob" value="{{$oChksm}}" />

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="dateofbirth" class="col-md-12 col-sm-6">Package</label>
                                        <div class="col-md-12">
                                            <select class="form-control" name="internet_package_id" id="" value=""
                                                disabled>
                                                {{-- @foreach ($u->Packages as $p) --}}
                                                @php
                                                $p = $pkg;
                                                @endphp
                                                <option value="{{$p->id}}">{{$p->package_name}} [
                                                    {{$p->package_category}} ]
                                                    [ {{$p->package_duration_text}} ]
                                                    [ w/o GST: ₹{{number_format($p->package_amount_wo_tax,2)}} ]
                                                    [ with GST: ₹{{number_format($p->package_amount_w_tax,2)}} ]
                                                </option>
                                                {{-- @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="startdate" class="col-md-12 col-md-6">Start Date </label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control datepicker" disabled
                                                value="{{$startDate->format('d/m/Y')}}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="startdate" class="col-md-12 col-md-6">End Date </label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control datepicker" disabled
                                                value="{{$endDate->format('d/m/Y')}}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="fordiscount" class="col-md-12 col-md-6">Packages Discount</label>
                                        <div class="col-md-12">
                                            <input  class="form-control" type="text" name="" value="{{$pckgDiscount}}" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="fordiscount" class="col-md-12 col-md-6">Packages Extra Charges</label>
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" name="" value="{{$pckgCharge}}" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 disabled-control">
                                        <label for="isactive" class="col-md-12 col-md-6">Is GST Enabled</label>
                                        <div class="col-md-12">

                                            <input @if($isGstEnabled) checked="checked" @endif type="checkbox"
                                                data-toggle="toggle" data-on="Enabled" data-off="Disabled"
                                                data-onstyle="success" data-offstyle="danger" data-width="10rem"
                                                value="1" disabled data-value="1" />

                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 disabled-control">
                                        <label for="isactive" class="col-md-12 col-md-6">Assign Pack to ipBill
                                            Server</label>
                                        <div class="col-md-12">

                                            <input @if($assignToIpbill) checked="checked" @endif type="checkbox"
                                                data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success"
                                                data-offstyle="danger" data-width="10rem" value="1" disabled
                                                data-value="1" />

                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endif
                        </div>
                        <div class="col-12 text-center">
                            <button type="button" class="btn btn-success  m-l-5" onclick="update_form_x.submit()">Yes, Proceed</button>
                            <a href="{{route('admin.customer.packages.get',['Customer' => $Customer->id])}}"
                                class="btn btn-danger ">No, Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <style>
        .customtab li a.nav-link {
            color: black;
        }

        .customtab li a.nav-link:hover {
            color: #EF5350;
        }

        .customtab li a.nav-link.active {
            color: #EF5350;
            border-bottom: 2px solid #EF5350;
        }

        .tab-content .tab-pane {
            min-height: 400px;
        }

        .twitter-typeahead {
            width: 100%;
        }

        .typeahead-wrapper {
            display: block;
            margin: 50px 0;
        }

        .tt-menu {
            width: 100%;
            background-color: #fff;
            border: 1px solid #000;
        }

        .tt-suggestion.tt-selectable {}

        .tt-suggestion {
            display: block;
        }

        .tt-suggestion.tt-cursor {
            background-color: #ccc;
        }

        .tt-suggestion {
            padding: 3px 5px;
            font-size: 18px;
        }

        .triggered-events {
            float: right;
            width: 500px;
            height: 300px;
        }

        .status-cards {
            padding: 0 2pt;
            margin: 2pt 0;
        }

        /* .tt-input {
        height: 1.6em;
        font-size: 1.3em;
        padding: 5pt 10pt;
    }

    .tt-hint {
        font-size: 1.3em;
    } */
    </style>
    {{-- <link href="//res.cloudinary.com/cblpay/raw/upload/webres/apl/assets/plugins/twbs4/css/bootstrap.css" rel="stylesheet" /> --}}


    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}

    <link href="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bs4ts/css/bootstrap4-toggle.css" rel="stylesheet" />
    <script src="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bs4ts/js/bootstrap4-toggle.js"></script>




    <script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.3/handlebars.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    @php
    $amnSrchQ = route('ajax.admin.customer.search',[
    'chksm' => $u->chksm,
    'admin' => $u->id,
    // 'q' => '%QUERY',
    ]);
    @endphp
    <script>
        $(document).ready(function () {
        // var bestPictures = new Bloodhound({
        //     datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        //     queryTokenizer: Bloodhound.tokenizers.whitespace,
        //     // prefetch: '../data/films/post_1960.json',
        //     remote: {
        //         url: '{{ $amnSrchQ }}&q=%QUERY',
        //         wildcard: '%QUERY'
        //     }
        //     });
        //     $('#searchCustomer').typeahead(null, {
        //         name: 'searchCustomer',
        //         display: 'n',
        //         source: bestPictures,
        //         templates: {
        //             empty: [
        //             '<div class="empty-message text-center py-2 text-danger">',
        //                 '<i>Nothing Matched</i>',
        //             '</div>'
        //             ].join('\n'),
        //             suggestion: Handlebars.compile($("#SearchDataCustomer-HB").html())
        //         },
        //     });
    });
    </script>
    @endsection
