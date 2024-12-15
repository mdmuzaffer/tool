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
                <span>Job Create - Step 1</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Create Job</div>
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

                <form action="{{route('job.job.add.step.1.post')}}" method="post" id="form">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="w_job_type_id">Job Type</label>
                            <select class="form-control select2" id="w_job_type_id" name="w_job_type_id">
                                {{-- <option value="">Select</option> --}}
                                @if (isset($jobTypes) && $jobTypes != null)
                                @foreach ($jobTypes as $jt)
                                <option value="{{$jt->id}}">{{$jt->title}} [{{$jt->price}}/- ]</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="w_job_customer_id">Customer</label>
                            <select class="form-control select2" id="w_job_customer_id" name="w_job_customer_id">
                                {{-- <option value="">Select</option> --}}
                                @if (isset($customers) && $customers != null)
                                @foreach ($customers as $cu)
                                <option value="{{$cu->id}}">{{$cu->full_name_sl}}</option>
                                @endforeach
                                @endif
                            </select>
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

</script>
@endsection
