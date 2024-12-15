@extends('admin.layouts.blank')
@php
$u = Auth::guard('admin')->user();
@endphp
@section('content')

<div class="container-fluid">
    <form action="">
        <div class="form-group row">
            <div class="col-12">
                <label for="customerdetails">Name / Phone / Email / Customer ID / Address</label>
            </div>
            <div class="col-12">
                <input class="form-control form-control-file form-control-sm" type="text" placeholder="Search"
                    id="searchCustomer" @isset($Customer) value="{{ $Customer->name}}" @endisset />
            </div>
            {{-- <div class="row form-group no-gutters m-0">
                <div class="col-12 p-2 text-center ">
                    <button style="margin-left: 10px;" type="submit" class="btn btn-link btn-outline-info btn-sm">
                        <i class="fa fa-search"></i>
                        &nbsp;Search

                    </button>
                </div>
            </div> --}}
        </div>
    </form>
    @isset($Customer)
    <div class="card p-4">
        @include('customer.includes.pym-status')

        @php
        $oc = [
        'status'=>'Status',
        'payments'=>'Payments',
        'charges'=>'Charges',
        'ac-logs'=>'A/c Logs',
        ];
        @endphp
        <div class="row">
            <div class="container-fluid mt-3">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs customtab">

                    <li class="nav-item">
                        <a class="nav-link {{ Nav::isRoute('admin.payment.status.get')}} " dt-data-toggle="tab"
                            href="{{ route('admin.payment.status.get',['Customer' => $Customer->id]) }}">Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Nav::isRoute('admin.payment.payment.get')}} " dt-data-toggle="tab"
                            href="{{ route('admin.payment.payment.get',['Customer' => $Customer->id]) }}">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Nav::isRoute('admin.payment.advance-payment.get')}} " dt-data-toggle="tab"
                            href="{{ route('admin.payment.advance-payment.get',['Customer' => $Customer->id]) }}">Adv. Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Nav::isRoute('admin.payment.charges.get')}} " dt-data-toggle="tab"
                            href="{{ route('admin.payment.charges.get',['Customer' => $Customer->id]) }}">Charges</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ Nav::isRoute('admin.payment.discount.get') }}" dt-data-toggle="tab"
                    href="{{ Route('admin.payment.discount.get',['Customer' => $Customer->id]) }}">Discount</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Nav::isRoute('admin.payment.ac-log.get')}} " dt-data-toggle="tab"
                            href="{{ route('admin.payment.ac-log.get',['Customer' => $Customer->id]) }}">A/c Logs</a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    @yield('tab-content')
                </div>
            </div>
        </div>



    </div>
    @endisset
</div>
<script id="SearchDataCustomer-HB" type="text/x-handlebars-template">
    <a class="text-small search-text-tt-custom" href="@{{ sturl }}/">
        <span class="m-0 p-3"><span class="">@{{n}}</span> – @{{cid}}</span>
        <small>
            @{{#if p1 }} <small><b>Phone</b> –@{{p1}}</small>,@{{/if}} @{{#if p2 }}@{{p2}}@{{/if}}
        </small>
        <hr class="m-0 p-0" />
    </a>
</script>
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
        var bestPictures = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            // prefetch: '../data/films/post_1960.json',
            remote: {
                url: '{{ $amnSrchQ }}&q=%QUERY',
                wildcard: '%QUERY'
            }
            });

            $('#searchCustomer').typeahead(null, {
                name: 'searchCustomer',
                display: 'n',
                source: bestPictures,
                templates: {
                    empty: [
                    '<div class="empty-message text-center py-2 text-danger">',
                        '<i>Nothing Matched</i>',
                    '</div>'
                    ].join('\n'),
                    suggestion: Handlebars.compile($("#SearchDataCustomer-HB").html())
                },
            });
            // $("#searchCustomer").typeahead({
            //     name: 'searchCustomer',
            //     // remote: `/search.php?query=%QUERY`,
            //     remote: `{{ $amnSrchQ }}&q=%QUERY` ,
            //     minLength:1,
            //     limit: 10
            // });
    });
</script>
@endsection
