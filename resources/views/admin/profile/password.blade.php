{{-- @extends('customer.layouts.blank-vanilla') --}}
@extends('admin.layouts.blank')
@section('title')
User
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Change Password</span>
            </h1>

        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card mb-4">
            <div class="card-header">Password</div>
            <div class="card-body">
                @if(isset($admin))
                <form action="{{ route('admin.password.update')}}" method="POST"
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
</div>

@endsection
