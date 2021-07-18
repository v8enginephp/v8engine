@php
    /**
     * @var \App\Helper\MetaField $field
     */
@endphp

<div class="form-group relative {{$field->column}}">
    <input type="file" class="form-control" id="{{$field->key}}">
    <label for="{{$field->key}}">
        {{$field->name}}
        <small>{{@$field->note}}</small>
    </label>
    <div class="input-group round">
        <input type="text" class="form-control file-input {{$field->getCssClasses()}}" placeholder="{{$field->name}}">
        <span class="input-group-btn input-group-sm">
                                                    <button type="button" class="btn btn-info">
                                                        <i class="icon-picture"></i>
                                                        آپلود
                                                    <div class="paper-ripple"><div
                                                                class="paper-ripple__background"></div><div
                                                                class="paper-ripple__waves"></div></div>
                                                    </button>
                                                </span>
    </div><!-- /.input-group -->
    <div class="help-block"></div>
</div>