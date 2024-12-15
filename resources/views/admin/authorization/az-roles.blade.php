@extends('admin.layouts.blank')

@section('content')
{{-- @if (session('success'))
<div class="alert alert-success alert-dismissible fade show">
    <strong>Success!!</strong> {{session('success')}}
<button type="button" class="close" data-dismiss="alert" aria-level="close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif --}}

<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Change Authorizations</span>
            </h1>
            <div class="page-header-subtitle">{{$user->full_name}} [<span class="small">{{$typeText}}</span> @if($user->su), <span class="small text-bold">**SuperUser**</span> @endif]</div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class=" d-justify-content-center">
        <form action="{{route('admin.auth.user.role.save',['type' => $type, 'id' => $user->id ])}}" method="post" class="row">
            @csrf
            <div class="col-md-12">
                {{-- <span class="h2 p-2 m-2">{{$user->full_name}} <span class="small">{{$type}}</span></span> --}}
            </div>
            <div class="col-md-12 pl-5">
                <h3>Choose Roles</h3>
                <div class="row">
                    @foreach ($allRoles as $role)
                    @php
                    $uid = 'cbd-'.Str::uuid();
                    @endphp
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox ">
                            <input class="custom-control-input" id="{{$uid}}" type="checkbox"
                            @if(in_array($role->id, $synced_role_ids)) checked="checked" @endif value="{{$role->id}}"
                            @if ($user->su) disabled="disabled" @else  name="ur[]" @endif
                            />
                            <label class="custom-control-label" for="{{$uid}}">{{$role->name}}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group col-md-4 pt-4">
                <button type="submit" class="btn btn-primary"   @if ($user->su) disabled="disabled" @endif>Save Authorizations</button>
            </div>
        </form>
    </div>
</div>


@endsection
