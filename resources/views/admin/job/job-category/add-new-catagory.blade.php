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
        <div class="card-header">Add A New Catagory</div>
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
                <div class="col-md-6 m-auto">
                <form action="{{route('job.cat.add.post')}}" method="post" id="form">
                    @csrf
                        <div class="form-group">
                            <label for="parent_id">Parent ID</label>
                            <select class="form-control" id="parent_id" name="parent_id">
                                <option value="">Select</option>
                                @foreach ($cat_id as $cat)
                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="2" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="sortorder">Sort Order</label>
                            <input type="Number" name="sortorder" id="sortorder" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="is_enable">Is Enable</label>
                            <select class="form-control" id="is_enable" name="is_enable">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="publish">Publish To Front</label>
                            <select class="form-control" id="publish" name="publish">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
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
