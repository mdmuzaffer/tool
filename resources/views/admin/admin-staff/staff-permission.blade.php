@extends('admin.layouts.blank')

@section('content')
<div class="container-fluid">
    <div class="row d-justify-content-center">
        {{-- <div class="col-md-4">
            <p class="text-center h3">All Areas</p>
        </div> --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Staff Permission [ {{ $s->full_name() }} ]</div>
                @php
                // var_dump($s,$perms);
                @endphp
                {{-- <pre>{{ json_encode($allProviders, JSON_PRETTY_PRINT) }}</pre> --}}
                {{-- @dump($allProviders) --}}

                <div class="card-body">

                    <form method="POST"
                        action="{{ route('admin.staff-admin.permissions.submit',['staff' =>  $s->id ]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <label for="" class="col-md-4 col-form-label text-md-right">Permission For Staff</label>

                            <div class="col-md-8">

                                <div class="form-group ">
                                    <input type="checkbox" name="query_taker" id="query_taker" value="1"
                                        @if($perms['query']) checked="checked" @endif>
                                    <label for="query_taker"
                                        class="col-form-label text-md-right">{{ __('Permission To Take Query') }}</label>
                                </div>

                                <div class="form-group ">
                                    <input type="checkbox" name="wallet_transfer" id="wallet_transfer" value="1"
                                        @if($perms['wallet']) checked="checked" @endif>
                                    <label for="wallet_transfer"
                                        class="col-form-label text-md-right">{{ __('Permission To Wallet Transfer') }}</label>
                                </div>
                            </div>
                        </div>
                        <hr class="row">

                        <div class="row">
                            <label for="" class="col-md-4 col-form-label text-md-right">Areas/Districts</label>

                            <div class="col-md-8">

                                <div class="form-group col-12 text-center">
                                    <input type="checkbox" id="select-all-area-cb">
                                    <label for="select-all-area-cb" class="col-form-label text-md-right">Select All
                                        Areas/Districts</label>
                                </div>
                                <div class="row">
                                    @php
                                    // dump($s->Areas);
                                    $myAreas = $s->Areas->pluck('id')->toArray();
                                    $areas = App\Area::GetDistricts()->get();

                                    @endphp
                                    @foreach ($areas as $ar)

                                    <div class="form-group col-md-4 ">
                                        <input type="checkbox" name="staff_areas[]" id="staff_area_{{ $ar->id }}"
                                            value="{{ $ar->id }}" class="itmcb areaitmcb"
                                            @if(in_array($ar->id,$myAreas)) checked="checked" @endif>
                                        <label for="staff_area_{{ $ar->id }}"
                                            class="col-form-label text-md-right">{{ $ar->area_name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr class="row">

                        <div class="row">
                            <label for="" class="col-md-4 col-form-label text-md-right">Services</label>

                            <div class="col-md-8">

                                <div class="form-group col-12 text-center">
                                    <input type="checkbox" id="select-all-service-cb">
                                    <label for="select-all-service-cb" class="col-form-label text-md-right">Select All
                                        Services</label>
                                </div>
                                <div class="row">
                                    @php
                                    // dump($s->Areas);
                                    $myServices = $s->Services->pluck('id')->toArray();
                                    $services = App\ServiceItem::all();

                                    @endphp
                                    @foreach ($services as $srv)

                                    <div class="form-group col-md-4 ">
                                        <input type="checkbox" name="staff_services[]" id="staff_service_{{ $srv->id }}"
                                            value="{{ $srv->id }}" class="itmcb svcitmcb"
                                            @if(in_array($srv->id,$myServices)) checked="checked" @endif>
                                        <label for="staff_service_{{ $srv->id }}"
                                            class="col-form-label text-md-right">{{ $srv->service }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr class="row">

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <style>
            .imageholder .profile-img-blk {
                width: 100%;
                height: 200px;
                margin-top: 10px;
                margin-bottom: 20px;
                border-radius: 1%;
                border: 5px solid #eee;
                overflow: hidden;
                position: relative;
            }
        </style>

    </div>

    <script>
        $(document).ready(function () {
            //itmcb areaitmcb
            //itmcb svcitmcb
            $('#select-all-area-cb').change(function() {
                $('.itmcb.areaitmcb').prop('checked',$(this).prop('checked'));
            });
            $('#select-all-service-cb').change(function() {
                $('.itmcb.svcitmcb').prop('checked',$(this).prop('checked'));
            });
            $('.itmcb.areaitmcb').change(function(){
                var chkdall = ($('.itmcb.areaitmcb').length == $('.itmcb.areaitmcb:checked').length);
                $('#select-all-area-cb').prop('checked',chkdall);
            }).first().change();
            $('.itmcb.svcitmcb').change(function(){
                var chkdall = ($('.itmcb.svcitmcb').length == $('.itmcb.svcitmcb:checked').length);
                $('#select-all-service-cb').prop('checked',chkdall);
            }).first().change();
    });
    </script>
    <script></script>
</div>
@endsection
