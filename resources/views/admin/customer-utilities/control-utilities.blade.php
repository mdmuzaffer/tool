{{-- @extends('admin.layouts.blank')

@section('content')

@endsection --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Document</title>
    <style>
        .card {
            background-color:#c7c5c5a6;
        }
    </style>

</head>
<body>
    <div class="container">

        <form action="{{route('admin.settings.dynamic-data-type.post')}}" method="POST" data-onsubmit="return validateForm()">
            @csrf

            <div class="row" id="form">

            </div>

            <div class="col-md-4 m-auto">
                <div class="m-3">
                    <input type="button" class="btn btn-primary form-control" value="ADD" onclick="FormLoader()">
                </div>
            </div>

            <div class="col-md-4 m-auto mt-5">
                <div class="m-3">
                    <input type="submit" value="submit" class="form-control btn btn-primary">
                </div>

            </div>

        </form>

    </div>

    <script>
        $('document').ready(function(){
            id = 0;
            FormLoader();
        });


        function FormLoader(){

            $("#form").append("<div class='col-md-12' id='row-"+ id +"'></div>");

            $($("#form").children().eq(id)).append('<div class="card mt-5" style="border:3px solid #000000b5"><div class="card-body"><div class="row main-body"></div></div></div>');

            $(".card-body").eq(id).prepend(
                '<div class="row mt-3 mb-5">'+
                    '<div class="col-md-10">' +
                        '<h4>FORM</h4>' +
                    '</div>'+
                    '<div class="col-md-2">'+
                        '<input class="form-control btn btn-danger" type="button" value="Delete" onclick="DeleteForm('+id+')">' +
                    '</div>'+
                '</div>'
                );

            $(".card-body").eq(id).children(".main-body").append(
                '<div class="form-group col-md-3">'+
                    '<label for="row-'+id+'-sort">Sort Order</label>' +
                    '<input autofocus class="form-control" type="text" id="row-'+id+'-sort" name="row['+id+'][sort]" onkeyup="this.getAttribute(\'id\')">' +
                '</div>'
                );



            $(".card-body").eq(id).children(".main-body").append(
                '<div class="form-group col-md-3">'+
                    '<label for="row-'+id+'.-title">Title</label>' +
                    '<input autofocus class="form-control" type="text" id="row-'+id+'-title" name="row['+id+'][title]">' +
                '</div>'
                );

            $(".card-body").eq(id).children(".main-body").append(
                '<div class="form-group col-md-3">'+
                    '<label for="row-'+id+'-slug">Slug</label>' +
                    '<input class="form-control" type="text" id="row-'+id+'-slug" name="row['+id+'][slug]">' +
                '</div>'
                );

            $(".card-body").eq(id).children(".main-body").append(
                '<div class="form-group col-md-3">'+
                    '<label for="row-'+id+'-is_optional">Is Optional?</label>' +
                    `<select for="" id="row-${id}-is_optional" name="row[${id}][is_optional]" class="form-control">`+
                        `<option value="" selected>SELECT</option>` +
                        `<option value="true">Yes</option>` +
                        `<option value="false">No</option>` +
                '</div>'
                );

            $(".card-body").eq(id).append(
                `<div clas="row">` +
                `<div class="form-group">`+
                    `<label for="row-${id}-desc">Description</label>` +
                    `<input class="form-control" type="text" id="row-${id}-desc" name="row[${id}][desc]">` +
                `</div>` +
                `</div>`
                );

            $(".card-body").eq(id).append(
                '<div class="form-group" id="row-'+id+'-field">'+
                    '<input class="form-control" type="text" id="row-'+id+'-total_fields" name="row['+id+'][total_fields]" hidden value="0">' +
                '</div>'
                );

            $(".card-body").eq(id).append(
                '<div class="form-group" id="row-'+id+'-AddButtons">'+
                    '<div class="row">' +
                        '<div class="col-md-3">' +
                            '<input class="form-control brn btn-success" type="button" onclick="AddTB(' + id + ')" value="Add Textbox">' +
                        '</div>' +
                        '<div class="col-md-3">' +
                            '<input class="form-control btn btn-success" type="button" onclick="AddDD(' + id + ')" value="Add Dropdown">' +
                        '</div>' +
                        '<div class="col-md-3">' +
                            '<input class="form-control brn btn-success" type="button" onclick="AddCB(' + id + ')" value="Add Checkbox">' +
                        '</div>' +
                        '<div class="col-md-3">' +
                            '<input class="form-control brn btn-success" type="button" onclick="AddTA(' + id + ')" value="Add Textarea">' +
                        '</div>' +
                    '</div>' +
                '</div>'
                );

            id++;

        }



            function AddTB(num){
                total_fields = $("#row-"+num+"-total_fields").val();
                $("#row-"+num+"-total_fields").attr('value',parseInt(total_fields)+1);
                // total_fields = $(".card-body").eq(RowNum).children().find('row['+RowNum+'][total_fields]');
                $("div#row-"+ num +"-field").append(
                            `<div class="row mt-5" id="field-${total_fields}">` +
                                '<div class="col-md-12 mb-2">' +
                                    '<div class="row">'+
                                        '<div class="col-md-10">' +
                                            '<h5>Field Type : Textbox</h5>' +
                                        '</div>' +
                                        '<div class="col-md-2">' +
                                            '<input type="button" class="form-control btn btn-danger" value="delete" onclick="DeleteDataType('+total_fields+')">' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +


                                '<input type="text" id="row-'+num+'-field-'+total_fields+'-field_type" name="row['+num+'][field]['+total_fields+'][field_type]" value="textbox" hidden>' +

                                '<div class="col-md-12">' +
                                    '<div class="row">'+
                                        '<div class="form-group col-md-3">' +
                                            '<label for="row-'+num+'-field-'+total_fields+'-child_title">Title</label>' +
                                            '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-child_title" name="row['+num+'][field]['+total_fields+'][child_title]">' +
                                        '</div>' +

                                        '<div class="form-group col-md-3">' +
                                            '<label for="row-'+num+'-field-'+total_fields+'-child_slug">Slug</label>' +
                                            '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-child_slug" name="row['+num+'][field]['+total_fields+'][child_slug]">' +
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
                        `<div class="row mt-5" id="field-${total_fields}">` +
                                '<div class="col-md-12 mb-2">' +
                                    '<div class="row">'+
                                        '<div class="col-md-10">' +
                                            '<h5>Field Type : Dropdown</h5>' +
                                        '</div>' +
                                        '<div class="col-md-2">' +
                                            '<input type="button" class="form-control btn btn-danger" value="delete" onclick="DeleteDataType('+total_fields+')">' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +

                                '<input type="text" id="row-'+num+'-field-'+total_fields+'-field_type" name="row['+num+'][field]['+total_fields+'][field_type]" value="dropdown" hidden>' +

                                '<div class="col-md-12">' +

                                    '<div class="row">' +
                                        '<div class="form-group col-md-4">' +
                                            '<label for="row-'+num+'-field-'+total_fields+'-child_title">Title</label>' +
                                            '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-child_title" name="row['+num+'][field]['+total_fields+'][child_title]">' +
                                        '</div>' +

                                        '<div class="form-group col-md-4">' +
                                            '<label for="row-'+num+'-field-'+total_fields+'-child_slug">Slug</label>' +
                                            '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-child_slug" name="row['+num+'][field]['+total_fields+'][child_slug]">' +
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
                                            '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-total_options" name="row['+num+'][field]['+total_fields+'][total_options]" hidden value="1">' +
                                            '<label for="row-'+num+'-field-'+total_fields+'-options-0-key">Dropdown Oprions</label>' +

                                            '<div class="row mt-1">' +
                                                '<div class="col-md-2" style="text-align:center">' +
                                                    '<label>Default</label>' +
                                                '</div>' +
                                                '<div class="col-md-4">' +
                                                    '<label>Key</label>' +
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
                            `<div class="row mt-5" id="field-${total_fields}">` +
                                '<div class="col-md-12 mb-2">' +
                                    '<div class="row">'+
                                        '<div class="col-md-10">' +
                                            '<h5>Field Type : Checkbox</h5>' +
                                        '</div>' +
                                        '<div class="col-md-2">' +
                                            '<input type="button" class="form-control btn btn-danger" value="delete" onclick="DeleteDataType('+total_fields+')">' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +

                                '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-field_type" name="row['+num+'][field]['+total_fields+'][field_type]" value="checkbox" hidden>' +

                                '<div class="col-md-12">'+

                                    '<div class="row">' +
                                        '<div class="form-group col-md-4">' +
                                            '<label for="row-'+num+'-field-'+total_fields+'-child_title">Title</label>' +
                                            '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-child_title" name="row['+num+'][field]['+total_fields+'][child_title]">' +
                                        '</div>' +

                                        '<div class="form-group col-md-4">' +
                                            '<label for="row-'+num+'-field-'+total_fields+'-child_slug">Slug</label>' +
                                            '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-child_slug" name="row['+num+'][field]['+total_fields+'][child_slug]">' +
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
                                            '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-total_options" name="row['+num+'][field]['+total_fields+'][total_options]" hidden value="1">' +
                                            '<label for="row-'+num+'-field-'+total_fields+'-options-0-key">Dropdown Oprions</label>' +

                                            '<div class="row mt-1">' +
                                                '<div class="col-md-2" style="text-align:center">' +
                                                    '<label>Default</label>' +
                                                '</div>' +
                                                '<div class="col-md-4">' +
                                                    '<label>Key</label>' +
                                                '</div>' +
                                                '<div class="col-md-4">' +
                                                    '<label>Value</label>' +
                                                '</div>' +
                                            '</div>' +

                                            '<div class="row mt-1" id="options-0">' +
                                                '<div class="col-md-2" style="text-align:center">' +
                                                    '<input class="" type="checkbox" id="row-'+num+'-field-'+total_fields+'-options-0-is_default" name="row['+num+'][field]['+total_fields+'][options][0][is_default]">' +
                                                '</div>' +
                                                '<div class="col-md-4">' +
                                                    '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-options-0-key" name="row['+num+'][field]['+total_fields+'][options][0][key]" placeholder="Option Key">' +
                                                '</div>' +
                                                '<div class="col-md-4">' +
                                                    '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-options-0-value" name="row['+num+'][field]['+total_fields+'][options][0][value]" placeholder="Option value">' +
                                                '</div>' +
                                                '<div class="col-md-2">' +
                                                    '<button type="button" class="form-control btn btn-danger" onclick="DeleteOption(0)" disabled>Delete</button>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +

                                    '</div>' +

                                        '<div class="form-group" id="">' +
                                            '<input class="btn btn-info" type="button" onclick="AddCBOption(' + num + ','+total_fields+')" value="Add Another Option">' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +

                            '</div>'

                );
            }

            function AddTA(num){
                total_fields = $("#row-"+num+"-total_fields").val();
                $("#row-"+num+"-total_fields").attr('value',parseInt(total_fields)+1);
                // total_fields = $(".card-body").eq(RowNum).children().find('row['+RowNum+'][total_fields]');
                $("div#row-"+ num +"-field").append(
                            `<div class="row mt-5" id="field-${total_fields}">` +
                                '<div class="col-md-12 mb-2">' +
                                    '<div class="row">'+
                                        '<div class="col-md-10">' +
                                            '<h5>Field Type : Textarea</h5>' +
                                        '</div>' +
                                        '<div class="col-md-2">' +
                                            '<input type="button" class="form-control btn btn-danger" value="delete" onclick="DeleteDataType('+total_fields+')">' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +

                                '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-field_type" name="row['+num+'][field]['+total_fields+'][field_type]" value="textarea" hidden>' +

                                '<div class="col-md-12">'+
                                    '<div class="row">' +
                                        '<div class="form-group col-md-3">' +
                                            '<label for="row-'+num+'-field-'+total_fields+'-child_title">Title</label>' +
                                            '<input class="form-control" type="text" id="row-'+num+'field-'+total_fields+'-child_title" name="row['+num+'][field]['+total_fields+'][child_title]">' +
                                        '</div>' +

                                        '<div class="form-group col-md-3">' +
                                            '<label for="row-'+num+'-field-'+total_fields+'-child_slug">Slug</label>' +
                                            '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-child_slug" name="row['+num+'][field]['+total_fields+'][child_slug]">' +
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
                    `<div class="row mt-1" id="options-${total_options}"">` +
                        '<div class="col-md-2" style="text-align:center">' +
                            '<input class="" type="radio" id="row-'+num+'-field-'+total_fields+'-options-'+total_options+'-is_default" name="row['+num+'][field]['+total_fields+'][options][is_default]" value="1">' +
                        '</div>' +
                        '<div class="col-md-4">' +
                            '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-options-'+total_options+'-key" name="row['+num+'][field]['+total_fields+'][options]['+total_options+'][key]" placeholder="Option Key">' +
                        '</div>' +
                        '<div class="col-md-4">' +
                            '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-options-'+total_options+'-value" name="row['+num+'][field]['+total_fields+'][options]['+total_options+'][value]" placeholder="Option value">' +
                        '</div>' +
                        '<div class="col-md-2">' +
                            `<button type="button" class="form-control btn btn-danger" onclick="DeleteOption(${total_options})">Delete</button>` +
                        '</div>' +
                    '</div>'
                );
            }

            function AddCBOption(num, total_fields){
                total_options = $('#row-'+num+'-field-'+total_fields+'-total_options').val();
                $('#row-'+num+'-field-'+total_fields+'-total_options').attr('value',parseInt(total_options)+1);
                $($("#row-" + num + "-field-" + total_fields + "-options")).append(
                    `<div class="row mt-1" id="options-${total_options}"">` +
                        '<div class="col-md-2" style="text-align:center">' +
                            '<input class="" type="checkbox" id="row-'+num+'-field-'+total_fields+'-options-'+total_options+'-is_default" name="row['+num+'][field]['+total_fields+'][options]['+total_options+'][is_default]">' +
                        '</div>' +
                        '<div class="col-md-4">' +
                            '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-options-'+total_options+'-key" name="row['+num+'][field]['+total_fields+'][options]['+total_options+'][key]" placeholder="Option Key">' +
                        '</div>' +
                        '<div class="col-md-4">' +
                            '<input class="form-control" type="text" id="row-'+num+'-field-'+total_fields+'-options-'+total_options+'-value" name="row['+num+'][field]['+total_fields+'][options]['+total_options+'][value]" placeholder="Option value">' +
                        '</div>' +
                        '<div class="col-md-2">' +
                            `<button type="button" class="form-control btn btn-danger" onclick="DeleteOption(${total_options})">Delete</button>` +
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


            function validateForm(){
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



    </script>
</body>
</html>

