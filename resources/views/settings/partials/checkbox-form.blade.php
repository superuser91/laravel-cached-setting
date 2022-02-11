<?php $options = $item->details; ?>
<?php $checked = $item->value ? true : false; ?>
<?php $label = isset($options['label']) ? $options['label'] : 'Kích hoạt'; ?>

<div class="form-group">
    <div class="custom-control custom-checkbox mb-2">
        <input type="checkbox" class="custom-control-input" name="{{ $item->key }}" id="checkbox-{{ str_slug($item->key) }}" name="{{ $item->key }}" @if($checked) checked @endif>
        <label class="custom-control-label" for="checkbox-{{ str_slug($item->key) }}">{{ $label }}</label>
    </div>
</div>
