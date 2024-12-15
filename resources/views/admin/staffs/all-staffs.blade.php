@extends('admin.layouts.blank')

@section('content')
<div class="container-fluid">
    <div class="row d-justify-content-center">
        {{-- <div class="col-md-4">
            <p class="text-center h3">All Areas</p>
        </div> --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Staffs') }}</div>
                @php
                $allstaffs = App\AdminStaff::GetStaffsWalletList()
                //$allstaffs = App\AdminStaff::get();

                // $allProviders = App\ServiceProvider::paginate(50)
                @endphp
                                {{-- @dump($allstaffs) --}}

                {{-- <pre>{{ json_encode($allProviders, JSON_PRETTY_PRINT) }}</pre> --}}

                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <ul class="navbar-nav x-ml-auto ">

                        <li class="nav-item">
                            <a class="btn btn-success" href="{{ route('admin.staffs.nwstff') }}">New Staff
                                </a>
                        </li>

                    </ul>
                </nav>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="provider-list-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Balance</th>
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
                                <td style="color:green;"><b>₹ {{$u->wallet_balance}}</b></td>



                                    {{-- <td>{!! $u->getWalletActionButtonsForAdmin() !!}</td> --}}
                                     <td>
                                            <a class="btn btn-sm btn-success eachAddButton" type="button"
                                            href="{{ route('admin.adminstaff.get', [ 'staffId' => $u->id ]) }}"
                                            data-adminstaff-id="{!! $u->id !!}">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-eye"></i>
                                        </a>
                                            <a class="btn btn-sm btn-success eachAddButton" type="button" title="permissions"
                                            href="{{ route('admin.staff-admin.permissions.view', [ 'staff' => $u->id ]) }}"
                                            data-adminstaff-id="{!! $u->id !!}">
                                            <i class="fa fa-delicious "></i>
                                        </a>

                                        @if ($u->wallet_id == null)
                                        <button class="btn btn-sm btn-primary eachCreateBtn ActBtn" type="button"
                                            data-admin-staff-id="{!! $u->id !!}"
                                            data-chksm="{!! Hash::make($u->id.'@pcf') !!}"
                                            data-xx="{!! Hash::make($u->id.'@pcf') !!}">Create Wallet</button>
                                        @else
                                        @if ($u->wallet_status == 'Active')
                                        <button class="btn btn-sm btn-danger eachStatusChangeBtn ActBtn m-1" type="button"
                                            data-admin-staff-id="{!! $u->id !!}" data-change-to="D">Deactivate</button>
                                        @else
                                        <button class="btn btn-sm btn-secondary eachStatusChangeBtn ActBtn m-1"
                                            type="button" data-admin-staff-id="{!! $u->id !!}"
                                            data-change-to="A">Activate</button>

                                        @endif
                                        <a class="btn btn-sm btn-success eachAddButton" type="button"
                                            href="{{ route('admin.staff.wallet-add-balance-view', [ 'providerId' => $u->id ]) }}"
                                            data-admin-staff-id="{!! $u->id !!}">
                                            <i class="fa fa-plus"></i> Add Blance
                                        </a>
                                        @endif

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.eachCreateBtn.ActBtn','#provider-list-table').btsConfirmButton('Sure???',function () {

                var adminstaff_id = this[0].dataset.adminStaffId
                var chksm = this[0].dataset.chksm

                GoToLink(`{{ route('admin.staff.create-wallet.submit', [ 'staffId' => '%%adminstaff_id%%' ]) }}`.replace('%%adminstaff_id%%',adminstaff_id),{
                    staffId: adminstaff_id,
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
