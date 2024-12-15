@extends('admin.layouts.blank')

@section('content')

@php

$bilpag = Auth::guard('admin')->user();

@endphp

<div class="container-fluid">
    {{-- @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $msg)
            <li>{{$msg}}</li>
    @endforeach
    </ul>
    @endif --}}
    <h3>Create Package</h3>
    <a class="btn btn-primary" href="{{route('admin.packages.get')}}">Back</a>

    <form action="{{route('admin.packages.newpackagesaddsv')}}" method="POST">
        @csrf
        <div class="form-row">
            {{-- <div class="form-group col-md-6">
                <label for="isp" class="col-md-12 col-md-6">ISP</label>
                <div class="col-md-12">
                    <select class="form-control" name="" id="">
                        <option value="">Alliance Broadband</option>
                        <option value="">Manthan Net</option>
                    </select>
                </div>
            </div> --}}
            <div class="form-group col-md-12">
                <label for="packagesname" class="col-md-12 col-md-6">Packages Name <span style="color: red;"
                        class="mandatoryClass">*</span></label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="package_name" value="{{old('package_name')}}">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="limitcategory" class="col-md-12 col-md-6">Limit Category</label>
                <div class="col-md-12">
                    <select class="form-control" name="package_category" id="">
                        {{-- <option>Select</option> --}}

                        <option value="unlimited" @if (old('package_category')=='unlimited' ) selected="selected"
                            @endif>UNLIMITED</option>
                        <option value="limited" @if (old('package_category')=='limited' ) selected="selected" @endif>
                            LIMITED</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="speedandlimit" class="col-md-12 col-md-6">Speed And Limit</label>
                <div class="col-md-12">
                    <input class="form-control" name="package_limit_text" type="text"
                        placeholder="'5mbps' or '3mbps, 30GB'" value="{{old('package_limit_text')}}">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="durationindays" class="col-md-12 col-md-6">Duration In Days</label>
                <div class="col-md-12">
                    <input class="form-control" name="package_duration_days" type="number"
                        placeholder="Package Duration" min="1" value="{{old('package_duration_days', 30)}}">
                </div>
            </div>
            <div class="form-group  col-md-4">
                <label for="durationtext" class="col-md-12 col-md-6">Duration Text</label>
                <div class="col-md-12">
                    <input class="form-control" name="package_duration_text" type="text"
                        placeholder="'One Month' or '3 months'" value="{{old('package_duration_text')}}">
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="isactive" class="col-md-12 col-md-6">Is Active</label>
                <div class="col-md-12">

                    @php

                    $isac=empty(old())?1:old('is_active')=='1'?1:0;
                    // $request=request();
                    // $isac=empty(old())?1:($request->is_active?1:0);

                    // $isac=$request->is_active?1:0;
                    @endphp

                    <input @if ($isac==1) checked="checked" @endif class="form-control" name="is_active" type="checkbox" data-toggle="toggle" data-on="Active"
                        data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-width="10rem"  value="1" data-value="{{old('is_active')}}">

                </div>

            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="packagedescription" class="col-md-12 col-sm-6">Packages Description</label>
                <div class="col-md-12">
                    <textarea name="package_description" id="" cols="20" rows="2"
                        class="form-control">{{old('package_description')}}</textarea>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="price" class="col-md-12">Price</label>
                <div class="col-md-12">
                    <input class="form-control" name="price" id="UnfilterdPrice_TXT" type="text" placeholder="₹"
                        value="{{old('price')}}">
                </div>
            </div>
            <div class="form=group col-md-4">
                <label for="isgstincluded" class="col-md-12">Is GST Included</label>
                <div class="col-md-12">
                    <input class="form-control" id="IsGSTIncluded_CB" type="checkbox" checked="checked"
                        data-toggle="toggle" data-on="GST Included" data-off="GST Excluded" data-onstyle="success"
                        data-offstyle="danger" data-width="10rem">
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="price" class="col-md-12">Select Ip Bill Packages</label>
                <div class="col-md-12">
                    @php
                    $allipbillpackages = $bilpag->IpBillPackages;
                    @endphp
                    {{-- @dump($allipbillpackages) --}}
                    {{-- @dump($bill_pack->id) --}}
                    <select name="ipbill_package_rid" id="" class="form-control">
                        <option value="">Select</option>
                        @foreach ($allipbillpackages as $bill_pack)
                        <option value="{{$bill_pack->rid}}"
                            {{ (collect(old('ipbill_package_rid'))->contains($bill_pack->rid)) ? 'selected':'' }}>
                            {{$bill_pack->name}} [id: {{$bill_pack->id}}]</option>
                        @endforeach

                    </select>

                </div>
            </div>
            {{-- <div class="form-group col-md-4">
                <label for="lcocommision/lcopart">LCO Commision/LCO Part(₹)</label>
                <div class="col-md-12">
                    <input class="form-control" id="" type="text" placeholder="₹">
                </div>
            </div> --}}
        </div>
        <div class="row disabled-controls">
            <div class="col-12">
                <div class="border border-0 m-2 p-1 small">
                    <div class="row" style="position: relative;">
                        <div style="position: absolute; height: 100%; width: 100%; top: 0; left: 0; z-index: 5;">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pricetext" class="col-md-12">Price<small><small><b>(Without
                                            GST)</b></small></small></label>
                            <div class="col-md-12">
                                <input type="text" name="package_amount_wo_tax" id="Price_TXT" class="form-control"
                                    placeholder="₹" />
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="gstpricetxt" class="col-md-12">Price<small><small><b>(With
                                            GST)</b></small></small></label>
                            <div class="col-md-12">
                                <input type="text" name="package_amount_w_tax" id="GSTPrice_TXT" class="form-control"
                                    placeholder="₹" />
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="gstamounttext" class="col-md-12">GST Amount</label>
                            <div class="col-md-12">
                                <input type="text" name="package_amount_tax_rate" id="GSTAmt_TXT" class="form-control"
                                    placeholder="₹" />
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="gstratetxt" class="col-md-12">GST Rate <small><b>(%)</b></small></label>
                            <div class="col-md-12">
                                <input type="text" name="package_amount_tax_amount" id="GSTRate_TXT"
                                    class="form-control" placeholder="₹" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>

<div class="col-12 text-center">
    <button class="btn btn-success w-25 m-auto" type="submit">Save</button>
</div>
<script type="text/javascript">
    var GSTObject = { CGST: 9.00, SGST: 9.00, IGST: 18.00 };
        // Object.lock(GSTObject);
        $(document).ready(function () {
            // _priceWoGST_Saved_txt  _priceWGST_Saved_txt  _gstAmt_Saved_txt  _gstRate_Saved_txt
            // Price_TXT  GSTPrice_TXT  GSTAmt_TXT  GSTRate_TXT
            // UnfilterdPrice_TXT IsGSTIncluded_CB
            $("#UnfilterdPrice_TXT,#IsGSTIncluded_CB").change(function () {
                //debugger;
                var GSTRate = (GSTObject.CGST + GSTObject.SGST);
                var isGstIncluded = $("#IsGSTIncluded_CB").is(":checked");
                var RawPrice = $("#UnfilterdPrice_TXT").val().TryParseFloat(0);
                var PriceWithoutGST, PriceWithGST, GSTAmt;
                if (isGstIncluded) {
                    PriceWithGST = RawPrice;
                    GSTAmt = PriceWithGST / (1 + (1 / (GSTRate / 100)));
                    PriceWithoutGST = PriceWithGST - GSTAmt;
                } else {
                    PriceWithoutGST = RawPrice;
                    GSTAmt = PriceWithoutGST * (GSTRate / 100);
                    PriceWithGST = PriceWithoutGST + GSTAmt;
                }
                PriceWithoutGST = PriceWithoutGST.toFixed(2).TryParseFloat(0);
                PriceWithGST = PriceWithGST.toFixed(2).TryParseFloat(0);
                GSTAmt = GSTAmt.toFixed(2).TryParseFloat(0);
                GSTRate = GSTRate.toFixed(2).TryParseFloat(0);

                var gstx = { PriceWithoutGST, PriceWithGST, GSTAmt, GSTRate };
                $("#Price_TXT").val(gstx.PriceWithoutGST);
                $("#GSTPrice_TXT").val(gstx.PriceWithGST);
                $("#GSTAmt_TXT").val(gstx.GSTAmt);
                $("#GSTRate_TXT").val(gstx.GSTRate);
            }).first().change();

        });
</script>
</form>

</div>


<link href="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bs4ts/css/bootstrap4-toggle.css" rel="stylesheet" />
<script src="//res.cloudinary.com/cblpay/raw/upload/webres/plg/bs4ts/js/bootstrap4-toggle.js"></script>
@endsection
