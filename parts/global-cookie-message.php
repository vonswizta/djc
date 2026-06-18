<?php
$cookie_message = get_field('cookie_message', 'option');
?>

<?php if ($cookie_message) { ?>
    <div class="cookie-banner bg-warm-cream py-3 fixed bottom-0 left-0 right-0 hidden">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-12">
                <div class="max-lg:col-span-full lg:col-span-8 lg:col-start-3">
                    <div class="grid grid-cols-[1fr_auto] gap-4 items-center">
                        <div class="space-y-4 text-sm">
                            <?php echo $cookie_message; ?>
                        </div>
                        <a class="button-small cookie-accept" href="#">OK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
