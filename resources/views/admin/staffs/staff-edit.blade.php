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

                                {{-- admin.staff.wallet-add-balance-view', [ 'providerId' => $u->id ]) --}}
                                {{-- action="{{ route('provider.sarea.remove',['areaId' => $dist->id ]) }}"  --}}
                            <form action="{{ route('admin.admstaff.update.submit',['staff' => $staff->id ]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                        <label>Profile Picture</label>
                                        <div class="profile-img-blk">
                                            <div class="img_outer">
                                            <img class="profile_preview" id="profile_image_preview" src="{!! asset('storage/'.$staff->dp) !!}"
                                                    alt="your image">
                                            </div>
                                            <div class="fileUpload up-btn profile-up-btn">
                                                <input type="file" id="profile_img_upload_btn" name="dp" class="upload"
                                                    accept="image/x-png, image/jpeg" />
                                                {{-- <input type="hidden" name="dp_old" value="{!! $p->dp_old !!}" /> --}}
                                            </div>
                                        </div>
                                    </div>
                                <div class="form-group col-md-12">

                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="first_name" value="{{$staff->first_name}}" placeholder="First Name"
                                        value="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="last_name" value="{{$staff->last_name}}" placeholder="Last Name"
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
                                        @if($staff->gender==$g)
                                        <option selected value="{{$k}}">{{$g}}</option>
                                        @else
                                        <option value="{{$k}}">{{$g}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control" name="phone" value="{{$staff->phone}}" placeholder="Mobile" value="">
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Password</label>
                                <input type="password" class="form-control"  name="password"  placeholder="Password"  value="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Re Password</label>
                                    <input type="password" class="form-control" name="repassword" placeholder="Password"  value="">
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

    </div>
    @section('css')

        @endsection
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
