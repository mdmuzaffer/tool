@extends('admin.payment.payment')

@section('tab-content')
<div id="" class=" tab-pane fade"><br>

</div>
<div id="" class=" tab-pane fade"><br>

</div>
<div id="" class=" tab-pane fade"><br>

</div>
<div id="log" class=" tab-pane active p-2">
    <h3>Customer A/c Logs</h3>

    <div class="dropdown">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            Get Expense Report
        </button>
        <div class="dropdown-menu">

            @foreach ($repDays as $rK => $repD)
            <a href="{{route('admin.payment.ac-log.get',['rep'=>$rK, 'Customer'=>$Customer->id])}}"
                class="dropdown-item">{{$repD}}</a>
            @endforeach
            <a href="javascript:void(0)" id="custom_range" class="dropdown-item" onclick="showdiv();">Custom Range</a>
        </div>
    </div>

    <div class="d-none py-2" style="" id="show_form">
        <form action="{{ route('admin.payment.ac-log.get', ['Customer'=>$Customer->id]) }}" method="GET">

            <input type="hidden" name="rep" value="custom">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="fromdate" class="col-md-12">From Date</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line datepicker" type="text" name="rep_from"
                            data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder=""
                            value="{{date('d/m/Y')}}" required>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="todate" class="col-md-12">To Date</label>
                    <div class="col-md-12">
                        <input class="form-control form-control-line datepicker" type="text" name="rep_to"
                            data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder=""
                            value="{{date('d/m/Y')}}" required>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="row">
                        <div style="padding-top: 30px;" class="col-md-8">
                            <input type="submit" class="form-control btn btn-success" value="Submit">
                        </div>
                        <div style="padding-top: 30px;" class="col-md-4">
                            <input type="button" class="form-control btn btn-danger" id="hidebtn" value="Hide"
                                onclick="hidediv();">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="table-responsive py-2">
        @if ($rep)
        <h3>Report of {{$repValue}}</h3>

        @php
        $allaclogs = $repData;

        @endphp
        @else
        <h3>Last 30 Customer Account Logs</h3>

        @php
        $allaclogs = $Customer->AccountLogs()
        ->orderBy('date_of_action', 'DESC')
        ->orderBy('id','DESC')
        ->take(50)->get();
        // dd($allaclogs);
        @endphp
        @endif
        <table class="table table-striped text-center table-fit-to-content">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Event Type</th>
                    <th>Event Name</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Total Consumed</th>
                    <th>Total Paid</th>
                    <th>Due</th>
                    <th>Advance</th>

                </tr>
            </thead>
            <tbody>


                @if ($allaclogs->count() > 0)
                @foreach ($allaclogs as $ac_log)
                <tr class="@if($ac_log->ty =='+') bg-success-light @else bg-danger-light @endif">
                    <td>{{$ac_log->date_of_action?$ac_log->date_of_action->format('d/m/Y'):""}}</td>
                    <td>{{$ac_log->ty}}</td>
                    <td>{{$ac_log->related_event_term}}</td>
                    <td>{{$ac_log->related_event}}</td>
                    <td>{{$ac_log->description}}</td>
                    <td>{{$ac_log->amount}}</td>
                    <td>{{$ac_log->pym_total}}</td>
                    <td>{{$ac_log->pym_paid}}</td>
                    <td>{{$ac_log->pym_due}}</td>
                    <td>{{$ac_log->pym_stock}}</td>


                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="10" class="text-center text-danger"><i>Nothing to show here</i></td>
                </tr>
                @endif
            </tbody>


        </table>
    </div>

    <br>

</div>

<script>
    function showdiv(){
        var show = document.getElementById('show_form');

        $(show).toggleClass('d-none');
        // if(show.style.display=='none'){
        //     $(show).show('slow');
        //     // show.style.display='block';
        // }
        // else{
        //     $(show).hide('slow');
        // }
    }

    function  hidediv(){
        var show = document.getElementById('show_form');

        $(show).addClass('d-none');
    }

    // $(document).ready(function(){

    //     $('#hidebtn').click(function(){
    //         $('#show_form').hide('slow');
    //     });
    // });
</script>
@endsection
