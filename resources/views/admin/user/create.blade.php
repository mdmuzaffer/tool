{{-- @extends('customer.layouts.blank-vanilla') --}}
@extends('admin.layouts.blank')
@section('title')
User
@endsection
@section('content')

<style>
    .bootstrap-select > .dropdown-toggle{
        height: 45px;
    }
</style>
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>User Create</span>
            </h1>

        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card mb-4">
            <div class="card-header">Basic Details</div>
            <div class="card-body">
                {{-- {{ route('admin.user.create')}} --}}
                <form action="{{ route('admin.user.create')}}" method="POST" id="BasicInfo"
                    class="collapse show">

                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="fname" class="col-md-12">State</label>
                            <select class="form-control select-date" name="state[]" id="state" multiple data-live-search="true" value="">
                                @foreach ($u->service_states as $state)
                                    <option value="{{$state->id}}">{{$state->name}} ({{$state->code}})</option>
                                    {{-- <option >{{$state['id']}}</option> --}}
                                @endforeach
                                {{-- <option value="1">Uttar Pradesh</option>
                                <option value="2">Uttarakhand</option>
                                <option value="3">Punjab</option> --}}
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fname" class="col-md-12">First Name</label>
                            <input class="form-control form-control-line" type="text" name="fname" id="fname"
                                value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lname" class="col-md-12">Last Name</label>
                            <input class="form-control form-control-line" type="text" name="lname" id="lname"
                                value="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="gender" class="col-md-12">Gender </label>
                            <select class="form-control" name="gender" id="gender" value="">


                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="col-md-12">Email ID</label>
                            <input class="form-control form-control-line" type="text" name="email" id="email"
                                value="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="phone" class="col-md-12">Phone Number</label>
                            <input class="form-control form-control-line" type="text" name="phone" id="phone"
                                value="">
                        </div>

                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                            </div>



                        <div class="form-group col-md-12 text-center">
                            <input class="btn btn-primary w-50 mx-auto" type="submit" value="Create User">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
