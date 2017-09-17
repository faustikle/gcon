@component('components.form.form')
    @slot('action', route('prestadores.salvar'))
    @slot('model', isset($prestador) ? $prestador : null)

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'nome',
        'label' => 'Nome',
        'placeholder' => 'Nome',
        'model' => isset($prestador) ? $prestador : null,
        'errors' => $errors
    ])

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'responsavel',
        'label' => 'Responsavel',
        'placeholder' => 'Responsável',
        'model' => isset($prestador) ? $prestador : null,
        'errors' => $errors
    ])

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'telefone',
        'label' => 'Telefone',
        'placeholder' => 'Telefone',
        'model' => isset($prestador) ? $prestador : null,
        'errors' => $errors
    ])

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'celular',
        'label' => 'Celular',
        'placeholder' => 'Celular',
        'model' => isset($prestador) ? $prestador : null,
        'errors' => $errors
    ])

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'cpf',
        'label' => 'CPF',
        'placeholder' => 'CPF',
        'model' => isset($prestador) ? $prestador : null,
        'errors' => $errors
    ])

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'cnpj',
        'label' => 'CNPJ',
        'placeholder' => 'CNPJ',
        'model' => isset($prestador) ? $prestador : null,
        'errors' => $errors
    ])

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'endereco',
        'label' => 'Endereço',
        'placeholder' => 'Endereço',
        'model' => isset($prestador) ? $prestador : null,
        'errors' => $errors
    ])

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'numero',
        'label' => 'Numero',
        'placeholder' => 'Numero',
        'model' => isset($prestador) ? $prestador : null,
        'errors' => $errors
    ])

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'bairro',
        'label' => 'Bairro',
        'placeholder' => 'Bairro',
        'model' => isset($prestador) ? $prestador : null,
        'errors' => $errors
    ])

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'cep',
        'label' => 'CEP',
        'placeholder' => 'CEP',
        'model' => isset($prestador) ? $prestador : null,
        'errors' => $errors
    ])

    @include('components.form.select', [
        'nome' => 'estado_id',
        'label' => 'Estado',
        'items' => $estados,
        'multiple' => false,
        'selected' => isset($prestador) ? [$prestador->cidade->estado->getId()] : null,
        'errors' => $errors
    ])

    @include('components.form.select', [
        'nome' => 'cidade',
        'label' => 'Cidade',
        'items' => $cidades,
        'multiple' => false,
        'selected' => isset($prestador) ? [$prestador->cidade->getId()] : null,
        'errors' => $errors
    ])

    @include('components.form.select', [
        'nome' => 'categorias[]',
        'label' => 'Áreas de Atuação',
        'items' => $categorias,
        'multiple' => true,
        'selected' => isset($prestador) ? $prestador->categorias_ids : null,
        'errors' => $errors
    ])

    <div style="margin-top: 10px">
        <input class="btn btn-default submit" type="submit" value="{{ isset($prestador) ? 'Salvar' : 'Cadastrar' }}">
        <a class="btn btn-default submit" href="{{ route('prestadores.index') }}">Voltar</a>
    </div>
@endcomponent
<div class="clearfix"></div>