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
                <span>Front-Desk Profiles</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Front-Desk Profiles</div>
        <div class="card-body">

            {{-- error display  --}}
            {{-- <div class="container">
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
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
            </div> --}}

            <div class="container">
                <div class="row  mb-3">
                    @if($u->hasRole(\App\Role::ADMIN_ROLE_STAFF_CREATION) || $u->is_superuser)
                    <button type="button" class="btn btn-outline-primary"
                    onclick="window.location.href = '/admin/create/frontdesk/profile'">Add A New Profile</button>
                    @endif
                </div>
                <div class="datatable table-responsive">
                    @if ($frontdesks != null)
                    {{-- <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0"> --}}
                    <table class="table table-bordered table-hover DataTable mt-3" id="DataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Email ID</th>
                                {{-- <th>Is Email Verified</th> --}}
                                <th>Phone</th>
                                <th>Is Active</th>
                                {{-- <th>Have DP</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($frontdesks as $frontdesk)
                                <tr id="{{$frontdesk->id}}">
                                @php
                                    $ia = ($frontdesk->is_active == 1) ? "Active" : "Not Activated";
                                    $ev = ($frontdesk->email_verified_at == 1) ? "Verified" : "Not Verified";
                                    $dp = ($frontdesk->dp == null) ? 'False' : 'True';
                                @endphp

                                {{-- <td>{{$job->id}}</td> --}}
                                <td>{{$frontdesk->FullName}}</td>
                                <td>{{$frontdesk->gender}}</td>
                                <td>{{$frontdesk->email}}</td>
                                {{-- <td>{{$ev}}</td> --}}
                                <td>{{$frontdesk->phone}}</td>
                                <td>{{$ia}}</td>
                                {{-- <td>{{$dp}}</td> --}}
                                <td>
                                    <div class="row m-auto">
                                        <div class="row m-auto">
                                            <div class="dropdown">
                                                <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"><i data-feather="more-vertical"></i></button>

                                                <div class="dropdown-menu">
                                                    @if($u->hasRole(\App\Role::ADMIN_ROLE_STAFF_DATA_UPDATE) || $u->is_superuser)
                                                    <a class="dropdown-item" href="/admin/frontdesk/{{$frontdesk->id}}/edit/basic" >
                                                        <div class="dropdown-item-icon">
                                                            <i data-feather="edit"></i>
                                                        </div>
                                                        Edit Basic
                                                    </a>
                                                    <a class="dropdown-item" href="/admin/frontdesk/{{$frontdesk->id}}/edit/password" >
                                                        <div class="dropdown-item-icon">
                                                            <i data-feather="edit"></i>
                                                        </div>
                                                        Reset Password
                                                    </a>
                                                    @endif
                                                    @if($u->hasRole(\App\Role::ADMIN_ROLE_ENABLE_DISABLE_STAFF) || $u->is_superuser)
                                                    @if($ia =="Active")
                                                        <form action="/admin/frontdesk/{{$frontdesk->id}}/deactive" method="POST">
                                                            @csrf
                                                            <button type="submit" class="dropdown-item">
                                                                <div class="dropdown-item-icon">
                                                                    <i data-feather="lock"></i>
                                                                </div>
                                                                Deactive This ID
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="/admin/frontdesk/{{$frontdesk->id}}/active" method="POST">
                                                            @csrf
                                                            <button class="dropdown-item">
                                                                <div class="dropdown-item-icon">
                                                                    <i data-feather="unlock"></i>
                                                                </div>
                                                                Active This ID
                                                            </button>
                                                        </form>
                                                    @endif
                                                    @endif

                                                    @if ($frontdesk->getRoleUrl($u))
                                                        <a class="dropdown-item" href="{{$frontdesk->getRoleUrl($u)}}">
                                                            <div class="dropdown-item-icon">
                                                                <i data-feather="edit"></i>
                                                            </div>
                                                            Roles
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                            {{-- <a class="btn btn-datatable btn-icon btn-transparent-dark" data-onclick="deleteTR(this)" href="{{route('job.cat.del',['id'=>$manager->id])}}"><i data-feather="trash-2"></i></a> --}}
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
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
