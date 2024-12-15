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
                <span>Job Catagory Dashboard</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Edit Job Catagories</div>
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
                    @endif
            </div>
            @if($data)
            <div class="container">
                <div class="col-md-6 m-auto">
                <form action="" method="post" id="form">
                    @csrf
                        <div class="form-group">
                            <label for="parent_id">Parent ID</label>
                            <select class="form-control" id="parent_id" name="parent_id">
                                <option value="" @if ($data->parent_id == null) selected @endif>Select</option>
                                @foreach ($parent_ids as $p_id)
                                    <option value="{{$p_id->id}}"
                                        @if ($data->parent_id == $p_id->id) selected @endif
                                        @if ($id == $p_id->id) disabled @endif>
                                        {{$p_id->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{$data->title}}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="2" class="form-control"
                            value="{{$data->description}}">
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="sortorder">Sort Order</label>
                            <input type="Number" name="sortorder" id="sortorder" class="form-control" value="{{$data->sort_order}}">
                        </div>

                        <div class="form-group">
                            <label for="is_enable">Is Enable</label>
                            <select class="form-control" id="is_enable" name="is_enable">
                                <option value="1" @if ($data->is_enabled == true) selected @endif>Yes</option>
                                <option value="0" @if ($data->is_enabled == false) selected @endif>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="publish">Publish To Front</label>
                            <select class="form-control" id="publish" name="publish">>
                                <option value="1" @if ($data->published_to_front == true) selected @endif>Yes</option>
                                <option value="0" @if ($data->published_to_front == false) selected @endif>No</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <button type="button" class="form-control btn btn-primary" id="back">Back</button>
                            </div>
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-3">
                                <button type="submit" class=" form-control btn btn-danger">Update</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>


<script>
    document.getElementById('description').defaultValue = "{{$data->description}}";
    document.getElementById("back").addEventListener('click',  function(){
        window.history.back();
    });
</script>
@endsection
