@extends('admin.layouts.blank')

@section('content')

<div class="container-fluid">
    <h3>Create Payment Head</h3>
    <a class="btn btn-primary" href="{{route('admin.paymenthead.get')}}">Back</a>
    {{-- @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $msg)
                        <li>{{$msg}}</li>
    @endforeach
    </ul>
    @endif --}}
    <form action="{{ route('admin.paymenthead.newpaymentheadaddsv')}}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="payment_mode_name" class="col-md-12 col-sm-6">Payment Head Name <span style="color: red;"
                        class="mandatoryClass">*</span></label>
                <div class="col-md-12">
                    <input name="name" class="form-control" type="text" value="{{old('name')}}">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="title" class="col-md-12 col-sm-6">Title</label>
                <div class="col-md-12">
                    <input name="title" class="form-control" type="text" value="{{old('title')}}">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="description" class="col-md-12">Description </label>
                <div class="col-md-12">
                    <textarea class="form-control" name="description" id="" cols="30" rows="5">{{old('description')}}</textarea>
                </div>
            </div>

        </div>
        <div class="form-row">
            <div class="form-group ">
                <label for="isactive" class="col-md-12 col-md-6">Is Active </label>
                <div class="col-md-12">
                    @php
                    // $request=request();
                    $isac=empty(old())?1:(old('is_active')=='1'?1:0);
                    // $isac=$request->is_active?1:0;
                    @endphp
                    <input type="checkbox" name="is_active" data-toggle="toggle" data-on="Active"
                        data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-width="10rem" @if ($isac==1)
                            checked="checked"
                        @endif
                        value="1" data-value="{{old('is_active')}}"/>
            </div>
        </div>
        <div class="col-md-12">
            <input style="margin-top: 30px;" class="btn btn-success form-control" type="submit" value="Submit">
        </div>
        </div>

    </form>
</div>


<link href="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bs4ts/css/bootstrap4-toggle.css" rel="stylesheet" />
<script src="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bs4ts/js/bootstrap4-toggle.js"></script>
@endsection
