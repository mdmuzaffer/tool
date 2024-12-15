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

                @foreach ($types as $tyKey => $ty)
                @php
                // $hasData = $CustomData->contains($tyKey);
                $thisDatas = $CustomData->get($tyKey);
                // dd($CustomData);
                @endphp
                @if(!is_null($thisDatas) && count($thisDatas)>0)
                @php
                // $firstRow = $thisDatas[0];
                @endphp
                <div class="col-12 mb-2 mt-2">
                    <p class="h4 card-title mb-2">{{$ty->title}}</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered customerDataTable">
                            <thead>
                                <tr>
                                    @foreach ($thisDatas as $dt)
                                    <th>{{$dt->title}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            @php
                                // dd($thisDatas);
                                $rowCounts = $thisDatas->first()->length;
                                // dd($rowCounts);
                            @endphp
                            <tbody>
                                @for ($i = 0; $i < $rowCounts; $i++)
                                    <tr>
                                        @foreach ($thisDatas as $column)
                                            @php
                                                $d = $column->data->get($i);
                                            @endphp
                                            <td>
                                                @if ($d == null)
                                                    <span class="text-danger small">----</span>
                                                @else
                                                    @if (is_array($d['value']))
                                                    <span class="data">{{join(", ", $d['value'])}}</span>
                                                    @elseif ($d['value'] == null)
                                                    <span style="color: red" class="data">UNDEFINED</span>
                                                    @else
                                                    <span class="data">{{$d['value']}}</span>
                                                    @endif
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endfor
                                {{-- @foreach ($thisDatas as $row)
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
                                        <span class="data ">{{$heads->value}}</span>
                                        @endif

                                        @if($heads->is_secret)
                                        <small  class="small text-danger ">
                                            <br>
                                            (Secret)
                                        </small>
                                        @endif

                                        <br>
                                        <input type="checkbox" class="DataCheckBox" id="cb-{{$heads->id}}"
                                            value="{{$heads->id}}" name="row_ids[]"
                                            @if (in_array($heads->id, $ad_ids))
                                                checked="checked"
                                            @endif
                                            />
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>

                @endif
                @endforeach

                {{-- <button type="submit" class="btn btn-primary">Set Access Permissions</button> --}}
                <a href="{{route('job.job.details', ['id'=>$job_id])}}"
                    class="btn btn-secondary">Back</a>

            @endisset

        </div>
    </div>
</div>

<style>
    td,
    th {
        text-align: center;
    }
    .customerDataTable [type=checkbox]{
        transform: scale(1.6);
    }
</style>

@endsection
