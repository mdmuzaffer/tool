@extends('admin.layouts.blank')

@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                <span>Services</span>
            </h1>
            <div class="page-header-subtitle"></div>
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card  mb-4 card-header-actions">
        <div class="card-header">All Services
            <a href="{{route('admin.settings.website.services.add')}}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Create New Service</a>
        </div>
        <div class="card-body p-3">
            <div class="datatable table-responsive">
                <table class="table table-striped DataTable">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Service(Orig.)</th>
                            <th>Service</th>
                            <th>Price</th>
                            <th>Price Revised</th>
                            <th>Description</th>
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
                                <span>
                                    <a class="btn btn-sm btn-icon btn-outline-cyan" title="Edit"
                                    href="{{route('admin.settings.website.services.edit', ['svc' => $item->id ])}}">
                                    <i class="fa fa-edit"></i>
                                </a>
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
                            <td>{!! $item->title_orig !!}</td>
                            <td>{!! $item->title !!}</td>
                            <td>{!! $item->price_orig_f !!}</td>
                            <td>{!! $item->revised_price_f !!}</td>
                            <td>{!! $item->short_description !!}</td>
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
