@php
    /**
     * @var \App\Helper\MetaField $field
     */
if ($update)
   $value = $field->getValue();
@endphp

<div class="form-group {{$field->column}}">
    <label for="{{$field->key}}">
        {{$field->name}}
    </label>
    <select class="{{$field->getCssClasses()}}" name="{{$field->key}}" id="{{$field->key}}"
            title="{{$field->name}}">
        @foreach($field->options as $option)
            <option value="{{$option["key"]}}" @if(@$option["selected"] and !$update) selected @endif
            @if($update and $value == $option['key']) selected @endif>{{$option["value"]}}</option>
        @endforeach
    </select>
</div>