@extends('admin.layouts.blank')
@section('title')
Dashboard
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Create Job - Step 2</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Create Job - Step 2</div>
        <div class="card-body">

            {{-- error display  --}}
            <div class="container">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                    <li> {{$error}} </li>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    @endforeach
                </div>
                @endif
            </div>


            <div class="container-fluid">

                <form action="" method="post" id="form">
                    @csrf
                    <div class="rowx-  d-none">
                        <div class="form-group col-md-6">
                            <label for="w_job_type_id">Job Type</label>
                            <select disabled class="form-control" id="w_job_type_id" name="w_job_type_id">
                                <option selected>{{$JTy->title}} [{{$JTy->price}}/- ]</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="w_job_customer_id">Customer</label>
                            <select disabled class="form-control" id="w_job_customer_id" name="w_job_customer_id">
                                <option selected>{{$Cu->full_name_sl}}</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="text-center">Job Description</h4>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Job</th>
                                        <td>{{$JTy->title}}</td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td>{{$JTy->Category?$JTy->Category->title:""}}</td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td>{{$JTy->price_f}}</td>
                                    </tr>
                                    <tr>
                                        <th>Worker Part</th>
                                        <td>{{$JTy->worker_part_f}}</td>
                                    </tr>
                                    <tr>
                                        <th>Auditor Part</th>
                                        <td>{{$JTy->auditor_part_f}}</td>
                                    </tr>
                                    <tr>
                                        <th>Own Part</th>
                                        <td>{{$JTy->org_part_f}}</td>
                                    </tr>
                                    <tr>
                                        <th>Approx. Days to finish</th>
                                        <td>{{$JTy->approx_day_count}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-center">Customer Description</h4>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{$Cu->full_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{$Cu->slno_gen}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone(s)</th>
                                        <td>
                                            <span>
                                                @foreach ($Cu->phones as $itm)
                                                {{-- @dump($itm) --}}
                                                <p class="small m-0">{{$itm}}</p>
                                                @endforeach
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Email(s)</th>
                                        <td>
                                            <span>
                                                @foreach ($Cu->emails as $itm)
                                                {{-- @dump($itm) --}}
                                                <p class="small m-0 /">{{$itm}}</p>
                                                @endforeach
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="row mt-5">
                        <h3>Change Price</h3>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-3">
                            <label for="worker_part">Worker Part</label>
                            <input type="text" name="worker_part" id="worker_part" class="form-control onlyNumeric"
                                value="{{$JTy->worker_part}}" min="0" required>
                        </div>
                        <div class="col-md-3">
                            <label for="auditor_part">Auditor Part</label>
                            <input type="text" name="auditor_part" id="auditor_part" class="form-control onlyNumeric"
                                value="{{$JTy->auditor_part}}" min="0" required>
                        </div>
                        <div class="col-md-3">
                            <label for="org_part"><abbr title="Organization">Org.</abbr> Part</label>
                            <input type="text" name="org_part" id="org_part" class="form-control onlyNumeric"
                                value="{{$JTy->org_part}}" min="0" required>
                        </div>
                        <div class="col-md-3">
                            <label for="price">Total Price</label>
                            <input type="text" name="price" id="price" class="form-control onlyNumeric"
                                value="{{$JTy->price}}" min="0" readonly aria-readonly="true" required>
                        </div>
                    </div>

                    @php
                        $job_ends_at = now()->addDays($JTy->approx_day_count);
                    @endphp

                    <div class="row mt-5">
                        <h3>Change End Date</h3>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-4" id="Date">
                            <label for="job_ends_at" class="mandatory-label">Job End Date</label>
                            <input type="text" name="job_ends_at" id="job_ends_at" class="form-control datepicker"
                                data-provide="datepicker" data-date-format="dd/mm/yyyy"
                                value="{{$job_ends_at->format('d/m/Y')}}"
                                 onchange="DateCalculator()" required>
                                <span class="small" id="day_count"></span>
                                <input value="" name="given_day_count" id="given_day_count" hidden>
                        </div>
                    </div>

                </form>

            </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="button" id="Back" class="form-control btn btn-danger" value="Back">
                    </div>
                </div>
                <div class="col-md-7"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="button" id="SubmitForm" class="form-control btn btn-primary" value="Next">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    tr {
        text-align: center;
    }
</style>



<script>
    document.getElementById("Back").addEventListener('click',  function(){
        window.history.back();
    });



    document.getElementById("SubmitForm").addEventListener('click',  function(){
        document.getElementById("form").submit();
    });


    // document.getElementsByTagName('body')[0].onload = function() {
    //     addtr()
    // };


    function toggle(id) {
        if(document.getElementById(`is_checked_${id}`).checked){

            // enabling txtboxes
            $(`#count_${id}`).removeAttr('disabled');
            $(`#is_optional_${id}`).removeAttr('disabled');

            //adding hidden fields
            // title = $(`#DataTypes_${id}`).children('td')[2].innerHTML;
            // f_id =$(`#DataTypes_${id}`).children('td')[1].innerHTML;
            // $(`#DataTypes_${id}`).append(
            //     `<div id="DataTypes_hidden_${id}">`+
            //         `<input type="text" name="DataTypes[${id}][title]" value="${title}" hidden>` +
            //         `<input type="text" name="DataTypes[${id}][id]" value="${f_id}" hidden>` +
            //     `</div>`
            // );

        } else {

            // disabling tetboxes
            $(`#count_${id}`).attr('disabled','disabled');
            $(`#is_optional_${id}`).attr('disabled','disabled');

            //removing hidden fields
            // $(`#hidden_${id}`).remove();

        }
    }

    function DateCalculator(){
        var start = moment('{{now()->format("d/m/Y")}}','DD/MM/YYYY');
        var end = moment($('#job_ends_at').val(),'DD/MM/YYYY');
        days = moment.duration(end.diff(start)).asDays();
        $('#day_count').text(`${days} Days`);
        // console.log(days);
        $('#given_day_count').val(days);
    }

</script>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
          var  sum= (a,b) => a+b;
           $("#worker_part,#auditor_part,#org_part").change(function () {
            var res = $( "#worker_part,#auditor_part,#org_part").get().map(v => v.value.toNumber(0)).reduce(sum);
            //  $("#price").val(res);
            if(AutoNumeric) AutoNumeric.getAutoNumericElement('#price').set(res);
           }).change();
        });
        DateCalculator();
</script>
@endpush
