@extends('admin.layouts.blank')
@php
$com = Auth::guard('admin')->user();
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
    <h3>Create Comission</h3>

    <form action="{{ route('admin.comission.comissionadd')}}" method="POST" onsubmit="return confirm('Are You Sure??')">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="date" class="col-md-12">Date</label>

                <div class="col-md-12">
                    <input class="form-control form-control-line datepicker" type="text" data-provide="datepicker"
                        data-date-format="yyyy/mm/dd" placeholder="Comission Date" value="{{date('Y/m/d')}}"
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
                <label for="expensehead" class="col-md-12">Staff</label>
                <div class="col-md-12">
                    @php
                    $allstaffs = $com->Staffs;
                    @endphp
                    <select name="admin_staff_id" id="" class="form-control">

                        <option value="">Select</option>
                        @foreach ($allstaffs as $staf)
                        <option value="{{$staf->id}}">{{$staf->first_name}}</option>
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
                Get Comission Report
            </button>
            <div class="dropdown-menu">
                {{-- <a href="#" class="dropdown-item">Today</a>
                <a href="#" class="dropdown-item">Yesterday</a>
                <a href="#" class="dropdown-item">Last 2 days</a>
                <a href="#" class="dropdown-item">Last 7 days</a>
                <a href="#" class="dropdown-item">Last 15 days</a>
                <a href="#" class="dropdown-item">Last 1 month</a> --}}
                @foreach ($repdays as $rkey => $rval)
                <a href="{{route('admin.comission.get',['rep'=>$rkey])}}" class="dropdown-item">{{$rval}}</a>
                @endforeach

                <a href="#" class="dropdown-item" id="custom_range" onclick="showdiv();">Custom Range</a>
            </div>
        </div>
        <div style="padding-left: 5px;" class=""><a class="btn btn-success"
                href="{{route('admin.comission.staffwise')}}">Get Staff Wise Comission Report</a></div>

    </div>

    <div style="padding-top: 10px; display: none;" id="show_form">
        <form action="{{route('admin.comission.get')}}" method="GET">
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
        <h3>Report of {{$rvalue}}</h3>

        @php
        $allcomission = $repdata;
        @endphp
        @else
        <h3>Last 30 Comissions</h3>

        @php
        $allcomission = $u->Comissions()->take(30)->orderBy('exp_date', 'DESC')->get();
        // App\StaffComission::take(30)->orderBy('exp_date', 'DESC')->get();
        @endphp
        @endif
        <table class="table table-striped text-center ">
            <thead>
                <tr>
                    <th>Date</th>

                    <th>Staff</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @if ($allcomission->count() >0)
                @foreach ($allcomission as $comm)
                <tr>
                    <td>{{$comm->exp_date->format('d/m/Y')}}</td>

                    <td>{{$comm->Staff?$comm->Staff->first_name:""}}</td>
                    <td>{{$comm->description}}</td>
                    <td>₹{{number_format($comm->amount, 2)}}/-</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4" class="text-center text-danger"><i class="dsfs">Nothing to show here!!!</i></td>
                </tr>
                @endif
            </tbody>
            <tfoot>
                <tr class="text-blod">
                    <td colspan="3" class="text-right"><span class="text-center">Total</span></td>
                    <td>₹{{number_format($allcomission->sum('amount'),2)}}/-</td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>


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
</script>
@endsection
