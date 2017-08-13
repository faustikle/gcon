<script>
    var notice = new PNotify({
        title: '{{ $title }}',
        text: '{{ $message }}',
        type: '{{ $type }}',
        buttons: {
            closer: false,
            sticker: false
        },
        styling: 'bootstrap3'
    });

    notice.get().click(function() {
        notice.remove();
    });
</script>