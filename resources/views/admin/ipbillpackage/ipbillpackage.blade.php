@extends('admin.layouts.blank')

@section('content')

<div class="container-fluid">
    @php
    $allipbillpacg = $u->IpBillPackages;
    // $allipbillpacg = $apiPackages;
    @endphp
    {{-- @dump($allipbillpacg) --}}
    <div class="row">
        <div class="col-md-6">

            <h4>IP BILL PACKAGES FROM API</h4>
            <div class="table-responsive">
                <table class="table table-striped text-center">

                    <thead>
                        <tr>
                            <th>Ip Bill Id</th>
                            <th>Name</th>
                            <th>Fee</th>
                            <th>Is Current</th>
                        </tr>
                    </thead>


                    <tbody>
                        @if ($apiPackages!=false)

                        @foreach ($apiPackages as $bill_packg)
                        {{-- @dump($bill_packg) --}}
                        <tr>
                            <td>
                                <span>{{$bill_packg->id}}</span>
                                <input type="hidden" name="id[]" value="{{$bill_packg->id}}">
                            </td>
                            <td>
                                <span>{{$bill_packg->name}}</span>
                                <input type="hidden" name="name[]" value="{{$bill_packg->name}}">
                            </td>
                            <td>
                                <span>{{$bill_packg->fee}}</span>
                                <input type="hidden" name="fee[]" value="{{$bill_packg->fee}}">
                            </td>
                            <td>
                                <span>{{$bill_packg->iscurrent?'True': 'False'}}</span>
                                <input type="hidden" name="iscurrent[]" value="{{$bill_packg->iscurrent?'1': '0'}}">
                            </td>

                        </tr>

                        @endforeach

                        @else
                        <tr>
                            <td colspan="4">
                                <p class="text-center text-danger text-italic">
                                    Api call wasn't succesful. Check Api settings and try again.
                                </p>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
        <div class="col-md-6">

            <h4>IP BILL PACKAGES SAVED HERE </h4>
            <div class="table-responsive">
                <table class="table table-striped text-center table-fit-to-content">

                    <thead>
                        <tr>
                            <th>Ip Bill Id</th>
                            <th>Name</th>
                            <th>Fee</th>
                            <th>Is Current</th>
                            <th>Saved at</th>
                        </tr>
                    </thead>


                    <tbody>
                        @if ($allipbillpacg->count()>0)

                        @foreach ($allipbillpacg as $bill_packg)
                        {{-- @dump($bill_packg) --}}
                        <tr>
                            <td>
                                <span>{{$bill_packg->id}}</span>
                                <input type="hidden" name="id[]" value="{{$bill_packg->id}}">
                            </td>
                            <td>
                                <span>{{$bill_packg->name}}</span>
                                <input type="hidden" name="name[]" value="{{$bill_packg->name}}">
                            </td>
                            <td>
                                <span>{{$bill_packg->fee}}</span>
                                <input type="hidden" name="fee[]" value="{{$bill_packg->fee}}">
                            </td>
                            <td>
                                <span>{{$bill_packg->iscurrent?'True': 'False'}}</span>
                                <input type="hidden" name="iscurrent[]" value="{{$bill_packg->iscurrent?'1': '0'}}">
                            </td>

                            <td>
                                <span>{{$bill_packg->created_at}}</span>
                            </td>
                        </tr>

                        @endforeach

                        @else
                        <tr>
                            <td colspan="5">
                                <p class="text-center text-danger text-italic">
                                    Nothing to show here.
                                </p>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
        <form method="POST" action="{{ route('admin.ipbillpackage.save.post', ['admin'=>$u->id,'t'=>csrf_token(),'c'=>$u->chksm]) }}" class="col-12 text-center" onsubmit="return confirm('It will save/replace current ipbill packages from api!!\n\n are you sure?')">
            @csrf
            <input type="hidden" name="chksm" value="{{$u->chksm}}">
            @if ($apiPackages!=false)
                <button type="submit" class="btn btn-primary w-75">Save Api Data</button>
            @endif
        </form>
    </div>

</div>
@endsection
