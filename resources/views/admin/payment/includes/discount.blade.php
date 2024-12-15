@extends('admin.payment.payment')

@section('tab-content')
<div id="" class="container-fluid tab-pane fade"><br>

</div>
<div id="" class="container-fluid tab-pane fade"><br>

</div>
<div id="" class="container-fluid tab-pane fade"><br>

</div>

<div id="" class="container-fluid tab-pane fade"><br>

</div>
<div id="discount" class="container-fluid tab-pane active p-2">
    <h3>Customer Discount</h3>
    <form action="">
        <div class="form-row">
            <div class="form-group col-md-6">
                 <label for="date" class="col-md-12">Date</label>
                 <div class="col-md-12">
                     <input class="form-control form-control-line datepicker" type="text" data-provide="datepicker"
                     data-date-format="dd/mm/yyyy" placeholder="Payment Date" name="discount_date" value="{{date('d/m/Y')}}" required>
                 </div>
            </div>
            <div class="form-group col-md-6">
                <label for="amount" class="col-md-12">Amount</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="discount_amount" placeholder="₹" pattern="^[0-9]+(\.?[0-9]+)?$" required>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="description" class="col-md-12">Description</label>
                <div class="col-md-12">
                    <textarea name="discount_description" id="" cols="30" rows="2" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="col-12 text-center mb-5">
            <input type="submit" class="btn btn-primary w-25" value="Take Discount">
        </div>
    </form>

</div>
@endsection
