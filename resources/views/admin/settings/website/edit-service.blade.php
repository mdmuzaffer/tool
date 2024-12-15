@extends('admin.layouts.blank')

@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                <span>{{$actType}} Service</span>
            </h1>
            <div class="page-header-subtitle"></div>
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    @include('admin.settings.website.includes.basic-t1', $vwData0)
</div>


@endsection
