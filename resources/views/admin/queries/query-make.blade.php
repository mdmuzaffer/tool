@extends('admin.layouts.blank')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h4><a href="{{ route('admin.queries.make-one') }}" class="btn btn-secondary"><i
                            class="fa fa-arrow-left"></i> Back</a> Query Make</h4>
                {{--
                <nav class="navbar-expand small">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item m-0"><a class="nav-link"
                                href="{{ route('admin.queries.all',['type' => '']) }}">All</a></li>
                <li class="nav-item m-0"><a class="nav-link"
                        href="{{ route('admin.queries.all',['type' => 'Pending']) }}">Pending</a></li>
                <li class="nav-item m-0"><a class="nav-link"
                        href="{{ route('admin.queries.all',['type' => 'Accepted']) }}">Accepted</a></li>
                <li class="nav-item m-0"><a class="nav-link"
                        href="{{ route('admin.queries.all',['type' => 'Canceled']) }}">Canceled</a></li>
                <li class="nav-item m-0"><a class="nav-link"
                        href="{{ route('admin.queries.all',['type' => 'Rejected']) }}">Rejected</a></li>
                <li class="nav-item m-0"><a class="nav-link"
                        href="{{ route('admin.queries.all',['type' => 'Completed']) }}">Completed</a></li>
                </ul>
                </nav>
                --}}
            </div>

            <div class="card-body">

                <div class="banner-btmg1 mx-2 p-2" data-class="banner-btmg1 col-md-6 col-md-offset-3 x-pad-none-c">
                    @php
                    $u = NULL;
                    @endphp
                    {{-- 'query_id', 'qid', 'consumer_name', 'consumer_phone', 'consumer_email',
                            'consumer_address_1', 'consumer_address_2', 'consumer_address_3', 'consumer_query_description',
                            'service_area', 'service_area_id', 'service', 'service_id', 'user_id', 'status',
                            'rejected_by_provider_count', 'last_provider_rejection_date', 'last_admin_rejection_date' --}}
                    @php
                    $vals=[];
                    if(old('service_id')){
                    $vals['consumer_name'] = old('consumer_name');
                    $vals['consumer_email'] = old('consumer_email');
                    $vals['consumer_phone'] = old('consumer_phone');
                    $vals['consumer_address_1'] = old('consumer_address_1');
                    $vals['consumer_address_2'] = old('consumer_address_2');
                    $vals['consumer_address_3'] = old('consumer_address_3');
                    $vals['consumer_query_description'] = old('consumer_query_description');
                    }elseif (isset($u)) {
                    $vals['consumer_name'] = $u->FullName;
                    $vals['consumer_email'] = $u->email;
                    $vals['consumer_phone'] = $u->phone;
                    if ($u->DefaultAddress) {
                    $vals['consumer_address_1'] =$u->DefaultAddress->address_line_1;
                    $vals['consumer_address_2'] =$u->DefaultAddress->address_line_2;
                    $vals['consumer_address_3'] =$u->DefaultAddress->address_line_3;
                    } else {
                    $vals['consumer_address_1'] = "";
                    $vals['consumer_address_2'] = "";
                    $vals['consumer_address_3'] = "";
                    }

                    $vals['consumer_query_description'] = '';

                    }else{
                    $vals['consumer_name'] = "";
                    $vals['consumer_email'] = "";
                    $vals['consumer_phone'] = "";
                    $vals['consumer_address_1'] = "";
                    $vals['consumer_address_2'] = "";
                    $vals['consumer_address_3'] = "";
                    $vals['consumer_query_description'] = '';


                    }
                    $GLOBALS['vals'] = $vals;
                    function valx($key) // use($vals)
                    {
                    $vals = $GLOBALS['vals'];
                    $value = null;
                    if(isset($key,$vals) && array_key_exists($key,$vals)){
                    $value = $vals[$key];
                    }
                    return $value;
                    }
                    @endphp


                    @if(session('success_msg'))
                    <div class="row">
                        <div class="col-12 center">
                            <h4 class="alert alert-success m-5">{{session('success_msg')}}</h4>
                        </div>
                    </div>
                    @endif

                    <div>
                        {{-- @dump($errors) --}}
                        @if ($errors->any())
                        {{ implode(' ',$errors->all('<div>:message</div>')) }}
                        @endif
                        <hr class="row">
                    </div>
                    <form method="post" onsubmit="return confirm('Are you ready to submit the query?')"
                        action="{{ route('admin.queries.make-one.submit', [ 'areaPage' => $area->url , 'serviceItem' => $serviceItem->url , 'csrfToken' => csrf_token() ]) }}"
                        name="myForm" id="form" class="x-forms">
                        {{ csrf_field() }}
                        {{--
                            <input type="hidden" name="service" value="{{ $serviceItem->service }}" />
                        <input type="hidden" name="service_id" value="{{ $serviceItem->id }}" />
                        <input type="hidden" name="service_area" value="{{ $areaPage->Area->area_name }}" />
                        <input type="hidden" name="service_area_id" value="{{ $areaPage->Area->id }}" />
                        --}}

                        <input type="hidden" name="service" value="{{ $serviceItem->service }}" />
                        <input type="hidden" name="service_id" value="{{ $serviceItem->id }}" />
                        <input type="hidden" name="service_area" value="{{ $area->area_name }}" />
                        <input type="hidden" name="service_area_id" value="{{ $area->id }}" />

                        <!--
                        @isset($u)
                        <input type="hidden" name="user_id" value="{{ $u->id }}" />
                        <input type="hidden" name="user_id_chksm" value="{{ Hash::make($u->id."-123abc") }}" />
                        @endisset
                        -->

                        <div class="row">
                            <div class="form-group col-md-12 required">
                                <label for="consumer_name" class="label">Consumer Name</label>
                                <input type="text" name="consumer_name" id="consumer_name"
                                    value="{{ valx('consumer_name') }}" placeholder="Consumer Name" required=""
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="consumer_email" class="label">Consumer Email</label>
                                <input type="text" name="consumer_email" id="consumer_email"
                                    value="{{ valx('consumer_email') }}" placeholder="Consumer Email"
                                    class="form-control" />
                            </div>
                            <div class="form-group col-md-6 required">
                                <label for="consumer_phone" class="label">Consumer Phone</label>
                                <input type="text" name="consumer_phone" id="consumer_phone"
                                    value="{{ valx('consumer_phone') }}" placeholder="Consumer Phone" required=""
                                    class="form-control" />
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6  ">
                                <label for="fake_service_name" class="label">Service Name</label>
                                <select id="fake_service_name" class="form-control" disabled>
                                    <option selected value="{{ $serviceItem->service }}">{{$serviceItem->service}}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fake_call_charge" class="label">Call Charge (₹)</label>
                                <input type="text" class="form-control" disabled readonly id="fake_call_charge"
                                    value="{{ $priceVisibleCust?$callChargeFormatted:'---------------' }}">
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-6  ">
                                <label for="fake_service_area" class="label">Service Area / City</label>
                                <select id="fake_service_area" class="form-control" disabled>

                                    <option selected value="{{$area->area_name}}">
                                        {{$area->area_name}}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 required">
                                <label for="consumer_address_1" class="label">Address Line 1</label>
                                <input type="text" name="consumer_address_1" id="consumer_address_1"
                                    value="{{ valx('consumer_address_1') }}" placeholder="Address Line 1" required=""
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="consumer_address_2" class="label">Address Line 2</label>
                                <input type="text" name="consumer_address_2" id="consumer_address_2"
                                    value="{{ valx('consumer_address_2') }}" placeholder="Address Line 2"
                                    class="form-control" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="consumer_address_3" class="label">Address Line 3</label>
                                <input type="text" name="consumer_address_3" id="consumer_address_3"
                                    value="{{ valx('consumer_address_3') }}" placeholder="Address Line 3"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 required">
                                <label for="consumer_query_description" class="label">Description</label>
                                <textarea type="text" name="consumer_query_description" id="consumer_query_description"
                                    placeholder="Describe Consumer issue/query." class="form-control" rows="6"
                                    required>{{ valx('consumer_query_description') }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 center">
                                <button type="submit" class="btn btn-success center-block "><b
                                        class="p-2">SUBMIT</b></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_end')

<link rel="stylesheet" type="text/css" href="https://grandetest.com/theme/jobhunt-html/css/style.css" />
<link rel="stylesheet" type="text/css" href="https://grandetest.com/theme/jobhunt-html/css/responsive.css" />
<style>
    .job-is.ft:hover {
        color: #fff;
        background-color: #8b91dd;
    }

    .modal-footer .btn+.btn {
        margin-right: 5px;
    }

    .job-listing {
        float: left;
        width: 100%;
        display: table;
        border-bottom: 1px solid #e8ecec;
        padding: 9px 0;
        background: #ffffff;
        border-left: 2px solid #ffffff;
        padding-right: 10px;
    }

    .job-is {
        margin: 9px 2px;
    }

    .queries_row>.col {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* @media (min-width: 768px) {} */

    @media only screen and (max-width: 768px) {
        .queries_row>.col {
            width: 100% !important;
            display: block;

        }
    }
</style>
@endsection
