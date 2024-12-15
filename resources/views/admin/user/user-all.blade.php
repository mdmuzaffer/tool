{{-- @extends('customer.layouts.blank-vanilla') --}}
@extends('admin.layouts.blank')
@section('title')
User
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>User All</span>
            </h1>

        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card mb-4">
            <div class="card-header">
                <form method="get" class="row w-100" action="{{ route('admin.user.all') }}">

                    <div class="col-md-4" style="float: left">
                        <label class="text-white">Search</label>
                        <input type="text" name="search" value="{{ Request()->search }}" class="form-control">
                    </div>

                    <div class="col-md-1 mt-md-4" style="float: left;">
                        <input type="submit" value="Search" class="btn btn-primary">
                    </div>
                    <div class="col-md-1 mt-md-4" style="float: left;">
                        <a href="{{ route('admin.user.all') }}" class="btn btn-dark" style="width;110%">Clear</a>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="datatable table-responsive">
                    @if ($user != null)
                    {{-- <table class="table table-bordered table-hover DataTable" id="dataTable" width="100%" cellspacing="0"> --}}
                    <table class="table table-bordered table-hover  mt-3" id="DataTable" width="100%"
                        cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>State</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Email ID</th>
                                {{-- <th>Is Email Verified</th> --}}
                                <th>Password</th>
                                <th>Is Active</th>
                                {{-- <th>Have DP</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($user as $usr)
                            <tr id="{{$usr->id}}">
                                @php
                                $ia = ($usr->is_active == 1) ? "Active" : "Not Activated";
                                $ev = ($usr->email_verified_at == 1) ? "Verified" : "Not Verified";
                                $dp = ($usr->dp == null) ? 'False' : 'True';
                                @endphp

                                {{-- <td>{{$job->id}}</td> --}}
                                @php
                                    $state = array("1"=>"Uttar Pradesh", "2"=>"Uttarakhand","3" => "Punjab","4" => "Haryana","5" => "Bihar","6" => "Gujarat","7" => "Maharashtra","8"=>"JHARKHAND","9"=>"Himachal Pradesh","10"=>'Karnatka',"11"=>'Rajsthan','12'=>'Madhya Pradesh','13'=>'Tamil Nadu','14'=>'Andhra Perdesh');
                                @endphp
                                <td>@if (($usr->state)!='')
                                   @if(intval($usr->state))
                                    {{$state[$usr->state]}}
                                   @else
                                    <?php $stateArray = @json_decode(@$usr->state);
                                    if(count($stateArray) >0){
                                        foreach ($stateArray as $key=>$val){
                                           echo $state[$val].', ';
                                        }
                                    }
                                    ?>
                                   @endif

                                @endif </td>
                                <td>{{$usr->FullName}}</td>
                                <td>{{$usr->gender}}</td>
                                <td>{{$usr->email}}</td>
                                {{-- <td>{{$ev}}</td> --}}
                                <td>{{$usr->pwd}}</td>
                                <td>{{$ia}}</td>
                                {{-- <td>{{$dp}}</td> --}}
                                <td>
                                    <div class="row m-auto">
                                        <div class="dropup">
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                    data-feather="more-vertical"></i></button>

                                            <div class="dropdown-menu">

                                                <a class="dropdown-item"
                                                    href="{{route('admin.user.update',['id' => $usr->id ])}}">
                                                    <div class="dropdown-item-icon">
                                                        <i data-feather="edit"></i>
                                                    </div>
                                                    Edit Basic
                                                </a>
                                                <a class="dropdown-item"
                                                    href="{{route('admin.user.update.password',['id' => $usr->id ])}}">
                                                    <div class="dropdown-item-icon">
                                                        <i data-feather="edit"></i>
                                                    </div>
                                                    Reset Password
                                                </a>

                                                <form onsubmit="return confirm('Are you sure you want to delete this user?')" action="{{ route('admin.user.delet.post',['id' => $usr->id])}}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">
                                                        <div class="dropdown-item-icon">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </div>
                                                        Delete
                                                    </button>
                                                </form>
                                                @if ($usr->is_active)

                                                <form action="{{ route('admin.user.deactive.post',['id' => $usr->id])}}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">
                                                        <div class="dropdown-item-icon">
                                                            <i data-feather="lock"></i>
                                                        </div>
                                                        Deactive This ID
                                                    </button>
                                                </form>
                                                @else

                                                <form action="{{ route('admin.user.active.post',['id' => $usr->id])}}"
                                                    method="POST">
                                                    @csrf
                                                    <button class="dropdown-item">
                                                        <div class="dropdown-item-icon">
                                                            <i data-feather="unlock"></i>
                                                        </div>
                                                        Active This ID
                                                    </button>
                                                </form>
                                                @endif






                                            </div>
                                        </div>
                                        {{-- <a class="btn btn-datatable btn-icon btn-transparent-dark" data-onclick="deleteTR(this)" href="{{route('job.cat.del',['id'=>$manager->id])}}"><i
                                            data-feather="trash-2"></i></a> --}}
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{ $user->links('vendor.pagination.admin') }}
                    @endif
                </div>


            </div>
        </div>
    </div>
</div>

@endsection
