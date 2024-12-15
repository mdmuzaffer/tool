{{-- @extends('customer.layouts.blank-vanilla') --}}
@extends('admin.layouts.blank')
@section('title')
File Upload
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
        {{-- <div class="card-header">Some Heading</div> --}}
        <div class="card-body" id="">
            <div id="dropzone">
                <form action="/upload" class="dropzone needsclick" id="dz-1-o">

                    <div class="dz-message needsclick">
                        <button type="button" class="dz-button">Drop files here or click to upload.</button><br />
                        <span class="note needsclick">(This is just a demo dropzone. Selected files are
                            <strong>not</strong> actually uploaded.)</span>
                    </div>

                </form>
            </div>
            <hr />

            <div class="p-3 m-3">
                <div class="row" id="filesList">

                </div>
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="button" id="btnUpload">Upload Files</button>
                </div>
            </div>

        </div>
    </div>

</div>
<script type="text/template" id="FileTemplate">
    <div class="col-12 mt-2 file-resource-wrapper">
        <div class="card file-resource">
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-2">
                        <!--<div alt="" class="file-thumb " data-ext=".PDF" data-size="120 kb" data-url=""></div>-->
                        <img alt="" class="file-thumb " data-ext=".PDF" data-size="120 kb" data-url="" />
                    </div>
                    <div class="col-md-10 file-description-container">
                        <span class="delete-container">
                            <a class="btn btn-icon" href="javascript:void(0);">
                                <i class="fa fa-times"></i>
                            </a>
                        </span>
                        <span class="mb-1 small">
                            <label for="" class="col-12 file-title-label">Title</label>
                            <input type="text" name="" id="" class="form-control file-title-input">
                        </span>
                        <span class="mb-1 small">
                            <label for="" class="col-12 file-description-label">Description</label>
                            <textarea type="text" name="" id="" class="form-control file-description-input"></textarea>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
@endsection
@push('styles')
<style>
    .file-resource .file-thumb {
        /* position: relative;
        width: 100%;
        padding-top: 100%;
        background-image: url(attr('data-url'));
        background-size: contain; */
        max-width: 80%;
    }

    /* .file-resource .file-thumb::before {
        position: absolute;
        content: attr(data-ext);
        width: 75%;
        top: 0;
        left: 12.5%;
        text-align: center;
        padding-top: calc(50% - 2px);
        text-transform: uppercase;
        font-size: 1rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }


    .file-resource .file-thumb::after {
        position: absolute;
        content: attr(data-size);
        width: 100%;
        bottom: -15%;
        left: 0;
        text-align: center;
        text-transform: uppercase;
        font-size: 0.8rem;
    } */

    .file-resource .form-control {
        border-radius: 0px;
        border: transparent;
        border-bottom: 1pt solid #ccc;
        padding: 0.5rem 0.5rem;
    }

    .file-resource .form-control:not(textarea) {
        height: calc(1.5em + 0.8rem);
    }

    .file-resource .file-description-container {
        position: relative;
    }

    .file-resource .delete-container {
        position: absolute;
        right: -1.5%;
        top: -15%;
    }
</style>
@endpush
@push('scripts')
<script src="/libs/dz/dropzone.js"></script>
<link rel="stylesheet" href="/libs/dz/dropzone.css" />
<script>
    Dropzone.autoDiscover = false;
</script>
<script>
    var ep = "{{route('job.resource.upload')}}";
</script>
<script>
    var files = [];
    var dz = null;
    $(document).ready(function () {
        dz =  $('#dz-1-o').dropzone({
            autoProcessQueue: false,
            addedfile:function(f){
                // alert("File Added");
                // console.log(f,arguments);
                files.push(f);
                On_AddedFile(f);
            },
            sending:function(){
                return false;
            }
        });
        dz.uploadFiles  = $.noop;
        // dz.on('addedfile',function () {
        //     alert("File Added");
        // })
        $('#btnUpload').click(function(){
            var fd = GetFilesFormWithData();
            fd.append('_token',"{{csrf_token()}}");
            fetch(ep,{method:"POST",body:fd}).then(res => res.json()).then(console.log);
        })
    });

    function On_AddedFile(fileObject) {
        var template = $("#FileTemplate").text();
        var nwFileTh = $(template);
        var guid = GetNewGUID();

        nwFileTh.find('.file-title-input').val(fileObject.name);
        nwFileTh.find('.file-title-input').attr("id",`title-${guid}`);
        nwFileTh.find('.file-title-label').attr("for",`title-${guid}`);
        nwFileTh.find('.file-description-input').attr("id",`description-${guid}`);
        nwFileTh.find('.file-description-label').attr("for",`description-${guid}`);
        // nwFileTh.find('.file-thumb').attr("data-ext",fileObject.guessFileExtension());
        // nwFileTh.find('.file-thumb').attr("data-size",fileObject.toSizeKb());
        var ext = fileObject.guessFileExtension(), size = fileObject.toSizeKb();
        nwFileTh.find('.file-thumb').attr("src",`/res/fileicon/${ext}/${size}`);
        nwFileTh.find('.delete-container .btn').on('click',function () {
            $(this).parents('.file-resource-wrapper').remove();
        });
        nwFileTh.find('.file-title-input').data('file',fileObject);
        nwFileTh.find('.file-title-input').data('fileid',guid);

        $('#filesList').append(nwFileTh);
    }

    function GetFilesWithData() {
       return $('#filesList .file-resource-wrapper').map(function () {
            var fileId = $(this).find('.file-title-input').data('fileid');
            var file = $(this).find('.file-title-input').data('file');
            var title = $(this).find('.file-title-input').val();
            var description = $(this).find('.file-description-input').val();
            return {fileId,file,title,description};
        }).get();
    }

    function GetFilesFormWithData() {
        var fd = new FormData();
        $('#filesList .file-resource-wrapper').each(function (index) {
            var fileId = $(this).find('.file-title-input').data('fileid');
            var file = $(this).find('.file-title-input').data('file');
            var title = $(this).find('.file-title-input').val();
            var description = $(this).find('.file-description-input').val();
            // return {fileId,file,title,description};
            fd.append(`res[${index}][fileId]`,fileId);
            fd.append(`res[${index}][title]`,title);
            fd.append(`res[${index}][description]`,description);
            fd.append(fileId,file);
        });
        return fd;
    }

    File.prototype.toSizeKb = function () {
        return (this.size/1024).toFixed(2) +" KB";
    }
    File.prototype.toSizeMb = function () {
        return (this.size/1024/1024).toFixed(2) +" MB";
    }
    File.prototype.toSizeGb = function () {
        return (this.size/1024/1024/1024).toFixed(2) +" GB";
    }
    File.prototype.guessFileExtension = function () {
        return this.name.split(".").slice(-1)[0];
    }
    FormData.prototype.asObject = function () {
        var Obj = {};
        var keys = this.keys();
        var keyRes = keys.next();
        while(!keyRes.done){
            var key = keyRes.value;
          var all =  this.getAll(key);
          if(all.length==1){
              Obj[key]= all[0];
          }
          else{
            Obj[key]= all;
          }
          keyRes = keys.next();
        }
        return Obj;
    }
</script>

@endpush
