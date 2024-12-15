{{-- @extends('customer.layouts.blank-vanilla') --}}
@extends('admin.layouts.blank')
@section('title')
Notices
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Notices</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Notices</div>
        <div class="card-body">

            {{-- errors or success display  --}}
            <div class="container">
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
                    </div>
                    @endif
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <a type="button" class="btn btn-outline-primary shadow-sm" href="{{ route('admin.notices.add') }}" > <i class="fas fa-plus"></i> Add Notice</a>
                    </div>
                </div>


                <div class="datatable table-responsive">
                    @if ($notices != null)
                    {{-- {{$job_types == null}} --}}
                    {{-- <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0"> --}}
                    <table class="table table-bordered table-hover dataTable mt-3" id="dataTable" width="100%"
                        cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>NO</th>
                                <th>Title</th>
                                <th>Upload Date</th>
                                <th>Targets</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($notices as $notice)
                            <tr>

                                <td>{{$notice->slno_gen}}</td>
                                <td>{{$notice->title}}</td>
                                <td>{{$notice->created_at->format('d/m/Y')}}</td>
                                <td>{{$notice->for_user_types_text}}</td>
                                <td>{{$notice->status_text}}</td>
                                <td>
                                    {{-- <div class="row m-auto">
                                        <div class="dropdown">
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                    data-feather="more-vertical"></i></button>

                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{route('job.type.edit', [ 'id' => $type->id ])}}">
                                                    <div class="dropdown-item-icon">
                                                        <i data-feather="edit"></i>
                                                    </div>
                                                    Edit
                                                </a>
                                                <a class="dropdown-item"
                                                    href="{{route('admin.job.job-type.employees', [ 'id' => $type->id ])}}">
                                                    <div class="dropdown-item-icon">
                                                        <i data-feather="edit"></i>
                                                    </div>
                                                    Associates
                                                </a>
                                            </div>
                                        </div>
                                        <button class="btn btn-datatable btn-icon btn-transparent-dark"
                                            onclick="deleteTR({{$type->id}})"><i data-feather="trash-2"></i></button>
                                    </div> --}}

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

    {{-- <script src="assets/demo/datatables-demo.js"></script> --}}
    <style>
        tr,
        th {
            text-align: center;
        }
    </style>
    <script>
        function NewJobTypeAdder(){
        document.location.href = "{{route('job.type.add')}}";
    }

    function deleteTR(id){
        window.location.href = "/admin/job/types/" + id + "/delete";
    }
    </script>
    @endsection
