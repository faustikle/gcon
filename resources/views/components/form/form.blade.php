<form
        action="{{ $action or '#' }}"
        method="{{ $method or 'POST' }}"
        class="{{ isset($classes) ? implode(' ', $classes) : '' }}"
        {{ isset($enctype) ? 'enctype='. $enctype : '' }}>
    {{ csrf_field() }}

    @if(isset($model))
        <input type="hidden" name="{{ $model->getPrimaryKeyName() }}" value="{{ $model->getId() }}">
    @endif

    {{ $slot }}
</form>