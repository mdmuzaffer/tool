@extends('admin.layouts.blank')

@section('content')



<div class="container-fluid">
    {{-- <div class="modal-body"> --}}
    {{-- @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $msg)
        <li>{{$msg}}</li>
        @endforeach
    </ul>
    @endif --}}
    @if(isset($adminstaff))
    <h3>Edit Staff</h3>
    <a class="btn btn-primary" href="{{route('admin.admin-staff.get')}}">Back</a>

    <form action="{{ route('admin.admin-staff.edit', ['adminstaffId'=>$adminstaffId]) }}" method="POST">
        @csrf
        <div class="row form-material">
            {{-- <div class="col-md-12 m-b-10">
                <div class="text-center m-t-30">
                    <div class="img-circle border-1"
                        style="height: 210px; width: 210px;display: inline-block; margin: 0 auto;border: 1pt solid #99abb4;border-radius: 50%;background-repeat: no-repeat;background-position: center;background-size: contain;background-color: #e6e7e8;">
                    </div>
                    <input type="file" class="hide" id="logo_text" style="display: none;">
                    <h4 style="cursor: pointer; margin-top: 10px; color: #455a64; font-family: Montserrat, sans-serif; font-weight: 400;"
                        class="card-title m-t-10" onclick="$('#logo_text').click();">Staff Photo &nbsp; <i
                            class="fa fa-user" aria-hidden="true"></i></h4>
                </div>
            </div> --}}
            {{-- </div> --}}

            <div class="form-group col-md-6">
                <label for="name" class="col-md-12 col-sm-6">First Name <span style="color: red;"
                        class="mandatoryClass">*</span></label>
                <div class="col-md-12">
                    <input class="form-control form-control-line" type="text" name="first_name"
                        value="{{old('first_name', $adminstaff->first_name)}}">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="phone" class="col-md-12 col-sm-6">Last Name <span style="color: red;"
                        class="mandatoryClass">*</span></label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="last_name"
                        value="{{old('last_name', $adminstaff->last_name)}}">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="email" class="col-md-12 col-sm-6">Email <span style="color: red;">*</span></label>
                <div class="col-md-12">
                    <input class="form-control" type="email" name="email" value="{{old('email', $adminstaff->email)}}">
                </div>

            </div>
            <div class="form-group col-md-6">
                <label for="dateofbirth" class="col-md-12 col-sm-6">Gender</label>
                <div class="col-md-12">
                    <select class="form-control" name="gender" id="" value="{{$adminstaff->gender}}">
                        @php
                        $allgender=[
                        'Male' =>'Male',
                        'Female' => 'Female',
                        'Others' =>'Others'
                        ];
                        $gend=old('gender', $adminstaff->gender);
                        @endphp
                        @foreach ($allgender as $gkey=>$gvalue)
                        <option value="{{$gkey}}" @if ($gend==$gkey) selected="selected" @endif>{{$gvalue}}</option>
                        @endforeach
                        {{-- <option></option> --}}
                        {{-- <option>Male</option>
                        <option>Female</option>
                        <option>Others</option> --}}
                        {{-- <option @if ($adminstaff->gender=='Male') selected="selected" @endif>Male</option>
                        <option @if ($adminstaff->gender=='Female') selected="selected" @endif>Female</option>
                        <option @if ($adminstaff->gender=='Others') selected="selected" @endif>Others</option> --}}
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="usertype" class="col-md-12 col-sm-6">User Type</label>
                <div class="col-md-12">
                    <select class="form-control" name="user_type" value="{{$adminstaff->user_type}}">
                        @php
                        $allusertype=[
                        'Staffoff'=>'Staff (Office)',
                        'Staffmob'=>'Staff (Mobile)',
                        'Techsupp'=>'Tech Support'
                        ];
                        $user_old=old('user_type', $adminstaff->user_type);
                        @endphp
                        @foreach ($allusertype as $user_key=>$user_value)
                        <option value="{{$user_key}}" @if ($user_old==$user_key) selected="selected" @endif>
                            {{$user_value}}</option>
                        @endforeach
                        {{-- <option></option> --}}
                        {{-- <option>Staff (Office)</option>
                        <option>Staff (Mobile)</option>
                        <option>Tech Support</option> --}}
                        {{-- <option @if ($adminstaff->user_type=='Staff (Office)') selected="selected" @endif>Staff (Office)
                        </option>
                        <option @if ($adminstaff->user_type=='Staff (Mobile)') selected="selected" @endif>Staff (Mobile)
                        </option>
                        <option @if ($adminstaff->user_type=='Tech Support') selected="selected" @endif>Tech Support
                        </option> --}}
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="password" class="col-md-12 col-sm-6">Phone</label>
                <div class="col-md-12">
                    <input class="form-control" type="number" name="phone" value="{{old('phone', $adminstaff->phone)}}">
                </div>
            </div>
            {{-- <div class="form-group col-md-6">
                <label for="isactive" class="col-md-12 col-sm-6">Password</label>
                <div class="col-md-12">
                    <input class="form-control" type="password" name="password" value="{{$adminstaff->password}}">
        </div>
</div> --}}
<div class="form-group col-md-6">
    <label for="isblocked" class="col-md-12 col-sm-6">Is Active</label>
    <div class="col-md-12">
        @php
        // $request=request();
            $isac=old('is_active')=='1'?1:0;
        // $isac=empty(old())?(int)$adminstaff->is_active:(old('is_active')=='1'?1:0);
        // $isac=$request->is_active?1:0;
        // dump(old(),$adminstaff->is_active,$request->is_active);
        @endphp
        <input type="checkbox" name="is_active"
        @if ($isac==1)
         checked="checked"
        @endif
        data-toggle="toggle" data-on="Active" data-off="Inactive"
        data-onstyle="success" data-offstyle="danger" data-width="10rem"
        @if ($isac==1)
            checked="checked"
        @endif
        value="1" data-value="{{old('is_active', $adminstaff->is_active)}}"
      >
    </div>
</div>
{{-- <div class="form-group col-md-6">
                <label for="adminid" class="col-md-12 col-sm-6">Admin Id</label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="admin_id" value="{{$adminstaff->admin_id}}">
</div>
</div> --}}
<div class="form-group col-md-6">
    <label for="dateofbirth" class="col-md-12 col-sm-6">Date of Birth</label>
    <div class="col-md-12">
        <div class='input-group date' id='datetimepicker1'>
            <input type='text' name="dob" value="{{old('dob', $adminstaff->dob)}}" class="form-control datepicker"
                data-provide="datepicker" data-date-format="dd-mm-yyyy">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>
</div>
<div class="col-12 text-center">
    <input class="btn btn-danger w-25 m-auto" type="submit" value="Update">
</div>
</div>
{{-- <script>
            $(document).ready(function(){
            $('#datetimepicker1').datetimepicker({
                    // format: 'DD-MM-YYYY'
                    format: 'YYYY-MM-DD'
                });
        });
        </script> --}}



</form>
@else
<p class="alert alert-danger text-center">
    Please input valid data
</p>
@endif
</div>

<link href="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bs4ts/css/bootstrap4-toggle.css" rel="stylesheet" />
<script src="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bs4ts/js/bootstrap4-toggle.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
{{-- <link href="//res.cloudinary.com/cblpay/raw/upload/webres/apl/assets/plugins/c3-master/c3.min.css" rel="stylesheet" /> --}}
{{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> --}}
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<link
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"
    rel="stylesheet">
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"> --}}
{{-- </script> --}}
@endsection
