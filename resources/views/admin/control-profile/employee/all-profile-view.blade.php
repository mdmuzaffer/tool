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
                <span>Associate Profiles</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Associate Profiles</div>
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
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
            </div>

            <div class="container">
                <div class="row  mb-3">
                    @if($u->hasRole(\App\Role::ADMIN_ROLE_STAFF_CREATION) || $u->is_superuser)
                    <a type="button" class="btn btn-outline-primary"
                    href="{{route('admin.create.employee.profile')}}">Add New Associate</a>
                    @endif
                </div>
                <div class="datatable table-responsive">
                    @if ($employees != null)
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
                            @foreach ($employees as $employee)
                                <tr id="{{$employee->id}}">
                                @php
                                    $ia = ($employee->is_active == 1) ? "Active" : "Not Activated";
                                    $ev = ($employee->email_verified_at == 1) ? "Verified" : "Not Verified";
                                    $dp = ($employee->dp == null) ? 'False' : 'True';
                                @endphp

                                {{-- <td>{{$job->id}}</td> --}}
                                <td>{{$employee->FullName}}</td>
                                <td>{{$employee->gender}}</td>
                                <td>{{$employee->email}}</td>
                                {{-- <td>{{$ev}}</td> --}}
                                <td>{{$employee->phone}}</td>
                                <td>{{$ia}}</td>
                                {{-- <td>{{$dp}}</td> --}}
                                <td>
                                    <div class="row m-auto">
                                        <div class="dropdown-x dropup">
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2" data-toggle="dropdown" data-boundary="window"
                                            aria-haspopup="true" aria-expanded="false"><i data-feather="more-vertical"></i></button>

                                            <div class="dropdown-menu">
                                                @if($u->hasRole(\App\Role::ADMIN_ROLE_STAFF_DATA_UPDATE) || $u->is_superuser)
                                                <a class="dropdown-item" href="{{route('admin.employee.edit.basic',[ 'id' => $employee->id])}}" >
                                                    <div class="dropdown-item-icon">
                                                        <i data-feather="edit"></i>
                                                    </div>
                                                    Edit Basic
                                                </a>
                                                <a class="dropdown-item" href="{{route('admin.employee.job-types',[ 'id' => $employee->id])}}" >
                                                    <div class="dropdown-item-icon">
                                                        <i data-feather="edit"></i>
                                                    </div>
                                                    Job Types
                                                </a>
                                                <a class="dropdown-item" href="{{route('admin.employee.edit.password',[ 'id' => $employee->id])}}" >
                                                    <div class="dropdown-item-icon">
                                                        <i data-feather="edit"></i>
                                                    </div>
                                                    Reset Password
                                                </a>
                                                @endif
                                                @if($u->hasRole(\App\Role::ADMIN_ROLE_ENABLE_DISABLE_STAFF) || $u->is_superuser)
                                                @if($ia =="Active")
                                                    <form action="{{route('admin.employee.deactive.post',[ 'id' => $employee->id])}}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item">
                                                            <div class="dropdown-item-icon">
                                                                <i data-feather="lock"></i>
                                                            </div>
                                                            Deactive This ID
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{route('admin.employee.active.post',[ 'id' => $employee->id])}}" method="POST">
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

                                                @if ($employee->getRoleUrl($u))
                                                    <a class="dropdown-item" href="{{$employee->getRoleUrl($u)}}">
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
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
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
