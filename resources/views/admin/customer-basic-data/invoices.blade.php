@extends('admin.layouts.blank')
@section('title')
Invoices
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Invoices</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4 card-header-actions">
        {{-- <div class="card-header">Invoices
            <a href="{{route('job.customer.add')}}" class="btn btn-primary btn-sm">
        <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add New</a>
    </div> --}}
    <div class="card-body p-3">
        <div class="sbp-preview-code">
            <!-- Code sample-->
            <ul class="nav nav-tabs" id="buttonSizingIconsTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="btnCreateNewInvoiceTab" data-toggle="tab" href="#btnCreateNewInvoice"
                        role="tab" aria-controls="btnCreateNewInvoice" aria-selected="false">Create New Invoice</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-1" id="btnAllInvoicesTab" data-toggle="tab" href="#btnAllInvoices" role="tab"
                        aria-controls="btnAllInvoices" aria-selected="true">Invoices</a>
                </li>
            </ul>
            <!-- Tab panes-->
            <div class="tab-content">
                <div class="tab-pane active" id="btnCreateNewInvoice" role="tabpanel"
                    aria-labelledby="btnCreateNewInvoiceTab">

                    <div class="m-3 text-center">
                        <div class="alert alert-info p-1 small w-100">Select Un-Invoiced Jobs and Press 'Create Invoice'
                        </div>
                    </div>
                    <form action="{{route('job.customer.invoice.create.post',['id' => $client->id ])}}" method="post" onsubmit="return validateInvoiceCreateFormSubmit()">
                        <div class="datatable table-responsive">
                            <table class="table table-striped DataTable">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="selectAllUnInvJbsCB"
                                                    type="checkbox">
                                                <label class="custom-control-label" for="selectAllUnInvJbsCB"></label>
                                            </div>
                                        </th>
                                        <th>Job #</th>
                                        <th>Job Type</th>
                                        <th>Created At</th>
                                        <th>Job Amount</th>
                                        <th>Status</th>
                                        {{-- <th>Type</th> --}}
                                        {{-- <th>Limit</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($unInvoicedJobs) && $unInvoicedJobs->count()>0 )

                                    @foreach ($unInvoicedJobs as $item)
                                    @php
                                    $b1id = "uij-".Str::uuid();
                                    $cbid = "uij-cb-".Str::uuid();
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input eachUnInvoicedJobCb" id="{{$cbid}}"
                                                    type="checkbox" name="uiJobs[jbs][]" value="{{$cbid}}">
                                                <label class="custom-control-label" for="{{$cbid}}"></label>
                                                <input type="hidden" name="uiJobs[{{$cbid}}][jb]" value="{{$item->id}}">
                                                <input type="hidden" name="uiJobs[{{$cbid}}][cl]" value="{{$client->id}}">
                                                <input type="hidden" name="uiJobs[{{$cbid}}][jbcs]" value="{{$item->chksm}}">
                                                <input type="hidden" name="uiJobs[{{$cbid}}][clcs]" value="{{$client->chksm}}">
                                            </div>

                                        </td>
                                        <td>{!! $item->slno_gen !!}</td>
                                        <td>{!! $item->JobType->title !!}</td>
                                        <td>{!! $item->created_at->format('d/m/Y') !!}</td>
                                        <td>{!! $item->price_f !!}</td>
                                        <td>{!! $item->status !!}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="6">
                                            <p class="text-center font-bold text-danger text-italic"><em>No Data</em>
                                            </p>
                                        </td>
                                    </tr>
                                    @endif
                                    @if (isset($unInvoicedJobs) && $unInvoicedJobs->count()>0 )
                                <tfoot>
                                    <tr>
                                        <td colspan="6">
                                            @if($u->hasRole(\App\Role::ADMIN_ROLE_INVOICE_CREATION) || $u->is_superuser)
                                                <button class="btn btn-primary createInvoiceBtn disabled" type="submit"
                                                    disabled>Create
                                                    Invoice</button>
                                            @else
                                                <button class="btn btn-primary disabled"
                                                    disabled>Create
                                                   Invoice</button>
                                            @endif
                                                <span class="jobsCountSpan p-2 ml-2"></span>
                                        </td>
                                        {{-- <td colspan="4"></td> --}}
                                    </tr>
                                </tfoot>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        @csrf
                    </form>
                </div>
                <div class="tab-pane" id="btnAllInvoices" role="tabpanel" aria-labelledby="btnAllInvoicesTab">
                    <div class="datatable table-responsive">
                        <table class="table table-striped DataTable">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Invoice #</th>
                                    <th>Created At</th>
                                    <th>Invoice Amount</th>
                                    <th>Paid Amount</th>
                                    {{-- <th>Type</th> --}}
                                    {{-- <th>Limit</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($invoices) && $invoices->count()>0 )
                                @foreach ($invoices as $item)
                                @php
                                $b1id = "inv-".Str::uuid();
                                @endphp
                                <tr>
                                    <td>
                                        <span>
                                            @if($u->hasRole(\App\Role::ADMIN_ROLE_EDIT_INVOICE) || $u->is_superuser)
                                            <a href="{{route('job.customer.invoice.details', ['id' => $client->id, 'inv' => $item->id])}}" class="mr-2">
                                                <i class="fas fa-info"></i> info
                                            </a>
                                            @endif
                                            <a href="{{ route('job.customer.invoice.print', [ 'id' => $client->id, 'inv' => $item->id ]) }}" class="mr-2" target="_blank"  >
                                                <i class="fa fa-print"></i> print
                                            </a>
                                        </span>
                                        <!--
                                            <span>
                                                <div class="dropup">
                                                    <button
                                                        class="btn btn-datatable btn-icon btn-transparent-dark mr-2 x-dropdown-toggle"
                                                        id="{{$b1id}}" type="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false"><i
                                                            data-feather="more-vertical"></i></button>
                                                    <div class="dropdown-menu" aria-labelledby="{{$b1id}}">
                                                        <a class="dropdown-item"
                                                            href="{{route('job.customer.edit',['id' => $item->id ])}}">Edit</a>
                                                        <a class="dropdown-item"
                                                            href="{{route('job.customer.invoices',['id' => $item->id ])}}">Invoices</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                    </div>
                                                </div>

                                            </span>
                                        -->
                                    </td>
                                    <td>{!! $item->slno_gen !!}</td>
                                    <td>{!! $item->created_at->format('d/m/Y') !!}</td>
                                    <td>{!! $item->invoice_amount_f !!}</td>
                                    <td>{!! $item->paid_amount_f !!}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6">
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
    </div>
</div>
</div>
@endsection


@push('styles')
<style>
    .data-field {
        border: 2pt dashed #ccc;
        border-radius: 5px;
        margin-top: 3px;
        padding: 0.25em;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function () {
       $(document).on('change','.eachUnInvoicedJobCb',function () {
           var allChkd = $(".eachUnInvoicedJobCb").length == $(".eachUnInvoicedJobCb:checked").length;
           var selcCount =  $(".eachUnInvoicedJobCb:checked").length;
           $("#selectAllUnInvJbsCB").prop('checked', allChkd);
           if($(".eachUnInvoicedJobCb").length>0 && $(".eachUnInvoicedJobCb:checked").length>0) {
               $(".createInvoiceBtn").removeClass('disabled').removeAttr("disabled");
            }
           else {
               $(".createInvoiceBtn").addClass('disabled').attr("disabled", "disabled");
            }
            $('.jobsCountSpan').text(`${selcCount} Jobs Selected.`);
       }).change();
       $(document).on('change','#selectAllUnInvJbsCB',function () {
           $(".eachUnInvoicedJobCb").prop('checked', this.checked)
           .first().change();
       });
    });

    function validateInvoiceCreateFormSubmit() {
        if($(".eachUnInvoicedJobCb").length>0 && $(".eachUnInvoicedJobCb:checked").length>0) {
            return confirm(`Are you sure to create invoice with selected jobs???`);
        }
        return false;
    }
</script>
<script>
    $(document).ready(function(){

    });

    function slug(strText) {
        var outStr = strText.replace(/[^a-zA-Z0-9-]/ig,'-');
        outStr = outStr.split('-').filter(Boolean).join('-').toLowerCase();
        return outStr;
    }

</script>
<script>
    $(document).ready(function () {
       $(document).on('change','.data-field-option-value',function () {
           var parent = $(this).parents('.data-field-option').first();
           parent.find('.data-field-option-key').val(slug($(this).val()));
       });

       //
       $(document).on('change','.data-field-title',function () {
           var parent = $(this).parents('.data-field').first();
           parent.find('.data-field-slug').val(slug($(this).val()));
       });


    });
</script>
<script>
    $(document).ready(function () {
        // $('.DataTable').DataTable();
    })
</script>
@endpush
