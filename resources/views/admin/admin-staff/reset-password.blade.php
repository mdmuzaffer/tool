@extends('admin.layouts.blank');

@section('content')
<div class="container-fluid">
    {{-- @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $msg)
        <li>{{$msg}}</li>
        @endforeach
    </ul>
    @endif --}}
    <h3>Update Password</h3>
    <a class="btn btn-primary" href="{{route('admin.admin-staff.get')}}">Back</a>
    @if (isset($adminstaff))
    <form action="{{route('admin.admin-staff.reset-pass.post', [ 'adminstaff'=>$adminstaff->id ])}}" method="POST">
        @csrf
        <input type="hidden" name="stff_id" value="{{$adminstaff->id}}" />
        <input type="hidden" name="chksm" value="{{$adminstaff->chksm}}" />

        <div class="form-row">
         <div class="form-group col-md-6">
             <label for="name" class="col-md-12 col-md-6">Name <span style="color: red;" class="mandatoryClass">*</span></label>
             <div class="col-md-12">
                 <input class="form-control" type="text" disabled value="{{$adminstaff->full_name}}">

             </div>
         </div>
         <div class="form-group col-md-6">
             <label for="email" class="col-md-12 col-md-6">Email <span style="color: red;" class="mandatoryClass">*</span></label>
         <div class="col-md-12">
             <input class="form-control" type="text" disabled value="{{$adminstaff->email}}">
         </div>
         </div>
        </div>

        <div class="form-row">
         <div class="form-group col-md-6">
             <label for="password" class="col-md-12 col-md-6">Password <span style="color: red;" class="mandatoryClass">*</span></label>
             <div class="col-md-12">
                 <input class="form-control" type="password" name="password">
             </div>
         </div>
         <div class="form-group col-md-6">
             <label for="confirmpassword" class="col-md-12 col-md-6">Confirm Password <span style="color: red;" class="mandatoryClass">*</span></label>
             <div class="col-md-12">
                 <input class="form-control" type="password" name="password_confirmation">
             </div>
         </div>
        </div>
        <div form-row>
            <div class="form-group col-md-12">
                <input class="form-control btn btn-danger" type="submit" value="Change Password">
            </div>
        </div>
    </form>
    @else
        <p class="alert alert-danger text-center">
            Please Input Valid Data
        </p>
    @endif

</div>
@endsection
