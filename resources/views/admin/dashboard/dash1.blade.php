{{-- @extends('customer.layouts.blank-vanilla') --}}
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
                <span>Dashboard</span>
            </h1>

        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Some Heading</div>
        <div class="card-body">
            <p class="m-2 p-4">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur officiis voluptatem ex quos,
                consectetur quo velit soluta voluptas cupiditate recusandae nulla distinctio omnis odit neque. Sequi
                soluta perferendis, eveniet at, mollitia, perspiciatis et obcaecati in quasi fugit dolor hic numquam!
            </p>
        </div>
    </div>
</div>

@endsection
