<div>
<label>{{ $label or 'Label' }}</label>
<input
        type="{{ $tipo }}"
        class="form-control {{ $errors->has($nome) ? 'parsley-error' : '' }}"
        placeholder="{{ $placeholder or '' }}"
        value="{{ isset($model) ? ('date' !== $tipo ? $model->$nome : $model->$nome->format('Y-m-d')) : '' }}"
        name="{{ $nome }}">
@if ($errors->has($nome))
    <ul class="parsley-errors-list filled" id="parsley-id-20"><li class="parsley-required">{{ $errors->first($nome) }}</li></ul>
@endif
</div>