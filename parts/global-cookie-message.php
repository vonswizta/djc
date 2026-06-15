<?php
$cookie_message = get_field('cookie_message', 'option');
?>

<?php if ($cookie_message) { ?>
    <div class="cookie-banner">
        <div class="row g-2 g-lg-3">
            <div class="col-lg">
                <div class="editor">
                    <?php echo $cookie_message; ?>
                </div>
            </div>
            <div class="col-lg-auto">
                <a class="button no-arrow cookie-accept d-flex" href="#">OK</a>
            </div>
        </div>
    </div>
<?php } ?>
