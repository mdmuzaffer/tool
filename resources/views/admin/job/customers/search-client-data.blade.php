@extends('admin.layouts.blank')
@section('title')
Job Client Datas
@endsection
@section('content')
{{-- <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                <div class="page-header-icon"><i data-feather="layout"></i></div>
                <span>Job Details</span>
            </h1>
            <div class="page-header-subtitle">Customer Dashboard</div>
        </div>
    </div>
</div> --}}
<div class="container-fluid mt-n10-x">
    <form method="post" action="{{ route('job.customer.search.post') }}" class="col-12 searchWrapper p-2">
        @csrf
        <label for="searchbar">Search Client</label>
        <div class="row no-gutters">
            <div class="col-md-6">
                <input type="search" name="q" id="searchbar" placeholder="Search..."
                    class="form-control form-control-flat" value="{{$q}}">
            </div>
            <div class="col-md-3">
                <select name="f" id="" class="form-control form-control-flat select2-single"
                    aria-placeholder="Select A Value">
                    {{-- <option value="">All </option> --}}
                    @foreach ($searchTypeDropdownData as $value => $text)
                    <option value="{{$value}}" @if ($f==$value) selected="selected" @endif>{!! $text !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary w-100 btn-flat" type="submit" id="">Search</button>
            </div>
        </div>
    </form>
    {{-- <pre>@json($dynamicFields, JSON_PRETTY_PRINT)</pre> --}}
    {{-- <pre>@json($searchTypeDropdownData, JSON_PRETTY_PRINT)</pre> --}}
    @if (!empty($q))
    <div class="table-responsive datatable-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>sl.</th>
                    <th>Client ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Total Jobs</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($searchItems)>0)
                @foreach ($searchItems as $indx =>$item)

                @php
                    $b1id = "c1-".Str::uuid();
                @endphp
                <tr>
                    <td>{{$indx +1}}</td>
                    <td>{{$item->slno_gen}}</td>
                    <td>{{$item->full_name}}</td>
                    <td>{{$item->phones_text}}</td>
                    <td>{!! $item->emails_text !!}</td>
                    <td>{!! $item->related_jobs_count !!}</td>
                    <td class="tbf">
                        <span>

                            <div class="dropup">
                                <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2 x-dropdown-toggle"
                                 id="{{$b1id}}" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="more-vertical"></i></button>
                                <div class="dropdown-menu" aria-labelledby="{{$b1id}}">
                                    <a class="dropdown-item" href="{{route('job.customer.view.details',['id' => $item->id ])}}">View All Data</a>
                                    <a class="dropdown-item" href="{{route('job.customer.edit',['id' => $item->id ])}}">Edit</a>
                                    <a class="dropdown-item" href="{{route('job.customer.invoices',['id' => $item->id ])}}">Invoices</a>
                                    {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                                </div>
                            </div>

                        </span>
                    </td>
                    </tr>
                @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-danger text-italic"><span><i>No Data Found</i></span></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
@push('styles')
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
<link rel="stylesheet" href="//select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">

<style>
    .form-control-flat,
    .btn-flat {
        border-radius: 0px;
    }

    .select2-container--bootstrap .select2-selection--single {
        height: calc(1.5em + 0.7rem + 2px);
        line-height: 1.5;
        padding: 6px 24px 6px 12px;
        font-size: 1.2rem;
    }

    .select2-container--bootstrap .select2-selection--single {
        border-radius: 0px !important;
    }
    .select2-container--bootstrap .select2-search--dropdown .select2-search__field{
        font-size: 1rem !important;
    }
</style>
@endpush
@push('scripts')
<script>
    $(document).ready(function () {
        $.fn.select2.defaults.set( "theme", "bootstrap" );

        $('.select2-single').select2({
				placeholder: "",
				width: null,
				containerCssClass: ':all:'
			} );
    });
</script>
@endpush
