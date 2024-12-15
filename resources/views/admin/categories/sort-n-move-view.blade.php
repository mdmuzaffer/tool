@extends('admin.layouts.blank')

@section('content')
<div class="container-fluid">
    <div class="row d-justify-content-center">

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">{{ __("Sort Categories") }}</div>
                {{-- category	description	level	enabled --}}
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.sort-n-move.save') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12 sortable-default" id="ul-container">
                                {!! App\ServiceCategory::print_list_for_tree_text_view() !!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('footer_end')
    <script src="{{ url('/th/libs/jquery-sortable.js') }}"></script>
    <style>
        .areas_list_each_area {
            list-style: none;
            margin-bottom: 5pt;
            box-shadow: 1px 1px 3px 0px rgba(41, 93, 146, 0.59);
        }
    </style>
    <style>
        body.dragging,
        body.dragging * {
            cursor: move !important;
        }

        .dragged {
            position: absolute;
            top: 0;
            opacity: .5;
            z-index: 2000;
        }

        .sortable-default ol.sortable-default-root,
        .sortable-default ul.sortable-default-root {
            margin: 0 0 9px 0;
            min-height: 10px;
            position: relative;
        }

        .sortable-default ol.sortable-default-root li,
        .sortable-default ul.sortable-default-root li {
            position: relative;
            display: block;
            margin: 5px;
            padding: 5px;
            border: 1px solid #FFF;
            color: blue;
            background: #ccc;
        }

        .sortable-default ol.sortable-default-root li.placeholder,
        .sortable-default ul.sortable-default-root li.placeholder {
            position: relative;
            margin: 0;
            padding: 0;
            border: none;
        }

        .sortable-default ol.sortable-default-root:before,
        .sortable-default ul.sortable-default-root:before {
            position: absolute;
            content: "";
            width: 0;
            height: 0;
            margin-top: -5px;
            left: -5px;
            top: -4px;
            border: 5px solid transparent;
            border-left-color: red;
            border-right: none;
        }
    </style>
    <script>
        //action_buttons disableArea enableArea
        $(function  () {
            $("#ul-container>ul").sortable();
        });
    </script>
    @endsection
