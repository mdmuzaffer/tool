@extends('admin.layouts.blank')
@section('content')

<div class="container-fluid">
        <div class="row d-justify-content-center">
            {{-- <div class="col-md-4">
                <p class="text-center h3">All Areas</p>
            </div> --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Provider Detail') }}  <a class="btn btn-primary float-right" href="{{ route('admin.providers.all') }}">Back</a></div>

                    @php
                    $allProviders = App\ServiceProvider::GetProvidersWalletList()
                    // $allProviders = App\ServiceProvider::paginate(50)
                    @endphp
                    {{-- <pre>{{ json_encode($allProviders, JSON_PRETTY_PRINT) }}</pre> --}}
                    {{-- @dump($allProviders) --}}
                    <div class="card-body">
                        <div class="table-responsive">
                                @foreach($pro as $p)


                                <form>
                                  <div class="row no-margin">
                                    <div class="col-md-12">
                                      <h4 class="page-title">General Information</h4>
                                    </div>
                                  </div>
                                  <div class="row no-margin">
                                    <div class="col-md-6 pro-form">
                                      <h5 class="col-md-6 no-padding"><strong>Name</strong></h5>
                                      <p class="col-md-6 no-padding">{!! $p->first_name !!}</p>
                                    </div>
                                    <div class="col-md-6 pro-form">
                                      <h5 class="col-md-6 no-padding"><strong>Gender</strong></h5>
                                      <p class="col-md-6 no-padding">{!! $p->gender !!}</p>
                                    </div>
                                    <div class="col-md-6 pro-form">
                                      <h5 class="col-md-6 no-padding"><strong>Email</strong></h5>
                                      <p class="col-md-6 no-padding">{!! $p->email !!}</p>
                                    </div>

                                    <div class="col-md-6 pro-form">
                                      <h5 class="col-md-6 no-padding"><strong>Mobile</strong></h5>
                                      <p class="col-md-6 no-padding">{!! $p->phone !!}</p>
                                    </div>

                                    <div class="col-md-6 pro-form">
                                      <h5 class="col-md-6 no-padding"><strong>Profession</strong></h5>
                                      <p class="col-md-6 no-padding">{!! $p->pri_profession !!}</p>
                                    </div>

                                    <div class="col-md-6 pro-form">
                                      <h5 class="col-md-6 no-padding"><strong>Service Zone City</strong></h5>

                                      @php $area = App\Area::find($p->city); @endphp







                                      {{-- <p class="col-md-6 no-padding">{{$area->area_name}}</p> --}}

                                    </div>

                                    <div class="col-md-12 pro-form">
                                      <h4 class="col-md-12 "><strong>Address Information</strong></h4>


                                    </div>


                                    {{-- {{  $drivers = $p->Address }} --}}
                                    {{-- @foreach($p->Address as $driver)
                                            {{ $driver->address }}
                                    @endforeach
                                    --}}

                                    <div class="col-md-6 pro-form">
                                      <h5 class="col-md-6 no-padding"><strong>Address</strong></h5>
                                      <p class="col-md-6 no-padding">{!! $p->Address !!}</p>

                                    </div>
                                    <div class="col-md-6 pro-form">
                                      <h5 class="col-md-6 no-padding"><strong>Police Station</strong></h5>
                                      <p class="col-md-6 no-padding">{!! $p->ps !!}</p>

                                    </div>
                                    <div class="col-md-6 pro-form">
                                      <h5 class="col-md-6 no-padding"><strong>City</strong></h5>
                                      <p class="col-md-6 no-padding">{!! $p->adrcity !!}</p>

                                    </div>
                                    <div class="col-md-6 pro-form">
                                      <h5 class="col-md-6 no-padding"><strong>Distric</strong></h5>
                                      <p class="col-md-6 no-padding">{!! $p->dist !!}</p>

                                    </div>
                                    <div class="col-md-6 pro-form">
                                      <h5 class="col-md-6 no-padding"><strong>State</strong></h5>
                                      <p class="col-md-6 no-padding">{!! $p->state !!}</p>

                                    </div>
                                    <div class="col-md-6 pro-form">
                                      <h5 class="col-md-6 no-padding"><strong>Pin Code</strong></h5>
                                      <p class="col-md-6 no-padding">{!! $p->pin !!}</p>

                                    </div>
                                    <div class="col-md-12 pro-form">

                                    </div>
                                    <div class="col-md-12">
                                      <h4 class="page-title">Identity Proof Information</h4>
                                    </div>
                                    <div class="col-md-12 pro-form">
                                        @php $pendingrecords = App\Identityproof::where('providr_ID', $p->id)->get(); @endphp

                                        <table class="table">
                                            <thead class="thead-dark">
                                              <tr>
                                                <th scope="col">Sl</th>
                                                <th scope="col">Identity Type</th>
                                                <th scope="col">Number</th>
                                                <th scope="col">Proof</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              @php $slcnt=1; @endphp
                                                    @if($pendingrecords->count() >0)

                                                    @foreach ($pendingrecords as $recors)
                                                    <tr>
                                            <td>{{$slcnt}}</td>
                                            <td>{{$recors -> type_name}}</td>
                                            <td>{{$recors -> proof_Number}}</td>
                                            <td><div class='list-group gallery'>
                                                    <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                                                        <a class="thumbnail fancybox" rel="ligthbox" href="{!! asset('storage/'.$recors -> proof_image) !!}">
                                                            <img class="img-responsive prof-img" alt="" src="{!! asset('storage/'.$recors -> proof_image) !!}" />

                                                        </a>
                                                    </div> <!-- col-6 / end -->
                                                    </div></td>
                                        </tr>
                                                @php $slcnt++; @endphp
                                                @endforeach
                                                @endif

                                            </tbody>
                                          </table>

                                    </div>
                                  </div>

                                </form>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>

{{-- <pre>{{ json_encode($u, JSON_PRETTY_PRINT) }}</pre> --}}





@endsection
@section('script')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script>
$(document).ready(function(){
  //FANCYBOX
  //https://github.com/fancyapps/fancyBox
  $(".fancybox").fancybox({
      openEffect: "none",
      closeEffect: "none",
      arrows : false
  });
});
</script>
@endsection
@section('css')
<style>
    .prof-img
    {
        width: 50px;
    height: 50px;
    border-radius: 2%;
    background-size: cover;
    background-position: center center;
    margin: 0 auto;
    margin-bottom: 20px;
}
.box{
    padding:60px 0px;
}

.box-part{
    background:#FFF;
    border-radius:0;
    padding:60px 10px;
    margin:30px 0px;
}
.text{
    margin:20px 0px;
}

.fa{
     color:#4183D7;
}
.gallery
{
    display: inline-block;
    margin-top: 20px;
}
    </style>
    @endsection
