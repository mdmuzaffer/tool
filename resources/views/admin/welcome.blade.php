@extends('admin.layouts.blank')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ADMIN Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <center>
                        @component('components.who')

                        @endcomponent
                    </center>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection