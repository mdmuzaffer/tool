@extends('admin.layouts.blank')

@php
$st = Auth::guard('admin')->user();
@endphp

@section('content')


<div class="container-fluid">
    <a class="btn btn-primary" href="{{route('admin.comission.get')}}">Back</a>
    <form action="{{route('admin.comission.submit.post')}}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="selectstaff" class="col-md-12 col-md-6">Select Staff <span style="color: red;"
                        class="mandatroyClass">*</span></label>
                <div class="col-md-12">
                    @php
                    $allstaffs = $st->Staffs;
                    @endphp
                    <select name="admin_staff_id" id="" class="form-control">
                        <option value="">Select</option>
                        @foreach ($allstaffs as $staf)
                        <option value="{{$staf->id}}" @if(isset($Staff) && $staf->id == $Staff->id)
                            selected="selected"
                            @endif>{{$staf->full_name}} [{{$staf->phone}}]</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-md-8">
                @isset($repDays)
                <div class="row">
                    @foreach ($repDays as $repKey => $repName)

                    <div class="form-check py-2 col-md-4">
                        <label for="radio-{{$repKey}}" class="form-check-label px-4"><input id="radio-{{$repKey}}"
                            @if ($repKey == $reportName)
                                checked="checked"
                            @endif
                                name="report_name" type="radio" class="form-check-input" value="{{$repKey}}"
                                onchange="showdiv()">{{$repName}}</label>
                    </div>
                    @endforeach
                </div>
                @endisset
                <div class="row- d-none">
                    <div class="form-check py-2 col-md-3">
                        <label for="radio0" class="form-check-label px-4"><input id="radio0" name="report_name"
                                type="radio" class="form-check-input" value="all">All</label>
                    </div>
                    <div class="form-check py-2">
                        <label for="radio1" class="form-check-label px-4"><input id="radio1" name="report_name"
                                type="radio" class="form-check-input">Today</label>
                    </div>
                    <div class="form-check py-2">
                        <label for="radio2" class="form-check-label px-4"><input id="radio2" name="report_name"
                                type="radio" class="form-check-input">Yesterday</label>
                    </div>
                    <div class="form-check py-2">
                        <label for="radio3" class="form-check-label px-4"><input id="radio3" name="report_name"
                                type="radio" class="form-check-input">Last 3 days</label>
                    </div>
                    <div class="form-check py-2">
                        <label for="radio4" class="form-check-label px-4"><input id="radio4" name="report_name"
                                type="radio" class="form-check-input">Last 7 days</label>
                    </div>
                </div>
                <div class="row- d-none">

                    <div class="form-check py-2">
                        <label for="radio5" class="form-check-label px-4"><input id="radio5" name="report_name"
                                type="radio" class="form-check-input">Last 15 days</label>
                    </div>
                    <div class="form-check py-2">
                        <label for="radio6" class="form-check-label px-4"><input id="radio6" name="report_name"
                                type="radio" class="form-check-input">Last 30 days</label>
                    </div>
                    <div class="form-check py-2">
                        <label for="radio7" class="form-check-label px-4"><input id="radio7" name="report_name"
                                type="radio" class="form-check-input" onclick="showdiv();">Custom Range</label>
                    </div>
                </div>
            </div>
        </div>

        <div style="padding-top: 20px; display: none;" id="custom_range">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="fromdate" class="col-md-12">From Date</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line datepicker" type="text" data-provide="datepicker"
                            data-date-format="dd/mm/yyyy" name="rep_from" value="{{date('d/m/Y')}}" required>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="todate" class="col-md-12">To Date</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line datepicker" type="text" data-provide="datepicker"
                            data-date-format="dd/mm/yyyy" name="rep_to" value="{{date('d/m/Y')}}" required>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <div class="row">
                        <div style="padding-top: 30px;" class="col-md-12">
                            <input type="submit" class="form-control btn btn-success" value="Submit">
                        </div>
                        {{-- <div style="padding-top: 30px;" class="col-md-4">
                        <input type="submit" class="form-control btn btn-danger" id="hidebtn" value="Hide"
                            onclick="hidediv();"> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary w-25">Get Report</button>
        </div>
    </form>
    {{-- <div class="form-row"> --}}




    {{-- </div> --}}

{{-- </div> --}}

{{-- <div style="padding-top: 10px;" class="table-responsive">
        <table class="table table-striped text-center">
            <thead>
                <th>Date</th>
                <th>Amount</th>
                <th>Description</th>
            </thead>
        </table>
    </div>
</div> --}}

@isset($report)

<div x-style="padding-top: 10px; margin-top: 10px;" class="card my-2 p-3">
    {{-- @dump($u) --}}
    <div class="row">
        @php
        $allamount = $u;
        @endphp
        @foreach ($statusData as $sts)

        <div class="col-lg-3">
            <div class="card m-b-5">
                <div class="card-body">
                    <div class="d-flex no-block">
                        <div class="m-r-20 align-self-center">
                            <span class="lstick m-r-20"></span>
                            <i class="fa fa-rupee-sign"></i>
                        </div>
                        <div class="align-self-center">
                            <h6 class="text-muted m-t-10 m-b-0">{{$sts['Title']}}</h6>
                            <h2 id="custStock" class="m-t-0">{{$sts['Total']}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        {{-- <div class="col-lg-3">
            <div class="card m-b-5">
                <div class="card-body">
                    <div class="d-flex no-block">
                        <div class="m-r-20 align-self-center">
                            <span class="lstick m-r-20"></span>
                            <i class="fa fa-rupee-sign"></i>
                        </div>
                        <div class="align-self-center">
                            <h6 class="text-muted m-t-10 m-b-0">Total</h6>
                            <h2 id="custStock" class="m-t-0">₹{{number_format(0, 2)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card m-b-5">
                <div class="card-body">
                    <div class="d-flex no-block">
                        <div class="m-r-20 align-self-center">
                            <span class="lstick m-r-20"></span>
                            <i class="fa fa-rupee-sign"></i>
                        </div>
                        <div class="align-self-center">
                            <h6 class="text-muted m-t-10 m-b-0">{{$statusData['m0']['Title']}}</h6>
                            <h2 id="custStock" class="m-t-0">{{$statusData['m0']['Total']}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card m-b-5">
                <div class="card-body">
                    <div class="d-flex no-block">
                        <div class="m-r-20 align-self-center">
                            <span class="lstick m-r-20"></span>
                            <i class="fa fa-rupee-sign"></i>
                        </div>
                        <div class="align-self-center">
                            <h6 class="text-muted m-t-10 m-b-0">Due</h6>
                            <h2 id="custStock" class="m-t-0">₹0.00</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card m-b-5">
                <div class="card-body">
                    <div class="d-flex no-block">
                        <div class="m-r-20 align-self-center">
                            <span class="lstick m-r-20"></span>
                            <i class="fa fa-rupee-sign"></i>
                        </div>
                        <div class="align-self-center">
                            <h6 class="text-muted m-t-10 m-b-0">Stock</h6>
                            <h2 id="custStock" class="m-t-0">₹0.00</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>

<div style="padding-top: 10px;" class="table-responsive">

    {{-- <h3>Report of {{$reportName}}</h3> --}}



    @php
        // $allcomission = $Staff->Comissions;
        $allcomission = $reportData;
        // dd($reportData);
@endphp
        <h4 class="text-center">Comissions of {{$Staff->full_name}} {{$reportTitle?" of ".$reportTitle:""}}</h4>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
            @if ($allcomission->count() >0)
                <tbody>
                        @foreach ($allcomission as $comm)
                        <tr>
                            <td>{{$comm->exp_date->format('d/m/Y')}}</td>
                            <td>{{$comm->description}}</td>
                            <td>₹{{number_format($comm->amount, 2)}}/-</td>
                        </tr>
                        @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="text-right">Total</td>
                        <td>
                            ₹{{number_format($allcomission->sum('amount'),2)}}/-
                        </td>
                    </tr>
                </tfoot>
            @else
                <tr>
                    <td colspan="4" class="text-center text-danger"><i class="dsd">Nothing to show here!!</i></td>
                </tr>
            @endif
    </table>
</div>

</div>
@endisset
<script>
    function showdiv(){
        var isCustom = $('[name="report_name"]:radio:checked').val()=="custom";

            var show = document.getElementById('custom_range');
            if (isCustom) {
                $(show).show('slow');
            } else {
                $(show).hide('slow');
            }
        }
    // $(document).ready(function(){
    //     $('#radio7').click(function(){
    //         $('#custom_range').hide('slow');
    //     });
    // });
</script>
@endsection
