@extends('admin.layouts.blank')

@section('content')
<div class="container-fluid">
    <form action="{{route('admin.area.delete.submit',['area' => $area->id])}}" method="POST">
        @csrf
        <div class="text-center">
            <h3 class="text-centre">Are You Sure to delete this area?</h3>
            <small class="small text-center">Once you delete, cannot be restored.</small>
        </div>
        <input type="hidden" value="{{ $area->id}}" name="adm_id">
        <input type="hidden" value="{{ Hash::make($area->id.'-1234')}}" name="chksm" />
        <div class="col-12 text-center p-5 m-3">
            <button class="btn btn-danger" href="">Yes, Delete</button>
            <a class="btn btn-primary" href="{{route('admin.areas.get')}}">Cancel</a>
        </div>
    </form>
</div>
@endsection
