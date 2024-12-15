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
                <span>Job Type</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Add A New Job Type</div>
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


            <div class="container">

                <form action="{{route('job.type.add.post')}}" method="post" id="form">
                    @csrf
                    <div class="row">
                        <div class="form-group  col-md-5">
                            <label for="parent_id">Category</label>
                            <select class="form-control" id="parent_id" name="parent_id">
                                <option value="">Select</option>
                                @if ($categ_id != null)
                                @foreach ($categ_id as $categ)
                                <option value="{{$categ->id}}">{{$categ->title}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group  col-md-5">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="sortorder">Sort Order</label>
                            <input type="Number" name="sortorder" id="sortorder" min="0" class="form-control">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="2" class="form-control"></textarea>
                        </div>


                        <div class="form-group col-md-3">
                            <label for="worker_part">Worker Part</label>
                            <input type="text" name="worker_part" id="worker_part" class="form-control onlyNumeric"
                                min="0" value="0">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="auditor_part">Auditor Part</label>
                            <input type="text" name="auditor_part" id="auditor_part" class="form-control onlyNumeric"
                                min="0" value="0">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="org_part"><abbr title="Organization">Org.</abbr> Part</label>
                            <input type="text" name="org_part" id="org_part" class="form-control onlyNumeric" min="0"
                                value="0">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" class="form-control onlyNumeric" min="0"
                                value="0" readonly aria-readonly="true">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="is_enable">Is Enable</label>
                            <select class="form-control" id="is_enable" name="is_enable">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="form-group  col-md-3">
                            <label for="publish">Publish To Front</label>
                            <select class="form-control" id="publish" name="publish">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="approx_day_count">Approx. Day Count</label>
                            <input type="Number" name="approx_day_count" id="approx_day_count" min="1" class="form-control" value="1">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <table class="table table-bordered table-hover dataTable mt-3" id="dataTable" width="100%"
                            cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Count</th>
                                    <th>Is Optional</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($DataType as $dt)
                                <tr id=DataTypes_{{$dt->id}}>
                                    <td>
                                        <input type="checkbox" id="is_checked_{{$dt->id}}"
                                            onchange="toggle({{$dt->id}})" onload="alert('hello')">
                                    </td>
                                    <td>{{$dt->id}}</td>
                                    <td>{{$dt->title}}</td>
                                    <td>
                                        <input type="number" name="DataTypes[{{$dt->id}}][count]" id="count_{{$dt->id}}"
                                            value="{{$dt->count}}" class="form-control" disabled>
                                    </td>
                                    <td>
                                        <select name="DataTypes[{{$dt->id}}][is_optional]" id="is_optional_{{$dt->id}}"
                                            class="form-control" disabled>
                                            <option value="1" @if ($dt->is_optional == true) selected @endif>yes
                                            </option>
                                            <option value="0" @if ($dt->is_optional == false) selected @endif>No
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                        <input type="button" id="SubmitForm" class="form-control btn btn-primary" value="Add"
                            value="Add">
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
 </script>
@endpush
