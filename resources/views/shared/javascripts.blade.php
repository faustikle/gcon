<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('vendors/pnotify/dist/pnotify.js') }}"></script>
<script src="{{ asset('vendors/pnotify/dist/pnotify.animate.js') }}"></script>
<script src="{{ asset('vendors/pnotify/dist/pnotify.callbacks.js') }}"></script>
<script src="{{ asset('vendors/pnotify/dist/pnotify.confirm.js') }}"></script>
<script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
<script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<script src="{{ asset('vendors/rateyo/jquery.rateyo.min.js') }}"></script>
<script src="{{ asset('vendors/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
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