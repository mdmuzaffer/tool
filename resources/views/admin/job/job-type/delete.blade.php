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
        <div class="card-header">Confirmation</div>
        <div class="card-body">

            <div class="container">
                <div class="col-md-5 m-auto">

                    <h3 class="mb-3">Please Review The Delete Request</h3>

                    <form action="" method="post">
                        @csrf
                        <input type="textbox" value="{{$job_type->Chksm}}" name="chksm" hidden>
                        <div class="form-group">
                            <label for="id">Requested Category ID</label>
                            <input type="text" value="{{$job_type->id}}" name="id" id="id" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Requested Category Title</label>
                            <input type="text" value="{{$job_type->title}}" name="title" id="title" class="form-control" disabled>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox"class="custom-control-input" id="agree" name="agree" required>
                            <label for="agree" class="custom-control-label">Yes, I want to delete.</label>
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>



<script>

</script>
@endsection
