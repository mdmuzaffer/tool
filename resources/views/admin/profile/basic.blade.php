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
                <span>Basic Details Change</span>
            </h1>

        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card mb-4">
            <div class="card-header">Basic Details</div>
            <div class="card-body">

                @if(isset($admin))
                {{-- <form class="row no-margin" style=" background-color:#eee;"
    action="{{ route('provider.billing.update',['svcQuery' => $svcQuery->qid, 'billInfo' => 'nah' ]) }}" method="POST"
    id=""> --}}
                <form action="{{ route('admin.profile.update')}}" method="POST" id="BasicInfo"
                    class="collapse show">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="fname" class="col-md-12">First Name</label>
                            <input class="form-control form-control-line" type="text" name="fname" id="fname"
                                value="{{old('admin_id', $admin->first_name)}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lname" class="col-md-12">Last Name</label>
                            <input class="form-control form-control-line" type="text" name="lname" id="lname"
                                value="{{old('admin_id', $admin->last_name)}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="gender" class="col-md-12">Gender </label>
                            <select class="form-control" name="gender" id="gender" value="{{$admin->gender}}">
                                @php
                                $allgender =[
                                'Male' => 'Male',
                                'Female' => 'Female',
                                'Others' => 'Others',
                                ];
                                $gend=old('gender',$admin->gender);
                                @endphp
                                @foreach ($allgender as $gkey => $gvalue)
                                <option value="{{$gkey}}" @if ($gend==$gkey) selected="selected" @endif>
                                    {{$gvalue}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="col-md-12">Email ID</label>
                            <input class="form-control form-control-line" type="text" name="email" id="email"
                                value="{{old('admin_id', $admin->email)}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="phone" class="col-md-12">Phone Number</label>
                            <input class="form-control form-control-line" type="text" name="phone" id="phone"
                                value="{{old('admin_id', $admin->phone)}}">
                        </div>


                        <div class="form-group col-md-12 text-center">
                            <input class="btn btn-primary w-50 mx-auto" type="submit" value="Update Basic Informations">
                        </div>
                    </div>
                </form>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
