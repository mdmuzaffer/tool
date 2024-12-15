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
                <span>Job Category Dashboard</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Categories</div>
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
                </div>
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
                    @if($u->hasRole(\App\Role::ADMIN_ROLE_NEW_JOB_CATEGORY_CREATION) || $u->is_superuser)
                    <input type="button" value="Add New Catagory" class="btn btn-outline-primary shadow-sm"
                        onclick="NewCatAdder()">
                    @endif
                </div>
            </div>
            <div class="datatable table-responsive">
                @if ($job_cat != null)
                {{-- <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0"> --}}
                <table class="table table-bordered table-hover dataTable mt-3" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <tr>
                            {{-- <th>ID</th> --}}
                            <th>Parent Cat</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Sort Order</th>
                            <th>Is Enabled</th>
                            <th>Pub. To Front</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($job_cat as $job)
                            <tr id="{{$job->id}}">
                            @php
                                $ie = ($job->is_enabled == 1) ? "Enabled" : "Disabled";
                                $pub = ($job->published_to_front == 1) ? "Published" : "Not published";
                            @endphp

                            {{-- <td>{{$job->id}}</td> --}}
                            <td>{{$job->Parent?$job->Parent->title:"N/A"}}</td>
                            <td>{{$job->title}}</td>
                            <td>{{$job->description}}</td>
                            <td>{{$job->sort_order}}</td>
                            {{-- <td>{{$job->chksm}}</td> --}}
                            <td>{{$ie}}</td>
                            <td>{{$pub}}</td>
                            <td>
                                <div class="row m-auto">
                                    <div class="dropdown">
                                        <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"><i data-feather="more-vertical"></i></button>

                                        <div class="dropdown-menu">
                                             @if($u->hasRole(\App\Role::ADMIN_ROLE_EDIT_JOB_CATEGORY) || $u->is_superuser)
                                            <a class="dropdown-item" href="{{route('job.cat.edit',['id'=>$job->id])}}" >
                                                <div class="dropdown-item-icon">
                                                    <i data-feather="edit"></i>
                                                </div>
                                                Edit
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                    @if($u->hasRole(\App\Role::ADMIN_ROLE_DELETE_JOB_CATEGORY) || $u->is_superuser)
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark" data-onclick="deleteTR(this)" href="{{route('job.cat.del',['id'=>$job->id])}}"><i data-feather="trash-2"></i></a>
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
    function NewCatAdder(){
        document.location.href = "{{route('job.cat.add')}}";
    }

    function deleteTR(elm){
        window.location.href = elm.dataset.proceedUrl
    }
</script>
@endsection
