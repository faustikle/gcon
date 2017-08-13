<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('vendors/pnotify/dist/pnotify.js') }}"></script>
<script src="{{ asset('vendors/pnotify/dist/pnotify.animate.js') }}"></script>
<script src="{{ asset('vendors/pnotify/dist/pnotify.callbacks.js') }}"></script>
<script src="{{ asset('vendors/pnotify/dist/pnotify.confirm.js') }}"></script>
<script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
<script src="{{ asset('assets/js/custom.min.js') }}"></script>
@if (session('flash-error'))
    @include('shared.alert', [
        'title' => 'Erro!',
        'type' => 'error',
        'message' => session('flash-error')
    ])
@elseif (session('flash-access'))
    @include('shared.alert', [
        'title' => 'Acesso Negado!',
        'type' => 'error',
        'message' => session('flash-access')
    ])
@elseif (session('flash-success'))
    @include('shared.alert', [
        'title' => 'Sucesso!',
        'type' => 'success',
        'message' => session('flash-success')
    ])
@endif