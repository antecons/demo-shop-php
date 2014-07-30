<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
(function($) {
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover({
            container: 'body',
            placement: 'auto top'
        });
    });
})(window.jQuery);
</script>
<script src="//api.antecons.net/js/antecons.js"></script>
<?php if ($productTrackingId) { ?>
<script>
Antecons.init({
    apiKey: '<?= ANTECONS_API_KEY ?>',
    datasource: '<?= ANTECONS_DATASOURCE ?>',
    itemID: '<?= $productTrackingId ?>',
    track: true
});
</script>
<?php } ?>
</body>
</html>
