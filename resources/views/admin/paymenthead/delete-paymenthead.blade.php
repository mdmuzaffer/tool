@extends('admin.layouts.blank')

@section('content')

<div class="container-fluid">
    <form action="{{route('admin.paymenthead.delete.submit',['paymenthead' => $paymenthead->id])}}" method="POST">
        @csrf
        <div class="text-center">
            <h3 class="text-center">Are You Sure to delete this payment head?</h3>
            <small class="small text-center">Once you delete, cannot be restored.</small>
        </div>
        <input type="hidden" value="{{ $paymenthead->id}}" name="paym_id">
        <input type="hidden" value="{{ Hash::make($paymenthead->id.'-1234')}}" name="chksm" />
        <div class="col-12 text-center p-5 m-3">
            <button class="btn btn-danger" href="">Yes, Delete</button>
            <a class="btn btn-primary" href="{{route('admin.paymenthead.get')}}">Cancel</a>
        </div>
    </form>
</div>

@endsection
