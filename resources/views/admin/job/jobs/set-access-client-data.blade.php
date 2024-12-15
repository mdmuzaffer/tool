@extends('admin.layouts.blank')
@section('title')
Job Customer Datas
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Job Details</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Customer Data</div>
        <div class="card-body">
            {{-- <pre>@json($types, JSON_PRETTY_PRINT)</pre> --}}
            {{-- <pre>@json($CustomData, JSON_PRETTY_PRINT)</pre> --}}
            @isset($types,$CustomData)

            <form action="{{route('job.job.data.access.post',['id'=>$job_id])}}" method="post" id="form">
                @csrf
                @foreach ($types as $tyKey => $ty)
                @php
                // $hasData = $CustomData->contains($tyKey);
                $thisDatas = $CustomData->get($tyKey);
                // dd($CustomData, $thisDatas);
                @endphp
                @if(!is_null($thisDatas) && count($thisDatas)>0)
                @php
                $firstRow = $thisDatas[0];
                @endphp
                <div class="col-12 mb-2 mt-2">
                    <p class="h4 card-title mb-2">{{$ty->title}}</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered customerDataTable">
                            <thead>
                                <tr>
                                    <th></th>
                                    @foreach ($firstRow as $heads)
                                    <th>{{$heads['title']}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($thisDatas as $row)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="AllRowChk">
                                    </td>

                                    @foreach ($row as $heads)
                                    @php
                                    $heads = (object)$heads->toArray();
                                    @endphp
                                    <td>

                                        @if (is_array($heads->value))
                                        <span class="data">{{join(", ", $heads->value)}}</span>
                                        @elseif ($heads->value == null)
                                        <span style="color: red" class="data">UNDEFINED</span>
                                        @else
                                        <span class="data">{{$heads->value}}</span>
                                        @endif

                                        @if($heads->is_secret)
                                        <small class="small text-danger ">
                                            <br>
                                            (Secret)
                                        </small>
                                        @endif

                                        <br>
                                        <input type="checkbox" class="DataCheckBox" id="cb-{{$heads->id}}"
                                            value="{{$heads->id}}" name="row_ids[]" @if (in_array($heads->id, $ad_ids))
                                        checked="checked"
                                        @endif
                                        />
                                        {{-- @foreach ($hiddenData as $Data)
                                                        @if($Data->custom_dynamic_data_id == $heads->id)
                                                            <input type="checkbox" class="DataCheckBox" value="{{$heads->id}}"
                                        checked>
                                        @break
                                        @endif
                                        <input type="checkbox" class="DataCheckBox" value="{{$heads->id}}">
                                        @endforeach --}}
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                @endif
                @endforeach

                <button type="submit" class="btn btn-primary">Set Access Permissions</button>
                @if ($job->hasCustomData())
                <a href="{{route('job.job.client.data.view', ['job_id'=>$job_id])}}"
                    class="btn btn-secondary">View Data</a>
                @endif

                <a href="{{route('job.job.details', ['id'=>$job_id])}}"
                    class="btn btn-secondary">Back</a>
            </form>

            @endisset

        </div>
    </div>
</div>

<style>
    td,
    th {
        text-align: center;
    }

    .customerDataTable [type=checkbox] {
        transform: scale(1.6);
    }
</style>

@push('scripts_nah')
<script>
    // function DefaultVal(val, chkbx){
        //     if(val){
        //         $(chkbx).prop('checked',true);
        //     }
        // }

    $(document).ready(function(){
        // hiddenData = (@json($hiddenData));
        // hiddenData.forEach(checkDefaultVals);

        // function checkDefaultVals(val){
        //     C_id = val.custom_dynamic_data_id;

        //     $(`#cb-${C_id}`).prop('checked',true);
        //     $(`#cb-${C_id}`).attr('class','DataCheckBox default')
        // }

        // $('.DataCheckBox').change(function(){
        //     loadIntoForm(this);
        // });

        function loadIntoForm(chkbx){
            id = $(chkbx).val();

            if($(chkbx).hasClass('default')){
                if($(chkbx).is(':checked')){
                    if($(`#${id}`).length > 0) {
                        $(`#${id}`).remove();
                    }
                } else {
                    inp = $(`
                        <input type="textbox" value="${id}" id="${id}" name="row_ids[delete][]" hidden />
                    `);
                    $('#form').append(inp);
                }
            } else {
                if($(chkbx).is(':checked')){
                    inp = $(`
                        <input type="textbox" value="${id}" id="${id}" name="row_ids[add][]" hidden />
                    `);
                    $('#form').append(inp);
                } else {
                    if($(`#${id}`).length > 0) {
                        $(`#${id}`).remove();
                    }
                }
            }
        }


        // $('.AllRowChk').change(function(){
        //     if($(this).is(':checked')){
        //         $(this).parent('td').siblings('td').each(function(ind, val){
        //             chkbx = $(val).children('input').first();
        //             $(chkbx).prop('checked', true);
        //             loadIntoForm(chkbx);
        //         });
        //     } else {
        //         $(this).parent('td').siblings('td').each(function(ind, val){
        //             chkbx = $(val).children('input').first();
        //             $(chkbx).prop('checked', false);
        //             loadIntoForm(chkbx);
        //         });
        //     }
        // });


        $('.AllRowChk').change(function(){
            alert('adjl')
            $(this).parent('tr').find('.DataCheckBox')->prop('checked',this.isChecked);
        });
    })
</script>
@endpush

@push('scripts')
<script>
    $(document).ready(function(){
        $('.AllRowChk').change(function(){
            $(this).parents('tr').find('.DataCheckBox').prop('checked',this.checked);
        });

        $('.DataCheckBox').change(function(){
            var ctx = $(this).parents('tr').first();
            var allChkd = ctx.find('.DataCheckBox').length == ctx.find('.DataCheckBox:checked').length;
            $('.AllRowChk', ctx).prop('checked',allChkd);
        }).change();
    });
</script>
@endpush
@endsection
