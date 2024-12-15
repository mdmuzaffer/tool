@extends('admin.layouts.blank')
@section('title')
Client Details
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Client Details</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Client Details</div>
        <div class="card-body">

            {{-- main-body  --}}
            <div class="container-fluid">

                {{-- custom dynamic data  --}}
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h2>Client Data</h2>
                    </div>
                    <div class="col-md-12">
                        @if ($customer->hasCustomData())

                        @if($u->hasRole(\App\Role::ADMIN_ROLE_CLIENT_DATA_UPDATE) || $u->is_superuser)
                        <a href="{{ route('job.customer.edit.data', ['id' => $customer->id]) }}"
                            class="btn btn-outline-primary">Edit Data</a>
                        @endif
                        <a href="{{ route('job.customer.view.data', ['id' => $customer->id]) }}"
                            class="btn btn-outline-primary">View Data</a>

                        @else

                        @if($u->hasRole(\App\Role::ADMIN_ROLE_NEW_CLIENT_DATA_ENTRY) || $u->is_superuser)
                        <a href="{{ route('job.customer.add.data', ['id' => $customer->id]) }}"
                            class="btn btn-outline-primary">Add Data</a>
                        @endif

                        @endif
                    </div>
                </div>

                <!-- Resource Files: DevD -->
                <div class="row mt-4">
                    <div class="col-12 p-2">
                        {{-- {{dd($job->RelatedJobs)}} --}}
                        <h2>Resources ({{$customer->resource_count}})</h2>
                        <div class="row mt-1">
                            @if ($customer->resource_count>0)
                            @foreach ($customer->RelatedResources as $item)
                            <div class="col-md-3 mt-2">
                                <div class="card " data-style="width:100px">
                                    <img class="card-img-top mt-1" src="{{$item->fileicon_url}}" alt="{{$item->title}}"
                                        style="max-width: 30%; margin: 2px auto;">
                                    <div class="card-body">

                                        <small class="card-title">
                                            <div class="row">
                                                <div class="col-md-2 p-auto">
                                                    <form action="{{route('delete.res.post',['res'=>$item->id])}}" method="POST">
                                                        @csrf
                                                        <input type="text" name="chksm" value="{{$item->chksm}}" hidden>
                                                        <button type="submit" class="btn btn-outline-red btn-icon btn-xs" id="deleteRes">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-md-2 p-auto">
                                                    <a href="{{$item->download_url}}" class="btn btn-xs btn-outline-blue btn-icon"
                                                        title="Download File">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            {{$item->title}}
                                        </small>
                                        <p class="card-text"><i>Description: </i>{{$item->description_short}}</p>
                                        {{-- <a href="#" class="btn btn-primary x-stretched-link">See Profile</a> --}}
                                        <small class="card-text small">
                                            <i class="small">{{$item->created_at}}</i>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="col-md-12">
                                <p>No resources uploaded</p>
                            </div>

                            @endif
                        </div>
                    </div>
                </div>

                {{-- btn  --}}
                <div class="row">
                    <div class="col-md-12">
                        <input type="button" class="btn btn-outline-primary" value="Upload Resources" id="upldBtn"
                            data-toggle="modal" data-target="#UploadFiles">
                    </div>
                </div>

            </div>

            {{-- file upload model body  --}}
            <div class="modal full-screen fade" id="UploadFiles" data-backdrop="static" tabindex="-1" role="dialog"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">File Upload</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-4">
                                    <div id="dropzone">
                                        <form method="post" action="/" class="dropzone needsclick" id="dz-1-o">
                                            @csrf
                                            <div class="dz-message needsclick">
                                                <button type="button" class="dz-button">Drop files here or click to
                                                    upload.</button>
                                            </div>
                                        </form>
                                    </div>
                                    <button class="btn btn-primary m-2" type="button" id="btnUpload">Upload</button>
                                </div>
                                <div class="p-3 col-8">
                                    <div class="row" id="filesList">

                                    </div>
                                </div>
                            </div>
                            {{-- <hr /> --}}

                        </div>
                        {{-- <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        </div> --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
<script src="/libs/dz/dropzone.js"></script>
<link rel="stylesheet" href="/libs/dz/dropzone.css" />

<script>
    Dropzone.autoDiscover = false;
</script>

<script>
    var epFileUploadAjax = "{{ route('customer.files.upload.ajax', [ 'customer' => $customer->id ]) }}";
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
            fetch(epFileUploadAjax,{method:"POST",body:fd}).then(res => res.json())
            .then(v => location.reload())
            .then(console.log);
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

@endpush


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

<style>
    .modal.full-screen .modal-dialog {
        padding-right: 0px !important;
    }

    .modal.full-screen .modal-dialog {
        max-width: calc(100vw - 0rem);
        /* margin: 0px !important; */
        margin: 0px 1rem;
        display: -webkit-box;
        display: flex;
    }

    .modal.full-screen .modal-content {
        height: calc(100vh - 0rem);
        overflow: hidden;
    }

    .modal.full-screen .modal-header,
    .modal.full-screen .modal-footer {
        flex-shrink: 0;
    }

    .modal.full-screen .modal-body {
        overflow-y: auto;
    }
</style>
<script>
    (function ($) {
        $(document).on('shown.bs.modal', ".modal.full-screen", function () {
            $(this).css("padding-right",0);
        });
    })(jQuery)
</script>
{{--
<script>
    function ClinetDataFormSubmitLoader(){
        window.location.href = "{{route('job.job.clint.data.form',['job_id'=>$job_id])}}";
}
function ClinetDataFormEditLoader(){
window.location.href = "{{route('job.job.clint.data.edit.form',['job_id'=>$job_id])}}";
}
</script> --}}

{{-- <script>
    var customDataList = (@json($DataTypeJson));
    var FromDiv = $('.custom-data-from');
    var FormBody = $(`
        <div class="card">
            <div class="card-title"></div>
            <div class="card-body">
                <div class="form-body-field"></div>
            </div>
        </div>
    `);
    var fields = FormBody.find('.form-body-fields');
    Create

</script> --}}

@endpush
