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


<div class="container-fluid">
    <div class=" d-justify-content-center">
        <form action="{{route('admin.auth.check.post')}}" method="post" class="row">
            @csrf
            <div class="form-group col-md-4">
                <label for="">Select A Login</label>
                <div class="col-12">
                    <select name="userx" id="" class="form-control">
                        @foreach ($userTypes as $uType => $users)
                        @if ($users->count() > 0)
                        <optgroup label="{{$uType}}" title="{{$uType}}">
                            @foreach ($users as $uid => $user)
                                <option value="{{$uid}}">{{$user->full_name}} ({{$user->email}})</option>
                            @endforeach
                        </optgroup>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-md-4 pt-4">
                <button type="submit" class="btn btn-primary">Check Authorizations</button>
            </div>
        </form>
    </div>
</div>


@endsection
