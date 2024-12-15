@extends('admin.layouts.blank')

@section('content')

<div class="container-fluid">
    <h1 class="h3">Dashboard</h1>
    {{-- @dump($repData['q']); --}}
    <div class="dropdwon">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            {{$repTitle}}
        </button>
        <div class="dropdown-menu">
            {{-- <a class="dropdown-item" href="#">Today</a>
            <a class="dropdown-item" href="#">Yesterday</a>
            <a class="dropdown-item" href="#">Last 2 days</a>
            <a class="dropdown-item" href="#">Last 7 days</a>
            <a class="dropdown-item" href="#">Last 15 days</a>
            <a class="dropdown-item" href="#">Last 30 days</a> --}}

            @foreach ($repDays as $rK => $repD)
            <a href="{{route('admin.dashboard',['rep'=>$rK])}}" class="dropdown-item">{{$repD}}</a>
            @endforeach
        </div>
    </div>




    {{-- @isset($Customer) --}}
    <div class="card my-2 p-3">
        <div class="row d-flex justify-content-center">

            {{-- @foreach ($statusData as $sts) --}}
            <div class="col-lg-3 ">
                <a class="card m-b-5 bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex no-block">
                            <div class="m-r-20 align-self-center">
                                <span class="lstick m-r-20"></span>
                                <i class="fa fa-rupee-sign"></i>
                            </div>
                            <div class="align-self-center">
                                <h6 class="m-t-10 m-b-0">Recharge Total</h6>
                                <h2 id="custStock" class="m-t-0">₹{{number_format($repData['ct'], 2)}}/-</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            {{-- @endisset --}}
            {{-- @endforeach --}}
            <div class="col-lg-3">
                <a class="card m-b-5 bg-success text-white" href="{{route('admin.payments.date-wise.get')}}">
                    <div class="card-body">
                        <div class="d-flex no-block">
                            <div class="m-r-20 align-self-center">
                                <span class="lstick m-r-20"></span>
                                <i class="fa fa-rupee-sign"></i>
                            </div>
                            <div class="align-self-center">
                                <h6 class="m-t-10 m-b-0">Total Paid</h6>
                                <h2 id="custStock" class="m-t-0">₹{{number_format($repData['pt'], 2)}}/-</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3">
                <a class="card m-b-5 bg-danger text-white" href="{{route('admin.customer.due-customers.get')}}">
                    <div class="card-body">
                        <div class="d-flex no-block">
                            <div class="m-r-20 align-self-center">
                                <span class="lstick m-r-20"></span>
                                <i class="fa fa-rupee-sign"></i>
                            </div>
                            <div class="align-self-center">
                                <h6 class="m-t-10 m-b-0 ">Due</h6>
                                <h2 id="custStock" class="m-t-0">₹{{number_format($repData['dt'], 2)}}</h2>
                            </div>
                            <span class="pull-right small"><small class="small">** Total Due</small></span>
                        </div>
                    </div>
                </a>
            </div>
            {{--

            <div class="col-lg-3">
                <div class="card m-b-5 bg-warning text-white">
                    <div class="card-body">
                        <div class="d-flex no-block">
                            <div class="m-r-20 align-self-center">
                                <span class="lstick m-r-20"></span>
                                <i class="fa fa-rupee-sign"></i>
                            </div>
                            <div class="align-self-center">
                                <h6 class="m-t-10 m-b-0">Stock</h6>
                                <h2 id="custStock" class="m-t-0">₹0.00/-</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="row">


        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Payments</h6>


                </div>
                {{-- <div class="dropdwon py-2 px-2">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                       Today
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Today</a>
                        <a class="dropdown-item" href="#">Yesterday</a>
                        <a class="dropdown-item" href="#">Last 2 days</a>
                        <a class="dropdown-item" href="#">Last 7 days</a>
                        <a class="dropdown-item" href="#">Last 15 days</a>
                        <a class="dropdown-item" href="#">Last 30 days</a>
                        {{-- @foreach ($repDays as $rK => $repD)
                        <a href="{{route('admin.dashboard',['rep'=>$rK])}}" class="dropdown-item">{{$repD}}</a>
                @endforeach --}}
                {{-- </div> --}}
                {{-- </div>  --}}
                <div class="card-body">
                    {{-- @php
                        // $allpymmodes = $u->Paymentmodes;
                        // $pymamount = $u->Payments;
                        // $amt = $pymamount->sum('amount');
                        $pymmd =
                    @endphp --}}
                    {{-- @dump($pymamount) --}}
                    {{-- @dump($repData['pym']->modes) --}}
                    {{-- @foreach ($repData['pym']->modes as $py_md) --}}
                    @foreach ($repData['pym']->modes as $py_md)
                    {{-- <h4 class="small font-weight-bold" value='{{$py_md->id}}'
                    >{{$py_md->name}}({{($repData['pym'])}})<span class="float-right"></span></h4> --}}

                    <h4 class="small font-weight-bold">{{$py_md->title}} ( ₹{{number_format($py_md->Total, 2)}}/- )<span
                            class="float-right">{{number_format($py_md->perc, 2)}}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{$py_md->perc}}%"
                            aria-valuenow="{{$py_md->perc}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    @endforeach


                    {{-- <h4 class="small font-weight-bold">Cash Payment(₹2000)<span class="float-right">40%</span></h4>
                    <div class="progress mb-4">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">NEFT(₹300)<span class="float-right">10%</span></h4>
                    <div class="progress mb-4">
                      <div class="progress-bar bg-primary" role="progressbar" style="width: 10%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Bank(₹150)<span class="float-right">3%</span></h4>
                    <div class="progress mb-4">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 3%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> --}}

                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Expenses</h6>


                </div>
                {{-- <div class="dropdwon py-2 px-2">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        Today
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Today</a>
                        <a class="dropdown-item" href="#">Yesterday</a>
                        <a class="dropdown-item" href="#">Last 2 days</a>
                        <a class="dropdown-item" href="#">Last 7 days</a>
                        <a class="dropdown-item" href="#">Last 15 days</a>
                        <a class="dropdown-item" href="#">Last 30 days</a>
                    </div>
                </div> --}}
                <div class="card-body">

                    @foreach ($repData['exp']->modes as $exp_dt)
                    {{-- <h4 class="small font-weight-bold" value='{{$py_md->id}}'
                    >{{$py_md->name}}({{($repData['pym'])}})<span class="float-right"></span></h4> --}}

                    <h4 class="small font-weight-bold">{{$exp_dt->title}} ( ₹{{number_format($exp_dt->Total, 2)}}/-
                        )<span class="float-right">{{number_format($exp_dt->perc, 2)}}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{$exp_dt->perc}}%"
                            aria-valuenow="{{$exp_dt->perc}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    @endforeach

                    {{-- <h4 class="small font-weight-bold">Staff Commission(₹2500)<span class="float-right">40%</span></h4>
                    <div class="progress mb-4">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Miscellaneous(₹1000)<span class="float-right">10%</span></h4>
                    <div class="progress mb-4">
                      <div class="progress-bar bg-primary" role="progressbar" style="width: 10%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Office Expenses(₹500)<span class="float-right">3%</span></h4>
                    <div class="progress mb-4">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 3%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
    @endsection
