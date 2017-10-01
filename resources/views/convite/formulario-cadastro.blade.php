@component('components.form.form')
    @slot('action', route('pauta.salvar', $reuniao->reuniao_id))
    @slot('model', isset($pauta) ? $pauta : null)

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'titulo',
        'label' => 'Titulo',
        'placeholder' => 'Titulo da pauta',
        'model' => isset($pauta) ? $pauta : null,
        'errors' => $errors
    ])

    @include('components.form.textarea', [
        'nome' => 'descricao',
        'label' => 'Descrição',
        'placeholder' => 'Descrição da pauta',
        'model' => isset($pauta) ? $pauta : null,
        'errors' => $errors
    ])

    <div style="margin-top: 10px">
        <input class="btn btn-default submit" type="submit" value="{{ isset($pauta) ? 'Salvar' : 'Cadastrar' }}">
        <a class="btn btn-default submit" href="{{ route('reuniao.editar', $reuniao->reuniao_id) }}">Voltar</a>
    </div>
@endcomponent
<div class="clearfix"></div>