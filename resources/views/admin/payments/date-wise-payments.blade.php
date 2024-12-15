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
                <div class="row">
                    <div class="col-12 my-2">

                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                {{$repTitle}}
                            </button>
                            <div class="dropdown-menu">

                                @foreach ($repDays as $rK => $repD)
                                @if ($rK=='custom')
                                <a href="javascript:void(0)" id="custom_range" class="dropdown-item"
                                    onclick="showdiv();">{{$repD}}</a>

                                @else
                                <a href="{{route('admin.payments.date-wise.get',['rep'=>$rK])}}"
                                    class="dropdown-item">{{$repD}}</a>

                                @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="d-none py-2" style="" id="show_form">
                            <form action="{{ route('admin.payments.date-wise.get') }}" method="GET">

                                <input type="hidden" name="rep" value="custom">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="fromdate" class="col-md-12">From Date</label>
                                        <div class="col-md-12">
                                            <input class="form-control form-control-line datepicker" type="text"
                                                name="rep_from" data-provide="datepicker" data-date-format="dd/mm/yyyy"
                                                placeholder="" value="{{date('d/m/Y')}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="todate" class="col-md-12">To Date</label>
                                        <div class="col-md-12">
                                            <input class="form-control form-control-line datepicker" type="text"
                                                name="rep_to" data-provide="datepicker" data-date-format="dd/mm/yyyy"
                                                placeholder="" value="{{date('d/m/Y')}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="row">
                                            <div style="padding-top: 30px;" class="col-md-8">
                                                <input type="submit" class="form-control btn btn-success"
                                                    value="Submit">
                                            </div>
                                            <div style="padding-top: 30px;" class="col-md-4">
                                                <input type="button" class="form-control btn btn-danger" id="hidebtn"
                                                    value="Hide" onclick="hidediv();">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped text-center table-fit-to-content datatable" id="customerTable">
                        <thead>
                            <tr>
                            <tr>
                                <th>SL NO.</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Payment Method</th>
                                <th>Received By</th>
                                <th>Action</th>
                            </tr>

                            </tr>
                        </thead>
                        <tbody>
                            @if($paymentList->count() >0)

                            @foreach ($paymentList as $pym)

                            <tr>
                                <td>{{$pym->slno_gen}}</td>
                                <td>{{$pym->date_of_action->format('d/m/Y')}}</td>
                                <td>{{$pym->amount}}</td>
                                <td>{{$pym->description}}</td>
                                <td>{{$pym->PaymentMode? $pym->PaymentMode->title:""}}</td>
                                <td>{!! $pym->received_by_html !!}</td>
                                <td>
                                    @php
                                    $frmId= Str::uuid()->ToString();
                                    @endphp
                                    <span class="d-none">
                                        <form
                                            action="{{route('admin.payment.payment.cancel.post',[ 'Customer' => $pym->internet_client_id,'Payment' => $pym->id ])}}"
                                            method="POST" onsubmit="return confirm('Are You Sure?')">
                                            @csrf
                                            <input type="hidden" name="cid" value="{{$pym->internet_client_id}}">
                                            <input type="hidden" name="pyid" value="{{$pym->id}}">
                                            <input type="hidden" name="chksmc" value="{{$pym->Customer->chksm}}">
                                            <input type="hidden" name="chksmp" value="{{$pym->chksm}}">
                                            <button type="submit" id="{{$frmId}}"
                                                class="btn btn-danger brn-sm">Cancel</button>
                                        </form>
                                    </span>
                                    <span>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">

                                                <a class="dropdown-item text-danger"
                                                    href="javascript:$('#{{$frmId}}').click()">
                                                    <i class="fa fa-ban" aria-hidden="true"></i> Cancel Payment</a>
                                                <a class="dropdown-item"
                                                    href="{{route('admin.customer.edit',['customerId'=> $pym->Customer->id])}}">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                    Cutomer</a>
                                                <a class="dropdown-item"
                                                    href="{{route('admin.customer.packages.get',['Customer'=> $pym->Customer->id])}}">Go
                                                    To Packages</a>
                                                <a class="dropdown-item"
                                                    href="{{route('admin.payment.payment.get', ['Customer'=> $pym->Customer->id])}}">Go
                                                    To Payments</a>
                                                <a class="dropdown-item"
                                                    href="{{route('admin.payment.charges.get', ['Customer'=> $pym->Customer->id])}}">Go
                                                    To Charges</a>
                                            </div>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <td colspan="2">Total Payment Collected</td>
                            <td>₹{{number_format($paymentTotal,2)}}/-</td>
                            <td colspan="3"></td>
                        </tfoot>
                    </table>

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
            $("#customerTable").dataTable();
    });
    </script>


    <script>
        function showdiv(){
        var show = document.getElementById('show_form');

        $(show).toggleClass('d-none');
    }

    function  hidediv(){
        var show = document.getElementById('show_form');

        $(show).addClass('d-none');
    }

    </script>
    @endsection
