@component('components.form.form')
    @slot('action', route('reuniao.salvar'))
    @slot('model', isset($reuniao) ? $reuniao : null)

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'titulo',
        'label' => 'Titulo',
        'placeholder' => 'Titulo da reunião',
        'model' => isset($reuniao) ? $reuniao : null,
        'errors' => $errors
    ])

    @include('components.form.input', [
        'tipo' => 'date',
        'nome' => 'data_abertura',
        'label' => 'Data de início',
        'model' => isset($reuniao) ? $reuniao : null,
        'errors' => $errors
    ])

    @include('components.form.input', [
        'tipo' => 'date',
        'nome' => 'data_encerramento',
        'label' => 'Date de término',
        'model' => isset($reuniao) ? $reuniao : null,
        'errors' => $errors
    ])

    <div style="margin-top: 10px">
        <input class="btn btn-default submit" type="submit" value="{{ isset($reuniao) ? 'Salvar' : 'Cadastrar' }}">
        <a class="btn btn-default submit" href="{{ route('reuniao.index') }}">Voltar</a>
        @if(isset($reuniao))
            <a class="btn btn-info submit" href="{{ route('pauta.cadastrar', $reuniao->reuniao_id) }}">Adicionar Pauta</a>
        @endif
    </div>
@endcomponent
<div class="clearfix"></div>