@extends('admin.layouts.blank')

@section('content')

<div class="container-fluid">
    {{-- @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $msg)
        <li>{{$msg}}</li>
    @endforeach
    </ul>
    @endif --}}
    @if(isset($area))
    <h3>Update Area</h3>
    <a class="btn btn-primary" href="{{route('admin.areas.get')}}">Back</a>
    <form action="{{ route('admin.area.edit',['areaId' => $areaId]) }}" method="POST">
        @csrf
        {{-- <div style="float: right;" class="col-md-6"> --}}
        <div class="form-group">
            <label for="areaid">Area Code <span style="color: red;" class="mandatoryClass">*</span></label>
            <input class="form-control" type="text" name="area_code" value="{{old('area_code', $area->area_code)}}">
        </div>
        <div class="form-group">
            <label for="areaname">Area Name </label>
            <input class="form-control" type="text" name="area_name" placeholder="Enter Area Name..."
                value="{{old('area_name', $area->area_name)}}">
        </div>
        <div>
            <input style="float: right;" class="btn btn-success" type="submit" value="Update">
        </div>
        {{-- </div> --}}


        {{-- <div>
            <input class="btn btn-success" type="submit" value="Add">
        </div>
        </div> --}}
        {{-- </div> --}}
    </form>
    @else
    <p class="alert alert-danger text-center">
        Please input valid data
    </p>
    @endif
</div>

@endsection
