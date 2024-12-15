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
                    $allRequests = App\ServiceProviderWalletAddBalanceRequestLog::paginate()
                    // $allProviders = App\ServiceProvider::paginate(50)
                    @endphp
                    {{-- <pre>{{ json_encode($allProviders, JSON_PRETTY_PRINT) }}</pre> --}}
                    {{-- @dump($allProviders) --}}
                    <div class="card-body">
                        <h4 class="p-2">Balance Add Requests</h4>
                        <div class="table-responsive">
                            <table class="table table-striped" id="provider-list-table">
                                <thead>
                                    <tr>
                                        {{-- <th>ID</th> --}}
                                        <th>Provider Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Wallet Balance</th>
                                        <th>Request Date</th>
                                        <th>Amount (₹)</th>
                                        <th>Txn. Ref. No.</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                                       
                                    @foreach ($allRequests as $req)
                                    @php
                                        $u = $req->ServiceProvider;
                                        $w = $u->WalletInfo;
                                    @endphp
                                    {{--
                                            service_provider_id, service_provider_wallet_info_id, bank_txn_ref_no, request_date, 
                                            request_description, request_proceed_date, request_proceed_description, txn_amt, 
                                            txn_proof_image, wallet_balance_before, wallet_balance_after, status 
                                        --}}
                                    <tr>
                                        {{-- <td><code>{{ $u->id }}</code></td> --}}
                                        <td>{{ $u->full_name() }}</td>
                                        <td>{{ $u->phone }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td class="text-center">
                                            {{$w->wallet_balance === null ? 'Not-Created' : "₹ ".(number_format($w->wallet_balance,2)) ." /-"}}
                                        </td>
                                        {{-- <td>{{$u->wallet_status === null ? 'Not-Created'  :$u->wallet_status}}</td> --}}
                                        {{-- <td>{!! $u->getWalletActionButtonsForAdmin() !!}</td> --}}
                                        <td>{{ $req->request_date }}</td>
                                        <td>{{ $req->txn_amt }}</td>
                                        <td>{{ $req->bank_txn_ref_no }}</td>
                                        <td>{{ $req->status }}</td>
                                        <td>

                                            @if ($req->status == 'Pending')
                                            <form action="{{ route('admin.wallet.add-requests.accept',[ 'reqId' => $req->id, 'csrfToken' => csrf_token() ]) }}" method="post" onsubmit="return confirm('Are you sure to accept?')">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="reqid" value="{!! $req->id !!}" />
                                                <input type="hidden" name="chksm" value="{!! Hash::make($req->id.'-abcdef') !!}" />
                                                <button type="submit" class="btn btn-success btn-link btn-sm m-1">Approve</button>
                                            </form>
                                            <form action="{{ route('admin.wallet.add-requests.decline',[ 'reqId' => $req->id, 'csrfToken' => csrf_token() ]) }}" method="post" onsubmit="return confirm('Are you sure to accept?')">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="reqid" value="{!! $req->id !!}" />
                                                <input type="hidden" name="chksm" value="{!! Hash::make($req->id.'-abcdef') !!}" />
                                                <button type="submit" class="btn btn-danger btn-link btn-sm m-1">Decline</button>
                                            </form>
                                            @else
                                            <!-- -->
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