@extends('admin.layouts.blank')

@section('content')
<div class="container-fluid">
    <h4>Queries</h4>
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <nav class="navbar-expand small">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item m-0"><a class="nav-link" href="{{ route('admin.queries.all',['type' => '']) }}">All</a></li>
                        <li class="nav-item m-0"><a class="nav-link" href="{{ route('admin.queries.all',['type' => 'Pending']) }}">Pending</a></li>
                        <li class="nav-item m-0"><a class="nav-link" href="{{ route('admin.queries.all',['type' => 'Accepted']) }}">Accepted</a></li>
                        <li class="nav-item m-0"><a class="nav-link" href="{{ route('admin.queries.all',['type' => 'Canceled']) }}">Canceled</a></li>
                        <li class="nav-item m-0"><a class="nav-link" href="{{ route('admin.queries.all',['type' => 'Rejected']) }}">Rejected</a></li>
                        <li class="nav-item m-0"><a class="nav-link" href="{{ route('admin.queries.all',['type' => 'Completed']) }}">Completed</a></li>
                    </ul>
                </nav>
            </div>

            <div class="card-body">
                @php
                // $reqests = App\ServiceQuery::paginate();
                $reqests = $queries;
                @endphp
                <div class="col-12 ">
                    @foreach ($reqests as $req)
                    @php
                    $jobID = "JB".uniqid();
                    $modalID = "MODAL_".$jobID;
                    $ProceedFormID = "ProceedForm_".$jobID;
                    $modalID = "DateTime_MODAL_".$jobID;
                    $confirm_cancel_modalID = "Cancel_MODAL_".$jobID;
                    $confirm_complete_modalID = "cmplt_MODAL_".$jobID;
                    $moredetail_modalID = "more_details_MODAL_".$jobID;
                    $ProceedFormID = "ProceedForm_".$jobID;
                    $DTPckrID = "datetimepicker_".$jobID;
                    @endphp
                    <div class="row queries_row">
                        <div class="col ">
                            <div class="c-logo">
                                <img src="/th/pub/asset/img/5bbc3519d674c.png" width="75px" height="75px" alt="" />
                            </div>
                        </div>
                        <div class="col">
                            <h3>{{$req->service}}</h3>
                            <span>{{ $req->PriceWithTaxFormatted() }}</span>
                            <span class="mx-2 ">{{$req->service_area}}</span>
                        </div>
                        <div class="col">
                            <span class="p-2 badge badge-success">{{$req->status}}</span>
                        </div>
                        <div class="col">
                            <span class="small d-block">Current Provider:</span>
                            {{$req->CurrentProvider? $req->CurrentProvider->full_name():"N/A"}}
                            @if ($req->rejected_by_provider_count > 0)
                            <p class="small m-0 my-1">
                                <span>Cancel count: {{ $req->rejected_by_provider_count }}</span>
                            </p>
                            @endif
                        </div>
                        <div class="col">
                            <div class="align-items-center d-flex flex-column">
                                <a class="btn btn-outline-success btn-sm m-1" href="javascript:void(0);"
                                    data-toggle="modal" data-target="#{{$moredetail_modalID}}">Details</a>
                                <a class="btn btn-outline-danger btn-sm m-1" href="javascript:void(0);"
                                    data-toggle="modal" data-target="#{{$modalID}}">REJECT</a>
                            </div>
                        </div>
                        <!-- Job -->
                        <!-- Modal -->
                        <div class="modal " id="{{$modalID}}" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Confirmation !!</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="center">Are you sure to reject?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form
                                            action="{{ route('provider.ucrequest.view.post',[ 'csrfToken' => csrf_token(), 'svcQuery' => $req->qid ]) }}"
                                            method="post" id="{{ $ProceedFormID }}">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Proceed</button>
                                            <div class="hidden">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="qid" value="{{ $req->qid }}" />
                                                <input type="hidden" name="chksm"
                                                    value="{{ Hash::make($req->qid."-abcdef") }}" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal End-->

                        <!-- Modal More Details -->
                        <div class="modal" id="{{$moredetail_modalID}}">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{$req->qid}} - {{$req->service}}</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <div>
                                            <legend>Consumer Details</legend>
                                            <table class="table ">
                                                <tbody>
                                                    <tr>
                                                        <td>Name</td>
                                                        <td>{{$req->consumer_name}}</td>

                                                        <td>Phone</td>
                                                        <td>{{$req->consumer_phone}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>{{$req->consumer_email}}</td>

                                                        <td>Area</td>
                                                        <td>{{$req->service_area}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td colspan="3">
                                                            <p>{{$req->consumer_address_1}}</p>
                                                            <p>{{$req->consumer_address_2}}</p>
                                                            <p>{{$req->consumer_address_3}}</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div>
                                            <legend>Service Details</legend>
                                            <table class="table ">
                                                <tbody>
                                                    <tr>
                                                        <td>Service</td>
                                                        <td>{{$req->service}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Call Charge (Deducted From Wallet)</td>
                                                        <td>{{$req->PriceWithTaxFormatted()}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Service Description</td>
                                                        <td>{!! $req->consumer_query_description !!}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        @if ($req->CurrentProvider != null)
                                        <div>
                                            <legend>Current Provider</legend>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>Provider</td>
                                                        <td>{{ $req->CurrentProvider->full_name() }}</td>
                                                        <td>Phone</td>
                                                        <td>{{ $req->CurrentProvider->phone }}</td>
                                                        <td>Email</td>
                                                        <td>{{ $req->CurrentProvider->email }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        @endif
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Modal More Details End-->

                    </div>
                    <hr>
                    @endforeach
                </div>














                {{-- nljknlk     --}}

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
