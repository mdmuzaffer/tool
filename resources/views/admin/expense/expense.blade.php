@extends('admin.layouts.blank')
@php
$exp = Auth::guard('admin')->user();
@endphp
@section('content')
<div class="container-fluid">
    {{-- @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $msg)
        <li>{{$msg}}</li>
    @endforeach
    </ul>
    @endif --}}
    <h3>Create Expense</h3>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <canvas id="chart">

            </canvas>
        </div>
    </div>
    <form action="{{ route('admin.expense.expenseadd')}}" method="POST" onsubmit="return confirm('Are You Sure??')">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="date" class="col-md-12">Date</label>

                <div class="col-md-12">
                    <input class="form-control form-control-line datepicker" type="text" data-provide="datepicker"
                        data-date-format="dd/mm/yyyy" placeholder="Expense Date" value="{{ date('d/m/Y') }}"
                        name="exp_date" required>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="amount" class="col-md-12">Amount</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="amount" pattern="^[0-9]+(\.?[0-9]+)?$" required>
                </div>

            </div>
            <div class="form-group col-md-4">
                <label for="expensehead" class="col-md-12">Expense Head</label>
                <div class="col-md-12">
                    @php
                    $allexpenseHeads = $exp->Expenseheads;
                    @endphp
                    <select name="expense_head_id" id="" class="form-control">

                        <option value="">Select</option>
                        @foreach ($allexpenseHeads as $expns)
                        <option value="{{$expns->id}}">{{$expns->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="description" class="col-md-12">Description</label>
                <div class="col-md-12">
                    <textarea name="description" id="" cols="30" rows="2" class="form-control"></textarea>
                </div>
            </div>

        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary w-25">Submit</button>
        </div>
    </form>
    <div class="row">
        <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                Get Expense Report
            </button>
            <div class="dropdown-menu">

                {{-- <a href="{{route('admin.expense.get',['rep'=>'today'])}}" class="dropdown-item">Today</a><a
                    href="#" class="dropdown-item">Yesterday</a>
                <a href="#" class="dropdown-item">Last 2 days</a>
                <a href="#" class="dropdown-item">Last 7 days</a>
                <a href="#" class="dropdown-item">Last 15 days</a>
                <a href="#" class="dropdown-item">Last 1 month</a> --}}
                @foreach ($repDays as $rK => $repD)
                <a href="{{route('admin.expense.get',['rep'=>$rK])}}" class="dropdown-item">{{$repD}}</a>
                @endforeach
                <a href="#" class="dropdown-item" id="custom_range" onclick="showdiv();">Custom Range</a>
            </div>

        </div>
        <div style="padding-left: 5px;" class=""><a class="btn btn-success"
                href="{{route('admin.expense.expenseheadwise')}}">Get Expense Head Wise Report</a></div>

    </div>
    <div style="padding-top: 10px; display: none;" id="show_form">
        <form action="{{route('admin.expense.get')}}" method="GET">

            <input type="hidden" name="rep" value="custom">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="fromdate" class="col-md-12">From Date</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line datepicker" type="text" name="rep_from"
                            data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder="Payment Date"
                            value="{{date('d/m/Y')}}" required>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="todate" class="col-md-12">To Date</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line datepicker" type="text" name="rep_to"
                            data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder="Payment Date"
                            value="{{date('d/m/Y')}}" required>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="row">
                        <div style="padding-top: 30px;" class="col-md-8">
                            <input type="submit" class="form-control btn btn-success" value="Submit">
                        </div>
                        <div style="padding-top: 30px;" class="col-md-4">
                            <input type="submit" class="form-control btn btn-danger" id="hidebtn" value="Hide"
                                onclick="hidediv();">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div style="padding-top: 10px;" class="table-responsive">

        @if ($rep)
        <h3>Report of {{$repValue}}</h3>

        @php
        $allexpense = $repData;
        @endphp
        @else
        <h3>Last 30 Expenses</h3>
        {{-- `       @dump($u); --}}
        @php
        $allexpense = $u->Expenses()->take(30)->orderBy('exp_date','DESC')->get();
        // $allexpense = App\Expense::take(30)->orderBy('exp_date','DESC')->get();
        @endphp


        @endif

        @php
        $allexpenseHeads = $allexpense->pluck('expense_head_id')->unique()->toArray();
        $expHeads = $u->Expenseheads()->whereIn('id',$allexpenseHeads)->get();
        // dd($expHeads,$allexpenseHeads);
        $ChartData = [];
        foreach ($expHeads as $exHd) {
        $amt = $allexpense->where('expense_head_id','=',$exHd->id)->sum('amount');
        $dt=[
        'Head' => $exHd->title,
        'Amount' => "₹".number_format($amt,2)."/-",
        'AmountUF' => $amt,
        'Legend' => $exHd->title. " (₹".number_format($amt,2)."/-)",
        ];
        array_push($ChartData,$dt);
        }
        // dd($ChartData);
        $amtArrChrt = array_map(function ($r)
        {
        return $r['AmountUF'];
        },$ChartData);
        $lgndArrChrt = array_map(function ($r)
        {
        return $r['Legend'];
        },$ChartData);
        // dd($amtArrChrt,$lgndArrChrt);
        @endphp

        <table class="table table-striped text-center ">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Expense Head</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @if ($allexpense->count() >0)
                @foreach ($allexpense as $expn)
                <tr>
                    <td>{{$expn->exp_date->format('d/m/Y')}}</td>
                    <td>{{$expn->Expense?$expn->Expense->title:""}}</td>
                    <td>{{$expn->description}}</td>
                    <td>₹{{number_format($expn->amount,2)}}/-</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4" class="text-center text-danger"><i class="xxp">Nothing to show here!!!</i></td>
                </tr>
                @endif
            </tbody>
            <tfoot>
                <tr class="text-bold">
                    <td colspan="3" class="text-right"><span>Total</span></td>
                    <td>₹{{number_format($allexpense->sum('amount'),2)}}/-</td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>

<script>
    var expHeadAmt = JSON.parse(`{!!json_encode($amtArrChrt)!!}`);
    var expHeadLgnds = JSON.parse(`{!!json_encode($lgndArrChrt)!!}`);
</script>

<script>
    function showdiv(){
        var show = document.getElementById('show_form');

        if(show.style.display=='none'){
            $(show).show('slow');
        }
        else{
            $(show).hide('slow');
        }
    }

    $(document).ready(function(){

        $('#hidebtn').click(function(){
            $('#show_form').hide('slow');
        });
    });


    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data:expHeadAmt ,
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
                ],
                label: 'Dataset 1'
            }],
            labels: expHeadLgnds
        },
        options: {
            responsive: true,
            pieceLabel: { mode: 'percentage', precision: 2 }
        }
    };

    window.onload = function() {
        var ctx = document.getElementById('chart').getContext('2d');
        window.myPie = new Chart(ctx, config);


    };
</script>
@endsection
