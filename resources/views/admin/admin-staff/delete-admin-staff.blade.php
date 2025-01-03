@extends('admin.layouts.blank')

@section('content')
{{-- @if ($errors->any())
<ul class="alert alert-danger">
    @foreach ($errors->all() as $msg)
    <li>{{$msg}}</li>
    @endforeach
</ul>
@endif --}}
<div class="container-fluid">
    <form action="{{route('admin.admin-staff.delete.submit',['xadminstaff' => $adminstaff->id])}}" method="POST">
        @csrf
        <div class="text-center">
            <h3 class="text-center">Are You Sure to delete this admin staff?</h3>
            <small class="small text-center">Once you delete, cannot be restored.</small>

        </div>
        <input type="hidden" value="{{ $adminstaff->id}}" name="stff_id">
        <input type="hidden" value="{{ Hash::make($adminstaff->id.'-1234')}}" name="chksm" />
        <div class="col-12 text-center p-5 m-3">
            <button class="btn btn-danger" href="">Yes, Delete</button>
            <a class="btn btn-primary" href="{{route('admin.admin-staff.get')}}">Cancel</a>
        </div>
    </form>
</div>

@endsection
