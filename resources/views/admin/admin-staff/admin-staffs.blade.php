@extends('admin.layouts.blank')

@section('content')
{{-- @if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!!</strong> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif --}}
{{-- @dump($u) --}}
<div class="container-fluid">
    <div class="row d-justify-content-center">
        <div class="col-md-12">
            <p class="text-center h3">All Staffs</p>
            @php $alladm = $u->Staffs;
            // App\AdminStaff::get();
            @endphp

            <div class="card-body">
                <div class="card-header">
                    <a class="btn btn-success" href="{{ route('admin.admin-staff.newadminstaffs') }}">New Staffs</a>
                </div>
                <div class="table-responsive">

                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Action</th>

                                <th>Name</th>
                                <th>Email </th>
                                <th>Gender</th>

                                <th>User Type</th>
                                <th>Phone</th>
                                {{-- <td>Password</td> --}}
                                <th>Is Active</th>
                                {{-- <td>Admin Id</td> --}}
                                <th>Date of birth</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($alladm->count() >0)

                            @foreach ($alladm as $admn)
                            <tr>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                           Action
                                          </button>
                                          <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('admin.admin-staff.delete',['adminstaffId'=> $admn->id])}}"><i class="fa fa-trash-o"
                                                aria-hidden="true"></i>Delete</a>
                                        <a class="dropdown-item" href="{{route('admin.admin-staff.edit',['adminstaffId'=> $admn->id])}}"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i>Edit</a>
                                                <a class="dropdown-item" href="{{route('admin.admin-staff.reset-pass', ['adminstaffId'=>$admn->id])}}"><i
                                                    class="fa fa-key" aria-hidden="true"></i>Reset Password</a>
                                                    <a class="dropdown-item" href="{{route('admin.admin-staff.customers.get', ['adminstaff'=>$admn->id])}}">Staff Wise Customers</a>
                                          </div>
                                    </div>
                                    {{-- <a class="btn btn-danger" href=""><i class="fa fa-trash-o"
                                            aria-hidden="true"></i></a> --}}
                                    {{-- <a class="btn btn-success"
                                        href="{{route('admin.admin-staff.edit',['adminstaffId'=> $admn->id])}}"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a> --}}

                                </td>
                                <td>{{$admn->full_name}}</td>
                                <td>{{$admn->email}}</td>
                                <td>{{$admn->gender}}</td>
                                <td>{{$admn->user_type}}</td>
                                <td>{{$admn->phone}}</td>
                                {{-- <td>{{$admn->password}}</td> --}}
                                <td>{{$admn->is_active?'Active': 'Inactive'}}</td>
                                {{-- <td>{{$admn->admin_id}}</td> --}}
                                <td>{{$admn->dob}}</td>

                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
