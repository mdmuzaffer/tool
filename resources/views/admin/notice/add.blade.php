@extends('admin.layouts.blank')
@section('title')
Create Notice
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Create A Notice</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        {{-- <div class="card-header">Add A New Job Type</div> --}}
        <div class="card-body">

            {{-- error display  --}}
            <div class="container">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                    <li> {{$error}} </li>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    @endforeach
                </div>
                @endif
            </div>


            <div class="container">

                <form action="{{route('admin.notices.add.post')}}" method="post" id="form">
                    @csrf
                    <div class="row">

                        <div class="form-group  col-md-6">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                        </div>

                        {{-- <div class="form-group col-md-2">
                            <label for="sortorder">Sort Order</label>
                            <input type="Number" name="sortorder" id="sortorder" min="0" class="form-control">
                        </div> --}}

                        <div class="form-group col-md-12">
                            <label for="description">Body</label>
                            <textarea name="body" id="body" rows="2"
                                class="form-control wygiwys-control">{{old('body')}}</textarea>
                        </div>


                        <div class="form-group col-md-12">
                            <label for="worker_part" class="d-block">Targeted User Types</label>
                            <div class="d-flex pl-4">
                                <div class="custom-control custom-checkbox p-2 flex-fill x-x-wek ">
                                    <input class="custom-control-input" name="is_for_admins" id="is_for_admins"
                                        type="checkbox" value="1" @if (old('is_for_admins')=="1" ) checked @endif />
                                    <label class="custom-control-label" for="is_for_admins">Admin</label>
                                </div>
                                <div class="custom-control custom-checkbox p-2 flex-fill x-x-wek ">
                                    <input class="custom-control-input" name="is_for_managers" id="is_for_managers"
                                        type="checkbox" value="1" @if (old('is_for_managers')=="1" ) checked @endif />
                                    <label class="custom-control-label" for="is_for_managers">Manager</label>
                                </div>
                                <div class="custom-control custom-checkbox p-2 flex-fill x-x-wek ">
                                    <input class="custom-control-input" name="is_for_frontdesks" id="is_for_frontdesks"
                                        type="checkbox" value="1" @if (old('is_for_frontdesks')=="1" ) checked @endif />
                                    <label class="custom-control-label" for="is_for_frontdesks">Front Desk</label>
                                </div>
                                <div class="custom-control custom-checkbox p-2 flex-fill x-x-wek ">
                                    <input class="custom-control-input" name="is_for_employees" id="is_for_employees"
                                        type="checkbox" value="1" @if (old('is_for_employees')=="1" ) checked @endif />
                                    <label class="custom-control-label" for="is_for_employees">Associates</label>
                                </div>
                                <div class="custom-control custom-checkbox p-2 flex-fill x-x-wek ">
                                    <input class="custom-control-input" name="is_for_customers" id="is_for_customers"
                                        type="checkbox" value="1" @if (old('is_for_customers')=="1" ) checked @endif />
                                    <label class="custom-control-label" for="is_for_customers">Clients</label>
                                </div>
                                <div class="custom-control custom-checkbox p-2 flex-fill x-x-wek ">
                                    <input class="custom-control-input" name="is_for_public" id="is_for_public"
                                        type="checkbox" value="1" @if (old('is_for_public')=="1" ) checked @endif />
                                    <label class="custom-control-label" for="is_for_public">Public Site</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="worker_part" class="d-block">Visibility Specification</label>
                            <div class="d-flex pl-4">
                                <div class="custom-control custom-checkbox p-2 flex-fill x-x-wek ">
                                    <input class="custom-control-input" name="is_archived" id="is_archived"
                                        type="checkbox" value="1" @if (old('is_archived')=="1" ) checked @endif />
                                    <label class="custom-control-label" for="is_archived">Archived?</label>
                                </div>

                                <div class="custom-control custom-checkbox p-2 flex-fill x-x-wek ">
                                    <input class="custom-control-input" name="is_published" id="is_published"
                                        type="checkbox" value="1" @if (old('is_published')=="1" ) checked @endif />
                                    <label class="custom-control-label" for="is_published">Published?</label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <a class="form-control btn btn-danger" title="Back"
                                    href="{{ route('admin.notices.all') }}">Back</a>
                            </div>
                        </div>
                        <div class="col-md-7"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="submit" id="SubmitForm" class="form-control btn btn-primary" value="Add"
                                    value="Add">
                            </div>
                        </div>

                    </div>
                </form>

            </div>

        </div>
        <div class="card-footer">
        </div>
    </div>
</div>

<style>
    tr {
        text-align: center;
    }
</style>

@endsection

@push('scripts')
<script src="/libs/tm/tinymce.min.js"></script>
@endpush
@push('scripts')
<script>
    $(document).ready(function () {
        // wygiwys-control
    });
</script>
<script>
    window.csrf_token = "{{csrf_token()}}";
</script>
<script type="text/javascript">
    tinymce.init({
        selector: '.wygiwys-control',
        images_upload_url: '{{route("docs.files.upload")}}',
        // plugins: 'advlist autolink link image lists charmap print preview',
        plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern",
                "advlist autolink lists link charmap print preview",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table paste image paste",
                "fullscreen  "
        ],
        height: 450,
        branding: false,

        toolbar: 'insertfile  undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent backcolor forecolor emoticons | link image media file | fullscreen ',
        /* enable title field in the Image dialog*/
        image_title: false,
        /* enable automatic uploads of images represented by blob or data URIs*/
        automatic_uploads: true,
        /*
            URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
            images_upload_url: 'postAcceptor.php',
            here we add custom filepicker only to Image dialog
        */
        file_picker_types: 'file, image',//image media
        /* and here's our custom image picker*/
        file_picker_callback__10: function (cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            /*
            Note: In modern browsers input[type="file"] is functional without
            even adding it to the DOM, but that might not be the case in some older
            or quirky browsers like IE, so you might want to add it to the DOM
            just in case, and visually hide it. And do not forget do remove it
            once you do not need it anymore.
            */

            input.onchange = function () {
            var file = this.files[0];

            var reader = new FileReader();
            reader.onload = function () {
                /*
                Note: Now we need to register the blob in TinyMCEs image blob
                registry. In the next release this part hopefully won't be
                necessary, as we are looking to handle it internally.
                */
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                /* call the callback and populate the Title field with the file name */
                cb(blobInfo.blobUri(), { title: file.name });
            };
            reader.readAsDataURL(file);
            };

            input.click();
        },
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '{{route("docs.files.upload")}}');
            xhr.setRequestHeader("X-CSRF-Token", window.csrf_token);
            xhr.onload = function() {
                var json;
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        },
        image_description: false,
        image_description: false,
        file_picker_callback_x : function (cb, value, meta){ //file_browser_callback
        console.log(cb,value,meta);
        // if (meta.filetype == 'file') {
        //     callback('mypage.html', {text: 'My text'});
        // }

        // // Provide image and alt text for the image dialog
        // if (meta.filetype == 'image') {
        //     callback('myimage.jpg', {alt: 'My alt text'});
        // }

        // // Provide alternative source and posted for the media dialog
        // if (meta.filetype == 'media') {
        //     callback('movie.mp4', {source2: 'alt.ogg', poster: 'image.jpg'});
        // }
        // file_picker_callback : function(field_name, url, type, win) { //file_browser_callback
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
        var field_name="";
        var cmsURL = "/" + 'docs-filemanager?field_name=' + field_name;
        // if (type == 'image') {
        //     cmsURL = cmsURL + "&type=Images";
        // } else {
        //     cmsURL = cmsURL + "&type=Files";
        // }
        // cb(cmsURL,{});
        tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
        });
        }

    });
</script>

@endpush
