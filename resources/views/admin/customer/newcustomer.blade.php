@extends('admin.layouts.blank')

@section('content')
@php
$adm = Auth::guard('admin')->user();
// $packg = Auth::guard('admin')->user();
// $staff = Auth::guard('admin')->user();

// use Input
@endphp
{{-- @php
$packg = Auth::guard('admin')->user();

@endphp --}}
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
    <h3>Create Customer</h3>
    <a class="btn btn-primary" href="{{route('admin.customer.get')}}">Back</a>

    <form action="{{ route('admin.customer.newcustomeraddsv') }}" method="POST">
        @csrf

        <div class="form-row">
            {{-- <div class="col"> --}}
            <div class="form-group col-md-6">
                <label for="customerid" class="col-md-12 col-md-6">Customer ID <span style="color: red;"
                        class="mandatoryClass">*</span></label>
                <div class="col-md-12">
                    <input class="form-control form-control-line" type="text" name="customer_id"
                        value="{{old('customer_id')}}">
                </div>
            </div>
            {{-- <input type="text"> --}}
            <div class="form-group col-md-6">

                <label for="customername" class="col-md-12 col-md-6">Customer Name <span style="color: red;"
                        class="mandatoryClass">*</span></label>
                <div class="form-group col-md-12">
                    <input class="form-control" type="text" name="name" value="{{old('name')}}">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="customeraddress" class="col-md-12">Customer Address </label>
                <div class="col-md-12">
                    <textarea class="form-control" id="" cols="20" rows="2" name="address">{{old('address')}}</textarea>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="customergender" class="col-md-12 col-md-6">Gender </label>
                <div class="col-md-12">
                    <select class="form-control" name="gender">
                        {{-- <option></option> --}}
                        <option value="Male" @if (old('gender')=='Male' ) selected="selected" @endif>Male</option>
                        <option value="Female" @if (old('gender')=='Female' ) selected="selected" @endif>Female</option>
                        <option value="Others" @if (old('gender')=='Others' ) selected="selected" @endif>Others</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="customer" class="col-md-12 col-md-6">Email </label>
                <div class="col-md-12">
                    <input class="form-control" type="email" name="email" value="{{old('email')}}">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="phone1" class="col-md-12 col-md-6">Phone1 </label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="phone1" value="{{old('phone1')}}">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="phone2" class="col-md-12 col-md-6">Phone2 </label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="phone2" value="{{old('phone2')}}">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="ispusername" class="col-md-12 col-md-6">Isp User Name </label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="isp_username" value="{{old('isp_username')}}">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="isppassword" class="col-md-12 col-md-6">Isp Password </label>
                <div class="col-md-12">
                    <input class="form-control" type="password" name="isp_password">
                </div>
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="isplocalip" class="col-md-12 col-md-6">Isp Local Ip</label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="isp_local_ip" value="{{old('isp_local_ip')}}">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="isplocalmac" class="col-md-12 col-md-6">Isp Local Mac </label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="isp_local_mac" value="{{old('isp_local_mac')}}">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="isppackageid" class="col-md-12 col-md-6">Package</label>
                <div class="col-md-12">
                    @php
                    $allpackages = $adm->Packages;
                    @endphp
                    <select class="form-control" name="isp_package_id" id="">
                        <option value="">Select</option>
                        @foreach ($allpackages as $pack)
                        <option value="{{$pack->id}}"
                            {{ (collect(old('isp_package_id'))->contains($pack->id)) ? 'selected':'' }}>
                            {{$pack->package_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="adminareaid" class="col-md-12 col-md-6">Area </label>
                <div class="col-md-12">
                    @php
                    $allAreas = $adm->Areas;
                    @endphp
                    <select class="form-control" name="admin_area_id" id="">
                        <option value="">Select</option>
                        @foreach ($allAreas as $ar)
                        <option value="{{$ar->id}}"
                            {{ (collect(old('admin_area_id'))->contains($ar->id)) ? 'selected':'' }}>{{$ar->area_code}}
                            {{$ar->area_name}}</option>
                        @endforeach
                    </select>
                    {{-- <input class="form-control" type="text" name="admin_area_id"> --}}
                </div>
            </div>
        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="adminstaffid" class="col-md-12 col-md-6">Staff </label>
                <div class="col-md-12">
                    @php
                    $allstaffs = $adm->Staffs;
                    @endphp
                    <select class="form-control" name="admin_staff_id" id="">
                        <option value="">Select</option>
                        @foreach ($allstaffs as $staf)
                        <option value="{{$staf->id}}"
                            {{ (collect(old('admin_staff_id'))->contains($staf->id)) ? 'selected':'' }}>
                            {{$staf->first_name}}</option>
                        @endforeach
                    </select>
                    {{-- <input class="form-control" type="text" name="admin_staff_id"> --}}
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="isactive" class="col-md-12 col-md-6">Is Active </label>
                <div class="col-md-12">
                    {{-- <input type="hidden" name="is_active" value="0"> --}}
                    @php
                    // $request=request();
                    $isac=empty(old())?1:(old('is_active')=='1'?1:0);


                    // $isac=$request->is_active?1:0;
                    @endphp
                    <input type="checkbox" name="is_active" data-toggle="toggle" data-on="Active" data-off="Inactive"
                        data-onstyle="success" data-offstyle="danger" data-width="10rem" @if ($isac==1)
                        checked="checked" @endif value="1" data-value="{{old('is_active')}}" />

                </div>
            </div>
        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="startdate" class="col-md-12 col-md-6">Start Date </label>
                <div class="col-md-12">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' name="start_date" class="form-control datepicker" data-provide="datepicker"
                            data-date-format="dd/mm/yyyy" value="{{old('start_date', date('d/m/Y'))}}">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                {{-- <div class="form-group col-md-6"> --}}

                {{-- </div> --}}
            </div>

            <div class="form-group col-md-6">
                <label for="billing_account" class="col-md-12 col-md-6">Billing Account </label>
                <div class="col-md-12">
                    @php
                    $allbillaccount = $adm->BillingAccounts;
                    @endphp
                    <select name="billing_account_id" id="" class="form-control">
                        <option value="">Select</option>
                        @foreach ($allbillaccount as $bill_ac)
                        <option value="{{$bill_ac->id}}"
                            {{ (collect(old('billing_account_id'))->contains($bill_ac->id)) ? 'selected':'' }}>
                            {{$bill_ac->billing_ac_name}}</option>
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
                    $isac=empty(old())?0:(old('is_gst_enabled')=='1'?1:0);


                    // $isac=$request->is_active?1:0;
                    @endphp
                    <input @if ($isac==1) checked="checked" @endif type="checkbox" name="is_gst_enabled"
                        data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success"
                        data-offstyle="danger" data-width="10rem" value="1" />
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="customergstin" class="col-md-12">GSTIN</label>
                <div class="col-md-12">
                    <input type="text" name="customer_gstin" class="form-control" value="{{old('customer_gstin')}}">
                </div>
            </div>
        </div>
   {{--
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="lastpaymentdate" class="col-md-12">Last Payment Date</label>
                <div class="col-md-12">
                    <input type='text' name="" class="form-control datepicker" data-provide="datepicker"
                    data-date-format="dd/mm/yyyy" value="{{date('d/m/Y')}}">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="consumed" class="col-md-12">Consumed</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="pym_total">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="lastpaymentdate" class="col-md-12">Paid</label>
                <div class="col-md-12">
                   <input type="text" class="form-control" name="pym_paid">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="consumed" class="col-md-12">Due</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="pym_due">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="stock" class="col-md-12">Stock</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="pym_stock">
                </div>
            </div>
        </div> --}}
        <div class="col-md-12">
            <input style="margin-top: 30px;" class="btn btn-danger form-control" type="submit" value="Submit">
        </div>

    </form>
    {{-- <script>
        $(document).ready(function(){
            $('#datetimepicker1').datetimepicker({
                    // format: 'DD-MM-YYYY'
                    format: 'YYYY-MM-DD'
                });
        });
    </script> --}}
</div>

<link href="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bs4ts/css/bootstrap4-toggle.css" rel="stylesheet" />
<script src="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bs4ts/js/bootstrap4-toggle.js"></script>

{{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> --}}
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<link
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"
    rel="stylesheet">
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
</script> --}}
{{-- <link href="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bsdp/css/bootstrap-datepicker.css" rel="stylesheet" />
<script src="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bsdp/js/bootstrap-datepicker.js"></script>
<script src="//res.cloudinary.com/cblpay/raw/upload/webres/apl/assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap popper Core JavaScript -->
<script src="//res.cloudinary.com/cblpay/raw/upload/webres/apl/assets/plugins/twbs4/js/popper.min.js"></script>
<script src="//res.cloudinary.com/cblpay/raw/upload/webres/apl/assets/plugins/twbs4/js/bootstrap.bundle.min.js"></script> --}}
@endsection
