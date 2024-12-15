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
            @isset($DataTypeJson)

            <form method="post" action="">
                @csrf
                <div class="formContainer">

                </div>
                <div class="form-group pt-3 col-md-3">
                    <button type="submit" class="btn btn-primary form-control">Save</button>
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
    var customDataList = (@json($DataTypeJson));
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
          rawData: Object.assign({}, customData),
        })
        .attr({
          "data-limit": customData.count,
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
        inp.find(":input").data("dataType", tyP);
      }
        var hidden_id = $(`<input type='text' class='hidden_id' value="${dataTypeID}" hidden />`);
        var hidden_type = $(`<input type='text' class='hidden_type' value="${dataType}" hidden />`);
        var is_secret = $(`
            <small class="small">
            Is Secret?
            <input type="checkbox" class="is_secret" value="true" />
            </small>
          `);

        inp.data("dataType", tyP);

        hidden_id.data("dataType", tyP);
        hidden_type.data("dataType", tyP);
        is_secret.find('input.is_secret').data("dataType", tyP);

        var c = hidden_id.data('dataType');
        var b = hidden_type.data('dataType');
        var a = is_secret.find('.is_secret').data('dataType');

        cg.append(inp);
        cg.append(is_secret);
        cg.append(hidden_type);
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
        console.log(tyP);
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

    function GenerateFieldNameFormIndex(element, CData, rowIndex) {
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

    function CDRefreshData() {
      var wrp = $(".formContainer");
      var Sections = wrp.find(".card").each(function (ind, sect) {
        var customData = $(sect).data("rawData");

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
            $(eachRow)
            .find(".cd-control-input, .is_secret, .hidden_id, .hidden_type")
            // .find(".cd-control-input")
            .each(function (xxi, elemnt) {
                GenerateFieldNameFormIndex(elemnt, customData, rowIndex);
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
</script>

<script>
    $(document).ready(function () {
      //eachRowDeleteBtn
      $(document).on("click", ".cd-btn-remove-row", function () {
        var thisRow = $(this).parents(".cd-each-data-row").first();
        var cardSd = $(this).parents(".card").first();
        var count = cardSd.find(".cd-each-data-row").length;
        if (count > 1) {
          $(this).parents(".cd-each-data-row").remove();
        }
        CDRefreshData();
      });
      //addRowBtn
      $(document).on("click", ".cd-btn-add-row", function () {
        var thisRow = $(this).parents(".cd-each-data-row").first();
        var cardSd = $(this).parents(".card").first();
        var customData = cardSd.data("rawData");
        var rows = cardSd.find(".cd-each-data-row").length;
        var reachedLimit = customData.count == rows;
        if (!reachedLimit) {
          var wrapper = CDCreateSectionRow(customData, rows);
          cardSd.find(".cd-fields-container").append(wrapper);
        }
        CDRefreshData();
      });
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
</style>
@endpush
