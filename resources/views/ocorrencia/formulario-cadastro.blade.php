@component('components.form.form')
    @slot('action', route('ocorrencia.salvar'))

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'titulo',
        'label' => 'Titulo',
        'placeholder' => 'Titulo da ocorrência',
        'errors' => $errors
    ])

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'reclamada',
        'label' => 'Reclamado',
        'placeholder' => 'Apartamento e bloco (Opcional)',
        'errors' => $errors
    ])

    @include('components.form.textarea', [
        'nome' => 'descricao',
        'label' => 'Descrição',
        'placeholder' => 'Descrição da ocorrência',
        'errors' => $errors
    ])

    <div style="margin-top: 10px">
        <input class="btn btn-default submit" type="submit" value="Registrar">
        <a class="btn btn-default submit" href="{{ route('ocorrencia.index') }}">Voltar</a>
    </div>
@endcomponent
<div class="clearfix"></div>