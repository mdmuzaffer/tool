{{-- autonumeric library --}}
<script src="//unpkg.com/autonumeric" crossorigin="anonymous"></script>


<script src="//res.cloudinary.com/cblpay/raw/upload/webres/plg/cbjs/clipboard.js"></script>
@push('scripts')

<script>
    window.defaultInitializeDataTable = {
        "iDisplayLength": 50,
        "aLengthMenu": [
            50,
            100,
            200,
            500,
        ]
    };
    $(document).ready(function () {
        var SelfCopyAttr = new ClipboardJS('.SelfCopyAttr', {
                text: function (trigger) {
                    return trigger.getAttribute('data-clipboard-text');
                }
            });
            SelfCopyAttr.on('success', function (e) {
                e.clearSelection();
                console.info('Action:', e.action);
                console.info('Text:', e.text);
                console.info('Trigger:', e.trigger);
                //showTooltip(e.trigger, 'Copied!');
            });
            SelfCopyAttr.on('error', function (e) {
                console.error('Action:', e.action);
                console.error('Trigger:', e.trigger);
                //showTooltip(e.trigger, fallbackMessage(e.action));
            });

    });

    $(document).ready(function () {
        if($.fn.select2){
            $('.select2').select2();
        }
    })
</script>
@endpush
