<div>
    <label>{{ $label or 'Label' }}</label>
    <textarea
            class="form-control {{ $errors->has($nome) ? 'parsley-error' : '' }}"
            placeholder="{{ $placeholder or '' }}"
            name="{{ $nome }}">{{ isset($model) ? $model->$nome : '' }}</textarea>
    @if ($errors->has($nome))
        <ul class="parsley-errors-list filled" id="parsley-id-20"><li class="parsley-required">{{ $errors->first($nome) }}</li></ul>
    @endif
</div>