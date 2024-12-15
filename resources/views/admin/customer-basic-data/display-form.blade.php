@extends('admin.layouts.blank')
@section('title')
Add Client
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Add Client</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Client Details</div>
        <div class="card-body">

            {{-- error display  --}}
            {{-- <div class="container">
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <li> {{$error}} </li>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        @endforeach
                    </div>
                    @endif
            </div> --}}

            <div class="container">
                <div class="row">
                    <div class="col-md-8 m-auto">
                        <form action="{{route('job.customer.add.post')}}" method="post" id="form">
                            @csrf
                            <div class="form-group">

                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="fname">First Name</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="middle_name">Middle Name</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="lname">Last Name</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" name="fname" id="fname" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="mname" id="middle_name" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="lname" id="lname" class="form-control" required>
                                    </div>
                                </div>

                            </div>

                            <div id="PhoneField" class="mb-3">
                                <div class="form-group">
                                    <label for="primary_phone">Phone Number</label>
                                    <input type="phone" name="primary_phone" id="primary_phone" class="form-control mt-1" placeholder="Enter Primary Phone">
                                </div>
                                <input id="AddPhone" type="button" value=" + Add Another Phone" class="btn btn-link btn-sm  mt-1">
                            </div>


                            <div id="EmailIDField" class="mb-3">
                                <div class="form-group">
                                    <label for="primary_email">Email</label>
                                    <input type="email" name="primary_email" id="primary_email" class="form-control mt-1" placeholder="Enter Primary Email">
                                </div>
                                <input id="AddEmail" type="button" value=" + Add Another Email" class="btn btn-link btn-sm mt-1">
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="panno">PAN No.</label>
                                    <input type="text" name="panno" id="panno" class="form-control mt-1" placeholder="Enter PAN Number">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="fileno">File No.</label>
                                    <input type="text" name="fileno" id="fileno" class="form-control mt-1" placeholder="Enter File Number">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="address">Addess No.</label>
                                    <input type="text" name="address_line_1" id="address" class="form-control mt-1" placeholder="Enter Address Line 1">
                                    <input type="text" name="address_line_2" id="address" class="form-control mt-1" placeholder="Enter Address Line 2">
                                    <input type="text" name="address_line_2" id="address" class="form-control mt-1" placeholder="Enter Address Line 3">
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="city">City</label>
                                        <input type="text" name="city" id="city" class="form-control mt-1" placeholder="City">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="district">District</label>
                                        <input type="text" name="district" id="district" class="form-control mt-1" placeholder="District">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="state">State</label>
                                        <input type="text" name="state" id="state" class="form-control mt-1" placeholder="State">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="po">Post Office</label>
                                        <input type="text" name="po" id="po" class="form-control mt-1" placeholder="Post Office">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="ps">Police Station</label>
                                        <input type="text" name="ps" id="ps" class="form-control mt-1" placeholder="Poice Station">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="pin">PIN</label>
                                        <input type="text" name="pin" id="pin" class="form-control mt-1" placeholder="PIN Code">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" id="SubmitForm" class="col-md-3 btn btn-primary" value="Add" value="Add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    function deleteEmail(id){
        $(`#email_id_${id}`).remove();
    }
    function deletePhone(id){
        $(`#phone_id_${id}`).remove();
    }


    $(document).ready(function(){
        email = 1;
        phone=1;
        $('#AddEmail').click(function(){
            $("#EmailIDField").children('div').append(
                `<div class="row mt-1" id="email_id_${email}">` +
                    `<div class="col-md-10">` +
                        `<input type="email" name="email[${email}]" id="email_${email}" class="form-control" placeholder="Enter Another Email">` +
                    `</div>` +
                    `<div class="col-md-2">` +
                        `<input type="button" class="btn text-danger btn-sm btn-link" value="Delete" onclick="deleteEmail(${email})">` +
                    `</div>` +
                `</div>`
            );
            email++;
        });

        $('#AddPhone').click(function(){
            $("#PhoneField").children('div').append(
                `<div class="row mt-1" id="phone_id_${phone}">` +
                    `<div class="col-md-10">` +
                        `<input type="phone" name="phone[${phone}]" id="phone_${phone}" class="form-control" placeholder="Enter Phone Another Number">` +
                    `</div>` +
                    `<div class="col-md-2">` +
                        `<input type="button" class="btn text-danger btn-sm btn-link" value="Delete" onclick="deletePhone(${phone})">` +
                    `</div>` +
                `</div>`
            );
            phone++;
        });
    })

</script>
@endsection
