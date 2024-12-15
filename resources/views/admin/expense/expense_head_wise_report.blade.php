@extends('admin.layouts.blank')

@php
$exp = Auth::guard('admin')->user();
@endphp

@section('content')


<div class="container-fluid">
    <h3>Get Expense Head Wise Report</h3>
    <div class="row d-flex justify-content-center">
        <div  class="col-md-6">
            <canvas id="chart">

            </canvas>
        </div>
    </div>

    <a class="btn btn-primary" href="{{route('admin.expense.get')}}">Back</a>
    <form action="{{ route('admin.expense.submit.post') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="selectexpensehead" class="col-md-12 col-md-6">Select Expense Head <span style="color: red;"
                        class="mandatroyClass">*</span></label>
                <div class="col-md-12">
                    @php
                    $allexpenseheds = $exp->Expenseheads;
                    @endphp
                    <select name="expense_head_id" id="" class="form-control">
                        {{-- <option value="">Select</option> --}}
                        @foreach ($allexpenseheds as $ex_hd)
                        <option value="{{$ex_hd->id}}" @if (isset($Expense) && $ex_hd->id==$Expense->id)
                            selected='selected'
                            @endif
                            >{{$ex_hd->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-md-8">
                @isset($repdays)
                <div class="row">
                    @foreach ($repdays as $rkey=>$repval)
                    <div class="form-check py-2 px-4">
                        <label for="radio-{{$rkey}}" class="form-check-label px-4"><input id="radio-{{$rkey}}"
                                type="radio" @if ($rkey==$repname) checked="checked" @endif name="report_name"
                                class="form-check-input" value="{{$rkey}}" onchange="showdiv();">{{$repval}}</label>
                    </div>

                    @endforeach
                </div>
                @endisset

            </div>
        </div>

        <div class="row d-none">
            <div class="form-check py-2">
                <label for="radio1" class="form-check-label px-4"><input id="radio1" name="optradio" type="radio"
                        class="form-check-input">Today</label>
            </div>
            <div class="form-check py-2">
                <label for="radio2" class="form-check-label px-4"><input id="radio2" name="optradio" type="radio"
                        class="form-check-input">Yesterday</label>
            </div>
            <div class="form-check py-2">
                <label for="radio3" class="form-check-label px-4"><input id="radio3" name="optradio" type="radio"
                        class="form-check-input">Last 3 days</label>
            </div>
            <div class="form-check py-2">
                <label for="radio4" class="form-check-label px-4"><input id="radio4" name="optradio" type="radio"
                        class="form-check-input">Last 7 days</label>
            </div>
        </div>
        <div class="row d-none">

            <div class="form-check py-2">
                <label for="radio5" class="form-check-label px-4"><input id="radio5" name="optradio" type="radio"
                        class="form-check-input">Last 15 days</label>
            </div>
            <div class="form-check py-2">
                <label for="radio6" class="form-check-label px-4"><input id="radio6" name="optradio" type="radio"
                        class="form-check-input">Last 30 days</label>
            </div>
            <div class="form-check py-2">
                <label for="radio7" class="form-check-label px-4"><input id="radio7" name="optradio" type="radio"
                        class="form-check-input" onclick="showdiv();">Custom Range</label>
            </div>
        </div>
        <div style="padding-top: 20px; display: none;" id="custom_range">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fromdate" class="col-md-12">From Date</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line datepicker" type="text" data-provide="datepicker"
                            data-date-format="dd/mm/yyyy" name="rep_from" value="{{date('d/m/Y')}}" required>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="todate" class="col-md-12">To Date</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line datepicker" type="text" data-provide="datepicker"
                            data-date-format="dd/mm/yyyy" name="rep_to" value="{{date('d/m/Y')}}" required>
                    </div>
                </div>
                {{-- <div class="form-group col-md-4">
                    <div class="row">
                        <div style="padding-top: 30px;" class="col-md-12">
                            <input type="submit" class="form-control btn btn-success" value="Submit">
                        </div>
                        {{-- <div style="padding-top: 30px;" class="col-md-4">
                            <input type="submit" class="form-control btn btn-danger" id="hidebtn" value="Hide"
                                onclick="hidediv();"> --}}
            </div>
            {{-- </div>  --}}
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary w-25">Get Report</button>
        </div>
    </form>

    @isset($report)
    <div x-style="padding-top: 10px; margin-top: 10px;" class="card my-2 p-3">

        <div class="row">

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

        </div>
    </div>
    <div style="padding-top: 10px;" class="table-responsive">
        @php
        $allexpensehead = $reportdata;
        @endphp
        <h4 class="text-center">Expenses of {{$Expense->title}} {{$reportTitle?" of ".$reportTitle:""}}</h4>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            @if ($allexpensehead->count() >0)
            <tbody>
                @foreach ($allexpensehead as $expse)
                <tr>
                    <td>{{$expse->exp_date->format('d/m/Y')}}</td>
                    <td>{{$expse->description}}</td>
                    <td>₹{{number_format($expse->amount, 2)}}/-</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="text-right">Total</td>
                    <td>
                        ₹{{number_format($allexpensehead->sum('amount'), 2)}}/-
                    </td>
                </tr>
            </tfoot>
            @else

            @endif
        </table>
    </div>
    @endisset



</div>




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

    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    1500.54,
                    1000.40,

                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
                ],
                label: 'Dataset 1'
            }],
            labels: [
                'Expense Head 1 ₹1500.54/-',
                'Expense Head 2 ₹1000.40/-',

            ]
        },
        options: {
            responsive: true,

        }
    };

    window.onload = function() {
        var ctx = document.getElementById('chart').getContext('2d');
        window.myPie = new Chart(ctx, config);


    };
</script>
@endsection
