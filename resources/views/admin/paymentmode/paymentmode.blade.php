@extends('admin.layouts.blank')

@section('content')
{{-- @dump($u) --}}
<div class="container-fluid">
    <div class="row d-justify-content-center">
        <div class="col-md-12">
            <p class="text-center h3">All Payment Mode</p>
            @php $allpayment = $u->Paymentmodes;
            // App\PaymentMode::get();
            @endphp

            <div class="card-body">
                <div class="card-header">
                    <a class="btn btn-success" href="{{ route('admin.paymentmode.newpaymentmode') }}">New Payment
                        Mode</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Payment Mode Name</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Is Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($allpayment->count() >0)

                            @foreach ($allpayment as $payment)
                            <tr>
                                <td>
                                    <a class="btn btn-danger" href="{{route('admin.paymentmode.delete',['paymentMode'=> $payment->id])}}"><i class="fa fa-trash-o"
                                            aria-hidden="true"></i></a>
                                    <a href="{{route('admin.paymentmode.edit',['paymentId'=> $payment->id])}}"
                                        class="btn btn-success"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></a>
                                </td>
                                <td>{{$payment->name}}</td>
                                <td>{{$payment->title}}</td>
                                <td>{{$payment->description}}</td>
                                <td>{{$payment->is_active?'Active': 'Inactive'}}</td>

                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
