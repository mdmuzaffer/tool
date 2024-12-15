@extends('admin.layouts.blank')

@section('content')

<div class="container-fluid">
    {{-- @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $msg)
        <li>{{$msg}}</li>
        @endforeach
    </ul>
    @endif --}}
    <h3>Create Billing Account</h3>
    <a class="btn btn-primary" href="{{route('admin.billingaccount.get')}}">Back</a>
    <form action="{{route('admin.billingaccount.newbillingaccountaddsv')}}" method="POST">
        @csrf
        <div class="form-row">
            {{-- <div class="col"> --}}
            <div class="form-group col-md-6">
                <label for="billingaccountname" class="col-md-12 col-md-6">Billing Account Name <span
                        style="color: red;" class="mandatoryClass">*</span></label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="billing_ac_name" value="{{old('billing_ac_name')}}">
                    {{-- </div> --}}
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="comapnyname" class="col-md-12 col-md-6">Company Name <span style="color: red;"
                        class="mandatoryClass">*</span></label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="company_name" value="{{old('company_name')}}">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="phone1" class="col-md-12 col-md-6">Phone 1 </label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="phon1" value="{{old('phon1')}}">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="phone2">Phone 2</label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="phone2" value="{{old('phone2')}}">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email1" class="col-md-12 col-md-6">Email 1 </label>
                <div class="col-md-12">
                    <input class="form-control" type="email" name="email1" value="{{old('email1')}}">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="email2" class="col-md-12 col-md-6">Email 2 </label>
                <div class="col-md-12">
                    <input  class="form-control" type="email" name="email2" value="{{old('email2')}}">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="address1" class="col-md-12 col-md-6">Address1 </label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="address1" value="{{old('address1')}}">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="address2" class="col-md-12 col-md-6">Address 2 </label>
               <div class="col-md-12">
                <input class="form-control" type="text" name="address2" value="{{old('address2')}}">

               </div>
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="address3" class="col-md-12 col-md-6">Address 3 </label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="address3" value="{{old('address3')}}">
                </div>

            </div>
            <div class="form-group col-md-6">
                <label for="state" class="col-md-12 col-md-6">State </label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="state" value="{{old('state')}}">
                    {{-- <select name="state" id="" class="form-control">
                        {{-- <option>Select</option> --}}
                        {{-- <option>West Bengal</option>
                    </select>  --}}
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="district" class="col-md-12 col-md-6">District </label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="district" value="{{old('district')}}">
                    {{-- <select name="district" id="" class="form-control">
                        {{-- <option>Select</option> --}}
                        {{-- <option>Paschim Medinipur</option>  --}}
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="pin" class="col-md-12 col-md-6">Pin </label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="pin" value="{{old('pin')}}">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="description" class="col-md-12 col-md-6">Description </label>
                <div class="col-md-12">
                    <textarea name="description" id="" cols="30" rows="3" class="form-control">{{old('description')}}</textarea>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="isactive" class="col-md-12 col-md-6">Is Active </label>
                    <div class="col-md-12">
                        @php
                        $isac=empty(old())?1:(old('is_active')=='1'?1:0);

                        @endphp
                        <input type="checkbox" name="is_active" data-toggle="toggle" data-on="Active" data-off="Inactive"
                        data-onstyle="success" data-offstyle="danger" data-width="10rem"
                        @if ($isac==1)
                        checked="checked"
                        @endif
                          value="1" data-value="{{old('is_active')}}"/>
                    </div>
            </div>

            <div class="form-group col-md-6">
                <label for="isgstenable" class="col-md-12 col-md-6">Is Gst Enable </label>
                <div class="col-md-12">
                    @php
                        $isgstenable=empty(old())?1:(old('is_gst_enable')=='1'?1:0);
                        // dd($isgstenable);
                    @endphp
                    <input type="checkbox" name="is_gst_enable" data-toggle="toggle" data-on="GST Enabled" data-off="GST Disabled"
                    data-onstyle="success" data-offstyle="danger" data-width="10rem"
                    @if ($isgstenable==1)
                    checked="checked"
                    @endif

                    value="1" data-value="{{old('is_gst_enable')}}"/>
                    {{-- @php
                         dd($isgstenable);
                    @endphp --}}


                </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <input class="form-control btn btn-success" type="submit" value="Submit">
        </div>
    </form>
</div>


<link href="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bs4ts/css/bootstrap4-toggle.css" rel="stylesheet" />
<script src="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bs4ts/js/bootstrap4-toggle.js"></script>
@endsection
