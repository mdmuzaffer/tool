{{-- @extends('customer.layouts.blank-vanilla') --}}
@extends('admin.layouts.blank')
@section('title')
Dashboard
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Reset Password </span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Admin Reset Password</div>
        <div class="card-body">

            {{-- errors or success display  --}}
            {{-- <div class="container">
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    @endif
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                       {{session('success')}}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    @endif
            </div> --}}

            <div class="container">
                <div class="col-md-6 m-auto">
                    <form action="" method="post" id="form">
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
                                <div class="col-md-6">
                                    <label for="confirm_password">Confirm New Password</label>
                                    <input type="password" id="confirm_password" class="form-control" name="confirm_password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-danger" onclick="goHome()">Go Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
function goHome(){
     window.location.href = "{{route('admin.admin.all')}}";
 }
</script>
@endsection
