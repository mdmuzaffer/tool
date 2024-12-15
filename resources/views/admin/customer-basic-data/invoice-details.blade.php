@extends('admin.layouts.blank')
@section('title')
Invoice - {{$invoice->slno_gen}}
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Invoice - {{$invoice->slno_gen}}</span>
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
            <div class="col-md-2">
                <small class="small ">Actions</small>
                <p class="small">
                    @if($u->hasRole(\App\Role::ADMIN_ROLE_TAKING_CASH_PAYMENT_FROM_CLIENTS) || $u->is_superuser)
                    <a href="{{ route('job.customer.invoice.payments', [ 'id' => $client->id, 'inv' => $invoice->id ]) }}" class="text mr-1"> <i class="fa fa-credit-card"></i> Payments</a>
                    @endif
                    <a href="{{ route('job.customer.invoice.print', [ 'id' => $client->id, 'inv' => $invoice->id ]) }}" class="text mr-1" target="_blank"> <i class="fa fa-print"></i> Print</a>
                </p>
            </div>
        </div>

        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Job Type</td>
                            <td>Job ID</td>
                            <td>Status</td>
                            <td>Price</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice->Jobs as $indx => $job)
                        <tr>
                            <td>{{$indx+1}}</td>
                            <td>{{$job->job_title}}</td>
                            <td>{{$job->slno_gen}}</td>
                            <td>{{$job->status}}</td>
                            <td>{{$job->price_f}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-right">Total</td>
                            <td colspan="1">{{$invoice->job_total_amount_f}}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">Discount</td>
                            <td colspan="1"> <i class="text-danger">-</i> {{$invoice->discount_amount_f}}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">Payable</td>
                            <td colspan="1">{{$invoice->invoice_amount_f}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <form action="{{route('job.customer.invoice.update-basic.post',[ 'id' => $client->id, 'inv'=>$invoice->id ])}}"
            method="post" class="col-md-12">
            @csrf
            <div class="row">
                <div class="form-group col-4">
                    <label for="discount_amount">Change Discount Amount</label>
                    <input type="text" name="discount_amount" id="discount_amount" class="form-control"
                        value="{{$invoice->discount_amount}}">
                </div>
            </div>

            <div class="col-12 text-right p-2">
                <button type="submit" class="btn btn-primary"
                    @if(!$u->hasRole(\App\Role::ADMIN_ROLE_EDIT_INVOICE) || !$u->is_superuser) disabled @endif>
                    Save
                </button>
            </div>
        </form>
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

    function validateInvoiceCreateFormSubmit() {
        if($(".eachUnInvoicedJobCb").length>0 && $(".eachUnInvoicedJobCb:checked").length>0) {
            return true;
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
