@extends('admin.layouts.blank')
@section('title')
Edit Client Data
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Client</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Client</div>
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
                    @if (session('success'))
                    <div class="alert alert-success 4 alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
            </div> --}}

            <div class="container">
                <div class="row">
                    <div class="col-md-8 m-auto">
                        <form action="{{route('job.customer.edit.post',['id'=> $personal_details->id ])}}" method="post" id="form">
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
                                        <input type="text" name="fname" id="fname" class="form-control" value="{{$personal_details->first_name}}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="mname" id="middle_name" class="form-control" value="{{$personal_details->middle_name}}">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="lname" id="lname" class="form-control" value="{{$personal_details->last_name}}" required>
                                    </div>
                                    <input value="{{$personal_details->id}}" name="id" type="hidden" />
                                </div>

                            </div>

                            <div id="PhoneField" class="mb-3">
                                <div class="form-group">
                                    <label for="primary_phone">Phone Number</label>
                                    @isset($basic_data['phone.primary'])

                                    <input type="phone" name="primary_phone[value]" id="primary_phone" class="form-control mt-1" value="{{$basic_data['phone.primary'][0]['value']}}">
                                    <input name="primary_phone[id]" value="{{$basic_data['phone.primary'][0]['id']}}" type="hidden" />
                                    @else
                                    <input type="phone" name="primary_phone[value]" id="primary_phone" class="form-control mt-1" value="">
                                    <input name="primary_phone[id]" type="hidden" />
                                    @endisset
                                </div>
                                <input id="AddPhone" type="button" value=" + Add Another Phone" class="btn btn-link btn-sm mt-1">
                            </div>

                            <div id="EmailIDField" class="mb-3">
                                <div class="form-group">
                                    <label for="primary_email">Email</label>
                                    @isset($basic_data['email.primary'])
                                    <input type="email" name="primary_email[value]" id="primary_email" class="form-control mt-1" value="{{$basic_data['email.primary'][0]['value']}}">
                                    <input name="primary_email[id]" value="{{$basic_data['email.primary'][0]['id']}}" type="hidden" />
                                    @else
                                    <input type="email" name="primary_email[value]" id="primary_email" class="form-control mt-1" value="">
                                    <input name="primary_email[id]" type="hidden" />
                                    @endisset
                                </div>
                                <input id="AddEmail" type="button" value=" + Add Another Email" class="btn btn-link btn-sm mt-1">
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="panno">PAN No.</label>
                                    @isset($basic_data['panno'])
                                    <input name="panno[id]" value="{{$basic_data['panno'][0]['id']}}" type="hidden" />
                                    <input type="text" name="panno[value]" id="panno" class="form-control mt-1" value="{{$basic_data['panno'][0]['value']}}">
                                    @else
                                    <input type="text" name="panno[value]" id="panno" class="form-control mt-1" value="">
                                    <input name="panno[id]" type="hidden" />
                                    @endisset
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="fileno">File No.</label>
                                    @isset($basic_data['panno'])
                                    <input name="fileno[id]" value="{{$basic_data['fileno'][0]['id']}}" type="hidden" />
                                    <input type="text" name="fileno[value]" id="fileno" class="form-control mt-1" value="{{$basic_data['fileno'][0]['value']}}">
                                    @else
                                    <input type="text" name="fileno[value]" id="fileno" class="form-control mt-1" value="">
                                    <input name="fileno[id]" type="hidden" />
                                    @endisset
                                </div>
                            </div>

                            <div class="mb-3">

                                <div class="form-group">
                                    <label for="address">Addess No.</label>
                                    @isset($basic_data['address.line1'])
                                    <input name="address_line_1[id]" value="{{$basic_data['address.line1'][0]['id']}}" type="hidden" />
                                    <input type="text" name="address_line_1[value]" id="line1" class="form-control mt-1" value="{{$basic_data['address.line1'][0]['value']}}">
                                    @else
                                    <input type="text" name="address_line_1[value]" id="line1" class="form-control mt-1" value="">
                                    <input name="address_line_1[id]" type="hidden" />
                                    @endisset

                                    @isset($basic_data['address.line2'])
                                    <input name="address_line_2[id]" value="{{$basic_data['address.line2'][0]['id']}}" type="hidden" />
                                    <input type="text" name="address_line_2[value]" id="line2" class="form-control mt-1" value="{{$basic_data['address.line2'][0]['value']}}">
                                    @else
                                    <input type="text" name="address_line_2[value]" id="line2" class="form-control mt-1" value="">
                                    <input name="address_line_2[id]" type="hidden" />
                                    @endisset

                                    @isset($basic_data['address.line3'])
                                    <input name="address_line_3[id]" value="{{$basic_data['address.line3'][0]['id']}}" type="hidden" />
                                    <input type="text" name="address_line_3[value]" id="line3" class="form-control mt-1" value="{{$basic_data['address.line3'][0]['value']}}">
                                    @else
                                    <input type="text" name="address_line_3[value]" id="line3" class="form-control mt-1" value="">
                                    <input name="address_line_3[id]" type="hidden" />
                                    @endisset


                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="city">City</label>
                                        @isset($basic_data['address.city'])
                                        <input name="city[id]" value="{{$basic_data['address.city'][0]['id']}}" type="hidden" />
                                        <input type="text" name="city[value]" id="city" class="form-control mt-1" value="{{$basic_data['address.city'][0]['value']}}">
                                        @else
                                        <input type="text" name="city[value]" id="city" class="form-control mt-1" value="">
                                        <input name="city[id]" type="hidden" />
                                        @endisset
                                    </div>
                                    <div class="col-md-4">
                                        <label for="district">District</label>
                                        @isset($basic_data['address.dist'])
                                        <input name="district[id]" value="{{$basic_data['address.dist'][0]['id']}}" type="hidden" />
                                        <input type="text" name="district[value]" id="district" class="form-control mt-1" value="{{$basic_data['address.dist'][0]['value']}}">
                                        @else
                                        <input type="text" name="district[value]" id="district" class="form-control mt-1" value="">
                                        <input name="district[id]" type="hidden" />
                                        @endisset
                                    </div>
                                    <div class="col-md-4">
                                        <label for="state">State</label>
                                        @isset($basic_data['address.state'])
                                        <input name="state[id]" value="{{$basic_data['address.state'][0]['id']}}" type="hidden" />
                                        <input type="text" name="state[value]" id="state" class="form-control mt-1" value="{{$basic_data['address.state'][0]['value']}}">
                                        @else
                                        <input type="text" name="state[value]" id="state" class="form-control mt-1" value="">
                                        <input name="state[id]" type="hidden" />
                                        @endisset
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="po">Post Office</label>
                                        @isset($basic_data['address.po'])
                                        <input name="po[id]" value="{{$basic_data['address.po'][0]['id']}}" type="hidden" />
                                        <input type="text" name="po[value]" id="po" class="form-control mt-1" value="{{$basic_data['address.po'][0]['value']}}">
                                        @else
                                        <input type="text" name="po[value]" id="po" class="form-control mt-1" value="">
                                        <input name="po[id]" type="hidden" />
                                        @endisset
                                    </div>
                                    <div class="col-md-4">
                                        <label for="ps">Police Station</label>
                                        @isset($basic_data['address.ps'])
                                        <input name="ps[id]" value="{{$basic_data['address.ps'][0]['id']}}" type="hidden" />
                                        <input type="text" name="ps[value]" id="ps" class="form-control mt-1" value="{{$basic_data['address.ps'][0]['value']}}">
                                        @else
                                        <input type="text" name="ps[value]" id="ps" class="form-control mt-1" value="">
                                        <input name="ps[id]" type="hidden" />
                                        @endisset
                                    </div>
                                    <div class="col-md-4">
                                        <label for="pin">PIN</label>
                                        @isset($basic_data['address.pin'])
                                        <input name="pin[id]" value="{{$basic_data['address.pin'][0]['id']}}" type="hidden" />
                                        <input type="text" name="pin[value]" id="pin" class="form-control mt-1" value="{{$basic_data['address.pin'][0]['value']}}">
                                        @else
                                        <input type="text" name="pin[value]" id="pin" class="form-control mt-1" value="">
                                        <input name="pin[id]" type="hidden" />
                                        @endisset
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" id="SubmitForm" class="col-md-3 btn btn-primary" value="Save">
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
        $(`#email_id_${id}`).css('display','none');
        $(`#email_id_${id}`).append(
            `<input value="delete" name="email[${id}][action]" type="hidden" />`
        );
    }
    function deletePhone(id){
        $(`#phone_id_${id}`).css('display','none');
        $(`#phone_id_${id}`).append(
            `<input value="delete" name="phone[${id}][action]" type="hidden" />`
        );
    }


    $(document).ready(function(){
        email = 1;
        phone=1;

        @if(array_key_exists('email', $basic_data))
        @foreach($basic_data['email'] as $email)
            $("#EmailIDField").children('div').append(
                `<div class="row mt-1" id="email_id_${email}">` +
                    `<div class="col-md-10">` +
                        `<input type="email" name="email[${email}][value]" id="email_${email}" class="form-control" value="{{$email['value']}}">` +
                        `<input name="email[${email}][id]" value="{{$email['id']}}" type="hidden" />` +
                    `</div>` +
                    `<div class="col-md-2">` +
                        `<input type="button" class="btn btn-link btn-sm text-danger" value="Delete" onclick="deleteEmail(${email})">` +
                    `</div>` +
                `</div>`
            );
            email++;
        @endforeach
        @endif

        @if(array_key_exists('phone', $basic_data))
        @foreach($basic_data['phone'] as $phone)
            $("#PhoneField").children('div').append(
                `<div class="row mt-1" id="phone_id_${phone}">` +
                    `<div class="col-md-10">` +
                        `<input type="phone" name="phone[${phone}][value]" id="phone_${phone}" class="form-control" value="{{$phone['value']}}">` +
                        `<input name="phone[${phone}][id]" value="{{$phone['id']}}" type="hidden" />` +
                    `</div>` +
                    `<div class="col-md-2">` +
                        `<input type="button" class="btn btn-link btn-sm text-danger" value="Delete" onclick="deletePhone(${phone})">` +
                    `</div>` +
                `</div>`
            );
            phone++;
        @endforeach
        @endif

        $('#AddEmail').click(function(){
            $("#EmailIDField").children('div').append(
                `<div class="row mt-1" id="email_id_${email}">` +
                    `<div class="col-md-10">` +
                        `<input type="email" name="email[${email}][value]" id="email_${email}" class="form-control" placeholder="Enter Another Email">` +
                        `<input name="email[${email}][action]" value="new" type="hidden" />` +
                        `<input name="email[${email}][id]" value="" type="hidden" />` +
                    `</div>` +
                    `<div class="col-md-2">` +
                        `<input type="button" class="btn btn-link btn-sm text-danger" value="Delete" onclick="deleteEmail(${email})">` +
                    `</div>` +
                `</div>`
            );
            email++;
        });

        $('#AddPhone').click(function(){
            $("#PhoneField").children('div').append(
                `<div class="row mt-1" id="phone_id_${phone}">` +
                    `<div class="col-md-10">` +
                        `<input type="phone" name="phone[${phone}][value]" id="phone_${phone}" class="form-control" placeholder="Enter Phone Another Number">` +
                        `<input name="phone[${phone}][action]" value="new" type="hidden" />` +
                        `<input name="phone[${phone}][id]" value="" type="hidden" />` +
                    `</div>` +
                    `<div class="col-md-2">` +
                        `<input type="button" class="btn btn-link btn-sm text-danger" value="Delete" onclick="deletePhone(${phone})">` +
                    `</div>` +
                `</div>`
            );
            phone++;
        });


    })

</script>
@endsection
