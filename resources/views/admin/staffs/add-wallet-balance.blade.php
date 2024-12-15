@extends('admin.layouts.blank')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col text-left">
            <a href="{{ route('admin.providers.all') }}" class="btn btn-secondary m-2"><i
                    class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
    <div class="row d-justify-content-center">
        {{-- <div class="col-md-4">
            <p class="text-center h3">All Areas</p>
        </div> --}}
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{ __('Staff Wallet') }}</div>
                @php
                // $allProviders = App\ServiceProvider::GetProvidersWalletList()
                // $allProviders = App\ServiceProvider::paginate(50)
                @endphp
                {{-- <pre>{{ json_encode($allProviders, JSON_PRETTY_PRINT) }}</pre> --}}
                {{-- @dump($prov) --}}
                <div class="card-body">


                    <div class="content">
                        <form action="{{route('admin.staff.wallet-add-balance', ['staffId' => $staff->id ])}}"
                            method="post" class="form-horizontal form-label-left">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col text-center">
                                    <h5>
                                        Staff: {{$staff->first_name}} {{$staff->last_name}}, Current Balance:
                                        {{-- {{ $prov->getWalletBalance() }} --}}
                                        {{ $staff->WalletInfo->FormattedWalletBalanceString() }}
                                    </h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="amt-txt" class="control-label col-md-12 col-sm-12 col-xs-12">Amount
                                    (₹)</label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="number" class="form-control col-md-12 col-xs-12" id="amt-txt"
                                        name="w[Amt]" value="100.00" placeholder="Amount To Add (₹)" min="1"
                                        max="10000" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description-txt"
                                    class="control-label col-md-12 col-sm-12 col-xs-12">Description</label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <textarea type="number" class="form-control col-md-12 col-xs-12"
                                        id="description-txt" placeholder="Description" name="w[Desc]" min="1"
                                        max="10000"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description-txt"
                                    class="control-label col-md-12 col-sm-12 col-xs-12">Action</label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <span>
                                        <input type="radio" name="w[Typ]" id="rad-add-act" checked="checked"
                                            value="A" />
                                        <label for="rad-add-act">Add</label>
                                        <span class="mx-3">&nbsp;&nbsp;</span>
                                        <input type="radio" name="w[Typ]" id="rad-deduct-act" value="D" />
                                        <label for="rad-deduct-act">Deduct</label>
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-center py-3">
                                    <button type="submit" class="btn btn-success">Proceed</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
         <div class="col-md-7">
            <div class="content">

                @php
                $TxnLogs = $staff->WalletInfo->GetTransactionLogPagination();
                @endphp
                <h3 class="text-center">Wallet Transaction History
                </h3>
                <span class="text-center w-100 d-block">
                    <span class="small">
                        Wallet Created With ₹ 0.00 /- Balance on
                        <small>[{{$staff->WalletInfo->created_at}}]</small>
                    </span>
                </span>

                <ul class="walletHistoryContainer well">
                    @foreach ( $TxnLogs as $txnlg )
                    <li type={!! $txnlg->txn_type !!}>

                        <span>
                            @if ($txnlg->txn_type == '+')
                            Added
                            <span class="mx-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            @else
                            Deducted
                            <span class="mx-3">&nbsp;</span>
                            @endif ₹{{number_format($txnlg->txn_amt, 2)}} /-
                        </span>
                        <small>on {{$txnlg->created_at}}</small>
                        <span class="mx-3">&nbsp;</span>
                        <span class="pull-right balanceText">₹{{number_format($txnlg->wallet_balance, 2)}} /-</span>
                        <span class="small">
                            {!! $txnlg->txn_description !!}
                        </span>
                    </li>
                    @endforeach
                    {{-- <li type="label label-primary">
                        <code>[{{$Customer->WalletInfo->created_at}}]</code> Wallet Created With ₹ 0.00 /- Balance
                    </li> --}}
                 </ul>
                {{$TxnLogs->render()}}
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


    <style>
        #overlay {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 2;
            cursor: pointer;
        }

        #text {
            position: absolute;
            top: 50%;
            left: 50%;
            font-size: 50px;
            color: white;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
        }

        .walletHistoryContainer li {
            list-style: none;
        }

        .walletHistoryContainer li:before {
            font-size: 1.3em;
            margin: 2pt 8pt;
        }

        .walletHistoryContainer li[type="+"] {
            color: green;
        }

        .walletHistoryContainer li[type="+"]:before {
            color: green;
            content: '+';
        }

        .walletHistoryContainer li[type="-"] {
            color: red;
        }

        .walletHistoryContainer li[type="-"]:before {
            color: red;
            content: '-';
        }

        .walletHistoryContainer li .balanceText {
            color: #000 !important;
        }
    </style>

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 120px;
            height: 34px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ca2222;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2ab934;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(85px);
            -ms-transform: translateX(85px);
            transform: translateX(85px);
        }

        /*------ ADDED CSS ---------*/
        .on {
            display: none;
        }

        .on,
        .off {
            color: white;
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            font-size: 10px;
            font-family: Verdana, sans-serif;
        }

        input:checked+.slider .on {
            display: block;
        }

        input:checked+.slider .off {
            display: none;
        }

        /*--------- END --------*/

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>

</div>
@endsection
