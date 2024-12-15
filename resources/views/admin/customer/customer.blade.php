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
                <div class="col-12 d-none">

                    <form action="">
                        <div class="form-group row">
                            <label for="customerdetails">Name / Phone / Email / Customer ID / Address</label>
                            <div class="col-12">
                                <input class="form-control form-control-file form-control-sm" type="text"
                                    placeholder="Search" id="searchCustomer" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-header">
                    @if (isset($showNewCustomerBtn) && $showNewCustomerBtn)
                    <a class="btn btn-success mx-2" href="{{ route('admin.customer.newcustomer') }}">New Customer</a>
                    @endif
                    @if(isset($showBulkImportCustomerBtn) && $showBulkImportCustomerBtn )
                    <a class="btn btn-success mx-2" href="{{ route('admin.customer.bulk-import.get') }}">Import
                        Customer</a>

                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table table-striped text-center table-fit-to-content datatable" id="customerTable">
                        <thead>
                            <tr>
                                <th>Action</th>

                                <th>Customer Id</th>
                                <th>Customer Name</th>
                                <th>Customer Address </th>
                                {{-- <th>Gender</th> --}}
                                {{-- <th>Email</th> --}}
                                <th>Phone</th>
                                <th>Consumed</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th>Stock</th>
                                {{-- <th>Phone 2</th> --}}
                                <th>Isp User Name</th>
                                <th>Isp Password </th>
                                {{-- <th> Isp Local Ip</th> --}}
                                {{-- <th>Isp Local Mac</th> --}}

                                <th>Current Package</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Last Payment</th>
                                <th>Area</th>
                                <th>Staff</th>
                                <th>Is Active</th>
                                {{-- <th>Start Date</th> --}}
                                <th>Billing Account</th>
                                <th>GST Included</th>
                                <th>GSTIN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($allCustomers->count() >0)

                            @foreach ($allCustomers as $customer)
                            <tr>
                                <td>
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
                                <td>{{$customer->customer_id}}</td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->address}}</td>
                                {{-- <td>{{$customer->gender}}</td> --}}
                                {{-- <td>{{$customer->email}}</td> --}}
                                <td>{{$customer->phone_numbers}}</td>
                                <td>{{$customer->f_pym_total}}</td>
                                <td>{{$customer->f_pym_paid}}</td>
                                <td>{{$customer->f_pym_due}}</td>
                                <td>{{$customer->f_pym_stock}}</td>
                                {{-- <td>{{$customer->phone2}}</td> --}}
                                <td>{{$customer->isp_username}}</td>
                                <td>{{$customer->isp_password}}</td>
                                {{-- <td>{{$customer->isp_local_ip}}</td> --}}
                                {{-- <td>{{$customer->isp_local_mac}}</td> --}}
                                {{-- <td>{{$customer->Package?$customer->Package->package_name:""}}</td> --}}
                                <td>{{$customer->CurrentInternetPackageBill?$customer->CurrentInternetPackageBill->package_name:""}}
                                </td>
                                <td>{{$customer->CurrentInternetPackageBill?$customer->CurrentInternetPackageBill->package_start_date->format('d/m/Y'):""}}
                                </td>
                                <td>{{$customer->CurrentInternetPackageBill?$customer->CurrentInternetPackageBill->package_end_date->format('d/m/Y'):""}}
                                </td>
                                {{-- <td>{{$customer->pym}}</td> --}}
                                <td>{!! $customer->last_payment_paid_formatted !!}</td>
                                <td>{{$customer->Area?$customer->Area->area_name:""}}</td>
                                <td>{{$customer->Staff?$customer->Staff->first_name:""}}</td>
                                <td>{{$customer->is_active?'Active': 'Inactive'}}</td>
                                {{-- <td>{{$customer->start_date?$customer->start_date->format('d/m/Y'):""}}</td> --}}
                                <td>{{$customer->BillingAccount?$customer->BillingAccount->billing_ac_name:""}}</td>
                                <td>{{$customer->is_gst_enabled?'active': 'Inactive'}}</td>
                                <td>{{$customer->customer_gstin}}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
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