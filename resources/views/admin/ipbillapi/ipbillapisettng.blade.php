@extends('admin.layouts.blank')

@section('content')

<div class="container-fluid">
    <h3>Ip Bill API Settings</h3>

    <form action="{{ route('admin.ipbillapisett.ipbillapisetngadd') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="apiendpoint" class="col-md-12">API end point</label>
                <div class="col-md-12">
                    <textarea name="api_end_point" id="" cols="30" rows="2"
                        class="form-control">@isset($ipbillapi){{$ipbillapi->api_end_point}}@endisset</textarea>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="username" class="col-md-12">Username</label>
                <div class="col-md-12">
                    <input type="text" name="user_name" class="form-control" @isset($ipbillapi)
                        value="{{$ipbillapi->user_name}}" @else value="{{old('user_name')}}" @endisset>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="password" class="col-md-12">Password</label>
                <div class="col-md-12">
                    <input type="text" name="password" class="form-control" @isset($ipbillapi)
                        value="{{$ipbillapi->password}}" @else value="{{old('password')}}" @endisset>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="useapi" class="col-md-12">Use API?</label>
                @php
                // $request=request();
                // $isac=empty(old())?1:($request->is_active?1:0);
                $isac=isset($ipbillapi)?$ipbillapi->use_api:(old('use_api')=='1'?1:0);
                @endphp
                <div class="col-md-12">
                    <input @if($isac==1) checked="checked" @endif type="checkbox" name="use_api" checked="checked"
                        data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success"
                        data-offstyle="danger" data-width="10rem" value="1">
                </div>

            </div>
        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-success w-25">Save</button>
        </div>
    </form>

</div>
<link href="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bs4ts/css/bootstrap4-toggle.css" rel="stylesheet" />
<script src="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bs4ts/js/bootstrap4-toggle.js"></script>
@endsection
