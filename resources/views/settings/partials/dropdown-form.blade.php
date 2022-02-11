<?php $options = $item->details ?>
<?php $selected_value = (isset($item->value) && !empty($item->value)) ? $item->value : NULL; ?>
<?php $default = $selected_value ?: (isset($options['default'])) ? $options['default'] : NULL; ?>

<select class="form-control" name="{{ $item->key }}">
    @if(isset($options['options']))
    @foreach($options['options'] as $index => $option)
    <option value="{{ $index }}" @if($selected_value==$index) selected="selected" @endif>{{ $option }}</option>
    @endforeach
    @endif
</select>
