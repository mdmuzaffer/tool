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
                <span>Job Type Dashboard</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Job Types</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    @if($u->hasRole(\App\Role::ADMIN_ROLE_JOB_TITLE_CREATION) || $u->is_superuser)
                    <a type="button" value="Add New Type" class="btn btn-outline-primary shadow-sm" href="{{route('job.type.add')}}">Add New Type</a>
                    @endif
                </div>
            </div>


            <div class="datatable table-responsive">
                @if ($job_types != null)
                {{-- {{$job_types == null}} --}}
                {{-- <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0"> --}}
                <table class="table table-bordered table-hover dataTable mt-3" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Job Categ. ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Sort Order</th>
                            <th>Is_Enabled</th>
                            <th>Pub. To Front</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($job_types as $type)
                            <tr>
                            @php
                                $ie = ($type->is_enabled == 1) ? "true" : "false";
                                $pub = ($type->published_to_front == 1) ? "true" : "false";
                            @endphp

                            <td>{{$type->id}}</td>
                            <td>{{$type->w_job_category_id}}</td>
                            <td>{{$type->title}}</td>
                            <td>{{$type->description}}</td>
                            <td>{{$type->sort_order}}</td>
                            {{-- <td>{{$job->chksm}}</td> --}}
                            <td>{{$ie}}</td>
                            <td>{{$pub}}</td>
                            <td>
                                <div class="row m-auto">
                                    <div class="dropdown">
                                        <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"><i data-feather="more-vertical"></i></button>

                                        <div class="dropdown-menu">

                                            @if($u->hasRole(\App\Role::ADMIN_ROLE_UPDATE_JOB_TITLE) || $u->is_superuser)
                                            <a class="dropdown-item" href="{{route('job.type.edit', [ 'id' => $type->id ])}}" >
                                                <div class="dropdown-item-icon">
                                                    <i data-feather="edit"></i>
                                                </div>
                                                Edit
                                            </a>
                                            @endif
                                            <a class="dropdown-item" href="{{route('admin.job.job-type.employees', [ 'id' => $type->id ])}}" >
                                                <div class="dropdown-item-icon">
                                                    <i data-feather="edit"></i>
                                                </div>
                                                Associates
                                            </a>
                                        </div>
                                    </div>

                                    @if($u->hasRole(\App\Role::ADMIN_ROLE_DELETE_JOB_TITLE) || $u->is_superuser)
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark" href="{{route('job.type.del', ['id' => $type->id ])}}"><i data-feather="trash-2"></i></button>
                                    @endif
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

{{-- <script src="assets/demo/datatables-demo.js"></script> --}}
<style>
    tr, th {
        text-align: center;
    }
</style>
<script>
    function NewJobTypeAdder(){
        document.location.href = "{{route('job.type.add')}}";
    }

    function deleteTR(id){
        window.location.href = `{{route('job.type.del',['id' => ` + id+`])}}`;
    }
</script>
@endsection
