@extends('admin.layouts.blank')

@section('content')
<div class="container-fluid">
    <div class="row d-justify-content-center">
        {{-- <div class="col-md-4">
            <p class="text-center h3">All Areas</p>
        </div> --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Providers') }}</div>
                @php
                $allstaffs = App\AdminStaff::get();

                // $allProviders = App\ServiceProvider::paginate(50)
                @endphp
                {{-- <pre>{{ json_encode($allProviders, JSON_PRETTY_PRINT) }}</pre> --}}
                {{-- @dump($allProviders) --}}

                <div class="card-body">
                    <div class="table-responsive">
                        <div >
                            <form action="{{ route('admin.staffs.nwstffentry') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group col-md-12">

                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="first_name" @if($first_name!="")value="{{$first_name}}"@endif placeholder="First Name"
                                        value="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="last_name" @if($last_name!="")value="{{$last_name}}"@endif placeholder="Last Name"
                                        value="">
                                </div>
                                @php
                                $genderArr = [
                                '' => 'Select',
                                'Male' => 'Male',
                                'Female' => 'Female',
                                'Others' => 'Others',
                                ];
                                @endphp
                                <div class="form-group col-md-12">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender" id="gender">
                                        @foreach ($genderArr as $k => $g)
                                        @if($gender==$g)
                                        <option selected value="{{$k}}">{{$g}}</option>
                                        @else
                                        <option value="{{$k}}">{{$g}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control" name="phone" @if($phone!="")value="{{$phone}}"@endif placeholder="Mobile" value="">
                                </div>
                                <div class="form-group col-md-12">
                                        @if ($error!="")
                                        <div class="alert alert-danger">
                                                <ul style="list-style-type: none;">

                                                    <li>{{ $error }}</li>
                                            </ul>
                                        </div>
                                    @endif
                                    <label>Email</label>
                                    <input type="email" class="form-control" @if($email!="")value="{{$email}}"@endif name="email" placeholder="Email"  value="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Password</label>
                                    <input type="password" class="form-control"  name="password" placeholder="Email"  value="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Re Password</label>
                                    <input type="password" class="form-control" name="repassword" placeholder="Email"  value="">
                                </div>



                                {{-- <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Email" readonly="" value="{!! $p->email !!}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Mobile" value="{!! $p->phone !!}">
                                </div>
                                @php
                                $genderArr = [
                                '' => 'Select',
                                'Male' => 'Male',
                                'Female' => 'Female',
                                'Others' => 'Others',
                                ];
                                @endphp
                                <div class="form-group col-md-6">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender" id="gender">
                                        @foreach ($genderArr as $k => $g)
                                        <option value="{{$k}}" @if ($k==$p->gender) selected="selected" @endif >{{$g}}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" class="form-control" name="mobile" placeholder="Mobile" value="{!! $u->phone !!}">
                                </div>
                                  <div class="form-group col-md-6">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="Address" placeholder="Your Address"
                                        value="{!! $p->Address !!}">
                                </div>
                                 <div class="form-group col-md-6">
                                    <label>Police Station</label>
                                    <input type="text" class="form-control" name="ps" placeholder="Your Polic Station"
                                        value="{!! $p->ps !!}">
                                </div> --}}
                                 {{-- <div class="form-group col-md-6">
                                    <label>Your City</label>
                                    <input type="text" class="form-control" name="adrcity" placeholder="Your City"
                                        value="{!! $p->adrcity !!}">
                                </div>
                                 <div class="form-group col-md-6">
                                    <label>Your District</label>
                                    <input type="text" class="form-control" name="dist" placeholder="Your Distric"
                                        value="{!! $p->dist !!}">
                                </div>
                                 <div class="form-group col-md-6">
                                    <label>Your State</label>
                                    <input type="text" class="form-control" name="state" placeholder="Your State"
                                        value="{!! $p->state !!}">
                                </div>
                                 <div class="form-group col-md-6">
                                    <label>Your Zip Code</label>
                                    <input type="text" class="form-control" name="pin" placeholder="Your Zip Code"
                                        value="{!! $p->pin !!}">
                                </div> --}}


                                <div class="col-md-12 x-pull-right text-center">
                                    <center>
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </center>
                                </div>
                            </form>
                        </div>



























                        {{-- <table class="table table-striped" id="provider-list-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($allstaffs as $u)
                                <tr>
                                    <td><code>{{ $u->id }}</code></td>
                                    <td>{{ $u->first_name }} {{ $u->last_name }}</td>
                                    <td>{{ $u->gender }}</td>
                                    <td>{{ $u->phone }}</td>
                                    <td>{{ $u->email }}</td>


                                    {{-- <td>{!! $u->getWalletActionButtonsForAdmin() !!}</td>
                                     <td>
                                            <a class="btn btn-sm btn-success eachAddButton" type="button"
                                            href="{{ route('admin.providersdetails.peci', [ 'proid' => $u->id ]) }}"
                                            data-provider-id="{!! $u->id !!}">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        @if ($u->wallet_id == null)
                                        <button class="btn btn-sm btn-primary eachCreateBtn ActBtn" type="button"
                                            data-provider-id="{!! $u->id !!}"
                                            data-chksm="{!! Hash::make($u->id.'@pcf') !!}"
                                            data-xx="{!! Hash::make($u->id.'@pcf') !!}">Create Wallet</button>
                                        @else
                                        @if ($u->wallet_status == 'Active')
                                        <button class="btn btn-sm btn-danger eachStatusChangeBtn ActBtn m-1" type="button"
                                            data-provider-id="{!! $u->id !!}" data-change-to="D">Deactivate</button>
                                        @else
                                        <button class="btn btn-sm btn-secondary eachStatusChangeBtn ActBtn m-1"
                                            type="button" data-provider-id="{!! $u->id !!}"
                                            data-change-to="A">Activate</button>

                                        @endif
                                        <a class="btn btn-sm btn-success eachAddButton" type="button"
                                            href="{{ route('admin.providers.wallet-add-balance-view', [ 'providerId' => $u->id ]) }}"
                                            data-provider-id="{!! $u->id !!}">
                                            <i class="fa fa-plus"></i> Add Blance
                                        </a>
                                        @endif

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table> --}}
                    </div>
                </div>
            </div>
        </div>
        <style>
            .imageholder .profile-img-blk
            {
            width: 100%;
            height: 200px;
            margin-top: 10px;
            margin-bottom: 20px;
            border-radius: 1%;
            border: 5px solid #eee;
            overflow: hidden;
            position: relative;
        }
            </style>

    </div>

    <script>
        $(document).ready(function () {
            $('.eachCreateBtn.ActBtn','#provider-list-table').btsConfirmButton('Sure???',function () {
                var provider_id = this[0].dataset.providerId
                var chksm = this[0].dataset.chksm
                // console.log(this[0].dataset.provider_id);
                GoToLink(`{{ route('admin.providers.create-wallet.submit', [ 'provider_id' => '%%provider_id%%' ]) }}`.replace('%%provider_id%%',provider_id),{
                    provider_id: provider_id,
                    chksm: chksm,
                _token:"{{ csrf_token() }}"
                });

            });
            $('.eachStatusChangeBtn.ActBtn','#provider-list-table').btsConfirmButton('Sure???',function () {
                var provider_id = this[0].dataset.providerId
                var Type = this[0].dataset.changeTo;
                // console.log(this[0].dataset.customerId);
                GoToLink(`{{ route('admin.providers.wallet-change-status', [ 'provider_id' => '%%provider_id%%', 'Type' => '%%Type%%' ]) }}`.replace('%%provider_id%%',provider_id).replace('%%Type%%',Type),{
                provider_id: provider_id,
                Type: Type,
                _token:"{{ csrf_token() }}"
                });

            });
    });
    </script>

</div>
@endsection
