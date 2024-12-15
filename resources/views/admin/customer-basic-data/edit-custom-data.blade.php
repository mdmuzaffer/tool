@extends('admin.layouts.blank')
@section('title')
Job Customer Datas
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
        <div class="card-header">Customer Data</div>
        <div class="card-body">
            @isset($types,$CustomData)

            <form method="post" action="">
                @csrf
                <div class="formBody">

                </div>
                <div class="form-group pt-3 col-md-3">
                    <button type="submit" class="btn btn-primary form-control">Submit Changes</button>
                </div>
            </form>

            @endisset
        </div>
    </div>
</div>
@endsection

@push('scripts')

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<script>
    window.types= (@json($types));
    window.CustomData = (@json($CustomData));
    window.Data = Object.keys(CustomData).map(function(key) {
        return [key, CustomData[key]];
    });


    $(document).ready(function(){
        for (let [key, value] of Object.entries(types)) {
            MakeBody(value);
        }

        AssignNameAndIndex();

    })

    function MakeBody(CusDataRow){
        var body = $(`<div class="card">
                        <div class="card-title"></div>
                        <div class="card-body eachRowBody">
                            <h2>${CusDataRow.title}</h2>
                        </div>
                    </div>`
        );
        JSONval = JSON.stringify(CusDataRow);
        inp = $(`<input type="text" name="CustomDataValidators[${CusDataRow.slug}]" hidden />`);
        inp.attr('value', JSONval);
        body.append(inp);
        for(i = 0; i < Data.length ; i++){
            if(Data[i][0] == CusDataRow.slug){
                window.AllDataRow = Data[i][1];
                break;
            }
        }
        body.children('.eachRowBody').first().data('count', CusDataRow.count);
        body.children('.eachRowBody').first().data('CusDataInitFields', CusDataRow);
        // console.log(val);
        AllRows = CreateAllRows(AllDataRow, CusDataRow);
        body.find('.card-body').append(AllRows);
        $('.formBody').append(body);
        return;
    }

    function CreateAllRows(Data, CusDataRow){
        var body = $(`
                <div class="col-md-12 AllFields">
                </div>
        `);
        for(i = 0 ; i<Data.length; i++){
            row = CreateFields(Data[i], CusDataRow);
            body.append(row);
        }
        return body;
    }

    function CreateFields(Data, CusDataRow){
        var body = $(`
            <div class="row AllFieldsEachRow">
                <div class="col-md-1 border p-3">
                </div>
                <div class="col-md-11 border p-3 fields">
                    <div class="row">
                    </div>
                </div>
            </div>
        `);

        for(var i =0 ; i<CusDataRow.fields.length; i++){
            RowDataSlug = CusDataRow.fields[i].child_slug;

            if(Data != null){
                for(DataFieldsID = 0; DataFieldsID<Data.length; DataFieldsID++){
                    if(Data[DataFieldsID].key == RowDataSlug){
                        break;
                    }
                }
            }

            console.log(CusDataRow.fields[i]);
            if(CusDataRow.fields[i].field_type == 'textbox'){
                if(Data == null){
                    f = CreateTextBox(CusDataRow.fields[i], null, CusDataRow);
                } else {
                    f = CreateTextBox(CusDataRow.fields[i], Data[DataFieldsID], CusDataRow);
                }

            }
            else if(CusDataRow.fields[i].field_type == 'textarea'){
                if(Data == null){
                    f = CreateTextArea(CusDataRow.fields[i], null, CusDataRow);
                } else {
                    f = CreateTextArea(CusDataRow.fields[i], Data[DataFieldsID], CusDataRow);
                }
            }
            else if(CusDataRow.fields[i].field_type == 'dropdown'){
                if(Data == null){
                    f = CreateDropdown(CusDataRow.fields[i], null, CusDataRow);
                } else {
                    f = CreateDropdown(CusDataRow.fields[i], Data[DataFieldsID], CusDataRow);
                }
            }
            else if(CusDataRow.fields[i].field_type == 'checkbox'){
                if(Data == null){
                    f = CreateCheckBox(CusDataRow.fields[i], null, CusDataRow);
                } else {
                    f = CreateCheckBox(CusDataRow.fields[i], Data[DataFieldsID], CusDataRow);
                }
            }
            body.find('.col-md-11').children('.row').append(f);

        }
        return body;
    }

    function CreateTextBox(RowDataField, Data, CusDataRow){
        value = '';
        id = '';
        action = 'new';
        if(Data != null){
            if(Data.value != null){
                value = Data.value;
            }
            id = Data.id;
            action = 'update';
        }
        var f = $(`
                    <div class="form-group col-md-6">
                        <label class="lbl">${RowDataField.child_title}</label>
                        <input type="text" class="form-control inp" value="${value}">
                        <input type="text" class="form-control row_id" value="${id}" hidden>
                        <input type="text" class="form-control data_type_id" value="${CusDataRow.id}" hidden>
                        <input type="text" class="form-control action" value="${action}" hidden>
                        <input type='text' class='hidden_type' value="textbox" hidden />
                        <small class="small">
                            <label>
                                Is Secret?
                                <input type="checkbox" class="is_secret">
                            </label>
                        </small>
                    </div>
        `);

        // if(id == ''){
        //     f.children('.row_id').first().attr('value', null);
        // }else {
        //     f.children('.row_id').first().attr('value', id);
        // }

        if(Data && Data.is_secret){
            f.find('.is_secret')[0].checked = true;
        }
        f.data('CustomData', RowDataField);
        f.data('slug', CusDataRow.slug);

        return f;
    }

    function CreateTextArea(RowDataField, Data, CusDataRow){
        value = '';
        id = '';
        action = 'new';
        if(Data != null){
            value = Data.value;
            id = Data.id;
            action = 'update';
        }
        var f = $(`
            <div class="form-group col-md-6">
                <label class="lbl">${RowDataField.child_title}</label>
                <textarea class="form-control inp" row="3"></textarea>
                <input type="text" class="form-control row_id" value="${id}" hidden>
                <input type="text" class="form-control data_type_id" value="${CusDataRow.id}" hidden>
                <input type="text" class="form-control action" value="${action}" hidden>
                <input type='text' class='hidden_type' value="textarea" hidden />
                <small class="small">
                    <label>
                        Is Secret?
                        <input type="checkbox" class="is_secret">
                    </label>
                </small>
            </div>
        `);

        // if(id == ''){
        //     f.children('.row_id').first().attr('value', null);
        // }else {
        //     f.children('.row_id').first().attr('value', id);
        // }

        f.children('textarea').first().val(value);
        if(Data && Data.is_secret){
            f.find('.is_secret')[0].checked = true;
        }

        f.data('CustomData', RowDataField);
        f.data('slug', CusDataRow.slug);
        return f;
    }

    function CreateDropdown(RowDataField, Data, CusDataRow){
        if(Data != null){
            value = Data.value;
            id = Data.id;
            action = 'update';
        } else {
            id = '';
            action = 'new';

            for(i = 0; i < RowDataField.options.length; i++){
                if(RowDataField.options[i].is_default){
                    value = RowDataField.options[i].value;
                }
            }
        }

        var f = $(`
                    <div class="form-group col-md-6">
                        <label class="lbl">${RowDataField.child_title}</label>
                        <select class="form-control inp"></select>
                        <input type="text" class="form-control row_id" value="${id}" hidden>
                        <input type="text" class="form-control data_type_id" value="${CusDataRow.id}" hidden>
                        <input type="text" class="form-control action" value="${action}" hidden>
                        <input type='text' class='hidden_type' value="dropdown" hidden />
                        <small class="small">
                            <label>
                                Is Secret?
                                <input type="checkbox" class="is_secret">
                            </label>
                        </small>
                    </div>
        `);

        // if(id == ''){
        //     f.children('.row_id').first().attr('value', null);
        // }else {
        //     f.children('.row_id').first().attr('value', id);
        // }

        if(Data && Data.is_secret){
            f.find('.is_secret')[0].checked = true;
        }

        createDropDownOptions(RowDataField.options, f.children('select').first(), value);
        f.data('CustomData', RowDataField);
        f.data('slug', CusDataRow.slug);

        return f;
    }

    function CreateCheckBox(RowDataField, Data, CusDataRow){
        value = '';
        id = '';
        action = 'new';
        if(Data != null){
            value = Data.value;
            id = Data.id;
            action = 'update';
        }
        var f = $(`
                    <div class="form-group col-md-6">
                        <label>${RowDataField.child_title}</label>
                    </div>
        `);
        createCheckBoxOptions(RowDataField.options, f, value, CusDataRow.id, id, action);

        // if(id == ''){
        //     f.children('.row_id').first().attr('value', null);
        // }else {
        //     f.children('.row_id').first().attr('value', id);
        // }

        if(Data && Data.is_secret){
            f.find('.is_secret')[0].checked = true;
        }

        f.data('CustomData', RowDataField);
        f.data('slug', CusDataRow.slug);
        return f;
    }

    function createDropDownOptions(options, SelectBody, defaultVal){
        var op;
        for(var i = 0; i < options.length; i++){

            op = `<option value="${options[i].value}">${options[i].value}</option>`;
            if(options[i].value == defaultVal){
                op = `<option value="${options[i].value}" selected>${options[i].value}</option>`;
            }

            SelectBody.append(op);
        }
    }

    function createCheckBoxOptions(options, checkbox, defaultVals, data_type_id, id, action){
        // console.log(defaultVals == '');
        var op ;
        var body = $(`
            <div class="col-md-12 border">
            </div>
        `);
        for(var i = 0; i < options.length; i++){
            cbName =`${id}-${i}`;
            op = $(`
                <div class="row pl-3 pt-1">
                    <input type="checkbox" value="${options[i].value}" id="${id}-${i}" class="inp m-1">
                    <label for="${id}-${i}">${options[i].value}</label>
                </div>
            `);

            if(defaultVals == '') {
                // console.log(defaultVals);
                // debugger
                if(options[i].is_default){
                    op.find('input')[0].checked = true;
                }
            }

            body.append(op);

            if(defaultVals != null){
                body.find('input').each(function(ind, inp){
                    for(j = 0; j < defaultVals.length; j++){
                        if($(inp).val() == defaultVals[j]){
                            inp.checked = true;
                        }
                    }
                });

            }
        }
        additional = $(`
                <input type="text" class="form-control row_id" value="${id}" hidden>
                <input type="text" class="form-control data_type_id" value="${data_type_id}" hidden>
                <input type="text" class="form-control action" value="${action}" hidden>
                <input type='text' class='hidden_type' value="checkbox" hidden />
                <small class="small">
                    <label>
                        Is Secret?
                        <input type="checkbox" class="is_secret">
                    </label>
                </small>
        `);

        checkbox.append(body);
        checkbox.append(additional);
    }

    function AssignNameAndIndex(){
        AllCards = $('.formBody').find('.eachRowBody');
        // console.log($(AllCards).data('count'));

        $(AllCards).each(function(ind,card){
            if($(card).data('count') != 0){
                delete_btn_hide = true;
            } else {
                delete_btn_hide = false;
            }

            allRow = $(card).find('.AllFieldsEachRow');
            count = 0;
            $(allRow).each(function(ind, row){

                AssignName(row, count);
                AssignIndex(row, count, delete_btn_hide);

                count++;
            });
            $(card).data('total_row', count);
            AddMoreButtonLoader(card);
            AddRowEvent();
        });

    }

    function AssignIndex(row, count, delete_btn_hide){
        $(row).children('.col-md-1').first().empty();

        // console.log(delete_btn_hide);
        if(delete_btn_hide){
            heading = $(`
                <div class="m-auto text-center">
                    <h3>${count+1}</h3>
                    <button type="button" class="btn btn-icon btn-outline-dark-xx  text-danger cd-btn-remove-row" title="Remove" hidden> <i class="fa fa-times fa-2x"></i> </button>
                </div>
            `);
        } else {
            heading = $(`
                <div class="m-auto text-center">
                    <h3>${count+1}</h3>
                    <button type="button" class="btn btn-icon btn-outline-dark-xx  text-danger cd-btn-remove-row" title="Remove"> <i class="fa fa-times fa-2x"></i> </button>
                </div>
            `);
        }
        heading.children('.cd-btn-remove-row').first().data('count',count);
        $(row).children('.col-md-1').first().append(heading);
        LoadDeleteRowEvent();
    }

    function AssignName(row, count){
        // console.log(row);

        $(row).find('.form-group').each(function(ind, frmGroup){

            // if($(frmGroup).find('.row_id').first().val()){
            //     action = 'update' ;
            // } else {
            //     action = 'new';
            // }

            CusData = $(frmGroup).data('CustomData');
            slug = $(frmGroup).data('slug');
            row_id = $(frmGroup).parents('.AllFieldsEachRow').data('row_id');
            custom_data_id = $(frmGroup).data('custom_data_type_id');

            $(frmGroup).find('.lbl').each(function(ind, label){
                $(label).attr('for',`${CusData.child_slug}-${count}`);
            });

            $(frmGroup).find('.inp').each(function(ind, inpBox){
                if(CusData.field_type == "checkbox"){
                    // $(inpBox).attr('id',`${CusData.child_slug}-${count}`);
                    $(inpBox).attr('name',`CustomData[${slug}][${count}][${CusData.child_slug}][value][]`);
                } else {
                    $(inpBox).attr('id',`${CusData.child_slug}-${count}`);
                    $(inpBox).attr('name',`CustomData[${slug}][${count}][${CusData.child_slug}][value]`);
                }
            });
            $(frmGroup).find('.row_id').each(function(ind, inpBox){
                $(inpBox).attr('name',`CustomData[${slug}][${count}][${CusData.child_slug}][row_id]`);
            });
            $(frmGroup).find('.data_type_id').each(function(ind, inpBox){
                $(inpBox).attr('name',`CustomData[${slug}][${count}][${CusData.child_slug}][custom_data_type_id]`);
            });
            $(frmGroup).find('.is_secret').each(function(ind, inpBox){
                $(inpBox).attr('name',`CustomData[${slug}][${count}][${CusData.child_slug}][is_secret]`);
            });
            $(frmGroup).find('.hidden_type').each(function(ind, inpBox){
                $(inpBox).attr('name',`CustomData[${slug}][${count}][${CusData.child_slug}][type]`);
            });
            $(frmGroup).find('.action').each(function(ind, inpBox){
                $(inpBox).attr('name',`CustomData[${slug}][${count}][${CusData.child_slug}][action]`);
            });
        });
    }

    function LoadDeleteRowEvent(){
        $('.cd-btn-remove-row').click(function(){

            if($(this).parents('.eachRowBody').data('total_row') > 1 && $(this).parents('.eachRowBody').data('count') == 0){
                if($(this).parents('.AllFieldsEachRow').find('.row_id').first().val() != ''){
                    $(this).parents('.AllFieldsEachRow').find('.row_id').each(function(ind, row_id){
                        val =$(row_id).val();
                        delete_fld = $(`
                            <input type="textbox" name="delete[]" value="${val}" hidden/>
                        `);
                        $('.formBody').append(delete_fld);

                    });
                }
                $(this).parents('.AllFieldsEachRow').remove();
                AssignNameAndIndex();
            }
        });
        // debugger
    }

    function AddMoreButtonLoader(cardBody){
        $(cardBody).children('.AddRow').first().remove();
        if($(cardBody).data('total_row') < $(cardBody).data('count') || $(cardBody).data('count') == 0){
            btn = $(`
                <button class="btn btn-outline-success AddRow" type="button">Add Row</button>
            `);
            $(cardBody).append(btn);
        } else if($(cardBody).data('total_row') == $(cardBody).data('count')){
            $(cardBody).children('.AddRow').first().remove();
        }
    }

    function AddRowEvent(){
        $('.AddRow').click(function(){
            fields = $(this).parents('.eachRowBody').data('CusDataInitFields');
            row = CreateFields(null, fields);
            var body = $(`
                <div class="col-md-12 AllFields"></div>
            `);
            body.append(row);
            $(this).parents('.eachRowBody').append(body);
            AssignNameAndIndex();
        })
    }

</script>
@endpush
