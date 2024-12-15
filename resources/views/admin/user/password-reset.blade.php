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
                <span>User Password Reset</span>
            </h1>

        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card mb-4">
            <div class="card-header">New User Password</div>
            <div class="card-body">

                <form action="{{ route('admin.user.update.password',['id' => $user->id])}}" method="post" id="form">
                    @csrf
                    {{-- <div class="form-group">
                        <label for="old_password">Old Password</label>
                        <input type="password" id="old_password" class="form-control" name="old_password">
                    </div> --}}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="new__password">New Password</label>
                                <input type="password" id="new_password" class="form-control" name="new_password">
                            </div>
                            <div class="col-md-6">'
                                <label for="confirm_password">Confirm New Password</label>
                                <input type="password" id="confirm_password" class="form-control" name="confirm_password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-danger">Go Back</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
