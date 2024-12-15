@extends('admin.layouts.blank')

@section('content')

<div class="container-fluid">
    <h3>Packages of all customer</h3>
    @php
          $allcutomer = $u->Customer;
    @endphp


    {{-- @dump($u) --}}
    @dump($allcutomer)
    <div class="table-responsive">
        <table class="table table-striped text-center table-fit-to-content">
            <th>Customer Id</th>
            <th>Customer Name</th>
            <th>Customer Address </th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone 1</th>
            <th>Phone 2</th>
            <th>Isp User Name</th>
            <th>Isp Password </th>
            <th> Isp Local Ip</th>
            <th>Isp Local Mac</th>
            <th>Package</th>
            <th>Area</th>
            <th>Staff</th>
            <th>Is Active</th>
            <th>Start Date</th>
            <th>Billing Account</th>
            <th>GST Included</th>
            <th>GSTIN</th>
        </table>
    </div>
</div>

@endsection
