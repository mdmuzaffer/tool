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
        <span>Customer Data</span>
      </h1>
      {{-- <div class="page-header-subtitle">Customer Dashboard</div> --}}
    </div>
  </div>
</div>
<div class="container-fluid mt-n10">
  <div class="card mb-4">
    <div class="card-header">Customer Data</div>
    <div class="card-body row no-gutters">
      @isset($CustomData, $types)
      <div class="col-md-8">

        <form method="post" action="">
          @csrf
          <div class="formContainer-x">
            @foreach ($types as $sectIndex => $section)
            @php
                $sect_count = $types[$sectIndex]->count;
            @endphp
            @php
                $tx = $sect_count<1?1:$sect_count;
                if(array_key_exists($sectIndex, $CustomData)){
                    $rws = collect()->times(collect($CustomData[$sectIndex])->count());
                    $ThisSectionData = $CustomData[$sectIndex];
                } else {
                    $rws = collect()->times($tx);
                    $ThisSectionData = null;
                }
            @endphp
            <div class="card" data-limit="{{$sect_count}}" data-data-count="{{$tx}}" data-data-index="{{$sectIndex}}" data-data-next-sl="{{$tx+1}}" data-data-reached-limit="{{$tx == $sect_count? 'true':'false'}}" data-raw-data="@json_e($section)" >
              <div class="card-body">
                 <div class="card-title">{{$section['title']}}</div>
                 <div class="col-12 cd-fields-container">
                   @foreach ($rws as $rwIndex => $rwVal)
                       <div class="row cd-each-data-row border mt-2" data-row-total="{{$tx}}" data-row-index="{{$rwIndex}}">
                       <div class="col-md-1 text-center mt-2">
                          <code class="cd-slno-text h3 ">{{$rwIndex + 1}}</code>
                          <div class="p-2 m-1 text-center">
                             <button type="button" class="btn btn-icon btn-outline-dark-xx  text-danger cd-btn-remove-row" title="Remove" data-count-non-zero="{{$sect_count !=0 ? 'true' : 'false'}}">
                                <i class="fa fa-times fa-2x"></i>
                             </button>
                          </div>
                       </div>
                       <div class="col-md-11 border mt-2 p-2">
                          <div class="row cd-fields p-2">
                            @foreach ($section['fields'] as $fldSchema)
                            @php
                                $fldType = $fldSchema['field_type'];
                                $fld_slug = $fldSchema['child_slug'];
                                $input_id_prefix = "".$section['slug']."-".$rwIndex."-".$fld_slug ."";
                                $main_input_id = $input_id_prefix."-main-input";
                                $input_slug_prefix = "CustomData[".$section['slug']."][".$rwIndex."][".$fld_slug ."]";
                                $main_input_slug = $input_slug_prefix."[value]";
                                $is_secret_input_slug = $input_slug_prefix."[is_secret]";
                                $type_input_slug = $input_slug_prefix."[type]";
                                $type_id_input_slug = $input_slug_prefix."[custom_data_type_id]";
                                $action_input_slug = $input_slug_prefix."[action]";
                                $id_input_slug = $input_slug_prefix."[row_id]";
                                $row = null;
                            @endphp
                            @if($ThisSectionData != null)
                                @foreach($ThisSectionData[$rwIndex] as $dataKey => $data)
                                    @if($data['key'] == $fldSchema['child_slug'])
                                        @php
                                            $row = $data;
                                        @endphp
                                    @endif
                                @endforeach
                            @endif
                            @php

                                $actualValue = array_key_exists('default',$fldSchema) ? $fldSchema['default'] : null;
                                $action = 'new';
                                $is_secret = $row_id = null;
                                if($row != null){
                                    $actualValue = $row['value'];
                                    $row_id = $row['id'];
                                    $action = 'update';
                                    $is_secret = $row['is_secret'];
                                }
                            @endphp
                             <div class="from-group cd-from-group col-md-6 p-3"  data-data-type="@json_e($fldSchema)" >
                                <label for="{{$main_input_id}}" class="cd-control-label">{{$fldSchema['child_title']}}</label>
                                @if ($fldType == "textbox")
                                    <input type="text" class="form-control cd-control-input" placeholder="{{$fldSchema['child_title']}}" title="{{$fldSchema['child_title']}}" value="{{$actualValue}}" id="{{$main_input_id}}" name="{{$main_input_slug}}" >
                                @elseif($fldType == "textarea")
                                    <textarea class="form-control cd-control-input" placeholder="{{$fldSchema['child_title']}}" title="{{$fldSchema['child_title']}}" id="{{$main_input_id}}" name="{{$main_input_slug}}">{{$actualValue}}</textarea>
                                @elseif($fldType == "dropdown")
                                    @php
                                    $options = $fldSchema['options'];
                                    @endphp
                                    <select class="form-control cd-control-input" placeholder="{{$fldSchema['child_title']}}" title="{{$fldSchema['child_title']}}" id="{{$main_input_id}}" name="{{$main_input_slug}}"  >
                                    @foreach ($options as $inpOptIndex => $inpOpt)
                                        @php
                                            $inpOptLbl = $inpOpt['value'];
                                            $isSelectedText = "";
                                            if(!is_null($actualValue) && $actualValue == $inpOptLbl){
                                            $isSelectedText = ' selected="selected" ';
                                            }
                                            elseif( $inpOpt['is_default']) {
                                            $isSelectedText = ' selected="selected" ';
                                            }
                                        @endphp
                                    <option data-index="{{$inpOptIndex}}" value="{{$inpOptLbl}}"   {!! $isSelectedText !!}>{{$inpOptLbl}}</option>

                                    @endforeach
                                    </select>
                                @elseif($fldType == "checkbox")
                                    @php
                                    $options = $fldSchema['options'];
                                    @endphp
                                    <div class="border p-2 cd-control" title="{{$fldSchema['child_title']}}">
                                    @foreach ($options as $inpOptIndex => $inpOpt)
                                        @php
                                        $eachOptionId = $main_input_id . "-" . $inpOptIndex;
                                            $inpOptLbl = $inpOpt['value'];
                                            $isSelectedText = "";
                                            if(!is_null($actualValue) && in_array($inpOptLbl, $actualValue)){
                                            $isSelectedText = ' checked="checked" ';
                                            }
                                            elseif( $inpOpt['is_default']) {
                                            $isSelectedText = ' checked="checked" ';
                                            }
                                        @endphp
                                        <span class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input cd-control-input" name="{{$main_input_slug}}[]" id="{{$eachOptionId}}" value="{{$inpOptLbl}}" data-data-value="{{$inpOptLbl}}" {!! $isSelectedText !!}   />
                                        <label class="custom-control-label" for="{{$eachOptionId}}" >{{$inpOptLbl}}</label>
                                        </span>
                                    @endforeach
                                    </div>
                                @endif

                                <small class="small">
                                    Is Secret?
                                    @if(isset($is_secret) && $is_secret == true)
                                        <input type="checkbox" class="is_secret" value="true" name="{{$is_secret_input_slug}}" checked>
                                    @else
                                        <input type="checkbox" class="is_secret" value="true" name="{{$is_secret_input_slug}}">
                                    @endif
                                </small>
                                <input type="hidden" class="hidden_type" value="{{$fldType}}" hidden="" name="{{$type_input_slug}}">
                                <input type="hidden" class="hidden_type_id" value="{{$section['id']}}" hidden="" name="{{$type_id_input_slug}}">
                                <input type="hidden" class="hidden_action" value="{{$action}}" hidden="" name="{{$action_input_slug}}">
                                <input type="hidden" class="hidden_id" value="{{$row_id}}" hidden="" name="{{$id_input_slug}}">
                              </div>
                            @endforeach
                            <!--
                             <div class="from-group cd-from-group col-md-6 p-3">
                                <label for="single-value-option-field-001-0" class="cd-control-label">Single Value Option Field 001</label>
                                <select type="text" class="form-control cd-control-input" placeholder="Single Value Option Field 001" title="Single Value Option Field 001" id="single-value-option-field-001-0" name="CustomData[title-ol-p01][0][single-value-option-field-001][value]">
                                   <option data-index="0" value="Text 01-1" id="cb-single-value-option-field-001-fa19e567-5171-d3cb-14ad-9c6b37af40f9">Text 01-1</option>
                                   <option data-index="1" value="Text 02" id="cb-single-value-option-field-001-3b7db178-8215-dba6-f264-98b04fec7070" selected="selected">Text 02</option>
                                   <option data-index="2" value="Text 03" id="cb-single-value-option-field-001-b41cd7ca-1c5e-3141-2406-0291f0dc67dc">Text 03</option>
                                </select>
                                <small class="small">
                                Is Secret?
                                <input type="checkbox" class="is_secret" value="true" name="CustomData[title-ol-p01][0][single-value-option-field-001][is_secret]">
                                </small><input type="text" class="hidden_type" value="dropdown" hidden="" name="CustomData[title-ol-p01][0][single-value-option-field-001][type]"><input type="text" class="hidden_id" value="1" hidden="" name="CustomData[title-ol-p01][0][single-value-option-field-001][custom_data_type_id]">
                             </div>
                             <div class="from-group cd-from-group col-md-6 p-3">
                                <label for="multi-value-option-field-01-0" class="cd-control-label">Multi Value Option Field 01</label>
                                <div class="border p-2 cd-control" title="Multi Value Option Field 01">
                                  <span class="custom-control custom-checkbox">
                                   <input type="checkbox" class="custom-control-input cd-control-input" name="CustomData[title-ol-p01][0][multi-value-option-field-01][value][]" id="cb-multi-value-option-field-01-3b706763-88ca-fa1f-4fa3-8505ca6ac9e2" value="Option 001" data-data-key="option-001" data-data-value="Option 001">
                                   <label class="custom-control-label" for="cb-multi-value-option-field-01-3b706763-88ca-fa1f-4fa3-8505ca6ac9e2">Option 001</label>
                                   </span><span class="custom-control custom-checkbox">
                                   <input type="checkbox" class="custom-control-input cd-control-input" name="CustomData[title-ol-p01][0][multi-value-option-field-01][value][]" id="cb-multi-value-option-field-01-dd0e2e84-3b1d-8d81-8fc9-983185fd116f" value="Option 002" data-data-key="option-002" data-data-value="Option 002">
                                   <label class="custom-control-label" for="cb-multi-value-option-field-01-dd0e2e84-3b1d-8d81-8fc9-983185fd116f">Option 002</label>
                                   </span><span class="custom-control custom-checkbox">
                                   <input type="checkbox" class="custom-control-input cd-control-input" name="CustomData[title-ol-p01][0][multi-value-option-field-01][value][]" id="cb-multi-value-option-field-01-3c5df85a-07ed-ce10-a015-7f13cff636d7" value="Option 003" data-data-key="option-003" data-data-value="Option 003">
                                   <label class="custom-control-label" for="cb-multi-value-option-field-01-3c5df85a-07ed-ce10-a015-7f13cff636d7">Option 003</label>
                                   </span>
                                </div>
                                <small class="small">
                                Is Secret?
                                <input type="checkbox" class="is_secret" value="true" name="CustomData[title-ol-p01][0][multi-value-option-field-01][is_secret]">
                                </small><input type="text" class="hidden_type" value="checkbox" hidden="" name="CustomData[title-ol-p01][0][multi-value-option-field-01][type]"><input type="text" class="hidden_id" value="1" hidden="" name="CustomData[title-ol-p01][0][multi-value-option-field-01][custom_data_type_id]">
                             </div>
                             <div class="from-group cd-from-group col-md-6 p-3">
                                <label for="long-text-field-001-0" class="cd-control-label">Long Text Field 001</label>
                                <textarea class="form-control cd-control-input" placeholder="Long Text Field 001" title="Long Text Field 001" value="No Value" id="long-text-field-001-0" name="CustomData[title-ol-p01][0][long-text-field-001][value]">No Value</textarea><small class="small">
                                Is Secret?
                                <input type="checkbox" class="is_secret" value="true" name="CustomData[title-ol-p01][0][long-text-field-001][is_secret]">
                                </small><input type="text" class="hidden_type" value="textarea" hidden="" name="CustomData[title-ol-p01][0][long-text-field-001][type]"><input type="text" class="hidden_id" value="1" hidden="" name="CustomData[title-ol-p01][0][long-text-field-001][custom_data_type_id]">
                             </div>
                            -->
                          </div>
                       </div>
                    </div>
                   @endforeach

                 </div>
                 <div class="col-12 cd-fields-control-container">
                    <button type="button" class="btn btn-link text-dark cd-btn-add-row">+ Add Another</button>
                 </div>
              </div>
              <input type="hidden" name="{{"CustomDataValidators[".$section['slug']."]"}}" class="cd-validator-input" value="@json_e($section)">
           </div>
            @endforeach
          </div>
          <div class="formContainer">

          </div>
          <div class="form-group pt-3 col-md-3">
            <button type="submit" class="btn btn-primary form-control">Save</button>
          </div>
        </form>
      </div>
      <div class="col-md-4">
        <pre>@json_e($types, JSON_PRETTY_PRINT)</pre>
      </div>

      @endisset
    </div>
  </div>
</div>
@endsection


@push('scripts')

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<script>
    var customDataList = ([]);
    // console.log(customDataList);
</script>

<script>
  window.cfg = {};
    var DataType = {
      textbox: "textbox",
      checkbox: "checkbox",
      dropdown: "dropdown",
      textarea: "textarea",
    };

    var config = {
      controlGroupClass: "from-group cd-from-group col-md-6 p-3",
      controlClass: "form-control cd-control-input",
      controlLabelClass: "cd-control-label",
      controlSpecialWrapperClass: "border p-2 cd-control",
    };

    $(document).ready(function () {
      var wrp = $(".formContainer");
      wrp.empty();
      customDataList.forEach(function(customData) {
        CDCreateSection(customData,wrp);
      });
    });

    function CDCreateSection(customData, fromContainer) {
        var wrp = $(fromContainer);
        var wFrmD = $(`
                  <div class="card">
                      <div class="card-body">
                          <div class="card-title">[Data Title]</div>
                          <div class="col-12 cd-fields-container"></div>
                          <div class="col-12 cd-fields-control-container">
                              <button type="button" class="btn btn-link text-dark cd-btn-add-row">+ Add Another</button>
                          </div>
                      </div>
                      <input type="hidden" name="CustomDataValidators[${customData.slug}]" class="cd-validator-input" />
                  </div>
        `);
        var sectionWrapper = wFrmD.find(".cd-fields-container");
        var validatorInp = wFrmD.find(".cd-validator-input").attr("value",JSON.stringify(customData));
        wFrmD.find(".card-title").text(customData.title);
        wFrmD.find(".card").attr("data-dlr", "false");
        window.custom_dynamic_data_type_id = customData.id;
        var dataCount = customData.count > 0 ? customData.count : 1;
        for (let index = 0; index < dataCount; index++) {
            var rowWrapper = CDCreateSectionRow(customData, index);
            sectionWrapper.append(rowWrapper);
        }
        wFrmD
        .data({
          limit: customData.count,
          // rawData: Object.assign({}, customData),
        })
        .attr({
          "data-limit": customData.count,
          "data-raw-data": (JSON.stringify(customData)),
        });
        wrp.append(wFrmD);
        CDRefreshData();
        // debugger
    }

    function CDCreateSectionRow(customData, index) {
      var rowWrapper = $(`
        <div class="row cd-each-data-row border mt-2">
          <div class="col-md-1 text-center mt-2">
              <code class="cd-slno-text h3 ">${index + 1}</code>
              <div class="p-2 m-1 text-center">
                <button type="button" class="btn btn-icon btn-outline-dark-xx  text-danger cd-btn-remove-row" title="Remove"> <i class="fa fa-times fa-2x"></i> </button>
              </div>
          </div>
          <div class="col-md-11 border mt-2 p-2">
              <div class="row cd-fields p-2"></div>
          </div>
        </div>
      `);
      //new
      window.dataTypeID = customData.id;
      customData.fields.forEach(function (dType) {
          //new
          window.dataType = dType.field_type;
        var arg = Array.from(arguments);
        CDProcessControls.apply(rowWrapper.find(".cd-fields"), arg);
      });
      return rowWrapper;
    }

    function CDProcessControls(tyP, indX) {
      var secWrap = $(this);
      // console.log([secWrap, tyP, indX]);

      var cg = CDControlGroupWrapper(tyP, indX);
      var lbl = cg.find("." + config.controlLabelClass);
      var inpId = tyP.child_slug + "-0";
      lbl.attr("for", inpId);
      var inp = $("<input />", {
        class: config.controlClass,
        placeholder: tyP.child_title,
        title: tyP.child_title,
      });
      // console.log(inp, cg, lbl, inpId);

      //textbox
      if (tyP.field_type == DataType.textbox) {
        inp = $("<input />", {
          type: "text",
          class: config.controlClass,
          placeholder: tyP.child_title,
          title: tyP.child_title,
          value: tyP.default,
          id: inpId,
        });
      }
      //textarea
      else if (tyP.field_type == DataType.textarea) {
        inp = $("<textarea />", {
          class: config.controlClass,
          placeholder: tyP.child_title,
          title: tyP.child_title,
          value: tyP.default,
          id: inpId,
        }).text(tyP.default);
      }
      //textarea
      else if (tyP.field_type == DataType.dropdown) {
        inp = $("<select />", {
          type: "text",
          class: config.controlClass,
          placeholder: tyP.child_title,
          title: tyP.child_title,
          value: tyP.default,
          id: inpId,
        });
        GetDropDownOptions(tyP, inp);
      }
      //checkbox
      else if (tyP.field_type == DataType.checkbox) {
        inp = $("<div />", {
          class: config.controlSpecialWrapperClass,
          title: tyP.child_title,
        });
        GetCheckboxOptions(tyP, inp);
        inp.find(":input");//.data("dataType", tyP);
      }
        var hidden_type_id = $(`<input type='text' class='hidden_type_id' value="${dataTypeID}" hidden />`);
        var hidden_type = $(`<input type='text' class='hidden_type' value="${dataType}" hidden />`);
        var hidden_action = $(`<input type='text' class='hidden_action' value="new" hidden />`);
        var hidden_id = $(`<input type='text' class='hidden_id' value="" hidden />`);
        var is_secret = $(`
            <small class="small">
            Is Secret?
            <input type="checkbox" class="is_secret" value="true" />
            </small>
          `);

        // inp.data("dataType", tyP);

        // hidden_id.data("dataType", tyP);
        // hidden_type.data("dataType", tyP);
        // is_secret.find('input.is_secret').data("dataType", tyP);

        // var c = hidden_id.data('dataType');
        // var b = hidden_type.data('dataType');
        // var a = is_secret.find('.is_secret').data('dataType');
        cg.attr("data-data-type",JSON.stringify(tyP))
        cg.append(inp);
        cg.append(is_secret);
        cg.append(hidden_type);
        cg.append(hidden_type_id);
        cg.append(hidden_action);
        cg.append(hidden_id);
        secWrap.append(cg);
    }

    function CDControlGroupWrapper(tyP, indX) {
      var jx = `
          <div class="${config.controlGroupClass}">
              <label for="" class="${config.controlLabelClass}">${tyP.child_title}</label>
          </div>
          `;
      return $(jx);
    }

    function GetDropDownOptions(tyP, selectElem) {
        // console.log(tyP);
      tyP.options.forEach(function (op, indx) {
        var optId = ["cb", tyP.child_slug, GetNewGUID()].join("-");
        var opt = $("<option />", {
          "data-index": indx,
          value: op.value,
          text: op.value,
          id: optId,
        }).text(op.value);
        if (op.is_default) {
          opt.attr("selected", "selected");
        }
        selectElem.append(opt);
      });
    }

    //Checkbox options
    function GetCheckboxOptions(tyP, selectElem) {
      tyP.options.forEach(function (op, indx) {
        var strOpt = `
          <span class="custom-control custom-checkbox" >
              <input type="checkbox" class="custom-control-input cd-control-input" name="" id=""/>
              <label class="custom-control-label" for="" >Opt 4</label>
          </span>
          `;
        var optId = ["cb", tyP.child_slug, GetNewGUID()].join("-");
        var OptSpan = $(strOpt);
        var opt = OptSpan.find(":checkbox").attr("id", optId);
        var label = OptSpan.find("label").attr("for", optId);
        opt.val(op.value)
        .attr("data-data-key", op.key)
        .attr("data-data-value", op.value);
        label.text(op.value);
        if (op.is_default) {
          opt.prop("checked", true);
        }
        selectElem.append(OptSpan);
      });
    }
    //abcd
    function CDCfg(key, value) {
      var cfg = window.cfg;
      if (key) {
        if (arguments.length > 1) {
          window.cfg[key] = value;
        } else return cfg[key];
      } else return window.cfg;
    }

    function GenerateFieldNameFormIndex_OLDV1(element, CData, rowIndex) {
        element = $(element);
        var dType = $(element).data("dataType");
        var namePrefix = `CustomData[${CData.slug}][${rowIndex}][${dType.child_slug}][value]`;
        if(element.attr('class') == 'form-control cd-control-input'){
             namePrefix = `CustomData[${CData.slug}][${rowIndex}][${dType.child_slug}][value]`;
        } else if(element.attr('class') == 'is_secret'){
             namePrefix = `CustomData[${CData.slug}][${rowIndex}][${dType.child_slug}][is_secret]`;
        } else if(element.attr('class') == 'hidden_id'){
             namePrefix = `CustomData[${CData.slug}][${rowIndex}][${dType.child_slug}][custom_data_type_id]`;
        } else if(element.attr('class') == 'hidden_type'){
             namePrefix = `CustomData[${CData.slug}][${rowIndex}][${dType.child_slug}][type]`;
        }

        if (dType.field_type == DataType.checkbox && element.attr('class') == 'custom-control-input cd-control-input') {
          element.attr("name", namePrefix + "[]");
        } else {
          element.attr("name", namePrefix);
        }
    }


    function GenerateFieldNameFormIndex(element, CData, dType, rowIndex) {
        element = $(element);
        var namePrefix = `CustomData[${CData.slug}][${rowIndex}][${dType.child_slug}][value]`;
        if(element.attr('class') == 'form-control cd-control-input'){
             namePrefix = `CustomData[${CData.slug}][${rowIndex}][${dType.child_slug}][value]`;
        } else if(element.attr('class') == 'is_secret'){
             namePrefix = `CustomData[${CData.slug}][${rowIndex}][${dType.child_slug}][is_secret]`;
        } else if(element.attr('class') == 'hidden_type_id'){
             namePrefix = `CustomData[${CData.slug}][${rowIndex}][${dType.child_slug}][custom_data_type_id]`;
        } else if(element.attr('class') == 'hidden_type'){
             namePrefix = `CustomData[${CData.slug}][${rowIndex}][${dType.child_slug}][type]`;
        } else if(element.attr('class') == 'hidden_action'){
             namePrefix = `CustomData[${CData.slug}][${rowIndex}][${dType.child_slug}][action]`;
        } else if(element.attr('class') == 'hidden_id'){
             namePrefix = `CustomData[${CData.slug}][${rowIndex}][${dType.child_slug}][row_id]`;
        }

        if (dType.field_type == DataType.checkbox && element.attr('class') == 'custom-control-input cd-control-input') {
          element.attr("name", namePrefix + "[]");
        } else {
          element.attr("name", namePrefix);
        }
    }


    function CDRefreshData_OLDV1() {
      var wrp = $(".formContainer-x");
      var Sections = wrp.find(".card").each(function (ind, sect) {
        // var customData = $(sect).data("rawData");
        var customData = JSON.parse(sect.dataset.rawData);

        var rows = $(sect).find(".cd-fields-container .cd-each-data-row")
          .length;
        var nextSl = rows + 1;
        $(sect).data("dataCount", rows);
        $(sect).data("dataNextSl", nextSl);
        $(sect).attr("data-data-count", rows);
        $(sect).attr("data-data-index", ind);
        $(sect).attr("data-data-Next-Sl", nextSl);
        var reachedLimit = customData.count == rows;
        $(sect).data("dataReachedLimit", reachedLimit);
        $(sect).attr("data-data-reached-limit", reachedLimit);

        $(sect)
          .find(".cd-fields-container .cd-each-data-row")
          .each(function (rowIn, echRow) {
            $(echRow)
              .attr({
                "data-row-total": rows,
                "data-row-index": rowIn,
              })
              .data({
                rowCount: rows,
                rowIndex: rowIn,
              });
            $(echRow)
              .find(".cd-slno-text")
              .text(rowIn + 1);
          });

          //
        //   pd= $(sect).find('.cd-each-data-row').parent('div');
          //
        $(sect).find('.cd-each-data-row').each(function (rowIndex,eachRow) {
            $(eachRow).find('.cd-from-group').each(function (eachFieldIndex, eachField) {
              // console.log(eachField.dataset.dataType);

              var fieldDataType = JSON.parse(eachField.dataset.dataType);
              // var fieldDataType = {};

              $(eachField)
              .find(".cd-control-input, .is_secret, .hidden_id, .hidden_type")
              // .find(".cd-control-input")
              .each(function (xxi, elemnt) {

                // console.log({elemnt, customData, rowIndex});

                  GenerateFieldNameFormIndex(elemnt, customData, fieldDataType, rowIndex);
              });
            });
            // $(eachRow)
            // .find(".is_secret")
            // .each(function (xxi, elemnt) {
            //     GenerateFieldNameFormIndex(elemnt, customData, rowIndex);
            // });
            // $(eachRow)
            // .find(".hidden_id")
            // .each(function (xxi, elemnt) {
            //     GenerateFieldNameFormIndex(elemnt, customData, rowIndex);
            // });
            // $(eachRow)
            // .find(".hidden_type")
            // .each(function (xxi, elemnt) {
            //     GenerateFieldNameFormIndex(elemnt, customData, rowIndex);
            // });
        });
      });
    }


    function CDRefreshData() {
      var wrp = $(".formContainer-x");
      var Sections = wrp.find(".card").each(function (ind, sect) {
        CDRefreshDataSectionWise(sect, ind);
      });
    }


    function CDRefreshDataSectionWise(sectZ, indZ) {
      var ind = indZ,  sect = sectZ;
      {
        var customData = JSON.parse(sect.dataset.rawData);

        var rows = $(sect).find(".cd-fields-container .cd-each-data-row")
          .length;
        var nextSl = rows + 1;
        $(sect).data("dataCount", rows);
        $(sect).data("dataNextSl", nextSl);
        $(sect).attr("data-data-count", rows);
        $(sect).attr("data-data-index", ind);
        $(sect).attr("data-data-Next-Sl", nextSl);
        var reachedLimit = customData.count == rows;
        $(sect).data("dataReachedLimit", reachedLimit);
        $(sect).attr("data-data-reached-limit", reachedLimit);

        $(sect)
          .find(".cd-fields-container .cd-each-data-row")
          .each(function (rowIn, echRow) {
            $(echRow)
              .attr({
                "data-row-total": rows,
                "data-row-index": rowIn,
              })
              .data({
                rowCount: rows,
                rowIndex: rowIn,
              });
            $(echRow)
              .find(".cd-slno-text")
              .text(rowIn + 1);
          });

        $(sect).find('.cd-each-data-row').each(function (rowIndex,eachRow) {
            $(eachRow).find('.cd-from-group').each(function (eachFieldIndex, eachField) {
              var fieldDataType = JSON.parse(eachField.dataset.dataType);
              $(eachField)
              .find(".cd-control-input, .is_secret, .hidden_id, .hidden_type, .hidden_type_id, .hidden_action")
              .each(function (xxi, elemnt) {
                  GenerateFieldNameFormIndex(elemnt, customData, fieldDataType, rowIndex);
              });
            });
        });

      }
    }

</script>

<script>
  $(document).ready(function () {
      //eachRowDeleteBtn
      $(document).on("click", ".cd-btn-remove-row", function () {
        var thisRow = $(this).parents(".cd-each-data-row").first();
        var cardSd = $(this).parents(".card").first();
        var count = cardSd.find(".cd-each-data-row").length;
        var customData = JSON.parse(cardSd[0].dataset.rawData);
        thisRow.find('.hidden_id').each(function(){
          inp  = $(`<input type="textbox" value="${$(this).val()}" name="delete[]" hidden>`);
          $('.formContainer-x').append(inp);
        });
        if (count > 1 && customData.count == 0 ) {
          $(this).parents(".cd-each-data-row").remove();
          CDRefreshDataSectionWise(cardSd[0]);

        }
        // CDRefreshData();
      });
      //addRowBtn
      $(document).on("click", ".cd-btn-add-row", function () {
        var thisRow = $(this).parents(".cd-each-data-row").first();
        var cardSd = $(this).parents(".card").first();
        var customData = JSON.parse(cardSd[0].dataset.rawData);
        // console.log(cardSd);

        // var customData = cardSd.data("rawData");
        var rows = cardSd.find(".cd-each-data-row").length;
        var reachedLimit = customData.count == rows;
        if (!reachedLimit) {
          var wrapper = CDCreateSectionRow(customData, rows);
          cardSd.find(".cd-fields-container").append(wrapper);
          CDRefreshDataSectionWise(cardSd[0]);
        }
        // CDRefreshData();

      });

      CDRefreshData();
    });
</script>
<style>
  [data-row-total="1"][data-row-index="0"] .cd-slno-text,
  [data-row-total="1"][data-row-index="0"] .cd-btn-remove-row {
    display: none;
  }

  [data-data-reached-limit="true"] .cd-btn-add-row {
    display: none;
  }

  [data-count-non-zero="true"] {
      display : none;
  }
</style>
@endpush
