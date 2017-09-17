<div>
<label>{{ $label or 'Label' }}</label>
<select
        class="form-control {{ $errors->has($nome) ? 'parsley-error' : '' }} {{ $multiple ? 'select2_multiple' : '' }}"
        name="{{ $nome }}" {{ $multiple ? 'multiple="multiple"' : '' }}>
    @if (isset($items))
        @foreach($items as $item => $descricao) {
            <option value="{{ $item }}" {{ isset($selected) && in_array($item, $selected) ? 'selected' : '' }}>{{ $descricao }}</option>
        @endforeach
    @endif
</select>
@if ($errors->has($nome))
    <ul class="parsley-errors-list filled" id="parsley-id-20"><li class="parsley-required">{{ $errors->first($nome) }}</li></ul>
@endif
</div>