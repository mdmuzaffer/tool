@extends('admin.layouts.blank')

@section('content')

{{-- @if ($errors->any())
<ul class="alert alert-danger">
    @foreach ($errors->all() as $msg)
    <li>{{$msg}}</li>
    @endforeach
</ul>
@endif --}}
<div class="container-fluid">
    <form action="{{route('admin.paymentmode.delete.submit',['paymentMode' => $paymentMode->id])}}" method="POST">
        @csrf
        <div class="text-center">
            <h3 class="text-center">Are You Sure to delete this payment mode?</h3>
            <small class="small text-center">
                Once you delete, cannot be restored.
            </small>
        </div>
        <input type="hidden" value="{{ $paymentMode->id}}" name="pm_id">
        <input type="hidden" value="{{ Hash::make($paymentMode->id.'-1234')}}" name="chksm" />
        <div class="col-12 text-center p-5 m-3">
            <button class="btn btn-danger">Yes, Delete</button>
            <a class="btn btn-primary" href="{{ route('admin.paymentmode.get')}}">Cancel</a>
        </div>
    </form>


</div>



@endsection
