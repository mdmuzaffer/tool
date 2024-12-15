@extends('admin.payment.payment')

@section('tab-content')
@php
$pym = Auth::guard('admin')->user();
$apiDateText = Carbon::parse($cuDet->enddate)->format('d/m/Y');
@endphp

<div id="" class="container-fluid tab-pane fade"><br></div>
<div id="payements" class="container-fluid tab-pane active p-2">
    {{-- @dump(compact('Customer','ApiPackages','Packages','isApiLoaded','cuDet')) --}}
    <h3>Advance Payments</h3>
    <br>
    <form action="{{ route('admin.payment.payment.post', ['Customer' => $Customer->id]) }}" method="POST"
        id="check-due-form" onsubmit="return confirm('Are You Sure??')">
        @csrf

        <input type="hidden" name="chksmu" value="{{$u->chksm}}" />
        <input type="hidden" name="chksmc" value="{{$Customer->chksm}}" />
        <input type="hidden" name="apidate" value="{{encrypt($apiDateText)}}" />
        <h5> <span class="small"> <span class="badge badge-success small">API</span></span> Current Package Expiry Date
            {{$apiDateText}}</h5>
        <div class="form row">
            <div class="form-group col-md-12">
                <label for="internet_package_id" class="col-md-12">Package</label>
                <div class="col-md-12">
                    <select class="form-control" name="internet_package_id" id="internet_package_id">
                        <option value="">Select</option>
                        @foreach ($Packages as $pkg)
                        <option value="{{$pkg->id}}"
                            data-has-ip-bill-package="{{$pkg->has_ip_bill_package?'true':'false'}}"
                            {{$pkg->has_ip_bill_package?'':'disabled="disabled"'}}>
                            {{$pkg->title_formatted_with_ip_bill}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- <div class="form-group col-md-6">
                <label for="" class="col-md-12">Payment Amount <span style="color: red;"
                        class="mandatoryClass">*</span></label>
                <div class="col-md-12">
                    <input required class="form-control" type="text" placeholder="₹" textmode="Number"
                        pattern="^[0-9]+(\.?[0-9]+)?$" name="payment_amount">
                    <span class="small">Numeric Only</span>
                </div>
            </div> --}}


            <div class="form-group col-md-4">
                <label for="periods_count" class="col-md-12">Months/Periods</label>
                <div class="col-md-12">
                    <select class="form-control" name="periods_count" id="periods_count">
                        {{-- <option value="">Select</option> --}}
                        @foreach ($mnths as $m)
                        <option value="{{$m->value}}">
                            {{$m->text}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="discount_amount" class="col-md-12">Discount<span style="color: red;"
                        class="mandatoryClass">*</span></label>
                <div class="col-md-12">
                    <input required class="form-control" type="text" placeholder="₹" textmode="Number"
                        pattern="^[0-9]+(\.?[0-9]+)?$" name="discount_amount" id="discount_amount" value="0">
                    <span class="small">Numeric Only</span>
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="charge_amount" class="col-md-12">Extra Charge <span style="color: red;"
                        class="mandatoryClass">*</span></label>
                <div class="col-md-12">
                    <input required class="form-control" type="text" placeholder="₹" textmode="Number"
                        pattern="^[0-9]+(\.?[0-9]+)?$" name="charge_amount" id="charge_amount" value="0">
                    <span class="small">Numeric Only</span>
                </div>
            </div>

            <div class="form-group col-md-4 ">
                <label for="is_gst_enabled" class="col-md-12 col-md-6">Is GST Enabled</label>
                <div class="col-md-12">

                    <input type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled"
                        data-onstyle="success" data-offstyle="danger" data-width="10rem" value="1" data-value="1"
                        name="is_gst_enabled" id="is_gst_enabled" />

                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="" class="col-md-12">Payment Mode <span style="color: red;"
                        class="mandatoryClass">*</span></label>
                <div class="col-md-12">
                    @php
                    $allpymmode=$pym->Paymentmodes;
                    @endphp
                    <select class="form-control" name="payment_mode" id="payment_mode">
                        <option value="">Select</option>
                        @foreach ($allpymmode as $pymode)
                        <option value="{{$pymode->id}}">{{$pymode->title_formatted}}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="form-group col-md-4">
                <label for="payment_date" class="col-md-12">Payment Date <span style="color: red;"
                        class="mandatoryClass">*</span></label>
                <div class="col-md-12">
                    <input class="form-control form-control-line datepicker" type="text" data-provide="datepicker"
                        data-date-format="dd/mm/yyyy" placeholder="Payment Date" name="payment_date" id="payment_date"
                        value="{{ date('d/m/Y') }}" required>
                </div>
            </div>



            <div class="form-group col-md-12">
                <label for="payment_description" class="col-md-12">Description </label>
                <div class="col-md-12">
                    <textarea class="form-control" name="payment_description" id="payment_description" cols="30"
                        rows="2" required></textarea>
                </div>
            </div>
        </div>

        {{-- <div class="form-group col-md-12">
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
                        <input class="form-control" type="text" name="discount_dscription">
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-12 text-center mb-5">
            <button type="button" class="btn btn-primary w-25" id="chkPaymentInfoBtn">Check Payment Info</button>
            {{-- <button type="submit" class="btn btn-primary w-25">Take Payment</button> --}}
        </div>

    </form>

    <div class="table-responsive d-none">
        @php
        $customer_payments = collect([]);
        // $customer_payments = $Customer->Payments;
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

    <div id="modalContainer">

    </div>
</div>

<link href="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bs4ts/css/bootstrap4-toggle.css" rel="stylesheet" />
<script src="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bs4ts/js/bootstrap4-toggle.js"></script>

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

<script>
    function getFormDataObject() {
        var context = $('#check-due-form');

        var obj = {};
        var arr = context.serializeArray();
        arr.forEach(function (d) {
            obj[d.name]= d.value;
        });
        obj.is_gst_enabled = context.find("#is_gst_enabled:checkbox").is(":checked");
        var form_keys = arr.map(v => v.name);
        obj['form_input_keys'] = [...form_keys, 'is_gst_enabled'];
        return obj;
    }
    function removeAllErrorTexts() {
        var context = $('#check-due-form');
        context.find(".error-text").remove();
        context.find(":input.has-error").each((i,v) => $(v).removeClass("has-error").removeClass("border").removeClass("border-danger"));
    }
    var URLS = @json($urlsObj);
    $(document).ready(function () {
        $("#chkPaymentInfoBtn").click(function () {
        var context = $('#check-due-form');

            var ob = getFormDataObject();
            axios.post(URLS.checkPaymentInfo,ob)
            // .then(res => res.json())
            .then(function (res) {
                return res.data;
            })

            .then(function (data) {
                console.log(data);

                if (data.error) {

                } else {
                    $("#modalContainer").empty().append(data.html);
                }
            })
            .catch(function (e) {
                // console.log(e.response);
                var errors = e.response.data.errors;
                var errorKeys = Object.keys(errors);
                removeAllErrorTexts();
                if(errorKeys.length>0){
                    errorKeys.forEach(function (v) {
                        var elem = context.find(`#${v}`);
                        elem.addClass("has-error border border-danger")
                        errors[v].forEach(function (msg) {
                            elem.parent().append(`<div class="error-text text-danger">${msg}</div>`);
                        });

                        // elem.parent().append(`<div class="error-text teext-danger">${errors[v][0]}</div>`);
                    });
                    context.find(`#${errorKeys[0]}`)[0].scrollIntoView();
                }
            })
            //
            ;
            // fetch(URLS.checkPaymentInfo,{
            //     "method":"POST",
            //     headers:{
            //         "Content-Type":"application/json;utf-8"
            //     },
            //     body:JSON.stringify(ob)
            // }).catch(console.log).then(res => res.text()).then(console.log);
        });
    });
</script>

<div id="" class="container-fluid tab-pane fade"><br>

</div>
<div id="" class="container-fluid tab-pane fade"><br>

</div>
<style>
    option[data-has-ip-bill-package="true"] {
        color: green;
    }

    option[data-has-ip-bill-package="false"] {
        color: rgba(201, 79, 79, 0.7215686274509804);
        opacity: 0.6;
    }
</style>
@endsection
