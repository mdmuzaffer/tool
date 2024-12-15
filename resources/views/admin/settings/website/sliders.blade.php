@extends('admin.layouts.blank')

@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                <span>Sliders</span>
            </h1>
            <div class="page-header-subtitle"></div>
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4  card-header-actions">
        <div class="card-header">All Sliders
            <a href="{{route('admin.settings.website.sliders.add')}}" class="btn btn-primary btn-sm pull-left">
                <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Create New Slider</a>
        </div>
        <div class="card-body p-3">
            <div class="datatable table-responsive">
                <table class="table table-striped DataTable">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Status</th>
                            {{-- <th>Description</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($dataList) && $dataList->count()>0 )
                            @foreach ($dataList as $item)
                                @php
                                $b1id = "j1-".Str::uuid();
                                @endphp
                                <tr>
                                    <td>
                                        {{-- @dump($item) --}}
                                        <span>
                                            <a class="btn btn-sm btn-icon btn-outline-cyan" title="Edit"
                                                href="{{route('admin.settings.website.sliders.edit', ['svc' => $item->id ])}}">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            {{-- <a class="btn btn-sm btn-icon btn-outline-cyan" title="Go To Page"
                                                href="{{$item->url}}" target="_blank">
                                                <i class="fa fa-link"></i>
                                            </a> --}}
                                            {{-- <div class="dropdown">
                                                <button
                                                    class="btn btn-datatable btn-icon btn-transparent-dark mr-2 x-dropdown-toggle"
                                                    id="{{$b1id}}" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false"><i data-feather="more-vertical"></i></button>
                                                <div class="dropdown-menu" aria-labelledby="{{$b1id}}">
                                                    <a class="dropdown-item"
                                                        href="{{route('job.job.details', ['id' => $item->id ])}}">View
                                                        Details</a>
                                                    <a class="dropdown-item"
                                                        href="{{route('job.job.delete', ['id' => $item->id ])}}">Delete</a>
                                                </div>
                                            </div> --}}
                                        </span>
                                    </td>
                                    <td>{!! $item->title !!}</td>
                                    <td>
                                        <img height="40px" src="{{$item->image}}" data-src="{{$item->image}}" alt="{{$item->title}}" title="{{$item->title}}" onerror="this.src='/imgerr'" />
                                    </td>
                                    <td>{!! $item->is_active_text !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">
                                    <p class="text-center font-bold text-danger text-italic"><em>No Data</em></p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


@endsection
