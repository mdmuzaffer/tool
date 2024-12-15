@extends('admin.layouts.blank')

@section('content')
{{-- @if (session('success'))
<div class="alert alert-success alert-dismissable fade show">
    <strong>Success!!</strong> {{session('success')}}
    <button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
</div>
@endif --}}
{{-- @dump($u) --}}
<div class="container-fluid">
    <div class="col-md-12 text-center">
        <h3>All Billing Account</h3>
        @php $allbillac = $u->BillingAccounts;
        // App\BillingAccount::get();
        @endphp

    </div>
    <div class="card-body">
        <div class="card-header">
            <a class="btn btn-success" href="{{route('admin.billingaccount.newbillingaccount')}}">New Billing
                Account</a>

        </div>
        <div class="table-responsive">
            <div class="table table-striped text-center table-fit-to-content">
                <table>
                    <thead>
                        <tr>
                            <th>
                                Action
                            </th>
                            <th>Billing Account Name</th>
                            <th>Company Name</th>
                            <th>Phone 1</th>
                            <th>Phone 2</th>
                            <th>Email 1</th>
                            <th>Email 2</th>
                            <th>Address 1</th>
                            <th>Address 2</th>
                            <th>Address 3</th>
                            <th>State</th>
                            <th>District</th>
                            <th>Pin</th>
                            <th>Description</th>
                            <th>Is Active</th>
                            <th>Is GST Enable</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($allbillac->count()>0)
                        @foreach ($allbillac as $billac)
                        <tr>
                            <td>
                                {{-- <a class="btn btn-danger" href=""><i class="fa fa-trash" aria-hidden="true"></i></a> --}}
                                <a style="margin-top: 5px;" class="btn btn-success"
                                    href="{{route('admin.billingaccount.edit',['billingaccountId'=> $billac->id])}}"><i
                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </td>
                            <td>{{$billac->billing_ac_name}}</td>
                            <td>{{$billac->company_name}}</td>
                            <td>{{$billac->phon1}}</td>
                            <td>{{$billac->phone2}}</td>
                            <td>{{$billac->email1}}</td>
                            <td>{{$billac->email2}}</td>
                            <td>{{$billac->address1}}</td>
                            <td>{{$billac->address2}}</td>
                            <td>{{$billac->address3}}</td>
                            <td>{{$billac->state}}</td>
                            <td>{{$billac->district}}</td>
                            <td>{{$billac->pin}}</td>
                            <td>{{$billac->description}}</td>
                            <td>{{$billac->is_active?'Active':'Inactive'}}</td>
                            <td>{{$billac->is_gst_enable?'GST Enable':'GST Disable'}}</td>
                        </tr>
                        @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
