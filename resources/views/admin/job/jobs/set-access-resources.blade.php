@extends('admin.layouts.blank')
@section('title')
Recources
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Job Resources</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Set Access Permission</div>
        <div class="card-body">
            {{-- <pre>@json($types, JSON_PRETTY_PRINT)</pre> --}}
            {{-- <pre>@json($CustomData, JSON_PRETTY_PRINT)</pre> --}}
            {{-- {{dd($resources)}} --}}
            @isset($resources)
            {{-- {{dd($resources)}} --}}
            <form action="{{route('job.job.resource.access.post',['id'=>$job_id])}}" method="post" id="form">
                @csrf

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th row="2">
                                <input type="checkbox" class="AllRowChk">
                            </th>
                            <th>File Name</th>
                            <th>File Description</th>
                            <th>Uploaded At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resources as $res)
                        <tr id="{{$res->id}}">
                            <td>
                                <input type="checkbox" class="DataCheckBox" name="res_id[]" id="cb-{{$res->id}}" value="{{$res->id}}"
                                    @if(in_array($res->id, $access_res_ids)) checked @endif />
                            </td>
                            <td>
                                <a href="{{$res->download_url}}" class=" text-dark small" title="Download File">
                                    <i class="fa fa-download"></i>
                                    {{$res->title}}
                                </a>
                            </td>
                            <td>
                                {{$res->description_short}}
                            </td>
                            <td>
                                <i class="small">{{$res->created_at}}</i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


                <button type="submit" class="btn btn-primary">Set Access Permissions</button>

                <a href="{{route('job.job.details', ['id'=>$job_id])}}" class="btn btn-secondary">Back</a>
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

@push('scripts')
<script>
    $(document).ready(function(){
        $('.AllRowChk').change(function(){
            $(this).parents('table').find('.DataCheckBox').prop('checked',this.checked);
        });

        $('.DataCheckBox').change(function(){
            var ctx = $(this).parents('table').first();
            var allChkd = ctx.find('.DataCheckBox').length == ctx.find('.DataCheckBox:checked').length;
            $('.AllRowChk', ctx).prop('checked',allChkd);
        }).change();
    });

    // function SelectCB(tr){
    //     id = $(tr).attr('id');
    //     console.log($(`#cb-${id}`).prop('checked'));
    //     if($(`#cb-${id}`).prop('checked')){
    //         $(`#cb-${id}`).prop('checked', false);
    //     } else {
    //         $(`#cb-${id}`).prop('checked', true);
    //     }
    // }
</script>
@endpush
@endsection