{{-- @extends('customer.layouts.blank-vanilla') --}}
@extends('admin.layouts.blank')
@section('title')
User
@endsection
@section('content')
<style>
    .bootstrap-select > .dropdown-toggle{
        height: 45px;
    }
</style>
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>User Create</span>
            </h1>

        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card mb-4">
            <div class="card-header">Basic Details</div>
            <div class="card-body">

                @if(isset($user))
                {{-- <form class="row no-margin" style=" background-color:#eee;"
    action="{{ route('provider.billing.update',['svcQuery' => $svcQuery->qid, 'billInfo' => 'nah' ]) }}" method="POST"
                id=""> --}}
                <form action="{{ route('admin.update.user',['id' => $user->id])}}" method="POST" id="BasicInfo"
                    class="collapse show">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="fname" class="col-md-12">State</label>
                            <select class="form-control select-date" name="state[]" multiple data-live-search="true" id="state" value="{{$user->state}}">

                                @php
                                $allgender =[
                                '1' => 'Uttar Pradesh',
                                '2' => 'Uttarakhand',
                                '3' => 'Punjab',
                                '4' => 'Haryana',
                                '5' => 'Bihar',
                                '6' => 'Gujarat',
                                '7' => 'Maharashtra',
                                


                                ];
                                $gend=old('state',$user->state);
                                @endphp
                                @if(intval($user->state))
                                    @foreach ($u->service_states as $state)
                                    <option value="{{$state->id}}" @if($gend==$state->id) selected="selected" @endif>
                                        {{$state->name}} ({{$state->code}})
                                    </option>
                                    @endforeach
                                @else
                                    @foreach ($u->service_states as $state)
                                    <option value="{{$state->id}}" @if(in_array($state->id,@json_decode($user->state))) selected="selected" @endif>
                                        {{$state->name}} ({{$state->code}})
                                    </option>
                                    @endforeach
                                @endif
                                {{-- @foreach ($allgender as $gkey => $gvalue)
                                <option value="{{$gkey}}" @if ($gend==$gkey) selected="selected" @endif>
                                {{$gvalue}}
                                </option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fname" class="col-md-12">First Name</label>
                            <input class="form-control form-control-line" type="text" name="fname" id="fname"
                                value="{{old('admin_id', $user->first_name)}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lname" class="col-md-12">Last Name</label>
                            <input class="form-control form-control-line" type="text" name="lname" id="lname"
                                value="{{old('admin_id', $user->last_name)}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="gender" class="col-md-12">Gender </label>
                            <select class="form-control" name="gender" id="gender" value="{{$user->gender}}">
                                @php
                                $allgender =[
                                'Male' => 'Male',
                                'Female' => 'Female',
                                'Others' => 'Others',
                                ];
                                $gend=old('gender',$user->gender);
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
                                value="{{old('admin_id', $user->email)}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="phone" class="col-md-12">Phone Number</label>
                            <input class="form-control form-control-line" type="text" name="phone" id="phone"
                                value="{{old('admin_id', $user->phone)}}">
                        </div>
						<div class="form-group col-md-6">
                            <label for="phone" class="col-md-12">Password</label>
                            <input class="form-control form-control-line" type="text"
                                value="{{old('admin_id', $user->pwd)}}">
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
