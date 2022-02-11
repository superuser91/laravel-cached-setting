<?php $list = []; ?>
<?php $list = json_decode($item->value, true); ?>

<div id="list-{{ $item->key }}">
    @foreach ((is_array($list) ? $list : []) as $value)
    <div class="input-group input-group-sm mb-1 setting-list-item">
        <input type="text" class="form-control" name="{{ $item->key }}[]" value="{{ $value }}">
        <span class="input-group-append">
            <button type="button" class="btn btn-danger remove-setting-item-btn">X</button>
        </span>
    </div>
    @endforeach
</div>

<a class="btn btn-sm btn-success" onclick="addItemToList('{{ $item->key }}')"><i class="fas fa-plus"></i></a>
