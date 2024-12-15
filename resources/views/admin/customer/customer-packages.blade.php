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
$isAddView = false;
if(isset($currentPackage)){
    if(!$currentPackage->isPackageBillExpired()){
        $isAddView=false;
    }
    elseif ($currentPackage->isPackageBillExpired() && $isAdd) {
        $isAddView=true;
    }
}
else {
    $isAddView=true;
}
@endphp
<div class="container-fluid">
    <div class="row d-justify-content-center">
        <div class="col-md-12">
            {{-- @dump($Customer) --}}
            <p class="text-center-x h3">Package of Customer: [{{$Customer->customer_id}}] {{$Customer->name}}</p>
            <div class="row">
                <div class="col-md-7">
                    <div class="form">
                        @if(!$isAddView )
                        <h5>Current Package </h5>

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
                            <div class="form-group col-md-4">
                                <label for="startdate" class="col-md-12 col-md-6">Start Date </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control datepicker" disabled
                                        value="{{$currentPackage->package_start_date->format('d/m/Y')}}">
                                </div>`
                            </div>
                            <div class="form-group col-md-4">
                                <label for="startdate" class="col-md-12 col-md-6">End Date </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control datepicker" disabled
                                        value="{{$currentPackage->package_end_date->format('d/m/Y')}}">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="startdate" class="col-md-12 col-md-6">Revise count</label>
                                <div class="col-md-12">
                                    <input type="number" class="form-control " pattern="[0-9]" disabled
                                        value="{{$currentPackage->revision_count}}">
                                    {{-- <span class="small">Range of 1 - 12</span> --}}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="fordiscount" class="col-md-12 col-md-6">Packages Discount</label>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" disabled
                                        value="{{$currentPackage->discount_amount}}">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="fordiscount" class="col-md-12 col-md-6">Packages Extra Charges</label>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" name=""
                                        value="{{$currentPackage->charge_amount}}" disabled>
                                </div>
                            </div>

                            <div class="form-group col-md-6 disabled-control">
                                <label for="isactive" class="col-md-12 col-md-6">Is GST Enabled</label>
                                <div class="col-md-12">

                                    <input @if($currentPackage->is_gst_bill) checked="checked" @endif type="checkbox"
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
                            <div class="col-12 text-center d-none">
                                {{-- @dump($assignToIpbill,$isGstEnabled) --}}
                                <button type="submit" class="btn btn-success w-25 m-l-5">Yes, Proceed</button>
                                <a href="{{route('admin.customer.packages.get',['Customer' => $Customer->id])}}"
                                    class="btn btn-danger w-25">No, Cancel</a>
                            </div>

                            <div class="col-12 text-center disabled-control">
                                {{-- @php
                                     $p = $currentPackage->InternetPackage;
                                    //  dd($p);
                                     $pkgamt = $isGstEnabled?$p->package_amount_w_tax:$p->package_amount_wo_tax;
                                    //  dd($pkg_with_tax);
                                        $total_bill_amount =  $pkgamt +  $pckgCharge - $pckgDiscount;
                                    @endphp --}}
                                {{-- @if (!$isGstEnabled)
                                    @endif --}}
                                <h3>Bill Amount : ₹{{number_format($currentPackage->bill_amount,2)}}/- </h3>

                            </div>
                            <div class="col-12 text-center m-3 ">
                                @if ($currentPackage->isPackageBillExpired())
                                <a href="{{route('admin.customer.package.renew.get',['Customer' => $Customer->id ])}}"
                                    class="btn btn-danger w-25">Renew Package</a>
                                <a href="{{route('admin.customer.packages.get',['Customer' => $Customer->id ,"add" => 1 ])}}"
                                    class="btn btn-success w-25">Add Package</a>
                                @else
                                <a href="{{route('admin.customer.package.edit.get',['Customer' => $Customer->id ])}}"
                                    class="btn btn-primary w-25">Edit Package</a>
                                @endif
                            </div>
                        </div>

                        @else {{-- if not set --}}
                        <h5>Add Package </h5>
                        <form
                            action="{{route('admin.customer.package.check-to-save.get',['Customer' => $Customer->id])}}"
                            method="post">
                            @csrf
                            <input type="hidden" name="cus" value="{{$Customer->id}}" />
                            <input type="hidden" name="chksmc" value="{{$Customer->chksm}}" />
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="dateofbirth" class="col-md-12 col-sm-6">Package</label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="internet_package_id" id="" value="">
                                            @foreach ($u->Packages as $p)
                                            <option value="{{$p->id}}">{{$p->package_name}} [ {{$p->package_category}} ]
                                                [ {{$p->package_duration_text}} ]
                                                [ w/o GST: ₹{{number_format($p->package_amount_wo_tax,2)}} ]
                                                [ with GST: ₹{{number_format($p->package_amount_w_tax,2)}} ]
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="startdate" class="col-md-12 col-md-6">Start Date <span
                                            style="color: red;" class="mandatoryClass">*</span></label>
                                    <div class="col-md-12">
                                        <input type="text" name="start_date" class="form-control datepicker"
                                            data-provide="datepicker" data-date-format="dd/mm/yyyy"
                                            value="{{date('d/m/Y')}}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="startdate" class="col-md-12 col-md-6">Revisions<span style="color: red;"
                                            class="mandatoryClass">*</span></label>
                                    <div class="col-md-12">
                                        <input type="number" name="revision_count" class="form-control " pattern="[0-9]"
                                            min="1" max="12" value="1">
                                        <span class="small">Range of 1 - 12</span>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="fordiscount" class="col-md-12 col-md-6">Packages Discount</label>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" name="discount_amount" placeholder="₹"
                                            textmode="Number" pattern="^[0-9]+(\.?[0-9]+)?$" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="fordiscount" class="col-md-12 col-md-6">Packages Extra Charges</label>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" name="charge_amount" placeholder="₹"
                                            textmode="Number" pattern="^[0-9]+(\.?[0-9]+)?$" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="isactive" class="col-md-12 col-md-6">Is GST Enabled <span
                                            style="color: red;" class="mandatoryClass">*</span></label>
                                    <div class="col-md-12">

                                        <input type="checkbox" name="is_gst_enabled" data-toggle="toggle"
                                            data-on="Enabled" data-off="Disabled" data-onstyle="success"
                                            data-offstyle="danger" data-width="10rem" x-checked="checked" value="1"
                                            data-value="1" />

                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="assign_to_ipbill" class="col-md-12 col-md-6">Assign Pack to ipBill
                                        Server<span style="color: red;" class="mandatoryClass">*</span></label>
                                    <div class="col-md-12">
                                        <input type="checkbox" name="assign_to_ipbill" id="assign_to_ipbill"
                                            data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success"
                                            data-offstyle="danger" data-width="10rem" x-checked="checked" value="1"
                                            data-value="1" />


                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    @if ($isAdd)

                                <a href="{{route('admin.customer.packages.get',['Customer' => $Customer->id ])}}"
                                    class="btn btn-danger w-25">Back</a>
                                    @endif
                                    <button type="submit" class="btn btn-primary ml-5">Assign Package</button>
                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
                <div class="col-md-5">
                    <h5>Package History</h5>

                    <ul class="list-group list-group-flush">
                        @if ($pkgHistry->count()>0)

                        @foreach ($pkgHistry as $indx => $pkg)
                        @php
                        $isCurrent = $pkg->id == $currentPkg->id;
                        @endphp
                        <li class="x-list-group-item @if($isCurrent) active-- @endif row " @if($isCurrent)
                            title="Current Package" @endif>
                            <div class="col-9 @if($isCurrent) bg-info @endif">

                                <span class="text-muted">{{$indx+1}} .</span>
                                <b class="text-bold">{{$pkg->package_name }}</b>
                                ₹{{ number_format($pkg->is_gst_bill?$pkg->package_amount_w_tax:$pkg->package_amount_wo_tax,2) }}
                                <small>
                                    From: {{$pkg->package_start_date->format('d/m/Y') }}
                                    To: {{$pkg->package_end_date->format('d/m/Y')  }}
                                </small>
                                {{-- @php
                                $allpackagebill = $u->InternetPackageBills;
                            @endphp --}}
                            </div>
                            <div class="float-right- col-3">
                                <a class="text-danger " title="Print Invoice - {!! $pkg->slno_gen !!}"
                                    href="{{route('admin.customer.packages.bill.print', ['Customer'=>$Customer->id, 'PackageBill'=> $pkg->id])}}"><i
                                        class="fa fa-print fa-2x" aria-hidden="true"></i></a>
                            </div>
                        </li>

                        @endforeach
                        {{-- @dump( ['allpackagebill'=> $PackageBill->id]); --}}
                        @else
                        <li class="list-group-item disabled"><span class="text-danger d-block text-center"><i>No
                                    packages to show.</i></span></li>
                        @endif
                        {{-- <li class="list-group-item">Second item</li>
                        <li class="list-group-item">Third item</li> --}}
                    </ul>
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
