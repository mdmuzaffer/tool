@extends('admin.layouts.blank')

@section('content')
{{-- @if (session('success'))
<div class="alert alert-success alert-dismissible fade show">
    <strong>Success!!</strong> {{session('success')}}
<button type="button" class="close" data-dismiss="alert" aria-level="close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif --}}


<div class="container-fluid">
    <div class="row d-justify-content-center">
        <div class="col-md-12">
            {{-- @dump($Customer) --}}
            {{-- <p class="text-center-x h3">Package of Customer: [{{$Customer->customer_id}}] {{$Customer->name}}</p>
            --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h3 class="text-center text-bold">
                                There's already a package assigned to the customer. Please edit package if you need.
                            </h3>
                            <a href="{{route('admin.customer.packages.get',['Customer' => $Customer->id])}}"
                                class="btn btn-primary ">Go Back To Customer Packages</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <style>
        .customtab li a.nav-link {
            color: black;
        }

        .customtab li a.nav-link:hover {
            color: #EF5350;
        }

        .customtab li a.nav-link.active {
            color: #EF5350;
            border-bottom: 2px solid #EF5350;
        }

        .tab-content .tab-pane {
            min-height: 400px;
        }

        .twitter-typeahead {
            width: 100%;
        }

        .typeahead-wrapper {
            display: block;
            margin: 50px 0;
        }

        .tt-menu {
            width: 100%;
            background-color: #fff;
            border: 1px solid #000;
        }

        .tt-suggestion.tt-selectable {}

        .tt-suggestion {
            display: block;
        }

        .tt-suggestion.tt-cursor {
            background-color: #ccc;
        }

        .tt-suggestion {
            padding: 3px 5px;
            font-size: 18px;
        }

        .triggered-events {
            float: right;
            width: 500px;
            height: 300px;
        }

        .status-cards {
            padding: 0 2pt;
            margin: 2pt 0;
        }

        /* .tt-input {
        height: 1.6em;
        font-size: 1.3em;
        padding: 5pt 10pt;
    }

    .tt-hint {
        font-size: 1.3em;
    } */
    </style>
    {{-- <link href="//res.cloudinary.com/cblpay/raw/upload/webres/apl/assets/plugins/twbs4/css/bootstrap.css" rel="stylesheet" /> --}}


    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}

    <link href="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bs4ts/css/bootstrap4-toggle.css" rel="stylesheet" />
    <script src="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bs4ts/js/bootstrap4-toggle.js"></script>




    <script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.3/handlebars.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    @php
    $amnSrchQ = route('ajax.admin.customer.search',[
    'chksm' => $u->chksm,
    'admin' => $u->id,
    // 'q' => '%QUERY',
    ]);
    @endphp
    <script>
        $(document).ready(function () {
        // var bestPictures = new Bloodhound({
        //     datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        //     queryTokenizer: Bloodhound.tokenizers.whitespace,
        //     // prefetch: '../data/films/post_1960.json',
        //     remote: {
        //         url: '{{ $amnSrchQ }}&q=%QUERY',
        //         wildcard: '%QUERY'
        //     }
        //     });
        //     $('#searchCustomer').typeahead(null, {
        //         name: 'searchCustomer',
        //         display: 'n',
        //         source: bestPictures,
        //         templates: {
        //             empty: [
        //             '<div class="empty-message text-center py-2 text-danger">',
        //                 '<i>Nothing Matched</i>',
        //             '</div>'
        //             ].join('\n'),
        //             suggestion: Handlebars.compile($("#SearchDataCustomer-HB").html())
        //         },
        //     });
    });
    </script>
    @endsection
