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
            <p class="text-center h3">{{$pageTitle}}</p>
            @php
            // $allcustomer = $u ->Customers;
            // App\InternetClient::get();
            @endphp
            <div class="card-body">
                {{-- @dump($allCustomers) --}}
                <div class="float-right">
                    {{$allCustomers->render()}}
                </div>
                {{-- @dump($allCustomers) --}}
                <div class="table-responsive">
                    <table class="table table-striped text-center table-fit-to-content datatable" id="customerTable">
                        <thead>
                            <tr>
                                <th>Customer Id</th>
                                <th>Customer Name</th>
                                <th>Area</th>
                                <th>Customer Address </th>
                                <th>Phone</th>
                                <th>Current Package</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Last Payment</th>
                                <th>Status</th>
                                <th>Current</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($allCustomers->count() >0)
                            @php
                            $ix = 0;
                            @endphp
                            @foreach ($allCustomers as $customer)
                            <tr>
                                <td class="d-none">
                                    {{--
                                    <a class="btn btn-danger"
                                        href="{{route('admin.customer.delete',['customerId'=> $customer->id])}}"><i
                                        class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    <a style="margin-top: 5px;"
                                        href="{{route('admin.customer.edit',['customerId'=> $customer->id])}}"
                                        class="btn btn-success"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></a>
                                    --}}
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-toggle="dropdown">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{route('admin.customer.edit',['customerId'=> $customer->id])}}">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                            <a class="dropdown-item"
                                                href="{{route('admin.customer.delete',['customerId'=> $customer->id])}}">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                            <a class="dropdown-item"
                                                href="{{route('admin.customer.packages.get',['Customer'=> $customer->id])}}">Go
                                                To Packages</a>
                                            <a class="dropdown-item"
                                                href="{{route('admin.payment.payment.get', ['Customer'=> $customer->id])}}">Go
                                                To Payments</a>
                                            <a class="dropdown-item"
                                                href="{{route('admin.payment.charges.get', ['Customer'=> $customer->id])}}">Go
                                                To Charges</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center align-middle">{{$customer->customer_id}}</td>
                                <td class="text-center align-middle">{{$customer->name}}</td>
                                <td class="text-center align-middle">{{$customer->Area?$customer->Area->area_name:""}}
                                </td>
                                <td class="text-center align-middle">{{$customer->address}}</td>
                                <td class="text-center align-middle">{{$customer->phone_numbers}}</td>
                                <td class="text-center align-middle">
                                    {{$customer->CurrentInternetPackageBill?$customer->CurrentInternetPackageBill->package_name:""}}
                                </td>
                                <td class="text-center align-middle">
                                    {{$customer->CurrentInternetPackageBill?$customer->CurrentInternetPackageBill->package_start_date->format('d/m/Y'):""}}
                                </td>
                                <td class="text-center align-middle">
                                    {{$customer->CurrentInternetPackageBill?$customer->CurrentInternetPackageBill->package_end_date->format('d/m/Y'):""}}
                                </td>
                                <td class="text-center align-middle">{!! $customer->last_payment_paid_formatted !!}</td>
                                <td class="text-center align-middle">{{$customer->is_active?'Active': 'Inactive'}}</td>
                                <td class="text-center align-middle">{!!$customer->pr_detail_html!!}</td>
                                <td class="text-center align-middle">
                                    @php
                                    $unqId = (Str::uuid());
                                    $frmId = "frm-xp-".$unqId;
                                    $submitID = "sbmt-xp-".$unqId;

                                    @endphp
                                    <form
                                        action="{{route('admin.customer.auto-renewals.single.post',[ 'Customer' =>$customer->id ])}}"
                                        method="post" id="{{$frmId}}" data-x-key="{{$unqId}}" data-x-type="form">
                                        <input type="hidden" name="PR[{{$customer->id}}][id]"
                                            value="{{$customer->id}}" />
                                        <input type="hidden" name="PR[{{$customer->id}}][cs1]"
                                            value="{{$customer->chksm}}" />
                                        <input type="hidden" name="PR[{{$customer->id}}][cs2]"
                                            value="{{Hash::make($customer->id."-dmkl skd2")}}" />
                                        <input type="hidden" name="PR[{{$customer->id}}][cs3]" value="{{$u->chksm}}" />
                                        {{-- <input type="hidden" name="PR[{{$customer->id}}]id"
                                        value="{{$customer->id}}" /> --}}
                                        <input type="hidden" name="PR[{{$customer->id}}][cbe]" value=""
                                            data-x-key="{{$unqId}}" data-x-type="cbe" />
                                        <label class="dSwitch">
                                            <input type="checkbox" id="togBtn-{{$unqId}}" data-x-key="{{$unqId}}"
                                                data-x-type="checkbox" name="PR[{{$customer->id}}][rce]"
                                                @if($customer->pr_is_enabled) checked="checked" @endif
                                            >
                                            <div class="slider round">
                                                <span class="on">ON</span>
                                                <span class="off">OFF</span>
                                            </div>
                                        </label>
                                        <div class="form-controlxx">
                                            <input type="number" name="PR[{{$customer->id}}][rc]" id="" min="0" max="24"
                                                value="{{$customer->pr_cnt}}" step="1" class="form-control"
                                                data-x-key="{{$unqId}}" data-x-type="number">
                                        </div>
                                        <input type="submit" value="Submit" class="d-none" id="{{$submitID}}">
                                        @csrf
                                    </form>
                                </td>
                                <td class="text-center align-middle" valign="middle">
                                    <button type="button" class="btn btn-success"
                                        onclick="$('#{{$submitID}}').click()">Save This</button>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>

                <div class="float-right">
                    {{$allCustomers->render()}}
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            $(document).on('change','[data-x-type="form"] [data-x-type="checkbox"],[data-x-type="form"] [data-x-type="number"]',function () {
                var key = $(this).data('xKey');
                var frm = $(this).parents('form').first();
                var cb = frm.find('[data-x-type="checkbox"]').first();
                var rc = frm.find('[data-x-type="number"]').first();
                var rcVal = parseInt(rc.val());
                // console.log(rcVal);
                var maxX = parseInt(rc.attr('max'));
                var minX = parseInt(rc.attr('min'));
                if(isNaN(rcVal)){
                    rc.val(0);
                }
                else if(rcVal>maxX){
                    rc.val(maxX);
                }
                else if(rcVal<minX){
                    rc.val(minX);
                }

                var Ob = getValSet(key);
                if(this == cb[0]){
                    if(!Ob.isEnabled){
                        rc.val(0);
                    }
                    else if(Ob.revisionCount==0){
                        rc.val(1);
                    }
                }
                else if(this == rc[0]){
                    if(Ob.revisionCount<1){
                        cb.prop('checked',false);
                    }
                    else if(!Ob.isEnabled){
                        cb.prop('checked',true);
                    }
                }
                updateFormDatas(key);

                // var New = getValSet(key);
                // console.log({Old:Ob,New});
            });
            $('[data-x-type="form"] [data-x-type="number"]').change();
        });
        function getValSet(key) {
            var frm = $(`[data-x-type="form"][data-x-key="${key}"]`).first();
            var cb = frm.find('[data-x-type="checkbox"]').first();
            var rc = frm.find('[data-x-type="number"]').first();
            var rcVal = parseInt(Number(rc.val()));
            rcVal = isNaN(rcVal)? 0: rcVal;
            return {
                key,
                isEnabled : cb.is(":checked"),
                revisionCount : rcVal,
            };
        }
        //
        function updateFormDatas(key) {
            if(key){
                var frm = $(`[data-x-type="form"][data-x-key="${key}"]`).first();
                var cb = frm.find('[data-x-type="checkbox"]').first();
                var rc = frm.find('[data-x-type="number"]').first();
                var Ob = getValSet(key);
                var dataSetData = {
                    revisionIsEnabled: Ob.isEnabled,
                    revisionCount: Ob.revisionCount,
                };
                frm.data(dataSetData);
                cb.data(dataSetData);
                rc.data(dataSetData);
            }
            else{
                var frmKeys = $(`[data-x-type="form"][data-x-key]`).get().map(v => v.dataset.xKey);
                for (const indx in frmKeys) {
                    const frmKey = frmKeys[indx];
                    updateFormDatas(key);
                }
            }
        }
        function submitForm(frmId) {
            $('#'+frmId).submit();
        }
    </script>

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

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.css" />

    <script type="text/javascript" src="//cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.js"></script>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
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
            // $("#customerTable").dataTable();
    });
    </script>
    @endsection
