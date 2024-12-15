@extends('admin.layouts.blank')

@section('content')
<div class="container-fluid">
    <div class="row d-justify-content-center">
        <div class="col-md-4">
            <div class="row">
                <div class="col">
                    <span class="text-right">

                    </span>
                </div>
            </div>
            <p class="text-center h3 p-3">All Categories</p>
            <ul class="list-group">
                @foreach ($allCategories as $cat)
                <li class="list-group-item">
                    <span>
                        {{$cat->category}}
                        {{-- <span class="small">[{{$cat->description}}]</span> --}}
                    </span>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-8">

            <div class="card">
                <div class="text-center">

                </div>
                <div class="card-header">
                    {{-- <ul class="navbar-nav small">
                        <li class="nav-item"><a href="{{ route('admin.sort-n-move') }}" class="nav-link">Sort</a></li>
                    </ul> --}}
                    {{ __("Add Category") }}
                </div>
                {{-- category	description	level	enabled --}}
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.categories.add') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="category"
                                class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                            <div class="col-md-6">
                                <input id="category" type="text"
                                    class="form-control @error('category') is-invalid @enderror" name="category"
                                    value="{{ old('category') }}" required autocomplete="name" autofocus>

                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    value="" autocomplete="name">{!! old('description') !!}</textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="display_image"
                                class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="display_image" id="display_image" />


                                <img id="display_image_view" class=" my-3 img-thumbnail display_image_view" width="300"
                                    height="200" />

                                @error('display_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <style>
                                    .display_image_view#display_image_view {
                                        height: 200px;
                                        width: 300px;
                                        object-fit: contain;
                                    }
                                </style>
                                <script>
                                    $(document).ready(function () {
                                        $(document).on('change', '#display_image', function () {
                                            // console.log(this.files);
                                            var f = this.files[0];
                                            window.f = f;
                                            if(f){
                                                var reader = new FileReader();
                                                reader.readAsDataURL(f);
                                                reader.onload = function () {
                                                    // console.log(reader.result);
                                                    $("#display_image_view").attr("src",reader.result);
                                                };
                                                reader.onerror = function (error) {
                                                    console.log('Error: ', error);
                                                };
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <input type="checkbox" name="show_in_top_browse" id="show_in_top_browse" value="1" />
                            <label for="show_in_top_browse">Show in "Browse Category" </label>
                        </div>

                        <div class="form-group row">
                            <label for="category"
                                class="col-md-4 col-form-label text-md-right">{{ __('Choose Parent Category') }}</label>

                            <div class="col-md-6">
                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="tree">
                                    <ul class="sortable-default-root">
                                        <li><label for="noparent"><input type="radio" name="parent_id" id="noparent" checked
                                                    value="0"><span>No Parent</span></label></li>
                                    </ul>
                                    {!! App\ServiceCategory::print_list_for_tree_radio_view([
                                    'radio_name' => 'parent_id'
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        {{-- <input type="hidden" name="area_category" value="{!! '' !!}"> --}}

                        {{-- <div class="form-group row">
                                <label for="level"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Level') }}</label>

                        <div class="col-md-6">
                            <select class="form-control @error('level') is-invalid @enderror" name="level"
                                id="area_category">
                                @foreach ($area_categories as $cat => $catText)
                                <option value="{{$cat}}">{{$catText}}</option>
                                @endforeach
                            </select>
                            @error('level')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                </div> --}}




                {{-- <div class="form-group row">
                            <label for="area_category"
                                class="col-md-4 col-form-label text-md-right">{{ __('Area Category') }}</label>

                <div class="col-md-6">
                    <select class="form-control @error('area_category') is-invalid @enderror" name="area_category"
                        id="area_category">
                        @foreach ($area_categories as $cat => $catText)
                        <option value="{{$cat}}">{{$catText}}</option>
                        @endforeach
                    </select>
                    @error('area_category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div> --}}
            {{-- @if ($areaCateg == AREA_CITY)
                <div class="col-md-12 text-center">
                    <input type="checkbox" name="is_top_city" id="is_top_city" />
                    <label for="is_top_city">Mark As Top City</label>
                </div>

                @endif --}}
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Add') }}
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection

@section('footer_end')
<style>
    .areas_list_each_area {
        list-style: none;
        margin-bottom: 5pt;
        box-shadow: 1px 1px 3px 0px rgba(41, 93, 146, 0.59);
    }
</style>
<style>
    ol.sortable-default-root,
    ul.sortable-default-root {
        padding-left: 10px;
        margin: 0 0 9px 0;
        min-height: 10px;
    }

    ol.sortable-default-root ol,
    ol.sortable-default-root ul,
    ul.sortable-default-root ol,
    ul.sortable-default-root ul {
        padding-left: 5px;
    }
</style>


<script>
    //action_buttons disableArea enableArea
    $(document).ready(function () {
        $(document).on('click','.action_buttons.disableArea, .action_buttons.enableArea', function () {
            var obj = {};
            obj.area_id = this.dataset.areaId;
            obj.action = this.dataset.actionDo;
            obj.chksm = this.dataset.chksm;
            obj.back_url = location.pathname;
            obj._token = '{{ csrf_token() }}';
            $postBackUrl = `{{ route('admin.area.change-status', [ 'areaId' => '__areaId__' ]) }}`.replace(/(__areaId__)/ig, obj.area_id );

            // console.log($postBackUrl, obj);
            GoToLink($postBackUrl, obj);
            // alert(JSON.stringify(obj),null,2);
        });
    });
</script>
@endsection
