<div class="modal " id="{{$ModalId}}">
    <div class="modal-dialog modal-lg" data-backdrop="static">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirmation!!!</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body p-5
            ">
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Package</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>GST</th>
                            <th>Charge</th>
                            <th>Discount</th>
                            <th>Total</th>
                            <th>IPBill Total</th>
                        </tr>
                    </thead>
                    @php
                    $cnt = 1;
                    @endphp
                    <tbody>
                        @foreach ($Packages as $pkg)
                        <tr>
                            <td>{{$cnt++}}</td>
                            <td>{{$pkg->package_name}}</td>
                            <td>{{$pkg->package_start_date_f}}</td>
                            <td>{{$pkg->package_end_date_f}}</td>
                            <td>{{$pkg->is_gst_bill?"Enabled":"Disabled"}}</td>
                            <td>₹{{number_format($pkg->charge_amount,2)}}/-</td>
                            <td>₹{{number_format($pkg->discount_amount,2)}}/-</td>
                            <td>₹{{number_format($pkg->bill_amount,2)}}/-</td>
                            <td>₹{{number_format($pkg->ipBillAmount,2)}}/-</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6"></td>
                            <td>Total</td>
                            <td>₹{{number_format($Total,2)}}/-</td>
                            <td>₹{{number_format($TotalIpBillAmt,2)}}/-</td>
                        </tr>
                    </tfoot>
                </table>

                <div class="m-2">
                    <div class="text-center">
                        <span class="h3">Total Payable Amount Is ₹{{number_format($Total,2)}}/-</span>
                    </div>
                </div>

                <form id="formxop" class=""
                    action="{{route('ajax.admin.payment.api.due.save',['Customer' => $Customer->id])}}" method="post"
                    data-onsubmit="return confirm('Are you sure to submit?')">
                    @csrf
                    <input type="hidden" name="chksmu" value="{{$u->chksm}}" />
                    <input type="hidden" name="chksmc" value="{{$Customer->chksm}}" />
                    {{-- <input type="hidden" name="v1" value="{{json_encode($options)}}" /> --}}
                    {{-- <input type="hidden" name="v2" value="{{encrypt(json_encode($options))}}" /> --}}
                    {{-- <input type="hidden" name="vx1" value="{{json_encode($sdata)}}" /> --}}
                    <input type="hidden" name="vx2" value="{{encrypt(json_encode($sdata))}}" />
                    {{-- <input type="hidden" name="vy2" value="{{encrypt(json_encode(""))}}" /> --}}
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                    <div class="d-none xloader text-center">

                        <div class="loadingio-spinner-ellipsis-we9lpkzd2j">
                            <div class="ldio-gqrwgq97ful">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                        <br>
                        <span class="h3 text-success">
                            Connecting to API... Working
                        </span>
                        <style type="text/css">
                            @keyframes ldio-gqrwgq97ful {
                                0% {
                                    transform: translate(12px, 80px) scale(0);
                                }

                                25% {
                                    transform: translate(12px, 80px) scale(0);
                                }

                                50% {
                                    transform: translate(12px, 80px) scale(1);
                                }

                                75% {
                                    transform: translate(80px, 80px) scale(1);
                                }

                                100% {
                                    transform: translate(148px, 80px) scale(1);
                                }
                            }

                            @keyframes ldio-gqrwgq97ful-r {
                                0% {
                                    transform: translate(148px, 80px) scale(1):
                                }

                                100% {
                                    transform: translate(148px, 80px) scale(0);
                                }
                            }

                            @keyframes ldio-gqrwgq97ful-c {
                                0% {
                                    background: #93dbe9
                                }

                                25% {
                                    background: #3b4368
                                }

                                50% {
                                    background: #5e6fa3
                                }

                                75% {
                                    background: #689cc5
                                }

                                100% {
                                    background: #93dbe9
                                }
                            }

                            .ldio-gqrwgq97ful div {
                                position: absolute;
                                width: 40px;
                                height: 40px;
                                border-radius: 50%;
                                transform: translate(80px, 80px) scale(1);
                                background: #93dbe9;
                                animation: ldio-gqrwgq97ful 1.5384615384615383s infinite cubic-bezier(0, 0.5, 0.5, 1);
                            }

                            .ldio-gqrwgq97ful div:nth-child(1) {
                                background: #689cc5;
                                transform: translate(148px, 80px) scale(1);
                                animation: ldio-gqrwgq97ful-r 0.3846153846153846s infinite cubic-bezier(0, 0.5, 0.5, 1), ldio-gqrwgq97ful-c 1.5384615384615383s infinite step-start;
                            }

                            .ldio-gqrwgq97ful div:nth-child(2) {
                                animation-delay: -0.3846153846153846s;
                                background: #93dbe9;
                            }

                            .ldio-gqrwgq97ful div:nth-child(3) {
                                animation-delay: -0.7692307692307692s;
                                background: #689cc5;
                            }

                            .ldio-gqrwgq97ful div:nth-child(4) {
                                animation-delay: -1.1538461538461537s;
                                background: #5e6fa3;
                            }

                            .ldio-gqrwgq97ful div:nth-child(5) {
                                animation-delay: -1.5384615384615383s;
                                background: #3b4368;
                            }

                            .loadingio-spinner-ellipsis-we9lpkzd2j {
                                width: 200px;
                                height: 200px;
                                display: inline-block;
                                overflow: hidden;
                                background: none;
                                transform: scale(0.35);
                            }

                            .ldio-gqrwgq97ful {
                                width: 100%;
                                height: 100%;
                                position: relative;
                                transform: translateZ(0) scale(1);
                                backface-visibility: hidden;
                                transform-origin: 0 0;
                                /* see note above */
                            }

                            .ldio-gqrwgq97ful div {
                                box-sizing: content-box;
                            }
                        </style>
                    </div>
                </form>
            </div>
            {{-- <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div> --}}

        </div>
    </div>
</div>

<script>
    (function($){
        $("#{{$ModalId}}").on('hidden.bs.modal', function(){
            $("#{{$ModalId}}").remove();
        }).modal({backdrop: "static"}).modal('show');

        $("#{{$ModalId}} form#formxop").on('submit',function (e) {
            e.preventDefault();
            // e.defaultPrevented
            var cnf = confirm("are you sure to do this?");
            if(cnf){
                var ob = getForm2DataObject();

                $(this).find(":input").remove();
                $(this).find(".xloader").removeClass('d-none');
                axios.post("{{route('ajax.admin.payment.api.due.save',['Customer'=> $Customer->id])}}",ob)
                .catch(function (res) {
                    console.log('error',res.data)
                // })
                .then(res => res.data)
                .then(function (dt) {
                    // console.log(dt);
                    // console.log(Object.keys(dt).length);

                    location.href="{{route('admin.payment.payment.get',['Customer'=>$Customer->id])}}";
                })
                ;
            }
        });

    })(jQuery);

    function getForm2DataObject() {
        var context = $('#{{$ModalId}} form#formxop');

        var obj = {};
        var arr = context.serializeArray();
        arr.forEach(function (d) {
            obj[d.name]= d.value;
        });
        // obj.is_gst_enabled = context.find("#is_gst_enabled:checkbox").is(":checked");
        // var form_keys = arr.map(v => v.name);
        // obj['form_input_keys'] = [...form_keys, 'is_gst_enabled'];
        return obj;
    }
</script>
