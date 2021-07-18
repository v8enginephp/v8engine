@php
    /**
     * @var \App\Helper\MetaField $field
     */
@endphp

<div class="form-group {{$field->column}}">
    <label for="{{$field->key}}">
        {{$field->name}}
        <small>{{@$field->note}}</small>
    </label>
    <input type="{{$field->type}}" @if(isset($update) and $update == true) value="{{$field->getValue()}}"
           @endif class="{{$field->getCssClasses()}}"  @if(in_array('required',$field->rules)) data-require="1" @endif id="{{$field->key}}"
           title="{{$field->name}}"
           name="{{$field->key}}" placeholder="{{$field->name}}">
</div>