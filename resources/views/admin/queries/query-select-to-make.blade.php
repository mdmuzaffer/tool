@extends('admin.layouts.blank')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h4>Select Area and Service To Make A Query</h4>
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

                <div class="banner-btmg1 mx-3 p-5" data-class="banner-btmg1 col-md-6 col-md-offset-3 x-pad-none-c">
                    @php
                    $u = NULL;
                    @endphp

                    @php
                    $States = App\Area::where([ 'area_category' => 'State' ])->orderBy('area_name','ASC')->get();

                    DB::enableQueryLog();
                    // $areaPages = App\AreaWisePage::with('Area')->get();
                    $AllServices = App\ServiceItem::where([
                    'enabled' => 1
                    ])->get();
                    $q = DB::getQueryLog();
                    // dump($q);
                    // dump($AllServices);
                    @endphp
                    {{-- 'query_id', 'qid', 'consumer_name', 'consumer_phone', 'consumer_email',
                            'consumer_address_1', 'consumer_address_2', 'consumer_address_3', 'consumer_query_description',
                            'service_area', 'service_area_id', 'service', 'service_id', 'user_id', 'status',
                            'rejected_by_provider_count', 'last_provider_rejection_date', 'last_admin_rejection_date' --}}


                    <div>
                        {{-- @dump($errors) --}}
                        @if ($errors->any())
                        {{ implode(' ',$errors->all('<div>:message</div>')) }}
                        @endif
                        <hr class="row">
                    </div>
                    <form method="post"
                        action="{{ route('admin.queries.make-one.post', [ 'csrfToken' => csrf_token() ]) }}"
                        name="myForm" id="form" class="x-forms">
                        {{ csrf_field() }}
                        {{--
                            <input type="hidden" name="service" value="{{ $serviceItem->service }}" />
                        <input type="hidden" name="service_id" value="{{ $serviceItem->id }}" />
                        <input type="hidden" name="service_area" value="{{ $areaPage->Area->area_name }}" />
                        <input type="hidden" name="service_area_id" value="{{ $areaPage->Area->id }}" />
                        --}}

                        <div class="row">
                            <div class="form-group col-md-6  ">
                                <label for="svc_area" class="label">Service Area/District</label>
                                <select id="svc_area" name="svc_area" required class="form-control">

                                    <option value="">Select an Area/ District</option>
                                    @foreach ($States as $State)
                                    <optgroup title="{{$State->area_name}}" label="{{$State->area_name}}">
                                        @foreach ($State->ChildAreas as $Tcity)
                                        @foreach ($Tcity->ChildAreas as $dist)

                                        <option value="{{$dist->id}}" data-area-name="{{$dist->area_name}}">
                                            {{$dist->area_name}}
                                        </option>
                                        @endforeach
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6  ">
                                <label for="svc_item" class="label">Service Name</label>
                                <select id="svc_item" name="svc_item"  required class="form-control">
                                    <option value="">Select a Service</option>
                                    @foreach ($AllServices as $svc)
                                    <option value="{{ $svc->id }}" data-value="{{$svc->url}}">{{$svc->service}}</option>
                                    @endforeach

                                </select>
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
