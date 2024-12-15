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


@php
$pkgHistry = $Customer->InternetPackageBills()->orderBy('package_start_date')->get();
$currentPackage = $currentPkg = $Customer->CurrentInternetPackageBill;
@endphp
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            {{-- @dump($Customer) --}}
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">
                    <p class="text-center-x h3">Package of Customer: [{{$Customer->customer_id}}] {{$Customer->name}}
                        {{$Customer->package_expire_text }}</p>
                    <div class="form">
                        @if(isset($currentPackage) && $isPackageExpired)
                        <h5>Renew Package </h5>

                        <form method="POST"
                            action="{{ route('admin.customer.package.check-to-renew.post',[ 'Customer' => $Customer->id ]) }}"
                            class="row">
                            @csrf
                            <input type="hidden" name="cus" value="{{$Customer->id}}" />
                            <input type="hidden" name="chksmc" value="{{$Customer->chksm}}" />
                            {{-- <input type="hidden" name="ob" value="{{$oJson}}" />
                            <input type="hidden" name="chksmob" value="{{$oChksm}}" /> --}}
                            {{-- <input type="hidden" name="cus" value="{{$Customer->id}}" />
                            <input type="hidden" name="chksmc" value="{{$Customer->chksm}}" /> --}}
                            <input type="hidden" name="internet_package_id" value="{{$currentPackage->internet_package_id}}">
                            <div class="form-group col-md-12">
                                <label for="dateofbirth" class="col-md-12 col-sm-6">Package</label>
                                <div class="col-md-12">
                                    <select class="form-control" disabled id=""
                                        value="{{$currentPackage->internet_package_id}}">

                                        @php
                                        // $p = $currentPackage->InternetPackage;
                                        $pkg_vl = old('internet_package_id', $currentPackage->internet_package_id)
                                        @endphp
                                        @foreach ($u->Packages as $p)
                                        <option value="{{$p->id}}" @if ($pkg_vl==$p->id) selected='selected'
                                            @endif>{{$p->package_name}} [ {{$p->package_category}} ]
                                            [ {{$p->package_duration_text}} ]
                                            [ w/o GST: ₹{{number_format($p->package_amount_wo_tax,2)}} ]
                                            [ with GST: ₹{{number_format($p->package_amount_w_tax,2)}} ]
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="startdate" class="col-md-12 col-md-6">Start Date </label>
                                <div class="col-md-12">
                                    <input type="text" name="start_date" class="form-control datepicker"
                                        data-provide="datepicker" data-date-format="dd/mm/yyyy"
                                        data-x-value="{{old('start_date', $currentPackage->package_start_date->format('d/m/Y'))}}"
                                        value="{{old('start_date', now()->format('d/m/Y'))}}">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fordiscount" class="col-md-12 col-md-6">Packages Discount</label>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" placeholder="₹" textmode="Number"
                                        pattern="^[0-9]+(\.?[0-9]+)?$" name="discount_amount"
                                        value="{{old('discount_amount', $currentPackage->discount_amount)}}">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="fordiscount" class="col-md-12 col-md-6">Packages Extra Charges</label>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" placeholder="₹" textmode="Number"
                                        pattern="^[0-9]+(\.?[0-9]+)?$" name="charge_amount"
                                        value="{{old('charge_amount', $currentPackage->charge_amount)}}">
                                </div>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="isactive" class="col-md-12 col-md-6">Is GST Enabled</label>
                                <div class="col-md-12">

                                    <input @if($currentPackage->is_gst_bill) checked="checked" @endif type="checkbox"
                                    data-toggle="toggle" data-on="Enabled" data-off="Disabled"
                                    data-onstyle="success" data-offstyle="danger" data-width="10rem" value="1"
                                    data-value="1" name="is_gst_enabled" />

                                </div>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="isactive" class="col-md-12 col-md-6">Assign Pack to ipBill
                                    Server</label>
                                <div class="col-md-12">

                                    <input @if($currentPackage->renew_to_api_also) checked="checked" @endif
                                    name="assign_to_ipbill" type="checkbox"
                                    data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success"
                                    data-offstyle="danger" data-width="10rem" value="1" data-value="1" />

                                </div>
                            </div>
                            <div class="col-12 text-center">
                                {{-- @dump($assignToIpbill,$isGstEnabled) --}}
                                <button type="submit" class="btn btn-success m-l-5">Yes, Proceed To Renew</button>
                                <a href="{{route('admin.customer.packages.get',['Customer' => $Customer->id])}}"
                                    class="btn btn-danger w-25">No, Cancel</a>
                            </div>
                        </form>

                        @endif
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
