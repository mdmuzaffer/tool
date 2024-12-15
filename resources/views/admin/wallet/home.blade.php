@extends('admin.layouts.blank')

@section('content')
<div class="col-12">
    <div class="fluid-container">
        <div class="row x-d-justify-content-center">
            <div class="col-md-12 p-3">
                <div class="card">
                    <div class="card-header">{{ __('Wallet') }}</div>
                    <div class="card-header">
                        @include('admin.wallet.includes.wallet-nav')
                    </div>
                    @php
                    $allProviders = App\ServiceProvider::GetProvidersWalletList()
                    // $allProviders = App\ServiceProvider::paginate(50)
                    @endphp
                    {{-- <pre>{{ json_encode($allProviders, JSON_PRETTY_PRINT) }}</pre> --}}
                    {{-- @dump($allProviders) --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="provider-list-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Wallet Status</th>
                                        <th>Wallet Balance</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allProviders as $u)
                                    <tr>
                                        <td><code>{{ $u->id }}</code></td>
                                        <td>{{ $u->first_name }}</td>
                                        <td>{{ $u->phone }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td class="text-center">
                                            {{$u->wallet_balance === null ? 'Not-Created' : "₹ ".(number_format($u->wallet_balance,2)) ." /-"}}
                                        </td>
                                        <td>{{$u->wallet_status === null ? 'Not-Created'  :$u->wallet_status}}</td>
                                        {{-- <td>{!! $u->getWalletActionButtonsForAdmin() !!}</td> --}}
                                        <td>

                                            @if ($u->wallet_id == null)
                                            <button class="btn btn-sm btn-primary eachCreateBtn ActBtn" type="button"
                                                data-provider-id="{!! $u->id !!}"
                                                data-chksm="{!! Hash::make($u->id.'@pcf') !!}"
                                                data-xx="{!! Hash::make($u->id.'@pcf') !!}">Create Wallet</button>
                                            @else
                                            @if ($u->wallet_status == 'Active')
                                            <button class="btn btn-sm btn-danger eachStatusChangeBtn ActBtn m-1"
                                                type="button" data-provider-id="{!! $u->id !!}"
                                                data-change-to="D">Deactivate</button>
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
</div>
@endsection