@extends('admin.layouts.blank')
@section('title')
Delete Job
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Delete Job</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card  mb-4 card-header-actions">
        <div class="card-header">
            Confirmation
        </div>
        <div class="card-body">
            <div class="container">
                <div class="col-md-6 m-auto">
                    <h3 class="mb-4">Confirm Your Delete Request</h3>
                    <p>You have requested to delete the Job
                        <br>
                        <b>Job Type Title</b> : {{$job->JobType->title}}
                        <br>
                        <b>Job Description</b> : {{$job->JobType->description}}
                    </p>
                    <form action="{{route('job.job.delete.post',['customer' => $job->id])}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="chksm" value="{{$job->chksm}}" hidden>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree" id="agree" value="true" required>
                            <label for="agree">Yes, Delete This Job</label>
                            <p style="color:red; font-size:12px"><b>NOTE : </b>All Data Related To This Job Will Be Deleted.</p>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <a type="submit" class="btn btn-light" href="{{route('job.job.dash')}}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
