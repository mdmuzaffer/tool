@extends('admin.layouts.blank');

@section('content')
@php
$adm = Auth::guard('admin')->user();
// $area = Auth::guard('admin')->user();

@endphp


<div class="container-fluid">
    <h3>Assign Areas to Staff</h3>
    <form action="{{ route('admin.staff-area.check.post')}}" method="POST">
        @csrf
        <div class="form-group row">

            <label for="staffselection" class="">Select  A Staff <span style="color: red;" class="mandatoryClass">*</span></label>
            <div class="col-md-8">
                @php
                $allstaffs = $adm->Staffs;
                @endphp
                <select class="form-control" name="admin_staff_id" id="" required="required">
                    <option value="">Select</option>
                    @foreach ($allstaffs as $staf)
                    <option value="{{$staf->id}}"
                        {{-- {{ (collect(old('admin_staff_id'))->contains($staf->id)) ? 'selected':'' }}  --}}
                        @if(isset($Staff) &&
                        $staf->id == $Staff->id)
                        selected="selected"
                        @endif
                        >{{$staf->first_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <input style="margin-left: 30px;" class="btn btn-primary form-control" type="submit"
                value="Get Staff Zones">
        </div>

    </form>

    @isset($Staff)

    <form action="{{route('admin.staff-area.assign.post',['staffId' => $Staff->id])}}" method="POST">
        <div class="form-group">
            @csrf
            <input type="hidden" name="admin_staff_id" value="{{$Staff->id}}">
            <label for="zonelist">Zone List <span style="color: red;" class="mandatoryClass">*</span></label>
            <div class="row">
                {{-- <input class="form-check-input" type="checkbox" > --}}
                {{-- @dump($sAreas) --}}
                @php
                $allareas = $adm->Areas;
                @endphp

                @foreach ($allareas as $k => $ar)
                <span class="col-md-4">
                    <input class="form-check-input" id="ucbfrareas-{{$k}}" type="checkbox" name="area_id[]"
                        @if(in_array($ar->id,$sAreas))
                    checked="checked"
                    @endif
                    value="{{ $ar->id }}"
                    >
                    <label for="ucbfrareas-{{$k}}" class="form-check-label">{{$ar->area_code}}
                        {{$ar->area_name}}</label>
                </span>
                @endforeach

            </div>
            <div class="col-md-12 text-center">
                <input class="btn btn-success w-25" type="submit" value="Save">
            </div>
        </div>
    </form>
    @endisset
</div>

@endsection
