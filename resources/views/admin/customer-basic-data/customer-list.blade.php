@extends('admin.layouts.blank')
@section('title')
Clients
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Clients</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4 card-header-actions">
        <div class="card-header">All Clients
            <span>
                @if($u->hasRole(\App\Role::ADMIN_ROLE_NEW_CLIENT_ENTRY) || $u->is_super_user)
                    <a href="{{route('job.customer.add')}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add New</a>

                    @if($u->hasRole(\App\Role::ADMIN_ROLE_BULK_CLIENT_ENTRY) || $u->is_super_user)
                        <a href="{{route('job.customer.import-basic')}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-file-csv" aria-hidden="true"></i>&nbsp;&nbsp; Import Clients</a>
                    @endif

                     @if($u->hasRole(\App\Role::ADMIN_ROLE_BULK_CLIENT_DATA_ENTRY) || $u->is_super_user)
                        <a href="{{route('job.customer.import-dynamic')}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-file-csv" aria-hidden="true"></i>&nbsp;&nbsp; Import Data</a>
                    @endif
                @endif

            </span>
        </div>
        <div class="card-body p-3">
            <div class="datatable table-responsive">
                <table class="table table-striped DataTable">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Customer ID</th>
                            <th>Name</th>
                            <th>PAN</th>
                            <th>FILE No.</th>
                            <th>Phone</th>
                            <th>Email</th>
                            {{-- <th>Type</th> --}}
                            {{-- <th>Limit</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($dataList) && $dataList->count()>0 )
                        @foreach ($dataList as $item)
                        {{-- {{$item}} --}}
                        @php
                        $b1id = "c1-".Str::uuid();
                        @endphp
                        <tr>
                            <td>
                                <span>
                                    <div class="dropup">
                                        <button
                                            class="btn btn-datatable btn-icon btn-transparent-dark mr-2 x-dropdown-toggle"
                                            id="{{$b1id}}" type="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i data-feather="more-vertical"></i></button>
                                        <div class="dropdown-menu" aria-labelledby="{{$b1id}}">
                                            <a class="dropdown-item"
                                                href="{{route('job.customer.view.details',['id' => $item->id ])}}">View
                                                Data</a>
                                            @if($u->hasRole(\App\Role::ADMIN_ROLE_CLIENT_BASIC_DATA_UPDATE) || $u->is_superuser)
                                            <a class="dropdown-item"
                                                href="{{route('job.customer.edit',['id' => $item->id ])}}">Edit</a>
                                            @endif
                                            <a class="dropdown-item"
                                                href="{{route('job.customer.invoices',['id' => $item->id ])}}">Invoices</a>
                                            <a class="dropdown-item"
                                                href="{{route('job.customer.delete',['id' => $item->id ])}}">Delete</a>
                                        </div>
                                    </div>

                                </span>
                            </td>
                            <td>{!! print_copiable_text($item->slno_gen, "Copy Customer ID") !!}</td>
                            <td>{!! $item->full_name !!}</td>
                            <td>{!! $item->panno !!}</td>
                            <td>{!! $item->fileno !!}</td>
                            <td>{!! $item->phones_text !!}</td>
                            <td>{!! $item->emails_text !!}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6">
                                <p class="text-center font-bold text-danger text-italic"><em>No Data</em></p>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


@push('styles')
<style>
    .data-field {
        border: 2pt dashed #ccc;
        border-radius: 5px;
        margin-top: 3px;
        padding: 0.25em;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function(){
        id = -1;
        FormLoader();
    });


    function FormLoader(){
        id++;
        var nwFrm = $("<div class='col-md-12 data-row' id='row-"+ id +"'></div>")
        .attr({
            'data-row-id' : id
        });
        $("#form").append(nwFrm);

        // $($("#form").children().eq(id))
        nwFrm.append('<div class="card mt-5 " data-style="border:3px solid #000000b5"><div class="card-body"><div class="row main-body"></div></div></div>');

        nwFrm.find(".card-body").prepend(
            '<div class="row mt-3 mb-5">'+
                '<div class="col-md-10">' +
                    '<h4>Custom Data Type</h4>' +
                '</div>'+
                // '<div class="col-md-2">'+
                //     '<input class="form-control btn btn-danger" type="button" value="Delete" onclick="DeleteForm('+id+')">' +
                // '</div>'+
            '</div>'
            );

        // nwFrm.find(".card-body").children(".main-body").append(
        // '<div class="form-group col-md-2">'+
        //     '<label for="row-'+id+'-sort">Sort Order</label>' +
        //     '<input autofocus class="form-control" type="number" id="row-'+id+'-sort" name="row['+id+'][sort]" onkeyup="this.getAttribute(\'id\')">' +
        // '</div>'
        // );



        nwFrm.find(".card-body").children(".main-body").append(
            '<div class="form-group col-md-3">'+
                '<label for="row-'+id+'.-title">Title</label>' +
                '<input autofocus class="form-control" type="text" id="row-'+id+'-title" name="row['+id+'][title]" data-row-attr-type="title" > ' +
            '</div>'
            );

        nwFrm.find(".card-body").children(".main-body").append(
            '<div class="form-group col-md-3">'+
                '<label for="row-'+id+'-slug">Slug</label>' +
                '<input class="form-control" type="text" id="row-'+id+'-slug" name="row['+id+'][slug]" data-row-attr-type="slug" >' +
            '</div>'
            );

        nwFrm.find(".card-body").children(".main-body").append(
            '<div class="form-group col-md-2">'+
                '<label for="row-'+id+'-is_optional">Is Optional?</label>' +
                `<select for="" id="row-${id}-is_optional" name="row[${id}][is_optional]" class="form-control"  data-row-attr-type="is_optional" >`+
                    // `<option value="" selected>SELECT</option>` +
                    `<option value="true">Yes</option>` +
                    `<option value="false">No</option>` +
            '</div>'
            );

        nwFrm.find(".card-body").children(".main-body").append(
        '<div class="form-group col-md-2">'+
            '<label for="row-'+id+'-count">Count</label>' +
            '<input autofocus class="form-control" type="number" id="row-'+id+'-count" name="row['+id+'][count]" min="0" value="0"   data-row-attr-type="count">' +
            '<small >Set to \'0\' for unlimited. </small>' +
        '</div>'
        );

        nwFrm.find(".card-body").append(
            `<div clas="row">` +
                `<div class="form-group">`+
                    `<label for="row-${id}-desc">Description</label>` +
                    `<textarea class="form-control" type="text" id="row-${id}-desc" name="row[${id}][desc]"   data-row-attr-type="desc" ></textarea>` +
                `</div>` +
            `</div>`
            );

        nwFrm.find(".card-body").append(
            '<div class="form-group" id="row-'+id+'-field">'+
                '<input class="form-control" type="text" id="row-'+id+'-total_fields" name="row['+id+'][total_fields]" hidden value="0">' +
            '</div>'
            );

        nwFrm.find(".card-body").append(
            '<div class="form-group" id="row-'+id+'-AddButtons">'+
                '<div class="row">' +
                    '<div class="col-md-3">' +
                        '<input class="form-control brn btn-success" type="button" onclick="AddTB(' + id + ')" value="Add Text">' +
                    '</div>' +
                    '<div class="col-md-3">' +
                        '<input class="form-control btn btn-success" type="button" onclick="AddDD(' + id + ')" value="Add Single Option">' +
                    '</div>' +
                    '<div class="col-md-3">' +
                        '<input class="form-control brn btn-success" type="button" onclick="AddCB(' + id + ')" value="Add Multi Option">' +
                    '</div>' +
                    '<div class="col-md-3">' +
                        '<input class="form-control brn btn-success" type="button" onclick="AddTA(' + id + ')" value="Add Long Text">' +
                    '</div>' +
                '</div>' +
            '</div>'
            );

        // id++;
        nwFrm.find('[data-row-attr-type="title"]').on('change',function () {
            var WrapperForm = $(this).parents('.data-row').first();
            WrapperForm.find('[data-row-attr-type="slug"]').val(slug($(this).val()));
        });
    }



        function AddTB(num){
            total_fields = $("#row-"+num+"-total_fields").val();
            $("#row-"+num+"-total_fields").attr('value',parseInt(total_fields)+1);
            // total_fields = $(".card-body").eq(RowNum).children().find('row['+RowNum+'][total_fields]');
            $("div#row-"+ num +"-field").append(
                        `<div class="row mt-5 data-field data-field-textbox" id="field-${total_fields}" data-field-id="${num}" >` +
                            '<div class="col-md-12 mb-2">' +
                                '<div class="row">'+
                                    '<div class="col-md-10">' +
                                        '<h5>Field Type : Text</h5>' +
                                    '</div>' +
                                    '<div class="col-md-2">' +
                                        '<button type="button" class="form-control btn btn-danger" value="Delete" onclick="DeleteDataType('+total_fields+')">Delete</button>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +


                            '<input type="text" id="row-'+num+'-field-'+total_fields+'-field_type" name="row['+num+'][field]['+total_fields+'][field_type]" value="textbox" hidden>' +

                            '<div class="col-md-12">' +
                                '<div class="row">'+
                                    '<div class="form-group col-md-3">' +
                                        '<label for="row-'+num+'-field-'+total_fields+'-child_title">Title</label>' +
                                        '<input class="form-control data-field-title" type="text" id="row-'+num+'-field-'+total_fields+'-child_title" name="row['+num+'][field]['+total_fields+'][child_title]"' +
                                        ' data-field-field-type="child_title"  >' +
                                    '</div>' +

                                    '<div class="form-group col-md-3">' +
                                        '<label for="row-'+num+'-field-'+total_fields+'-child_slug">Slug</label>' +
                                        '<input class="form-control data-field-slug" type="text" id="row-'+num+'-field-'+total_fields+'-child_slug" name="row['+num+'][field]['+total_fields+'][child_slug]" ' +
                                        ' data-field-field-type="child_title"  >' +
                                    '</div>' +

                                    '<div class="form-group col-md-3">' +
                                        '<label for="row-'+num+'-field-'+total_fields+'-is_optional">Is Optional</label>' +
                                        '<select class="form-control" id="row-'+num+'-field-'+total_fields+'-is_optional" name="row['+num+'][field]['+total_fields+'][is_optional]">' +
                                            '<option value="true" selected>Yes</option>' +
                                            '<option value="false">No</option>' +
                                        '</select>' +
                                    '</div>' +

                                    '<div class="form-group col-md-3">' +
                                        '<label for="row-'+num+'-field-'+total_fields+'-default">Default Value (If Any)</label>' +
                                        '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-default" name="row['+num+'][field]['+total_fields+'][default]">' +
                                    '</div>'+
                                '</div>'+

                            '</div>'
            );
        }

        function AddDD(num){
            total_fields = $("#row-"+num+"-total_fields").val();
            $("#row-"+num+"-total_fields").attr('value',parseInt(total_fields)+1);
            $("div#row-"+ num +"-field").append(
                    `<div class="row mt-5 data-field data-field-dropdown" id="field-${total_fields}">` +
                            '<div class="col-md-12 mb-2">' +
                                '<div class="row">'+
                                    '<div class="col-md-10">' +
                                        '<h5>Field Type : Single Value Option</h5>' +
                                    '</div>' +
                                    '<div class="col-md-2">' +
                                        // '<input type="button" class="form-control btn btn-danger" value="delete" onclick="DeleteDataType('+total_fields+')">' +
                                        '<button type="button" class="form-control btn btn-danger" onclick="DeleteDataType('+total_fields+')">Delete</button>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +

                            '<input type="text" id="row-'+num+'-field-'+total_fields+'-field_type" name="row['+num+'][field]['+total_fields+'][field_type]" value="dropdown" hidden>' +

                            '<div class="col-md-12">' +

                                '<div class="row">' +
                                    '<div class="form-group col-md-4">' +
                                        '<label for="row-'+num+'-field-'+total_fields+'-child_title">Title</label>' +
                                        '<input class="form-control data-field-title" type="text" id="row-'+num+'-field-'+total_fields+'-child_title" name="row['+num+'][field]['+total_fields+'][child_title]">' +
                                    '</div>' +

                                    '<div class="form-group col-md-4">' +
                                        '<label for="row-'+num+'-field-'+total_fields+'-child_slug">Slug</label>' +
                                        '<input class="form-control data-field-slug" type="text" id="row-'+num+'-field-'+total_fields+'-child_slug" name="row['+num+'][field]['+total_fields+'][child_slug]">' +
                                    '</div>' +

                                    '<div class="form-group col-md-4">' +
                                        '<label for="row-'+num+'-field-'+total_fields+'-is_optional">Is Optional</label>' +
                                        '<select class="form-control" id="row-'+num+'-field-'+total_fields+'-is_optional" name="row['+num+'][field]['+total_fields+'][is_optional]">' +
                                            '<option value="true" selected>Yes</option>' +
                                            '<option value="false">No</option>' +
                                        '</select>' +
                                    '</div>' +
                                '</div>' +

                                '<div class="row">'+
                                    '<div class="form-group col-md-12" id="row-'+num+'-field-'+total_fields+'-options">' +
                                        '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-total_options" name="row['+num+'][field]['+total_fields+'][total_options]" hidden value="0">' +
                                        '<label for="row-'+num+'-field-'+total_fields+'-options-0-key">Dropdown Oprions</label>' +

                                        '<div class="row mt-1">' +
                                            '<div class="col-md-2" style="text-align:center">' +
                                                '<label>Default</label>' +
                                            '</div>' +
                                            '<div class="col-md-4">' +
                                                '<label>Text</label>' +
                                            '</div>' +
                                            '<div class="col-md-4">' +
                                                '<label>Value</label>' +
                                            '</div>' +
                                        '</div>' +

                                        // '<div class="row mt-1" id="options-0">' +
                                        //     '<div class="col-md-2" style="text-align:center">' +
                                        //         '<input class="" type="radio" id="row-'+num+'-field-'+total_fields+'-options-0-is_default" name="row['+num+'][field]['+total_fields+'][options][0][is_default]">' +
                                        //     '</div>' +
                                        //     '<div class="col-md-4">' +
                                        //         '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-options-0-key" name="row['+num+'][field]['+total_fields+'][options][0][key]" placeholder="Option Key">' +
                                        //     '</div>' +
                                        //     '<div class="col-md-4">' +
                                        //         '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-options-0-value" name="row['+num+'][field]['+total_fields+'][options][0][value]" placeholder="Option value">' +
                                        //     '</div>' +
                                        //     '<div class="col-md-2">' +
                                        //         '<button type="button" class="form-control btn btn-danger" onclick="DeleteOption(0)" disabled>Delete</button>' +
                                        //     '</div>' +
                                        // '</div>' +

                                    '</div>' +
                                '</div>' +

                                '<div class="form-group" id="">' +
                                        '<input class="btn btn-info" type="button" onclick="AddDDOption(' + num + ','+total_fields+')" value="Add Another Option">' +
                                '</div>' +

                            '</div>' +

                        '</div>'

            );
            AddDDOption(num,total_fields);
        }

        function AddCB(num){
            total_fields = $("#row-"+num+"-total_fields").val();
            $("#row-"+num+"-total_fields").attr('value',parseInt(total_fields)+1);
            $("div#row-"+ num +"-field").append(
                        `<div class="row mt-5 data-field data-field-checkbox" id="field-${total_fields}" data-option-id="${num}">` +
                            '<div class="col-md-12 mb-2">' +
                                '<div class="row">'+
                                    '<div class="col-md-10">' +
                                        '<h5>Field Type : Multiple Value Option</h5>' +
                                    '</div>' +
                                    '<div class="col-md-2">' +
                                        // '<input type="button" class="form-control btn btn-danger" value="delete" onclick="DeleteDataType('+total_fields+')">' +
                                        '<button type="button" class="form-control btn btn-danger" onclick="DeleteDataType('+total_fields+')">Delete</button>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +

                            '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-field_type" name="row['+num+'][field]['+total_fields+'][field_type]" value="checkbox" hidden>' +

                            '<div class="col-md-12">'+

                                '<div class="row">' +
                                    '<div class="form-group col-md-4">' +
                                        '<label for="row-'+num+'-field-'+total_fields+'-child_title">Title</label>' +
                                        '<input class="form-control data-field-title" type="text" id="row-'+num+'-field-'+total_fields+'-child_title" name="row['+num+'][field]['+total_fields+'][child_title]">' +
                                    '</div>' +

                                    '<div class="form-group col-md-4">' +
                                        '<label for="row-'+num+'-field-'+total_fields+'-child_slug">Slug</label>' +
                                        '<input class="form-control data-field-slug" type="text" id="row-'+num+'-field-'+total_fields+'-child_slug" name="row['+num+'][field]['+total_fields+'][child_slug]">' +
                                    '</div>' +

                                    '<div class="form-group col-md-4">' +
                                        '<label for="row-'+num+'-field-'+total_fields+'-is_optional">Is Optional</label>' +
                                        '<select class="form-control" id="row-'+num+'-field-'+total_fields+'-is_optional" name="row['+num+'][field]['+total_fields+'][is_optional]">' +
                                            '<option value="true" selected>Yes</option>' +
                                            '<option value="false">No</option>' +
                                        '</select>' +
                                    '</div>' +
                                '</div>' +

                                '<div class="row">' +

                                    '<div class="form-group col-md-12" id="row-'+num+'-field-'+total_fields+'-options">' +
                                        '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-total_options" name="row['+num+'][field]['+total_fields+'][total_options]" hidden value="0">' +
                                        '<label for="row-'+num+'-field-'+total_fields+'-options-0-key">Dropdown Oprions</label>' +

                                        '<div class="row mt-1">' +
                                            '<div class="col-md-2" style="text-align:center">' +
                                                '<label>Default</label>' +
                                            '</div>' +
                                            '<div class="col-md-4">' +
                                                '<label>Label</label>' +
                                            '</div>' +
                                            '<div class="col-md-4">' +
                                                '<label>Value</label>' +
                                            '</div>' +
                                        '</div>' +

                                        // '<div class="row mt-1" id="options-0">' +
                                        //     '<div class="col-md-2" style="text-align:center">' +
                                        //         '<input class="" type="checkbox" id="row-'+num+'-field-'+total_fields+'-options-0-is_default" name="row['+num+'][field]['+total_fields+'][options][0][is_default]">' +
                                        //     '</div>' +
                                        //     '<div class="col-md-4">' +
                                        //         '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-options-0-value" name="row['+num+'][field]['+total_fields+'][options][0][value]" placeholder="Option value">' +
                                        //     '</div>' +
                                        //     '<div class="col-md-4">' +
                                        //         '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-options-0-key" name="row['+num+'][field]['+total_fields+'][options][0][key]" placeholder="Option Key">' +
                                        //     '</div>' +
                                        //     '<div class="col-md-2">' +
                                        //         '<button type="button" class="form-control btn btn-danger" onclick="DeleteOption(0)" disabled>Delete</button>' +
                                        //     '</div>' +
                                        // '</div>' +
                                    '</div>' +

                                '</div>' +

                                    '<div class="form-group" id="">' +
                                        '<input class="btn btn-info" type="button" onclick="AddCBOption(' + num + ','+total_fields+')" value="Add Another Option">' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +

                        '</div>'

            );
            AddCBOption(num,total_fields);
        }

        function AddTA(num){
            total_fields = $("#row-"+num+"-total_fields").val();
            $("#row-"+num+"-total_fields").attr('value',parseInt(total_fields)+1);
            // total_fields = $(".card-body").eq(RowNum).children().find('row['+RowNum+'][total_fields]');
            $("div#row-"+ num +"-field").append(
                        `<div class="row mt-5 data-field data-field-textarea" id="field-${total_fields}">` +
                            '<div class="col-md-12 mb-2">' +
                                '<div class="row">'+
                                    '<div class="col-md-10">' +
                                        '<h5>Field Type : Long Text</h5>' +
                                    '</div>' +
                                    '<div class="col-md-2">' +
                                        // '<input type="button" class="form-control btn btn-danger" value="delete" onclick="DeleteDataType('+total_fields+')">' +
                                        '<button type="button" class="form-control btn btn-danger" onclick="DeleteDataType('+total_fields+')">Delete</button>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +

                            '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-field_type" name="row['+num+'][field]['+total_fields+'][field_type]" value="textarea" hidden>' +

                            '<div class="col-md-12">'+
                                '<div class="row">' +
                                    '<div class="form-group col-md-3">' +
                                        '<label for="row-'+num+'-field-'+total_fields+'-child_title">Title</label>' +
                                        '<input class="form-control data-field-title" type="text" id="row-'+num+'field-'+total_fields+'-child_title" name="row['+num+'][field]['+total_fields+'][child_title]">' +
                                    '</div>' +

                                    '<div class="form-group col-md-3">' +
                                        '<label for="row-'+num+'-field-'+total_fields+'-child_slug">Slug</label>' +
                                        '<input class="form-control data-field-slug" type="text" id="row-'+num+'-field-'+total_fields+'-child_slug" name="row['+num+'][field]['+total_fields+'][child_slug]">' +
                                    '</div>' +

                                    '<div class="form-group col-md-3">' +
                                        '<label for="row-'+num+'-field-'+total_fields+'-is_optional">Is Optional</label>' +
                                        '<select class="form-control" id="row-'+num+'-field-'+total_fields+'-is_optional" name="row['+num+'][field]['+total_fields+'][is_optional]">' +
                                            '<option value="true" selected>Yes</option>' +
                                            '<option value="false">No</option>' +
                                        '</select>' +
                                    '</div>' +

                                    '<div class="form-group col-md-3">' +
                                        '<label for="row-'+num+'-field-'+total_fields+'-default">Default Value (If Any)</label>' +
                                        '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-default" name="row['+num+'][field]['+total_fields+'][default]">' +
                                    '</div>'+
                                '</div>' +
                            '</div>' +

                        '</div>'
            );
        }

        function AddDDOption(num, total_fields){
            total_options = $('#row-'+num+'-field-'+total_fields+'-total_options').val();
            $('#row-'+num+'-field-'+total_fields+'-total_options').attr('value',parseInt(total_options)+1);
            $($("#row-" + num + "-field-" + total_fields + "-options")).append(
                `<div class="row mt-1 data-field-option" id="options-${total_options}"">` +
                    '<div class="col-md-2" style="text-align:center">' +
                        '<input class="" type="radio" id="row-'+num+'-field-'+total_fields+'-options-'+total_options+'-is_default" name="row['+num+'][field]['+total_fields+'][options]['+total_options+'][is_default]" value="1">' +
                    '</div>' +
                    '<div class="col-md-4">' +
                        '<input class="form-control data-field-option-value" type="text" id="row-'+num+'-field-'+total_fields+'-options-'+total_options+'-value" name="row['+num+'][field]['+total_fields+'][options]['+total_options+'][value]" placeholder="Option Text">' +
                    '</div>' +
                    '<div class="col-md-4">' +
                        '<input class="form-control data-field-option-key" type="text" id="row-'+num+'-field-'+total_fields+'-options-'+total_options+'-key" name="row['+num+'][field]['+total_fields+'][options]['+total_options+'][key]" placeholder="Option Value">' +
                    '</div>' +
                    '<div class="col-md-2">' +
                        `<button type="button" class="form-control btn btn-danger" onclick="DeleteOption(${total_options})">Delete Option</button>` +
                    '</div>' +
                '</div>'
            );
        }

        function AddCBOption(num, total_fields){
            total_options = $('#row-'+num+'-field-'+total_fields+'-total_options').val();
            $('#row-'+num+'-field-'+total_fields+'-total_options').attr('value',parseInt(total_options)+1);
            $($("#row-" + num + "-field-" + total_fields + "-options")).append(
                `<div class="row mt-1 data-field-option" id="options-${total_options}"">` +
                    '<div class="col-md-2" style="text-align:center">' +
                        '<input class="" type="checkbox" id="row-'+num+'-field-'+total_fields+'-options-'+total_options+'-is_default" name="row['+num+'][field]['+total_fields+'][options]['+total_options+'][is_default]">' +
                    '</div>' +
                    '<div class="col-md-4">' +
                        '<input class="form-control data-field-option-value" type="text" id="row-'+num+'-field-'+total_fields+'-options-'+total_options+'-value" name="row['+num+'][field]['+total_fields+'][options]['+total_options+'][value]" placeholder="Option Text">' +
                    '</div>' +
                    '<div class="col-md-4">' +
                        '<input class="form-control data-field-option-key" type="text" id="row-'+num+'-field-'+total_fields+'-options-'+total_options+'-key" name="row['+num+'][field]['+total_fields+'][options]['+total_options+'][key]" placeholder="Option Value">' +
                    '</div>' +
                    '<div class="col-md-2">' +
                        `<button type="button" class="form-control btn btn-danger btn-sm" onclick="DeleteOption(${total_options})">Delete Option</button>` +
                    '</div>' +
                '</div>'
            );
        }

        function DeleteOption(num){
            $(`#options-${num}`).remove();
        }

        function DeleteDataType(num){
            $(`#field-${num}`).remove();
        }

        function DeleteForm(num){
            if($("#form").children().length > 1) {
                $(`#row-${num}`).remove();
            }
        }


        function validateFormMulti(){
            for(i = 0; i < id ; i++){
                SortOrder = $(`#row-${i}-sort`).val();
                Title = $(`#row-${i}-title`).val();
                Slug = $(`#row-${i}-slug`).val();
                IsOptional = $(`#row-${i}-is_optional`).val();
                Description = $(`#row-${i}-desc`).val();
                TotalFields = $(`#row-${i}-total_fields`).val();

                if(isNaN(SortOrder) || SortOrder == ""){
                    return false;
                } else if(Title == "" || /^[ A-Za-z0-9_@./#&+-]*$/.test(Title) == false){
                    return false;
                } else if (Slug == "" || /^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(Slug) == false){
                    return false;
                } else if(IsOptional ==""){
                    return false;
                } else if(Description =="" || Description.length < 5 || /^[ A-Za-z0-9_@./#&+-/s]*$/.test(Description) == false){
                    return false;
                } else if(TotalFields <= 0 || isNaN(TotalFields)){
                    return false;
                }

                for(j = 0; j < TotalFields; j++){
                    FieldType = $(`#row-${i}-field-${j}-field_type`).val();

                    if(FieldType == 'textbox'){
                        TB = ValidateTextBox(i,j);

                    } else if(FieldType == 'textarea'){
                        TA= ValidateTextArea(i,j);

                    } else if(FieldType == 'dropdown') {
                        DD= ValidateDropDown(i,j);

                    } else if(FieldType == 'checkbox') {
                        CB = ValidateCheckBox(i,j);

                    }
                }
            }
            if(CB && DD && TB && TA){
            return true;
            }
        }


        function validateForm(){
            var Rows = $('.data-row[data-row-id]');
            Rows.each(function () {
               var thisRow = $(this);
            });
            for(i = 0; i < id ; i++){
                SortOrder = $(`#row-${i}-sort`).val();
                Title = $(`#row-${i}-title`).val();
                Slug = $(`#row-${i}-slug`).val();
                IsOptional = $(`#row-${i}-is_optional`).val();
                Description = $(`#row-${i}-desc`).val();
                TotalFields = $(`#row-${i}-total_fields`).val();

                if(isNaN(SortOrder) || SortOrder == ""){
                    return false;
                } else if(Title == "" || /^[ A-Za-z0-9_@./#&+-]*$/.test(Title) == false){
                    return false;
                } else if (Slug == "" || /^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(Slug) == false){
                    return false;
                } else if(IsOptional ==""){
                    return false;
                } else if(Description =="" || Description.length < 5 || /^[ A-Za-z0-9_@./#&+-/s]*$/.test(Description) == false){
                    return false;
                } else if(TotalFields <= 0 || isNaN(TotalFields)){
                    return false;
                }

                for(j = 0; j < TotalFields; j++){
                    FieldType = $(`#row-${i}-field-${j}-field_type`).val();

                    if(FieldType == 'textbox'){
                        TB = ValidateTextBox(i,j);

                    } else if(FieldType == 'textarea'){
                        TA= ValidateTextArea(i,j);

                    } else if(FieldType == 'dropdown') {
                        DD= ValidateDropDown(i,j);

                    } else if(FieldType == 'checkbox') {
                        CB = ValidateCheckBox(i,j);

                    }
                }
            }
            if(CB && DD && TB && TA){
            return true;
            }
        }

        function ValidateTextBox(i,j){
            ChildTitle = $(`#row-${i}-field-${j}-child_title`).val();
            ChildSlug = $(`#row-${i}-field-${j}-child_slug`).val();
            ChildIsOptional = $(`#row-${i}-field-${j}-is_optional`).val();
            Default = $(`#row-${i}-field-${j}-default`).val();

            if(ChildSlug == "" || /^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(ChildSlug) == false){
                return false;

            } else if(ChildTitle == "" || /^[ A-Za-z0-9_@./#&+-]*$/.test(ChildTitle) == false){
                return false;

            } else if(ChildIsOptional ==""){
                return false;

            } else if( /^[ A-Za-z0-9_@./#&+-/s]*$/.test(Default) == false){
                return false;

            }
            return true;
        }

        function ValidateTextArea(i,j){
            ChildTitle = $(`#row-${i}-field-${j}-child_title`).val();
            ChildSlug = $(`#row-${i}-field-${j}-child_slug`).val();
            ChildIsOptional = $(`#row-${i}-field-${j}-is_optional`).val();
            Default = $(`#row-${i}-field-${j}-default`).val();

            if(ChildSlug == "" || /^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(ChildSlug) == false){
                return false;

            } else if(ChildTitle == "" || /^[ A-Za-z0-9_@./#&+-]*$/.test(ChildTitle) == false){
                return false;

            } else if(ChildIsOptional ==""){
                return false;

            } else if( /^[ A-Za-z0-9_@./#&+-/s]*$/.test(Default) == false){
                return false;

            }
            return true;
        }

        function ValidateDropDown(i,j){
            ChildTitle = $(`#row-${i}-field-${j}-child_title`).val();
            ChildSlug = $(`#row-${i}-field-${j}-child_slug`).val();
            ChildIsOptional = $(`#row-${i}-field-${j}-is_optional`).val();
            TotalOptions = $(`#row-${i}-field-${j}-total_options`).val();

            if(ChildSlug == "" || /^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(ChildSlug) == false){
                return false;

            } else if(ChildTitle == "" || /^[ A-Za-z0-9_@./#&+-]*$/.test(ChildTitle) == false){
                return false;

            } else if(ChildIsOptional ==""){
                return false;

            } else if(TotalOptions <= 0 || isNaN(TotalOptions)){
                return false;

            }

            for(k = 0; k < TotalOptions; k++){
                IsDefault = $(`#row-${i}-field-${j}-options-${k}-is_default`).val();
                Key = $(`#row-${i}-field-${j}-options-${k}-key`).val();
                Value = $(`#row-${i}-field-${j}-options-${k}-value`).val();
                if(Key="" || /^[ A-Za-z0-9.@_-]*$/.test(Key) == false){
                    return false;
                } else if(Value="" || /^[ A-Za-z0-9.@_-]*$/.test(Value) == false) {
                    return false;
                }
            }

            return true;

        }

        function ValidateCheckBox(i,j){
            ChildTitle = $(`#row-${i}-field-${j}-child_title`).val();
            ChildSlug = $(`#row-${i}-field-${j}-child_slug`).val();
            ChildIsOptional = $(`#row-${i}-field-${j}-is_optional`).val();
            TotalOptions = $(`#row-${i}-field-${j}-total_options`).val();

            if(ChildSlug == "" || /^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(ChildSlug) == false){
                return false;

            } else if(ChildTitle == "" || /^[ A-Za-z0-9_@./#&+-]*$/.test(ChildTitle) == false){
                return false;

            } else if(ChildIsOptional ==""){
                return false;

            } else if(TotalOptions <= 0 || isNaN(TotalOptions)){
                return false;

            }

            for(k = 0; k < TotalOptions; k++){
                IsDefault = $(`#row-${i}-field-${j}-options-${k}-is_default`).val();
                Key = $(`#row-${i}-field-${j}-options-${k}-key`).val();
                Value = $(`#row-${i}-field-${j}-options-${k}-value`).val();
                if(Key="" || /^[ A-Za-z0-9.@_-]*$/.test(Key) == false){
                    return false;
                } else if(Value="" || /^[ A-Za-z0-9.@_-]*$/.test(Value) == false) {
                    return false;
                }
            }

            return true;
        }

    function slug(strText) {
        var outStr = strText.replace(/[^a-zA-Z0-9-]/ig,'-');
        outStr = outStr.split('-').filter(Boolean).join('-').toLowerCase();
        return outStr;
    }

</script>
<script>
    $(document).ready(function () {
       $(document).on('change','.data-field-option-value',function () {
           var parent = $(this).parents('.data-field-option').first();
           parent.find('.data-field-option-key').val(slug($(this).val()));
       });

       //
       $(document).on('change','.data-field-title',function () {
           var parent = $(this).parents('.data-field').first();
           parent.find('.data-field-slug').val(slug($(this).val()));
       });


    });
</script>
<script>
    $(document).ready(function () {
        $('.DataTable').DataTable();
    })
</script>
@endpush
