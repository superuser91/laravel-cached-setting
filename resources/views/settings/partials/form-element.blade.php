<div class="form-group">
    <label for="settings-{{ str_slug($item->key) }}">
        {{ $item->display_name }}
        <code>setting('{{ $item->key }}')</code>
    </label>
    @if ($item->data_type == 'image' || $item->data_type == 'file')
        @include('vgplay::settings.partials.file-form')
    @elseif($item->data_type == 'select_dropdown')
        @include('vgplay::settings.partials.dropdown-form')
    @elseif($item->data_type == 'checkbox')
        @include('vgplay::settings.partials.checkbox-form')
    @elseif($item->data_type == 'list')
        @include('vgplay::settings.partials.list-form')
    @else
        @include('vgplay::settings.partials.text-form')
    @endif
</div>
