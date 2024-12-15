@extends('admin.layouts.blank')
@section('title')
Job Details
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Job Details</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Job Details</div>
        <div class="card-body">

            {{-- main-body  --}}
            <div class="container-fluid">

                @php
                $color= [
                "Pending" => 'red',
                "Sent To Worker" => 'orange',
                "Seen By Worker" => 'black',
                "Accepted By Worker" => '#0bb5f7',
                "Rejected By Worker" => 'red',
                "Finished By Worker" => 'green',
                "Sent To Auditor" => 'orange',
                "Seen By Auditor" => 'black',
                "Accepted By Auditor" => 'sky',
                "Rejected By Auditor" => 'red',
                "Finished By Auditor" => 'green',
                "Worker Waiting For Approval" => 'orange',
                "Auditor Waiting For Approval" => 'orange',
                "Finished" => 'green ',
                "Rejected" => 'red',
                'Aborted' => 'red',
                'Re-assigned' => 'orange'
                ]
                @endphp

                <div class="row mt-3">
                    <div class="col-md-12">
                        <h5>STATUS : <span style="color:{{$color[$status]}}">{{$status}}</span></h5>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">

                        <h2>Choose Action</h2>

                        {{-- buttons --}}
                        @php
                            $sts = strtolower($status);
                            // dd($sts);
                        @endphp

                        {{-- worker part --}}
                        @if ($sts == "pending" && ($u->hasRole(\App\Role::ADMIN_ROLE_JOB_ALLOCATION_TO_EMPLOYEE) || $u->is_superuser))
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                data-target="#AssignWorker" id="assign">
                                Assign A Worker
                            </button>
                        @endif


                        @if ($sts == "worker waiting for approval" && ($u->hasRole(\App\Role::ADMIN_ROLE_JOB_ALLOCATION_TO_EMPLOYEE) || $u->is_superuser))
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                data-target="#AssignWorker" id="assign">
                                Assign Another Worker
                            </button>
                        @endif

                        @if ($sts == "worker waiting for approval" && ($u->hasRole(\App\Role::ADMIN_ROLE_JOB_ALLOCATION_TO_EMPLOYEE) || $u->is_superuser))
                            <form action="{{route('job.job.admin.reassign.job', ['job_id'=>$job_id])}}" method="post">
                                @csrf
                                <button class="btn btn-outline-primary mt-2" type="submit">
                                    Assign Again For Correction
                                </button>
                            </form>
                        @endif

                        @if ($sts == "worker waiting for approval" && ($u->hasRole(\App\Role::ADMIN_ROLE_JOB_ALLOCATION_TO_EMPLOYEE) || $u->is_superuser))
                            <form action="{{route('job.job.admin.give.approval', ['job_id'=>$job_id])}}" method="post">
                                @csrf
                                <button class="btn btn-outline-primary mt-2" type="submit">
                                    Give Approval And Finish
                                </button>
                            </form>
                        @endif

                        {{-- @if ($sts == "worker waiting for approval")
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                data-target="#AssignAuditor" id="assign">
                                Give Approval And Assign An Auditor
                            </button>
                        @endif --}}
                        {{-- worker parts ends  --}}

                        {{-- auditor part starts  --}}
                        @if ($sts == "finished by worker" && ($u->hasRole(\App\Role::ADMIN_ROLE_JOB_ALLOCATION_TO_EMPLOYEE) || $u->is_superuser))
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                data-target="#AssignAuditor" id="assign">
                                Assign An Auditor
                            </button>
                        @endif

                        @if ($sts == "auditor waiting for approval" && ($u->hasRole(\App\Role::ADMIN_ROLE_JOB_ALLOCATION_TO_EMPLOYEE) || $u->is_superuser))
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                data-target="#AssignWorker" id="assign">
                                Assign Another Auditor
                            </button>
                        @endif

                        @if ($sts == "auditor waiting for approval" && ($u->hasRole(\App\Role::ADMIN_ROLE_JOB_ALLOCATION_TO_EMPLOYEE) || $u->is_superuser))
                            <form action="{{route('job.job.admin.reassign.job', ['job_id'=>$job_id])}}" method="post">
                                @csrf
                                <button class="btn btn-outline-primary mt-2" type="submit">
                                    Assign Again For Correction
                                </button>
                            </form>
                        @endif

                        @if ($sts == "auditor waiting for approval" && ($u->hasRole(\App\Role::ADMIN_ROLE_JOB_ALLOCATION_TO_EMPLOYEE) || $u->is_superuser))
                            <form action="{{route('job.job.admin.give.approval', ['job_id'=>$job_id])}}" method="post">
                                @csrf
                                <button class="btn btn-outline-primary mt-2" type="submit">
                                    Give Approval And Finish
                                </button>
                            </form>
                        @endif

                        {{-- @if ($sts == "auditor waiting for approval")
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                data-target="#AssignAuditor" id="assign">
                                Give Approval And Assign An Auditor
                            </button>
                        @endif --}}
                        {{-- auditor part end  --}}

                        @if ($sts != "finished" && $sts != "aborted")
                            <form action="{{route('job.job.admin.abort.job', ['job_id'=>$job_id])}}" method="post">
                                @csrf
                                <button class="btn btn-outline-danger mt-2" type="submit">
                                    Abort Job
                                </button>
                            </form>
                        @endif


                        {{-- <button type="button" class="btn outline-primary" data-toggle="modal"
                            data-target="#AssignWorker" id="assign" @if (strtolower($status) !="pending" )
                            style="display:none;" @endif>
                            Assign A Worker
                        </button>

                        <button type="button" class="btn outline-primary" data-toggle="modal"
                            data-target="#AssignAuditor" id="assign" @if (strtolower($status) !="finished by worker" )
                            style="display:none;" @endif>
                            Assign An Auditor
                        </button> --}}

                        {{-- <a class="nav-link" href="{{route('employee.jobs.current')}}">Job Actions</a> --}}


                    </div>
                </div>

                {{-- custom dynamic data  --}}
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h2>Client Data</h2>
                    </div>
                    <div class="col-md-12">
                        @if($u->hasRole(\App\Role::ADMIN_ROLE_GIVE_ACCESS_CLIENT_DATA) || $u->is_superuser)
                        <a href="{{route('job.job.data.access',['job_id'=>$job_id])}}"
                            class="btn btn-outline-primary">Give Access To Data</a>
                        @endif
                        @if ($job->hasCustomData())
                        {{-- <a href="{{route('job.job.client.data.edit.form',['job_id'=>$job_id])}}"
                            class="btn btn-outline-primary">Edit Data</a> --}}
                        <a href="{{route('job.job.client.data.view', ['job_id'=>$job_id])}}"
                            class="btn btn-outline-primary">View Data</a>
                        @else
                        <p>Data Not Added Yet.</p>
                        {{-- <a href="{{route('job.job.client.data.form',['job_id'=>$job_id])}}"
                            class="btn btn-outline-primary">Add Data</a> --}}
                        @endif
                    </div>
                </div>

                <!-- Resource Files: DevD -->
                <div class="container mt-4 p-0">
                    <div class="row">
                        <div class="pt-3 pl-2">
                            <h2>Resources ({{$job->JobCustomer->resource_count}})</h2>
                        </div>
                        <div class="col-md-2 d-none">
                            <button type="button" class="btn btn-icon btn-outline-indigo m-2" data-toggle="modal"
                                data-target="#UploadFiles" id="uploadFiles" title="Upload Job Resources">
                                <i class="fa fa-upload"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row mt-1">
                        @if ($job->JobCustomer->resource_count>0)
                        @foreach ($job->JobCustomer->RelatedResources as $item)
                            <div class="col-md-3 mt-2">
                                <div class="card " data-style="width:100px">
                                    <img class="card-img-top mt-1" src="{{$item->fileicon_url}}" alt="{{$item->title}}"
                                        style="max-width: 30%; margin: 2px auto;">
                                    <div class="card-body">
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

                        <div class="col-md-12 mt-3">
                            <a href="{{route('job.job.resource.access',['job_id'=> $job_id])}}" class="btn btn-outline-primary">Set Access Permission</a>
                        </div>
                    </div>
                </div>

                {{-- report files  --}}
                <div class="row mt-4">
                    <div class="col-12 p-2">
                        <h2>Submitted Reports @if($job->report_count) ({{$job->report_count}}) @endif</h2>
                        <div class="row mt-1">
                            @if ($job->report_count>0)
                            @foreach ($job->JobReports as $item)
                            <div class="col-md-3 mt-2">
                                <div class="card " data-style="width:100px">
                                    <img class="card-img-top mt-1" src="{{$item->fileicon_url}}" alt="{{$item->title}}"
                                        style="max-width: 30%; margin: 2px auto;">
                                    <div class="card-body">

                                        <small class="card-title">
                                            <a href="{{$item->download_url}}" class=" text-dark small"
                                                title="Download File">
                                                <i class="fa fa-download"></i>
                                            </a>
                                            {{$item->title}}
                                        </small>
                                        <p class="card-text"><i>Description: </i>{{$item->description_short}}</p>
                                        {{-- <a href="#" class="btn btn-primary x-stretched-link">See Profile</a> --}}
                                        <p class="card-text">Uploaded By : {{$item->getRelatedEmpDetails->full_name}}
                                        </p>
                                        <small class="card-text small">
                                            <i class="small">{{$item->created_at}}</i>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="col-md-12">
                                <p>No Reports uploaded</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            {{-- asssign worker model body  --}}
            <div class="modal fade" id="AssignWorker" data-backdrop="static" tabindex="-1" role="dialog"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Assign A Worker</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('job.job.assign.worker',['id'=>$job_id])}}" id="employee"
                                method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="mandatory-label">Selcet an employee</label>
                                    <select name="emp_id" id="emp_id" class="form-control">
                                        <option value="" Selected>Select</option>
                                        @foreach ($emps as $emp)
                                        @if($emp->hasRole(\App\Role::EMPLOYEE_ROLE_CAN_WORK))
                                        <option value="{{$emp->id}}" @if(in_array($emp->id, $assigned_worker_ids)) disabled @endif>
                                            {{$emp->getFullNameAttribute()}} ({{$emp->id}})
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" id="Date">
                                    <label for="worker_job_ends_at" class="mandatory-label">Job End Date For
                                        Worker</label>
                                    <input type="text" name="worker_job_ends_at" id="worker_job_ends_at"
                                        class="form-control datepicker" data-provide="datepicker"
                                        data-date-format="dd/mm/yyyy" onchange="DateCalculatorWorker()" required>
                                        <span class="small" id="worker_job_ends_at_count"></span>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="button"
                                onclick="document.getElementById('employee').submit()">Submit</button></div>
                    </div>
                </div>
            </div>

            {{-- assign audiotor model body  --}}
            <div class="modal fade" id="AssignAuditor" data-backdrop="static" tabindex="-1" role="dialog"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Assign A Auditor</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('job.job.assign.auditor',['id'=>$job_id])}}" id="auditor"
                                method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="mandatory-label">Selcet an employee</label>
                                    <select name="emp_id" id="emp_id" class="form-control">
                                        <option value="" Selected>Select</option>
                                        @foreach ($emps as $emp)
                                        @if($emp->hasRole(\App\Role::EMPLOYEE_ROLE_CAN_AUDIT))
                                        <option value="{{$emp->id}}" @if(in_array($emp->id, $assigned_auditor_ids)) disabled @endif>
                                            {{$emp->getFullNameAttribute()}} ({{$emp->id}})
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" id="Date">
                                    <label for="auditor_job_ends_at" class="mandatory-label">Job End Date For
                                        Auditor</label>
                                    <input type="text" name="auditor_job_ends_at" id="auditor_job_ends_at"
                                        class="form-control datepicker" data-provide="datepicker"
                                        data-date-format="dd/mm/yyyy" onchange="DateCalculatorAuditor()" required>
                                        <span class="small" id="auditor_job_ends_at_count"></span>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="button"
                                onclick="document.getElementById('auditor').submit()">Submit</button></div>
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
    var epFileUploadAjax = "{{ route('job.job.files.upload.ajax', [ 'job' => $job_id ]) }}";
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

@push('scripts')
<script>
    function DateCalculatorWorker(){
        console.log('dj');
        var start = moment('{{now()->format("d/m/Y")}}','DD/MM/YYYY');
        var end = moment($('#worker_job_ends_at').val(),'DD/MM/YYYY');
        days = moment.duration(end.diff(start)).asDays();
        $('#worker_job_ends_at_count').text(`${days} Days`);
    }
    function DateCalculatorAuditor(){
        var start = moment('{{now()->format("d/m/Y")}}','DD/MM/YYYY');
        var end = moment($('#auditor_job_ends_at').val(),'DD/MM/YYYY');
        days = moment.duration(end.diff(start)).asDays();
        $('#auditor_job_ends_at_count').text(`${days} Days`);
    }
</script>

@endpush
