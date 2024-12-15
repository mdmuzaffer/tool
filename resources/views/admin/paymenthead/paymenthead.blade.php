@extends('admin.layouts.blank')

@section('content')
{{-- @if (session('success'))
<div class="alert alert-success alert-dismissble fade show">
    <strong>Success!!</strong> {{session('success')}}
    <button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
@endif --}}

<div class="container-fluid">
    <div class="row d-justify-content-center">
        <div class="col-md-12">
            <p class="text-center h3">All Payment Head</p>
            @php $allpaymenthead = $u->Paymentheads;
            // App\PaymentHead::get();
            @endphp

            <div class="card-body">
                <div class="card-header">
                    <a class="btn btn-success" href="{{route('admin.paymenthead.newpaymenthead')}}">New Payment Head</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Payment Head Name</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Is Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($allpaymenthead->count() >0)

                            @foreach ($allpaymenthead as $payment)
                            <tr>
                                <td>
                                    <a class="btn btn-danger"
                                        href="{{route('admin.paymenthead.delete',['paymentId'=> $payment->id])}}"><i
                                            class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    <a href="{{route('admin.paymenthead.edit',['paymentId'=> $payment->id])}}"
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
