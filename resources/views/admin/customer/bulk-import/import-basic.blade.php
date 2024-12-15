@extends('admin.layouts.blank')

@section('title')
Client Import Basic
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Client Import Basic</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Client Import Basic</div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="row d-justify-content-center">
                    <div class="col-md-12">
                        <p class="text-center h3">Import Clients From CSV File</p>

                        <form action="{{ route('job.customer.import-basic.do') }}" method="post"
                            enctype="multipart/form-data">

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <div class="col-md-12">
                                        <a href="{{ route('job.customer.import-basic.download-blank') }}" class="btn btn-secondary">
                                         <i class="fa fa-download"></i>&nbsp;&nbsp; Download a blank format
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="customeraddress" class="col-md-12">Select A File</label>
                                    <div class="col-md-12">
                                        <input type="file" name="bulk_customer_csv" id="bulk_customer_csv"
                                            data-file-key="bulk_customer_csv" data-file-t="fileinput" class="d-none"
                                            accept=".csv">
                                        <button type="button" class="btn btn-primary" data-file-key='bulk_customer_csv'
                                            onclick="openDialog(this.dataset.fileKey)">Browse a file</button>
                                        <span class="small text-black span-file-details"
                                            data-file-key='bulk_customer_csv' data-file-t="filename"></span>
                                    </div>
                                </div>
                                <div class="d-none form-group col-md-6">
                                    <label for="customeraddress" class="col-md-12">Options</label>
                                    <div class="col-md-12">
                                        <label for="UpdateIfExists">
                                            <input type="checkbox" name="UpdateIfExists" id="UpdateIfExists" value="1">
                                            <span>Update Customer If Already Exists</span>
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="IgnoreErrorsIfIgnorable">
                                            <input type="checkbox" name="IgnoreErrorsIfIgnorable"
                                                id="IgnoreErrorsIfIgnorable" value="1">
                                            <span>Ignore Errors If It Can Be</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 text-center">
                                    <label for="customeraddress" class="col-md-12">&nbsp;</label>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                            @csrf
                        </form>

                        @isset($abcdef)
                        <div class="table-responsive">
                            <table class="table table-striped text-center table-fit-to-content">
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
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{route('admin.customer.delete',['customerId'=> $customer->id])}}">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                                    <a class="dropdown-item"
                                                        href="{{route('admin.customer.packages.get',['Customer'=> $customer->id])}}">Packages</a>
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
                                        {{-- <td>{{$customer->start_date?$customer->start_date->format('d/m/Y'):""}}
                                        </td> --}}
                                        <td>{{$customer->BillingAccount?$customer->BillingAccount->billing_ac_name:""}}
                                        </td>
                                        <td>{{$customer->is_gst_enabled?'active': 'Inactive'}}</td>
                                        <td>{{$customer->customer_gstin}}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>

                        </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function openDialog(key) {
        // alert(key);
        var fileInput = $(`:file[data-file-key="${key}"][data-file-t="fileinput"]`).first();
        fileInput.val('').change().click();
        console.log(fileInput);
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


@endsection

@push('scripts')
<script>
    $(document).ready(function () {
            $(document).on('change', ':file[data-file-key][data-file-t="fileinput"]', function () {
                var key = this.getAttribute('data-file-key');
                if(this.files && this.files[0]) 
                {
                    $(`[data-file-key="${key}"][data-file-t="filename"]`).text(this.files[0].name);
                }
            });
        });
</script>
@endpush