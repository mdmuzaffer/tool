{{-- @extends('front_desk.layouts.blank-vanilla') --}}
@extends('admin.layouts.blank')
@section('title')
Profile
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Your Profile</span>
            </h1>
            {{-- <div class="page-header-subtitle">Remove the fixed layout class from the body element for a
                scrollable, static layout option</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Basic Details</div>
        <div class="card-body">
            @if(isset($admin))
            <form action="{{ route('admin.update-profile.basic')}}" method="POST" id="BasicInfo"
                class="collapse show">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="fname" class="col-md-12">First Name</label>
                        <input class="form-control form-control-line" type="text" name="fname" id="fname"
                            value="{{old('admin_id', $admin->first_name)}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lname" class="col-md-12">Last Name</label>
                        <input class="form-control form-control-line" type="text" name="lname" id="lname"
                            value="{{old('admin_id', $admin->last_name)}}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="gender" class="col-md-12">Gender </label>
                        <select class="form-control" name="gender" id="gender" value="{{$admin->gender}}">
                            @php
                            $allgender =[
                            'Male' => 'Male',
                            'Female' => 'Female',
                            'Others' => 'Others',
                            ];
                            $gend=old('gender',$admin->gender);
                            @endphp
                            @foreach ($allgender as $gkey => $gvalue)
                            <option value="{{$gkey}}" @if ($gend==$gkey) selected="selected" @endif>
                                {{$gvalue}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email" class="col-md-12">Email ID</label>
                        <input class="form-control form-control-line" type="text" name="email" id="email"
                            value="{{old('admin_id', $admin->email)}}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="phone" class="col-md-12">Phone Number</label>
                        <input class="form-control form-control-line" type="text" name="phone" id="phone"
                            value="{{old('admin_id', $admin->phone)}}">
                    </div>


                    <div class="form-group col-md-12 text-center">
                        <input class="btn btn-primary w-50 mx-auto" type="submit" value="Update Basic Informations">
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="card mb-4">
        <div class="card-header">Password </div>
        <div class="card-body">
            @if(isset($admin))
            <form action="{{ route('admin.update-profile.contact-and-password')}}" method="POST"
                class="collapse show">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="password" class="col-md-12">New Password</label>
                        <input class="form-control form-control-line" type="password" name="password" id="password"
                            placeholder="Enter New Password Here">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="conf_password" class="col-md-12">Confirm New Password</label>
                        <input class="form-control form-control-line" type="password" name="conf_password"
                            id="conf_password" placeholder="Confirm New Password Again">
                    </div>


                    <div class="form-group col-md-6">
                        <label for="current_password" class="col-md-12">Current Password</label>
                        <input class="form-control form-control-line" type="password" name="current_password"
                            id="current_password" placeholder="Enter Current Password">
                    </div>
                    <div class="form-group col-md-12 text-center">
                        <input class="btn btn-primary w-50 mx-auto" type="submit" value="Update Password">
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="card mb-4">
        <div class="card-header">Profile Picture </div>
        <div class="card-body">
            @if(isset($admin))
            <form action="{{route('admin.update-profile.dp')}}" enctype="multipart/form-data" method="POST"
                class="collapse show">
                @csrf
                <div class="row">
                    <div class="col-md-12 text-center">
                        @if ($admin->dp)
                        <div id="photo" class="my-3">
                            <img src="{{asset($admin->dp)}}" alt="photo" id="dpdisplay"
                                style="height:200px;width:200px;display:block;margin-left:auto;margin-right:auto; object-fit:contain; border-radius:100px; border:2pt dashed #ccc;">
                        </div>
                        @endif
                        <input class="d-none" type="file" name="dp" id="dp" onchange="readURL(this, 'dpdisplay');"/>
                        <input class="btn btn-success m-2" type="button" onclick="$('#dp').val('').click()"
                            value="Choose Image" />
                        <input class="btn btn-primary m-2" type="submit" value="Update Profile Picture" />

                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="card mb-4">
        <div class="card-header">Signature</div>
        <div class="card-body">
            @if(isset($admin))
            <form action="{{route('admin.update-profile.signature')}}" enctype="multipart/form-data" method="POST"
                class="collapse show">
                @csrf
                <div class="row">
                    <div class="col-md-12 text-center">
                        @if ($admin->signature)
                        <div id="photo" class="my-3">
                            <img src="{{asset($admin->signature)}}" alt="photo" id="signDisplay"
                                style="height:200px;width:200px;display:block;margin-left:auto;margin-right:auto; object-fit:contain; border-radius:100px; border:2pt dashed #ccc;">
                        </div>
                        @endif
                        <input class="d-none" type="file" name="signature" id="signature" onchange="readURL(this, 'signDisplay');"/>
                        <input class="btn btn-success m-2" type="button" onclick="$('#signature').val('').click()"
                            value="Choose Image" />
                        <input class="btn btn-primary m-2" type="submit" value="Update Profile Picture" />

                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function readURL(input, imgBody) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#'+imgBody)
                    .attr('src', e.target.result);
                    // .width(150)
                    // .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
