{{-- @extends('customer.layouts.blank-vanilla') --}}
@extends('admin.layouts.blank')
@section('title')textt
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>File Upload</span>
            </h1>
            <div class="page-header-subtitle">File Upload Demo</div>
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <form method="post">
            {{ csrf_field() }}
            <textarea id="mytextarea">Hello, World!</textarea>
        </form>
    </div>
</div>

@endsection
@push('styles')

@endpush
@push('scripts')
<script>
    window.csrf_token = "{{csrf_token()}}";
</script>
<script src="//cdn.jsdelivr.net/npm/tinymce@5/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#mytextarea',
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
                "fullscreen insertfile "
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
        file_picker_callback : function (cb, value, meta){ //file_browser_callback
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
