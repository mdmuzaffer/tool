@extends('admin.layouts.blank')

@section('content')
{{-- @if (session('success'))
<div class="alert alert-success alert-dismissble fade show">
    <strong>Success!!</strong> {{session('success')}}
    <button class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif --}}

<div class="container-fluid">
    <div class="row d-justify-content-center">
        <div class="col-md-12">
            <p class="text-center h3">All Packages</p>
            @php $allpackages = $u->Packages;
            // App\InternetPackage::get();
            @endphp
            <div class="card-body">
                <div class="card-header">
                 <a class="btn btn-success" href="{{ route('admin.packages.newpackages') }}">New Packages</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped text-center table-fit-to-content">
                        <thead>
                            <tr>
                                <th>Action</th>

                                {{-- <td>ISP</td> --}}
                                <th>Packages Name </th>
                                <th>Limit Category</th>
                                <th>Speed And Limit</th>
                                <th>Duration In Days</th>
                                <th>Duration Text</th>
                                <th>Is Active</th>
                                <th>Packages Description</th>
                                {{-- <td>Price</td> --}}
                                {{-- <td>Is GST Included</td> --}}
                                <th>Price(Without GST)</th>
                                <th>Price(With GST)</th>
                                <th>GST Amount</th>
                                <th>GST Rate</th>
                                <th>Ip Bill Package</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($allpackages->count() >0)

                            @foreach ($allpackages as $package)
                            <tr>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.packages.delete',['packageId'=> $package->id])}}"><i class="fa fa-trash-o"
                                            aria-hidden="true"></i> Delete</a>
                                            <a class="dropdown-item" href="{{route('admin.packages.edit',['packageId'=> $package->id])}}"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i>Edit</a>
                                                <a class="dropdown-item" href="{{route('admin.packages.customers.get')}}">Show All Customer</a>
                                    </div>
                                    </div>
                                    {{--
                                    --}}
                                </td>
                                <td>{{$package->package_name}}</td>
                                <td>{{$package->package_category}}</td>
                                <td>{{$package->package_limit_text}}</td>
                                <td>{{$package->package_duration_days}}</td>
                                <td>{{$package->package_duration_text}}</td>
                                <td>{{$package->is_active?'Active': 'Inactive'}}</td>
                                <td>{{$package->package_description}}</td>
                                <td>{{$package->package_amount_wo_tax}}</td>
                                <td>{{$package->package_amount_w_tax}}</td>
                                <td>{{$package->package_amount_tax_amount}}</td>
                                <td>{{$package->package_amount_tax_rate}}%</td>
                                <td>{{$package->IpbiilPackge?($package->IpbiilPackge->name." [id: {$package->IpbiilPackge->id}] "):""}}</td>

                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
@endsection
