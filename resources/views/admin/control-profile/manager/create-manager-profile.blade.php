@extends('admin.layouts.blank')
@section('title')
Create Profile
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Create Manager Profile</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Create Manager Profile</div>
        <div class="card-body">

            {{-- error display  --}}
            <div class="container">
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <li> {{$error}} </li>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        @endforeach
                    </div>
                    @endif
            </div>

            <div class="container">
                <div class="col-md-8 m-auto">
                    <form action="" method="post" id="form">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname">First Name</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="lname">Last Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="fname" id="fname">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="lname" id="lname">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email">Email ID</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="phone">Phone Number</label>
                                    <input type="phone" name="phone" id="phone" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="button" id="Back" class="form-control btn btn-danger" value="Back">
                    </div>
                </div>
                <div class="col-md-7"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="button" id="SubmitForm" class="form-control btn btn-primary" value="Add" value="Add">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script>
    document.getElementById("Back").addEventListener('click',  function(){
        window.history.back();
    });
    document.getElementById("SubmitForm").addEventListener('click',  function(){
        document.getElementById("form").submit();
    });
</script>
@endsection
