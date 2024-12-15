@extends('admin.layouts.blank')

@section('content')
<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
    <div class="container-fluid">
        <div class="page-header-content">
            <h1 class="page-header-title">
                <span>Website Settings</span>
            </h1>
            <div class="page-header-subtitle"></div>
        </div>
    </div>
</div>
<div class="container-fluid mt-n10">

    <div class="card mb-4">
        <div class="card-header">Some Heading</div>
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

                <form action="{{route('admin.settings.website.basic.post')}}" method="POST">
                    @csrf
                    @foreach ($website as $section)
                    @php
                    extract($section);
                    @endphp
                    <div class="form-group row ">
                        <label for="{{$key}}" class="col-sm-4 col-form-label text-right">{{$title}}</label>
                        <div class="col-sm-6">
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
                                                    @text($key.'['.$count_key.']['.$slug.']', $title, $value[$count_key][$slug])
                                                </div>
                                                @elseif($type == 'dropdown')
                                                @php
                                                    $options = collect($options);
                                                    $op = $options->mapWithKeys(function ($f){
                                                        return [$f['value'] => $f['value']] ;
                                                    });
                                                @endphp
                                                <div class="col-md-12">
                                                    @select($key.'['.$count_key.']['.$slug.']', $title, $op, $value[$count_key][$slug])
                                                </div>
                                            @elseif($type == 'radio')
                                                @php
                                                    $options = collect($options);
                                                    $op = $options->mapWithKeys(function ($f){
                                                        return [$f['value'] => $f['value']] ;
                                                    })->toArray();
                                                @endphp
                                                <div class="col-md-12">
                                                    @radios($key.'['.$count_key.']['.$slug.']', $title, $op, $value[$count_key][$slug], ['inline' => true])
                                                </div>
                                            @elseif($type == 'checkbox')
                                                @php
                                                    $options = collect($options);
                                                    $op = $options->mapWithKeys(function ($f){
                                                        return [$f['value'] => $f['value']] ;
                                                    })->toArray();
                                                @endphp
                                                <div class="col-md-12">
                                                    @checkboxes($key.'['.$count_key.']['.$slug.'][]', $title, $op, $value[$count_key][$slug], ['inline' => true])
                                                </div>
                                            @elseif($type == 'textarea')
                                                <div class="col-md-12">
                                                    @if($html_support == 'true')
                                                        @textarea($key.'['.$count_key.']['.$slug.']', $title, $value[$count_key][$slug], ['rows'=> 2])
                                                    @else
                                                        @textarea($key.'['.$count_key.']['.$slug.']', $title, $value[$count_key][$slug], ['rows'=> 2, 'class'=>'*AddSomething*'])
                                                    @endif
                                                </div>
                                            @endif
                                        @endforeach
                                        </div>
                                    @endforeach
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
                                            @text($key.'['.$slug.']', $title, $value[$slug])
                                        @elseif($type == 'dropdown')
                                            @php
                                                $options = collect($options);
                                                $op = $options->mapWithKeys(function ($f){
                                                    return [$f['value'] => $f['value']] ;
                                                });
                                            @endphp
                                            @select($key.'['.$slug.']', $title, $op, $value[$slug])
                                        @elseif($type == 'radio')
                                            @php
                                                $options = collect($options);
                                                $op = $options->mapWithKeys(function ($f){
                                                    return [$f['value'] => $f['value']] ;
                                                })->toArray();
                                            @endphp
                                                @radios($key.'['.$slug.']', $title, $op, $value[$slug], ['inline' => true])
                                        @elseif($type == 'checkbox')
                                            @php
                                                $options = collect($options);
                                                $op = $options->mapWithKeys(function ($f){
                                                    return [$f['value'] => $f['value']] ;
                                                })->toArray();
                                            @endphp
                                                @checkboxes($key.'['.$slug.'][]', $title, $op, $value[$slug], ['inline' => true])
                                        @elseif($type == 'textarea')
                                            @if($html_support == 'true')
                                                @textarea($key.'['.$slug.']', $title, $value[$slug], ['rows'=> 2])
                                            @else
                                                @textarea($key.'['.$slug.']', $title, $value[$slug], ['rows'=> 2, 'class'=>'*AddSomething*'])
                                            @endif
                                        @endif
                                    @endforeach
                                @endif


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
                                    @textarea($key, false, $value, ['rows'=> 2])
                                @else
                                    @textarea($key, false, $value, ['rows'=> 2, 'class'=>'*AddSomething*'])
                                @endif

                            @endif

                            {{-- @endif --}}
                        </div>
                    </div>
                    @endforeach
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-primary ">Save</button>
                    </div>
                </form>

                @endif
            </div>
        </div>'
    </div>
</div>


@endsection

@push('styles')
<style>
    .array_fields_container .form-group.row:only-child .delete-container {
        display: none;
    }
</style>
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
                main_body = $(`
                    <div class="row border p-3 m-2 each-row">
                        <div class="col-md-12 text-right">
                            <button type="button" data-dd-action="obj.row.delete" class="btn btn-sm btn-danger m-2 delete-btn">DELETE</button>
                        </div>
                    </div>
                `);
                console.log(schema);
                for(i = 0; i<schema['fields'].length; i++){
                    if(schema['fields'][i]['type'] == 'textbox'){
                        var slug = schema['fields'][i]['slug'];
                        var title = schema['fields'][i]['title'];
                        var body = $($('#simple-tb').text());
                        body.find('label').first().text(schema['fields'][i]['title']);
                        var nextIndex = $(this).attr('data-next-index');
                        // console.log($($(body).find('label').first()).text());
                        body.find('label').first().attr('for',`${key}_${nextIndex}_${slug}_group`);
                        body.find('input').first().attr('id',`${key}_${nextIndex}_${slug}_group`);
                        body.find('input').first().attr('name',`${key}[${nextIndex}][${slug}]`);
                        // $(this).parent('.add-btn').siblings('.each-row')[0].append(body);
                        main_body.append(body);
                    } else if (schema['fields'][i]['type'] == 'textarea'){
                        var slug = schema['fields'][i]['slug'];
                        var title = schema['fields'][i]['title'];
                        body = $($('#simple-ta').text());
                        body.find('label').first().text(title);
                        nextIndex = $(this).attr('data-next-index');
                        body.find('label').first().attr('for',`${key}_${nextIndex}_${slug}_group`);
                        body.find('textarea').first().attr('id',`${key}_${nextIndex}_${slug}_group`);
                        body.find('textarea').first().attr('name',`${key}[${nextIndex}][${slug}]`);
                        main_body.append(body);
                    }
                    else if (schema['fields'][i]['type'] == 'checkbox'){
                        var slug = schema['fields'][i]['slug'];
                        var title = schema['fields'][i]['title'];
                        body = $($('#simple-cb-body').text());
                        body.find('label').first().text(title);
                        nextIndex = $(this).attr('data-next-index');
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
                        nextIndex = $(this).attr('data-next-index');
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
                }
                $(this).parents('.section').children('#All-Row').first().append(main_body);

            });
            $(document).on('click',`[data-dd-action="obj.row.delete"]`,function () {
                $(this).parents('.each-row').remove();

            });
        });
</script>
@endpush
