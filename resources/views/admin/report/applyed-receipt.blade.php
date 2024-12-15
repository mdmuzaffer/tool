{{-- @extends('customer.layouts.blank-vanilla') --}}
@extends('admin.layouts.blank')
@section('title')
Receipts
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Apply Receipts</span>
            </h1>

        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card mb-4">
            <div class="card-header">
                <form method="get" class="row w-100" action="{{ route('admin.user.applyrecpts') }}">

                    <div class="col-md-4" style="float: left">
                        <label class="text-white">Search</label>
                        <input type="text" name="search" value="{{ Request()->search }}" class="form-control">
                    </div>

                    <div class="col-md-1 mt-md-4" style="float: left;">
                        <input type="submit" value="Search" class="btn btn-primary">
                    </div>
                    <div class="col-md-1 mt-md-4" style="float: left;">
                        <a href="{{ route('admin.user.applyrecpts') }}" class="btn btn-dark" style="width;110%">Clear</a>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="datatable table-responsive" style=" overflow-x:auto">
                    @if ($applyrecp != null)
                    {{-- <table class="table table-bordered table-hover DataTable" id="dataTable" width="100%" cellspacing="0"> --}}
                    <table class="table table-bordered table-hover mt-3" id="DataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <td style="padding: 10px;">Receipt No</td>
                                <td style="padding: 10px;">Vehicle Category</td>
                                <td style="padding: 10px;">Regis. No</td>
                                <td style="padding: 10px;">Name</td>
                                <td style="padding: 10px;">State</td>
                                <td style="padding: 10px;">Tax Period</td>
                                <td style="padding: 10px;">Tax From Date</td>
                                <td style="padding: 10px;">Tax To Date</td>
                                <td style="padding: 10px;">Mobile No.</td>
                                <td style="padding: 10px;">User Charges</td>
                                <td style="padding: 10px;">Tax Amount</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($applyrecp as $rec)
                        <tr>
                            <td style="padding: 10px;">
                                <a target="_blank"
                                    href="{{$rec->admin_print_url}}">{{$rec->receipt_no_gen}}</a>
                                    {{-- <a target="_blank"
                                        href="{{$rec->universal_link}}">p2</a> --}}
                            </td>
                            <td style="padding: 10px;">{{$rec->VehicleType}}</td>
                            <td style="padding: 10px;">{{$rec->vehicleno}}</td>
                            <td style="padding: 10px;">{{$rec->ownername}}</td>
                            <td style="padding: 10px;">{{$rec->from_state}}</td>
                            <td style="padding: 10px;">{{$rec->TaxMode}}</td>
                            <td style="padding: 10px;">{{$rec->tax_from}}</td>
                            <td style="padding: 10px;">{{$rec->tax_upto}}</td>
                            <td style="padding: 10px;">{{$rec->mobile}}</td>
                            <td style="padding: 10px;"></td>
                            <td style="padding: 10px;">{{$rec->total_tax_amount}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                        {{ $applyrecp->links('vendor.pagination.admin') }}
                    @endif
                </div>


            </div>
        </div>
    </div>
</div>

@endsection
