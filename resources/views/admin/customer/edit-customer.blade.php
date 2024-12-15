@extends('admin.layouts.blank')

@section('content')
@php
$adm = Auth::guard('admin')->user();
// $packg = Auth::guard('admin')->user();
// $staff = Auth::guard('admin')->user();
@endphp
<div class="container-fluid">
    {{-- <div class="row justify-content-center form-material"> --}}
    {{-- <div class="col-md-12"> --}}
    {{-- @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $msg)
        <li>{{$msg}}</li>
    @endforeach
    </ul>
    @endif --}}
    @if(isset($customer))
    <h3>Update Customer</h3>
    <a class="btn btn-primary" href="{{route('admin.customer.get')}}">Back</a>
    <form action="{{ route('admin.customer.edit',['customerId' => $customerId]) }}" method="POST">
        @csrf
        <div class="form-row">
            {{-- <div class="col"> --}}
            <div class="form-group col-md-6">
                <label for="customerid" class="col-md-12 col-md-6">Customer ID <span style="color: red;"
                        class="mandatoryClass">*</span></label>
                <div class="col-md-12">
                    <input class="form-control form-control-line" type="text" name="customer_id"
                        value="{{old('customer_id', $customer->customer_id)}}">
                </div>
            </div>
            {{-- <input type="text"> --}}
            <div class="form-group col-md-6">

                <label for="customername" class="col-md-12 col-md-6">Customer Name <span style="color: red;"
                        class="mandatoryClass">*</span></label>
                <div class="form-group col-md-12">
                    <input class="form-control" type="text" name="name" value="{{old('name', $customer->name)}}">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="customeraddress" class="col-md-12">Customer Address </label>
                <div class="col-md-12">
                    <textarea class="form-control" id="" cols="20" rows="2" name="address"
                        value="">{{old('address', $customer->address)}}</textarea>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="customergender" class="col-md-12 col-md-6">Gender </label>
                <div class="col-md-12">


                    <select class="form-control" name="gender" value="{{$customer->gender}}">
                        {{-- <option></option> --}}
                        @php
                        $allgender =[
                        'Male' => 'Male',
                        'Female' => 'Female',
                        'Others' => 'Others',
                        ];
                        $gend=old('gender',$customer->gender);
                        @endphp
                        @foreach ($allgender as $gkey => $gvalue)
                        <option value="{{$gkey}}" @if ($gend==$gkey) selected="selected" @endif>{{$gvalue}}
                        </option>

                        @endforeach
                        {{-- @php
                        if(old('gender') !== null){
                            $customer = old('gender');
                        }
                        else{ $customer = $customer->gender; }
                        @endphp


                        {{-- <option value="Male" @if ($customer->gender=='Male') selected="selected"  @endif>Male</option> --}}
                        {{-- <option value="Male" @if ($customer=='Male') selected="selected"  @endif>Male</option>  --}}

                        {{-- <option @if ($customer->gender=='Female') selected="selected"  @endif>Female</option>
                        <option @if ($customer->gender=='Others') selected="selected"  @endif>Others</option> --}}
                        {{-- <option>Female</option>
                        <option>Others</option> --}}
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="customer" class="col-md-12 col-md-6">Email </label>
                <div class="col-md-12">
                    <input class="form-control" type="email" name="email" value="{{old('email', $customer->email)}}">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="phone1" class="col-md-12 col-md-6">Phone1 </label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="phone1" value="{{old('phone1', $customer->phone1)}}">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="phone2" class="col-md-12 col-md-6">Phone2 </label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="phone2" value="{{old('phone2', $customer->phone2)}}">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="ispusername" class="col-md-12 col-md-6">Isp User Name </label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="isp_username"
                        value="{{old('isp_username', $customer->isp_username)}}">
                </div>
            </div>
            {{-- <div class="form-group col-md-6">
                <label for="isppassword" class="col-md-12 col-md-6">Isp Password <span style="color: red;" class="mandatoryClass">*</span></label>
                <div class="col-md-12">
                   <input class="form-control" type="text" name="isp_password" value="{{$customer->isp_password}}">
        </div>
</div> --}}
<div class="form-group col-md-6">
    <label for="isplocalip" class="col-md-12 col-md-6">Isp Local Ip </label>
    <div class="col-md-12">
        <input class="form-control" type="text" name="isp_local_ip"
            value="{{old('isp_local_ip', $customer->isp_local_ip)}}">
    </div>
</div>
</div>


<div class="form-row">

    <div class="form-group col-md-6">
        <label for="isplocalmac" class="col-md-12 col-md-6">Isp Local Mac </label>
        <div class="col-md-12">
            <input class="form-control" type="text" name="isp_local_mac"
                value="{{old('isp_local_mac', $customer->isp_local_mac)}}">
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="isppackageid" class="col-md-12 col-md-6">Package</label>
        <div class="col-md-12">
            @php
            $allpackages = $adm->Packages;

            @endphp
            <select class="form-control" name="isp_package_id" id="" value="{{$customer->isp_package_id}}">
                <option value="">Select</option>
                @php
                $pag=old('isp_package_id', $customer->isp_package_id);
                @endphp
                @foreach ($allpackages as $pack)
                <option value="{{$pack->id}}" @if ($pag==$pack ->id)
                    selected='selected'
                    @endif
                    > {{$pack->package_name }} </option>

                @endforeach
            </select>
            {{-- <input class="form-control" type="text" name="isp_package_id"  value="{{$customer->isp_package_id}}">
            --}}
        </div>
    </div>
</div>

<div class="form-row">

    <div class="form-group col-md-6">
        <label for="adminareaid" class="col-md-12 col-md-6">Area</label>
        <div class="col-md-12">
            {{-- <input class="form-control" type="text" name="admin_area_id" value="{{$customer->admin_area_id}}"> --}}
            @php
            $allAreas = $adm->Areas;
            @endphp
            <select class="form-control" name="admin_area_id" id="" value="{{$customer->admin_area_id}}">
                <option value="">Select</option>
                @php
                $ad_ar=old('admin_area_id',$customer->admin_area_id);
                @endphp
                @foreach ($allAreas as $ar)
                <option value="{{ $ar->id }}" @if ($ad_ar==$ar->id) selected='selected' @endif
                    > {{$ar->area_code }} {{$ar->area_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="adminstaffid" class="col-md-12 col-md-6">Staff </label>
        <div class="col-md-12">
            @php
            $allstaffs = $adm->Staffs;
            @endphp
            <select class="form-control" name="admin_staff_id" id="" value="{{$customer->admin_staff_id}}">
                <option value="">Select</option>
                @php
                $st_vl=old('admin_staff_id',$customer->admin_staff_id);
                @endphp
                @foreach ($allstaffs as $staf)
                <option value="{{ $staf->id }}" @if ($st_vl==$staf->id) selected='selected' @endif
                    > {{ $staf->first_name }}</option>
                @endforeach
            </select>
            {{-- <input class="form-control" type="text" name="admin_staff_id"> --}}
        </div>
    </div>
</div>
<div class="form-row">


    <div class="form-group col-md-6">
        <label for="isactive" class="col-md-12 col-md-6">Is Active </label>
        <div class="col-md-12">
            @php
            // $request=request();
            // $isac=empty(old())?1:($request->is_active?1:0);
            $isac=old('is_active')=='1'?1:0;
            @endphp
            <input type="checkbox" name="is_active" data-toggle="toggle" data-on="Active" data-off="Inactive"
                data-onstyle="success" data-offstyle="danger" data-width="10rem" @if ($isac==1) checked="checked" @endif
                value="1" data-value="{{old('is_active', $customer->is_active)}}" />

        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="startdate" class="col-md-12 col-md-6">Start Date </label>
        <div class="col-md-12">
            <div class='input-group date' id='datetimepicker1'>
                <input type='text' name="start_date"
                    value="{{old('start_date', ($customer->start_date?$customer->start_date->format('d/m/Y'):''))}}"
                    class="form-control datepicker" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        {{-- <div class="form-group col-md-6"> --}}

        {{-- </div> --}}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="billingaccount" class="col md-12 col-md-6">Billing Account </label>
        <div class="col-md-12">
            @php
            $allbillaccount = $adm->BillingAccounts;
            @endphp
            <select name="billing_account_id" id="" class="form-control" value="{{$customer->billing_account_id}}">
                <option value="">Select</option>
                @php
                $bl_ac=old('billing_ac_name',$customer->billing_account_id);
                @endphp
                @foreach ($allbillaccount as $bill_ac)
                <option value="{{$bill_ac->id}}" @if ($bl_ac==$bill_ac->id) selected='selected' @endif
                    >{{$bill_ac->billing_ac_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="gstenabled" class="col-md-6">GST Included </label>
        <div class="col-md-12">
            @php
            // $request=request();
            $isac=((int)old('is_gst_enabled', $customer->is_gst_enabled)==1?1:0);
            // dump($isac, $customer->is_gst_enabled);

            // $isac=$request->is_active?1:0;
            @endphp
            <input @if ($isac==1) checked="checked" @endif type="checkbox" name="is_gst_enabled" data-toggle="toggle"
                data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger" data-width="10rem"
                value="1" />
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="customergstin" class="col-md-12">GSTIN</label>
        <div class="col-md-12">
            <input type="text" name="customer_gstin" class="form-control"
                value="{{old('customer_gstin', $customer->customer_gstin)}}">
        </div>
    </div>
</div>
<div class="col-md-12">
    <input style="margin-top: 30px;" class="btn btn-danger form-control" type="submit" value="Update">
</div>

</form>
<script>
    // $(document).ready(function(){
    //         $('#datetimepicker1').datetimepicker({
    //                 // format: 'DD-MM-YYYY'
    //                 format: 'YYYY-MM-DD'
    //             });
    //     });
</script>
@else
<p class="alert alert-danger text-center">
    Please input valid data
</p>
@endif
</div>

<link href="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bs4ts/css/bootstrap4-toggle.css" rel="stylesheet" />
<script src="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bs4ts/js/bootstrap4-toggle.js"></script>

{{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> --}}
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script> --}}
@endsection
