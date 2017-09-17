@component('components.form.form')
    @slot('action', route('servicos.salvar'))
    @slot('model', isset($servico) ? $servico : null)

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'titulo',
        'label' => 'Titulo',
        'placeholder' => 'Titulo do serviço',
        'model' => isset($servico) ? $servico : null,
        'errors' => $errors
    ])

    @include('components.form.textarea', [
        'nome' => 'descricao',
        'label' => 'Descrição',
        'placeholder' => 'Descrição do serviço',
        'model' => isset($servico) ? $servico : null,
        'errors' => $errors
    ])

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'valor',
        'label' => 'Valor',
        'placeholder' => 'Valor do serviço',
        'model' => isset($servico) ? $servico : null,
        'errors' => $errors
    ])

    @include('components.form.input', [
        'tipo' => 'date',
        'nome' => 'data',
        'label' => 'Date do serviço',
        'model' => isset($servico) ? $servico : null,
        'errors' => $errors
    ])

    @include('components.form.select', [
        'nome' => 'prestador',
        'label' => 'Prestador de Serviço',
        'items' => $prestadores,
        'multiple' => false,
        'selected' => isset($servico) ? [$servico->prestador_servico->getId()] : null,
        'errors' => $errors
    ])

    <div style="margin-top: 10px">
        <input class="btn btn-default submit" type="submit" value="{{ isset($servico) ? 'Salvar' : 'Cadastrar' }}">
        <a class="btn btn-default submit" href="{{ route('servicos.index') }}">Voltar</a>
    </div>
@endcomponent
<div class="clearfix"></div>