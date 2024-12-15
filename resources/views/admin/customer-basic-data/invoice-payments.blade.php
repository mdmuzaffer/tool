@extends('admin.layouts.blank')
@section('title')
Invoice Payments
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Invoice Payments</span>
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

        <div class="row">
            <div class="col-md-2">
                <small class="small ">Invoice #</small>
                <p>{{$invoice->slno_gen}}</p>
            </div>
            <div class="col-md-2">
                <small class="small ">Total </small>
                <p>{{$invoice->job_total_amount_f}}</p>
            </div>
            <div class="col-md-2">
                <small class="small ">Discount </small>
                <p>{{$invoice->discount_amount_f}}</p>
            </div>
            <div class="col-md-2">
                <small class="small ">Payable </small>
                <p>{{$invoice->invoice_amount_f}}</p>
            </div>
            <div class="col-md-2">
                <small class="small ">Paid </small>
                <p>{{$invoice->paid_amount_f}}</p>
            </div>
            <div class="col-md-2">
                <small class="small ">Due </small>
                <p>{{$invoice->due_amount_f}}</p>
            </div>
            <div class="col-md-2">
                <small class="small ">Date</small>
                <p>{{$invoice->generated_at->format('d-M-Y')}}</p>
            </div>
            <div class="col-md-2">
                <small class="small ">Total Jobs </small>
                <p>{{$invoice->jobs_count}}</p>
            </div>
            <div class="col-md-2">
                <small class="small ">Total Payments </small>
                <p>{{$invoice->payments_count}}</p>
            </div>

            {{-- 
            <div class="col-md-2">
                <small class="small ">Actions</small>
                <p class="small">
                    <a href="{{ route('job.customer.invoice.payments', [ 'id' => $client->id, 'inv' => $invoice->id ]) }}"
            class="text mr-1">Payments</a>
            </p>
        </div>
        --}}

    </div>

    <div class="sbp-preview-code">
        <!-- Code sample-->
        <ul class="nav nav-tabs" id="buttonSizingIconsTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="btnTakePaymentTab" data-toggle="tab" href="#btnTakePayment" role="tab"
                    aria-controls="btnTakePayment" aria-selected="false">Take Payment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mr-1" id="btnAllPaymentsTab" data-toggle="tab" href="#btnAllPayments" role="tab"
                    aria-controls="btnAllPayments" aria-selected="true">Payment List</a>
            </li>
        </ul>
        <!-- Tab panes-->
        <div class="tab-content">
            <div class="tab-pane active" id="btnTakePayment" role="tabpanel" aria-labelledby="btnTakePaymentTab">

                <form
                    action="{{route('job.customer.invoice.payments.take.post',['id' => $client->id, 'inv' => $invoice->id ])}}"
                    method="post" class="p-3" onsubmit="return ValidateTakePayment()">
                    @csrf
                    <input type="hidden" name="cid" value="{{$client->id}}" />
                    <input type="hidden" name="iid" value="{{$invoice->id}}" />
                    <input type="hidden" name="ccksm" value="{{$client->chksm}}" />
                    <input type="hidden" name="icksm" value="{{$invoice->chksm}}" />
                    <div class="row">
                        @php
                            $payment_date = old('payment_date', now()->format('d/m/Y'));
                            $paid_amount = old('paid_amount', $invoice->due_amount);
                        @endphp
                        <div class="col-md-3 form-group">
                            <label for="payment_date">Date</label>
                            <input type="text" name="payment_date" id="payment_date" class="form-control datepicker"
                                data-provide="datepicker" data-date-format="dd/mm/yyyy"
                                value="{{$payment_date}}" required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="paid_amount">Amount</label>
                            <input type="number" name="paid_amount" id="paid_amount" class="form-control"
                                value="{{$paid_amount}}" min="0" step="1" max="{{$invoice->due_amount}}"
                                required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="description">Description</label>
                            <textarea type="number" name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Take Payment</button>
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="btnAllPayments" role="tabpanel" aria-labelledby="btnAllPaymentsTab">
                <div class="datatable table-responsive">
                    <table class="table table-striped DataTable">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Payment #</th>
                                <th>Created At</th>
                                <th>Paid At</th>
                                <th>Paid Amount</th>
                                {{-- <th>Type</th> --}}
                                {{-- <th>Limit</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($payments) && $payments->count()>0 )
                            @foreach ($payments as $item)
                            @php
                            $b1id = "pym-".Str::uuid();
                            @endphp
                            <tr>
                                <td>
                                    
                                    <a href="{{ route('job.customer.receipt.print', [ 'id' => $client->id, 'pym' => $item->id ]) }}" class="mr-2" target="_blank"  >
                                        <i class="fa fa-print"></i> print
                                    </a>
                                    <!--
                                    <span>
                                        <a href="{{route('job.customer.invoice.details', ['id' => $client->id, 'inv' => $item->id])}}"
                                            class="btn btn-icon btn-info">
                                            <i class="fas fa-info"></i>
                                        </a>
                                    </span>
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
                                <td>{!! $item->payment_date->format('d/m/Y') !!}</td>
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
           $("#selectAllUnInvJbsCB").prop('checked', allChkd);
           if($(".eachUnInvoicedJobCb").length>0 && $(".eachUnInvoicedJobCb:checked").length>0) {
               $(".createInvoiceBtn").removeClass('disabled').removeAttr("disabled");
            }
           else {
               $(".createInvoiceBtn").addClass('disabled').attr("disabled", "disabled");
            }
       }).change();
       $(document).on('change','#selectAllUnInvJbsCB',function () {
           $(".eachUnInvoicedJobCb").prop('checked', this.checked)
           .first().change();
       });
    });

    function ValidateTakePayment() {
        var amt = $("#paid_amount").val();
        amt = Number(amt);
        if(isNaN(amt)) return false;
        else if(amt < 0) return false;
        else return confirm("Are You Sure To Submit???");
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