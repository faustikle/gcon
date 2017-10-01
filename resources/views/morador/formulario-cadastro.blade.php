@component('components.form.form')
    @slot('action', route('moradores.convidar'))

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'nome',
        'label' => 'Nome',
        'placeholder' => 'Nome do novo morador',
        'errors' => $errors
    ])

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'email',
        'label' => 'Email',
        'placeholder' => 'Email do novo morador',
        'errors' => $errors
    ])

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'numero_apartamento',
        'label' => 'Apartamento',
        'placeholder' => 'Apartamento do novo morador',
        'errors' => $errors
    ])

    @include('components.form.input', [
        'tipo' => 'text',
        'nome' => 'bloco',
        'label' => 'Bloco',
        'placeholder' => 'Bloco do novo morador',
        'errors' => $errors
    ])

    <div style="margin-top: 10px">
        <input class="btn btn-default submit" type="submit" value="Enviar convite">
        <a class="btn btn-default submit" href="{{ route('moradores.index') }}">Voltar</a>
    </div>
@endcomponent
<div class="clearfix"></div>