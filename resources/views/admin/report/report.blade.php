@extends('admin.layouts.blank')
@php
$cmd = Auth::guard('admin')->user();
@endphp
@section('content')


<div class="container-fluid">
    <h3>Get Report Staff and Payment Modes Wise</h3>
    <div class="row">
        <div class="col-md-6">

            <canvas id="chart1">

            </canvas>
        </div>
        <div class="col-md-6">
            <canvas id="chart2"></canvas>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="staffselect" class="col-md-12">Select Staff <span style="color: red;"
                    class="mandatoryClass">*</span></label>
            <div class="col-md-12">
                @php
                $allstaffs = $cmd->Staffs;
                @endphp
                <select name="admin_staff_id" id="" class="form-control">

                    <option value="">Select</option>
                    @foreach ($allstaffs as $st)
                    <option value="{{$st->id}}">{{$st->full_name}} [{{$st->phone}}]</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="staffselect" class="col-md-12">Select Payment Modes<span style="color: red;"
                    class="mandatoryClass">*</span></label>
            <div class="col-md-12">
                @php
                $allpaymentmodes = $cmd->Paymentmodes;
                @endphp
                <select name="" id="" class="form-control">
                    <option value="">Select</option>
                    @foreach ($allpaymentmodes as $py_md)
                    <option value="{{$py_md->id}}">{{$py_md->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <div class="row">
                @isset($repdays)
                @foreach ($repdays as $repk => $repname)
                <div class="form-check py-2 col-md-4">
                    <label for="radio-{{$repk}}" checked="checked" class="form-check-label px-4"><input
                            id="radio-{{$repk}}" name="rpt_name" type="radio" class="form-check-input"
                            value="{{$repk}}">{{$repname}}</label>
                </div>
                @endforeach
                @endisset
            </div>

        </div>
    </div>

    <div style="padding-top: 20px;" id="custom_range">
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

    <div class="card my-2 p-3">
        <div class="row">
            <div class="col-lg-3">
                <div class="card m-b-5 bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex no-block">
                            <div class="m-r-20 align-self-center">
                                <span class="lstick m-r-20"></span>
                                <i class="fa fa-rupee-sign"></i>
                            </div>
                            <div class="align-self-center">
                                <h6 class="m-t-10 m-b-0">Total Payment Collected</h6>
                                <h2 id="custStock" class="m-t-0">₹0.00/-</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // var randomScalingFactor = function() {
    //     return Math.round(Math.random() * 100);
    // };

    var config1 = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    1500.54,
                    1000.40,
                    500.75
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
                'Staff 1 ₹1500.54/-',
                'Staff 2 ₹1000.40/-',
                'Staff 3 ₹500.75/-',
            ]
        },
        options: {
            responsive: true
        }
    };

    window.onload = function() {
        var ctx1 = document.getElementById('chart1').getContext('2d');
        window.myPie = new Chart(ctx1, config1);

        var ctx2 = document.getElementById('chart2').getContext('2d');
        window.myPie = new Chart(ctx2, config2);
    };
    var config2 = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    // 1500.54,
                    // 1000.40,
                    // 500.75
                    2000.00,
                    300.00,
                    150.00
                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
                ],
                label: 'Dataset 2'
            }],
            labels: [
                // 'Staff 1 ₹1500.54/-',
                // 'Staff 2 ₹1000.40/-',

                // 'Staff 3 ₹500.75/-',
                'Cash Payment ₹2000.00',
                'NEFT ₹300.00',
                'Bank ₹150.00'
            ]
        },
        options: {
            responsive: true
        }
    };


</script>
<script>
    // var randomScalingFactor = function() {
    //     return Math.round(Math.random() * 100);
    // };


</script>
<script>
    function showdiv(){
        // var isCustom = $('[name="report_name"]:radio:checked').val()=="custom";
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
