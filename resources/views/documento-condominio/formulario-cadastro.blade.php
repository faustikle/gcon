@component('components.form.form')
    @slot('action', route('documentos-condominio.salvar'))
    @slot('enctype', 'multipart/form-data')

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'nome',
        'label' => 'Nome',
        'placeholder' => 'Nome do documento',
        'errors' => $errors
    ])

    @include('components.form.textarea', [
        'nome' => 'descricao',
        'label' => 'Descrição',
        'placeholder' => 'Descrição do documento',
        'errors' => $errors
    ])

    <div style="margin-top: 10px">
        <label>Arquivo</label>
        <input type="file" name="documento">
    </div>

    <div style="margin-top: 10px">
        <input class="btn btn-default submit" type="submit" value="Upload">
        <a class="btn btn-default submit" href="{{ route('documentos-condominio.index') }}">Voltar</a>
    </div>
@endcomponent
<div class="clearfix"></div>