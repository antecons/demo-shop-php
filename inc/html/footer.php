<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//api.antecons.net/js/antecons.js"></script>
<script>
(function($) {
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover({
            container: 'body',
            placement: 'auto top'
        });

<?php if ($productTrackingId) { ?>
        Antecons.init({
            apiKey: '<?= ANTECONS_API_KEY ?>',
            datasource: '<?= ANTECONS_DATASOURCE ?>',
            product: {
                product_id: '<?= $productTrackingId ?>'
            },
            track: true
        });
<?php } ?>
    });
})(window.jQuery);
</script>
</body>
</html>
