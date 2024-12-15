
<div class="card mb-4">
    <div class="card-header">{{$sectionHeading}}</div>
    <div class="card-body">
        <div class=" d-justify-content-center-">
            @if ($onlyData)
            <pre>@json_e($website, JSON_PRETTY_PRINT)</pre>

            @else
            {{-- @open(['url' => '/my/url', 'novalidate' => true])
                @text('login')
                @email('email')
                @checkbox('remember_me', null, 1, null, ['switch' => true, 'inline' => true])
                @submit('Login')
            @close --}}

            <form action="{{$postTo}}" method="POST">
                @csrf
                @foreach ($website as $section)
                @php
                extract($section);
                @endphp
                <div class="form-group row ">
                    <label for="{{$key}}" class="col-sm-2 col-form-label text-right">{{$title}}</label>
                    <div class="col-sm-8">
                        @if (array_get($schema,'type') == 'textbox')
                            @if (array_get($schema,'is_array') != true)
                                {{-- <input type="text" class="form-control" id="{{$key}}" value="{{$value}}" /> --}}
                                {{-- {!! BF::text($key,false,$value) !!} --}}
                                @text($key, false, $value)
                                {{-- @dump($value) --}}
                            @else
                                <div class="array_fields_container">
                                    @foreach ($value as $index1 => $item)
                                    {{-- <input type="text" class="form-control" id="{{$key}}[]" value="{{$item}}" /> --}}
                                    {{-- {!! BF::text($key,"",$item) !!} --}}
                                    <div class="form-group row no-gutters">
                                        <div class="col-11">
                                            @text($key.'[]', false, $item,['id' => $index1])
                                        </div>
                                        <div class="col-1 delete-container">
                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger m-2 delete-btn"><i
                                                    class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class=" text-right">
                                    <a href="javascript:void(0);" data-dd-action="textbox.array.add" data-dd-key="{{$key}}"
                                        data-dd-schema="@json_e($schema)"
                                        class="btn-link">+ Add Another</a>
                                </div>
                            @endif

                        @elseif(array_get($schema,'type') == 'object')
                            @if($schema['is_array'])
                                @php
                                    $value_count = collect()->times(collect($value)->count());
                                @endphp
                                <div class="section">
                                    <div id="All-Row">
                                        @foreach($value_count as $count_key => $val)
                                            <div class="row border p-3 m-2 each-row">
                                                <div class="col-md-12 text-right">
                                                    <button type="button" data-dd-action="obj.row.delete" class="btn btn-sm btn-danger m-2 delete-btn">DELETE</button>
                                                </div>
                                            @foreach($schema['fields'] as $fld)
                                                @php
                                                    extract($fld);
                                                @endphp
                                                @if ($type == 'textbox')
                                                    <div class="col-md-12">
                                                        @text($key.'['.$count_key.']['.$slug.']', $title, array_get($value[$count_key], $slug))
                                                        {{-- @text($key.'['.$count_key.']['.$slug.']', $title, $value[$count_key][$slug]) --}}
                                                    </div>
                                                    @elseif($type == 'dropdown')
                                                    @php
                                                        $options = collect($options);
                                                        if(array_get($fld,'use_title')){
                                                            $op = $options->mapWithKeys(function ($f){
                                                                return [$f['value'] => $f['title']] ;
                                                            });
                                                        }
                                                        else {
                                                            $op = $options->mapWithKeys(function ($f){
                                                                return [$f['value'] => $f['value']] ;
                                                            });
                                                        }
                                                    @endphp
                                                    <div class="col-md-12">
                                                        @select($key.'['.$count_key.']['.$slug.']', $title, $op, array_get($value[$count_key], $slug))
                                                        {{-- @select($key.'['.$count_key.']['.$slug.']', $title, $op, $value[$count_key][$slug]) --}}
                                                    </div>
                                                @elseif($type == 'radio')
                                                    @php
                                                        $options = collect($options);
                                                        $op = $options->mapWithKeys(function ($f){
                                                            return [$f['value'] => $f['value']] ;
                                                        })->toArray();
                                                        $dfltVal = array_get($fld, "default_value");
                                                    @endphp
                                                    <div class="col-md-12">
                                                        @radios($key.'['.$count_key.']['.$slug.']', $title, $op, array_get($value[$count_key], $slug), ['inline' => true])

                                                        {{-- @radios($key.'['.$count_key.']['.$slug.']', $title, $op, array_get($value[$count_key], $slug), ['inline' => true]) --}}
                                                        {{-- @radios($key.'['.$count_key.']['.$slug.']', $title, $op, $value[$count_key][$slug], ['inline' => true]) --}}
                                                    </div>
                                                @elseif($type == 'boolean')
                                                    @php
                                                        $op = [
                                                            "true" => array_get($fld,'true_text'),
                                                            "false" => array_get($fld,'false_text'),
                                                        ];
                                                        $dfltVal = array_get($fld, "default_value");
                                                    @endphp
                                                    <div class="col-md-12">
                                                        @radios($key.'['.$count_key.']['.$slug.']', $title, $op, array_get($value[$count_key], $slug, $dfltVal), ['inline' => true])
                                                    </div>
                                                @elseif($type == 'checkbox')
                                                    @php
                                                        $options = collect($options);
                                                        $op = $options->mapWithKeys(function ($f){
                                                            return [$f['value'] => $f['value']] ;
                                                        })->toArray();
                                                    @endphp
                                                    <div class="col-md-12">
                                                        @checkboxes($key.'['.$count_key.']['.$slug.'][]', $title, $op, array_get($value[$count_key], $slug), ['inline' => true])
                                                        {{-- @checkboxes($key.'['.$count_key.']['.$slug.'][]', $title, $op, $value[$count_key][$slug], ['inline' => true]) --}}
                                                    </div>
                                                @elseif($type == 'textarea')
                                                    <div class="col-md-12">
                                                        @if($html_support == 'true')
                                                            @textarea($key.'['.$count_key.']['.$slug.']', $title, array_get($value[$count_key], $slug), ['rows'=> 2, 'tinymce' => 'tm1'])
                                                            {{-- @textarea($key.'['.$count_key.']['.$slug.']', $title, $value[$count_key][$slug], ['rows'=> 2, 'tinymce' => 'tm1']) --}}
                                                        @else
                                                            @textarea($key.'['.$count_key.']['.$slug.']', $title, array_get($value[$count_key], $slug), ['rows'=> 2, 'class'=>'*AddSomething*'])
                                                            {{-- @textarea($key.'['.$count_key.']['.$slug.']', $title, $value[$count_key][$slug], ['rows'=> 2, 'class'=>'*AddSomething*']) --}}
                                                        @endif
                                                    </div>
                                                @elseif($type == 'upload-image')
                                                    @php

                                                        $inputName = $key.'['.$count_key.']['.$slug.']';
                                                        $inputPrefixId = $key.'_'.$count_key.'_'.$slug;
                                                        $dfltVal2 = array_get($fld, "default_value", "/imgerr");
                                                        $dfltVal = array_get($value, $slug, $dfltVal2 );
                                                        // dd($value, $slug, $dfltVal2 );
                                                    @endphp
                                                    <div class="test form-group col-md-6" id="{{$inputPrefixId}}_group">
                                                        <label for="inputPrefixId">{{$title}}</label>
                                                        <div>
                                                            <div class="card upload-image-card" >
                                                                <img class="card-img-top upload-image-card-img" src="{{$dfltVal}}"
                                                                onerror="this.src='/imgerr'"
                                                                >
                                                                <div class="card-img-overlay align-items-end d-flex justify-content-around">
                                                                    <input id="{{$inputPrefixId}}" class="upload-image-card-input" name="{{$inputName}}" type="hidden"
                                                                    value="{{$dfltVal}}"
                                                                    >
                                                                <a href="javascript:void(0);" title="upload" class="btn btn-sm btn-icon btn-outline-green upload-image-card-upload-btn"><i class="fa fa-upload"></i></a>
                                                                <a href="javascript:void(0);" title="clear" class="btn btn-sm btn-icon btn-outline-danger upload-image-card-remove-btn"><i class="fa fa-times"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endif
                                            @endforeach
                                            </div>
                                        @endforeach
                                        @if (!isset($count_key))
                                            @php
                                                $count_key = 0;
                                            @endphp
                                        @endif
                                    </div>
                                    <div class="add-btn text-right">
                                        <a href="javascript:void(0);" data-dd-action="obj.row.add" data-dd-key="{{$key}}"
                                            data-dd-schema="@json_e($schema)" data-next-index="{{$count_key+1}}"  data-dd-title="{{$title}}"
                                            class="btn-link">+ Add Another</a>
                                    </div>
                                </div>
                            @else
                                @foreach($schema['fields'] as $fld)
                                    @php
                                        extract($fld);
                                    @endphp
                                    @if ($type == 'textbox')
                                        @text($key.'['.$slug.']', $title, array_get($value, $slug))
                                        {{-- @text($key.'['.$slug.']', $title, $value[$slug]) --}}

                                    @elseif ($type == 'number')
                                        @number($key.'['.$slug.']', $title, array_get($value, $slug))
                                        {{-- @text($key.'['.$slug.']', $title, $value[$slug]) --}}
                                    @elseif($type == 'dropdown')
                                        @php
                                            $options = collect($options);
                                            // $op = $options->mapWithKeys(function ($f){
                                            //     return [$f['value'] => $f['value']] ;
                                            // });
                                                $op2 = $options->mapWithKeys(function ($f){
                                                    return [$f['value'] => $f] ;
                                                });
                                            if(array_get($fld,'use_title')){
                                                $op = $options->mapWithKeys(function ($f){
                                                    return [$f['value'] => $f['title']] ;
                                                });
                                            }
                                            else {
                                                $op = $options->mapWithKeys(function ($f){
                                                    return [$f['value'] => $f['value']] ;
                                                });
                                            }
                                        @endphp

                                        @select($key.'['.$slug.']', $title, $op, array_get($value, $slug), ['data-value-object' => json_encode($op2)])
                                        {{-- @select($key.'['.$slug.']', $title, $op, $value[$slug]) --}}
                                    @elseif($type == 'radio')
                                        @php
                                            $options = collect($options);
                                            $op = $options->mapWithKeys(function ($f){
                                                return [$f['value'] => $f['value']] ;
                                            })->toArray();
                                        @endphp
                                            @radios($key.'['.$slug.']', $title, $op, array_get($value, $slug), ['inline' => true])
                                            {{-- @radios($key.'['.$slug.']', $title, $op, $value[$slug], ['inline' => true]) --}}
                                    @elseif($type == 'boolean')
                                        @php
                                            $op = [
                                                "1" => array_get($fld,'true_text'),
                                                "0" => array_get($fld,'false_text'),
                                            ];
                                            $dfltVal = array_get($fld, "default_value");
                                        @endphp
                                        @radios($key.'['.$slug.']', $title, $op, array_get($value, $slug, $dfltVal), ['inline' => true])

                                    @elseif($type == 'checkbox')
                                        @php
                                            $options = collect($options);
                                            $op = $options->mapWithKeys(function ($f){
                                                return [$f['value'] => $f['value']] ;
                                            })->toArray();
                                            $dfltVal = array_get($fld, "default_value");
                                        @endphp
                                            @checkboxes($key.'['.$slug.'][]', $title, $op, array_get($value, $slug, $dfltVal), ['inline' => true])
                                            {{-- @checkboxes($key.'['.$slug.'][]', $title, $op, $value[$slug], ['inline' => true]) --}}
                                    @elseif($type == 'textarea')
                                        @if($html_support == 'true')
                                            @textarea($key.'['.$slug.']', $title, array_get($value, $slug), ['rows'=> 2, 'tinymce' => 'tm1'])
                                            {{-- @textarea($key.'['.$slug.']', $title, $value[$slug], ['rows'=> 2, 'tinymce' => 'tm1']) --}}
                                        @else
                                            @textarea($key.'['.$slug.']', $title, array_get($value, $slug), ['rows'=> 2, 'class'=>'*AddSomething*'])
                                            {{-- @textarea($key.'['.$slug.']', $title, $value[$slug], ['rows'=> 2, 'class'=>'*AddSomething*']) --}}
                                        @endif
                                    @elseif($type == 'upload-logo')
                                        @php
                                            $inputName = $key.'['.$slug.']';
                                            $inputPrefixId = $key.'_'.$slug.'';
                                            $dfltVal2 = array_get($fld, "default_value", "/imgerr");
                                            $dfltVal = array_get($value, $slug, $dfltVal2 );
                                        @endphp
                                        <div class="test form-group" id="{{$inputPrefixId}}_group">
                                            <label for="inputPrefixId">{{$title}}</label>
                                            <div>
                                                <div class="card upload-logo-card" >
                                                    <img class="card-img-top upload-logo-card-img" src="{{$dfltVal}}"
                                                    onerror="this.src='/imgerr'"
                                                    >
                                                    <div class="card-img-overlay align-items-end d-flex justify-content-around">
                                                        <input id="{{$inputPrefixId}}" class="upload-logo-card-input" name="{{$inputName}}" type="hidden"
                                                        value="{{$dfltVal}}"
                                                        >
                                                    <a href="javascript:void(0);" title="upload" class="btn btn-sm btn-icon btn-outline-green upload-logo-card-upload-btn"><i class="fa fa-upload"></i></a>
                                                    <a href="javascript:void(0);" title="clear" class="btn btn-sm btn-icon btn-outline-danger upload-logo-card-remove-btn"><i class="fa fa-times"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($type == 'upload-image')
                                        @php
                                            $inputName = $key.'['.$slug.']';
                                            $inputPrefixId = $key.'_'.$slug.'';
                                            $dfltVal2 = array_get($fld, "default_value", "/imgerr");
                                            $dfltVal = array_get($value, $slug, $dfltVal2 );
                                            // dd($value, $slug, $dfltVal2 );
                                        @endphp
                                        <div class="test form-group" id="{{$inputPrefixId}}_group">
                                            <label for="inputPrefixId">{{$title}}</label>
                                            <div>
                                                <div class="card upload-image-card" >
                                                    <img class="card-img-top upload-image-card-img" src="{{$dfltVal}}"
                                                    onerror="this.src='/imgerr'"
                                                    >
                                                    <div class="card-img-overlay align-items-end d-flex justify-content-around">
                                                        <input id="{{$inputPrefixId}}" class="upload-image-card-input" name="{{$inputName}}" type="hidden"
                                                        value="{{$dfltVal}}"
                                                        >
                                                    <a href="javascript:void(0);" title="upload" class="btn btn-sm btn-icon btn-outline-green upload-image-card-upload-btn"><i class="fa fa-upload"></i></a>
                                                    <a href="javascript:void(0);" title="clear" class="btn btn-sm btn-icon btn-outline-danger upload-image-card-remove-btn"><i class="fa fa-times"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @php
                                unset($count_key);
                            @endphp


                        @elseif(array_get($schema,'type') == 'dropdown')

                            @php
                                $options = collect($schema['options']);
                                $op = $options->mapWithKeys(function ($f){
                                    return [$f['value'] => $f['value']] ;
                                });
                            @endphp
                            @select($title, false, $op, $schema['default_value'])

                        @elseif(array_get($schema,'type') == 'checkbox')

                            @foreach($schema['options'] as $k => $op)
                                @checkbox($key . '[' . $k . ']', $op['value'], $op['value'], $op['is_default'], ['inline' => true, 'group' => false])
                            @endforeach

                        @elseif(array_get($schema,'type') == 'radio')

                            @foreach($schema['options'] as $k => $op)
                                @radio($key , $op['value'], $op['value'], $op['is_default'], ['inline' => true, 'group' => false, 'id'=>$key . '[' . $k . ']'])
                            @endforeach

                        @elseif (array_get($schema,'type') == 'textarea')
                            @if(array_get($schema,'html_support') == 'true')
                                @textarea($key, false, $value, ['rows'=> 2, 'tinymce' => 'tm1'])
                            @else
                                @textarea($key, false, $value, ['rows'=> 2, 'class'=>'*AddSomething*'])
                            @endif

                        @endif

                        {{-- @endif --}}
                    </div>
                </div>
                @endforeach
                @if (isset($hiddenParams) && is_array($hiddenParams))
                    @foreach ($hiddenParams as $kn => $hi)
                        <input type="hidden" name="{{$kn}}" value="{{$hi}}" />
                    @endforeach
                @endif
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-primary ">Save</button>
                </div>
            </form>

            @endif
        </div>
    </div>
</div>

@push('styles')
<style>
    .array_fields_container .form-group.row:only-child .delete-container {
        display: none;
    }

    .upload-logo-card{
        height: 150pt;
        width: 150pt;
    }

    .upload-logo-card .upload-logo-card-img{
        height: 150pt;
        width: 150pt;
        object-fit: contain;
    }

    .upload-image-card{
        height: 200pt;
        width: 300pt;
    }

    .upload-image-card .upload-image-card-img{
        height: 100%;
        width: 100%;
        object-fit: contain;
    }
</style>
@endpush


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
    function initTinyMCE() {
        // tinyMCE.editors.forEach((v) => v.destroy());
        tinymce.init({
            // selector: '.wygiwys-control',
            selector: '[tinymce="tm1"]:not(.tinyAdded)',
            // selector: (function () {
            //     return $('[tinymce="tm1"]:visible');
            // })(),
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
            },
            oninit : function () {
            },
            setup: function(editor) {
                editor.on('init', function(e) {
                // console.log('The Editor has initialized.');
                // console.log('init',this,arguments)
                $(this.targetElm).addClass("tinyAdded")
                });
            }


        });
    }
    initTinyMCE();
</script>

<script>
    $(document).ready(function () {
       $(document).on('click','.upload-logo-card .upload-logo-card-upload-btn',function () {
           var uploadCardUploadBtn = $(this);
           var uploadCard = uploadCardUploadBtn.parents('.upload-logo-card').first();
           var uploadCardImage = uploadCard.find('.upload-logo-card-img').first();
           var uploadCardInputFile = uploadCard.find('.upload-logo-card-input').first();

           var finp = $("<input type='file' class='d-none' accept='image/*' />");
           finp.change(function () {
            //    console.log(this.files);
            if(this.files){
                uploadSingleFile(this.files[0],{
                    path:'upload-logo',
                    onSuccess:function (res) {
                        uploadCardImage.attr('src',res.relativeUrl);
                        uploadCardInputFile.val(res.relativeUrl);
                        finp.remove();
                    }
                });
            }
           });
           $(document.body).append(finp);
           finp.click();
       });

       $(document).on('click','.upload-logo-card .upload-logo-card-remove-btn',function () {
           var uploadCardUploadBtn = $(this);
           var uploadCard = uploadCardUploadBtn.parents('.upload-logo-card').first();
           var uploadCardImage = uploadCard.find('.upload-logo-card-img').first();
           var uploadCardInputFile = uploadCard.find('.upload-logo-card-input').first();
           uploadCardInputFile.val("");
           uploadCardImage.attr("src","/imgerr");
       });

       $(document).on('click','.upload-image-card .upload-image-card-upload-btn',function () {
           var uploadCardUploadBtn = $(this);
           var uploadCard = uploadCardUploadBtn.parents('.upload-image-card').first();
           var uploadCardImage = uploadCard.find('.upload-image-card-img').first();
           var uploadCardInputFile = uploadCard.find('.upload-image-card-input').first();

           var finp = $("<input type='file' class='d-none' accept='image/*' />");
           finp.change(function () {
            //    console.log(this.files);
            if(this.files){
                uploadSingleFile(this.files[0],{
                    path:'upload-image',
                    onSuccess:function (res) {
                        uploadCardImage.attr('src',res.relativeUrl);
                        uploadCardInputFile.val(res.relativeUrl);
                        finp.remove();
                    }
                });
            }
           });
           $(document.body).append(finp);
           finp.click();
       });

       $(document).on('click','.upload-image-card .upload-image-card-remove-btn',function () {
           var uploadCardUploadBtn = $(this);
           var uploadCard = uploadCardUploadBtn.parents('.upload-image-card').first();
           var uploadCardImage = uploadCard.find('.upload-image-card-img').first();
           var uploadCardInputFile = uploadCard.find('.upload-image-card-input').first();
           uploadCardInputFile.val("");
           uploadCardImage.attr("src","/imgerr");
       });
    });

    function uploadSingleFile(file, options) {
        var ep = "{{route('admin.upload.single')}}";
        var fd = new FormData();
        if(file instanceof File){
            fd.append('uploadedFile',file);
            fd.append('_token',"{{@csrf_token()}}");
            if(options.path) fd.append('path', options.path);
            fetch(ep,{method:"POST",body:fd}).then(res => res.json()).then(function (res) {
                if(options.onSuccess instanceof Function) options.onSuccess.apply(res,[res,file,fd]);
            });

        }
    }
</script>

@endpush


@push('scripts')
<script type="text/template" id="array_text_template">
    <div class="form-group row no-gutters">
        <div class="col-11">
            <div class="test form-group" id="_group"><div><input id="" class="form-control" name="" type="text" value=""></div></div>
        </div>
        <div class="col-1  delete-container">
            <a href="javascript:void(0);" class="btn btn-sm btn-danger m-2 delete-btn"> <i class="fa fa-times"></i></a>
        </div>
    </div>
</script>

<script type="text/template" id="simple-tb">
    <div class="col-md-12">
        <div class="test form-group" id="_group">
            <label for=""></label>
            <div>
                <input id="" class="form-control" name="" type="text" value="">
            </div>
        </div>
    </div>
</script>

<script type="text/template" id="simple-ta">
        <div class="col-md-12">
            <label for=""></label>
            <div class="test form-group" id="_group">
                <div>
                    <textarea id="" class="form-control" name="" value="" row="2"></textarea>
                </div>
            </div>
        </div>
</script>

<script type="text/template" id="simple-dd">
    <div class="col-md-12">
        <div class="test form-group" id="_group">
            <label for=""></label>
            <div>
                <select id="" class="form-control" name=""></select>
            </div>
        </div>
    </div>
</script>

<script type="text/template" id="simple-radio-body">
    <div class="col-md-12">
        <div class="test form-group" id="_group">
            <label for=""></label>
            <div class="radio"></div>
        </div>
    </div>
</script>

<script type="text/template" id="simple-cb-body">
    <div class="col-md-12">
        <div class="test form-group" id="_group">
            <label for=""></label>
            <div class="cb"></div>
        </div>
    </div>
</script>

<script type="text/template" id="simple-radio-or-cb-input">
    <div class="form-check form-check-inline">
        <input id="" class="form-check-input" name="" type="" value="">
        <label for="" class="form-check-label"></label>
    </div>
</script>

<script type="text/template" id="simple-image">
    <div class="test form-group col-md-6" id="">
        <label for="inputPrefixId"></label>
        <div>
            <div class="card upload-image-card" >
                <img class="card-img-top upload-image-card-img" src=""
                onerror="this.src='/imgerr'">
                <div class="card-img-overlay align-items-end d-flex justify-content-around">
                    <input id="" class="upload-image-card-input" name="" type="hidden"
                    value="/imgerr">
                <a href="javascript:void(0);" title="upload" class="btn btn-sm btn-icon btn-outline-green upload-image-card-upload-btn"><i class="fa fa-upload"></i></a>
                <a href="javascript:void(0);" title="clear" class="btn btn-sm btn-icon btn-outline-danger upload-image-card-remove-btn"><i class="fa fa-times"></i></a>
                </div>
            </div>
        </div>
    </div>
</script>

<script>
    $(document).ready(function () {
            $(document).on('click',`[data-dd-action="textbox.array.add"]`,function () {
                var array_container = $(this).parent().parent().find('.array_fields_container');
                var key = this.dataset.ddKey;
                var schema = JSON.parse( this.dataset.ddSchema);
                // console.log(key,schema,array_container);
                var inputGroupx = $($("#array_text_template").text());
                var count = array_container.find("> .form-group.row").length;
                inputGroupx.find(".test.form-group").attr('id',`${key}_group`);
                inputGroupx.find(".test.form-group").find(":input").attr('id',`${key}_${count}`).attr('name', `${key}[]`);
                array_container.append(inputGroupx);
                initTinyMCE();
            });
            $(document).on('click',`.delete-container .delete-btn`,function () {
                var row = $(this).parents('.form-group.row').first();
                var array_container =row.parents('.array_fields_container').first();
                var totalRows = array_container.find("> .form-group.row").length;
                if(totalRows>1){
                    row.remove();
                }

            });
            $(document).on('click',`[data-dd-action="obj.row.add"]`,function () {
                var key = $(this).attr('data-dd-key');
                var parent_title = $(this).attr('data-dd-key');
                var schema = JSON.parse(this.dataset.ddSchema);
                var nextIndex  =Number( $(this).attr('data-next-index'));
                nextIndex = isNaN(nextIndex)?0:nextIndex;
                main_body = $(`
                    <div class="row border p-3 m-2 each-row">
                        <div class="col-md-12 text-right">
                            <button type="button" data-dd-action="obj.row.delete" class="btn btn-sm btn-danger m-2 delete-btn">DELETE</button>
                        </div>
                    </div>
                `);
                // console.log(schema,Math.random());
                for(i = 0; i<schema['fields'].length; i++){
                    var body = false;
                    if(schema['fields'][i]['type'] == 'textbox'){
                        var slug = schema['fields'][i]['slug'];
                        var title = schema['fields'][i]['title'];
                        body = $($('#simple-tb').text());
                        body.find('label').first().text(schema['fields'][i]['title']);
                        // var nextIndex = $(this).attr('data-next-index');
                        // console.log($($(body).find('label').first()).text());
                        body.find('label').first().attr('for',`${key}_${nextIndex}_${slug}_group`);
                        body.find('input').first().attr('id',`${key}_${nextIndex}_${slug}_group`);
                        body.find('input').first().attr('name',`${key}[${nextIndex}][${slug}]`);
                        main_body.append(body);
                    } else if (schema['fields'][i]['type'] == 'textarea'){
                        var slug = schema['fields'][i]['slug'];
                        var title = schema['fields'][i]['title'];
                        body = $($('#simple-ta').text());
                        body.find('label').first().text(title);
                        // nextIndex =Number( $(this).attr('data-next-index'));
                        // nextIndex = isNaN(nextIndex)?0:nextIndex+1;
                        body.find('label').first().attr('for',`${key}_${nextIndex}_${slug}_group`);
                        body.find('textarea').first().attr('id',`${key}_${nextIndex}_${slug}_group`);
                        body.find('textarea').first().attr('name',`${key}[${nextIndex}][${slug}]`);
                        if(schema['fields'][i]['html_support']){
                            body.find('textarea').first().attr('tinymce',`tm1`);
                        }
                        main_body.append(body);
                    }
                    else if (schema['fields'][i]['type'] == 'checkbox'){
                        var slug = schema['fields'][i]['slug'];
                        var title = schema['fields'][i]['title'];
                        body = $($('#simple-cb-body').text());
                        body.find('label').first().text(title);
                        // nextIndex = $(this).attr('data-next-index');
                        body.find('label').first().attr('for',`${slug}_${nextIndex}_group`);
                        console.log(schema['fields'][i]['options'].length);
                        for(j = 0 ; j < schema['fields'][i]['options'].length; j++){
                            var value = schema['fields'][i]['options'][j]['value'];
                            console.log(schema['fields'][i]['options'][j]);
                            var is_default = schema['fields'][i]['options'][j]['is_default'];
                            cb = $($('#simple-radio-or-cb-input').text());
                            cb.find('input').first().attr('id', `${key}_${nextIndex}_${slug}_${value}`);
                            cb.find('input').first().attr('name', `${key}[${nextIndex}][${slug}]`);
                            cb.find('input').first().attr('type', 'checkbox');
                            cb.find('label').first().attr('for', `${key}_${nextIndex}_${slug}_${value}`);
                            cb.find('label').first().text(`${value}`);
                            if(is_default){
                                cb.find('input').first().attr('checked', `checked`);
                            }
                            body.find('.cb').first().append(cb);
                        }
                        main_body.append(body);
                    }
                    else if (schema['fields'][i]['type'] == 'radio'){
                        var slug = schema['fields'][i]['slug'];
                        var body = $($('#simple-radio-body').text());
                        body.find('label').first().text(schema['fields'][i]['title']);
                        // nextIndex = $(this).attr('data-next-index');
                        body.find('label').first().attr('for',`${schema['fields'][i]['slug']}_${nextIndex}_group`);
                        for(j = 0 ; j < schema['fields'][i]['options'].length; j++){
                            var value = schema['fields'][i]['options'][j]['value'];
                            var is_default = schema['fields'][i]['options'][j]['is_default'];
                            radio = $($('#simple-radio-or-cb-input').text());
                            radio.find('input').first().attr('id', `${key}_${nextIndex}_${slug}_${value}`);
                            radio.find('input').first().attr('name', `${key}[${nextIndex}][${slug}]`);
                            radio.find('input').first().attr('type', 'radio');
                            radio.find('label').first().attr('for', `${key}_${nextIndex}_${slug}_${value}`);
                            radio.find('label').first().text(`${value}`);
                            if(is_default){
                                radio.find('input').first().attr('checked', `checked`);
                            }
                            body.find('.radio').first().append(radio);
                        }
                        main_body.append(body);
                    }
                    else if (schema['fields'][i]['type'] == 'upload-image'){
                        var slug = schema['fields'][i]['slug'];
                        var title = schema['fields'][i]['title'];
                        body = $($('#simple-image').text());
                        body.find('label').first().text(schema['fields'][i]['title']);
                        // var nextIndex = $(this).attr('data-next-index');
                        // console.log($($(body).find('label').first()).text());
                        body.find('label').first().attr('for',`${key}_${nextIndex}_${slug}_group`);
                        body.find('input').first().attr('id',`${key}_${nextIndex}_${slug}_group`);
                        body.find('input').first().attr('name',`${key}[${nextIndex}][${slug}]`);
                        main_body.append(body);
                    }
                }
                $(this).attr('data-next-index',nextIndex);
                $(this).parents('.section').children('#All-Row').first().append(main_body);
                $(body)[0].scrollIntoView();
                initTinyMCE();
            });
            $(document).on('click',`[data-dd-action="obj.row.delete"]`,function () {
                $(this).parents('.each-row').remove();

            });
        });
</script>
@endpush
