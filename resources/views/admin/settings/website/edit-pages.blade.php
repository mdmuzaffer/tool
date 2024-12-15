@extends('admin.layouts.blank')

@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                <span>{{$actType}} Page</span>
            </h1>
            <div class="page-header-subtitle"></div>
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    @include('admin.settings.website.includes.basic-t1', $vwData0)
</div>


@endsection

@push('scripts')
    <script >
        $(document).ready(function () {
           $("#pages-front_title").change(function () {
               $("#pages-front_slug").val(slug($("#pages-front_title").val()));
           });

           $("#pages-front_slug").change(function () {
               // $("#pages-front_slug").val(slug($("#pages-front_slug").val()));
                var isValid = isValidSlug($(this).val()) && $(this).val();

                if(!isValid){
                    if($("#pages-front_slug + .text-danger").length){
                        $("#pages-front_slug + .text-danger").text("Url is not valid");
                    }
                    else{
                        $('<span class="text-danger" />').text("Url is not valid").appendTo($(this).parent());
                    }
                }
                else{
                    $("#pages-front_slug + .text-danger").remove();
                }
           });
        });

        function slug(strText) {
            var outStr = strText.replace(/[^a-zA-Z0-9-]/ig,'-');
            outStr = outStr.split('-').filter(Boolean).join('-').toLowerCase();
            return outStr;
        }
        function isValidSlug(str) {
            return str === slug(str);
        }
    </script>
@endpush
