@extends('admin.payment.payment')

@section('tab-content')
@php
$pym = Auth::guard('admin')->user();

@endphp

<div id="" class="container-fluid tab-pane fade"><br>

</div>
<div id="payements" class="container-fluid tab-pane active p-2">
    <h3>Customer Payments</h3>
    <br>
    <form action="{{ route('admin.payment.payment.post',['Customer' => $Customer->id]) }}" method="POST"
        onsubmit="return confirm('Are You Sure??')">
        @csrf

        <input type="hidden" name="chksmu" value="{{$u->chksm}}" />
        <input type="hidden" name="chksmc" value="{{$Customer->chksm}}" />
        <div class="form row">
            <div class="form-group col-md-6">
                <label for="" class="col-md-12">Payment Date <span style="color: red;"
                        class="mandatoryClass">*</span></label>
                <div class="col-md-12">
                    <input class="form-control form-control-line datepicker" type="text" data-provide="datepicker"
                        data-date-format="dd/mm/yyyy" placeholder="Payment Date" name="payment_date"
                        value="{{ date('d/m/Y') }}" required>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="" class="col-md-12">Payment Amount <span style="color: red;"
                        class="mandatoryClass">*</span></label>
                <div class="col-md-12">
                    <input required class="form-control" type="text" placeholder="₹" textmode="Number"
                        pattern="^[0-9]+(\.?[0-9]+)?$" name="payment_amount">
                    <span class="small">Numeric Only</span>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="paymenthead" class="col-md-12">Payment Head <span style="color: red;"
                        class="mandatoryClass">*</span></label>
                <div class="col-md-12">
                    @php
                    $allpayments = $pym->Paymentheads;
                    @endphp
                    <select class="form-control" name="payment_head" id="">
                        <option value="-1">Select</option>
                        @foreach ($allpayments as $payhead)
                        <option value="{{$payhead->id}}">{{$payhead->title_formatted}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="" class="col-md-12">Payment Mode <span style="color: red;"
                        class="mandatoryClass">*</span></label>
                <div class="col-md-12">
                    @php
                    $allpymmode=$pym->Paymentmodes;
                    @endphp
                    <select class="form-control" name="payment_mode" id="">
                        <option value="-1">Select</option>
                        @foreach ($allpymmode as $pymode)
                        <option value="{{$pymode->id}}">{{$pymode->title_formatted}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="description" class="col-md-12">Description </label>
                <div class="col-md-12">
                    <textarea class="form-control" name="payment_description" id="" cols="30" rows="2" required></textarea>
                </div>
            </div>
        </div>

        <div class="form-group col-md-12">
            <input type="checkbox" onclick="showdiscountamount();" id="ShowAmountOption" name="has_discount" value="1">
            <label for="ShowAmountOption"> Add discount</label>
        </div>
        <div class="check box" id="showdiv" style="display: none">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="discountamount" class="col-md-12">Discount Amount <span style="color: red;"
                            class="mandatoryClass">*</span></label>
                    <div class="col-md-12">
                        <input class="form-control" type="text" name="discount_amount" placeholder="₹"
                            pattern="^[0-9]+(\.?[0-9]+)?$">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="discountdescription" class="col-md-12">Discount Description <span style="color: red;"
                            class="mandatoryClass">*</span></label>
                    <div class="col-md-12">
                        <input class="form-control" type="text" name="discount_dscription" >
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 text-center mb-5">
            <button type="submit" class="btn btn-primary w-25">Take Payment</button>
        </div>

    </form>

    <div class="table-responsive">
        @php
        $customer_payments = $Customer->Payments;
        // $customer_payments->Payments->get();
        // dd($customer_payments);
        @endphp
        <table class="table table-striped text-center table-fit-to-content">
            <thead>
                <tr>
                    <th>SL NO.</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Payment Method</th>
                    <th>Received By</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($customer_payments as $pymnts)
                <tr>
                    <td>{{$pymnts->slno_gen}}</td>
                    <td>{{$pymnts->date_of_action->format('d/m/Y')}}</td>
                    <td>{{$pymnts->amount}}</td>
                    <td>{{$pymnts->description}}</td>
                    <td>{{$pymnts->PaymentMode? $pymnts->PaymentMode->title:""}}</td>
                    <td>{!! $pymnts->received_by_html !!}</td>
                    <td>
                        <span>
                            <form
                                action="{{route('admin.payment.payment.cancel.post',[ 'Customer' => $pymnts->internet_client_id,'Payment' => $pymnts->id ])}}"
                                method="POST" onsubmit="return confirm('Are You Sure?')">
                                @csrf
                                <input type="hidden" name="cid" value="{{$pymnts->internet_client_id}}">
                                <input type="hidden" name="pyid" value="{{$pymnts->id}}">
                                <input type="hidden" name="chksmc" value="{{$pymnts->Customer->chksm}}">
                                <input type="hidden" name="chksmp" value="{{$pymnts->chksm}}">
                                <button type="submit" class="btn btn-danger brn-sm">Cancel</button>
                            </form>
                        </span>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>
<script>
    // $(document).ready(function() {
    //     $('#checkdiscount').click(function() {
    //
    //         $('#showdiv').toggle();
    //     });
    // });
    function showdiscountamount() {
        var show = ShowAmountOption.checked;
        var element=document.getElementById('showdiv');
        if(ShowAmountOption.checked){
            // element.style.display='block';
            $(element).show('slow');
        }
        else{
            // element.style.display='none';
            $(element).hide('slow');
        }
    }

</script>
<div id="" class="container-fluid tab-pane fade"><br>

</div>
<div id="" class="container-fluid tab-pane fade"><br>

</div>

@endsection
