@extends('admin.layouts.blank')

@section('content')
{{-- @if (session('success'))
<div class="alert alert-success alert-dismissble fade show">
    <strong>Success!!</strong> {{session('success')}}
    <button class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif --}}

<div class="container-fluid">
    <div class="row d-justify-content-center">
        <div class="col-md-12">
            <p class="text-center h3">All Areas</p>
            @php $allarea = $u->Areas;
            // App\AdminArea::get();
            @endphp

            <div class="card-body">
                <div class="card-header">
                    <a class="btn btn-success" href="{{ route('admin.area.newareas') }}">New Areas</a>
                </div>
                <div class="table-responsive">

                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Action</th>

                                <th>Area Code</th>
                                <th>Area Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($allarea->count() >0)

                            @foreach ($allarea as $area)
                            <tr>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.area.delete',['areaId'=> $area->id])}}">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                        </a>
                                        <a class="dropdown-item"
                                        href="{{route('admin.area.edit',['areaId'=> $area->id])}}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </a>
                                    <a class="dropdown-item" href="{{route('admin.area.customers.get', ['area'=> $area->id])}}">Show Customers</a>
                                    </div>
                                    </div>


                                </td>
                                <td>{{$area -> area_code}}</td>
                                <td>{{$area -> area_name}}</td>

                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
