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
                <span>Admin Profiles</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Admin Profiles</div>
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
        <div class="row mb-3">
            @if($u->hasRole(\App\Role::ADMIN_ROLE_STAFF_CREATION) || $u->is_superuser)
            <button type="button" class="btn btn-outline-primary"
                onclick="window.location.href = '/admin/create/admin/profile'">Add A New Profile</button>
            @endif
        </div>
        <div class="datatable table-responsive">
            @if ($admins != null)
            {{-- <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0"> --}}
            <table class="table table-bordered table-hover DataTable mt-3" id="DataTable" width="100%" cellspacing="0"
                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                <thead>
                    <tr>
                        {{-- <th>ID</th> --}}
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Email ID</th>
                        {{-- <th>Is Email Verified</th> --}}
                        <th>Phone</th>
                        <th>Is Active</th>
                        <th>Is Super-User</th>
                        {{-- <th>Have DP</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($admins as $admin)
                    <tr id="{{$admin->id}}">
                        @php
                        $ia = ($admin->is_active == 1) ? "Active" : "Not Activated";
                        $ev = ($admin->email_verified_at == 1) ? "Verified" : "Not Verified";
                        $dp = ($admin->dp == null) ? 'False' : 'True';
                        $su = ($admin->su == 0) ? 'False' : 'True';
                        @endphp

                        {{-- <td>{{$job->id}}</td> --}}
                        <td>{{$admin->FullName}}</td>
                        <td>{{$admin->gender}}</td>
                        <td>{{$admin->email}}</td>
                        {{-- <td>{{$ev}}</td> --}}
                        <td>{{$admin->phone}}</td>
                        <td>{{$ia}}</td>
                        <td>{{$su}}</td>
                        {{-- <td>{{$dp}}</td> --}}
                        <td>
                            <div class="row m-auto">
                                <div class="dropup">
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                            data-feather="more-vertical"></i></button>

                                    <div class="dropdown-menu">
                                        @if($u->hasRole(\App\Role::ADMIN_ROLE_STAFF_DATA_UPDATE) || $u->is_superuser)
                                        <a class="dropdown-item" href="/admin/admin/{{$admin->id}}/edit/basic">
                                            <div class="dropdown-item-icon">
                                                <i data-feather="edit"></i>
                                            </div>
                                            Edit Basic
                                        </a>
                                        <a class="dropdown-item" href="/admin/admin/{{$admin->id}}/edit/password">
                                            <div class="dropdown-item-icon">
                                                <i data-feather="edit"></i>
                                            </div>
                                            Reset Password
                                        </a>
                                        @endif
                                        @if($u->hasRole(\App\Role::ADMIN_ROLE_ENABLE_DISABLE_STAFF) || $u->is_superuser)
                                        @if($ia =="Active")
                                        <form action="/admin/admin/{{$admin->id}}/deactive" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <div class="dropdown-item-icon">
                                                    <i data-feather="lock"></i>
                                                </div>
                                                Deactive This ID
                                            </button>
                                        </form>
                                        @else
                                        <form action="/admin/admin/{{$admin->id}}/active" method="POST">
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
                                        @if(!$admin->su)
                                            <form action="/admin/admin/{{$admin->id}}/superuser" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item">
                                                    <div class="dropdown-item-icon">
                                                        <i data-feather="lock"></i>
                                                    </div>
                                                    Promote Supersuser
                                                </button>
                                            </form>
                                            @if ($admin->getRoleUrl($u))
                                                <a class="dropdown-item" href="{{$admin->getRoleUrl($u)}}">
                                                    <div class="dropdown-item-icon">
                                                        <i data-feather="edit"></i>
                                                    </div>
                                                    Roles
                                                </a>
                                            @endif
                                        @else
                                        <form action="/admin/admin/{{$admin->id}}/not-superuser" method="POST">
                                            @csrf
                                            <button class="dropdown-item">
                                                <div class="dropdown-item-icon">
                                                    <i data-feather="unlock"></i>
                                                </div>
                                                Undo Superuser
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                                {{-- <a class="btn btn-datatable btn-icon btn-transparent-dark" data-onclick="deleteTR(this)" href="{{route('job.cat.del',['id'=>$manager->id])}}"><i
                                    data-feather="trash-2"></i></a> --}}
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



@endsection

@push('scripts')
{{-- <script>
    document.getElementById("Back").addEventListener('click',  function(){
        window.history.back();
    });
    document.getElementById("SubmitForm").addEventListener('click',  function(){
        document.getElementById("form").submit();
    });
</script> --}}

@endpush
