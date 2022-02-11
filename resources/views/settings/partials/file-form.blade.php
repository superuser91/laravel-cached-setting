<div class="input-group">
    <input type="text" class="form-control" id="ckfinder-{{ str_slug($item->key) }}" name="{{ $item->key }}"
        value="{{ $item->value }}">
    <span class="input-group-append">
        <button type="button" class="btn btn-info"
            onclick="selectFileWithCKFinder('{{ str_slug($item->key) }}')">Browse</button>
    </span>
</div>

@if ($item->data_type == 'image')
    <img class="mw-100 mt-2 rounded" src="{{ $item->value }}" id="preview-{{ str_slug($item->key) }}">
@endif
