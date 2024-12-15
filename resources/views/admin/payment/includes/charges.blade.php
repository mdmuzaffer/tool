@extends('admin.payment.payment')

@section('tab-content')
@php
$pym=Auth::guard('admin')->user();
@endphp
<div id="" class=" tab-pane fade"><br>

</div>
<div id="" class=" tab-pane fade"><br>

</div>
<div id="charges" class=" tab-pane active p-2">
    <h3>Customer Charges </h3>
    <br>
    <form action="{{ route('admin.payment.charges.post',['Customer' => $Customer->id]) }}" method="POST"
        onsubmit="return confirm('Are You Sure??')">
        @csrf

        <input type="hidden" name="chksmu" value="{{$u->chksm}}" />
        <input type="hidden" name="chksmc" value="{{$Customer->chksm}}" />
        <div class="form row">
            <div class="form-group col-md-4">
                <label for="" class="col-md-12">Date</label>
                <div class="col-md-12">
                    <input class="form-control form-control-line datepicker" type="text" data-provide="datepicker"
                        data-date-format="dd/mm/yyyy" placeholder="Charge Date" name="charge_date"
                        value="{{ date('d/m/Y') }}" required>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-md-12">Amount</label>
                <div class="col-md-12">
                    <input class="form-control" type="text" placeholder="₹" textmode="Number" id="ch_am"
                        name="charge_amount" pattern="^[0-9]+(\.?[0-9]+)?$" required>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-md-12">Payment Head</label>
                <div class="col-md-12">
                    @php
                    $allpymhead = $pym->Paymentheads;
                    @endphp
                    <select class="form-control" name="payment_head" id="">
                        <option>Select</option>
                        @foreach ($allpymhead as $pymhead)
                        <option value="{{$pymhead->id}}">{{$pymhead->title}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="description" class="col-md-12">Description</label>
                <div class="col-md-12">
                    <textarea class="form-control" name="charge_description" id="" cols="30" rows="2" required></textarea>

                </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <input type="checkbox" onclick="showpayment();" id="showPaymentOption" name="has_payment"> <label
                for="showPaymentOption">Also
                create a payment</label>
        </div>
        <div id="paymentdiv" style="display: none;">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="paymentmode" class="col-md-12">Payment Mode</label>
                    <div class="col-md-12">
                        @php
                        $allpymmode = $pym->Paymentmodes;
                        @endphp
                        <select class="form-control" name="payment_mode" id="">
                            {{-- <option>Select</option> --}}
                            @foreach ($allpymmode as $pymmode)
                            <option value="{{$pymmode->id}}">{{$pymmode->title_formatted}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="paymentamount" class="col-md-12">Payment Amount</label>
                    <div class="col-md-12">
                        <input class="form-control" type="text" id="$payment_amount" name="payment_amount"
                            placeholder="₹" pattern="^[0-9]+(\.?[0-9]+)?$">
                    </div>
                </div>
            </div>

            <div class="form-group col-md-12">
                <input type="checkbox" onclick="showdiscountamount();" id="showDiscountOption" name="has_discount">
                <label for="showDiscountOption">Add discount</label>
            </div>
            <div id="showdiscount" style="display: none;">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="discountamount" class="col-md-12">Discount Amount</label>
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="discount_amount" id="discount_amount"
                                pattern="^[0-9]+(\.?[0-9]+)?$">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="discountdescription" class="col-md-12">Discount Description</label>
                        <div class="col-md-12">
                            <textarea class="form-control" name="discount_description" id="" cols="30"
                                rows="2"></textarea>
                        </div>
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
        $customer_charges = $Customer->Charges;
        // dd( $customer_charges);
        @endphp
        <table class="table table-stripped text-center">
            <thead>
                <tr>
                    <th>SL NO.</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Payment Head</th>
                    <th>Charged By</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer_charges as $chrge)
                <tr>
                    <td>{{$chrge->slno_gen}}</td>
                    <td>{{$chrge->date_of_action->format('d/m/Y')}}</td>
                    <td>{{$chrge->description}}</td>
                    <td>{{$chrge->amount}}</td>
                    <td>{{$chrge->PaymentHead? $chrge->PaymentHead->title:""}}</td>
                    <td>{!! $chrge->received_by_html !!}</td>
                    <td>
                        <span>
                            <form
                                action="{{route('admin.payment.charge.cancel.post',[ 'Customer' => $chrge->internet_client_id,'Charge' => $chrge->id ])}}"
                                method="POST" onsubmit="return confirm('Are You Sure?')">
                                @csrf
                                <input type="hidden" name="cid" value="{{$chrge->internet_client_id}}">
                                <input type="hidden" name="pyid" value="{{$chrge->id}}">
                                <input type="hidden" name="chksmc" value="{{$chrge->Customer->chksm}}">
                                <input type="hidden" name="chksmp" value="{{$chrge->chksm}}">
                                <button type="submit" class="btn btn-danger brn-sm">Cancel</button>
                            </form>
                        </span>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <script>
        function showpayment() {
            var show = showPaymentOption.checked;
           var paymentval = document.getElementById('paymentdiv');
           if(showPaymentOption.checked){
            // paymentval.style.display='block';
            $("#payment_amount").attr('required','required');
            $(paymentval).show('slow');
        }
        else{
            // paymentval.style.display='none';
            $(paymentval).hide('slow');
            $("#payment_amount").removeAttr('required');
           }
        }
        function showdiscountamount() {
            var add = showDiscountOption.checked;
           var discountval = document.getElementById('showdiscount');
           if(showDiscountOption.checked){
            // discountval.style.display='block';
            $("#discount_amount").attr('required','required');

            $(discountval).show('slow');
        }
        else{
            // element.style.display='none';
            $(discountval).hide('slow');
            $("#discount_amount").removeAttr('required');
           }
        }

        $(document).ready(function(){
        $('#ch_am').change(function(){
            var disam = $('#$payment_amount');
            if(!disam.is('[chgd]')){
                disam.val(this.value);
            }
        });
            $('#payment_amount').change(function(){
                $(this).attr('chgd',1);
            });
    });
    </script>
</div>
<div id="" class=" tab-pane fade"><br>

</div>
<div id="" class=" tab-pane fade"><br>

</div>
@endsection
