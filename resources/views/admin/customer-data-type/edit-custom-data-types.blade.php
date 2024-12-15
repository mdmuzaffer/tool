@extends('admin.layouts.blank')
@section('title')
Customer Data Type
@endsection
@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                {{-- <div class="page-header-icon"><i data-feather="layout"></i></div> --}}
                <span>Edit Data Types</span>
            </h1>
            {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card-header">Edit</div>
        <div class="card-body p-3">

            <form action="{{route('admin.settings.dynamic-data-type.edit.post',['c_data' => $data->id])}}" method="POST"
                data-onsubmit="return validateForm()">
                @csrf

                <div class="row" id="form">

                </div>

                {{-- <div class="col-md-4 m-auto">
                    <div class="m-3">
                        <input type="button" class="btn btn-primary form-control" value="ADD" onclick="FormLoader()">
                    </div>
                </div> --}}

                <div class="col-md-4 m-auto mt-5">
                    <div class="m-3">
                        {{-- <input type="submit" value="submit" class="form-control btn btn-primary"> --}}
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>

            </form>
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

    data = @json($data);

    function FormLoader(){
        // id++;
        var nwFrm = $("<div class='col-md-12 data-row'></div>")
        .attr({
            'data-row-id' : id
        });
        $("#form").append(nwFrm);

        // $($("#form").children().eq(id))
        nwFrm.append(`
            <div class="card mt-5 " data-style="border:3px solid #000000b5">
                <div class="card-body">
                    <div class="row main-body">

                    </div>
                </div>
            </div>`
        );

        divTitle = '<div class="row mt-3 mb-5">'+
                        '<div class="col-md-10">' +
                            '<h4>Custom Data Type</h4>' +
                        '</div>'+
                    '</div>';

        nwFrm.find(".card-body").prepend(divTitle);


        DataTypeID = $(`<div class="">
                    <input hidden type="text" id="DataTypeID" name="DataTypeID">
                </div>`
        );

        title = $(`<div class="form-group col-md-3">
                    <label for="title">Title</label>
                    <input autofocus class="form-control" type="text" id="title" name="title" data-row-attr-type="title" >
                </div>`
        );

        // title.find('#title').first().val(data['title']);

        slugInput = $(`<div class="form-group col-md-3">
                    <label for="slug">Slug</label>
                    <input class="form-control" type="text" id="slug" name="slug" data-row-attr-type="slug" >
                </div>`
        );

        is_optional = $(`<div class="form-group col-md-3">
                            <label for="is_optional">Is Optional?</label>
                            <select id="is_optional" name="is_optional" class="form-control" data-row-attr-type="is_optional" >
                                <option value="true">Yes</option>
                                <option value="false">No</option>
                        </div>`
        );

        count = $(`<div class="form-group col-md-3">
                    <label for="count">Count</label>
                    <input autofocus class="form-control" type="number" id="count" name="count" min="0" value="0"   data-row-attr-type="count">
                    <small >Set to \'0\' for unlimited. </small>
                </div>`
        );

        desc = $(`<div class="form-group col-md-12">
                    <label for="desc">Description</label>
                    <textarea class="form-control" type="text" id="desc" name="desc" data-row-attr-type="desc" ></textarea>
                </div>`
        );

        // adding data
        DataTypeID.find('#DataTypeID').first().val(data['id']);
        title.find('#title').first().val(data['title']);
        slugInput.find('#slug').first().val(data['slug']);
        count.find('#count').first().val(data['count']);
        desc.find('#desc').first().val(data['description']);
        is_optional.find('option').each(function(ind, op){
            if($(op).attr('value') == data['is_optional']){
                $(op).prop('selected', true);
            }
        });

        // appending to main body
        nwFrm.find(".card-body").children(".main-body").append(DataTypeID);
        nwFrm.find(".card-body").children(".main-body").append(title);
        nwFrm.find(".card-body").children(".main-body").append(slugInput);
        nwFrm.find(".card-body").children(".main-body").append(is_optional);
        nwFrm.find(".card-body").children(".main-body").append(count);
        nwFrm.find(".card-body").children(".main-body").append(desc);


        nwFrm.find(".card-body").append(
            `<div class="form-group" id="field">
                <input class="form-control" type="text" id="total_fields" name="total_fields" hidden value="0">
            </div>`
        );

        button = $(`<div class="col-md-12 mt-5" id="buttons">
                        <div class="row">
                            <div class="col-md-3">
                                <input class="form-control btn btn-success" type="button" value="Add Text" id="tb">
                            </div>
                            <div class="col-md-3">
                                <input class="form-control btn btn-success" type="button" value="Add Single Option" id="dd">
                            </div>
                            <div class="col-md-3">
                                <input class="form-control btn btn-success" type="button" value="Add Multi Option" id="cb">
                            </div>
                            <div class="col-md-3">
                                <input class="form-control btn btn-success" type="button" value="Add Long Text" id="ta">
                            </div>
                        </div>
                    </div>`
        );
        //adding button click events
        button.find('#tb').click(function(){
            // alert('j');
            AddTB(null);
        });
        button.find('#dd').click(function(){
            AddDD(null);
        });
        button.find('#ta').click(function(){
            AddTA(null);
        });
        button.find('#cb').click(function(){
            AddCB(null);
        });

        nwFrm.find(".card-body").append(button);

        FieldsData = data['fields'];
        // console.log(FieldsData);
        FieldsData.forEach(MakeFields);



        // id++;
        nwFrm.find('[data-row-attr-type="title"]').on('change',function () {
            var WrapperForm = $(this).parents('.data-row').first();
            WrapperForm.find('[data-row-attr-type="slug"]').val(slug($(this).val()));
        });
    }

    function MakeFields(EachField){
        console.log('f = ' + EachField);
        if(EachField.field_type == 'textbox'){
            AddTB(EachField);
        } else if(EachField.field_type == 'textarea'){
            AddTA(EachField);
        } else if(EachField.field_type == 'dropdown'){
            AddDD(EachField);
        } else if(EachField.field_type == 'checkbox'){
            AddCB(EachField);
        }
    }

    function AddTB(data){
            total_fields = $("#total_fields").val();
            $("#total_fields").attr('value',parseInt(total_fields)+1);

            body = $(`<div class="row mt-5 p-3 data-field data-field-textbox" id="field-${total_fields}">
                        <div class="col-md-12 mb-2">
                            <div class="row">
                                <div class="col-md-10">
                                    <h5>Field Type : Text</h5>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="form-control btn btn-danger" id="deleteField">Delete</button>
                                </div>
                            </div>
                        </div>


                        <input type="text" id="type" name="field[${total_fields}][field_type]" value="textbox" hidden>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="${total_fields}-child_title">Title</label>
                                    <input class="form-control data-field-title" type="text" id="${total_fields}-child_title" name="field[${total_fields}][child_title]"
                                        data-field-field-type="child_title">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="${total_fields}-child_slug">Slug</label>
                                    <input class="form-control data-field-slug" type="text" id="${total_fields}-child_slug" name="field[${total_fields}][child_slug]"
                                        data-field-field-type="child_slug">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="${total_fields}-is_optional">Is Optional</label>
                                    <select class="form-control" id="${total_fields}-is_optional" name="field[${total_fields}][is_optional]"
                                    data-field-field-type="is_optional">
                                        <option value="true" selected>Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="${total_fields}-default">Default Value (If Any)</label>
                                    <input class="form-control" type="text" id="${total_fields}-default" name="field[${total_fields}][default]"
                                        data-field-field-type="default">
                                </div>
                            </div>
                        </div>`
            );

            // load field delete event
            body.find('#deleteField').click(function(){
                DeleteDataType(this);
            });

            // assigning value
            if(data){
                if(data.child_title != null){
                    body.find('[data-field-field-type="child_title"]').attr('value', data.child_title);
                }
                if(data.child_slug != null){
                    body.find('[data-field-field-type="child_slug"]').attr('value', data.child_slug);
                }
                if(data.default != null){
                    body.find('[data-field-field-type="default"]').attr('value', data.default);
                }
                if(data.is_optional != null){
                    body.find('[data-field-field-type="is_optional"]').children('option').each(function(op){
                        if($(op).attr('value') == data.is_optional){
                            $(op).prop('selected', true);
                        }
                    });
                }
            }

            $("div#field").append(body);
    }

    function AddDD(data){
            total_fields = $("#total_fields").val();
            $("#total_fields").attr('value',parseInt(total_fields)+1);
            body = $(`<div class="row mt-5 data-field data-field-dropdown">
                        <div class="col-md-12 mb-2">
                            <div class="row">
                                <div class="col-md-10">
                                    <h5>Field Type : Single Value Option</h5>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="form-control btn btn-danger" id="deleteField">Delete</button>
                                </div>
                            </div>
                        </div>

                        <input type="text" id="${total_fields}-type" name="field[${total_fields}][field_type]" value="dropdown" hidden>

                        <div class="col-md-12">

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="${total_fields}-child_title">Title</label>
                                    <input class="form-control data-field-title" type="text" id="${total_fields}-child_title" name="field[${total_fields}][child_title]"
                                        data-field-field-type="child_title">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="${total_fields}-child_slug">Slug</label>
                                    <input class="form-control data-field-slug" type="text" id="${total_fields}-child_slug" name="field[${total_fields}][child_slug]"
                                        data-field-field-type="child_slug">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="${total_fields}-is_optional">Is Optional</label>
                                    <select class="form-control" id="${total_fields}-is_optional" name="field[${total_fields}][is_optional]"
                                    data-field-field-type="is_optional">
                                        <option value="true" selected>Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12 options-${total_fields}">
                                    <input class="form-control" type="text" id="${total_fields}-dopdown-total_options" name="field[${total_fields}][total_options]" hidden value="0">
                                    <label>Dropdown Oprions</label>

                                    <div class="row mt-1">
                                        <div class="col-md-2" style="text-align:center">
                                            <label>Default</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Text</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Value</label>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="form-group" id="">
                               <input class="btn btn-info" type="button" onclick="AddDDOption(${total_fields}, null)" value="Add Another Option">
                            </div>
                        </div>

                    </div>`
            );

            $(body).find(`.options-${total_fields}`).data('total_options', 0);

            //putting data in fields
            if(data){
                if(data.child_title != null){
                    body.find('[data-field-field-type="child_title"]').attr('value', data.child_title);
                }
                if(data.child_slug != null){
                    body.find('[data-field-field-type="child_slug"]').attr('value', data.child_slug);
                }
                if(data.is_optional != null){
                    body.find('[data-field-field-type="is_optional"]').children('option').each(function(op){
                        if($(op).attr('value') == data.is_optional){
                            $(op).prop('selected', true);
                        }
                    });
                }
            }

            // load field delete event
            body.find('#deleteField').click(function(){
                DeleteDataType(this);
            });

            $("div#field").append(body);

            //adding fields for options
            if(data != null){
                for(i = 0; i < data.options.length; i++){
                    AddDDOption(total_fields, data.options[i]);
                }
            } else {
                AddDDOption(total_fields, null);
            }
    }

    function AddCB(data){
            total_fields = $("#total_fields").val();
            $("#total_fields").attr('value',parseInt(total_fields)+1);
            body = $(
                    `<div class="row mt-5 data-field data-field-checkbox" id="field-${total_fields}">
                        <div class="col-md-12 mb-2">
                            <div class="row">
                                <div class="col-md-10">
                                    <h5>Field Type : Multiple Value Option</h5>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="form-control btn btn-danger" id="deleteField">Delete</button>
                                </div>
                            </div>
                        </div>

                        <input class="form-control" type="text" id="${total_fields}-field_type" name="field[${total_fields}][field_type]" value="checkbox" hidden>

                        <div class="col-md-12">

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="${total_fields}-child_title">Title</label>
                                    <input class="form-control data-field-title" type="text" id="${total_fields}-child_title" name="field[${total_fields}][child_title]"
                                    data-field-field-type="child_title">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="${total_fields}-child_slug">Slug</label>
                                    <input class="form-control data-field-slug" type="text" id="${total_fields}-child_slug" name="field[${total_fields}][child_slug]"
                                    data-field-field-type="child_slug">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="${total_fields}-is_optional">Is Optional</label>
                                    <select class="form-control" id="${total_fields}-is_optional" name="field[${total_fields}][is_optional]"
                                    data-field-field-type="is_optional">
                                        <option value="true" selected>Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-md-12 options-${total_fields}">
                                    <input class="form-control" type="text" id="${total_fields}-checkbox-total_options" name="field[${total_fields}][total_options]" hidden value="0">
                                    <label>Dropdown Oprions</label>

                                    <div class="row mt-1">
                                        <div class="col-md-2" style="text-align:center">
                                            <label>Default</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Label</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Value</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12" id="">
                                    <input class="btn btn-info" type="button" onclick="AddCBOption(${total_fields}, null)" value="Add Another Option">
                                </div>
                            </div>


                        </div>

                    </div>`
            );

            $(body).find(`.options-${total_fields}`).data('total_options', 0);

            // $(body).find('#CbOptionAdd').click(function(){
            //     AddCBOption($(this).parent('div').siblings('.options'), total_fields, null);
            // });



            //putting data into fields
            if(data){
                if(data.child_title != null){
                    body.find('[data-field-field-type="child_title"]').attr('value', data.child_title);
                }
                if(data.child_slug != null){
                    body.find('[data-field-field-type="child_slug"]').attr('value', data.child_slug);
                }
                if(data.is_optional != null){
                    body.find('[data-field-field-type="is_optional"]').children('option').each(function(op){
                        if($(op).attr('value') == data.is_optional){
                            $(op).prop('selected', true);
                        }
                    });
                }
            }

            // load field delete event
            body.find('#deleteField').click(function(){
                DeleteDataType(this);
            });

            $("div#field").append(body);

            // adding fields for option
            if(data != null){
                for(i = 0; i < data.options.length; i++){
                    AddCBOption(total_fields, data.options[i]);
                }
            } else {
                AddCBOption(total_fields, null);
            }
    }

    function AddTA(data){
            total_fields = $("#total_fields").val();
            $("#total_fields").attr('value',parseInt(total_fields)+1);

            body =  $(`<div class="row mt-5 data-field data-field-textarea">
                        <div class="col-md-12 mb-2">
                            <div class="row">
                                <div class="col-md-10">
                                    <h5>Field Type : Long Text</h5>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="form-control btn btn-danger" id="deleteField">Delete</button>
                                </div>
                            </div>
                        </div>

                        <input class="form-control" type="text" id="${total_fields}-field_type" name="field[${total_fields}][field_type]" value="textarea" hidden>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="${total_fields}-child_title">Title</label>
                                    <input class="form-control data-field-title" type="text" id="${total_fields}-child_title" name="field[${total_fields}][child_title]"
                                        data-field-field-type="child_title">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="${total_fields}-child_slug">Slug</label>
                                    <input class="form-control data-field-slug" type="text" id="${total_fields}-child_slug" name="field[${total_fields}][child_slug]"
                                        data-field-field-type="child_slug">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="${total_fields}-is_optional">Is Optional</label>
                                    <select class="form-control" id="${total_fields}-is_optional" name="field[${total_fields}][is_optional]"
                                    data-field-field-type="is_optional">
                                        <option value="true" selected>Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="${total_fields}-default">Default Value (If Any)</label>
                                    <input class="form-control" type="text" id="${total_fields}-default" name="field[${total_fields}][default]"
                                        data-field-field-type="default">
                                </div>
                            </div>
                        </div>
                    </div>`
            );

            // assigning value
            if(data){
                if(data.child_title != null){
                    body.find('[data-field-field-type="child_title"]').attr('value', data.child_title);
                }
                if(data.child_slug != null){
                    body.find('[data-field-field-type="child_slug"]').attr('value', data.child_slug);
                }
                if(data.default != null){
                    body.find('[data-field-field-type="default"]').attr('value', data.default);
                }
                if(data.is_optional != null){
                    body.find('[data-field-field-type="is_optional"]').children('option').each(function(op){
                        if($(op).attr('value') == data.is_optional){
                            $(op).prop('selected', true);
                        }
                    });
                }
            }

            // load field delete event
            body.find('#deleteField').click(function(){
                DeleteDataType(this);
            });

            $("div#field").append(body);
    }

    function AddDDOption(total_fields, vals){
            // console.log($(body).find(`#${total_fields}-total_options`));
            opBody = $(document).find(`.options-${total_fields}`);
            // console.log(opBody);
            total_options = $(opBody).data('total_options');
            // console.log(opBody.data());
            $(opBody).data('total_options', parseInt(total_options)+1);
            $(opBody).find(`#${total_fields}-dopdown-total_options`).attr('value', parseInt(total_options)+1);
            // console.log(opBody.data());
            options = $(
                `<div class="row mt-1 data-field-option">
                    <div class="col-md-2" style="text-align:center">
                        <input class="" type="radio" id="${total_fields}-option-is_default" name="field[${total_fields}][options][][is_default]" value="true"
                        data-field-field-type="is_default">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control data-field-option-value" type="text" id="${total_fields}-${total_options}-value" name="field[${total_fields}][options][${total_options}][value]" placeholder="Option Text"
                        data-field-field-type="value">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control data-field-option-key" type="text" id="${total_fields}-${total_options}-key" name="field[${total_fields}][options][${total_options}][key]"
                        data-field-field-type="key" placeholder="Option Value">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="form-control btn btn-danger" onclick="DeleteOption(${total_options})">Delete Option</button>
                    </div>
                </div>`
            );

            if(total_options == 0){
                options.find('button').remove();
            }

            if(vals){
                if(vals.value != null){
                    options.find('[data-field-field-type="value"]').attr('value', vals.value);
                }
                if(vals.key != null){
                    options.find('[data-field-field-type="key"]').attr('value', vals.key);
                }
                if(vals.is_default == true){
                    options.find('[data-field-field-type="is_default"]').prop('checked', true);
                }
            }

            $(opBody).append(options);
    }

    function AddCBOption(total_fields, vals){
            opBody = $(document).find(`.options-${total_fields}`);
            // console.log(opBody);
            total_options = $(opBody).data('total_options');
            // console.log(opBody.data());
            $(opBody).data('total_options', parseInt(total_options)+1);
            $(opBody).find(`#${total_fields}-checkbox-total_options`).attr('value', parseInt(total_options)+1);
            cb = $(
                `<div class="row mt-1 data-field-option" id="options-${total_options}"">
                    <div class="col-md-2" style="text-align:center">
                        <input class="" type="checkbox" id="${total_fields}-${total_options}-options-'+total_options+'-is_default" name="field[${total_fields}][options][${total_options}][is_default]"
                        data-field-field-type="is_default">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control data-field-option-value" type="text" id="${total_fields}-${total_options}-value" name="field[${total_fields}][options][${total_options}][value]"
                        data-field-field-type="value" placeholder="Option Text">
                    </div>
                    <div class="col-md-4">
                        <input class="form-control data-field-option-key" type="text" id="${total_fields}-${total_options}-key" name="field[${total_fields}][options][${total_options}][key]"
                        data-field-field-type="key" placeholder="Option Value">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="form-control btn btn-danger btn-sm" onclick="DeleteOption(${total_options})">Delete Option</button>
                    </div>
                </div>`
            );
            if(total_options == 0){
                cb.find('button').remove();
            }
            if(vals){
                if(vals.value != null){
                    cb.find('[data-field-field-type="value"]').attr('value', vals.value);
                }
                if(vals.key != null){
                    cb.find('[data-field-field-type="key"]').attr('value', vals.key);
                }
                if(vals.is_default == true){
                    cb.find('[data-field-field-type="is_default"]').prop('checked', true);
                }
            }

            $(opBody).append(cb);
    }

    function DeleteOption(num){
            $(`#options-${num}`).remove();
    }

    function DeleteDataType(btn){
            $(btn).parents('.data-field').remove();
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
@endpush
